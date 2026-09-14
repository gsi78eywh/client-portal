<?php
namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class RegistrationFlowTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_view_registration_step_1(): void
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
        $response->assertViewIs('portal.registration.profile');
    }
    public function test_step_1_validation_failure_on_missing_fields(): void
    {
        $response = $this->post(route('profile.update'), []);
        $response->assertSessionHasErrors(['first_name', 'last_name', 'date_of_birth', 'country']);
    }
    public function test_step_1_successful_submission_redirects_to_account_step(): void
    {
        $response = $this->post(route('profile.update'), [
            'first_name' => 'Maria',
            'middle_name' => 'Clara',
            'last_name' => 'Santos',
            'suffix' => null,
            'date_of_birth' => '1995-10-20',
            'gender' => 'female',
            'country' => 'Philippines',
        ]);
        $response->assertRedirect(route('register.account'));
        $this->assertEquals('Maria', session('registration.profile.first_name'));
    }
    public function test_cannot_access_step_2_without_step_1(): void
    {
        $response = $this->get(route('register.account'));
        $response->assertRedirect(route('register.profile'));
    }
    public function test_full_7_step_registration_lifecycle(): void
    {
        // 1. Submit Profile
        $this->post(route('profile.update'), [
            'first_name' => 'Maria',
            'middle_name' => 'Clara',
            'last_name' => 'Santos',
            'suffix' => null,
            'date_of_birth' => '1995-10-20',
            'gender' => 'prefer_not_to_say',
            'country' => 'Philippines',
        ])->assertRedirect(route('register.account'));
        // 2. Select Account Type (personal)
        $this->post(route('account.update'), [
            'account_type' => 'personal',
        ])->assertRedirect(route('register.personal'));
        // 3. Submit Personal Information
        $this->post(route('personal.update'), [
            'account_name' => 'Maria Clara Santos Records',
            'country' => 'Philippines',
        ])->assertRedirect(route('register.contact'));
        // 4. Submit Contact
        $this->post(route('contact.update'), [
            'email' => 'maria.clara@example.com',
            'mobile_number' => '+639181112233',
        ])->assertRedirect(route('register.verification'));
        // 5. Submit Verification Code for Email (Email Only)
        $emailOtp = \App\Models\ContactVerification::where('channel', 'email')->where('destination', 'maria.clara@example.com')->latest('id')->first()->otp_code;
        $this->post(route('verification.email.verify'), ['verification_code' => $emailOtp])
            ->assertRedirect(route('register.security'));
        // 6. Submit Security Password & Acceptance (redirects to confirmation)
        $this->post(route('security.create'), [
            'password' => 'SuperSecret2026!',
            'password_confirmation' => 'SuperSecret2026!',
            'terms' => '1',
            'privacy_policy' => '1',
        ])->assertRedirect(route('register.confirmation'));
        // 7. View Confirmation and Complete Registration
        $this->get(route('register.confirmation'))->assertStatus(200);
        $this->post(route('register.complete'))
            ->assertRedirect(route('account.created'));
        // Assert database state
        $this->assertDatabaseHas('users', [
            'email' => 'maria.clara@example.com',
        ]);
        $user = User::where('email', 'maria.clara@example.com')->first();
        $this->assertNotNull($user);
        $this->assertNotNull($user->profile);
        $this->assertEquals('Maria', $user->profile->first_name);
        $this->assertCount(1, $user->accounts);
        $account = $user->accounts->first();
        $this->assertNotNull($account->profile);
        $this->assertEquals('Maria Clara Santos', $account->profile->legal_name);
        // Assert authenticated
        $this->assertAuthenticatedAs($user);
    }
    public function test_suffix_removal_updates_personal_account_name(): void
    {
        // 1. Submit Profile with Suffix 'Jr.'
        $this->post(route('profile.update'), [
            'first_name' => 'John Mark',
            'middle_name' => 'Panuelos',
            'last_name' => 'Torres',
            'suffix' => 'Jr.',
            'date_of_birth' => '2006-04-26',
            'gender' => 'male',
            'country' => 'Philippines',
        ])->assertRedirect(route('register.account'));
        // 2. Select Account Type (personal)
        $this->post(route('account.update'), [
            'account_type' => 'personal',
        ])->assertRedirect(route('register.personal'));
        // 3. View personal page - should show John Mark Panuelos Torres Jr.
        $res1 = $this->get(route('register.personal'));
        $res1->assertStatus(200);
        $res1->assertSee('John Mark Panuelos Torres Jr.');
        // 4. Submit personal information with the initial name
        $this->post(route('personal.update'), [
            'country' => 'Philippines',
            'purpose' => ['Other'],
            'purpose_other' => 'Personal records',
        ])->assertRedirect(route('register.contact'));
        // 5. User goes back to Step 1 and removes the suffix
        $this->post(route('profile.update'), [
            'first_name' => 'John Mark',
            'middle_name' => 'Panuelos',
            'last_name' => 'Torres',
            'suffix' => null,
            'date_of_birth' => '2006-04-26',
            'gender' => 'male',
            'country' => 'Philippines',
        ])->assertRedirect(route('register.account'));
        // 6. View personal page again - MUST reflect the removed suffix
        $res2 = $this->get(route('register.personal'));
        $res2->assertStatus(200);
        $res2->assertSee('value="John Mark Panuelos Torres"', false);
        $res2->assertDontSee('value="John Mark Panuelos Torres Jr."', false);
        // 7. Check session state
        $this->assertEquals('John Mark Panuelos Torres', session('registration.information.account_name'));
    }
}
