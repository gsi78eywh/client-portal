<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TownHallWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_from_town_hall(): void
    {
        $response = $this->get(route('town-hall'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_town_hall_with_dashboard_widgets(): void
    {
        $user = User::factory()->create(['name' => 'Dominic Alvarez']);
        $profile = UserProfile::factory()->create([
            'user_id' => $user->id,
            'first_name' => 'Dominic',
            'last_name' => 'Alvarez',
        ]);
        $account = Account::factory()->create(['status' => 'active']);
        $accountProfile = AccountProfile::factory()->create([
            'account_id' => $account->id,
            'legal_name' => 'Alvarez Holdings Ltd.',
        ]);
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        session([
            'client.account_id' => $account->id,
            'client.subscription.status' => 'trial',
        ]);

        $response = $this->actingAs($user)->get(route('town-hall'));

        $response->assertStatus(200);
        $response->assertViewIs('portal.town-hall');
        $response->assertViewHas('greeting');
        $response->assertViewHas('trialDaysRemaining');
        $response->assertViewHas('progress');
        $response->assertViewHas('modules');
        $response->assertViewHas('usage');

        // Verify view content contains Dominic and account
        $response->assertSee('Dominic');
        $response->assertSee('Alvarez Holdings Ltd.');
        $response->assertSee('Entity &amp; Governance', false);
        $response->assertSee('Compliance');
        $response->assertSee('Finance');
    }

    public function test_user_can_switch_accounts_and_see_updated_town_hall(): void
    {
        $user = User::factory()->create();
        $account1 = Account::factory()->create();
        $accountProfile1 = AccountProfile::factory()->create([
            'account_id' => $account1->id,
            'legal_name' => 'Alpha Operations Inc.',
        ]);

        $account2 = Account::factory()->create();
        $accountProfile2 = AccountProfile::factory()->create([
            'account_id' => $account2->id,
            'legal_name' => 'Beta Logistics Corp.',
        ]);

        $user->accounts()->attach($account1->id, ['is_administrator' => true]);
        $user->accounts()->attach($account2->id, ['is_administrator' => true]);

        // Start with account 1
        $this->actingAs($user)->get(route('town-hall'));
        $this->assertEquals($account1->id, session('client.account_id'));

        // Switch to account 2
        $switchResponse = $this->actingAs($user)->post(route('settings.switch-account.post', $account2->id));
        $switchResponse->assertRedirect();
        $this->assertEquals($account2->id, session('client.account_id'));
        $this->assertEquals('Beta Logistics Corp.', session('client.account.name'));

        // Town Hall now displays Beta Logistics Corp.
        $townHallResponse = $this->actingAs($user)->get(route('town-hall'));
        $townHallResponse->assertStatus(200);
        $townHallResponse->assertSee('Beta Logistics Corp.');
    }

    public function test_user_cannot_switch_to_account_they_do_not_belong_to(): void
    {
        $user = User::factory()->create();
        $unauthorizedAccount = Account::factory()->create();

        $response = $this->actingAs($user)->post(route('settings.switch-account.post', $unauthorizedAccount->id));
        $response->assertStatus(403);
    }

    public function test_user_can_switch_lifecycle_state_and_see_updated_town_hall(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create(['status' => 'active']);
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        // 1. Switch to Free Plan
        $res = $this->actingAs($user)->post(route('portal.set-state'), ['state' => 'free']);
        $res->assertSessionHas('client.subscription.status', 'free');

        $thRes = $this->actingAs($user)->get(route('town-hall'));
        $thRes->assertStatus(200);
        $thRes->assertSee('ORDO Free Plan');
        $thRes->assertSee('Free Plan');

        // 2. Switch to Limited Access
        $res2 = $this->actingAs($user)->post(route('portal.set-state'), ['state' => 'limited']);
        $res2->assertSessionHas('client.subscription.status', 'limited');

        $thRes2 = $this->actingAs($user)->get(route('town-hall'));
        $thRes2->assertStatus(200);
        $thRes2->assertSee('Limited Access');

        // 3. Switch to Paid
        $res3 = $this->actingAs($user)->post(route('portal.set-state'), ['state' => 'paid']);
        $res3->assertSessionHas('client.subscription.status', 'paid');

        $thRes3 = $this->actingAs($user)->get(route('town-hall'));
        $thRes3->assertStatus(200);
        $thRes3->assertSee('ORDO Business');
    }

    public function test_simulate_verification_approval_advances_setup_progress(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create(['status' => 'active']);
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        $res = $this->actingAs($user)->post(route('portal.simulate-verification'));
        $res->assertSessionHas('client.verification_submitted', true);

        $thRes = $this->actingAs($user)->get(route('town-hall'));
        $thRes->assertStatus(200);
        $thRes->assertSee('Verified');
    }

    public function test_user_can_select_custom_free_modules(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create(['status' => 'active']);
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        $res = $this->actingAs($user)->post(route('portal.select-free-modules'), [
            'modules' => ['records', 'finance', 'transmittals'],
        ]);
        $res->assertSessionHas('client.free_modules', ['records', 'finance', 'transmittals']);

        // Over-limit selection (>3) fails validation
        $failRes = $this->actingAs($user)->post(route('portal.select-free-modules'), [
            'modules' => ['records', 'finance', 'transmittals', 'compliance'],
        ]);
        $failRes->assertSessionHasErrors('modules');
    }
}
