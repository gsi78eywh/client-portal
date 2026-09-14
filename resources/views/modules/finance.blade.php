@extends('layouts.client')

@section('title', 'Finance')

@section('header-title', 'Finance')

@section('content')

<div class="finance-page">

    {{-- =========================================================
        PAGE HEADER
    ========================================================== --}}
    <div class="finance-header">

        <div class="finance-header-copy">

            <div class="finance-eyebrow">
                <span class="finance-eyebrow-label">BUSINESS</span>
                <span class="finance-eyebrow-separator">&bull;</span>
                <span class="finance-eyebrow-label finance-eyebrow-finance">FINANCE</span>
            </div>

            <h1 class="finance-title">
                Finance
            </h1>

            <p class="finance-description">
                A structured finance workspace for records, receivables, payables,
                requests and management visibility.
            </p>

        </div>

        <div class="finance-header-actions">

            <span class="finance-trial-badge">
                30-Day Trial
            </span>

            {{-- Single Primary Top Action Button --}}
            <button type="button" class="finance-primary-btn" id="btnTopNewFinance" onclick="openNewFinanceModal()">

                <svg
                    width="16"
                    height="16"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2.3"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>

                + New Finance Record

            </button>

        </div>

    </div>


    {{-- =========================================================
        OVERVIEW + ACTIVITY TREND
    ========================================================== --}}
    <div class="finance-overview-grid">

        {{-- =====================================================
            MODULE OVERVIEW
        ====================================================== --}}
        <div class="finance-overview-card">

            <div>

                <div class="finance-section-label">
                    MODULE OVERVIEW &bull; FINANCIAL SUMMARY
                </div>

                <h2 class="finance-overview-title">
                    Everything important, without the clutter.
                </h2>

                <p class="finance-overview-description">
                    A structured finance workspace for records, receivables,
                    payables, requests and management visibility for <strong style="color: #0f172a;">{{ session('client.account.name', $account?->profile?->legal_name ?? 'your ORDO account') }}</strong>.
                </p>

            </div>

            <div class="finance-overview-actions">

                <button type="button" class="finance-quick-btn" onclick="openNewFinanceModal()">
                    Quick action
                </button>

                <a href="{{ route('settings.modules.finance') }}" class="finance-config-btn" style="text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">

                    {{-- BLUE SETTINGS ICON --}}
                    <svg
                        width="15"
                        height="15"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="#2563eb"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="
                            M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06
                            -1.7 1.7-.06-.06a1.7 1.7 0 0 0-1.88-.34
                            1.7 1.7 0 0 0-1.03 1.55V20h-2.4v-.21
                            a1.7 1.7 0 0 0-1.03-1.55
                            1.7 1.7 0 0 0-1.88.34l-.06.06
                            -1.7-1.7.06-.06A1.7 1.7 0 0 0 8.4 15
                            a1.7 1.7 0 0 0-1.55-1.03H6.6v-2.4h.25
                            A1.7 1.7 0 0 0 8.4 10
                            a1.7 1.7 0 0 0-.34-1.88L8 8.06l1.7-1.7
                            .06.06a1.7 1.7 0 0 0 1.88.34
                            1.7 1.7 0 0 0 1.03-1.55V5h2.4v.21
                            a1.7 1.7 0 0 0 1.03 1.55
                            1.7 1.7 0 0 0 1.88-.34l.06-.06
                            1.7 1.7-.06.06A1.7 1.7 0 0 0 19.4 10
                            a1.7 1.7 0 0 0 1.55 1.03h.25v2.4h-.25
                            A1.7 1.7 0 0 0 19.4 15z
                        "></path>
                    </svg>

                    Configure module

                </a>

            </div>

        </div>


        {{-- =====================================================
            ACTIVITY TREND
        ====================================================== --}}
        <div class="finance-activity-card">

            <div class="finance-activity-header">

                <div>

                    <div class="finance-activity-title">
                        Activity trend
                    </div>

                    <div class="finance-activity-subtitle">
                        Last 30 days
                    </div>

                </div>

                <span class="finance-healthy-badge">
                    Healthy
                </span>

            </div>


            <div class="finance-chart">

                <div class="finance-bars">

                    <span style="height: 30%;"></span>
                    <span style="height: 48%;"></span>
                    <span style="height: 40%;"></span>
                    <span style="height: 68%;"></span>
                    <span style="height: 58%;"></span>
                    <span style="height: 80%;"></span>
                    <span style="height: 65%;"></span>
                    <span style="height: 95%;"></span>
                    <span style="height: 72%;"></span>
                    <span style="height: 82%;"></span>

                </div>

                <div class="finance-chart-baseline"></div>

                <div class="finance-chart-footer">

                    <span>
                        Activity
                    </span>

                    <strong>
                        +18% this month
                    </strong>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
        INTERACTIVE & FUNCTIONAL SUMMARY / METRIC CARDS
    ========================================================== --}}
    <div class="finance-stats-grid" id="financeStatsGrid">

        {{-- 1. RECEIVABLES --}}
        <div class="finance-stat-card" id="kpiReceivables" role="button" tabindex="0" onclick="handleFinanceKpiClick('receivable')" onkeydown="handleFinanceKpiKeydown(event, 'receivable')" title="Click to view Receivables">

            <div class="finance-stat-icon">

                <svg
                    width="19"
                    height="19"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <path d="M20 7H5a3 3 0 0 1 0-6h13a2 2 0 0 1 2 2v4"></path>
                    <path d="M5 7h15a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a3 3 0 0 1-3-3V4"></path>
                    <path d="M17 14h.01"></path>
                </svg>

            </div>

            <div class="finance-stat-value" id="statReceivables">
                {{ $financeStats['receivables'] ?? '₱225K' }}
            </div>

            <div class="finance-stat-label">
                Receivables
            </div>

            <div class="finance-stat-meta" id="statReceivablesMeta">
                {{ $financeStats['receivables_meta'] ?? '₱65K due soon' }}
            </div>

        </div>


        {{-- 2. PAYABLES --}}
        <div class="finance-stat-card" id="kpiPayables" role="button" tabindex="0" onclick="handleFinanceKpiClick('payable')" onkeydown="handleFinanceKpiKeydown(event, 'payable')" title="Click to view Payables">

            <div class="finance-stat-icon">

                <svg
                    width="19"
                    height="19"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="8" y1="13" x2="16" y2="13"></line>
                    <line x1="8" y1="17" x2="13" y2="17"></line>
                </svg>

            </div>

            <div class="finance-stat-value" id="statPayables">
                {{ $financeStats['payables'] ?? '₱84K' }}
            </div>

            <div class="finance-stat-label">
                Payables
            </div>

            <div class="finance-stat-meta" id="statPayablesMeta">
                {{ $financeStats['payables_meta'] ?? '3 open items' }}
            </div>

        </div>


        {{-- 3. EXPENSES --}}
        <div class="finance-stat-card" id="kpiExpenses" role="button" tabindex="0" onclick="handleFinanceKpiClick('expense')" onkeydown="handleFinanceKpiKeydown(event, 'expense')" title="Click to view Expenses">

            <div class="finance-stat-icon">

                <svg
                    width="19"
                    height="19"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <polyline points="3 17 9 11 13 15 21 7"></polyline>
                    <polyline points="14 7 21 7 21 14"></polyline>
                </svg>

            </div>

            <div class="finance-stat-value" id="statExpenses">
                {{ $financeStats['expenses'] ?? '₱118K' }}
            </div>

            <div class="finance-stat-label">
                Expenses MTD
            </div>

            <div class="finance-stat-meta" id="statExpensesMeta">
                {{ $financeStats['expenses_meta'] ?? 'Within budget' }}
            </div>

        </div>


        {{-- 4. RECENT TRANSACTIONS --}}
        <div class="finance-stat-card" id="kpiTransactions" role="button" tabindex="0" onclick="handleFinanceKpiClick('transaction')" onkeydown="handleFinanceKpiKeydown(event, 'transaction')" title="Click to view Recent Transactions">

            <div class="finance-stat-icon">

                <svg
                    width="19"
                    height="19"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <polyline points="23 4 23 10 17 10"></polyline>
                    <polyline points="1 20 1 14 7 14"></polyline>
                    <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                </svg>

            </div>

            <div class="finance-stat-value" id="statTransactions">
                {{ $financeStats['transactions'] ?? 12 }}
            </div>

            <div class="finance-stat-label">
                Recent transactions
            </div>

            <div class="finance-stat-meta" id="statTransactionsMeta">
                {{ $financeStats['transactions_meta'] ?? 'Settled & posted' }}
            </div>

        </div>


        {{-- 5. FINANCE RECORDS --}}
        <div class="finance-stat-card" id="kpiRecords" role="button" tabindex="0" onclick="handleFinanceKpiClick('finance_record')" onkeydown="handleFinanceKpiKeydown(event, 'finance_record')" title="Click to view Finance Records">

            <div class="finance-stat-icon">

                <svg
                    width="19"
                    height="19"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>

            </div>

            <div class="finance-stat-value" id="statRecords">
                {{ $financeStats['finance_records'] ?? 16 }}
            </div>

            <div class="finance-stat-label">
                Finance records
            </div>

            <div class="finance-stat-meta" id="statRecordsMeta">
                {{ $financeStats['finance_records_meta'] ?? '16 ledger entries' }}
            </div>

        </div>

    </div>


    {{-- =========================================================
        MAIN FINANCE WORKSPACE
    ========================================================== --}}
    <div class="finance-content-card" id="financeWorkspace">

        {{-- =====================================================
            TABS
        ====================================================== --}}
        <div class="finance-tabs-wrapper">

            <div class="finance-tabs">

                <button type="button" class="finance-tab active" data-tab-type="all" onclick="filterFinanceTab(this, 'all')">
                    Overview
                </button>

                <button type="button" class="finance-tab" data-tab-type="receivable" onclick="filterFinanceTab(this, 'receivable')">
                    Receivables
                </button>

                <button type="button" class="finance-tab" data-tab-type="payable" onclick="filterFinanceTab(this, 'payable')">
                    Payables
                </button>

                <button type="button" class="finance-tab" data-tab-type="expense" onclick="filterFinanceTab(this, 'expense')">
                    Expenses
                </button>

                <button type="button" class="finance-tab" data-tab-type="request" onclick="filterFinanceTab(this, 'request')">
                    Requests
                </button>

                <button type="button" class="finance-tab" data-tab-type="transaction" onclick="filterFinanceTab(this, 'transaction')">
                    Transactions
                </button>

                <button type="button" class="finance-tab" data-tab-type="finance_record" onclick="filterFinanceTab(this, 'finance_record')">
                    Records
                </button>

            </div>

        </div>


        {{-- =====================================================
            TABLE SECTION
        ====================================================== --}}
        <div class="finance-table-section">

            <div class="finance-table-header">

                <div>

                    <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                        <h3 class="finance-table-title" style="margin: 0;">
                            Recent records &amp; activity
                        </h3>
                        <div id="financeActiveFilterBadge" style="display: none; align-items: center; gap: 6px;">
                            <span id="financeActiveFilterLabel" style="display: inline-flex; align-items: center; gap: 6px; padding: 2px 10px; border-radius: 12px; background: #eff6ff; border: 1px solid #bfdbfe; color: #1d4ed8; font-size: 11px; font-weight: 700;">
                                Filtered: Receivables
                            </span>
                            <button type="button" onclick="resetFinanceFilter()" title="Clear filter" style="background: none; border: none; cursor: pointer; color: #64748b; font-size: 14px; padding: 0 2px; line-height: 1;">
                                &times;
                            </button>
                        </div>
                    </div>

                    <p class="finance-table-description" style="margin-top: 4px;">
                        Financial records, transactions, receivables, payables, and vouchers for <strong style="color: #0f172a;">{{ session('client.account.name', $account?->profile?->legal_name ?? 'your ORDO account') }}</strong>.
                    </p>

                </div>


                <button type="button" class="finance-filter-btn" onclick="resetFinanceFilter()" title="Reset workspace filters">

                    <svg
                        width="14"
                        height="14"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <line x1="4" y1="6" x2="20" y2="6"></line>
                        <line x1="7" y1="12" x2="17" y2="12"></line>
                        <line x1="10" y1="18" x2="14" y2="18"></line>
                    </svg>

                    Filter

                </button>

            </div>


            {{-- =================================================
                RECORDS TABLE
            ================================================== --}}
            <div class="finance-table-container">

                <table class="finance-table">

                    <thead>

                        <tr>

                            <th>
                                REFERENCE
                            </th>

                            <th>
                                ITEM
                            </th>

                            <th>
                                CATEGORY / TYPE
                            </th>

                            <th>
                                AMOUNT
                            </th>

                            <th>
                                STATUS
                            </th>

                            <th>
                                DATE
                            </th>

                            <th class="finance-action-column">
                                ACTION
                            </th>

                        </tr>

                    </thead>


                    <tbody id="financeRecordsTableBody">

                        @forelse($financeRecords ?? [] as $record)
                            @php
                                $recObj = is_array($record) ? (object) $record : $record;
                                $recId = $recObj->id ?? ('rec_' . $loop->index);
                                $ref = $recObj->reference_no ?? 'FIN-000';
                                $title = $recObj->title ?? 'Untitled';
                                $category = $recObj->category ?? 'General';
                                $recType = $recObj->record_type ?? 'finance_record';
                                $typeLabel = match($recType) {
                                    'receivable' => 'Receivable',
                                    'payable' => 'Payable',
                                    'expense' => 'Expense',
                                    'transaction' => 'Transaction',
                                    'request' => 'Request',
                                    'finance_record' => 'Finance Record',
                                    default => ucfirst((string) $recType),
                                };
                                $amtFormatted = $recObj->formatted_amount ?? ('₱' . number_format((float) ($recObj->amount ?? 0), 2));
                                $dateFormatted = $recObj->formatted_record_date ?? (isset($recObj->record_date) ? \Carbon\Carbon::parse($recObj->record_date)->format('M d, Y') : '—');
                                $status = $recObj->status ?? 'Recorded';
                                $badgeClass = $recObj->status_badge_class ?? (match(strtolower(trim($status))) {
                                    'unpaid', 'overdue' => 'unpaid',
                                    'approved', 'settled', 'paid', 'completed' => 'approved',
                                    'recorded', 'active' => 'recorded',
                                    'pending', 'for review', 'in review', 'review', 'draft', 'pending approval' => 'pending',
                                    default => 'recorded',
                                });
                            @endphp
                            <tr id="finRow_{{ $recId }}" data-record-id="{{ $recId }}" data-record-type="{{ $recType }}" data-reference="{{ $ref }}" data-status="{{ strtolower($status) }}">

                                <td class="finance-reference">
                                    {{ $ref }}
                                </td>

                                <td class="finance-item">
                                    <strong>{{ $title }}</strong>
                                </td>

                                <td>
                                    <span class="finance-category">
                                        {{ $category }} &bull; {{ $typeLabel }}
                                    </span>
                                </td>

                                <td style="font-weight: 700; color: #0f172a; font-size: 13px;">
                                    {{ $amtFormatted }}
                                </td>

                                <td>
                                    <span class="finance-status {{ $badgeClass }}">
                                        <span class="finance-status-dot"></span>
                                        {{ $status }}
                                    </span>
                                </td>

                                <td class="finance-date">
                                    {{ $dateFormatted }}
                                </td>

                                <td class="finance-action-column">
                                    <button
                                        type="button"
                                        class="finance-view-btn"
                                        id="btnViewFin_{{ $recId }}"
                                        onclick='viewFinanceDetail(@json($record))'
                                    >
                                        View
                                    </button>
                                </td>

                            </tr>
                        @empty
                            <tr id="emptyFinanceRow">
                                <td colspan="7" style="text-align: center; padding: 40px; color: #64748b; font-size: 14px;">
                                    No financial records found. Click "+ New Finance Record" to create an entry.
                                </td>
                            </tr>
                        @endforelse

                        <tr id="emptyFinanceFilteredRow" style="display: none;">
                            <td colspan="7" style="text-align: center; padding: 36px; color: #64748b; font-size: 14px;">
                                No records found for this finance category.
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


