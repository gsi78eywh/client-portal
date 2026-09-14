@extends('layouts.auth')

@section('title', 'Sign In | ORDO')

@section('content')
    <div class="kicker">WELCOME BACK</div>
    <h2>Sign in to ORDO</h2>
    <p>Access your unified business workspace and John Kelly &amp; Company client services.</p>

    @if (session('status'))
        <div class="alert alert-success" role="status">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}" novalidate>
        @csrf

        <div class="auth-stack">
            {{-- EMAIL --}}
            <div>
                <label for="loginEmail" class="label">Email address</label>
                <input
                    type="email"
                    id="loginEmail"
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

            {{-- PASSWORD --}}
            <div>
                <label for="loginPassword" class="label">Password</label>
                <div class="password-wrap">
                    <input
                        type="password"
                        id="loginPassword"
                        name="password"
                        class="input @error('password') has-error @enderror"
                        value=""
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >
                    <button type="button" class="eye" onclick="togglePassword('loginPassword')" aria-label="Toggle password visibility" id="pwToggleBtn">
                        <svg id="eyeIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <span class="field-error">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        {{ $message }}
                    </span>
                @enderror
            </div>

            {{-- REMEMBER & FORGOT --}}
            <div class="flex between center">
                <label class="small muted" style="display: flex; align-items: center; gap: 7px; cursor: pointer; user-select: none;">
                    <input type="checkbox" name="remember" id="remember" value="1" {{ old('remember') ? 'checked' : '' }} style="width: 16px; height: 16px; accent-color: var(--blue); cursor: pointer;">
                    <span>Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="small" style="color: var(--blue); font-weight: 700;">
                    Forgot password?
                </a>
            </div>

            {{-- SUBMIT --}}
            <button type="submit" class="btn primary" style="width: 100%;">
                Sign in
            </button>
        </div>
    </form>

    <div class="auth-sep">New to ORDO?</div>

    <a href="{{ route('register') }}" class="btn ghost" style="width: 100%; display: flex;">
        Create an account
    </a>

    <div class="auth-footer">
        By continuing, you agree to ORDO Terms of Use and Privacy Policy.
    </div>
@endsection

@section('scripts')
<script>
function togglePassword(id) {
    const el = document.getElementById(id);
    const icon = document.getElementById('eyeIcon');
    if (!el) return;

    if (el.type === 'password') {
        el.type = 'text';
        if (icon) {
            icon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/>';
        }
    } else {
        el.type = 'password';
        if (icon) {
            icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
        }
    }
}
</script>
@endsection