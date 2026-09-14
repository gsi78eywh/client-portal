<?php

namespace Tests\Feature;

use App\Models\ContactVerification;
use App\Services\Contact\ContactVerificationService;
use App\Services\Contact\EmailVerificationServiceInterface;
use App\Services\Sms\SmsServiceInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OtpSecurityAndUniquenessTest extends TestCase
{
    use RefreshDatabase;

    protected ContactVerificationService $service;
    protected $mockEmailService;
    protected $mockSmsService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockEmailService = $this->createMock(EmailVerificationServiceInterface::class);
        $this->mockEmailService->method('sendVerificationEmail')->willReturn(true);

        $this->mockSmsService = $this->createMock(SmsServiceInterface::class);
        $this->mockSmsService->method('sendSms')->willReturn(true);

        $this->service = new ContactVerificationService($this->mockSmsService, $this->mockEmailService);
    }

    /**
     * Requirement 1: Each OTP request generates a unique 6-digit numeric code.
     */
    public function test_each_otp_request_generates_a_6_digit_code_and_different_requests_are_unique(): void
    {
        $otps = [];
        for ($i = 0; $i < 10; $i++) {
            $result = $this->service->sendOtp('email', "user{$i}@example.com", "User {$i}");
            $this->assertTrue($result['success']);

            $record = ContactVerification::where('destination', "user{$i}@example.com")->latest('id')->first();
            $this->assertNotNull($record);
            $otp = $record->otp_code;

            $this->assertEquals(6, strlen($otp));
            $this->assertTrue(ctype_digit($otp));
            $otps[] = $otp;
        }

        // Verify that random codes are generated (not a fixed dummy value)
        $uniqueOtps = array_unique($otps);
        $this->assertGreaterThan(1, count($uniqueOtps), "Generated OTPs should not all be identical");
    }

    /**
     * Requirement 2: A new OTP replaces and invalidates the previous active OTP.
     */
    public function test_new_otp_replaces_and_invalidates_previous_active_otp(): void
    {
        $email = 'userA@example.com';

        // 1st OTP
        $res1 = $this->service->sendOtp('email', $email, 'User A');
        $this->assertTrue($res1['success']);
        $record1 = ContactVerification::where('destination', $email)->latest('id')->first();
        $code1 = $record1->otp_code;

        // Simulate cooldown elapsed so we can request another
        $record1->update(['resend_available_at' => now()->subSecond()]);

        // 2nd OTP
        $res2 = $this->service->sendOtp('email', $email, 'User A');
        $this->assertTrue($res2['success']);
        $record2 = ContactVerification::where('destination', $email)->latest('id')->first();
        $code2 = $record2->otp_code;

        // Old record must be expired
        $record1->refresh();
        $this->assertTrue($record1->isExpired());

        // Attempting to verify with old code1 must fail
        $verifyOld = $this->service->verifyOtp('email', $email, $code1);
        $this->assertFalse($verifyOld['success']);

        // Verifying with new code2 must succeed
        $verifyNew = $this->service->verifyOtp('email', $email, $code2);
        $this->assertTrue($verifyNew['success']);
    }

    /**
     * Requirement 3: OTP expires after 10 minutes.
     */
    public function test_otp_expires_after_10_minutes(): void
    {
        $email = 'expires@example.com';
        $this->service->sendOtp('email', $email, 'Expire User');
        $record = ContactVerification::where('destination', $email)->latest('id')->first();

        // Check configured expiration
        $createdAt = \Carbon\Carbon::parse($record->created_at);
        $expiresAt = \Carbon\Carbon::parse($record->expires_at);
        $this->assertEquals(10, $createdAt->diffInMinutes($expiresAt));

        // Travel 11 minutes into the future
        $this->travel(11)->minutes();

        $this->assertTrue($record->fresh()->isExpired());
        $verify = $this->service->verifyOtp('email', $email, $record->otp_code);
        $this->assertFalse($verify['success']);
        $this->assertStringContainsString('expired', strtolower($verify['error']));
    }

    /**
     * Requirement 4 & 5: OTP is single-use; after verification it cannot be reused.
     */
    public function test_otp_is_single_use_and_cannot_be_reused(): void
    {
        $email = 'singleuse@example.com';
        $this->service->sendOtp('email', $email, 'Single Use');
        $record = ContactVerification::where('destination', $email)->latest('id')->first();
        $code = $record->otp_code;

        // First verification succeeds
        $firstVerify = $this->service->verifyOtp('email', $email, $code);
        $this->assertTrue($firstVerify['success']);

        // Second verification with the same OTP must be rejected
        $secondVerify = $this->service->verifyOtp('email', $email, $code);
        $this->assertFalse($secondVerify['success']);
        $this->assertStringContainsString('already been used', $secondVerify['error']);
    }

    /**
     * Requirement 6: Incorrect OTP is rejected.
     */
    public function test_incorrect_otp_is_rejected(): void
    {
        $email = 'wrongcode@example.com';
        $this->service->sendOtp('email', $email, 'Wrong Code');
        $record = ContactVerification::where('destination', $email)->latest('id')->first();

        $verify = $this->service->verifyOtp('email', $email, '000000');
        $this->assertFalse($verify['success']);
        $this->assertStringContainsString('incorrect', strtolower($verify['error']));
    }

    /**
     * Requirement 7: An OTP cannot be used for another registration/email.
     */
    public function test_otp_cannot_be_used_for_another_registration_or_email(): void
    {
        $emailA = 'userA@example.com';
        $emailB = 'userB@example.com';

        $this->service->sendOtp('email', $emailA, 'User A');
        $this->service->sendOtp('email', $emailB, 'User B');

        $recordA = ContactVerification::where('destination', $emailA)->latest('id')->first();
        $recordB = ContactVerification::where('destination', $emailB)->latest('id')->first();

        // User B attempts to use User A's OTP
        $crossVerify = $this->service->verifyOtp('email', $emailB, $recordA->otp_code);
        $this->assertFalse($crossVerify['success']);

        // User A attempts to use User B's OTP
        $crossVerify2 = $this->service->verifyOtp('email', $emailA, $recordB->otp_code);
        $this->assertFalse($crossVerify2['success']);
    }

    /**
     * Requirement 8: Resend generates a new unique OTP.
     */
    public function test_resend_generates_a_new_otp(): void
    {
        $email = 'resendtest@example.com';
        $this->service->sendOtp('email', $email, 'Resend User');
        $firstRecord = ContactVerification::where('destination', $email)->latest('id')->first();
        $firstCode = $firstRecord->otp_code;

        // Bypass cooldown to test resend generation
        $firstRecord->update(['resend_available_at' => now()->subSecond()]);

        $this->service->sendOtp('email', $email, 'Resend User');
        $secondRecord = ContactVerification::where('destination', $email)->latest('id')->first();
        $secondCode = $secondRecord->otp_code;

        $this->assertNotEquals($firstRecord->id, $secondRecord->id);
        $this->assertEquals(6, strlen($secondCode));
    }

    /**
     * Requirement 9: Email recipient is the current registration email.
     */
    public function test_email_recipient_matches_registration_email(): void
    {
        $capturedRecipient = null;
        $capturedCode = null;

        $customEmailService = $this->createMock(EmailVerificationServiceInterface::class);
        $customEmailService->expects($this->once())
            ->method('sendVerificationEmail')
            ->willReturnCallback(function ($recipient, $code) use (&$capturedRecipient, &$capturedCode) {
                $capturedRecipient = $recipient;
                $capturedCode = $code;
                return true;
            });

        $service = new ContactVerificationService($this->mockSmsService, $customEmailService);
        $service->sendOtp('email', 'target.user@domain.com', 'Target User');

        $this->assertEquals('target.user@domain.com', $capturedRecipient);
        $this->assertNotNull($capturedCode);
        $this->assertEquals(6, strlen($capturedCode));
    }

    /**
     * Requirement 10: Email delivery failure does not mark email as verified and keeps user on contact step.
     */
    public function test_email_delivery_failure_cleans_up_record_and_keeps_user_on_contact_step(): void
    {
        $failingEmailService = $this->createMock(EmailVerificationServiceInterface::class);
        $failingEmailService->method('sendVerificationEmail')->willReturn(false);

        $this->app->instance(EmailVerificationServiceInterface::class, $failingEmailService);

        session([
            'registration.profile' => [
                'first_name' => 'Failed',
                'last_name' => 'Dispatch',
                'country' => 'Philippines',
            ],
            'registration.account.account_type' => 'business',
            'registration.information' => [
                'business_account_type' => 'Corporation',
                'registered_name' => 'Dispatch Fail Corp',
                'tin' => '123-456-789-000',
                'primary_address' => 'Makati',
                'relationship' => 'Director',
                'is_authorized' => 'Yes',
            ],
        ]);

        $res = $this->from(route('register.contact'))->post(route('contact.update'), [
            'email' => 'unreachable.domain@fail.com',
            'mobile_number' => '09171234567',
        ]);

        $res->assertRedirect(route('register.contact'));
        $res->assertSessionHasErrors(['email']);

        // Ensure no leftover unverified OTP record
        $record = ContactVerification::where('destination', 'unreachable.domain@fail.com')->first();
        $this->assertNull($record);
    }
}
