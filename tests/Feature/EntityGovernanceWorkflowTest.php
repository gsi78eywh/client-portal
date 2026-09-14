<?php
namespace Tests\Feature;
use App\Models\Account;
use App\Models\GovernanceRecord;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
class EntityGovernanceWorkflowTest extends TestCase
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
    public function test_guest_cannot_view_entity_governance_or_create_records(): void
    {
        $this->get(route('entity-governance'))
            ->assertRedirect(route('login'));
        $this->post(route('entity-governance.store'), [
            'record_type' => 'entity_profile',
            'title' => 'Guest Corporation',
        ])->assertRedirect(route('login'));
    }
    public function test_authenticated_user_can_view_entity_governance_page(): void
    {
        $response = $this->actingAs($this->user)->get(route('entity-governance'));
        $response->assertStatus(200);
        $response->assertViewIs('modules.entity-governance');
        $response->assertViewHas('governanceRecords');
        $response->assertViewHas('governanceStats');
        $response->assertSee('Configure module');
        $response->assertSee(route('settings.modules.entity-governance'));
    }
    public function test_validation_fails_when_required_fields_are_missing(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson(route('entity-governance.store'), []);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['record_type', 'title', 'category', 'record_date', 'status']);
    }
    public function test_can_create_entity_profile_record_via_ajax_and_persists_to_account(): void
    {
        $payload = [
            'record_type' => 'entity_profile',
            'title' => 'Apex Holdings Philippines Inc.',
            'category' => 'Domestic Corporation',
            'record_date' => '2026-01-15',
            'status' => 'Active',
            'description' => 'Parent holding entity registered with SEC Manila.',
            'tax_id' => '009-882-104-000',
            'sec_reg_no' => 'CS2026-08129',
            'jurisdiction' => 'Philippines - NCR',
            'incorporation_date' => '2026-01-15',
        ];
        $response = $this->actingAs($this->user)
            ->postJson(route('entity-governance.store'), $payload);
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.record_type', 'entity_profile');
        $response->assertJsonPath('record.title', 'Apex Holdings Philippines Inc.');
        $response->assertJsonPath('record.category', 'Domestic Corporation');
        $response->assertJsonPath('record.status', 'Active');
        $response->assertJsonPath('record.metadata.tax_id', '009-882-104-000');
        $response->assertJsonPath('record.metadata.sec_reg_no', 'CS2026-08129');
        // Verify reference starts with EP-
        $reference = $response->json('record.reference_no');
        $this->assertStringStartsWith('EP-', $reference);
        // Verify in database associated with active account
        $this->assertDatabaseHas('governance_records', [
            'account_id' => $this->account->id,
            'record_type' => 'entity_profile',
            'title' => 'Apex Holdings Philippines Inc.',
            'status' => 'Active',
            'reference_no' => $reference,
        ]);
        // Verify appears in view
        $viewResponse = $this->actingAs($this->user)->get(route('entity-governance'));
        $viewResponse->assertSee('Apex Holdings Philippines Inc.');
        $viewResponse->assertSee($reference);
    }
    public function test_can_create_director_officer_record_via_ajax_with_attachment(): void
    {
        Storage::fake('public');
        $file = UploadedFile::fake()->create('board_appointment_sec.pdf', 300, 'application/pdf');
        $payload = [
            'record_type' => 'director_officer',
            'title' => 'Atty. Maria Lourdes Santos',
            'category' => 'Corporate Secretary',
            'record_date' => '2026-03-01',
            'status' => 'Active',
            'description' => 'Elected Corporate Secretary for Term 2026-2027.',
            'position' => 'Corporate Secretary & Compliance Officer',
            'appointment_date' => '2026-03-01',
            'term_expiration' => '2027-03-01',
            'tin' => '123-456-789-000',
            'nationality' => 'Filipino',
            'attachment' => $file,
        ];
        $response = $this->actingAs($this->user)
            ->postJson(route('entity-governance.store'), $payload);
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.record_type', 'director_officer');
        $response->assertJsonPath('record.title', 'Atty. Maria Lourdes Santos');
        $response->assertJsonPath('record.attachment_name', 'board_appointment_sec.pdf');
        $response->assertJsonPath('record.metadata.position', 'Corporate Secretary & Compliance Officer');
        $reference = $response->json('record.reference_no');
        $this->assertStringStartsWith('DO-', $reference);
        $this->assertDatabaseHas('governance_records', [
            'account_id' => $this->account->id,
            'record_type' => 'director_officer',
            'title' => 'Atty. Maria Lourdes Santos',
            'attachment_name' => 'board_appointment_sec.pdf',
        ]);
    }
    public function test_can_create_resolution_record(): void
    {
        $payload = [
            'record_type' => 'resolution',
            'title' => 'BR-2026-004 Authorization for BDO Banking Facility',
            'category' => 'Board Resolution',
            'record_date' => '2026-05-10',
            'status' => 'Approved',
            'description' => 'Unanimously approved credit facility with BDO Unibank.',
            'resolution_no' => 'BR-2026-004',
            'adoption_date' => '2026-05-10',
            'vote_result' => 'Unanimous (5-0)',
        ];
        $response = $this->actingAs($this->user)
            ->postJson(route('entity-governance.store'), $payload);
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.record_type', 'resolution');
        $response->assertJsonPath('record.title', 'BR-2026-004 Authorization for BDO Banking Facility');
        $response->assertJsonPath('record.metadata.resolution_no', 'BR-2026-004');
        $reference = $response->json('record.reference_no');
        $this->assertStringStartsWith('BR-', $reference);
        $this->assertDatabaseHas('governance_records', [
            'account_id' => $this->account->id,
            'record_type' => 'resolution',
            'status' => 'Approved',
        ]);
    }
    public function test_can_create_ownership_record(): void
    {
        $payload = [
            'record_type' => 'ownership',
            'title' => 'Mendoza Family Holdings Corp.',
            'category' => 'Common Shares',
            'record_date' => '2026-01-20',
            'status' => 'Active',
            'description' => 'Fully paid common share subscription.',
            'metadata' => [
                'shareholder_type' => 'Corporate / Institutional',
                'share_count' => '650,000',
                'ownership_percentage' => '65.00%',
                'certificate_no' => 'CERT-0001',
            ],
        ];
        $response = $this->actingAs($this->user)
            ->postJson(route('entity-governance.store'), $payload);
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.record_type', 'ownership');
        $response->assertJsonPath('record.title', 'Mendoza Family Holdings Corp.');
        $response->assertJsonPath('record.metadata.share_count', '650,000');
        $response->assertJsonPath('record.metadata.ownership_percentage', '65.00%');
        $reference = $response->json('record.reference_no');
        $this->assertStringStartsWith('OWN-', $reference);
        $this->assertDatabaseHas('governance_records', [
            'account_id' => $this->account->id,
            'record_type' => 'ownership',
            'title' => 'Mendoza Family Holdings Corp.',
        ]);
    }
    public function test_can_create_meeting_record(): void
    {
        $payload = [
            'record_type' => 'meeting',
            'title' => '2026 Annual General Stockholders Meeting',
            'category' => 'Annual Stockholders Meeting',
            'record_date' => '2026-04-15',
            'status' => 'Completed',
            'description' => 'Annual meeting electing 2026-2027 board and reviewing audited financial statements.',
            'metadata' => [
                'meeting_time' => '02:00 PM PST',
                'location' => 'Main Ballroom, Shangri-La The Fort & Hybrid Zoom',
                'presiding_officer' => 'Chairman Carlos Mendoza',
                'quorum' => '94.5% of outstanding shares represented',
            ],
        ];
        $response = $this->actingAs($this->user)
            ->postJson(route('entity-governance.store'), $payload);
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.record_type', 'meeting');
        $response->assertJsonPath('record.title', '2026 Annual General Stockholders Meeting');
        $response->assertJsonPath('record.metadata.location', 'Main Ballroom, Shangri-La The Fort & Hybrid Zoom');
        $reference = $response->json('record.reference_no');
        $this->assertStringStartsWith('MIN-', $reference);
        $this->assertDatabaseHas('governance_records', [
            'account_id' => $this->account->id,
            'record_type' => 'meeting',
            'title' => '2026 Annual General Stockholders Meeting',
        ]);
    }
    public function test_can_create_corporate_record_via_standard_form_post(): void
    {
        $payload = [
            'record_type' => 'corporate_record',
            'title' => 'Amended Articles of Incorporation 2026',
            'category' => 'Articles of Incorporation',
            'record_date' => '2026-02-20',
            'status' => 'Filed',
            'description' => 'SEC certified amended AOI reflecting increased capital.',
            'document_type' => 'Amended AOI',
            'filing_agency' => 'Securities and Exchange Commission',
            'filing_date' => '2026-02-20',
        ];
        $response = $this->actingAs($this->user)
            ->post(route('entity-governance.store'), $payload);
        $response->assertRedirect(route('entity-governance'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('governance_records', [
            'account_id' => $this->account->id,
            'record_type' => 'corporate_record',
            'title' => 'Amended Articles of Incorporation 2026',
            'status' => 'Filed',
        ]);
    }
    public function test_can_update_governance_record_and_persists_to_account(): void
    {
        $record = GovernanceRecord::create([
            'account_id' => $this->account->id,
            'user_id' => $this->user->id,
            'reference_no' => 'EP-00101',
            'record_type' => 'entity_profile',
            'title' => 'Apex Pacific Trading Corp.',
            'category' => 'Domestic Corporation',
            'record_date' => '2026-01-10',
            'status' => 'Pending Action',
            'description' => 'Awaiting secondary license release.',
            'metadata' => ['tax_id' => '111-222-333'],
        ]);
        $updatePayload = [
            'record_type' => 'entity_profile',
            'title' => 'Apex Pacific Trading Corp. (Licensed)',
            'category' => 'Domestic Corporation',
            'record_date' => '2026-01-10',
            'status' => 'Active',
            'description' => 'Secondary license granted and certified by SEC.',
            'tax_id' => '111-222-333-000',
            'sec_reg_no' => 'CS2026-99120',
            'jurisdiction' => 'Philippines',
            'incorporation_date' => '2026-01-10',
        ];
        $response = $this->actingAs($this->user)
            ->putJson(route('entity-governance.update', $record->id), $updatePayload);
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'record' => [
                'id' => $record->id,
                'title' => 'Apex Pacific Trading Corp. (Licensed)',
                'status' => 'Active',
            ],
        ]);
        $this->assertDatabaseHas('governance_records', [
            'id' => $record->id,
            'account_id' => $this->account->id,
            'title' => 'Apex Pacific Trading Corp. (Licensed)',
            'status' => 'Active',
        ]);
        $viewResponse = $this->actingAs($this->user)->get(route('entity-governance'));
        $viewResponse->assertSee('Apex Pacific Trading Corp. (Licensed)');
    }
    public function test_entity_governance_ui_has_single_top_button_edit_action_and_no_delete_button(): void
    {
        $response = $this->actingAs($this->user)->get(route('entity-governance'));
        $response->assertStatus(200);
        // 1. Single top button renamed to "+ New Governance Record"
        $response->assertSee('New Governance Record');
        // 2. Duplicate "+ New Entry" button in records section header is removed
        $response->assertDontSee('+ New Entry');
        // 3. Detail modal has Edit action
        $response->assertSee('btnEditGovFromDetail');
        $response->assertSee('editGovernanceRecordFromDetail');
        // 4. Strictly no Delete button
        $response->assertDontSee('btnDeleteGovernance');
        $response->assertDontSee('Delete Record');
        $response->assertDontSee('Delete Entry');
        $response->assertDontSee('btnDeleteGov');
    }
    public function test_record_type_selection_options_rendered_in_modal(): void
    {
        $response = $this->actingAs($this->user)->get(route('entity-governance'));
        $response->assertStatus(200);
        // Verify the 6 record types are rendered in the selection stage
        $response->assertSee('Entity Profile');
        $response->assertSee('Director / Officer');
        $response->assertSee('Ownership Record');
        $response->assertSee('Meeting');
        $response->assertSee('Resolution');
        $response->assertSee('Corporate Record');
    }
    public function test_kpi_metric_cards_rendered_with_interactive_attributes_and_onclick_handlers(): void
    {
        $response = $this->actingAs($this->user)->get(route('entity-governance'));
        $response->assertStatus(200);
        // 1. Active Entities KPI Card
        $response->assertSee('id="kpiActiveEntities"', false);
        $response->assertSee("onclick=\"handleKpiCardClick('active_entities')\"", false);
        $response->assertSee('id="statActiveEntities"', false);
        $response->assertSee('Active entities');
        // 2. Directors & Officers KPI Card
        $response->assertSee('id="kpiDirectors"', false);
        $response->assertSee("onclick=\"handleKpiCardClick('directors_officers')\"", false);
        $response->assertSee('id="statDirectors"', false);
        $response->assertSee('Directors &amp; officers', false);
        // 3. Pending Actions KPI Card
        $response->assertSee('id="kpiPendingActions"', false);
        $response->assertSee("onclick=\"handleKpiCardClick('pending_actions')\"", false);
        $response->assertSee('id="statPendingActions"', false);
        $response->assertSee('Pending actions');
        // 4. Governance Records KPI Card
        $response->assertSee('id="kpiTotalRecords"', false);
        $response->assertSee("onclick=\"handleKpiCardClick('governance_records')\"", false);
        $response->assertSee('id="statTotalRecords"', false);
        $response->assertSee('Governance records');
        // 5. Workspace target and filter badge
        $response->assertSee('id="governanceWorkspace"', false);
        $response->assertSee('id="govActiveFilterBadge"', false);
        $response->assertSee('id="govActiveFilterLabel"', false);
        $response->assertSee('filterTableByPendingActions');
    }
    public function test_kpi_counts_update_dynamically_when_record_is_created_or_updated(): void
    {
        // Initial state
        $initialResponse = $this->actingAs($this->user)->get(route('entity-governance'));
        $initialStats = $initialResponse->viewData('governanceStats');
        $initialDirectors = $initialStats['directors_officers'] ?? 0;
        $initialPending = $initialStats['pending_actions'] ?? 0;
        $initialTotal = $initialStats['governance_records'] ?? 0;
        // 1. Add new Director & Officer record
        $createDirectorResponse = $this->actingAs($this->user)->postJson(route('entity-governance.store'), [
            'record_type' => 'director_officer',
            'title' => 'Maria Santos - Corporate Secretary',
            'category' => 'Corporate Secretary',
            'record_date' => '2026-03-01',
            'status' => 'Active',
            'description' => 'Newly elected corporate secretary.',
            'nationality' => 'Filipino',
        ]);
        $createDirectorResponse->assertStatus(200);
        $createDirectorResponse->assertJsonPath('stats.directors_officers', $initialDirectors + 1);
        $createDirectorResponse->assertJsonPath('stats.governance_records', $initialTotal + 1);
        // 2. Add pending action record (e.g. pending meeting or resolution)
        $createPendingResponse = $this->actingAs($this->user)->postJson(route('entity-governance.store'), [
            'record_type' => 'resolution',
            'title' => 'Resolution 2026-04 - Bank Signatory Update',
            'category' => 'Board Resolution',
            'record_date' => '2026-04-10',
            'status' => 'For Review',
            'description' => 'Pending signature and board ratification.',
        ]);
        $createPendingResponse->assertStatus(200);
        $pendingRecordId = $createPendingResponse->json('record.id');
        $this->assertEquals($initialPending + 1, $createPendingResponse->json('stats.pending_actions'));
        // 3. Update pending resolution to 'Approved' (resolving the pending action)
        $updateResponse = $this->actingAs($this->user)->putJson(route('entity-governance.update', $pendingRecordId), [
            'record_type' => 'resolution',
            'title' => 'Resolution 2026-04 - Bank Signatory Update (Approved)',
            'category' => 'Board Resolution',
            'record_date' => '2026-04-10',
            'status' => 'Approved',
            'description' => 'Fully ratified by the board.',
        ]);
        $updateResponse->assertStatus(200);
        $updateResponse->assertJsonPath('stats.pending_actions', $initialPending);
    }
}
