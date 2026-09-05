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


<style>

/* =========================================================
   ENTITY & GOVERNANCE
   ORDO V1 — FINAL BALANCED UI
========================================================= */

.entity-page {
    width: 100%;
    max-width: 1280px;
    margin: 0 auto;
    padding: 14px 4px 44px;
    color: #0f172a;
}


/* =========================================================
   PAGE HEADER
========================================================= */

.entity-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 28px;
    margin-bottom: 24px;
}

.entity-header-copy {
    min-width: 0;
}

.breadcrumb-label {
    display: flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 8px;
    color: #2563eb;
    font-size: 10.5px;
    font-weight: 800;
    letter-spacing: .09em;
    line-height: 1.2;
    text-transform: uppercase;
}

.breadcrumb-label span {
    color: #94a3b8;
    font-size: 10px;
}

.entity-header h1 {
    margin: 0 0 6px 0;
    color: #0f172a;
    font-size: 26px;
    line-height: 1.2;
    font-weight: 700;
    letter-spacing: -0.02em;
}

.entity-header p {
    max-width: 760px;
    margin: 0;
    color: #64748b;
    font-size: 13.5px;
    line-height: 1.6;
}

.entity-header-actions {
    display: flex;
    align-items: center;
    gap: 9px;
    flex-shrink: 0;
    padding-top: 1px;
}


/* =========================================================
   TRIAL BADGE
========================================================= */

.trial-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 37px;
    padding: 0 15px;
    border: 1px solid #dbeafe;
    border-radius: 20px;
    background: #eff6ff;
    color: #2563eb;
    font-size: 11.5px;
    font-weight: 700;
    white-space: nowrap;
}


/* =========================================================
   PRIMARY BUTTON
========================================================= */

.primary-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    min-height: 38px;
    padding: 0 17px;
    border: 0;
    border-radius: 8px;
    background: #2563eb;
    color: #ffffff;
    font-size: 12.5px;
    font-weight: 700;
    box-shadow: 0 2px 6px rgba(37, 99, 235, .15);
    cursor: pointer;
    transition:
        background .18s ease,
        box-shadow .18s ease,
        transform .18s ease;
}

.primary-button:hover {
    background: #1d4ed8;
    box-shadow: 0 4px 10px rgba(37, 99, 235, .20);
    transform: translateY(-1px);
}

.button-plus {
    font-size: 17px;
    line-height: 1;
    font-weight: 400;
}


/* =========================================================
   MODULE SUMMARY
========================================================= */

.module-grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 365px;
    gap: 16px;
    margin-bottom: 18px;
}

.module-card,
.trend-card {
    min-width: 0;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    background: #ffffff;
    box-shadow: 0 2px 8px rgba(15, 23, 42, .025);
}

.module-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 195px;
    padding: 22px 24px;
}

.section-label {
    margin-bottom: 8px;
    color: #2563eb;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .10em;
    line-height: 1.2;
}

.module-card h2 {
    margin: 0 0 8px;
    color: #0f172a;
    font-size: 20px;
    line-height: 1.3;
    font-weight: 750;
    letter-spacing: -.018em;
}

.module-card p {
    max-width: 680px;
    margin: 0;
    color: #64748b;
    font-size: 13px;
    line-height: 1.6;
}


/* =========================================================
   MODULE ACTIONS
========================================================= */

.module-actions {
    display: flex;
    align-items: center;
    gap: 9px;
    margin-top: 20px;
}

.soft-button,
.outline-button {
    min-height: 36px;
    padding: 0 14px;
    border-radius: 8px;
    font-size: 12.5px;
    font-weight: 700;
    cursor: pointer;
    transition:
        background .18s ease,
        border-color .18s ease,
        color .18s ease;
}

.soft-button {
    border: 1px solid #dbeafe;
    background: #eff6ff;
    color: #2563eb;
}

.soft-button:hover {
    background: #e8f1ff;
    border-color: #bfdbfe;
}

.outline-button {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    border: 1px solid #d8e1ec;
    background: #ffffff;
    color: #334155;
}

.outline-button:hover {
    border-color: #bfdbfe;
    background: #f8fafc;
    color: #1e40af;
}

.outline-button svg {
    width: 14px;
    height: 14px;
    fill: none;
    stroke: #2563eb;
    stroke-width: 1.7;
    stroke-linecap: round;
    stroke-linejoin: round;
}


/* =========================================================
   ACTIVITY TREND
========================================================= */

.trend-card {
    padding: 20px 21px;
}

.trend-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 10px;
}

.trend-title {
    color: #0f172a;
    font-size: 14px;
    font-weight: 700;
}

.trend-subtitle {
    margin-top: 3px;
    color: #94a3b8;
    font-size: 10.5px;
}

.healthy-badge {
    padding: 5px 9px;
    border: 1px solid #dcfce7;
    border-radius: 20px;
    background: #f0fdf4;
    color: #15803d;
    font-size: 10px;
    font-weight: 700;
}