{{-- =============================================================
    MODAL 1 & 2: + NEW / EDIT FINANCE RECORD
============================================================= --}}
<div id="financeModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); z-index: 9999; place-items: center; padding: 20px; overflow-y: auto;">
    <div style="background: #ffffff; border-radius: 12px; width: 100%; max-width: 680px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); overflow: hidden; margin: auto;">

        {{-- STAGE 1: RECORD TYPE SELECTION --}}
        <div id="financeTypeSelectionStage" style="padding: 24px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                <div>
                    <h3 style="margin: 0; font-size: 18px; font-weight: 700; color: #0f172a;">
                        Select Finance Record Type
                    </h3>
                    <p style="margin: 4px 0 0; font-size: 13px; color: #64748b;">
                        Choose the financial concept or document to record into the ledger:
                    </p>
                </div>
                <button type="button" onclick="closeFinanceModal()" style="background: none; border: none; cursor: pointer; color: #94a3b8; font-size: 20px; padding: 0 4px; line-height: 1;">
                    &times;
                </button>
            </div>

            <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px;">

                {{-- 1. Receivable --}}
                <div class="fin-type-card" onclick="selectFinanceType('receivable')" style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; cursor: pointer; transition: all .15s ease; background: #fff;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 7H5a3 3 0 0 1 0-6h13a2 2 0 0 1 2 2v4"></path><path d="M5 7h15a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a3 3 0 0 1-3-3V4"></path></svg>
                        </span>
                        <strong style="font-size: 14px; color: #0f172a;">Receivable</strong>
                    </div>
                    <p style="margin: 0; font-size: 12px; color: #64748b; line-height: 1.4;">
                        Client billing invoices, customer statement receivables, or payment claims.
                    </p>
                </div>

                {{-- 2. Payable --}}
                <div class="fin-type-card" onclick="selectFinanceType('payable')" style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; cursor: pointer; transition: all .15s ease; background: #fff;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; background: #fef3c7; color: #d97706;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><line x1="8" y1="13" x2="16" y2="13"></line></svg>
                        </span>
                        <strong style="font-size: 14px; color: #0f172a;">Payable</strong>
                    </div>
                    <p style="margin: 0; font-size: 12px; color: #64748b; line-height: 1.4;">
                        Supplier bills, accounts payable vouchers, contractor fees, and incoming invoices.
                    </p>
                </div>

                {{-- 3. Expense --}}
                <div class="fin-type-card" onclick="selectFinanceType('expense')" style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; cursor: pointer; transition: all .15s ease; background: #fff;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; background: #fee2e2; color: #dc2626;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 17 9 11 13 15 21 7"></polyline><polyline points="14 7 21 7 21 14"></polyline></svg>
                        </span>
                        <strong style="font-size: 14px; color: #0f172a;">Expense</strong>
                    </div>
                    <p style="margin: 0; font-size: 12px; color: #64748b; line-height: 1.4;">
                        Operational expenses, petty cash, software subscriptions, travel, and receipts.
                    </p>
                </div>

                {{-- 4. Transaction --}}
                <div class="fin-type-card" onclick="selectFinanceType('transaction')" style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; cursor: pointer; transition: all .15s ease; background: #fff;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; background: #ecfdf5; color: #059669;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                        </span>
                        <strong style="font-size: 14px; color: #0f172a;">Transaction</strong>
                    </div>
                    <p style="margin: 0; font-size: 12px; color: #64748b; line-height: 1.4;">
                        Bank deposits, wire settlements, check clearances, and automated payroll disbursements.
                    </p>
                </div>

                {{-- 5. Request --}}
                <div class="fin-type-card" onclick="selectFinanceType('request')" style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; cursor: pointer; transition: all .15s ease; background: #fff;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; background: #f3e8ff; color: #7c3aed;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                        </span>
                        <strong style="font-size: 14px; color: #0f172a;">Request</strong>
                    </div>
                    <p style="margin: 0; font-size: 12px; color: #64748b; line-height: 1.4;">
                        Purchase requisitions, cash advance requests, fund releases, and budget approvals.
                    </p>
                </div>

                {{-- 6. Finance Record --}}
                <div class="fin-type-card" onclick="selectFinanceType('finance_record')" style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; cursor: pointer; transition: all .15s ease; background: #fff;">
                    <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; background: #f1f5f9; color: #475569;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line></svg>
                        </span>
                        <strong style="font-size: 14px; color: #0f172a;">Finance Record</strong>
                    </div>
                    <p style="margin: 0; font-size: 12px; color: #64748b; line-height: 1.4;">
                        General finance records, audited financial statements, tax annexes, and ledger reconciliations.
                    </p>
                </div>

            </div>
        </div>

        {{-- STAGE 2: DEDICATED RECORD FORM --}}
        <div id="financeFormStage" style="display: none;">
            <div style="padding: 18px 24px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; background: #f8fafc;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span id="formFinTypeBadge" style="padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 700; background: #eff6ff; color: #2563eb;">
                        Receivable
                    </span>
                    <h3 id="financeModalTitle" style="margin: 0; font-size: 16px; font-weight: 700; color: #0f172a;">
                        Record New Entry
                    </h3>
                </div>

                <div style="display: flex; align-items: center; gap: 8px;">
                    <button type="button" id="btnChangeFinType" onclick="switchFinanceTypeBack()" style="background: none; border: 1px solid #cbd5e1; border-radius: 6px; padding: 4px 10px; font-size: 12px; font-weight: 600; color: #475569; cursor: pointer;">
                        Change Type
                    </button>
                    <button type="button" onclick="closeFinanceModal()" style="background: none; border: none; cursor: pointer; color: #94a3b8; font-size: 20px; padding: 0 4px; line-height: 1;">
                        &times;
                    </button>
                </div>
            </div>

            <form id="financeRecordForm" onsubmit="submitFinanceRecord(event)" style="padding: 24px;" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="record_type" id="finFormRecordType" value="receivable">
                <input type="hidden" id="finFormEditId" value="">

                <div id="finFormErrorAlert" style="display: none; background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 12px; border-radius: 8px; font-size: 13px; margin-bottom: 18px;"></div>

                {{-- FIELD GROUP 1: RECEIVABLE --}}
                <div class="fin-fields-group" id="fields_receivable">
                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Invoice Title / Description *</label>
                            <input type="text" name="title" class="fin-input-title" required placeholder="e.g. Client Advisory &amp; Consulting Retainer" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Amount (₱) *</label>
                            <input type="number" step="0.01" min="0" name="amount" required placeholder="0.00" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; font-weight: 600;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Client / Customer Name *</label>
                            <input type="text" name="metadata[client_name]" required placeholder="e.g. Apex Holdings Philippines Inc." style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Category / Classification *</label>
                            <input type="text" name="category" class="fin-input-category" required value="Receivable" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Invoice Date *</label>
                            <input type="date" name="record_date" class="fin-input-date" required value="{{ date('Y-m-d') }}" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Due Date</label>
                            <input type="date" name="due_date" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Status *</label>
                            <select name="status" class="fin-input-status" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; background: #fff;">
                                <option value="Unpaid">Unpaid</option>
                                <option value="Paid">Paid</option>
                                <option value="Overdue">Overdue</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- FIELD GROUP 2: PAYABLE --}}
                <div class="fin-fields-group" id="fields_payable" style="display: none;">
                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Bill Title / Payable Item *</label>
                            <input type="text" name="title" class="fin-input-title" required placeholder="e.g. AWS Cloud Infrastructure Hosting Bill" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Amount (₱) *</label>
                            <input type="number" step="0.01" min="0" name="amount" required placeholder="0.00" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; font-weight: 600;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Vendor / Supplier *</label>
                            <input type="text" name="metadata[vendor_name]" required placeholder="e.g. Amazon Web Services Inc." style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Category / Classification *</label>
                            <input type="text" name="category" class="fin-input-category" required value="Payable" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Bill Date *</label>
                            <input type="date" name="record_date" class="fin-input-date" required value="{{ date('Y-m-d') }}" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Due Date</label>
                            <input type="date" name="due_date" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Status *</label>
                            <select name="status" class="fin-input-status" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; background: #fff;">
                                <option value="Approved">Approved</option>
                                <option value="Pending">Pending</option>
                                <option value="Paid">Paid</option>
                                <option value="Unpaid">Unpaid</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- FIELD GROUP 3: EXPENSE --}}
                <div class="fin-fields-group" id="fields_expense" style="display: none;">
                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Expense Item / Merchant *</label>
                            <input type="text" name="title" class="fin-input-title" required placeholder="e.g. Enterprise Software License Renewals" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Amount (₱) *</label>
                            <input type="number" step="0.01" min="0" name="amount" required placeholder="0.00" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; font-weight: 600;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Merchant / Payee *</label>
                            <input type="text" name="metadata[payee]" required placeholder="e.g. Google &amp; Slack Enterprise" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Expense Classification *</label>
                            <input type="text" name="category" class="fin-input-category" required value="Expense" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Date *</label>
                            <input type="date" name="record_date" class="fin-input-date" required value="{{ date('Y-m-d') }}" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Payment Method</label>
                            <select name="metadata[payment_method]" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; background: #fff;">
                                <option value="Corporate Card">Corporate Card</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Petty Cash">Petty Cash</option>
                                <option value="Reimbursement">Reimbursement</option>
                            </select>
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Status *</label>
                            <select name="status" class="fin-input-status" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; background: #fff;">
                                <option value="Recorded">Recorded</option>
                                <option value="Approved">Approved</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- FIELD GROUP 4: TRANSACTION --}}
                <div class="fin-fields-group" id="fields_transaction" style="display: none;">
                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Transaction Reference / Subject *</label>
                            <input type="text" name="title" class="fin-input-title" required placeholder="e.g. Inbound Customer Wire Settlement" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Amount (₱) *</label>
                            <input type="number" step="0.01" min="0" name="amount" required placeholder="0.00" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; font-weight: 600;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Bank Account / Channel *</label>
                            <input type="text" name="metadata[bank_account]" required placeholder="e.g. Metrobank Corporate Cash #9921" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Category / Classification *</label>
                            <input type="text" name="category" class="fin-input-category" required value="Transaction" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Settlement Date *</label>
                            <input type="date" name="record_date" class="fin-input-date" required value="{{ date('Y-m-d') }}" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Trace / Reference No.</label>
                            <input type="text" name="metadata[trace_no]" placeholder="e.g. PNT-2026-0818-4421" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Status *</label>
                            <select name="status" class="fin-input-status" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; background: #fff;">
                                <option value="Settled">Settled</option>
                                <option value="Pending">Pending</option>
                                <option value="Recorded">Recorded</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- FIELD GROUP 5: REQUEST --}}
                <div class="fin-fields-group" id="fields_request" style="display: none;">
                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Request Subject / Requisition *</label>
                            <input type="text" name="title" class="fin-input-title" required placeholder="e.g. IT Equipment Hardware Requisition" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Estimated Amount (₱) *</label>
                            <input type="number" step="0.01" min="0" name="amount" required placeholder="0.00" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; font-weight: 600;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Department / Project *</label>
                            <input type="text" name="metadata[department]" required placeholder="e.g. Technology &amp; Systems" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Category / Classification *</label>
                            <input type="text" name="category" class="fin-input-category" required value="Request" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Request Date *</label>
                            <input type="date" name="record_date" class="fin-input-date" required value="{{ date('Y-m-d') }}" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Target Date</label>
                            <input type="date" name="due_date" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Status *</label>
                            <select name="status" class="fin-input-status" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; background: #fff;">
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Recorded">Recorded</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- FIELD GROUP 6: FINANCE RECORD (GENERAL) --}}
                <div class="fin-fields-group" id="fields_finance_record" style="display: none;">
                    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Title / Reference Name *</label>
                            <input type="text" name="title" class="fin-input-title" required placeholder="e.g. FY2025 Audited Financial Statements &amp; Tax Notes" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Amount (₱, Optional)</label>
                            <input type="number" step="0.01" min="0" name="amount" value="0.00" placeholder="0.00" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Category / Classification *</label>
                            <input type="text" name="category" class="fin-input-category" required value="Financial Record" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Custodian / Department</label>
                            <input type="text" name="metadata[custodian]" placeholder="e.g. Finance &amp; Accounting" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                    </div>

                    <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px; margin-bottom: 14px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Effective Date *</label>
                            <input type="date" name="record_date" class="fin-input-date" required value="{{ date('Y-m-d') }}" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Status *</label>
                            <select name="status" class="fin-input-status" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; background: #fff;">
                                <option value="Recorded">Recorded</option>
                                <option value="Approved">Approved</option>
                                <option value="Final">Final</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- COMMON FIELDS: DESCRIPTION & ATTACHMENT --}}
                <div style="margin-bottom: 14px;">
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Description / Notes</label>
                    <textarea name="description" id="finFormDesc" rows="3" placeholder="Provide background, invoice itemization, or accounting reference details..." style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; resize: vertical;"></textarea>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px;">Supporting Document (Optional PDF / Image)</label>
                    <input type="file" name="attachment" style="font-size: 12px; color: #475569;">
                    <span id="finAttachmentFileName" style="display: block; font-size: 11px; color: #64748b; margin-top: 4px;"></span>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 10px; border-top: 1px solid #e2e8f0; padding-top: 16px;">
                    <button type="button" onclick="closeFinanceModal()" style="background: #f1f5f9; color: #475569; border: none; padding: 9px 18px; border-radius: 6px; font-weight: 600; font-size: 13px; cursor: pointer;">
                        Cancel
                    </button>
                    <button type="submit" id="btnSaveFinanceRecord" style="background: #2563eb; color: #fff; border: none; padding: 9px 22px; border-radius: 6px; font-weight: 600; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                        <span id="btnSaveFinLabel">Save Entry</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>


