@extends('layouts.auth')

@section('title', 'Create your ORDO account — ORDO')

@section('hero-tag', 'BUSINESS, ORGANIZED.')
@section('hero-title', "One workspace for the business you’re building.")
@section('hero-description', 'Manage governance, compliance, finance, people, records and JK&C services from one controlled client workspace.')

@section('content')
<div class="auth-panel" id="registerPanel">
    <div class="kicker">CREATE YOUR ORDO ACCOUNT</div>
    <h2>Tell us about you</h2>
    <p>This creates your personal ORDO identity. We’ll ask about the account you’re creating in the next step.</p>

    {{-- 6-step progress indicator matching Image 1: Step 1 active, 2-6 inactive --}}
    <div class="wizard-top">
        <span class="wizard-step on" aria-label="Step 1 active"></span>
        <span class="wizard-step" aria-label="Step 2"></span>
        <span class="wizard-step" aria-label="Step 3"></span>
        <span class="wizard-step" aria-label="Step 4"></span>
        <span class="wizard-step" aria-label="Step 5"></span>
        <span class="wizard-step" aria-label="Step 6"></span>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="status" style="margin-bottom:16px;padding:12px 14px;border-radius:10px;background:#eaf8f2;color:#18875b;font-size:13px;border:1px solid #bce8d2;">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error" role="alert" style="margin-bottom:16px;padding:12px 14px;border-radius:10px;background:#fff0f0;color:#c44949;font-size:13px;border:1px solid #fedcdc;">
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
                <label class="label" for="first_name">First name *</label>
                <input
                    type="text"
                    id="first_name"
                    name="first_name"
                    class="input form-input @error('first_name') is-invalid has-error @enderror"
                    value="{{ old('first_name', 'John') }}"
                    placeholder="John"
                    required
                >
                @error('first_name')
                    <span class="field-error" style="color:#c44949;font-size:11px;margin-top:4px;display:block;">{{ $message }}</span>
                @enderror
            </div>

            {{-- Middle name --}}
            <div>
                <label class="label" for="middle_name">Middle name</label>
                <input
                    type="text"
                    id="middle_name"
                    name="middle_name"
                    class="input form-input @error('middle_name') is-invalid has-error @enderror"
                    value="{{ old('middle_name', 'Kelly') }}"
                    placeholder="Kelly"
                >
                @error('middle_name')
                    <span class="field-error" style="color:#c44949;font-size:11px;margin-top:4px;display:block;">{{ $message }}</span>
                @enderror
            </div>

            {{-- Last name --}}
            <div>
                <label class="label" for="last_name">Last name *</label>
                <input
                    type="text"
                    id="last_name"
                    name="last_name"
                    class="input form-input @error('last_name') is-invalid has-error @enderror"
                    value="{{ old('last_name', 'Abalde') }}"
                    placeholder="Abalde"
                    required
                >
                @error('last_name')
                    <span class="field-error" style="color:#c44949;font-size:11px;margin-top:4px;display:block;">{{ $message }}</span>
                @enderror
            </div>

            {{-- Suffix --}}
            <div>
                <label class="label" for="suffix">Suffix</label>
                <input
                    type="text"
                    id="suffix"
                    name="suffix"
                    class="input form-input @error('suffix') is-invalid has-error @enderror"
                    value="{{ old('suffix') }}"
                    placeholder="Optional"
                >
                @error('suffix')
                    <span class="field-error" style="color:#c44949;font-size:11px;margin-top:4px;display:block;">{{ $message }}</span>
                @enderror
            </div>

            {{-- Date of birth --}}
            <div>
                <label class="label" for="date_of_birth">Date of birth *</label>
                <input
                    type="date"
                    id="date_of_birth"
                    name="date_of_birth"
                    class="input form-input @error('date_of_birth') is-invalid has-error @enderror"
                    value="{{ old('date_of_birth', '1990-01-01') }}"
                    required
                >
                @error('date_of_birth')
                    <span class="field-error" style="color:#c44949;font-size:11px;margin-top:4px;display:block;">{{ $message }}</span>
                @enderror
            </div>

            {{-- Gender --}}
            <div>
                <label class="label" for="gender">Gender</label>
                <div class="select-wrapper">
                    <select
                        id="gender"
                        name="gender"
                        class="select form-select @error('gender') is-invalid has-error @enderror"
                    >
                        <option value="prefer_not_to_say" {{ old('gender', 'prefer_not_to_say') === 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                        <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender') === 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                @error('gender')
                    <span class="field-error" style="color:#c44949;font-size:11px;margin-top:4px;display:block;">{{ $message }}</span>
                @enderror
            </div>

            {{-- Country / Region --}}
            <div class="full" style="grid-column: 1 / -1;">
                <label class="label" for="country">Country / Region *</label>
                <div class="select-wrapper">
                    <select
                        id="country"
                        name="country"
                        class="select form-select @error('country') is-invalid has-error @enderror"
                        required
                    >
                        <option value="Philippines" {{ old('country', 'Philippines') === 'Philippines' ? 'selected' : '' }}>Philippines</option>
                        <option value="Australia" {{ old('country') === 'Australia' ? 'selected' : '' }}>Australia</option>
                        <option value="New Zealand" {{ old('country') === 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
                        <option value="Singapore" {{ old('country') === 'Singapore' ? 'selected' : '' }}>Singapore</option>
                    </select>
                </div>
                @error('country')
                    <span class="field-error" style="color:#c44949;font-size:11px;margin-top:4px;display:block;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex between center" style="display:flex;justify-content:space-between;align-items:center;margin-top:28px;">
            <a href="{{ route('login') }}" class="btn ghost">Back</a>
            <button type="submit" class="btn primary">
                Continue &rarr;
            </button>
        </div>
    </form>
</div>
@endsection