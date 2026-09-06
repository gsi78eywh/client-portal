@extends('layouts.auth')

@section('title', 'Sign In | ORDO')

@section('content')
    <span class="auth-card-tag">Welcome back</span>
    <h2 class="auth-card-title">Sign in to ORDO</h2>
    <p class="auth-card-subtitle">Access your business workspace and JK&amp;C client services.</p>

    @if (session('status'))
        <div class="auth-alert-status" role="status">
            <svg class="auth-alert-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    {{-- DEMO CREDENTIALS QUICK FILL CARD --}}
    <div class="auth-demo-box">
        <div class="auth-demo-text">
            <span class="auth-demo-label">Demo Credentials</span>
            <span class="auth-demo-creds"><code>client@ordo.com</code> &bull; <code>Password123!</code></span>
        </div>
        <button
            type="button"
            class="auth-demo-btn"
            id="autofillBtn"
            onclick="document.getElementById('email').value='client@ordo.com';document.getElementById('password').value='Password123!';"
        >
            Auto-fill
        </button>
    </div>

    <form method="POST" action="{{ route('login.submit') }}" class="auth-form" novalidate>
        @csrf

        {{-- EMAIL --}}
        <div class="auth-form-group">
            <label for="email" class="auth-label">Email address</label>
            <div class="auth-input-wrapper">
                <span class="auth-input-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                        <path d="m3 7 9 6 9-6"></path>
                    </svg>
                </span>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="auth-input {{ $errors->has('email') ? 'has-error' : '' }}"
                    value="{{ old('email') }}"
                    placeholder="name@company.com"
                    autocomplete="email"
                    required
                    autofocus
                >
            </div>
            @error('email')
                <div class="auth-field-error" role="alert">
                    <svg viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            @enderror
        </div>

        {{-- PASSWORD --}}
        <div class="auth-form-group">
            <label for="password" class="auth-label">Password</label>
            <div class="auth-input-wrapper">
                <span class="auth-input-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="10" width="16" height="11" rx="2"></rect>
                        <path d="M8 10V7a4 4 0 0 1 8 0v3"></path>
                    </svg>
                </span>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="auth-input {{ $errors->has('password') ? 'has-error' : '' }}"
                    placeholder="Enter your password"
                    autocomplete="current-password"
                    required
                >
                <button
                    type="button"
                    class="auth-password-toggle"
                    id="passwordToggle"
                    aria-label="Show password"
                    aria-controls="password"
                    aria-pressed="false"
                >
                    <svg id="eyeIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"></path>
                        <circle cx="12" cy="12" r="2.5"></circle>
                    </svg>
                </button>
            </div>
            @error('password')
                <div class="auth-field-error" role="alert">
                    <svg viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            @enderror
        </div>

        {{-- REMEMBER ME & FORGOT PASSWORD --}}
        <div class="auth-options-row">
            <label class="auth-checkbox-label">
                <input type="checkbox" name="remember" id="remember" value="1" {{ old('remember') ? 'checked' : '' }} class="auth-checkbox">
                <span>Remember me</span>
            </label>
            <a href="{{ route('password.request') }}" class="auth-forgot-link">Forgot password?</a>
        </div>

        {{-- SUBMIT BUTTON --}}
        <button type="submit" class="auth-btn-primary">
            <span>Sign in to ORDO</span>
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </button>
    </form>

    {{-- DIVIDER --}}
    <div class="auth-divider">
        <span>New to ORDO?</span>
    </div>

    {{-- CREATE ACCOUNT BUTTON --}}
    <a href="{{ route('register') }}" class="auth-btn-secondary">
        Create an account
    </a>

    {{-- FOOTER LEGAL --}}
    <p class="auth-legal">
        By continuing, you agree to ORDO <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
    </p>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const password = document.getElementById('password');
    const toggle = document.getElementById('passwordToggle');
    const eyeIcon = document.getElementById('eyeIcon');

    if (!password || !toggle || !eyeIcon) return;

    toggle.addEventListener('click', function () {
        const isPassword = password.type === 'password';
        password.type = isPassword ? 'text' : 'password';
        toggle.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
        toggle.setAttribute('aria-pressed', isPassword ? 'true' : 'false');

        if (isPassword) {
            eyeIcon.innerHTML = `
                <path d="M3 3l18 18"></path>
                <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"></path>
                <path d="M9.9 5.2A10.7 10.7 0 0 1 12 5c6.5 0 10 7 10 7a18.5 18.5 0 0 1-3.1 3.8"></path>
                <path d="M6.1 6.1C3.5 8 2 12 2 12s3.5 7 10 7c1.7 0 3.1-.4 4.4-1"></path>
            `;
        } else {
            eyeIcon.innerHTML = `
                <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"></path>
                <circle cx="12" cy="12" r="2.5"></circle>
            `;
        }
    });
});
</script>
@endsection