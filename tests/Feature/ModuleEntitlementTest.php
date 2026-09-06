<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\User;
use App\Services\EntitlementService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ModuleEntitlementTest extends TestCase
{
    use RefreshDatabase;

    protected array $modules = [
        'entity-governance',
        'compliance',
        'finance',
        'human-capital',
        'records',
        'transmittals',
    ];

    public function test_guest_is_redirected_to_login_from_all_modules(): void
    {
        foreach ($this->modules as $module) {
            $response = $this->get(route($module));
            $response->assertRedirect(route('login'));
        }
    }

    public function test_authenticated_user_in_trial_can_access_all_modules(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        session([
            'client.account_id' => $account->id,
            'client.subscription.status' => 'trial',
        ]);

        foreach ($this->modules as $module) {
            $response = $this->actingAs($user)->get(route($module));
            $response->assertStatus(200);
            $response->assertViewIs("modules.{$module}");
            $response->assertViewHas('moduleKey', $module);
            $response->assertViewHas('moduleStatus', 'trial');
            $response->assertViewHas('isAccessible', true);
            $response->assertViewHas('trialDaysRemaining');
        }
    }

    public function test_module_access_post_trial_reflects_free_and_locked_status(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        // Post-trial state: free modules selected
        session([
            'client.account_id' => $account->id,
            'client.subscription.status' => 'expired',
            'client.free_modules' => ['entity-governance', 'compliance', 'records'],
        ]);

        // Accessible free module
        $response = $this->actingAs($user)->get(route('entity-governance'));
        $response->assertStatus(200);
        $response->assertViewHas('moduleStatus', 'free');
        $response->assertViewHas('isAccessible', true);

        // Locked non-selected module
        $response = $this->actingAs($user)->get(route('finance'));
        $response->assertStatus(200);
        $response->assertViewHas('moduleStatus', 'locked');
        $response->assertViewHas('isAccessible', false);

        // Locked non-selected module
        $response = $this->actingAs($user)->get(route('human-capital'));
        $response->assertStatus(200);
        $response->assertViewHas('moduleStatus', 'locked');
        $response->assertViewHas('isAccessible', false);
    }
}
