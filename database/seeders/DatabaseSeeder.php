<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\Announcement;
use App\Models\BillingInvoice;
use App\Models\ClientActivity;
use App\Models\Engagement;
use App\Models\SupportTicket;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with realistic mock data as per V1 Specification.
     */
    public function run(): void
    {
        // -----------------------------------------------------------------
        // 1. PRIMARY DEMO USERS
        // -----------------------------------------------------------------

        // User A: John Kelly (client@ordo.com)
        $userA = User::firstOrCreate(
            ['email' => 'client@ordo.com'],
            [
                'name' => 'John Kelly',
                'password' => Hash::make('Password123!'),
                'email_verified_at' => now(),
            ]
        );

        UserProfile::updateOrCreate(
            ['user_id' => $userA->id],
            [
                'first_name' => 'John',
                'middle_name' => 'Abalde',
                'last_name' => 'Kelly',
                'suffix' => 'Jr.',
                'date_of_birth' => '1988-06-15',
                'gender' => 'male',
                'country_region' => 'Philippines',
                'mobile_number' => '+639171234567',
            ]
        );

        // User B: Hotel Admin (admin@hotel.com)
        $userB = User::firstOrCreate(
            ['email' => 'admin@hotel.com'],
            [
                'name' => 'Hotel Administrator',
                'password' => Hash::make('Password123!'),
                'email_verified_at' => now(),
            ]
        );

        UserProfile::updateOrCreate(
            ['user_id' => $userB->id],
            [
                'first_name' => 'Hotel',
                'middle_name' => 'Operations',
                'last_name' => 'Admin',
                'suffix' => null,
                'date_of_birth' => '1990-01-01',
                'gender' => 'female',
                'country_region' => 'Philippines',
                'mobile_number' => '+639189876543',
            ]
        );

        // -----------------------------------------------------------------
        // 2. ACCOUNTS & PROFILES
        // -----------------------------------------------------------------

        // Primary Account (JK&C Inc.)
        $primaryAccount = Account::firstOrCreate(
            ['account_number' => 'ORDO-2026-00918274'],
            ['status' => 'active']
        );

        AccountProfile::updateOrCreate(
            ['account_id' => $primaryAccount->id],
            [
                'account_type' => 'Corporation',
                'legal_name' => 'John Kelly & Company (JK&C Inc.)',
                'trade_name' => 'JK&C Solutions',
                'tin' => '009-855-031-000',
                'registration_number' => 'CS202601928',
                'registration_authority' => 'Securities and Exchange Commission',
                'registration_date' => '2024-01-15',
                'industry_profession' => 'Management & Business Consultancy',
                'primary_address' => 'Unit 1402 Ayala Tower One, Ayala Avenue, Makati City 1226, Philippines',
                'business_email' => 'contact@jkc.com.ph',
                'contact_number' => '+63 2 8888 1234',
                'website' => 'https://jkc.com.ph',
            ]
        );

        if (!$userA->accounts()->where('accounts.id', $primaryAccount->id)->exists()) {
            $userA->accounts()->attach($primaryAccount->id, ['is_administrator' => 1]);
        }
        if (!$userB->accounts()->where('accounts.id', $primaryAccount->id)->exists()) {
            $userB->accounts()->attach($primaryAccount->id, ['is_administrator' => 1]);
        }

        // Secondary Account (Apex Global Ventures for Switch Account testing)
        $secondaryAccount = Account::firstOrCreate(
            ['account_number' => 'ORDO-2026-00384912'],
            ['status' => 'active']
        );

        AccountProfile::updateOrCreate(
            ['account_id' => $secondaryAccount->id],
            [
                'account_type' => 'Corporation',
                'legal_name' => 'Apex Global Ventures Corp.',
                'trade_name' => 'Apex Global',
                'tin' => '008-112-993-000',
                'registration_number' => 'CS202509182',
                'registration_authority' => 'Securities and Exchange Commission',
                'registration_date' => '2025-05-20',
                'industry_profession' => 'Financial Technology & Investments',
                'primary_address' => '25th Floor, High Street South, Bonifacio Global City, Taguig, Philippines',
                'business_email' => 'info@apexventures.ph',
                'contact_number' => '+63 2 8777 9000',
                'website' => 'https://apexventures.ph',
            ]
        );

        if (!$userA->accounts()->where('accounts.id', $secondaryAccount->id)->exists()) {
            $userA->accounts()->attach($secondaryAccount->id, ['is_administrator' => 1]);
        }

        // -----------------------------------------------------------------
        // 3. ANNOUNCEMENTS TABLE SEEDING
        // -----------------------------------------------------------------
        $announcementsData = [
            [
                'title' => 'Annual SEC General Information Sheet (GIS) Filing Advisory',
                'category' => 'SEC & Legal',
                'badge_color' => 'blue',
                'published_at' => '2026-09-04',
                'is_pinned' => true,
                'read_time' => '3 min read',
                'author' => 'JK&C Corporate Governance Practice',
                'summary' => 'Please be advised that all corporate entities with fiscal years ending December 31 must complete their 2026 GIS submissions within 30 calendar days following their Annual Stockholders Meeting.',
                'content' => 'The Securities and Exchange Commission (SEC) has issued Memorandum Circular regarding electronic submission requirements through the SEC Electronic Filing and Submission Tool (eFAST). JK&C Corporate Secretarial team will coordinate draft GIS forms directly via your Entity & Governance module.',
            ],
            [
                'title' => 'Q3 2026 Quarterly Income Tax & Expanded Withholding Remittance Reminder',
                'category' => 'Tax & BIR',
                'badge_color' => 'emerald',
                'published_at' => '2026-08-28',
                'is_pinned' => true,
                'read_time' => '4 min read',
                'author' => 'JK&C Tax & Accounting Group',
                'summary' => 'Tax filing cutoff for the third quarter of 2026 approaches. Review withholding tax certificates (BIR Form 2307) and sales registers to ensure reconciliation.',
                'content' => 'Please upload all supporting receipts and transmittal copies to your Finance module by September 25 to allow adequate preparation of BIR Form 1702Q and 0619-E remittance schedules.',
            ],
            [
                'title' => 'ORDO Client Portal v1.2 Release Notes: Enhanced Security & Session Control',
                'category' => 'System Notice',
                'badge_color' => 'indigo',
                'published_at' => '2026-08-20',
                'is_pinned' => false,
                'read_time' => '2 min read',
                'author' => 'ORDO Engineering Team',
                'summary' => 'New enterprise security features are now live in your Settings Hub, including multi-factor authentication and one-click remote session revocation.',
                'content' => 'You can now monitor all logged-in laptops and mobile devices under Settings > Security. If you detect any unrecognized access, click Log Out Other Browser Sessions to immediately safeguard your workspace.',
            ],
            [
                'title' => 'Philippine National Regular Holiday Advisory: Upcoming Office Schedule',
                'category' => 'Holiday Advisory',
                'badge_color' => 'amber',
                'published_at' => '2026-08-14',
                'is_pinned' => false,
                'read_time' => '1 min read',
                'author' => 'JK&C Operations Office',
                'summary' => 'JK&C advisory and compliance support offices will observe the upcoming national holiday. Emergency compliance hotlines remain active.',
                'content' => 'All scheduled filings falling due on the holiday date will be submitted on the preceding business day in accordance with regulatory filing guidelines.',
            ],
            [
                'title' => 'Mandatory LGU Business Permit Renewal Early Verification Window',
                'category' => 'SEC & Legal',
                'badge_color' => 'blue',
                'published_at' => '2026-08-05',
                'is_pinned' => false,
                'read_time' => '3 min read',
                'author' => 'JK&C Local Compliance Unit',
                'summary' => 'Local Government Units (LGUs) are opening early document validation for annual business tax clearance and mayor permit renewals.',
                'content' => 'Businesses with multi-branch or regional operations are encouraged to review their community tax certificates and barangay clearances in advance.',
            ],
        ];

        foreach ($announcementsData as $item) {
            Announcement::firstOrCreate(['title' => $item['title']], $item);
        }

        // -----------------------------------------------------------------
        // 4. ENGAGEMENTS TABLE SEEDING
        // -----------------------------------------------------------------
        $engagementsData = [
            [
                'account_id' => $primaryAccount->id,
                'code' => 'ENG-2026-0041',
                'title' => 'Corporate Secretarial & SEC Regulatory Retainer',
                'category' => 'Corporate Legal',
                'lead_partner' => 'Atty. Carmela Santos, CPA',
                'period' => 'Jan 01, 2026 – Dec 31, 2026',
                'scope' => 'Annual General Information Sheet (GIS), Board Minutes drafting, SEC eFAST compliance, Stock & Transfer Book maintenance.',
                'progress' => 75,
                'status' => 'In Progress',
                'status_color' => 'blue',
                'deliverables' => '2 Pending Review / 4 Completed',
                'billing_ref' => 'INV-2026-0882',
            ],
            [
                'account_id' => $primaryAccount->id,
                'code' => 'ENG-2026-0028',
                'title' => 'Tax Audit Assistance & BIR Authority Examination',
                'category' => 'Tax Advisory',
                'lead_partner' => 'John Kelly, CPA, MBA',
                'period' => 'Mar 15, 2026 – Oct 30, 2026',
                'scope' => 'Response to Letter of Authority (LOA), preparation of formal protest, reconciliation of withholding tax and VAT credit discrepancies.',
                'progress' => 85,
                'status' => 'In Progress',
                'status_color' => 'blue',
                'deliverables' => 'Reconciliation Matrix Ready',
                'billing_ref' => 'INV-2026-0790',
            ],
            [
                'account_id' => $primaryAccount->id,
                'code' => 'ENG-2026-0015',
                'title' => 'Financial Statement Review & Independent Compilation',
                'category' => 'Audit & Assurance',
                'lead_partner' => 'Michael Reyes, CPA',
                'period' => 'Feb 01, 2026 – Apr 15, 2026',
                'scope' => 'Compilation of Audited Financial Statements, notes to financial statements, and BIR/SEC annual compliance submission.',
                'progress' => 100,
                'status' => 'Completed',
                'status_color' => 'emerald',
                'deliverables' => 'Final Signed Compilation Report Delivered',
                'billing_ref' => 'INV-2026-0412',
            ],
            [
                'account_id' => $primaryAccount->id,
                'code' => 'ENG-2026-0052',
                'title' => 'Transfer Pricing Documentation & Local File Preparation',
                'category' => 'Tax Advisory',
                'lead_partner' => 'Atty. Carmela Santos, CPA',
                'period' => 'Jul 01, 2026 – Nov 15, 2026',
                'scope' => 'Preparation of Transfer Pricing Documentation (TPD) in compliance with BIR Revenue Regulations No. 19-2020.',
                'progress' => 40,
                'status' => 'In Progress',
                'status_color' => 'blue',
                'deliverables' => 'Comparability Analysis in Progress',
                'billing_ref' => null,
            ],
        ];

        foreach ($engagementsData as $eng) {
            Engagement::firstOrCreate(['code' => $eng['code']], $eng);
        }

        // -----------------------------------------------------------------
        // 5. SUPPORT TICKETS TABLE SEEDING
        // -----------------------------------------------------------------
        $ticketsData = [
            [
                'ticket_number' => 'TKT-2026-8921',
                'account_id' => $primaryAccount->id,
                'user_id' => $userA->id,
                'subject' => 'Assistance with SEC GIS electronic submission portal token',
                'category' => 'Technical Support',
                'priority' => 'High',
                'status' => 'In Progress',
                'message' => 'We require assistance obtaining our SEC eFAST digital credential token for our GIS submission.',
                'last_reply_by' => 'JK&C Tech Desk',
                'last_reply_at' => now()->subHours(2),
            ],
            [
                'ticket_number' => 'TKT-2026-8840',
                'account_id' => $primaryAccount->id,
                'user_id' => $userA->id,
                'subject' => 'Request for BIR 2307 reconciliation breakdown for Q2',
                'category' => 'Tax Advisory',
                'priority' => 'Medium',
                'status' => 'Resolved',
                'message' => 'Please provide the formal reconciliation schedule between 2307 certificates received and general ledger sales.',
                'last_reply_by' => 'John Kelly, CPA',
                'last_reply_at' => now()->subDays(12),
            ],
            [
                'ticket_number' => 'TKT-2026-8792',
                'account_id' => $primaryAccount->id,
                'user_id' => $userA->id,
                'subject' => 'Additional user seat access setup for compliance officer',
                'category' => 'Account Access',
                'priority' => 'Normal',
                'status' => 'Resolved',
                'message' => 'We need to provision an additional sub-account for our corporate secretarial associate.',
                'last_reply_by' => 'JK&C Client Intake Desk',
                'last_reply_at' => now()->subDays(25),
            ],
        ];

        foreach ($ticketsData as $ticket) {
            SupportTicket::firstOrCreate(['ticket_number' => $ticket['ticket_number']], $ticket);
        }

        // -----------------------------------------------------------------
        // 6. BILLING INVOICES TABLE SEEDING
        // -----------------------------------------------------------------
        $invoicesData = [
            [
                'account_id' => $primaryAccount->id,
                'invoice_number' => 'INV-2026-0882',
                'description' => 'Corporate Secretarial & SEC Compliance Retainer',
                'period' => 'August 2026',
                'issued_date' => '2026-08-01',
                'due_date' => '2026-08-31',
                'amount' => 45000.00,
                'status' => 'Pending Payment',
                'paid_at' => null,
            ],
            [
                'account_id' => $primaryAccount->id,
                'invoice_number' => 'INV-2026-0790',
                'description' => 'Tax Audit Advisory & Representation (Phase II Milestone)',
                'period' => 'July 2026',
                'issued_date' => '2026-07-01',
                'due_date' => '2026-07-31',
                'amount' => 60000.00,
                'status' => 'Paid',
                'paid_at' => '2026-07-28',
            ],
            [
                'account_id' => $primaryAccount->id,
                'invoice_number' => 'INV-2026-0644',
                'description' => 'Corporate Secretarial & SEC Compliance Retainer',
                'period' => 'June 2026',
                'issued_date' => '2026-06-01',
                'due_date' => '2026-06-30',
                'amount' => 45000.00,
                'status' => 'Paid',
                'paid_at' => '2026-06-25',
            ],
            [
                'account_id' => $primaryAccount->id,
                'invoice_number' => 'INV-2026-0412',
                'description' => 'Independent Financial Compilation & Annual Filing Report',
                'period' => 'April 2026',
                'issued_date' => '2026-04-01',
                'due_date' => '2026-04-30',
                'amount' => 75000.00,
                'status' => 'Paid',
                'paid_at' => '2026-04-20',
            ],
        ];

        foreach ($invoicesData as $inv) {
            BillingInvoice::firstOrCreate(['invoice_number' => $inv['invoice_number']], $inv);
        }

        // -----------------------------------------------------------------
        // 7. CLIENT ACTIVITIES & DELIVERED REPORTS TABLE SEEDING
        // -----------------------------------------------------------------
        $activitiesData = [
            [
                'account_id' => $primaryAccount->id,
                'user_id' => $userA->id,
                'activity_date' => '2026-09-03',
                'engagement_code' => 'ENG-2026-0041',
                'title' => 'SEC General Information Sheet (GIS) compliance pre-audit review',
                'consultant_name' => 'Atty. Carmela Santos, CPA',
                'hours_spent' => 1.75,
                'is_billable' => true,
                'type' => 'activity',
                'deliverable_name' => 'Draft GIS validated against Stock & Transfer book',
                'status' => 'Completed',
            ],
            [
                'account_id' => $primaryAccount->id,
                'user_id' => $userA->id,
                'activity_date' => '2026-08-29',
                'engagement_code' => 'ENG-2026-0028',
                'title' => 'BIR 2307 Creditable Withholding Tax reconciliation against general ledger',
                'consultant_name' => 'John Kelly, CPA',
                'hours_spent' => 2.50,
                'is_billable' => true,
                'type' => 'activity',
                'deliverable_name' => 'Reconciled 14 vendor tax credits with BIR alphanumeric codes',
                'status' => 'Completed',
            ],
            [
                'account_id' => $primaryAccount->id,
                'user_id' => $userA->id,
                'activity_date' => '2026-08-22',
                'engagement_code' => 'ENG-2026-0041',
                'title' => 'Quarterly statutory compliance calendar audit and filing milestone check',
                'consultant_name' => 'Michael Reyes, CPA',
                'hours_spent' => 1.25,
                'is_billable' => true,
                'type' => 'activity',
                'deliverable_name' => 'Compliance dates synchronized with ORDO Calendar',
                'status' => 'Completed',
            ],
            [
                'account_id' => $primaryAccount->id,
                'user_id' => $userA->id,
                'activity_date' => '2026-08-15',
                'engagement_code' => 'ENG-2026-0028',
                'title' => 'Letter of Authority (LOA) protest argument compilation and document tagging',
                'consultant_name' => 'John Kelly, CPA',
                'hours_spent' => 3.00,
                'is_billable' => true,
                'type' => 'activity',
                'deliverable_name' => 'Formal protest annexes assembled and cross-referenced',
                'status' => 'Completed',
            ],
            [
                'account_id' => $primaryAccount->id,
                'user_id' => $userA->id,
                'activity_date' => '2026-04-12',
                'engagement_code' => 'ENG-2026-0015',
                'title' => '2025 Annual Financial Statements Independent Compilation Report',
                'consultant_name' => 'Michael Reyes, CPA (Partner)',
                'hours_spent' => 15.00,
                'is_billable' => true,
                'type' => 'report',
                'deliverable_name' => 'REP-2026-015 (38 pages, Signed PDF)',
                'status' => 'Delivered',
            ],
            [
                'account_id' => $primaryAccount->id,
                'user_id' => $userA->id,
                'activity_date' => '2026-07-15',
                'engagement_code' => 'ENG-2026-0041',
                'title' => 'Mid-Year Comprehensive Corporate Governance & SEC Compliance Review',
                'consultant_name' => 'Atty. Carmela Santos, CPA',
                'hours_spent' => 8.00,
                'is_billable' => true,
                'type' => 'report',
                'deliverable_name' => 'REP-2026-031 (24 pages, Signed PDF)',
                'status' => 'Delivered',
            ],
        ];

        foreach ($activitiesData as $act) {
            ClientActivity::firstOrCreate([
                'account_id' => $act['account_id'],
                'title' => $act['title'],
            ], $act);
        }
    }
}
