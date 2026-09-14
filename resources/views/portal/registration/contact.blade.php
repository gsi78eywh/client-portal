@extends('layouts.registration')

@section('title', 'Your contact details — ORDO')

@section('content')
@php
    $contact = $contact ?? session('registration.contact', []);
    $accountType = $accountType ?? session('registration.account.account_type', 'personal');
    $email = old('email', $contact['email'] ?? '');
    $mobileNumber = old('mobile_number', $contact['mobile_number'] ?? '');

    $accountTypeLabels = [
        'personal' => 'Personal account',
        'profession' => 'Practice / Professional account',
        'business' => 'Business / Organization account',
        'invited' => 'Invited member account',
    ];
    $selectedAccountLabel = $accountTypeLabels[$accountType] ?? 'ORDO Account';
@endphp

<div class="auth-panel wide" id="contactPanel">
    <div class="kicker">CREATE YOUR ORDO ACCOUNT</div>
    <h2>Your contact details</h2>
    <p>Provide your primary contact information. We will send a 6-digit verification code to your email to verify your identity.</p>

    <div class="step-label">
        <span>Step 4 of 7 &mdash; Contact Details</span>
        <span style="color: var(--blue);">57%</span>
    </div>
    <div class="wizard-top">
        <span class="wizard-step on" aria-label="Step 1 complete"></span>
        <span class="wizard-step on" aria-label="Step 2 complete"></span>
        <span class="wizard-step on" aria-label="Step 3 complete"></span>
        <span class="wizard-step on" aria-label="Step 4 active"></span>
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
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
            </svg>
        </div>
        <div>
            <div class="account-badge-title">{{ $selectedAccountLabel }}</div>
            <div class="account-badge-description">Your primary contact channels will be registered for security and commercial alerts.</div>
        </div>
    </div>

    <form method="POST" action="{{ route('contact.update') }}" id="contactForm" novalidate>
        @csrf

        <div class="form-grid">
            {{-- Primary Email --}}
            <div class="full">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:6px;">
                    <label class="label" for="email" style="margin-bottom:0;">Email address <span style="color:var(--red)">*</span></label>
                    <span style="display:inline-flex;align-items:center;gap:5px;background:#eff6ff;color:var(--blue);padding:2px 8px;border-radius:12px;font-size:11px;font-weight:700;">
                        <span style="width:6px;height:6px;border-radius:50%;background:var(--blue);"></span>
                        OTP Verification
                    </span>
                </div>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="input @error('email') has-error @enderror"
                    value="{{ $email }}"
                    placeholder="name@example.com"
                    autocomplete="email"
                    required
                    autofocus
                >
                <div class="field-hint">Use an active email address where you can receive the 6-digit verification code.</div>
                @error('email')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Mobile Number --}}
            <div class="full">
                <label class="label" for="mobile_number">Mobile phone number <span style="color:var(--red)">*</span></label>
                <input
                    type="tel"
                    id="mobile_number"
                    name="mobile_number"
                    class="input @error('mobile_number') has-error @enderror"
                    value="{{ $mobileNumber }}"
                    placeholder="+63 917 123 4567"
                    autocomplete="tel"
                    required
                >
                <div class="field-hint">Include country code if outside the Philippines (e.g. +63, +1).</div>
                @error('mobile_number')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Guidance Box --}}
        <div style="margin-top: 24px; padding: 14px 16px; background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: var(--radius-sm); display: flex; align-items: flex-start; gap: 12px;">
            <div style="color: var(--blue); margin-top: 1px; flex-shrink: 0;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
            </div>
            <div style="font-size: 12.5px; color: var(--muted); line-height: 1.5;">
                <strong style="color: var(--ink); display: block; margin-bottom: 2px;">Securing your account identity</strong>
                We use two-factor identity verification to ensure your client records, transmittals, and entity filings remain strictly protected.
            </div>
        </div>

        {{-- Actions --}}
        <div class="form-actions">
            <a href="{{ route('register.information') }}" class="btn secondary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
                <span>Back</span>
            </a>
            <button type="submit" class="btn primary">
                <span>Continue</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
            </button>
        </div>
    </form>
</div>
@endsection