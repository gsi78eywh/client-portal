<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JkcWorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected array $jkcPages = [
        'jkc.announcements' => 'jkc/announcements',
        'jkc.engagements' => 'jkc/engagements',
        'jkc.subscriptions' => 'jkc/subscriptions',
        'jkc.support' => 'jkc/support',
        'jkc.activity-reports' => 'jkc/activity-reports',
        'jkc.billing' => 'jkc/billing',
    ];

    public function test_guest_is_redirected_to_login_from_jkc_pages(): void
    {
        foreach ($this->jkcPages as $routeName => $uri) {
            $response = $this->get(route($routeName));
            $response->assertRedirect(route('login'));
        }
    }

    public function test_authenticated_user_can_access_all_jkc_pages(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        session(['client.account_id' => $account->id]);

        foreach ($this->jkcPages as $routeName => $uri) {
            $response = $this->actingAs($user)->get(route($routeName));
            $response->assertStatus(200);
        }
    }

    public function test_subscriptions_page_receives_entitlement_and_usage_data(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        session([
            'client.account_id' => $account->id,
            'client.subscription.status' => 'trial',
        ]);

        $response = $this->actingAs($user)->get(route('jkc.subscriptions'));
        $response->assertStatus(200);
        $response->assertViewIs('jkc.subscriptions');
        $response->assertViewHas('trialDaysRemaining');
        $response->assertViewHas('modules');
        $response->assertViewHas('usage');
    }

    public function test_user_can_select_free_modules_via_settings(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        $response = $this->actingAs($user)->post(route('settings.free-modules.select'), [
            'modules' => ['entity-governance', 'finance', 'records'],
        ]);

        $response->assertRedirect(route('settings.subscription-usage'));
        $response->assertSessionHas('status', 'Free Plan modules updated successfully.');
        $this->assertEquals(['entity-governance', 'finance', 'records'], session('client.free_modules'));
    }

    public function test_user_cannot_select_more_than_3_free_modules(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        $response = $this->actingAs($user)->post(route('settings.free-modules.select'), [
            'modules' => ['entity-governance', 'finance', 'records', 'compliance'],
        ]);

        $response->assertSessionHasErrors('modules');
    }

    public function test_authenticated_user_can_submit_support_ticket(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        $response = $this->actingAs($user)->post(route('jkc.support.submit'), [
            'subject' => 'Assistance with BIR 2307 reconciliation schedule',
            'category' => 'Tax Advisory',
            'priority' => 'High',
            'message' => 'Please provide the working reconciliation schedule for Q2 2026 withholding taxes.',
        ]);

        $response->assertRedirect(route('jkc.support'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('support_tickets', [
            'subject' => 'Assistance with BIR 2307 reconciliation schedule',
            'category' => 'Tax Advisory',
            'priority' => 'High',
            'status' => 'Open',
        ]);
    }

    public function test_authenticated_user_can_download_billing_soa(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        $response = $this->actingAs($user)->get(route('jkc.billing.soa'));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/csv; charset=UTF-8');
        $this->assertStringContainsString('ORDO_Statement_of_Account_', $response->headers->get('Content-Disposition'));
    }

    public function test_announcements_can_be_searched_by_keyword(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        \App\Models\Announcement::create([
            'title' => 'Annual SEC General Information Sheet (GIS) Compliance Guidelines',
            'category' => 'SEC & Legal',
            'badge_color' => 'blue',
            'published_at' => now(),
            'is_pinned' => true,
            'read_time' => '4 min read',
            'author' => 'Atty. Carmela Santos, Senior Partner',
            'summary' => 'Mandatory compliance memorandum regarding the submission schedule for 2026 General Information Sheets.',
            'content' => 'Full memorandum text and schedule.',
        ]);

        $response = $this->actingAs($user)->get(route('jkc.announcements', ['search' => 'general information sheet']));
        $response->assertStatus(200);
        $response->assertSee('Annual SEC General Information Sheet');
    }

    public function test_engagements_can_be_filtered_by_status(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);
        session(['client.account_id' => $account->id]);

        \App\Models\Engagement::create([
            'account_id' => $account->id,
            'code' => 'ENG-2026-0041',
            'title' => 'Annual Corporate Tax Compliance & Filing Retainer',
            'category' => 'Tax Compliance',
            'lead_partner' => 'Atty. Carmela Santos, CPA',
            'period' => 'CY 2026',
            'scope' => 'Preparation and electronic filing of BIR Forms 1702-RT.',
            'progress' => 65,
            'status' => 'In Progress',
            'status_color' => 'blue',
            'deliverables' => 'Quarterly filings and finalized 2026 annual ITR.',
            'billing_ref' => 'Retainer Contract #JKC-2026-TX',
        ]);

        $response = $this->actingAs($user)->get(route('jkc.engagements', ['status' => 'in progress']));
        $response->assertStatus(200);
        $response->assertSee('ENG-2026-0041');
    }

    public function test_support_ticket_submission_validates_required_fields(): void
    {
        $user = User::factory()->create();
        $account = Account::factory()->create();
        $user->accounts()->attach($account->id, ['is_administrator' => true]);

        $response = $this->actingAs($user)->post(route('jkc.support.submit'), [
            'subject' => '',
            'category' => '',
            'message' => '',
        ]);

        $response->assertSessionHasErrors(['subject', 'category', 'message']);
    }
}

