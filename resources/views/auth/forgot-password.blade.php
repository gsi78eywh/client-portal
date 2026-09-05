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

    <title>Forgot Password | ORDO</title>


    <style>

        /* =========================================================
           ORDO AUTH — FORGOT PASSWORD
           ENHANCED LOGIN-CONSISTENT VISUAL SYSTEM
        ========================================================== */


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
        ========================================================== */

        .left-panel {
            position: relative;

            width: 50%;
            min-height: 100vh;

            display: flex;
            flex-direction: column;

            /*
             * Important:
             * The previous version allowed the content area to
             * consume the full height PLUS the feature cards.
             * This pushed the cards below the viewport.
             */
            padding:
                42px
                52px
                30px;

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
           DECORATIVE CIRCLES
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
        ========================================================== */

        .left-panel-content {
            position: relative;

            z-index: 2;

            display: flex;
            flex-direction: column;

            /*
             * FIX:
             * Do NOT use min-height: 100%.
             * It was forcing the content to occupy the entire
             * panel height before the feature cards were added.
             */
            flex: 1;

            min-height: 0;
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
        ========================================================== */

        .hero-section {
            position: relative;

            z-index: 2;

            width: 100%;
            max-width: 560px;

            /*
             * This centers the hero in the available space
             * without pushing the cards out of the viewport.
             */
            margin:
                auto 0;

            padding:
                36px 0
                32px;
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

            letter-spacing: 0.12em;

            line-height: 1.2;

            text-transform: uppercase;
        }


        /*
         * IMPORTANT:
         * Removed the previous ::before pseudo-element.
         *
         * This removes the blue dash before:
         * ACCOUNT RECOVERY
         */
        .hero-tag::before {
            display: none;
            content: none;
        }


        /* =========================================================
           HERO TITLE
        ========================================================== */

        .hero-title {
            max-width: 520px;

            margin:
                17px 0
                16px;

            color: #ffffff;

            font-size:
                clamp(
                    36px,
                    3.2vw,
                    43px
                );

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

            margin-bottom: 25px;

            color: #94a3b8;

            font-size: 13.5px;
            font-weight: 400;

            line-height: 1.68;

            letter-spacing: 0.005em;
        }


        /* =========================================================
           BADGES
        ========================================================== */

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
            position: relative;

            flex-shrink: 0;

            display: inline-flex;
            align-items: center;

            min-height: 34px;

            padding:
                7px 13px;

            border:
                1px solid
                rgba(255, 255, 255, 0.095);

            border-radius: 999px;

            background:
                rgba(255, 255, 255, 0.045);

            color: #cbd5e1;

            font-size: 10px;
            font-weight: 600;

            line-height: 1;

            white-space: nowrap;

            backdrop-filter: blur(8px);

            box-shadow:
                inset 0 1px 0
                rgba(255, 255, 255, 0.025);
        }


        .badge-pill:first-child {
            border-color:
                rgba(37, 99, 235, 0.34);

            background:
                rgba(37, 99, 235, 0.12);

            color: #bfdbfe;
        }


        .badge-pill:first-child::before {
            content: "";

            width: 6px;
            height: 6px;

            margin-right: 7px;

            border-radius: 50%;

            background: #60a5fa;

            box-shadow:
                0 0 0 3px
                rgba(96, 165, 250, 0.10);
        }


        /* =========================================================
           BOTTOM FEATURE CARDS
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
             * Pull the cards slightly upward.
             * This gives the same breathing room seen on the
             * enhanced login page.
             */
            margin-top: -6px;

            flex-shrink: 0;
        }


        .feature-card {
            position: relative;

            min-height: 122px;

            padding:
                14px 15px
                15px;

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
           FEATURE ICON
        ========================================================== */

        .feature-icon {
            width: 30px;
            height: 30px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 9px;

            border:
                1px solid
                rgba(59, 130, 246, 0.30);

            border-radius: 8px;

            background:
                rgba(37, 99, 235, 0.11);

            color: #60a5fa;

            font-size: 12px;
            font-weight: 700;

            line-height: 1;

            box-shadow:
                inset 0 1px 0
                rgba(255, 255, 255, 0.04);
        }


        .feature-icon svg {
            width: 14px;
            height: 14px;

            stroke: currentColor;

            stroke-width: 1.8;

            fill: none;

            stroke-linecap: round;
            stroke-linejoin: round;
        }


        /* =========================================================
           FEATURE LABEL
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
           FEATURE TITLE
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
           FEATURE DESCRIPTION
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
           FORM HEADER
        ========================================================== */

        .form-tag {
            display: block;

            margin-bottom: 7px;

            color: #2563eb;

            font-size: 10px;
            font-weight: 750;

            letter-spacing: 0.10em;

            line-height: 1.25;

            text-transform: uppercase;
        }


        .form-title {
            margin:
                0 0
                8px;

            color: #0b1830;

            font-size: 30px;
            font-weight: 800;

            line-height: 1.12;

            letter-spacing: -0.85px;
        }


        .form-subtitle {
            max-width: 415px;

            margin-bottom: 24px;

            color: #64748b;

            font-size: 13px;
            font-weight: 400;

            line-height: 1.6;
        }


        /* =========================================================
           RECOVERY INFORMATION CARD
        ========================================================== */

        .recovery-note {
            display: flex;
            align-items: flex-start;

            gap: 10px;

            margin-bottom: 22px;

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


        .recovery-note-icon {
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


        .recovery-note strong {
            color: #1e3a8a;

            font-weight: 700;
        }


        /* =========================================================
           FORM GROUP
        ========================================================== */

        .form-group {
            display: flex;
            flex-direction: column;

            gap: 6px;

            margin-bottom: 20px;
        }


        /* =========================================================
           LABEL
        ========================================================== */

        .form-label {
            color: #334155;

            font-size: 11.5px;
            font-weight: 650;

            line-height: 1.3;
        }


        .form-label .req {
            margin-left: 1px;

            color: #ef4444;
        }


        /* =========================================================
           INPUT WRAPPER
        ========================================================== */

        .input-wrapper {
            position: relative;

            width: 100%;
        }


        /* =========================================================
           INPUT
        ========================================================== */

        .form-input {
            width: 100%;
            height: 46px;

            padding:
                0 14px;

            border:
                1px solid
                #cbd5e1;

            border-radius: 9px;

            outline: none;

            background:
                #ffffff;

            color: #0f172a;

            font-size: 13px;
            font-weight: 400;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background-color 0.2s ease,
                transform 0.2s ease;
        }


        .form-input::placeholder {
            color: #94a3b8;
        }


        .form-input:hover {
            border-color:
                #94a3b8;

            background:
                #fdfefe;
        }


        .form-input:focus {
            border-color:
                #2563eb;

            box-shadow:
                0 0 0 3px
                rgba(37, 99, 235, 0.10);

            background:
                #ffffff;
        }


        /* =========================================================
           VALIDATION
        ========================================================== */

        .form-input.input-error {
            border-color:
                #ef4444 !important;

            box-shadow:
                0 0 0 3px
                rgba(239, 68, 68, 0.08);
        }


        .error-message {
            margin-top: 2px;

            color: #dc2626;

            font-size: 10.5px;

            line-height: 1.4;
        }


        /* =========================================================
           PRIMARY BUTTON
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

            transform:
                translateY(-1px);

            box-shadow:
                0 7px 18px
                rgba(37, 99, 235, 0.25),

                inset 0 1px 0
                rgba(255, 255, 255, 0.14);
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

            margin-top: 18px;

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


        .back-link:focus-visible {
            outline:
                2px solid
                rgba(37, 99, 235, 0.35);

            outline-offset:
                4px;

            border-radius:
                4px;
        }


        /* =========================================================
           TERMS / FOOTER NOTE
        ========================================================== */

        .terms-text {
            max-width: 380px;

            margin:
                25px auto
                0;

            color: #94a3b8;

            text-align: center;

            font-size: 10px;
            font-weight: 400;

            line-height: 1.55;
        }


        .terms-text a {
            color: #64748b;

            font-weight: 600;

            text-decoration: none;

            transition:
                color 0.2s ease;
        }


        .terms-text a:hover {
            color:
                #2563eb;

            text-decoration:
                underline;
        }


        /* =========================================================
           TABLET
        ========================================================== */

        @media (max-width: 1150px) {

            .left-panel {
                padding:
                    38px 42px
                    28px;
            }


            .right-panel {
                padding:
                    42px 42px;
            }


            .hero-section {
                padding:
                    32px 0
                    28px;
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

                margin-bottom:
                    22px;
            }


            .feature-cards {
                gap:
                    8px;

                margin-top:
                    -4px;
            }


            .feature-card {
                min-height:
                    116px;

                padding:
                    13px 12px;
            }


            .feature-card p {
                font-size:
                    9.5px;
            }
        }


        /* =========================================================
           SHORT DESKTOP / LAPTOP
        ========================================================== */

        @media (max-height: 760px) and (min-width: 901px) {

            .left-panel {
                padding-top:
                    32px;

                padding-bottom:
                    24px;
            }


            .hero-section {
                padding:
                    26px 0
                    22px;
            }


            .hero-title {
                margin:
                    14px 0
                    13px;

                font-size:
                    34px;
            }


            .hero-description {
                margin-bottom:
                    19px;

                font-size:
                    12.5px;

                line-height:
                    1.55;
            }


            .pill-badges {
                gap:
                    7px;
            }


            .badge-pill {
                min-height:
                    31px;

                padding:
                    6px 11px;

                font-size:
                    9.5px;
            }


            .feature-cards {
                margin-top:
                    -2px;
            }


            .feature-card {
                min-height:
                    105px;

                padding:
                    11px 12px;
            }


            .feature-icon {
                width:
                    28px;

                height:
                    28px;

                margin-bottom:
                    7px;
            }


            .feature-card-label {
                margin-bottom:
                    3px;

                font-size:
                    8px;
            }


            .feature-card h4 {
                margin-bottom:
                    3px;

                font-size:
                    10.5px;
            }


            .feature-card p {
                font-size:
                    9px;

                line-height:
                    1.4;
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
                    34px 34px
                    26px;
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


            .feature-cards {
                grid-template-columns:
                    1fr;

                gap:
                    8px;

                margin-top:
                    0;
            }


            .feature-card {
                min-height:
                    auto;

                display:
                    grid;

                grid-template-columns:
                    auto 1fr;

                column-gap:
                    10px;

                align-items:
                    center;
            }


            .feature-icon {
                grid-row:
                    span 2;

                margin-bottom:
                    0;
            }


            .feature-card-label {
                margin-bottom:
                    2px;
            }


            .feature-card h4 {
                margin-bottom:
                    2px;
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


            .recovery-note {
                gap:
                    9px;

                padding:
                    11px 12px;

                font-size:
                    10px;
            }


            .form-input {
                height:
                    44px;

                font-size:
                    12.5px;
            }


            .btn-submit {
                height:
                    44px;
            }


            .back-link {
                margin-top:
                    17px;

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


            .recovery-note {
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


        <!-- =====================================================
             LEFT PANEL
        ====================================================== -->

        <aside class="left-panel">


            <div class="left-panel-content">


                <!-- =================================================
                     BRAND
                ================================================== -->

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


                <!-- =================================================
                     HERO
                ================================================== -->

                <div class="hero-section">


                    <span class="hero-tag">
                        ACCOUNT RECOVERY
                    </span>


                    <h1 class="hero-title">
                        Reset your account access securely.
                    </h1>


                    <p class="hero-description">
                        Forgot your password? No problem. Verify your
                        registered email and follow the recovery steps
                        to securely restore access to your ORDO workspace.
                    </p>


                    <!-- =================================================
                         RECOVERY BADGES
                    ================================================== -->

                    <div class="pill-badges">

                        <span class="badge-pill">
                            Secure recovery
                        </span>


                        <span class="badge-pill">
                            Email verification
                        </span>


                        <span class="badge-pill">
                            Protected access
                        </span>

                    </div>


                </div>


            </div>


            <!-- =================================================
                 BOTTOM FEATURE CARDS
            ================================================== -->

            <div class="feature-cards">


                <!-- =================================================
                     FEATURE 1
                ================================================== -->

                <div class="feature-card">


                    <div
                        class="feature-icon"
                        aria-hidden="true"
                    >

                        <svg
                            viewBox="0 0 24 24"
                        >

                            <path
                                d="M12 3l7 3v5c0 4.5-3 7.8-7 10-4-2.2-7-5.5-7-10V6l7-3z"
                            ></path>


                            <path
                                d="M9.5 12l1.7 1.7 3.5-3.6"
                            ></path>

                        </svg>

                    </div>


                    <div>

                        <span class="feature-card-label">
                            Security
                        </span>


                        <h4>
                            Secure by default
                        </h4>


                        <p>
                            Your account recovery begins with
                            verified contact information.
                        </p>

                    </div>


                </div>


                <!-- =================================================
                     FEATURE 2
                ================================================== -->

                <div class="feature-card">


                    <div
                        class="feature-icon"
                        aria-hidden="true"
                    >

                        <svg
                            viewBox="0 0 24 24"
                        >

                            <circle
                                cx="12"
                                cy="12"
                                r="8"
                            ></circle>


                            <path
                                d="M12 8v4l2.5 2"
                            ></path>

                        </svg>

                    </div>


                    <div>

                        <span class="feature-card-label">
                            Verification
                        </span>


                        <h4>
                            Guided recovery
                        </h4>


                        <p>
                            Follow clear verification steps to
                            restore access to your workspace.
                        </p>

                    </div>


                </div>


                <!-- =================================================
                     FEATURE 3
                ================================================== -->

                <div class="feature-card">


                    <div
                        class="feature-icon"
                        aria-hidden="true"
                    >

                        <svg
                            viewBox="0 0 24 24"
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
                                x="4"
                                y="14"
                                width="6"
                                height="6"
                                rx="1"
                            ></rect>


                            <path
                                d="M14 17h6"
                            ></path>


                            <path
                                d="M17 14v6"
                            ></path>

                        </svg>

                    </div>


                    <div>

                        <span class="feature-card-label">
                            Workspace
                        </span>


                        <h4>
                            Connected records
                        </h4>


                        <p>
                            Your business information remains
                            connected across the ORDO workspace.
                        </p>

                    </div>


                </div>


            </div>


        </aside>


        <!-- =====================================================
             RIGHT PANEL
        ====================================================== -->

        <main class="right-panel">


            <div class="form-container">


                <!-- =================================================
                     FORM HEADER
                ================================================== -->

                <span class="form-tag">
                    PASSWORD RECOVERY
                </span>


                <h2 class="form-title">
                    Forgot your password?
                </h2>


                <p class="form-subtitle">
                    Enter the email address associated with your
                    ORDO account and we'll help you restore access.
                </p>


                <!-- =================================================
                     INFORMATION NOTE
                ================================================== -->

                <div class="recovery-note">


                    <span
                        class="recovery-note-icon"
                        aria-hidden="true"
                    >
                        i
                    </span>


                    <span>

                        We'll use your registered email to begin
                        the

                        <strong>
                            secure account recovery process.
                        </strong>

                    </span>


                </div>


                <!-- =================================================
                     FORM
                ================================================== -->

                <form
                    method="POST"
                    action="{{ route('password.email') }}"
                >
                    @csrf


                    <div class="form-group">


                        <label
                            for="email"
                            class="form-label"
                        >

                            Email Address

                            <span class="req">
                                *
                            </span>

                        </label>


                        <div class="input-wrapper">


                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-input @error('email') input-error @enderror"
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                autocomplete="email"
                                inputmode="email"
                                required
                                autofocus
                            >


                        </div>


                        @error('email')

                            <div class="error-message">
                                {{ $message }}
                            </div>

                        @enderror


                    </div>


                    <!-- =================================================
                         SUBMIT
                    ================================================== -->

                    <button
                        type="submit"
                        class="btn-submit"
                    >
                        Continue
                    </button>


                </form>


                <!-- =================================================
                     BACK TO LOGIN
                ================================================== -->

                <a
                    href="/login"
                    class="back-link"
                >

                    &larr;&nbsp; Back to Sign In

                </a>


                <!-- =================================================
                     FOOTER NOTE
                ================================================== -->

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


</body>

</html>