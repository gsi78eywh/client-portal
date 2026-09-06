<?php

namespace Tests\Unit;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Services\EntitlementService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use InvalidArgumentException;
use Tests\TestCase;

class EntitlementServiceTest extends TestCase
{
    use RefreshDatabase;

    protected EntitlementService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new EntitlementService();
    }

    public function test_trial_days_remaining_default_and_calculation(): void
    {
        // Default without account or session: 30 days
        $days = $this->service->getTrialDaysRemaining();
        $this->assertEquals(30, $days);

        // Account created 10 days ago
        $account = Account::factory()->create([
            'created_at' => now()->subDays(10),
        ]);
        $days = $this->service->getTrialDaysRemaining($account);
        $this->assertEquals(20, $days);

        // Account created 35 days ago (expired)
        $expiredAccount = Account::factory()->create([
            'created_at' => now()->subDays(35),
        ]);
        $days = $this->service->getTrialDaysRemaining($expiredAccount);
        $this->assertEquals(0, $days);

        // Explicit session ends_at override
        session(['client.trial.ends_at' => now()->addDays(5)->toDateTimeString()]);
        $this->assertEquals(5, $this->service->getTrialDaysRemaining());
    }

    public function test_is_trial_active(): void
    {
        // Default state: active trial
        $this->assertTrue($this->service->isTrialActive());

        // Explicit non-trial status
        session(['client.subscription.status' => 'active_paid']);
        $this->assertFalse($this->service->isTrialActive());

        // Trial status but trial period ended
        session([
            'client.subscription.status' => 'trial',
            'client.trial.ends_at' => now()->subDay()->toDateTimeString(),
        ]);
        $this->assertFalse($this->service->isTrialActive());
    }

    public function test_module_status_during_trial(): void
    {
        session(['client.subscription.status' => 'trial']);

        foreach (array_keys(EntitlementService::MODULES) as $key) {
            $this->assertEquals('trial', $this->service->getModuleStatus($key));
            $this->assertTrue($this->service->isModuleAccessible($key));
        }

        $this->assertEquals('locked', $this->service->getModuleStatus('non-existent-module'));
        $this->assertFalse($this->service->isModuleAccessible('non-existent-module'));
    }

    public function test_module_status_post_trial_and_free_plan(): void
    {
        // Simulate expired trial
        session([
            'client.subscription.status' => 'expired',
            'client.free_modules' => ['entity-governance', 'finance'],
        ]);

        $this->assertEquals('free', $this->service->getModuleStatus('entity-governance'));
        $this->assertTrue($this->service->isModuleAccessible('entity-governance'));

        $this->assertEquals('free', $this->service->getModuleStatus('finance'));
        $this->assertTrue($this->service->isModuleAccessible('finance'));

        $this->assertEquals('locked', $this->service->getModuleStatus('compliance'));
        $this->assertFalse($this->service->isModuleAccessible('compliance'));

        $this->assertEquals('locked', $this->service->getModuleStatus('human-capital'));
        $this->assertFalse($this->service->isModuleAccessible('human-capital'));
    }

    public function test_select_free_modules_enforces_limit_and_validates(): void
    {
        // Valid 3 modules
        $result = $this->service->selectFreeModules(['records', 'compliance', 'transmittals']);
        $this->assertTrue($result);
        $this->assertEquals(['records', 'compliance', 'transmittals'], session('client.free_modules'));

        // Exceeding 3 modules throws exception
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('You can select a maximum of 3 modules');
        $this->service->selectFreeModules(['entity-governance', 'compliance', 'finance', 'records']);
    }

    public function test_select_free_modules_rejects_invalid_keys(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid module key: unknown-mod');
        $this->service->selectFreeModules(['unknown-mod']);
    }

    public function test_get_all_modules_returns_full_metadata(): void
    {
        session(['client.subscription.status' => 'trial']);

        $modules = $this->service->getAllModules();
        $this->assertCount(6, $modules);

        $this->assertArrayHasKey('entity-governance', $modules);
        $this->assertArrayHasKey('compliance', $modules);
        $this->assertArrayHasKey('finance', $modules);
        $this->assertArrayHasKey('human-capital', $modules);
        $this->assertArrayHasKey('records', $modules);
        $this->assertArrayHasKey('transmittals', $modules);

        foreach ($modules as $meta) {
            $this->assertArrayHasKey('key', $meta);
            $this->assertArrayHasKey('name', $meta);
            $this->assertArrayHasKey('category', $meta);
            $this->assertArrayHasKey('description', $meta);
            $this->assertArrayHasKey('status', $meta);
            $this->assertArrayHasKey('is_accessible', $meta);
            $this->assertTrue($meta['is_accessible']);
        }
    }

    public function test_get_usage_meters_structure(): void
    {
        $usage = $this->service->getUsageMeters();

        $this->assertArrayHasKey('records', $usage);
        $this->assertArrayHasKey('users', $usage);
        $this->assertArrayHasKey('storage', $usage);

        $this->assertEquals(76, $usage['records']['percentage']);
        $this->assertEquals(100, $usage['users']['percentage']);
        $this->assertEquals(64, $usage['storage']['percentage']);
    }

    public function test_get_setup_progress_progressive_stages(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        // Base state: Account created only (25%)
        $progress = $this->service->getSetupProgress($user, $account);
        $this->assertEquals(25, $progress['percentage']);
        $this->assertTrue($progress['steps']['account_created']['completed']);
        $this->assertFalse($progress['steps']['contact_confirmed']['completed']);
        $this->assertFalse($progress['steps']['account_profile']['completed']);
        $this->assertFalse($progress['steps']['account_verification']['completed']);

        // Stage 2: Contact confirmed (50%)
        $user->email_verified_at = now();
        $user->save();
        $progress = $this->service->getSetupProgress($user, $account);
        $this->assertEquals(50, $progress['percentage']);
        $this->assertTrue($progress['steps']['contact_confirmed']['completed']);
        $this->assertEquals('Complete Account Profile', $progress['current_action']['label']);

        // Stage 3: Account Profile completed (75%)
        AccountProfile::factory()->create([
            'account_id' => $account->id,
            'legal_name' => 'Acme Corporation',
            'tin' => '111-222-333-000',
        ]);
        $progress = $this->service->getSetupProgress($user, $account);
        $this->assertEquals(75, $progress['percentage']);
        $this->assertTrue($progress['steps']['account_profile']['completed']);
        $this->assertEquals('Submit Verification', $progress['current_action']['label']);

        // Stage 4: Verification submitted (100%)
        session(['client.verification_submitted' => true]);
        $progress = $this->service->getSetupProgress($user, $account);
        $this->assertEquals(100, $progress['percentage']);
        $this->assertTrue($progress['steps']['account_verification']['completed']);
        $this->assertEquals('Review Workspace Settings', $progress['current_action']['label']);
    }
}
