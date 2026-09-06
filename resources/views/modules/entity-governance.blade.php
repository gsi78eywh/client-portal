@extends('layouts.client')

@section('title', 'Entity & Governance')

@section('header-title', 'Entity & Governance')

@section('content')

<div class="entity-page">

    {{-- =========================================================
        PAGE HEADER
    ========================================================== --}}
    <div class="entity-header">

        <div class="entity-header-copy">

            <div class="breadcrumb-label">
                BUSINESS
                <span>•</span>
                ENTITY &amp; GOVERNANCE
            </div>

            <h1>
                Entity &amp; Governance
            </h1>

            <p>
                Maintain the legal entity, ownership, officers, governance actions
                and corporate records in one controlled workspace.
            </p>

        </div>

        <div class="entity-header-actions">

            {{-- 30-DAY TRIAL BADGE --}}
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
                    Maintain your legal entity, ownership, officers, governance
                    actions and corporate records in one controlled workspace.
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
                <div class="chart-bar" style="height: 48%;"></div>
                <div class="chart-bar" style="height: 40%;"></div>
                <div class="chart-bar" style="height: 66%;"></div>
                <div class="chart-bar" style="height: 55%;"></div>
                <div class="chart-bar" style="height: 78%;"></div>
                <div class="chart-bar" style="height: 64%;"></div>
                <div class="chart-bar" style="height: 90%;"></div>
                <div class="chart-bar" style="height: 70%;"></div>
                <div class="chart-bar" style="height: 82%;"></div>

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
        STAT CARDS
    ========================================================== --}}
    <div class="stats-grid">

        {{-- ACTIVE ENTITIES --}}
        <div class="stat-card">

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M3 21h18"></path>
                    <path d="M5 21V9l7-4 7 4v12"></path>
                    <path d="M9 21v-7h6v7"></path>
                </svg>

            </div>

            <div class="stat-number">
                1
            </div>

            <div class="stat-title">
                Active entities
            </div>

            <div class="stat-description">
                Verified profile
            </div>

        </div>


        {{-- DIRECTORS --}}
        <div class="stat-card">

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="9" cy="8" r="3"></circle>
                    <path d="M3 20c0-3.3 2.7-6 6-6"></path>
                    <circle cx="17" cy="9" r="2.5"></circle>
                    <path d="M14 20c.2-2.7 2.2-5 5-5 1 0 1.8.2 2.5.7"></path>
                </svg>

            </div>

            <div class="stat-number">
                5
            </div>

            <div class="stat-title">
                Directors &amp; officers
            </div>

            <div class="stat-description">
                Current register
            </div>

        </div>


        {{-- PENDING ACTIONS --}}
        <div class="stat-card">

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M12 7v5l3 2"></path>
                </svg>

            </div>

            <div class="stat-number">
                4
            </div>

            <div class="stat-title">
                Pending actions
            </div>

            <div class="stat-description">
                2 need approval
            </div>

        </div>


        {{-- GOVERNANCE RECORDS --}}
        <div class="stat-card">

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M6 3h12v18H6z"></path>
                    <path d="M9 7h6"></path>
                    <path d="M9 11h6"></path>
                    <path d="M9 15h4"></path>
                </svg>

            </div>

            <div class="stat-number">
                28
            </div>

            <div class="stat-title">
                Governance records
            </div>

            <div class="stat-description">
                6 added this month
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
                Entity Profile
            </button>

            <button type="button" class="workspace-tab">
                Directors &amp; Officers
            </button>

            <button type="button" class="workspace-tab">
                Ownership
            </button>

            <button type="button" class="workspace-tab">
                Meetings
            </button>

            <button type="button" class="workspace-tab">
                Resolutions
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


            {{-- RECORDS TABLE --}}
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
                                    BR-2026-041
                                </span>
                            </td>

                            <td>

                                <div class="record-item">

                                    <strong>
                                        Board Resolution
                                    </strong>

                                    <span>
                                        Governance
                                    </span>

                                </div>

                            </td>

                            <td>
                                <span class="record-date">
                                    Aug 17, 2026
                                </span>
                            </td>

                            <td>

                                <span class="status approved">
                                    <span></span>
                                    Approved
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
                                    SC-2026-018
                                </span>
                            </td>

                            <td>

                                <div class="record-item">

                                    <strong>
                                        Secretary's Certificate
                                    </strong>

                                    <span>
                                        Corporate record
                                    </span>

                                </div>

                            </td>

                            <td>
                                <span class="record-date">
                                    Aug 15, 2026
                                </span>
                            </td>

                            <td>

                                <span class="status final">
                                    <span></span>
                                    Final
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
                                    MIN-2026-009
                                </span>
                            </td>

                            <td>

                                <div class="record-item">

                                    <strong>
                                        Special Board Meeting Minutes
                                    </strong>

                                    <span>
                                        Meeting record
                                    </span>

                                </div>

                            </td>

                            <td>
                                <span class="record-date">
                                    Aug 10, 2026
                                </span>
                            </td>

                            <td>

                                <span class="status review">
                                    <span></span>
                                    For Review
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