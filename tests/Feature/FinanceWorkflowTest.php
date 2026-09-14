<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\FinanceRecord;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FinanceWorkflowTest extends TestCase
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

    public function test_guest_cannot_view_finance_or_create_records(): void
    {
        $this->get(route('finance'))
            ->assertRedirect(route('login'));

        $this->post(route('finance.store'), [
            'record_type' => 'receivable',
            'title' => 'Guest Invoice',
        ])->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_finance_page(): void
    {
        $response = $this->actingAs($this->user)->get(route('finance'));

        $response->assertStatus(200);
        $response->assertViewIs('modules.finance');
        $response->assertViewHas('financeRecords');
        $response->assertViewHas('financeStats');
        $response->assertSee('Configure module');
        $response->assertSee(route('settings.modules.finance'));
    }

    public function test_validation_fails_when_required_fields_are_missing(): void
    {
        $response = $this->actingAs($this->user)
            ->postJson(route('finance.store'), []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['record_type', 'title', 'category', 'record_date', 'status']);
    }

    public function test_can_create_receivable_record_via_ajax_and_persists_to_account(): void
    {
        $payload = [
            'record_type' => 'receivable',
            'title' => 'Client Advisory Retainer Invoice Q3',
            'category' => 'Receivable',
            'amount' => 75000.00,
            'currency' => 'PHP',
            'record_date' => '2026-08-20',
            'due_date' => '2026-09-20',
            'status' => 'Unpaid',
            'description' => 'Professional legal and corporate advisory retainer billing for Q3 2026.',
            'metadata' => [
                'client_name' => 'Apex Holdings Philippines Inc.',
                'invoice_no' => 'INV-APEX-2026-09',
            ],
        ];

        $response = $this->actingAs($this->user)
            ->postJson(route('finance.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.record_type', 'receivable');
        $response->assertJsonPath('record.title', 'Client Advisory Retainer Invoice Q3');
        $this->assertEquals(75000, $response->json('record.amount'));
        $this->assertStringStartsWith('INV-2026-', $response->json('record.reference_no'));

        // Verify in database
        $this->assertDatabaseHas('finance_records', [
            'account_id' => $this->account->id,
            'record_type' => 'receivable',
            'title' => 'Client Advisory Retainer Invoice Q3',
            'status' => 'Unpaid',
        ]);
    }

    public function test_can_create_payable_record_with_attachment(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('aws_billing_august.pdf', 500, 'application/pdf');

        $payload = [
            'record_type' => 'payable',
            'title' => 'AWS Cloud Infrastructure Monthly Hosting Bill',
            'category' => 'Payable',
            'amount' => 32000.00,
            'currency' => 'PHP',
            'record_date' => '2026-08-25',
            'due_date' => '2026-09-15',
            'status' => 'Approved',
            'description' => 'Production cloud cluster hosting and storage billing for August 2026.',
            'attachment' => $file,
            'metadata' => [
                'vendor_name' => 'Amazon Web Services Inc.',
                'bill_no' => 'BILL-AWS-2026-08',
            ],
        ];

        $response = $this->actingAs($this->user)
            ->postJson(route('finance.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
        $response->assertJsonPath('record.record_type', 'payable');
        $this->assertStringStartsWith('PAY-2026-', $response->json('record.reference_no'));

        $this->assertDatabaseHas('finance_records', [
            'account_id' => $this->account->id,
            'record_type' => 'payable',
            'title' => 'AWS Cloud Infrastructure Monthly Hosting Bill',
            'attachment_name' => 'aws_billing_august.pdf',
        ]);
    }

    public function test_can_create_expense_record(): void
    {
        $payload = [
            'record_type' => 'expense',
            'title' => 'Slack Enterprise Grid Annual Subscription',
            'category' => 'Expense',
            'amount' => 45000.00,
            'currency' => 'PHP',
            'record_date' => '2026-08-10',
            'status' => 'Recorded',
            'description' => 'Collaboration software license seat expansion.',
            'metadata' => [
                'payee' => 'Slack Technologies LLC',
                'payment_method' => 'Corporate Card',
            ],
        ];

        $response = $this->actingAs($this->user)
            ->postJson(route('finance.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
        $response->assertJsonPath('record.record_type', 'expense');
        $this->assertStringStartsWith('EXP-2026-', $response->json('record.reference_no'));

        $this->assertDatabaseHas('finance_records', [
            'account_id' => $this->account->id,
            'record_type' => 'expense',
            'title' => 'Slack Enterprise Grid Annual Subscription',
        ]);
    }

    public function test_can_create_transaction_record(): void
    {
        $payload = [
            'record_type' => 'transaction',
            'title' => 'Inbound Customer Wire Settlement',
            'category' => 'Transaction',
            'amount' => 150000.00,
            'currency' => 'PHP',
            'record_date' => '2026-08-18',
            'status' => 'Settled',
            'description' => 'PESONet clearing from client settlement account.',
            'metadata' => [
                'bank_account' => 'Metrobank Corporate Cash #9921',
                'trace_no' => 'PNT-2026-0818-4421',
            ],
        ];

        $response = $this->actingAs($this->user)
            ->postJson(route('finance.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
        $response->assertJsonPath('record.record_type', 'transaction');
        $this->assertStringStartsWith('TRX-2026-', $response->json('record.reference_no'));

        $this->assertDatabaseHas('finance_records', [
            'account_id' => $this->account->id,
            'record_type' => 'transaction',
            'title' => 'Inbound Customer Wire Settlement',
        ]);
    }

    public function test_can_create_request_record(): void
    {
        $payload = [
            'record_type' => 'request',
            'title' => 'IT Department Hardware Requisition',
            'category' => 'Request',
            'amount' => 60000.00,
            'currency' => 'PHP',
            'record_date' => '2026-08-22',
            'due_date' => '2026-09-05',
            'status' => 'Pending',
            'description' => 'High-performance developer laptops and monitor replacements.',
            'metadata' => [
                'department' => 'Technology & Systems',
                'priority' => 'High',
            ],
        ];

        $response = $this->actingAs($this->user)
            ->postJson(route('finance.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
        $response->assertJsonPath('record.record_type', 'request');
        $this->assertStringStartsWith('REQ-2026-', $response->json('record.reference_no'));

        $this->assertDatabaseHas('finance_records', [
            'account_id' => $this->account->id,
            'record_type' => 'request',
            'title' => 'IT Department Hardware Requisition',
        ]);
    }

    public function test_can_create_general_finance_record(): void
    {
        $payload = [
            'record_type' => 'finance_record',
            'title' => 'FY2025 Audited Financial Statements & Notes',
            'category' => 'Financial Record',
            'amount' => 0.00,
            'currency' => 'PHP',
            'record_date' => '2026-08-01',
            'status' => 'Recorded',
            'description' => 'Full annual AFS with external auditor certification and notes.',
            'metadata' => [
                'custodian' => 'Finance & Accounting',
                'auditor' => 'SGV & Co. / Ernst & Young Philippines',
            ],
        ];

        $response = $this->actingAs($this->user)
            ->postJson(route('finance.store'), $payload);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
        $response->assertJsonPath('record.record_type', 'finance_record');
        $this->assertStringStartsWith('FIN-2026-', $response->json('record.reference_no'));

        $this->assertDatabaseHas('finance_records', [
            'account_id' => $this->account->id,
            'record_type' => 'finance_record',
            'title' => 'FY2025 Audited Financial Statements & Notes',
        ]);
    }

    public function test_can_update_finance_record_and_persists_to_account(): void
    {
        $record = FinanceRecord::create([
            'account_id' => $this->account->id,
            'user_id' => $this->user->id,
            'record_type' => 'payable',
            'reference_no' => 'PAY-2026-0099',
            'title' => 'Initial Office Lease Deposit',
            'category' => 'Payable',
            'amount' => 50000.00,
            'currency' => 'PHP',
            'record_date' => '2026-08-01',
            'status' => 'Pending',
            'status_badge_class' => 'pending',
            'description' => 'Deposit payment under review.',
        ]);

        $updatePayload = [
            'record_type' => 'payable',
            'title' => 'Initial Office Lease Deposit - Settled in Full',
            'category' => 'Payable',
            'amount' => 50000.00,
            'currency' => 'PHP',
            'record_date' => '2026-08-01',
            'status' => 'Approved',
            'description' => 'Deposit payment approved and released by Finance Committee.',
        ];

        $response = $this->actingAs($this->user)
            ->putJson(route('finance.update', $record->id), $updatePayload);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $response->assertJsonPath('record.title', 'Initial Office Lease Deposit - Settled in Full');
        $response->assertJsonPath('record.status', 'Approved');

        $this->assertDatabaseHas('finance_records', [
            'id' => $record->id,
            'account_id' => $this->account->id,
            'title' => 'Initial Office Lease Deposit - Settled in Full',
            'status' => 'Approved',
        ]);
    }

    public function test_finance_ui_has_single_top_button_view_and_no_delete_button(): void
    {
        $response = $this->actingAs($this->user)->get(route('finance'));

        $response->assertStatus(200);

        // Verify single top button
        $response->assertSee('id="btnTopNewFinance"', false);
        $response->assertSee('+ New Finance Record');

        // Verify table has View buttons
        $response->assertSee('finance-view-btn', false);

        // Verify View detail modal has Edit Record button
        $response->assertSee('id="btnEditFinanceFromDetail"', false);
        $response->assertSee('Edit Record');

        // Strictly verify NO hard delete button
        $response->assertDontSee('Delete Record');
        $response->assertDontSee('btnDeleteFinance');
        $response->assertDontSee('finance-delete-btn');
    }

    public function test_record_type_selection_options_rendered_in_modal(): void
    {
        $response = $this->actingAs($this->user)->get(route('finance'));

        $response->assertStatus(200);
        $response->assertSee('Select Finance Record Type');
        $response->assertSee("selectFinanceType('receivable')", false);
        $response->assertSee("selectFinanceType('payable')", false);
        $response->assertSee("selectFinanceType('expense')", false);
        $response->assertSee("selectFinanceType('transaction')", false);
        $response->assertSee("selectFinanceType('request')", false);
        $response->assertSee("selectFinanceType('finance_record')", false);
    }

    public function test_kpi_metric_cards_rendered_with_interactive_attributes_and_onclick_handlers(): void
    {
        $response = $this->actingAs($this->user)->get(route('finance'));

        $response->assertStatus(200);

        // Verify 5 metric cards exist with proper onclick and keyboard accessibility
        $response->assertSee('id="kpiReceivables"', false);
        $response->assertSee("handleFinanceKpiClick('receivable')", false);

        $response->assertSee('id="kpiPayables"', false);
        $response->assertSee("handleFinanceKpiClick('payable')", false);

        $response->assertSee('id="kpiExpenses"', false);
        $response->assertSee("handleFinanceKpiClick('expense')", false);

        $response->assertSee('id="kpiTransactions"', false);
        $response->assertSee("handleFinanceKpiClick('transaction')", false);

        $response->assertSee('id="kpiRecords"', false);
        $response->assertSee("handleFinanceKpiClick('finance_record')", false);
    }

    public function test_kpi_counts_update_dynamically_when_record_is_created_or_updated(): void
    {
        $initialResponse = $this->actingAs($this->user)->get(route('finance'));
        $initialStats = $initialResponse->viewData('financeStats');

        // Create a new high-value Receivable
        $payload = [
            'record_type' => 'receivable',
            'title' => 'Big Enterprise Client Contract Invoice',
            'category' => 'Receivable',
            'amount' => 500000.00,
            'currency' => 'PHP',
            'record_date' => '2026-08-30',
            'status' => 'Unpaid',
            'description' => 'Multi-million peso tier engagement installment.',
        ];

        $postResponse = $this->actingAs($this->user)
            ->postJson(route('finance.store'), $payload);

        $postResponse->assertStatus(200);
        $updatedStats = $postResponse->json('stats');

        $this->assertGreaterThan(
            $initialStats['receivables_raw'],
            $updatedStats['receivables_raw']
        );
        $this->assertEquals(
            $initialStats['receivables_count'] + 1,
            $updatedStats['receivables_count']
        );
        $this->assertEquals(
            $initialStats['finance_records'] + 1,
            $updatedStats['finance_records']
        );
    }

    public function test_finance_settings_page_renders_all_ordo_sections_and_updates(): void
    {
        $settingsResponse = $this->actingAs($this->user)->get(route('settings.modules.finance'));

        $settingsResponse->assertStatus(200);
        $settingsResponse->assertSee('Finance Settings &amp; Configuration', false);
        $settingsResponse->assertSee('CURRENCY SETTINGS');
        $settingsResponse->assertSee('TAX SETTINGS');
        $settingsResponse->assertSee('CHART OF ACCOUNTS / FINANCE CATEGORIES');
        $settingsResponse->assertSee('TRANSACTION AND REQUEST TYPES');
        $settingsResponse->assertSee('NUMBERING FORMATS');
        $settingsResponse->assertSee('APPROVAL FLOWS &amp; THRESHOLDS', false);
        $settingsResponse->assertSee('PAYMENT &amp; BILLING DEFAULTS', false);
        $settingsResponse->assertSee('MODULE USER PERMISSIONS');

        // Test updating settings
        $updateResponse = $this->actingAs($this->user)->post(route('settings.modules.finance.update'), [
            'default_currency' => 'USD',
            'tax_rate' => '12',
            'payment_terms' => 'net15',
        ]);

        $updateResponse->assertRedirect(route('settings.modules.finance'));
        $updateResponse->assertSessionHas('status');
    }
}
