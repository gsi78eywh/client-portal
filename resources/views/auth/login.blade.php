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
        content="#071a33"
    >

    <title>Sign In | ORDO</title>

    <style>
        /* =========================================================
           ORDO
           SIGN IN — FINAL UI SYSTEM
        ========================================================== */

        :root {
            --ordo-blue: #2563eb;
            --ordo-blue-dark: #1d4ed8;
            --ordo-blue-deep: #1e40af;
            --ordo-blue-light: #60a5fa;
            --ordo-blue-soft: #eff6ff;
            --ordo-blue-tint: #dbeafe;

            --navy-950: #031126;
            --navy-900: #071a33;
            --navy-850: #092342;
            --navy-800: #0b2d55;

            --slate-950: #0f172a;
            --slate-900: #172033;
            --slate-800: #1e293b;
            --slate-700: #334155;
            --slate-600: #475569;
            --slate-500: #64748b;
            --slate-400: #94a3b8;
            --slate-300: #cbd5e1;
            --slate-200: #e2e8f0;
            --slate-100: #f1f5f9;
            --slate-50: #f8fafc;

            --white: #ffffff;

            --radius-sm: 7px;
            --radius-md: 10px;
            --radius-lg: 14px;
            --radius-xl: 18px;

            --shadow-blue:
                0 8px 24px rgba(37, 99, 235, 0.22);

            --shadow-button:
                0 5px 14px rgba(37, 99, 235, 0.20);

            --shadow-card:
                0 14px 35px rgba(15, 23, 42, 0.06);

            --transition: 180ms ease;
        }

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
            width: 100%;
            min-height: 100%;
        }

        html {
            background: var(--white);
            overflow-x: hidden;
        }

        body {
            min-height: 100vh;
            color: var(--slate-950);
            background: var(--white);

            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                sans-serif;

            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        button,
        input {
            font: inherit;
        }

        button,
        a,
        input {
            -webkit-tap-highlight-color: transparent;
        }

        a {
            color: inherit;
        }

        /* =========================================================
           PAGE
        ========================================================== */

        .login-wrapper {
            width: 100%;
            min-height: 100vh;

            display: flex;

            background: var(--white);
        }

        /* =========================================================
           LEFT PANEL
        ========================================================== */

        .left-panel {
            position: relative;

            width: 50%;
            min-height: 100vh;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            padding: 46px 52px 42px;

            overflow: hidden;

            color: var(--white);

            background:
                linear-gradient(
                    142deg,
                    var(--navy-950) 0%,
                    var(--navy-900) 47%,
                    var(--navy-850) 78%,
                    var(--navy-800) 100%
                );
        }

        /* =========================================================
           BACKGROUND DECORATION
        ========================================================== */

        .left-panel::before {
            content: "";

            position: absolute;

            width: 620px;
            height: 620px;

            top: -340px;
            right: -270px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(37, 99, 235, 0.20) 0%,
                    rgba(37, 99, 235, 0.075) 34%,
                    rgba(37, 99, 235, 0) 72%
                );

            pointer-events: none;
        }

        .left-panel::after {
            content: "";

            position: absolute;

            width: 540px;
            height: 540px;

            bottom: -350px;
            left: -300px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(37, 99, 235, 0.13) 0%,
                    rgba(37, 99, 235, 0) 70%
                );

            pointer-events: none;
        }

        /* =========================================================
           SUBTLE GRID
        ========================================================== */

        .background-grid {
            position: absolute;
            inset: 0;

            opacity: 0.035;

            background-image:
                linear-gradient(
                    rgba(255, 255, 255, 0.7) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(255, 255, 255, 0.7) 1px,
                    transparent 1px
                );

            background-size: 46px 46px;

            pointer-events: none;
        }

        /* =========================================================
           CONTENT
        ========================================================== */

        .left-content,
        .feature-cards {
            position: relative;
            z-index: 2;
        }

        /* =========================================================
           BRAND
        ========================================================== */

        .brand-header {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 43px;
            height: 43px;
            flex: 0 0 43px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 11px;

            background:
                linear-gradient(
                    145deg,
                    #3b82f6,
                    #2563eb
                );

            color: var(--white);

            font-size: 19px;
            font-weight: 800;

            letter-spacing: -0.5px;

            box-shadow: var(--shadow-blue);
        }

        .brand-name {
            color: var(--white);

            font-size: 21px;
            font-weight: 800;

            line-height: 1;
            letter-spacing: -0.55px;
        }

        .brand-sub {
            margin-top: 5px;

            color: #91a6c0;

            font-size: 10.5px;
            font-weight: 500;

            line-height: 1.2;
        }

        /* =========================================================
           HERO
        ========================================================== */

        .hero-section {
            max-width: 570px;

            margin: auto 0;

            padding: 52px 0 46px;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;

            color: var(--ordo-blue-light);

            font-size: 10.5px;
            font-weight: 700;

            letter-spacing: 0.11em;
            line-height: 1.2;

            text-transform: uppercase;
        }

        .hero-tag::before {
            content: "";

            width: 6px;
            height: 6px;

            margin-right: 8px;

            border-radius: 50%;

            background: var(--ordo-blue-light);

            box-shadow:
                0 0 0 4px
                rgba(96, 165, 250, 0.08);
        }

        .hero-title {
            max-width: 550px;

            margin: 16px 0 18px;

            color: var(--white);

            font-size: clamp(36px, 3.1vw, 46px);
            font-weight: 800;

            line-height: 1.07;
            letter-spacing: -1.45px;
        }

        .hero-description {
            max-width: 510px;

            margin-bottom: 30px;

            color: #9cafc6;

            font-size: 13.5px;
            font-weight: 400;

            line-height: 1.7;
        }

        /* =========================================================
           INFORMATION BADGES
        ========================================================== */

        .pill-badges {
            width: 100%;

            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 8px;
        }

        .badge-pill {
            min-width: 0;
            height: 36px;

            display: flex;
            align-items: center;

            padding: 0 10px;

            border: 1px solid rgba(255, 255, 255, 0.09);
            border-radius: 999px;

            background: rgba(255, 255, 255, 0.045);

            color: #cbd5e1;

            font-size: 9.4px;
            font-weight: 500;

            line-height: 1;
            white-space: nowrap;

            backdrop-filter: blur(10px);

            transition:
                background-color var(--transition),
                border-color var(--transition),
                transform var(--transition);
        }

        .badge-pill:hover {
            background: rgba(255, 255, 255, 0.075);

            border-color:
                rgba(96, 165, 250, 0.30);

            transform: translateY(-1px);
        }

        .badge-dot {
            width: 7px;
            height: 7px;

            flex: 0 0 7px;

            margin-right: 7px;

            border-radius: 50%;

            background: var(--ordo-blue-light);

            box-shadow:
                0 0 0 3px
                rgba(96, 165, 250, 0.09);
        }

        /* =========================================================
           FEATURE CARDS
        ========================================================== */

        .feature-cards {
            width: 100%;

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 11px;
        }

        .feature-card {
            min-width: 0;

            padding: 16px 15px 17px;

            border:
                1px solid
                rgba(255, 255, 255, 0.075);

            border-radius: var(--radius-md);

            background:
                rgba(255, 255, 255, 0.035);

            transition:
                background-color var(--transition),
                border-color var(--transition),
                transform var(--transition),
                box-shadow var(--transition);
        }

        .feature-card:hover {
            background:
                rgba(255, 255, 255, 0.06);

            border-color:
                rgba(255, 255, 255, 0.13);

            transform: translateY(-2px);

            box-shadow:
                0 10px 25px
                rgba(0, 0, 0, 0.10);
        }

        .feature-icon {
            width: 30px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 12px;

            border:
                1px solid
                rgba(96, 165, 250, 0.17);

            border-radius: 8px;

            background:
                rgba(37, 99, 235, 0.13);

            color:
                var(--ordo-blue-light);
        }

        .feature-icon svg {
            width: 15px;
            height: 15px;
        }

        .feature-card h4 {
            margin-bottom: 6px;

            color: var(--white);

            font-size: 11.8px;
            font-weight: 700;

            line-height: 1.3;
        }

        .feature-card p {
            color: #8ea4be;

            font-size: 10.2px;
            font-weight: 400;

            line-height: 1.55;
        }

        /* =========================================================
           RIGHT PANEL
        ========================================================== */

        .right-panel {
            width: 50%;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 44px 54px;

            background: var(--white);

            overflow-y: auto;
            overflow-x: hidden;
        }

        .form-container {
            width: 100%;
            max-width: 410px;

            margin: 0 auto;
        }

        /* =========================================================
           FORM HEADER
        ========================================================== */

        .form-tag {
            display: block;

            margin-bottom: 8px;

            color: var(--ordo-blue);

            font-size: 10.5px;
            font-weight: 700;

            letter-spacing: 0.095em;
            line-height: 1.2;

            text-transform: uppercase;
        }

        .form-title {
            margin-bottom: 9px;

            color: var(--slate-950);

            font-size: 30px;
            font-weight: 800;

            line-height: 1.14;
            letter-spacing: -0.85px;
        }

        .form-subtitle {
            max-width: 390px;

            margin-bottom: 30px;

            color: var(--slate-500);

            font-size: 13px;
            font-weight: 400;

            line-height: 1.6;
        }

        /* =========================================================
           FORM
        ========================================================== */

        .form-group {
            margin-bottom: 18px;
        }

        .form-label-row {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 7px;
        }

        .form-label {
            display: block;

            color: var(--slate-700);

            font-size: 12px;
            font-weight: 600;

            line-height: 1.3;
        }

        /* =========================================================
           INPUT
        ========================================================== */

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;

            top: 50%;
            left: 13px;

            width: 17px;
            height: 17px;

            color: var(--slate-400);

            transform: translateY(-50%);

            pointer-events: none;

            transition:
                color var(--transition);
        }

        .input-wrapper:focus-within .input-icon {
            color: var(--ordo-blue);
        }

        .form-input {
            width: 100%;
            height: 48px;

            padding: 0 14px 0 40px;

            border:
                1px solid
                var(--slate-300);

            border-radius: var(--radius-md);

            outline: none;

            background: var(--white);
            color: var(--slate-950);

            font-size: 13.5px;
            font-weight: 400;

            transition:
                border-color var(--transition),
                box-shadow var(--transition),
                background-color var(--transition);
        }

        .form-input::placeholder {
            color: var(--slate-400);
        }

        .form-input:hover {
            border-color: #94a3b8;
        }

        .form-input:focus {
            border-color: var(--ordo-blue);

            background: #fcfdff;

            box-shadow:
                0 0 0 3px
                rgba(37, 99, 235, 0.10);
        }

        /* =========================================================
           PASSWORD
        ========================================================== */

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-input {
            padding-right: 49px;
        }

        .password-toggle {
            position: absolute;

            top: 50%;
            right: 8px;

            width: 32px;
            height: 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            transform: translateY(-50%);

            border: 0;
            border-radius: 8px;

            background: transparent;
            color: var(--slate-500);

            cursor: pointer;

            transition:
                color var(--transition),
                background-color var(--transition);
        }

        .password-toggle:hover {
            color: var(--ordo-blue);
            background: var(--ordo-blue-soft);
        }

        .password-toggle:focus-visible {
            outline:
                2px solid
                rgba(37, 99, 235, 0.35);

            outline-offset: 1px;
        }

        .password-toggle svg {
            width: 17px;
            height: 17px;
        }

        /* =========================================================
           OPTIONS
        ========================================================== */

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-top: 3px;
            margin-bottom: 22px;
        }

        .remember-me {
            display: inline-flex;
            align-items: center;

            gap: 8px;

            color: var(--slate-600);

            font-size: 12px;
            font-weight: 500;

            cursor: pointer;
            user-select: none;
        }

        .remember-me input {
            width: 15px;
            height: 15px;

            margin: 0;

            accent-color: var(--ordo-blue);

            cursor: pointer;
        }

        .forgot-link {
            color: var(--ordo-blue);

            font-size: 12px;
            font-weight: 600;

            text-decoration: none;

            transition:
                color var(--transition);
        }

        .forgot-link:hover {
            color: var(--ordo-blue-dark);

            text-decoration: underline;
            text-underline-offset: 3px;
        }

        /* =========================================================
           BUTTON
        ========================================================== */

        .btn-submit {
            position: relative;

            width: 100%;
            height: 48px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border:
                1px solid
                var(--ordo-blue);

            border-radius: var(--radius-md);

            background:
                linear-gradient(
                    180deg,
                    #2f6df0 0%,
                    #2563eb 100%
                );

            color: var(--white);

            font-size: 13.5px;
            font-weight: 700;

            cursor: pointer;

            box-shadow: var(--shadow-button);

            transition:
                background-color var(--transition),
                border-color var(--transition),
                box-shadow var(--transition),
                transform var(--transition);
        }

        .btn-submit:hover {
            background:
                linear-gradient(
                    180deg,
                    #2563eb 0%,
                    #1d4ed8 100%
                );

            border-color: var(--ordo-blue-dark);

            box-shadow:
                0 7px 18px
                rgba(37, 99, 235, 0.25);

            transform: translateY(-1px);
        }

        .btn-submit:active {
            transform: translateY(0);

            box-shadow:
                0 3px 8px
                rgba(37, 99, 235, 0.18);
        }

        .btn-submit:focus-visible {
            outline:
                3px solid
                rgba(37, 99, 235, 0.18);

            outline-offset: 2px;
        }

        /* =========================================================
           DIVIDER
        ========================================================== */

        .divider {
            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 24px 0;
        }

        .divider::before {
            content: "";

            position: absolute;

            left: 0;
            right: 0;
            top: 50%;

            height: 1px;

            background: var(--slate-200);
        }

        .divider span {
            position: relative;
            z-index: 2;

            padding: 0 12px;

            background: var(--white);

            color: var(--slate-400);

            font-size: 10.5px;
            font-weight: 500;
        }

        /* =========================================================
           CREATE ACCOUNT
        ========================================================== */

        .btn-create-account {
            width: 100%;
            height: 48px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            border:
                1px solid
                var(--slate-300);

            border-radius: var(--radius-md);

            background: var(--white);

            color: var(--slate-900);

            font-size: 13.5px;
            font-weight: 700;

            text-decoration: none;

            transition:
                background-color var(--transition),
                border-color var(--transition),
                color var(--transition),
                transform var(--transition),
                box-shadow var(--transition);
        }

        .btn-create-account:hover {
            background: var(--slate-50);

            border-color: #94a3b8;

            color: var(--slate-950);

            transform: translateY(-1px);

            box-shadow:
                0 5px 12px
                rgba(15, 23, 42, 0.06);
        }

        .btn-create-account:focus-visible {
            outline:
                3px solid
                rgba(37, 99, 235, 0.14);

            outline-offset: 2px;
        }

        /* =========================================================
           TERMS
        ========================================================== */

        .terms-text {
            max-width: 350px;

            margin: 21px auto 0;

            color: var(--slate-400);

            font-size: 10.5px;
            font-weight: 400;

            line-height: 1.58;

            text-align: center;
        }

        .terms-text a {
            color: var(--slate-500);

            text-decoration: underline;

            text-decoration-color: #cbd5e1;

            text-underline-offset: 2px;
        }

        .terms-text a:hover {
            color: var(--ordo-blue);
        }

        /* =========================================================
           ERRORS
        ========================================================== */

        .form-error {
            margin-top: 7px;

            color: #dc2626;

            font-size: 11px;
            font-weight: 500;

            line-height: 1.45;
        }

        .form-input.is-error {
            border-color: #ef4444;
        }

        .form-input.is-error:focus {
            border-color: #ef4444;

            box-shadow:
                0 0 0 3px
                rgba(239, 68, 68, 0.10);
        }

        /* =========================================================
           SESSION STATUS
        ========================================================== */

        .status-message {
            margin-bottom: 20px;

            padding: 11px 13px;

            border:
                1px solid
                #bfdbfe;

            border-radius: var(--radius-md);

            background: var(--ordo-blue-soft);

            color: var(--ordo-blue-deep);

            font-size: 11.5px;
            font-weight: 500;

            line-height: 1.5;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================== */

        @media (max-width: 1250px) {
            .left-panel {
                padding-left: 42px;
                padding-right: 42px;
            }

            .right-panel {
                padding-left: 42px;
                padding-right: 42px;
            }

            .hero-title {
                font-size: 39px;
            }

            .badge-pill {
                font-size: 9px;

                padding-left: 8px;
                padding-right: 8px;
            }

            .badge-dot {
                width: 6px;
                height: 6px;

                flex-basis: 6px;

                margin-right: 5px;
            }
        }

        @media (max-width: 1100px) {
            .left-panel {
                padding-left: 32px;
                padding-right: 32px;
            }

            .right-panel {
                padding-left: 32px;
                padding-right: 32px;
            }

            .hero-title {
                font-size: 35px;
            }

            .hero-description {
                font-size: 12.5px;
            }

            .pill-badges {
                gap: 6px;
            }

            .badge-pill {
                height: 33px;

                font-size: 8.2px;

                padding-left: 7px;
                padding-right: 7px;
            }

            .feature-cards {
                gap: 8px;
            }

            .feature-card {
                padding:
                    14px
                    12px
                    15px;
            }

            .feature-card h4 {
                font-size: 11.2px;
            }

            .feature-card p {
                font-size: 9.6px;
            }

            .feature-icon {
                width: 27px;
                height: 27px;
            }
        }

        @media (max-width: 900px) {
            .left-panel {
                display: none;
            }

            .right-panel {
                width: 100%;
                min-height: 100vh;

                padding:
                    48px
                    32px;
            }

            .form-container {
                max-width: 500px;
            }
        }

        @media (max-width: 600px) {
            .right-panel {
                min-height: 100vh;

                padding:
                    38px
                    22px
                    40px;

                align-items: flex-start;
            }

            .form-container {
                max-width: 100%;
            }

            .form-title {
                font-size: 28px;
            }

            .form-subtitle {
                margin-bottom: 27px;

                font-size: 12.5px;
            }

            .form-input,
            .btn-submit,
            .btn-create-account {
                height: 48px;
            }

            .form-options {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 420px) {
            .right-panel {
                padding-left: 18px;
                padding-right: 18px;
            }

            .form-title {
                font-size: 26px;
            }

            .form-subtitle {
                font-size: 12px;
            }

            .form-label {
                font-size: 11.5px;
            }

            .form-input {
                font-size: 13px;
            }

            .remember-me,
            .forgot-link {
                font-size: 11px;
            }
        }

        @media (max-width: 340px) {
            .right-panel {
                padding-left: 15px;
                padding-right: 15px;
            }

            .form-title {
                font-size: 24px;
            }

            .form-options {
                gap: 10px;
            }

            .remember-me,
            .forgot-link {
                font-size: 10.5px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition: none !important;
                animation: none !important;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    {{-- =========================================================
         LEFT PANEL
    ========================================================== --}}

    <section class="left-panel">

        <div class="background-grid"></div>

        <div class="left-content">

            {{-- BRAND --}}

            <div class="brand-header">

                <div
                    class="brand-logo"
                    aria-hidden="true"
                >
                    O
                </div>

                <div>

                    <div class="brand-name">
                        ORDO
                    </div>

                    <div class="brand-sub">
                        by John Kelly &amp; Company
                    </div>

                </div>

            </div>


            {{-- HERO --}}

            <div class="hero-section">

                <span class="hero-tag">
                    Business, organized.
                </span>

                <h1 class="hero-title">
                    One workspace for the business you're building.
                </h1>

                <p class="hero-description">
                    Manage governance, compliance, finance, people,
                    records and JK&amp;C services from one controlled
                    client workspace.
                </p>


                {{-- INFORMATION BADGES --}}

                <div class="pill-badges">

                    <span class="badge-pill">
                        <span class="badge-dot"></span>
                        <span>6 business modules</span>
                    </span>

                    <span class="badge-pill">
                        <span class="badge-dot"></span>
                        <span>30-day full access</span>
                    </span>

                    <span class="badge-pill">
                        <span class="badge-dot"></span>
                        <span>3 modules free after trial</span>
                    </span>

                    <span class="badge-pill">
                        <span class="badge-dot"></span>
                        <span>JK&amp;C support built in</span>
                    </span>

                </div>

            </div>

        </div>


        {{-- =====================================================
             FEATURE CARDS
        ====================================================== --}}

        <div class="feature-cards">

            {{-- CLEAR BY DEFAULT --}}

            <div class="feature-card">

                <div
                    class="feature-icon"
                    aria-hidden="true"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M4 5h16"></path>
                        <path d="M4 12h16"></path>
                        <path d="M4 19h16"></path>

                        <circle
                            cx="8"
                            cy="5"
                            r="1.5"
                        ></circle>

                        <circle
                            cx="15"
                            cy="12"
                            r="1.5"
                        ></circle>

                        <circle
                            cx="11"
                            cy="19"
                            r="1.5"
                        ></circle>
                    </svg>

                </div>

                <h4>
                    Clear by default
                </h4>

                <p>
                    See what needs attention without hunting
                    through menus.
                </p>

            </div>


            {{-- PROGRESSIVE SETUP --}}

            <div class="feature-card">

                <div
                    class="feature-icon"
                    aria-hidden="true"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M12 3v18"></path>
                        <path d="M5 8l7-5 7 5"></path>
                        <path d="M5 16l7 5 7-5"></path>
                    </svg>

                </div>

                <h4>
                    Progressive setup
                </h4>

                <p>
                    Start first. Complete verification within
                    30 days.
                </p>

            </div>


            {{-- CONNECTED RECORDS --}}

            <div class="feature-card">

                <div
                    class="feature-icon"
                    aria-hidden="true"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <rect
                            x="4"
                            y="4"
                            width="6"
                            height="6"
                            rx="1"
                        ></rect>

                        <rect
                            x="14"
                            y="4"
                            width="6"
                            height="6"
                            rx="1"
                        ></rect>

                        <rect
                            x="9"
                            y="14"
                            width="6"
                            height="6"
                            rx="1"
                        ></rect>

                        <path d="M10 7h4"></path>
                        <path d="M17 10v2"></path>
                        <path d="M12 14v-4"></path>
                    </svg>

                </div>

                <h4>
                    Connected records
                </h4>

                <p>
                    Business information stays linked across
                    modules.
                </p>

            </div>

        </div>

    </section>


    {{-- =========================================================
         RIGHT PANEL
    ========================================================== --}}

    <main class="right-panel">

        <div class="form-container">

            {{-- FORM HEADER --}}

            <span class="form-tag">
                Welcome back
            </span>

            <h2 class="form-title">
                Sign in to ORDO
            </h2>

            <p class="form-subtitle">
                Access your business workspace and JK&amp;C
                client services.
            </p>


            {{-- =================================================
                 SESSION STATUS
            ================================================== --}}

            @if (session('status'))

                <div
                    class="status-message"
                    role="status"
                >
                    {{ session('status') }}
                </div>

            @endif


            {{-- =================================================
                 LOGIN FORM
            ================================================== --}}

            <form
                method="POST"
                action="{{ url('/login') }}"
            >

                @csrf


                {{-- EMAIL --}}

                <div class="form-group">

                    <label
                        for="email"
                        class="form-label"
                    >
                        Email address
                    </label>

                    <div class="input-wrapper">

                        <svg
                            class="input-icon"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <rect
                                x="3"
                                y="5"
                                width="18"
                                height="14"
                                rx="2"
                            ></rect>

                            <path d="m3 7 9 6 9-6"></path>
                        </svg>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input {{ $errors->has('email') ? 'is-error' : '' }}"
                            value="{{ old('email') }}"
                            placeholder="Enter your email address"
                            autocomplete="email"
                            required
                            autofocus
                        >

                    </div>

                    @error('email')

                        <div
                            class="form-error"
                            role="alert"
                        >
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- PASSWORD --}}

                <div class="form-group">

                    <label
                        for="password"
                        class="form-label"
                    >
                        Password
                    </label>

                    <div class="password-wrapper">

                        <svg
                            class="input-icon"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <rect
                                x="4"
                                y="10"
                                width="16"
                                height="11"
                                rx="2"
                            ></rect>

                            <path
                                d="M8 10V7a4 4 0 0 1 8 0v3"
                            ></path>
                        </svg>


                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input {{ $errors->has('password') ? 'is-error' : '' }}"
                            placeholder="Enter your password"
                            autocomplete="current-password"
                            required
                        >


                        <button
                            type="button"
                            class="password-toggle"
                            id="passwordToggle"
                            aria-label="Show password"
                            aria-controls="password"
                            aria-pressed="false"
                        >

                            <svg
                                id="eyeIcon"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >

                                <path
                                    d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"
                                ></path>

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="2.5"
                                ></circle>

                            </svg>

                        </button>

                    </div>

                    @error('password')

                        <div
                            class="form-error"
                            role="alert"
                        >
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- REMEMBER / FORGOT PASSWORD --}}

                <div class="form-options">

                    <label class="remember-me">

                        <input
                            type="checkbox"
                            name="remember"
                            id="remember"
                            value="1"
                            {{ old('remember') ? 'checked' : '' }}
                        >

                        <span>
                            Remember me
                        </span>

                    </label>


                    <a
                        href="{{ url('/forgot-password') }}"
                        class="forgot-link"
                    >
                        Forgot password?
                    </a>

                </div>


                {{-- SIGN IN --}}

                <button
                    type="submit"
                    class="btn-submit"
                >
                    Sign in
                </button>

            </form>


            {{-- DIVIDER --}}

            <div class="divider">

                <span>
                    New to ORDO?
                </span>

            </div>


            {{-- CREATE ACCOUNT --}}

            <a
                href="{{ url('/register') }}"
                class="btn-create-account"
            >
                Create an account
            </a>


            {{-- TERMS --}}

            <p class="terms-text">

                By continuing, you agree to ORDO

                <a href="#">
                    Terms of Use
                </a>

                and

                <a href="#">
                    Privacy Policy
                </a>.

            </p>

        </div>

    </main>

