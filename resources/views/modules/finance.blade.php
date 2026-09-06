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


@endsection