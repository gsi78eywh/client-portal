@extends('layouts.client')

@section('title', 'Transmittals Settings')

@section('header-title', 'Transmittals')

@section('content')

<div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <div class="card-label" style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 4px;">
            MODULE SETTINGS
        </div>
        <h1 class="page-title" style="font-size: 26px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0;">
            Transmittals Settings
        </h1>
        <p class="page-description" style="font-size: 13.5px; color: #64748b; margin: 0; max-width: 760px; line-height: 1.5;">
            Configure transmittal creation, tracking, routing, approvals, and delivery settings for your client account.
        </p>
    </div>

    <div>
        <a href="{{ route('transmittals') }}" class="btn btn-secondary" style="background: #ffffff; border: 1px solid #cbd5e1; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; color: #334155; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
            &larr; Back to Transmittals
        </a>
    </div>
</div>

@if (session('status'))
    <div style="background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 14px 18px; border-radius: 8px; font-size: 13px; margin-bottom: 24px; font-weight: 600; display: flex; align-items: center; gap: 10px;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"></path></svg>
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('settings.modules.transmittals.update') }}">
    @csrf

    {{-- 1. MODULE STATUS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            1. MODULE STATUS
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap;">
            <div>
                <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Transmittal Tracking &amp; Delivery Engine
                </h2>
                <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
                    Controls incoming and outgoing document transmissions, routing, recipients, and delivery history.
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
    </div>

    {{-- 2. TRANSMITTAL NUMBERING --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            2. TRANSMITTAL NUMBERING
        </div>

        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Numbering Configuration
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
            Configure sequential reference identifiers for newly dispatched and received transmittals.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Numbering Format
                </label>
                <select name="numbering_format" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="TR-YYYY-XXXX" selected>TR-YYYY-XXXX (e.g. TR-2026-0064)</option>
                    <option value="TR-XXXX">TR-XXXX (e.g. TR-0064)</option>
                    <option value="TRAN-YYYY-XXXX">TRAN-YYYY-XXXX (e.g. TRAN-2026-0064)</option>
                </select>
                <span style="font-size: 11px; color: #64748b; margin-top: 4px; display: block;">Next generated ID: TR-2026-0064</span>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Prefix Token
                </label>
                <input type="text" name="prefix_token" value="{{ session('client.settings.transmittals.prefix_token', 'TR') }}" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Starting Sequence
                </label>
                <input type="number" name="starting_number" value="{{ session('client.settings.transmittals.starting_number', '64') }}" min="1" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
            </div>
        </div>
    </div>

    {{-- 3. INCOMING / OUTGOING TYPES --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            3. INCOMING / OUTGOING TYPES
        </div>

        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Transmission Categories
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
            Manage dispatch classification workflows for incoming vs. outgoing transmittals.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px;">
            <div style="padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <strong style="font-size: 14px; color: #0f172a; display: block; margin-bottom: 4px;">
                    Incoming Transmittals
                </strong>
                <p style="margin: 0 0 12px; font-size: 12.5px; color: #64748b;">
                    Documents sent to your organization from government agencies, suppliers, clients, or banks.
                </p>
                <label style="display: inline-flex; align-items: center; gap: 8px; font-size: 12.5px; font-weight: 600; color: #334155; cursor: pointer;">
                    <input type="checkbox" name="types[incoming_auto_receipt]" value="1" checked style="accent-color: #2563eb;">
                    Auto-mark as Received upon logging
                </label>
            </div>

            <div style="padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <strong style="font-size: 14px; color: #0f172a; display: block; margin-bottom: 4px;">
                    Outgoing Transmittals
                </strong>
                <p style="margin: 0 0 12px; font-size: 12.5px; color: #64748b;">
                    Dispatches from your company to external recipients requiring proof of delivery.
                </p>
                <label style="display: inline-flex; align-items: center; gap: 8px; font-size: 12.5px; font-weight: 600; color: #334155; cursor: pointer;">
                    <input type="checkbox" name="types[outgoing_require_tracking]" value="1" checked style="accent-color: #2563eb;">
                    Require tracking / dispatch receipt reference
                </label>
            </div>
        </div>
    </div>

    {{-- 4. DELIVERY / RECEIPT METHODS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            4. DELIVERY / RECEIPT METHODS
        </div>

        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Supported Transmission Channels
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
            Enable or configure the delivery methods available in the creation modal.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px;">
            <label style="display: flex; align-items: center; gap: 8px; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer; background: #f8fafc;">
                <input type="checkbox" name="methods[electronic]" value="1" checked style="accent-color: #2563eb;">
                <span style="font-size: 13px; font-weight: 600; color: #1e293b;">Electronic / Portal</span>
            </label>

            <label style="display: flex; align-items: center; gap: 8px; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer; background: #f8fafc;">
                <input type="checkbox" name="methods[email]" value="1" checked style="accent-color: #2563eb;">
                <span style="font-size: 13px; font-weight: 600; color: #1e293b;">Email Dispatch</span>
            </label>

            <label style="display: flex; align-items: center; gap: 8px; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer; background: #f8fafc;">
                <input type="checkbox" name="methods[courier]" value="1" checked style="accent-color: #2563eb;">
                <span style="font-size: 13px; font-weight: 600; color: #1e293b;">Physical Courier</span>
            </label>

            <label style="display: flex; align-items: center; gap: 8px; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer; background: #f8fafc;">
                <input type="checkbox" name="methods[hand_delivery]" value="1" checked style="accent-color: #2563eb;">
                <span style="font-size: 13px; font-weight: 600; color: #1e293b;">Hand Delivery / Messenger</span>
            </label>
        </div>
    </div>

    {{-- 5. APPROVAL WORKFLOW --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            5. APPROVAL WORKFLOW
        </div>

        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Pre-Dispatch Authorizations
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
            Specify whether outgoing documents require internal management review before release.
        </p>

        <div style="margin-top: 20px; display: flex; flex-direction: column; gap: 14px;">
            <label style="display: flex; align-items: flex-start; gap: 10px; padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer; background: #f8fafc;">
                <input type="checkbox" name="approval[require_signoff]" value="1" checked style="margin-top: 2px; accent-color: #2563eb;">
                <div>
                    <strong style="font-size: 13px; color: #1e293b;">Require Officer Sign-Off for Outgoing Legal &amp; Statutory Documents</strong>
                    <p style="margin: 3px 0 0; font-size: 12px; color: #64748b;">Ensures transmittals bearing board resolutions, tax returns, and corporate filings are cleared prior to delivery.</p>
                </div>
            </label>
        </div>
    </div>

    {{-- 6. ACKNOWLEDGMENT / PROOF-OF-RECEIPT SETTINGS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            6. ACKNOWLEDGMENT &amp; PROOF-OF-RECEIPT
        </div>

        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Receipt Verification Rules
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
            Mandate signed receiving copies, stamps, or digital acknowledgments.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Mandatory Proof of Receipt File
                </label>
                <select name="receipt[proof_mandate]" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="recommended" selected>Recommended (Scan or airway bill optional)</option>
                    <option value="mandatory">Strictly Mandatory for all Outgoing</option>
                    <option value="disabled">Disabled</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Acknowledgment Tracking
                </label>
                <select name="receipt[tracking_mode]" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="officer_name" selected>Recipient Name &amp; Date Required</option>
                    <option value="digital_signature">Digital Sign-off Stamping</option>
                </select>
            </div>
        </div>
    </div>

    {{-- 7. ATTACHMENT RULES & DEFAULT STATUSES --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            7. ATTACHMENT RULES &amp; DEFAULT STATUSES
        </div>

        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Upload Constraints &amp; Lifecycle Presets
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
            Configure allowed attachment sizes, accepted formats, and default statuses.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Max Attachment Size
                </label>
                <select name="max_attachment_mb" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="15" selected>15 MB per transmittal</option>
                    <option value="25">25 MB per transmittal</option>
                    <option value="50">50 MB per transmittal</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Default Initial Status
                </label>
                <select name="default_status" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="Pending Receipt" selected>Pending Receipt (Default)</option>
                    <option value="Draft">Draft</option>
                    <option value="Sent">Sent / Delivered</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    File Linkage to Records
                </label>
                <select name="link_to_records" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="1" selected>Auto-catalog attachments in Records Vault</option>
                    <option value="0">Keep attachments isolated</option>
                </select>
            </div>
        </div>
    </div>

    {{-- 8. MODULE USER PERMISSIONS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 8px;">
            8. MODULE USER PERMISSIONS
        </div>

        <h2 class="card-title" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
            Role-Based Transmission Authority
        </h2>
        <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
            Govern which authorized workspace members can dispatch transmittals and record receipts.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px;">
            <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #2563eb; text-transform: uppercase;">Administrators</span>
                <strong style="display: block; font-size: 13px; color: #0f172a; margin-top: 4px;">Full Access</strong>
                <p style="margin: 4px 0 0; font-size: 11.5px; color: #64748b;">Can create, edit, approve, acknowledge, and configure module settings.</p>
            </div>

            <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #059669; text-transform: uppercase;">Officers &amp; Managers</span>
                <strong style="display: block; font-size: 13px; color: #0f172a; margin-top: 4px;">Dispatch &amp; Acknowledge</strong>
                <p style="margin: 4px 0 0; font-size: 11.5px; color: #64748b;">Can log incoming transmittals and create outgoing dispatches.</p>
            </div>

            <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #d97706; text-transform: uppercase;">Standard Staff</span>
                <strong style="display: block; font-size: 13px; color: #0f172a; margin-top: 4px;">View Only</strong>
                <p style="margin: 4px 0 0; font-size: 11.5px; color: #64748b;">Can view transmitted document summaries and receipt statuses.</p>
            </div>
        </div>
    </div>

    {{-- SAVE BUTTON --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); display: flex; justify-content: space-between; align-items: center;">
        <div>
            <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase;">
                SAVE CONFIGURATION
            </div>
            <p style="margin: 4px 0 0; color: #64748b; font-size: 13px;">
                Persist Transmittals module settings for this client account.
            </p>
        </div>

        <button type="submit" class="btn btn-primary" style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 10px 24px; font-size: 13.5px; font-weight: 600; cursor: pointer; box-shadow: 0 1px 2px rgba(37, 99, 235, 0.2);">
            Save Changes
        </button>
    </div>
</form>

@endsection
