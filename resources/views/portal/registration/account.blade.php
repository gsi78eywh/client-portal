@extends('layouts.registration')

@section('title', 'Choose your account — ORDO')

@section('content')
<div class="auth-panel wide" id="accountTypePanel">
    <div class="kicker">CREATE YOUR ORDO ACCOUNT</div>
    <h2>How will you use ORDO?</h2>
    <p>This helps us prepare the right account structure before you enter the system.</p>

    <div class="step-label">
        <span>Step 2 of 7 &mdash; Account Structure</span>
        <span style="color: var(--blue);">28%</span>
    </div>
    <div class="wizard-top">
        <span class="wizard-step on" aria-label="Step 1 complete"></span>
        <span class="wizard-step on" aria-label="Step 2 active"></span>
        <span class="wizard-step" aria-label="Step 3"></span>
        <span class="wizard-step" aria-label="Step 4"></span>
        <span class="wizard-step" aria-label="Step 5"></span>
        <span class="wizard-step" aria-label="Step 6"></span>
        <span class="wizard-step" aria-label="Step 7"></span>
    </div>

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

    <form method="POST" action="{{ route('account.update') }}" id="accountTypeForm">
        @csrf

        {{-- OPTION 1: PERSONAL --}}
        <label class="account-option">
            <input
                type="radio"
                name="account_type"
                value="personal"
                {{ old('account_type', $accountType ?? 'personal') === 'personal' ? 'checked' : '' }}
            >
            <div class="account-card">
                <div class="account-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
                <div class="account-info">
                    <div class="account-title">For myself</div>
                    <div class="account-desc">A personal account for your own records, compliance, or individual affairs.</div>
                </div>
                <div class="account-radio-dot"></div>
            </div>
        </label>

        {{-- OPTION 2: PROFESSION --}}
        <label class="account-option">
            <input
                type="radio"
                name="account_type"
                value="profession"
                {{ old('account_type', $accountType ?? '') === 'profession' ? 'checked' : '' }}
            >
            <div class="account-card">
                <div class="account-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                    </svg>
                </div>
                <div class="account-info">
                    <div class="account-title">For my profession or practice</div>
                    <div class="account-desc">For a licensed professional, consultant, clinic, independent practice, or agency.</div>
                </div>
                <div class="account-radio-dot"></div>
            </div>
        </label>

        {{-- OPTION 3: BUSINESS --}}
        <label class="account-option">
            <input
                type="radio"
                name="account_type"
                value="business"
                {{ old('account_type', $accountType ?? '') === 'business' ? 'checked' : '' }}
            >
            <div class="account-card">
                <div class="account-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/>
                        <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/>
                        <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/>
                        <path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/>
                    </svg>
                </div>
                <div class="account-info">
                    <div class="account-title">For a business or organization</div>
                    <div class="account-desc">For a corporation, OPC, partnership, sole proprietorship, association, or cooperative.</div>
                </div>
                <div class="account-radio-dot"></div>
            </div>
        </label>

        {{-- OPTION 4: INVITED --}}
        <label class="account-option">
            <input
                type="radio"
                name="account_type"
                value="invited"
                {{ old('account_type', $accountType ?? '') === 'invited' ? 'checked' : '' }}
            >
            <div class="account-card">
                <div class="account-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </div>
                <div class="account-info">
                    <div class="account-title">I was invited to an existing account</div>
                    <div class="account-desc">Join an established client workspace using your official invitation code or link.</div>
                </div>
                <div class="account-radio-dot"></div>
            </div>
        </label>

        {{-- Actions --}}
        <div class="flex between center" style="margin-top: 28px;">
            <a href="{{ route('register.profile') }}" class="btn ghost">
                &larr; Back
            </a>
            <button type="submit" class="btn primary">
                Continue &rarr;
            </button>
        </div>
    </form>
</div>
@endsection
