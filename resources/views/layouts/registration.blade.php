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

    <title>
        @yield('title', 'Create Your ORDO Account')
    </title>


    <style>

        /* =========================================================
           ORDO REGISTRATION LAYOUT
           SHARED PERSONAL / PROFESSIONAL / CONTACT DESIGN
        ========================================================= */

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }


        html,
        body {
            width: 100%;
            min-height: 100%;

            margin: 0;
            padding: 0;
        }


        body {
            background: #ffffff;

            color: #06172f;

            font-family:
                Inter,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                sans-serif;

            font-size: 14px;
            line-height: 1.5;

            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }


        a {
            color: inherit;
            text-decoration: none;
        }


        button,
        input,
        select,
        textarea {
            font: inherit;
        }


        img,
        svg {
            max-width: 100%;
        }


        /* =========================================================
           MAIN REGISTRATION SHELL
        ========================================================= */

        .registration-shell {
            width: 100%;
            min-height: 100vh;

            display: flex;

            margin: 0;
            padding: 0;

            background: #ffffff;
        }


        /* =========================================================
           LEFT ORDO BRAND PANEL
        ========================================================= */

        .registration-brand {
            position: relative;

            width: 50%;
            min-width: 50%;
            min-height: 100vh;

            overflow: hidden;

            padding: 46px 52px 42px;

            display: flex;
            flex-direction: column;

            background:
                linear-gradient(
                    145deg,
                    #071b38 0%,
                    #06172f 52%,
                    #082044 100%
                );

            color: #ffffff;
        }


        /* =========================================================
           BACKGROUND DECORATION
        ========================================================= */

        .brand-circle {
            position: absolute;

            width: 430px;
            height: 430px;

            top: -200px;
            right: -170px;

            border-radius: 50%;

            background: rgba(37, 99, 235, .11);

            pointer-events: none;
        }


        .brand-circle-small {
            position: absolute;

            width: 330px;
            height: 330px;

            left: -205px;
            bottom: -210px;

            border-radius: 50%;

            background: rgba(37, 99, 235, .08);

            pointer-events: none;
        }


        .brand-line {
            position: absolute;

            width: 430px;
            height: 1px;

            right: -100px;
            bottom: 190px;

            background: rgba(96, 165, 250, .10);

            transform: rotate(-18deg);

            pointer-events: none;
        }


        /* =========================================================
           BRAND CONTENT
        ========================================================= */

        .brand-content {
            position: relative;
            z-index: 2;

            width: 100%;
            max-width: 590px;

            margin: 0 auto;

            display: flex;
            flex-direction: column;

            min-height: calc(100vh - 88px);
        }


        /* =========================================================
           ORDO LOGO
        ========================================================= */

        .brand-logo {
            display: flex;
            align-items: center;

            gap: 12px;

            margin-bottom: 48px;
        }


        .brand-logo-mark {
            width: 44px;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            flex: 0 0 44px;

            border-radius: 11px;

            background: #2563eb;

            color: #ffffff;

            box-shadow:
                0 8px 18px rgba(37, 99, 235, .24);
        }


        .brand-logo-mark span {
            font-size: 20px;
            font-weight: 800;

            line-height: 1;
        }


        .brand-logo-text {
            display: flex;
            flex-direction: column;

            line-height: 1;
        }


        .brand-logo-name {
            color: #ffffff;

            font-size: 20px;
            font-weight: 850;

            letter-spacing: -.03em;
        }


        .brand-logo-company {
            margin-top: 4px;

            color: #bfdbfe;

            font-size: 8px;
            font-weight: 600;

            letter-spacing: .01em;
        }


        /* =========================================================
           BRAND EYEBROW
        ========================================================= */

        .brand-eyebrow {
            display: flex;
            align-items: center;

            gap: 7px;

            margin-bottom: 21px;

            color: #60a5fa;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: .13em;

            text-transform: uppercase;
        }


        .brand-eyebrow-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #3b82f6;

            box-shadow:
                0 0 0 4px rgba(59, 130, 246, .10);
        }


        /* =========================================================
           BRAND HEADLINE
        ========================================================= */

        .brand-headline {
            max-width: 570px;

            margin: 0 0 20px;

            color: #ffffff;

            font-size: clamp(42px, 4vw, 58px);

            line-height: .94;

            font-weight: 850;

            letter-spacing: -.055em;
        }


        .brand-description {
            max-width: 560px;

            margin: 0;

            color: #bfdbfe;

            font-size: 13px;

            line-height: 1.7;
        }


        /* =========================================================
           FEATURE PILLS
        ========================================================= */

        .brand-pills {
            display: flex;
            flex-wrap: wrap;

            gap: 9px;

            margin-top: 28px;
        }


        .brand-pill {
            display: inline-flex;
            align-items: center;

            gap: 7px;

            min-height: 36px;

            padding: 0 13px;

            border: 1px solid rgba(148, 163, 184, .20);

            border-radius: 999px;

            background: rgba(255, 255, 255, .025);

            color: #dbeafe;

            font-size: 10px;
            font-weight: 650;

            white-space: nowrap;
        }


        .brand-pill-dot {
            width: 7px;
            height: 7px;

            flex: 0 0 7px;

            border-radius: 50%;

            background: #3b82f6;

            box-shadow:
                0 0 0 3px rgba(59, 130, 246, .08);
        }


        /* =========================================================
           BENEFIT CARDS
        ========================================================= */

        .brand-benefits {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 10px;

            margin-top: auto;

            padding-top: 46px;
        }


        .brand-benefit {
            min-height: 112px;

            padding: 15px;

            border: 1px solid rgba(148, 163, 184, .16);

            border-radius: 11px;

            background: rgba(255, 255, 255, .025);

            backdrop-filter: blur(5px);
        }


        .brand-benefit-icon {
            width: 27px;
            height: 27px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 10px;

            border: 1px solid rgba(59, 130, 246, .28);

            border-radius: 7px;

            background: rgba(37, 99, 235, .08);

            color: #60a5fa;
        }


        .brand-benefit-icon svg {
            width: 15px;
            height: 15px;
        }


        .brand-benefit-title {
            margin-bottom: 4px;

            color: #ffffff;

            font-size: 10px;
            font-weight: 750;

            line-height: 1.35;
        }


        .brand-benefit-text {
            color: #93c5fd;

            font-size: 8px;

            line-height: 1.45;
        }


        /* =========================================================
           RIGHT REGISTRATION AREA
        ========================================================= */

        .registration-main {
            width: 50%;
            min-width: 50%;

            min-height: 100vh;

            display: flex;
            align-items: flex-start;
            justify-content: center;

            margin: 0;
            padding: 0;

            background: #ffffff;

            overflow-y: auto;
        }


        .registration-container {
            width: 100%;

            max-width: 760px;

            margin: 0 auto;

            padding: 64px 52px 70px;
        }


        /* =========================================================
           REGISTRATION PAGE CONTENT

           IMPORTANT:
           Individual Blade pages should NOT create another
           sidebar or another registration-main.

           They only provide the right-side page content.
        ========================================================= */

        .registration-container > .registration-page {
            width: 100%;
            max-width: none;

            margin: 0;
            padding: 0 0 20px;
        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 1100px) {

            .registration-brand {
                padding: 40px 38px;
            }


            .registration-container {
                padding: 54px 38px 60px;
            }


            .brand-headline {
                font-size: 45px;
            }


            .brand-benefits {
                grid-template-columns: 1fr;
            }


            .brand-benefit {
                min-height: auto;
            }

        }


        @media (max-width: 850px) {

            .registration-shell {
                display: block;
            }


            .registration-brand {
                width: 100%;
                min-width: 100%;
                min-height: auto;

                padding: 35px 30px 40px;
            }


            .brand-content {
                min-height: auto;
            }


            .brand-logo {
                margin-bottom: 36px;
            }


            .brand-headline {
                max-width: 650px;

                font-size: 44px;
            }


            .brand-description {
                max-width: 620px;
            }


            .brand-benefits {
                margin-top: 35px;
                padding-top: 0;

                grid-template-columns:
                    repeat(3, minmax(0, 1fr));
            }


            .registration-main {
                width: 100%;
                min-width: 100%;

                min-height: auto;

                overflow: visible;
            }


            .registration-container {
                max-width: 760px;

                padding: 45px 30px 60px;
            }

        }


        @media (max-width: 650px) {

            .registration-brand {
                padding: 30px 22px 34px;
            }


            .brand-logo {
                margin-bottom: 32px;
            }


            .brand-headline {
                font-size: 38px;
                line-height: .96;
            }


            .brand-description {
                font-size: 12px;
            }


            .brand-pills {
                gap: 7px;
            }


            .brand-pill {
                min-height: 33px;

                padding: 0 10px;

                font-size: 9px;
            }


            .brand-benefits {
                grid-template-columns: 1fr;

                gap: 8px;
            }


            .brand-benefit {
                min-height: 0;
            }


            .registration-container {
                padding: 38px 22px 50px;
            }

        }


        @media (max-width: 480px) {

            .brand-headline {
                font-size: 34px;
            }


            .registration-container {
                padding: 32px 18px 45px;
            }

        }

    </style>


    @stack('styles')

