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
        content="#061a35"
    >

    <title>Create Account | ORDO</title>

    <style>
        /* =========================================================
           RESET
        ========================================================= */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;

            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                sans-serif;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
        }

        body {
            background: #ffffff;
            color: #0f172a;
            overflow-x: hidden;
        }


        /* =========================================================
           MAIN AUTH WRAPPER
        ========================================================= */

        .auth-wrapper {
            display: flex;

            width: 100%;
            min-height: 100vh;

            background: #ffffff;
        }


        /* =========================================================
           LEFT PANEL
        ========================================================= */

        .left-panel {
            position: relative;

            width: 50%;
            min-height: 100vh;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            padding: 52px 60px;

            color: #ffffff;

            background:
                radial-gradient(
                    circle at 85% 18%,
                    rgba(37, 99, 235, 0.18),
                    transparent 32%
                ),
                linear-gradient(
                    145deg,
                    #05172f 0%,
                    #061a35 52%,
                    #092650 100%
                );

            overflow: hidden;
        }

        .left-panel::after {
            content: "";

            position: absolute;

            width: 360px;
            height: 360px;

            right: -170px;
            bottom: -170px;

            border-radius: 50%;

            border: 1px solid rgba(255, 255, 255, 0.045);

            pointer-events: none;
        }


        /* =========================================================
           BRAND
        ========================================================= */

        .brand-header {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;

            gap: 13px;
        }

        .brand-logo {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #2563eb;
            color: #ffffff;

            border-radius: 10px;

            font-size: 19px;
            font-weight: 800;

            letter-spacing: -0.4px;

            box-shadow:
                0 6px 18px rgba(37, 99, 235, 0.28);
        }

        .brand-name {
            color: #ffffff;

            font-size: 20px;
            font-weight: 800;

            line-height: 1.1;

            letter-spacing: -0.45px;
        }

        .brand-sub {
            margin-top: 3px;

            color: #8da3c0;

            font-size: 10.5px;
            font-weight: 500;

            line-height: 1.2;
        }


        /* =========================================================
           HERO
        ========================================================= */

        .hero-section {
            position: relative;
            z-index: 2;

            max-width: 540px;

            margin: auto 0;

            padding: 55px 0 50px;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;

            color: #60a5fa;

            font-size: 10.5px;
            font-weight: 700;

            letter-spacing: 0.13em;

            text-transform: uppercase;
        }

        .hero-tag::before {
            content: "";

            width: 18px;
            height: 2px;

            margin-right: 8px;

            background: #2563eb;

            border-radius: 2px;
        }

        .hero-title {
            max-width: 510px;

            margin: 17px 0 18px;

            color: #ffffff;

            font-size: 41px;
            font-weight: 800;

            line-height: 1.12;

            letter-spacing: -1px;
        }

        .hero-description {
            max-width: 485px;

            margin-bottom: 28px;

            color: #94a3b8;

            font-size: 13.5px;
            font-weight: 400;

            line-height: 1.65;
        }


        /* =========================================================
           BADGES
        ========================================================= */

        .pill-badges {
            display: flex;
            align-items: center;

            gap: 8px;

            width: 100%;

            overflow-x: auto;

            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .pill-badges::-webkit-scrollbar {
            display: none;
        }

        .badge-pill {
            flex-shrink: 0;

            padding: 7px 12px;

            border: 1px solid rgba(255, 255, 255, 0.10);

            border-radius: 999px;

            background: rgba(255, 255, 255, 0.045);

            color: #cbd5e1;

            font-size: 10.5px;
            font-weight: 600;

            white-space: nowrap;

            backdrop-filter: blur(5px);
        }

        .badge-pill:first-child {
            border-color: rgba(37, 99, 235, 0.32);

            background: rgba(37, 99, 235, 0.12);

            color: #bfdbfe;
        }


        /* =========================================================
           FEATURE CARDS
        ========================================================= */

        .feature-cards {
            position: relative;
            z-index: 2;

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 12px;
        }

        .feature-card {
            min-height: 112px;

            padding: 17px 15px;

            border: 1px solid rgba(255, 255, 255, 0.075);

            border-radius: 10px;

            background: rgba(255, 255, 255, 0.035);

            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, 0.025);
        }

        .feature-card h4 {
            margin-bottom: 7px;

            color: #ffffff;

            font-size: 11.5px;
            font-weight: 700;

            line-height: 1.3;
        }

        .feature-card p {
            color: #8499b5;

            font-size: 10.5px;
            font-weight: 400;

            line-height: 1.5;
        }


        /* =========================================================
           RIGHT PANEL
        ========================================================= */

        .right-panel {
            width: 50%;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 50px 60px;

            background: #ffffff;

            overflow-y: auto;
        }

        .form-container {
            width: 100%;
            max-width: 450px;
        }


        /* =========================================================
           FORM HEADER
        ========================================================= */

        .form-tag {
            display: block;

            margin-bottom: 6px;

            color: #2563eb;

            font-size: 10.5px;
            font-weight: 700;

            letter-spacing: 0.10em;

            text-transform: uppercase;
        }

        .form-title {
            margin: 0 0 7px;

            color: #0f172a;

            font-size: 30px;
            font-weight: 800;

            line-height: 1.15;

            letter-spacing: -0.7px;
        }

        .form-subtitle {
            max-width: 420px;

            margin-bottom: 23px;

            color: #64748b;

            font-size: 13px;
            font-weight: 400;

            line-height: 1.55;
        }


        /* =========================================================
           STEP INDICATOR
        ========================================================= */

        .step-indicator {
            display: flex;
            align-items: center;

            gap: 7px;

            margin-bottom: 26px;
        }

        .step-bar {
            flex: 1;

            height: 4px;

            background: #e2e8f0;

            border-radius: 999px;
        }

        .step-bar.active {
            background: #2563eb;
        }


        /* =========================================================
           FORM GRID
        ========================================================= */

        .form-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 15px 14px;

            margin-bottom: 25px;
        }

        .form-group {
            display: flex;
            flex-direction: column;

            gap: 6px;
        }

        .form-group.full-width {
            grid-column: span 2;
        }


        /* =========================================================
           LABELS
        ========================================================= */

        label {
            color: #334155;

            font-size: 11.5px;
            font-weight: 650;

            line-height: 1.3;
        }

        label .req {
            color: #ef4444;

            margin-left: 1px;
        }


        /* =========================================================
           INPUTS / SELECTS
        ========================================================= */

        input,
        select {
            width: 100%;
            height: 42px;

            padding: 0 12px;

            border: 1px solid #cbd5e1;

            border-radius: 8px;

            outline: none;

            background: #ffffff;
            color: #0f172a;

            font-size: 13px;
            font-weight: 400;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        input::placeholder {
            color: #94a3b8;
        }

        input:hover,
        select:hover {
            border-color: #94a3b8;
        }

        input:focus,
        select:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.10);

            background: #ffffff;
        }

        select {
            cursor: pointer;
        }


        /* =========================================================
           DATE INPUT
        ========================================================= */

        input[type="date"] {
            color-scheme: light;
        }


        /* =========================================================
           ACTIONS
        ========================================================= */

        .actions {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            padding-top: 19px;

            border-top: 1px solid #f1f5f9;
        }

        .back-link {
            display: inline-flex;
            align-items: center;

            color: #64748b;

            font-size: 12.5px;
            font-weight: 600;

            text-decoration: none;

            transition:
                color 0.2s ease,
                transform 0.2s ease;
        }

        .back-link:hover {
            color: #0f172a;

            transform: translateX(-2px);
        }


        /* =========================================================
           PRIMARY BUTTON
        ========================================================= */

        .btn-submit {
            height: 44px;

            padding: 0 28px;

            border: 0;

            border-radius: 8px;

            background: #2563eb;
            color: #ffffff;

            font-size: 13px;
            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 3px 10px rgba(37, 99, 235, 0.18);

            transition:
                background 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .btn-submit:hover {
            background: #1d4ed8;

            transform: translateY(-1px);

            box-shadow:
                0 5px 14px rgba(37, 99, 235, 0.23);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit:focus-visible {
            outline: none;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.14),
                0 3px 10px rgba(37, 99, 235, 0.18);
        }


        /* =========================================================
           LOGIN FOOTER
        ========================================================= */

        .login-footer {
            margin-top: 22px;

            text-align: center;

            color: #64748b;

            font-size: 12px;
            font-weight: 400;

            line-height: 1.5;
        }

        .login-footer a {
            color: #2563eb;

            font-weight: 700;

            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }


        /* =========================================================
           VALIDATION / LARAVEL ERROR SUPPORT
        ========================================================= */

        .input-error {
            border-color: #ef4444 !important;

            box-shadow:
                0 0 0 3px rgba(239, 68, 68, 0.08);
        }

        .error-message {
            margin-top: 2px;

            color: #dc2626;

            font-size: 10.5px;

            line-height: 1.4;
        }


        /* =========================================================
           RESPONSIVE — TABLET
        ========================================================= */

        @media (max-width: 1100px) {

            .left-panel {
                padding: 46px 42px;
            }

            .right-panel {
                padding: 46px 42px;
            }

            .hero-title {
                font-size: 36px;
            }

            .feature-cards {
                grid-template-columns: 1fr;

                gap: 9px;
            }

            .feature-card {
                min-height: auto;
            }
        }


        /* =========================================================
           RESPONSIVE — MOBILE
        ========================================================= */

        @media (max-width: 900px) {

            .auth-wrapper {
                min-height: 100vh;
            }

            .left-panel {
                display: none;
            }

            .right-panel {
                width: 100%;
                min-height: 100vh;

                align-items: flex-start;

                padding: 42px 24px;
            }

            .form-container {
                max-width: 520px;

                margin: auto;
            }
        }


        @media (max-width: 560px) {

            .right-panel {
                padding: 32px 20px;
            }

            .form-title {
                font-size: 27px;
            }

            .form-subtitle {
                font-size: 12.5px;

                margin-bottom: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;

                gap: 14px;
            }

            .form-group.full-width {
                grid-column: span 1;
            }

            .actions {
                align-items: stretch;

                flex-direction: column-reverse;

                gap: 13px;
            }

            .back-link {
                justify-content: center;

                height: 40px;
            }

            .btn-submit {
                width: 100%;
            }

            .login-footer {
                margin-top: 20px;
            }
        }


        /* =========================================================
           REDUCED MOTION
        ========================================================= */

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;

                transition: none !important;
            }
        }
    </style>
