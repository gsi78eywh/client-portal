<?php

namespace Tests\Feature;

use App\Models\ContactVerification;
use App\Models\User;
use App\Services\Contact\PhoneNumberService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactVerificationTest extends TestCase
{
    use RefreshDatabase;

    private function setSessionUpToContact(): void
    {
        session([
            'registration.profile' => [
                'first_name' => 'Maria',
                'last_name' => 'Santos',
                'country' => 'Philippines',
            ],
            'registration.account.account_type' => 'business',
            'registration.information' => [
                'business_account_type' => 'Corporation',
                'registered_name' => 'Santos Global Corp',
                'trade_name' => 'Santos Global',
                'tin' => '009-881-224-000',
                'primary_address' => 'Ayala Ave, Makati City',
                'relationship' => 'Owner / Founder',
                'is_authorized' => 'Yes',
            ],
        ]);
    }

    public function test_stores_contact_normalizes_mobile_and_dispatches_otps(): void
    {
        $this->setSessionUpToContact();

        $res = $this->post(route('contact.update'), [
            'email' => 'maria.santos@santosglobal.ph',
            'mobile_number' => '09491902119',
        ]);

        $res->assertRedirect(route('register.verification'));

        // Check normalized mobile in session
        $contact = session('registration.contact');
        $this->assertEquals('+639491902119', $contact['mobile_number']);
        $this->assertEquals('maria.santos@santosglobal.ph', $contact['email']);

        // Check OTPs generated in database (Email OTP generated, SMS OTP NOT generated as verification is email only)
        $emailOtp = ContactVerification::where('channel', 'email')
            ->where('destination', 'maria.santos@santosglobal.ph')
            ->first();
        $this->assertNotNull($emailOtp);
        $this->assertEquals(6, strlen($emailOtp->otp_code));
        $this->assertNull($emailOtp->verified_at);

        $smsOtp = ContactVerification::where('channel', 'sms')->first();
        $this->assertNull($smsOtp);
    }

    public function test_verification_page_masks_contact_identities_and_shows_no_hardcoded_test_code(): void
    {
        $this->setSessionUpToContact();
        session([
            'registration.contact' => [
                'email' => 'maria.santos@santosglobal.ph',
                'mobile_number' => '+639491902119',
            ],
        ]);

        $res = $this->get(route('register.verification'));
        $res->assertStatus(200);

        // Masked email: starts with m, contains bullets, ends with @santosglobal.ph
        $res->assertSee('m••••');
        $res->assertSee('@santosglobal.ph');

        // Verify no fixed development code is exposed in the UI
        $res->assertDontSee('Test code: 123456');
        $res->assertDontSee('Simulate Verification');
        $res->assertDontSee('Development mode:');
    }

    public function test_rejects_incorrect_otp_code(): void
    {
        $this->setSessionUpToContact();
        session([
            'registration.contact' => [
                'email' => 'maria.santos@santosglobal.ph',
                'mobile_number' => '+639491902119',
            ],
        ]);

        // Create an OTP
        ContactVerification::create([
            'channel' => 'email',
            'destination' => 'maria.santos@santosglobal.ph',
            'otp_code' => '987654',
            'attempts' => 0,
            'max_attempts' => 5,
            'expires_at' => now()->addMinutes(10),
            'resend_available_at' => now()->addSeconds(60),
        ]);

        $res = $this->post(route('verification.email.verify'), [
            'verification_code' => '000000',
        ]);

        $res->assertSessionHasErrors('email_verification_code');
        $this->assertFalse(session('registration.email_verified', false));
    }

    public function test_rejects_expired_otp_code(): void
    {
        $this->setSessionUpToContact();
        session([
            'registration.contact' => [
                'email' => 'maria.santos@santosglobal.ph',
                'mobile_number' => '+639491902119',
            ],
        ]);

        ContactVerification::create([
            'channel' => 'email',
            'destination' => 'maria.santos@santosglobal.ph',
            'otp_code' => '987654',
            'attempts' => 0,
            'max_attempts' => 5,
            'expires_at' => now()->subMinute(), // Expired!
            'resend_available_at' => now()->subMinutes(2),
        ]);

        $res = $this->post(route('verification.email.verify'), [
            'verification_code' => '987654',
        ]);

        $res->assertSessionHasErrors('email_verification_code');
        $this->assertFalse(session('registration.email_verified', false));
    }

    public function test_locks_otp_after_maximum_attempts(): void
    {
        $this->setSessionUpToContact();
        session([
            'registration.contact' => [
                'email' => 'maria.santos@santosglobal.ph',
                'mobile_number' => '+639491902119',
            ],
        ]);

        $record = ContactVerification::create([
            'channel' => 'email',
            'destination' => 'maria.santos@santosglobal.ph',
            'otp_code' => '987654',
            'attempts' => 4, // 1 remaining attempt
            'max_attempts' => 5,
            'expires_at' => now()->addMinutes(10),
            'resend_available_at' => now()->addSeconds(60),
        ]);

        // Attempt 5 (incorrect)
        $this->post(route('verification.email.verify'), [
            'verification_code' => '111111',
        ])->assertSessionHasErrors('email_verification_code');

        // Now attempts should be 5
        $record->refresh();
        $this->assertEquals(5, $record->attempts);

        // Even with correct code now, it should be locked
        $res = $this->post(route('verification.email.verify'), [
            'verification_code' => '987654',
        ]);
        $res->assertSessionHasErrors('email_verification_code');
        $this->assertFalse(session('registration.email_verified', false));
    }

    public function test_resend_enforces_60_second_cooldown(): void
    {
        $this->setSessionUpToContact();
        session([
            'registration.contact' => [
                'email' => 'maria.santos@santosglobal.ph',
                'mobile_number' => '+639491902119',
            ],
        ]);

        // Create an active OTP within cooldown
        ContactVerification::create([
            'channel' => 'email',
            'destination' => 'maria.santos@santosglobal.ph',
            'otp_code' => '987654',
            'attempts' => 0,
            'max_attempts' => 5,
            'expires_at' => now()->addMinutes(10),
            'resend_available_at' => now()->addSeconds(45), // 45 seconds cooldown remaining
        ]);

        $res = $this->post(route('verification.email.resend'));
        $res->assertSessionHasErrors('email_resend');
    }

    public function test_complete_verification_and_registration_journey(): void
    {
        $this->setSessionUpToContact();

        // 1. Submit contact details
        $this->post(route('contact.update'), [
            'email' => 'maria.santos@santosglobal.ph',
            'mobile_number' => '09491902119',
        ])->assertRedirect(route('register.verification'));

        // Retrieve generated OTPs (Email only)
        $emailRecord = ContactVerification::where('channel', 'email')
            ->where('destination', 'maria.santos@santosglobal.ph')
            ->latest('id')
            ->first();

        $this->assertNotNull($emailRecord);
        $this->assertNull(ContactVerification::where('channel', 'sms')->first());

        // Security step must be blocked while unverified
        $this->get(route('register.security'))
            ->assertRedirect(route('register.verification'));

        // 2. Verify Email OTP
        $this->post(route('verification.email.verify'), [
            'verification_code' => $emailRecord->otp_code,
        ])->assertRedirect(route('register.security'));

        $this->assertTrue(session('registration.email_verified'));
        $this->assertTrue(session('registration.contact_verified'));

        // 3. Complete Security (redirects to confirmation)
        $this->post(route('security.create'), [
            'password' => 'SecurePassword123!',
            'password_confirmation' => 'SecurePassword123!',
            'terms' => '1',
            'privacy_policy' => '1',
        ])->assertRedirect(route('register.confirmation'));

        // 4. View Confirmation step
        $this->get(route('register.confirmation'))->assertStatus(200);

        // 5. Complete Registration
        $this->post(route('register.complete'))
            ->assertRedirect(route('account.created'));

        $this->assertAuthenticated();

        $user = User::where('email', 'maria.santos@santosglobal.ph')->first();
        $this->assertNotNull($user);
        $this->assertNotNull($user->email_verified_at);
        $this->assertEquals('+639491902119', $user->profile->mobile_number);

        // 6. Enter ORDO & Town Hall
        $resTown = $this->get(route('town-hall'));
        $resTown->assertStatus(200);
        $resTown->assertSee('Santos Global Corp');
        $resTown->assertSee('30-Day Full Access');
    }
}
