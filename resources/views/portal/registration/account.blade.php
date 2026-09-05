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
        content="#061a3a"
    >

    <title>Choose your account — ORDO</title>

    <style>
        /* =========================================================
           ORDO — REGISTRATION ACCOUNT TYPE
           ========================================================= */

        :root {
            --navy: #061a3a;
            --navy-2: #081f43;
            --blue: #2f6df6;
            --blue-dark: #1f5ce5;
            --blue-light: #edf4ff;

            --text: #07142f;
            --muted: #6b7b98;
            --muted-2: #8190a9;

            --border: #d8e0eb;
            --border-dark: #c8d3e3;

            --white: #ffffff;
            --page: #ffffff;

            --shadow:
                0 12px 30px rgba(21, 72, 150, 0.08);

            --radius-lg: 14px;
            --radius-md: 12px;
        }


        /* =========================================================
           RESET
           ========================================================= */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            font-family:
                Inter,
                ui-sans-serif,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                sans-serif;

            background: var(--page);
            color: var(--text);

            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        button,
        input {
            font: inherit;
        }

        button {
            border: 0;
        }

        a {
            color: inherit;
            text-decoration: none;
        }


        /* =========================================================
           PAGE
           ========================================================= */

        .registration-page {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 49.5% 50.5%;
        }


        /* =========================================================
           LEFT BRAND PANEL
           ========================================================= */

        .brand-panel {
            position: relative;
            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 18% 22%,
                    rgba(47, 109, 246, 0.08),
                    transparent 27%
                ),
                linear-gradient(
                    180deg,
                    #061a3a 0%,
                    #061a3a 55%,
                    #071d40 100%
                );

            color: white;

            padding:
                46px
                52px
                42px;

            overflow: hidden;

            display: flex;
            flex-direction: column;
        }


        /* subtle background glow */

        .brand-panel::before {
            content: "";
            position: absolute;

            width: 430px;
            height: 430px;

            left: -180px;
            bottom: -180px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(47, 109, 246, 0.09) 0%,
                    rgba(47, 109, 246, 0) 68%
                );

            pointer-events: none;
        }


        /* =========================================================
           LOGO
           ========================================================= */

        .brand-logo {
            position: relative;
            z-index: 1;

            display: flex;
            align-items: center;

            gap: 12px;

            width: fit-content;
        }

        .brand-logo-mark {
            width: 44px;
            height: 44px;

            border-radius: 11px;

            background:
                linear-gradient(
                    145deg,
                    #3e7dfb 0%,
                    #2563eb 100%
                );

            display: flex;
            align-items: center;
            justify-content: center;

            box-shadow:
                0 10px 22px rgba(37, 99, 235, 0.24);
        }

        .brand-logo-mark span {
            width: 15px;
            height: 15px;

            border-radius: 50%;

            background: #ffffff;
        }

        .brand-logo-copy {
            display: flex;
            flex-direction: column;
            gap: 1px;
        }

        .brand-logo-name {
            font-family:
                Georgia,
                "Times New Roman",
                serif;

            font-size: 20px;
            line-height: 1;

            font-weight: 900;
            letter-spacing: -0.4px;
        }

        .brand-logo-subtitle {
            font-size: 8.5px;
            line-height: 1.2;

            color: #d8e5fb;

            letter-spacing: 0.05px;
        }


        /* =========================================================
           LEFT HERO
           ========================================================= */

        .brand-content {
            position: relative;
            z-index: 1;

            margin-top: 48px;

            max-width: 590px;
        }

        .brand-eyebrow {
            font-size: 11px;
            font-weight: 800;

            letter-spacing: 1.4px;

            color: #3f80ff;

            margin-bottom: 24px;
        }

        .brand-heading {
            max-width: 520px;

            font-family:
                Georgia,
                "Times New Roman",
                serif;

            font-size: clamp(
                38px,
                3.15vw,
                56px
            );

            line-height: 1.02;

            letter-spacing: -2.2px;

            font-weight: 900;

            color: #ffffff;

            margin-bottom: 22px;
        }

        .brand-description {
            max-width: 575px;

            color: #d1def3;

            font-size: 13px;
            line-height: 1.7;

            margin-bottom: 25px;
        }


        /* =========================================================
           FEATURE PILLS
           ========================================================= */

        .feature-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;

            max-width: 590px;
        }

        .feature-pill {
            min-height: 36px;

            display: inline-flex;
            align-items: center;

            gap: 8px;

            padding:
                0 13px;

            border:
                1px solid
                rgba(148, 184, 237, 0.23);

            border-radius: 999px;

            background:
                rgba(255, 255, 255, 0.025);

            color: #e5eefc;

            font-size: 10px;
            font-weight: 700;

            white-space: nowrap;
        }

        .feature-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #3780ff;

            box-shadow:
                0 0 0 3px
                rgba(55, 128, 255, 0.08);
        }


        /* =========================================================
           LEFT BOTTOM CARDS
           ========================================================= */

        .brand-bottom {
            position: relative;
            z-index: 1;

            margin-top: auto;

            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 8px;

            max-width: 575px;
        }

        .brand-bottom-card {
            min-height: 105px;

            padding:
                14px 14px;

            border:
                1px solid
                rgba(150, 184, 235, 0.19);

            border-radius: 11px;

            background:
                rgba(255, 255, 255, 0.035);
        }

        .bottom-icon {
            width: 29px;
            height: 29px;

            border:
                1px solid
                rgba(67, 132, 255, 0.45);

            border-radius: 7px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 9px;

            color: #3980ff;
        }

        .bottom-icon svg {
            width: 15px;
            height: 15px;
        }

        .bottom-title {
            font-size: 10px;
            font-weight: 800;

            color: #ffffff;

            margin-bottom: 4px;
        }

        .bottom-text {
            font-size: 9px;
            line-height: 1.4;

            color: #aebfda;
        }


        /* =========================================================
           RIGHT PANEL
           ========================================================= */

        .form-panel {
            min-height: 100vh;

            background: #ffffff;

            padding:
                62px
                70px
                42px;

            display: flex;
            justify-content: flex-start;

            overflow-y: auto;
        }

        .form-container {
            width: 100%;
            max-width: 430px;

            margin-left: auto;
            margin-right: auto;
        }


        /* =========================================================
           FORM HEADER
           ========================================================= */

        .form-eyebrow {
            font-size: 10px;

            line-height: 1;

            font-weight: 900;

            letter-spacing: 1.15px;

            color: #2867ed;

            margin-bottom: 12px;
        }

        .form-title {
            font-family:
                Georgia,
                "Times New Roman",
                serif;

            font-size: 29px;

            line-height: 1.08;

            letter-spacing: -1.05px;

            font-weight: 900;

            color: #06142f;

            margin-bottom: 9px;
        }

        .form-description {
            color: #72809a;

            font-size: 12px;

            line-height: 1.55;

            margin-bottom: 21px;
        }


        /* =========================================================
           PROGRESS
           ========================================================= */

        .registration-progress {
            display: grid;

            grid-template-columns:
                repeat(6, 1fr);

            gap: 8px;

            margin-bottom: 22px;
        }

        .progress-segment {
            height: 5px;

            border-radius: 999px;

            background: #e7ebf2;
        }

        .progress-segment.active {
            background: #2f6df6;
        }


        /* =========================================================
           ACCOUNT OPTIONS
           ========================================================= */

        .account-options {
            display: flex;
            flex-direction: column;

            gap: 10px;
        }

        .account-option {
            position: relative;

            display: block;

            cursor: pointer;
        }

        .account-option input {
            position: absolute;

            opacity: 0;

            pointer-events: none;
        }

        .account-card {
            min-height: 91px;

            width: 100%;

            border:
                1px solid
                var(--border);

            border-radius: 14px;

            background: #ffffff;

            padding:
                14px 13px;

            display: grid;

            grid-template-columns:
                38px
                1fr
                25px;

            column-gap: 9px;

            align-items: center;

            transition:
                border-color 0.16s ease,
                box-shadow 0.16s ease,
                background 0.16s ease,
                transform 0.16s ease;
        }

        .account-option:hover .account-card {
            border-color: #b8c8e2;

            box-shadow:
                0 6px 18px
                rgba(30, 79, 150, 0.06);
        }

        .account-option input:checked + .account-card {
            border-color: #2f6df6;

            background:
                linear-gradient(
                    180deg,
                    #ffffff 0%,
                    #fafdff 100%
                );

            box-shadow:
                0 7px 20px
                rgba(47, 109, 246, 0.09);
        }


        /* =========================================================
           OPTION ICON
           ========================================================= */

        .account-icon {
            width: 36px;
            height: 36px;

            border-radius: 10px;

            background: #eff5ff;

            color: #2d6df4;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .account-icon svg {
            width: 18px;
            height: 18px;
        }


        /* =========================================================
           OPTION TEXT
           ========================================================= */

        .account-copy {
            min-width: 0;
        }

        .account-title {
            font-size: 12px;

            line-height: 1.25;

            font-weight: 850;

            color: #07142f;

            margin-bottom: 4px;
        }

        .account-description {
            font-size: 9.5px;

            line-height: 1.45;

            color: #647590;

            max-width: 310px;
        }


        /* =========================================================
           CHECKBOX
           ========================================================= */

        .account-check {
            width: 22px;
            height: 22px;

            border:
                1px solid
                #ccd6e5;

            border-radius: 6px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: transparent;

            background: #ffffff;

            transition:
                background 0.16s ease,
                border-color 0.16s ease;
        }

        .account-check svg {
            width: 13px;
            height: 13px;

            stroke-width: 3;
        }

        .account-option input:checked + .account-card .account-check {
            background: #3272f5;

            border-color: #3272f5;

            color: #ffffff;
        }


        /* =========================================================
           ERROR MESSAGE
           ========================================================= */

        .form-error {
            margin-top: 12px;

            padding:
                10px 12px;

            border:
                1px solid
                #fecaca;

            border-radius: 9px;

            background: #fff7f7;

            color: #b42318;

            font-size: 11px;

            line-height: 1.45;
        }


        /* =========================================================
           ACTIONS
           ========================================================= */

        .form-actions {
            margin-top: 20px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 14px;
        }

        .back-button {
            min-width: 76px;
            height: 38px;

            padding:
                0 14px;

            border:
                1px solid
                #d7e0ec;

            border-radius: 9px;

            background: #ffffff;

            color: #53637d;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 6px;

            font-size: 10px;
            font-weight: 700;

            cursor: pointer;

            transition:
                background 0.16s ease,
                border-color 0.16s ease,
                color 0.16s ease;
        }

        .back-button:hover {
            background: #f8fafc;

            border-color: #c8d3e2;

            color: #1e3a67;
        }

        .back-button svg {
            width: 12px;
            height: 12px;
        }

        .continue-button {
            min-width: 120px;
            height: 38px;

            padding:
                0 16px;

            border-radius: 9px;

            background:
                linear-gradient(
                    135deg,
                    #3979f7 0%,
                    #2f6df6 100%
                );

            color: #ffffff;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            font-size: 10px;
            font-weight: 800;

            cursor: pointer;

            box-shadow:
                0 7px 16px
                rgba(47, 109, 246, 0.17);

            transition:
                transform 0.16s ease,
                box-shadow 0.16s ease,
                background 0.16s ease;
        }

        .continue-button:hover {
            transform: translateY(-1px);

            box-shadow:
                0 9px 20px
                rgba(47, 109, 246, 0.23);
        }

        .continue-button:active {
            transform: translateY(0);
        }

        .continue-button svg {
            width: 13px;
            height: 13px;
        }


        /* =========================================================
           STEP LABEL
           ========================================================= */

        .step-label {
            margin-top: 13px;

            color: #8a97ab;

            font-size: 9px;

            text-align: right;
        }


        /* =========================================================
           RESPONSIVE
           ========================================================= */

        @media (max-width: 1100px) {

            .brand-panel {
                padding-left: 38px;
                padding-right: 38px;
            }

            .form-panel {
                padding-left: 45px;
                padding-right: 45px;
            }

            .brand-heading {
                font-size: 42px;
            }
        }


        @media (max-width: 850px) {

            .registration-page {
                grid-template-columns: 1fr;
            }

            .brand-panel {
                min-height: auto;

                padding:
                    32px
                    28px
                    34px;
            }

            .brand-content {
                margin-top: 38px;
            }

            .brand-heading {
                max-width: 650px;

                font-size: 42px;
            }

            .brand-bottom {
                margin-top: 35px;
            }

            .form-panel {
                min-height: auto;

                padding:
                    42px
                    28px
                    42px;
            }

            .form-container {
                max-width: 520px;
            }
        }


        @media (max-width: 560px) {

            .brand-panel {
                padding:
                    28px
                    22px
                    28px;
            }

            .brand-heading {
                font-size: 34px;

                letter-spacing: -1.3px;
            }

            .brand-description {
                font-size: 12px;
            }

            .brand-bottom {
                grid-template-columns: 1fr;
            }

            .brand-bottom-card {
                min-height: auto;
            }

            .form-panel {
                padding:
                    34px
                    20px
                    35px;
            }

            .form-title {
                font-size: 27px;
            }

            .account-card {
                grid-template-columns:
                    36px
                    1fr
                    23px;
            }

            .account-description {
                max-width: none;
            }

            .form-actions {
                gap: 10px;
            }

            .continue-button {
                flex: 1;
            }
        }
    </style>
