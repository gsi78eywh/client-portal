<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_from_settings(): void
    {
        $response = $this->get(route('settings'));
        $response->assertRedirect(route('login'));

        $response = $this->get(route('settings.my-account'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_settings_hub(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('settings'));
        $response->assertStatus(200);
        $response->assertViewIs('settings.index');
    }

    public function test_user_can_update_personal_profile(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('settings.my-account.update'), [
            'first_name' => 'Alexander',
            'middle_name' => 'G.',
            'last_name' => 'Bell',
            'suffix' => 'Sr.',
            'date_of_birth' => '1985-03-03',
            'gender' => 'male',
            'country_region' => 'Philippines',
            'mobile_number' => '+639198887766',
        ]);

        $response->assertRedirect(route('settings.my-account'));
        $response->assertSessionHas('status', 'Personal profile updated successfully.');

        $this->assertDatabaseHas('user_profiles', [
            'user_id' => $user->id,
            'first_name' => 'Alexander',
            'last_name' => 'Bell',
            'mobile_number' => '+639198887766',
        ]);

        $this->assertEquals('Alexander', session('client.user.first_name'));
        $this->assertEquals('Bell', session('client.user.last_name'));
    }

    public function test_user_can_update_account_profile(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        session(['client.account_id' => $account->id]);

        $response = $this->actingAs($user)->post(route('settings.account-profile.update'), [
            'legal_name' => 'Global Vanguard Corp.',
            'trade_name' => 'Vanguard',
            'tin' => '123-456-789-000',
            'account_type' => 'Corporation',
        ]);

        $response->assertRedirect(route('settings.account-profile'));
        $response->assertSessionHas('status', 'Account profile updated successfully.');

        $this->assertDatabaseHas('account_profiles', [
            'account_id' => $account->id,
            'legal_name' => 'Global Vanguard Corp.',
            'tin' => '123-456-789-000',
        ]);

        $this->assertEquals('Global Vanguard Corp.', session('client.account.name'));
    }
}
