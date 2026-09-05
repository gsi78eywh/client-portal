<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="theme-color"
        content="#06172f"
    >

    <title>Account information — ORDO</title>

    <style>

        /* =========================================================
           RESET
        ========================================================== */

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            min-height: 100%;
        }

        body {
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: #f7f9fc;
            color: #06172f;

            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        a {
            -webkit-tap-highlight-color: transparent;
        }


        /* =========================================================
           PAGE
        ========================================================== */

        .registration-page {
            min-height: 100vh;

            display: flex;
            flex-direction: column;

            background: #f7f9fc;
        }


        /* =========================================================
           HEADER
        ========================================================== */

        .registration-header {
            height: 76px;

            padding: 0 48px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            background: #ffffff;

            border-bottom: 1px solid #e8edf3;
        }

        .brand {
            display: inline-flex;
            align-items: center;

            gap: 10px;

            color: #06172f;

            text-decoration: none;
        }

        .brand-mark {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: #06172f;
            color: #ffffff;

            font-size: 14px;
            font-weight: 800;

            letter-spacing: 0.08em;
        }

        .brand-name {
            font-size: 19px;
            font-weight: 800;

            letter-spacing: -0.02em;
        }

        .header-help {
            color: #6c7788;

            font-size: 13px;
            font-weight: 600;
        }


        /* =========================================================
           PROGRESS
        ========================================================== */

        .registration-progress {
            width: 100%;

            padding: 24px 48px 0;

            display: flex;
            justify-content: center;
        }

        .progress-inner {
            width: min(760px, 100%);

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .progress-step {
            display: flex;
            align-items: center;

            gap: 8px;

            white-space: nowrap;
        }

        .progress-number {
            width: 30px;
            height: 30px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #eef2f7;
            color: #7c8797;

            font-size: 12px;
            font-weight: 800;
        }

        .progress-label {
            color: #7c8797;

            font-size: 12px;
            font-weight: 700;
        }

        .progress-step.active .progress-number {
            background: #06172f;
            color: #ffffff;
        }

        .progress-step.active .progress-label {
            color: #06172f;
        }

        .progress-step.completed .progress-number {
            background: #dfe8f3;
            color: #06172f;
        }

        .progress-step.completed .progress-label {
            color: #06172f;
        }

        .progress-line {
            width: 72px;
            height: 1px;

            flex-shrink: 0;

            margin: 0 12px;

            background: #dfe5ec;
        }


        /* =========================================================
           MAIN
        ========================================================== */

        .registration-main {
            flex: 1;

            width: min(1080px, calc(100% - 48px));

            margin: 0 auto;

            padding: 48px 0 64px;
        }

        .registration-content {
            width: 100%;
            max-width: 760px;

            margin: 0 auto;
        }


        /* =========================================================
           INTRO
        ========================================================== */

        .intro {
            text-align: center;

            margin-bottom: 32px;
        }

        .eyebrow {
            margin-bottom: 10px;

            color: #718096;

            font-size: 11px;
            font-weight: 800;

            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .intro h1 {
            color: #06172f;

            font-size: clamp(30px, 4vw, 42px);
            line-height: 1.1;

            letter-spacing: -0.035em;
        }

        .intro p {
            max-width: 650px;

            margin: 13px auto 0;

            color: #667386;

            font-size: 15px;
            line-height: 1.7;
        }


        /* =========================================================
           ERROR
        ========================================================== */

        .error-box {
            margin-bottom: 22px;

            padding: 14px 16px;

            border: 1px solid #f1c4c4;
            border-radius: 12px;

            background: #fff7f7;
            color: #a12828;

            font-size: 13px;
            line-height: 1.55;
        }

        .error-box strong {
            display: block;

            margin-bottom: 4px;
        }


        /* =========================================================
           CARD
        ========================================================== */

        .information-card {
            padding: 30px;

            border: 1px solid #dfe5ed;
            border-radius: 18px;

            background: #ffffff;

            box-shadow:
                0 8px 28px rgba(6, 23, 47, 0.04);
        }


        /* =========================================================
           ACCOUNT SUMMARY
        ========================================================== */

        .account-summary {
            display: flex;
            align-items: center;

            gap: 14px;

            margin-bottom: 30px;
            padding-bottom: 24px;

            border-bottom: 1px solid #edf1f5;
        }

        .summary-icon {
            width: 46px;
            height: 46px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: #f0f4f8;
            color: #06172f;
        }

        .summary-icon svg {
            width: 21px;
            height: 21px;
        }

        .summary-content {
            min-width: 0;
        }

        .summary-label {
            margin-bottom: 3px;

            color: #8993a1;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .summary-title {
            color: #06172f;

            font-size: 15px;
            font-weight: 800;
        }


        /* =========================================================
           FORM SECTION
        ========================================================== */

        .form-section {
            margin-bottom: 30px;
        }

        .section-heading {
            margin-bottom: 18px;
        }

        .section-heading h2 {
            color: #06172f;

            font-size: 16px;
            font-weight: 800;

            line-height: 1.4;
        }

        .section-heading p {
            margin-top: 5px;

            color: #7a8595;

            font-size: 12px;
            line-height: 1.55;
        }


        /* =========================================================
           FORM GRID
        ========================================================== */

        .form-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 18px;
        }

        .form-group {
            min-width: 0;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;

            margin-bottom: 7px;

            color: #26354a;

            font-size: 12px;
            font-weight: 800;
        }

        .required {
            color: #b42318;
        }


        /* =========================================================
           INPUTS
        ========================================================== */

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;

            border: 1px solid #d8e0e9;
            border-radius: 10px;

            background: #ffffff;
            color: #06172f;

            outline: none;

            transition:
                border-color 0.18s ease,
                box-shadow 0.18s ease,
                background 0.18s ease;
        }

        .form-input,
        .form-select {
            height: 46px;

            padding: 0 13px;

            font-size: 13px;
        }

        .form-textarea {
            min-height: 100px;

            padding: 12px 13px;

            resize: vertical;

            font-size: 13px;
            line-height: 1.55;
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: #a2abb8;
        }

        .form-input:hover,
        .form-select:hover,
        .form-textarea:hover {
            border-color: #c5cfdb;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #06172f;

            box-shadow:
                0 0 0 3px rgba(6, 23, 47, 0.08);
        }

        .form-input.is-invalid,
        .form-select.is-invalid,
        .form-textarea.is-invalid {
            border-color: #c53030;
        }

        .form-input.is-invalid:focus,
        .form-select.is-invalid:focus,
        .form-textarea.is-invalid:focus {
            box-shadow:
                0 0 0 3px rgba(197, 48, 48, 0.08);
        }


        /* =========================================================
           HELP / ERROR
        ========================================================== */

        .field-error {
            margin-top: 6px;

            color: #b42318;

            font-size: 11px;
            line-height: 1.45;
        }

        .field-help {
            margin-top: 6px;

            color: #8993a1;

            font-size: 11px;
            line-height: 1.5;
        }


        /* =========================================================
           ACCOUNT SECTIONS
        ========================================================== */

        .account-section {
            display: none;
        }

        .account-section.active {
            display: block;
        }


        /* =========================================================
           INVITATION NOTICE
        ========================================================== */

        .info-notice {
            margin-top: 20px;

            padding: 14px 15px;

            border: 1px solid #e2e8f0;
            border-radius: 10px;

            background: #f8fafc;
            color: #687589;

            font-size: 11px;
            line-height: 1.6;
        }

        .info-notice strong {
            color: #26354a;
        }


        /* =========================================================
           FORM FOOTER
        ========================================================== */

        .form-footer {
            margin-top: 28px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;

            min-height: 46px;

            color: #667386;

            text-decoration: none;

            font-size: 13px;
            font-weight: 700;

            transition: color 0.18s ease;
        }

        .back-link:hover {
            color: #06172f;
        }

        .continue-button {
            min-width: 160px;
            min-height: 48px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 9px;

            padding: 0 22px;

            border: 0;
            border-radius: 10px;

            background: #06172f;
            color: #ffffff;

            font-size: 13px;
            font-weight: 800;

            text-decoration: none;

            transition:
                background 0.18s ease,
                transform 0.18s ease,
                box-shadow 0.18s ease;
        }

        .continue-button:hover {
            background: #0b2346;

            box-shadow:
                0 8px 22px rgba(6, 23, 47, 0.16);

            transform: translateY(-1px);
        }

        .continue-button:active {
            transform: translateY(0);
        }

        .continue-button:disabled {
            cursor: not-allowed;

            opacity: 0.65;

            transform: none;
            box-shadow: none;
        }

        .continue-button svg {
            width: 16px;
            height: 16px;
        }


        /* =========================================================
           FOOTER
        ========================================================== */

        .registration-footer {
            padding: 22px 48px;

            text-align: center;

            color: #8993a1;

            font-size: 11px;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================== */

        @media (max-width: 760px) {

            .registration-header {
                height: 68px;

                padding: 0 20px;
            }

            .header-help {
                display: none;
            }

            .registration-progress {
                padding: 20px 20px 0;
            }

            .progress-label {
                display: none;
            }

            .progress-line {
                width: 34px;

                margin: 0 8px;
            }

            .registration-main {
                width: min(100% - 32px, 620px);

                padding: 36px 0 44px;
            }

            .intro {
                margin-bottom: 26px;
            }

            .intro h1 {
                font-size: 30px;
            }

            .intro p {
                font-size: 14px;
            }

            .information-card {
                padding: 22px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-footer {
                align-items: stretch;

                flex-direction: column-reverse;
            }

            .continue-button {
                width: 100%;
            }

            .back-link {
                justify-content: center;
            }

            .registration-footer {
                padding: 18px 20px;
            }
        }


        @media (max-width: 420px) {

            .brand-name {
                font-size: 17px;
            }

            .brand-mark {
                width: 31px;
                height: 31px;
            }

            .progress-number {
                width: 27px;
                height: 27px;
            }

            .progress-line {
                width: 24px;
            }

            .registration-main {
                width: min(100% - 24px, 620px);
            }

            .intro h1 {
                font-size: 27px;
            }

            .intro p {
                font-size: 13px;
            }

            .information-card {
                padding: 20px;
            }

            .account-summary {
                gap: 11px;
            }

            .summary-icon {
                width: 42px;
                height: 42px;
            }
        }


        /* =========================================================
           REDUCED MOTION
        ========================================================== */

        @media (prefers-reduced-motion: reduce) {

            .form-input,
            .form-select,
            .form-textarea,
            .continue-button,
            .back-link {
                transition: none;
            }
        }

    </style>
</head>


<body>

@php

    /*
    |--------------------------------------------------------------------------
    | ACCOUNT TYPE
    |--------------------------------------------------------------------------
    |
    | Step 2 stores the selected account type in:
    |
    | session('registration.account_type')
    |
    */

    $accountType = old(
        'account_type',
        session('registration.account_type')
    );


    /*
    |--------------------------------------------------------------------------
    | ACCOUNT TITLES
    |--------------------------------------------------------------------------
    */

    $accountTitles = [

        'personal' =>
            'For myself',

        'profession' =>
            'For my profession or practice',

        'business' =>
            'For a business or organization',

        'invited' =>
            'I was invited to an existing account',

    ];


    $accountTitle =
        $accountTitles[$accountType]
        ?? 'Account information';


    /*
    |--------------------------------------------------------------------------
    | VALID ACCOUNT TYPES
    |--------------------------------------------------------------------------
    */

    $validAccountTypes = [
        'personal',
        'profession',
        'business',
        'invited',
    ];

@endphp


<div class="registration-page">


    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <header class="registration-header">

        <a
            href="{{ route('register.profile') }}"
            class="brand"
            aria-label="ORDO registration"
        >

            <span class="brand-mark">
                O
            </span>

            <span class="brand-name">
                ORDO
            </span>

        </a>


        <div class="header-help">
            Account setup
        </div>

    </header>



    {{-- =========================================================
         PROGRESS
    ========================================================== --}}

    <div
        class="registration-progress"
        aria-label="Registration progress"
    >

        <div class="progress-inner">


            {{-- STEP 1 --}}

            <div class="progress-step completed">

                <span class="progress-number">
                    ✓
                </span>

                <span class="progress-label">
                    About you
                </span>

            </div>


            <div class="progress-line"></div>


            {{-- STEP 2 --}}

            <div class="progress-step completed">

                <span class="progress-number">
                    ✓
                </span>

                <span class="progress-label">
                    Account
                </span>

            </div>


            <div class="progress-line"></div>


            {{-- STEP 3 --}}

            <div class="progress-step active">

                <span class="progress-number">
                    3
                </span>

                <span class="progress-label">
                    Information
                </span>

            </div>


            <div class="progress-line"></div>


            {{-- STEP 4 --}}

            <div class="progress-step">

                <span class="progress-number">
                    4
                </span>

                <span class="progress-label">
                    Contact
                </span>

            </div>


            <div class="progress-line"></div>


            {{-- STEP 5 --}}

            <div class="progress-step">

                <span class="progress-number">
                    5
                </span>

                <span class="progress-label">
                    Verify
                </span>

            </div>


            <div class="progress-line"></div>


            {{-- STEP 6 --}}

            <div class="progress-step">

                <span class="progress-number">
                    6
                </span>

                <span class="progress-label">
                    Security
                </span>

            </div>

        </div>

    </div>



    {{-- =========================================================
         MAIN
    ========================================================== --}}

    <main class="registration-main">

        <div class="registration-content">


            {{-- =================================================
                 INTRO
            ================================================== --}}

            <div class="intro">

                <div class="eyebrow">
                    Step 3 of 6
                </div>

                <h1>
                    Tell us about your account
                </h1>

                <p>
                    Provide the information needed to set up your
                    ORDO account. The fields shown below depend on
                    the account type you selected.
                </p>

            </div>



            {{-- =================================================
                 VALIDATION ERRORS
            ================================================== --}}

            @if ($errors->any())

                <div
                    class="error-box"
                    role="alert"
                    aria-live="polite"
                >

                    <strong>
                        Please check the information below.
                    </strong>

                    @foreach ($errors->all() as $error)

                        <div>
                            {{ $error }}
                        </div>

                    @endforeach

                </div>

            @endif



            {{-- =================================================
                 FORM
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('information.update') }}"
                id="informationForm"
            >

                @csrf


                {{-- =================================================
                     ACCOUNT TYPE
                ================================================== --}}

                <input
                    type="hidden"
                    name="account_type"
                    value="{{ $accountType }}"
                >


                <div class="information-card">


                    {{-- =================================================
                         ACCOUNT SUMMARY
                    ================================================== --}}

                    <div class="account-summary">

                        <div class="summary-icon">


                            {{-- PERSONAL --}}

                            @if ($accountType === 'personal')

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
                                        d="M5 20c.8-3.6 3.1-5.5 7-5.5s6.2 1.9 7 5.5"
                                    />

                                </svg>


                            {{-- PROFESSION --}}

                            @elseif ($accountType === 'profession')

                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    aria-hidden="true"
                                >

                                    <path d="M4 21h16"/>

                                    <path d="M6 21V7h12v14"/>

                                    <path d="M9 7V4h6v3"/>

                                    <path d="M9 11h2"/>
                                    <path d="M13 11h2"/>

                                    <path d="M9 15h2"/>
                                    <path d="M13 15h2"/>

                                </svg>


                            {{-- BUSINESS --}}

                            @elseif ($accountType === 'business')

                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    aria-hidden="true"
                                >

                                    <path d="M3 21h18"/>

                                    <path d="M5 21V8h14v13"/>

                                    <path d="M8 8V4h8v4"/>

                                    <path d="M8 12h2"/>
                                    <path d="M14 12h2"/>

                                    <path d="M8 16h2"/>
                                    <path d="M14 16h2"/>

                                </svg>


                            {{-- INVITED --}}

                            @else

                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    aria-hidden="true"
                                >

                                    <path
                                        d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"
                                    />

                                    <circle
                                        cx="9"
                                        cy="7"
                                        r="4"
                                    />

                                    <path d="M19 8v6"/>

                                    <path d="M22 11h-6"/>

                                </svg>

                            @endif

                        </div>


                        <div class="summary-content">

                            <div class="summary-label">
                                Account type
                            </div>

                            <div class="summary-title">
                                {{ $accountTitle }}
                            </div>

                        </div>

                    </div>



                    {{-- =================================================
                         INVALID ACCOUNT TYPE
                    ================================================== --}}

                    @if (!in_array($accountType, $validAccountTypes))

                        <div class="error-box">

                            <strong>
                                Account type not selected.
                            </strong>

                            Please go back and choose how you will
                            use ORDO before continuing.

                        </div>


                    @else


                        {{-- =================================================
                             PERSONAL
                        ================================================== --}}

                        <section
                            class="account-section {{ $accountType === 'personal' ? 'active' : '' }}"
                            data-account-section="personal"
                            aria-hidden="{{ $accountType === 'personal' ? 'false' : 'true' }}"
                        >

                            <div class="form-section">

                                <div class="section-heading">

                                    <h2>
                                        Personal information
                                    </h2>

                                    <p>
                                        Tell us the basic information
                                        associated with your personal
                                        ORDO account.
                                    </p>

                                </div>


                                <div class="form-grid">


                                    {{-- FULL LEGAL NAME --}}

                                    <div class="form-group full">

                                        <label
                                            for="legal_name"
                                            class="form-label"
                                        >
                                            Full legal name
                                            <span class="required">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            id="legal_name"
                                            name="legal_name"
                                            class="form-input @error('legal_name') is-invalid @enderror"
                                            value="{{ old('legal_name') }}"
                                            placeholder="Enter your full legal name"
                                            autocomplete="name"
                                            {{ $accountType !== 'personal' ? 'disabled' : '' }}
                                        >

                                        @error('legal_name')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- DATE OF BIRTH --}}

                                    <div class="form-group">

                                        <label
                                            for="date_of_birth"
                                            class="form-label"
                                        >
                                            Date of birth
                                        </label>

                                        <input
                                            type="date"
                                            id="date_of_birth"
                                            name="date_of_birth"
                                            class="form-input @error('date_of_birth') is-invalid @enderror"
                                            value="{{ old('date_of_birth') }}"
                                            autocomplete="bday"
                                            {{ $accountType !== 'personal' ? 'disabled' : '' }}
                                        >

                                        @error('date_of_birth')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- OCCUPATION --}}

                                    <div class="form-group">

                                        <label
                                            for="occupation"
                                            class="form-label"
                                        >
                                            Occupation
                                        </label>

                                        <input
                                            type="text"
                                            id="occupation"
                                            name="occupation"
                                            class="form-input @error('occupation') is-invalid @enderror"
                                            value="{{ old('occupation') }}"
                                            placeholder="e.g. Software Developer"
                                            {{ $accountType !== 'personal' ? 'disabled' : '' }}
                                        >

                                        @error('occupation')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- PURPOSE --}}

                                    <div class="form-group full">

                                        <label
                                            for="account_purpose"
                                            class="form-label"
                                        >
                                            What will you use ORDO for?
                                        </label>

                                        <textarea
                                            id="account_purpose"
                                            name="account_purpose"
                                            class="form-textarea @error('account_purpose') is-invalid @enderror"
                                            placeholder="Briefly describe how you plan to use ORDO."
                                            {{ $accountType !== 'personal' ? 'disabled' : '' }}
                                        >{{ old('account_purpose') }}</textarea>

                                        @error('account_purpose')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                </div>

                            </div>

                        </section>



                        {{-- =================================================
                             PROFESSION / PRACTICE
                        ================================================== --}}

                        <section
                            class="account-section {{ $accountType === 'profession' ? 'active' : '' }}"
                            data-account-section="profession"
                            aria-hidden="{{ $accountType === 'profession' ? 'false' : 'true' }}"
                        >

                            <div class="form-section">

                                <div class="section-heading">

                                    <h2>
                                        Professional information
                                    </h2>

                                    <p>
                                        Provide details about your
                                        profession, practice, or
                                        professional operation.
                                    </p>

                                </div>


                                <div class="form-grid">


                                    {{-- PRACTICE NAME --}}

                                    <div class="form-group full">

                                        <label
                                            for="practice_name"
                                            class="form-label"
                                        >
                                            Professional or practice name
                                            <span class="required">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            id="practice_name"
                                            name="practice_name"
                                            class="form-input @error('practice_name') is-invalid @enderror"
                                            value="{{ old('practice_name') }}"
                                            placeholder="Enter the name of your practice"
                                            autocomplete="organization"
                                            {{ $accountType !== 'profession' ? 'disabled' : '' }}
                                        >

                                        @error('practice_name')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- PROFESSION --}}

                                    <div class="form-group">

                                        <label
                                            for="profession"
                                            class="form-label"
                                        >
                                            Profession
                                            <span class="required">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            id="profession"
                                            name="profession"
                                            class="form-input @error('profession') is-invalid @enderror"
                                            value="{{ old('profession') }}"
                                            placeholder="e.g. Accountant, Doctor, Consultant"
                                            {{ $accountType !== 'profession' ? 'disabled' : '' }}
                                        >

                                        @error('profession')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- PRACTICE TYPE --}}

                                    <div class="form-group">

                                        <label
                                            for="practice_type"
                                            class="form-label"
                                        >
                                            Practice type
                                            <span class="required">*</span>
                                        </label>

                                        <select
                                            id="practice_type"
                                            name="practice_type"
                                            class="form-select @error('practice_type') is-invalid @enderror"
                                            {{ $accountType !== 'profession' ? 'disabled' : '' }}
                                        >

                                            <option value="">
                                                Select practice type
                                            </option>

                                            <option
                                                value="independent"
                                                {{ old('practice_type') === 'independent' ? 'selected' : '' }}
                                            >
                                                Independent practice
                                            </option>

                                            <option
                                                value="clinic"
                                                {{ old('practice_type') === 'clinic' ? 'selected' : '' }}
                                            >
                                                Clinic
                                            </option>

                                            <option
                                                value="office"
                                                {{ old('practice_type') === 'office' ? 'selected' : '' }}
                                            >
                                                Office
                                            </option>

                                            <option
                                                value="consultancy"
                                                {{ old('practice_type') === 'consultancy' ? 'selected' : '' }}
                                            >
                                                Consultancy
                                            </option>

                                            <option
                                                value="other"
                                                {{ old('practice_type') === 'other' ? 'selected' : '' }}
                                            >
                                                Other
                                            </option>

                                        </select>

                                        @error('practice_type')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- LICENSE --}}

                                    <div class="form-group">

                                        <label
                                            for="professional_license"
                                            class="form-label"
                                        >
                                            License or registration number
                                        </label>

                                        <input
                                            type="text"
                                            id="professional_license"
                                            name="professional_license"
                                            class="form-input @error('professional_license') is-invalid @enderror"
                                            value="{{ old('professional_license') }}"
                                            placeholder="If applicable"
                                            {{ $accountType !== 'profession' ? 'disabled' : '' }}
                                        >

                                        @error('professional_license')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- DESCRIPTION --}}

                                    <div class="form-group full">

                                        <label
                                            for="practice_description"
                                            class="form-label"
                                        >
                                            About your practice
                                        </label>

                                        <textarea
                                            id="practice_description"
                                            name="practice_description"
                                            class="form-textarea @error('practice_description') is-invalid @enderror"
                                            placeholder="Briefly describe your professional practice."
                                            {{ $accountType !== 'profession' ? 'disabled' : '' }}
                                        >{{ old('practice_description') }}</textarea>

                                        @error('practice_description')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                </div>

                            </div>

                        </section>



                        {{-- =================================================
                             BUSINESS / ORGANIZATION
                        ================================================== --}}

                        <section
                            class="account-section {{ $accountType === 'business' ? 'active' : '' }}"
                            data-account-section="business"
                            aria-hidden="{{ $accountType === 'business' ? 'false' : 'true' }}"
                        >

                            <div class="form-section">

                                <div class="section-heading">

                                    <h2>
                                        Organization information
                                    </h2>

                                    <p>
                                        Provide the basic details of the
                                        business or organization you are
                                        setting up in ORDO.
                                    </p>

                                </div>


                                <div class="form-grid">


                                    {{-- ORGANIZATION NAME --}}

                                    <div class="form-group full">

                                        <label
                                            for="organization_name"
                                            class="form-label"
                                        >
                                            Organization name
                                            <span class="required">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            id="organization_name"
                                            name="organization_name"
                                            class="form-input @error('organization_name') is-invalid @enderror"
                                            value="{{ old('organization_name') }}"
                                            placeholder="Enter the registered or operating name"
                                            autocomplete="organization"
                                            {{ $accountType !== 'business' ? 'disabled' : '' }}
                                        >

                                        @error('organization_name')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- ORGANIZATION TYPE --}}

                                    <div class="form-group">

                                        <label
                                            for="organization_type"
                                            class="form-label"
                                        >
                                            Organization type
                                            <span class="required">*</span>
                                        </label>

                                        <select
                                            id="organization_type"
                                            name="organization_type"
                                            class="form-select @error('organization_type') is-invalid @enderror"
                                            {{ $accountType !== 'business' ? 'disabled' : '' }}
                                        >

                                            <option value="">
                                                Select organization type
                                            </option>

                                            <option
                                                value="corporation"
                                                {{ old('organization_type') === 'corporation' ? 'selected' : '' }}
                                            >
                                                Corporation
                                            </option>

                                            <option
                                                value="opc"
                                                {{ old('organization_type') === 'opc' ? 'selected' : '' }}
                                            >
                                                One Person Corporation (OPC)
                                            </option>

                                            <option
                                                value="sole_proprietorship"
                                                {{ old('organization_type') === 'sole_proprietorship' ? 'selected' : '' }}
                                            >
                                                Sole proprietorship
                                            </option>

                                            <option
                                                value="partnership"
                                                {{ old('organization_type') === 'partnership' ? 'selected' : '' }}
                                            >
                                                Partnership
                                            </option>

                                            <option
                                                value="association"
                                                {{ old('organization_type') === 'association' ? 'selected' : '' }}
                                            >
                                                Association
                                            </option>

                                            <option
                                                value="cooperative"
                                                {{ old('organization_type') === 'cooperative' ? 'selected' : '' }}
                                            >
                                                Cooperative
                                            </option>

                                            <option
                                                value="other"
                                                {{ old('organization_type') === 'other' ? 'selected' : '' }}
                                            >
                                                Other
                                            </option>

                                        </select>

                                        @error('organization_type')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- REGISTRATION NUMBER --}}

                                    <div class="form-group">

                                        <label
                                            for="registration_number"
                                            class="form-label"
                                        >
                                            Registration number
                                        </label>

                                        <input
                                            type="text"
                                            id="registration_number"
                                            name="registration_number"
                                            class="form-input @error('registration_number') is-invalid @enderror"
                                            value="{{ old('registration_number') }}"
                                            placeholder="SEC, DTI or other registration number"
                                            {{ $accountType !== 'business' ? 'disabled' : '' }}
                                        >

                                        @error('registration_number')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- ADDRESS --}}

                                    <div class="form-group full">

                                        <label
                                            for="organization_address"
                                            class="form-label"
                                        >
                                            Organization address
                                        </label>

                                        <textarea
                                            id="organization_address"
                                            name="organization_address"
                                            class="form-textarea @error('organization_address') is-invalid @enderror"
                                            placeholder="Enter the registered or operating address."
                                            {{ $accountType !== 'business' ? 'disabled' : '' }}
                                        >{{ old('organization_address') }}</textarea>

                                        @error('organization_address')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                </div>

                            </div>

                        </section>



                        {{-- =================================================
                             INVITED ACCOUNT
                        ================================================== --}}

                        <section
                            class="account-section {{ $accountType === 'invited' ? 'active' : '' }}"
                            data-account-section="invited"
                            aria-hidden="{{ $accountType === 'invited' ? 'false' : 'true' }}"
                        >

                            <div class="form-section">

                                <div class="section-heading">

                                    <h2>
                                        Invitation information
                                    </h2>

                                    <p>
                                        Enter the invitation details provided
                                        by the organization, practice, or
                                        account administrator.
                                    </p>

                                </div>


                                <div class="form-grid">


                                    {{-- INVITATION CODE --}}

                                    <div class="form-group full">

                                        <label
                                            for="invitation_code"
                                            class="form-label"
                                        >
                                            Invitation code
                                            <span class="required">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            id="invitation_code"
                                            name="invitation_code"
                                            class="form-input @error('invitation_code') is-invalid @enderror"
                                            value="{{ old('invitation_code', request('invite')) }}"
                                            placeholder="Enter your invitation code"
                                            autocomplete="off"
                                            {{ $accountType !== 'invited' ? 'disabled' : '' }}
                                        >

                                        @error('invitation_code')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                        <div class="field-help">
                                            Use the invitation code included
                                            in the invitation you received.
                                        </div>

                                    </div>


                                    {{-- ORGANIZATION --}}

                                    <div class="form-group">

                                        <label
                                            for="inviting_organization"
                                            class="form-label"
                                        >
                                            Organization or practice
                                        </label>

                                        <input
                                            type="text"
                                            id="inviting_organization"
                                            name="inviting_organization"
                                            class="form-input @error('inviting_organization') is-invalid @enderror"
                                            value="{{ old('inviting_organization') }}"
                                            placeholder="If provided in your invitation"
                                            {{ $accountType !== 'invited' ? 'disabled' : '' }}
                                        >

                                        @error('inviting_organization')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>


                                    {{-- ROLE --}}

                                    <div class="form-group">

                                        <label
                                            for="invited_role"
                                            class="form-label"
                                        >
                                            Your role
                                        </label>

                                        <input
                                            type="text"
                                            id="invited_role"
                                            name="invited_role"
                                            class="form-input @error('invited_role') is-invalid @enderror"
                                            value="{{ old('invited_role') }}"
                                            placeholder="e.g. Staff, Accountant, Manager"
                                            {{ $accountType !== 'invited' ? 'disabled' : '' }}
                                        >

                                        @error('invited_role')

                                            <div class="field-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                </div>


                                <div class="info-notice">

                                    <strong>
                                        Joining an existing account:
                                    </strong>

                                    Your invitation determines which
                                    organization or practice you can join
                                    and what access can be assigned to you.

                                </div>

                            </div>

                        </section>



                        {{-- =================================================
                             FORM FOOTER
                        ================================================== --}}

                        <div class="form-footer">


                            <a
                                href="{{ route('register.account') }}"
                                class="back-link"
                            >
                                ← Back to Account
                            </a>


                            @if (in_array($accountType, $validAccountTypes))

                                <button
                                    type="submit"
                                    class="continue-button"
                                >

                                    <span>
                                        Continue
                                    </span>

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        aria-hidden="true"
                                    >

                                        <path d="M5 12h14"/>

                                        <path d="m13 6 6 6-6 6"/>

                                    </svg>

                                </button>

                            @else

                                <a
                                    href="{{ route('register.account') }}"
                                    class="continue-button"
                                >
                                    Choose account type
                                </a>

                            @endif

                        </div>

                    @endif

                </div>

            </form>

        </div>

    </main>



    {{-- =========================================================
         FOOTER
    ========================================================== --}}

    <footer class="registration-footer">

        Your information is used only to set up your ORDO account.

    </footer>

</div>



<script>

    /*
    |--------------------------------------------------------------------------
    | ORDO — ACCOUNT INFORMATION
    |--------------------------------------------------------------------------
    |
    | Step 2 determines the account type.
    |
    | This script ensures that only the matching Step 3 section
    | is active.
    |
    */

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            const accountType =
                @json($accountType);

            const sections =
                document.querySelectorAll(
                    '[data-account-section]'
                );


            sections.forEach(
                function (section) {

                    const sectionType =
                        section.getAttribute(
                            'data-account-section'
                        );

                    const isActive =
                        sectionType === accountType;


                    section.classList.toggle(
                        'active',
                        isActive
                    );


                    section.setAttribute(
                        'aria-hidden',
                        isActive
                            ? 'false'
                            : 'true'
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | Prevent fields from inactive sections
                    |--------------------------------------------------------------------------
                    */

                    const fields =
                        section.querySelectorAll(
                            'input, select, textarea'
                        );


                    fields.forEach(
                        function (field) {

                            field.disabled =
                                !isActive;

                        }
                    );

                }
            );

        }
    );

</script>

</body>
</html>