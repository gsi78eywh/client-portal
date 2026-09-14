@extends('layouts.registration')

@section('title', 'Set your password — ORDO')

@section('content')
<div class="auth-panel wide" id="securityPanel">
    <div class="kicker">CREATE YOUR ORDO ACCOUNT</div>
    <h2>Set your account password</h2>
    <p>Choose a secure password to protect your account whenever you sign in to ORDO.</p>

    <div class="step-label">
        <span>Step 6 of 7 &mdash; Security &amp; Credentials</span>
        <span style="color: var(--blue);">86%</span>
    </div>
    <div class="wizard-top">
        <span class="wizard-step on" aria-label="Step 1 complete"></span>
        <span class="wizard-step on" aria-label="Step 2 complete"></span>
        <span class="wizard-step on" aria-label="Step 3 complete"></span>
        <span class="wizard-step on" aria-label="Step 4 complete"></span>
        <span class="wizard-step on" aria-label="Step 5 complete"></span>
        <span class="wizard-step on" aria-label="Step 6 active"></span>
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

    <form method="POST" action="{{ route('security.create') }}" id="securityForm" novalidate>
        @csrf

        <div class="form-grid">
            {{-- Password --}}
            <div class="full">
                <label class="label" for="password">Password <span style="color:var(--red)">*</span></label>
                <div class="password-wrap">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="input @error('password') has-error @enderror"
                        placeholder="Create a strong password"
                        autocomplete="new-password"
                        required
                        minlength="8"
                        autofocus
                    >
                    <button type="button" class="eye toggle-password" data-target="password" aria-label="Toggle password visibility">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                </div>
                @error('password')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="full">
                <label class="label" for="password_confirmation">Confirm password <span style="color:var(--red)">*</span></label>
                <div class="password-wrap">
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="input @error('password_confirmation') has-error @enderror"
                        placeholder="Re-enter your password"
                        autocomplete="new-password"
                        required
                        minlength="8"
                    >
                    <button type="button" class="eye toggle-password" data-target="password_confirmation" aria-label="Toggle password visibility">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Live Requirements Indicator --}}
        <div style="margin: 16px 0; padding: 12px 14px; background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: var(--radius-sm);">
            <div style="font-size: 11.5px; font-weight: 700; color: var(--muted); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;">
                Password requirements
            </div>
            <div style="display: flex; flex-direction: column; gap: 6px; font-size: 12.5px;">
                <div id="reqLength" style="display: flex; align-items: center; gap: 8px; color: #64748b;">
                    <span class="req-icon" style="font-weight: bold; width: 16px; text-align: center;">○</span>
                    <span>At least 8 characters</span>
                </div>
                <div id="reqMatch" style="display: flex; align-items: center; gap: 8px; color: #64748b;">
                    <span class="req-icon" style="font-weight: bold; width: 16px; text-align: center;">○</span>
                    <span>Passwords match</span>
                </div>
            </div>
        </div>

        {{-- Terms & Privacy Acceptance --}}
        <div style="margin: 20px 0; display: flex; flex-direction: column; gap: 12px; font-size: 13px; color: #334155;">
            <label style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer;">
                <input
                    type="checkbox"
                    id="terms"
                    name="terms"
                    value="1"
                    {{ old('terms') ? 'checked' : '' }}
                    style="margin-top: 3px; width: 16px; height: 16px; accent-color: var(--blue);"
                    required
                >
                <span>
                    I agree to the <a href="#" style="color: var(--blue); font-weight: 600;">Terms of Use</a> <span style="color: var(--red);">*</span>
                </span>
            </label>
            @error('terms')
                <span class="field-error">{{ $message }}</span>
            @enderror

            <label style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer;">
                <input
                    type="checkbox"
                    id="privacy_policy"
                    name="privacy_policy"
                    value="1"
                    {{ old('privacy_policy') ? 'checked' : '' }}
                    style="margin-top: 3px; width: 16px; height: 16px; accent-color: var(--blue);"
                    required
                >
                <span>
                    I acknowledge and accept the <a href="#" style="color: var(--blue); font-weight: 600;">Privacy Policy</a> <span style="color: var(--red);">*</span>
                </span>
            </label>
            @error('privacy_policy')
                <span class="field-error">{{ $message }}</span>
            @enderror
        </div>

        {{-- Actions --}}
        <div class="form-actions">
            <a href="{{ route('register.verification') }}" class="btn secondary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
                <span>Back</span>
            </a>
            <button type="submit" class="btn primary" id="createAccountBtn">
                <span>Create account</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Password toggle
    document.querySelectorAll('.toggle-password').forEach(function (button) {
        button.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const input = document.getElementById(targetId);
            if (!input) return;
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';
            this.style.color = isPassword ? 'var(--blue)' : '#64748b';
        });
    });

    // Realtime requirement checks
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('password_confirmation');
    const reqLength = document.getElementById('reqLength');
    const reqMatch = document.getElementById('reqMatch');

    function checkRequirements() {
        const val = passwordInput.value || '';
        const confirmVal = confirmInput.value || '';

        // Length
        if (val.length >= 8) {
            reqLength.style.color = '#15803d';
            reqLength.querySelector('.req-icon').textContent = '✓';
        } else {
            reqLength.style.color = '#64748b';
            reqLength.querySelector('.req-icon').textContent = '○';
        }

        // Match
        if (val.length > 0 && val === confirmVal) {
            reqMatch.style.color = '#15803d';
            reqMatch.querySelector('.req-icon').textContent = '✓';
        } else {
            reqMatch.style.color = '#64748b';
            reqMatch.querySelector('.req-icon').textContent = '○';
        }
    }

    if (passwordInput && confirmInput) {
        passwordInput.addEventListener('input', checkRequirements);
        confirmInput.addEventListener('input', checkRequirements);
    }
});
</script>
@endpush
@endsection
