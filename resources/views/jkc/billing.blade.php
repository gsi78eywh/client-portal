@extends('layouts.client')

@section('title', 'Billing')

@section('header-title', 'Billing')

@section('content')

<div class="billing-page">

    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}
    <div class="billing-header">

        <div class="billing-header-copy">

            <div class="billing-eyebrow">
                JK&amp;C
            </div>

            <h1 class="billing-title">
                Billing
            </h1>

            <p class="billing-description">
                A single account view for invoices, payments and Statements of Account.
            </p>

        </div>

        <button type="button" class="btn btn-secondary billing-soa-btn">
            Download SOA
        </button>

    </div>


    {{-- =========================================================
         BILLING SUMMARY CARDS
    ========================================================== --}}
    <div class="billing-summary-grid">

        {{-- OUTSTANDING BALANCE --}}
        <div class="billing-summary-card">

            <div class="billing-card-icon">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.8"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5z"
                    />
                </svg>

            </div>

            <div class="billing-summary-value">
                ₱25,000
            </div>

            <div class="billing-summary-label">
                Outstanding balance
            </div>

            <div class="billing-summary-note">
                Across open invoices
            </div>

        </div>


        {{-- OVERDUE --}}
        <div class="billing-summary-card">

            <div class="billing-card-icon">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.8"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 14.25h6m-6-3h6m-6-3h3m8.25 10.5H6.75A2.25 2.25 0 0 1 4.5 16.5v-9A2.25 2.25 0 0 1 6.75 5.25h4.5L15 9v7.5a2.25 2.25 0 0 1-2.25 2.25Z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M11.25 5.25V9H15"
                    />

                </svg>

            </div>

            <div class="billing-summary-value">
                ₱0
            </div>

            <div class="billing-summary-label">
                Overdue
            </div>

            <div class="billing-summary-note">
                No overdue amount
            </div>

        </div>


        {{-- NEXT DUE --}}
        <div class="billing-summary-card">

            <div class="billing-card-icon">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.8"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3.75 8.25h16.5M5.25 5.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25A2.25 2.25 0 0 1 18.75 21H5.25A2.25 2.25 0 0 1 3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25Z"
                    />

                </svg>

            </div>

            <div class="billing-summary-value">
                Aug 27
            </div>

            <div class="billing-summary-label">
                Next due
            </div>

            <div class="billing-summary-note">
                ₱15,000
            </div>

        </div>


        {{-- PAID YTD --}}
        <div class="billing-summary-card">

            <div class="billing-card-icon">

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.8"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                    />

                </svg>

            </div>

            <div class="billing-summary-value">
                ₱145,000
            </div>

            <div class="billing-summary-label">
                Paid YTD
            </div>

            <div class="billing-summary-note">
                12 payments
            </div>

        </div>

    </div>


    {{-- =========================================================
         BILLING CONTENT
    ========================================================== --}}
    <div class="billing-main-card">

        {{-- =====================================================
             TABS
        ====================================================== --}}
        <div class="billing-tabs">

            <button
                type="button"
                class="billing-tab active"
                onclick="showBillingTab('summary', this)"
            >
                Account Summary
            </button>

            <button
                type="button"
                class="billing-tab"
                onclick="showBillingTab('invoices', this)"
            >
                Invoices
            </button>

            <button
                type="button"
                class="billing-tab"
                onclick="showBillingTab('payments', this)"
            >
                Payments
            </button>

            <button
                type="button"
                class="billing-tab"
                onclick="showBillingTab('statement', this)"
            >
                Statement of Account
            </button>

        </div>


        {{-- =====================================================
             ACCOUNT SUMMARY TAB
        ====================================================== --}}
        <div
            id="billing-summary-tab"
            class="billing-tab-content active"
        >

            <div class="billing-two-column">


                {{-- ACCOUNT BALANCE --}}
                <div class="billing-section">

                    <h2 class="billing-section-title">
                        Account balance
                    </h2>

                    <div class="billing-balance-box">

                        <div class="billing-balance-row">

                            <span>
                                Total charges
                            </span>

                            <strong>
                                ₱170,000
                            </strong>

                        </div>


                        <div class="billing-balance-row">

                            <span>
                                Payments
                            </span>

                            <strong>
                                ₱145,000
                            </strong>

                        </div>


                        <div class="billing-balance-row billing-balance-row-total">

                            <span>
                                Outstanding
                            </span>

                            <strong>
                                ₱25,000
                            </strong>

                        </div>

                    </div>

                </div>


                {{-- NEXT PAYMENT --}}
                <div class="billing-section">

                    <h2 class="billing-section-title">
                        Next payment
                    </h2>

                    <div class="billing-next-payment-box">

                        <div class="billing-due-label">
                            DUE AUG 27, 2026
                        </div>

                        <div class="billing-next-amount">
                            ₱15,000
                        </div>

                        <p class="billing-next-description">
                            SEC Amendment of Articles
                        </p>

                        <button
                            type="button"
                            class="billing-primary-btn"
                        >
                            View invoice
                        </button>

                    </div>

                </div>

            </div>


            {{-- ACCOUNT INFORMATION --}}
            <div class="billing-account-details">

                <div class="billing-detail-item">

                    <span class="billing-detail-label">
                        Account
                    </span>

                    <strong>
                        John Kelly &amp; Company
                    </strong>

                </div>


                <div class="billing-detail-item">

                    <span class="billing-detail-label">
                        Account status
                    </span>

                    <span class="billing-status">
                        Active
                    </span>

                </div>


                <div class="billing-detail-item">

                    <span class="billing-detail-label">
                        Current outstanding
                    </span>

                    <strong>
                        ₱25,000
                    </strong>

                </div>


                <div class="billing-detail-item">

                    <span class="billing-detail-label">
                        Next payment
                    </span>

                    <strong>
                        Aug 27, 2026
                    </strong>

                </div>

            </div>

        </div>


        {{-- =====================================================
             INVOICES TAB
        ====================================================== --}}
        <div
            id="billing-invoices-tab"
            class="billing-tab-content"
        >

            <div class="billing-tab-heading">

                <div>

                    <h2 class="billing-section-title">
                        Invoices
                    </h2>

                    <p class="billing-tab-description">
                        View invoices issued to John Kelly &amp; Company.
                    </p>

                </div>

            </div>


            <div class="billing-table-wrapper">

                <table class="billing-table">

                    <thead>

                        <tr>
                            <th>Invoice</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>
                                INV-2026-012
                            </td>

                            <td>
                                Aug 27, 2026
                            </td>

                            <td>
                                SEC Amendment of Articles
                            </td>

                            <td>
                                ₱15,000
                            </td>

                            <td>
                                <span class="billing-status billing-status-due">
                                    Due
                                </span>
                            </td>

                            <td>
                                <button
                                    type="button"
                                    class="billing-table-btn"
                                >
                                    View invoice
                                </button>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                INV-2026-011
                            </td>

                            <td>
                                Aug 01, 2026
                            </td>

                            <td>
                                JK&amp;C Account Charges
                            </td>

                            <td>
                                ₱10,000
                            </td>

                            <td>
                                <span class="billing-status">
                                    Paid
                                </span>
                            </td>

                            <td>
                                <button
                                    type="button"
                                    class="billing-table-btn"
                                >
                                    View invoice
                                </button>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                INV-2026-010
                            </td>

                            <td>
                                Jul 19, 2026
                            </td>

                            <td>
                                JK&amp;C Account Charges
                            </td>

                            <td>
                                ₱15,000
                            </td>

                            <td>
                                <span class="billing-status">
                                    Paid
                                </span>
                            </td>

                            <td>
                                <button
                                    type="button"
                                    class="billing-table-btn"
                                >
                                    View invoice
                                </button>
                            </td>

                        </tr>


                    </tbody>

                </table>

            </div>

        </div>


        {{-- =====================================================
             PAYMENTS TAB
        ====================================================== --}}
        <div
            id="billing-payments-tab"
            class="billing-tab-content"
        >

            <div class="billing-tab-heading">

                <div>

                    <h2 class="billing-section-title">
                        Payments
                    </h2>

                    <p class="billing-tab-description">
                        Review payments recorded on your JK&amp;C account.
                    </p>

                </div>

            </div>


            <div class="billing-table-wrapper">

                <table class="billing-table">

                    <thead>

                        <tr>
                            <th>Date</th>
                            <th>Reference</th>
                            <th>Payment</th>
                            <th>Method</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>
                                Aug 19, 2026
                            </td>

                            <td>
                                PAY-2026-012
                            </td>

                            <td>
                                ₱15,000
                            </td>

                            <td>
                                Bank Transfer
                            </td>

                            <td>
                                <span class="billing-status">
                                    Completed
                                </span>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Jul 19, 2026
                            </td>

                            <td>
                                PAY-2026-011
                            </td>

                            <td>
                                ₱15,000
                            </td>

                            <td>
                                Bank Transfer
                            </td>

                            <td>
                                <span class="billing-status">
                                    Completed
                                </span>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Jun 19, 2026
                            </td>

                            <td>
                                PAY-2026-010
                            </td>

                            <td>
                                ₱15,000
                            </td>

                            <td>
                                Bank Transfer
                            </td>

                            <td>
                                <span class="billing-status">
                                    Completed
                                </span>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>


        {{-- =====================================================
             STATEMENT OF ACCOUNT TAB
        ====================================================== --}}
        <div
            id="billing-statement-tab"
            class="billing-tab-content"
        >

            <div class="billing-tab-heading">

                <div>

                    <h2 class="billing-section-title">
                        Statement of Account
                    </h2>

                    <p class="billing-tab-description">
                        Summary of charges, payments, and outstanding account balance.
                    </p>

                </div>

                <button
                    type="button"
                    class="btn btn-secondary"
                >
                    Download SOA
                </button>

            </div>


            <div class="billing-soa-box">

                <div class="billing-soa-header">

                    <div>

                        <span class="billing-detail-label">
                            ACCOUNT
                        </span>

                        <strong>
                            John Kelly &amp; Company
                        </strong>

                    </div>

                    <div>

                        <span class="billing-detail-label">
                            STATEMENT DATE
                        </span>

                        <strong>
                            August 25, 2026
                        </strong>

                    </div>

                </div>


                <div class="billing-soa-summary">

                    <div>

                        <span>
                            Total charges
                        </span>

                        <strong>
                            ₱170,000
                        </strong>

                    </div>


                    <div>

                        <span>
                            Total payments
                        </span>

                        <strong>
                            ₱145,000
                        </strong>

                    </div>


                    <div class="billing-soa-total">

                        <span>
                            Outstanding balance
                        </span>

                        <strong>
                            ₱25,000
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     BILLING PAGE STYLES
========================================================== --}}
<style>

    .billing-page {
        width: 100%;
        max-width: 100%;
    }


    /* =========================================================
       HEADER
    ========================================================== */

    .billing-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;

        gap: 24px;

        margin-bottom: 22px;
    }


    .billing-header-copy {
        min-width: 0;
    }


    .billing-eyebrow {
        margin-bottom: 3px;

        font-size: 10px;
        line-height: 1.2;

        font-weight: 800;

        letter-spacing: 0.8px;

        color: #2563eb;
    }


    .billing-title {
        margin: 0 0 6px 0;

        color: #0f172a;

        font-size: 26px;
        line-height: 1.2;

        font-weight: 700;

        letter-spacing: -0.02em;
    }


    .billing-description {
        margin: 0;

        color: #64748b;

        font-size: 13.5px;
        line-height: 1.6;
        max-width: 760px;
    }


    .billing-soa-btn {
        flex-shrink: 0;

        margin-top: 12px;

        white-space: nowrap;
    }


    /* =========================================================
       SUMMARY CARDS
    ========================================================== */

    .billing-summary-grid {
        display: grid;

        grid-template-columns:
            repeat(4, minmax(0, 1fr));

        gap: 14px;

        margin-bottom: 18px;
    }


    .billing-summary-card {
        min-height: 132px;

        padding: 16px;

        background: #ffffff;

        border: 1px solid #e2e8f0;

        border-radius: 15px;

        box-shadow:
            0 5px 16px rgba(15, 23, 42, 0.055);

        display: flex;
        flex-direction: column;

        justify-content: flex-start;
    }


    .billing-card-icon {
        width: 34px;
        height: 34px;

        margin-bottom: 14px;

        border-radius: 10px;

        background: #eff6ff;

        color: #2563eb;

        display: flex;
        align-items: center;
        justify-content: center;
    }


    .billing-card-icon svg {
        width: 18px;
        height: 18px;
    }


    .billing-summary-value {
        color: #0f172a;

        font-size: 22px;
        line-height: 1.1;

        font-weight: 800;

        letter-spacing: -0.5px;

        margin-bottom: 5px;
    }


    .billing-summary-label {
        color: #64748b;

        font-size: 11px;
        line-height: 1.3;
    }


    .billing-summary-note {
        color: #94a3b8;

        font-size: 10px;
        line-height: 1.3;

        margin-top: 7px;
    }


    /* =========================================================
       MAIN CARD
    ========================================================== */

    .billing-main-card {
        background: #ffffff;

        border: 1px solid #e2e8f0;

        border-radius: 15px;

        box-shadow:
            0 5px 16px rgba(15, 23, 42, 0.045);

        padding: 0 18px 22px;
    }


    /* =========================================================
       TABS
    ========================================================== */

    .billing-tabs {
        display: flex;
        align-items: center;

        gap: 4px;

        border-bottom: 1px solid #e2e8f0;

        min-height: 61px;

        overflow-x: auto;
    }


    .billing-tab {
        position: relative;

        appearance: none;
        border: 0;
        background: transparent;

        padding: 20px 13px 16px;

        color: #64748b;

        font-size: 13px;
        font-weight: 600;

        white-space: nowrap;

        cursor: pointer;
    }


    .billing-tab:hover {
        color: #2563eb;
    }


    .billing-tab.active {
        color: #2563eb;
    }


    .billing-tab.active::after {
        content: "";

        position: absolute;

        left: 0;
        right: 0;
        bottom: -1px;

        height: 2px;

        background: #2563eb;
    }


    /* =========================================================
       TAB CONTENT
    ========================================================== */

    .billing-tab-content {
        display: none;

        padding-top: 31px;
    }


    .billing-tab-content.active {
        display: block;
    }


    .billing-two-column {
        display: grid;

        grid-template-columns:
            minmax(0, 1.35fr)
            minmax(300px, 0.95fr);

        gap: 18px;
    }


    .billing-section-title {
        margin: 0 0 12px;

        color: #0f172a;

        font-size: 14px;
        font-weight: 700;
    }


    /* =========================================================
       ACCOUNT BALANCE
    ========================================================== */

    .billing-balance-box {
        border: 1px solid #dbe4ef;

        border-radius: 11px;

        padding: 0 12px;

        background: #ffffff;
    }


    .billing-balance-row {
        min-height: 54px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;

        border-bottom: 1px solid #e2e8f0;

        color: #0f172a;

        font-size: 13px;
    }


    .billing-balance-row strong {
        font-weight: 700;
    }


    .billing-balance-row-total {
        border-bottom: 0;

        min-height: 64px;

        font-size: 13px;
    }


    .billing-balance-row-total strong {
        font-size: 19px;

        color: #0f172a;
    }


    /* =========================================================
       NEXT PAYMENT
    ========================================================== */

    .billing-next-payment-box {
        position: relative;

        min-height: 139px;

        border: 1px solid #dbe4ef;

        border-radius: 11px;

        padding: 15px;

        background: #ffffff;
    }


    .billing-due-label {
        margin-bottom: 7px;

        color: #2563eb;

        font-size: 10px;

        font-weight: 800;

        letter-spacing: 0.9px;
    }


    .billing-next-amount {
        color: #0f172a;

        font-size: 18px;

        font-weight: 800;

        margin-bottom: 5px;
    }


    .billing-next-description {
        margin: 0 0 11px;

        color: #64748b;

        font-size: 11px;
    }


    .billing-primary-btn {
        border: 0;

        border-radius: 8px;

        padding: 8px 12px;

        background: #2563eb;

        color: #ffffff;

        font-size: 11px;

        font-weight: 700;

        cursor: pointer;

        box-shadow:
            0 4px 10px rgba(37, 99, 235, 0.22);

        transition:
            background 0.15s ease,
            transform 0.15s ease;
    }


    .billing-primary-btn:hover {
        background: #1d4ed8;

        transform: translateY(-1px);
    }


    /* =========================================================
       ACCOUNT DETAILS
    ========================================================== */

    .billing-account-details {
        display: grid;

        grid-template-columns:
            repeat(4, minmax(0, 1fr));

        gap: 12px;

        margin-top: 20px;

        padding-top: 20px;

        border-top: 1px solid #e2e8f0;
    }


    .billing-detail-item {
        display: flex;
        flex-direction: column;

        gap: 5px;

        padding: 12px;

        border: 1px solid #e2e8f0;

        border-radius: 9px;

        background: #f8fafc;
    }


    .billing-detail-label {
        color: #64748b;

        font-size: 9px;

        font-weight: 700;

        letter-spacing: 0.6px;
    }


    .billing-detail-item strong {
        color: #0f172a;

        font-size: 12px;
    }


    /* =========================================================
       STATUS
    ========================================================== */

    .billing-status {
        display: inline-flex;
        align-items: center;

        width: fit-content;

        padding: 4px 8px;

        border-radius: 6px;

        background: #ecfdf5;

        color: #15803d;

        font-size: 10px;

        font-weight: 700;
    }


    .billing-status-due {
        background: #fff7ed;

        color: #c2410c;
    }


    /* =========================================================
       TABLE
    ========================================================== */

    .billing-tab-heading {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;

        gap: 20px;

        margin-bottom: 16px;
    }


    .billing-tab-description {
        margin: -5px 0 0;

        color: #64748b;

        font-size: 12px;
    }


    .billing-table-wrapper {
        width: 100%;

        overflow-x: auto;

        border: 1px solid #e2e8f0;

        border-radius: 10px;
    }


    .billing-table {
        width: 100%;

        border-collapse: collapse;

        min-width: 700px;
    }


    .billing-table th {
        padding: 12px;

        background: #f8fafc;

        border-bottom: 1px solid #e2e8f0;

        color: #64748b;

        font-size: 10px;

        font-weight: 700;

        text-align: left;

        white-space: nowrap;
    }


    .billing-table td {
        padding: 13px 12px;

        border-bottom: 1px solid #eef2f7;

        color: #334155;

        font-size: 12px;
    }


    .billing-table tbody tr:last-child td {
        border-bottom: 0;
    }


    .billing-table tbody tr:hover {
        background: #f8fafc;
    }


    .billing-table-btn {
        border: 1px solid #dbe4ef;

        background: #ffffff;

        color: #334155;

        padding: 6px 9px;

        border-radius: 6px;

        font-size: 10px;

        font-weight: 600;

        cursor: pointer;
    }


    .billing-table-btn:hover {
        border-color: #2563eb;

        color: #2563eb;
    }


    /* =========================================================
       STATEMENT OF ACCOUNT
    ========================================================== */

    .billing-soa-box {
        border: 1px solid #dbe4ef;

        border-radius: 11px;

        overflow: hidden;
    }


    .billing-soa-header {
        display: grid;

        grid-template-columns:
            1fr 1fr;

        gap: 20px;

        padding: 18px;

        background: #f8fafc;

        border-bottom: 1px solid #e2e8f0;
    }


    .billing-soa-header > div {
        display: flex;
        flex-direction: column;

        gap: 5px;
    }


    .billing-soa-header strong {
        color: #0f172a;

        font-size: 13px;
    }


    .billing-soa-summary {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 0;
    }


    .billing-soa-summary > div {
        min-height: 100px;

        padding: 18px;

        display: flex;
        flex-direction: column;

        justify-content: center;

        gap: 7px;

        border-right: 1px solid #e2e8f0;
    }


    .billing-soa-summary > div:last-child {
        border-right: 0;
    }


    .billing-soa-summary span {
        color: #64748b;

        font-size: 11px;
    }


    .billing-soa-summary strong {
        color: #0f172a;

        font-size: 18px;
    }


    .billing-soa-total {
        background: #f8fafc;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================== */

    @media (max-width: 1100px) {

        .billing-summary-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
        }


        .billing-account-details {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
        }

    }


    @media (max-width: 800px) {

        .billing-header {
            flex-direction: column;
        }


        .billing-soa-btn {
            margin-top: 0;
        }


        .billing-two-column {
            grid-template-columns: 1fr;
        }


        .billing-soa-summary {
            grid-template-columns: 1fr;
        }


        .billing-soa-summary > div {
            border-right: 0;

            border-bottom: 1px solid #e2e8f0;
        }


        .billing-soa-summary > div:last-child {
            border-bottom: 0;
        }

    }


    @media (max-width: 600px) {

        .billing-summary-grid {
            grid-template-columns: 1fr;
        }


        .billing-account-details {
            grid-template-columns: 1fr;
        }


        .billing-main-card {
            padding-left: 12px;
            padding-right: 12px;
        }


        .billing-tabs {
            gap: 0;
        }


        .billing-tab {
            padding-left: 9px;
            padding-right: 9px;
        }

    }

</style>


{{-- =========================================================
     BILLING TAB JAVASCRIPT
========================================================== --}}
<script>

    function showBillingTab(tabName, clickedTab) {

        /*
        |--------------------------------------------------------------------------
        | Hide all tab contents
        |--------------------------------------------------------------------------
        */

        const tabContents = document.querySelectorAll(
            '.billing-tab-content'
        );

        tabContents.forEach(function(content) {

            content.classList.remove('active');

        });


        /*
        |--------------------------------------------------------------------------
        | Remove active state from all tabs
        |--------------------------------------------------------------------------
        */

        const tabs = document.querySelectorAll(
            '.billing-tab'
        );

        tabs.forEach(function(tab) {

            tab.classList.remove('active');

        });


        /*
        |--------------------------------------------------------------------------
        | Show selected tab
        |--------------------------------------------------------------------------
        */

        const selectedContent = document.getElementById(
            'billing-' + tabName + '-tab'
        );

        if (selectedContent) {

            selectedContent.classList.add('active');

        }


        /*
        |--------------------------------------------------------------------------
        | Activate selected button
        |--------------------------------------------------------------------------
        */

        if (clickedTab) {

            clickedTab.classList.add('active');

        }

    }

</script>

@endsection