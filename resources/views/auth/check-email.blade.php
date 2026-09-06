@extends('layouts.auth')

@section('title', 'Check Your Email | ORDO')

@section('left-panel')
    <div class="hero-section">
        <span class="hero-tag">Verification</span>
        <h1 class="hero-title">Check your inbox to proceed.</h1>
        <p class="hero-description">We have sent password reset instructions to your registered email address. Follow the secure link to continue restoring access to your ORDO workspace.</p>

        <div class="security-highlights">
            <div class="security-item">
                <div class="security-icon">&#10003;</div>
                <div class="security-content">
                    <div class="security-title">Secure Reset Link</div>
                    <div class="security-description">Use the protected link in your email.</div>
                </div>
            </div>
            <div class="security-item">
                <div class="security-icon">60</div>
                <div class="security-content">
                    <div class="security-title">Expires in 60 Minutes</div>
                    <div class="security-description">Complete your reset before it expires.</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="icon-circle" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
            <polyline points="22,6 12,13 2,6" />
        </svg>
    </div>

    <span class="form-tag">Password Reset</span>
    <h2 class="form-title">Check your email</h2>
    <p class="form-subtitle">We've sent a password reset link to your registered email address.</p>

    <div class="info-box">
        <span class="info-icon" aria-hidden="true">i</span>
        <span>Didn't receive the email? Check your spam or junk folder. If it is not there, you can request a new reset link below.</span>
    </div>

    @php
        $resetEmail = $email ?? request('email', session('password_reset.email'));
    @endphp

    @if ($resetEmail)
        <div class="email-card">
            <div class="email-card-icon" aria-hidden="true">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                </svg>
            </div>
            <div class="email-card-content">
                <div class="email-card-label">Reset link sent to</div>
                <div class="email-card-value">{{ $resetEmail }}</div>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="hidden" name="email" value="{{ $resetEmail }}">
        <button type="submit" class="btn-submit">Resend Reset Link</button>
    </form>

    <a href="{{ route('login') }}" class="back-link">
        <span class="back-link-arrow" aria-hidden="true">&larr;</span>
        <span>Back to Sign In</span>
    </a>

    <p class="terms-text">
        By continuing, you agree to ORDO <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
    </p>
@endsection