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

            <button type="button" class="primary-button" id="btnOpenComplianceModal" onclick="openNewComplianceModal()">
                <span class="button-plus">+</span>
                New Compliance Requirement
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

                <button type="button" class="soft-button" onclick="openNewComplianceModal()">
                    Quick action
                </button>

                <a href="{{ route('settings.modules.compliance') }}" class="outline-button" style="text-decoration: none;">

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

            <div class="stat-number" id="statCompliantCount">
                {{ $complianceStats['compliant'] ?? 12 }}
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

            <div class="stat-number" id="statDueSoonCount">
                {{ $complianceStats['due_soon'] ?? 2 }}
            </div>

            <div class="stat-title">
                Due soon
            </div>

            <div class="stat-description">
                Within 30 days
            </div>

        </div>


        {{-- THIS MONTH / SCHEDULED --}}
        <div class="stat-card">

            <div class="stat-icon">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <rect x="4" y="5" width="16" height="15" rx="2"></rect>
                    <path d="M8 3v4"></path>
                    <path d="M16 3v4"></path>
                    <path d="M4 9h16"></path>
                </svg>

            </div>

            <div class="stat-number" id="statScheduledCount">
                {{ $complianceStats['scheduled'] ?? 8 }}
            </div>

            <div class="stat-title">
                Scheduled
            </div>

            <div class="stat-description">
                Upcoming timeline
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

            <div class="stat-number" id="statTotalCount">
                {{ $complianceStats['total'] ?? 31 }}
            </div>

            <div class="stat-title">
                Filings
            </div>

            <div class="stat-description">
                Total tracked
            </div>

        </div>

    </div>


    {{-- =========================================================
        MAIN WORKSPACE
    ========================================================== --}}
    <section class="workspace-card">

        {{-- TABS --}}
        <div class="workspace-tabs">

            <button type="button" class="workspace-tab active" onclick="filterAgencyTab(this, 'all')">
                Overview
            </button>

            <button type="button" class="workspace-tab" onclick="filterAgencyTab(this, 'calendar')">
                Calendar
            </button>

            <button type="button" class="workspace-tab" onclick="filterAgencyTab(this, 'bir')">
                BIR
            </button>

            <button type="button" class="workspace-tab" onclick="filterAgencyTab(this, 'sec')">
                SEC
            </button>

            <button type="button" class="workspace-tab" onclick="filterAgencyTab(this, 'lgu')">
                LGU
            </button>

            <button type="button" class="workspace-tab" onclick="filterAgencyTab(this, 'other')">
                Other Agencies
            </button>

            <button type="button" class="workspace-tab" onclick="filterAgencyTab(this, 'records')">
                Records
            </button>

        </div>


        {{-- WORKSPACE CONTENT --}}
        <div class="workspace-content">

            <div class="content-header">

                <div>

                    <h2>
                        Compliance Requirements &amp; Records
                    </h2>

                    <p>
                        Active regulatory obligations and compliance ledger for <strong style="color: #1e293b;">{{ session('client.account.name', $account?->profile?->legal_name ?? 'your ORDO account') }}</strong>.
                    </p>

                </div>

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
                                Due Date
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="action-column">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody id="complianceRecordsTableBody">

                        @forelse($complianceRecords ?? [] as $record)
                            @php
                                $recObj = is_array($record) ? (object) $record : $record;
                                $recId = $recObj->id ?? ('rec_' . $loop->index);
                                $ref = $recObj->reference_no ?? 'CMP-00000';
                                $title = $recObj->title ?? 'Untitled';
                                $agency = $recObj->agency ?? 'Other';
                                $category = $recObj->category ?? 'General';
                                $dueDateFormatted = $recObj->formatted_due_date ?? (isset($recObj->due_date) ? \Carbon\Carbon::parse($recObj->due_date)->format('M d, Y') : '—');
                                $status = $recObj->status ?? 'Scheduled';
                                $badgeClass = $recObj->status_badge_class ?? (match(strtolower(trim($status))) {
                                    'due soon', 'due' => 'due',
                                    'scheduled' => 'scheduled',
                                    'monitoring' => 'monitoring',
                                    'compliant' => 'compliant',
                                    default => 'scheduled',
                                });
                            @endphp
                            <tr id="complianceRow_{{ $recId }}" data-record-id="{{ $recId }}" data-reference="{{ $ref }}" data-agency="{{ strtolower($agency) }}" data-status="{{ strtolower($status) }}">

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
                                            {{ $agency }} &bull; {{ $category }}
                                        </span>
                                    </div>
                                </td>

                                <td>
                                    <span class="record-date">
                                        {{ $dueDateFormatted }}
                                    </span>
                                </td>

                                <td>
                                    <span class="status {{ $badgeClass }}">
                                        <span></span>
                                        {{ $status }}
                                    </span>
                                </td>

                                <td class="action-column">
                                    <button type="button" class="view-button" id="btnView_{{ $recId }}" onclick="viewComplianceDetail(@js($recObj))">
                                        View
                                    </button>
                                </td>

                            </tr>
                        @empty
                            <tr id="emptyComplianceRow">
                                <td colspan="5" style="text-align: center; padding: 36px 20px; color: #94a3b8;">
                                    No compliance records recorded yet. Click <strong>+ New Compliance Requirement</strong> above to create your first entry.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>