{{-- =============================================================
    MODAL 3: VIEW FINANCE RECORD DETAILS
============================================================= --}}
<div id="financeDetailModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); z-index: 9999; place-items: center; padding: 20px; overflow-y: auto;">
    <div style="background: #ffffff; border-radius: 12px; width: 100%; max-width: 640px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); overflow: hidden; margin: auto;">
        <div style="padding: 20px 24px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center; background: #f8fafc;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <span id="detailFinRefNo" style="font-family: monospace; font-weight: 700; font-size: 13px; color: #2563eb; background: #eff6ff; padding: 3px 8px; border-radius: 6px;">
                    INV-2026-0182
                </span>
                <span id="detailFinTypeBadge" style="font-size: 12px; font-weight: 700; color: #475569; background: #e2e8f0; padding: 3px 8px; border-radius: 6px;">
                    Receivable
                </span>
            </div>
            <button type="button" onclick="closeFinanceDetailModal()" style="background: none; border: none; cursor: pointer; color: #94a3b8; font-size: 20px; padding: 0 4px; line-height: 1;">
                &times;
            </button>
        </div>

        <div style="padding: 24px;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 14px; margin-bottom: 16px;">
                <h3 id="detailFinTitle" style="margin: 0; font-size: 18px; font-weight: 700; color: #0f172a; line-height: 1.3;">
                    Client Advisory &amp; Consulting Invoice
                </h3>
                <span id="detailFinStatusBadge" class="finance-status unpaid">
                    <span class="finance-status-dot"></span>
                    <span id="detailFinStatusText">Unpaid</span>
                </span>
            </div>

            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 18px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <span style="font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase;">Recorded Amount</span>
                    <strong id="detailFinAmount" style="display: block; font-size: 22px; font-weight: 800; color: #0f172a; margin-top: 2px;">
                        ₱125,000.00
                    </strong>
                </div>
                <div style="text-align: right;">
                    <span style="font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase;">Transaction / Issue Date</span>
                    <span id="detailFinDate" style="display: block; font-size: 14px; font-weight: 600; color: #334155; margin-top: 2px;">
                        Aug 18, 2026
                    </span>
                </div>
            </div>

            {{-- METADATA GRID --}}
            <div id="detailFinMetaGrid" style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; margin-bottom: 20px;">
                {{-- Dynamic items injected via JS --}}
            </div>

            {{-- DESCRIPTION --}}
            <div style="margin-bottom: 20px;">
                <span style="font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase; display: block; margin-bottom: 4px;">
                    Description / Itemization Notes
                </span>
                <p id="detailFinDescription" style="margin: 0; font-size: 13px; color: #334155; line-height: 1.5; background: #fff; border: 1px solid #e2e8f0; border-radius: 6px; padding: 12px;">
                    None provided.
                </p>
            </div>

            {{-- ATTACHMENT --}}
            <div id="detailFinAttachmentSection" style="margin-bottom: 20px; display: none;">
                <span style="font-size: 11px; font-weight: 600; color: #64748b; text-transform: uppercase; display: block; margin-bottom: 6px;">
                    Supporting Document
                </span>
                <div style="display: inline-flex; align-items: center; gap: 8px; padding: 8px 12px; background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 6px;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
                    <span id="detailFinAttachmentName" style="font-size: 12px; font-weight: 600; color: #1e40af;">Invoice.pdf</span>
                </div>
            </div>

            {{-- ACTIONS (STRICTLY NO HARD DELETE BUTTON) --}}
            <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #e2e8f0; padding-top: 18px;">
                <button type="button" onclick="closeFinanceDetailModal()" style="background: #f1f5f9; color: #475569; border: none; padding: 9px 18px; border-radius: 6px; font-weight: 600; font-size: 13px; cursor: pointer;">
                    Close
                </button>

                <button type="button" id="btnEditFinanceFromDetail" onclick="editFinanceRecordFromDetail()" style="background: #2563eb; color: #ffffff; border: none; padding: 9px 22px; border-radius: 6px; font-weight: 600; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    Edit Record
                </button>
            </div>
        </div>
    </div>
