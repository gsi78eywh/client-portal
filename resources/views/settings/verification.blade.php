@extends('layouts.client')

@section('title', 'Account Verification — ORDO')

@section('header-title', 'Account Verification')

@section('content')

@php
    $u = $user ?? auth()->user();
    $acct = $account ?? $u?->currentAccount();
    $prof = $profile ?? $acct?->profile;

    $status = $verificationStatus ?? $acct?->verification_status ?? session('client.verification.status', 'not_started');

    $statusConfig = [
        'not_started' => [
            'label' => 'Not Started',
            'title' => 'Verification Not Started',
            'badge_bg' => '#f1f5f9',
            'badge_color' => '#475569',
            'badge_border' => '#cbd5e1',
            'description' => 'Your ORDO workspace is active with 30-day free access. Complete verification anytime to retain full access and unlock verified compliance reporting.',
            'can_submit' => true,
            'is_resubmit' => false,
            'remarks' => null,
        ],
        'in_progress' => [
            'label' => 'In Progress',
            'title' => 'Verification In Progress',
            'badge_bg' => '#eff6ff',
            'badge_color' => '#1d4ed8',
            'badge_border' => '#bfdbfe',
            'description' => 'You have begun preparing your verification submission. Upload your business or practitioner documents below to proceed.',
            'can_submit' => true,
            'is_resubmit' => false,
            'remarks' => null,
        ],
        'submitted' => [
            'label' => 'Submitted & Under Review',
            'title' => 'Verification Under Review',
            'badge_bg' => '#fffbeb',
            'badge_color' => '#b45309',
            'badge_border' => '#fde68a',
            'description' => 'Your verification documentation has been submitted. Our compliance team is currently reviewing your records. This typically takes 1–2 business days.',
            'can_submit' => false,
            'is_resubmit' => false,
            'remarks' => null,
        ],
        'additional_info_required' => [
            'label' => 'Additional Information Required',
            'title' => 'Action Required: Additional Information Needed',
            'badge_bg' => '#fff7ed',
            'badge_color' => '#c2410c',
            'badge_border' => '#ffedd5',
            'description' => 'Our compliance reviewers require updated or clearer documentation before your account can be verified. Please review the reviewer remarks below.',
            'can_submit' => true,
            'is_resubmit' => true,
            'remarks' => 'Please provide a clearer, uncropped scan of your BIR Certificate of Registration (Form 2303) showing the official RDO stamp and taxpayer signature.',
        ],
        'verified' => [
            'label' => 'Verified Account',
            'title' => 'Account Verified',
            'badge_bg' => '#f0fdf4',
            'badge_color' => '#15803d',
            'badge_border' => '#bbf7d0',
            'description' => 'Congratulations! Your ORDO account has been fully verified. All regulatory compliance features, verified badges, and transmittal capabilities are active.',
            'can_submit' => false,
            'is_resubmit' => false,
            'remarks' => null,
        ],
        'rejected' => [
            'label' => 'Verification Rejected',
            'title' => 'Verification Unsuccessful',
            'badge_bg' => '#fef2f2',
            'badge_color' => '#b91c1c',
            'badge_border' => '#fecaca',
            'description' => 'Your verification documents could not be validated against official public registries. You may resubmit with revised documentation.',
            'can_submit' => true,
            'is_resubmit' => true,
            'remarks' => 'The registered business name and TIN submitted did not match the records retrieved from SEC / DTI / BIR registries.',
        ],
    ];

    $cfg = $statusConfig[$status] ?? $statusConfig['not_started'];

    $accountNum = $acct?->account_number ?? session('client.account.number', 'ORDO-2026-00192837');
    $legalName = $prof?->legal_name ?? $acct?->name ?? 'Account Workspace';
@endphp

