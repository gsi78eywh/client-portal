@extends('layouts.client')

@section('title', 'Activity & Reports')

@section('header-title', 'Activity & Reports')

@section('content')

<div class="activity-reports-page">

    {{-- =========================================================
        PAGE HEADER
    ========================================================== --}}
    <div class="activity-page-header">

        <div class="activity-header-copy">

            <div class="activity-eyebrow">
                JK&amp;C
            </div>

            <h1 class="activity-page-title">
                Activity &amp; Reports
            </h1>

            <p class="activity-page-description">
                See the client-visible work JK&amp;C performed and formal reports delivered under your engagements.
            </p>

        </div>

    </div>


    {{-- =========================================================
        MAIN CARD
    ========================================================== --}}
    <div class="activity-card">

        {{-- =====================================================
            TABS
        ====================================================== --}}
        <div class="activity-tabs">

            <button
                type="button"
                class="activity-tab active"
                id="activitiesTab"
                onclick="showActivityTab('activities')"
            >
                Activities
            </button>

            <button
                type="button"
                class="activity-tab"
                id="reportsTab"
                onclick="showActivityTab('reports')"
            >
                Reports
            </button>

        </div>


        {{-- =====================================================
            ACTIVITIES TAB
        ====================================================== --}}
        <div id="activitiesContent" class="activity-tab-content">

            <div class="activity-section-header">

                <div>
                    <h2 class="activity-section-title">
                        JK&amp;C Activities
                    </h2>

                    <p class="activity-section-description">
                        Detailed service activity without exposing internal JK&amp;C task management.
                    </p>
                </div>

                <button
                    type="button"
                    class="activity-export-btn"
                    onclick="exportActivities()"
                >
                    Export
                </button>

            </div>


            {{-- =================================================
                ACTIVITIES TABLE
            ================================================== --}}
            <div class="activity-table-wrapper">

                <table class="activity-table">

                    <thead>
                        <tr>
                            <th>DATE</th>
                            <th>ACTIVITY</th>
                            <th>ENGAGEMENT</th>
                            <th>DURATION</th>
                            <th>OUTCOME</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>

                    <tbody>

                        {{-- Activity 1 --}}
                        <tr>

                            <td>
                                Aug 18
                            </td>

                            <td>
                                <span class="activity-name">
                                    SEC follow-up and coordination
                                </span>
                            </td>

                            <td>
                                ENG-2026-0041
                            </td>

                            <td>
                                1h 20m
                            </td>

                            <td>
                                Additional requirement confirmed
                            </td>

                            <td>
                                <span class="activity-status completed">
                                    <span class="status-dot"></span>
                                    Completed
                                </span>
                            </td>

                        </tr>


                        {{-- Activity 2 --}}
                        <tr>

                            <td>
                                Aug 17
                            </td>

                            <td>
                                <span class="activity-name">
                                    Document review
                                </span>
                            </td>

                            <td>
                                ENG-2026-0041
                            </td>

                            <td>
                                2h 10m
                            </td>

                            <td>
                                Draft prepared for client review
                            </td>

                            <td>
                                <span class="activity-status completed">
                                    <span class="status-dot"></span>
                                    Completed
                                </span>
                            </td>

                        </tr>


                        {{-- Activity 3 --}}
                        <tr>

                            <td>
                                Aug 15
                            </td>

                            <td>
                                <span class="activity-name">
                                    BIR coordination
                                </span>
                            </td>

                            <td>
                                ENG-2026-0028
                            </td>

                            <td>
                                45m
                            </td>

                            <td>
                                Waiting for client document
                            </td>

                            <td>
                                <span class="activity-status waiting">
                                    <span class="status-dot"></span>
                                    Waiting
                                </span>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>


        {{-- =====================================================
            REPORTS TAB
        ====================================================== --}}
        <div
            id="reportsContent"
            class="activity-tab-content"
            style="display: none;"
        >

            <div class="reports-content">

                <div class="reports-header">

                    <div>
                        <h2 class="activity-section-title">
                            JK&amp;C Reports
                        </h2>

                        <p class="activity-section-description">
                            Formal reports delivered under your engagements.
                        </p>
                    </div>

                </div>


                {{-- Report 1 --}}
                <div class="report-item">

                    <div class="report-icon">

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
                                d="M9 12h6m-6 4h6m2.25 5.25H6.75A2.25 2.25 0 0 1 4.5 19V5A2.25 2.25 0 0 1 6.75 2.75h7.5L19.5 8v11A2.25 2.25 0 0 1 17.25 21.25Z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14.25 2.75V8h5.25"
                            />
                        </svg>

                    </div>

                    <div class="report-info">

                        <h3>
                            Engagement Activity Report
                        </h3>

                        <p>
                            Summary of client-visible activities performed under your engagements.
                        </p>

                    </div>

                    <button
                        type="button"
                        class="report-view-btn"
                    >
                        View Report
                    </button>

                </div>


                {{-- Report 2 --}}
                <div class="report-item">

                    <div class="report-icon">

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
                                d="M9 12h6m-6 4h6m2.25 5.25H6.75A2.25 2.25 0 0 1 4.5 19V5A2.25 2.25 0 0 1 6.75 2.75h7.5L19.5 8v11A2.25 2.25 0 0 1 17.25 21.25Z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14.25 2.75V8h5.25"
                            />
                        </svg>

                    </div>

                    <div class="report-info">

                        <h3>
                            Engagement Summary Report
                        </h3>

                        <p>
                            Formal summary of engagement progress, activities, and outcomes.
                        </p>

                    </div>

                    <button
                        type="button"
                        class="report-view-btn"
                    >
                        View Report
                    </button>

                </div>


                {{-- Report 3 --}}
                <div class="report-item">

                    <div class="report-icon">

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
                                d="M9 12h6m-6 4h6m2.25 5.25H6.75A2.25 2.25 0 0 1 4.5 19V5A2.25 2.25 0 0 1 6.75 2.75h7.5L19.5 8v11A2.25 2.25 0 0 1 17.25 21.25Z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14.25 2.75V8h5.25"
                            />
                        </svg>

                    </div>

                    <div class="report-info">

                        <h3>
                            Client Service Report
                        </h3>

                        <p>
                            Formal report of services and client-facing work completed by JK&amp;C.
                        </p>

                    </div>

                    <button
                        type="button"
                        class="report-view-btn"
                    >
                        View Report
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =============================================================
    PAGE STYLES
