<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\BillingInvoice;
use App\Models\ClientActivity;
use App\Models\Engagement;
use App\Models\SupportTicket;
use App\Services\EntitlementService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class JkcController extends Controller
{
    public function __construct(
        protected EntitlementService $entitlementService
    ) {}

    /**
     * Official JK&C Announcements, Memoranda, and Advisories.
     * Queries the announcements database table.
     */
    public function announcements(Request $request): View
    {
        $account = $request->user()?->currentAccount();
        $selectedCategory = $request->query('category', 'all');
        $search = trim($request->query('search', ''));

        $query = Announcement::query();

        if ($selectedCategory && $selectedCategory !== 'all') {
            $query->category($selectedCategory);
        }

        if (!empty($search)) {
            $query->search($search);
        }

        $announcements = $query->pinnedFirst()->get();
        $totalCount = Announcement::count();

        $categories = [
            'all' => 'All Notices',
            'SEC & Legal' => 'SEC & Legal',
            'Tax & BIR' => 'Tax & BIR',
            'System Notice' => 'System Notices',
            'Holiday Advisory' => 'Holiday Advisories',
        ];

        return view('jkc.announcements', [
            'account' => $account,
            'announcements' => $announcements,
            'selectedCategory' => $selectedCategory,
            'search' => $search,
            'totalCount' => $totalCount,
            'categories' => $categories,
        ]);
    }

    /**
     * Professional Engagements between Client and JK&C.
     * Queries the engagements database table linked to current account.
     */
    public function engagements(Request $request): View
    {
        $account = $request->user()?->currentAccount();
        $selectedStatus = $request->query('status', 'all');

        $query = $account ? $account->engagements() : Engagement::query();

        if ($selectedStatus && strtolower($selectedStatus) !== 'all') {
            $query->status($selectedStatus);
        }

        $engagements = $query->orderBy('created_at', 'desc')->get();

        $activeCount = ($account ? $account->engagements() : Engagement::query())->where('status', 'In Progress')->count();
        $reviewCount = ($account ? $account->engagements() : Engagement::query())->where('status', 'Review Stage')->count();
        $completedCount = ($account ? $account->engagements() : Engagement::query())->where('status', 'Completed')->count();

        return view('jkc.engagements', [
            'account' => $account,
            'engagements' => $engagements,
            'selectedStatus' => $selectedStatus,
            'activeCount' => $activeCount,
            'reviewCount' => $reviewCount,
            'completedCount' => $completedCount,
        ]);
    }

    /**
     * Subscription Plans, Free Trial Countdown, and Live Quota Usage Meters.
     */
    public function subscriptions(Request $request): View
    {
        $account = $request->user()?->currentAccount();

        $trialDays = $this->entitlementService->getTrialDaysRemaining($account);
        $isTrial = $this->entitlementService->isTrialActive($account);
        $modules = $this->entitlementService->getEntitledModules($account);
        $usage = $this->entitlementService->getUsageMeters($account);

        return view('jkc.subscriptions', [
            'account' => $account,
            'trialDaysRemaining' => $trialDays,
            'isTrialActive' => $isTrial,
            'modules' => $modules,
            'usage' => $usage,
            'planName' => $isTrial ? '30-Day Commercial Free Trial' : ($account?->subscription_plan === 'paid' ? 'Commercial Business Plan' : 'ORDO Free Plan (3 Modules)'),
            'billingCycle' => 'Annual Billing ($0 during trial)',
            'renewalDate' => now()->addDays($trialDays)->format('M d, Y'),
        ]);
    }

    /**
     * Helpdesk & Support Cases.
     * Queries support_tickets table linked to active account.
     */
    public function support(Request $request): View
    {
        $account = $request->user()?->currentAccount();

        $query = $account ? $account->supportTickets() : SupportTicket::query();
        $tickets = $query->with('user')->orderBy('created_at', 'desc')->get();

        $openCount = ($account ? $account->supportTickets() : SupportTicket::query())
            ->whereIn('status', ['Open', 'In Progress'])
            ->count();

        $resolvedCount = ($account ? $account->supportTickets() : SupportTicket::query())
            ->where('status', 'Resolved')
            ->count();

        return view('jkc.support', [
            'account' => $account,
            'tickets' => $tickets,
            'openCount' => $openCount,
            'resolvedCount' => $resolvedCount,
        ]);
    }

    /**
     * Submit New Support Ticket.
     * Persists record directly to support_tickets table.
     */
    public function submitTicket(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'subject' => 'required|string|min:5|max:255',
            'category' => 'required|string',
            'priority' => 'required|string|in:Low,Normal,Medium,High,Urgent',
            'message' => 'required|string|min:10|max:2000',
        ]);

        $account = $request->user()?->currentAccount();
        $ticketNo = 'TKT-' . date('Y') . '-' . rand(1000, 9999);

        SupportTicket::create([
            'ticket_number' => $ticketNo,
            'account_id' => $account?->id ?? 1,
            'user_id' => $request->user()?->id,
            'subject' => $validated['subject'],
            'category' => $validated['category'],
            'priority' => $validated['priority'],
            'status' => 'Open',
            'message' => $validated['message'],
            'last_reply_by' => 'JK&C Client Intake Desk',
            'last_reply_at' => now(),
        ]);

        return redirect()->route('jkc.support')->with('success', "Support request {$ticketNo} has been created and assigned to your JK&C engagement team.");
    }

    /**
     * Client-Visible Activity Log and Formal Reports Delivered.
     * Queries client_activities table.
     */
    public function activityReports(Request $request): View
    {
        $account = $request->user()?->currentAccount();

        $activitiesQuery = $account ? $account->activities()->activities() : ClientActivity::activities();
        $reportsQuery = $account ? $account->activities()->reports() : ClientActivity::reports();

        $activities = $activitiesQuery->orderByDesc('activity_date')->get();
        $reports = $reportsQuery->orderByDesc('activity_date')->get();

        return view('jkc.activity-reports', [
            'account' => $account,
            'activities' => $activities,
            'reports' => $reports,
        ]);
    }

    /**
     * Billing, Invoices, and Remittance Instructions.
     * Queries billing_invoices table.
     */
    public function billing(Request $request): View
    {
        $account = $request->user()?->currentAccount();

        $invoicesQuery = $account ? $account->invoices() : BillingInvoice::query();
        $invoices = (clone $invoicesQuery)->orderByDesc('due_date')->get();

        $totalOutstanding = (clone $invoicesQuery)->where('status', 'Pending Payment')->sum('amount');
        $totalPaidYtd = (clone $invoicesQuery)->where('status', 'Paid')->sum('amount');
        $nextDueInvoice = (clone $invoicesQuery)->where('status', 'Pending Payment')->orderBy('due_date', 'asc')->first();

        $summary = [
            'currency' => 'PHP (₱)',
            'outstanding_balance' => (float) $totalOutstanding,
            'total_outstanding' => (float) $totalOutstanding,
            'paid_this_year' => (float) $totalPaidYtd,
            'total_paid_ytd' => (float) $totalPaidYtd,
            'next_due_date' => $nextDueInvoice?->due_date ? $nextDueInvoice->due_date->format('M d, Y') : 'None Scheduled',
            'next_due_amount' => (float) ($nextDueInvoice?->amount ?? 0.00),
        ];

        return view('jkc.billing', [
            'account' => $account,
            'summary' => $summary,
            'invoices' => $invoices,
        ]);
    }

    /**
     * Statement of Account (SOA) streaming CSV export.
     * Queries billing_invoices table and streams CSV directly to browser.
     */
    public function downloadSoa(Request $request): StreamedResponse
    {
        $account = $request->user()?->currentAccount();
        $invoices = ($account ? $account->invoices() : BillingInvoice::query())
            ->orderBy('due_date', 'asc')
            ->get();

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="ORDO_Statement_of_Account_' . date('Y-m-d') . '.csv"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function () use ($account, $invoices) {
            $file = fopen('php://output', 'w');

            // UTF-8 BOM
            fputs($file, "\xEF\xBB\xBF");

            fputcsv($file, ['========================================================================================']);
            fputcsv($file, ['JOHN KELLY & COMPANY — STATEMENT OF ACCOUNT']);
            fputcsv($file, ['Account Number:', $account?->account_number ?? 'ORDO-DEMO']);
            fputcsv($file, ['Legal Name:', $account?->profile?->legal_name ?? 'John Kelly & Company Inc.']);
            fputcsv($file, ['Generated Date:', date('Y-m-d H:i:s')]);
            fputcsv($file, ['========================================================================================']);
            fputcsv($file, []);

            fputcsv($file, ['Invoice Number', 'Description', 'Period', 'Issue Date', 'Due Date', 'Amount (PHP)', 'Status']);

            $grandTotal = 0;
            $unpaidTotal = 0;

            foreach ($invoices as $inv) {
                $amount = (float) $inv->amount;
                $grandTotal += $amount;
                if ($inv->status === 'Pending Payment') {
                    $unpaidTotal += $amount;
                }

                fputcsv($file, [
                    $inv->invoice_number,
                    $inv->description,
                    $inv->period,
                    $inv->issued_date ? $inv->issued_date->format('Y-m-d') : '',
                    $inv->due_date ? $inv->due_date->format('Y-m-d') : '',
                    number_format($amount, 2, '.', ''),
                    $inv->status,
                ]);
            }

            fputcsv($file, []);
            fputcsv($file, ['', '', '', '', 'Total Invoiced:', number_format($grandTotal, 2, '.', ''), 'PHP']);
            fputcsv($file, ['', '', '', '', 'Current Outstanding Balance:', number_format($unpaidTotal, 2, '.', ''), 'PHP']);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Download or view individual Invoice Receipt.
     */
    public function downloadInvoice(Request $request, string $invoice): StreamedResponse
    {
        $account = $request->user()?->currentAccount();
        $inv = BillingInvoice::where('invoice_number', $invoice)
            ->when($account, fn($q) => $q->where('account_id', $account->id))
            ->firstOrFail();

        $headers = [
            'Content-Type' => 'text/plain; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $inv->invoice_number . '_Receipt.txt"',
        ];

        return response()->stream(function () use ($inv, $account) {
            echo "========================================================================\n";
            echo "             JOHN KELLY & COMPANY - OFFICIAL INVOICE RECEIPT            \n";
            echo "========================================================================\n";
            echo "Invoice Number: " . $inv->invoice_number . "\n";
            echo "Account:        " . ($account?->profile?->legal_name ?? 'ORDO Workspace') . "\n";
            echo "Description:    " . $inv->description . "\n";
            echo "Period:         " . ($inv->period ?? 'N/A') . "\n";
            echo "Issue Date:     " . ($inv->issued_date ? $inv->issued_date->format('Y-m-d') : 'N/A') . "\n";
            echo "Due Date:       " . ($inv->due_date ? $inv->due_date->format('Y-m-d') : 'N/A') . "\n";
            echo "Amount:         PHP " . number_format((float) $inv->amount, 2) . "\n";
            echo "Status:         " . $inv->status . "\n";
            echo "========================================================================\n";
            echo "Thank you for engaging John Kelly & Company for your professional needs.\n";
        }, 200, $headers);
    }

    /**
     * Download client deliverable report.
     */
    public function downloadReport(Request $request, int|string $id): StreamedResponse
    {
        $account = $request->user()?->currentAccount();
        $report = ClientActivity::where('id', $id)
            ->when($account, fn($q) => $q->where('account_id', $account->id))
            ->firstOrFail();

        $headers = [
            'Content-Type' => 'text/plain; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . Str::slug($report->title) . '_' . date('Ymd') . '.txt"',
        ];

        return response()->stream(function () use ($report) {
            echo "========================================================================\n";
            echo "               JOHN KELLY & COMPANY - CLIENT DELIVERABLE                \n";
            echo "========================================================================\n";
            echo "Deliverable: " . $report->title . "\n";
            echo "Scope:       " . $report->engagement_name . "\n";
            echo "Delivered:   " . ($report->activity_date ? $report->activity_date->format('Y-m-d') : 'N/A') . "\n";
            echo "Signatory:   " . ($report->specialist_name ?? 'JK&C Engagement Lead') . "\n";
            echo "Status:      " . $report->status . "\n";
            echo "========================================================================\n";
            echo "Summary & Findings:\n";
            echo ($report->outcome ?? 'Formal compliance deliverable prepared and signed by JK&C.') . "\n";
        }, 200, $headers);
    }
}
