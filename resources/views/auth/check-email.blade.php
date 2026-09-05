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

    <title>Check Your Email | ORDO</title>

    <style>

        /* =========================================================
           GLOBAL RESET
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
            scroll-behavior: smooth;
        }

        body {
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                sans-serif;

            background: #ffffff;
            color: #0f172a;

            overflow-x: hidden;
        }

        button,
        input {
            font: inherit;
        }

        a {
            color: inherit;
        }


        /* =========================================================
           MAIN AUTH WRAPPER
        ========================================================== */

        .auth-wrapper {
            position: relative;

            display: flex;

            width: 100%;
            min-height: 100vh;

            background: #ffffff;
        }


        /* =========================================================
           LEFT PANEL
           MATCHED TO FORGOT PASSWORD LAYOUT
        ========================================================== */

        .left-panel {
            position: relative;

            width: 50%;
            min-height: 100vh;

            display: flex;
            flex-direction: column;

            padding:
                46px 52px
                42px;

            color: #ffffff;

            background:
                radial-gradient(
                    circle at 84% 16%,
                    rgba(37, 99, 235, 0.17),
                    transparent 31%
                ),
                radial-gradient(
                    circle at 8% 82%,
                    rgba(37, 99, 235, 0.055),
                    transparent 24%
                ),
                linear-gradient(
                    145deg,
                    #05172f 0%,
                    #061a35 52%,
                    #092650 100%
                );

            overflow: hidden;
        }


        /* =========================================================
           SUBTLE GRID
        ========================================================== */

        .left-panel::before {
            content: "";

            position: absolute;
            inset: 0;

            background-image:
                linear-gradient(
                    rgba(255, 255, 255, 0.035) 1px,
                    transparent 1px
                ),
                linear-gradient(
                    90deg,
                    rgba(255, 255, 255, 0.035) 1px,
                    transparent 1px
                );

            background-size: 56px 56px;

            opacity: 0.45;

            pointer-events: none;
        }


        /* =========================================================
           DECORATIVE CIRCLE
        ========================================================== */

        .left-panel::after {
            content: "";

            position: absolute;

            width: 520px;
            height: 520px;

            right: -285px;
            bottom: -295px;

            border-radius: 50%;

            border:
                1px solid
                rgba(255, 255, 255, 0.045);

            box-shadow:
                0 0 0 42px
                rgba(255, 255, 255, 0.012),
                0 0 0 84px
                rgba(255, 255, 255, 0.008);

            pointer-events: none;
        }


        /* =========================================================
           LEFT CONTENT

           IMPORTANT:
           flex: 1 allows the bottom cards to stay inside
           the visible left panel instead of being pushed down.
        ========================================================== */

        .left-panel-content {
            position: relative;

            z-index: 2;

            display: flex;
            flex-direction: column;

            flex: 1;

            /*
             * IMPORTANT FIX:
             * Do NOT use min-height: 100%.
             * That was causing the three feature cards
             * to move too far down.
             */
            min-height: 0;
        }


        /* =========================================================
           ADDITIONAL DECORATIVE ELEMENT
        ========================================================== */

        .left-panel-content::before {
            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            left: -205px;
            top: 31%;

            border-radius: 50%;

            background:
                rgba(37, 99, 235, 0.055);

            box-shadow:
                0 0 80px
                rgba(37, 99, 235, 0.045);

            pointer-events: none;
        }


        /* =========================================================
           BRAND HEADER
        ========================================================== */

        .brand-header {
            position: relative;

            z-index: 3;

            display: flex;
            align-items: center;

            gap: 13px;

            width: fit-content;
        }


        .brand-logo {
            width: 44px;
            height: 44px;

            flex: 0 0 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            border:
                1px solid
                rgba(255, 255, 255, 0.10);

            border-radius: 11px;

            background:
                linear-gradient(
                    145deg,
                    #3478f6 0%,
                    #2563eb 100%
                );

            color: #ffffff;

            font-size: 18px;
            font-weight: 800;

            letter-spacing: -0.4px;

            box-shadow:
                0 8px 22px
                rgba(37, 99, 235, 0.28),
                inset 0 1px 0
                rgba(255, 255, 255, 0.16);
        }


        .brand-name {
            color: #ffffff;

            font-size: 20px;
            font-weight: 800;

            line-height: 1.05;

            letter-spacing: -0.55px;
        }


        .brand-sub {
            margin-top: 4px;

            color: #91a6c2;

            font-size: 10px;
            font-weight: 500;

            line-height: 1.2;

            letter-spacing: 0.01em;
        }


        /* =========================================================
           HERO SECTION

           Positioned similarly to the updated
           Forgot Password dashboard.
        ========================================================== */

        .hero-section {
            position: relative;

            z-index: 2;

            width: 100%;
            max-width: 560px;

            margin: auto 0;

            padding:
                58px 0
                54px;
        }


        /* =========================================================
           HERO TAG

           NO DOT BEFORE "VERIFICATION"
        ========================================================== */

        .hero-tag {
            display: inline-flex;
            align-items: center;

            color: #60a5fa;

            font-size: 10.5px;
            font-weight: 700;

            letter-spacing: 0.12em;

            line-height: 1.2;

            text-transform: uppercase;
        }


        /*
         * Intentionally removed:
         *
         * .hero-tag::before
         *
         * This removes the blue dot before "Verification".
        */


        /* =========================================================
           HERO TITLE
        ========================================================== */

        .hero-title {
            max-width: 520px;

            margin:
                18px 0
                17px;

            color: #ffffff;

            font-size:
                clamp(37px, 3.25vw, 43px);

            font-weight: 800;

            line-height: 1.08;

            letter-spacing: -1.35px;

            text-wrap: balance;
        }


        /* =========================================================
           HERO DESCRIPTION
        ========================================================== */

        .hero-description {
            max-width: 500px;

            margin-bottom: 28px;

            color: #94a3b8;

            font-size: 13.5px;
            font-weight: 400;

            line-height: 1.68;

            letter-spacing: 0.005em;
        }


        /* =========================================================
           SECURITY HIGHLIGHTS
        ========================================================== */

        .security-highlights {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 10px;

            width: 100%;
            max-width: 500px;
        }


        .security-item {
            min-height: 54px;

            display: flex;
            align-items: center;

            gap: 10px;

            padding:
                10px 12px;

            border:
                1px solid
                rgba(255, 255, 255, 0.095);

            border-radius: 9px;

            background:
                rgba(255, 255, 255, 0.045);

            backdrop-filter: blur(8px);

            transition:
                background-color 0.2s ease,
                border-color 0.2s ease,
                transform 0.2s ease;
        }


        .security-item:hover {
            background:
                rgba(255, 255, 255, 0.055);

            border-color:
                rgba(96, 165, 250, 0.20);

            transform:
                translateY(-1px);
        }


        .security-icon {
            width: 28px;
            height: 28px;

            flex: 0 0 28px;

            display: flex;
            align-items: center;
            justify-content: center;

            border:
                1px solid
                rgba(96, 165, 250, 0.18);

            border-radius: 7px;

            background:
                rgba(37, 99, 235, 0.13);

            color: #60a5fa;

            font-size: 11px;
            font-weight: 800;

            line-height: 1;
        }


        .security-content {
            min-width: 0;
        }


        .security-title {
            color: #f8fafc;

            font-size: 11px;
            font-weight: 700;

            line-height: 1.25;
        }


        .security-description {
            margin-top: 2px;

            color: #7f94ae;

            font-size: 9.5px;
            font-weight: 400;

            line-height: 1.35;
        }


        /* =========================================================
           BOTTOM FEATURE CARDS

           RAISED AND KEPT INSIDE THE LEFT PANEL
        ========================================================== */

        .feature-cards {
            position: relative;

            z-index: 3;

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 11px;

            width: 100%;

            /*
             * Keeps the cards visibly raised from the bottom.
             */
            margin-top: 0;

            margin-bottom: 4px;
        }


        .feature-card {
            position: relative;

            min-height: 112px;

            padding:
                15px 15px
                16px;

            border:
                1px solid
                rgba(255, 255, 255, 0.075);

            border-radius: 10px;

            background:
                rgba(255, 255, 255, 0.035);

            box-shadow:
                inset 0 1px 0
                rgba(255, 255, 255, 0.025),
                0 8px 24px
                rgba(0, 0, 0, 0.05);

            backdrop-filter: blur(8px);

            transition:
                background-color 0.2s ease,
                border-color 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }


        .feature-card:hover {
            background:
                rgba(255, 255, 255, 0.052);

            border-color:
                rgba(96, 165, 250, 0.18);

            transform:
                translateY(-2px);

            box-shadow:
                inset 0 1px 0
                rgba(255, 255, 255, 0.035),
                0 12px 28px
                rgba(0, 0, 0, 0.08);
        }


        /* =========================================================
           FEATURE CARD LABEL
        ========================================================== */

        .feature-card-label {
            display: block;

            margin-bottom: 5px;

            color: #60a5fa;

            font-size: 8.5px;
            font-weight: 700;

            letter-spacing: 0.08em;

            line-height: 1.2;

            text-transform: uppercase;
        }


        /* =========================================================
           FEATURE CARD TITLE
        ========================================================== */

        .feature-card h4 {
            margin-bottom: 5px;

            color: #ffffff;

            font-size: 11.5px;
            font-weight: 700;

            line-height: 1.3;

            letter-spacing: -0.1px;
        }


        /* =========================================================
           FEATURE CARD DESCRIPTION
        ========================================================== */

        .feature-card p {
            color: #8499b5;

            font-size: 10px;
            font-weight: 400;

            line-height: 1.48;
        }


        /* =========================================================
           RIGHT PANEL
        ========================================================== */

        .right-panel {
            position: relative;

            width: 50%;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding:
                50px 60px;

            background:
                #ffffff;

            overflow-y: auto;
        }


        /* =========================================================
           RIGHT PANEL DECORATION
        ========================================================== */

        .right-panel::before {
            content: "";

            position: absolute;

            width: 360px;
            height: 360px;

            top: -230px;
            right: -200px;

            border-radius: 50%;

            background:
                rgba(37, 99, 235, 0.025);

            pointer-events: none;
        }


        /* =========================================================
           FORM CONTAINER
        ========================================================== */

        .form-container {
            position: relative;

            z-index: 2;

            width: 100%;
            max-width: 420px;

            margin: auto;
        }


        /* =========================================================
           EMAIL ICON
        ========================================================== */

        .icon-circle {
            width: 62px;
            height: 62px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 18px;

            border:
                1px solid
                #bfdbfe;

            border-radius: 50%;

            background:
                #eff6ff;

            color: #2563eb;

            box-shadow:
                0 5px 16px
                rgba(37, 99, 235, 0.08);
        }


        .icon-circle svg {
            width: 27px;
            height: 27px;
        }


        /* =========================================================
           RIGHT CONTENT TYPOGRAPHY
        ========================================================== */

        .form-tag {
            display: block;

            color: #2563eb;

            font-size: 10.5px;
            font-weight: 700;

            letter-spacing: 0.1em;

            line-height: 1.25;

            text-transform: uppercase;
        }


        .form-title {
            margin:
                6px 0 0;

            color: #0b1830;

            font-size: 30px;
            font-weight: 800;

            line-height: 1.12;

            letter-spacing: -0.85px;
        }


        .form-subtitle {
            max-width: 415px;

            margin:
                9px 0 24px;

            color: #64748b;

            font-size: 13px;
            font-weight: 400;

            line-height: 1.6;
        }


        /* =========================================================
           INFORMATION BOX
        ========================================================== */

        .info-box {
            display: flex;
            align-items: flex-start;

            gap: 10px;

            width: 100%;

            margin-bottom: 18px;

            padding:
                12px 13px;

            border:
                1px solid
                #d8e7ff;

            border-radius: 9px;

            background:
                linear-gradient(
                    135deg,
                    #f1f7ff 0%,
                    #edf5ff 100%
                );

            color: #475569;

            font-size: 10.5px;
            font-weight: 400;

            line-height: 1.52;

            box-shadow:
                inset 0 1px 0
                rgba(255, 255, 255, 0.8);
        }


        .info-icon {
            width: 18px;
            height: 18px;

            flex: 0 0 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-top: 1px;

            border-radius: 50%;

            background:
                #2563eb;

            color: #ffffff;

            font-size: 10px;
            font-weight: 800;

            box-shadow:
                0 3px 8px
                rgba(37, 99, 235, 0.18);
        }


        .info-box strong {
            color: #1e3a8a;

            font-weight: 700;
        }


        /* =========================================================
           EMAIL DESTINATION CARD
        ========================================================== */

        .email-card {
            display: flex;
            align-items: center;

            gap: 11px;

            width: 100%;

            margin-bottom: 18px;

            padding:
                12px 14px;

            border:
                1px solid
                #e2e8f0;

            border-radius: 9px;

            background:
                #f8fafc;
        }


        .email-card-icon {
            width: 32px;
            height: 32px;

            flex: 0 0 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            border:
                1px solid
                #dbeafe;

            border-radius: 8px;

            background:
                #eff6ff;

            color: #2563eb;
        }


        .email-card-content {
            min-width: 0;
        }


        .email-card-label {
            margin-bottom: 2px;

            color: #94a3b8;

            font-size: 9px;
            font-weight: 700;

            letter-spacing: 0.08em;

            text-transform: uppercase;
        }


        .email-card-value {
            overflow: hidden;

            color: #334155;

            font-size: 11.5px;
            font-weight: 600;

            line-height: 1.4;

            text-overflow: ellipsis;
            white-space: nowrap;
        }


        /* =========================================================
           RESEND BUTTON
        ========================================================== */

        .btn-submit {
            position: relative;

            width: 100%;
            height: 46px;

            display: flex;
            align-items: center;
            justify-content: center;

            border:
                1px solid
                rgba(37, 99, 235, 0.10);

            border-radius: 9px;

            background:
                linear-gradient(
                    135deg,
                    #3478f6 0%,
                    #2563eb 100%
                );

            color: #ffffff;

            text-decoration: none;

            font-size: 13px;
            font-weight: 700;

            cursor: pointer;

            box-shadow:
                0 5px 15px
                rgba(37, 99, 235, 0.20),
                inset 0 1px 0
                rgba(255, 255, 255, 0.12);

            transition:
                background-color 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;

            margin-bottom: 16px;
        }


        .btn-submit::after {
            content: "→";

            margin-left: 8px;

            font-size: 15px;

            line-height: 1;

            transition:
                transform 0.2s ease;
        }


        .btn-submit:hover {
            background:
                linear-gradient(
                    135deg,
                    #3b82f6 0%,
                    #1d4ed8 100%
                );

            box-shadow:
                0 7px 18px
                rgba(37, 99, 235, 0.25),
                inset 0 1px 0
                rgba(255, 255, 255, 0.14);

            transform:
                translateY(-1px);
        }


        .btn-submit:hover::after {
            transform:
                translateX(3px);
        }


        .btn-submit:active {
            transform:
                translateY(0);

            box-shadow:
                0 3px 9px
                rgba(37, 99, 235, 0.18);
        }


        .btn-submit:focus-visible {
            outline: none;

            box-shadow:
                0 0 0 3px
                rgba(37, 99, 235, 0.14),
                0 5px 15px
                rgba(37, 99, 235, 0.20);
        }


        /* =========================================================
           BACK LINK
        ========================================================== */

        .back-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            width: 100%;

            gap: 6px;

            color: #64748b;

            text-decoration: none;

            font-size: 12px;
            font-weight: 600;

            line-height: 1.4;

            transition:
                color 0.2s ease,
                transform 0.2s ease;
        }


        .back-link:hover {
            color:
                #0f172a;

            transform:
                translateX(-2px);
        }


        .back-link-arrow {
            font-size: 15px;

            line-height: 1;
        }


        /* =========================================================
           FOOTER NOTE
        ========================================================== */

        .terms-text {
            max-width: 390px;

            margin:
                17px auto 0;

            color: #94a3b8;

            font-size: 10px;
            font-weight: 400;

            line-height: 1.55;

            text-align: center;
        }


        /* =========================================================
           TABLET
        ========================================================== */

        @media (max-width: 1150px) {

            .left-panel {
                padding:
                    42px 42px
                    36px;
            }

            .right-panel {
                padding:
                    42px 42px;
            }

            .hero-title {
                font-size:
                    36px;

                letter-spacing:
                    -1px;
            }

            .hero-description {
                font-size:
                    13px;
            }

            .feature-cards {
                gap:
                    8px;

                margin-bottom:
                    0;
            }

            .feature-card {
                min-height:
                    112px;

                padding:
                    14px 12px;
            }

            .feature-card p {
                font-size:
                    9.5px;
            }
        }


        /* =========================================================
           SMALL TABLET
        ========================================================== */

        @media (max-width: 980px) {

            .left-panel {
                width:
                    48%;

                padding:
                    38px 34px
                    32px;
            }

            .right-panel {
                width:
                    52%;

                padding:
                    38px 34px;
            }

            .hero-title {
                font-size:
                    33px;
            }

            .security-highlights {
                grid-template-columns:
                    1fr;

                gap:
                    8px;
            }

            .feature-cards {
                grid-template-columns:
                    1fr;

                gap:
                    8px;

                margin-bottom:
                    0;
            }

            .feature-card {
                min-height:
                    auto;

                padding:
                    14px 12px;
            }
        }


        /* =========================================================
           MOBILE
        ========================================================== */

        @media (max-width: 900px) {

            .auth-wrapper {
                display:
                    block;

                min-height:
                    100vh;
            }


            .left-panel {
                display:
                    none;
            }


            .right-panel {
                width:
                    100%;

                min-height:
                    100vh;

                display:
                    flex;

                align-items:
                    flex-start;

                justify-content:
                    center;

                padding:
                    48px 24px;
            }


            .right-panel::before {
                display:
                    none;
            }


            .form-container {
                max-width:
                    520px;

                margin:
                    auto;
            }
        }


        /* =========================================================
           SMALL MOBILE
        ========================================================== */

        @media (max-width: 560px) {

            .right-panel {
                padding:
                    34px 20px;
            }


            .form-title {
                font-size:
                    27px;

                letter-spacing:
                    -0.7px;
            }


            .form-subtitle {
                font-size:
                    12.5px;

                margin-bottom:
                    21px;
            }


            .info-box {
                gap:
                    9px;

                padding:
                    11px 12px;

                font-size:
                    10px;
            }


            .email-card {
                padding:
                    11px 12px;
            }


            .btn-submit {
                height:
                    44px;
            }


            .back-link {
                font-size:
                    11.5px;
            }


            .terms-text {
                margin-top:
                    21px;

                font-size:
                    9.5px;
            }
        }


        /* =========================================================
           VERY SMALL MOBILE
        ========================================================== */

        @media (max-width: 380px) {

            .right-panel {
                padding:
                    30px 17px;
            }


            .form-title {
                font-size:
                    25px;
            }


            .form-subtitle {
                font-size:
                    12px;
            }


            .info-box {
                font-size:
                    9.5px;
            }
        }


        /* =========================================================
           REDUCED MOTION
        ========================================================== */

        @media (prefers-reduced-motion: reduce) {

            html {
                scroll-behavior:
                    auto;
            }

            *,
            *::before,
            *::after {
                transition:
                    none !important;

                animation:
                    none !important;
            }
        }

    </style>