{{-- =========================================================
    NEW COMPLIANCE ENTRY MODAL
========================================================== --}}
<div id="complianceModal" class="modal-backdrop" style="display: none;" onclick="if(event.target===this)closeComplianceModal()">
    <div class="modal" style="width: min(720px, 100%);">

        <div class="modal-head">
            <div>
                <h3 id="complianceModalTitle" style="margin: 0; font-size: 16px; font-weight: 700; color: var(--ink);">New Compliance Requirement</h3>
                <p id="complianceModalSubtitle" style="margin: 3px 0 0; font-size: 11.5px; color: #64748b;">
                    Record a statutory obligation or deadline for <strong>{{ session('client.account.name', $account?->profile?->legal_name ?? 'your current ORDO account') }}</strong>.
                </p>
            </div>
            <button type="button" class="iconbtn" onclick="closeComplianceModal()">&times;</button>
        </div>

        <form id="complianceEntryForm" method="POST" action="{{ route('compliance.store') }}" enctype="multipart/form-data" onsubmit="submitComplianceForm(event)">
            @csrf
            <input type="hidden" id="cmp_record_id" name="id" value="">
            <input type="hidden" id="cmp_method_override" name="_method" value="">

            <div class="modal-body" style="padding: 22px; max-height: calc(88vh - 130px); overflow-y: auto;">

                {{-- Error Alert Box --}}
                <div id="complianceFormErrors" style="display: none; margin-bottom: 16px; padding: 12px 14px; border-radius: 10px; background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; font-size: 12.5px;">
                </div>

                <div class="form-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px;">

                    {{-- 1. Title / Requirement Name * (Full Width) --}}
                    <div class="full" style="grid-column: 1 / -1;">
                        <label class="label" for="cmp_title">Title / Requirement Name <span style="color: #ef4444;">*</span></label>
                        <input type="text" id="cmp_title" name="title" class="input" placeholder="e.g. Annual General Information Sheet (GIS) Filing" required autocomplete="off">
                    </div>

                    {{-- 2. Agency / Authority * --}}
                    <div>
                        <label class="label" for="cmp_agency">Agency / Authority <span style="color: #ef4444;">*</span></label>
                        <select id="cmp_agency" name="agency" class="select" required>
                            <option value="" disabled selected>Select Authority</option>
                            <option value="BIR">BIR – Bureau of Internal Revenue</option>
                            <option value="SEC">SEC – Securities and Exchange Commission</option>
                            <option value="LGU">LGU – Local Government Unit</option>
                            <option value="SSS">SSS – Social Security System</option>
                            <option value="PhilHealth">PhilHealth</option>
                            <option value="Pag-IBIG">Pag-IBIG Fund (HDMF)</option>
                            <option value="DOLE">DOLE – Department of Labor</option>
                            <option value="Other">Other Authority</option>
                        </select>
                    </div>

                    {{-- 3. Category / Type * --}}
                    <div>
                        <label class="label" for="cmp_category">Category / Type <span style="color: #ef4444;">*</span></label>
                        <select id="cmp_category" name="category" class="select" required>
                            <option value="" disabled selected>Select Category</option>
                            <option value="Tax Filing">Tax Filing</option>
                            <option value="Corporate Filing">Corporate Filing</option>
                            <option value="Business Permit">Business Permit</option>
                            <option value="Statutory Report">Statutory Report</option>
                            <option value="Labor Standard">Labor Standard</option>
                            <option value="License Renewal">License Renewal</option>
                            <option value="Governance">Governance</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    {{-- 4. Frequency / Recurrence --}}
                    <div>
                        <label class="label" for="cmp_frequency">Frequency / Recurrence</label>
                        <select id="cmp_frequency" name="frequency" class="select">
                            <option value="Monthly">Monthly</option>
                            <option value="Quarterly">Quarterly</option>
                            <option value="Semi-Annually">Semi-Annually</option>
                            <option value="Annually" selected>Annually</option>
                            <option value="Biennial">Biennial (Every 2 Years)</option>
                            <option value="As Needed">As Needed / One-Time</option>
                        </select>
                    </div>

                    {{-- 5. Status * --}}
                    <div>
                        <label class="label" for="cmp_status">Status <span style="color: #ef4444;">*</span></label>
                        <select id="cmp_status" name="status" class="select" required>
                            <option value="Due Soon">Due Soon</option>
                            <option value="Scheduled" selected>Scheduled</option>
                            <option value="Monitoring">Monitoring</option>
                            <option value="Compliant">Compliant</option>
                        </select>
                    </div>

                    {{-- 6. Effective Date --}}
                    <div>
                        <label class="label" for="cmp_effective_date">Effective Date</label>
                        <input type="date" id="cmp_effective_date" name="effective_date" class="input">
                    </div>

                    {{-- 7. Due Date * --}}
                    <div>
                        <label class="label" for="cmp_due_date">Due Date <span style="color: #ef4444;">*</span></label>
                        <input type="date" id="cmp_due_date" name="due_date" class="input" required>
                    </div>

                    {{-- 8. Responsible Person / Owner (Full Width) --}}
                    <div class="full" style="grid-column: 1 / -1;">
                        <label class="label" for="cmp_responsible">Responsible Person / Owner</label>
                        <input type="text" id="cmp_responsible" name="responsible_person" class="input" placeholder="e.g. Atty. Carmela Santos, CPA or In-House Compliance Officer">
                    </div>

                    {{-- 9. Description / Notes (Renamed from Custody & Summary Notes) --}}
                    <div class="full" style="grid-column: 1 / -1;">
                        <label class="label" for="cmp_description">Description / Notes</label>
                        <textarea id="cmp_description" name="description" class="textarea" rows="3" placeholder="Provide notes, specific filing instructions, or statutory reference details..."></textarea>
                    </div>

                    {{-- 10. Supporting Document / Attachment --}}
                    <div class="full" style="grid-column: 1 / -1;">
                        <label class="label">Supporting Document / Attachment</label>
                        <div style="border: 1px dashed #cbd5e1; border-radius: 10px; padding: 14px 16px; background: #f8fafc; display: flex; align-items: center; justify-content: space-between; gap: 12px;">
                            <div style="display: flex; align-items: center; gap: 10px; overflow: hidden;">
                                <svg style="width: 22px; height: 22px; color: #2563eb; flex-shrink: 0;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                                </svg>
                                <div style="min-width: 0;">
                                    <span id="cmpAttachmentFileName" style="font-size: 12px; font-weight: 600; color: #334155; display: block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">No file attached</span>
                                    <span style="font-size: 10px; color: #94a3b8;">PDF, DOCX, XLSX, JPG, or PNG (up to 10MB)</span>
                                </div>
                            </div>
                            <div style="flex-shrink: 0;">
                                <label for="cmp_attachment" class="btn ghost sm" style="cursor: pointer; margin: 0;">
                                    Browse
                                </label>
                                <input type="file" id="cmp_attachment" name="attachment" style="display: none;" onchange="handleCmpFileChange(this)">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="modal-foot">
                <button type="button" onclick="closeComplianceModal()" class="btn ghost sm">Cancel</button>
                <button type="submit" id="btnSaveCompliance" class="btn primary sm">
                    <span id="btnSaveComplianceLabel">Save Entry</span>
                </button>
            </div>

        </form>

    </div>
