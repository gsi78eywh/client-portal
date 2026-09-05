@extends('layouts.registration')

@section('title', 'Your professional account — ORDO')

@section('content')

<style>
    /* =========================================================
       ORDO REGISTRATION
       PROFESSIONAL ACCOUNT
       STEP 3 OF 6
       ========================================================= */

    .registration-page {
        width: 100%;
        max-width: 760px;
        margin: 0 auto;
        padding: 0;
    }

    /* =========================================================
       TOP ACCOUNT AREA
       ========================================================= */

    .registration-top {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        margin-bottom: 26px;
    }

    .registration-account-link {
        color: #64748b;
        font-size: 11px;
        line-height: 1.4;
        text-decoration: none;
        transition: color 0.18s ease;
    }

    .registration-account-link strong {
        color: #2563eb;
        font-weight: 700;
    }

    .registration-account-link:hover {
        color: #06172f;
    }

    .registration-account-link:hover strong {
        text-decoration: underline;
    }

    /* =========================================================
       PROGRESS BAR
       6 STEPS
       STEP 3 ACTIVE
       ========================================================= */

    .registration-progress {
        display: flex;
        align-items: center;
        width: 100%;
        gap: 7px;
        margin: 0 0 30px;
    }

    .progress-segment {
        flex: 1;
        height: 4px;
        min-width: 0;
        border-radius: 999px;
        background: #e2e8f0;
    }

    .progress-segment.completed,
    .progress-segment.active {
        background: #2563eb;
    }

    /* =========================================================
       HEADER
       ========================================================= */

    .registration-header {
        margin-bottom: 27px;
    }

    .registration-eyebrow {
        margin: 0 0 9px;
        color: #2563eb;
        font-size: 10px;
        font-weight: 800;
        letter-spacing: 0.13em;
        line-height: 1.2;
        text-transform: uppercase;
    }

    .registration-header h1 {
        margin: 0 0 9px;
        color: #06172f;
        font-size: 31px;
        line-height: 1.12;
        font-weight: 800;
        letter-spacing: -0.035em;
    }

    .registration-header p {
        max-width: 680px;
        margin: 0;
        color: #64748b;
        font-size: 13px;
        line-height: 1.65;
    }

    /* =========================================================
       ACCOUNT TYPE CARD
       ========================================================= */

    .account-type-card {
        display: flex;
        align-items: center;
        gap: 13px;
        width: 100%;
        margin-bottom: 23px;
        padding: 14px 15px;
        border: 1px solid #dbe3ed;
        border-radius: 11px;
        background: #f8fafc;
    }

    .account-type-icon {
        width: 38px;
        height: 38px;
        min-width: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #eff6ff;
        color: #2563eb;
    }

    .account-type-icon svg {
        width: 20px;
        height: 20px;
    }

    .account-type-content {
        min-width: 0;
    }

    .account-type-eyebrow {
        margin-bottom: 2px;
        color: #2563eb;
        font-size: 8px;
        font-weight: 800;
        letter-spacing: 0.10em;
        line-height: 1.2;
        text-transform: uppercase;
    }

    .account-type-title {
        color: #06172f;
        font-size: 12px;
        font-weight: 750;
        line-height: 1.35;
    }

    .account-type-description {
        margin-top: 2px;
        color: #64748b;
        font-size: 10px;
        line-height: 1.45;
    }

    /* =========================================================
       FORM
       ========================================================= */

    .registration-form {
        width: 100%;
    }

    .form-group {
        margin-bottom: 19px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        color: #06172f;
        font-size: 11px;
        font-weight: 750;
        line-height: 1.3;
    }

    .required {
        margin-left: 2px;
        color: #dc2626;
    }

    .optional {
        margin-left: 3px;
        color: #94a3b8;
        font-weight: 500;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #cbd5e1;
        border-radius: 9px;
        outline: none;
        background: #ffffff;
        color: #06172f;
        font-family: inherit;
        font-size: 12px;
        transition:
            border-color 0.18s ease,
            box-shadow 0.18s ease,
            background 0.18s ease;
    }

    .form-group input,
    .form-group select {
        height: 44px;
        padding: 0 13px;
    }

    .form-group textarea {
        min-height: 92px;
        padding: 12px 13px;
        resize: vertical;
        line-height: 1.5;
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #94a3b8;
    }

    .form-group input:hover,
    .form-group select:hover,
    .form-group textarea:hover {
        border-color: #94a3b8;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
    }

    /* =========================================================
       SELECT
       ========================================================= */

    .select-wrapper {
        position: relative;
    }

    .select-wrapper select {
        appearance: none;
        -webkit-appearance: none;
        padding-right: 38px;
        cursor: pointer;
    }

    .select-arrow {
        position: absolute;
        top: 50%;
        right: 13px;
        width: 17px;
        height: 17px;
        transform: translateY(-50%);
        pointer-events: none;
        color: #64748b;
    }

    /* =========================================================
       HELP / ERRORS
       ========================================================= */

    .field-help {
        margin-top: 6px;
        color: #94a3b8;
        font-size: 9px;
        line-height: 1.5;
    }

    .field-error {
        margin-top: 6px;
        color: #dc2626;
        font-size: 10px;
        font-weight: 600;
        line-height: 1.4;
    }

    /* =========================================================
       FORM ALERT
       ========================================================= */

    .form-alert {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 20px;
        padding: 12px 13px;
        border: 1px solid #fecaca;
        border-radius: 10px;
        background: #fef2f2;
        color: #991b1b;
        font-size: 11px;
        line-height: 1.5;
    }

    .form-alert-icon {
        width: 19px;
        height: 19px;
        min-width: 19px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #dc2626;
        color: #ffffff;
        font-size: 10px;
        font-weight: 800;
    }

    .form-alert-content {
        min-width: 0;
    }

    .form-alert-content strong {
        display: block;
        margin-bottom: 3px;
        font-weight: 750;
    }

    .form-alert-content ul {
        margin: 0;
        padding-left: 17px;
    }

    .form-alert-content li + li {
        margin-top: 2px;
    }

    /* =========================================================
       ACTIONS
       ========================================================= */

    .registration-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        margin-top: 24px;
        padding-top: 18px;
        border-top: 1px solid #e2e8f0;
    }

    .btn-primary,
    .btn-secondary {
        min-height: 44px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        box-sizing: border-box;
        padding: 0 18px;
        border-radius: 10px;
        font-family: inherit;
        font-size: 11px;
        font-weight: 750;
        text-decoration: none;
        cursor: pointer;
        transition:
            transform 0.15s ease,
            background 0.15s ease,
            border-color 0.15s ease,
            box-shadow 0.15s ease,
            color 0.15s ease;
    }

    /* =========================================================
       PRIMARY BUTTON
       ========================================================= */

    .btn-primary {
        min-width: 142px;
        border: 1px solid #2563eb;
        background: #2563eb;
        color: #ffffff;
        box-shadow:
            0 7px 16px rgba(37, 99, 235, 0.18);
    }

    .btn-primary:hover {
        border-color: #1d4ed8;
        background: #1d4ed8;
        transform: translateY(-1px);
        box-shadow:
            0 9px 20px rgba(37, 99, 235, 0.23);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    .btn-primary:focus-visible,
    .btn-secondary:focus-visible,
    .registration-account-link:focus-visible {
        outline: none;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.16);
    }

    /* =========================================================
       SECONDARY BUTTON
       ========================================================= */

    .btn-secondary {
        border: 0;
        background: transparent;
        color: #64748b;
    }

    .btn-secondary:hover {
        background: #f8fafc;
        color: #06172f;
    }

    .btn-arrow {
        font-size: 15px;
        line-height: 1;
    }

    /* =========================================================
       RESPONSIVE
       ========================================================= */

    @media (max-width: 900px) {
        .registration-page {
            max-width: 680px;
        }
    }

    @media (max-width: 700px) {
        .registration-page {
            padding: 0 16px 45px;
        }

        .registration-top {
            margin-bottom: 20px;
        }

        .registration-account-link {
            display: none;
        }

        .registration-progress {
            margin-bottom: 25px;
        }

        .registration-header h1 {
            font-size: 28px;
        }

        .registration-header p {
            font-size: 12px;
        }

        .account-type-card {
            padding: 13px;
        }

        .registration-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .btn-primary,
        .btn-secondary {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .registration-header h1 {
            font-size: 25px;
        }

        .registration-header p {
            font-size: 12px;
        }

        .progress-segment {
            height: 3px;
        }

        .account-type-title {
            font-size: 11px;
        }

        .account-type-description {
            font-size: 9px;
        }
    }

    /* =========================================================
       REDUCED MOTION
       ========================================================= */

    @media (prefers-reduced-motion: reduce) {
        .registration-account-link,
        .form-group input,
        .form-group select,
        .form-group textarea,
        .btn-primary,
        .btn-secondary {
            transition: none;
        }
    }
</style>


<div class="registration-page">

    {{-- =========================================================
         TOP ACCOUNT AREA
    ========================================================== --}}

    <div class="registration-top">

        <a
            href="{{ route('login') }}"
            class="registration-account-link"
        >
            Already have an account?
            <strong>Sign in</strong>
        </a>

    </div>


    {{-- =========================================================
         6-STEP PROGRESS
         STEP 1 = COMPLETED
         STEP 2 = COMPLETED
         STEP 3 = ACTIVE
         STEP 4 = PENDING
         STEP 5 = PENDING
         STEP 6 = PENDING
    ========================================================== --}}

    <div
        class="registration-progress"
        role="progressbar"
        aria-label="Registration progress"
        aria-valuemin="1"
        aria-valuemax="6"
        aria-valuenow="3"
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
         HEADER
    ========================================================== --}}

    <div class="registration-header">

        <div class="registration-eyebrow">
            Create your ORDO account
        </div>

        <h1>
            Your professional account
        </h1>

        <p>
            Tell us about your profession or practice.
            You can provide more complete profile details later.
        </p>

    </div>


    {{-- =========================================================
         VALIDATION ERRORS
    ========================================================== --}}

    @if ($errors->any())

        <div
            class="form-alert"
            role="alert"
            aria-live="polite"
        >

            <div
                class="form-alert-icon"
                aria-hidden="true"
            >
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
        action="{{ route('profession.update') }}"
        class="registration-form"
    >

        @csrf


        {{-- =====================================================
             ACCOUNT TYPE
        ====================================================== --}}

        <div class="account-type-card">

            <div class="account-type-icon">

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
                        cy="8"
                        r="3.5"
                    />

                    <path
                        d="M5 20c.8-3.3 3.1-5 7-5s6.2 1.7 7 5"
                    />
                </svg>

            </div>

            <div class="account-type-content">

                <div class="account-type-eyebrow">
                    Account type
                </div>

                <div class="account-type-title">
                    Professional / Practice account
                </div>

                <div class="account-type-description">
                    For professionals, practitioners and independent practices.
                </div>

            </div>

        </div>


        {{-- =====================================================
             PROFESSIONAL / PRACTICE NAME
        ====================================================== --}}

        <div class="form-group">

            <label for="practice_name">

                Professional / Practice Name

                <span class="required">
                    *
                </span>

            </label>

            <input
                type="text"
                id="practice_name"
                name="practice_name"
                value="{{ old('practice_name', $information['practice_name'] ?? '') }}"
                placeholder="Enter your professional or practice name"
                maxlength="150"
                autocomplete="organization"
                required
            >

            <div class="field-help">
                Use the name you want associated with your ORDO account.
            </div>

            @error('practice_name')
                <div class="field-error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- =====================================================
             PROFESSION / PRACTICE TYPE
        ====================================================== --}}

        <div class="form-group">

            <label for="profession">

                Profession / Practice Type

                <span class="required">
                    *
                </span>

            </label>

            <div class="select-wrapper">

                <select
                    id="profession"
                    name="profession"
                    required
                >

                    <option value="">
                        Select a type
                    </option>

                    <option
                        value="Professional"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Professional'
                        )
                    >
                        Professional
                    </option>

                    <option
                        value="Practitioner"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Practitioner'
                        )
                    >
                        Practitioner
                    </option>

                    <option
                        value="Consultant"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Consultant'
                        )
                    >
                        Consultant
                    </option>

                    <option
                        value="Clinic"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Clinic'
                        )
                    >
                        Clinic
                    </option>

                    <option
                        value="Office"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Office'
                        )
                    >
                        Office
                    </option>

                    <option
                        value="Independent Practice"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Independent Practice'
                        )
                    >
                        Independent Practice
                    </option>

                    <option
                        value="Other"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Other'
                        )
                    >
                        Other
                    </option>

                </select>

                <svg
                    class="select-arrow"
                    viewBox="0 0 24 24"
                    fill="none"
                    aria-hidden="true"
                >
                    <path
                        d="M6 9l6 6 6-6"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>

            </div>

            @error('profession')
                <div class="field-error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- =====================================================
             DESCRIPTION
        ====================================================== --}}

        <div class="form-group">

            <label for="description">

                Description

                <span class="optional">
                    (optional)
                </span>

            </label>

            <textarea
                id="description"
                name="description"
                rows="4"
                maxlength="1000"
                placeholder="Briefly describe your profession, practice or services."
            >{{ old('description', $information['description'] ?? '') }}</textarea>

            <div class="field-help">
                You can provide more complete profile details later.
            </div>

            @error('description')
                <div class="field-error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- =====================================================
             COUNTRY / REGION
        ====================================================== --}}

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
                    required
                >

                    <option value="">
                        Select country / region
                    </option>

                    <option
                        value="Philippines"
                        @selected(
                            old(
                                'country',
                                $information['country'] ?? 'Philippines'
                            ) === 'Philippines'
                        )
                    >
                        Philippines
                    </option>

                    <option
                        value="United States"
                        @selected(
                            old(
                                'country',
                                $information['country'] ?? ''
                            ) === 'United States'
                        )
                    >
                        United States
                    </option>

                    <option
                        value="Singapore"
                        @selected(
                            old(
                                'country',
                                $information['country'] ?? ''
                            ) === 'Singapore'
                        )
                    >
                        Singapore
                    </option>

                    <option
                        value="Other"
                        @selected(
                            old(
                                'country',
                                $information['country'] ?? ''
                            ) === 'Other'
                        )
                    >
                        Other
                    </option>

                </select>

                <svg
                    class="select-arrow"
                    viewBox="0 0 24 24"
                    fill="none"
                    aria-hidden="true"
                >
                    <path
                        d="M6 9l6 6 6-6"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>

            </div>

            @error('country')
                <div class="field-error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- =====================================================
             ACTIONS
        ====================================================== --}}

        <div class="registration-actions">

            <a
                href="{{ route('register.account') }}"
                class="btn-secondary"
            >

                <span
                    class="btn-arrow"
                    aria-hidden="true"
                >
                    ←
                </span>

                Back to Account

            </a>


            <button
                type="submit"
                class="btn-primary"
            >

                Continue

                <span
                    class="btn-arrow"
                    aria-hidden="true"
                >
                    →
                </span>

            </button>

        </div>

    </form>

</div>

@endsection