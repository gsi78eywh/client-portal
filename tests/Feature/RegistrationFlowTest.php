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

        // 5. Submit Verification Code (correct: 123456)
        $this->post(route('verification.verify'), [
            'verification_code' => '123456',
        ])->assertRedirect(route('register.security'));

        // 6. Submit Security Password
        $this->post(route('security.create'), [
            'password' => 'SuperSecret2026!',
            'password_confirmation' => 'SuperSecret2026!',
        ])->assertRedirect(route('register.confirmation'));

        // 7. Complete Registration
        $this->post(route('confirmation.submit'))
            ->assertRedirect(route('town-hall'));

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
        $this->assertEquals('Maria Clara Santos Records', $account->profile->legal_name);

        // Assert authenticated
        $this->assertAuthenticatedAs($user);
    }
}
