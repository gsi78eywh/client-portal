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

            <button type="button" class="primary-button" id="btnOpenGovernanceModal" onclick="openNewGovernanceModal()">
                <span class="button-plus">+</span>
                New Governance Record
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

                <button type="button" class="soft-button" onclick="openNewGovernanceModal()">
                    Quick action
                </button>

                <a href="{{ route('settings.modules.entity-governance') }}" class="outline-button" style="text-decoration: none;">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.7 1.7-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.6v.2h-2.4v-.2a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.9.3l-.1.1-1.7-1.7.1-.1A1.7 1.7 0 0 0 8.4 15a1.7 1.7 0 0 0-1.6-1H6.6v-2.4h.2a1.7 1.7 0 0 0 1.6-1 1.7 1.7 0 0 0-.3-1.9L8 8.6l1.7-1.7.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1-1.6v-.2h2.4v.2a1.7 1.7 0 0 0 1 1.6 1.7 1.7 0 0 0 1.9-.3l.1-.1 1.7 1.7-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 1.6 1h.2V14h-.2a1.7 1.7 0 0 0-1.6 1z"></path>
                    </svg>

                    Configure module

                </a>

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

    <style>
        .stat-card {
            cursor: pointer;
            user-select: none;
            outline: none;
            position: relative;
            transition: border-color .18s ease, box-shadow .18s ease, transform .18s ease, background-color .18s ease;
        }
        .stat-card:hover {
            border-color: #2563eb !important;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06), 0 2px 8px rgba(37, 99, 235, 0.08) !important;
            transform: translateY(-2px);
        }
        .stat-card:focus-visible {
            border-color: #2563eb !important;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.25) !important;
        }
        .stat-card:active {
            transform: translateY(0);
        }
        .stat-card.active-kpi {
            border-color: #2563eb !important;
            background-color: #f8faff !important;
            box-shadow: 0 0 0 1.5px #2563eb, 0 4px 14px rgba(37, 99, 235, 0.1) !important;
        }
        .kpi-pulse-updated {
            animation: kpiPulse 0.8s ease-out;
        }
        @keyframes kpiPulse {
            0% { transform: scale(1); color: #2563eb; }
            50% { transform: scale(1.18); color: #16a34a; }
            100% { transform: scale(1); }
        }
    </style>

    </div>


    {{-- =========================================================
        STAT CARDS (INTERACTIVE & FUNCTIONAL KPI CARDS)
    ========================================================== --}}
    <div class="stats-grid">

        {{-- 1. ACTIVE ENTITIES --}}
        <div class="stat-card" id="kpiActiveEntities" role="button" tabindex="0" onclick="handleKpiCardClick('active_entities')" onkeydown="handleKpiKeydown(event, 'active_entities')" title="View Entity Profiles">

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M3 21h18"></path>
                    <path d="M5 21V9l7-4 7 4v12"></path>
                    <path d="M9 21v-7h6v7"></path>
                </svg>

            </div>

            <div class="stat-number" id="statActiveEntities">
                {{ $governanceStats['active_entities'] ?? 1 }}
            </div>

            <div class="stat-title">
                Active entities
            </div>

            <div class="stat-description">
                Verified profile
            </div>

        </div>


        {{-- 2. DIRECTORS & OFFICERS --}}
        <div class="stat-card" id="kpiDirectors" role="button" tabindex="0" onclick="handleKpiCardClick('directors_officers')" onkeydown="handleKpiKeydown(event, 'directors_officers')" title="View Directors & Officers">

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="9" cy="8" r="3"></circle>
                    <path d="M3 20c0-3.3 2.7-6 6-6"></path>
                    <circle cx="17" cy="9" r="2.5"></circle>
                    <path d="M14 20c.2-2.7 2.2-5 5-5 1 0 1.8.2 2.5.7"></path>
                </svg>

            </div>

            <div class="stat-number" id="statDirectors">
                {{ $governanceStats['directors_officers'] ?? 5 }}
            </div>

            <div class="stat-title">
                Directors &amp; officers
            </div>

            <div class="stat-description">
                Current register
            </div>

        </div>


        {{-- 3. PENDING ACTIONS --}}
        <div class="stat-card" id="kpiPendingActions" role="button" tabindex="0" onclick="handleKpiCardClick('pending_actions')" onkeydown="handleKpiKeydown(event, 'pending_actions')" title="Filter Pending Actions">

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M12 7v5l3 2"></path>
                </svg>

            </div>

            <div class="stat-number" id="statPendingActions">
                {{ $governanceStats['pending_actions'] ?? 4 }}
            </div>

            <div class="stat-title">
                Pending actions
            </div>

            <div class="stat-description">
                Action required
            </div>

        </div>


        {{-- 4. GOVERNANCE RECORDS --}}
        <div class="stat-card" id="kpiTotalRecords" role="button" tabindex="0" onclick="handleKpiCardClick('governance_records')" onkeydown="handleKpiKeydown(event, 'governance_records')" title="View Governance Records">

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M6 3h12v18H6z"></path>
                    <path d="M9 7h6"></path>
                    <path d="M9 11h6"></path>
                    <path d="M9 15h4"></path>
                </svg>

            </div>

            <div class="stat-number" id="statTotalRecords">
                {{ $governanceStats['governance_records'] ?? 28 }}
            </div>

            <div class="stat-title">
                Governance records
            </div>

            <div class="stat-description">
                Ledger entries
            </div>

        </div>

    </div>


    {{-- =========================================================
        MAIN WORKSPACE
    ========================================================== --}}
    <section class="workspace-card" id="governanceWorkspace">

        {{-- TABS --}}
        <div class="workspace-tabs">

            <button type="button" class="workspace-tab active" data-tab-type="all" onclick="filterGovernanceTab(this, 'all')">
                Overview
            </button>

            <button type="button" class="workspace-tab" data-tab-type="entity_profile" onclick="filterGovernanceTab(this, 'entity_profile')">
                Entity Profile
            </button>

            <button type="button" class="workspace-tab" data-tab-type="director_officer" onclick="filterGovernanceTab(this, 'director_officer')">
                Directors &amp; Officers
            </button>

            <button type="button" class="workspace-tab" data-tab-type="ownership" onclick="filterGovernanceTab(this, 'ownership')">
                Ownership
            </button>

            <button type="button" class="workspace-tab" data-tab-type="meeting" onclick="filterGovernanceTab(this, 'meeting')">
                Meetings
            </button>

            <button type="button" class="workspace-tab" data-tab-type="resolution" onclick="filterGovernanceTab(this, 'resolution')">
                Resolutions
            </button>

            <button type="button" class="workspace-tab" data-tab-type="corporate_record" onclick="filterGovernanceTab(this, 'corporate_record')">
                Records
            </button>

        </div>


        {{-- WORKSPACE CONTENT --}}
        <div class="workspace-content">

            <div class="content-header">

                <div>

                    <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                        <h2 style="margin: 0;">
                            Recent records &amp; activity
                        </h2>
                        <div id="govActiveFilterBadge" style="display: none; align-items: center; gap: 6px;">
                            <span id="govActiveFilterLabel" style="display: inline-flex; align-items: center; gap: 6px; padding: 2px 10px; border-radius: 12px; background: #eff6ff; border: 1px solid #bfdbfe; color: #1d4ed8; font-size: 11px; font-weight: 700;">
                                Filtered: Pending Actions
                            </span>
                            <button type="button" onclick="resetGovernanceFilter()" title="Clear filter" style="background: none; border: none; cursor: pointer; color: #64748b; font-size: 13px; padding: 0 2px; line-height: 1;">
                                &times;
                            </button>
                        </div>
                    </div>

                    <p style="margin-top: 4px;">
                        Legal entity records, governance filings, and register entries for <strong style="color: #1e293b;">{{ session('client.account.name', $account?->profile?->legal_name ?? 'your ORDO account') }}</strong>.
                    </p>

                </div>

                <button type="button" class="filter-button" onclick="resetGovernanceFilter()" title="Reset workspace filters">

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

                    <tbody id="governanceRecordsTableBody">

                        @forelse($governanceRecords ?? [] as $record)
                            @php
                                $recObj = is_array($record) ? (object) $record : $record;
                                $recId = $recObj->id ?? ('rec_' . $loop->index);
                                $ref = $recObj->reference_no ?? 'GOV-000';
                                $title = $recObj->title ?? 'Untitled';
                                $category = $recObj->category ?? 'General';
                                $recType = $recObj->record_type ?? 'corporate_record';
                                $typeLabel = match($recType) {
                                    'entity_profile' => 'Entity Profile',
                                    'director_officer' => 'Director / Officer',
                                    'ownership' => 'Ownership',
                                    'meeting' => 'Meeting',
                                    'resolution' => 'Resolution',
                                    'corporate_record' => 'Corporate Record',
                                    default => 'Record',
                                };
                                $dateFormatted = $recObj->formatted_record_date ?? (isset($recObj->record_date) ? \Carbon\Carbon::parse($recObj->record_date)->format('M d, Y') : '—');
                                $status = $recObj->status ?? 'Active';
                                $badgeClass = $recObj->status_badge_class ?? (match(strtolower(trim($status))) {
                                    'approved' => 'approved',
                                    'final' => 'final',
                                    'active' => 'active',
                                    'for review', 'review', 'in review', 'pending' => 'review',
                                    'scheduled' => 'scheduled',
                                    default => 'active',
                                });
                            @endphp
                            <tr id="govRow_{{ $recId }}" data-record-id="{{ $recId }}" data-record-type="{{ $recType }}" data-reference="{{ $ref }}" data-status="{{ strtolower($status) }}">

                                <td>
                                    <span class="reference">
                                        {{ $ref }}
                                    </span>
                                </td>

                                <td>
                                    <div class="record-item">
                                        <strong>
                                            {{ $title }}
                                        </strong>
                                        <span>
                                            {{ $category }} &bull; {{ $typeLabel }}
                                        </span>
                                    </div>
                                </td>

                                <td>
                                    <span class="record-date">
                                        {{ $dateFormatted }}
                                    </span>
                                </td>

                                <td>
                                    <span class="status {{ $badgeClass }}">
                                        <span></span>
                                        {{ $status }}
                                    </span>
                                </td>

                                <td class="action-column">
                                    <button type="button" class="view-button" id="btnView_{{ $recId }}" onclick="viewGovernanceDetail(@js($recObj))">
                                        View
                                    </button>
                                </td>

                            </tr>
                        @empty
                        @endforelse

                        <tr id="emptyGovRow" style="display: {{ empty($governanceRecords) || count($governanceRecords) === 0 ? '' : 'none' }};">
                            <td colspan="5" style="text-align: center; padding: 36px 20px; color: #94a3b8;">
                                No governance records found in this category. Click <strong>+ New Governance Record</strong> above to create an entry.
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>


{{-- =========================================================
    NEW GOVERNANCE ENTRY MODAL (TWO-STAGE FLOW)
========================================================== --}}
<div id="governanceModal" class="modal-backdrop" style="display: none;" onclick="if(event.target===this)closeGovernanceModal()">
    <div class="modal" style="width: min(780px, 100%);">

        {{-- STAGE 1: RECORD TYPE SELECTOR --}}
        <div id="govStageTypeSelect">
            <div class="modal-head">
                <div>
                    <h3 style="margin: 0; font-size: 16.5px; font-weight: 700; color: var(--ink);">New Governance Record</h3>
                    <p style="margin: 3px 0 0; font-size: 11.5px; color: #64748b;">
                        Select the record type to create for <strong>{{ session('client.account.name', $account?->profile?->legal_name ?? 'your ORDO account') }}</strong>.
                    </p>
                </div>
                <button type="button" class="iconbtn" onclick="closeGovernanceModal()">&times;</button>
            </div>

            <div class="modal-body" style="padding: 24px;">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 14px;">

                    {{-- 1. Entity Profile --}}
                    <div class="gov-type-card" onclick="selectGovernanceType('entity_profile')" style="border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px; cursor: pointer; background: #ffffff; transition: all .18s ease; display: flex; flex-direction: column; gap: 8px;">
                        <div style="width: 36px; height: 36px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center; color: #2563eb;">
                            <svg style="width: 20px; height: 20px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 21h18"></path>
                                <path d="M5 21V9l7-4 7 4v12"></path>
                                <path d="M9 21v-7h6v7"></path>
                            </svg>
                        </div>
                        <div>
                            <strong style="display: block; font-size: 13.5px; color: #0f172a;">Entity Profile</strong>
                            <span style="font-size: 11px; color: #64748b; line-height: 1.4; display: block; margin-top: 3px;">
                                Legal entity details, SEC registration, TIN, and business address.
                            </span>
                        </div>
                    </div>

                    {{-- 2. Director / Officer --}}
                    <div class="gov-type-card" onclick="selectGovernanceType('director_officer')" style="border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px; cursor: pointer; background: #ffffff; transition: all .18s ease; display: flex; flex-direction: column; gap: 8px;">
                        <div style="width: 36px; height: 36px; border-radius: 8px; background: #f0fdf4; display: flex; align-items: center; justify-content: center; color: #16a34a;">
                            <svg style="width: 20px; height: 20px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="8" r="3"></circle>
                                <path d="M3 20c0-3.3 2.7-6 6-6"></path>
                                <circle cx="17" cy="9" r="2.5"></circle>
                                <path d="M14 20c.2-2.7 2.2-5 5-5 1 0 1.8.2 2.5.7"></path>
                            </svg>
                        </div>
                        <div>
                            <strong style="display: block; font-size: 13.5px; color: #0f172a;">Director / Officer</strong>
                            <span style="font-size: 11px; color: #64748b; line-height: 1.4; display: block; margin-top: 3px;">
                                Board directors, corporate officers, executive appointments, and terms.
                            </span>
                        </div>
                    </div>

                    {{-- 3. Ownership Record --}}
                    <div class="gov-type-card" onclick="selectGovernanceType('ownership')" style="border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px; cursor: pointer; background: #ffffff; transition: all .18s ease; display: flex; flex-direction: column; gap: 8px;">
                        <div style="width: 36px; height: 36px; border-radius: 8px; background: #faf5ff; display: flex; align-items: center; justify-content: center; color: #9333ea;">
                            <svg style="width: 20px; height: 20px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                            </svg>
                        </div>
                        <div>
                            <strong style="display: block; font-size: 13.5px; color: #0f172a;">Ownership Record</strong>
                            <span style="font-size: 11px; color: #64748b; line-height: 1.4; display: block; margin-top: 3px;">
                                Shareholders, share classes, issued stocks, and equity allocation.
                            </span>
                        </div>
                    </div>

                    {{-- 4. Meeting --}}
                    <div class="gov-type-card" onclick="selectGovernanceType('meeting')" style="border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px; cursor: pointer; background: #ffffff; transition: all .18s ease; display: flex; flex-direction: column; gap: 8px;">
                        <div style="width: 36px; height: 36px; border-radius: 8px; background: #fff7ed; display: flex; align-items: center; justify-content: center; color: #ea580c;">
                            <svg style="width: 20px; height: 20px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <div>
                            <strong style="display: block; font-size: 13.5px; color: #0f172a;">Meeting</strong>
                            <span style="font-size: 11px; color: #64748b; line-height: 1.4; display: block; margin-top: 3px;">
                                Board meetings, stockholders' assemblies, and official minutes.
                            </span>
                        </div>
                    </div>

                    {{-- 5. Resolution --}}
                    <div class="gov-type-card" onclick="selectGovernanceType('resolution')" style="border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px; cursor: pointer; background: #ffffff; transition: all .18s ease; display: flex; flex-direction: column; gap: 8px;">
                        <div style="width: 36px; height: 36px; border-radius: 8px; background: #ecfeff; display: flex; align-items: center; justify-content: center; color: #0891b2;">
                            <svg style="width: 20px; height: 20px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                        <div>
                            <strong style="display: block; font-size: 13.5px; color: #0f172a;">Resolution</strong>
                            <span style="font-size: 11px; color: #64748b; line-height: 1.4; display: block; margin-top: 3px;">
                                Formal Board and Stockholders' resolutions and operative clauses.
                            </span>
                        </div>
                    </div>

                    {{-- 6. Corporate Record --}}
                    <div class="gov-type-card" onclick="selectGovernanceType('corporate_record')" style="border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px; cursor: pointer; background: #ffffff; transition: all .18s ease; display: flex; flex-direction: column; gap: 8px;">
                        <div style="width: 36px; height: 36px; border-radius: 8px; background: #fdf2f8; display: flex; align-items: center; justify-content: center; color: #db2777;">
                            <svg style="width: 20px; height: 20px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <strong style="display: block; font-size: 13.5px; color: #0f172a;">Corporate Record</strong>
                            <span style="font-size: 11px; color: #64748b; line-height: 1.4; display: block; margin-top: 3px;">
                                Articles, By-Laws, Secretary's Certificates, and formal filings.
                            </span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-foot">
                <button type="button" onclick="closeGovernanceModal()" class="btn ghost sm">Cancel</button>
            </div>
        </div>

        {{-- STAGE 2: TYPE-SPECIFIC ENTRY FORM --}}
        <div id="govStageForm" style="display: none;">
            <div class="modal-head">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <button type="button" id="btnBackToTypeSelect" class="btn ghost sm" onclick="showGovTypeSelection()" style="padding: 4px 10px; font-size: 11px; display: inline-flex; align-items: center; gap: 5px;">
                        &larr; Change Type
                    </button>
                    <div>
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <h3 id="govModalFormTitle" style="margin: 0; font-size: 16px; font-weight: 700; color: var(--ink);">New Governance Record</h3>
                            <span id="govModalTypeBadge" style="padding: 2px 8px; border-radius: 12px; background: #eff6ff; color: #2563eb; font-size: 10.5px; font-weight: 700;">Entity Profile</span>
                        </div>
                        <p id="govModalFormSubtitle" style="margin: 2px 0 0; font-size: 11.5px; color: #64748b;">
                            Maintain legal records for <strong>{{ session('client.account.name', $account?->profile?->legal_name ?? 'your ORDO account') }}</strong>.
                        </p>
                    </div>
                </div>
                <button type="button" class="iconbtn" onclick="closeGovernanceModal()">&times;</button>
            </div>

            <form id="governanceEntryForm" method="POST" action="{{ route('entity-governance.store') }}" enctype="multipart/form-data" onsubmit="submitGovernanceForm(event)">
                @csrf
                <input type="hidden" id="gov_record_id" name="id" value="">
                <input type="hidden" id="gov_method_override" name="_method" value="">
                <input type="hidden" id="gov_record_type" name="record_type" value="entity_profile">

                <div class="modal-body" style="padding: 22px; max-height: calc(88vh - 140px); overflow-y: auto;">

                    {{-- Error Alert Box --}}
                    <div id="govFormErrors" style="display: none; margin-bottom: 16px; padding: 12px 14px; border-radius: 10px; background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; font-size: 12.5px;">
                    </div>

                    {{-- DYNAMIC FIELD CONTAINER: Replaced per record type --}}
                    <div id="govTypeFieldsContainer">

                        {{-- 1. FIELDS: ENTITY PROFILE --}}
                        <div id="fields_entity_profile" class="gov-type-field-group" style="display: none;">
                            <div style="margin-bottom: 14px; padding: 10px 14px; border-radius: 8px; background: #eff6ff; border-left: 3px solid #2563eb; font-size: 11.5px; color: #1e40af;">
                                <strong>Entity Profile Form:</strong> Record legal incorporation details, regulatory registration identifiers, and corporate governance foundation.
                            </div>
                            <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
                                <div class="full" style="grid-column: 1 / -1;">
                                    <label class="label" for="ep_title">Legal Entity Name <span style="color: #ef4444;">*</span></label>
                                    <input type="text" id="ep_title" name="title" class="input gov-input-title" placeholder="e.g. Apex Global Ventures Inc.">
                                </div>
                                <div>
                                    <label class="label" for="ep_category">Entity Type / Structure <span style="color: #ef4444;">*</span></label>
                                    <select id="ep_category" name="category" class="select gov-input-category">
                                        <option value="Domestic Stock Corporation" selected>Domestic Stock Corporation</option>
                                        <option value="Domestic Non-Stock Corporation">Domestic Non-Stock Corporation</option>
                                        <option value="One Person Corporation (OPC)">One Person Corporation (OPC)</option>
                                        <option value="Foreign Branch Office">Foreign Branch Office</option>
                                        <option value="Representative Office">Representative Office</option>
                                        <option value="Partnership">Partnership</option>
                                        <option value="Sole Proprietorship">Sole Proprietorship</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="label" for="ep_sec_reg">SEC / DTI Registration No. <span style="color: #ef4444;">*</span></label>
                                    <input type="text" id="ep_sec_reg" name="metadata[sec_registration_no]" class="input" placeholder="e.g. CS2026-00123">
                                </div>
                                <div>
                                    <label class="label" for="ep_tin">Tax Identification No. (TIN)</label>
                                    <input type="text" id="ep_tin" name="metadata[tin]" class="input" placeholder="e.g. 009-876-543-000">
                                </div>
                                <div>
                                    <label class="label" for="ep_date">Incorporation / Registration Date <span style="color: #ef4444;">*</span></label>
                                    <input type="date" id="ep_date" name="record_date" class="input gov-input-date">
                                </div>
                                <div>
                                    <label class="label" for="ep_jurisdiction">Jurisdiction / Registry Authority</label>
                                    <input type="text" id="ep_jurisdiction" name="metadata[jurisdiction]" class="input" placeholder="e.g. Philippines - SEC Manila">
                                </div>
                                <div>
                                    <label class="label" for="ep_status">Entity Status <span style="color: #ef4444;">*</span></label>
                                    <select id="ep_status" name="status" class="select gov-input-status">
                                        <option value="Active" selected>Active</option>
                                        <option value="In Good Standing">In Good Standing</option>
                                        <option value="Pending Registration">Pending Registration</option>
                                        <option value="Delinquent">Delinquent</option>
                                    </select>
                                </div>
                                <div class="full" style="grid-column: 1 / -1;">
                                    <label class="label" for="ep_address">Registered Principal Office Address</label>
                                    <input type="text" id="ep_address" name="metadata[principal_address]" class="input" placeholder="e.g. Unit 2801, Pacific Star Building, Sen. Gil Puyat Ave, Makati City">
                                </div>
                                <div class="full" style="grid-column: 1 / -1;">
                                    <label class="label" for="ep_description">Corporate Purpose / Notes</label>
                                    <textarea id="ep_description" name="description" class="textarea gov-input-desc" rows="2" placeholder="Primary corporate business purpose, authorized capital overview, or statutory notes..."></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- 2. FIELDS: DIRECTOR / OFFICER --}}
                        <div id="fields_director_officer" class="gov-type-field-group" style="display: none;">
                            <div style="margin-bottom: 14px; padding: 10px 14px; border-radius: 8px; background: #f0fdf4; border-left: 3px solid #16a34a; font-size: 11.5px; color: #166534;">
                                <strong>Director / Officer Form:</strong> Record Board of Directors membership, corporate executive officer appointments, and tenure terms.
                            </div>
                            <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
                                <div class="full" style="grid-column: 1 / -1;">
                                    <label class="label" for="do_title">Full Legal Name <span style="color: #ef4444;">*</span></label>
                                    <input type="text" id="do_title" name="title" class="input gov-input-title" placeholder="e.g. Atty. Carlos Mendoza">
                                </div>
                                <div>
                                    <label class="label" for="do_category">Corporate Position / Designation <span style="color: #ef4444;">*</span></label>
                                    <select id="do_category" name="category" class="select gov-input-category">
                                        <option value="President & Director" selected>President &amp; Director</option>
                                        <option value="Board Director">Board Director</option>
                                        <option value="Corporate Secretary">Corporate Secretary</option>
                                        <option value="Treasurer">Treasurer</option>
                                        <option value="Executive Vice President">Executive Vice President</option>
                                        <option value="Independent Director">Independent Director</option>
                                        <option value="Chief Executive Officer">Chief Executive Officer (CEO)</option>
                                        <option value="Chief Financial Officer">Chief Financial Officer (CFO)</option>
                                        <option value="Compliance Officer">Compliance Officer</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="label" for="do_date">Date Appointed / Elected <span style="color: #ef4444;">*</span></label>
                                    <input type="date" id="do_date" name="record_date" class="input gov-input-date">
                                </div>
                                <div>
                                    <label class="label" for="do_term_end">Term Expiration Date</label>
                                    <input type="date" id="do_term_end" name="metadata[term_end]" class="input">
                                </div>
                                <div>
                                    <label class="label" for="do_nationality">Nationality</label>
                                    <input type="text" id="do_nationality" name="metadata[nationality]" class="input" placeholder="e.g. Filipino">
                                </div>
                                <div>
                                    <label class="label" for="do_tin">TIN / Government ID No.</label>
                                    <input type="text" id="do_tin" name="metadata[tin]" class="input" placeholder="e.g. 123-456-789-000">
                                </div>
                                <div>
                                    <label class="label" for="do_status">Officer Status <span style="color: #ef4444;">*</span></label>
                                    <select id="do_status" name="status" class="select gov-input-status">
                                        <option value="Active" selected>Active</option>
                                        <option value="Resigned">Resigned</option>
                                        <option value="Term Ended">Term Ended</option>
                                        <option value="Pending Confirmation">Pending Confirmation</option>
                                    </select>
                                </div>
                                <div class="full" style="grid-column: 1 / -1;">
                                    <label class="label" for="do_description">Duties, Committee Assignments &amp; Notes</label>
                                    <textarea id="do_description" name="description" class="textarea gov-input-desc" rows="2" placeholder="e.g. Executive Committee member, Audit Committee Chairman, authorized banking signatory..."></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- 3. FIELDS: OWNERSHIP RECORD --}}
                        <div id="fields_ownership" class="gov-type-field-group" style="display: none;">
                            <div style="margin-bottom: 14px; padding: 10px 14px; border-radius: 8px; background: #faf5ff; border-left: 3px solid #9333ea; font-size: 11.5px; color: #6b21a8;">
                                <strong>Ownership Record Form:</strong> Record equity allocations, shareholdings, issued stock classes, and stock certificate registries.
                            </div>
                            <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
                                <div class="full" style="grid-column: 1 / -1;">
                                    <label class="label" for="own_title">Shareholder / Owner Name <span style="color: #ef4444;">*</span></label>
                                    <input type="text" id="own_title" name="title" class="input gov-input-title" placeholder="e.g. Mendoza Capital Holdings Inc. or Maria Elena Santos">
                                </div>
                                <div>
                                    <label class="label" for="own_type">Shareholder Classification <span style="color: #ef4444;">*</span></label>
                                    <select id="own_type" name="metadata[shareholder_type]" class="select">
                                        <option value="Corporate / Institutional" selected>Corporate / Institutional</option>
                                        <option value="Individual (Filipino)">Individual (Filipino)</option>
                                        <option value="Individual (Foreign)">Individual (Foreign)</option>
                                        <option value="Trust / Estate">Trust / Estate</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="label" for="own_category">Class of Shares <span style="color: #ef4444;">*</span></label>
                                    <select id="own_category" name="category" class="select gov-input-category">
                                        <option value="Common Shares" selected>Common Shares</option>
                                        <option value="Preferred Shares">Preferred Shares</option>
                                        <option value="Founder Shares">Founder Shares</option>
                                        <option value="Treasury Shares">Treasury Shares</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="label" for="own_shares">Number of Shares Issued <span style="color: #ef4444;">*</span></label>
                                    <input type="text" id="own_shares" name="metadata[share_count]" class="input" placeholder="e.g. 510,000">
                                </div>
                                <div>
                                    <label class="label" for="own_pct">Ownership Percentage (%) <span style="color: #ef4444;">*</span></label>
                                    <input type="text" id="own_pct" name="metadata[ownership_percentage]" class="input" placeholder="e.g. 51.00%">
                                </div>
                                <div>
                                    <label class="label" for="own_date">Subscription / Acquisition Date <span style="color: #ef4444;">*</span></label>
                                    <input type="date" id="own_date" name="record_date" class="input gov-input-date">
                                </div>
                                <div>
                                    <label class="label" for="own_cert">Stock Certificate No.</label>
                                    <input type="text" id="own_cert" name="metadata[certificate_no]" class="input" placeholder="e.g. CERT-0001">
                                </div>
                                <div>
                                    <label class="label" for="own_status">Ownership Status <span style="color: #ef4444;">*</span></label>
                                    <select id="own_status" name="status" class="select gov-input-status">
                                        <option value="Active" selected>Active</option>
                                        <option value="Transferred">Transferred</option>
                                        <option value="Pending Verification">Pending Verification</option>
                                    </select>
                                </div>
                                <div class="full" style="grid-column: 1 / -1;">
                                    <label class="label" for="own_description">Subscription Notes / Consideration</label>
                                    <textarea id="own_description" name="description" class="textarea gov-input-desc" rows="2" placeholder="e.g. Fully paid cash subscription at par value PHP 1.00 per share..."></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- 4. FIELDS: MEETING --}}
                        <div id="fields_meeting" class="gov-type-field-group" style="display: none;">
                            <div style="margin-bottom: 14px; padding: 10px 14px; border-radius: 8px; background: #fff7ed; border-left: 3px solid #ea580c; font-size: 11.5px; color: #9a3412;">
                                <strong>Meeting Form:</strong> Record Board of Directors or Stockholders' meetings, attendance, quorum verifications, and official minutes.
                            </div>
                            <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
                                <div class="full" style="grid-column: 1 / -1;">
                                    <label class="label" for="meet_title">Meeting Title / Agenda Subject <span style="color: #ef4444;">*</span></label>
                                    <input type="text" id="meet_title" name="title" class="input gov-input-title" placeholder="e.g. 2026 Regular Q1 Board of Directors Meeting">
                                </div>
                                <div>
                                    <label class="label" for="meet_category">Meeting Type <span style="color: #ef4444;">*</span></label>
                                    <select id="meet_category" name="category" class="select gov-input-category">
                                        <option value="Board Meeting" selected>Regular Board Meeting</option>
                                        <option value="Special Board Meeting">Special Board Meeting</option>
                                        <option value="Annual Stockholders Meeting">Annual Stockholders' Meeting</option>
                                        <option value="Special Stockholders Meeting">Special Stockholders' Meeting</option>
                                        <option value="Executive Committee Meeting">Executive Committee Meeting</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="label" for="meet_date">Meeting Date <span style="color: #ef4444;">*</span></label>
                                    <input type="date" id="meet_date" name="record_date" class="input gov-input-date">
                                </div>
                                <div>
                                    <label class="label" for="meet_time">Meeting Time / Schedule</label>
                                    <input type="text" id="meet_time" name="metadata[meeting_time]" class="input" placeholder="e.g. 10:00 AM - 12:30 PM PST">
                                </div>
                                <div>
                                    <label class="label" for="meet_loc">Location / Modality <span style="color: #ef4444;">*</span></label>
                                    <input type="text" id="meet_loc" name="metadata[location]" class="input" placeholder="e.g. Executive Boardroom / Hybrid Zoom Video">
                                </div>
                                <div>
                                    <label class="label" for="meet_chair">Presiding Officer / Chair</label>
                                    <input type="text" id="meet_chair" name="metadata[presiding_officer]" class="input" placeholder="e.g. Atty. Carlos Mendoza (Chairman & CEO)">
                                </div>
                                <div>
                                    <label class="label" for="meet_quorum">Quorum &amp; Attendance</label>
                                    <input type="text" id="meet_quorum" name="metadata[quorum]" class="input" placeholder="e.g. 5 of 5 Directors Present (100% Quorum)">
                                </div>
                                <div>
                                    <label class="label" for="meet_status">Meeting Status <span style="color: #ef4444;">*</span></label>
                                    <select id="meet_status" name="status" class="select gov-input-status">
                                        <option value="Completed" selected>Completed</option>
                                        <option value="For Review">For Review</option>
                                        <option value="Scheduled">Scheduled</option>
                                        <option value="Adjourned">Adjourned</option>
                                    </select>
                                </div>
                                <div class="full" style="grid-column: 1 / -1;">
                                    <label class="label" for="meet_description">Minutes Summary &amp; Deliberations</label>
                                    <textarea id="meet_description" name="description" class="textarea gov-input-desc" rows="2" placeholder="Key corporate matters deliberated, financial reports presented, and directives approved..."></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- 5. FIELDS: RESOLUTION --}}
                        <div id="fields_resolution" class="gov-type-field-group" style="display: none;">
                            <div style="margin-bottom: 14px; padding: 10px 14px; border-radius: 8px; background: #ecfeff; border-left: 3px solid #0891b2; font-size: 11.5px; color: #155e75;">
                                <strong>Resolution Form:</strong> Record formal Board and Stockholders' resolutions, operative clauses, voting outcomes, and Secretary attestations.
                            </div>
                            <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
                                <div class="full" style="grid-column: 1 / -1;">
                                    <label class="label" for="res_title">Resolution Title / Subject <span style="color: #ef4444;">*</span></label>
                                    <input type="text" id="res_title" name="title" class="input gov-input-title" placeholder="e.g. Board Resolution Approving Bank Credit Facility">
                                </div>
                                <div>
                                    <label class="label" for="res_category">Resolution Type <span style="color: #ef4444;">*</span></label>
                                    <select id="res_category" name="category" class="select gov-input-category">
                                        <option value="Board Resolution" selected>Board Resolution</option>
                                        <option value="Stockholders Resolution">Stockholders' Resolution</option>
                                        <option value="Executive Committee Resolution">Executive Committee Resolution</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="label" for="res_no">Resolution Reference No.</label>
                                    <input type="text" id="res_no" name="metadata[resolution_no]" class="input" placeholder="e.g. BR-2026-004">
                                </div>
                                <div>
                                    <label class="label" for="res_date">Date of Adoption / Approval <span style="color: #ef4444;">*</span></label>
                                    <input type="date" id="res_date" name="record_date" class="input gov-input-date">
                                </div>
                                <div>
                                    <label class="label" for="res_sig">Certified / Attested By</label>
                                    <input type="text" id="res_sig" name="metadata[signatory]" class="input" placeholder="e.g. Corporate Secretary">
                                </div>
                                <div>
                                    <label class="label" for="res_vote">Voting Outcome</label>
                                    <select id="res_vote" name="metadata[vote_result]" class="select">
                                        <option value="Unanimous" selected>Unanimous (Approved)</option>
                                        <option value="Majority">Majority (Approved)</option>
                                        <option value="Approved with Dissents">Approved with Dissents</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="label" for="res_status">Status <span style="color: #ef4444;">*</span></label>
                                    <select id="res_status" name="status" class="select gov-input-status">
                                        <option value="Approved" selected>Approved</option>
                                        <option value="Final">Final</option>
                                        <option value="For Review">For Review</option>
                                        <option value="Pending Signature">Pending Signature</option>
                                    </select>
                                </div>
                                <div class="full" style="grid-column: 1 / -1;">
                                    <label class="label" for="res_description">Resolution Text / Operative Clause <span style="color: #ef4444;">*</span></label>
                                    <textarea id="res_description" name="description" class="textarea gov-input-desc" rows="3" placeholder="RESOLVED, as it is hereby resolved, that the Corporation authorize the designated officers to..."></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- 6. FIELDS: CORPORATE RECORD --}}
                        <div id="fields_corporate_record" class="gov-type-field-group" style="display: none;">
                            <div style="margin-bottom: 14px; padding: 10px 14px; border-radius: 8px; background: #fdf2f8; border-left: 3px solid #db2777; font-size: 11.5px; color: #9d174d;">
                                <strong>Corporate Record Form:</strong> Record constitutional documents, Secretary's Certificates, regulatory filings, and corporate repositories.
                            </div>
                            <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">
                                <div class="full" style="grid-column: 1 / -1;">
                                    <label class="label" for="cr_title">Document Title / Record Name <span style="color: #ef4444;">*</span></label>
                                    <input type="text" id="cr_title" name="title" class="input gov-input-title" placeholder="e.g. Secretary's Certificate for Authorized Signatories">
                                </div>
                                <div>
                                    <label class="label" for="cr_category">Record Category <span style="color: #ef4444;">*</span></label>
                                    <select id="cr_category" name="category" class="select gov-input-category">
                                        <option value="Corporate record" selected>Corporate record</option>
                                        <option value="Articles of Incorporation">Articles of Incorporation</option>
                                        <option value="By-Laws">By-Laws</option>
                                        <option value="General Information Sheet (GIS)">General Information Sheet (GIS)</option>
                                        <option value="Secretary's Certificate">Secretary's Certificate</option>
                                        <option value="Contract / Agreement">Corporate Contract / Agreement</option>
                                        <option value="Power of Attorney">Power of Attorney / Authorization</option>
                                        <option value="Regulatory License">Regulatory License / Permit</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="label" for="cr_agency">Issuing / Filing Agency</label>
                                    <input type="text" id="cr_agency" name="metadata[filing_agency]" class="input" placeholder="e.g. Securities and Exchange Commission (SEC)">
                                </div>
                                <div>
                                    <label class="label" for="cr_custodian">Custodian / Repository</label>
                                    <input type="text" id="cr_custodian" name="metadata[custodian]" class="input" placeholder="e.g. Office of the Corporate Secretary">
                                </div>
                                <div>
                                    <label class="label" for="cr_date">Effective / Filing Date <span style="color: #ef4444;">*</span></label>
                                    <input type="date" id="cr_date" name="record_date" class="input gov-input-date">
                                </div>
                                <div>
                                    <label class="label" for="cr_status">Document Status <span style="color: #ef4444;">*</span></label>
                                    <select id="cr_status" name="status" class="select gov-input-status">
                                        <option value="Final" selected>Final</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Filed">Filed</option>
                                        <option value="For Review">For Review</option>
                                        <option value="Draft">Draft</option>
                                    </select>
                                </div>
                                <div class="full" style="grid-column: 1 / -1;">
                                    <label class="label" for="cr_description">Description / Document Notes</label>
                                    <textarea id="cr_description" name="description" class="textarea gov-input-desc" rows="2" placeholder="Record scope, execution background, certified copies count, or official archive notes..."></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Supporting Document / Attachment (Shared across all record types) --}}
                    <div style="margin-top: 16px;">
                        <label class="label">Supporting Document / Attachment</label>
                        <div style="border: 1px dashed #cbd5e1; border-radius: 10px; padding: 14px 16px; background: #f8fafc; display: flex; align-items: center; justify-content: space-between; gap: 12px;">
                            <div style="display: flex; align-items: center; gap: 10px; overflow: hidden;">
                                <svg style="width: 22px; height: 22px; color: #2563eb; flex-shrink: 0;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                                </svg>
                                <div style="min-width: 0;">
                                    <span id="govAttachmentFileName" style="font-size: 12px; font-weight: 600; color: #334155; display: block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">No file attached</span>
                                    <span style="font-size: 10px; color: #94a3b8;">PDF, DOCX, XLSX, JPG, or PNG (up to 10MB)</span>
                                </div>
                            </div>
                            <div style="flex-shrink: 0;">
                                <label for="gov_attachment" class="btn ghost sm" style="cursor: pointer; margin: 0;">
                                    Browse
                                </label>
                                <input type="file" id="gov_attachment" name="attachment" style="display: none;" onchange="handleGovFileChange(this)">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-foot">
                    <button type="button" onclick="closeGovernanceModal()" class="btn ghost sm">Cancel</button>
                    <button type="submit" id="btnSaveGovernance" class="btn primary sm">
                        <span id="btnSaveGovernanceLabel">Save Record</span>
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>


