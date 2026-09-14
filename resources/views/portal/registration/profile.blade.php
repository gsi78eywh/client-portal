@extends('layouts.registration')

@section('title', 'Tell us about you — ORDO')

@section('content')
<div class="auth-panel wide" id="registerPanel">
    <div class="kicker">CREATE YOUR ORDO ACCOUNT</div>
    <h2>Tell us about you</h2>
    <p>This creates your personal ORDO identity. We’ll ask about the account you’re creating in the next step.</p>

    <div class="step-label">
        <span>Step 1 of 7 &mdash; Personal Identity</span>
        <span style="color: var(--blue);">14%</span>
    </div>
    <div class="wizard-top">
        <span class="wizard-step on" aria-label="Step 1 active"></span>
        <span class="wizard-step" aria-label="Step 2"></span>
        <span class="wizard-step" aria-label="Step 3"></span>
        <span class="wizard-step" aria-label="Step 4"></span>
        <span class="wizard-step" aria-label="Step 5"></span>
        <span class="wizard-step" aria-label="Step 6"></span>
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

    <form method="POST" action="{{ route('profile.update') }}" id="profileForm" novalidate>
        @csrf

        <div class="form-grid">
            {{-- First name --}}
            <div>
                <label class="label" for="first_name">First name <span style="color:var(--red)">*</span></label>
                <input
                    type="text"
                    id="first_name"
                    name="first_name"
                    class="input @error('first_name') has-error @enderror"
                    value="{{ old('first_name', $profile['first_name'] ?? '') }}"
                    placeholder="John"
                    required
                >
                @error('first_name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Middle name --}}
            <div>
                <label class="label" for="middle_name">Middle name</label>
                <input
                    type="text"
                    id="middle_name"
                    name="middle_name"
                    class="input @error('middle_name') has-error @enderror"
                    value="{{ old('middle_name', $profile['middle_name'] ?? '') }}"
                    placeholder="Kelly"
                >
                @error('middle_name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Last name --}}
            <div>
                <label class="label" for="last_name">Last name <span style="color:var(--red)">*</span></label>
                <input
                    type="text"
                    id="last_name"
                    name="last_name"
                    class="input @error('last_name') has-error @enderror"
                    value="{{ old('last_name', $profile['last_name'] ?? '') }}"
                    placeholder="Abalde"
                    required
                >
                @error('last_name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Suffix --}}
            <div>
                <label class="label" for="suffix">Suffix (if applicable)</label>
                <input
                    type="text"
                    id="suffix"
                    name="suffix"
                    class="input @error('suffix') has-error @enderror"
                    value="{{ old('suffix', $profile['suffix'] ?? '') }}"
                    placeholder="Jr., III, etc. (Optional)"
                >
                @error('suffix')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Date of birth --}}
            <div>
                <label class="label" for="date_of_birth">Date of birth <span style="color:var(--red)">*</span></label>
                <input
                    type="date"
                    id="date_of_birth"
                    name="date_of_birth"
                    class="input @error('date_of_birth') has-error @enderror"
                    value="{{ old('date_of_birth', $profile['date_of_birth'] ?? '') }}"
                    required
                >
                @error('date_of_birth')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Gender --}}
            <div>
                <label class="label" for="gender">Gender</label>
                <div class="select-wrapper">
                    <select
                        id="gender"
                        name="gender"
                        class="select @error('gender') has-error @enderror"
                    >
                        <option value="prefer_not_to_say" {{ old('gender', $profile['gender'] ?? 'prefer_not_to_say') === 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                        <option value="male" {{ old('gender', $profile['gender'] ?? '') === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $profile['gender'] ?? '') === 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender', $profile['gender'] ?? '') === 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                @error('gender')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Country / Region (Full width) --}}
            <div class="full">
                <label class="label" for="country">Country / Region <span style="color:var(--red)">*</span></label>
                <div class="select-wrapper">
                    <select
                        id="country"
                        name="country"
                        class="select @error('country') has-error @enderror"
                        required
                    >
                        <option value="">Select country / region</option>
                        @php
                            $currentCountry = old('country', $profile['country'] ?? 'Philippines');
                            $countryList = config('countries', ['Philippines', 'Australia', 'New Zealand', 'Singapore', 'United States', 'United Kingdom', 'Canada']);
                        @endphp
                        @foreach ($countryList as $c)
                            <option value="{{ $c }}" {{ $currentCountry === $c ? 'selected' : '' }}>{{ $c }}</option>
                        @endforeach
                    </select>
                </div>
                @error('country')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex between center" style="margin-top: 28px;">
            <a href="{{ route('login') }}" class="btn ghost">
                Back to Sign in
            </a>
            <button type="submit" class="btn primary">
                Continue &rarr;
            </button>
        </div>
    </form>
</div>
@endsection
