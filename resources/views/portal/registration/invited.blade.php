@extends('layouts.registration')

@section('title', 'Join Existing Account — ORDO')

@section('content')
@php
    $information = $information ?? session('registration.information', []);
    $invitationCode  = old('invitation_code',  $information['invitation_code']  ?? '');
    $invitationEmail = old('invitation_email', $information['invitation_email'] ?? '');

    // Read-only values resolved from the invitation DB record by the controller
    $invitationStatus = $information['invitation_status'] ?? null;
    $existingAccount  = $information['existing_account']  ?? [];
    $orgName          = $existingAccount['name']       ?? null;
    $orgRole          = $existingAccount['role']       ?? null;
    $invitedBy        = $existingAccount['invited_by'] ?? null;
@endphp

<div class="auth-panel wide" id="invitedPanel">
    <div class="kicker">JOIN YOUR ORDO WORKSPACE</div>
    <h2>Join an existing ORDO account</h2>
    <p>You were invited to join an existing organization. Enter your invitation details to verify your access.</p>

    <div class="step-label">
        <span>Step 3 of 7 &mdash; Invitation Details</span>
        <span style="color: var(--blue);">43%</span>
    </div>
    <div class="wizard-top">
        <span class="wizard-step on" aria-label="Step 1 complete"></span>
        <span class="wizard-step on" aria-label="Step 2 complete"></span>
        <span class="wizard-step on" aria-label="Step 3 active"></span>
        <span class="wizard-step" aria-label="Step 4"></span>
        <span class="wizard-step" aria-label="Step 5"></span>
        <span class="wizard-step" aria-label="Step 6"></span>
        <span class="wizard-step" aria-label="Step 7"></span>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="status">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error" role="alert">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <ul style="margin:0;padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Account Category Summary Badge --}}
    <div class="account-badge">
        <div class="account-badge-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="7" r="4"/>
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                <path d="M19 8v6"/><path d="M22 11h-6"/>
            </svg>
        </div>
        <div>
            <div class="account-badge-title">Invited Member Account</div>
            <div class="account-badge-description">Joining an existing workspace managed by an account administrator.</div>
        </div>
    </div>

    <form method="POST" action="{{ route('invited.update') }}" id="invitedForm" novalidate>
        @csrf

        <div class="form-grid">
            {{-- Invitation Code --}}
            <div>
                <label class="label" for="invitation_code">Invitation code <span style="color:var(--red)">*</span></label>
                <input
                    type="text"
                    id="invitation_code"
                    name="invitation_code"
                    class="input @error('invitation_code') has-error @enderror"
                    value="{{ $invitationCode }}"
                    placeholder="e.g. INV-92841"
                    required
                    autofocus
                >
                <div class="field-hint">Code provided in your invitation email or memo.</div>
                @error('invitation_code')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Invitation Email --}}
            <div>
                <label class="label" for="invitation_email">Invited email address <span style="color:var(--red)">*</span></label>
                <input
                    type="email"
                    id="invitation_email"
                    name="invitation_email"
                    class="input @error('invitation_email') has-error @enderror"
                    value="{{ $invitationEmail }}"
                    placeholder="you@company.com"
                    autocomplete="email"
                    required
                >
                <div class="field-hint">Must match the email address the invitation was sent to.</div>
                @error('invitation_email')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

        </div>

        {{-- ── Invitation Verified Panel (shown after successful DB lookup) ── --}}
        @if ($invitationStatus === 'found' && $orgName)
        <div id="inviteConfirmBox" style="
            margin-top: 20px;
            padding: 16px 18px;
            background: #f0fdf4;
            border: 1.5px solid #bbf7d0;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: flex-start;
            gap: 14px;
        ">
            <div style="color: #16a34a; margin-top: 2px; flex-shrink: 0;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                    <polyline points="22 4 12 14.01 9 11.01"/>
                </svg>
            </div>
            <div style="flex: 1;">
                <div style="font-size: 13px; font-weight: 600; color: #15803d; margin-bottom: 8px;">
                    Invitation verified &mdash; you are joining:
                </div>
                <table style="font-size: 12.5px; border-collapse: collapse; width: 100%;">
                    <tr>
                        <td style="color: var(--muted); padding: 3px 0; width: 130px; white-space: nowrap;">Organization</td>
                        <td style="color: var(--ink); font-weight: 600; padding: 3px 0;">{{ $orgName }}</td>
                    </tr>
                    @if ($orgRole)
                    <tr>
                        <td style="color: var(--muted); padding: 3px 0;">Assigned role</td>
                        <td style="color: var(--ink); padding: 3px 0;">{{ $orgRole }}</td>
                    </tr>
                    @endif
                    @if ($invitedBy)
                    <tr>
                        <td style="color: var(--muted); padding: 3px 0;">Invited by</td>
                        <td style="color: var(--ink); padding: 3px 0;">{{ $invitedBy }}</td>
                    </tr>
                    @endif
                </table>
                <div style="margin-top: 8px; font-size: 11.5px; color: var(--muted);">
                    Your role and access permissions are determined by the invitation and cannot be changed here.
                </div>
            </div>
        </div>
        @endif

        {{-- Guidance Box (shown when invite not yet verified) --}}
        @if (!($invitationStatus === 'found' && $orgName))
        <div style="margin-top: 24px; padding: 14px 16px; background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: var(--radius-sm); display: flex; align-items: flex-start; gap: 12px;">
            <div style="color: var(--blue); margin-top: 1px; flex-shrink: 0;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
            </div>
            <div style="font-size: 12.5px; color: var(--muted); line-height: 1.5;">
                <strong style="color: var(--ink); display: block; margin-bottom: 2px;">Connecting to an existing account</strong>
                Your invitation code determines your organization, role, and access permissions. No manual selection is needed &mdash; everything is configured by the account administrator.
            </div>
        </div>
        @endif

        {{-- Actions --}}
        <div class="form-actions">
            <a href="{{ route('register.account') }}" class="btn secondary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
                <span>Back</span>
            </a>
            <button type="submit" class="btn primary">
                <span>Verify &amp; Continue</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
            </button>
        </div>
    </form>
</div>
@endsection
