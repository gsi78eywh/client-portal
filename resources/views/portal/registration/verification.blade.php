@extends('layouts.registration')

@section('title', 'Verify your email — ORDO')

@section('content')
@php
    $email = $email ?? session('registration.contact.email', '');
    $maskedEmail = $maskedEmail ?? \App\Services\Contact\ContactMaskingService::maskEmail($email);
    $isEmailVerified = $isEmailVerified ?? session('registration.email_verified', false);
    $emailCooldown = $emailCooldown ?? 0;
@endphp

<div class="auth-panel wide" id="verificationPanel">
    <div class="kicker">CREATE YOUR ORDO ACCOUNT</div>
    <h2>Verify your email address</h2>
    <p>Confirm your registered email address to protect your account and verify your commercial identity.</p>

    <div class="step-label">
        <span>Step 5 of 7 &mdash; Verify Contact</span>
        <span style="color: var(--blue);">71%</span>
    </div>
    <div class="wizard-top">
        <span class="wizard-step on" aria-label="Step 1 complete"></span>
        <span class="wizard-step on" aria-label="Step 2 complete"></span>
        <span class="wizard-step on" aria-label="Step 3 complete"></span>
        <span class="wizard-step on" aria-label="Step 4 complete"></span>
        <span class="wizard-step on" aria-label="Step 5 active"></span>
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

    {{-- Verification Status Card --}}
    <div class="account-badge" style="background: {{ $isEmailVerified ? '#f0fdf4' : '#eff6ff' }}; border-color: {{ $isEmailVerified ? '#bbf7d0' : '#bfdbfe' }};">
        <div class="account-badge-icon" style="background: {{ $isEmailVerified ? '#16a34a' : 'var(--blue)' }};">
            @if ($isEmailVerified)
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            @else
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                </svg>
            @endif
        </div>
        <div style="flex:1;">
            <div class="account-badge-title" style="color: {{ $isEmailVerified ? '#15803d' : '#1e40af' }};">
                {{ $isEmailVerified ? 'Email verified successfully' : 'Verification code sent' }}
            </div>
            <div class="account-badge-description" style="color: {{ $isEmailVerified ? '#166534' : '#2563eb' }};">
                {{ $maskedEmail }}
            </div>
        </div>
        <div>
            @if ($isEmailVerified)
                <span style="display:inline-flex;align-items:center;gap:4px;background:#dcfce7;color:#15803d;padding:3px 10px;border-radius:99px;font-size:11.5px;font-weight:700;">
                    ✓ Verified
                </span>
            @else
                <span style="display:inline-flex;align-items:center;gap:4px;background:#fef3c7;color:#92400e;padding:3px 10px;border-radius:99px;font-size:11.5px;font-weight:700;">
                    Pending OTP
                </span>
            @endif
        </div>
    </div>

    @if ($isEmailVerified)
        {{-- Verified state display --}}
        <div style="padding: 20px; background: #f0fdf4; border: 1.5px solid #86efac; border-radius: var(--radius-sm); margin-bottom: 24px;">
            <div style="display: flex; align-items: center; gap: 10px; color: #15803d; font-weight: 700; font-size: 15px; margin-bottom: 4px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                Email Address Confirmed
            </div>
            <p style="margin: 0; font-size: 13px; color: #166534; line-height: 1.5;">
                Your identity has been authenticated. You can now proceed to the next step to set up your account password and security credentials.
            </p>
        </div>

        {{-- Actions for verified user --}}
        <div class="form-actions">
            <a href="{{ route('register.contact') }}" class="btn secondary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
                <span>Back</span>
            </a>
            <a href="{{ route('register.security') }}" class="btn primary">
                <span>Continue to Security</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
            </a>
        </div>
    @else
        {{-- Unverified state: OTP Input Form --}}
        <form method="POST" action="{{ route('verification.email.verify') }}" id="otpForm" style="margin-top: 12px;">
            @csrf

            <label class="label" for="email_verification_code">Enter 6-digit verification code</label>
            <div style="display: flex; gap: 12px; align-items: flex-start;">
                <div style="flex: 1;">
                    <input
                        type="text"
                        name="verification_code"
                        id="email_verification_code"
                        class="input @error('email_verification_code') has-error @enderror"
                        inputmode="numeric"
                        pattern="[0-9]{6}"
                        maxlength="6"
                        placeholder="000000"
                        style="font-size: 20px; font-weight: 800; letter-spacing: 0.35em; text-align: center; height: 50px;"
                        required
                        autofocus
                    >
                    @error('email_verification_code')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn primary" style="height: 50px; padding: 0 24px;">
                    Verify
                </button>
            </div>
            <div class="field-hint" style="margin-top: 8px;">
                Code was sent to {{ $maskedEmail }} and expires in 10 minutes.
            </div>
        </form>

        {{-- Resend Option --}}
        <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 18px; padding-top: 16px; border-top: 1px solid #e2e8f0; font-size: 13px; color: var(--muted);">
            <span>Didn't receive the email?</span>
            <form method="POST" action="{{ route('verification.email.resend') }}" style="margin: 0;">
                @csrf
                <button
                    type="submit"
                    id="emailResendBtn"
                    class="btn ghost"
                    style="height: 36px; padding: 0 14px; font-size: 13px; font-weight: 600; color: {{ $emailCooldown > 0 ? '#94a3b8' : 'var(--blue)' }};"
                    {{ $emailCooldown > 0 ? 'disabled' : '' }}
                >
                    Resend Code <span id="emailCooldownLabel">{{ $emailCooldown > 0 ? "({$emailCooldown}s)" : '' }}</span>
                </button>
            </form>
        </div>

        {{-- Actions --}}
        <div class="form-actions" style="margin-top: 24px;">
            <a href="{{ route('register.contact') }}" class="btn secondary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
                <span>Back to Contact</span>
            </a>
            <button type="button" class="btn primary" disabled style="opacity: 0.5; cursor: not-allowed;">
                <span>Continue to Security</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
            </button>
        </div>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const resendBtn = document.getElementById('emailResendBtn');
    const label = document.getElementById('emailCooldownLabel');
    let cooldown = {{ (int) $emailCooldown }};

    if (cooldown > 0 && resendBtn && label) {
        const timer = setInterval(() => {
            cooldown--;
            if (cooldown <= 0) {
                clearInterval(timer);
                resendBtn.disabled = false;
                resendBtn.style.color = 'var(--blue)';
                label.textContent = '';
            } else {
                label.textContent = `(${cooldown}s)`;
            }
        }, 1000);
    }
});
</script>
@endpush
@endsection