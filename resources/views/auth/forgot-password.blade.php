@extends('layouts.auth')

@section('title', 'Forgot Password | ORDO')

@section('hero-tag', 'Account Recovery')
@section('hero-title', 'Restore access to your ORDO workspace.')
@section('hero-description', 'Enter your registered email address and we will send you secure instructions to reset your password.')

@section('content')
    <span class="form-tag">Password Recovery</span>
    <h2 class="form-title">Forgot your password?</h2>
    <p class="form-subtitle">Enter your email address and we will send you a link to reset your password.</p>

    @if (session('status'))
        <div class="status-message" role="status">
            {{ session('status') }}
        </div>
    @endif

    <div class="info-box">
        <span class="info-icon" aria-hidden="true">i</span>
        <span>We'll use your registered email to begin the <strong>secure account recovery process.</strong></span>
    </div>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label for="email" class="form-label">
                Email address <span class="req">*</span>
            </label>
            <div class="input-wrapper">
                <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                    <path d="m3 7 9 6 9-6"></path>
                </svg>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-input {{ $errors->has('email') ? 'is-error' : '' }}"
                    value="{{ old('email') }}"
                    placeholder="Enter your email address"
                    autocomplete="email"
                    required
                    autofocus
                >
            </div>
            @error('email')
                <div class="form-error" role="alert">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">Send Reset Instructions</button>
    </form>

    <a href="{{ route('login') }}" class="back-link">
        <span class="back-link-arrow" aria-hidden="true">&larr;</span>
        <span>Back to Sign In</span>
    </a>

    <p class="terms-text">
        By continuing, you agree to ORDO <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
    </p>
@endsection