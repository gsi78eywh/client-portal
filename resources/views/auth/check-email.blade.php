@extends('layouts.auth')

@section('title', 'Check Your Email | ORDO')

@section('hero-tag', 'VERIFICATION')
@section('hero-title', 'Check your inbox to proceed.')
@section('hero-description', 'Follow the secure instructions sent to your email to restore access to your ORDO workspace.')

@section('content')
    <div class="kicker">PASSWORD RECOVERY</div>
    <h2>Check your email</h2>
    <p>We’ve sent secure password reset instructions to your registered email address.</p>

    @php
        $resetEmail = $email ?? request('email', session('password_reset.email'));
    @endphp

    @if ($resetEmail)
        <div style="display: flex; align-items: center; gap: 14px; padding: 16px 18px; border-radius: var(--radius); background: #eff6ff; border: 1.5px solid #bfdbfe; margin-bottom: 24px;">
            <div style="width: 40px; height: 40px; border-radius: 10px; background: var(--blue); color: #ffffff; display: grid; place-items: center; flex-shrink: 0;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                </svg>
            </div>
            <div style="flex: 1; overflow: hidden;">
                <div style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: var(--blue);">Reset link sent to</div>
                <div style="font-size: 14px; font-weight: 700; color: #1e3a8a; white-space: nowrap; text-overflow: ellipsis; overflow: hidden; margin-top: 2px;">{{ $resetEmail }}</div>
            </div>
        </div>
    @endif

    <div class="auth-stack">
        {{-- PROCEED DIRECTLY BUTTON (FOR TESTING & CLIENT DEMO) --}}
        <a href="{{ route('password.reset', ['email' => $resetEmail]) }}" class="btn primary" style="width: 100%;">
            Proceed to Set New Password &rarr;
        </a>

        {{-- RESEND FORM --}}
        <form method="POST" action="{{ route('password.email') }}" style="width: 100%;">
            @csrf
            <input type="hidden" name="email" value="{{ $resetEmail }}">
            <button type="submit" class="btn ghost" style="width: 100%;">
                Resend Reset Email
            </button>
        </form>
    </div>

    <div class="auth-sep">Or return to login</div>

    <a href="{{ route('login') }}" class="btn ghost" style="width: 100%; display: flex;">
        &larr; Back to Sign in
    </a>

    <div class="auth-footer">
        By continuing, you agree to ORDO Terms of Use and Privacy Policy.
    </div>
@endsection