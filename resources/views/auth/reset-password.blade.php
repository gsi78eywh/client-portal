@extends('layouts.auth')

@section('title', 'Reset Password | ORDO')

@section('hero-tag', 'Security')
@section('hero-title', 'Create a new password for your account.')
@section('hero-description', 'Choose a strong, unique password to secure your ORDO commercial workspace.')

@section('content')
    <div class="icon-circle" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
        </svg>
    </div>

    <span class="form-tag">New Password</span>
    <h2 class="form-title">Set new password</h2>
    <p class="form-subtitle">Please enter and confirm your new password below.</p>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        @php
            $targetEmail = $email ?? request('email', session('password_reset.email'));
        @endphp

        @if ($targetEmail)
            <input type="hidden" name="email" value="{{ $targetEmail }}">
        @endif

        {{-- NEW PASSWORD --}}
        <div class="form-group">
            <label for="password" class="form-label">
                New Password <span class="req">*</span>
            </label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-input {{ $errors->has('password') ? 'is-error' : '' }}"
                placeholder="Enter your new password"
                minlength="8"
                required
                autocomplete="new-password"
                autofocus
            >
            <div class="password-requirements">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>
                <span>Use at least 8 characters for your new password.</span>
            </div>
            @error('password')
                <div class="form-error" role="alert">{{ $message }}</div>
            @enderror
        </div>

        {{-- CONFIRM PASSWORD --}}
        <div class="form-group">
            <label for="password_confirmation" class="form-label">
                Confirm New Password <span class="req">*</span>
            </label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="form-input"
                placeholder="Confirm your new password"
                minlength="8"
                required
                autocomplete="new-password"
            >
        </div>

        <button type="submit" class="btn-submit">Reset Password</button>
    </form>

    <a href="{{ route('login') }}" class="back-link">
        <span class="back-link-arrow" aria-hidden="true">&larr;</span>
        <span>Back to Sign In</span>
    </a>

    <p class="terms-text">
        By continuing, you agree to ORDO <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
    </p>
@endsection