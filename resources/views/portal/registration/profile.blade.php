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

    <title>Profile — Create your ORDO account</title>

    <style>

        /* =========================================================
           ORDO
           REGISTRATION — PROFILE
           STEP 3 OF 6

           FLOW:
           1. Account Type
           2. Information
           3. Profile
           4. Contact
           5. Security
           6. Confirmation
        ========================================================== */

        :root {

            --ordo-blue: #2563eb;
            --ordo-blue-dark: #1d4ed8;
            --ordo-blue-light: #3b82f6;
            --ordo-blue-soft: #eff6ff;

            --navy-950: #041329;
            --navy-900: #061a35;
            --navy-850: #082348;
            --navy-800: #0a2b5a;

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

            --success: #16a34a;
            --success-dark: #166534;
            --success-soft: #f0fdf4;
            --success-border: #bbf7d0;

            --danger: #dc2626;
            --danger-dark: #991b1b;
            --danger-soft: #fef2f2;
            --danger-border: #fecaca;

            --radius-sm: 7px;
            --radius-md: 9px;
            --radius-lg: 12px;

            --shadow-blue:
                0 5px 16px rgba(37, 99, 235, 0.24);

            --shadow-button:
                0 4px 12px rgba(37, 99, 235, 0.18);

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

        html {

            width: 100%;
            min-height: 100%;

            background: var(--white);

            overflow-x: hidden;
        }

        body {

            width: 100%;
            min-height: 100vh;

            margin: 0;

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

            text-rendering: optimizeLegibility;
        }

        button,
        input,
        select {

            font: inherit;
        }

        button,
        a,
        input,
        select {

            -webkit-tap-highlight-color: transparent;
        }


        /* =========================================================
           MAIN REGISTRATION WRAPPER
        ========================================================== */

        .registration-wrapper {

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

            padding:
                46px
                52px
                42px;

            overflow: hidden;

            color: var(--white);

            background:
                linear-gradient(
                    145deg,
                    var(--navy-950) 0%,
                    var(--navy-900) 46%,
                    var(--navy-850) 75%,
                    var(--navy-800) 100%
                );
        }


        .left-panel::before {

            content: "";

            position: absolute;

            width: 520px;
            height: 520px;

            top: -280px;
            right: -230px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(37, 99, 235, 0.18) 0%,
                    rgba(37, 99, 235, 0.07) 35%,
                    rgba(37, 99, 235, 0) 72%
                );

            pointer-events: none;
        }


        .left-panel::after {

            content: "";

            position: absolute;

            width: 460px;
            height: 460px;

            bottom: -300px;
            left: -240px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(37, 99, 235, 0.12) 0%,
                    rgba(37, 99, 235, 0) 72%
                );

            pointer-events: none;
        }


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

            width: 42px;
            height: 42px;

            flex: 0 0 42px;

            display: flex;

            align-items: center;
            justify-content: center;

            border:
                1px solid
                rgba(255, 255, 255, 0.08);

            border-radius: 10px;

            background:
                linear-gradient(
                    145deg,
                    #3b82f6,
                    #2563eb
                );

            color: var(--white);

            font-size: 20px;
            font-weight: 800;

            line-height: 1;

            box-shadow:
                var(--shadow-blue);
        }


        .brand-name {

            color: var(--white);

            font-size: 21px;
            font-weight: 800;

            line-height: 1.05;

            letter-spacing: -0.5px;
        }


        .brand-sub {

            margin-top: 5px;

            color: #8ea5c2;

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

            padding:
                44px 0
                38px;
        }


        .hero-tag {

            display: inline-flex;

            align-items: center;

            color: #60a5fa;

            font-size: 10.5px;
            font-weight: 700;

            letter-spacing: 0.11em;

            line-height: 1.2;

            text-transform: uppercase;
        }


        .hero-title {

            max-width: 540px;

            margin:
                15px 0
                16px;

            color: var(--white);

            font-size:
                clamp(35px, 3.1vw, 45px);

            font-weight: 800;

            line-height: 1.08;

            letter-spacing: -1.25px;
        }


        .hero-description {

            max-width: 510px;

            margin-bottom: 27px;

            color: #9aadc5;

            font-size: 13.3px;
            font-weight: 400;

            line-height: 1.65;
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

            height: 35px;

            display: flex;

            align-items: center;

            padding:
                0 10px;

            border:
                1px solid
                rgba(255, 255, 255, 0.095);

            border-radius: 999px;

            background:
                rgba(255, 255, 255, 0.045);

            color: #cbd5e1;

            font-size: 9.5px;
            font-weight: 500;

            line-height: 1;

            white-space: nowrap;

            backdrop-filter: blur(8px);

            transition:
                background-color var(--transition),
                border-color var(--transition),
                transform var(--transition);
        }


        .badge-pill:hover {

            background:
                rgba(255, 255, 255, 0.075);

            border-color:
                rgba(96, 165, 250, 0.28);

            transform:
                translateY(-1px);
        }


        .badge-dot {

            width: 7px;
            height: 7px;

            flex: 0 0 7px;

            margin-right: 7px;

            border-radius: 50%;

            background:
                var(--ordo-blue-light);

            box-shadow:
                0 0 0 3px
                rgba(59, 130, 246, 0.09);
        }


        /* =========================================================
           FEATURE CARDS
        ========================================================== */

        .feature-cards {

            width: 100%;

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 10px;
        }


        .feature-card {

            min-width: 0;

            padding:
                15px
                14px
                16px;

            border:
                1px solid
                rgba(255, 255, 255, 0.075);

            border-radius:
                var(--radius-md);

            background:
                rgba(255, 255, 255, 0.035);

            transition:
                background-color var(--transition),
                border-color var(--transition),
                transform var(--transition);
        }


        .feature-card:hover {

            background:
                rgba(255, 255, 255, 0.055);

            border-color:
                rgba(255, 255, 255, 0.13);

            transform:
                translateY(-2px);
        }


        .feature-icon {

            width: 29px;
            height: 29px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin-bottom: 11px;

            border:
                1px solid
                rgba(96, 165, 250, 0.15);

            border-radius: 8px;

            background:
                rgba(37, 99, 235, 0.12);

            color: #60a5fa;
        }


        .feature-icon svg {

            width: 15px;
            height: 15px;
        }


        .feature-card h4 {

            margin-bottom: 5px;

            color: var(--white);

            font-size: 11.6px;
            font-weight: 700;

            line-height: 1.3;
        }


        .feature-card p {

            color: #8ea5c2;

            font-size: 10.1px;
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

            padding:
                34px
                52px;

            background: var(--white);

            overflow-y: auto;
            overflow-x: hidden;
        }


        /* =========================================================
           FORM CONTAINER
        ========================================================== */

        .form-container {

            width: 100%;

            max-width: 430px;

            margin:
                0 auto;
        }


        /* =========================================================
           FORM HEADER
        ========================================================== */

        .form-tag {

            display: block;

            margin-bottom: 7px;

            color:
                var(--ordo-blue);

            font-size: 10.5px;
            font-weight: 700;

            letter-spacing: 0.095em;

            line-height: 1.2;

            text-transform: uppercase;
        }


        .form-title {

            margin-bottom: 7px;

            color:
                var(--slate-950);

            font-size: 29px;
            font-weight: 800;

            line-height: 1.14;

            letter-spacing: -0.75px;
        }


        .form-subtitle {

            max-width: 400px;

            margin-bottom: 20px;

            color:
                var(--slate-500);

            font-size: 12.8px;
            font-weight: 400;

            line-height: 1.55;
        }


        /* =========================================================
           REGISTRATION PROGRESS
        ========================================================== */

        .registration-progress {

            width: 100%;

            display: grid;

            grid-template-columns:
                repeat(6, minmax(0, 1fr));

            gap: 7px;

            margin-bottom: 21px;
        }


        .progress-segment {

            width: 100%;

            height: 5px;

            display: block;

            border-radius: 999px;

            background:
                var(--slate-200);

            transition:
                background-color var(--transition);
        }


        .progress-segment.active {

            background:
                var(--ordo-blue);

            box-shadow:
                0 0 0 1px
                rgba(37, 99, 235, 0.03);
        }


        .progress-segment.completed {

            background:
                var(--ordo-blue);
        }


        /* =========================================================
           ALERTS
        ========================================================== */

        .alert {

            width: 100%;

            display: flex;

            align-items: flex-start;

            gap: 10px;

            margin-bottom: 18px;

            padding:
                11px
                13px;

            border-radius:
                var(--radius-md);

            font-size: 11.5px;

            line-height: 1.5;
        }


        .alert-icon {

            width: 20px;
            height: 20px;

            flex: 0 0 20px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            font-size: 11px;
            font-weight: 800;
        }


        .alert-success {

            color:
                var(--success-dark);

            background:
                var(--success-soft);

            border:
                1px solid
                var(--success-border);
        }


        .alert-success .alert-icon {

            color:
                var(--success);

            background:
                #dcfce7;
        }


        .alert-error {

            color:
                var(--danger-dark);

            background:
                var(--danger-soft);

            border:
                1px solid
                var(--danger-border);
        }


        .alert-error .alert-icon {

            color:
                var(--danger);

            background:
                #fee2e2;
        }


        .alert-error strong {

            display: block;

            margin-bottom: 3px;
        }


        .alert-error ul {

            margin: 0;

            padding-left: 17px;
        }


        /* =========================================================
           FORM
        ========================================================== */

        .registration-form {

            width: 100%;
        }


        .form-grid {

            width: 100%;

            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            column-gap: 13px;

            row-gap: 14px;
        }


        .form-group {

            min-width: 0;
        }


        .form-group-full {

            grid-column:
                1 / -1;
        }


        /* =========================================================
           LABEL
        ========================================================== */

        .form-label {

            display: flex;

            align-items: center;

            margin-bottom: 6px;

            color:
                var(--slate-700);

            font-size: 11.8px;
            font-weight: 600;

            line-height: 1.3;
        }


        .required {

            margin-left: 3px;

            color:
                var(--danger);
        }


        /* =========================================================
           INPUT / SELECT WRAPPERS
        ========================================================== */

        .input-wrapper,
        .select-wrapper {

            position: relative;
        }


        /* =========================================================
           FIELD ICON
        ========================================================== */

        .field-icon {

            position: absolute;

            top: 50%;
            left: 12px;

            width: 16px;
            height: 16px;

            color:
                var(--slate-400);

            transform:
                translateY(-50%);

            pointer-events: none;

            transition:
                color var(--transition);
        }


        .input-wrapper:focus-within .field-icon,
        .select-wrapper:focus-within .field-icon {

            color:
                var(--ordo-blue);
        }


        .field-icon svg {

            width: 100%;
            height: 100%;
        }


        /* =========================================================
           INPUTS
        ========================================================== */

        .form-input,
        .form-select {

            width: 100%;
            height: 44px;

            padding:
                0
                12px;

            border:
                1px solid
                var(--slate-300);

            border-radius:
                var(--radius-md);

            outline: none;

            background:
                var(--white);

            color:
                var(--slate-950);

            font-size: 12.8px;
            font-weight: 400;

            transition:
                border-color var(--transition),
                box-shadow var(--transition),
                background-color var(--transition);
        }


        .has-icon .form-input,
        .has-icon .form-select {

            padding-left: 38px;
        }


        .form-input::placeholder {

            color:
                var(--slate-400);
        }


        .form-input:hover,
        .form-select:hover {

            border-color:
                var(--slate-400);
        }


        .form-input:focus,
        .form-select:focus {

            border-color:
                var(--ordo-blue);

            background:
                #fcfdff;

            box-shadow:
                0 0 0 3px
                rgba(37, 99, 235, 0.10);
        }


        /* =========================================================
           SELECT
        ========================================================== */

        .form-select {

            cursor: pointer;

            appearance: none;

            -webkit-appearance: none;

            padding-right: 36px;
        }


        .select-wrapper::after {

            content: "";

            position: absolute;

            top: 50%;
            right: 14px;

            width: 7px;
            height: 7px;

            border-right:
                1.5px solid
                var(--slate-500);

            border-bottom:
                1.5px solid
                var(--slate-500);

            transform:
                translateY(-65%)
                rotate(45deg);

            pointer-events: none;
        }


        /* =========================================================
           DATE INPUT
        ========================================================== */

        .form-input[type="date"] {

            color-scheme: light;
        }


        .form-input[type="date"]::-webkit-calendar-picker-indicator {

            cursor: pointer;

            opacity: 0.55;

            transition:
                opacity var(--transition);
        }


        .form-input[type="date"]:hover::-webkit-calendar-picker-indicator {

            opacity: 0.8;
        }


        /* =========================================================
           FIELD ERRORS
        ========================================================== */

        .field-error {

            display: block;

            margin-top: 4px;

            color:
                var(--danger);

            font-size: 10.2px;
            font-weight: 500;

            line-height: 1.35;
        }


        .form-input.is-invalid,
        .form-select.is-invalid {

            border-color:
                var(--danger);
        }


        .form-input.is-invalid:focus,
        .form-select.is-invalid:focus {

            border-color:
                var(--danger);

            box-shadow:
                0 0 0 3px
                rgba(220, 38, 38, 0.08);
        }


        /* =========================================================
           ACTIONS
        ========================================================== */

        .registration-actions {

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 12px;

            margin-top: 20px;
        }


        /* =========================================================
           BUTTON BASE
        ========================================================== */

        .back-button,
        .continue-button {

            min-height: 44px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            padding:
                0
                17px;

            border-radius:
                var(--radius-md);

            font-family: inherit;

            font-size: 12.8px;
            font-weight: 700;

            text-decoration: none;

            cursor: pointer;

            transition:
                background-color var(--transition),
                border-color var(--transition),
                color var(--transition),
                box-shadow var(--transition),
                transform var(--transition);
        }


        /* =========================================================
           BACK BUTTON
        ========================================================== */

        .back-button {

            min-width: 108px;

            background:
                var(--white);

            border:
                1px solid
                var(--slate-300);

            color:
                var(--slate-900);

            box-shadow:
                none;
        }


        .back-button:hover {

            background:
                var(--slate-50);

            border-color:
                var(--slate-400);

            color:
                var(--slate-950);

            transform:
                translateY(-1px);

            box-shadow:
                0 4px 10px
                rgba(15, 23, 42, 0.05);
        }


        .back-button:focus-visible {

            outline:
                3px solid
                rgba(37, 99, 235, 0.14);

            outline-offset:
                2px;
        }


        /* =========================================================
           CONTINUE BUTTON
        ========================================================== */

        .continue-button {

            min-width: 142px;

            background:
                var(--ordo-blue);

            border:
                1px solid
                var(--ordo-blue);

            color:
                var(--white);

            box-shadow:
                var(--shadow-button);
        }


        .continue-button:hover {

            background:
                var(--ordo-blue-dark);

            border-color:
                var(--ordo-blue-dark);

            box-shadow:
                0 6px 16px
                rgba(37, 99, 235, 0.23);

            transform:
                translateY(-1px);
        }


        .continue-button:active {

            transform:
                translateY(0);
        }


        .continue-button:focus-visible {

            outline:
                3px solid
                rgba(37, 99, 235, 0.18);

            outline-offset:
                2px;
        }


        .continue-button:disabled {

            opacity:
                0.72;

            cursor:
                not-allowed;

            transform:
                none;

            box-shadow:
                0 2px 8px
                rgba(37, 99, 235, 0.12);
        }


        /* =========================================================
           BUTTON ICONS
        ========================================================== */

        .button-icon,
        .button-arrow {

            width: 15px;
            height: 15px;

            flex:
                0 0 15px;

            display: inline-flex;

            align-items: center;
            justify-content: center;
        }


        .button-icon svg,
        .button-arrow svg {

            width: 15px;
            height: 15px;
        }


        /* =========================================================
           1250PX
        ========================================================== */

        @media (max-width: 1250px) {

            .left-panel {

                padding-left: 40px;
                padding-right: 40px;
            }

            .right-panel {

                padding-left: 40px;
                padding-right: 40px;
            }

            .hero-title {

                font-size: 38px;
            }

            .badge-pill {

                font-size: 8.9px;

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


        /* =========================================================
           1100PX
        ========================================================== */

        @media (max-width: 1100px) {

            .left-panel {

                padding-left: 30px;
                padding-right: 30px;
            }

            .right-panel {

                padding-left: 30px;
                padding-right: 30px;
            }

            .hero-title {

                font-size: 34px;
            }

            .hero-description {

                font-size: 12.2px;
            }

            .pill-badges {

                gap: 5px;
            }

            .badge-pill {

                height: 31px;

                font-size: 8px;

                padding-left: 6px;
                padding-right: 6px;
            }

            .feature-cards {

                gap: 7px;
            }

            .feature-card {

                padding:
                    13px 11px
                    14px;
            }

            .feature-card h4 {

                font-size: 10.8px;
            }

            .feature-card p {

                font-size: 9.2px;
            }

            .feature-icon {

                width: 26px;
                height: 26px;
            }

            .form-container {

                max-width: 400px;
            }

            .form-input,
            .form-select {

                height: 43px;
            }

            .registration-actions {

                margin-top: 18px;
            }
        }


        /* =========================================================
           TABLET
        ========================================================== */

        @media (max-width: 900px) {

            .registration-wrapper {

                display: block;
            }

            .left-panel {

                display: none;
            }

            .right-panel {

                width: 100%;
                min-height: 100vh;

                padding:
                    42px
                    32px;

                align-items: center;
            }

            .form-container {

                max-width: 700px;
            }

            .form-title {

                font-size: 30px;
            }

            .form-input,
            .form-select {

                height: 46px;
            }
        }


        /* =========================================================
           MOBILE
        ========================================================== */

        @media (max-width: 600px) {

            .right-panel {

                min-height: 100vh;

                padding:
                    34px
                    22px
                    38px;

                align-items:
                    flex-start;
            }

            .form-container {

                max-width: 100%;
            }

            .form-title {

                font-size: 27px;
            }

            .form-subtitle {

                margin-bottom: 21px;

                font-size: 12.3px;
            }

            .registration-progress {

                gap: 5px;

                margin-bottom: 21px;
            }

            .form-grid {

                grid-template-columns:
                    1fr;

                gap: 15px;
            }

            .form-group-full {

                grid-column:
                    auto;
            }

            .registration-actions {

                flex-direction:
                    column-reverse;

                align-items:
                    stretch;

                gap: 9px;

                margin-top: 21px;
            }

            .back-button,
            .continue-button {

                width: 100%;
            }

            .form-input,
            .form-select {

                height: 46px;

                font-size: 13px;
            }

            .form-label {

                font-size: 11.8px;
            }
        }


        /* =========================================================
           SMALL MOBILE
        ========================================================== */

        @media (max-width: 420px) {

            .right-panel {

                padding-left: 18px;
                padding-right: 18px;
            }

            .form-title {

                font-size: 25px;
            }

            .form-subtitle {

                font-size: 12px;
            }

            .registration-progress {

                gap: 4px;
            }

            .progress-segment {

                height: 4px;
            }

            .form-input,
            .form-select {

                height: 45px;

                font-size: 12.8px;
            }

            .form-label {

                font-size: 11.4px;
            }
        }


        /* =========================================================
           VERY SMALL
        ========================================================== */

        @media (max-width: 340px) {

            .right-panel {

                padding-left: 15px;
                padding-right: 15px;
            }

            .form-title {

                font-size: 23px;
            }

            .registration-actions {

                gap: 8px;
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

                transition:
                    none !important;

                animation:
                    none !important;
            }
        }

    </style>

</head>


<body>

<div class="registration-wrapper">


    {{-- =========================================================
         LEFT PANEL
    ========================================================== --}}

    <section class="left-panel">


        <div class="left-content">


            {{-- =================================================
                 BRAND
            ================================================== --}}

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


            {{-- =================================================
                 HERO
            ================================================== --}}

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


                {{-- =================================================
                     INFORMATION BADGES
                ================================================== --}}

                <div class="pill-badges">


                    <span class="badge-pill">

                        <span class="badge-dot"></span>

                        <span>
                            6 business modules
                        </span>

                    </span>


                    <span class="badge-pill">

                        <span class="badge-dot"></span>

                        <span>
                            30-day full access
                        </span>

                    </span>


                    <span class="badge-pill">

                        <span class="badge-dot"></span>

                        <span>
                            3 modules free after trial
                        </span>

                    </span>


                    <span class="badge-pill">

                        <span class="badge-dot"></span>

                        <span>
                            JK&amp;C support built in
                        </span>

                    </span>


                </div>

            </div>

        </div>


        {{-- =========================================================
             FEATURE CARDS
        ========================================================== --}}

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


            {{-- =================================================
                 FORM HEADER
            ================================================== --}}

            <span class="form-tag">
                Create your ORDO account
            </span>


            <h1 class="form-title">
                Tell us about you
            </h1>


            <p class="form-subtitle">
                This creates your personal ORDO identity.
                We’ll ask about the account you’re creating
                in the next step.
            </p>


            {{-- =================================================
                 PROGRESS
            ================================================== --}}

            <div
                class="registration-progress"
                aria-label="Registration progress: Step 3 of 6"
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
                    aria-hidden="true"
                ></span>


                {{-- STEP 5 --}}

                <span
                    class="progress-segment"
                    aria-hidden="true"
                ></span>


                {{-- STEP 6 --}}

                <span
                    class="progress-segment"
                    aria-hidden="true"
                ></span>

            </div>


            {{-- =================================================
                 SUCCESS MESSAGE
            ================================================== --}}

            @if (session('success'))

                <div
                    class="alert alert-success"
                    role="status"
                >

                    <span
                        class="alert-icon"
                        aria-hidden="true"
                    >
                        ✓
                    </span>


                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            {{-- =================================================
                 ERROR MESSAGE
            ================================================== --}}

            @if ($errors->any())

                <div
                    class="alert alert-error"
                    role="alert"
                >

                    <span
                        class="alert-icon"
                        aria-hidden="true"
                    >
                        !
                    </span>


                    <div>

                        <strong>
                            Please check the following:
                        </strong>


                        <ul>

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            @endif


            {{-- =================================================
                 PROFILE FORM
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('profile.update') }}"
                class="registration-form"
                id="profileForm"
            >

                @csrf


                <div class="form-grid">


                    {{-- =================================================
                         FIRST NAME
                    ================================================== --}}

                    <div class="form-group">

                        <label
                            for="first_name"
                            class="form-label"
                        >

                            First name

                            <span class="required">
                                *
                            </span>

                        </label>


                        <div class="input-wrapper has-icon">

                            <span
                                class="field-icon"
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

                                    <circle
                                        cx="12"
                                        cy="8"
                                        r="3.5"
                                    ></circle>

                                    <path
                                        d="M5 20c.8-3.3 3.1-5 7-5s6.2 1.7 7 5"
                                    ></path>

                                </svg>

                            </span>


                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                class="form-input @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name') }}"
                                placeholder="Enter your first name"
                                autocomplete="given-name"
                                maxlength="100"
                                required
                            >

                        </div>


                        @error('first_name')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- =================================================
                         MIDDLE NAME
                    ================================================== --}}

                    <div class="form-group">

                        <label
                            for="middle_name"
                            class="form-label"
                        >
                            Middle name
                        </label>


                        <div class="input-wrapper has-icon">

                            <span
                                class="field-icon"
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

                                    <circle
                                        cx="12"
                                        cy="8"
                                        r="3.5"
                                    ></circle>

                                    <path
                                        d="M5 20c.8-3.3 3.1-5 7-5s6.2 1.7 7 5"
                                    ></path>

                                </svg>

                            </span>


                            <input
                                type="text"
                                id="middle_name"
                                name="middle_name"
                                class="form-input @error('middle_name') is-invalid @enderror"
                                value="{{ old('middle_name') }}"
                                placeholder="Enter your middle name"
                                autocomplete="additional-name"
                                maxlength="100"
                            >

                        </div>


                        @error('middle_name')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- =================================================
                         LAST NAME
                    ================================================== --}}

                    <div class="form-group">

                        <label
                            for="last_name"
                            class="form-label"
                        >

                            Last name

                            <span class="required">
                                *
                            </span>

                        </label>


                        <div class="input-wrapper has-icon">

                            <span
                                class="field-icon"
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

                                    <circle
                                        cx="12"
                                        cy="8"
                                        r="3.5"
                                    ></circle>

                                    <path
                                        d="M5 20c.8-3.3 3.1-5 7-5s6.2 1.7 7 5"
                                    ></path>

                                </svg>

                            </span>


                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                class="form-input @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name') }}"
                                placeholder="Enter your last name"
                                autocomplete="family-name"
                                maxlength="100"
                                required
                            >

                        </div>


                        @error('last_name')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- =================================================
                         SUFFIX
                    ================================================== --}}

                    <div class="form-group">

                        <label
                            for="suffix"
                            class="form-label"
                        >
                            Suffix
                        </label>


                        <div class="select-wrapper has-icon">

                            <span
                                class="field-icon"
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

                                    <path d="M6 4v16"></path>

                                    <path
                                        d="M6 4h7a4 4 0 0 1 0 8H6"
                                    ></path>

                                </svg>

                            </span>


                            <select
                                id="suffix"
                                name="suffix"
                                class="form-select @error('suffix') is-invalid @enderror"
                            >

                                <option value="">
                                    Optional
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

                        </div>


                        @error('suffix')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- =================================================
                         DATE OF BIRTH
                    ================================================== --}}

                    <div class="form-group">

                        <label
                            for="date_of_birth"
                            class="form-label"
                        >

                            Date of birth

                            <span class="required">
                                *
                            </span>

                        </label>


                        <div class="input-wrapper has-icon">

                            <span
                                class="field-icon"
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
                                        x="3"
                                        y="5"
                                        width="18"
                                        height="16"
                                        rx="2"
                                    ></rect>

                                    <path d="M16 3v4"></path>

                                    <path d="M8 3v4"></path>

                                    <path d="M3 10h18"></path>

                                </svg>

                            </span>


                            <input
                                type="date"
                                id="date_of_birth"
                                name="date_of_birth"
                                class="form-input @error('date_of_birth') is-invalid @enderror"
                                value="{{ old('date_of_birth') }}"
                                autocomplete="bday"
                                required
                            >

                        </div>


                        @error('date_of_birth')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- =================================================
                         GENDER
                    ================================================== --}}

                    <div class="form-group">

                        <label
                            for="gender"
                            class="form-label"
                        >
                            Gender
                        </label>


                        <div class="select-wrapper has-icon">

                            <span
                                class="field-icon"
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

                                    <circle
                                        cx="9"
                                        cy="8"
                                        r="3"
                                    ></circle>

                                    <path
                                        d="M3.5 20c.7-3.1 2.5-4.7 5.5-4.7s4.8 1.6 5.5 4.7"
                                    ></path>

                                    <path d="M16 5h4"></path>

                                    <path d="M18 3v4"></path>

                                </svg>

                            </span>


                            <select
                                id="gender"
                                name="gender"
                                class="form-select @error('gender') is-invalid @enderror"
                            >

                                <option
                                    value=""
                                    {{ old('gender', '') === '' ? 'selected' : '' }}
                                >
                                    Prefer not to say
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
                                    value="other"
                                    {{ old('gender') === 'other' ? 'selected' : '' }}
                                >
                                    Other
                                </option>

                            </select>

                        </div>


                        @error('gender')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- =================================================
                         COUNTRY / REGION
                    ================================================== --}}

                    <div class="form-group form-group-full">

                        <label
                            for="country"
                            class="form-label"
                        >

                            Country / Region

                            <span class="required">
                                *
                            </span>

                        </label>


                        <div class="select-wrapper has-icon">

                            <span
                                class="field-icon"
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

                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="9"
                                    ></circle>

                                    <path d="M3 12h18"></path>

                                    <path
                                        d="M12 3c2.4 2.5 3.6 5.5 3.6 9s-1.2 6.5-3.6 9"
                                    ></path>

                                    <path
                                        d="M12 3c-2.4 2.5-3.6 5.5-3.6 9s1.2 6.5 3.6 9"
                                    ></path>

                                </svg>

                            </span>


                            <select
                                id="country"
                                name="country"
                                class="form-select @error('country') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    Select country / region
                                </option>


                                <option
                                    value="Philippines"
                                    {{ old('country', 'Philippines') === 'Philippines' ? 'selected' : '' }}
                                >
                                    Philippines
                                </option>


                                <option
                                    value="Australia"
                                    {{ old('country') === 'Australia' ? 'selected' : '' }}
                                >
                                    Australia
                                </option>


                                <option
                                    value="New Zealand"
                                    {{ old('country') === 'New Zealand' ? 'selected' : '' }}
                                >
                                    New Zealand
                                </option>


                                <option
                                    value="Singapore"
                                    {{ old('country') === 'Singapore' ? 'selected' : '' }}
                                >
                                    Singapore
                                </option>

                            </select>

                        </div>


                        @error('country')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                </div>


                {{-- =================================================
                     ACTIONS
                ================================================== --}}

                <div class="registration-actions">


                    {{-- BACK --}}

                    <a
                        href="{{ url('/register/information') }}"
                        class="back-button"
                    >

                        <span
                            class="button-icon"
                            aria-hidden="true"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path d="M19 12H5"></path>

                                <path d="m12 19-7-7 7-7"></path>

                            </svg>

                        </span>


                        <span>
                            Back
                        </span>

                    </a>


                    {{-- CONTINUE --}}

                    <button
                        type="submit"
                        class="continue-button"
                        id="continueButton"
                    >

                        <span>
                            Continue
                        </span>


                        <span
                            class="button-arrow"
                            aria-hidden="true"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path d="M5 12h14"></path>

                                <path d="m13 6 6 6-6 6"></path>

                            </svg>

                        </span>

                    </button>


                </div>


            </form>


        </div>

    </main>

</div>


{{-- =========================================================
     SUBMIT LOADING STATE
========================================================== --}}

<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            const form =
                document.getElementById('profileForm');

            const button =
                document.getElementById('continueButton');


            if (!form || !button) {

                return;
            }


            form.addEventListener(
                'submit',
                function () {

                    if (button.disabled) {

                        return;
                    }


                    /*
                     * Let the browser perform its normal
                     * HTML5 required-field validation first.
                     */

                    if (!form.checkValidity()) {

                        return;
                    }


                    button.disabled = true;


                    button.innerHTML = `

                        <span>
                            Continuing...
                        </span>

                        <span
                            class="button-arrow"
                            aria-hidden="true"
                        >

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path d="M5 12h14"></path>

                                <path d="m13 6 6 6-6 6"></path>

                            </svg>

                        </span>

                    `;

                }
            );

        }
    );

</script>


</body>

</html>