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


<style>

/* ================================================================
   PAGE
================================================================ */

.business-registration-page {
    width: 100%;
    max-width: 720px;
    margin: 0 auto;
    padding: 38px 52px 48px;

    color: #06172f;

    font-family:
        Inter,
        ui-sans-serif,
        system-ui,
        -apple-system,
        BlinkMacSystemFont,
        "Segoe UI",
        sans-serif;

    -webkit-font-smoothing: antialiased;
}


/* ================================================================
   TOP BAR
================================================================ */

.registration-topbar {
    display: flex;
    align-items: center;
    justify-content: flex-end;

    width: 100%;
    min-height: 16px;

    margin-bottom: 28px;
}

.signin-text {
    color: #8a96a8;
    font-size: 9px;
    line-height: 1.4;
}

.signin-text a {
    margin-left: 3px;

    color: #2563eb;

    font-weight: 800;
    text-decoration: none;
}

.signin-text a:hover {
    text-decoration: underline;
}


/* ================================================================
   PROGRESS BAR
================================================================ */

.registration-progress {
    display: flex;
    align-items: center;

    width: 100%;

    gap: 7px;

    margin-bottom: 31px;
}

.progress-segment {
    flex: 1;

    height: 4px;
    min-width: 0;

    border-radius: 999px;

    background: #e3e8ef;
}

.progress-segment.completed,
.progress-segment.active {
    background: #3478f6;
}


/* ================================================================
   HEADER
================================================================ */

.registration-header {
    margin-bottom: 28px;
}

.registration-eyebrow {
    margin-bottom: 12px;

    color: #2563eb;

    font-size: 10px;
    font-weight: 850;

    letter-spacing: .14em;
}

.registration-header h1 {
    margin: 0;

    color: #06172f;

    font-size: 34px;
    line-height: 1.08;

    letter-spacing: -.045em;

    font-weight: 850;
}

.registration-header p {
    max-width: 620px;

    margin: 13px 0 0;

    color: #718096;

    font-size: 12px;
    line-height: 1.7;
}


/* ================================================================
   VALIDATION ALERT
================================================================ */

.form-alert {
    display: flex;
    align-items: flex-start;

    gap: 10px;

    margin-bottom: 21px;
    padding: 12px 13px;

    border: 1px solid #f0cccc;
    border-radius: 9px;

    background: #fff8f8;

    color: #8f2424;

    font-size: 10px;
    line-height: 1.5;
}

.form-alert-icon {
    width: 22px;
    height: 22px;

    flex: 0 0 22px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #c93636;

    color: #ffffff;

    font-size: 11px;
    font-weight: 800;
}

.form-alert-content strong {
    display: block;

    margin-bottom: 4px;

    font-weight: 800;
}

.form-alert-content ul {
    margin: 0;
    padding-left: 16px;
}


/* ================================================================
   ACCOUNT SUMMARY
================================================================ */

.account-summary {
    display: flex;
    align-items: center;

    gap: 13px;

    margin-bottom: 26px;
    padding: 14px;

    border: 1px solid #dce4ee;
    border-radius: 11px;

    background: #f8fafc;
}

.account-summary-icon {
    width: 40px;
    height: 40px;

    flex: 0 0 40px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: #eff6ff;
    color: #2563eb;
}

.account-summary-icon svg {
    width: 20px;
    height: 20px;
}

.account-summary-content {
    min-width: 0;
}

.summary-eyebrow {
    display: block;

    margin-bottom: 3px;

    color: #2563eb;

    font-size: 8px;
    font-weight: 850;

    letter-spacing: .13em;
}

.account-summary-content strong {
    display: block;

    color: #06172f;

    font-size: 13px;
    font-weight: 800;
}

.account-summary-content p {
    margin: 3px 0 0;

    color: #718096;

    font-size: 9.5px;
    line-height: 1.5;
}


/* ================================================================
   FORM
================================================================ */

.form-section {
    width: 100%;
}

.registration-form {
    width: 100%;
}


/* ================================================================
   FORM GROUP
================================================================ */

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;

    margin-bottom: 7px;

    color: #1e2d43;

    font-size: 10.5px;
    font-weight: 800;
}

.required {
    margin-left: 2px;

    color: #c93636;
}


/* ================================================================
   INPUT / SELECT
================================================================ */

.form-group input,
.form-group select {
    width: 100%;
    height: 44px;

    box-sizing: border-box;

    padding: 0 13px;

    border: 1px solid #ccd7e4;
    border-radius: 8px;

    outline: none;

    background: #ffffff;
    color: #06172f;

    font-family: inherit;
    font-size: 11.5px;

    transition:
        border-color .18s ease,
        box-shadow .18s ease,
        background .18s ease;
}

.form-group input::placeholder {
    color: #9ba7b8;
}

.form-group input:hover,
.form-group select:hover {
    border-color: #b9c6d6;
}

.form-group input:focus,
.form-group select:focus {
    border-color: #3478f6;

    box-shadow:
        0 0 0 3px
        rgba(52, 120, 246, .10);
}

.form-group input.input-error,
.form-group select.input-error {
    border-color: #dc2626;
}

