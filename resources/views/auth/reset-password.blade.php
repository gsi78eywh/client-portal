@extends('layouts.auth')

@section('title', 'Reset Password | ORDO')

@section('hero-tag', 'SECURITY')
@section('hero-title', 'Create a new password for your account.')
@section('hero-description', 'Choose a strong, unique password to secure your ORDO commercial workspace.')

@section('content')
    <div class="kicker">NEW PASSWORD</div>
    <h2>Set new password</h2>
    <p>Please enter and confirm your new password below to secure your account.</p>

    @php
        $targetEmail = $email ?? request('email', session('password_reset.email'));
    @endphp

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

    <form method="POST" action="{{ route('password.update') }}" novalidate>
        @csrf

        @if ($targetEmail)
            <input type="hidden" name="email" value="{{ $targetEmail }}">
        @endif

        <div class="auth-stack">
            {{-- NEW PASSWORD --}}
            <div>
                <label for="password" class="label">New password <span style="color:var(--red)">*</span></label>
                <div class="password-wrap">
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="input @error('password') has-error @enderror"
                        placeholder="Enter your new password"
                        minlength="8"
                        required
                        autocomplete="new-password"
                        autofocus
                    >
                    <button type="button" class="eye" onclick="togglePassword('password')" aria-label="Toggle password visibility">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
                <div class="small muted" style="margin-top: 5px; display: flex; align-items: center; gap: 5px;">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                    <span>Use at least 8 characters.</span>
                </div>
                @error('password')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div>
                <label for="password_confirmation" class="label">Confirm new password <span style="color:var(--red)">*</span></label>
                <div class="password-wrap">
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="input"
                        placeholder="Confirm your new password"
                        minlength="8"
                        required
                        autocomplete="new-password"
                    >
                    <button type="button" class="eye" onclick="togglePassword('password_confirmation')" aria-label="Toggle password visibility">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- SUBMIT --}}
            <button type="submit" class="btn primary" style="width: 100%;">
                Reset Password &amp; Sign In &rarr;
            </button>
        </div>
    </form>

    <div class="auth-sep">Or return to login</div>

    <a href="{{ route('login') }}" class="btn ghost" style="width: 100%; display: flex;">
        &larr; Back to Sign in
    </a>

    <div class="auth-footer">
        By continuing, you agree to ORDO Terms of Use and Privacy Policy.
    </div>
@endsection

@section('scripts')
<script>
function togglePassword(id) {
    const el = document.getElementById(id);
    if (!el) return;
    el.type = el.type === 'password' ? 'text' : 'password';
}
</script>
@endsection