</head>


<body>

    <div class="auth-wrapper">


        {{-- =====================================================
             LEFT PANEL
             ORDO AUTHENTICATION BRANDING
        ====================================================== --}}

        <section class="left-panel">


            <div class="left-panel-content">


                {{-- =================================================
                     BRAND
                ================================================== --}}

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


                {{-- =================================================
                     HERO
                ================================================== --}}

                <div class="hero-section">


                    <span class="hero-tag">
                        Verification
                    </span>


                    <h1 class="hero-title">
                        Check your inbox to proceed.
                    </h1>


                    <p class="hero-description">
                        We have sent password reset instructions to
                        your registered email address. Follow the
                        secure link in the email to continue restoring
                        access to your ORDO workspace.
                    </p>


                    {{-- =================================================
                         SECURITY HIGHLIGHTS
                    ================================================== --}}

                    <div class="security-highlights">


                        {{-- SECURE LINK --}}

                        <div class="security-item">

                            <div class="security-icon">
                                ✓
                            </div>

                            <div class="security-content">

                                <div class="security-title">
                                    Secure Reset Link
                                </div>

                                <div class="security-description">
                                    Use the protected link in your email.
                                </div>

                            </div>

                        </div>


                        {{-- EXPIRATION --}}

                        <div class="security-item">

                            <div class="security-icon">
                                60
                            </div>

                            <div class="security-content">

                                <div class="security-title">
                                    Expires in 60 Minutes
                                </div>

                                <div class="security-description">
                                    Complete your reset before it expires.
                                </div>

                            </div>

                        </div>


                    </div>

                </div>

            </div>


            {{-- =================================================
                 BOTTOM FEATURE CARDS
                 FIXED POSITION / RAISED FROM BOTTOM
            ================================================== --}}

            <div class="feature-cards">


                {{-- FEATURE 1 --}}

                <div class="feature-card">

                    <span class="feature-card-label">
                        Workspace
                    </span>

                    <h4>
                        Clear by default
                    </h4>

                    <p>
                        See what needs attention without hunting
                        through menus.
                    </p>

                </div>


                {{-- FEATURE 2 --}}

                <div class="feature-card">

                    <span class="feature-card-label">
                        Access
                    </span>

                    <h4>
                        Progressive setup
                    </h4>

                    <p>
                        Start first and complete your account
                        verification as you go.
                    </p>

                </div>


                {{-- FEATURE 3 --}}

                <div class="feature-card">

                    <span class="feature-card-label">
                        Records
                    </span>

                    <h4>
                        Connected records
                    </h4>

                    <p>
                        Business information stays linked across
                        your workspace.
                    </p>

                </div>


            </div>

        </section>


        {{-- =====================================================
             RIGHT PANEL
        ====================================================== --}}

        <main class="right-panel">


            <div class="form-container">


                {{-- =================================================
                     EMAIL ICON
                ================================================== --}}

                <div
                    class="icon-circle"
                    aria-hidden="true"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path
                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
                        />

                        <polyline
                            points="22,6 12,13 2,6"
                        />

                    </svg>

                </div>


                {{-- =================================================
                     LABEL
                ================================================== --}}

                <span class="form-tag">
                    Password Reset
                </span>


                {{-- =================================================
                     TITLE
                ================================================== --}}

                <h2 class="form-title">
                    Check your email
                </h2>


                {{-- =================================================
                     DESCRIPTION
                ================================================== --}}

                <p class="form-subtitle">
                    We've sent a password reset link to your
                    registered email address.
                </p>


                {{-- =================================================
                     INFORMATION BOX
                ================================================== --}}

                <div class="info-box">

                    <span
                        class="info-icon"
                        aria-hidden="true"
                    >
                        i
                    </span>

                    <span>
                        Didn't receive the email?
                        Check your spam or junk folder. If it is
                        not there, you can request a new reset link
                        below.
                    </span>

                </div>


                {{-- =================================================
                     EMAIL DESTINATION
                ================================================== --}}

                @php
                    $resetEmail = request('email', session('email'));
                @endphp


                @if ($resetEmail)

                    <div class="email-card">

                        <div
                            class="email-card-icon"
                            aria-hidden="true"
                        >

                            <svg
                                width="17"
                                height="17"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path
                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
                                />

                                <polyline
                                    points="22,6 12,13 2,6"
                                />

                            </svg>

                        </div>


                        <div class="email-card-content">

                            <div class="email-card-label">
                                Reset link sent to
                            </div>

                            <div class="email-card-value">
                                {{ $resetEmail }}
                            </div>

                        </div>

                    </div>

                @endif


                {{-- =================================================
                     RESEND FORM
                ================================================== --}}

                <form
                    method="POST"
                    action="/forgot-password"
                >

                    @csrf

                    <input
                        type="hidden"
                        name="email"
                        value="{{ $resetEmail }}"
                    >


                    <button
                        type="submit"
                        class="btn-submit"
                    >
                        Resend Reset Link
                    </button>

                </form>


                {{-- =================================================
                     BACK TO LOGIN
                ================================================== --}}

                <a
                    href="/login"
                    class="back-link"
                >

                    <span
                        class="back-link-arrow"
                        aria-hidden="true"
                    >
                        ←
                    </span>

                    <span>
                        Back to Sign In
                    </span>

                </a>


                {{-- =================================================
                     FOOTER NOTE
                ================================================== --}}

                <p class="terms-text">
                    By continuing, you agree to ORDO Terms of Use
                    and Privacy Policy.
                </p>


            </div>

        </main>

    </div>

</body>

</html>