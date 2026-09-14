@extends('layouts.client')

@section('title', 'Finance Settings')

@section('header-title', 'Finance Settings')

@section('content')

<div class="page-header">
    <div>
        <div class="card-label">
            MODULE SETTINGS
        </div>

        <h1 class="page-title">
            Finance Settings &amp; Configuration
        </h1>

        <p class="page-description">
            One central source of truth for financial rules, currency, tax rates, chart of accounts, numbering formats, approval thresholds, and permissions.
        </p>
    </div>

    <div>
        <a href="{{ route('finance') }}" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none; padding: 9px 16px; font-size: 13px; font-weight: 600; border-radius: 8px; border: 1px solid #d1d5db; color: #374151; background: #fff;">
            &larr; Back to Finance Dashboard
        </a>
    </div>
</div>

@if (session('status'))
    <div style="background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 14px 18px; border-radius: 8px; font-size: 13px; margin-bottom: 24px; font-weight: 600; display: flex; align-items: center; gap: 10px;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"></path></svg>
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('settings.modules.finance.update') }}">
    @csrf

    {{-- 1. MODULE STATUS --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            1. MODULE STATUS
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap; margin-top: 10px;">
            <div>
                <h2 class="card-title">
                    Finance Module Engine
                </h2>
                <p class="card-description">
                    Controls workspace active status, ledger recording, and billing workflows for this account.
                </p>
            </div>

            <div style="display: flex; align-items: center; gap: 12px;">
                <span style="padding: 6px 14px; border-radius: 999px; background: #dcfce7; color: #166534; font-size: 12px; font-weight: 700;">
                    Active &bull; Operational
                </span>
                <label style="display: inline-flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    <input type="checkbox" name="module_enabled" value="1" checked style="width: 18px; height: 18px; accent-color: #2563eb;">
                    Enabled
                </label>
            </div>
        </div>
    </div>

    {{-- 2. CURRENCY SETTINGS --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            2. CURRENCY SETTINGS
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Base &amp; Multi-Currency Rules
        </h2>
        <p class="card-description">
            Set the primary functional ledger currency and secondary exchange conversion rules.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Primary Functional Currency
                </label>
                <select name="default_currency" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="PHP" selected>PHP - Philippine Peso (₱)</option>
                    <option value="USD">USD - US Dollar ($)</option>
                    <option value="EUR">EUR - Euro (€)</option>
                    <option value="SGD">SGD - Singapore Dollar (S$)</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Exchange Rate Reference
                </label>
                <select name="exchange_rate_source" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="bsp" selected>Bangko Sentral ng Pilipinas (BSP Daily Reference)</option>
                    <option value="ecb">European Central Bank (ECB)</option>
                    <option value="manual">Manual Fixed Conversion Rates</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Decimal Precision
                </label>
                <select name="decimal_places" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="2" selected>2 Decimals (₱0.00 standard)</option>
                    <option value="4">4 Decimals (High precision forensic)</option>
                </select>
            </div>
        </div>
    </div>

    {{-- 3. TAX SETTINGS --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            3. TAX SETTINGS
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Tax Rates &amp; Statutory Withholdings
        </h2>
        <p class="card-description">
            Configure value-added tax (VAT) rates and creditable withholding tax (CWT) treatment.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Standard VAT Rate
                </label>
                <select name="tax_rate" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="12" selected>12% Standard VAT</option>
                    <option value="0">0% Zero-Rated / Export</option>
                    <option value="exempt">VAT Exempt</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Default CWT Rate (BIR Form 2307)
                </label>
                <select name="cwt_rate" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="2" selected>2% - Professional / Consulting Services</option>
                    <option value="1">1% - Goods &amp; Supplies</option>
                    <option value="5">5% - Commercial Rentals &amp; Leases</option>
                    <option value="10">10% - Professional Fees (Individual)</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Tax Identification Number (TIN)
                </label>
                <input type="text" name="tin" value="009-882-104-000" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
            </div>
        </div>
    </div>

    {{-- 4. CHART OF ACCOUNTS / FINANCE CATEGORIES --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            4. CHART OF ACCOUNTS / FINANCE CATEGORIES
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Financial Account Categories
        </h2>
        <p class="card-description">
            Standard classification hierarchy for financial entries and general ledger recording.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px;">
            <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #2563eb; text-transform: uppercase;">1000 - Assets</span>
                <strong style="display: block; font-size: 13px; color: #0f172a; margin-top: 4px;">Cash &amp; Receivables</strong>
                <p style="margin: 4px 0 0; font-size: 11px; color: #64748b;">Operating accounts, trade receivables, petty cash reserves.</p>
            </div>

            <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #d97706; text-transform: uppercase;">2000 - Liabilities</span>
                <strong style="display: block; font-size: 13px; color: #0f172a; margin-top: 4px;">Payables &amp; Accruals</strong>
                <p style="margin: 4px 0 0; font-size: 11px; color: #64748b;">Supplier accounts payable, tax liabilities, loans payable.</p>
            </div>

            <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #059669; text-transform: uppercase;">4000 - Revenue</span>
                <strong style="display: block; font-size: 13px; color: #0f172a; margin-top: 4px;">Advisory &amp; Services</strong>
                <p style="margin: 4px 0 0; font-size: 11px; color: #64748b;">Consulting fees, retainers, management service income.</p>
            </div>

            <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #dc2626; text-transform: uppercase;">6000 - Expenses</span>
                <strong style="display: block; font-size: 13px; color: #0f172a; margin-top: 4px;">Operating Expenses</strong>
                <p style="margin: 4px 0 0; font-size: 11px; color: #64748b;">Hosting, rent, payroll, travel, software subscriptions.</p>
            </div>
        </div>
    </div>

    {{-- 5. TRANSACTION & REQUEST TYPES --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            5. TRANSACTION AND REQUEST TYPES
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Document Classifications
        </h2>
        <p class="card-description">
            Enabled document structures across receivables, payables, expenses, transactions, and requests.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px;">
            <label style="display: flex; align-items: flex-start; gap: 10px; padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer;">
                <input type="checkbox" name="types[receivable]" value="1" checked style="margin-top: 2px; accent-color: #2563eb;">
                <div>
                    <strong style="font-size: 13px; color: #1e293b;">Client Invoices (Receivables)</strong>
                    <p style="margin: 3px 0 0; font-size: 12px; color: #64748b;">Billing statements, client invoicing, fee billing.</p>
                </div>
            </label>

            <label style="display: flex; align-items: flex-start; gap: 10px; padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer;">
                <input type="checkbox" name="types[payable]" value="1" checked style="margin-top: 2px; accent-color: #2563eb;">
                <div>
                    <strong style="font-size: 13px; color: #1e293b;">Supplier Bills (Payables)</strong>
                    <p style="margin: 3px 0 0; font-size: 12px; color: #64748b;">Vendor invoices, contractor fees, utility bills.</p>
                </div>
            </label>

            <label style="display: flex; align-items: flex-start; gap: 10px; padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer;">
                <input type="checkbox" name="types[expense]" value="1" checked style="margin-top: 2px; accent-color: #2563eb;">
                <div>
                    <strong style="font-size: 13px; color: #1e293b;">Operational Expenses</strong>
                    <p style="margin: 3px 0 0; font-size: 12px; color: #64748b;">Petty cash receipts, corporate card charges, reimbursements.</p>
                </div>
            </label>

            <label style="display: flex; align-items: flex-start; gap: 10px; padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer;">
                <input type="checkbox" name="types[transaction]" value="1" checked style="margin-top: 2px; accent-color: #2563eb;">
                <div>
                    <strong style="font-size: 13px; color: #1e293b;">Banking Transactions</strong>
                    <p style="margin: 3px 0 0; font-size: 12px; color: #64748b;">Wire settlements, checks, payroll auto-debits.</p>
                </div>
            </label>

            <label style="display: flex; align-items: flex-start; gap: 10px; padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer;">
                <input type="checkbox" name="types[request]" value="1" checked style="margin-top: 2px; accent-color: #2563eb;">
                <div>
                    <strong style="font-size: 13px; color: #1e293b;">Purchase &amp; Fund Requests</strong>
                    <p style="margin: 3px 0 0; font-size: 12px; color: #64748b;">Capital expenditures, travel advances, requisitions.</p>
                </div>
            </label>

            <label style="display: flex; align-items: flex-start; gap: 10px; padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer;">
                <input type="checkbox" name="types[finance_record]" value="1" checked style="margin-top: 2px; accent-color: #2563eb;">
                <div>
                    <strong style="font-size: 13px; color: #1e293b;">Statutory Finance Records</strong>
                    <p style="margin: 3px 0 0; font-size: 12px; color: #64748b;">Audited statements, tax schedules, bank reconciliations.</p>
                </div>
            </label>
        </div>
    </div>

    {{-- 6. NUMBERING FORMATS --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            6. NUMBERING FORMATS
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Auto-Generated Reference Formats
        </h2>
        <p class="card-description">
            Customize reference prefixes and numbering sequences for financial records.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Receivables Prefix
                </label>
                <input type="text" name="prefix_receivable" value="INV-YYYY-XXXX" readonly style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc; font-size: 13px; color: #475569;">
                <span style="font-size: 11px; color: #64748b; margin-top: 4px; display: block;">Example: INV-2026-0185</span>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Payables Prefix
                </label>
                <input type="text" name="prefix_payable" value="PAY-YYYY-XXXX" readonly style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc; font-size: 13px; color: #475569;">
                <span style="font-size: 11px; color: #64748b; margin-top: 4px; display: block;">Example: PAY-2026-0064</span>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Expenses Prefix
                </label>
                <input type="text" name="prefix_expense" value="EXP-YYYY-XXXX" readonly style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc; font-size: 13px; color: #475569;">
                <span style="font-size: 11px; color: #64748b; margin-top: 4px; display: block;">Example: EXP-2026-0148</span>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Transactions Prefix
                </label>
                <input type="text" name="prefix_transaction" value="TRX-YYYY-XXXX" readonly style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc; font-size: 13px; color: #475569;">
                <span style="font-size: 11px; color: #64748b; margin-top: 4px; display: block;">Example: TRX-2026-0037</span>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Requests Prefix
                </label>
                <input type="text" name="prefix_request" value="REQ-YYYY-XXXX" readonly style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc; font-size: 13px; color: #475569;">
                <span style="font-size: 11px; color: #64748b; margin-top: 4px; display: block;">Example: REQ-2026-0014</span>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Finance Records Prefix
                </label>
                <input type="text" name="prefix_finance" value="FIN-YYYY-XXXX" readonly style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc; font-size: 13px; color: #475569;">
                <span style="font-size: 11px; color: #64748b; margin-top: 4px; display: block;">Example: FIN-2026-0098</span>
            </div>
        </div>
    </div>

    {{-- 7. APPROVAL FLOWS & THRESHOLDS --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            7. APPROVAL FLOWS &amp; THRESHOLDS
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Financial Governance &amp; Signing Limits
        </h2>
        <p class="card-description">
            Define approval requirements before payments, reimbursements, or fund releases are authorized.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px;">
            <div style="padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #059669; text-transform: uppercase;">Tier 1: Standard</span>
                <strong style="display: block; font-size: 14px; color: #0f172a; margin-top: 4px;">Up to ₱25,000.00</strong>
                <p style="margin: 4px 0 0; font-size: 12px; color: #64748b;">Authorized by Department Manager or Assigned Reviewer.</p>
            </div>

            <div style="padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #2563eb; text-transform: uppercase;">Tier 2: Elevated</span>
                <strong style="display: block; font-size: 14px; color: #0f172a; margin-top: 4px;">₱25,001.00 to ₱150,000.00</strong>
                <p style="margin: 4px 0 0; font-size: 12px; color: #64748b;">Requires Finance Director or Chief Financial Officer approval.</p>
            </div>

            <div style="padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #7c3aed; text-transform: uppercase;">Tier 3: Executive</span>
                <strong style="display: block; font-size: 14px; color: #0f172a; margin-top: 4px;">Above ₱150,000.00</strong>
                <p style="margin: 4px 0 0; font-size: 12px; color: #64748b;">Requires Board Resolution or Chief Executive Officer dual sign-off.</p>
            </div>
        </div>
    </div>

    {{-- 8. PAYMENT & BILLING DEFAULTS --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            8. PAYMENT &amp; BILLING DEFAULTS
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Settlement &amp; Billing Defaults
        </h2>
        <p class="card-description">
            Configure standard terms and primary corporate banking payout accounts.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Standard Payment Terms
                </label>
                <select name="payment_terms" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="net30" selected>Net 30 Days</option>
                    <option value="net15">Net 15 Days</option>
                    <option value="immediate">Due on Receipt</option>
                    <option value="net60">Net 60 Days</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Primary Disbursement Channel
                </label>
                <select name="disbursement_channel" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="bank_transfer" selected>Corporate Bank Transfer (PESONet / InstaPay)</option>
                    <option value="check">Corporate Check Payment</option>
                    <option value="wire">RTGS / International Wire</option>
                    <option value="card">Corporate Credit Card</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Primary Operating Bank Account
                </label>
                <input type="text" name="default_bank" value="BDO Corporate Checking #1044-8891-22" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
            </div>
        </div>
    </div>

    {{-- 9. MODULE USER PERMISSIONS --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            9. MODULE USER PERMISSIONS
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Role-Based Access Control
        </h2>
        <p class="card-description">
            Manage granular access permissions for finance personnel, reviewers, and team members.
        </p>

        <div style="margin-top: 18px; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
                <thead style="background: #f8fafc; border-bottom: 1px solid #e5e7eb;">
                    <tr>
                        <th style="padding: 12px 16px; font-weight: 600; color: #475569;">Role</th>
                        <th style="padding: 12px 16px; font-weight: 600; color: #475569;">View Records</th>
                        <th style="padding: 12px 16px; font-weight: 600; color: #475569;">Create &amp; Edit</th>
                        <th style="padding: 12px 16px; font-weight: 600; color: #475569;">Approve &amp; Release</th>
                        <th style="padding: 12px 16px; font-weight: 600; color: #475569;">Export Reports</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">Account Administrator</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">Finance Manager / CPA</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Tier 1 &amp; 2</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">Staff Bookkeeper / Requester</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Departmental</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Drafts only</td>
                        <td style="padding: 12px 16px; color: #dc2626;">&times; Disabled</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Summary only</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">External Auditor (View-Only)</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Read-Only</td>
                        <td style="padding: 12px 16px; color: #dc2626;">&times; Disabled</td>
                        <td style="padding: 12px 16px; color: #dc2626;">&times; Disabled</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Audit Trail</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- SAVE BUTTON --}}
    <div class="card" style="margin-bottom: 32px;">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap;">
            <div>
                <div class="card-label">
                    CONFIGURATION COMMIT
                </div>
                <p style="margin: 7px 0 0; color: #6b7280; font-size: 13px;">
                    Apply and persist the updated Finance configuration as the single source of truth for this account.
                </p>
            </div>

            <button type="submit" class="btn btn-primary" style="background: #2563eb; color: #fff; border: none; padding: 11px 24px; border-radius: 8px; font-weight: 600; font-size: 14px; cursor: pointer;">
                Save Finance Configuration
            </button>
        </div>
    </div>
</form>

@endsection
