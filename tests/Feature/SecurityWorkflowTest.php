<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class SecurityWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_from_security_settings(): void
    {
        $response = $this->get(route('settings.security'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_security_settings(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        session(['client.account_id' => $account->id]);

        $response = $this->actingAs($user)->get(route('settings.security'));

        $response->assertStatus(200);
        $response->assertViewIs('settings.security');
        $response->assertViewHas('twoFactorEnabled');
        $response->assertViewHas('sessions');
        $response->assertViewHas('activityLogs');
        $response->assertSee('Change Password');
        $response->assertSee('Two-Factor Authentication (2FA)');
        $response->assertSee('Active Browser Sessions');
    }

    public function test_user_can_update_password_with_valid_current_password(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('OldPassword123!'),
        ]);

        $response = $this->actingAs($user)->post(route('settings.security.update'), [
            'current_password' => 'OldPassword123!',
            'password' => 'NewSecurePass456!',
            'password_confirmation' => 'NewSecurePass456!',
        ]);

        $response->assertRedirect(route('settings.security'));
        $response->assertSessionHas('status', 'Password changed successfully.');

        $user->refresh();
        $this->assertTrue(Hash::check('NewSecurePass456!', $user->password));
    }

    public function test_user_cannot_update_password_with_wrong_current_password(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('ActualPassword123!'),
        ]);

        $response = $this->actingAs($user)->post(route('settings.security.update'), [
            'current_password' => 'WrongPassword999!',
            'password' => 'NewSecurePass456!',
            'password_confirmation' => 'NewSecurePass456!',
        ]);

        $response->assertSessionHasErrors('current_password');

        $user->refresh();
        $this->assertTrue(Hash::check('ActualPassword123!', $user->password));
    }

    public function test_user_cannot_update_password_with_unconfirmed_or_short_password(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('ActualPassword123!'),
        ]);

        // Mismatched confirmation
        $response = $this->actingAs($user)->post(route('settings.security.update'), [
            'current_password' => 'ActualPassword123!',
            'password' => 'NewSecurePass456!',
            'password_confirmation' => 'MismatchedPass789!',
        ]);
        $response->assertSessionHasErrors('password');

        // Shorter than 8 chars
        $response = $this->actingAs($user)->post(route('settings.security.update'), [
            'current_password' => 'ActualPassword123!',
            'password' => 'short1!',
            'password_confirmation' => 'short1!',
        ]);
        $response->assertSessionHasErrors('password');
    }

    public function test_user_can_toggle_two_factor_authentication(): void
    {
        $user = User::factory()->create();

        // Enable 2FA
        $response = $this->actingAs($user)->post(route('settings.security.two-factor'), [
            'enabled' => 1,
        ]);
        $response->assertRedirect(route('settings.security'));
        $response->assertSessionHas('status', 'Two-Factor Authentication enabled successfully.');
        $this->assertTrue(session('security.2fa_enabled'));

        // Disable 2FA
        $response = $this->actingAs($user)->post(route('settings.security.two-factor'), [
            'enabled' => 0,
        ]);
        $response->assertRedirect(route('settings.security'));
        $response->assertSessionHas('status', 'Two-Factor Authentication disabled.');
        $this->assertFalse(session('security.2fa_enabled'));
    }

    public function test_user_can_revoke_other_sessions(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('settings.security.revoke-sessions'));
        $response->assertRedirect(route('settings.security'));
        $response->assertSessionHas('status', 'All other active browser sessions have been signed out.');
    }
}
