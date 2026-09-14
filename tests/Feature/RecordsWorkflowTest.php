<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\DocumentRecord;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class RecordsWorkflowTest extends TestCase
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

    public function test_guest_cannot_view_records_or_upload_record(): void
    {
        $this->get(route('records'))
            ->assertRedirect(route('login'));

        $this->post(route('records.store'), [
            'title' => 'Unauthorized Document',
            'classification' => 'Corporate Records',
        ])->assertRedirect(route('login'));

        $this->get(route('settings.modules.records'))
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_records_dashboard(): void
    {
        $response = $this->actingAs($this->user)->get(route('records'));

        $response->assertStatus(200);
        $response->assertViewIs('modules.records');
        $response->assertViewHas('documentRecords');
        $response->assertViewHas('recordStats');
        $response->assertSee('Upload Record');
        $response->assertSee('Configure module');
        $response->assertSee(route('settings.modules.records'));
    }

    public function test_records_dashboard_renders_stats_and_breakdown(): void
    {
        $response = $this->actingAs($this->user)->get(route('records'));

        $response->assertStatus(200);
        $response->assertSee('1,248'); // Total records
        $response->assertSee('36');    // Recent records
        $response->assertSee('320 MB'); // Storage used
        $response->assertSee('12');    // Classifications
        $response->assertSee('Corporate Records');
        $response->assertSee('Compliance Records');
        $response->assertSee('Finance Records');
        $response->assertSee('Human Resources');
    }

    public function test_validation_fails_when_required_fields_missing_on_upload(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson(route('records.store'), []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['title', 'classification', 'file']);
    }

    public function test_authenticated_user_can_upload_record_with_ocr_simulation(): void
    {
        Storage::fake('public');

        $fakePdf = UploadedFile::fake()->create('sec_registration_certificate.pdf', 1200, 'application/pdf');

        $payload = [
            'title' => 'SEC Certificate of Registration 2026',
            'classification' => 'Corporate Records',
            'subclass' => 'Registration Certificate',
            'source' => 'SEC',
            'document_number' => 'SEC-CR-2026-0099',
            'record_date' => '2026-08-20',
            'status' => 'Active',
            'description' => 'Official certificate of registration under revised corporation code.',
            'tags' => 'SEC, Registration, Corporate, 2026',
            'file' => $fakePdf,
        ];

        $response = $this->actingAs($this->user)
            ->postJson(route('records.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        $responseData = $response->json();
        $this->assertStringContainsString('SEC Certificate of Registration 2026', $responseData['message']);
        $this->assertNotEmpty($responseData['record']);
        $this->assertEquals('Corporate Records', $responseData['record']['classification']);
        $this->assertEquals('Indexed & Processed', $responseData['record']['ocr_status']);
        $this->assertStringStartsWith('REC-2026-', $responseData['record']['record_no']);

        // Verify stats incremented dynamically
        $this->assertGreaterThanOrEqual(1249, $responseData['stats']['total_records_raw']);
        $this->assertGreaterThanOrEqual(37, $responseData['stats']['recent_records_raw']);

        // Verify persistence in database
        $this->assertDatabaseHas('document_records', [
            'account_id' => $this->account->id,
            'title' => 'SEC Certificate of Registration 2026',
            'classification' => 'Corporate Records',
            'ocr_status' => 'Indexed & Processed',
        ]);
    }

    public function test_authenticated_user_can_update_record_metadata(): void
    {
        // First upload or seed a record
        Storage::fake('public');
        $fakeFile = UploadedFile::fake()->create('contract.pdf', 600, 'application/pdf');

        $createResponse = $this->actingAs($this->user)->postJson(route('records.store'), [
            'title' => 'Master Services Agreement',
            'classification' => 'Corporate Records',
            'file' => $fakeFile,
            'status' => 'Active',
        ]);

        $createdId = $createResponse->json('record.id');

        // Update record metadata
        $updatePayload = [
            'title' => 'Master Services Agreement - Executed Final',
            'classification' => 'Legal',
            'subclass' => 'Commercial Contract',
            'source' => 'Legal Counsel',
            'document_number' => 'MSA-2026-FINAL',
            'record_date' => '2026-08-25',
            'status' => 'Active',
            'description' => 'Fully executed and countersigned MSA agreement.',
            'tags' => 'Legal, MSA, Executed',
        ];

        $updateResponse = $this->actingAs($this->user)
            ->postJson(route('records.update', ['id' => $createdId]), $updatePayload);

        $updateResponse->assertStatus(200);
        $updateResponse->assertJson(['success' => true]);
        $this->assertStringContainsString('Master Services Agreement - Executed Final', $updateResponse->json('message'));

        $this->assertDatabaseHas('document_records', [
            'id' => $createdId,
            'title' => 'Master Services Agreement - Executed Final',
            'classification' => 'Legal',
            'subclass' => 'Commercial Contract',
            'source' => 'Legal Counsel',
        ]);
    }

    public function test_records_module_settings_page_and_update(): void
    {
        // 1. Settings page accessible
        $response = $this->actingAs($this->user)->get(route('settings.modules.records'));
        $response->assertStatus(200);
        $response->assertViewIs('settings.modules.records');
        $response->assertSee('RECORD CLASSIFICATIONS AND SUBCLASSES');
        $response->assertSee('Document Taxonomy');
        $response->assertSee('OCR FIELD CONFIGURATION');
        $response->assertSee('Back to Records');

        // 2. Settings update
        $settingsPayload = [
            'numbering_prefix' => 'CORP-REC',
            'ocr_engine' => 'intelligent_ocr_v2',
            'ocr_auto_extract' => '1',
            'default_classification' => 'Corporate Records',
            'retention_policy' => '10_years',
            'max_upload_size_mb' => '25',
        ];

        $updateResponse = $this->actingAs($this->user)
            ->post(route('settings.modules.records.update'), $settingsPayload);

        $updateResponse->assertRedirect(route('settings.modules.records'));
        $updateResponse->assertSessionHas('success');

        // Verify session persistence
        $this->assertEquals('CORP-REC', session('client.settings.records.numbering_prefix'));
        $this->assertEquals('intelligent_ocr_v2', session('client.settings.records.ocr_engine'));
    }

    public function test_no_hard_delete_button_present_in_records_workflow(): void
    {
        $response = $this->actingAs($this->user)->get(route('records'));

        $response->assertStatus(200);
        // Ensure no delete forms or buttons exist for records
        $response->assertDontSee('Delete Record');
        $response->assertDontSee('btn-delete-record');
        $response->assertDontSee('action="records/delete"');
    }
}
