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

    <title>Security | ORDO</title>

    <style>

        /* =========================================================
           GLOBAL
        ========================================================== */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;

            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Arial,
                sans-serif;

            background: #f8fafc;
            color: #0f172a;

            -webkit-font-smoothing: antialiased;
        }


        /* =========================================================
           PAGE
        ========================================================== */

        .auth-page {
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 40px 20px;
        }

        .auth-container {
            width: 100%;
            max-width: 580px;
        }


        /* =========================================================
           BRAND
        ========================================================== */

        .auth-brand {
            text-align: center;
            margin-bottom: 28px;
        }

        .brand-name {
            margin: 0;

            font-size: 28px;
            font-weight: 800;

            letter-spacing: 2px;

            color: #0f172a;
        }

        .brand-subtitle {
            margin-top: 6px;

            font-size: 11px;
            font-weight: 700;

            letter-spacing: 0.08em;

            color: #64748b;

            text-transform: uppercase;
        }


        /* =========================================================
           CARD
        ========================================================== */

        .auth-card {
            background: #ffffff;

            border: 1px solid #e2e8f0;

            border-radius: 12px;

            padding: 32px;

            box-shadow:
                0 1px 3px rgba(0, 0, 0, 0.02),
                0 4px 12px rgba(0, 0, 0, 0.03);
        }


        /* =========================================================
           STEP HEADER
        ========================================================== */

        .step-label {
            font-size: 11px;
            font-weight: 700;

            color: #2563eb;

            text-transform: uppercase;

            letter-spacing: 0.06em;

            margin-bottom: 6px;
        }

        .title {
            margin: 0;

            font-size: 24px;
            font-weight: 700;

            color: #0f172a;

            letter-spacing: -0.02em;
        }

        .description {
            margin: 6px 0 20px;

            font-size: 13.5px;

            line-height: 1.5;

            color: #64748b;
        }


        /* =========================================================
           PROGRESS BAR
        ========================================================== */

        .progress {
            display: flex;

            gap: 6px;

            margin-bottom: 28px;
        }

        .progress-step {
            height: 4px;

            flex: 1;

            background: #e2e8f0;

            border-radius: 999px;
        }

        .progress-step.active {
            background: #2563eb;
        }


        /* =========================================================
           FORM
        ========================================================== */

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;

            margin-bottom: 6px;

            font-size: 12.5px;
            font-weight: 600;

            color: #334155;
        }

        .required {
            color: #ef4444;
        }


        /* =========================================================
           PASSWORD INPUT
        ========================================================== */

        input[type="password"] {
            width: 100%;

            height: 42px;

            padding: 0 14px;

            border: 1px solid #cbd5e1;

            border-radius: 8px;

            background: #ffffff;

            color: #0f172a;

            font-size: 13.5px;

            outline: none;

            transition:
                border-color 0.15s ease,
                box-shadow 0.15s ease;
        }

        input[type="password"]:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px
                rgba(37, 99, 235, 0.12);
        }


        /* =========================================================
           VALIDATION
        ========================================================== */

        .field-error {
            margin-top: 7px;

            font-size: 11.5px;

            line-height: 1.4;

            color: #dc2626;
        }

        .input-error {
            border-color: #ef4444 !important;

            box-shadow:
                0 0 0 3px
                rgba(239, 68, 68, 0.08) !important;
        }

        .session-error {
            margin-bottom: 20px;

            padding: 12px 14px;

            border: 1px solid #fecaca;

            border-radius: 8px;

            background: #fef2f2;

            color: #b91c1c;

            font-size: 12.5px;

            line-height: 1.5;
        }


        /* =========================================================
           PASSWORD REQUIREMENTS
        ========================================================== */

        .requirements {
            margin-top: 10px;

            padding: 14px 16px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;

            border-radius: 8px;
        }

        .requirements-title {
            margin: 0 0 8px;

            font-size: 11.5px;
            font-weight: 700;

            color: #334155;
        }

        .requirements ul {
            margin: 0;

            padding-left: 18px;
        }

        .requirements li {
            margin-bottom: 4px;

            font-size: 12px;

            color: #64748b;
        }

        .requirements li:last-child {
            margin-bottom: 0;
        }


        /* =========================================================
           TERMS
        ========================================================== */

        .terms-box {
            margin-top: 24px;

            padding: 14px 16px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;

            border-radius: 8px;
        }

        .terms-label {
            display: flex;

            align-items: flex-start;

            gap: 10px;

            cursor: pointer;

            margin: 0;
        }

        .terms-label input[type="checkbox"] {
            width: 16px;
            height: 16px;

            margin-top: 2px;

            flex-shrink: 0;

            accent-color: #2563eb;

            cursor: pointer;
        }

        .terms-text {
            font-size: 12.5px;

            line-height: 1.5;

            color: #64748b;

            font-weight: 400;
        }

        .terms-text a {
            color: #2563eb;

            font-weight: 600;

            text-decoration: none;
        }

        .terms-text a:hover {
            text-decoration: underline;
        }


        /* =========================================================
           ACTIONS
        ========================================================== */

        .actions {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-top: 28px;

            padding-top: 20px;

            border-top: 1px solid #f1f5f9;
        }

        .back-link {
            color: #64748b;

            font-size: 13px;

            font-weight: 600;

            text-decoration: none;

            transition: color 0.15s ease;
        }

        .back-link:hover {
            color: #0f172a;
        }

        .create-button {
            height: 42px;

            padding: 0 22px;

            border: 0;

            border-radius: 8px;

            background: #2563eb;

            color: #ffffff;

            font-size: 13px;

            font-weight: 600;

            cursor: pointer;

            transition:
                background 0.15s ease,
                transform 0.15s ease,
                box-shadow 0.15s ease;
        }

        .create-button:hover {
            background: #1d4ed8;

            box-shadow:
                0 4px 10px
                rgba(37, 99, 235, 0.18);

            transform: translateY(-1px);
        }

        .create-button:active {
            transform: translateY(0);
        }

        .create-button:focus-visible {
            outline:
                3px solid
                rgba(37, 99, 235, 0.16);

            outline-offset: 2px;
        }


        /* =========================================================
           LOGIN LINK
        ========================================================== */

        .login-link {
            text-align: center;

            margin-top: 24px;

            font-size: 13px;

            color: #64748b;
        }

        .login-link a {
            color: #2563eb;

            font-weight: 600;

            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }


        /* =========================================================
           MOBILE
        ========================================================== */

        @media (max-width: 600px) {

            .auth-page {
                padding: 20px 16px;
            }

            .auth-card {
                padding: 24px 20px;
            }

            .actions {
                gap: 12px;
            }

            .create-button {
                padding: 0 18px;
            }

        }

    </style>