</div>


{{-- =========================================================
    VIEW COMPLIANCE DETAIL MODAL
========================================================== --}}
<div id="complianceDetailModal" class="modal-backdrop" style="display: none;" onclick="if(event.target===this)closeComplianceDetailModal()">
    <div class="modal" style="width: min(650px, 100%);">
        <div class="modal-head">
            <div>
                <span id="detailReferenceNo" style="font-size: 11px; font-weight: 700; color: #2563eb; text-transform: uppercase; letter-spacing: .04em;">CMP-00000</span>
                <h3 id="detailTitle" style="margin: 2px 0 0; font-size: 16px; font-weight: 700; color: var(--ink);">Requirement Detail</h3>
            </div>
            <button type="button" class="iconbtn" onclick="closeComplianceDetailModal()">&times;</button>
        </div>
        <div class="modal-body" style="padding: 22px;">
            <div style="display: flex; gap: 8px; margin-bottom: 18px; align-items: center; flex-wrap: wrap;">
                <span id="detailStatusBadge" class="status scheduled">
                    <span></span>
                    <span id="detailStatusText">Scheduled</span>
                </span>
                <span id="detailAgencyBadge" style="padding: 5px 10px; border-radius: 20px; background: #eff6ff; color: #2563eb; font-size: 10.5px; font-weight: 700;">
                    Agency
                </span>
                <span id="detailCategoryBadge" style="padding: 5px 10px; border-radius: 20px; background: #f8fafc; border: 1px solid #e2e8f0; color: #475569; font-size: 10.5px; font-weight: 700;">
                    Category
                </span>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; padding: 14px; background: #f8fafc; border: 1px solid #eef2f6; border-radius: 10px; margin-bottom: 16px;">
                <div>
                    <span style="font-size: 11px; color: #64748b; display: block; font-weight: 600;">Due Date</span>
                    <strong id="detailDueDate" style="font-size: 13px; color: #0f172a;">—</strong>
                </div>
                <div>
                    <span style="font-size: 11px; color: #64748b; display: block; font-weight: 600;">Effective Date</span>
                    <strong id="detailEffectiveDate" style="font-size: 13px; color: #0f172a;">—</strong>
                </div>
                <div>
                    <span style="font-size: 11px; color: #64748b; display: block; font-weight: 600;">Frequency / Recurrence</span>
                    <strong id="detailFrequency" style="font-size: 13px; color: #0f172a;">Annually</strong>
                </div>
                <div>
                    <span style="font-size: 11px; color: #64748b; display: block; font-weight: 600;">Responsible Person / Owner</span>
                    <strong id="detailResponsible" style="font-size: 13px; color: #0f172a;">Unassigned</strong>
                </div>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="font-size: 12px; font-weight: 700; color: #334155; display: block; margin-bottom: 6px;">Description / Notes</label>
                <div id="detailDescription" style="padding: 12px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 12.5px; line-height: 1.55; color: #475569; min-height: 48px;">
                    No notes provided.
                </div>
            </div>

            <div id="detailAttachmentContainer" style="display: none;">
                <label style="font-size: 12px; font-weight: 700; color: #334155; display: block; margin-bottom: 6px;">Supporting Document / Attachment</label>
                <div style="display: flex; align-items: center; gap: 8px; padding: 10px 12px; border-radius: 8px; background: #eff6ff; border: 1px solid #dbeafe;">
                    <svg style="width: 18px; height: 18px; color: #2563eb;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                    </svg>
                    <span id="detailAttachmentName" style="font-size: 12px; font-weight: 600; color: #1e40af;">document.pdf</span>
                </div>
            </div>
        </div>
        <div class="modal-foot" style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
            <button type="button" onclick="closeComplianceDetailModal()" class="btn ghost sm">Close</button>
            <button type="button" id="btnEditFromDetail" class="btn primary sm" onclick="editComplianceRecordFromDetail()" style="display: inline-flex; align-items: center; gap: 6px;">
                <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
                Edit
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    window.currentComplianceDetailRecord = null;

    function openNewComplianceModal() {
        const modal = document.getElementById('complianceModal');
        const form = document.getElementById('complianceEntryForm');
        const errEl = document.getElementById('complianceFormErrors');
        if (errEl) {
            errEl.style.display = 'none';
            errEl.innerHTML = '';
        }

        form.reset();
        document.getElementById('cmp_record_id').value = '';
        document.getElementById('cmp_method_override').value = '';

        const modalTitle = document.getElementById('complianceModalTitle');
        if (modalTitle) modalTitle.textContent = 'New Compliance Requirement';

        const modalSubtitle = document.getElementById('complianceModalSubtitle');
        if (modalSubtitle) {
            modalSubtitle.innerHTML = 'Record a statutory obligation or deadline for <strong>{{ session('client.account.name', $account?->profile?->legal_name ?? 'your current ORDO account') }}</strong>.';
        }

        const btnLabel = document.getElementById('btnSaveComplianceLabel');
        if (btnLabel) btnLabel.textContent = 'Save Entry';

        const fileLabel = document.getElementById('cmpAttachmentFileName');
        if (fileLabel) {
            fileLabel.textContent = 'No file attached';
            fileLabel.style.color = '#334155';
        }

        if (modal) modal.style.display = 'grid';
        const titleInput = document.getElementById('cmp_title');
        if (titleInput) {
            setTimeout(() => titleInput.focus(), 80);
        }
    }

    function openEditComplianceModal(rec) {
        if (!rec) return;

        const modal = document.getElementById('complianceModal');
        const form = document.getElementById('complianceEntryForm');
        const errEl = document.getElementById('complianceFormErrors');
        if (errEl) {
            errEl.style.display = 'none';
            errEl.innerHTML = '';
        }

        form.reset();
        document.getElementById('cmp_record_id').value = rec.id || '';
        document.getElementById('cmp_method_override').value = 'PUT';

        const modalTitle = document.getElementById('complianceModalTitle');
        if (modalTitle) modalTitle.textContent = 'Edit Compliance Requirement';

        const modalSubtitle = document.getElementById('complianceModalSubtitle');
        if (modalSubtitle) {
            modalSubtitle.innerHTML = 'Update details and status for <strong>' + escapeHtml(rec.reference_no || 'Requirement') + '</strong>.';
        }

        const btnLabel = document.getElementById('btnSaveComplianceLabel');
        if (btnLabel) btnLabel.textContent = 'Save Changes';

        // Prepopulate form inputs
        document.getElementById('cmp_title').value = rec.title || '';
        document.getElementById('cmp_agency').value = rec.agency || '';
        document.getElementById('cmp_category').value = rec.category || '';
        document.getElementById('cmp_frequency').value = rec.frequency || 'Annually';
        document.getElementById('cmp_status').value = rec.status || 'Scheduled';
        document.getElementById('cmp_effective_date').value = rec.effective_date ? String(rec.effective_date).substring(0, 10) : '';
        document.getElementById('cmp_due_date').value = rec.due_date ? String(rec.due_date).substring(0, 10) : '';
        document.getElementById('cmp_responsible').value = rec.responsible_person || '';
        document.getElementById('cmp_description').value = rec.description || '';

        const fileLabel = document.getElementById('cmpAttachmentFileName');
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
        const titleInput = document.getElementById('cmp_title');
        if (titleInput) {
            setTimeout(() => titleInput.focus(), 80);
        }
    }

    function editComplianceRecordFromDetail() {
        closeComplianceDetailModal();
        if (window.currentComplianceDetailRecord) {
            openEditComplianceModal(window.currentComplianceDetailRecord);
        }
    }

    function closeComplianceModal() {
        const modal = document.getElementById('complianceModal');
        if (modal) modal.style.display = 'none';
    }

    function handleCmpFileChange(input) {
        const label = document.getElementById('cmpAttachmentFileName');
        if (input.files && input.files.length > 0) {
            label.textContent = input.files[0].name;
            label.style.color = '#2563eb';
        } else {
            label.textContent = 'No file attached';
            label.style.color = '#334155';
        }
    }

    function submitComplianceForm(e) {
        e.preventDefault();

        const form = document.getElementById('complianceEntryForm');
        const btn = document.getElementById('btnSaveCompliance');
        const btnLabel = document.getElementById('btnSaveComplianceLabel');
        const errEl = document.getElementById('complianceFormErrors');

        errEl.style.display = 'none';
        errEl.innerHTML = '';

        // Client-side validation for required fields
        const title = document.getElementById('cmp_title').value.trim();
        const agency = document.getElementById('cmp_agency').value;
        const category = document.getElementById('cmp_category').value;
        const dueDate = document.getElementById('cmp_due_date').value;
        const status = document.getElementById('cmp_status').value;

        if (!title || !agency || !category || !dueDate || !status) {
            errEl.innerHTML = '<strong>Missing Information:</strong> Please fill in all required fields marked with an asterisk (*).';
            errEl.style.display = 'block';
            return;
        }

        const recordId = document.getElementById('cmp_record_id').value;
        const isEdit = Boolean(recordId);

        btn.disabled = true;
        if (btnLabel) btnLabel.textContent = isEdit ? 'Updating...' : 'Saving...';

        const formData = new FormData(form);
        const targetUrl = isEdit ? ('/compliance/' + encodeURIComponent(recordId)) : form.action;

        if (isEdit) {
            formData.set('_method', 'PUT');
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
                let msg = data.message || 'Validation error occurred while saving the compliance entry.';
                if (data.errors) {
                    const firstKey = Object.keys(data.errors)[0];
                    msg = data.errors[firstKey][0];
                }
                throw new Error(msg);
            }
            return data;
        })
        .then(data => {
            closeComplianceModal();

            if (isEdit) {
                if (data.record) {
                    updateRecordInTable(data.record);
                    window.currentComplianceDetailRecord = data.record;
                }
            } else {
                form.reset();
                const fileLabel = document.getElementById('cmpAttachmentFileName');
                if (fileLabel) {
                    fileLabel.textContent = 'No file attached';
                    fileLabel.style.color = '#334155';
                }
                if (data.record) {
                    insertRecordIntoTable(data.record);
                }
            }

            // Update stats cards if provided
            if (data.stats) {
                updateComplianceStats(data.stats);
            }

            // Trigger success toast
            if (typeof toast === 'function') {
                toast(data.message || (isEdit ? 'Compliance requirement successfully updated.' : 'Compliance requirement successfully saved to your ORDO ledger.'));
            }
        })
        .catch(err => {
            errEl.innerHTML = `<strong>Error:</strong> ${err.message}`;
            errEl.style.display = 'block';
        })
        .finally(() => {
            btn.disabled = false;
            if (btnLabel) btnLabel.textContent = isEdit ? 'Save Changes' : 'Save Entry';
        });
    }

    function updateRecordInTable(rec) {
        let row = document.getElementById('complianceRow_' + rec.id)
            || document.querySelector(`tr[data-record-id="${rec.id}"]`)
            || document.querySelector(`tr[data-reference="${rec.reference_no}"]`);

        if (!row) {
            insertRecordIntoTable(rec);
            return;
        }

        const badgeClass = rec.status_badge_class || matchStatusBadgeClass(rec.status);
        const formattedDueDate = rec.formatted_due_date || rec.due_date;

        row.setAttribute('data-agency', (rec.agency || '').toLowerCase());
        row.setAttribute('data-status', (rec.status || '').toLowerCase());
        row.setAttribute('data-record-id', rec.id);
        row.setAttribute('data-reference', rec.reference_no);

        row.innerHTML = `
            <td>
                <span class="reference">${escapeHtml(rec.reference_no)}</span>
            </td>
            <td>
                <div class="record-item">
                    <strong>${escapeHtml(rec.title)}</strong>
                    <span>${escapeHtml(rec.agency)} &bull; ${escapeHtml(rec.category)}</span>
                </div>
            </td>
            <td>
                <span class="record-date">${escapeHtml(formattedDueDate)}</span>
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
            viewBtn.addEventListener('click', () => viewComplianceDetail(rec));
        }

        row.style.backgroundColor = '#ecfdf5';
        row.style.transition = 'background-color 1.5s ease';
        setTimeout(() => {
            row.style.backgroundColor = '';
        }, 1500);
    }

    function insertRecordIntoTable(rec) {
        const tbody = document.getElementById('complianceRecordsTableBody');
        const emptyRow = document.getElementById('emptyComplianceRow');
        if (emptyRow) {
            emptyRow.style.display = 'none';
        }

        const badgeClass = rec.status_badge_class || matchStatusBadgeClass(rec.status);
        const formattedDueDate = rec.formatted_due_date || rec.due_date;

        const tr = document.createElement('tr');
        tr.id = 'complianceRow_' + rec.id;
        tr.setAttribute('data-record-id', rec.id);
        tr.setAttribute('data-reference', rec.reference_no);
        tr.setAttribute('data-agency', (rec.agency || '').toLowerCase());
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
                    <span>${escapeHtml(rec.agency)} &bull; ${escapeHtml(rec.category)}</span>
                </div>
            </td>
            <td>
                <span class="record-date">${escapeHtml(formattedDueDate)}</span>
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

        // Prepend new row to table
        tbody.insertBefore(tr, tbody.firstChild);

        // Bind View button
        const viewBtn = tr.querySelector(`#btnView_${rec.id}`);
        if (viewBtn) {
            viewBtn.addEventListener('click', () => viewComplianceDetail(rec));
        }

        // Fade background out after a brief moment
        setTimeout(() => {
            tr.style.backgroundColor = '';
        }, 1500);
    }

    function updateComplianceStats(stats) {
        const dueSoonEl = document.getElementById('statDueSoonCount');
        const scheduledEl = document.getElementById('statScheduledCount');
        const totalEl = document.getElementById('statTotalCount');
        const compliantEl = document.getElementById('statCompliantCount');

        if (dueSoonEl && stats.due_soon !== undefined) dueSoonEl.textContent = stats.due_soon;
        if (scheduledEl && stats.scheduled !== undefined) scheduledEl.textContent = stats.scheduled;
        if (totalEl && stats.total !== undefined) totalEl.textContent = stats.total;
        if (compliantEl && stats.compliant !== undefined) compliantEl.textContent = stats.compliant;
    }

    function viewComplianceDetail(rec) {
        window.currentComplianceDetailRecord = rec;

        const modal = document.getElementById('complianceDetailModal');
        if (!modal) return;

        document.getElementById('detailReferenceNo').textContent = rec.reference_no || 'CMP-RECORD';
        document.getElementById('detailTitle').textContent = rec.title || 'Untitled Requirement';

        const statusBadge = document.getElementById('detailStatusBadge');
        const statusText = document.getElementById('detailStatusText');
        const badgeClass = rec.status_badge_class || (matchStatusBadgeClass(rec.status));
        statusBadge.className = `status ${badgeClass}`;
        statusText.textContent = rec.status || 'Scheduled';

        document.getElementById('detailAgencyBadge').textContent = rec.agency || 'Regulatory Authority';
        document.getElementById('detailCategoryBadge').textContent = rec.category || 'General';

        document.getElementById('detailDueDate').textContent = rec.formatted_due_date || rec.due_date || '—';
        document.getElementById('detailEffectiveDate').textContent = rec.formatted_effective_date || rec.effective_date || '—';
        document.getElementById('detailFrequency').textContent = rec.frequency || 'As Needed';
        document.getElementById('detailResponsible').textContent = rec.responsible_person || 'Unassigned';

        const descEl = document.getElementById('detailDescription');
        descEl.textContent = rec.description || 'No additional description or notes recorded for this item.';

        const attachContainer = document.getElementById('detailAttachmentContainer');
        const attachName = document.getElementById('detailAttachmentName');
        if (rec.attachment_name) {
            attachName.textContent = rec.attachment_name;
            attachContainer.style.display = 'block';
        } else {
            attachContainer.style.display = 'none';
        }

        modal.style.display = 'grid';
    }

    function closeComplianceDetailModal() {
        const modal = document.getElementById('complianceDetailModal');
        if (modal) modal.style.display = 'none';
    }

    function matchStatusBadgeClass(status) {
        if (!status) return 'scheduled';
        switch (status.toLowerCase().trim()) {
            case 'due soon':
            case 'due':
                return 'due';
            case 'scheduled':
                return 'scheduled';
            case 'monitoring':
                return 'monitoring';
            case 'compliant':
            case 'completed':
                return 'compliant';
            default:
                return 'scheduled';
        }
    }

    function filterAgencyTab(tabBtn, agencyKey) {
        document.querySelectorAll('.workspace-tabs .workspace-tab').forEach(t => t.classList.remove('active'));
        tabBtn.classList.add('active');

        const rows = document.querySelectorAll('#complianceRecordsTableBody tr:not(#emptyComplianceRow)');
        rows.forEach(row => {
            const rowAgency = (row.getAttribute('data-agency') || '').toLowerCase();
            if (agencyKey === 'all' || agencyKey === 'records' || agencyKey === 'calendar') {
                row.style.display = '';
            } else if (agencyKey === 'bir') {
                row.style.display = rowAgency.includes('bir') ? '' : 'none';
            } else if (agencyKey === 'sec') {
                row.style.display = rowAgency.includes('sec') ? '' : 'none';
            } else if (agencyKey === 'lgu') {
                row.style.display = rowAgency.includes('lgu') ? '' : 'none';
            } else if (agencyKey === 'other') {
                row.style.display = (!rowAgency.includes('bir') && !rowAgency.includes('sec') && !rowAgency.includes('lgu')) ? '' : 'none';
            }
        });
    }

    function escapeHtml(str) {
        if (!str) return '';
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }
</script>
@endpush