.chart {
    display: flex;
    align-items: flex-end;
    gap: 7px;
    height: 96px;
    margin-top: 18px;
    padding: 0 2px;
    border-bottom: 1px solid #edf1f5;
}

.chart-bar {
    flex: 1;
    min-width: 6px;
    max-width: 23px;
    border-radius: 4px 4px 2px 2px;
    background: linear-gradient(
        to top,
        #2563eb,
        #60a5fa
    );
    opacity: .88;
}

.chart-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 9px;
    color: #94a3b8;
    font-size: 10.5px;
}

.chart-footer strong {
    color: #2563eb;
    font-size: 10.5px;
}


/* =========================================================
   STATISTICS
========================================================= */

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 14px;
    margin-bottom: 20px;
}

.stat-card {
    min-width: 0;
    min-height: 137px;
    padding: 18px 19px;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    background: #ffffff;
    box-shadow: 0 2px 8px rgba(15, 23, 42, .025);
    transition:
        border-color .18s ease,
        box-shadow .18s ease,
        transform .18s ease;
}

.stat-card:hover {
    border-color: #cbd8e8;
    box-shadow: 0 6px 16px rgba(15, 23, 42, .045);
    transform: translateY(-1px);
}


/* =========================================================
   STAT ICONS
   BLUE — CONSISTENT WITH OTHER MODULES
========================================================= */

.stat-icon {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 11px;
    border: 1px solid #dbeafe;
    border-radius: 8px;
    background: #eff6ff;
    color: #2563eb;
}

.stat-icon svg {
    width: 18px;
    height: 18px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.65;
    stroke-linecap: round;
    stroke-linejoin: round;
}


/* =========================================================
   STAT CONTENT
========================================================= */

.stat-number {
    color: #0f172a;
    font-size: 27px;
    line-height: 1;
    font-weight: 800;
    letter-spacing: -.025em;
}

.stat-title {
    margin-top: 7px;
    color: #334155;
    font-size: 12.5px;
    line-height: 1.35;
    font-weight: 700;
}

.stat-description {
    margin-top: 3px;
    color: #94a3b8;
    font-size: 11px;
}


/* =========================================================
   MAIN WORKSPACE
========================================================= */

.workspace-card {
    overflow: hidden;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    background: #ffffff;
    box-shadow: 0 2px 8px rgba(15, 23, 42, .025);
}


/* =========================================================
   TABS
========================================================= */

.workspace-tabs {
    display: flex;
    align-items: stretch;
    flex-wrap: wrap;
    gap: 0 24px;
    min-height: 54px;
    padding: 0 21px;
    overflow: hidden;
    border-bottom: 1px solid #e5eaf1;
    background: #ffffff;
}

.workspace-tab {
    position: relative;
    flex-shrink: 0;
    min-height: 54px;
    padding: 0;
    border: 0;
    background: transparent;
    color: #64748b;
    font-size: 12.5px;
    font-weight: 600;
    white-space: nowrap;
    cursor: pointer;
    transition: color .18s ease;
}

.workspace-tab:hover {
    color: #2563eb;
}

.workspace-tab.active {
    color: #2563eb;
    font-weight: 700;
}

.workspace-tab.active::after {
    content: "";
    position: absolute;
    right: 0;
    bottom: -1px;
    left: 0;
    height: 2px;
    border-radius: 2px 2px 0 0;
    background: #2563eb;
}


/* =========================================================
   WORKSPACE CONTENT
========================================================= */

.workspace-content {
    padding: 23px;
}

.content-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 18px;
    margin-bottom: 17px;
}

.content-header h2 {
    margin: 0 0 4px;
    color: #0f172a;
    font-size: 16px;
    font-weight: 700;
    letter-spacing: -.01em;
}

.content-header p {
    margin: 0;
    color: #7a889c;
    font-size: 12.5px;
    line-height: 1.5;
}


/* =========================================================
   FILTER BUTTON
========================================================= */

.filter-button {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    min-height: 34px;
    padding: 0 12px;
    border: 1px solid #d8e1ec;
    border-radius: 8px;
    background: #ffffff;
    color: #334155;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    transition:
        border-color .18s ease,
        background .18s ease,
        color .18s ease;
}

.filter-button:hover {
    border-color: #bfdbfe;
    background: #f8fafc;
    color: #1e40af;
}

.filter-button svg {
    width: 14px;
    height: 14px;
    fill: none;
    stroke: #2563eb;
    stroke-width: 1.7;
    stroke-linecap: round;
}


/* =========================================================
   RECORDS TABLE
========================================================= */

.records-table-wrapper {
    overflow-x: auto;
    border: 1px solid #e7ecf3;
    border-radius: 9px;
}

.records-table {
    width: 100%;
    min-width: 760px;
    border-collapse: collapse;
    text-align: left;
}

.records-table thead {
    background: #f8fafc;
}

.records-table th {
    padding: 11px 15px;
    border-bottom: 1px solid #e2e8f0;
    color: #64748b;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .065em;
    text-transform: uppercase;
    white-space: nowrap;
}

.records-table td {
    padding: 14px 15px;
    border-bottom: 1px solid #edf1f5;
    vertical-align: middle;
}

