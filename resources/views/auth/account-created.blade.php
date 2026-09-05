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

    <title>Account Created | ORDO</title>

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

        a {
            color: inherit;
        }


        /* =========================================================
           MAIN AUTH WRAPPER
        ========================================================== */

        .auth-wrapper {
            display: flex;

            width: 100%;
            min-height: 100vh;

            background: #ffffff;
        }


        /* =========================================================
           LEFT PANEL
           CONSISTENT WITH ORDO LOGIN / REGISTER
        ========================================================== */

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
                    circle at 82% 17%,
                    rgba(37, 99, 235, 0.16),
                    transparent 34%
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
           LEFT PANEL DECORATION
        ========================================================== */

        .left-panel::before {
            content: "";

            position: absolute;

            width: 420px;
            height: 420px;

            right: -215px;
            bottom: -220px;

            border-radius: 50%;

            background:
                rgba(37, 99, 235, 0.075);

            pointer-events: none;
        }

        .left-panel::after {
            content: "";

            position: absolute;

            width: 220px;
            height: 220px;

            left: -150px;
            top: 38%;

            border-radius: 50%;

            background:
                rgba(37, 99, 235, 0.045);

            pointer-events: none;
        }


        /* =========================================================
           LEFT CONTENT
        ========================================================== */

        .left-panel-content {
            position: relative;

            z-index: 2;
        }


        /* =========================================================
           BRAND HEADER
        ========================================================== */

        .brand-header {
            display: flex;
            align-items: center;

            gap: 13px;
        }

        .brand-logo {
            width: 42px;
            height: 42px;

            flex: 0 0 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: #2563eb;

            color: #ffffff;

            font-size: 19px;
            font-weight: 800;

            line-height: 1;

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

            line-height: 1.25;
        }


        /* =========================================================
           HERO SECTION
        ========================================================== */

        .hero-section {
            max-width: 520px;

            margin-top: clamp(90px, 12vh, 125px);

            padding-bottom: 38px;
        }


        /* =========================================================
           HERO TAG
        ========================================================== */

        .hero-tag {
            display: inline-flex;
            align-items: center;

            color: #60a5fa;

            font-size: 10.5px;
            font-weight: 700;

            line-height: 1;

            letter-spacing: 0.13em;

            text-transform: uppercase;
        }

        .hero-tag::before {
            content: "";

            width: 6px;
            height: 6px;

            flex: 0 0 6px;

            margin-right: 8px;

            border-radius: 50%;

            background: #10b981;

            box-shadow:
                0 0 0 4px rgba(16, 185, 129, 0.08);
        }


        /* =========================================================
           HERO TITLE
        ========================================================== */

        .hero-title {
            max-width: 510px;

            margin-top: 17px;

            color: #ffffff;

            font-size: clamp(34px, 3.2vw, 43px);
            font-weight: 800;

            line-height: 1.12;

            letter-spacing: -1px;
        }


        /* =========================================================
           HERO DESCRIPTION
        ========================================================== */

        .hero-description {
            max-width: 485px;

            margin-top: 18px;

            color: #94a3b8;

            font-size: 13.5px;
            font-weight: 400;

            line-height: 1.65;
        }


        /* =========================================================
           ACCESS HIGHLIGHTS
        ========================================================== */

        .access-highlights {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 10px;

            max-width: 510px;

            margin-top: 28px;
        }


        /* =========================================================
           HIGHLIGHT ITEM
        ========================================================== */

        .highlight-item {
            min-height: 58px;

            display: flex;
            align-items: center;

            gap: 10px;

            padding: 10px 12px;

            border:
                1px solid
                rgba(148, 163, 184, 0.13);

            border-radius: 9px;

            background:
                rgba(255, 255, 255, 0.035);

            backdrop-filter: blur(5px);

            transition:
                background-color 0.2s ease,
                border-color 0.2s ease,
                transform 0.2s ease;
        }

        .highlight-item:hover {
            background:
                rgba(255, 255, 255, 0.055);

            border-color:
                rgba(96, 165, 250, 0.20);

            transform:
                translateY(-1px);
        }


        /* =========================================================
           HIGHLIGHT ICON
        ========================================================== */

        .highlight-icon {
            width: 29px;
            height: 29px;

            flex: 0 0 29px;

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

            font-size: 10.5px;
            font-weight: 800;

            line-height: 1;
        }


        /* =========================================================
           HIGHLIGHT CONTENT
        ========================================================== */

        .highlight-content {
            min-width: 0;
        }

        .highlight-title {
            color: #f8fafc;

            font-size: 11px;
            font-weight: 700;

            line-height: 1.3;
        }

        .highlight-description {
            margin-top: 2px;

            color: #8196b0;

            font-size: 9.5px;
            font-weight: 400;

            line-height: 1.4;
        }


        /* =========================================================
           FEATURE CARDS
        ========================================================== */

        .feature-cards {
            position: relative;

            z-index: 2;

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 12px;
        }

        .feature-card {
            min-height: 112px;

            padding: 17px 15px;

            border:
                1px solid
                rgba(148, 163, 184, 0.12);

            border-radius: 10px;

            background:
                rgba(255, 255, 255, 0.035);

            backdrop-filter: blur(5px);

            box-shadow:
                inset 0 1px 0
                rgba(255, 255, 255, 0.025);

            transition:
                background-color 0.2s ease,
                border-color 0.2s ease,
                transform 0.2s ease;
        }

        .feature-card:hover {
            background:
                rgba(255, 255, 255, 0.05);

            border-color:
                rgba(96, 165, 250, 0.18);

            transform:
                translateY(-1px);
        }

        .feature-card-label {
            display: block;

            margin-bottom: 7px;

            color: #60a5fa;

            font-size: 9px;
            font-weight: 700;

            line-height: 1;

            letter-spacing: 0.08em;

            text-transform: uppercase;
        }

        .feature-card h4 {
            margin-bottom: 6px;

            color: #f8fafc;

            font-size: 11.5px;
            font-weight: 700;

            line-height: 1.3;
        }

        .feature-card p {
            color: #8499b5;

            font-size: 10px;
            font-weight: 400;

            line-height: 1.5;
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

            padding: 50px 60px;

            background: #ffffff;

            overflow-y: auto;
        }


        /* =========================================================
           FORM CONTAINER
        ========================================================== */

        .form-container {
            width: 100%;
            max-width: 440px;

            text-align: center;
        }


        /* =========================================================
           SUCCESS ICON
        ========================================================== */

        .success-badge-icon {
            width: 62px;
            height: 62px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 18px;

            border:
                1px solid
                #bbf7d0;

            border-radius: 50%;

            background: #f0fdf4;

            color: #16a34a;

            font-size: 25px;
            font-weight: 800;

            line-height: 1;

            box-shadow:
                0 5px 16px
                rgba(22, 163, 74, 0.10);
        }


        /* =========================================================
           FORM TAG
        ========================================================== */

        .form-tag {
            display: block;

            color: #16a34a;

            font-size: 10.5px;
            font-weight: 700;

            line-height: 1.2;

            letter-spacing: 0.10em;

            text-transform: uppercase;
        }


        /* =========================================================
           FORM TITLE
        ========================================================== */

        .form-title {
            margin-top: 7px;

            color: #0f172a;

            font-size: 30px;
            font-weight: 800;

            line-height: 1.2;

            letter-spacing: -0.7px;
        }


        /* =========================================================
           FORM SUBTITLE
        ========================================================== */

        .form-subtitle {
            max-width: 420px;

            margin: 9px auto 25px;

            color: #64748b;

            font-size: 13px;
            font-weight: 400;

            line-height: 1.6;
        }


        /* =========================================================
           ACCESS BOX
        ========================================================== */

        .access-box {
            width: 100%;

            margin-bottom: 18px;

            padding: 18px;

            border:
                1px solid
                #dbe4ef;

            border-radius: 11px;

            background:
                #f8fafc;

            text-align: left;
        }


        /* =========================================================
           ACCESS HEADER
        ========================================================== */

        .access-box-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;

            gap: 12px;

            margin-bottom: 9px;
        }

        .access-title {
            color: #0f172a;

            font-size: 13px;
            font-weight: 700;

            line-height: 1.4;
        }


        /* =========================================================
           ACCESS STATUS
        ========================================================== */

        .access-status {
            display: inline-flex;
            align-items: center;

            min-height: 22px;

            padding: 4px 9px;

            border:
                1px solid
                #bbf7d0;

            border-radius: 999px;

            background:
                #f0fdf4;

            color: #15803d;

            font-size: 9px;
            font-weight: 700;

            line-height: 1;

            white-space: nowrap;
        }


        /* =========================================================
           ACCESS DESCRIPTION
        ========================================================== */

        .access-description {
            margin-bottom: 13px;

            color: #64748b;

            font-size: 11.5px;
            font-weight: 400;

            line-height: 1.55;
        }


        /* =========================================================
           ACCESS BADGE
        ========================================================== */

        .access-badge {
            display: inline-flex;
            align-items: center;

            min-height: 24px;

            padding: 5px 10px;

            border-radius: 999px;

            background: #2563eb;

            color: #ffffff;

            font-size: 9.5px;
            font-weight: 700;

            line-height: 1;

            letter-spacing: 0.035em;
        }


        /* =========================================================
           ACCESS META
        ========================================================== */

        .access-meta {
            display: flex;
            align-items: center;

            gap: 7px;

            padding-top: 12px;

            margin-top: 12px;

            border-top:
                1px solid
                #e2e8f0;

            color: #475569;

            font-size: 10px;
            font-weight: 600;

            line-height: 1.4;
        }

        .access-meta-dot {
            width: 5px;
            height: 5px;

            flex: 0 0 5px;

            border-radius: 50%;

            background: #2563eb;
        }


        /* =========================================================
           TRIAL NOTE
        ========================================================== */

        .trial-note {
            display: flex;
            align-items: flex-start;

            gap: 8px;

            margin-top: 12px;

            padding: 10px 11px;

            border:
                1px solid
                #dbeafe;

            border-radius: 8px;

            background:
                #eff6ff;

            color: #475569;

            font-size: 10px;
            font-weight: 400;

            line-height: 1.45;
        }

        .trial-note-icon {
            width: 16px;
            height: 16px;

            flex: 0 0 16px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-top: 1px;

            border-radius: 50%;

            background: #2563eb;

            color: #ffffff;

            font-size: 9px;
            font-weight: 800;

            line-height: 1;
        }

        .trial-note strong {
            color: #1e3a8a;

            font-weight: 700;
        }


        /* =========================================================
           PRIMARY BUTTON
        ========================================================== */

        .btn-enter {
            width: 100%;
            height: 46px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 0;
            border-radius: 8px;

            background: #2563eb;

            color: #ffffff;

            text-decoration: none;

            font-size: 13px;
            font-weight: 700;

            line-height: 1;

            box-shadow:
                0 3px 9px
                rgba(37, 99, 235, 0.18);

            transition:
                background-color 0.2s ease,
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .btn-enter::after {
            content: "→";

            margin-left: 8px;

            font-size: 15px;
            line-height: 1;

            transition:
                transform 0.2s ease;
        }

        .btn-enter:hover {
            background: #1d4ed8;

            box-shadow:
                0 5px 13px
                rgba(37, 99, 235, 0.22);

            transform:
                translateY(-1px);
        }

        .btn-enter:hover::after {
            transform:
                translateX(2px);
        }

        .btn-enter:active {
            transform:
                translateY(0);
        }

        .btn-enter:focus-visible {
            outline:
                3px solid
                rgba(37, 99, 235, 0.20);

            outline-offset: 3px;
        }


        /* =========================================================
           FOOTER NOTE
        ========================================================== */

        .footer-note {
            max-width: 400px;

            margin: 16px auto 0;

            color: #94a3b8;

            font-size: 10.5px;
            font-weight: 400;

            line-height: 1.5;
        }


        /* =========================================================
           RESPONSIVE — TABLET
        ========================================================== */

        @media (max-width: 1100px) {

            .left-panel {
                padding: 46px 42px;
            }

            .right-panel {
                padding: 44px 42px;
            }

            .hero-section {
                margin-top: 80px;
            }

            .hero-title {
                font-size: 36px;
            }

            .access-highlights {
                gap: 8px;
            }

            .highlight-item {
                padding: 9px 10px;
            }

            .feature-cards {
                gap: 8px;
            }

            .feature-card {
                padding: 14px 12px;
            }
        }


        /* =========================================================
           RESPONSIVE — MOBILE
        ========================================================== */

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
                max-width: 440px;

                margin: auto;
            }
        }


        /* =========================================================
           RESPONSIVE — SMALL MOBILE
        ========================================================== */

        @media (max-width: 480px) {

            .right-panel {
                padding: 32px 18px;
            }

            .form-container {
                padding-top: 10px;
            }

            .success-badge-icon {
                width: 58px;
                height: 58px;

                margin-bottom: 16px;

                font-size: 23px;
            }

            .form-title {
                font-size: 27px;
            }

            .form-subtitle {
                font-size: 12.5px;

                margin-bottom: 21px;
            }

            .access-box {
                padding: 16px;
            }

            .access-box-header {
                flex-direction: column;

                gap: 7px;
            }

            .access-status {
                align-self: flex-start;
            }

            .btn-enter {
                height: 46px;
            }
        }


        /* =========================================================
           REDUCED MOTION
        ========================================================== */

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
                        Registration Complete
                    </span>

                    <h1 class="hero-title">
                        Your workspace is ready.
                    </h1>

                    <p class="hero-description">
                        Welcome to ORDO — a unified business operations
                        platform designed to keep your records, workflows,
                        and business activities connected in one place.
                    </p>


                    {{-- =================================================
                         ACCESS HIGHLIGHTS
                    ================================================== --}}

                    <div class="access-highlights">

                        {{-- 6 BUSINESS MODULES --}}

                        <div class="highlight-item">

                            <div
                                class="highlight-icon"
                                aria-hidden="true"
                            >
                                6
                            </div>

                            <div class="highlight-content">

                                <div class="highlight-title">
                                    6 Business Modules
                                </div>

                                <div class="highlight-description">
                                    Explore the full Business workspace.
                                </div>

                            </div>

                        </div>


                        {{-- 30-DAY FULL ACCESS --}}

                        <div class="highlight-item">

                            <div
                                class="highlight-icon"
                                aria-hidden="true"
                            >
                                30
                            </div>

                            <div class="highlight-content">

                                <div class="highlight-title">
                                    30-Day Full Access
                                </div>

                                <div class="highlight-description">
                                    Full access during your trial period.
                                </div>

                            </div>

                        </div>


                        {{-- 3 MODULES FREE --}}

                        <div class="highlight-item">

                            <div
                                class="highlight-icon"
                                aria-hidden="true"
                            >
                                3
                            </div>

                            <div class="highlight-content">

                                <div class="highlight-title">
                                    3 Modules Free After Trial
                                </div>

                                <div class="highlight-description">
                                    Keep up to three Business modules.
                                </div>

                            </div>

                        </div>


                        {{-- JK&C SUPPORT --}}

                        <div class="highlight-item">

                            <div
                                class="highlight-icon"
                                aria-hidden="true"
                            >
                                ✓
                            </div>

                            <div class="highlight-content">

                                <div class="highlight-title">
                                    JK&amp;C Support Built In
                                </div>

                                <div class="highlight-description">
                                    Support is available inside ORDO.
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 BOTTOM FEATURE CARDS
            ================================================== --}}

            <div class="feature-cards">

                {{-- BUSINESS --}}

                <div class="feature-card">

                    <span class="feature-card-label">
                        Business
                    </span>

                    <h4>
                        Connected operations
                    </h4>

                    <p>
                        Keep business information and workflows
                        organized across your workspace.
                    </p>

                </div>


                {{-- ACCESS --}}

                <div class="feature-card">

                    <span class="feature-card-label">
                        Access
                    </span>

                    <h4>
                        Progressive setup
                    </h4>

                    <p>
                        Start exploring immediately and complete
                        your account setup as you go.
                    </p>

                </div>


                {{-- SUPPORT --}}

                <div class="feature-card">

                    <span class="feature-card-label">
                        Support
                    </span>

                    <h4>
                        JK&amp;C support built in
                    </h4>

                    <p>
                        Get help and guidance directly through
                        the ORDO workspace.
                    </p>

                </div>

            </div>

        </aside>


        {{-- =====================================================
             RIGHT PANEL
        ====================================================== --}}

        <main class="right-panel">

            <div class="form-container">

                {{-- =================================================
                     SUCCESS ICON
                ================================================== --}}

                <div
                    class="success-badge-icon"
                    aria-hidden="true"
                >
                    &#10003;
                </div>


                {{-- =================================================
                     STATUS LABEL
                ================================================== --}}

                <span class="form-tag">
                    Account Created
                </span>


                {{-- =================================================
                     TITLE
                ================================================== --}}

                <h2 class="form-title">
                    Welcome to ORDO
                </h2>


                {{-- =================================================
                     DESCRIPTION
                ================================================== --}}

                <p class="form-subtitle">
                    Your account has been created successfully.
                    You can now enter the Commercial Client Portal
                    and begin exploring your workspace.
                </p>


                {{-- =================================================
                     ACCESS BOX
                ================================================== --}}

                <section
                    class="access-box"
                    aria-label="ORDO access information"
                >

                    <div class="access-box-header">

                        <h3 class="access-title">
                            30-Day Free Access Activated
                        </h3>

                        <span class="access-status">
                            Active
                        </span>

                    </div>


                    <p class="access-description">
                        Your 30-day free-access period starts
                        immediately. During this period, all six
                        Business modules are available for exploration.
                    </p>


                    <span class="access-badge">
                        30-DAY FULL ACCESS
                    </span>


                    <div class="access-meta">

                        <span
                            class="access-meta-dot"
                            aria-hidden="true"
                        ></span>

                        <span>
                            6 Business modules available during your trial
                        </span>

                    </div>


                    {{-- =================================================
                         FREE PLAN NOTE
                    ================================================== --}}

                    <div class="trial-note">

                        <span
                            class="trial-note-icon"
                            aria-hidden="true"
                        >
                            i
                        </span>

                        <span>
                            After your trial, you can continue with
                            <strong>
                                up to 3 Business modules on the Free Plan.
                            </strong>
                        </span>

                    </div>

                </section>


                {{-- =================================================
                     ENTER PORTAL
                ================================================== --}}

                <a
                    href="/town-hall"
                    class="btn-enter"
                >
                    Enter ORDO
                </a>


                {{-- =================================================
                     FOOTER NOTE
                ================================================== --}}

                <p class="footer-note">
                    You can complete your account profile and
                    verification after entering the portal.
                </p>

            </div>

        </main>

    </div>

</body>

</html>