{{-- =========================================================
    VIEW GOVERNANCE DETAIL MODAL
========================================================== --}}
<div id="governanceDetailModal" class="modal-backdrop" style="display: none;" onclick="if(event.target===this)closeGovernanceDetailModal()">
    <div class="modal" style="width: min(680px, 100%);">
        <div class="modal-head">
            <div>
                <span id="detailGovRefNo" style="font-size: 11px; font-weight: 700; color: #2563eb; text-transform: uppercase; letter-spacing: .04em;">GOV-000</span>
                <h3 id="detailGovTitle" style="margin: 2px 0 0; font-size: 16px; font-weight: 700; color: var(--ink);">Record Detail</h3>
            </div>
            <button type="button" class="iconbtn" onclick="closeGovernanceDetailModal()">&times;</button>
        </div>
        <div class="modal-body" style="padding: 22px;">
            <div style="display: flex; gap: 8px; margin-bottom: 18px; align-items: center; flex-wrap: wrap;">
                <span id="detailGovStatusBadge" class="status active">
                    <span></span>
                    <span id="detailGovStatusText">Active</span>
                </span>
                <span id="detailGovTypeBadge" style="padding: 5px 10px; border-radius: 20px; background: #eff6ff; color: #2563eb; font-size: 10.5px; font-weight: 700;">
                    Type
                </span>
                <span id="detailGovCategoryBadge" style="padding: 5px 10px; border-radius: 20px; background: #f8fafc; border: 1px solid #e2e8f0; color: #475569; font-size: 10.5px; font-weight: 700;">
                    Category
                </span>
            </div>

            <div id="detailGovMetaGrid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; padding: 14px; background: #f8fafc; border: 1px solid #eef2f6; border-radius: 10px; margin-bottom: 16px;">
                {{-- Dynamically populated based on record attributes --}}
            </div>

            <div style="margin-bottom: 16px;">
                <label id="detailGovDescLabel" style="font-size: 12px; font-weight: 700; color: #334155; display: block; margin-bottom: 6px;">Description / Notes</label>
                <div id="detailGovDescription" style="padding: 12px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 12.5px; line-height: 1.55; color: #475569; min-height: 48px; white-space: pre-wrap;">
                    No notes provided.
                </div>
            </div>

            <div id="detailGovAttachmentContainer" style="display: none;">
                <label style="font-size: 12px; font-weight: 700; color: #334155; display: block; margin-bottom: 6px;">Supporting Document / Attachment</label>
                <div style="display: flex; align-items: center; gap: 8px; padding: 10px 12px; border-radius: 8px; background: #eff6ff; border: 1px solid #dbeafe;">
                    <svg style="width: 18px; height: 18px; color: #2563eb;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                    </svg>
                    <span id="detailGovAttachmentName" style="font-size: 12px; font-weight: 600; color: #1e40af;">document.pdf</span>
                </div>
            </div>
        </div>
        <div class="modal-foot" style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
            <button type="button" onclick="closeGovernanceDetailModal()" class="btn ghost sm">Close</button>
            <button type="button" id="btnEditGovFromDetail" class="btn primary sm" onclick="editGovernanceRecordFromDetail()" style="display: inline-flex; align-items: center; gap: 6px;">
                <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
                Edit Record
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    window.currentGovernanceDetailRecord = null;
    window.currentActiveGovType = 'entity_profile';
    window.currentSelectedTabType = 'all';

    const GOV_TYPE_META = {
        'entity_profile': {
            label: 'Entity Profile',
            badge: 'Corporate Entity',
            subtitle: 'Legal entity details, registration, and corporate structure.',
            titleLabel: 'Legal Entity Name',
            categoryLabel: 'Entity Structure',
            descLabel: 'Corporate Purpose / Notes',
            dateLabel: 'Incorporation Date',
            fieldsId: 'fields_entity_profile'
        },
        'director_officer': {
            label: 'Director / Officer',
            badge: 'Board & Management',
            subtitle: 'Board directors, corporate executive appointments, and tenure.',
            titleLabel: 'Full Legal Name',
            categoryLabel: 'Corporate Position',
            descLabel: 'Duties, Committee Assignments & Notes',
            dateLabel: 'Appointment Date',
            fieldsId: 'fields_director_officer'
        },
        'ownership': {
            label: 'Ownership Record',
            badge: 'Capital & Equity',
            subtitle: 'Shareholders, stock classes, and equity allocation.',
            titleLabel: 'Shareholder / Owner Name',
            categoryLabel: 'Class of Shares',
            descLabel: 'Subscription Notes & Consideration',
            dateLabel: 'Acquisition Date',
            fieldsId: 'fields_ownership'
        },
        'meeting': {
            label: 'Meeting Record',
            badge: 'Assemblies & Minutes',
            subtitle: 'Board and stockholders assemblies and official minutes.',
            titleLabel: 'Meeting Title / Agenda Subject',
            categoryLabel: 'Meeting Type',
            descLabel: 'Minutes Summary & Deliberations',
            dateLabel: 'Meeting Date',
            fieldsId: 'fields_meeting'
        },
        'resolution': {
            label: 'Resolution',
            badge: 'Formal Acts',
            subtitle: 'Formal corporate resolutions and operative clauses.',
            titleLabel: 'Resolution Title / Subject',
            categoryLabel: 'Resolution Type',
            descLabel: 'Resolution Text / Operative Clause',
            dateLabel: 'Adoption Date',
            fieldsId: 'fields_resolution'
        },
        'corporate_record': {
            label: 'Corporate Record',
            badge: 'Statutory Filings',
            subtitle: 'Constitutional filings, certifications, and archives.',
            titleLabel: 'Document Title / Record Name',
            categoryLabel: 'Record Category',
            descLabel: 'Description / Document Notes',
            dateLabel: 'Effective / Filing Date',
            fieldsId: 'fields_corporate_record'
        }
    };

    function openNewGovernanceModal() {
        const modal = document.getElementById('governanceModal');
        const form = document.getElementById('governanceEntryForm');
        form.reset();

        document.getElementById('gov_record_id').value = '';
        document.getElementById('gov_method_override').value = '';

        const errEl = document.getElementById('govFormErrors');
        if (errEl) {
            errEl.style.display = 'none';
            errEl.innerHTML = '';
        }

        const fileLabel = document.getElementById('govAttachmentFileName');
        if (fileLabel) {
            fileLabel.textContent = 'No file attached';
            fileLabel.style.color = '#334155';
        }

        // Show Stage 1 (Type Selection) by default
        showGovTypeSelection();

        if (modal) modal.style.display = 'grid';
    }

    function showGovTypeSelection() {
        document.getElementById('govStageTypeSelect').style.display = 'block';
        document.getElementById('govStageForm').style.display = 'none';
    }

    function selectGovernanceType(typeKey, isEdit = false) {
        window.currentActiveGovType = typeKey;
        document.getElementById('gov_record_type').value = typeKey;

        const meta = GOV_TYPE_META[typeKey] || GOV_TYPE_META['entity_profile'];

        // Update titles & badge
        const titleEl = document.getElementById('govModalFormTitle');
        const subEl = document.getElementById('govModalFormSubtitle');
        const backBtn = document.getElementById('btnBackToTypeSelect');
        const typeBadgeEl = document.getElementById('govModalTypeBadge');

        if (isEdit) {
            titleEl.textContent = 'Edit ' + meta.label;
            backBtn.style.display = 'none';
        } else {
            titleEl.textContent = 'New ' + meta.label;
            backBtn.style.display = 'inline-flex';
        }
        subEl.textContent = meta.subtitle;
        if (typeBadgeEl) {
            typeBadgeEl.textContent = meta.label;
        }

        // Toggle field groups and isolate inputs (disable inactive inputs so they are not submitted)
        document.querySelectorAll('.gov-type-field-group').forEach(el => {
            const isActive = (el.id === meta.fieldsId);
            el.style.display = isActive ? 'block' : 'none';
            el.querySelectorAll('input, select, textarea').forEach(inp => {
                inp.disabled = !isActive;
            });
        });

        document.getElementById('govStageTypeSelect').style.display = 'none';
        document.getElementById('govStageForm').style.display = 'block';

        const btnLabel = document.getElementById('btnSaveGovernanceLabel');
        if (btnLabel) {
            btnLabel.textContent = isEdit ? 'Save Changes' : 'Save Record';
        }
    }

    function closeGovernanceModal() {
        const modal = document.getElementById('governanceModal');
        if (modal) modal.style.display = 'none';
    }

    function handleGovFileChange(input) {
        const label = document.getElementById('govAttachmentFileName');
        if (input.files && input.files.length > 0) {
            label.textContent = input.files[0].name;
            label.style.color = '#2563eb';
        } else {
            label.textContent = 'No file attached';
            label.style.color = '#334155';
        }
    }

    function submitGovernanceForm(e) {
        e.preventDefault();

        const form = document.getElementById('governanceEntryForm');
        const btn = document.getElementById('btnSaveGovernance');
        const btnLabel = document.getElementById('btnSaveGovernanceLabel');
        const errEl = document.getElementById('govFormErrors');

        errEl.style.display = 'none';
        errEl.innerHTML = '';

        const typeKey = document.getElementById('gov_record_type').value;
        const meta = GOV_TYPE_META[typeKey] || GOV_TYPE_META['entity_profile'];
        const groupEl = document.getElementById(meta.fieldsId);

        if (!groupEl) return;

        // Extract values from active group
        const titleInput = groupEl.querySelector('[name="title"]') || groupEl.querySelector('.gov-input-title');
        const categoryInput = groupEl.querySelector('[name="category"]') || groupEl.querySelector('.gov-input-category');
        const dateInput = groupEl.querySelector('[name="record_date"]') || groupEl.querySelector('.gov-input-date');
        const statusInput = groupEl.querySelector('[name="status"]') || groupEl.querySelector('.gov-input-status');
        const descInput = groupEl.querySelector('[name="description"]') || groupEl.querySelector('.gov-input-desc');

        const title = titleInput ? titleInput.value.trim() : '';
        const category = categoryInput ? categoryInput.value : '';
        const recordDate = dateInput ? dateInput.value : '';
        const status = statusInput ? statusInput.value : 'Active';
        const description = descInput ? descInput.value.trim() : '';

        // Validation for required fields
        if (!title) {
            errEl.innerHTML = `<strong>Missing Information:</strong> Please enter the ${meta.titleLabel || 'Title / Name'}.`;
            errEl.style.display = 'block';
            if (titleInput) titleInput.focus();
            return;
        }
        if (!category) {
            errEl.innerHTML = `<strong>Missing Information:</strong> Please select the ${meta.categoryLabel || 'Category'}.`;
            errEl.style.display = 'block';
            if (categoryInput) categoryInput.focus();
            return;
        }
        if (!recordDate) {
            errEl.innerHTML = `<strong>Missing Information:</strong> Please specify the ${meta.dateLabel || 'Date'}.`;
            errEl.style.display = 'block';
            if (dateInput) dateInput.focus();
            return;
        }

        // Additional type-specific validation
        if (typeKey === 'resolution' && !description) {
            errEl.innerHTML = '<strong>Missing Information:</strong> Please enter the Resolution Text / Operative Clause.';
            errEl.style.display = 'block';
            if (descInput) descInput.focus();
            return;
        }
        if (typeKey === 'entity_profile') {
            const secReg = groupEl.querySelector('[name="metadata[sec_registration_no]"]');
            if (secReg && !secReg.value.trim()) {
                errEl.innerHTML = '<strong>Missing Information:</strong> Please enter the SEC / DTI Registration Number.';
                errEl.style.display = 'block';
                secReg.focus();
                return;
            }
        }
        if (typeKey === 'meeting') {
            const loc = groupEl.querySelector('[name="metadata[location]"]');
            if (loc && !loc.value.trim()) {
                errEl.innerHTML = '<strong>Missing Information:</strong> Please specify the Meeting Location / Modality.';
                errEl.style.display = 'block';
                loc.focus();
                return;
            }
        }
        if (typeKey === 'ownership') {
            const shares = groupEl.querySelector('[name="metadata[share_count]"]');
            const pct = groupEl.querySelector('[name="metadata[ownership_percentage]"]');
            if (shares && !shares.value.trim()) {
                errEl.innerHTML = '<strong>Missing Information:</strong> Please specify the Number of Shares Issued.';
                errEl.style.display = 'block';
                shares.focus();
                return;
            }
            if (pct && !pct.value.trim()) {
                errEl.innerHTML = '<strong>Missing Information:</strong> Please specify the Ownership Percentage (%).';
                errEl.style.display = 'block';
                pct.focus();
                return;
            }
        }

        const recordId = document.getElementById('gov_record_id').value;
        const isEdit = Boolean(recordId);

        btn.disabled = true;
        if (btnLabel) btnLabel.textContent = isEdit ? 'Updating...' : 'Saving...';

        // Build clean, dedicated FormData with ONLY active group inputs
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('record_type', typeKey);
        formData.append('title', title);
        formData.append('category', category);
        formData.append('record_date', recordDate);
        formData.append('status', status);
        formData.append('description', description);

        // ONLY append metadata inputs from the active group
        groupEl.querySelectorAll('[name^="metadata["]').forEach(inp => {
            if (inp.value !== undefined && inp.value !== null && inp.value.trim() !== '') {
                formData.append(inp.name, inp.value.trim());
            }
        });

        // Supporting Document attachment (if selected)
        const fileInput = document.getElementById('gov_attachment');
        if (fileInput && fileInput.files && fileInput.files.length > 0) {
            formData.append('attachment', fileInput.files[0]);
        }

        const targetUrl = isEdit ? ('/entity-governance/' + encodeURIComponent(recordId)) : form.action;

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
                let msg = data.message || 'Validation error occurred while saving the governance record.';
                if (data.errors) {
                    const firstKey = Object.keys(data.errors)[0];
                    msg = data.errors[firstKey][0];
                }
                throw new Error(msg);
            }
            return data;
        })
        .then(data => {
            closeGovernanceModal();

            if (isEdit) {
                if (data.record) {
                    updateGovernanceRecordInTable(data.record);
                    window.currentGovernanceDetailRecord = data.record;
                }
            } else {
                form.reset();
                if (data.record) {
                    insertGovernanceRecordIntoTable(data.record);
                }
            }

            if (data.stats) {
                updateGovernanceStats(data.stats);
            }

            if (typeof toast === 'function') {
                toast(data.message || (isEdit ? 'Governance record updated successfully.' : 'Governance record recorded successfully.'));
            }
        })
        .catch(err => {
            errEl.innerHTML = `<strong>Error:</strong> ${err.message}`;
            errEl.style.display = 'block';
        })
        .finally(() => {
            btn.disabled = false;
            if (btnLabel) btnLabel.textContent = isEdit ? 'Save Changes' : 'Save Record';
        });
    }

    function insertGovernanceRecordIntoTable(rec) {
        const tbody = document.getElementById('governanceRecordsTableBody');
        const emptyRow = document.getElementById('emptyGovRow');
        if (emptyRow) {
            emptyRow.style.display = 'none';
        }

        const typeMeta = GOV_TYPE_META[rec.record_type] || { label: 'Record' };
        const badgeClass = rec.status_badge_class || matchGovBadgeClass(rec.status);
        const formattedDate = rec.formatted_record_date || rec.record_date;

        const tr = document.createElement('tr');
        tr.id = 'govRow_' + rec.id;
        tr.setAttribute('data-record-id', rec.id);
        tr.setAttribute('data-record-type', rec.record_type);
        tr.setAttribute('data-reference', rec.reference_no);
        tr.setAttribute('data-status', (rec.status || '').toLowerCase());
        tr.style.backgroundColor = '#eff6ff';
        tr.style.transition = 'background-color 1.5s ease';

        tr.innerHTML = `
            <td>
                <span class="reference">${escapeHtml(rec.reference_no)}</span>
            </td>
            <td>
                <div class="record-item">
                    <strong>${escapeHtml(rec.title)}</strong>
                    <span>${escapeHtml(rec.category)} &bull; ${escapeHtml(typeMeta.label)}</span>
                </div>
            </td>
            <td>
                <span class="record-date">${escapeHtml(formattedDate)}</span>
            </td>
            <td>
                <span class="status ${badgeClass}">
                    <span></span>
                    ${escapeHtml(rec.status)}
                </span>
            </td>
            <td class="action-column">
                <button type="button" class="view-button" id="btnView_${rec.id}">
                    View
                </button>
            </td>
        `;

        tbody.insertBefore(tr, tbody.firstChild);

        const viewBtn = tr.querySelector(`#btnView_${rec.id}`);
        if (viewBtn) {
            viewBtn.addEventListener('click', () => viewGovernanceDetail(rec));
        }

        // Automatically switch to the tab corresponding to the created record type so it's immediately visible
        const targetTab = document.querySelector(`.workspace-tabs .workspace-tab[data-tab-type="${rec.record_type}"]`);
        if (targetTab) {
            filterGovernanceTab(targetTab, rec.record_type);
        }

        setTimeout(() => {
            tr.style.backgroundColor = '';
        }, 1500);
    }

    function updateGovernanceRecordInTable(rec) {
        let row = document.getElementById('govRow_' + rec.id)
            || document.querySelector(`tr[data-record-id="${rec.id}"]`)
            || document.querySelector(`tr[data-reference="${rec.reference_no}"]`);

        if (!row) {
            insertGovernanceRecordIntoTable(rec);
            return;
        }

        const typeMeta = GOV_TYPE_META[rec.record_type] || { label: 'Record' };
        const badgeClass = rec.status_badge_class || matchGovBadgeClass(rec.status);
        const formattedDate = rec.formatted_record_date || rec.record_date;

        row.setAttribute('data-record-id', rec.id);
        row.setAttribute('data-record-type', rec.record_type);
        row.setAttribute('data-reference', rec.reference_no);
        row.setAttribute('data-status', (rec.status || '').toLowerCase());

        row.innerHTML = `
            <td>
                <span class="reference">${escapeHtml(rec.reference_no)}</span>
            </td>
            <td>
                <div class="record-item">
                    <strong>${escapeHtml(rec.title)}</strong>
                    <span>${escapeHtml(rec.category)} &bull; ${escapeHtml(typeMeta.label)}</span>
                </div>
            </td>
            <td>
                <span class="record-date">${escapeHtml(formattedDate)}</span>
            </td>
            <td>
                <span class="status ${badgeClass}">
                    <span></span>
                    ${escapeHtml(rec.status)}
                </span>
            </td>
            <td class="action-column">
                <button type="button" class="view-button" id="btnView_${rec.id}">
                    View
                </button>
            </td>
        `;

        const viewBtn = row.querySelector(`#btnView_${rec.id}`);
        if (viewBtn) {
            viewBtn.addEventListener('click', () => viewGovernanceDetail(rec));
        }

        row.style.backgroundColor = '#ecfdf5';
        row.style.transition = 'background-color 1.5s ease';
        setTimeout(() => {
            row.style.backgroundColor = '';
        }, 1500);
    }

    function viewGovernanceDetail(rec) {
        window.currentGovernanceDetailRecord = rec;

        const modal = document.getElementById('governanceDetailModal');
        if (!modal) return;

        const typeMeta = GOV_TYPE_META[rec.record_type] || { label: 'Record', descLabel: 'Description / Notes', dateLabel: 'Date' };

        document.getElementById('detailGovRefNo').textContent = rec.reference_no || 'GOV-RECORD';
        document.getElementById('detailGovTitle').textContent = rec.title || 'Untitled';

        const badgeClass = rec.status_badge_class || matchGovBadgeClass(rec.status);
        const statusBadge = document.getElementById('detailGovStatusBadge');
        statusBadge.className = `status ${badgeClass}`;
        document.getElementById('detailGovStatusText').textContent = rec.status || 'Active';

        document.getElementById('detailGovTypeBadge').textContent = typeMeta.label;
        document.getElementById('detailGovCategoryBadge').textContent = rec.category || 'General';

        // Render metadata grid
        const metaGrid = document.getElementById('detailGovMetaGrid');
        metaGrid.innerHTML = '';

        const addMetaItem = (label, val) => {
            if (!val) return;
            const item = document.createElement('div');
            item.innerHTML = `
                <span style="font-size: 11px; color: #64748b; display: block; font-weight: 600;">${escapeHtml(label)}</span>
                <strong style="font-size: 13px; color: #0f172a;">${escapeHtml(val)}</strong>
            `;
            metaGrid.appendChild(item);
        };
        const formatGovDateStr = (d) => {
            if (!d) return '—';
            if (typeof d === 'string' && d.includes('T')) {
                const parts = d.split('T')[0].split('-');
                if (parts.length === 3) {
                    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    const mIdx = parseInt(parts[1], 10) - 1;
                    return (months[mIdx] || parts[1]) + ' ' + parseInt(parts[2], 10) + ', ' + parts[0];
                }
            }
            return d;
        };

        addMetaItem(typeMeta.dateLabel || 'Date', rec.formatted_record_date || formatGovDateStr(rec.record_date));

        const m = rec.metadata || {};
        if (rec.record_type === 'entity_profile') {
            addMetaItem('SEC / DTI Reg No.', m.sec_registration_no);
            addMetaItem('TIN', m.tin);
            addMetaItem('Jurisdiction / Registry', m.jurisdiction);
            addMetaItem('Principal Address', m.principal_address);
        } else if (rec.record_type === 'director_officer') {
            addMetaItem('Corporate Designation', rec.category);
            addMetaItem('Term Expiration', m.term_end);
            addMetaItem('Nationality', m.nationality);
            addMetaItem('TIN / Gov ID', m.tin);
        } else if (rec.record_type === 'ownership') {
            addMetaItem('Shareholder Classification', m.shareholder_type);
            addMetaItem('Class of Shares', rec.category);
            addMetaItem('Shares Count', m.share_count);
            addMetaItem('Ownership Share (%)', m.ownership_percentage);
            addMetaItem('Stock Certificate #', m.certificate_no);
        } else if (rec.record_type === 'meeting') {
            addMetaItem('Meeting Type', rec.category);
            addMetaItem('Meeting Schedule', m.meeting_time);
            addMetaItem('Location / Modality', m.location);
            addMetaItem('Presiding Officer', m.presiding_officer);
            addMetaItem('Quorum & Attendance', m.quorum);
        } else if (rec.record_type === 'resolution') {
            addMetaItem('Resolution Type', rec.category);
            addMetaItem('Resolution Ref No.', m.resolution_no);
            addMetaItem('Voting Outcome', m.vote_result);
            addMetaItem('Certified / Attested By', m.signatory);
        } else if (rec.record_type === 'corporate_record') {
            addMetaItem('Record Category', rec.category);
            addMetaItem('Issuing Agency / Authority', m.filing_agency);
            addMetaItem('Custodian / Repository', m.custodian);
        }

        // Description / Notes
        document.getElementById('detailGovDescLabel').textContent = typeMeta.descLabel || 'Description / Notes';
        const descEl = document.getElementById('detailGovDescription');
        descEl.textContent = rec.description || 'No additional notes or description recorded.';

        // Attachment
        const attachContainer = document.getElementById('detailGovAttachmentContainer');
        const attachName = document.getElementById('detailGovAttachmentName');
        if (rec.attachment_name) {
            attachName.textContent = rec.attachment_name;
            attachContainer.style.display = 'block';
        } else {
            attachContainer.style.display = 'none';
        }

        modal.style.display = 'grid';
    }

    function editGovernanceRecordFromDetail() {
        closeGovernanceDetailModal();
        const rec = window.currentGovernanceDetailRecord;
        if (!rec) return;

        const modal = document.getElementById('governanceModal');
        const form = document.getElementById('governanceEntryForm');
        form.reset();

        document.getElementById('gov_record_id').value = rec.id || '';
        document.getElementById('gov_method_override').value = 'PUT';

        const errEl = document.getElementById('govFormErrors');
        if (errEl) {
            errEl.style.display = 'none';
            errEl.innerHTML = '';
        }

        selectGovernanceType(rec.record_type, true);

        const meta = GOV_TYPE_META[rec.record_type] || GOV_TYPE_META['entity_profile'];
        const groupEl = document.getElementById(meta.fieldsId);

        if (groupEl) {
            const titleInput = groupEl.querySelector('[name="title"]') || groupEl.querySelector('.gov-input-title');
            const categoryInput = groupEl.querySelector('[name="category"]') || groupEl.querySelector('.gov-input-category');
            const dateInput = groupEl.querySelector('[name="record_date"]') || groupEl.querySelector('.gov-input-date');
            const statusInput = groupEl.querySelector('[name="status"]') || groupEl.querySelector('.gov-input-status');
            const descInput = groupEl.querySelector('[name="description"]') || groupEl.querySelector('.gov-input-desc');

            if (titleInput) titleInput.value = rec.title || '';
            if (categoryInput) categoryInput.value = rec.category || '';
            if (dateInput) dateInput.value = rec.record_date ? String(rec.record_date).substring(0, 10) : '';
            if (statusInput) statusInput.value = rec.status || 'Active';
            if (descInput) descInput.value = rec.description || '';

            // Populate metadata inputs
            const m = rec.metadata || {};
            for (const [key, val] of Object.entries(m)) {
                const inp = groupEl.querySelector(`[name="metadata[${key}]"]`);
                if (inp) inp.value = val;
            }
        }

        const fileLabel = document.getElementById('govAttachmentFileName');
        if (fileLabel) {
            if (rec.attachment_name) {
                fileLabel.textContent = 'Current: ' + rec.attachment_name;
                fileLabel.style.color = '#2563eb';
            } else {
                fileLabel.textContent = 'No file attached';
                fileLabel.style.color = '#334155';
            }
        }

        if (modal) modal.style.display = 'grid';
    }

    function closeGovernanceDetailModal() {
        const modal = document.getElementById('governanceDetailModal');
        if (modal) modal.style.display = 'none';
    }

    function setActiveKpiCard(kpiKey) {
        document.querySelectorAll('.stats-grid .stat-card').forEach(card => card.classList.remove('active-kpi'));
        if (!kpiKey) return;

        let targetId = null;
        if (kpiKey === 'active_entities') targetId = 'kpiActiveEntities';
        else if (kpiKey === 'directors_officers') targetId = 'kpiDirectors';
        else if (kpiKey === 'pending_actions') targetId = 'kpiPendingActions';
        else if (kpiKey === 'governance_records') targetId = 'kpiTotalRecords';

        if (targetId) {
            const cardEl = document.getElementById(targetId);
            if (cardEl) cardEl.classList.add('active-kpi');
        }
    }

    function handleKpiKeydown(event, kpiKey) {
        if (event.key === 'Enter' || event.key === ' ' || event.code === 'Space') {
            event.preventDefault();
            handleKpiCardClick(kpiKey);
        }
    }

    function handleKpiCardClick(kpiKey) {
        const workspace = document.getElementById('governanceWorkspace');

        if (kpiKey === 'active_entities') {
            const tabBtn = document.querySelector('.workspace-tabs .workspace-tab[data-tab-type="entity_profile"]');
            if (tabBtn) filterGovernanceTab(tabBtn, 'entity_profile');
            setActiveKpiCard('active_entities');
        } else if (kpiKey === 'directors_officers') {
            const tabBtn = document.querySelector('.workspace-tabs .workspace-tab[data-tab-type="director_officer"]');
            if (tabBtn) filterGovernanceTab(tabBtn, 'director_officer');
            setActiveKpiCard('directors_officers');
        } else if (kpiKey === 'pending_actions') {
            filterTableByPendingActions();
            setActiveKpiCard('pending_actions');
        } else if (kpiKey === 'governance_records') {
            const tabBtn = document.querySelector('.workspace-tabs .workspace-tab[data-tab-type="corporate_record"]');
            if (tabBtn) filterGovernanceTab(tabBtn, 'corporate_record');
            setActiveKpiCard('governance_records');
        }

        if (workspace) {
            workspace.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }

    function filterTableByPendingActions() {
        // Deselect all category tabs to indicate custom filter
        document.querySelectorAll('.workspace-tabs .workspace-tab').forEach(t => t.classList.remove('active'));
        window.currentSelectedTabType = 'pending_actions';

        const pendingKeywords = [
            'for review', 'review', 'in review',
            'pending', 'pending action', 'pending signature',
            'pending confirmation', 'pending verification',
            'scheduled', 'action required'
        ];

        const rows = document.querySelectorAll('#governanceRecordsTableBody tr:not(#emptyGovRow)');
        let visibleCount = 0;

        rows.forEach(row => {
            const statusAttr = (row.getAttribute('data-status') || '').toLowerCase().trim();
            const isPending = pendingKeywords.some(keyword => statusAttr.includes(keyword));
            if (isPending) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        const filterBadge = document.getElementById('govActiveFilterBadge');
        const filterLabel = document.getElementById('govActiveFilterLabel');
        if (filterBadge) filterBadge.style.display = 'inline-flex';
        if (filterLabel) filterLabel.textContent = `Filtered: Pending Actions (${visibleCount})`;

        const emptyRow = document.getElementById('emptyGovRow');
        if (emptyRow) {
            emptyRow.style.display = visibleCount === 0 ? '' : 'none';
            const emptyTd = emptyRow.querySelector('td');
            if (emptyTd && visibleCount === 0) {
                emptyTd.textContent = 'No pending governance actions or review items found.';
            }
        }
    }

    function filterGovernanceTab(tabBtn, typeKey) {
        document.querySelectorAll('.workspace-tabs .workspace-tab').forEach(t => t.classList.remove('active'));
        if (tabBtn) tabBtn.classList.add('active');
        window.currentSelectedTabType = typeKey;

        // Hide pending filter badge when switching to a regular tab
        const filterBadge = document.getElementById('govActiveFilterBadge');
        if (filterBadge) filterBadge.style.display = 'none';

        // Sync active KPI card state if applicable
        if (typeKey === 'entity_profile') {
            setActiveKpiCard('active_entities');
        } else if (typeKey === 'director_officer') {
            setActiveKpiCard('directors_officers');
        } else if (typeKey === 'corporate_record') {
            setActiveKpiCard('governance_records');
        } else {
            setActiveKpiCard(null);
        }

        const rows = document.querySelectorAll('#governanceRecordsTableBody tr:not(#emptyGovRow)');
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

        const emptyRow = document.getElementById('emptyGovRow');
        if (emptyRow) {
            emptyRow.style.display = visibleCount === 0 ? '' : 'none';
            const emptyTd = emptyRow.querySelector('td');
            if (emptyTd && visibleCount === 0) {
                emptyTd.textContent = 'No records found for this category.';
            }
        }
    }

    function resetGovernanceFilter() {
        const overviewTab = document.querySelector('.workspace-tabs .workspace-tab[data-tab-type="all"]') || document.querySelector('.workspace-tabs .workspace-tab');
        if (overviewTab) {
            filterGovernanceTab(overviewTab, 'all');
        }
        setActiveKpiCard(null);
        const filterBadge = document.getElementById('govActiveFilterBadge');
        if (filterBadge) filterBadge.style.display = 'none';
    }

    function updateGovernanceStats(stats) {
        if (!stats) return;
        const activeEntEl = document.getElementById('statActiveEntities');
        const dirEl = document.getElementById('statDirectors');
        const pendEl = document.getElementById('statPendingActions');
        const totEl = document.getElementById('statTotalRecords');

        const triggerPulse = (el, val) => {
            if (!el || val === undefined) return;
            const strVal = String(val);
            if (el.textContent.trim() !== strVal) {
                el.textContent = strVal;
                el.classList.remove('kpi-pulse-updated');
                void el.offsetWidth; // Force CSS reflow to retrigger animation
                el.classList.add('kpi-pulse-updated');
            }
        };

        triggerPulse(activeEntEl, stats.active_entities);
        triggerPulse(dirEl, stats.directors_officers);
        triggerPulse(pendEl, stats.pending_actions);
        triggerPulse(totEl, stats.governance_records);
    }

    function matchGovBadgeClass(status) {
        if (!status) return 'active';
        switch (status.toLowerCase().trim()) {
            case 'approved': return 'approved';
            case 'final': return 'final';
            case 'active':
            case 'in good standing':
            case 'completed': return 'active';
            case 'scheduled': return 'scheduled';
            case 'for review':
            case 'review':
            case 'in review':
            case 'pending': return 'review';
            default: return 'active';
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
            setTimeout(() => handleKpiCardClick(kpiParam), 80);
        }

        const modalMode = urlParams.get('modal');
        if (modalMode === 'new') {
            openNewGovernanceModal();
        } else if (modalMode === 'type') {
            const type = urlParams.get('type') || 'entity_profile';
            openNewGovernanceModal();
            selectGovernanceType(type);
        } else if (modalMode === 'view') {
            const firstRowView = document.querySelector('.records-table .view-button');
            if (firstRowView) firstRowView.click();
        }
    });
</script>
@endpush