</div>


{{-- =============================================================
    FINANCE PAGE STYLES
============================================================= --}}
<style>
    .finance-stats-grid {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 28px;
    }

    @media (max-width: 1200px) {
        .finance-stats-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }

    @media (max-width: 768px) {
        .finance-stats-grid {
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
    }

    .finance-stat-card {
        cursor: pointer;
        user-select: none;
        outline: none;
        position: relative;
        transition: border-color .18s ease, box-shadow .18s ease, transform .18s ease, background-color .18s ease;
    }
    .finance-stat-card:hover {
        border-color: #2563eb !important;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06), 0 2px 8px rgba(37, 99, 235, 0.08) !important;
        transform: translateY(-2px);
    }
    .finance-stat-card:focus-visible {
        border-color: #2563eb !important;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.25) !important;
    }
    .finance-stat-card:active {
        transform: translateY(0);
    }
    .finance-stat-card.active-kpi {
        border-color: #2563eb !important;
        background-color: #f8faff !important;
        box-shadow: 0 0 0 1.5px #2563eb, 0 4px 14px rgba(37, 99, 235, 0.1) !important;
    }

    .fin-type-card:hover {
        border-color: #2563eb !important;
        background: #f8faff !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(37, 99, 235, 0.08);
    }

    .kpi-pulse-updated {
        animation: kpiPulse 0.8s ease-out;
    }
    @keyframes kpiPulse {
        0% { transform: scale(1); color: #2563eb; }
        50% { transform: scale(1.15); color: #16a34a; }
        100% { transform: scale(1); }
    }
</style>


{{-- =============================================================
    CLIENT LOGIC / JAVASCRIPT
============================================================= --}}
@push('scripts')
<script>
    window.FIN_TYPE_CONFIG = {
        'receivable': { label: 'Receivable', badgeClass: 'unpaid', prefix: 'INV', defaultStatus: 'Unpaid' },
        'payable': { label: 'Payable', badgeClass: 'approved', prefix: 'PAY', defaultStatus: 'Approved' },
        'expense': { label: 'Expense', badgeClass: 'recorded', prefix: 'EXP', defaultStatus: 'Recorded' },
        'transaction': { label: 'Transaction', badgeClass: 'approved', prefix: 'TRX', defaultStatus: 'Settled' },
        'request': { label: 'Request', badgeClass: 'pending', prefix: 'REQ', defaultStatus: 'Pending' },
        'finance_record': { label: 'Finance Record', badgeClass: 'recorded', prefix: 'FIN', defaultStatus: 'Recorded' }
    };

    window.currentSelectedFinType = 'receivable';
    window.currentEditingFinanceRecord = null;
    window.currentFinanceDetailRecord = null;

    function openNewFinanceModal() {
        window.currentEditingFinanceRecord = null;
        document.getElementById('finFormEditId').value = '';
        document.getElementById('financeModalTitle').textContent = 'Record New Entry';
        document.getElementById('btnSaveFinLabel').textContent = 'Save Entry';
        document.getElementById('btnChangeFinType').style.display = 'inline-block';

        const form = document.getElementById('financeRecordForm');
        if (form) form.reset();

        document.getElementById('financeTypeSelectionStage').style.display = 'block';
        document.getElementById('financeFormStage').style.display = 'none';

        const modal = document.getElementById('financeModal');
        if (modal) modal.style.display = 'grid';
    }

    function closeFinanceModal() {
        const modal = document.getElementById('financeModal');
        if (modal) modal.style.display = 'none';
        const errEl = document.getElementById('finFormErrorAlert');
        if (errEl) errEl.style.display = 'none';
    }

    function selectFinanceType(typeKey) {
        window.currentSelectedFinType = typeKey;
        document.getElementById('finFormRecordType').value = typeKey;

        const config = FIN_TYPE_CONFIG[typeKey] || { label: 'Finance Record' };
        document.getElementById('formFinTypeBadge').textContent = config.label;

        // Toggle field groups and enable/disable inputs
        document.querySelectorAll('.fin-fields-group').forEach(group => {
            const isTarget = group.id === ('fields_' + typeKey);
            group.style.display = isTarget ? 'block' : 'none';
            group.querySelectorAll('input, select, textarea').forEach(inp => {
                inp.disabled = !isTarget;
            });
        });

        document.getElementById('financeTypeSelectionStage').style.display = 'none';
        document.getElementById('financeFormStage').style.display = 'block';
    }

    function switchFinanceTypeBack() {
        if (window.currentEditingFinanceRecord) return; // Prevent changing type in edit mode
        document.getElementById('financeFormStage').style.display = 'none';
        document.getElementById('financeTypeSelectionStage').style.display = 'block';
    }

    function submitFinanceRecord(event) {
        event.preventDefault();

        const form = document.getElementById('financeRecordForm');
        const errEl = document.getElementById('finFormErrorAlert');
        const btn = document.getElementById('btnSaveFinanceRecord');
        const btnLabel = document.getElementById('btnSaveFinLabel');

        errEl.style.display = 'none';
        btn.disabled = true;
        btnLabel.textContent = 'Saving...';

        const formData = new FormData(form);
        const editId = document.getElementById('finFormEditId').value;
        const isEdit = Boolean(editId);

        const targetUrl = isEdit ? `/finance/${editId}` : '{{ route("finance.store") }}';
        if (isEdit) {
            formData.append('_method', 'PUT');
        }

        fetch(targetUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(async response => {
            const data = await response.json();
            if (!response.ok) {
                let msg = data.message || 'Validation error occurred while saving the financial record.';
                if (data.errors) {
                    const firstKey = Object.keys(data.errors)[0];
                    msg = data.errors[firstKey][0];
                }
                throw new Error(msg);
            }
            return data;
        })
        .then(data => {
            closeFinanceModal();

            if (isEdit) {
                if (data.record) {
                    updateFinanceRecordInTable(data.record);
                    window.currentFinanceDetailRecord = data.record;
                }
            } else {
                form.reset();
                if (data.record) {
                    insertFinanceRecordIntoTable(data.record);
                }
            }

            if (data.stats) {
                updateFinanceStats(data.stats);
            }

            if (typeof toast === 'function') {
                toast(data.message || (isEdit ? 'Finance record updated successfully.' : 'Finance record recorded successfully.'));
            }
        })
        .catch(err => {
            errEl.innerHTML = `<strong>Error:</strong> ${err.message}`;
            errEl.style.display = 'block';
        })
        .finally(() => {
            btn.disabled = false;
            btnLabel.textContent = isEdit ? 'Save Changes' : 'Save Entry';
        });
    }

    function insertFinanceRecordIntoTable(rec) {
        const tbody = document.getElementById('financeRecordsTableBody');
        const emptyRow = document.getElementById('emptyFinanceRow');
        if (emptyRow) emptyRow.style.display = 'none';

        const config = FIN_TYPE_CONFIG[rec.record_type] || { label: 'Record' };
        const badgeClass = rec.status_badge_class || matchFinanceBadgeClass(rec.status);
        const formattedDate = rec.formatted_record_date || rec.record_date;
        const formattedAmt = rec.formatted_amount || ('₱' + Number(rec.amount || 0).toLocaleString('en-US', { minimumFractionDigits: 2 }));

        const tr = document.createElement('tr');
        tr.id = 'finRow_' + rec.id;
        tr.setAttribute('data-record-id', rec.id);
        tr.setAttribute('data-record-type', rec.record_type);
        tr.setAttribute('data-reference', rec.reference_no);
        tr.setAttribute('data-status', (rec.status || '').toLowerCase());
        tr.style.backgroundColor = '#eff6ff';
        tr.style.transition = 'background-color 1.5s ease';

        tr.innerHTML = `
            <td class="finance-reference">
                ${escapeHtml(rec.reference_no)}
            </td>
            <td class="finance-item">
                <strong>${escapeHtml(rec.title)}</strong>
            </td>
            <td>
                <span class="finance-category">
                    ${escapeHtml(rec.category)} &bull; ${escapeHtml(config.label)}
                </span>
            </td>
            <td style="font-weight: 700; color: #0f172a; font-size: 13px;">
                ${escapeHtml(formattedAmt)}
            </td>
            <td>
                <span class="finance-status ${badgeClass}">
                    <span class="finance-status-dot"></span>
                    ${escapeHtml(rec.status)}
                </span>
            </td>
            <td class="finance-date">
                ${escapeHtml(formattedDate)}
            </td>
            <td class="finance-action-column">
                <button type="button" class="finance-view-btn" id="btnViewFin_${rec.id}">
                    View
                </button>
            </td>
        `;

        tbody.insertBefore(tr, tbody.firstChild);

        const viewBtn = tr.querySelector(`#btnViewFin_${rec.id}`);
        if (viewBtn) {
            viewBtn.addEventListener('click', () => viewFinanceDetail(rec));
        }

        // Switch to the matching tab so the created record is immediately in view
        const targetTab = document.querySelector(`.finance-tabs .finance-tab[data-tab-type="${rec.record_type}"]`);
        if (targetTab) {
            filterFinanceTab(targetTab, rec.record_type);
        }

        setTimeout(() => {
            tr.style.backgroundColor = '';
        }, 1500);
    }

    function updateFinanceRecordInTable(rec) {
        let row = document.getElementById('finRow_' + rec.id)
            || document.querySelector(`tr[data-record-id="${rec.id}"]`)
            || document.querySelector(`tr[data-reference="${rec.reference_no}"]`);

        if (!row) {
            insertFinanceRecordIntoTable(rec);
            return;
        }

        const config = FIN_TYPE_CONFIG[rec.record_type] || { label: 'Record' };
        const badgeClass = rec.status_badge_class || matchFinanceBadgeClass(rec.status);
        const formattedDate = rec.formatted_record_date || rec.record_date;
        const formattedAmt = rec.formatted_amount || ('₱' + Number(rec.amount || 0).toLocaleString('en-US', { minimumFractionDigits: 2 }));

        row.setAttribute('data-record-id', rec.id);
        row.setAttribute('data-record-type', rec.record_type);
        row.setAttribute('data-reference', rec.reference_no);
        row.setAttribute('data-status', (rec.status || '').toLowerCase());

        row.innerHTML = `
            <td class="finance-reference">
                ${escapeHtml(rec.reference_no)}
            </td>
            <td class="finance-item">
                <strong>${escapeHtml(rec.title)}</strong>
            </td>
            <td>
                <span class="finance-category">
                    ${escapeHtml(rec.category)} &bull; ${escapeHtml(config.label)}
                </span>
            </td>
            <td style="font-weight: 700; color: #0f172a; font-size: 13px;">
                ${escapeHtml(formattedAmt)}
            </td>
            <td>
                <span class="finance-status ${badgeClass}">
                    <span class="finance-status-dot"></span>
                    ${escapeHtml(rec.status)}
                </span>
            </td>
            <td class="finance-date">
                ${escapeHtml(formattedDate)}
            </td>
            <td class="finance-action-column">
                <button type="button" class="finance-view-btn" id="btnViewFin_${rec.id}">
                    View
                </button>
            </td>
        `;

        const viewBtn = row.querySelector(`#btnViewFin_${rec.id}`);
        if (viewBtn) {
            viewBtn.addEventListener('click', () => viewFinanceDetail(rec));
        }

        row.style.backgroundColor = '#ecfdf5';
        row.style.transition = 'background-color 1.5s ease';
        setTimeout(() => {
            row.style.backgroundColor = '';
        }, 1500);
    }

    function viewFinanceDetail(rec) {
        window.currentFinanceDetailRecord = rec;

        const modal = document.getElementById('financeDetailModal');
        if (!modal) return;

        const config = FIN_TYPE_CONFIG[rec.record_type] || { label: 'Record' };
        const badgeClass = rec.status_badge_class || matchFinanceBadgeClass(rec.status);
        const formattedDate = rec.formatted_record_date || rec.record_date;
        const formattedAmt = rec.formatted_amount || ('₱' + Number(rec.amount || 0).toLocaleString('en-US', { minimumFractionDigits: 2 }));

        document.getElementById('detailFinRefNo').textContent = rec.reference_no || 'FIN-000';
        document.getElementById('detailFinTypeBadge').textContent = config.label;
        document.getElementById('detailFinTitle').textContent = rec.title || 'Untitled';

        const statusBadge = document.getElementById('detailFinStatusBadge');
        statusBadge.className = `finance-status ${badgeClass}`;
        document.getElementById('detailFinStatusText').textContent = rec.status || 'Recorded';

        document.getElementById('detailFinAmount').textContent = formattedAmt;
        document.getElementById('detailFinDate').textContent = formattedDate || '—';

        // Render metadata grid
        const metaGrid = document.getElementById('detailFinMetaGrid');
        metaGrid.innerHTML = '';

        const addMeta = (label, val) => {
            if (!val) return;
            const item = document.createElement('div');
            item.innerHTML = `
                <span style="font-size: 11px; color: #64748b; display: block; font-weight: 600; text-transform: uppercase;">${escapeHtml(label)}</span>
                <strong style="font-size: 13px; color: #0f172a;">${escapeHtml(val)}</strong>
            `;
            metaGrid.appendChild(item);
        };

        const m = rec.metadata || {};
        if (rec.record_type === 'receivable') {
            addMeta('Client / Customer', m.client_name);
            addMeta('Invoice Number', m.invoice_no);
            addMeta('Payment Terms', m.payment_terms);
            addMeta('Due Date', rec.formatted_due_date || rec.due_date);
            addMeta('Withholding Tax Info', m.tax_withheld);
        } else if (rec.record_type === 'payable') {
            addMeta('Vendor / Supplier', m.vendor_name);
            addMeta('Bill / Voucher No.', m.bill_no);
            addMeta('Payment Method', m.payment_method);
            addMeta('Due Date', rec.formatted_due_date || rec.due_date);
        } else if (rec.record_type === 'expense') {
            addMeta('Merchant / Payee', m.payee);
            addMeta('Expense Classification', m.expense_type);
            addMeta('Payment Method', m.payment_method);
        } else if (rec.record_type === 'transaction') {
            addMeta('Transaction Type', m.transaction_type);
            addMeta('Bank Account / Channel', m.bank_account);
            addMeta('Trace / Ref No.', m.trace_no);
        } else if (rec.record_type === 'request') {
            addMeta('Department / Project', m.department);
            addMeta('Requester', m.requester);
            addMeta('Priority / Urgency', m.priority);
            addMeta('Target Date', rec.formatted_due_date || rec.due_date);
        } else if (rec.record_type === 'finance_record') {
            addMeta('Record Classification', m.record_category);
            addMeta('Custodian / Department', m.custodian);
            addMeta('External Auditor', m.auditor);
        }

        const descEl = document.getElementById('detailFinDescription');
        if (descEl) descEl.textContent = rec.description || 'No description provided.';

        const attachSec = document.getElementById('detailFinAttachmentSection');
        const attachName = document.getElementById('detailFinAttachmentName');
        if (attachSec && attachName) {
            if (rec.attachment_name) {
                attachName.textContent = rec.attachment_name;
                attachSec.style.display = 'block';
            } else {
                attachSec.style.display = 'none';
            }
        }

        modal.style.display = 'grid';
    }

    function closeFinanceDetailModal() {
        const modal = document.getElementById('financeDetailModal');
        if (modal) modal.style.display = 'none';
    }

    function editFinanceRecordFromDetail() {
        const rec = window.currentFinanceDetailRecord;
        if (!rec) return;

        closeFinanceDetailModal();

        window.currentEditingFinanceRecord = rec;
        document.getElementById('finFormEditId').value = rec.id;
        document.getElementById('financeModalTitle').textContent = `Edit Record (${rec.reference_no})`;
        document.getElementById('btnSaveFinLabel').textContent = 'Save Changes';
        document.getElementById('btnChangeFinType').style.display = 'none';

        selectFinanceType(rec.record_type);

        const groupEl = document.getElementById('fields_' + rec.record_type);
        if (groupEl) {
            const titleInput = groupEl.querySelector('.fin-input-title');
            const categoryInput = groupEl.querySelector('.fin-input-category');
            const dateInput = groupEl.querySelector('.fin-input-date');
            const statusInput = groupEl.querySelector('.fin-input-status');
            const amountInput = groupEl.querySelector('[name="amount"]');
            const dueDateInput = groupEl.querySelector('[name="due_date"]');

            if (titleInput) titleInput.value = rec.title || '';
            if (categoryInput) categoryInput.value = rec.category || '';
            if (dateInput) dateInput.value = rec.record_date ? String(rec.record_date).substring(0, 10) : '';
            if (statusInput) statusInput.value = rec.status || 'Recorded';
            if (amountInput) amountInput.value = rec.amount || 0;
            if (dueDateInput && rec.due_date) dueDateInput.value = String(rec.due_date).substring(0, 10);

            // Populate metadata inputs
            const m = rec.metadata || {};
            for (const [key, val] of Object.entries(m)) {
                const inp = groupEl.querySelector(`[name="metadata[${key}]"]`);
                if (inp) inp.value = val;
            }
        }

        const descInput = document.getElementById('finFormDesc');
        if (descInput) descInput.value = rec.description || '';

        const fileLabel = document.getElementById('finAttachmentFileName');
        if (fileLabel) {
            if (rec.attachment_name) {
                fileLabel.textContent = 'Current: ' + rec.attachment_name;
                fileLabel.style.color = '#2563eb';
            } else {
                fileLabel.textContent = 'No file attached';
                fileLabel.style.color = '#64748b';
            }
        }

        const modal = document.getElementById('financeModal');
        if (modal) modal.style.display = 'grid';
    }

    function setActiveFinanceKpiCard(kpiKey) {
        document.querySelectorAll('.finance-stats-grid .finance-stat-card').forEach(card => card.classList.remove('active-kpi'));
        if (!kpiKey) return;

        let targetId = null;
        if (kpiKey === 'receivable') targetId = 'kpiReceivables';
        else if (kpiKey === 'payable') targetId = 'kpiPayables';
        else if (kpiKey === 'expense') targetId = 'kpiExpenses';
        else if (kpiKey === 'transaction') targetId = 'kpiTransactions';
        else if (kpiKey === 'finance_record') targetId = 'kpiRecords';

        if (targetId) {
            const cardEl = document.getElementById(targetId);
            if (cardEl) cardEl.classList.add('active-kpi');
        }
    }

    function handleFinanceKpiKeydown(event, kpiKey) {
        if (event.key === 'Enter' || event.key === ' ' || event.code === 'Space') {
            event.preventDefault();
            handleFinanceKpiClick(kpiKey);
        }
    }

    function handleFinanceKpiClick(kpiKey) {
        const workspace = document.getElementById('financeWorkspace');
        const tabBtn = document.querySelector(`.finance-tabs .finance-tab[data-tab-type="${kpiKey}"]`);

        if (tabBtn) {
            filterFinanceTab(tabBtn, kpiKey);
        }
        setActiveFinanceKpiCard(kpiKey);

        if (workspace) {
            workspace.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function filterFinanceTab(tabBtn, typeKey) {
        document.querySelectorAll('.finance-tabs .finance-tab').forEach(t => t.classList.remove('active'));
        if (tabBtn) tabBtn.classList.add('active');

        // Update filter badge
        const badge = document.getElementById('financeActiveFilterBadge');
        const label = document.getElementById('financeActiveFilterLabel');

        if (typeKey === 'all') {
            if (badge) badge.style.display = 'none';
            setActiveFinanceKpiCard(null);
        } else {
            const config = FIN_TYPE_CONFIG[typeKey] || { label: typeKey };
            if (badge) badge.style.display = 'inline-flex';
            if (label) label.textContent = `Filtered: ${config.label}`;
            setActiveFinanceKpiCard(typeKey);
        }

        const rows = document.querySelectorAll('#financeRecordsTableBody tr:not(#emptyFinanceRow):not(#emptyFinanceFilteredRow)');
        let visibleCount = 0;

        rows.forEach(row => {
            const rowType = row.getAttribute('data-record-type') || '';
            if (typeKey === 'all' || rowType === typeKey) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        const emptyFilteredRow = document.getElementById('emptyFinanceFilteredRow');
        if (emptyFilteredRow) {
            emptyFilteredRow.style.display = visibleCount === 0 ? '' : 'none';
        }
    }

    function resetFinanceFilter() {
        const overviewTab = document.querySelector('.finance-tabs .finance-tab[data-tab-type="all"]') || document.querySelector('.finance-tabs .finance-tab');
        if (overviewTab) {
            filterFinanceTab(overviewTab, 'all');
        }
        setActiveFinanceKpiCard(null);
        const badge = document.getElementById('financeActiveFilterBadge');
        if (badge) badge.style.display = 'none';
    }

    function updateFinanceStats(stats) {
        if (!stats) return;

        const recEl = document.getElementById('statReceivables');
        const recMeta = document.getElementById('statReceivablesMeta');
        const payEl = document.getElementById('statPayables');
        const payMeta = document.getElementById('statPayablesMeta');
        const expEl = document.getElementById('statExpenses');
        const expMeta = document.getElementById('statExpensesMeta');
        const trxEl = document.getElementById('statTransactions');
        const trxMeta = document.getElementById('statTransactionsMeta');
        const totEl = document.getElementById('statRecords');
        const totMeta = document.getElementById('statRecordsMeta');

        const triggerPulse = (el, val) => {
            if (!el || val === undefined) return;
            const strVal = String(val);
            if (el.textContent.trim() !== strVal) {
                el.textContent = strVal;
                el.classList.remove('kpi-pulse-updated');
                void el.offsetWidth;
                el.classList.add('kpi-pulse-updated');
            }
        };

        if (stats.receivables !== undefined) triggerPulse(recEl, stats.receivables);
        if (stats.receivables_meta && recMeta) recMeta.textContent = stats.receivables_meta;

        if (stats.payables !== undefined) triggerPulse(payEl, stats.payables);
        if (stats.payables_meta && payMeta) payMeta.textContent = stats.payables_meta;

        if (stats.expenses !== undefined) triggerPulse(expEl, stats.expenses);
        if (stats.expenses_meta && expMeta) expMeta.textContent = stats.expenses_meta;

        if (stats.transactions !== undefined) triggerPulse(trxEl, stats.transactions);
        if (stats.transactions_meta && trxMeta) trxMeta.textContent = stats.transactions_meta;

        if (stats.finance_records !== undefined) triggerPulse(totEl, stats.finance_records);
        if (stats.finance_records_meta && totMeta) totMeta.textContent = stats.finance_records_meta;
    }

    function matchFinanceBadgeClass(status) {
        if (!status) return 'recorded';
        switch (status.toLowerCase().trim()) {
            case 'unpaid':
            case 'overdue': return 'unpaid';
            case 'approved':
            case 'settled':
            case 'paid':
            case 'completed': return 'approved';
            case 'recorded':
            case 'active': return 'recorded';
            case 'pending':
            case 'for review':
            case 'in review':
            case 'review':
            case 'draft':
            case 'pending approval': return 'pending';
            default: return 'recorded';
        }
    }

    function escapeHtml(str) {
        if (!str) return '';
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const kpiParam = urlParams.get('kpi');
        if (kpiParam) {
            setTimeout(() => handleFinanceKpiClick(kpiParam), 80);
        }

        const modalMode = urlParams.get('modal');
        if (modalMode === 'new') {
            openNewFinanceModal();
        } else if (modalMode === 'type') {
            const type = urlParams.get('type') || 'receivable';
            openNewFinanceModal();
            selectFinanceType(type);
        } else if (modalMode === 'view') {
            const firstRowView = document.querySelector('.finance-table .finance-view-btn');
            if (firstRowView) firstRowView.click();
        }
    });
</script>
@endpush

@endsection