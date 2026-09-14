@extends('layouts.client')

@section('title', 'Records Settings')

@section('header-title', 'Records Settings')

@section('content')

<div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
    <div>
        <div class="card-label">
            MODULE SETTINGS
        </div>

        <h1 class="page-title" style="font-size: 26px; font-weight: 700; color: #0f172a; margin: 4px 0 6px 0;">
            Records Settings &amp; Configuration
        </h1>

        <p class="page-description" style="font-size: 13.5px; color: #64748b; margin: 0; max-width: 760px; line-height: 1.5;">
            Central source of truth for record classifications, document index codes, source authorities, numbering formats, OCR extraction rules, and storage quotas.
        </p>
    </div>

    <div>
        <a href="{{ route('records') }}" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 8px; text-decoration: none; padding: 9px 16px; font-size: 13px; font-weight: 600; border-radius: 8px; border: 1px solid #d1d5db; color: #374151; background: #fff;">
            &larr; Back to Records Dashboard
        </a>
    </div>
</div>

@if (session('status'))
    <div style="background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 14px 18px; border-radius: 8px; font-size: 13px; margin-bottom: 24px; font-weight: 600; display: flex; align-items: center; gap: 10px;">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"></path></svg>
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('settings.modules.records.update') }}">
    @csrf

    {{-- 1. MODULE STATUS --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            1. MODULE STATUS
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap; margin-top: 10px;">
            <div>
                <h2 class="card-title">
                    Records &amp; Document Management Engine
                </h2>
                <p class="card-description">
                    Controls workspace document indexing, cloud file storage, and search classification workflows.
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

    {{-- 2. RECORD CLASSIFICATIONS AND SUBCLASSES --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            2. RECORD CLASSIFICATIONS AND SUBCLASSES
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Document Taxonomy &amp; Categories
        </h2>
        <p class="card-description">
            Standard classification hierarchy for organizing organizational and statutory documents.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 14px;">
            <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #2563eb; text-transform: uppercase;">Corporate Records</span>
                <strong style="display: block; font-size: 13px; color: #0f172a; margin-top: 4px;">Articles, By-Laws &amp; Board</strong>
                <p style="margin: 4px 0 0; font-size: 11.5px; color: #64748b;">Subclasses: Articles of Inc, SEC Certificates, Resolutions, GIS filings.</p>
            </div>

            <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #059669; text-transform: uppercase;">Compliance Records</span>
                <strong style="display: block; font-size: 13px; color: #0f172a; margin-top: 4px;">Permits, Licenses &amp; Filings</strong>
                <p style="margin: 4px 0 0; font-size: 11.5px; color: #64748b;">Subclasses: Mayor's Permit, BIR Form 2303, SSS/PhilHealth/HDMF clearances.</p>
            </div>

            <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #d97706; text-transform: uppercase;">Finance Records</span>
                <strong style="display: block; font-size: 13px; color: #0f172a; margin-top: 4px;">Invoices, Receipts &amp; Audits</strong>
                <p style="margin: 4px 0 0; font-size: 11.5px; color: #64748b;">Subclasses: Audited Financials, Billing Invoices, Payment Vouchers.</p>
            </div>

            <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #7c3aed; text-transform: uppercase;">Human Resources</span>
                <strong style="display: block; font-size: 13px; color: #0f172a; margin-top: 4px;">Employment &amp; Labor</strong>
                <p style="margin: 4px 0 0; font-size: 11.5px; color: #64748b;">Subclasses: Employment Contracts, NDAs, Company Handbooks, DOLE Notices.</p>
            </div>

            <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #0284c7; text-transform: uppercase;">Governance</span>
                <strong style="display: block; font-size: 13px; color: #0f172a; margin-top: 4px;">Board Minutes &amp; Charters</strong>
                <p style="margin: 4px 0 0; font-size: 11.5px; color: #64748b;">Subclasses: Minutes of Meetings, Committee Charters, Shareholder Notices.</p>
            </div>

            <div style="padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #475569; text-transform: uppercase;">Other Records</span>
                <strong style="display: block; font-size: 13px; color: #0f172a; margin-top: 4px;">Operational &amp; Commercial</strong>
                <p style="margin: 4px 0 0; font-size: 11.5px; color: #64748b;">Subclasses: Commercial Leases, Insurance Policies, Vendor Service Level Agreements.</p>
            </div>
        </div>
    </div>

    {{-- 3. INDEX CODES --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            3. INDEX CODES
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Taxonomic Index Coding
        </h2>
        <p class="card-description">
            Configure filing index codes for quick barcode, physical binder, and optical search indexing.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Index Code Scheme
                </label>
                <select name="index_scheme" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="alphanumeric" selected>Alphanumeric Taxonomy (e.g. SEC-CORP-01)</option>
                    <option value="dewey">Decimal Category Index (e.g. 100.20.01)</option>
                    <option value="chronological">Chronological Year / Sequence</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Barcode / QR Stamping
                </label>
                <select name="barcode_stamping" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="qr_top_right" selected>QR Code (Top-Right Header)</option>
                    <option value="barcode_bottom">Code-128 Barcode (Bottom Footer)</option>
                    <option value="disabled">Disabled (No Watermark Stamping)</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Default Vault Prefix
                </label>
                <input type="text" name="vault_prefix" value="ORDO-VAULT-01" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
            </div>
        </div>
    </div>

    {{-- 4. SOURCE LIST --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            4. SOURCE LIST
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Verified Document Sources
        </h2>
        <p class="card-description">
            Configure originating authorities, agencies, and channels available in the upload dropdown.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px;">
            <label style="display: flex; align-items: center; gap: 8px; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer; background: #f8fafc;">
                <input type="checkbox" name="sources[sec]" value="1" checked style="accent-color: #2563eb;">
                <span style="font-size: 13px; font-weight: 600; color: #1e293b;">SEC (Securities &amp; Exchange)</span>
            </label>

            <label style="display: flex; align-items: center; gap: 8px; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer; background: #f8fafc;">
                <input type="checkbox" name="sources[bir]" value="1" checked style="accent-color: #2563eb;">
                <span style="font-size: 13px; font-weight: 600; color: #1e293b;">BIR (Internal Revenue)</span>
            </label>

            <label style="display: flex; align-items: center; gap: 8px; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer; background: #f8fafc;">
                <input type="checkbox" name="sources[lgu]" value="1" checked style="accent-color: #2563eb;">
                <span style="font-size: 13px; font-weight: 600; color: #1e293b;">LGU (Local City Government)</span>
            </label>

            <label style="display: flex; align-items: center; gap: 8px; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer; background: #f8fafc;">
                <input type="checkbox" name="sources[internal]" value="1" checked style="accent-color: #2563eb;">
                <span style="font-size: 13px; font-weight: 600; color: #1e293b;">Internal Corporate</span>
            </label>

            <label style="display: flex; align-items: center; gap: 8px; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer; background: #f8fafc;">
                <input type="checkbox" name="sources[bank]" value="1" checked style="accent-color: #2563eb;">
                <span style="font-size: 13px; font-weight: 600; color: #1e293b;">Commercial Bank</span>
            </label>

            <label style="display: flex; align-items: center; gap: 8px; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer; background: #f8fafc;">
                <input type="checkbox" name="sources[customer]" value="1" checked style="accent-color: #2563eb;">
                <span style="font-size: 13px; font-weight: 600; color: #1e293b;">Client / Customer</span>
            </label>

            <label style="display: flex; align-items: center; gap: 8px; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer; background: #f8fafc;">
                <input type="checkbox" name="sources[vendor]" value="1" checked style="accent-color: #2563eb;">
                <span style="font-size: 13px; font-weight: 600; color: #1e293b;">Vendor / Supplier</span>
            </label>

            <label style="display: flex; align-items: center; gap: 8px; padding: 12px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer; background: #f8fafc;">
                <input type="checkbox" name="sources[dole]" value="1" checked style="accent-color: #2563eb;">
                <span style="font-size: 13px; font-weight: 600; color: #1e293b;">DOLE / Labor Agency</span>
            </label>
        </div>
    </div>

    {{-- 5. RECORD / DOCUMENT NUMBERING --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            5. RECORD / DOCUMENT NUMBERING
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Auto-Generated Record Identifiers
        </h2>
        <p class="card-description">
            Customize reference sequence numbering for uploaded documents.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Record ID Numbering Format
                </label>
                <input type="text" name="numbering_format" value="REC-YYYY-XXXX" readonly style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc; font-size: 13px; color: #475569;">
                <span style="font-size: 11px; color: #64748b; margin-top: 4px; display: block;">Next generated ID: REC-2026-1249</span>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Prefix Token
                </label>
                <input type="text" name="prefix_token" value="REC" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Sequence Padding
                </label>
                <select name="padding_digits" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="4" selected>4 Digits (e.g. 1249)</option>
                    <option value="5">5 Digits (e.g. 01249)</option>
                    <option value="6">6 Digits (e.g. 001249)</option>
                </select>
            </div>
        </div>
    </div>

    {{-- 6. OCR FIELD CONFIGURATION --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            6. OCR FIELD CONFIGURATION
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Intelligent Text Indexing &amp; OCR Engine
        </h2>
        <p class="card-description">
            Configure automatic text extraction, optical character recognition, and entity search indexing.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px;">
            <label style="display: flex; align-items: flex-start; gap: 10px; padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer;">
                <input type="checkbox" name="ocr[auto_extract]" value="1" checked style="margin-top: 2px; accent-color: #2563eb;">
                <div>
                    <strong style="font-size: 13px; color: #1e293b;">Automated Text Indexing</strong>
                    <p style="margin: 3px 0 0; font-size: 12px; color: #64748b;">Extract full textual content from uploaded PDFs and images into search index.</p>
                </div>
            </label>

            <label style="display: flex; align-items: flex-start; gap: 10px; padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer;">
                <input type="checkbox" name="ocr[detect_metadata]" value="1" checked style="margin-top: 2px; accent-color: #2563eb;">
                <div>
                    <strong style="font-size: 13px; color: #1e293b;">Entity &amp; Date Detection</strong>
                    <p style="margin: 3px 0 0; font-size: 12px; color: #64748b;">Automatically detect dates, reference numbers, and government registry numbers.</p>
                </div>
            </label>

            <label style="display: flex; align-items: flex-start; gap: 10px; padding: 14px; border: 1px solid #e5e7eb; border-radius: 8px; cursor: pointer;">
                <input type="checkbox" name="ocr[quality_check]" value="1" checked style="margin-top: 2px; accent-color: #2563eb;">
                <div>
                    <strong style="font-size: 13px; color: #1e293b;">Image Fidelity Validation</strong>
                    <p style="margin: 3px 0 0; font-size: 12px; color: #64748b;">Warn user when scanned documents have low DPI, blur, or missing signatures.</p>
                </div>
            </label>
        </div>
    </div>

    {{-- 7. TAGS AND METADATA DEFAULTS --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            7. TAGS AND METADATA DEFAULTS
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Default Tags &amp; Metadata Schemes
        </h2>
        <p class="card-description">
            Pre-populate tag recommendations and enforce structured filing attributes.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Recommended Tag Suggestions
                </label>
                <input type="text" name="default_tags" value="SEC, Charter, Articles, Resolution, Permit, LGU, BIR, Tax, HR, Confidential, Audited" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                <span style="font-size: 11px; color: #64748b; margin-top: 4px; display: block;">Comma-separated tags suggested in the upload dialog.</span>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Require Document Number
                </label>
                <select name="require_doc_num" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="optional" selected>Optional (Recommended for general files)</option>
                    <option value="required_for_compliance">Required only for Compliance &amp; Corporate</option>
                    <option value="strictly_required">Strictly Required for all records</option>
                </select>
            </div>
        </div>
    </div>

    {{-- 8. RETENTION & ARCHIVE SETTINGS --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            8. RETENTION &amp; ARCHIVE SETTINGS
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Statutory Document Retention Rules
        </h2>
        <p class="card-description">
            Define compliance archiving horizons and preservation mandates under Philippine legal standards.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px;">
            <div style="padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #2563eb; text-transform: uppercase;">Corporate &amp; Charter</span>
                <strong style="display: block; font-size: 14px; color: #0f172a; margin-top: 4px;">Permanent Preservation</strong>
                <p style="margin: 4px 0 0; font-size: 12px; color: #64748b;">Articles of Inc, by-laws, and board minutes are retained permanently.</p>
            </div>

            <div style="padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #059669; text-transform: uppercase;">Tax &amp; Financial</span>
                <strong style="display: block; font-size: 14px; color: #0f172a; margin-top: 4px;">10 Years (BIR Standard)</strong>
                <p style="margin: 4px 0 0; font-size: 12px; color: #64748b;">Books of accounts, tax annexes, invoices, and AFS reports.</p>
            </div>

            <div style="padding: 16px; border: 1px solid #e5e7eb; border-radius: 8px; background: #f8fafc;">
                <span style="font-size: 11px; font-weight: 700; color: #7c3aed; text-transform: uppercase;">Human Resources</span>
                <strong style="display: block; font-size: 14px; color: #0f172a; margin-top: 4px;">5 Years Post-Separation</strong>
                <p style="margin: 4px 0 0; font-size: 12px; color: #64748b;">Personnel files, quitclaims, and payroll records preserved per DOLE.</p>
            </div>
        </div>
    </div>

    {{-- 9. STORAGE & UPLOAD RULES --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            9. STORAGE &amp; UPLOAD RULES
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Quota Limits &amp; File Format Enforcement
        </h2>
        <p class="card-description">
            Storage capacity monitoring and accepted file upload types.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px;">
            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Allocated Storage Quota
                </label>
                <input type="text" value="500 MB (320 MB used &bull; 64%)" readonly style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc; font-size: 13px; color: #475569; font-weight: 600;">
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Maximum Single File Size
                </label>
                <select name="max_file_size" style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 8px; background: #fff; font-size: 13px;">
                    <option value="15" selected>15 MB per document (Default)</option>
                    <option value="25">25 MB per document</option>
                    <option value="50">50 MB per document (Enterprise tier)</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px; color: #1f2937;">
                    Supported Document Formats
                </label>
                <input type="text" name="allowed_extensions" value="PDF, DOCX, XLSX, PNG, JPG, ZIP" readonly style="width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc; font-size: 13px; color: #475569;">
            </div>
        </div>
    </div>

    {{-- 10. MODULE USER PERMISSIONS --}}
    <div class="card" style="margin-bottom: 24px;">
        <div class="card-label">
            10. MODULE USER PERMISSIONS
        </div>

        <h2 class="card-title" style="margin-top: 8px;">
            Role-Based Records Access Control
        </h2>
        <p class="card-description">
            Manage granular access permissions for corporate records officers and team members.
        </p>

        <div style="margin-top: 18px; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse; font-size: 13px; text-align: left;">
                <thead style="background: #f8fafc; border-bottom: 1px solid #e5e7eb;">
                    <tr>
                        <th style="padding: 12px 16px; font-weight: 600; color: #475569;">Role</th>
                        <th style="padding: 12px 16px; font-weight: 600; color: #475569;">View &amp; Download</th>
                        <th style="padding: 12px 16px; font-weight: 600; color: #475569;">Upload Records</th>
                        <th style="padding: 12px 16px; font-weight: 600; color: #475569;">Edit Metadata</th>
                        <th style="padding: 12px 16px; font-weight: 600; color: #475569;">Archive / Retention</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">Account Administrator</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">Records Custodian / Officer</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; Full Access</td>
                    </tr>
                    <tr>
                        <td style="padding: 12px 16px; font-weight: 600; color: #0f172a;">Standard User / Viewer</td>
                        <td style="padding: 12px 16px; color: #059669;">&check; View Only</td>
                        <td style="padding: 12px 16px; color: #94a3b8;">&times; Restricted</td>
                        <td style="padding: 12px 16px; color: #94a3b8;">&times; Restricted</td>
                        <td style="padding: 12px 16px; color: #94a3b8;">&times; Restricted</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px; margin-bottom: 40px;">
        <a href="{{ route('records') }}" class="btn btn-secondary" style="padding: 10px 20px; font-size: 13.5px; font-weight: 600; border-radius: 8px; border: 1px solid #d1d5db; color: #374151; background: #fff; text-decoration: none;">
            Cancel
        </a>
        <button type="submit" class="btn btn-primary" style="background: #2563eb; color: #fff; border: none; padding: 10px 24px; font-size: 13.5px; font-weight: 600; border-radius: 8px; cursor: pointer;">
            Save Configuration
        </button>
    </div>
</form>

@endsection
