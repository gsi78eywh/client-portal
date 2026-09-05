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
                <span class="finance-eyebrow-separator">•</span>
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

            <button type="button" class="finance-primary-btn">

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

                New

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
                    MODULE OVERVIEW
                </div>

                <h2 class="finance-overview-title">
                    Everything important, without the clutter.
                </h2>

                <p class="finance-overview-description">
                    A structured finance workspace for records, receivables,
                    payables, requests and management visibility.
                </p>

            </div>

            <div class="finance-overview-actions">

                <button type="button" class="finance-quick-btn">
                    Quick action
                </button>

                <button type="button" class="finance-config-btn">

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

                </button>

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
        STATISTICS
    ========================================================== --}}
    <div class="finance-stats-grid">

        {{-- RECEIVABLES --}}
        <div class="finance-stat-card">

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

            <div class="finance-stat-value">
                ₱225K
            </div>

            <div class="finance-stat-label">
                Receivables
            </div>

            <div class="finance-stat-meta">
                ₱65K due soon
            </div>

        </div>


        {{-- PAYABLES --}}
        <div class="finance-stat-card">

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

            <div class="finance-stat-value">
                ₱84K
            </div>

            <div class="finance-stat-label">
                Payables
            </div>

            <div class="finance-stat-meta">
                3 open items
            </div>

        </div>


        {{-- EXPENSES --}}
        <div class="finance-stat-card">

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

            <div class="finance-stat-value">
                ₱118K
            </div>

            <div class="finance-stat-label">
                Expenses MTD
            </div>

            <div class="finance-stat-meta">
                Within budget
            </div>

        </div>


        {{-- RECORDS --}}
        <div class="finance-stat-card">

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
                    <line x1="8" y1="17" x2="16" y2="17"></line>
                </svg>

            </div>

            <div class="finance-stat-value">
                96
            </div>

            <div class="finance-stat-label">
                Finance records
            </div>

            <div class="finance-stat-meta">
                18 this month
            </div>

        </div>

    </div>


    {{-- =========================================================
        MAIN FINANCE CONTENT
    ========================================================== --}}
    <div class="finance-content-card">

        {{-- =====================================================
            TABS
        ====================================================== --}}
        <div class="finance-tabs-wrapper">

            <div class="finance-tabs">

                <button type="button" class="finance-tab active">
                    Overview
                </button>

                <button type="button" class="finance-tab">
                    Receivables
                </button>

                <button type="button" class="finance-tab">
                    Payables
                </button>

                <button type="button" class="finance-tab">
                    Expenses
                </button>

                <button type="button" class="finance-tab">
                    Requests
                </button>

                <button type="button" class="finance-tab">
                    Transactions
                </button>

                <button type="button" class="finance-tab">
                    Reports
                </button>

                <button type="button" class="finance-tab">
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

                    <h3 class="finance-table-title">
                        Recent records & activity
                    </h3>

                    <p class="finance-table-description">
                        Sample information for the V1 mockup.
                    </p>

                </div>


                <button type="button" class="finance-filter-btn">

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
                TABLE
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


                    <tbody>

                        {{-- ROW 1 --}}
                        <tr>

                            <td class="finance-reference">
                                INV-2026-0182
                            </td>

                            <td class="finance-item">
                                Client Invoice
                            </td>

                            <td>
                                <span class="finance-category">
                                    Receivable
                                </span>
                            </td>

                            <td>

                                <span class="finance-status unpaid">
                                    <span class="finance-status-dot"></span>
                                    Unpaid
                                </span>

                            </td>

                            <td class="finance-date">
                                Aug 18, 2026
                            </td>

                            <td class="finance-action-column">

                                <button
                                    type="button"
                                    class="finance-view-btn"
                                >
                                    View
                                </button>

                            </td>

                        </tr>


                        {{-- ROW 2 --}}
                        <tr>

                            <td class="finance-reference">
                                PAY-2026-0061
                            </td>

                            <td class="finance-item">
                                Supplier Payment
                            </td>

                            <td>
                                <span class="finance-category">
                                    Payable
                                </span>
                            </td>

                            <td>

                                <span class="finance-status approved">
                                    <span class="finance-status-dot"></span>
                                    Approved
                                </span>

                            </td>

                            <td class="finance-date">
                                Aug 17, 2026
                            </td>

                            <td class="finance-action-column">

                                <button
                                    type="button"
                                    class="finance-view-btn"
                                >
                                    View
                                </button>

                            </td>

                        </tr>


                        {{-- ROW 3 --}}
                        <tr>

                            <td class="finance-reference">
                                EXP-2026-0145
                            </td>

                            <td class="finance-item">
                                Office Expense
                            </td>

                            <td>
                                <span class="finance-category">
                                    Expense
                                </span>
                            </td>

                            <td>

                                <span class="finance-status recorded">
                                    <span class="finance-status-dot"></span>
                                    Recorded
                                </span>

                            </td>

                            <td class="finance-date">
                                Aug 16, 2026
                            </td>

                            <td class="finance-action-column">

                                <button
                                    type="button"
                                    class="finance-view-btn"
                                >
                                    View
                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


