<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrdoOnboardingJourneyTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed ABC Corporation for invitation tests
        $abcAccount = Account::create([
            'name' => 'ABC Corporation',
            'account_number' => 'ORDO-2026-00192837',
            'account_type' => 'business',
            'status' => 'active',
            'verification_status' => 'verified',
            'trial_ends_at' => now()->addDays(30),
        ]);

        AccountProfile::create([
            'account_id' => $abcAccount->id,
            'account_type' => 'Corporation',
            'legal_name' => 'ABC Corporation',
            'trade_name' => 'ABC Corp',
            'tin' => '123-456-789-000',
            'industry_profession' => 'Technology',
            'primary_address' => '123 Corporate Tower, Makati City',
            'country' => 'Philippines',
        ]);
    }

    public function test_individual_personal_registration_journey(): void
    {
        // Step 1: About You
        $this->post(route('profile.update'), [
            'first_name' => 'John',
            'middle_name' => 'Paul',
            'last_name' => 'Reyes',
            'suffix' => 'Jr.',
            'date_of_birth' => '1992-05-14',
            'gender' => 'male',
            'country' => 'Philippines',
        ])->assertRedirect(route('register.account'));

        // Step 2: Account Type - Personal
        $this->post(route('account.update'), [
            'account_type' => 'personal',
        ])->assertRedirect(route('register.personal'));

        // Step 3: Type Specific - Personal (Individual)
        $this->post(route('personal.update'), [
            'account_name' => 'John Reyes Workspace',
            'country' => 'Philippines',
            'purpose' => 'Personal regulatory and records management',
        ])->assertRedirect(route('register.contact'));

        // Step 4: Contact
        $this->post(route('contact.update'), [
            'email' => 'john.reyes@example.com',
            'mobile_number' => '+639171234567',
        ])->assertRedirect(route('register.verification'));

        // Step 5: Verify Email (Email Only)
        $emailOtp = \App\Models\ContactVerification::where('channel', 'email')->where('destination', 'john.reyes@example.com')->latest('id')->first()->otp_code;
        $this->post(route('verification.email.verify'), ['verification_code' => $emailOtp])
            ->assertRedirect(route('register.security'));

        // Step 6: Security (Create Password + Terms & Privacy)
        $this->post(route('security.create'), [
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
            'terms' => '1',
            'privacy_policy' => '1',
        ])->assertRedirect(route('register.confirmation'));

        // Step 7: Confirmation & Complete
        $this->post(route('register.complete'))
            ->assertRedirect(route('account.created'));

        $this->assertAuthenticated();

        $user = User::where('email', 'john.reyes@example.com')->first();
        $this->assertNotNull($user);
        $account = $user->currentAccount();
        $this->assertNotNull($account);
        $this->assertEquals('personal', $account->account_type);
        $this->assertEquals('Individual', $account->profile->account_type);
        $this->assertEquals('not_started', $account->verification_status);

        // Access Account Created page
        $resCreated = $this->get(route('account.created'));
        $resCreated->assertStatus(200);
        $resCreated->assertSee('30-Day Free Access Activated');
        $resCreated->assertSee('Enter ORDO');

        // Access Town Hall immediately without verification gating
        $resTown = $this->get(route('town-hall'));
        $resTown->assertStatus(200);
        $resTown->assertSee('John Paul Reyes');
        $resTown->assertSee('Type: Individual');
        $resTown->assertSee('30-Day Full Access');
    }

    public function test_professional_practitioner_registration_journey(): void
    {
        // Step 1: Profile
        $this->post(route('profile.update'), [
            'first_name' => 'Elena',
            'middle_name' => 'Cruz',
            'last_name' => 'Bautista',
            'date_of_birth' => '1988-11-03',
            'gender' => 'female',
            'country' => 'Philippines',
        ])->assertRedirect(route('register.account'));

        // Step 2: Account Type - Profession
        $this->post(route('account.update'), [
            'account_type' => 'profession',
        ])->assertRedirect(route('register.profession'));

        // Step 3: Type Specific - Profession
        $this->post(route('profession.update'), [
            'practice_name' => 'Bautista Legal & Tax Consultancy',
            'profession' => 'Lawyer',
            'industry' => 'Legal & Advisory',
            'primary_address' => 'Suite 401, Iloilo Business Center, Iloilo City',
            'registration_number' => 'IBP-99281',
            'relationship' => 'Lead Practitioner',
            'is_authorized' => 'Yes',
        ])->assertRedirect(route('register.contact'));

        // Step 4: Contact
        $this->post(route('contact.update'), [
            'email' => 'elena.bautista@example.com',
            'mobile_number' => '+639189998877',
        ])->assertRedirect(route('register.verification'));

        // Step 5: Verify Email (Email Only)
        $emailOtp = \App\Models\ContactVerification::where('channel', 'email')->where('destination', 'elena.bautista@example.com')->latest('id')->first()->otp_code;
        $this->post(route('verification.email.verify'), ['verification_code' => $emailOtp])
            ->assertRedirect(route('register.security'));

        // Step 6: Security
        $this->post(route('security.create'), [
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
            'terms' => '1',
            'privacy_policy' => '1',
        ])->assertRedirect(route('register.confirmation'));

        // Step 7: Complete
        $this->post(route('register.complete'))
            ->assertRedirect(route('account.created'));

        $this->assertAuthenticated();

        $user = User::where('email', 'elena.bautista@example.com')->first();
        $account = $user->currentAccount();
        $this->assertEquals('profession', $account->account_type);
        $this->assertEquals('Professional / Practitioner', $account->profile->account_type);
        $this->assertEquals('Bautista Legal & Tax Consultancy', $account->profile->legal_name);

        // Town Hall reflects Professional context
        $resTown = $this->get(route('town-hall'));
        $resTown->assertStatus(200);
        $resTown->assertSee('Bautista Legal & Tax Consultancy');
        $resTown->assertSee('Professional / Practitioner');
    }

    public function test_business_organization_registration_journey(): void
    {
        // Step 1: Profile
        $this->post(route('profile.update'), [
            'first_name' => 'Roberto',
            'middle_name' => 'Tan',
            'last_name' => 'Lim',
            'date_of_birth' => '1980-04-12',
            'gender' => 'male',
            'country' => 'Philippines',
        ])->assertRedirect(route('register.account'));

        // Step 2: Account Type - Business
        $this->post(route('account.update'), [
            'account_type' => 'business',
        ])->assertRedirect(route('register.business'));

        // Step 3: Type Specific - Business
        $this->post(route('business.update'), [
            'business_account_type' => 'Corporation',
            'registered_name' => 'Pacific Crest Logistics Inc.',
            'trade_name' => 'PCL Express',
            'industry' => 'Logistics & Supply Chain',
            'tin' => '009-876-543-000',
            'primary_address' => 'Pier 4, North Harbor, Manila',
            'country' => 'Philippines',
            'registration_number' => 'CS202409812',
            'relationship' => 'President / CEO',
            'is_authorized' => 'Yes',
        ])->assertRedirect(route('register.contact'));

        // Step 4: Contact
        $this->post(route('contact.update'), [
            'email' => 'roberto.lim@pacificcrest.ph',
            'mobile_number' => '+639175554433',
        ])->assertRedirect(route('register.verification'));

        // Step 5: Verify Email (Email Only)
        $emailOtp = \App\Models\ContactVerification::where('channel', 'email')->where('destination', 'roberto.lim@pacificcrest.ph')->latest('id')->first()->otp_code;
        $this->post(route('verification.email.verify'), ['verification_code' => $emailOtp])
            ->assertRedirect(route('register.security'));

        // Step 6: Security
        $this->post(route('security.create'), [
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
            'terms' => '1',
            'privacy_policy' => '1',
        ])->assertRedirect(route('register.confirmation'));

        // Step 7: Complete
        $this->post(route('register.complete'))
            ->assertRedirect(route('account.created'));

        $this->assertAuthenticated();

        $user = User::where('email', 'roberto.lim@pacificcrest.ph')->first();
        $account = $user->currentAccount();
        $this->assertEquals('business', $account->account_type);
        $this->assertEquals('Corporation', $account->profile->account_type);
        $this->assertEquals('Pacific Crest Logistics Inc.', $account->profile->legal_name);

        // Town Hall reflects Corporation
        $resTown = $this->get(route('town-hall'));
        $resTown->assertStatus(200);
        $resTown->assertSee('Pacific Crest Logistics Inc.');
        $resTown->assertSee('Corporation');
    }

    public function test_invited_existing_account_registration_journey_joins_existing_account(): void
    {
        // Step 1: Profile
        $this->post(route('profile.update'), [
            'first_name' => 'Carlos',
            'middle_name' => 'Mendoza',
            'last_name' => 'Gomez',
            'date_of_birth' => '1996-08-25',
            'gender' => 'male',
            'country' => 'Philippines',
        ])->assertRedirect(route('register.account'));

        // Step 2: Account Type - Invited
        $this->post(route('account.update'), [
            'account_type' => 'invited',
        ])->assertRedirect(route('register.invited'));

        // Step 3: Type Specific - Invited
        $this->post(route('invited.update'), [
            'invitation_code' => 'ABC-INV-2026',
            'invitation_email' => 'carlos.gomez@abccorp.ph',
            'relationship' => 'Employee / Staff',
            'is_authorized' => 'No',
        ])->assertRedirect(route('register.contact'));

        // Step 4: Contact
        $this->post(route('contact.update'), [
            'email' => 'carlos.gomez@abccorp.ph',
            'mobile_number' => '+639174443322',
        ])->assertRedirect(route('register.verification'));

        // Step 5: Verify Email (Email Only)
        $emailOtp = \App\Models\ContactVerification::where('channel', 'email')->where('destination', 'carlos.gomez@abccorp.ph')->latest('id')->first()->otp_code;
        $this->post(route('verification.email.verify'), ['verification_code' => $emailOtp])
            ->assertRedirect(route('register.security'));

        // Step 6: Security
        $this->post(route('security.create'), [
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
            'terms' => '1',
            'privacy_policy' => '1',
        ])->assertRedirect(route('register.confirmation'));

        // Step 7: Complete
        $this->post(route('register.complete'))
            ->assertRedirect(route('account.created'));

        $this->assertAuthenticated();

        $user = User::where('email', 'carlos.gomez@abccorp.ph')->first();
        $account = $user->currentAccount();

        // Crucial test: User must join ABC Corporation, NOT create a duplicate account
        $this->assertEquals('ABC Corporation', $account->name);
        $this->assertEquals('ORDO-2026-00192837', $account->account_number);

        // Check pivot
        $pivot = $user->accounts->firstWhere('id', $account->id)->pivot;
        $this->assertEquals('Employee / Staff', $pivot->relationship);
        $this->assertEquals(0, (int)$pivot->is_administrator);

        // Town Hall reflects Joined Account
        $resTown = $this->get(route('town-hall'));
        $resTown->assertStatus(200);
        $resTown->assertSee('ABC Corporation');
        $resTown->assertSee('Employee / Staff');
    }

    public function test_settings_account_profile_and_my_account_separation_and_updates(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@testco.ph',
            'name' => 'Ana Ramirez',
        ]);

        UserProfile::create([
            'user_id' => $user->id,
            'first_name' => 'Ana',
            'middle_name' => 'Luz',
            'last_name' => 'Ramirez',
            'date_of_birth' => '1990-01-01',
            'gender' => 'female',
            'country_region' => 'Philippines',
            'mobile_number' => '+639170001111',
        ]);

        $account = Account::create([
            'name' => 'Testco Enterprise',
            'account_number' => 'ORDO-2026-990011',
            'account_type' => 'business',
            'status' => 'active',
            'verification_status' => 'not_started',
        ]);

        AccountProfile::create([
            'account_id' => $account->id,
            'account_type' => 'Corporation',
            'legal_name' => 'Testco Enterprise Inc.',
            'trade_name' => 'Testco',
            'tin' => '111-222-333-000',
            'primary_address' => 'BGC Taguig City',
            'country' => 'Philippines',
        ]);

        $user->accounts()->attach($account->id, [
            'relationship' => 'Director / Officer',
            'is_administrator' => 1,
        ]);

        // 1. View Account Profile
        $resAcct = $this->actingAs($user)->get(route('settings.account-profile'));
        $resAcct->assertStatus(200);
        $resAcct->assertSee('Testco Enterprise Inc.');
        $resAcct->assertSee('ORDO-2026-990011');
        $resAcct->assertDontSee('John Kelly and Company (JK&C Inc.)');
        $resAcct->assertDontSee('value="John Kelly & Company"', false);

        // 2. Update Account Profile
        $this->actingAs($user)->post(route('settings.account-profile.update'), [
            'account_type' => 'Corporation',
            'legal_name' => 'Testco Enterprise Holdings Inc.',
            'trade_name' => 'Testco Holdings',
            'tin' => '111-222-333-001',
            'primary_address' => 'New BGC Tower, Taguig City',
        ])->assertRedirect(route('settings.account-profile'));

        $this->assertDatabaseHas('account_profiles', [
            'account_id' => $account->id,
            'legal_name' => 'Testco Enterprise Holdings Inc.',
        ]);

        // 3. View My Account
        $resMy = $this->actingAs($user)->get(route('settings.my-account'));
        $resMy->assertStatus(200);
        $resMy->assertSee('Ana Ramirez');
        $resMy->assertSee('admin@testco.ph');

        // 4. Update My Account
        $this->actingAs($user)->post(route('settings.my-account.update'), [
            'first_name' => 'Anatolia',
            'last_name' => 'Ramirez-Santos',
            'middle_name' => 'Luz',
            'suffix' => 'Esq.',
            'country_region' => 'Philippines',
            'mobile_number' => '+639178889999',
        ])->assertRedirect(route('settings.my-account'));

        $this->assertDatabaseHas('user_profiles', [
            'user_id' => $user->id,
            'first_name' => 'Anatolia',
            'last_name' => 'Ramirez-Santos',
        ]);
    }

    public function test_progressive_verification_states_and_submission(): void
    {
        $user = User::factory()->create(['email' => 'verif@ordo.test']);
        $account = Account::create([
            'name' => 'Verif Corp',
            'account_number' => 'ORDO-2026-887766',
            'account_type' => 'business',
            'verification_status' => 'not_started',
        ]);
        $user->accounts()->attach($account->id, ['relationship' => 'Owner', 'is_administrator' => 1]);

        // 1. Initial view: Not Started
        $res = $this->actingAs($user)->get(route('settings.verification'));
        $res->assertStatus(200);
        $res->assertSee('Not Started');

        // 2. Submit Verification
        $this->actingAs($user)->post(route('settings.verification.submit'), [
            'action' => 'submit',
        ])->assertRedirect(route('settings.verification'));

        $account->refresh();
        $this->assertEquals('submitted', $account->verification_status);

        $resSub = $this->actingAs($user)->get(route('settings.verification'));
        $resSub->assertSee('Submitted & Under Review');

        // 3. Prototype status switcher: Additional Info Required
        $this->actingAs($user)->post(route('settings.verification.submit'), [
            'status' => 'additional_info_required',
        ])->assertRedirect(route('settings.verification'));

        $account->refresh();
        $this->assertEquals('additional_info_required', $account->verification_status);

        $resReq = $this->actingAs($user)->get(route('settings.verification'));
        $resReq->assertSee('Action Required: Additional Information Needed');
        $resReq->assertSee('Reviewer Remarks');
        $resReq->assertSee('Resubmit Updated Documents');

        // 4. Prototype status switcher: Verified
        $this->actingAs($user)->post(route('settings.verification.submit'), [
            'status' => 'verified',
        ])->assertRedirect(route('settings.verification'));

        $account->refresh();
        $this->assertEquals('verified', $account->verification_status);

        $resVer = $this->actingAs($user)->get(route('settings.verification'));
        $resVer->assertSee('Account Verified');
    }
}