</div>


{{-- =========================================================
     PASSWORD VISIBILITY
========================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const password =
        document.getElementById('password');

    const toggle =
        document.getElementById('passwordToggle');

    const eyeIcon =
        document.getElementById('eyeIcon');


    if (
        !password ||
        !toggle ||
        !eyeIcon
    ) {
        return;
    }


    toggle.addEventListener('click', function () {

        const isPassword =
            password.type === 'password';


        password.type =
            isPassword
                ? 'text'
                : 'password';


        toggle.setAttribute(
            'aria-label',
            isPassword
                ? 'Hide password'
                : 'Show password'
        );


        toggle.setAttribute(
            'aria-pressed',
            isPassword
                ? 'true'
                : 'false'
        );


        if (isPassword) {

            eyeIcon.innerHTML = `
                <path d="M3 3l18 18"></path>

                <path
                    d="M10.6 10.6a2 2 0 0 0 2.8 2.8"
                ></path>

                <path
                    d="M9.9 5.2A10.7 10.7 0 0 1 12 5c6.5 0 10 7 10 7a18.5 18.5 0 0 1-3.1 3.8"
                ></path>

                <path
                    d="M6.1 6.1C3.5 8 2 12 2 12s3.5 7 10 7c1.7 0 3.1-.4 4.4-1"
                ></path>
            `;

        } else {

            eyeIcon.innerHTML = `
                <path
                    d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"
                ></path>

                <circle
                    cx="12"
                    cy="12"
                    r="2.5"
                ></circle>
            `;

        }

    });

});

</script>

</body>
</html>