.records-table tbody tr:last-child td {
    border-bottom: 0;
}

.records-table tbody tr {
    transition: background .15s ease;
}

.records-table tbody tr:hover {
    background: #fbfdff;
}


/* =========================================================
   REFERENCE
========================================================= */

.reference {
    color: #1e293b;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
}


/* =========================================================
   RECORD ITEM
========================================================= */

.record-item {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.record-item strong {
    color: #1e2f47;
    font-size: 12.5px;
    font-weight: 700;
}

.record-item span {
    color: #94a3b8;
    font-size: 10.5px;
}


/* =========================================================
   DATE
========================================================= */

.record-date {
    color: #64748b;
    font-size: 12px;
    white-space: nowrap;
}


/* =========================================================
   STATUS
========================================================= */

.status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 9px;
    border-radius: 20px;
    font-size: 10.5px;
    font-weight: 700;
    white-space: nowrap;
}

.status > span {
    width: 6px;
    height: 6px;
    flex-shrink: 0;
    border-radius: 50%;
}

.status.approved {
    background: #ecfdf3;
    color: #15803d;
}

.status.approved > span {
    background: #22c55e;
}

.status.final {
    background: #f0fdf4;
    color: #166534;
}

.status.final > span {
    background: #16a34a;
}

.status.review {
    background: #eff6ff;
    color: #2563eb;
}

.status.review > span {
    background: #3b82f6;
}


/* =========================================================
   ACTION
========================================================= */

.action-column {
    text-align: right !important;
}

.view-button {
    min-height: 31px;
    padding: 0 12px;
    border: 1px solid #d5deea;
    border-radius: 7px;
    background: #ffffff;
    color: #334155;
    font-size: 11.5px;
    font-weight: 700;
    cursor: pointer;
    transition:
        border-color .18s ease,
        color .18s ease,
        background .18s ease;
}

.view-button:hover {
    border-color: #bfdbfe;
    color: #2563eb;
    background: #eff6ff;
}


/* =========================================================
   FOCUS / ACCESSIBILITY
========================================================= */

.primary-button:focus-visible,
.soft-button:focus-visible,
.outline-button:focus-visible,
.filter-button:focus-visible,
.view-button:focus-visible,
.workspace-tab:focus-visible {
    outline: 2px solid #93c5fd;
    outline-offset: 2px;
}


/* =========================================================
   RESPONSIVE — TABLET
========================================================= */

@media (max-width: 1180px) {

    .entity-page {
        max-width: 100%;
        padding-left: 6px;
        padding-right: 6px;
    }

    .module-grid {
        grid-template-columns: minmax(0, 1fr) 330px;
    }

    .stats-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

}


/* =========================================================
   RESPONSIVE — SMALL TABLET
========================================================= */

@media (max-width: 980px) {

    .entity-header {
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 22px;
    }

    .entity-header-actions {
        width: 100%;
        justify-content: flex-start;
    }

    .module-grid {
        grid-template-columns: 1fr;
    }

    .trend-card {
        min-height: 195px;
    }

    .workspace-tabs {
        gap: 0 20px;
    }

}


/* =========================================================
   RESPONSIVE — MOBILE
========================================================= */

@media (max-width: 700px) {

    .entity-page {
        padding: 7px 0 35px;
    }

    .entity-header {
        gap: 16px;
        margin-bottom: 19px;
    }

    .entity-header h1 {
        font-size: 25px;
    }

    .entity-header p {
        font-size: 13px;
    }

    .entity-header-actions {
        flex-wrap: wrap;
    }

    .module-card {
        padding: 20px;
    }

    .module-card h2 {
        font-size: 19px;
    }

    .module-actions {
        flex-wrap: wrap;
    }

    .stats-grid {
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }

    .stat-card {
        min-height: 130px;
        padding: 16px;
    }

    .stat-number {
        font-size: 26px;
    }

    .workspace-tabs {
        gap: 0 18px;
        padding: 0 17px;
    }

    .workspace-tab {
        min-height: 50px;
        font-size: 12px;
    }

    .workspace-content {
        padding: 18px;
    }

}


/* =========================================================
   RESPONSIVE — SMALL MOBILE
========================================================= */

@media (max-width: 520px) {

    .entity-header-actions {
        width: 100%;
    }

    .trial-badge {
        flex: 1;
        justify-content: center;
    }

    .primary-button {
        flex: 1;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .module-actions {
        flex-direction: column;
        align-items: stretch;
    }

    .soft-button,
    .outline-button {
        width: 100%;
        justify-content: center;
    }

    .content-header {
        flex-direction: column;
        align-items: stretch;
    }

    .filter-button {
        align-self: flex-start;
    }

    .entity-header h1 {
        font-size: 23px;
    }

    .module-card,
    .trend-card {
        border-radius: 11px;
    }

    .workspace-tabs {
        gap: 0 16px;
        padding: 0 14px;
    }

    .workspace-tab {
        min-height: 48px;
        font-size: 11.5px;
    }

}

</style>

@endsection