@extends('layouts.registration')

@section('title', 'Account Ready — ORDO')

@section('content')
@php
    $registration = $registration ?? session('registration', []);
    $profile = $registration['profile'] ?? [];
    $account = $registration['account'] ?? [];
    $information = $registration['information'] ?? [];
    $contact = $registration['contact'] ?? [];
    $accountType = $accountType ?? ($account['account_type'] ?? 'personal');

    $accountTypeLabels = [
        'personal' => 'Personal account',
        'profession' => 'Practice / Professional account',
        'business' => 'Business / Corporate account',
        'invited' => 'Invited member account',
    ];

    $fullName = trim(($profile['first_name'] ?? '') . ' ' . ($profile['last_name'] ?? '')) ?: 'Registered Client';
    $accountName = $information['account_name'] ?? ($information['practice_name'] ?? ($information['registered_name'] ?? $fullName));
    $email = $contact['email'] ?? 'client@ordo.com';
    $mobile = $contact['mobile_number'] ?? '';
@endphp

<div class="auth-panel wide" id="confirmationPanel">
    <div class="kicker">CREATE YOUR ORDO ACCOUNT</div>
    <h2>Your ORDO account is ready</h2>
    <p>All registration steps have been completed. Review your account summary below and proceed to enter your ORDO Town Hall.</p>

    <div class="step-label">
        <span>Step 7 of 7 &mdash; Complete &amp; Confirm</span>
        <span style="color: var(--blue);">100%</span>
    </div>
    <div class="wizard-top">
        <span class="wizard-step on" aria-label="Step 1 complete"></span>
        <span class="wizard-step on" aria-label="Step 2 complete"></span>
        <span class="wizard-step on" aria-label="Step 3 complete"></span>
        <span class="wizard-step on" aria-label="Step 4 complete"></span>
        <span class="wizard-step on" aria-label="Step 5 complete"></span>
        <span class="wizard-step on" aria-label="Step 6 complete"></span>
        <span class="wizard-step on" aria-label="Step 7 complete"></span>
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

    {{-- Success Header Banner --}}
    <div style="display: flex; align-items: center; gap: 14px; padding: 16px 18px; border-radius: var(--radius-sm); background: #f0fdf4; border: 1.5px solid #86efac; margin-bottom: 24px;">
        <div style="width: 40px; height: 40px; border-radius: 50%; background: #16a34a; color: #ffffff; display: grid; place-items: center; font-size: 18px; flex-shrink: 0;">
            ✓
        </div>
        <div>
            <div style="font-weight: 700; font-size: 15px; color: #15803d;">Registration Complete</div>
            <div style="font-size: 13px; color: #166534;">Your credentials and profile records have been verified and prepared.</div>
        </div>
    </div>

    {{-- Summary Review Card --}}
    <div style="border: 1.5px solid #e2e8f0; border-radius: var(--radius-sm); background: #ffffff; padding: 18px 20px; margin-bottom: 24px;">
        <div style="font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--muted); margin-bottom: 14px;">
            Account Details Summary
        </div>

        <div style="display: flex; flex-direction: column; gap: 14px; font-size: 13.5px;">
            {{-- Name --}}
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 10px;">
                <span style="color: var(--muted);">Personal Identity</span>
                <strong style="color: var(--ink);">{{ $fullName }}</strong>
            </div>

            {{-- Account Type --}}
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 10px;">
                <span style="color: var(--muted);">Account Type</span>
                <span style="display: inline-flex; align-items: center; gap: 6px; font-weight: 600; color: var(--blue);">
                    {{ $accountTypeLabels[$accountType] ?? 'Personal account' }}
                </span>
            </div>

            {{-- Account Name --}}
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 10px;">
                <span style="color: var(--muted);">Workspace Name</span>
                <strong style="color: var(--ink);">{{ $accountName }}</strong>
            </div>

            {{-- Verified Email --}}
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 10px;">
                <span style="color: var(--muted);">Verified Email</span>
                <span style="display: flex; align-items: center; gap: 6px; font-weight: 600; color: #15803d;">
                    <span>✓</span> {{ $email }}
                </span>
            </div>

            {{-- Mobile Number --}}
            @if (!empty($mobile))
                <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #f1f5f9; padding-bottom: 10px;">
                    <span style="color: var(--muted);">Mobile Number</span>
                    <span style="color: var(--ink);">{{ $mobile }}</span>
                </div>
            @endif

            {{-- Security --}}
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span style="color: var(--muted);">Password Security</span>
                <span style="display: flex; align-items: center; gap: 6px; font-weight: 600; color: #15803d;">
                    <span>✓</span> Configured &amp; Encrypted
                </span>
            </div>
        </div>
    </div>

    {{-- Final Activation Form --}}
    <form method="POST" action="{{ route('confirmation.submit') }}" id="confirmationForm">
        @csrf

        <button
            type="submit"
            class="btn primary btn-block"
            id="continueButton"
            style="width: 100%; height: 50px; font-size: 15px; font-weight: 700; box-shadow: var(--shadow-blue);"
        >
            <span class="button-text">Continue to ORDO</span>
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
        </button>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('confirmationForm');
    const button = document.getElementById('continueButton');
    if (!form || !button) return;

    let submitted = false;
    form.addEventListener('submit', function () {
        if (submitted) return;
        submitted = true;
        button.disabled = true;
        button.style.opacity = '0.7';
        const buttonText = button.querySelector('.button-text');
        if (buttonText) {
            buttonText.textContent = 'Opening ORDO Town Hall...';
        }
    });
});
</script>
@endpush
@endsection
