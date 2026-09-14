@extends('layouts.auth')

@section('title', 'Forgot Password | ORDO')

@section('hero-tag', 'ACCOUNT RECOVERY')
@section('hero-title', 'Restore access to your ORDO workspace.')
@section('hero-description', 'Enter your registered email address and we will send you secure instructions to reset your password.')

@section('content')
    <div class="kicker">PASSWORD RECOVERY</div>
    <h2>Forgot your password?</h2>
    <p>Enter your email address and we will send you a link to reset your password.</p>

    @if (session('status'))
        <div class="alert alert-success" role="status">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            {{ session('status') }}
        </div>
    @endif

    <div class="note" style="margin-bottom: 20px; display: flex; align-items: flex-start; gap: 10px;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:2px;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
        <span>We’ll send secure reset instructions to your registered account email.</span>
    </div>

    <form method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf

        <div class="auth-stack">
            {{-- EMAIL --}}
            <div>
                <label for="email" class="label">Email address <span style="color:var(--red)">*</span></label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="input @error('email') has-error @enderror"
                    value="{{ old('email') }}"
                    placeholder="name@company.com"
                    autocomplete="email"
                    required
                    autofocus
                >
                @error('email')
                    <span class="field-error">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            {{-- SUBMIT --}}
            <button type="submit" class="btn primary" style="width: 100%;">
                Send Reset Link &rarr;
            </button>
        </div>
    </form>

    <div class="auth-sep">Remembered your password?</div>

    <a href="{{ route('login') }}" class="btn ghost" style="width: 100%; display: flex;">
        &larr; Back to Sign in
    </a>

    <div class="auth-footer">
        By continuing, you agree to ORDO Terms of Use and Privacy Policy.
    </div>
@endsection