============================================================= --}}
<style>

    /* =========================================================
       PAGE CONTAINER
       Matches the Billing page outer width/alignment
    ========================================================== */

    .activity-reports-page {
        width: 100%;
        max-width: 100%;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }


    /* =========================================================
       PAGE HEADER
    ========================================================== */

    .activity-page-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 24px;
        margin-bottom: 22px;
    }


    .activity-header-copy {
        min-width: 0;
    }


    .activity-eyebrow {
        margin-bottom: 3px;

        color: #2563eb;

        font-size: 10px;
        line-height: 1.2;

        font-weight: 800;

        letter-spacing: 0.8px;
    }


    .activity-page-title {
        margin: 0 0 6px 0;

        color: #0f172a;

        font-size: 26px;
        line-height: 1.2;

        font-weight: 700;

        letter-spacing: -0.02em;
    }


    .activity-page-description {
        margin: 0;

        color: #64748b;

        font-size: 13.5px;
        line-height: 1.6;
        max-width: 760px;
    }


    /* =========================================================
       MAIN CARD
    ========================================================== */

    .activity-card {
        width: 100%;

        background: #ffffff;

        border: 1px solid #e2e8f0;

        border-radius: 15px;

        box-shadow:
            0 5px 16px rgba(15, 23, 42, 0.045);

        overflow: hidden;

        box-sizing: border-box;
    }


    /* =========================================================
       TABS
    ========================================================== */

    .activity-tabs {
        min-height: 61px;

        display: flex;
        align-items: center;

        gap: 4px;

        padding: 0 18px;

        border-bottom: 1px solid #e2e8f0;

        box-sizing: border-box;

        overflow-x: auto;
    }


    .activity-tab {
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


    .activity-tab:hover {
        color: #2563eb;
    }


    .activity-tab.active {
        color: #2563eb;
    }


    .activity-tab.active::after {
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

    .activity-tab-content {
        width: 100%;
    }


    /* =========================================================
       ACTIVITY HEADER
    ========================================================== */

    .activity-section-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 20px;

        padding: 17px 18px 15px;

        box-sizing: border-box;
    }


    .activity-section-title {
        margin: 0 0 0;

        color: #0f172a;

        font-size: 14px;

        line-height: 1.3;

        font-weight: 700;
    }


    .activity-section-description {
        margin: 4px 0 0;

        color: #64748b;

        font-size: 11px;

        line-height: 1.4;
    }


    /* =========================================================
       EXPORT BUTTON
    ========================================================== */

    .activity-export-btn {
        flex-shrink: 0;

        height: 34px;

        padding: 0 14px;

        border: 1px solid #dbe3ed;

        border-radius: 8px;

        background: #ffffff;

        color: #334155;

        font-size: 12px;

        font-weight: 600;

        cursor: pointer;

        transition:
            background 0.15s ease,
            border-color 0.15s ease,
            color 0.15s ease;
    }


    .activity-export-btn:hover {
        background: #f8fafc;

        border-color: #cbd5e1;

        color: #0f172a;
    }


    /* =========================================================
       TABLE WRAPPER
    ========================================================== */

    .activity-table-wrapper {
        width: 100%;

        padding: 0 18px 18px;

        overflow-x: auto;

        box-sizing: border-box;
    }


    /* =========================================================
       TABLE
    ========================================================== */

    .activity-table {
        width: 100%;

        min-width: 850px;

        border-collapse: separate;

        border-spacing: 0;

        border: 1px solid #e2e8f0;

        border-radius: 11px;

        overflow: hidden;

        background: #ffffff;

        table-layout: fixed;
    }


    .activity-table th {
        height: 35px;

        padding: 0 12px;

        background: #f8fafc;

        border-bottom: 1px solid #e2e8f0;

        color: #64748b;

        font-size: 9px;

        line-height: 1;

        font-weight: 700;

        letter-spacing: 0.65px;

        text-align: left;

        white-space: nowrap;
    }


    .activity-table td {
        height: 49px;

        padding: 0 12px;

        border-bottom: 1px solid #e8edf3;

        color: #475569;

        font-size: 11px;

        vertical-align: middle;
    }


    .activity-table tbody tr:last-child td {
        border-bottom: none;
    }


    .activity-table tbody tr {
        transition: background 0.15s ease;
    }


    .activity-table tbody tr:hover {
        background: #fafcff;
    }


    /* =========================================================
       TABLE COLUMN WIDTHS
    ========================================================== */

    .activity-table th:nth-child(1),
    .activity-table td:nth-child(1) {
        width: 8%;
    }


    .activity-table th:nth-child(2),
    .activity-table td:nth-child(2) {
        width: 29%;
    }


    .activity-table th:nth-child(3),
    .activity-table td:nth-child(3) {
        width: 16%;
    }


    .activity-table th:nth-child(4),
    .activity-table td:nth-child(4) {
        width: 11%;
    }


    .activity-table th:nth-child(5),
    .activity-table td:nth-child(5) {
        width: 27%;
    }


    .activity-table th:nth-child(6),
    .activity-table td:nth-child(6) {
        width: 14%;
    }


    .activity-name {
        color: #0f172a;

        font-weight: 650;
    }


    /* =========================================================
       STATUS BADGES
    ========================================================== */

    .activity-status {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 5px 10px;

        border-radius: 999px;

        font-size: 10px;

        font-weight: 650;

        white-space: nowrap;
    }


    .activity-status.completed {
        color: #047857;

        background: #ecfdf5;
    }


    .activity-status.waiting {
        color: #b36b00;

        background: #fff7df;
    }


    .status-dot {
        width: 6px;
        height: 6px;

        border-radius: 50%;

        background: currentColor;

        display: inline-block;

        flex-shrink: 0;
    }


    /* =========================================================
       REPORTS
    ========================================================== */

    .reports-content {
        padding: 18px;

        box-sizing: border-box;
    }


    .reports-header {
        margin-bottom: 16px;
    }


    .report-item {
        min-height: 74px;

        display: flex;

        align-items: center;

        gap: 14px;

        padding: 14px 4px;

        border-top: 1px solid #e8edf3;

        box-sizing: border-box;
    }


    .report-icon {
        width: 38px;
        height: 38px;

        flex-shrink: 0;

        border-radius: 8px;

        background: #eff6ff;

        color: #2563eb;

        display: flex;

        align-items: center;

        justify-content: center;
    }


    .report-icon svg {
        width: 19px;
        height: 19px;
    }


    .report-info {
        flex: 1;

        min-width: 0;
    }


    .report-info h3 {
        margin: 0 0 3px;

        color: #0f172a;

        font-size: 13px;

        font-weight: 650;
    }


    .report-info p {
        margin: 0;

        color: #64748b;

        font-size: 11px;

        line-height: 1.4;
    }


    .report-view-btn {
        flex-shrink: 0;

        padding: 8px 12px;

        border: 1px solid #dbe3ed;

        border-radius: 7px;

        background: #ffffff;

        color: #334155;

        font-size: 11px;

        font-weight: 600;

        cursor: pointer;

        transition:
            background 0.15s ease,
            border-color 0.15s ease,
            color 0.15s ease;
    }


    .report-view-btn:hover {
        background: #f8fafc;

        border-color: #cbd5e1;

        color: #2563eb;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================== */

    @media (max-width: 900px) {

        .activity-page-title {
            font-size: 24px;
        }


        .activity-table-wrapper {
            overflow-x: auto;
        }

    }


    @media (max-width: 800px) {

        .activity-section-header {
            align-items: flex-start;
        }

    }


    @media (max-width: 600px) {

        .activity-page-header {
            flex-direction: column;
        }


        .activity-section-header {
            align-items: flex-start;

            gap: 14px;
        }


        .activity-section-title {
            font-size: 14px;
        }


        .activity-section-description {
            max-width: 500px;
        }


        .activity-table-wrapper {
            padding-left: 12px;
            padding-right: 12px;
        }


        .activity-tabs {
            padding-left: 12px;
            padding-right: 12px;
        }


        .reports-content {
            padding: 12px;
        }


        .report-item {
            align-items: flex-start;
        }


        .report-view-btn {
            margin-left: auto;
        }

    }

</style>


{{-- =============================================================
    JAVASCRIPT
============================================================= --}}
<script>

    function showActivityTab(tab) {

        const activitiesContent =
            document.getElementById('activitiesContent');

        const reportsContent =
            document.getElementById('reportsContent');

        const activitiesTab =
            document.getElementById('activitiesTab');

        const reportsTab =
            document.getElementById('reportsTab');


        if (tab === 'activities') {

            activitiesContent.style.display = 'block';

            reportsContent.style.display = 'none';

            activitiesTab.classList.add('active');

            reportsTab.classList.remove('active');

        }


        if (tab === 'reports') {

            activitiesContent.style.display = 'none';

            reportsContent.style.display = 'block';

            activitiesTab.classList.remove('active');

            reportsTab.classList.add('active');

        }

    }


    function exportActivities() {

        const rows = [

            [
                'Date',
                'Activity',
                'Engagement',
                'Duration',
                'Outcome',
                'Status'
            ],

            [
                'Aug 18',
                'SEC follow-up and coordination',
                'ENG-2026-0041',
                '1h 20m',
                'Additional requirement confirmed',
                'Completed'
            ],

            [
                'Aug 17',
                'Document review',
                'ENG-2026-0041',
                '2h 10m',
                'Draft prepared for client review',
                'Completed'
            ],

            [
                'Aug 15',
                'BIR coordination',
                'ENG-2026-0028',
                '45m',
                'Waiting for client document',
                'Waiting'
            ]

        ];


        const csvContent = rows
            .map(row =>
                row
                    .map(value =>
                        `"${String(value).replace(/"/g, '""')}"`
                    )
                    .join(',')
            )
            .join('\n');


        const blob = new Blob(
            [csvContent],
            {
                type: 'text/csv;charset=utf-8;'
            }
        );


        const url = URL.createObjectURL(blob);

        const link = document.createElement('a');


        link.setAttribute(
            'href',
            url
        );


        link.setAttribute(
            'download',
            'jkc-activities.csv'
        );


        link.style.visibility = 'hidden';


        document.body.appendChild(link);

        link.click();

        document.body.removeChild(link);

        URL.revokeObjectURL(url);

    }

</script>

@endsection