{{-- =============================================================
    FINANCE PAGE STYLES
============================================================= --}}
<style>

    /* =========================================================
       PAGE
    ========================================================== */

    .finance-page {
        width: 100%;
        max-width: 1200px;
        padding: 10px 0 30px;
        box-sizing: border-box;
        font-family:
            -apple-system,
            BlinkMacSystemFont,
            "Segoe UI",
            Roboto,
            Helvetica,
            Arial,
            sans-serif;
        color: #0f172a;
    }


    /* =========================================================
       HEADER
    ========================================================== */

    .finance-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 24px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .finance-header-copy {
        min-width: 0;
    }

    /*
     * MATCHED WITH COMPLIANCE
     * Compliance uses font-weight: 800 for its breadcrumb.
     * Finance is now using the same weight.
     */
    .finance-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 11px;
        font-weight: 800;
        color: #2563eb;
        letter-spacing: 0.07em;
        text-transform: uppercase;
        margin-bottom: 6px;
        line-height: 1.2;
    }

    .finance-eyebrow-label {
        color: #2563eb;
        font-weight: 800;
    }

    .finance-eyebrow-separator {
        color: #2563eb;
        font-weight: 800;
    }

    .finance-eyebrow-finance {
        color: #2563eb;
        font-weight: 800;
    }

    .finance-title {
        font-size: 26px;
        font-weight: 700;
        color: #0f172a;
        letter-spacing: -0.02em;
        margin: 0 0 6px;
        line-height: 1.2;
    }

    .finance-description {
        font-size: 13.5px;
        color: #64748b;
        margin: 0;
        line-height: 1.6;
        max-width: 760px;
    }


    /* =========================================================
       HEADER ACTIONS
    ========================================================== */

    .finance-header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .finance-trial-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #eff6ff;
        color: #2563eb;
        font-size: 12px;
        font-weight: 600;
        padding: 8px 14px;
        border-radius: 20px;
        white-space: nowrap;
        border: 1px solid #dbeafe;
        min-height: 36px;
        box-sizing: border-box;
    }

    .finance-primary-btn {
        background: #2563eb;
        color: #ffffff;
        border: 1px solid #2563eb;
        border-radius: 8px;
        min-height: 36px;
        padding: 8px 16px;
        font-size: 13.5px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        box-shadow: 0 1px 2px rgba(37, 99, 235, 0.18);
        transition:
            background 0.15s ease,
            border-color 0.15s ease,
            transform 0.15s ease,
            box-shadow 0.15s ease;
    }

    .finance-primary-btn:hover {
        background: #1d4ed8;
        border-color: #1d4ed8;
        box-shadow: 0 2px 5px rgba(37, 99, 235, 0.18);
    }

    .finance-primary-btn:active {
        transform: translateY(1px);
    }


    /* =========================================================
       OVERVIEW GRID
    ========================================================== */

    .finance-overview-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 340px;
        gap: 20px;
        margin-bottom: 24px;
    }


    /* =========================================================
       MODULE OVERVIEW CARD
    ========================================================== */

    .finance-overview-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 24px;
        min-height: 220px;
        box-sizing: border-box;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .finance-section-label {
        font-size: 11px;
        font-weight: 700;
        color: #2563eb;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .finance-overview-title {
        font-size: 20px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 8px;
        letter-spacing: -0.01em;
        line-height: 1.3;
    }

    .finance-overview-description {
        font-size: 13.5px;
        color: #64748b;
        margin: 0;
        max-width: 520px;
        line-height: 1.55;
    }

    .finance-overview-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 24px;
        flex-wrap: wrap;
    }

    .finance-quick-btn {
        background: #eff6ff;
        color: #2563eb;
        border: 1px solid #dbeafe;
        border-radius: 8px;
        min-height: 36px;
        padding: 8px 15px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition:
            background 0.15s ease,
            border-color 0.15s ease;
    }

    .finance-quick-btn:hover {
        background: #dbeafe;
        border-color: #bfdbfe;
    }

    .finance-config-btn {
        background: #ffffff;
        color: #334155;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        min-height: 36px;
        padding: 8px 15px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        transition:
            border-color 0.15s ease,
            background 0.15s ease,
            color 0.15s ease;
    }

    .finance-config-btn:hover,
    .finance-filter-btn:hover,
    .finance-view-btn:hover {
        border-color: #94a3b8;
        background: #f8fafc;
    }


    /* =========================================================
       ACTIVITY CARD
    ========================================================== */

    .finance-activity-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px 22px;
        min-height: 220px;
        box-sizing: border-box;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03);
        display: flex;
        flex-direction: column;
    }

    .finance-activity-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 5px;
    }

    .finance-activity-title {
        font-size: 14px;
        font-weight: 700;
        color: #0f172a;
        line-height: 1.2;
    }

    .finance-activity-subtitle {
        font-size: 10.5px;
        color: #94a3b8;
        margin-top: 4px;
    }

    .finance-healthy-badge {
        background: #ecfdf5;
        color: #15803d;
        border: 1px solid #bbf7d0;
        font-size: 10px;
        font-weight: 700;
        padding: 5px 10px;
        border-radius: 14px;
        line-height: 1;
        white-space: nowrap;
    }

    .finance-chart {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        margin-top: 8px;
    }

    .finance-bars {
        height: 105px;
        display: flex;
        align-items: flex-end;
        gap: 7px;
        padding: 0 1px;
    }

    .finance-bars span {
        flex: 1;
        min-width: 8px;
        background: #3b82f6;
        border-radius: 4px 4px 0 0;
        transition: opacity 0.15s ease;
    }

    .finance-bars span:hover {
        opacity: 0.8;
    }

    .finance-chart-baseline {
        height: 1px;
        width: 100%;
        background: #e2e8f0;
    }

    .finance-chart-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        padding-top: 7px;
    }

    .finance-chart-footer span {
        font-size: 10.5px;
        color: #94a3b8;
    }

    .finance-chart-footer strong {
        font-size: 10.5px;
        color: #1d4ed8;
        font-weight: 700;
    }


    /* =========================================================
       STATS
    ========================================================== */

    .finance-stats-grid {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 28px;
    }

    .finance-stat-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 20px;
        min-width: 0;
        box-sizing: border-box;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03);
        transition:
            border-color 0.15s ease,
            box-shadow 0.15s ease,
            transform 0.15s ease;
    }

    .finance-stat-card:hover {
        border-color: #cbd5e1;
        box-shadow: 0 3px 8px rgba(15, 23, 42, 0.05);
        transform: translateY(-1px);
    }

    .finance-stat-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background: #eff6ff;
        color: #2563eb;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 13px;
        border: 1px solid #dbeafe;
        box-sizing: border-box;
    }

    .finance-stat-value {
        font-size: 26px;
        font-weight: 800;
        color: #0f172a;
        line-height: 1;
        letter-spacing: -0.02em;
    }

    .finance-stat-label {
        font-size: 12.5px;
        font-weight: 600;
        color: #64748b;
        margin-top: 7px;
    }

    .finance-stat-meta {
        font-size: 11.5px;
        color: #94a3b8;
        margin-top: 3px;
    }


    /* =========================================================
       MAIN CONTENT CARD
    ========================================================== */

    .finance-content-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03);
        overflow: hidden;
    }


    /* =========================================================
       TABS
    ========================================================== */

    .finance-tabs-wrapper {
        border-bottom: 1px solid #e2e8f0;
        background: #ffffff;
        overflow-x: auto;
        scrollbar-width: thin;
    }

    .finance-tabs {
        display: flex;
        align-items: center;
        gap: 25px;
        padding: 0 24px;
        min-width: max-content;
    }

    .finance-tab {
        position: relative;
        background: none;
        border: none;
        border-bottom: 2px solid transparent;
        padding: 16px 0 14px;
        color: #64748b;
        font-size: 13.5px;
        font-weight: 600;
        cursor: pointer;
        white-space: nowrap;
        transition:
            color 0.15s ease,
            border-color 0.15s ease;
    }

    .finance-tab:hover {
        color: #2563eb;
    }

    .finance-tab.active {
        color: #2563eb;
        border-bottom-color: #2563eb;
        font-weight: 700;
    }


    /* =========================================================
       TABLE SECTION
    ========================================================== */

    .finance-table-section {
        padding: 24px;
        box-sizing: border-box;
    }

    .finance-table-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .finance-table-title {
        font-size: 16px;
        font-weight: 700;
        color: #0f172a;
        margin: 0 0 4px;
        line-height: 1.3;
    }

    .finance-table-description {
        font-size: 13px;
        color: #64748b;
        margin: 0;
        line-height: 1.5;
    }

    .finance-filter-btn {
        border: 1px solid #cbd5e1;
        background: #ffffff;
        color: #334155;
        border-radius: 8px;
        min-height: 34px;
        padding: 7px 13px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        transition:
            background 0.15s ease,
            border-color 0.15s ease;
    }


    /* =========================================================
       TABLE
    ========================================================== */

    .finance-table-container {
        border: 1px solid #e2e8f0;
        border-radius: 9px;
        overflow-x: auto;
        overflow-y: hidden;
    }

    .finance-table {
        width: 100%;
        min-width: 850px;
        border-collapse: collapse;
        text-align: left;
        font-size: 13px;
    }

    .finance-table thead tr {
        background: #f8fafc;
        border-bottom: 1px solid #e2e8f0;
    }

    .finance-table th {
        padding: 12px 16px;
        font-size: 10.5px;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        white-space: nowrap;
    }

    .finance-table tbody tr {
        border-bottom: 1px solid #f1f5f9;
        transition: background 0.15s ease;
    }

    .finance-table tbody tr:last-child {
        border-bottom: none;
    }

    .finance-table tbody tr:hover {
        background: #f8fafc;
    }

    .finance-table td {
        padding: 14px 16px;
        vertical-align: middle;
    }

    .finance-reference {
        font-weight: 700;
        color: #0f172a;
        white-space: nowrap;
    }

    .finance-item {
        font-weight: 600;
        color: #0f172a;
    }

    .finance-category {
        color: #64748b;
        font-size: 12.5px;
    }

    .finance-date {
        color: #64748b;
        font-size: 12.5px;
        white-space: nowrap;
    }

    .finance-action-column {
        text-align: right;
    }


    /* =========================================================
       STATUS BADGES
    ========================================================== */

    .finance-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 10px;
        border-radius: 12px;
        font-size: 11.5px;
        font-weight: 600;
        line-height: 1;
        white-space: nowrap;
    }

    .finance-status-dot {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: currentColor;
        display: inline-block;
        flex-shrink: 0;
    }

    .finance-status.unpaid {
        background: #fef3c7;
        color: #b45309;
    }

    .finance-status.approved {
        background: #dcfce7;
        color: #15803d;
    }

    .finance-status.recorded {
        background: #eff6ff;
        color: #1d4ed8;
    }


    /* =========================================================
       VIEW BUTTON
    ========================================================== */

    .finance-view-btn {
        border: 1px solid #cbd5e1;
        background: #ffffff;
        color: #334155;
        border-radius: 6px;
        padding: 5px 12px;
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
        transition:
            background 0.15s ease,
            border-color 0.15s ease,
            color 0.15s ease;
    }

    .finance-view-btn:hover {
        color: #2563eb;
        border-color: #bfdbfe;
        background: #eff6ff;
    }


    /* =========================================================
       RESPONSIVE — TABLET
    ========================================================== */

    @media (max-width: 1000px) {

        .finance-page {
            padding-left: 10px;
            padding-right: 10px;
        }

        .finance-overview-grid {
            grid-template-columns: 1fr;
        }

        .finance-stats-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

    }


    /* =========================================================
       RESPONSIVE — MOBILE
    ========================================================== */

    @media (max-width: 700px) {

        .finance-header {
            margin-bottom: 20px;
        }

        .finance-header-actions {
            width: 100%;
        }

        .finance-primary-btn {
            flex: 1;
        }

        .finance-overview-card,
        .finance-activity-card {
            padding: 20px;
        }

        .finance-tabs {
            gap: 20px;
            padding-left: 18px;
            padding-right: 18px;
        }

        .finance-table-section {
            padding: 18px;
        }

    }


    /* =========================================================
       RESPONSIVE — SMALL MOBILE
    ========================================================== */

    @media (max-width: 640px) {

        .finance-page {
            padding-left: 8px;
            padding-right: 8px;
        }

        .finance-title {
            font-size: 24px;
        }

        .finance-description {
            font-size: 13.5px;
        }

        .finance-stats-grid {
            grid-template-columns: 1fr;
        }

        .finance-header-actions {
            align-items: stretch;
        }

        .finance-trial-badge {
            text-align: center;
            width: 100%;
        }

        .finance-overview-actions {
            align-items: stretch;
            flex-direction: column;
        }

        .finance-quick-btn,
        .finance-config-btn {
            width: 100%;
        }

        .finance-table-header {
            align-items: stretch;
        }

        .finance-filter-btn {
            width: 100%;
        }

    }


    /* =========================================================
       EXTRA SMALL SCREENS
    ========================================================== */

    @media (max-width: 420px) {

        .finance-overview-card,
        .finance-activity-card {
            padding: 18px;
        }

        .finance-stat-card {
            padding: 18px;
        }

        .finance-stat-value {
            font-size: 24px;
        }

        .finance-tabs {
            gap: 18px;
            padding-left: 16px;
            padding-right: 16px;
        }

        .finance-table-section {
            padding: 16px;
        }

    }

</style>

@endsection