</head>


<body>

<div class="registration-page">


    <!-- =========================================================
         LEFT PANEL
         ========================================================= -->

    <aside class="brand-panel">

        <!-- LOGO -->

        <div class="brand-logo">

            <div class="brand-logo-mark">
                <span></span>
            </div>

            <div class="brand-logo-copy">

                <div class="brand-logo-name">
                    ORDO
                </div>

                <div class="brand-logo-subtitle">
                    by John Kelly &amp; Company
                </div>

            </div>

        </div>


        <!-- HERO -->

        <div class="brand-content">

            <div class="brand-eyebrow">
                BUSINESS. ORGANIZED.
            </div>

            <h1 class="brand-heading">
                One workspace for the business you’re building.
            </h1>

            <p class="brand-description">
                Manage governance, compliance, finance, people,
                records and JK&amp;C services from one controlled
                client workspace.
            </p>


            <!-- FEATURE PILLS -->

            <div class="feature-pills">

                <div class="feature-pill">
                    <span class="feature-dot"></span>
                    6 business modules
                </div>

                <div class="feature-pill">
                    <span class="feature-dot"></span>
                    30-day full access
                </div>

                <div class="feature-pill">
                    <span class="feature-dot"></span>
                    3 modules free after trial
                </div>

                <div class="feature-pill">
                    <span class="feature-dot"></span>
                    JK&amp;C support built in
                </div>

            </div>

        </div>


        <!-- BOTTOM FEATURE CARDS -->

        <div class="brand-bottom">

            <!-- CARD 1 -->

            <div class="brand-bottom-card">

                <div class="bottom-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M4 6h16"></path>
                        <path d="M4 12h16"></path>
                        <path d="M4 18h16"></path>
                        <path d="M8 4v4"></path>
                        <path d="M16 10v4"></path>
                        <path d="M10 16v4"></path>
                    </svg>

                </div>

                <div class="bottom-title">
                    Clear by default
                </div>

                <div class="bottom-text">
                    Simple steps with only the information
                    you need at each stage.
                </div>

            </div>


            <!-- CARD 2 -->

            <div class="brand-bottom-card">

                <div class="bottom-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M12 3v18"></path>
                        <path d="M7 8l5-5 5 5"></path>
                        <path d="M7 16l5 5 5-5"></path>
                    </svg>

                </div>

                <div class="bottom-title">
                    Progressive setup
                </div>

                <div class="bottom-text">
                    Start with what matters now and complete
                    your account later.
                </div>

            </div>


            <!-- CARD 3 -->

            <div class="brand-bottom-card">

                <div class="bottom-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <circle
                            cx="6"
                            cy="12"
                            r="2.5"
                        ></circle>

                        <circle
                            cx="18"
                            cy="6"
                            r="2.5"
                        ></circle>

                        <circle
                            cx="18"
                            cy="18"
                            r="2.5"
                        ></circle>

                        <path d="M8.2 10.9l7.4-3.8"></path>
                        <path d="M8.2 13.1l7.4 3.8"></path>
                    </svg>

                </div>

                <div class="bottom-title">
                    Connected records
                </div>

                <div class="bottom-text">
                    Keep your account, people and business
                    information connected.
                </div>

            </div>

        </div>

    </aside>


    <!-- =========================================================
         RIGHT PANEL
         ========================================================= -->

    <main class="form-panel">

        <div class="form-container">


            <!-- HEADER -->

            <div class="form-eyebrow">
                CREATE YOUR ORDO ACCOUNT
            </div>

            <h2 class="form-title">
                How will you use ORDO?
            </h2>

            <p class="form-description">
                This helps us prepare the right account structure
                before you enter the system.
            </p>


            <!-- =================================================
                 PROGRESS
                 ================================================= -->

            <div
                class="registration-progress"
                aria-label="Registration progress"
            >

                <!-- STEP 1 COMPLETE -->

                <div class="progress-segment active"></div>

                <!-- STEP 2 CURRENT -->

                <div class="progress-segment active"></div>

                <!-- STEP 3 -->

                <div class="progress-segment"></div>

                <!-- STEP 4 -->

                <div class="progress-segment"></div>

                <!-- STEP 5 -->

                <div class="progress-segment"></div>

                <!-- STEP 6 -->

                <div class="progress-segment"></div>

            </div>


            <!-- =================================================
                 ACCOUNT TYPE FORM
                 ================================================= -->

            <form
                method="POST"
                action="{{ route('account.update') }}"
                id="accountTypeForm"
            >

                @csrf


                <!-- =============================================
                     FOR MYSELF
                     ============================================= -->

                <label class="account-option">

                    <input
                        type="radio"
                        name="account_type"
                        value="personal"
                        {{ old('account_type', $accountType ?? '') === 'personal' ? 'checked' : '' }}
                    >

                    <div class="account-card">

                        <div class="account-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <circle
                                    cx="12"
                                    cy="8"
                                    r="3"
                                ></circle>

                                <path
                                    d="M5.5 20c.8-3.3 3.1-5 6.5-5s5.7 1.7 6.5 5"
                                ></path>
                            </svg>

                        </div>


                        <div class="account-copy">

                            <div class="account-title">
                                For myself
                            </div>

                            <div class="account-description">
                                A personal account for your own records,
                                compliance or professional matters.
                            </div>

                        </div>


                        <div class="account-check">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M5 12l4 4L19 6"></path>
                            </svg>

                        </div>

                    </div>

                </label>


                <!-- =============================================
                     PROFESSION / PRACTICE
                     ============================================= -->

                <label class="account-option">

                    <input
                        type="radio"
                        name="account_type"
                        value="profession"
                        {{ old('account_type', $accountType ?? '') === 'profession' ? 'checked' : '' }}
                    >

                    <div class="account-card">

                        <div class="account-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <rect
                                    x="5"
                                    y="7"
                                    width="14"
                                    height="12"
                                    rx="2"
                                ></rect>

                                <path d="M9 7V5h6v2"></path>

                                <path d="M5 12h14"></path>

                                <path d="M10 12v2h4v-2"></path>
                            </svg>

                        </div>


                        <div class="account-copy">

                            <div class="account-title">
                                For my profession or practice
                            </div>

                            <div class="account-description">
                                For a professional, practitioner,
                                consultant, clinic, office or
                                independent practice.
                            </div>

                        </div>


                        <div class="account-check">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M5 12l4 4L19 6"></path>
                            </svg>

                        </div>

                    </div>

                </label>


                <!-- =============================================
                     BUSINESS / ORGANIZATION
                     ============================================= -->

                <label class="account-option">

                    <input
                        type="radio"
                        name="account_type"
                        value="business"
                        {{ old('account_type', $accountType ?? '') === 'business' ? 'checked' : '' }}
                    >

                    <div class="account-card">

                        <div class="account-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path
                                    d="M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16"
                                ></path>

                                <path d="M3 21h18"></path>

                                <path d="M9 7h2"></path>
                                <path d="M13 7h2"></path>

                                <path d="M9 11h2"></path>
                                <path d="M13 11h2"></path>

                                <path d="M10 21v-5h4v5"></path>
                            </svg>

                        </div>


                        <div class="account-copy">

                            <div class="account-title">
                                For a business or organization
                            </div>

                            <div class="account-description">
                                For a corporation, OPC, sole proprietorship,
                                partnership, association, cooperative or
                                other organization.
                            </div>

                        </div>


                        <div class="account-check">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M5 12l4 4L19 6"></path>
                            </svg>

                        </div>

                    </div>

                </label>


                <!-- =============================================
                     INVITED
                     ============================================= -->

                <label class="account-option">

                    <input
                        type="radio"
                        name="account_type"
                        value="invited"
                        {{ old('account_type', $accountType ?? '') === 'invited' ? 'checked' : '' }}
                    >

                    <div class="account-card">

                        <div class="account-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <circle
                                    cx="9"
                                    cy="8"
                                    r="3"
                                ></circle>

                                <path
                                    d="M3.5 19c.7-3 2.7-4.5 5.5-4.5"
                                ></path>

                                <path d="M17 8v6"></path>
                                <path d="M14 11h6"></path>
                            </svg>

                        </div>


                        <div class="account-copy">

                            <div class="account-title">
                                I was invited to an existing account
                            </div>

                            <div class="account-description">
                                Join an existing ORDO account using an
                                invitation provided by an organization,
                                practice or account administrator.
                            </div>

                        </div>


                        <div class="account-check">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M5 12l4 4L19 6"></path>
                            </svg>

                        </div>

                    </div>

                </label>


                <!-- =============================================
                     VALIDATION ERROR
                     ============================================= -->

                @error('account_type')

                    <div class="form-error">
                        {{ $message }}
                    </div>

                @enderror


                <!-- =============================================
                     ACTION BUTTONS
                     ============================================= -->

                <div class="form-actions">

                    <a
                        href="{{ route('register.profile') }}"
                        class="back-button"
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M19 12H5"></path>
                            <path d="M12 19l-7-7 7-7"></path>
                        </svg>

                        Back

                    </a>


                    <button
                        type="submit"
                        class="continue-button"
                    >

                        Continue

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M5 12h14"></path>
                            <path d="M13 6l6 6-6 6"></path>
                        </svg>

                    </button>

                </div>


                <div class="step-label">
                    Step 2 of 6
                </div>

            </form>

        </div>

    </main>

</div>


<!-- =============================================================
     SMALL JS
     ============================================================= -->

<script>

    /*
     * Make the entire account card behave naturally as a
     * selectable radio option.
     *
     * The label already handles selection, so this is only
     * used to make sure keyboard / click interaction remains
     * smooth.
     */

    document
        .querySelectorAll('.account-option')
        .forEach(function (option) {

            option.addEventListener('click', function () {

                const radio =
                    option.querySelector(
                        'input[type="radio"]'
                    );

                if (radio) {
                    radio.checked = true;
                }

            });

        });

</script>

</body>
</html>