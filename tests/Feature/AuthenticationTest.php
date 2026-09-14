<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_login_page(): void
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
        $response->assertSee('Sign in to ORDO');
        $response->assertSee('name@company.com');
        $response->assertDontSee('Demo Credentials');
    }

    public function test_root_redirects_to_login(): void
    {
        $response = $this->get('/');
        $response->assertRedirect(route('login'));
    }

    public function test_can_login_with_mockup_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'john.abalde@jknc.io',
            'password' => bcrypt('password123'),
        ]);

        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, [
            'relationship' => 'Owner',
            'is_administrator' => true,
        ]);

        $response = $this->post(route('login.submit'), [
            'email' => 'john.abalde@jknc.io',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('town-hall'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_login_with_correct_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'juan@example.com',
            'password' => 'Password123!',
        ]);

        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, [
            'relationship' => 'Owner',
            'is_administrator' => true,
        ]);

        $response = $this->post(route('login.submit'), [
            'email' => 'juan@example.com',
            'password' => 'Password123!',
        ]);

        $response->assertRedirect(route('town-hall'));
        $this->assertAuthenticatedAs($user);
        $this->assertTrue(session('client.authenticated'));
    }

    public function test_user_cannot_login_with_incorrect_password(): void
    {
        $user = User::factory()->create([
            'email' => 'juan@example.com',
            'password' => 'Password123!',
        ]);

        $response = $this->from(route('login'))->post(route('login.submit'), [
            'email' => 'juan@example.com',
            'password' => 'WrongPassword!',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_authenticated_user_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('logout'));

        $response->assertRedirect(route('login'));
        $this->assertGuest();
        $this->assertFalse(session()->has('client'));
    }

    public function test_password_reset_flow(): void
    {
        $user = User::factory()->create([
            'email' => 'resetme@example.com',
            'password' => 'OldPassword123!',
        ]);

        // 1. Request reset link
        $this->post(route('password.email'), [
            'email' => 'resetme@example.com',
        ])->assertRedirect(route('check-email', ['email' => 'resetme@example.com']));

        // 2. Submit new password
        $this->post(route('password.update'), [
            'email' => 'resetme@example.com',
            'password' => 'NewSecurePassword456!',
            'password_confirmation' => 'NewSecurePassword456!',
        ])->assertRedirect(route('login'));

        // 3. Attempt login with new password
        $this->post(route('login.submit'), [
            'email' => 'resetme@example.com',
            'password' => 'NewSecurePassword456!',
        ])->assertRedirect(route('town-hall'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_can_view_forgot_password_page(): void
    {
        $response = $this->get(route('password.request'));
        $response->assertStatus(200);
        $response->assertViewIs('auth.forgot-password');
    }

    public function test_can_view_check_email_page(): void
    {
        $response = $this->get(route('check-email', ['email' => 'test@example.com']));
        $response->assertStatus(200);
        $response->assertViewIs('auth.check-email');
        $response->assertSee('test@example.com');
    }

    public function test_can_view_reset_password_page(): void
    {
        session(['password_reset.requested' => true, 'password_reset.email' => 'user@example.com']);
        $response = $this->get(route('password.reset'));
        $response->assertStatus(200);
        $response->assertViewIs('auth.reset-password');
    }

    public function test_can_view_account_created_page(): void
    {
        $response = $this->get(route('account.created'));
        $response->assertStatus(200);
        $response->assertViewIs('auth.account-created');
        $response->assertSee('Welcome to ORDO');
    }
}
