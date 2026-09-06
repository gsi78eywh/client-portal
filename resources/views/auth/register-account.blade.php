@extends('layouts.auth')

@section('title', 'Create Account | ORDO')

@section('hero-tag', 'Get Started')
@section('hero-title', 'Create your ORDO client account.')
@section('hero-description', 'Start your 30-day free access to the ORDO commercial client portal. Complete your profile to set up your workspace.')

@section('content')
    <span class="form-tag">Step 1 of 7</span>
    <h2 class="form-title">Tell us about yourself</h2>
    <p class="form-subtitle">Enter your personal details to begin setting up your account.</p>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf

        {{-- FIRST NAME --}}
        <div class="form-group">
            <label for="first_name" class="form-label">First Name <span class="req">*</span></label>
            <input
                type="text"
                id="first_name"
                name="first_name"
                class="form-input @error('first_name') is-error @enderror"
                value="{{ old('first_name') }}"
                placeholder="First name"
                required
                autofocus
            >
            @error('first_name')
                <div class="form-error" role="alert">{{ $message }}</div>
            @enderror
        </div>

        {{-- MIDDLE NAME --}}
        <div class="form-group">
            <label for="middle_name" class="form-label">Middle Name</label>
            <input
                type="text"
                id="middle_name"
                name="middle_name"
                class="form-input @error('middle_name') is-error @enderror"
                value="{{ old('middle_name') }}"
                placeholder="Middle name (optional)"
            >
            @error('middle_name')
                <div class="form-error" role="alert">{{ $message }}</div>
            @enderror
        </div>

        {{-- LAST NAME --}}
        <div class="form-group">
            <label for="last_name" class="form-label">Last Name <span class="req">*</span></label>
            <input
                type="text"
                id="last_name"
                name="last_name"
                class="form-input @error('last_name') is-error @enderror"
                value="{{ old('last_name') }}"
                placeholder="Last name"
                required
            >
            @error('last_name')
                <div class="form-error" role="alert">{{ $message }}</div>
            @enderror
        </div>

        {{-- SUFFIX --}}
        <div class="form-group">
            <label for="suffix" class="form-label">Suffix</label>
            <input
                type="text"
                id="suffix"
                name="suffix"
                class="form-input @error('suffix') is-error @enderror"
                value="{{ old('suffix') }}"
                placeholder="e.g., Jr., Sr., III (optional)"
            >
            @error('suffix')
                <div class="form-error" role="alert">{{ $message }}</div>
            @enderror
        </div>

        {{-- DATE OF BIRTH --}}
        <div class="form-group">
            <label for="date_of_birth" class="form-label">Date of Birth <span class="req">*</span></label>
            <input
                type="date"
                id="date_of_birth"
                name="date_of_birth"
                class="form-input @error('date_of_birth') is-error @enderror"
                value="{{ old('date_of_birth') }}"
                required
            >
            @error('date_of_birth')
                <div class="form-error" role="alert">{{ $message }}</div>
            @enderror
        </div>

        {{-- GENDER --}}
        <div class="form-group">
            <label for="gender" class="form-label">Gender</label>
            <select id="gender" name="gender" class="form-input @error('gender') is-error @enderror">
                <option value="">Prefer not to say</option>
                <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('gender')
                <div class="form-error" role="alert">{{ $message }}</div>
            @enderror
        </div>

        {{-- COUNTRY / REGION --}}
        <div class="form-group">
            <label for="country" class="form-label">Country / Region <span class="req">*</span></label>
            <select id="country" name="country" class="form-input @error('country') is-error @enderror" required>
                <option value="Philippines" {{ old('country', 'Philippines') === 'Philippines' ? 'selected' : '' }}>Philippines</option>
                <option value="United States" {{ old('country') === 'United States' ? 'selected' : '' }}>United States</option>
                <option value="Singapore" {{ old('country') === 'Singapore' ? 'selected' : '' }}>Singapore</option>
                <option value="Australia" {{ old('country') === 'Australia' ? 'selected' : '' }}>Australia</option>
                <option value="Other" {{ old('country') === 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('country')
                <div class="form-error" role="alert">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">Continue to Account Type</button>
    </form>

    <div class="divider">
        <span>Already have an ORDO account?</span>
    </div>

    <a href="{{ route('login') }}" class="btn-create-account">Sign In</a>

    <p class="terms-text">
        By continuing, you agree to ORDO <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
    </p>
@endsection