.form-group input.input-error:focus,
.form-group select.input-error:focus {
    border-color: #dc2626;

    box-shadow:
        0 0 0 3px
        rgba(220, 38, 38, .10);
}


/* ================================================================
   FIELD HINT / ERROR
================================================================ */

.field-hint {
    margin-top: 5px;

    color: #8b97a8;

    font-size: 8.5px;
    line-height: 1.5;
}

.field-error {
    margin-top: 5px;

    color: #b42318;

    font-size: 9px;
    line-height: 1.5;
}


/* ================================================================
   SELECT
================================================================ */

.select-wrapper {
    position: relative;
}

.select-wrapper select {
    appearance: none;
    -webkit-appearance: none;

    padding-right: 40px;

    cursor: pointer;
}

.select-arrow {
    position: absolute;

    top: 50%;
    right: 13px;

    width: 16px;
    height: 16px;

    color: #718096;

    transform: translateY(-50%);

    pointer-events: none;
}

.select-wrapper:focus-within .select-arrow {
    color: #2563eb;
}


/* ================================================================
   INFORMATION NOTE
================================================================ */

.information-note {
    display: flex;
    align-items: flex-start;

    gap: 10px;

    margin-top: 22px;
    padding: 12px;

    border: 1px solid #d8e5f7;
    border-radius: 9px;

    background: #f5f9ff;
}

.information-note-icon {
    width: 28px;
    height: 28px;

    flex: 0 0 28px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background: #e8f1ff;
    color: #2563eb;
}

.information-note-icon svg {
    width: 15px;
    height: 15px;
}

.information-note strong {
    display: block;

    margin-bottom: 3px;

    color: #26364d;

    font-size: 10px;
    font-weight: 800;
}

.information-note p {
    margin: 0;

    color: #718096;

    font-size: 8.5px;
    line-height: 1.55;
}


/* ================================================================
   ACTIONS
================================================================ */

.registration-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    margin-top: 22px;
    padding-top: 20px;

    border-top: 1px solid #e8edf3;
}

.btn {
    min-height: 43px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 8px;

    box-sizing: border-box;

    padding: 0 17px;

    border-radius: 8px;

    font-family: inherit;
    font-size: 10px;
    font-weight: 800;

    text-decoration: none;

    cursor: pointer;

    transition:
        transform .15s ease,
        background .18s ease,
        border-color .18s ease,
        box-shadow .18s ease,
        color .18s ease;
}

.btn:hover {
    transform: translateY(-1px);
}

.btn svg {
    width: 15px;
    height: 15px;
}


/* ================================================================
   SECONDARY BUTTON
================================================================ */

.btn-secondary {
    border: 1px solid #d5dee9;

    background: #ffffff;

    color: #46546a;
}

.btn-secondary:hover {
    background: #f8fafc;

    border-color: #c2cedc;

    color: #26364d;
}


/* ================================================================
   PRIMARY BUTTON
================================================================ */

.btn-primary {
    min-width: 118px;

    border: 1px solid #3478f6;

    background: #3478f6;

    color: #ffffff;

    box-shadow:
        0 6px 18px
        rgba(52, 120, 246, .18);
}

.btn-primary:hover {
    background: #2563eb;

    border-color: #2563eb;

    box-shadow:
        0 8px 22px
        rgba(52, 120, 246, .22);
}

.btn-primary:focus-visible,
.btn-secondary:focus-visible {
    outline: none;

    box-shadow:
        0 0 0 3px
        rgba(52, 120, 246, .14);
}


/* ================================================================
   FOOTER
================================================================ */

.registration-footer {
    display: flex;
    align-items: center;
    justify-content: center;

    gap: 7px;

    margin-top: 24px;

    color: #a0a9b6;

    font-size: 8px;
}

.registration-footer strong {
    color: #2563eb;

    letter-spacing: .08em;
}


/* ================================================================
   TABLET
================================================================ */

@media (max-width: 1050px) {

    .business-registration-page {
        padding: 35px 45px 45px;
    }

    .registration-header h1 {
        font-size: 33px;
    }

}


/* ================================================================
   MOBILE
================================================================ */

@media (max-width: 760px) {

    .business-registration-page {
        max-width: 100%;

        padding: 30px 24px 40px;
    }

    .registration-topbar {
        justify-content: flex-end;
    }

    .signin-text {
        text-align: right;
    }

    .registration-progress {
        gap: 5px;

        margin-bottom: 29px;
    }

    .progress-segment {
        height: 4px;
    }

    .registration-header h1 {
        font-size: 31px;
    }

    .registration-header p {
        font-size: 11.5px;
    }

}


/* ================================================================
   SMALL MOBILE
================================================================ */

@media (max-width: 430px) {

    .business-registration-page {
        padding: 26px 18px 35px;
    }

    .registration-topbar {
        justify-content: flex-end;
    }

    .signin-text {
        text-align: right;
    }

    .registration-header h1 {
        font-size: 29px;
    }

    .account-summary {
        align-items: flex-start;
    }

    .registration-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .btn {
        width: 100%;
    }

}

</style>

@endsection