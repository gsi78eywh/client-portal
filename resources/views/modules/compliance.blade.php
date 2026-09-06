@extends('layouts.client')

@section('title', 'Compliance')

@section('header-title', 'Compliance')

@section('content')

<div class="compliance-page">

    {{-- =========================================================
        PAGE HEADER
    ========================================================== --}}
    <div class="compliance-header">

        <div class="compliance-header-copy">

            <div class="breadcrumb-label">
                BUSINESS
                <span>•</span>
                COMPLIANCE
            </div>

            <h1>
                Compliance
            </h1>

            <p>
                Monitor obligations, filings, permits, recurring requirements
                and deadlines across government agencies.
            </p>

        </div>

        <div class="compliance-header-actions">

            <span class="trial-badge">
                30-Day Trial
            </span>

            <button type="button" class="primary-button">
                <span class="button-plus">+</span>
                New
            </button>

        </div>

    </div>


    {{-- =========================================================
        MODULE SUMMARY
    ========================================================== --}}
    <div class="module-grid">

        {{-- MODULE OVERVIEW --}}
        <section class="module-card">

            <div class="module-card-content">

                <div class="section-label">
                    MODULE OVERVIEW
                </div>

                <h2>
                    Everything important, without the clutter.
                </h2>

                <p>
                    Monitor obligations, filings, permits, recurring requirements
                    and deadlines across government agencies.
                </p>

            </div>

            <div class="module-actions">

                <button type="button" class="soft-button">
                    Quick action
                </button>

                <button type="button" class="outline-button">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.7 1.7-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.6v.2h-2.4v-.2a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.9.3l-.1.1-1.7-1.7.1-.1A1.7 1.7 0 0 0 8.4 15a1.7 1.7 0 0 0-1.6-1H6.6v-2.4h.2a1.7 1.7 0 0 0 1.6-1 1.7 1.7 0 0 0-.3-1.9L8 8.6l1.7-1.7.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1-1.6v-.2h2.4v.2a1.7 1.7 0 0 0 1 1.6 1.7 1.7 0 0 0 1.9-.3l.1-.1 1.7 1.7-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 1.6 1h.2V14h-.2a1.7 1.7 0 0 0-1.6 1z"></path>
                    </svg>

                    Configure module

                </button>

            </div>

        </section>


        {{-- ACTIVITY TREND --}}
        <section class="trend-card">

            <div class="trend-header">

                <div>

                    <div class="trend-title">
                        Activity trend
                    </div>

                    <div class="trend-subtitle">
                        Last 30 days
                    </div>

                </div>

                <span class="healthy-badge">
                    Healthy
                </span>

            </div>

            <div class="chart">

                <div class="chart-bar" style="height: 30%;"></div>
                <div class="chart-bar" style="height: 52%;"></div>
                <div class="chart-bar" style="height: 40%;"></div>
                <div class="chart-bar" style="height: 68%;"></div>
                <div class="chart-bar" style="height: 56%;"></div>
                <div class="chart-bar" style="height: 82%;"></div>
                <div class="chart-bar" style="height: 66%;"></div>
                <div class="chart-bar" style="height: 100%;"></div>
                <div class="chart-bar" style="height: 74%;"></div>
                <div class="chart-bar" style="height: 88%;"></div>

            </div>

            <div class="chart-footer">

                <span>
                    Activity
                </span>

                <strong>
                    +18% this month
                </strong>

            </div>

        </section>

    </div>


    {{-- =========================================================
        STATISTICS
    ========================================================== --}}
    <div class="stats-grid">

        {{-- COMPLIANT --}}
        <div class="stat-card">

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M8 12l2.5 2.5L16 9"></path>
                </svg>

            </div>

            <div class="stat-number">
                12
            </div>

            <div class="stat-title">
                Compliant
            </div>

            <div class="stat-description">
                Current
            </div>

        </div>


        {{-- DUE SOON --}}
        <div class="stat-card">

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M12 7v5l3 2"></path>
                </svg>

            </div>

            <div class="stat-number">
                2
            </div>

            <div class="stat-title">
                Due soon
            </div>

            <div class="stat-description">
                Within 7 days
            </div>

        </div>


        {{-- THIS MONTH --}}
        <div class="stat-card">

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <rect x="4" y="5" width="16" height="15" rx="2"></rect>
                    <path d="M8 3v4"></path>
                    <path d="M16 3v4"></path>
                    <path d="M4 9h16"></path>
                </svg>

            </div>

            <div class="stat-number">
                8
            </div>

            <div class="stat-title">
                This month
            </div>

            <div class="stat-description">
                Scheduled
            </div>

        </div>


        {{-- FILINGS --}}
        <div class="stat-card">

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M6 3h8l4 4v14H6V3z"></path>
                    <path d="M14 3v4h4"></path>
                    <path d="M9 11h6"></path>
                    <path d="M9 15h6"></path>
                </svg>

            </div>

            <div class="stat-number">
                31
            </div>

            <div class="stat-title">
                Filings
            </div>

            <div class="stat-description">
                2026 YTD
            </div>

        </div>

    </div>


    {{-- =========================================================
        MAIN WORKSPACE
    ========================================================== --}}
    <section class="workspace-card">

        {{-- TABS --}}
        <div class="workspace-tabs">

            <button type="button" class="workspace-tab active">
                Overview
            </button>

            <button type="button" class="workspace-tab">
                Calendar
            </button>

            <button type="button" class="workspace-tab">
                BIR
            </button>

            <button type="button" class="workspace-tab">
                SEC
            </button>

            <button type="button" class="workspace-tab">
                LGU
            </button>

            <button type="button" class="workspace-tab">
                Other Agencies
            </button>

            <button type="button" class="workspace-tab">
                Records
            </button>

        </div>


        {{-- WORKSPACE CONTENT --}}
        <div class="workspace-content">

            <div class="content-header">

                <div>

                    <h2>
                        Recent records &amp; activity
                    </h2>

                    <p>
                        Sample information for the V1 mockup.
                    </p>

                </div>

                <button type="button" class="filter-button">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M4 6h16"></path>
                        <path d="M7 12h10"></path>
                        <path d="M10 18h4"></path>
                    </svg>

                    Filter

                </button>

            </div>


            {{-- =====================================================
                COMPLIANCE TABLE
            ====================================================== --}}
            <div class="records-table-wrapper">

                <table class="records-table">

                    <thead>

                        <tr>

                            <th>
                                Reference
                            </th>

                            <th>
                                Item
                            </th>

                            <th>
                                Date
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="action-column">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        {{-- ROW 1 --}}
                        <tr>

                            <td>
                                <span class="reference">
                                    CMP-00124
                                </span>
                            </td>

                            <td>

                                <div class="record-item">

                                    <strong>
                                        BIR 1601-C
                                    </strong>

                                    <span>
                                        Tax filing
                                    </span>

                                </div>

                            </td>

                            <td>

                                <span class="record-date">
                                    Aug 21, 2026
                                </span>

                            </td>

                            <td>

                                <span class="status due">

                                    <span></span>

                                    Due Soon

                                </span>

                            </td>

                            <td class="action-column">

                                <button type="button" class="view-button">
                                    View
                                </button>

                            </td>

                        </tr>


                        {{-- ROW 2 --}}
                        <tr>

                            <td>
                                <span class="reference">
                                    CMP-00118
                                </span>
                            </td>

                            <td>

                                <div class="record-item">

                                    <strong>
                                        SEC GIS
                                    </strong>

                                    <span>
                                        Corporate filing
                                    </span>

                                </div>

                            </td>

                            <td>

                                <span class="record-date">
                                    Sep 15, 2026
                                </span>

                            </td>

                            <td>

                                <span class="status scheduled">

                                    <span></span>

                                    Scheduled

                                </span>

                            </td>

                            <td class="action-column">

                                <button type="button" class="view-button">
                                    View
                                </button>

                            </td>

                        </tr>


                        {{-- ROW 3 --}}
                        <tr>

                            <td>
                                <span class="reference">
                                    CMP-00104
                                </span>
                            </td>

                            <td>

                                <div class="record-item">

                                    <strong>
                                        Business Permit Renewal
                                    </strong>

                                    <span>
                                        LGU requirement
                                    </span>

                                </div>

                            </td>

                            <td>

                                <span class="record-date">
                                    Jan 20, 2027
                                </span>

                            </td>

                            <td>

                                <span class="status monitoring">

                                    <span></span>

                                    Monitoring

                                </span>

                            </td>

                            <td class="action-column">

                                <button type="button" class="view-button">
                                    View
                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>




@endsection