<div class="main-content-container" style="max-width: 1000px; padding: 10px 0;">

    <!-- PAGE HEADER SECTION -->
    <div style="margin-bottom: 24px;">
        <!-- SETTINGS BADGE -->
        <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 6px;">
            SETTINGS &bull; ACCOUNT VERIFICATION
        </div>

        <!-- MAIN TITLE -->
        <h1 style="font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 4px 0; line-height: 1.2;">
            Account Verification
        </h1>
        <p style="font-size: 13.5px; color: #64748b; margin: 0;">
            Verify <strong>{{ $legalName }}</strong> ({{ $accountNum }}) to certify your official legal identity on the ORDO platform.
        </p>
    </div>

    <!-- NOTIFICATIONS -->
    @if(session('success') || session('status'))
        <div style="margin-bottom: 18px; padding: 12px 14px; border-radius: 8px; background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; font-size: 13px; font-weight: 500;">
            ✓ {{ session('success') ?? session('status') }}
        </div>
    @endif

    {{-- CURRENT STATUS CARD --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 24px; flex-wrap: wrap;">
            <div style="max-width: 650px;">
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                    CURRENT STATUS
                </div>

                <h2 style="font-size: 20px; font-weight: 700; color: #0f172a; margin: 4px 0 6px 0;">
                    {{ $cfg['title'] }}
                </h2>

                <p style="font-size: 13.5px; color: #475569; margin: 0; line-height: 1.5;">
                    {{ $cfg['description'] }}
                </p>
            </div>

            <div style="padding: 6px 14px; border-radius: 999px; background: {{ $cfg['badge_bg'] }}; color: {{ $cfg['badge_color'] }}; font-size: 12.5px; font-weight: 700; white-space: nowrap; border: 1px solid {{ $cfg['badge_border'] }}; display: flex; align-items: center; gap: 6px;">
                <span style="width: 8px; height: 8px; border-radius: 50%; background: {{ $cfg['badge_color'] }};"></span>
                {{ $cfg['label'] }}
            </div>
        </div>

        {{-- REVIEWER REMARKS IF ANY --}}
        @if(!empty($cfg['remarks']))
            <div style="margin-top: 18px; padding: 14px 16px; background: #fffbeb; border: 1px solid #fef3c7; border-left: 4px solid #f59e0b; border-radius: 6px;">
                <div style="font-size: 11px; font-weight: 700; color: #92400e; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px;">
                    Reviewer Remarks
                </div>
                <div style="font-size: 13.5px; color: #78350f; line-height: 1.4;">
                    {{ $cfg['remarks'] }}
                </div>
            </div>
        @endif

        {{-- STATUS PILL PROGRESS --}}
        <div style="margin-top: 24px; display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 12px;">
            <div style="padding: 14px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                <div style="font-size: 11px; color: #64748b; margin-bottom: 4px; text-transform: uppercase; font-weight: 600;">Account</div>
                <strong style="font-size: 13.5px; color: #166534;">✓ Active (30-Day Free)</strong>
            </div>

            <div style="padding: 14px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                <div style="font-size: 11px; color: #64748b; margin-bottom: 4px; text-transform: uppercase; font-weight: 600;">Account Profile</div>
                <strong style="font-size: 13.5px; color: {{ !empty($prof?->legal_name) ? '#166534' : '#d97706' }};">
                    {{ !empty($prof?->legal_name) ? '✓ Completed' : 'Incomplete' }}
                </strong>
            </div>

            <div style="padding: 14px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                <div style="font-size: 11px; color: #64748b; margin-bottom: 4px; text-transform: uppercase; font-weight: 600;">Documentation</div>
                <strong style="font-size: 13.5px; color: {{ in_array($status, ['submitted', 'verified']) ? '#166534' : '#475569' }};">
                    {{ in_array($status, ['submitted', 'verified']) ? '✓ Submitted' : 'Pending' }}
                </strong>
            </div>

            <div style="padding: 14px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                <div style="font-size: 11px; color: #64748b; margin-bottom: 4px; text-transform: uppercase; font-weight: 600;">Official Badge</div>
                <strong style="font-size: 13.5px; color: {{ $status === 'verified' ? '#166534' : '#94a3b8' }};">
                    {{ $status === 'verified' ? '✓ Verified' : 'Unverified' }}
                </strong>
            </div>
        </div>
    </div>

    {{-- DOCUMENT UPLOAD AND REQUIREMENTS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            REQUIRED DOCUMENTATION
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 4px 0 12px 0;">
            Verification Documents
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0 0 20px 0;">
            Upload PDF or clear image scans (JPG, PNG) for verification. Maximum 10MB per file.
        </p>

        <form action="{{ route('settings.verification.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="action" value="{{ $cfg['is_resubmit'] ? 'resubmit' : 'submit' }}">

            <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; margin-bottom: 24px;">

                {{-- DOC 1: BIR 2303 --}}
                <div style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 8px; background: #fafafa;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                        <div>
                            <strong style="font-size: 13.5px; color: #0f172a; display: block;">BIR Certificate (Form 2303)</strong>
                            <span style="font-size: 12px; color: #64748b;">Certificate of Tax Registration</span>
                        </div>
                        <span style="font-size: 11px; font-weight: 600; color: #b45309; background: #fef3c7; padding: 2px 6px; border-radius: 4px;">Required</span>
                    </div>
                    <div style="border: 1px dashed #cbd5e1; border-radius: 6px; padding: 12px; text-align: center; background: #ffffff; cursor: pointer;" onclick="document.getElementById('file_bir').click();">
                        <input type="file" id="file_bir" name="file_bir" style="display: none;" onchange="document.getElementById('lbl_bir').textContent = this.files[0] ? this.files[0].name : 'Choose file';">
                        <span id="lbl_bir" style="font-size: 12px; color: #2563eb; font-weight: 500;">
                            {{ in_array($status, ['submitted', 'verified']) ? '✓ bir_2303_registered.pdf' : '+ Upload Document' }}
                        </span>
                    </div>
                </div>

                {{-- DOC 2: SEC / DTI / PRC --}}
                <div style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 8px; background: #fafafa;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                        <div>
                            <strong style="font-size: 13.5px; color: #0f172a; display: block;">Registration Certificate</strong>
                            <span style="font-size: 12px; color: #64748b;">SEC, DTI, or Professional License</span>
                        </div>
                        <span style="font-size: 11px; font-weight: 600; color: #b45309; background: #fef3c7; padding: 2px 6px; border-radius: 4px;">Required</span>
                    </div>
                    <div style="border: 1px dashed #cbd5e1; border-radius: 6px; padding: 12px; text-align: center; background: #ffffff; cursor: pointer;" onclick="document.getElementById('file_sec').click();">
                        <input type="file" id="file_sec" name="file_sec" style="display: none;" onchange="document.getElementById('lbl_sec').textContent = this.files[0] ? this.files[0].name : 'Choose file';">
                        <span id="lbl_sec" style="font-size: 12px; color: #2563eb; font-weight: 500;">
                            {{ in_array($status, ['submitted', 'verified']) ? '✓ certificate_of_registration.pdf' : '+ Upload Document' }}
                        </span>
                    </div>
                </div>

                {{-- DOC 3: MAYOR'S PERMIT --}}
                <div style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 8px; background: #fafafa;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                        <div>
                            <strong style="font-size: 13.5px; color: #0f172a; display: block;">Mayor's / Business Permit</strong>
                            <span style="font-size: 12px; color: #64748b;">Current operating license</span>
                        </div>
                        <span style="font-size: 11px; font-weight: 500; color: #64748b; background: #e2e8f0; padding: 2px 6px; border-radius: 4px;">Optional / Where applicable</span>
                    </div>
                    <div style="border: 1px dashed #cbd5e1; border-radius: 6px; padding: 12px; text-align: center; background: #ffffff; cursor: pointer;" onclick="document.getElementById('file_permit').click();">
                        <input type="file" id="file_permit" name="file_permit" style="display: none;" onchange="document.getElementById('lbl_permit').textContent = this.files[0] ? this.files[0].name : 'Choose file';">
                        <span id="lbl_permit" style="font-size: 12px; color: #2563eb; font-weight: 500;">
                            {{ in_array($status, ['submitted', 'verified']) ? '✓ business_permit_2026.pdf' : '+ Upload Document' }}
                        </span>
                    </div>
                </div>

                {{-- DOC 4: GOV ID --}}
                <div style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 8px; background: #fafafa;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                        <div>
                            <strong style="font-size: 13.5px; color: #0f172a; display: block;">Government ID</strong>
                            <span style="font-size: 12px; color: #64748b;">Authorized Signatory / Administrator</span>
                        </div>
                        <span style="font-size: 11px; font-weight: 600; color: #b45309; background: #fef3c7; padding: 2px 6px; border-radius: 4px;">Required</span>
                    </div>
                    <div style="border: 1px dashed #cbd5e1; border-radius: 6px; padding: 12px; text-align: center; background: #ffffff; cursor: pointer;" onclick="document.getElementById('file_id').click();">
                        <input type="file" id="file_id" name="file_id" style="display: none;" onchange="document.getElementById('lbl_id').textContent = this.files[0] ? this.files[0].name : 'Choose file';">
                        <span id="lbl_id" style="font-size: 12px; color: #2563eb; font-weight: 500;">
                            {{ in_array($status, ['submitted', 'verified']) ? '✓ passport_valid_id.pdf' : '+ Upload Document' }}
                        </span>
                    </div>
                </div>

            </div>

            {{-- SUBMIT / RESUBMIT ACTIONS --}}
            <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 16px; border-top: 1px solid #e2e8f0; flex-wrap: wrap; gap: 12px;">
                <div style="font-size: 12.5px; color: #64748b;">
                    By submitting, you certify that all uploaded documents are true, correct, and legally binding.
                </div>

                @if($cfg['can_submit'])
                    <button type="submit" style="height: 42px; padding: 0 24px; background: #2563eb; color: #ffffff; border: none; font-size: 13.5px; font-weight: 600; border-radius: 8px; cursor: pointer;">
                        {{ $cfg['is_resubmit'] ? 'Resubmit Updated Documents &rarr;' : 'Submit Verification Documents &rarr;' }}
                    </button>
                @else
                    <button type="button" disabled style="height: 42px; padding: 0 24px; background: #94a3b8; color: #ffffff; border: none; font-size: 13.5px; font-weight: 600; border-radius: 8px; cursor: not-allowed;">
                        {{ $status === 'verified' ? 'Account Verified ✓' : 'Documents Under Review' }}
                    </button>
                @endif
            </div>
        </form>
    </div>

    {{-- PROTOTYPE SIMULATOR / STATE SWITCHER --}}
    <div class="card" style="background: #f8fafc; border: 1px dashed #94a3b8; border-radius: 12px; padding: 20px; box-shadow: 0 1px 2px rgba(0,0,0,0.02);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; flex-wrap: wrap; gap: 8px;">
            <div>
                <strong style="font-size: 13px; color: #0f172a; text-transform: uppercase; letter-spacing: 0.05em;">
                    🧪 Prototype & QA Verification State Switcher
                </strong>
                <p style="font-size: 12px; color: #64748b; margin: 2px 0 0 0;">
                    Switch between the 6 verification states to test UI adaptation, reviewer remarks, and post-verification privileges.
                </p>
            </div>
        </div>

        <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <form action="{{ route('settings.verification.submit') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="status" value="not_started">
                <button type="submit" class="btn" style="font-size: 12px; padding: 6px 12px; background: #ffffff; border: 1px solid #cbd5e1; color: #334155; border-radius: 6px; cursor: pointer;">
                    Not Started
                </button>
            </form>

            <form action="{{ route('settings.verification.submit') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="status" value="in_progress">
                <button type="submit" class="btn" style="font-size: 12px; padding: 6px 12px; background: #eff6ff; border: 1px solid #bfdbfe; color: #1d4ed8; border-radius: 6px; cursor: pointer;">
                    In Progress
                </button>
            </form>

            <form action="{{ route('settings.verification.submit') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="status" value="submitted">
                <button type="submit" class="btn" style="font-size: 12px; padding: 6px 12px; background: #fffbeb; border: 1px solid #fde68a; color: #b45309; border-radius: 6px; cursor: pointer;">
                    Submitted
                </button>
            </form>

            <form action="{{ route('settings.verification.submit') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="status" value="additional_info_required">
                <button type="submit" class="btn" style="font-size: 12px; padding: 6px 12px; background: #fff7ed; border: 1px solid #ffedd5; color: #c2410c; border-radius: 6px; cursor: pointer;">
                    Add'l Info Required
                </button>
            </form>

            <form action="{{ route('settings.verification.submit') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="status" value="verified">
                <button type="submit" class="btn" style="font-size: 12px; padding: 6px 12px; background: #f0fdf4; border: 1px solid #bbf7d0; color: #15803d; border-radius: 6px; cursor: pointer;">
                    Verified
                </button>
            </form>

            <form action="{{ route('settings.verification.submit') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="status" value="rejected">
                <button type="submit" class="btn" style="font-size: 12px; padding: 6px 12px; background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; border-radius: 6px; cursor: pointer;">
                    Rejected
                </button>
            </form>
        </div>
    </div>

</div>

@endsection
