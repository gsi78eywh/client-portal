<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\HumanCapitalRecord;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class HumanCapitalWorkflowTest extends TestCase
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

    public function test_guest_cannot_view_human_capital_or_create_record(): void
    {
        $this->get(route('human-capital'))
            ->assertRedirect(route('login'));

        $this->post(route('human-capital.store'), [
            'record_type' => 'employee',
            'employee_name' => 'Unauthorized User',
            'employment_status' => 'Active',
        ])->assertRedirect(route('login'));

        $this->get(route('settings.modules.human-capital'))
            ->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_human_capital_dashboard(): void
    {
        $response = $this->actingAs($this->user)->get(route('human-capital'));

        $response->assertStatus(200);
        $response->assertViewIs('modules.human-capital');
        $response->assertViewHas('humanCapitalRecords');
        $response->assertViewHas('humanCapitalStats');
        $response->assertViewHas('humanCapitalActivities');
        $response->assertSee('Human Capital');
        $response->assertSee('Configure module');
        $response->assertSee(route('settings.modules.human-capital'));

        // Verify single top "+ New" button exists
        $response->assertSee('id="btnTopNewHumanCapital"', false);

        // Verify strictly no permanent hard-delete buttons exist in user-facing table
        $response->assertDontSee('btn-danger');
        $response->assertDontSee('Delete Record');
        $response->assertDontSee('Delete Employee');
    }

    public function test_human_capital_dashboard_renders_clickable_kpi_cards_and_tabs(): void
    {
        $response = $this->actingAs($this->user)->get(route('human-capital'));

        $response->assertStatus(200);

        // Clickable KPI card IDs
        $response->assertSee('id="kpiHeadcount"', false);
        $response->assertSee('id="kpiOnLeave"', false);
        $response->assertSee('id="kpiPendingActions"', false);
        $response->assertSee('id="kpiHrRecords"', false);

        // Base KPI metric figures
        $response->assertSee('48'); // Headcount
        $response->assertSee('3');  // On Leave
        $response->assertSee('2');  // Pending HR actions
        $response->assertSee('144'); // HR records

        // Tab IDs
        $response->assertSee('id="tabAll"', false);
        $response->assertSee('id="tabEmployees"', false);
        $response->assertSee('id="tabHrRecords"', false);
        $response->assertSee('id="tabAttendance"', false);
        $response->assertSee('id="tabLeave"', false);
        $response->assertSee('id="tabPending"', false);
    }

    public function test_validation_fails_when_required_fields_missing_for_each_record_type(): void
    {
        // 1. Employee: requires employee_name and employment_status
        $response = $this->actingAs($this->user)
            ->postJson(route('human-capital.store'), [
                'record_type' => 'employee',
            ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['employee_name', 'employment_status']);

        // 2. HR Document: requires title, employee_name, document_type, and file
        $response = $this->actingAs($this->user)
            ->postJson(route('human-capital.store'), [
                'record_type' => 'hr_document',
            ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['title', 'employee_name', 'document_type', 'file']);

        // 3. Attendance: requires employee_name, date, and attendance_status
        $response = $this->actingAs($this->user)
            ->postJson(route('human-capital.store'), [
                'record_type' => 'attendance',
            ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['employee_name', 'date', 'attendance_status']);

        // 4. Leave: requires employee_name, leave_type, start_date, and end_date
        $response = $this->actingAs($this->user)
            ->postJson(route('human-capital.store'), [
                'record_type' => 'leave',
            ]);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['employee_name', 'leave_type', 'start_date', 'end_date']);
    }

    public function test_user_can_create_employee_record_and_headcount_increments(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('Resume_Gabriel_Reyes.pdf', 800, 'application/pdf');

        $response = $this->actingAs($this->user)
            ->postJson(route('human-capital.store'), [
                'record_type' => 'employee',
                'employee_name' => 'Gabriel M. Reyes',
                'employee_id' => 'EMP-049',
                'department' => 'Technology & Systems',
                'position' => 'Senior DevOps Engineer',
                'employment_type' => 'Regular',
                'work_arrangement' => 'Hybrid',
                'date_hired' => '2026-09-08',
                'reporting_manager' => 'Chief Technology Officer',
                'employment_status' => 'Active',
                'notes' => 'Cloud infrastructure specialist handling AWS container workloads.',
                'file' => $file,
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.title', 'Gabriel M. Reyes');
        $response->assertJsonPath('record.reference_no', 'EMP-049');

        // Headcount increments from 48 -> 49
        $response->assertJsonPath('stats.headcount', '49');
        $response->assertJsonPath('stats.headcount_raw', 49);

        // Recent activity logged
        $response->assertJsonPath('activities.0.type', 'Employee');
        $this->assertStringContainsString('Gabriel M. Reyes', $response->json('activities.0.title'));

        // Verify Database persistence
        $this->assertDatabaseHas('human_capital_records', [
            'account_id' => $this->account->id,
            'record_type' => 'employee',
            'reference_no' => 'EMP-049',
            'title' => 'Gabriel M. Reyes',
            'status' => 'Active',
        ]);
    }

    public function test_user_can_create_hr_document_record(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('Consultancy_Agreement_2026.pdf', 1200, 'application/pdf');

        $response = $this->actingAs($this->user)
            ->postJson(route('human-capital.store'), [
                'record_type' => 'hr_document',
                'title' => 'Executive Strategic Advisory Agreement',
                'employee_name' => 'Maria Santos',
                'document_type' => 'Employment Contract',
                'record_date' => '2026-09-08',
                'status' => 'Active',
                'description' => 'Signed executive consulting and board advisory covenants.',
                'file' => $file,
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.title', 'Executive Strategic Advisory Agreement');
        $response->assertJsonPath('record.category', 'Employment Contract');

        // HR records metric increments from 144 -> 145
        $response->assertJsonPath('stats.hr_records', '145');
        $response->assertJsonPath('stats.hr_records_raw', 145);

        // Verify Database persistence
        $this->assertDatabaseHas('human_capital_records', [
            'account_id' => $this->account->id,
            'record_type' => 'hr_document',
            'title' => 'Executive Strategic Advisory Agreement',
            'status' => 'Active',
        ]);
    }

    public function test_user_can_create_attendance_record(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson(route('human-capital.store'), [
                'record_type' => 'attendance',
                'employee_name' => 'Ana Patricia Lim',
                'date' => '2026-09-08',
                'attendance_status' => 'Present',
                'time_in' => '08:25 AM',
                'time_out' => '05:40 PM',
                'notes' => 'On-time arrival at head office finance room.',
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.title', 'Ana Patricia Lim');
        $response->assertJsonPath('record.status', 'Present');

        // Verify Database persistence
        $this->assertDatabaseHas('human_capital_records', [
            'account_id' => $this->account->id,
            'record_type' => 'attendance',
            'title' => 'Ana Patricia Lim',
            'status' => 'Present',
        ]);
    }

    public function test_user_can_create_leave_record_and_pending_increments(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson(route('human-capital.store'), [
                'record_type' => 'leave',
                'employee_name' => 'Atty. Juan Carlos Reyes',
                'leave_type' => 'Vacation Leave',
                'start_date' => '2026-09-20',
                'end_date' => '2026-09-22',
                'number_of_days' => 3,
                'reason' => 'Annual family break; court appearances rescheduled.',
                'status' => 'Pending',
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.title', 'Atty. Juan Carlos Reyes');
        $response->assertJsonPath('record.status', 'Pending');

        // Pending actions increments from 2 -> 3
        $response->assertJsonPath('stats.pending_actions', '3');
        $response->assertJsonPath('stats.pending_actions_raw', 3);

        // Verify Database persistence
        $this->assertDatabaseHas('human_capital_records', [
            'account_id' => $this->account->id,
            'record_type' => 'leave',
            'title' => 'Atty. Juan Carlos Reyes',
            'status' => 'Pending',
        ]);
    }

    public function test_user_can_update_leave_status_from_pending_to_approved(): void
    {
        // First, view dashboard to seed records into DB
        $this->actingAs($this->user)->get(route('human-capital'));

        // Find the seeded pending leave record (LVE-2026-0032)
        $leaveRecord = HumanCapitalRecord::where('account_id', $this->account->id)
            ->where('record_type', 'leave')
            ->where('status', 'Pending')
            ->first();

        $this->assertNotNull($leaveRecord);

        // Update status to Approved
        $response = $this->actingAs($this->user)
            ->putJson(route('human-capital.update', $leaveRecord->id), [
                'record_type' => 'leave',
                'employee_name' => $leaveRecord->title,
                'leave_type' => $leaveRecord->category,
                'start_date' => $leaveRecord->record_date->format('Y-m-d'),
                'end_date' => $leaveRecord->end_date->format('Y-m-d'),
                'number_of_days' => 2,
                'reason' => 'Medical certificate verified by HR.',
                'status' => 'Approved',
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.status', 'Approved');

        // Since status changed from Pending to Approved:
        // Pending actions decrements from 2 -> 1
        $response->assertJsonPath('stats.pending_actions', '1');
        $response->assertJsonPath('stats.pending_actions_raw', 1);

        // On leave increments from 3 -> 4
        $response->assertJsonPath('stats.on_leave', '4');
        $response->assertJsonPath('stats.on_leave_raw', 4);

        // Verify Database updated
        $this->assertDatabaseHas('human_capital_records', [
            'id' => $leaveRecord->id,
            'status' => 'Approved',
        ]);
    }

    public function test_user_can_update_employee_status_and_metrics_recalculate(): void
    {
        $this->actingAs($this->user)->get(route('human-capital'));

        $employee = HumanCapitalRecord::where('account_id', $this->account->id)
            ->where('record_type', 'employee')
            ->where('status', 'Active')
            ->first();

        $this->assertNotNull($employee);

        // Change status from Active to Separated
        $response = $this->actingAs($this->user)
            ->putJson(route('human-capital.update', $employee->id), [
                'record_type' => 'employee',
                'employee_name' => $employee->title,
                'employee_id' => $employee->reference_no,
                'department' => $employee->category,
                'position' => 'Senior Specialist',
                'employment_status' => 'Separated',
                'notes' => 'Separated upon mutual clearance completion.',
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.status', 'Separated');

        // Headcount decreases from 48 -> 47
        $response->assertJsonPath('stats.headcount', '47');
        $response->assertJsonPath('stats.headcount_raw', 47);

        // Verify Database updated
        $this->assertDatabaseHas('human_capital_records', [
            'id' => $employee->id,
            'status' => 'Separated',
        ]);
    }

    public function test_human_capital_module_settings_view_and_update(): void
    {
        // View settings
        $response = $this->actingAs($this->user)->get(route('settings.modules.human-capital'));
        $response->assertStatus(200);
        $response->assertViewIs('settings.modules.human-capital');
        $response->assertSee('Human Capital Settings');
        $response->assertSee('1. MODULE STATUS &amp; ORGANIZATION STRUCTURE', false);
        $response->assertSee('2. DEPARTMENTS &amp; BUSINESS UNITS', false);
        $response->assertSee('3. POSITIONS &amp; JOB LEVELS', false);
        $response->assertSee('4. EMPLOYMENT TYPES &amp; WORK ARRANGEMENTS', false);
        $response->assertSee('5. ATTENDANCE &amp; LEAVE CONFIGURATION', false);
        $response->assertSee('6. HR RECORD &amp; DOCUMENT TYPES', false);
        $response->assertSee('7. APPROVAL &amp; REPORTING LINES', false);
        $response->assertSee('8. MODULE PERMISSIONS &amp; ACCESS CONTROL', false);
        $response->assertSee('Back to Human Capital');

        // Submit settings update
        $postResponse = $this->actingAs($this->user)
            ->post(route('settings.modules.human-capital.update'), [
                'organization_name' => 'ORDO Commercial Enterprise Corp.',
                'headquarters_location' => 'Bonifacio Global City, Taguig, Philippines',
                'annual_vl_days' => 18,
                'annual_sl_days' => 15,
                'standard_shift' => '09:00 AM - 06:00 PM',
            ]);

        $postResponse->assertRedirect(route('settings.modules.human-capital'));
        $postResponse->assertSessionHas('status');

        // Follow redirect and check updated values
        $followResponse = $this->actingAs($this->user)->get(route('settings.modules.human-capital'));
        $followResponse->assertSee('ORDO Commercial Enterprise Corp.');
        $followResponse->assertSee('Bonifacio Global City, Taguig, Philippines');
    }

    public function test_url_filter_parameters_are_handled(): void
    {
        $response = $this->actingAs($this->user)->get(route('human-capital', ['filter' => 'employees']));
        $response->assertStatus(200);
        $response->assertViewHas('initialFilter', 'employees');

        $response2 = $this->actingAs($this->user)->get(route('human-capital', ['filter' => 'leave']));
        $response2->assertStatus(200);
        $response2->assertViewHas('initialFilter', 'leave');
    }
}
