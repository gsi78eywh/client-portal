<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\TransmittalRecord;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class TransmittalsWorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;
    protected Account $account;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->account = Account::factory()->create();
        $this->user->accounts()->attach($this->account->id, ['is_administrator' => true]);

        session([
            'client.account_id' => $this->account->id,
            'client.subscription.status' => 'trial',
        ]);
    }

    public function test_guest_cannot_view_transmittals_or_create_transmittal(): void
    {
        $this->get(route('transmittals'))
            ->assertRedirect(route('login'));

        $this->post(route('transmittals.store'), [
            'title' => 'Unauthorized Transmittal',
            'type' => 'Outgoing',
        ])->assertRedirect(route('login'));

        $this->get(route('settings.modules.transmittals'))
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_transmittals_dashboard(): void
    {
        $response = $this->actingAs($this->user)->get(route('transmittals'));

        $response->assertStatus(200);
        $response->assertViewIs('modules.transmittals');
        $response->assertViewHas('transmittalRecords');
        $response->assertViewHas('transmittalStats');
        $response->assertSee('+ New Transmittal');
        $response->assertSee('Configure module');
        $response->assertSee(route('settings.modules.transmittals'));
    }

    public function test_transmittals_dashboard_renders_stats_and_breakdown(): void
    {
        $response = $this->actingAs($this->user)->get(route('transmittals'));

        $response->assertStatus(200);
        // Base KPI metric cards
        $response->assertSee('28'); // Incoming
        $response->assertSee('41'); // Outgoing
        $response->assertSee('6');  // Pending Receipt
        $response->assertSee('63'); // Received

        // Delivery methods breakdown
        $response->assertSee('Electronic');
        $response->assertSee('42');
        $response->assertSee('Email');
        $response->assertSee('18');
        $response->assertSee('Courier');
        $response->assertSee('7');

        // Navigation filter tabs
        $response->assertSee('All Transmittals');
        $response->assertSee('Incoming');
        $response->assertSee('Outgoing');
        $response->assertSee('Pending');
        $response->assertSee('Archived');
    }

    public function test_validation_fails_when_required_fields_missing_on_create(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson(route('transmittals.store'), []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors([
            'type',
            'title',
            'transmittal_date',
            'sender',
            'recipient',
            'delivery_method',
        ]);
    }

    public function test_authenticated_user_can_create_transmittal_with_attachment_and_proof(): void
    {
        Storage::fake('public');

        $fakePdf = UploadedFile::fake()->create('sec_quarterly_report.pdf', 1500, 'application/pdf');
        $fakeProof = UploadedFile::fake()->create('waybill_receipt.png', 400, 'image/png');

        $payload = [
            'type' => 'Outgoing',
            'title' => 'SEC Q3 Compliance Transmittal 2026',
            'transmittal_date' => '2026-09-08',
            'sender' => 'Corporate Legal Counsel',
            'recipient' => 'Securities and Exchange Commission',
            'delivery_method' => 'Courier',
            'delivery_date' => '2026-09-10',
            'status' => 'Pending',
            'description' => 'Delivery of signed SEC quarterly governance compliance packet.',
            'notes' => 'Waybill #LBC-88910023-PH',
            'acknowledged_by' => 'SEC Receiving Desk Officer',
            'file' => $fakePdf,
            'proof_file' => $fakeProof,
        ];

        $response = $this->actingAs($this->user)
            ->postJson(route('transmittals.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        $responseData = $response->json();
        $this->assertStringContainsString('SEC Q3 Compliance Transmittal 2026', $responseData['message']);
        $this->assertNotEmpty($responseData['record']);
        $this->assertEquals('Outgoing', $responseData['record']['type']);
        $this->assertEquals('Corporate Legal Counsel', $responseData['record']['sender']);
        $this->assertEquals('Securities and Exchange Commission', $responseData['record']['recipient']);
        $this->assertEquals('Courier', $responseData['record']['delivery_method']);
        $this->assertEquals('Pending', $responseData['record']['status']);
        $this->assertStringStartsWith('TR-2026-', $responseData['record']['transmittal_no']);
        $this->assertNotEmpty($responseData['record']['attachments']);
        $this->assertNotEmpty($responseData['record']['proof_of_receipt']);

        // Verify stats incremented dynamically
        $this->assertGreaterThanOrEqual(42, $responseData['stats']['outgoing']);
        $this->assertGreaterThanOrEqual(7, $responseData['stats']['pending']);

        // Verify persistence in database
        $this->assertDatabaseHas('transmittal_records', [
            'account_id' => $this->account->id,
            'title' => 'SEC Q3 Compliance Transmittal 2026',
            'type' => 'Outgoing',
            'sender' => 'Corporate Legal Counsel',
            'recipient' => 'Securities and Exchange Commission',
            'delivery_method' => 'Courier',
            'status' => 'Pending',
        ]);
    }

    public function test_authenticated_user_can_update_transmittal_metadata(): void
    {
        // 1. Create a transmittal first
        Storage::fake('public');
        $fakePdf = UploadedFile::fake()->create('initial_contract.pdf', 800, 'application/pdf');

        $createResponse = $this->actingAs($this->user)->postJson(route('transmittals.store'), [
            'type' => 'Incoming',
            'title' => 'Bank Mandate Resolution Packet',
            'transmittal_date' => '2026-09-01',
            'sender' => 'BDO Unibank Trust Division',
            'recipient' => 'Finance Committee',
            'delivery_method' => 'Electronic',
            'status' => 'Pending',
            'file' => $fakePdf,
        ]);

        $createResponse->assertStatus(200);
        $createdId = $createResponse->json('record.id');

        // 2. Update the transmittal to Received status with acknowledgment details
        $updatePayload = [
            'type' => 'Incoming',
            'title' => 'Bank Mandate Resolution Packet - Executed & Confirmed',
            'transmittal_date' => '2026-09-01',
            'sender' => 'BDO Unibank Trust Division',
            'recipient' => 'Finance Committee & Treasury',
            'delivery_method' => 'Electronic',
            'delivery_date' => '2026-09-03',
            'status' => 'Received',
            'description' => 'All bank signing mandates acknowledged and confirmed active.',
            'notes' => 'Archived under Bank Files 2026',
            'acknowledged_by' => 'VP of Treasury',
            'acknowledged_at' => '2026-09-03 14:30:00',
        ];

        $updateResponse = $this->actingAs($this->user)
            ->postJson(route('transmittals.update', ['id' => $createdId]), $updatePayload);

        $updateResponse->assertStatus(200);
        $updateResponse->assertJson(['success' => true]);
        $this->assertStringContainsString('Bank Mandate Resolution Packet - Executed & Confirmed', $updateResponse->json('message'));

        // Verify changes in database
        $this->assertDatabaseHas('transmittal_records', [
            'id' => $createdId,
            'title' => 'Bank Mandate Resolution Packet - Executed & Confirmed',
            'recipient' => 'Finance Committee & Treasury',
            'status' => 'Received',
            'acknowledged_by' => 'VP of Treasury',
        ]);
    }

    public function test_transmittals_module_settings_page_and_update(): void
    {
        // 1. Settings page accessible
        $response = $this->actingAs($this->user)->get(route('settings.modules.transmittals'));
        $response->assertStatus(200);
        $response->assertViewIs('settings.modules.transmittals');
        $response->assertSee('TRANSMITTAL NUMBERING');
        $response->assertSee('DELIVERY / RECEIPT METHODS');
        $response->assertSee('ACKNOWLEDGMENT');
        $response->assertSee('Back to Transmittals');

        // 2. Settings update
        $settingsPayload = [
            'numbering_prefix' => 'TRM-2026',
            'auto_numbering' => '1',
            'default_method' => 'electronic',
            'proof_required' => '1',
            'require_signature' => '1',
            'archive_after_days' => '180',
            'email_notifications' => '1',
        ];

        $updateResponse = $this->actingAs($this->user)
            ->post(route('settings.modules.transmittals.update'), $settingsPayload);

        $updateResponse->assertRedirect(route('settings.modules.transmittals'));
        $updateResponse->assertSessionHas('success');

        // Verify session persistence
        $this->assertEquals('TRM-2026', session('client.settings.transmittals.numbering_prefix'));
        $this->assertEquals('electronic', session('client.settings.transmittals.default_method'));
        $this->assertEquals('180', session('client.settings.transmittals.archive_after_days'));
    }

    public function test_no_hard_delete_button_present_in_transmittals_workflow(): void
    {
        $response = $this->actingAs($this->user)->get(route('transmittals'));

        $response->assertStatus(200);
        // Ensure no delete forms or buttons exist for transmittals
        $response->assertDontSee('Delete Transmittal');
        $response->assertDontSee('btn-delete-transmittal');
        $response->assertDontSee('action="transmittals/delete"');
        $response->assertDontSee('data-action="delete"');
    }

    public function test_transmittals_kpi_cards_are_clickable_and_accessible(): void
    {
        $response = $this->actingAs($this->user)->get(route('transmittals'));

        $response->assertStatus(200);

        // 1. Check Incoming KPI card attributes
        $response->assertSee('id="kpiIncoming"', false);
        $response->assertSee("filterTransmittalsTab('Incoming', true)", false);
        $response->assertSee('aria-label="Filter incoming transmittals"', false);

        // 2. Check Outgoing KPI card attributes
        $response->assertSee('id="kpiOutgoing"', false);
        $response->assertSee("filterTransmittalsTab('Outgoing', true)", false);
        $response->assertSee('aria-label="Filter outgoing transmittals"', false);

        // 3. Check Pending receipt KPI card attributes
        $response->assertSee('id="kpiPendingReceipt"', false);
        $response->assertSee("filterTransmittalsTab('Pending', true)", false);
        $response->assertSee('aria-label="Filter pending receipt transmittals"', false);

        // 4. Check Received KPI card attributes
        $response->assertSee('id="kpiReceived"', false);
        $response->assertSee("filterTransmittalsTab('Received', true)", false);
        $response->assertSee('aria-label="Filter received transmittals"', false);

        // 5. Check interactive UI elements and badges
        $response->assertSee('id="activeFilterBadge"', false);
        $response->assertSee('id="activeFilterBadgeText"', false);
        $response->assertSee('.kpi-card:hover', false);
        $response->assertSee('.kpi-card.active-kpi', false);
    }

    public function test_editing_transmittal_status_from_pending_to_received_recalculates_kpis(): void
    {
        // First retrieve default initial stats
        $responseInitial = $this->actingAs($this->user)->get(route('transmittals'));
        $responseInitial->assertStatus(200);
        $initialStats = $responseInitial->viewData('transmittalStats');
        $this->assertEquals(6, $initialStats['pending_receipt']);
        $this->assertEquals(63, $initialStats['received']);

        // 1. Create a transmittal with Pending Receipt status
        $createRes = $this->actingAs($this->user)->postJson(route('transmittals.store'), [
            'type' => 'Incoming',
            'title' => 'Pending Shipment Invoice #INV-8821',
            'transmittal_date' => '2026-09-08',
            'sender' => 'Freight Logistics Inc.',
            'recipient' => 'Purchasing Department',
            'delivery_method' => 'Courier',
            'status' => 'Pending Receipt',
        ]);
        $createRes->assertStatus(200);
        $createdId = $createRes->json('record.id');
        $this->assertEquals(7, $createRes->json('stats.pending_receipt')); // 6 + 1 = 7

        // 2. Now edit this record to 'Received'
        $updateRes = $this->actingAs($this->user)->postJson(route('transmittals.update', ['id' => $createdId]), [
            'type' => 'Incoming',
            'title' => 'Pending Shipment Invoice #INV-8821 - Fully Acknowledged',
            'transmittal_date' => '2026-09-08',
            'sender' => 'Freight Logistics Inc.',
            'recipient' => 'Purchasing Department',
            'delivery_method' => 'Courier',
            'status' => 'Received',
            'acknowledged_by' => 'Head of Purchasing',
            'acknowledged_at' => '2026-09-08',
        ]);
        $updateRes->assertStatus(200);
        $updatedStats = $updateRes->json('stats');

        // Pending decreases back to 6 (or from 6 to 5 when existing seed record updated)
        $this->assertEquals(6, $updatedStats['pending_receipt']);
        // Received increases from 63 to 64
        $this->assertEquals(64, $updatedStats['received']);
    }

    public function test_transmittals_dashboard_supports_query_filter_parameter(): void
    {
        $responseIncoming = $this->actingAs($this->user)->get(route('transmittals', ['filter' => 'incoming']));
        $responseIncoming->assertStatus(200);
        $responseIncoming->assertViewHas('initialFilter', 'incoming');

        $responsePending = $this->actingAs($this->user)->get(route('transmittals', ['filter' => 'pending']));
        $responsePending->assertStatus(200);
        $responsePending->assertViewHas('initialFilter', 'pending');

        $responseReceived = $this->actingAs($this->user)->get(route('transmittals', ['filter' => 'received']));
        $responseReceived->assertStatus(200);
        $responseReceived->assertViewHas('initialFilter', 'received');
    }
}
