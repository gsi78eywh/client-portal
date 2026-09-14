<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\ComplianceRecord;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ComplianceWorkflowTest extends TestCase
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

    public function test_guest_cannot_view_compliance_or_create_records(): void
    {
        $this->get(route('compliance'))
            ->assertRedirect(route('login'));

        $this->post(route('compliance.store'), [
            'title' => 'Test Requirement',
        ])->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_compliance_page(): void
    {
        $response = $this->actingAs($this->user)->get(route('compliance'));

        $response->assertStatus(200);
        $response->assertViewIs('modules.compliance');
        $response->assertViewHas('complianceRecords');
        $response->assertViewHas('complianceStats');
        $response->assertSee('Configure module');
        $response->assertSee(route('settings.modules.compliance'));
    }

    public function test_validation_fails_when_required_fields_are_missing(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson(route('compliance.store'), []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['title', 'agency', 'category', 'due_date', 'status']);
    }

    public function test_can_create_compliance_record_via_ajax_and_persists_to_account(): void
    {
        Storage::fake('public');
        $file = UploadedFile::fake()->create('sec_advisory.pdf', 500, 'application/pdf');

        $payload = [
            'title' => 'Annual Anti-Money Laundering Compliance Report',
            'agency' => 'SEC',
            'category' => 'Corporate Filing',
            'frequency' => 'Annually',
            'effective_date' => '2026-01-01',
            'due_date' => '2026-10-31',
            'responsible_person' => 'Atty. Carmela Santos, CPA',
            'status' => 'Due Soon',
            'description' => 'Mandatory annual AML risk assessment filing.',
            'attachment' => $file,
        ];

        $response = $this->actingAs($this->user)
            ->postJson(route('compliance.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.title', 'Annual Anti-Money Laundering Compliance Report');
        $response->assertJsonPath('record.agency', 'SEC');
        $response->assertJsonPath('record.status', 'Due Soon');
        $response->assertJsonPath('record.attachment_name', 'sec_advisory.pdf');

        // Verify record in database associated with active account
        $this->assertDatabaseHas('compliance_records', [
            'account_id' => $this->account->id,
            'title' => 'Annual Anti-Money Laundering Compliance Report',
            'agency' => 'SEC',
            'status' => 'Due Soon',
            'attachment_name' => 'sec_advisory.pdf',
        ]);

        // Verify it appears in subsequent page view
        $viewResponse = $this->actingAs($this->user)->get(route('compliance'));
        $viewResponse->assertSee('Annual Anti-Money Laundering Compliance Report');
        $viewResponse->assertSee('CMP-00125');
    }

    public function test_can_create_compliance_record_via_standard_form_post(): void
    {
        $payload = [
            'title' => 'Annual Fire Safety Inspection Certificate',
            'agency' => 'LGU',
            'category' => 'Business Permit',
            'frequency' => 'Annually',
            'effective_date' => '2026-02-01',
            'due_date' => '2026-12-15',
            'responsible_person' => 'Admin Officer',
            'status' => 'Scheduled',
            'description' => 'LGU BFP annual inspection clearance.',
        ];

        $response = $this->actingAs($this->user)
            ->post(route('compliance.store'), $payload);

        $response->assertRedirect(route('compliance'));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('compliance_records', [
            'account_id' => $this->account->id,
            'title' => 'Annual Fire Safety Inspection Certificate',
            'agency' => 'LGU',
            'status' => 'Scheduled',
        ]);
    }

    public function test_can_update_compliance_record_and_persists_to_account(): void
    {
        $record = ComplianceRecord::create([
            'account_id' => $this->account->id,
            'user_id' => $this->user->id,
            'reference_no' => 'CMP-00125',
            'title' => 'Initial Requirement Title',
            'agency' => 'BIR',
            'category' => 'Tax Filing',
            'frequency' => 'Monthly',
            'effective_date' => '2026-01-01',
            'due_date' => '2026-05-15',
            'responsible_person' => 'Tax Associate',
            'status' => 'Scheduled',
            'description' => 'Initial notes',
        ]);

        $updatePayload = [
            'title' => 'Updated Requirement Title - Expanded Scope',
            'agency' => 'BIR',
            'category' => 'Tax Filing',
            'frequency' => 'Quarterly',
            'effective_date' => '2026-02-01',
            'due_date' => '2026-06-20',
            'responsible_person' => 'Senior Tax Partner',
            'status' => 'Due Soon',
            'description' => 'Updated description with filing guidelines.',
        ];

        $response = $this->actingAs($this->user)
            ->putJson(route('compliance.update', $record->id), $updatePayload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'record' => [
                'id' => $record->id,
                'title' => 'Updated Requirement Title - Expanded Scope',
                'status' => 'Due Soon',
                'responsible_person' => 'Senior Tax Partner',
            ],
        ]);

        $this->assertDatabaseHas('compliance_records', [
            'id' => $record->id,
            'account_id' => $this->account->id,
            'title' => 'Updated Requirement Title - Expanded Scope',
            'frequency' => 'Quarterly',
            'status' => 'Due Soon',
            'responsible_person' => 'Senior Tax Partner',
        ]);

        // Verify page displays updated title
        $viewResponse = $this->actingAs($this->user)->get(route('compliance'));
        $viewResponse->assertSee('Updated Requirement Title - Expanded Scope');
    }

    public function test_compliance_ui_has_renamed_button_edit_action_and_no_delete_button(): void
    {
        $response = $this->actingAs($this->user)->get(route('compliance'));
        $response->assertStatus(200);

        // 1. Top button is renamed to "+ New Compliance Requirement"
        $response->assertSee('New Compliance Requirement');

        // 2. Duplicate "+ New Entry" button in records section header is removed
        $response->assertDontSee('+ New Entry');

        // 3. Detail modal has Edit action
        $response->assertSee('btnEditFromDetail');
        $response->assertSee('editComplianceRecordFromDetail');

        // 4. Strictly no Delete button
        $response->assertDontSee('btnDeleteCompliance');
        $response->assertDontSee('Delete Requirement');
        $response->assertDontSee('Delete Entry');
    }
}
