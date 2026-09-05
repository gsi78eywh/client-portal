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
        content="#061d3d"
    >

    <title>Reset Password | ORDO</title>

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
            background: #ffffff;
            overflow-x: hidden;
        }

        body {
            min-height: 100vh;
        }


        /* =========================================================
           MAIN AUTH WRAPPER
        ========================================================= */

        .auth-wrapper {
            display: flex;
            min-height: 100vh;
            width: 100%;
            background: #ffffff;
        }


        /* =========================================================
           LEFT PANEL
           ORDO BRAND / SECURITY HERO
        ========================================================= */

        .left-panel {
            width: 50%;
            min-height: 100vh;

            background:
                linear-gradient(
                    145deg,
                    #051833 0%,
                    #072248 50%,
                    #0a2b5a 100%
                );

            color: #ffffff;

            padding: 56px 64px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }


        /* =========================================================
           BRAND HEADER
        ========================================================= */

        .brand-header {
            display: flex;
            align-items: center;
            gap: 14px;
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

            font-size: 20px;
            font-weight: 800;

            line-height: 1;

            box-shadow:
                0 4px 14px rgba(37, 99, 235, 0.35);
        }

        .brand-name {
            color: #ffffff;

            font-size: 21px;
            font-weight: 800;

            line-height: 1.1;

            letter-spacing: -0.5px;
        }

        .brand-sub {
            margin-top: 2px;

            color: #8aa2c0;

            font-size: 11px;
            font-weight: 500;

            line-height: 1.3;
        }


        /* =========================================================
           HERO SECTION
        ========================================================= */

        .hero-section {
            margin: auto 0;
            padding: 40px 0;
        }

        .hero-tag {
            display: inline-block;

            color: #2563eb;

            font-size: 11px;
            font-weight: 700;

            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .hero-title {
            max-width: 500px;

            margin: 16px 0 18px;

            color: #ffffff;

            font-size: 42px;
            font-weight: 800;

            line-height: 1.12;

            letter-spacing: -0.8px;
        }

        .hero-description {
            max-width: 480px;

            margin-bottom: 28px;

            color: #94a3b8;

            font-size: 13.5px;
            font-weight: 400;

            line-height: 1.6;
        }


        /* =========================================================
           SECURITY BADGES
        ========================================================= */

        .pill-badges {
            display: flex;
            flex-wrap: nowrap;
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
            white-space: nowrap;

            padding: 6px 12px;

            background: rgba(255, 255, 255, 0.06);

            border: 1px solid rgba(255, 255, 255, 0.12);

            border-radius: 20px;

            color: #cbd5e1;

            font-size: 11px;
            font-weight: 500;

            line-height: 1.2;

            backdrop-filter: blur(4px);
        }


        /* =========================================================
           FEATURE CARDS
        ========================================================= */

        .feature-cards {
            display: grid;

            grid-template-columns: repeat(3, minmax(0, 1fr));

            gap: 14px;
        }

        .feature-card {
            padding: 18px 16px;

            background: rgba(255, 255, 255, 0.03);

            border: 1px solid rgba(255, 255, 255, 0.08);

            border-radius: 10px;
        }

        .feature-card h4 {
            margin-bottom: 6px;

            color: #ffffff;

            font-size: 12.5px;
            font-weight: 700;

            line-height: 1.3;
        }

        .feature-card p {
            color: #8aa2c0;

            font-size: 11px;
            font-weight: 400;

            line-height: 1.45;
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

            padding: 40px;

            background: #ffffff;
        }


        /* =========================================================
           FORM CONTAINER
        ========================================================= */

        .form-container {
            width: 100%;
            max-width: 380px;
        }


        /* =========================================================
           FORM ICON
        ========================================================= */

        .icon-circle {
            width: 52px;
            height: 52px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 20px;

            background: #eff6ff;

            border: 1px solid #dbeafe;

            border-radius: 12px;

            color: #2563eb;
        }

        .icon-circle svg {
            display: block;
        }


        /* =========================================================
           FORM HEADING
        ========================================================= */

        .form-tag {
            display: inline-block;

            color: #2563eb;

            font-size: 11px;
            font-weight: 700;

            letter-spacing: 0.08em;

            text-transform: uppercase;
        }

        .form-title {
            margin: 6px 0 6px;

            color: #0f172a;

            font-size: 30px;
            font-weight: 800;

            line-height: 1.2;

            letter-spacing: -0.6px;
        }

        .form-subtitle {
            margin-bottom: 24px;

            color: #64748b;

            font-size: 13px;
            font-weight: 400;

            line-height: 1.5;
        }


        /* =========================================================
           FORM GROUP
        ========================================================= */

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;

            margin-bottom: 6px;

            color: #334155;

            font-size: 12px;
            font-weight: 600;

            line-height: 1.4;
        }


        /* =========================================================
           FORM INPUT
        ========================================================= */

        .form-input {
            width: 100%;
            height: 44px;

            padding: 0 14px;

            background: #ffffff;

            border: 1px solid #cbd5e1;

            border-radius: 8px;

            outline: none;

            color: #0f172a;

            font-size: 13.5px;
            font-weight: 400;

            line-height: 44px;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background-color 0.2s ease;
        }

        .form-input::placeholder {
            color: #94a3b8;
        }

        .form-input:hover {
            border-color: #94a3b8;
        }

        .form-input:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.15);
        }


        /* =========================================================
           PASSWORD REQUIREMENTS
        ========================================================= */

        .password-requirements {
            display: flex;
            align-items: flex-start;

            gap: 10px;

            margin-top: 8px;

            color: #64748b;

            font-size: 11px;

            line-height: 1.45;
        }

        .password-requirements svg {
            flex-shrink: 0;

            margin-top: 1px;

            color: #2563eb;
        }


        /* =========================================================
           INFORMATION BOX
        ========================================================= */

        .info-box {
            display: flex;
            align-items: flex-start;

            gap: 12px;

            padding: 14px 16px;

            margin: 2px 0 24px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;

            border-radius: 8px;

            color: #475569;

            font-size: 12.5px;

            line-height: 1.5;
        }

        .info-box svg {
            flex-shrink: 0;

            margin-top: 2px;

            color: #2563eb;
        }


        /* =========================================================
           SUBMIT BUTTON
        ========================================================= */

        .btn-submit {
            width: 100%;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 20px;

            padding: 0 16px;

            background: #2563eb;

            border: none;
            border-radius: 8px;

            color: #ffffff;

            font-size: 13.5px;
            font-weight: 700;

            line-height: 1;

            cursor: pointer;

            box-shadow:
                0 2px 8px rgba(37, 99, 235, 0.20);

            transition:
                background-color 0.2s ease,
                box-shadow 0.2s ease,
                transform 0.1s ease;
        }

        .btn-submit:hover {
            background: #1d4ed8;

            box-shadow:
                0 4px 12px rgba(37, 99, 235, 0.25);
        }

        .btn-submit:active {
            transform: translateY(1px);
        }

        .btn-submit:focus-visible {
            outline: none;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.18),
                0 2px 8px rgba(37, 99, 235, 0.20);
        }


        /* =========================================================
           BACK TO LOGIN
        ========================================================= */

        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: 6px;

            color: #475569;

            font-size: 12.5px;
            font-weight: 600;

            line-height: 1.4;

            text-decoration: none;

            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: #2563eb;
        }

        .back-link:focus-visible {
            outline: none;

            color: #2563eb;
        }


        /* =========================================================
           TERMS
        ========================================================= */

        .terms-text {
            margin-top: 32px;

            color: #94a3b8;

            font-size: 11px;
            font-weight: 400;

            line-height: 1.5;

            text-align: center;
        }


        /* =========================================================
           RESPONSIVE — TABLET
        ========================================================= */

        @media (max-width: 1100px) {

            .left-panel {
                padding: 48px 44px;
            }

            .right-panel {
                padding: 36px;
            }

            .hero-title {
                font-size: 36px;
            }

            .feature-cards {
                gap: 10px;
            }

            .feature-card {
                padding: 15px 13px;
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

                padding: 32px 24px;
            }

            .form-container {
                max-width: 420px;
            }
        }


        /* =========================================================
           RESPONSIVE — SMALL MOBILE
        ========================================================= */

        @media (max-width: 480px) {

            .right-panel {
                padding: 28px 20px;
            }

            .form-container {
                max-width: 100%;
            }

            .icon-circle {
                width: 48px;
                height: 48px;

                margin-bottom: 18px;
            }

            .form-title {
                font-size: 27px;
            }

            .form-subtitle {
                font-size: 12.5px;
            }

            .info-box {
                padding: 13px 14px;

                font-size: 12px;
            }

            .terms-text {
                margin-top: 28px;
            }
        }


        /* =========================================================
           ACCESSIBILITY
        ========================================================= */

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

    <div class="auth-wrapper">


        {{-- =====================================================
             LEFT PANEL — ORDO BRAND / SECURITY HERO
        ====================================================== --}}

        <div class="left-panel">

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
                            by John Kelly & Company
                        </div>

                    </div>

                </div>


                {{-- HERO --}}
                <div class="hero-section">

                    <span class="hero-tag">
                        SECURITY FIRST
                    </span>

                    <h1 class="hero-title">
                        Create a strong new password.
                    </h1>

                    <p class="hero-description">
                        Ensure your account remains secure by choosing a unique
                        password that meets ORDO's security standards.
                    </p>


                    {{-- SECURITY BADGES --}}
                    <div class="pill-badges">

                        <span class="badge-pill">
                            Minimum 8 characters
                        </span>

                        <span class="badge-pill">
                            Secure recovery
                        </span>

                        <span class="badge-pill">
                            Instant update
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
                        See what needs attention without hunting through menus.
                    </p>

                </div>


                <div class="feature-card">

                    <h4>
                        Progressive setup
                    </h4>

                    <p>
                        Start first. Complete verification within 30 days.
                    </p>

                </div>


                <div class="feature-card">

                    <h4>
                        Connected records
                    </h4>

                    <p>
                        Business information stays linked across modules.
                    </p>

                </div>

            </div>

        </div>


        {{-- =====================================================
             RIGHT PANEL — RESET PASSWORD FORM
        ====================================================== --}}

        <div class="right-panel">

            <div class="form-container">


                {{-- SECURITY ICON --}}
                <div class="icon-circle">

                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <rect
                            x="3"
                            y="11"
                            width="18"
                            height="10"
                            rx="2"
                            ry="2"
                        ></rect>

                        <path
                            d="M7 11V7a5 5 0 0 1 10 0v4"
                        ></path>

                        <line
                            x1="12"
                            y1="15"
                            x2="12"
                            y2="17"
                        ></line>
                    </svg>

                </div>


                {{-- FORM HEADER --}}
                <span class="form-tag">
                    ACCOUNT SECURITY
                </span>

                <h2 class="form-title">
                    Reset password
                </h2>

                <p class="form-subtitle">
                    Create a new, secure password for your ORDO account.
                </p>


                {{-- RESET FORM --}}
                <form
                    method="POST"
                    action="/reset-password"
                >

                    @csrf


                    {{-- EMAIL / TOKEN SUPPORT --}}
                    @if(request('email') || session('email'))

                        <input
                            type="hidden"
                            name="email"
                            value="{{ request('email', session('email')) }}"
                        >

                    @endif

                    @if(request('token'))

                        <input
                            type="hidden"
                            name="token"
                            value="{{ request('token') }}"
                        >

                    @endif


                    {{-- NEW PASSWORD --}}
                    <div class="form-group">

                        <label
                            for="password"
                            class="form-label"
                        >
                            New Password
                        </label>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="Enter your new password"
                            minlength="8"
                            required
                            autocomplete="new-password"
                            autofocus
                        >

                        <div class="password-requirements">

                            <svg
                                width="15"
                                height="15"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >
                                <circle
                                    cx="12"
                                    cy="12"
                                    r="10"
                                ></circle>

                                <line
                                    x1="12"
                                    y1="16"
                                    x2="12"
                                    y2="12"
                                ></line>

                                <line
                                    x1="12"
                                    y1="8"
                                    x2="12.01"
                                    y2="8"
                                ></line>
                            </svg>

                            <span>
                                Use at least 8 characters for your new password.
                            </span>

                        </div>

                    </div>


                    {{-- CONFIRM PASSWORD --}}
                    <div class="form-group">

                        <label
                            for="password_confirmation"
                            class="form-label"
                        >
                            Confirm New Password
                        </label>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-input"
                            placeholder="Confirm your new password"
                            minlength="8"
                            required
                            autocomplete="new-password"
                        >

                    </div>


                    {{-- INFORMATION BOX --}}
                    <div class="info-box">

                        <svg
                            width="18"
                            height="18"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >
                            <circle
                                cx="12"
                                cy="12"
                                r="10"
                            ></circle>

                            <line
                                x1="12"
                                y1="16"
                                x2="12"
                                y2="12"
                            ></line>

                            <line
                                x1="12"
                                y1="8"
                                x2="12.01"
                                y2="8"
                            ></line>
                        </svg>

                        <span>
                            Your new password must contain at least
                            8 characters. For better security, avoid using
                            easily guessed information.
                        </span>

                    </div>


                    {{-- SUBMIT --}}
                    <button
                        type="submit"
                        class="btn-submit"
                    >
                        Reset Password
                    </button>

                </form>


                {{-- BACK TO LOGIN --}}
                <a
                    href="/login"
                    class="back-link"
                >
                    <span aria-hidden="true">&larr;</span>
                    <span>Back to Sign In</span>
                </a>


                {{-- TERMS --}}
                <p class="terms-text">
                    By continuing, you agree to ORDO Terms of Use
                    and Privacy Policy.
                </p>

            </div>

        </div>

    </div>

</body>

</html>