</head>


<body>

<div class="auth-page">

    <div class="auth-container">


        {{-- =====================================================
             BRAND
        ====================================================== --}}

        <div class="auth-brand">

            <h1 class="brand-name">
                ORDO
            </h1>

            <div class="brand-subtitle">
                COMMERCIAL CLIENT PORTAL
            </div>

        </div>


        {{-- =====================================================
             CARD
        ====================================================== --}}

        <div class="auth-card">


            {{-- =================================================
                 STEP
            ================================================== --}}

            <div class="step-label">
                Create Account · Step 3 of 3
            </div>


            <h1 class="title">
                Security
            </h1>


            <p class="description">
                Create a secure password for your ORDO account.
            </p>


            {{-- =================================================
                 PROGRESS
            ================================================== --}}

            <div class="progress">

                <div class="progress-step active"></div>

                <div class="progress-step active"></div>

                <div class="progress-step active"></div>

            </div>


            {{-- =================================================
                 SESSION ERROR
            ================================================== --}}

            @if (session('error'))

                <div class="session-error">

                    {{ session('error') }}

                </div>

            @endif


            {{-- =================================================
                 VALIDATION ERROR
            ================================================== --}}

            @if ($errors->any())

                <div class="session-error">

                    Please correct the highlighted fields
                    before continuing.

                </div>

            @endif


            {{-- =================================================
                 SECURITY FORM

                 IMPORTANT:
                 POST /register/security
                 Route name: security.create

                 DO NOT USE:
                 security.update
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('security.create') }}"
                class="registration-form"
                novalidate
            >

                @csrf


                {{-- =================================================
                     PASSWORD
                ================================================== --}}

                <div class="form-group">

                    <label for="password">

                        Password

                        <span class="required">
                            *
                        </span>

                    </label>


                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Create your password"
                        autocomplete="new-password"
                        required
                        class="@error('password') input-error @enderror"
                    >


                    @error('password')

                        <div class="field-error">

                            {{ $message }}

                        </div>

                    @enderror


                    <div class="requirements">

                        <p class="requirements-title">
                            Password requirements
                        </p>

                        <ul>

                            <li>
                                At least 8 characters
                            </li>

                            <li>
                                At least one uppercase letter
                            </li>

                            <li>
                                At least one lowercase letter
                            </li>

                            <li>
                                At least one number
                            </li>

                        </ul>

                    </div>

                </div>


                {{-- =================================================
                     CONFIRM PASSWORD
                ================================================== --}}

                <div class="form-group">

                    <label for="password_confirmation">

                        Confirm Password

                        <span class="required">
                            *
                        </span>

                    </label>


                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Confirm your password"
                        autocomplete="new-password"
                        required
                        class="@error('password_confirmation') input-error @enderror"
                    >


                    @error('password_confirmation')

                        <div class="field-error">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     TERMS
                ================================================== --}}

                <div class="terms-box">

                    <label class="terms-label">

                        <input
                            type="checkbox"
                            name="terms"
                            value="1"
                            required
                            @checked(old('terms'))
                        >


                        <span class="terms-text">

                            I agree to the

                            <a href="/policies">
                                Terms of Use
                            </a>

                            and

                            <a href="/policies">
                                Privacy Policy
                            </a>.

                        </span>

                    </label>


                    @error('terms')

                        <div class="field-error">

                            {{ $message }}

                        </div>

                    @enderror

                </div>


                {{-- =================================================
                     ACTIONS
                ================================================== --}}

                <div class="actions">


                    <a
                        href="{{ route('register.verification') }}"
                        class="back-link"
                    >

                        ← Back

                    </a>


                    <button
                        type="submit"
                        class="create-button"
                    >

                        Create Account

                    </button>

                </div>


            </form>

        </div>


        {{-- =====================================================
             LOGIN
        ====================================================== --}}

        <div class="login-link">

            Already have an ORDO account?

            <a href="{{ route('login') }}">
                Sign In
            </a>

        </div>


    </div>

</div>

</body>

</html>