</head>


<body>

    <div class="registration-shell">


        {{-- =====================================================
             LEFT SIDE — SHARED ORDO BRANDING
        ====================================================== --}}

        <aside class="registration-brand">


            {{-- Decorative shapes --}}

            <div class="brand-circle"></div>

            <div class="brand-circle-small"></div>

            <div class="brand-line"></div>


            <div class="brand-content">


                {{-- =================================================
                     LOGO
                ================================================== --}}

                <div class="brand-logo">

                    <div class="brand-logo-mark">

                        <span>o</span>

                    </div>


                    <div class="brand-logo-text">

                        <div class="brand-logo-name">
                            ORDO
                        </div>

                        <div class="brand-logo-company">
                            by John Kelly &amp; Company
                        </div>

                    </div>

                </div>


                {{-- =================================================
                     BRAND MESSAGE
                ================================================== --}}

                <div class="brand-eyebrow">

                    <span class="brand-eyebrow-dot"></span>

                    Business. Organized.

                </div>


                <h2 class="brand-headline">

                    One workspace for the business you're building.

                </h2>


                <p class="brand-description">

                    Manage governance, compliance, finance, people,
                    records and JK&amp;C services from one controlled
                    client workspace.

                </p>


                {{-- =================================================
                     FEATURE PILLS
                ================================================== --}}

                <div class="brand-pills">


                    <div class="brand-pill">

                        <span class="brand-pill-dot"></span>

                        6 business modules

                    </div>


                    <div class="brand-pill">

                        <span class="brand-pill-dot"></span>

                        30-day full access

                    </div>


                    <div class="brand-pill">

                        <span class="brand-pill-dot"></span>

                        3 modules free after trial

                    </div>


                    <div class="brand-pill">

                        <span class="brand-pill-dot"></span>

                        JK&amp;C support built in

                    </div>


                </div>


                {{-- =================================================
                     BENEFIT CARDS
                ================================================== --}}

                <div class="brand-benefits">


                    {{-- CARD 1 --}}

                    <div class="brand-benefit">

                        <div class="brand-benefit-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                aria-hidden="true"
                            >

                                <path
                                    d="M5 4h14v16H5z"
                                    stroke-linejoin="round"
                                />

                                <path
                                    d="M8 8h8M8 12h8M8 16h5"
                                    stroke-linecap="round"
                                />

                            </svg>

                        </div>


                        <div class="brand-benefit-title">
                            Clear by default
                        </div>


                        <div class="brand-benefit-text">
                            See what needs attention without
                            searching through scattered records.
                        </div>

                    </div>


                    {{-- CARD 2 --}}

                    <div class="brand-benefit">

                        <div class="brand-benefit-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                aria-hidden="true"
                            >

                                <path
                                    d="M12 3v18"
                                    stroke-linecap="round"
                                />

                                <path
                                    d="M8 7l4-4 4 4"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />

                                <path
                                    d="M16 17l-4 4-4-4"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />

                            </svg>

                        </div>


                        <div class="brand-benefit-title">
                            Progressive setup
                        </div>


                        <div class="brand-benefit-text">
                            Start first. Complete verification
                            and account details as you go.
                        </div>

                    </div>


                    {{-- CARD 3 --}}

                    <div class="brand-benefit">

                        <div class="brand-benefit-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
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
                                    y="14"
                                    width="6"
                                    height="6"
                                    rx="1"
                                />

                                <path
                                    d="M10 7h4a2 2 0 0 1 2 2v5"
                                    stroke-linecap="round"
                                />

                            </svg>

                        </div>


                        <div class="brand-benefit-title">
                            Connected records
                        </div>


                        <div class="brand-benefit-text">
                            Business information stays linked
                            across your ORDO workspace.
                        </div>

                    </div>


                </div>

            </div>

        </aside>


        {{-- =====================================================
             RIGHT SIDE — REGISTRATION FORM
        ====================================================== --}}

        <main class="registration-main">

            <div class="registration-container">

                @yield('content')

            </div>

        </main>


    </div>


    @stack('scripts')

</body>

</html>