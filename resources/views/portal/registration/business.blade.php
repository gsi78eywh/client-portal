@extends('layouts.registration')

@section('title', 'Your business or organization — ORDO')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | ACCOUNT CATEGORY FROM STEP 2
    |--------------------------------------------------------------------------
    */

    $accountCategory = session(
        'registration.account.account_type',
        'business'
    );

    /*
    |--------------------------------------------------------------------------
    | EXISTING BUSINESS INFORMATION
    |--------------------------------------------------------------------------
    */

    $information = $information
        ?? session('registration.information', []);

    /*
    |--------------------------------------------------------------------------
    | BUSINESS ACCOUNT TYPE
    |--------------------------------------------------------------------------
    */

    $businessAccountType = old(
        'business_account_type',
        $information['business_account_type'] ?? ''
    );

    $registeredName = old(
        'registered_name',
        $information['registered_name'] ?? ''
    );

    $industry = old(
        'industry',
        $information['industry'] ?? ''
    );

    $country = old(
        'country',
        $information['country'] ?? ''
    );
@endphp


<div class="business-registration-page">

    {{-- =========================================================
         TOP ACCOUNT AREA
    ========================================================== --}}

    <div class="registration-topbar">

        <div class="signin-text">
            Already have an account?

            <a href="{{ route('login') }}">
                Sign in
            </a>
        </div>

    </div>


    {{-- =========================================================
         6-STEP PROGRESS
         STEP 1 = BLUE
         STEP 2 = BLUE
         STEP 3 = BLUE / ACTIVE
         STEP 4 = GRAY
         STEP 5 = GRAY
         STEP 6 = GRAY
    ========================================================== --}}

    <div
        class="registration-progress"
        aria-label="Registration progress"
    >

        {{-- STEP 1 --}}
        <div class="progress-segment completed"></div>

        {{-- STEP 2 --}}
        <div class="progress-segment completed"></div>

        {{-- STEP 3 --}}
        <div
            class="progress-segment active"
            aria-current="step"
        ></div>

        {{-- STEP 4 --}}
        <div class="progress-segment"></div>

        {{-- STEP 5 --}}
        <div class="progress-segment"></div>

        {{-- STEP 6 --}}
        <div class="progress-segment"></div>

    </div>


    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}

    <header class="registration-header">

        <div class="registration-eyebrow">
            CREATE YOUR ORDO ACCOUNT
        </div>

        <h1>
            Your business or organization
        </h1>

        <p>
            Tell us about the account you're creating.
            You can provide more complete account profile details later.
        </p>

    </header>


    {{-- =========================================================
         VALIDATION ALERT
    ========================================================== --}}

    @if ($errors->any())

        <div
            class="form-alert"
            role="alert"
            aria-live="polite"
        >

            <div class="form-alert-icon">
                !
            </div>

            <div class="form-alert-content">

                <strong>
                    Please check the information below.
                </strong>

                <ul>
                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach
                </ul>

            </div>

        </div>

    @endif


    {{-- =========================================================
         FORM
    ========================================================== --}}

    <form
        method="POST"
        action="{{ route('business.update') }}"
        class="registration-form"
    >

        @csrf


        {{-- =====================================================
             ACCOUNT CATEGORY SUMMARY
        ====================================================== --}}

        <section class="account-summary">

            <div class="account-summary-icon">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >

                    <path d="M3 21H21"/>

                    <path d="M5 21V6L12 3L19 6V21"/>

                    <path d="M9 10H9.01"/>

                    <path d="M12 10H12.01"/>

                    <path d="M15 10H15.01"/>

                    <path d="M9 14H9.01"/>

                    <path d="M12 14H12.01"/>

                    <path d="M15 14H15.01"/>

                </svg>

            </div>


            <div class="account-summary-content">

                <span class="summary-eyebrow">
                    ACCOUNT TYPE
                </span>

                <strong>
                    Business / Organization account
                </strong>

                <p>
                    For businesses, organizations and registered entities.
                </p>

            </div>

        </section>


        {{-- =====================================================
             BUSINESS INFORMATION
        ====================================================== --}}

        <section class="form-section">


            {{-- =================================================
                 BUSINESS ACCOUNT TYPE
            ================================================== --}}

            <div class="form-group">

                <label for="business_account_type">

                    Account Type

                    <span class="required">
                        *
                    </span>

                </label>


                <div class="select-wrapper">

                    <select
                        id="business_account_type"
                        name="business_account_type"
                        class="{{ $errors->has('business_account_type') ? 'input-error' : '' }}"
                        required
                    >

                        <option value="">
                            Select account type
                        </option>

                        <option
                            value="Sole Proprietorship"
                            {{ $businessAccountType === 'Sole Proprietorship' ? 'selected' : '' }}
                        >
                            Sole Proprietorship
                        </option>

                        <option
                            value="Partnership"
                            {{ $businessAccountType === 'Partnership' ? 'selected' : '' }}
                        >
                            Partnership
                        </option>

                        <option
                            value="OPC"
                            {{ $businessAccountType === 'OPC' ? 'selected' : '' }}
                        >
                            OPC
                        </option>

                        <option
                            value="Corporation"
                            {{ $businessAccountType === 'Corporation' ? 'selected' : '' }}
                        >
                            Corporation
                        </option>

                        <option
                            value="Association / Nonprofit"
                            {{ $businessAccountType === 'Association / Nonprofit' ? 'selected' : '' }}
                        >
                            Association / Nonprofit
                        </option>

                        <option
                            value="Cooperative"
                            {{ $businessAccountType === 'Cooperative' ? 'selected' : '' }}
                        >
                            Cooperative
                        </option>

                        <option
                            value="Government / Public Entity"
                            {{ $businessAccountType === 'Government / Public Entity' ? 'selected' : '' }}
                        >
                            Government / Public Entity
                        </option>

                        <option
                            value="Other"
                            {{ $businessAccountType === 'Other' ? 'selected' : '' }}
                        >
                            Other
                        </option>

                    </select>


                    <svg
                        class="select-arrow"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >

                        <path d="M6 9L12 15L18 9"/>

                    </svg>

                </div>


                @error('business_account_type')

                    <div class="field-error">
                        {{ $message }}
                    </div>

                @enderror


                <div class="field-hint">
                    Select the legal structure of the business or organization.
                </div>

            </div>


            {{-- =================================================
                 REGISTERED / LEGAL NAME
            ================================================== --}}

            <div class="form-group">

                <label for="registered_name">

                    Registered / Legal Name

                    <span class="required">
                        *
                    </span>

                </label>


                <input
                    type="text"
                    id="registered_name"
                    name="registered_name"
                    value="{{ $registeredName }}"
                    placeholder="Enter your registered or legal name"
                    maxlength="255"
                    autocomplete="organization"
                    class="{{ $errors->has('registered_name') ? 'input-error' : '' }}"
                    required
                >


                @error('registered_name')

                    <div class="field-error">
                        {{ $message }}
                    </div>

                @enderror


                <div class="field-hint">
                    Use the official name of the business or organization.
                </div>

            </div>


            {{-- =================================================
                 INDUSTRY
            ================================================== --}}

            <div class="form-group">

                <label for="industry">

                    Industry

                    <span class="required">
                        *
                    </span>

                </label>


                <input
                    type="text"
                    id="industry"
                    name="industry"
                    value="{{ $industry }}"
                    placeholder="e.g. Information Technology, Healthcare, Retail"
                    maxlength="255"
                    autocomplete="organization-title"
                    class="{{ $errors->has('industry') ? 'input-error' : '' }}"
                    required
                >


                @error('industry')

                    <div class="field-error">
                        {{ $message }}
                    </div>

                @enderror


                <div class="field-hint">
                    Tell us what type of business or organization this is.
                </div>

            </div>


            {{-- =================================================
                 COUNTRY / REGION
            ================================================== --}}

            <div class="form-group">

                <label for="country">

                    Country / Region

                    <span class="required">
                        *
                    </span>

                </label>


                <div class="select-wrapper">

                    <select
                        id="country"
                        name="country"
                        class="{{ $errors->has('country') ? 'input-error' : '' }}"
                        required
                    >

                        <option value="">
                            Select country / region
                        </option>

                        <option
                            value="Philippines"
                            {{ $country === 'Philippines' ? 'selected' : '' }}
                        >
                            Philippines
                        </option>

                        <option
                            value="United States"
                            {{ $country === 'United States' ? 'selected' : '' }}
                        >
                            United States
                        </option>

                        <option
                            value="Singapore"
                            {{ $country === 'Singapore' ? 'selected' : '' }}
                        >
                            Singapore
                        </option>

                        <option
                            value="United Kingdom"
                            {{ $country === 'United Kingdom' ? 'selected' : '' }}
                        >
                            United Kingdom
                        </option>

                        <option
                            value="Canada"
                            {{ $country === 'Canada' ? 'selected' : '' }}
                        >
                            Canada
                        </option>

                        <option
                            value="Australia"
                            {{ $country === 'Australia' ? 'selected' : '' }}
                        >
                            Australia
                        </option>

                        <option
                            value="Other"
                            {{ $country === 'Other' ? 'selected' : '' }}
                        >
                            Other
                        </option>

                    </select>


                    <svg
                        class="select-arrow"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >

                        <path d="M6 9L12 15L18 9"/>

                    </svg>

                </div>


                @error('country')

                    <div class="field-error">
                        {{ $message }}
                    </div>

                @enderror


                <div class="field-hint">
                    Select the primary country or region of the organization.
                </div>

            </div>

        </section>


        {{-- =====================================================
             INFORMATION NOTE
        ====================================================== --}}

        <div class="information-note">

            <div class="information-note-icon">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >

                    <circle
                        cx="12"
                        cy="12"
                        r="9"
                    />

                    <path d="M12 11V16"/>

                    <path d="M12 8H12.01"/>

                </svg>

            </div>


            <div>

                <strong>
                    Keep it simple for now.
                </strong>

                <p>
                    We only need the essential information to create
                    your workspace. Additional business details can
                    be completed later from your account profile.
                </p>

            </div>

        </div>


        {{-- =====================================================
             ACTIONS
        ====================================================== --}}

        <div class="registration-actions">

            <a
                href="{{ route('register.account') }}"
                class="btn btn-secondary"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >

                    <path d="M19 12H5"/>

                    <path d="M11 18L5 12L11 6"/>

                </svg>

                <span>
                    Back
                </span>

            </a>


            <button
                type="submit"
                class="btn btn-primary"
            >

                <span>
                    Continue
                </span>

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    aria-hidden="true"
                >

                    <path d="M5 12H19"/>

                    <path d="M13 6L19 12L13 18"/>

                </svg>

            </button>

        </div>

    </form>


    {{-- =========================================================
         FOOTER
    ========================================================== --}}

    <footer class="registration-footer">

        <strong>
            ORDO
        </strong>

        <span>
            •
        </span>

        <span>
            Secure account registration
        </span>

    </footer>

</div>




@endsection