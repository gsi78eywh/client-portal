@extends('layouts.client')

@section('title', 'Human Capital')

@section('header-title', 'Human Capital')

@section('content')

<style>
    .kpi-card {
        cursor: pointer;
        transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
        user-select: none;
    }
    .kpi-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.12) !important;
        border-color: #93c5fd !important;
    }
    .kpi-card:focus {
        outline: 2px solid #2563eb;
        outline-offset: 2px;
    }
    .kpi-card.active-kpi {
        border-color: #2563eb !important;
        background: #f8faff !important;
        box-shadow: 0 0 0 1.5px #2563eb, 0 4px 12px rgba(37, 99, 235, 0.15) !important;
    }
    .fin-type-card {
        cursor: pointer;
        transition: all 0.15s ease;
        border: 1px solid #e2e8f0;
        background: #ffffff;
    }
    .fin-type-card:hover {
        border-color: #2563eb;
        background: #eff6ff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.08);
    }
    .tab-link {
        text-decoration: none;
        padding: 16px 0;
        font-size: 13.5px;
        font-weight: 600;
        color: #64748b;
        border-bottom: 2px solid transparent;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: color 0.15s ease, border-color 0.15s ease;
    }
    .tab-link:hover {
        color: #0f172a;
    }
    .tab-link.active-tab {
        color: #2563eb;
        font-weight: 700;
        border-bottom-color: #2563eb;
    }
    .badge-tab-count {
        background: #f1f5f9;
        color: #475569;
        font-size: 11px;
        font-weight: 700;
        padding: 2px 7px;
        border-radius: 10px;
    }
    .tab-link.active-tab .badge-tab-count {
        background: #eff6ff;
        color: #2563eb;
    }
    .kpi-pulse-updated {
        animation: kpiPulse 0.7s ease-in-out;
    }
    @keyframes kpiPulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.12); color: #2563eb; }
        100% { transform: scale(1); }
    }
    .row-highlight {
        animation: highlightFlash 1.5s ease-out;
    }
    @keyframes highlightFlash {
        0% { background-color: #ecfdf5; }
        100% { background-color: transparent; }
    }
    .modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(15, 23, 42, 0.5);
        backdrop-filter: blur(2px);
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    .modal-content-card {
        background: #ffffff;
        border-radius: 14px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        max-width: 650px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        border: 1px solid #e2e8f0;
    }
    .form-control-input {
        width: 100%;
        box-sizing: border-box;
        padding: 9px 13px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        font-size: 13.5px;
        color: #0f172a;
        background: #ffffff;
        font-family: inherit;
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }
    .form-control-input:focus {
        outline: none;
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
    }
    .form-label {
        display: block;
        font-size: 12.5px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 5px;
    }
    .req-star {
        color: #ef4444;
        font-weight: 700;
    }
    .hc-badge {
        font-size: 11.5px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }
    .hc-badge-active { background: #dcfce7; color: #15803d; }
    .hc-badge-review { background: #eff6ff; color: #1d4ed8; }
    .hc-badge-pending { background: #fef3c7; color: #b45309; }
    .hc-badge-scheduled { background: #f1f5f9; color: #475569; }
    .hc-badge-archived { background: #fee2e2; color: #b91c1c; }
</style>

<div class="human-capital-container" style="max-width: 1200px; padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <!-- TOP HEADER -->
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px; flex-wrap: wrap; gap: 14px;">
        <div>
            <div style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px;">
                BUSINESS • HUMAN CAPITAL
            </div>

            <h1 class="page-title" style="font-size: 26px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 6px 0; line-height: 1.2;">
                Human Capital
            </h1>

            <p class="page-description" style="font-size: 13.5px; color: #64748b; margin: 0; line-height: 1.6; max-width: 760px;">
                Organize people, employment records, attendance, leave and HR actions from one client workspace.
            </p>
        </div>

        <div style="display: flex; align-items: center; gap: 12px;">
            <span class="status-badge status-trial"
                style="background: #eff6ff; color: #2563eb; font-size: 12px; font-weight: 600; padding: 8px 16px; border-radius: 20px; display: inline-block;">
                30-Day Trial
            </span>

            {{-- SINGLE PRIMARY + NEW BUTTON --}}
            <button id="btnTopNewHumanCapital" class="btn btn-primary" onclick="openHcModal()"
                style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 9px 20px; font-size: 13.5px; font-weight: 600; cursor: pointer; box-shadow: 0 1px 2px rgba(37, 99, 235, 0.2); display: flex; align-items: center; gap: 6px;">
                <span style="font-size: 16px; line-height: 1;">+</span>
                New
            </button>
        </div>
    </div>

    <!-- MODULE OVERVIEW & ACTIVITY TREND SECTION -->
    <div style="display: grid; grid-template-columns: 1.6fr 1fr; gap: 16px; margin-bottom: 16px;">

        <!-- MODULE OVERVIEW -->
        <div class="card"
            style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div>
                <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">
                    MODULE OVERVIEW
                </div>

                <h2 style="font-size: 20px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0; letter-spacing: -0.01em;">
                    Everything important, without the clutter.
                </h2>

                <p style="font-size: 13.5px; color: #64748b; margin: 0; line-height: 1.5; max-width: 520px;">
                    Organize people, employment records, attendance, leave and HR actions from one client workspace.
                </p>
            </div>

            <div style="display: flex; gap: 10px; margin-top: 24px; flex-wrap: wrap;">
                <button onclick="openHcModal()"
                    style="background: #eff6ff; color: #2563eb; border: none; border-radius: 8px; padding: 9px 16px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Quick action
                </button>

                <a href="{{ route('settings.modules.human-capital') }}"
                    style="background: #ffffff; color: #334155; border: 1px solid #cbd5e1; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 7px; text-decoration: none;">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                        stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-1.7 1.7-.06-.06a1.7 1.7 0 0 0-1.88-.34 1.7 1.7 0 0 0-1.03 1.55V20h-2.4v-.21a1.7 1.7 0 0 0-1.03-1.55 1.7 1.7 0 0 0-1.88.34l-.06.06-1.7-1.7.06-.06A1.7 1.7 0 0 0 8.4 15a1.7 1.7 0 0 0-1.55-1.03H6.6v-2.4h.25A1.7 1.7 0 0 0 8.4 10a1.7 1.7 0 0 0-.34-1.88L8 8.06l1.7-1.7.06.06a1.7 1.7 0 0 0 1.88.34 1.7 1.7 0 0 0 1.03-1.55V5h2.4v.21a1.7 1.7 0 0 0 1.03 1.55 1.7 1.7 0 0 0 1.88-.34l.06-.06 1.7 1.7-.06.06A1.7 1.7 0 0 0 19.4 10a1.7 1.7 0 0 0 1.55 1.03h.25v2.4h-.25A1.7 1.7 0 0 0 19.4 15z"></path>
                    </svg>
                    Configure module
                </a>
            </div>
        </div>

        <!-- ACTIVITY TREND -->
        <div class="card"
            style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 2px;">
                <div>
                    <h3 style="font-size: 15px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0; line-height: 1.2;">
                        Activity trend
                    </h3>
                    <div style="font-size: 11px; color: #94a3b8; line-height: 1.2;">
                        Last 30 days
                    </div>
                </div>

                <span style="background: #ecfdf5; color: #15803d; font-size: 10.5px; font-weight: 700; padding: 6px 11px; border-radius: 14px; white-space: nowrap;">
                    Healthy
                </span>
            </div>

            <!-- VISUAL BAR CHART -->
            <div style="display: flex; align-items: flex-end; justify-content: space-between; gap: 7px; height: 105px; margin-top: 12px; padding: 8px 1px 0 1px; border-bottom: 1px solid #e2e8f0;">
                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 30%; border-radius: 4px 4px 2px 2px;"></div>
                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 50%; border-radius: 4px 4px 2px 2px;"></div>
                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 42%; border-radius: 4px 4px 2px 2px;"></div>
                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 72%; border-radius: 4px 4px 2px 2px;"></div>
                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 60%; border-radius: 4px 4px 2px 2px;"></div>
                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 83%; border-radius: 4px 4px 2px 2px;"></div>
                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 68%; border-radius: 4px 4px 2px 2px;"></div>
                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 95%; border-radius: 4px 4px 2px 2px;"></div>
                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 73%; border-radius: 4px 4px 2px 2px;"></div>
                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 85%; border-radius: 4px 4px 2px 2px;"></div>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 8px;">
                <span style="font-size: 10.5px; color: #94a3b8;">Activity</span>
                <span style="font-size: 11px; font-weight: 700; color: #2563eb;">+18% this month</span>
            </div>
        </div>

    </div>

    <!-- 4 CLICKABLE KPI / SUMMARY CARDS -->
    <div class="dashboard-grid"
        style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px;">

        <!-- CARD 1: HEADCOUNT -->
        <div id="kpiHeadcount" class="card kpi-card" role="button" tabindex="0" onclick="filterByKpi('employees')"
            title="Click to view all Employee records"
            style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </div>

            <div id="kpiHeadcountVal" class="card-value"
                style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                {{ $humanCapitalStats['headcount'] ?? 48 }}
            </div>

            <div class="card-label"
                style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Headcount
            </div>

            <div id="kpiHeadcountSubtext" class="card-description"
                style="font-size: 11px; color: #94a3b8;">
                {{ max(0, ($humanCapitalStats['headcount_raw'] ?? 48) - ($humanCapitalStats['on_leave_raw'] ?? 3)) }} active
            </div>
        </div>

        <!-- CARD 2: ON LEAVE -->
        <div id="kpiOnLeave" class="card kpi-card" role="button" tabindex="0" onclick="filterByKpi('leave')"
            title="Click to view Leave records"
            style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                    <path d="M8 14h2"></path>
                    <path d="M14 14h2"></path>
                    <path d="M8 18h2"></path>
                    <path d="M14 18h2"></path>
                </svg>
            </div>

            <div id="kpiOnLeaveVal" class="card-value"
                style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                {{ $humanCapitalStats['on_leave'] ?? 3 }}
            </div>

            <div class="card-label"
                style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                On leave
            </div>

            <div class="card-description"
                style="font-size: 11px; color: #94a3b8;">
                Today
            </div>
        </div>

        <!-- CARD 3: PENDING HR ACTIONS -->
        <div id="kpiPendingActions" class="card kpi-card" role="button" tabindex="0" onclick="filterByKpi('pending')"
            title="Click to view Pending HR actions"
            style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 17 9 11 13 15 21 7"></polyline>
                    <polyline points="14 7 21 7 21 14"></polyline>
                </svg>
            </div>

            <div id="kpiPendingActionsVal" class="card-value"
                style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                {{ $humanCapitalStats['pending_actions'] ?? 2 }}
            </div>

            <div class="card-label"
                style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Pending HR actions
            </div>

            <div class="card-description"
                style="font-size: 11px; color: #94a3b8;">
                Needs attention
            </div>
        </div>

        <!-- CARD 4: HR RECORDS -->
        <div id="kpiHrRecords" class="card kpi-card" role="button" tabindex="0" onclick="filterByKpi('hr_records')"
            title="Click to view HR Records"
            style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="8" y1="13" x2="16" y2="13"></line>
                    <line x1="8" y1="17" x2="16" y2="17"></line>
                </svg>
            </div>

            <div id="kpiHrRecordsVal" class="card-value"
                style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                {{ $humanCapitalStats['hr_records'] ?? 144 }}
            </div>

            <div class="card-label"
                style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                HR records
            </div>

            <div class="card-description"
                style="font-size: 11px; color: #94a3b8;">
                Current
            </div>
        </div>

    </div>

    <!-- TABBED CONTENT CARD (RECORDS AREA) -->
    <div id="recordsArea" class="card"
        style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 0; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-bottom: 24px;">

        <!-- NAV TABS -->
        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding: 0 24px; overflow-x: auto;">
            <div style="display: flex; gap: 24px; white-space: nowrap;">
                <a id="tabAll" class="tab-link active-tab" onclick="setFilter('all')">
                    All Records
                    <span id="badgeTabAllCount" class="badge-tab-count">{{ count($humanCapitalRecords) }}</span>
                </a>

                <a id="tabEmployees" class="tab-link" onclick="setFilter('employees')">
                    Employees
                    <span id="badgeTabEmployeesCount" class="badge-tab-count">{{ $humanCapitalRecords->where('record_type', 'employee')->count() }}</span>
                </a>

                <a id="tabHrRecords" class="tab-link" onclick="setFilter('hr_records')">
                    HR Records
                    <span id="badgeTabHrRecordsCount" class="badge-tab-count">{{ $humanCapitalRecords->where('record_type', 'hr_document')->count() }}</span>
                </a>

                <a id="tabAttendance" class="tab-link" onclick="setFilter('attendance')">
                    Attendance
                    <span id="badgeTabAttendanceCount" class="badge-tab-count">{{ $humanCapitalRecords->where('record_type', 'attendance')->count() }}</span>
                </a>

                <a id="tabLeave" class="tab-link" onclick="setFilter('leave')">
                    Leave
                    <span id="badgeTabLeaveCount" class="badge-tab-count">{{ $humanCapitalRecords->where('record_type', 'leave')->count() }}</span>
                </a>

                <a id="tabPending" class="tab-link" onclick="setFilter('pending')">
                    Pending Actions
                    <span id="badgeTabPendingCount" class="badge-tab-count" style="background: #fef3c7; color: #b45309;">
                        {{ $humanCapitalRecords->filter(fn($r) => in_array(is_array($r) ? ($r['status'] ?? '') : ($r->status ?? ''), ['Pending', 'Under Review']))->count() }}
                    </span>
                </a>
            </div>

            <div style="padding: 12px 0;">
                <span style="background: #f1f5f9; color: #475569; font-size: 11px; font-weight: 600; padding: 5px 12px; border-radius: 14px; border: 1px solid #e2e8f0;">
                    V1 Client Mockup
                </span>
            </div>
        </div>

        <!-- ACTIVE FILTER BANNER (DYNAMIC) -->
        <div id="activeFilterBanner" style="display: none; background: #eff6ff; border-bottom: 1px solid #bfdbfe; padding: 10px 24px; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 8px;">
                <span style="font-size: 12px; color: #1e40af; font-weight: 600;">Active Filter:</span>
                <span id="activeFilterBadge" style="background: #2563eb; color: #ffffff; font-size: 11.5px; font-weight: 700; padding: 3px 10px; border-radius: 12px;">
                    All
                </span>
            </div>
            <button onclick="setFilter('all')" style="background: none; border: none; font-size: 12px; color: #2563eb; font-weight: 600; cursor: pointer; text-decoration: underline;">
                Reset Filter
            </button>
        </div>

        <div style="padding: 24px;">

            <!-- SEARCH & FILTER TOOLBAR -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; flex-wrap: wrap; gap: 12px;">
                <div>
                    <h2 id="sectionTitle" class="card-title"
                        style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                        Human Capital Records
                    </h2>
                    <p id="sectionDesc" class="card-description"
                        style="font-size: 13px; color: #64748b; margin: 0;">
                        Showing all personnel, document, attendance, and leave records.
                    </p>
                </div>

                <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="position: relative;">
                        <input type="text" id="hcSearchInput" onkeyup="applySearchAndFilter()" placeholder="Search records, staff, title..."
                            style="padding: 7px 12px 7px 30px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12.5px; width: 220px; outline: none;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2"
                            style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>

                    <select id="hcStatusSelect" onchange="applySearchAndFilter()"
                        style="background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 8px; padding: 7px 12px; font-size: 12.5px; font-weight: 600; color: #334155; cursor: pointer;">
                        <option value="all">All Statuses</option>
                        <option value="active">Active</option>
                        <option value="on leave">On Leave</option>
                        <option value="pending">Pending</option>
                        <option value="present">Present</option>
                        <option value="probationary">Probationary</option>
                        <option value="inactive">Inactive / Separated</option>
                    </select>
                </div>
            </div>

            <!-- TABLE CONTAINER -->
            <div class="table-wrapper"
                style="border: 1px solid #f1f5f9; border-radius: 8px; overflow-x: auto;">

                <table class="ordo-table"
                    style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13px;">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; color: #64748b; font-size: 11px; text-transform: uppercase; letter-spacing: 0.05em;">
                            <th style="padding: 12px 16px; font-weight: 700;">Reference</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Name / Document</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Type / Category</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Date / Period</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Status</th>
                            <th style="padding: 12px 16px; font-weight: 700; text-align: right;">Actions</th>
                        </tr>
                    </thead>

                    <tbody id="hcTableBody" style="color: #334155;">
                        @forelse ($humanCapitalRecords as $record)
                            @php
                                $r = is_array($record) ? (object) $record : $record;
                                $meta = is_array($r->metadata) ? $r->metadata : (json_decode($r->metadata ?? '[]', true) ?: []);
                                $recType = $r->record_type ?? 'employee';
                                $statusLower = strtolower(trim($r->status ?? ''));
                                $badgeClass = match($statusLower) {
                                    'active', 'approved', 'present' => 'hc-badge-active',
                                    'on leave' => 'hc-badge-review',
                                    'pending', 'under review' => 'hc-badge-pending',
                                    'late', 'half day', 'probationary' => 'hc-badge-scheduled',
                                    'absent', 'inactive', 'separated', 'rejected', 'cancelled' => 'hc-badge-archived',
                                    default => 'hc-badge-active',
                                };
                                $typeLabel = match($recType) {
                                    'employee' => 'Personnel',
                                    'hr_document' => 'HR Record',
                                    'attendance' => 'Attendance',
                                    'leave' => 'Leave',
                                    default => ucfirst($recType),
                                };
                                $dateDisplay = $r->formatted_record_date ?? (!empty($r->record_date) ? \Carbon\Carbon::parse($r->record_date)->format('M d, Y') : '-');
                                if ($recType === 'leave' && !empty($r->end_date)) {
                                    $dateDisplay .= ' &rarr; ' . ($r->formatted_end_date ?? \Carbon\Carbon::parse($r->end_date)->format('M d, Y'));
                                }
                            @endphp
                            <tr id="row-{{ $r->id }}"
                                data-id="{{ $r->id }}"
                                data-type="{{ $recType }}"
                                data-status="{{ $statusLower }}"
                                data-search="{{ strtolower(($r->reference_no ?? '') . ' ' . ($r->title ?? '') . ' ' . ($r->category ?? '') . ' ' . ($r->status ?? '') . ' ' . ($meta['employee_name'] ?? '') . ' ' . ($meta['position'] ?? '')) }}"
                                data-json="{{ json_encode([
                                    'id' => $r->id,
                                    'record_type' => $recType,
                                    'reference_no' => $r->reference_no ?? '',
                                    'title' => $r->title ?? '',
                                    'category' => $r->category ?? '',
                                    'record_date' => is_string($r->record_date) ? substr($r->record_date, 0, 10) : ($r->record_date?->format('Y-m-d') ?? ''),
                                    'end_date' => is_string($r->end_date) ? substr($r->end_date, 0, 10) : ($r->end_date?->format('Y-m-d') ?? ''),
                                    'status' => $r->status ?? 'Active',
                                    'description' => $r->description ?? '',
                                    'metadata' => $meta,
                                    'attachment_path' => $r->attachment_path ?? null,
                                    'attachment_name' => $r->attachment_name ?? null,
                                ]) }}"
                                style="border-bottom: 1px solid #f1f5f9; transition: background 0.15s ease;">
                                <td style="padding: 14px 16px; font-weight: 700; color: #0f172a; font-family: monospace; font-size: 12.5px;">
                                    {{ $r->reference_no ?? 'EMP-000' }}
                                </td>

                                <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                    <div>{{ $r->title ?? '-' }}</div>
                                    @if($recType === 'employee' && !empty($meta['position']))
                                        <div style="font-size: 11.5px; color: #64748b; font-weight: 400; margin-top: 1px;">
                                            {{ $meta['position'] }} &bull; {{ $meta['employment_type'] ?? 'Regular' }}
                                        </div>
                                    @elseif($recType === 'hr_document' && !empty($meta['employee_name']))
                                        <div style="font-size: 11.5px; color: #64748b; font-weight: 400; margin-top: 1px;">
                                            Employee: {{ $meta['employee_name'] }}
                                        </div>
                                    @elseif($recType === 'attendance' && !empty($meta['time_in']))
                                        <div style="font-size: 11.5px; color: #64748b; font-weight: 400; margin-top: 1px;">
                                            In: {{ $meta['time_in'] }} @if(!empty($meta['time_out'])) &bull; Out: {{ $meta['time_out'] }} @endif
                                        </div>
                                    @elseif($recType === 'leave' && !empty($meta['number_of_days']))
                                        <div style="font-size: 11.5px; color: #64748b; font-weight: 400; margin-top: 1px;">
                                            Duration: {{ $meta['number_of_days'] }} Day(s)
                                        </div>
                                    @endif
                                </td>

                                <td style="padding: 14px 16px; color: #64748b;">
                                    <span style="display: inline-block; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.04em; color: #2563eb; background: #eff6ff; padding: 2px 7px; border-radius: 4px; margin-bottom: 2px;">
                                        {{ $typeLabel }}
                                    </span>
                                    <div style="color: #334155; font-size: 12.5px;">{{ $r->category ?? '-' }}</div>
                                </td>

                                <td style="padding: 14px 16px; color: #64748b; font-size: 12.5px; white-space: nowrap;">
                                    {!! $dateDisplay !!}
                                </td>

                                <td style="padding: 14px 16px;">
                                    <span class="hc-badge {{ $badgeClass }}">
                                        ● {{ $r->status ?? 'Active' }}
                                    </span>
                                </td>

                                <td style="padding: 14px 16px; text-align: right; white-space: nowrap;">
                                    <button type="button" onclick="viewHcRecord({{ $r->id }})"
                                        style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 4px 11px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer; margin-right: 4px;">
                                        View
                                    </button>
                                    <button type="button" onclick="editHcRecord({{ $r->id }})"
                                        style="background: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; padding: 4px 11px; font-size: 12px; font-weight: 600; color: #2563eb; cursor: pointer;">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr id="hcNoRecordsInitial">
                                <td colspan="6" style="padding: 36px; text-align: center; color: #64748b;">
                                    No human capital records found. Click "+ New" to add an employee, HR document, attendance, or leave record.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- EMPTY STATE ON FILTER -->
                <div id="hcEmptyState" style="display: none; padding: 48px 24px; text-align: center;">
                    <div style="width: 44px; height: 44px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; margin: 0 auto 12px auto;">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                    <h3 style="font-size: 15px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">No matching records</h3>
                    <p style="font-size: 13px; color: #64748b; margin: 0 0 14px 0;">No human capital records match your current filter and search query.</p>
                    <button onclick="setFilter('all')" style="background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe; border-radius: 6px; padding: 6px 14px; font-size: 12.5px; font-weight: 600; cursor: pointer;">
                        Clear all filters
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- RECENT HR ACTIVITY SECTION -->
    <div class="card"
        style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-top: 24px;">

        <div class="card-header" style="margin-bottom: 18px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2 class="card-title" style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Recent HR Activity
                </h2>
                <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
                    Auditable stream of recent organizational human capital events and submissions.
                </p>
            </div>
            <span style="font-size: 12px; color: #94a3b8; font-weight: 600;">Live Feed</span>
        </div>

        <div id="hcActivityList" class="module-list" style="display: flex; flex-direction: column; gap: 12px;">
            @foreach ($humanCapitalActivities as $activity)
                <div class="module-list-item"
                    style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">
                    <div>
                        <strong style="font-size: 13.5px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                            {{ $activity['title'] ?? 'HR Activity Logged' }}
                        </strong>
                        <p style="font-size: 12px; color: #64748b; margin: 0;">
                            Category: {{ $activity['type'] ?? 'General' }} &bull; Timestamp: {{ $activity['time'] ?? 'Recently' }}
                        </p>
                    </div>

                    <span class="status-badge status-active"
                        style="background: #ecfdf5; color: #15803d; font-size: 11.5px; font-weight: 700; padding: 4px 10px; border-radius: 12px;">
                        {{ $activity['type'] ?? 'Completed' }}
                    </span>
                </div>
            @endforeach
        </div>

    </div>

</div>

<!-- ======================================================== -->
<!-- MODAL 1: CREATE RECORD (+ NEW) MODAL -->
<!-- ======================================================== -->
<div id="hcModal" class="modal-backdrop" onclick="handleHcModalBackdrop(event)">
    <div class="modal-content-card" style="padding: 26px 28px;">

        <!-- STAGE 1: SELECTION -->
        <div id="hcStage1">
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
                <div>
                    <div style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 4px;">
                        + NEW HUMAN CAPITAL RECORD
                    </div>
                    <h2 style="font-size: 20px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                        Select Record Type
                    </h2>
                    <p style="font-size: 13px; color: #64748b; margin: 0;">
                        Choose the category of human capital entry you wish to record.
                    </p>
                </div>
                <button type="button" onclick="closeHcModal()" style="background: none; border: none; font-size: 20px; color: #94a3b8; cursor: pointer; line-height: 1;">&times;</button>
            </div>

            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-top: 20px;">
                <!-- OPTION 1: EMPLOYEE / PERSONNEL -->
                <div class="fin-type-card" onclick="selectHcType('employee')"
                    style="padding: 18px; border-radius: 10px; display: flex; flex-direction: column; gap: 8px;">
                    <div style="width: 36px; height: 36px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div>
                        <strong style="font-size: 14px; color: #0f172a; display: block; margin-bottom: 2px;">
                            Employee / Personnel Record
                        </strong>
                        <span style="font-size: 12px; color: #64748b; line-height: 1.4; display: block;">
                            Add personnel profile, position, department, work arrangement, and employment terms.
                        </span>
                    </div>
                </div>

                <!-- OPTION 2: HR RECORD / DOCUMENT -->
                <div class="fin-type-card" onclick="selectHcType('hr_document')"
                    style="padding: 18px; border-radius: 10px; display: flex; flex-direction: column; gap: 8px;">
                    <div style="width: 36px; height: 36px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="8" y1="13" x2="16" y2="13"></line>
                            <line x1="8" y1="17" x2="16" y2="17"></line>
                        </svg>
                    </div>
                    <div>
                        <strong style="font-size: 14px; color: #0f172a; display: block; margin-bottom: 2px;">
                            HR Record / Document
                        </strong>
                        <span style="font-size: 12px; color: #64748b; line-height: 1.4; display: block;">
                            Upload executed employment agreements, NDAs, medical clearance, or HR records.
                        </span>
                    </div>
                </div>

                <!-- OPTION 3: ATTENDANCE RECORD -->
                <div class="fin-type-card" onclick="selectHcType('attendance')"
                    style="padding: 18px; border-radius: 10px; display: flex; flex-direction: column; gap: 8px;">
                    <div style="width: 36px; height: 36px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <div>
                        <strong style="font-size: 14px; color: #0f172a; display: block; margin-bottom: 2px;">
                            Attendance Record
                        </strong>
                        <span style="font-size: 12px; color: #64748b; line-height: 1.4; display: block;">
                            Log employee daily attendance, shift timing, presence, or tardiness details.
                        </span>
                    </div>
                </div>

                <!-- OPTION 4: LEAVE RECORD -->
                <div class="fin-type-card" onclick="selectHcType('leave')"
                    style="padding: 18px; border-radius: 10px; display: flex; flex-direction: column; gap: 8px;">
                    <div style="width: 36px; height: 36px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                    <div>
                        <strong style="font-size: 14px; color: #0f172a; display: block; margin-bottom: 2px;">
                            Leave Record
                        </strong>
                        <span style="font-size: 12px; color: #64748b; line-height: 1.4; display: block;">
                            Record vacation, sick, emergency, or statutory leave requests with start and end dates.
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- STAGE 2: DEDICATED FORMS -->
        <div id="hcStage2" style="display: none;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
                <button type="button" onclick="backToHcStage1()" style="background: none; border: none; color: #2563eb; font-size: 12.5px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 6px;">
                    &larr; Back to record selection
                </button>
                <button type="button" onclick="closeHcModal()" style="background: none; border: none; font-size: 20px; color: #94a3b8; cursor: pointer; line-height: 1;">&times;</button>
            </div>

            <form id="hcCreateForm" onsubmit="submitHcCreateForm(event)" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="record_type" id="createRecordType" value="employee">

                <div id="formTitleArea" style="margin-bottom: 18px;">
                    <h2 id="createFormTitle" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                        Employee / Personnel Record
                    </h2>
                    <p id="createFormSubtitle" style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Enter details for the new personnel profile.
                    </p>
                </div>

                {{-- DYNAMIC FORM FIELDS CONTAINER --}}
                <div id="createFieldsContainer">
                    {{-- Form 1: Employee --}}
                    <div id="fieldsEmployee" class="hc-form-type-fields">
                        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-label">Employee Name <span class="req-star">*</span></label>
                                <input type="text" name="employee_name" class="form-control-input" placeholder="e.g. Maria Teresa Santos" required>
                            </div>
                            <div>
                                <label class="form-label">Employee ID</label>
                                <input type="text" name="employee_id" class="form-control-input" placeholder="e.g. EMP-049">
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-label">Department / Unit</label>
                                <select name="department" class="form-control-input">
                                    <option value="Executive & Operations">Executive &amp; Operations</option>
                                    <option value="Legal & Compliance">Legal &amp; Compliance</option>
                                    <option value="Finance & Accounting">Finance &amp; Accounting</option>
                                    <option value="Technology & Systems">Technology &amp; Systems</option>
                                    <option value="Human Resources">Human Resources</option>
                                    <option value="Logistics & Administration">Logistics &amp; Administration</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label">Position / Job Title</label>
                                <input type="text" name="position" class="form-control-input" placeholder="e.g. Operations Manager">
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-label">Employment Type</label>
                                <select name="employment_type" class="form-control-input">
                                    <option value="Regular">Regular</option>
                                    <option value="Probationary">Probationary</option>
                                    <option value="Contractual">Contractual</option>
                                    <option value="Part-time">Part-time</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label">Work Arrangement</label>
                                <select name="work_arrangement" class="form-control-input">
                                    <option value="On-site">On-site</option>
                                    <option value="Hybrid">Hybrid</option>
                                    <option value="Remote">Remote</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label">Employment Status <span class="req-star">*</span></label>
                                <select name="employment_status" class="form-control-input" required>
                                    <option value="Active">Active</option>
                                    <option value="On Leave">On Leave</option>
                                    <option value="Inactive">Inactive</option>
                                    <option value="Separated">Separated</option>
                                </select>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-label">Date Hired</label>
                                <input type="date" name="date_hired" class="form-control-input" value="{{ date('Y-m-d') }}">
                            </div>
                            <div>
                                <label class="form-label">Reporting Manager</label>
                                <input type="text" name="reporting_manager" class="form-control-input" placeholder="e.g. Head of Operations">
                            </div>
                        </div>

                        <div style="margin-bottom: 14px;">
                            <label class="form-label">Notes</label>
                            <textarea name="notes" rows="2" class="form-control-input" placeholder="Any additional personnel background or operational remarks..."></textarea>
                        </div>

                        <div style="margin-bottom: 14px;">
                            <label class="form-label">Supporting Document (e.g. Resume, Contract, ID)</label>
                            <input type="file" name="file" class="form-control-input" accept=".pdf,.doc,.docx,.png,.jpg">
                        </div>
                    </div>

                    {{-- Form 2: HR Record / Document --}}
                    <div id="fieldsHrDoc" class="hc-form-type-fields" style="display: none;">
                        <div style="margin-bottom: 14px;">
                            <label class="form-label">Record / Document Title <span class="req-star">*</span></label>
                            <input type="text" name="title" class="form-control-input" placeholder="e.g. Signed Employment Agreement - Maria Santos">
                        </div>

                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-label">Employee Associated <span class="req-star">*</span></label>
                                <input type="text" name="employee_name" class="form-control-input" placeholder="e.g. Maria Santos">
                            </div>
                            <div>
                                <label class="form-label">Record / Document Type <span class="req-star">*</span></label>
                                <select name="document_type" class="form-control-input">
                                    <option value="Employment Contract">Employment Contract</option>
                                    <option value="Medical Clearance">Medical Clearance</option>
                                    <option value="NDA / IP Agreement">NDA / IP Agreement</option>
                                    <option value="Performance Evaluation">Performance Evaluation</option>
                                    <option value="Memo / Notice">Memo / Notice</option>
                                    <option value="Certificate of Employment">Certificate of Employment</option>
                                    <option value="Statutory Benefit Filing">Statutory Benefit Filing</option>
                                    <option value="Other HR Record">Other HR Record</option>
                                </select>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-label">Date of Record</label>
                                <input type="date" name="record_date" class="form-control-input" value="{{ date('Y-m-d') }}">
                            </div>
                            <div>
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control-input">
                                    <option value="Active">Active</option>
                                    <option value="Pending Review">Pending Review</option>
                                    <option value="Archived">Archived</option>
                                </select>
                            </div>
                        </div>

                        <div style="margin-bottom: 14px;">
                            <label class="form-label">Description / Notes</label>
                            <textarea name="description" rows="2" class="form-control-input" placeholder="Summary of document purpose or covenants..."></textarea>
                        </div>

                        <div style="margin-bottom: 14px;">
                            <label class="form-label">Attachment <span class="req-star">*</span></label>
                            <input type="file" name="file" class="form-control-input" accept=".pdf,.doc,.docx,.png,.jpg">
                        </div>
                    </div>

                    {{-- Form 3: Attendance --}}
                    <div id="fieldsAttendance" class="hc-form-type-fields" style="display: none;">
                        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-label">Employee <span class="req-star">*</span></label>
                                <input type="text" name="employee_name" class="form-control-input" placeholder="e.g. Maria Santos">
                            </div>
                            <div>
                                <label class="form-label">Date <span class="req-star">*</span></label>
                                <input type="date" name="date" class="form-control-input" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-label">Attendance Status <span class="req-star">*</span></label>
                                <select name="attendance_status" class="form-control-input">
                                    <option value="Present">Present</option>
                                    <option value="Late">Late</option>
                                    <option value="Half Day">Half Day</option>
                                    <option value="On Leave">On Leave</option>
                                    <option value="Absent">Absent</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label">Time In</label>
                                <input type="text" name="time_in" class="form-control-input" placeholder="e.g. 08:30 AM">
                            </div>
                            <div>
                                <label class="form-label">Time Out</label>
                                <input type="text" name="time_out" class="form-control-input" placeholder="e.g. 05:30 PM">
                            </div>
                        </div>

                        <div style="margin-bottom: 14px;">
                            <label class="form-label">Notes</label>
                            <textarea name="notes" rows="2" class="form-control-input" placeholder="Shift details, justification for tardiness, or desk assignment..."></textarea>
                        </div>
                    </div>

                    {{-- Form 4: Leave --}}
                    <div id="fieldsLeave" class="hc-form-type-fields" style="display: none;">
                        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-label">Employee <span class="req-star">*</span></label>
                                <input type="text" name="employee_name" class="form-control-input" placeholder="e.g. Roberto Jose Dizon">
                            </div>
                            <div>
                                <label class="form-label">Leave Type <span class="req-star">*</span></label>
                                <select name="leave_type" class="form-control-input">
                                    <option value="Vacation Leave">Vacation Leave</option>
                                    <option value="Sick Leave">Sick Leave</option>
                                    <option value="Emergency Leave">Emergency Leave</option>
                                    <option value="Maternity / Paternity Leave">Maternity / Paternity Leave</option>
                                    <option value="Bereavement Leave">Bereavement Leave</option>
                                    <option value="Other Leave">Other Leave</option>
                                </select>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-label">Start Date <span class="req-star">*</span></label>
                                <input type="date" name="start_date" id="leaveStartDate" onchange="autoCalcDays()" class="form-control-input" value="{{ date('Y-m-d') }}">
                            </div>
                            <div>
                                <label class="form-label">End Date <span class="req-star">*</span></label>
                                <input type="date" name="end_date" id="leaveEndDate" onchange="autoCalcDays()" class="form-control-input" value="{{ date('Y-m-d') }}">
                            </div>
                            <div>
                                <label class="form-label">Number of Days</label>
                                <input type="number" name="number_of_days" id="leaveDaysInput" step="0.5" min="0.5" class="form-control-input" value="1">
                            </div>
                        </div>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px;">
                            <div>
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control-input">
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label">Supporting Document (e.g. Medical Certificate)</label>
                                <input type="file" name="file" class="form-control-input" accept=".pdf,.doc,.docx,.png,.jpg">
                            </div>
                        </div>

                        <div style="margin-bottom: 14px;">
                            <label class="form-label">Reason / Notes</label>
                            <textarea name="reason" rows="2" class="form-control-input" placeholder="Reason for leave and handover endorsement..."></textarea>
                        </div>
                    </div>
                </div>

                {{-- BUTTONS --}}
                <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 22px; border-top: 1px solid #f1f5f9; padding-top: 16px;">
                    <button type="button" onclick="closeHcModal()"
                        style="background: #ffffff; border: 1px solid #cbd5e1; border-radius: 8px; padding: 9px 18px; font-size: 13px; font-weight: 600; color: #334155; cursor: pointer;">
                        Cancel
                    </button>
                    <button type="submit" id="btnSaveHcRecord"
                        style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 9px 22px; font-size: 13px; font-weight: 600; cursor: pointer; box-shadow: 0 1px 2px rgba(37,99,235,0.2);">
                        Save Record
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- ======================================================== -->
<!-- MODAL 2: VIEW RECORD DETAIL MODAL -->
<!-- ======================================================== -->
<div id="hcDetailModal" class="modal-backdrop" onclick="handleDetailModalBackdrop(event)">
    <div class="modal-content-card" style="padding: 26px 28px; max-width: 580px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
            <div>
                <div id="viewTypeTag" style="font-size: 10.5px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 4px;">
                    RECORD DETAILS
                </div>
                <h2 id="viewTitle" style="font-size: 19px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
                    Maria Santos
                </h2>
                <div id="viewRefBadge" style="font-size: 12px; font-family: monospace; color: #64748b;">
                    EMP-001
                </div>
            </div>
            <button type="button" onclick="closeDetailModal()" style="background: none; border: none; font-size: 20px; color: #94a3b8; cursor: pointer; line-height: 1;">&times;</button>
        </div>

        <div id="viewBodyContent" style="font-size: 13px; color: #334155; line-height: 1.6;">
            <!-- Dynamically populated via JS -->
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px; margin-top: 24px; border-top: 1px solid #f1f5f9; padding-top: 16px;">
            <button type="button" id="btnDetailEdit" onclick="switchDetailToEdit()"
                style="background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe; border-radius: 8px; padding: 8px 18px; font-size: 13px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 6px;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                Edit Record
            </button>

            <button type="button" onclick="closeDetailModal()"
                style="background: #ffffff; border: 1px solid #cbd5e1; border-radius: 8px; padding: 8px 18px; font-size: 13px; font-weight: 600; color: #334155; cursor: pointer;">
                Close
            </button>
        </div>
    </div>
</div>

<!-- ======================================================== -->
<!-- MODAL 3: EDIT RECORD MODAL -->
<!-- ======================================================== -->
<div id="hcEditModal" class="modal-backdrop" onclick="handleEditModalBackdrop(event)">
    <div class="modal-content-card" style="padding: 26px 28px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 12px;">
            <div>
                <div style="font-size: 10.5px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 4px;">
                    EDIT HUMAN CAPITAL RECORD
                </div>
                <h2 id="editModalHeaderTitle" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
                    Edit Record
                </h2>
                <div id="editRefText" style="font-size: 12px; font-family: monospace; color: #64748b;">
                    EMP-001
                </div>
            </div>
            <button type="button" onclick="closeEditModal()" style="background: none; border: none; font-size: 20px; color: #94a3b8; cursor: pointer; line-height: 1;">&times;</button>
        </div>

        <form id="hcEditForm" onsubmit="submitHcEditForm(event)" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="record_id" id="editRecordId">
            <input type="hidden" name="record_type" id="editRecordType">

            <div id="editFormFieldsArea">
                <!-- Dynamically rendered according to record type in JS -->
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 22px; border-top: 1px solid #f1f5f9; padding-top: 16px;">
                <button type="button" onclick="closeEditModal()"
                    style="background: #ffffff; border: 1px solid #cbd5e1; border-radius: 8px; padding: 9px 18px; font-size: 13px; font-weight: 600; color: #334155; cursor: pointer;">
                    Cancel
                </button>
                <button type="submit" id="btnSaveHcEdit"
                    style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 9px 22px; font-size: 13px; font-weight: 600; cursor: pointer; box-shadow: 0 1px 2px rgba(37,99,235,0.2);">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ======================================================== -->
<!-- TOAST NOTIFICATION CONTAINER -->
<!-- ======================================================== -->
<div id="hcToast" style="position: fixed; bottom: 24px; right: 24px; z-index: 10000; display: none; background: #0f172a; color: #ffffff; padding: 12px 20px; border-radius: 8px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.2); font-size: 13.5px; font-weight: 500; align-items: center; gap: 10px; max-width: 400px; animation: toastSlideIn 0.25s ease;">
    <div id="hcToastIcon">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2"><path d="M20 6L9 17l-5-5"></path></svg>
    </div>
    <span id="hcToastMsg">Operation completed successfully.</span>
</div>

<!-- ======================================================== -->
<!-- CLIENT-SIDE SCRIPTING FOR WORKFLOW -->
<!-- ======================================================== -->
<script>
    let currentFilter = 'all';
    let activeRecordForDetail = null;

    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const initial = urlParams.get('filter') || urlParams.get('type') || urlParams.get('kpi') || '{{ $initialFilter ?? "all" }}';
        if (initial && initial !== 'all') {
            setFilter(initial, false);
        }
    });

    // KPI Click Filters
    function filterByKpi(kpiType) {
        setFilter(kpiType, true);
        const recSection = document.getElementById('recordsArea');
        if (recSection) {
            recSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    // Set Active Filter
    function setFilter(filterName, scroll = false) {
        currentFilter = filterName;

        // Reset tab styling
        const tabMap = {
            'all': 'tabAll',
            'employees': 'tabEmployees',
            'hr_records': 'tabHrRecords',
            'hr_documents': 'tabHrRecords',
            'attendance': 'tabAttendance',
            'leave': 'tabLeave',
            'pending': 'tabPending'
        };

        document.querySelectorAll('.tab-link').forEach(el => el.classList.remove('active-tab'));
        const targetTabId = tabMap[filterName] || 'tabAll';
        const targetTab = document.getElementById(targetTabId);
        if (targetTab) targetTab.classList.add('active-tab');

        // Reset KPI card highlight
        document.querySelectorAll('.kpi-card').forEach(el => el.classList.remove('active-kpi'));
        if (filterName === 'employees') document.getElementById('kpiHeadcount')?.classList.add('active-kpi');
        if (filterName === 'leave') document.getElementById('kpiOnLeave')?.classList.add('active-kpi');
        if (filterName === 'pending') document.getElementById('kpiPendingActions')?.classList.add('active-kpi');
        if (filterName === 'hr_records' || filterName === 'hr_documents') document.getElementById('kpiHrRecords')?.classList.add('active-kpi');

        // Banner update
        const banner = document.getElementById('activeFilterBanner');
        const badge = document.getElementById('activeFilterBadge');
        if (filterName === 'all') {
            if (banner) banner.style.display = 'none';
        } else {
            if (banner) banner.style.display = 'flex';
            if (badge) badge.innerText = filterName.replace('_', ' ').toUpperCase();
        }

        applySearchAndFilter();
    }

    function applySearchAndFilter() {
        const query = (document.getElementById('hcSearchInput')?.value || '').toLowerCase().trim();
        const statusFilter = (document.getElementById('hcStatusSelect')?.value || 'all').toLowerCase();

        const rows = document.querySelectorAll('#hcTableBody tr[data-id]');
        let visibleCount = 0;

        rows.forEach(row => {
            const type = row.getAttribute('data-type');
            const status = row.getAttribute('data-status');
            const searchIndex = row.getAttribute('data-search') || '';

            // Filter match
            let matchesTab = false;
            if (currentFilter === 'all') matchesTab = true;
            else if (currentFilter === 'employees' && type === 'employee') matchesTab = true;
            else if ((currentFilter === 'hr_records' || currentFilter === 'hr_documents') && type === 'hr_document') matchesTab = true;
            else if (currentFilter === 'attendance' && type === 'attendance') matchesTab = true;
            else if (currentFilter === 'leave' && type === 'leave') matchesTab = true;
            else if (currentFilter === 'pending' && (status.includes('pending') || status.includes('review'))) matchesTab = true;

            // Status filter match
            let matchesStatus = true;
            if (statusFilter !== 'all') {
                if (statusFilter === 'active' && !status.includes('active')) matchesStatus = false;
                else if (statusFilter === 'on leave' && !status.includes('on leave')) matchesStatus = false;
                else if (statusFilter === 'pending' && !status.includes('pending') && !status.includes('review')) matchesStatus = false;
                else if (statusFilter === 'present' && !status.includes('present')) matchesStatus = false;
                else if (statusFilter === 'probationary' && !status.includes('probationary')) matchesStatus = false;
                else if (statusFilter === 'inactive' && !status.includes('inactive') && !status.includes('separated') && !status.includes('archived')) matchesStatus = false;
            }

            // Search query match
            let matchesQuery = true;
            if (query.length > 0) {
                matchesQuery = searchIndex.includes(query);
            }

            if (matchesTab && matchesStatus && matchesQuery) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Empty state
        const emptyEl = document.getElementById('hcEmptyState');
        const initialEmpty = document.getElementById('hcNoRecordsInitial');
        if (visibleCount === 0) {
            if (emptyEl) emptyEl.style.display = 'block';
            if (initialEmpty) initialEmpty.style.display = 'none';
        } else {
            if (emptyEl) emptyEl.style.display = 'none';
        }
    }

    // Modal 1: + New
    function openHcModal() {
        backToHcStage1();
        document.getElementById('hcModal').style.display = 'flex';
    }
    function closeHcModal() {
        document.getElementById('hcModal').style.display = 'none';
    }
    function handleHcModalBackdrop(e) {
        if (e.target.id === 'hcModal') closeHcModal();
    }

    function selectHcType(type) {
        document.getElementById('createRecordType').value = type;
        document.getElementById('hcStage1').style.display = 'none';
        document.getElementById('hcStage2').style.display = 'block';

        // Hide all fields first
        document.querySelectorAll('.hc-form-type-fields').forEach(el => el.style.display = 'none');

        // Disable required attributes for hidden forms to allow clean HTML5 validation
        setFieldsRequired('fieldsEmployee', false);
        setFieldsRequired('fieldsHrDoc', false);
        setFieldsRequired('fieldsAttendance', false);
        setFieldsRequired('fieldsLeave', false);

        if (type === 'employee') {
            document.getElementById('fieldsEmployee').style.display = 'block';
            setFieldsRequired('fieldsEmployee', true);
            document.getElementById('createFormTitle').innerText = 'Employee / Personnel Record';
            document.getElementById('createFormSubtitle').innerText = 'Enter identity, position, work arrangement, and employment terms.';
        } else if (type === 'hr_document') {
            document.getElementById('fieldsHrDoc').style.display = 'block';
            setFieldsRequired('fieldsHrDoc', true);
            document.getElementById('createFormTitle').innerText = 'HR Record / Document';
            document.getElementById('createFormSubtitle').innerText = 'Upload employment contracts, NDA covenants, medical clearances, and credentials.';
        } else if (type === 'attendance') {
            document.getElementById('fieldsAttendance').style.display = 'block';
            setFieldsRequired('fieldsAttendance', true);
            document.getElementById('createFormTitle').innerText = 'Attendance Record';
            document.getElementById('createFormSubtitle').innerText = 'Record daily time attendance, badge swipe, or shift presence.';
        } else if (type === 'leave') {
            document.getElementById('fieldsLeave').style.display = 'block';
            setFieldsRequired('fieldsLeave', true);
            document.getElementById('createFormTitle').innerText = 'Leave Record';
            document.getElementById('createFormSubtitle').innerText = 'Submit or record vacation, sick, emergency, or statutory leave requests.';
        }
    }

    function setFieldsRequired(containerId, isReq) {
        const container = document.getElementById(containerId);
        if (!container) return;
        if (containerId === 'fieldsEmployee') {
            container.querySelector('[name="employee_name"]').required = isReq;
            container.querySelector('[name="employment_status"]').required = isReq;
        } else if (containerId === 'fieldsHrDoc') {
            container.querySelector('[name="title"]').required = isReq;
            container.querySelector('[name="employee_name"]').required = isReq;
            container.querySelector('[name="document_type"]').required = isReq;
            container.querySelector('[name="file"]').required = isReq;
        } else if (containerId === 'fieldsAttendance') {
            container.querySelector('[name="employee_name"]').required = isReq;
            container.querySelector('[name="date"]').required = isReq;
            container.querySelector('[name="attendance_status"]').required = isReq;
        } else if (containerId === 'fieldsLeave') {
            container.querySelector('[name="employee_name"]').required = isReq;
            container.querySelector('[name="leave_type"]').required = isReq;
            container.querySelector('[name="start_date"]').required = isReq;
            container.querySelector('[name="end_date"]').required = isReq;
        }
    }

    function backToHcStage1() {
        document.getElementById('hcStage1').style.display = 'block';
        document.getElementById('hcStage2').style.display = 'none';
        document.getElementById('hcCreateForm')?.reset();
    }

    function autoCalcDays() {
        const start = document.getElementById('leaveStartDate')?.value;
        const end = document.getElementById('leaveEndDate')?.value;
        if (start && end) {
            const d1 = new Date(start);
            const d2 = new Date(end);
            const diff = Math.max(1, Math.round((d2 - d1) / (1000 * 60 * 60 * 24)) + 1);
            const input = document.getElementById('leaveDaysInput');
            if (input) input.value = diff;
        }
    }

    // Submit Create Form via AJAX
    function submitHcCreateForm(e) {
        e.preventDefault();
        const form = document.getElementById('hcCreateForm');
        const submitBtn = document.getElementById('btnSaveHcRecord');
        submitBtn.disabled = true;
        submitBtn.innerText = 'Saving...';

        const formData = new FormData(form);

        fetch('{{ route("human-capital.store") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => { throw err; });
            }
            return response.json();
        })
        .then(data => {
            submitBtn.disabled = false;
            submitBtn.innerText = 'Save Record';

            if (data.success) {
                closeHcModal();
                showToast(data.message || 'Record successfully created!');

                // Update KPI Cards
                if (data.stats) {
                    updateKpiDisplay(data.stats);
                }

                // Prepend new row to table
                if (data.record) {
                    insertRowIntoTable(data.record);
                }

                // Update Activities
                if (data.activities) {
                    updateActivitiesDisplay(data.activities);
                }

                // Re-apply filter
                applySearchAndFilter();
            }
        })
        .catch(err => {
            submitBtn.disabled = false;
            submitBtn.innerText = 'Save Record';
            let msg = 'Failed to save record. Please verify required fields.';
            if (err.errors) {
                msg = Object.values(err.errors).flat().join('\n');
            } else if (err.message) {
                msg = err.message;
            }
            showToast(msg, true);
        });
    }

    function updateKpiDisplay(stats) {
        const hcVal = document.getElementById('kpiHeadcountVal');
        const hcSub = document.getElementById('kpiHeadcountSubtext');
        const lveVal = document.getElementById('kpiOnLeaveVal');
        const pendVal = document.getElementById('kpiPendingActionsVal');
        const hrdVal = document.getElementById('kpiHrRecordsVal');

        if (hcVal && stats.headcount) {
            hcVal.innerText = stats.headcount;
            hcVal.classList.add('kpi-pulse-updated');
            setTimeout(() => hcVal.classList.remove('kpi-pulse-updated'), 800);
        }
        if (hcSub && stats.headcount_raw !== undefined && stats.on_leave_raw !== undefined) {
            hcSub.innerText = `${Math.max(0, stats.headcount_raw - stats.on_leave_raw)} active`;
        }
        if (lveVal && stats.on_leave !== undefined) {
            lveVal.innerText = stats.on_leave;
            lveVal.classList.add('kpi-pulse-updated');
            setTimeout(() => lveVal.classList.remove('kpi-pulse-updated'), 800);
        }
        if (pendVal && stats.pending_actions !== undefined) {
            pendVal.innerText = stats.pending_actions;
            pendVal.classList.add('kpi-pulse-updated');
            setTimeout(() => pendVal.classList.remove('kpi-pulse-updated'), 800);
        }
        if (hrdVal && stats.hr_records) {
            hrdVal.innerText = stats.hr_records;
            hrdVal.classList.add('kpi-pulse-updated');
            setTimeout(() => hrdVal.classList.remove('kpi-pulse-updated'), 800);
        }

        // Update Tab Counts
        updateTabCounts();
    }

    function updateTabCounts() {
        const allRows = document.querySelectorAll('#hcTableBody tr[data-id]');
        const allCount = allRows.length;
        let empCount = 0, hrdCount = 0, attCount = 0, lveCount = 0, pendCount = 0;

        allRows.forEach(r => {
            const t = r.getAttribute('data-type');
            const s = r.getAttribute('data-status') || '';
            if (t === 'employee') empCount++;
            if (t === 'hr_document') hrdCount++;
            if (t === 'attendance') attCount++;
            if (t === 'leave') lveCount++;
            if (s.includes('pending') || s.includes('review')) pendCount++;
        });

        const bAll = document.getElementById('badgeTabAllCount');
        const bEmp = document.getElementById('badgeTabEmployeesCount');
        const bHrd = document.getElementById('badgeTabHrRecordsCount');
        const bAtt = document.getElementById('badgeTabAttendanceCount');
        const bLve = document.getElementById('badgeTabLeaveCount');
        const bPen = document.getElementById('badgeTabPendingCount');

        if (bAll) bAll.innerText = allCount;
        if (bEmp) bEmp.innerText = empCount;
        if (bHrd) bHrd.innerText = hrdCount;
        if (bAtt) bAtt.innerText = attCount;
        if (bLve) bLve.innerText = lveCount;
        if (bPen) bPen.innerText = pendCount;
    }

    function insertRowIntoTable(record) {
        const tbody = document.getElementById('hcTableBody');
        const noInitial = document.getElementById('hcNoRecordsInitial');
        if (noInitial) noInitial.style.display = 'none';

        const recType = record.record_type || 'employee';
        const meta = record.metadata || {};
        const statusLower = (record.status || 'active').toLowerCase().trim();

        let badgeClass = 'hc-badge-active';
        if (statusLower.includes('on leave')) badgeClass = 'hc-badge-review';
        else if (statusLower.includes('pending') || statusLower.includes('review')) badgeClass = 'hc-badge-pending';
        else if (statusLower.includes('late') || statusLower.includes('half day') || statusLower.includes('probationary')) badgeClass = 'hc-badge-scheduled';
        else if (statusLower.includes('inactive') || statusLower.includes('separated') || statusLower.includes('absent') || statusLower.includes('rejected')) badgeClass = 'hc-badge-archived';

        const typeLabels = {
            'employee': 'Personnel',
            'hr_document': 'HR Record',
            'attendance': 'Attendance',
            'leave': 'Leave'
        };
        const typeLabel = typeLabels[recType] || 'Record';

        let dateDisplay = record.formatted_record_date || record.record_date || '-';
        if (recType === 'leave' && record.end_date) {
            dateDisplay += ' &rarr; ' + (record.formatted_end_date || record.end_date);
        }

        let subline = '';
        if (recType === 'employee' && meta.position) {
            subline = `<div style="font-size: 11.5px; color: #64748b; font-weight: 400; margin-top: 1px;">${meta.position} &bull; ${meta.employment_type || 'Regular'}</div>`;
        } else if (recType === 'hr_document' && meta.employee_name) {
            subline = `<div style="font-size: 11.5px; color: #64748b; font-weight: 400; margin-top: 1px;">Employee: ${meta.employee_name}</div>`;
        } else if (recType === 'attendance' && meta.time_in) {
            subline = `<div style="font-size: 11.5px; color: #64748b; font-weight: 400; margin-top: 1px;">In: ${meta.time_in} ${meta.time_out ? '&bull; Out: ' + meta.time_out : ''}</div>`;
        } else if (recType === 'leave' && meta.number_of_days) {
            subline = `<div style="font-size: 11.5px; color: #64748b; font-weight: 400; margin-top: 1px;">Duration: ${meta.number_of_days} Day(s)</div>`;
        }

        const tr = document.createElement('tr');
        tr.id = `row-${record.id}`;
        tr.setAttribute('data-id', record.id);
        tr.setAttribute('data-type', recType);
        tr.setAttribute('data-status', statusLower);
        tr.setAttribute('data-search', `${record.reference_no || ''} ${record.title || ''} ${record.category || ''} ${record.status || ''} ${meta.employee_name || ''} ${meta.position || ''}`.toLowerCase());
        tr.setAttribute('data-json', JSON.stringify(record));
        tr.className = 'row-highlight';
        tr.style.borderBottom = '1px solid #f1f5f9';

        tr.innerHTML = `
            <td style="padding: 14px 16px; font-weight: 700; color: #0f172a; font-family: monospace; font-size: 12.5px;">
                ${record.reference_no || 'EMP-000'}
            </td>
            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                <div>${record.title || '-'}</div>
                ${subline}
            </td>
            <td style="padding: 14px 16px; color: #64748b;">
                <span style="display: inline-block; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.04em; color: #2563eb; background: #eff6ff; padding: 2px 7px; border-radius: 4px; margin-bottom: 2px;">
                    ${typeLabel}
                </span>
                <div style="color: #334155; font-size: 12.5px;">${record.category || '-'}</div>
            </td>
            <td style="padding: 14px 16px; color: #64748b; font-size: 12.5px; white-space: nowrap;">
                ${dateDisplay}
            </td>
            <td style="padding: 14px 16px;">
                <span class="hc-badge ${badgeClass}">
                    ● ${record.status || 'Active'}
                </span>
            </td>
            <td style="padding: 14px 16px; text-align: right; white-space: nowrap;">
                <button type="button" onclick="viewHcRecord(${record.id})"
                    style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 4px 11px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer; margin-right: 4px;">
                    View
                </button>
                <button type="button" onclick="editHcRecord(${record.id})"
                    style="background: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; padding: 4px 11px; font-size: 12px; font-weight: 600; color: #2563eb; cursor: pointer;">
                    Edit
                </button>
            </td>
        `;

        tbody.insertBefore(tr, tbody.firstChild);
        updateTabCounts();
    }

    function updateActivitiesDisplay(activities) {
        const container = document.getElementById('hcActivityList');
        if (!container || !activities) return;

        container.innerHTML = '';
        activities.forEach(act => {
            const item = document.createElement('div');
            item.className = 'module-list-item';
            item.style = 'display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;';
            item.innerHTML = `
                <div>
                    <strong style="font-size: 13.5px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        ${act.title || 'HR Activity'}
                    </strong>
                    <p style="font-size: 12px; color: #64748b; margin: 0;">
                        Category: ${act.type || 'General'} &bull; Timestamp: ${act.time || 'Just now'}
                    </p>
                </div>
                <span class="status-badge status-active" style="background: #ecfdf5; color: #15803d; font-size: 11.5px; font-weight: 700; padding: 4px 10px; border-radius: 12px;">
                    ${act.type || 'Completed'}
                </span>
            `;
            container.appendChild(item);
        });
    }

    // Modal 2: View Record Details
    function viewHcRecord(id) {
        const row = document.getElementById(`row-${id}`);
        if (!row) return;

        const record = JSON.parse(row.getAttribute('data-json'));
        activeRecordForDetail = record;

        const typeTag = document.getElementById('viewTypeTag');
        const titleEl = document.getElementById('viewTitle');
        const refEl = document.getElementById('viewRefBadge');
        const bodyEl = document.getElementById('viewBodyContent');

        const recType = record.record_type || 'employee';
        const meta = record.metadata || {};

        if (typeTag) typeTag.innerText = (recType.replace('_', ' ') + ' details').toUpperCase();
        if (titleEl) titleEl.innerText = record.title || 'Record';
        if (refEl) refEl.innerText = record.reference_no || `REC-${record.id}`;

        let html = '';

        if (recType === 'employee') {
            html = `
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-bottom: 14px; background: #f8fafc; padding: 14px; border-radius: 8px;">
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Department</span><strong>${meta.department || record.category || '-'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Position</span><strong>${meta.position || '-'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Employment Type</span><strong>${meta.employment_type || 'Regular'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Work Arrangement</span><strong>${meta.work_arrangement || 'On-site'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Date Hired</span><strong>${record.formatted_record_date || record.record_date || '-'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Reporting Manager</span><strong>${meta.reporting_manager || '-'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Status</span><span class="hc-badge hc-badge-active" style="margin-top: 2px;">● ${record.status || 'Active'}</span></div>
                </div>
                ${record.description || meta.notes ? `<div style="margin-bottom: 14px;"><strong style="font-size: 12px; color: #64748b; display: block; margin-bottom: 4px;">Notes</strong><p style="margin: 0; background: #ffffff; border: 1px solid #e2e8f0; padding: 10px; border-radius: 6px;">${record.description || meta.notes}</p></div>` : ''}
                ${record.attachment_name ? `<div style="margin-top: 10px; padding: 10px; background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 6px; display: flex; align-items: center; gap: 8px;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg><span style="font-weight: 600; color: #1e40af; font-size: 12.5px;">Attachment:</span><span style="color: #334155; font-size: 12.5px;">${record.attachment_name}</span></div>` : ''}
            `;
        } else if (recType === 'hr_document') {
            html = `
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-bottom: 14px; background: #f8fafc; padding: 14px; border-radius: 8px;">
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Employee</span><strong>${meta.employee_name || '-'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Document Type</span><strong>${record.category || meta.document_type || '-'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Date of Record</span><strong>${record.formatted_record_date || record.record_date || '-'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Status</span><span class="hc-badge hc-badge-active" style="margin-top: 2px;">● ${record.status || 'Active'}</span></div>
                </div>
                ${record.description ? `<div style="margin-bottom: 14px;"><strong style="font-size: 12px; color: #64748b; display: block; margin-bottom: 4px;">Description</strong><p style="margin: 0; background: #ffffff; border: 1px solid #e2e8f0; padding: 10px; border-radius: 6px;">${record.description}</p></div>` : ''}
                <div style="margin-top: 10px; padding: 10px; background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 6px; display: flex; align-items: center; gap: 8px;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                    <span style="font-weight: 600; color: #1e40af; font-size: 12.5px;">Attachment:</span>
                    <span style="color: #334155; font-size: 12.5px;">${record.attachment_name || 'Document_Attachment.pdf'}</span>
                </div>
            `;
        } else if (recType === 'attendance') {
            html = `
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-bottom: 14px; background: #f8fafc; padding: 14px; border-radius: 8px;">
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Employee</span><strong>${record.title || meta.employee_name || '-'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Date</span><strong>${record.formatted_record_date || record.record_date || '-'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Time In</span><strong>${meta.time_in || 'N/A'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Time Out</span><strong>${meta.time_out || 'N/A'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Status</span><span class="hc-badge hc-badge-active" style="margin-top: 2px;">● ${record.status || 'Present'}</span></div>
                </div>
                ${record.description || meta.notes ? `<div style="margin-bottom: 14px;"><strong style="font-size: 12px; color: #64748b; display: block; margin-bottom: 4px;">Notes</strong><p style="margin: 0; background: #ffffff; border: 1px solid #e2e8f0; padding: 10px; border-radius: 6px;">${record.description || meta.notes}</p></div>` : ''}
            `;
        } else if (recType === 'leave') {
            html = `
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-bottom: 14px; background: #f8fafc; padding: 14px; border-radius: 8px;">
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Employee</span><strong>${record.title || meta.employee_name || '-'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Leave Type</span><strong>${record.category || meta.leave_type || '-'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Start Date</span><strong>${record.formatted_record_date || record.record_date || '-'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">End Date</span><strong>${record.formatted_end_date || record.end_date || '-'}</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Total Days</span><strong>${meta.number_of_days || 1} Day(s)</strong></div>
                    <div><span style="color: #64748b; font-size: 11.5px; display: block;">Status</span><span class="hc-badge ${record.status === 'Approved' ? 'hc-badge-active' : 'hc-badge-pending'}" style="margin-top: 2px;">● ${record.status || 'Pending'}</span></div>
                </div>
                ${record.description || meta.reason ? `<div style="margin-bottom: 14px;"><strong style="font-size: 12px; color: #64748b; display: block; margin-bottom: 4px;">Reason / Handover Notes</strong><p style="margin: 0; background: #ffffff; border: 1px solid #e2e8f0; padding: 10px; border-radius: 6px;">${record.description || meta.reason}</p></div>` : ''}
                ${record.attachment_name ? `<div style="margin-top: 10px; padding: 10px; background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 6px; display: flex; align-items: center; gap: 8px;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg><span style="font-weight: 600; color: #1e40af; font-size: 12.5px;">Supporting File:</span><span style="color: #334155; font-size: 12.5px;">${record.attachment_name}</span></div>` : ''}
            `;
        }

        if (bodyEl) bodyEl.innerHTML = html;
        document.getElementById('hcDetailModal').style.display = 'flex';
    }

    function closeDetailModal() {
        document.getElementById('hcDetailModal').style.display = 'none';
        activeRecordForDetail = null;
    }
    function handleDetailModalBackdrop(e) {
        if (e.target.id === 'hcDetailModal') closeDetailModal();
    }
    function switchDetailToEdit() {
        if (activeRecordForDetail) {
            const id = activeRecordForDetail.id;
            closeDetailModal();
            editHcRecord(id);
        }
    }

    // Modal 3: Edit Record
    function editHcRecord(id) {
        const row = document.getElementById(`row-${id}`);
        if (!row) return;

        const record = JSON.parse(row.getAttribute('data-json'));
        const recType = record.record_type || 'employee';
        const meta = record.metadata || {};

        document.getElementById('editRecordId').value = record.id;
        document.getElementById('editRecordType').value = recType;
        document.getElementById('editRefText').innerText = record.reference_no || `REC-${record.id}`;
        document.getElementById('editModalHeaderTitle').innerText = `Edit ${recType.replace('_', ' ').toUpperCase()}`;

        const container = document.getElementById('editFormFieldsArea');
        let html = '';

        if (recType === 'employee') {
            html = `
                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 14px; margin-bottom: 14px;">
                    <div>
                        <label class="form-label">Employee Name <span class="req-star">*</span></label>
                        <input type="text" name="employee_name" value="${record.title || meta.employee_name || ''}" class="form-control-input" required>
                    </div>
                    <div>
                        <label class="form-label">Employee ID</label>
                        <input type="text" name="employee_id" value="${record.reference_no || meta.employee_id || ''}" class="form-control-input">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-bottom: 14px;">
                    <div>
                        <label class="form-label">Department / Unit</label>
                        <select name="department" class="form-control-input">
                            ${['Executive & Operations', 'Legal & Compliance', 'Finance & Accounting', 'Technology & Systems', 'Human Resources', 'Logistics & Administration'].map(d => `<option value="${d}" ${(record.category === d || meta.department === d) ? 'selected' : ''}>${d}</option>`).join('')}
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Position / Job Title</label>
                        <input type="text" name="position" value="${meta.position || ''}" class="form-control-input">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 14px;">
                    <div>
                        <label class="form-label">Employment Type</label>
                        <select name="employment_type" class="form-control-input">
                            ${['Regular', 'Probationary', 'Contractual', 'Part-time', 'Other'].map(t => `<option value="${t}" ${meta.employment_type === t ? 'selected' : ''}>${t}</option>`).join('')}
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Work Arrangement</label>
                        <select name="work_arrangement" class="form-control-input">
                            ${['On-site', 'Hybrid', 'Remote'].map(a => `<option value="${a}" ${meta.work_arrangement === a ? 'selected' : ''}>${a}</option>`).join('')}
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Employment Status <span class="req-star">*</span></label>
                        <select name="employment_status" class="form-control-input" required>
                            ${['Active', 'On Leave', 'Inactive', 'Separated'].map(s => `<option value="${s}" ${record.status === s ? 'selected' : ''}>${s}</option>`).join('')}
                        </select>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-bottom: 14px;">
                    <div>
                        <label class="form-label">Date Hired</label>
                        <input type="date" name="date_hired" value="${record.record_date || meta.date_hired || ''}" class="form-control-input">
                    </div>
                    <div>
                        <label class="form-label">Reporting Manager</label>
                        <input type="text" name="reporting_manager" value="${meta.reporting_manager || ''}" class="form-control-input">
                    </div>
                </div>

                <div style="margin-bottom: 14px;">
                    <label class="form-label">Notes</label>
                    <textarea name="notes" rows="2" class="form-control-input">${record.description || meta.notes || ''}</textarea>
                </div>

                <div style="margin-bottom: 14px;">
                    <label class="form-label">Update Supporting Document</label>
                    <input type="file" name="file" class="form-control-input">
                    ${record.attachment_name ? `<span style="font-size: 11px; color: #64748b; margin-top: 4px; display: block;">Current attachment: ${record.attachment_name}</span>` : ''}
                </div>
            `;
        } else if (recType === 'hr_document') {
            html = `
                <div style="margin-bottom: 14px;">
                    <label class="form-label">Record / Document Title <span class="req-star">*</span></label>
                    <input type="text" name="title" value="${record.title || ''}" class="form-control-input" required>
                </div>

                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-bottom: 14px;">
                    <div>
                        <label class="form-label">Employee Associated <span class="req-star">*</span></label>
                        <input type="text" name="employee_name" value="${meta.employee_name || ''}" class="form-control-input" required>
                    </div>
                    <div>
                        <label class="form-label">Record / Document Type <span class="req-star">*</span></label>
                        <select name="document_type" class="form-control-input" required>
                            ${['Employment Contract', 'Medical Clearance', 'NDA / IP Agreement', 'Performance Evaluation', 'Memo / Notice', 'Certificate of Employment', 'Statutory Benefit Filing', 'Other HR Record'].map(dt => `<option value="${dt}" ${(record.category === dt || meta.document_type === dt) ? 'selected' : ''}>${dt}</option>`).join('')}
                        </select>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px; margin-bottom: 14px;">
                    <div>
                        <label class="form-label">Date of Record</label>
                        <input type="date" name="record_date" value="${record.record_date || ''}" class="form-control-input">
                    </div>
                    <div>
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control-input">
                            ${['Active', 'Pending Review', 'Archived'].map(st => `<option value="${st}" ${record.status === st ? 'selected' : ''}>${st}</option>`).join('')}
                        </select>
                    </div>
                </div>

                <div style="margin-bottom: 14px;">
                    <label class="form-label">Description / Notes</label>
                    <textarea name="description" rows="2" class="form-control-input">${record.description || ''}</textarea>
                </div>

                <div style="margin-bottom: 14px;">
                    <label class="form-label">Update Attachment</label>
                    <input type="file" name="file" class="form-control-input">
                    ${record.attachment_name ? `<span style="font-size: 11px; color: #64748b; margin-top: 4px; display: block;">Current attachment: ${record.attachment_name}</span>` : ''}
                </div>
            `;
        } else if (recType === 'attendance') {
            html = `
                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 14px; margin-bottom: 14px;">
                    <div>
                        <label class="form-label">Employee <span class="req-star">*</span></label>
                        <input type="text" name="employee_name" value="${record.title || meta.employee_name || ''}" class="form-control-input" required>
                    </div>
                    <div>
                        <label class="form-label">Date <span class="req-star">*</span></label>
                        <input type="date" name="date" value="${record.record_date || meta.date || ''}" class="form-control-input" required>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 14px;">
                    <div>
                        <label class="form-label">Attendance Status <span class="req-star">*</span></label>
                        <select name="attendance_status" class="form-control-input" required>
                            ${['Present', 'Late', 'Half Day', 'On Leave', 'Absent'].map(s => `<option value="${s}" ${record.status === s ? 'selected' : ''}>${s}</option>`).join('')}
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Time In</label>
                        <input type="text" name="time_in" value="${meta.time_in || ''}" class="form-control-input">
                    </div>
                    <div>
                        <label class="form-label">Time Out</label>
                        <input type="text" name="time_out" value="${meta.time_out || ''}" class="form-control-input">
                    </div>
                </div>

                <div style="margin-bottom: 14px;">
                    <label class="form-label">Notes</label>
                    <textarea name="notes" rows="2" class="form-control-input">${record.description || meta.notes || ''}</textarea>
                </div>
            `;
        } else if (recType === 'leave') {
            html = `
                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 14px; margin-bottom: 14px;">
                    <div>
                        <label class="form-label">Employee <span class="req-star">*</span></label>
                        <input type="text" name="employee_name" value="${record.title || meta.employee_name || ''}" class="form-control-input" required>
                    </div>
                    <div>
                        <label class="form-label">Leave Type <span class="req-star">*</span></label>
                        <select name="leave_type" class="form-control-input" required>
                            ${['Vacation Leave', 'Sick Leave', 'Emergency Leave', 'Maternity / Paternity Leave', 'Bereavement Leave', 'Other Leave'].map(lt => `<option value="${lt}" ${(record.category === lt || meta.leave_type === lt) ? 'selected' : ''}>${lt}</option>`).join('')}
                        </select>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 14px;">
                    <div>
                        <label class="form-label">Start Date <span class="req-star">*</span></label>
                        <input type="date" name="start_date" id="editLeaveStartDate" onchange="autoCalcEditDays()" value="${record.record_date || meta.start_date || ''}" class="form-control-input" required>
                    </div>
                    <div>
                        <label class="form-label">End Date <span class="req-star">*</span></label>
                        <input type="date" name="end_date" id="editLeaveEndDate" onchange="autoCalcEditDays()" value="${record.end_date || meta.end_date || ''}" class="form-control-input" required>
                    </div>
                    <div>
                        <label class="form-label">Number of Days</label>
                        <input type="number" name="number_of_days" id="editLeaveDays" step="0.5" min="0.5" value="${meta.number_of_days || 1}" class="form-control-input">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px;">
                    <div>
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control-input">
                            ${['Pending', 'Approved', 'Rejected', 'Cancelled'].map(st => `<option value="${st}" ${record.status === st ? 'selected' : ''}>${st}</option>`).join('')}
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Update Supporting File</label>
                        <input type="file" name="file" class="form-control-input">
                    </div>
                </div>

                <div style="margin-bottom: 14px;">
                    <label class="form-label">Reason / Notes</label>
                    <textarea name="reason" rows="2" class="form-control-input">${record.description || meta.reason || ''}</textarea>
                </div>
            `;
        }

        container.innerHTML = html;
        document.getElementById('hcEditModal').style.display = 'flex';
    }

    function autoCalcEditDays() {
        const start = document.getElementById('editLeaveStartDate')?.value;
        const end = document.getElementById('editLeaveEndDate')?.value;
        if (start && end) {
            const d1 = new Date(start);
            const d2 = new Date(end);
            const diff = Math.max(1, Math.round((d2 - d1) / (1000 * 60 * 60 * 24)) + 1);
            const input = document.getElementById('editLeaveDays');
            if (input) input.value = diff;
        }
    }

    function closeEditModal() {
        document.getElementById('hcEditModal').style.display = 'none';
    }
    function handleEditModalBackdrop(e) {
        if (e.target.id === 'hcEditModal') closeEditModal();
    }

    // Submit Edit Form via AJAX
    function submitHcEditForm(e) {
        e.preventDefault();
        const form = document.getElementById('hcEditForm');
        const id = document.getElementById('editRecordId').value;
        const submitBtn = document.getElementById('btnSaveHcEdit');
        submitBtn.disabled = true;
        submitBtn.innerText = 'Updating...';

        const formData = new FormData(form);

        fetch(`/human-capital/${id}`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => { throw err; });
            }
            return response.json();
        })
        .then(data => {
            submitBtn.disabled = false;
            submitBtn.innerText = 'Save Changes';

            if (data.success) {
                closeEditModal();
                showToast(data.message || 'Record successfully updated!');

                // Update row in table
                if (data.record) {
                    replaceRowInTable(data.record);
                }

                // Update KPI Cards
                if (data.stats) {
                    updateKpiDisplay(data.stats);
                }

                // Update Activities
                if (data.activities) {
                    updateActivitiesDisplay(data.activities);
                }

                applySearchAndFilter();
            }
        })
        .catch(err => {
            submitBtn.disabled = false;
            submitBtn.innerText = 'Save Changes';
            let msg = 'Failed to update record.';
            if (err.errors) {
                msg = Object.values(err.errors).flat().join('\n');
            } else if (err.message) {
                msg = err.message;
            }
            showToast(msg, true);
        });
    }

    function replaceRowInTable(record) {
        const row = document.getElementById(`row-${record.id}`);
        if (!row) {
            insertRowIntoTable(record);
            return;
        }

        const recType = record.record_type || 'employee';
        const meta = record.metadata || {};
        const statusLower = (record.status || 'active').toLowerCase().trim();

        let badgeClass = 'hc-badge-active';
        if (statusLower.includes('on leave')) badgeClass = 'hc-badge-review';
        else if (statusLower.includes('pending') || statusLower.includes('review')) badgeClass = 'hc-badge-pending';
        else if (statusLower.includes('late') || statusLower.includes('half day') || statusLower.includes('probationary')) badgeClass = 'hc-badge-scheduled';
        else if (statusLower.includes('inactive') || statusLower.includes('separated') || statusLower.includes('absent') || statusLower.includes('rejected')) badgeClass = 'hc-badge-archived';

        const typeLabels = {
            'employee': 'Personnel',
            'hr_document': 'HR Record',
            'attendance': 'Attendance',
            'leave': 'Leave'
        };
        const typeLabel = typeLabels[recType] || 'Record';

        let dateDisplay = record.formatted_record_date || record.record_date || '-';
        if (recType === 'leave' && record.end_date) {
            dateDisplay += ' &rarr; ' + (record.formatted_end_date || record.end_date);
        }

        let subline = '';
        if (recType === 'employee' && meta.position) {
            subline = `<div style="font-size: 11.5px; color: #64748b; font-weight: 400; margin-top: 1px;">${meta.position} &bull; ${meta.employment_type || 'Regular'}</div>`;
        } else if (recType === 'hr_document' && meta.employee_name) {
            subline = `<div style="font-size: 11.5px; color: #64748b; font-weight: 400; margin-top: 1px;">Employee: ${meta.employee_name}</div>`;
        } else if (recType === 'attendance' && meta.time_in) {
            subline = `<div style="font-size: 11.5px; color: #64748b; font-weight: 400; margin-top: 1px;">In: ${meta.time_in} ${meta.time_out ? '&bull; Out: ' + meta.time_out : ''}</div>`;
        } else if (recType === 'leave' && meta.number_of_days) {
            subline = `<div style="font-size: 11.5px; color: #64748b; font-weight: 400; margin-top: 1px;">Duration: ${meta.number_of_days} Day(s)</div>`;
        }

        row.setAttribute('data-status', statusLower);
        row.setAttribute('data-search', `${record.reference_no || ''} ${record.title || ''} ${record.category || ''} ${record.status || ''} ${meta.employee_name || ''} ${meta.position || ''}`.toLowerCase());
        row.setAttribute('data-json', JSON.stringify(record));
        row.className = 'row-highlight';

        row.innerHTML = `
            <td style="padding: 14px 16px; font-weight: 700; color: #0f172a; font-family: monospace; font-size: 12.5px;">
                ${record.reference_no || 'EMP-000'}
            </td>
            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                <div>${record.title || '-'}</div>
                ${subline}
            </td>
            <td style="padding: 14px 16px; color: #64748b;">
                <span style="display: inline-block; font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.04em; color: #2563eb; background: #eff6ff; padding: 2px 7px; border-radius: 4px; margin-bottom: 2px;">
                    ${typeLabel}
                </span>
                <div style="color: #334155; font-size: 12.5px;">${record.category || '-'}</div>
            </td>
            <td style="padding: 14px 16px; color: #64748b; font-size: 12.5px; white-space: nowrap;">
                ${dateDisplay}
            </td>
            <td style="padding: 14px 16px;">
                <span class="hc-badge ${badgeClass}">
                    ● ${record.status || 'Active'}
                </span>
            </td>
            <td style="padding: 14px 16px; text-align: right; white-space: nowrap;">
                <button type="button" onclick="viewHcRecord(${record.id})"
                    style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 4px 11px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer; margin-right: 4px;">
                    View
                </button>
                <button type="button" onclick="editHcRecord(${record.id})"
                    style="background: #ffffff; border: 1px solid #cbd5e1; border-radius: 6px; padding: 4px 11px; font-size: 12px; font-weight: 600; color: #2563eb; cursor: pointer;">
                    Edit
                </button>
            </td>
        `;

        updateTabCounts();
    }

    // Toast feedback helper
    function showToast(msg, isError = false) {
        const toast = document.getElementById('hcToast');
        const text = document.getElementById('hcToastMsg');
        const icon = document.getElementById('hcToastIcon');
        if (!toast || !text) return;

        text.innerText = msg;
        if (isError) {
            toast.style.background = '#991b1b';
            icon.innerHTML = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#fca5a5" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>`;
        } else {
            toast.style.background = '#0f172a';
            icon.innerHTML = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2"><path d="M20 6L9 17l-5-5"></path></svg>`;
        }

        toast.style.display = 'flex';
        setTimeout(() => {
            toast.style.display = 'none';
        }, 4000);
    }
</script>

@endsection