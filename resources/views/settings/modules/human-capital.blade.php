@extends('layouts.client')

@section('title', 'Human Capital Settings')

@section('header-title', 'Human Capital')

@section('content')

<div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <div class="card-label" style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 4px;">
            MODULE SETTINGS
        </div>
        <h1 class="page-title" style="font-size: 26px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0;">
            Human Capital Settings
        </h1>
        <p class="page-description" style="font-size: 13.5px; color: #64748b; margin: 0; max-width: 760px; line-height: 1.5;">
            Configure organization structure, departments, positions, employment types, work arrangements, leave policies, document types, and approval lines for your client account.
        </p>
    </div>

    <div>
        <a href="{{ route('human-capital') }}" class="btn btn-secondary" style="background: #ffffff; border: 1px solid #cbd5e1; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; color: #334155; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
            &larr; Back to Human Capital
        </a>
    </div>
</div>

@if (session('status'))
    <div style="background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 14px 18px; border-radius: 8px; font-size: 13px; margin-bottom: 24px; font-weight: 600; display: flex; align-items: center; gap: 10px;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"></path></svg>
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('settings.modules.human-capital.update') }}">
    @csrf

    {{-- 1. MODULE STATUS & ORGANIZATION STRUCTURE --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            1. MODULE STATUS &amp; ORGANIZATION STRUCTURE
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap; margin-bottom: 18px;">
            <div>
                <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Human Capital Management Engine
                </h2>
                <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
                    Manages headcount, personnel profiles, attendance, leave schedules, and organizational HR documents.
                </p>
            </div>

            <div style="display: flex; align-items: center; gap: 12px;">
                <span style="padding: 6px 14px; border-radius: 999px; background: #dcfce7; color: #166534; font-size: 12px; font-weight: 700;">
                    Active &bull; Operational
                </span>
                <label style="display: inline-flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    <input type="checkbox" name="module_enabled" value="1" checked style="width: 18px; height: 18px; accent-color: #2563eb;">
                    Enabled
                </label>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; margin-top: 14px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                    Organization Name / Operating Entity
                </label>
                <input type="text" name="organization_name" value="{{ session('client.settings.human_capital.organization_name', 'ORDO Commercial Client Portal') }}"
                    style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; background: #ffffff;">
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                    Headquarters / Primary Base Location
                </label>
                <input type="text" name="headquarters_location" value="{{ session('client.settings.human_capital.headquarters_location', 'Makati City, Metro Manila, Philippines') }}"
                    style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; background: #ffffff;">
            </div>
        </div>
    </div>

    {{-- 2. DEPARTMENTS & UNITS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            2. DEPARTMENTS &amp; BUSINESS UNITS
        </div>
        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Configured Departments
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0 0 16px 0;">
            Define active organizational units for employee assignment and document routing.
        </p>

        <div>
            <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                Department List (Comma-separated)
            </label>
            <input type="text" name="departments" value="{{ session('client.settings.human_capital.departments', 'Executive & Operations, Legal & Compliance, Finance & Accounting, Technology & Systems, Human Resources, Logistics & Administration') }}"
                style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; background: #ffffff;">
            <p style="font-size: 11.5px; color: #94a3b8; margin: 4px 0 0 0;">
                These departments will populate dropdown selectors across employee profiles and HR records.
            </p>
        </div>
    </div>

    {{-- 3. POSITIONS & JOB LEVELS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            3. POSITIONS &amp; JOB LEVELS
        </div>
        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Standard Job Titles &amp; Hierarchy Levels
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0 0 16px 0;">
            Standardize job classifications and hierarchy tiers across your organization.
        </p>

        <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                    Standard Job Titles (Comma-separated)
                </label>
                <textarea name="positions" rows="3"
                    style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; background: #ffffff; font-family: inherit;">{{ session('client.settings.human_capital.positions', 'Head of Operations, Senior Corporate Counsel, Senior Accountant, Systems Infrastructure Engineer, HR Business Partner, Logistics Specialist, Executive Assistant, Finance Officer') }}</textarea>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                    Job Level Tiers (Comma-separated)
                </label>
                <textarea name="job_levels" rows="3"
                    style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; background: #ffffff; font-family: inherit;">{{ session('client.settings.human_capital.job_levels', 'C-Level / Executive, Director / Department Head, Manager / Senior Specialist, Professional / Associate, Entry Level / Assistant, External Consultant') }}</textarea>
            </div>
        </div>
    </div>

    {{-- 4. EMPLOYMENT TYPES & WORK ARRANGEMENTS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            4. EMPLOYMENT TYPES &amp; WORK ARRANGEMENTS
        </div>
        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Contracts &amp; Workplace Modes
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0 0 16px 0;">
            Manage accepted contract categories and operational working arrangements.
        </p>

        <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                    Allowed Employment Types
                </label>
                <input type="text" name="employment_types" value="{{ session('client.settings.human_capital.employment_types', 'Regular, Probationary, Contractual, Part-time, Consultant, Other') }}"
                    style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; background: #ffffff;">
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                    Allowed Work Arrangements
                </label>
                <input type="text" name="work_arrangements" value="{{ session('client.settings.human_capital.work_arrangements', 'On-site, Hybrid, Remote') }}"
                    style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; background: #ffffff;">
            </div>
        </div>
    </div>

    {{-- 5. ATTENDANCE & LEAVE CONFIGURATION --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            5. ATTENDANCE &amp; LEAVE CONFIGURATION
        </div>
        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Leave Entitlements &amp; Attendance Rules
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0 0 16px 0;">
            Set statutory leave allocations and default shift parameters.
        </p>

        <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; margin-bottom: 16px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                    Vacation Leave Days / Year
                </label>
                <input type="number" name="annual_vl_days" value="{{ session('client.settings.human_capital.annual_vl_days', 15) }}" min="0" max="60"
                    style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; background: #ffffff;">
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                    Sick Leave Days / Year
                </label>
                <input type="number" name="annual_sl_days" value="{{ session('client.settings.human_capital.annual_sl_days', 15) }}" min="0" max="60"
                    style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; background: #ffffff;">
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                    Standard Shift Hours
                </label>
                <input type="text" name="standard_shift" value="{{ session('client.settings.human_capital.standard_shift', '08:30 AM - 05:30 PM') }}"
                    style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; background: #ffffff;">
            </div>
        </div>

        <div>
            <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                Configured Leave Categories (Comma-separated)
            </label>
            <input type="text" name="leave_types" value="{{ session('client.settings.human_capital.leave_types', 'Vacation Leave, Sick Leave, Emergency Leave, Maternity Leave, Paternity Leave, Bereavement Leave, Special Leave') }}"
                style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; background: #ffffff;">
        </div>
    </div>

    {{-- 6. HR RECORD & DOCUMENT TYPES --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            6. HR RECORD &amp; DOCUMENT TYPES
        </div>
        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Authorized Document Classifications
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0 0 16px 0;">
            Control the document categories available when uploading HR records.
        </p>

        <div>
            <label style="display: block; font-size: 13px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                HR Document Types (Comma-separated)
            </label>
            <textarea name="hr_doc_types" rows="3"
                style="width: 100%; box-sizing: border-box; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13px; background: #ffffff; font-family: inherit;">{{ session('client.settings.human_capital.hr_doc_types', 'Employment Contract, Medical Clearance, NDA / IP Agreement, Performance Evaluation, Memo / Notice, Certificate of Employment, Statutory Benefit Filing, Disciplinary Notice, Resignation Letter') }}</textarea>
            <p style="font-size: 11.5px; color: #94a3b8; margin: 4px 0 0 0;">
                These options directly populate the "Record / Document Type" dropdown in the "+ New HR Record" workflow.
            </p>
        </div>
    </div>

    {{-- 7. APPROVAL & REPORTING LINES --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            7. APPROVAL &amp; REPORTING LINES
        </div>
        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Hierarchical Leave &amp; HR Approvals
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0 0 16px 0;">
            Define multi-tier approval policies for leave requests and personnel updates.
        </p>

        <div style="display: flex; flex-direction: column; gap: 14px;">
            <label style="display: flex; align-items: flex-start; gap: 12px; cursor: pointer;">
                <input type="checkbox" name="require_supervisor_approval" value="1" checked style="width: 18px; height: 18px; margin-top: 2px; accent-color: #2563eb;">
                <div>
                    <strong style="font-size: 13.5px; color: #0f172a;">Direct Supervisor Sign-off Required</strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 2px 0 0 0;">Leave requests must first be endorsed by the employee's assigned reporting manager.</p>
                </div>
            </label>

            <label style="display: flex; align-items: flex-start; gap: 12px; cursor: pointer;">
                <input type="checkbox" name="require_hr_confirmation" value="1" checked style="width: 18px; height: 18px; margin-top: 2px; accent-color: #2563eb;">
                <div>
                    <strong style="font-size: 13.5px; color: #0f172a;">HR Department Final Verification</strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 2px 0 0 0;">HR verifies remaining leave balance before updating dashboard metrics to Approved.</p>
                </div>
            </label>
        </div>
    </div>

    {{-- 8. MODULE PERMISSIONS & ACCESS CONTROL --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            8. MODULE PERMISSIONS &amp; ACCESS CONTROL
        </div>
        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Role-Based Visibility &amp; Confidentiality
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0 0 16px 0;">
            Ensure personal data, compensation files, and disciplinary records are strictly guarded under Data Privacy standards.
        </p>

        <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 14px;">
            <div style="padding: 14px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                <strong style="font-size: 13px; color: #0f172a; display: block; margin-bottom: 4px;">Account Admin &bull; Full Access</strong>
                <p style="font-size: 12px; color: #64748b; margin: 0;">Can create, edit, approve, and configure all Human Capital entries.</p>
            </div>
            <div style="padding: 14px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                <strong style="font-size: 13px; color: #0f172a; display: block; margin-bottom: 4px;">Standard Member &bull; Read &amp; Submit</strong>
                <p style="font-size: 12px; color: #64748b; margin: 0;">Can submit leave/attendance requests and view their assigned records.</p>
            </div>
        </div>
    </div>

    {{-- SAVE BAR --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); display: flex; justify-content: space-between; align-items: center;">
        <div>
            <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase;">
                HUMAN CAPITAL MODULE CONFIGURATION
            </div>
            <p style="margin: 4px 0 0; color: #64748b; font-size: 13px;">
                Save and apply changes to your client workspace.
            </p>
        </div>

        <button type="submit" class="btn btn-primary" style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 10px 24px; font-size: 14px; font-weight: 600; cursor: pointer; box-shadow: 0 1px 2px rgba(37,99,235,0.2);">
            Save Configuration
        </button>
    </div>
</form>

@endsection