</head>


<body>

    <div class="auth-wrapper">

        {{-- =====================================================
             LEFT PANEL
        ====================================================== --}}

        <aside class="left-panel">

            <div>

                {{-- BRAND --}}

                <div class="brand-header">

                    <div class="brand-logo">
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
                        ONBOARDING
                    </span>

                    <h1 class="hero-title">
                        Start your account registration.
                    </h1>

                    <p class="hero-description">
                        Tell us a few basic details to set up your ORDO
                        workspace. Additional account and business details
                        can be completed inside the portal.
                    </p>

                    <div class="pill-badges">

                        <span class="badge-pill">
                            Step 1: Personal Details
                        </span>

                        <span class="badge-pill">
                            Fast Setup
                        </span>

                    </div>

                </div>

            </div>


            {{-- FEATURE CARDS --}}

            <div class="feature-cards">

                <div class="feature-card">

                    <h4>
                        Clear by default
                    </h4>

                    <p>
                        See what needs attention without hunting
                        through menus.
                    </p>

                </div>


                <div class="feature-card">

                    <h4>
                        Progressive setup
                    </h4>

                    <p>
                        Start first. Complete verification within
                        30 days.
                    </p>

                </div>


                <div class="feature-card">

                    <h4>
                        Connected records
                    </h4>

                    <p>
                        Business information stays linked across
                        modules.
                    </p>

                </div>

            </div>

        </aside>


        {{-- =====================================================
             RIGHT PANEL
        ====================================================== --}}

        <main class="right-panel">

            <div class="form-container">

                {{-- FORM HEADER --}}

                <span class="form-tag">
                    CREATE ACCOUNT &bull; STEP 1 OF 3
                </span>

                <h2 class="form-title">
                    About You
                </h2>

                <p class="form-subtitle">
                    Tell us a few basic details to create your
                    ORDO account.
                </p>


                {{-- STEP INDICATOR --}}

                <div
                    class="step-indicator"
                    aria-label="Registration progress"
                >

                    <div class="step-bar active"></div>

                    <div class="step-bar"></div>

                    <div class="step-bar"></div>

                </div>


                {{-- FORM --}}

                <form
                    method="POST"
                    action="/register/contact"
                >

                    @csrf

                    <div class="form-grid">


                        {{-- =================================================
                             FIRST NAME
                        ================================================== --}}

                        <div class="form-group">

                            <label for="first_name">

                                First Name

                                <span class="req">
                                    *
                                </span>

                            </label>

                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                value="{{ old('first_name') }}"
                                placeholder="Enter first name"
                                autocomplete="given-name"
                                class="@error('first_name') input-error @enderror"
                                required
                            >

                            @error('first_name')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- =================================================
                             MIDDLE NAME
                        ================================================== --}}

                        <div class="form-group">

                            <label for="middle_name">
                                Middle Name
                            </label>

                            <input
                                type="text"
                                id="middle_name"
                                name="middle_name"
                                value="{{ old('middle_name') }}"
                                placeholder="Enter middle name"
                                autocomplete="additional-name"
                                class="@error('middle_name') input-error @enderror"
                            >

                            @error('middle_name')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- =================================================
                             LAST NAME
                        ================================================== --}}

                        <div class="form-group">

                            <label for="last_name">

                                Last Name

                                <span class="req">
                                    *
                                </span>

                            </label>

                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                value="{{ old('last_name') }}"
                                placeholder="Enter last name"
                                autocomplete="family-name"
                                class="@error('last_name') input-error @enderror"
                                required
                            >

                            @error('last_name')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- =================================================
                             SUFFIX
                        ================================================== --}}

                        <div class="form-group">

                            <label for="suffix">
                                Suffix
                            </label>

                            <select
                                id="suffix"
                                name="suffix"
                                class="@error('suffix') input-error @enderror"
                            >

                                <option value="">
                                    Select suffix
                                </option>

                                <option
                                    value="Jr."
                                    {{ old('suffix') === 'Jr.' ? 'selected' : '' }}
                                >
                                    Jr.
                                </option>

                                <option
                                    value="Sr."
                                    {{ old('suffix') === 'Sr.' ? 'selected' : '' }}
                                >
                                    Sr.
                                </option>

                                <option
                                    value="II"
                                    {{ old('suffix') === 'II' ? 'selected' : '' }}
                                >
                                    II
                                </option>

                                <option
                                    value="III"
                                    {{ old('suffix') === 'III' ? 'selected' : '' }}
                                >
                                    III
                                </option>

                                <option
                                    value="IV"
                                    {{ old('suffix') === 'IV' ? 'selected' : '' }}
                                >
                                    IV
                                </option>

                            </select>

                            @error('suffix')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- =================================================
                             DATE OF BIRTH
                        ================================================== --}}

                        <div class="form-group">

                            <label for="date_of_birth">

                                Date of Birth

                                <span class="req">
                                    *
                                </span>

                            </label>

                            <input
                                type="date"
                                id="date_of_birth"
                                name="date_of_birth"
                                value="{{ old('date_of_birth') }}"
                                autocomplete="bday"
                                class="@error('date_of_birth') input-error @enderror"
                                required
                            >

                            @error('date_of_birth')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- =================================================
                             GENDER
                        ================================================== --}}

                        <div class="form-group">

                            <label for="gender">
                                Gender
                            </label>

                            <select
                                id="gender"
                                name="gender"
                                class="@error('gender') input-error @enderror"
                            >

                                <option value="">
                                    Select gender
                                </option>

                                <option
                                    value="male"
                                    {{ old('gender') === 'male' ? 'selected' : '' }}
                                >
                                    Male
                                </option>

                                <option
                                    value="female"
                                    {{ old('gender') === 'female' ? 'selected' : '' }}
                                >
                                    Female
                                </option>

                                <option
                                    value="prefer-not-to-say"
                                    {{ old('gender') === 'prefer-not-to-say' ? 'selected' : '' }}
                                >
                                    Prefer not to say
                                </option>

                            </select>

                            @error('gender')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- =================================================
                             COUNTRY / REGION
                        ================================================== --}}

                        <div class="form-group full-width">

                            <label for="country">

                                Country / Region

                                <span class="req">
                                    *
                                </span>

                            </label>

                            <select
                                id="country"
                                name="country"
                                class="@error('country') input-error @enderror"
                                required
                            >

                                <option value="">
                                    Select country / region
                                </option>

                                <option
                                    value="PH"
                                    {{ old('country') === 'PH' ? 'selected' : '' }}
                                >
                                    Philippines
                                </option>

                                <option
                                    value="US"
                                    {{ old('country') === 'US' ? 'selected' : '' }}
                                >
                                    United States
                                </option>

                                <option
                                    value="SG"
                                    {{ old('country') === 'SG' ? 'selected' : '' }}
                                >
                                    Singapore
                                </option>

                                <option
                                    value="AU"
                                    {{ old('country') === 'AU' ? 'selected' : '' }}
                                >
                                    Australia
                                </option>

                                <option
                                    value="OTHER"
                                    {{ old('country') === 'OTHER' ? 'selected' : '' }}
                                >
                                    Other
                                </option>

                            </select>

                            @error('country')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>


                    {{-- =====================================================
                         ACTIONS
                    ====================================================== --}}

                    <div class="actions">

                        <a
                            href="/login"
                            class="back-link"
                        >
                            &larr;&nbsp; Back to Login
                        </a>

                        <button
                            type="submit"
                            class="btn-submit"
                        >
                            Continue
                        </button>

                    </div>

                </form>


                {{-- =====================================================
                     LOGIN FOOTER
                ====================================================== --}}

                <div class="login-footer">

                    Already have an ORDO account?

                    <a href="/login">
                        Sign In
                    </a>

                </div>

            </div>

        </main>

    </div>

</body>

</html>