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

    <title>Personal Account — ORDO</title>

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

            background: #ffffff;
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


        /* =========================================================
           PAGE
        ========================================================== */

        .registration-page {
            min-height: 100vh;

            display: flex;

            background: #ffffff;
        }


        /* =========================================================
           LEFT BRAND PANEL
        ========================================================== */

        .brand-panel {
            position: relative;

            width: 50%;
            min-height: 100vh;

            padding: 46px 52px 42px;

            display: flex;
            flex-direction: column;

            background: #071b3b;
            color: #ffffff;

            overflow: hidden;
        }


        /* =========================================================
           BRAND
        ========================================================== */

        .brand {
            position: relative;
            z-index: 2;

            display: inline-flex;
            align-items: center;

            gap: 11px;

            width: fit-content;

            color: #ffffff;
            text-decoration: none;
        }

        .brand-mark {
            width: 43px;
            height: 43px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background:
                linear-gradient(
                    145deg,
                    #3b82f6,
                    #2563eb
                );

            color: #ffffff;

            font-size: 17px;
            font-weight: 900;

            letter-spacing: 0.04em;

            box-shadow:
                0 8px 20px rgba(37, 99, 235, 0.28);
        }

        .brand-copy {
            display: flex;
            flex-direction: column;

            gap: 1px;
        }

        .brand-name {
            color: #ffffff;

            font-size: 20px;
            line-height: 1;

            font-weight: 900;

            letter-spacing: -0.025em;
        }

        .brand-company {
            color: #aebed6;

            font-size: 10px;
            line-height: 1.2;

            font-weight: 500;
        }


        /* =========================================================
           LEFT CONTENT
        ========================================================== */

        .brand-content {
            position: relative;
            z-index: 2;

            margin-top: 50px;
        }

        .brand-eyebrow {
            margin-bottom: 20px;

            color: #60a5fa;

            font-size: 11px;
            line-height: 1;

            font-weight: 800;

            letter-spacing: 0.13em;

            text-transform: uppercase;
        }

        .brand-content h2 {
            max-width: 530px;

            color: #ffffff;

            font-size: clamp(38px, 4vw, 56px);

            line-height: 0.99;

            font-weight: 900;

            letter-spacing: -0.045em;
        }

        .brand-description {
            max-width: 550px;

            margin-top: 20px;

            color: #a9c0df;

            font-size: 13px;
            line-height: 1.7;
        }


        /* =========================================================
           BENEFIT PILLS
        ========================================================== */

        .benefit-list {
            margin-top: 28px;

            display: flex;
            flex-wrap: wrap;

            gap: 9px;
        }

        .benefit-pill {
            min-height: 35px;

            display: inline-flex;
            align-items: center;

            gap: 7px;

            padding: 0 12px;

            border: 1px solid rgba(148, 163, 184, 0.18);

            border-radius: 999px;

            background: rgba(255, 255, 255, 0.035);

            color: #d2e0f3;

            font-size: 10px;

            font-weight: 700;

            white-space: nowrap;
        }

        .benefit-dot {
            width: 7px;
            height: 7px;

            flex-shrink: 0;

            border-radius: 50%;

            background: #3b82f6;

            box-shadow:
                0 0 0 3px rgba(59, 130, 246, 0.10);
        }


        /* =========================================================
           LEFT FEATURE CARDS
        ========================================================== */

        .feature-grid {
            position: relative;
            z-index: 2;

            margin-top: auto;
            padding-top: 46px;

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 10px;
        }

        .feature-card {
            min-height: 124px;

            padding: 15px;

            border: 1px solid rgba(148, 163, 184, 0.15);

            border-radius: 10px;

            background: rgba(255, 255, 255, 0.035);
        }

        .feature-icon {
            width: 29px;
            height: 29px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 10px;

            border: 1px solid rgba(59, 130, 246, 0.25);

            border-radius: 8px;

            background: rgba(37, 99, 235, 0.10);

            color: #60a5fa;
        }

        .feature-icon svg {
            width: 15px;
            height: 15px;
        }

        .feature-title {
            color: #ffffff;

            font-size: 10px;
            line-height: 1.3;

            font-weight: 800;
        }

        .feature-description {
            margin-top: 5px;

            color: #8fa9ca;

            font-size: 9px;
            line-height: 1.45;
        }


        /* =========================================================
           RIGHT SIDE
        ========================================================== */

        .form-panel {
            width: 50%;
            min-height: 100vh;

            padding: 62px 7.5% 52px;

            display: flex;
            flex-direction: column;

            background: #ffffff;
        }

        .form-container {
            width: min(560px, 100%);

            margin: 0 auto;
        }


        /* =========================================================
           REGISTRATION TOP
        ========================================================== */

        .registration-top {
            width: 100%;
        }

        .registration-eyebrow {
            margin-bottom: 9px;

            color: #2563eb;

            font-size: 10px;
            line-height: 1.2;

            font-weight: 800;

            letter-spacing: 0.10em;

            text-transform: uppercase;
        }

        .registration-top h1 {
            color: #06172f;

            font-size: 27px;
            line-height: 1.1;

            font-weight: 900;

            letter-spacing: -0.035em;
        }

        .registration-description {
            max-width: 500px;

            margin-top: 8px;

            color: #718096;

            font-size: 11px;
            line-height: 1.55;
        }


        /* =========================================================
           SEGMENTED PROGRESS
           STEP 3 ACTIVE
        ========================================================== */

        .progress-bar {
            width: 100%;

            margin-top: 20px;

            display: grid;

            grid-template-columns:
                repeat(6, minmax(0, 1fr));

            gap: 7px;
        }

        .progress-segment {
            height: 5px;

            border-radius: 999px;

            background: #e4e9f0;
        }

        .progress-segment.completed,
        .progress-segment.active {
            background: #2563eb;
        }


        /* =========================================================
           FORM CONTENT
        ========================================================== */

        .form-content {
            margin-top: 25px;
        }


        /* =========================================================
           ACCOUNT BADGE
        ========================================================== */

        .account-badge {
            display: flex;
            align-items: center;

            gap: 11px;

            margin-bottom: 22px;

            padding: 13px 14px;

            border: 1px solid #e3e9f1;

            border-radius: 10px;

            background: #f8fafc;
        }

        .account-badge-icon {
            width: 35px;
            height: 35px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: #eff6ff;

            color: #2563eb;
        }

        .account-badge-icon svg {
            width: 18px;
            height: 18px;
        }

        .account-badge-title {
            color: #06172f;

            font-size: 12px;
            line-height: 1.3;

            font-weight: 800;
        }

        .account-badge-description {
            margin-top: 2px;

            color: #7b8798;

            font-size: 10px;
            line-height: 1.4;
        }


        /* =========================================================
           ERROR
        ========================================================== */

        .error-box {
            margin-bottom: 18px;

            padding: 11px 13px;

            border: 1px solid #f1c4c4;

            border-radius: 9px;

            background: #fff7f7;

            color: #a12828;

            font-size: 11px;
            line-height: 1.5;
        }

        .error-box strong {
            display: block;

            margin-bottom: 3px;
        }


        /* =========================================================
           FIELD
        ========================================================== */

        .field {
            margin-bottom: 17px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .field label {
            display: block;

            margin-bottom: 7px;

            color: #26364d;

            font-size: 11px;
            line-height: 1.3;

            font-weight: 800;
        }

        .required {
            color: #dc2626;
        }

        .field input,
        .field select,
        .field textarea {
            width: 100%;

            border: 1px solid #cfd8e5;

            border-radius: 9px;

            background: #ffffff;

            color: #06172f;

            outline: none;

            transition:
                border-color 0.18s ease,
                box-shadow 0.18s ease;
        }

        .field input,
        .field select {
            height: 44px;

            padding: 0 12px;

            font-size: 12px;
        }

        .field textarea {
            min-height: 100px;

            padding: 11px 12px;

            resize: vertical;

            font-size: 12px;
        }

        .field input::placeholder,
        .field textarea::placeholder {
            color: #a0a9b5;
        }

        .field input:hover,
        .field select:hover,
        .field textarea:hover {
            border-color: #aebbc9;
        }

        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .field-hint {
            margin-top: 6px;

            color: #8a95a5;

            font-size: 9px;
            line-height: 1.45;
        }

        .field-error {
            margin-top: 6px;

            color: #b42318;

            font-size: 10px;
        }


        /* =========================================================
           FORM FOOTER
        ========================================================== */

        .form-footer {
            margin-top: 22px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 16px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;

            gap: 6px;

            color: #667386;

            text-decoration: none;

            font-size: 11px;

            font-weight: 700;

            transition: color 0.18s ease;
        }

        .back-link:hover {
            color: #06172f;
        }

        .continue-button {
            min-width: 142px;
            height: 44px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 8px;

            padding: 0 18px;

            border: 0;

            border-radius: 9px;

            background: #2563eb;

            color: #ffffff;

            font-size: 11px;

            font-weight: 800;

            box-shadow:
                0 6px 15px rgba(37, 99, 235, 0.18);

            transition:
                background 0.18s ease,
                transform 0.18s ease,
                box-shadow 0.18s ease;
        }

        .continue-button:hover {
            background: #1d4ed8;

            box-shadow:
                0 8px 20px rgba(37, 99, 235, 0.24);

            transform: translateY(-1px);
        }

        .continue-button:active {
            transform: translateY(0);
        }

        .continue-button:focus-visible {
            outline: none;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.16),
                0 6px 15px rgba(37, 99, 235, 0.18);
        }

        .continue-button svg {
            width: 14px;
            height: 14px;
        }


        /* =========================================================
           FOOTER NOTE
        ========================================================== */

        .registration-footer {
            width: min(560px, 100%);

            margin: auto auto 0;

            padding-top: 30px;

            color: #9aa4b2;

            font-size: 9px;
            line-height: 1.5;

            text-align: center;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================== */

        @media (max-width: 1050px) {

            .brand-panel {
                padding-left: 38px;
                padding-right: 38px;
            }

            .form-panel {
                padding-left: 6%;
                padding-right: 6%;
            }

            .brand-content h2 {
                font-size: 42px;
            }
        }


        @media (max-width: 850px) {

            .registration-page {
                flex-direction: column;
            }

            .brand-panel {
                width: 100%;

                min-height: auto;

                padding: 32px 28px 34px;
            }

            .brand-content {
                margin-top: 38px;
            }

            .brand-content h2 {
                max-width: 700px;

                font-size: 38px;
            }

            .brand-description {
                max-width: 650px;
            }

            .feature-grid {
                margin-top: 35px;

                padding-top: 0;
            }

            .form-panel {
                width: 100%;

                min-height: auto;

                padding: 42px 28px 35px;
            }

            .form-container {
                width: min(600px, 100%);
            }

            .registration-footer {
                margin-top: 35px;
            }
        }


        @media (max-width: 600px) {

            .brand-panel {
                padding: 27px 22px 30px;
            }

            .brand-mark {
                width: 38px;
                height: 38px;

                font-size: 15px;
            }

            .brand-name {
                font-size: 18px;
            }

            .brand-content {
                margin-top: 32px;
            }

            .brand-eyebrow {
                margin-bottom: 14px;
            }

            .brand-content h2 {
                font-size: 32px;
            }

            .brand-description {
                font-size: 12px;
            }

            .benefit-list {
                gap: 7px;
            }

            .benefit-pill {
                min-height: 32px;

                padding: 0 10px;

                font-size: 9px;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .feature-card {
                min-height: auto;
            }

            .form-panel {
                padding: 34px 22px 30px;
            }

            .registration-top h1 {
                font-size: 25px;
            }

            .registration-description {
                font-size: 10px;
            }

            .progress-bar {
                gap: 5px;
            }

            .progress-segment {
                height: 4px;
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
        }


        @media (max-width: 400px) {

            .brand-content h2 {
                font-size: 29px;
            }

            .form-panel {
                padding-left: 18px;
                padding-right: 18px;
            }

            .account-badge {
                padding: 11px;
            }
        }


        /* =========================================================
           REDUCED MOTION
        ========================================================== */

        @media (prefers-reduced-motion: reduce) {

            .field input,
            .field select,
            .field textarea,
            .continue-button,
            .back-link {
                transition: none;
            }
        }

    </style>

</head>


<body>

<div class="registration-page">


    {{-- =========================================================
         LEFT BLUE BRAND PANEL
    ========================================================== --}}

    <aside class="brand-panel">

        {{-- BRAND --}}

        <a
            href="{{ route('register.account') }}"
            class="brand"
            aria-label="ORDO registration"
        >

            <span class="brand-mark">
                O
            </span>

            <span class="brand-copy">

                <span class="brand-name">
                    ORDO
                </span>

                <span class="brand-company">
                    by John Kelly &amp; Company
                </span>

            </span>

        </a>


        {{-- MAIN BRAND MESSAGE --}}

        <div class="brand-content">

            <div class="brand-eyebrow">
                BUSINESS, ORGANIZED.
            </div>

            <h2>
                One workspace for the business you're building.
            </h2>

            <p class="brand-description">
                Manage governance, compliance, finance, people,
                records and JK&amp;C services from one controlled
                client workspace.
            </p>


            {{-- BENEFITS --}}

            <div class="benefit-list">

                <span class="benefit-pill">
                    <span class="benefit-dot"></span>
                    6 business modules
                </span>

                <span class="benefit-pill">
                    <span class="benefit-dot"></span>
                    30-day full access
                </span>

                <span class="benefit-pill">
                    <span class="benefit-dot"></span>
                    3 modules free after trial
                </span>

                <span class="benefit-pill">
                    <span class="benefit-dot"></span>
                    JK&amp;C support built in
                </span>

            </div>

        </div>


        {{-- FEATURE CARDS --}}

        <div class="feature-grid">


            {{-- FEATURE 1 --}}

            <div class="feature-card">

                <div class="feature-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >

                        <path d="M4 7h16"/>
                        <path d="M4 12h16"/>
                        <path d="M4 17h16"/>
                        <path d="M8 4v16"/>

                    </svg>

                </div>

                <div class="feature-title">
                    Clear by default
                </div>

                <div class="feature-description">
                    See what needs attention without
                    hunting through menus.
                </div>

            </div>


            {{-- FEATURE 2 --}}

            <div class="feature-card">

                <div class="feature-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >

                        <path d="M12 3v18"/>
                        <path d="m7 8 5-5 5 5"/>
                        <path d="m7 16 5 5 5-5"/>

                    </svg>

                </div>

                <div class="feature-title">
                    Progressive setup
                </div>

                <div class="feature-description">
                    Start first. Complete verification
                    within 30 days.
                </div>

            </div>


            {{-- FEATURE 3 --}}

            <div class="feature-card">

                <div class="feature-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.7"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >

                        <rect
                            x="4"
                            y="4"
                            width="6"
                            height="6"
                            rx="1"
                        />

                        <rect
                            x="14"
                            y="4"
                            width="6"
                            height="6"
                            rx="1"
                        />

                        <rect
                            x="9"
                            y="14"
                            width="6"
                            height="6"
                            rx="1"
                        />

                        <path d="M10 7h4"/>
                        <path d="M17 10v3"/>
                        <path d="M12 10v4"/>

                    </svg>

                </div>

                <div class="feature-title">
                    Connected records
                </div>

                <div class="feature-description">
                    Business information stays linked
                    across modules.
                </div>

            </div>

        </div>

    </aside>


    {{-- =========================================================
         RIGHT FORM PANEL
    ========================================================== --}}

    <main class="form-panel">

        <div class="form-container">


            {{-- =================================================
                 REGISTRATION HEADER
            ================================================== --}}

            <div class="registration-top">

                <div class="registration-eyebrow">
                    CREATE YOUR ORDO ACCOUNT
                </div>

                <h1>
                    Your personal account
                </h1>

                <p class="registration-description">
                    Tell us about your personal ORDO account.
                    This account is being created for your own
                    records, compliance, or professional matters.
                </p>


                {{-- =================================================
                     6-STEP SEGMENTED PROGRESS
                     STEP 3 IS ACTIVE
                ================================================== --}}

                <div
                    class="progress-bar"
                    aria-label="Step 3 of 6"
                    role="progressbar"
                    aria-valuemin="1"
                    aria-valuemax="6"
                    aria-valuenow="3"
                >

                    {{-- STEP 1 --}}

                    <span
                        class="progress-segment completed"
                        aria-label="Step 1 completed"
                    ></span>


                    {{-- STEP 2 --}}

                    <span
                        class="progress-segment completed"
                        aria-label="Step 2 completed"
                    ></span>


                    {{-- STEP 3 --}}

                    <span
                        class="progress-segment active"
                        aria-current="step"
                        aria-label="Step 3 current"
                    ></span>


                    {{-- STEP 4 --}}

                    <span
                        class="progress-segment"
                        aria-label="Step 4"
                    ></span>


                    {{-- STEP 5 --}}

                    <span
                        class="progress-segment"
                        aria-label="Step 5"
                    ></span>


                    {{-- STEP 6 --}}

                    <span
                        class="progress-segment"
                        aria-label="Step 6"
                    ></span>

                </div>

            </div>


            {{-- =================================================
                 FORM CONTENT
            ================================================== --}}

            <div class="form-content">


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
                    action="{{ route('personal.update') }}"
                >

                    @csrf


                    {{-- =================================================
                         ACCOUNT BADGE
                    ================================================== --}}

                    <div class="account-badge">

                        <div class="account-badge-icon">

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

                        </div>

                        <div>

                            <div class="account-badge-title">
                                Personal account
                            </div>

                            <div class="account-badge-description">
                                For your own records and professional matters.
                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         ACCOUNT NAME
                    ================================================== --}}

                    <div class="field">

                        <label for="account_name">

                            Account name

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input
                            type="text"
                            id="account_name"
                            name="account_name"
                            value="{{ old('account_name', $data['account_name'] ?? '') }}"
                            placeholder="John Mark Torres"
                            autocomplete="name"
                            required
                            autofocus
                        >

                        <div class="field-hint">
                            Use the name you want displayed on your personal ORDO account.
                        </div>

                        @error('account_name')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- =================================================
                         PURPOSE
                    ================================================== --}}

                    <div class="field">

                        <label for="purpose">
                            Purpose of this account
                        </label>

                        <select
                            id="purpose"
                            name="purpose"
                        >

                            <option value="">
                                Select a purpose
                            </option>

                            <option
                                value="Personal records / compliance / professional matters"
                                @selected(
                                    old(
                                        'purpose',
                                        $data['purpose'] ?? ''
                                    ) === 'Personal records / compliance / professional matters'
                                )
                            >
                                Personal records / compliance / professional matters
                            </option>

                            <option
                                value="Personal records"
                                @selected(
                                    old(
                                        'purpose',
                                        $data['purpose'] ?? ''
                                    ) === 'Personal records'
                                )
                            >
                                Personal records
                            </option>

                            <option
                                value="Compliance"
                                @selected(
                                    old(
                                        'purpose',
                                        $data['purpose'] ?? ''
                                    ) === 'Compliance'
                                )
                            >
                                Compliance
                            </option>

                            <option
                                value="Professional matters"
                                @selected(
                                    old(
                                        'purpose',
                                        $data['purpose'] ?? ''
                                    ) === 'Professional matters'
                                )
                            >
                                Professional matters
                            </option>

                            <option
                                value="Other"
                                @selected(
                                    old(
                                        'purpose',
                                        $data['purpose'] ?? ''
                                    ) === 'Other'
                                )
                            >
                                Other
                            </option>

                        </select>

                        @error('purpose')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- =================================================
                         COUNTRY
                    ================================================== --}}

                    <div class="field">

                        <label for="country">

                            Country / Region

                            <span class="required">
                                *
                            </span>

                        </label>

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
                                        $data['country'] ?? 'Philippines'
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
                                        $data['country'] ?? ''
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
                                        $data['country'] ?? ''
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
                                        $data['country'] ?? ''
                                    ) === 'Other'
                                )
                            >
                                Other
                            </option>

                        </select>

                        @error('country')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- =================================================
                         FORM FOOTER
                    ================================================== --}}

                    <div class="form-footer">

                        <a
                            href="{{ route('register.account') }}"
                            class="back-link"
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                                width="13"
                                height="13"
                            >

                                <path d="M19 12H5"/>
                                <path d="m12 19-7-7 7-7"/>

                            </svg>

                            Back to Account

                        </a>


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

                    </div>

                </form>

            </div>

        </div>


        {{-- =========================================================
             FOOTER
        ========================================================== --}}

        <footer class="registration-footer">

            Your information is used only to set up your ORDO account.

        </footer>

    </main>

</div>

</body>

</html>