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

    <meta
        name="description"
        content="Your ORDO account registration is complete."
    >

    <title>Account Ready — ORDO</title>


    <style>

        /* =========================================================
           ORDO — REGISTRATION CONFIRMATION
           STEP 7 OF 7
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
            --success-dark: #15803d;
            --success-soft: #f0fdf4;
            --success-border: #bbf7d0;

            --danger: #dc2626;
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

            overflow-x: hidden;
        }


        button,
        input,
        select,
        textarea,
        a {
            font: inherit;
            -webkit-tap-highlight-color: transparent;
        }


        button {
            appearance: none;
        }


        /* =========================================================
           MAIN WRAPPER
        ========================================================== */

        .registration-wrapper {
            width: 100%;
            min-height: 100vh;

            display: flex;

            background: var(--white);

            overflow: hidden;
        }


        /* =========================================================
           LEFT PANEL
        ========================================================== */

        .left-panel {
            position: fixed;

            top: 0;
            left: 0;

            width: 50%;
            height: 100vh;

            display: flex;
            flex-direction: column;

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


        /* =========================================================
           LEFT CONTENT
        ========================================================== */

        .left-content {
            position: relative;
            z-index: 2;

            flex: 1;

            min-height: 0;

            display: flex;
            flex-direction: column;
        }


        /* =========================================================
           BRAND
        ========================================================== */

        .brand-header {
            display: flex;
            align-items: center;

            gap: 12px;

            flex-shrink: 0;
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
            width: 100%;
            max-width: 570px;

            margin: auto 0;

            padding:
                34px 0
                30px;
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
                clamp(
                    35px,
                    3.1vw,
                    45px
                );

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
           BADGES
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
            position: relative;
            z-index: 2;

            width: 100%;

            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 10px;

            flex-shrink: 0;
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
            height: 100vh;

            margin-left: 50%;

            display: flex;
            align-items: flex-start;
            justify-content: center;

            padding:
                42px
                52px
                55px;

            background: var(--white);

            overflow-y: auto;
            overflow-x: hidden;

            scrollbar-width: thin;

            scrollbar-color:
                var(--slate-300)
                transparent;
        }


        .right-panel::-webkit-scrollbar {
            width: 7px;
        }


        .right-panel::-webkit-scrollbar-track {
            background: transparent;
        }


        .right-panel::-webkit-scrollbar-thumb {
            border-radius: 999px;

            background:
                var(--slate-300);
        }


        /* =========================================================
           CONFIRMATION CONTAINER
        ========================================================== */

        .confirmation-container {
            width: 100%;
            max-width: 500px;

            margin: 0 auto;

            padding-bottom: 20px;
        }


        /* =========================================================
           PAGE HEADER
        ========================================================== */

        .form-title {
            margin-bottom: 8px;

            color:
                var(--slate-950);

            font-size: 29px;
            font-weight: 800;

            line-height: 1.14;

            letter-spacing: -0.75px;
        }


        .form-subtitle {
            max-width: 460px;

            margin-bottom: 26px;

            color:
                var(--slate-500);

            font-size: 12.8px;
            font-weight: 400;

            line-height: 1.55;
        }


        /* =========================================================
           PROGRESS
        ========================================================== */

        .registration-progress {
            width: 100%;

            display: grid;

            grid-template-columns:
                repeat(7, minmax(0, 1fr));

            gap: 7px;

            margin-bottom: 30px;
        }


        .progress-segment {
            width: 100%;
            height: 5px;

            display: block;

            border-radius: 999px;

            background:
                var(--slate-200);
        }


        .progress-segment.completed {
            background:
                var(--ordo-blue);

            box-shadow:
                0 0 0 1px
                rgba(37, 99, 235, 0.03);
        }


        /* =========================================================
           ERROR DISPLAY
        ========================================================== */

        .error-message {
            width: 100%;

            margin-bottom: 18px;

            padding:
                13px
                15px;

            border:
                1px solid
                var(--danger-border);

            border-radius:
                var(--radius-md);

            background:
                var(--danger-soft);

            color:
                #991b1b;

            font-size: 12px;

            line-height: 1.5;
        }


        .error-message strong {
            display: block;

            margin-bottom: 6px;

            font-weight: 700;
        }


        .error-message-list {
            display: flex;
            flex-direction: column;

            gap: 2px;
        }


        /* =========================================================
           CONFIRMATION CARD
        ========================================================== */

        .confirmation-card {
            width: 100%;

            padding:
                30px
                26px
                27px;

            border:
                1px solid
                var(--slate-300);

            border-radius:
                var(--radius-lg);

            background:
                var(--white);

            box-shadow:
                0 2px 6px
                rgba(15, 23, 42, 0.025);
        }


        /* =========================================================
           SUCCESS
        ========================================================== */

        .success-header {
            display: flex;
            align-items: flex-start;

            gap: 18px;
        }


        .success-icon {
            width: 54px;
            height: 54px;

            flex:
                0 0 54px;

            display: flex;
            align-items: center;
            justify-content: center;

            border:
                1px solid
                var(--success-border);

            border-radius: 50%;

            background:
                var(--success-soft);

            color:
                var(--success);

            box-shadow:
                0 2px 6px
                rgba(22, 163, 74, 0.06);
        }


        .success-icon svg {
            width: 27px;
            height: 27px;
        }


        .success-label {
            margin-bottom: 6px;

            color:
                var(--slate-600);

            font-size: 10px;
            font-weight: 700;

            letter-spacing: 0.095em;

            line-height: 1.2;

            text-transform: uppercase;
        }


        .success-title {
            margin-bottom: 7px;

            color:
                var(--slate-950);

            font-size: 21px;
            font-weight: 800;

            line-height: 1.2;

            letter-spacing: -0.45px;
        }


        .success-description {
            max-width: 385px;

            color:
                var(--slate-500);

            font-size: 12.3px;

            line-height: 1.6;
        }


        /* =========================================================
           DIVIDER
        ========================================================== */

        .confirmation-divider {
            width: 100%;
            height: 1px;

            margin:
                24px 0;

            background:
                var(--slate-200);
        }


        /* =========================================================
           SECTION
        ========================================================== */

        .section-label {
            margin-bottom: 8px;

            color:
                var(--ordo-blue);

            font-size: 10px;
            font-weight: 700;

            letter-spacing: 0.095em;

            line-height: 1.2;

            text-transform: uppercase;
        }


        .section-title {
            margin-bottom: 16px;

            color:
                var(--slate-950);

            font-size: 15px;
            font-weight: 700;

            line-height: 1.3;
        }


        /* =========================================================
           COMPLETION GRID
        ========================================================== */

        .completion-grid {
            width: 100%;

            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 10px;
        }


        .completion-item {
            min-width: 0;
            min-height: 58px;

            display: flex;
            align-items: center;

            gap: 11px;

            padding:
                11px
                12px;

            border:
                1px solid
                var(--slate-200);

            border-radius:
                var(--radius-md);

            background:
                var(--white);

            transition:
                border-color var(--transition),
                background-color var(--transition),
                transform var(--transition);
        }


        .completion-item:hover {
            border-color:
                var(--slate-300);

            background:
                var(--slate-50);

            transform:
                translateY(-1px);
        }


        .completion-check {
            width: 24px;
            height: 24px;

            flex:
                0 0 24px;

            display: flex;
            align-items: center;
            justify-content: center;

            border:
                1px solid
                var(--success-border);

            border-radius: 50%;

            background:
                var(--success-soft);

            color:
                var(--success);

            font-size: 13px;
            font-weight: 700;

            line-height: 1;
        }


        .completion-content {
            min-width: 0;
        }


        .completion-title {
            margin-bottom: 2px;

            color:
                var(--slate-800);

            font-size: 11.7px;
            font-weight: 700;

            line-height: 1.3;
        }


        .completion-description {
            color:
                var(--slate-400);

            font-size: 9.8px;
            font-weight: 400;

            line-height: 1.35;
        }


        /* =========================================================
           NEXT STEP
        ========================================================== */

        .next-step {
            width: 100%;

            display: flex;
            align-items: flex-start;

            gap: 11px;

            margin-top: 23px;

            padding:
                14px
                15px;

            border:
                1px solid
                #dbeafe;

            border-radius:
                var(--radius-md);

            background:
                #f8fbff;
        }


        .next-step-icon {
            width: 27px;
            height: 27px;

            flex:
                0 0 27px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 7px;

            background:
                var(--ordo-blue-soft);

            color:
                var(--ordo-blue);
        }


        .next-step-icon svg {
            width: 15px;
            height: 15px;
        }


        .next-step-content {
            min-width: 0;
        }


        .next-step-title {
            margin-bottom: 3px;

            color:
                var(--slate-800);

            font-size: 11.5px;
            font-weight: 700;

            line-height: 1.3;
        }


        .next-step-text {
            color:
                var(--slate-500);

            font-size: 10.5px;

            line-height: 1.5;
        }


        /* =========================================================
           ACTIONS
        ========================================================== */

        .confirmation-actions {
            width: 100%;

            display: flex;
            align-items: center;
            justify-content: flex-end;

            gap: 10px;

            margin-top: 22px;
        }


        .confirmation-form {
            width: auto;
            margin: 0;
        }


        .continue-button {
            min-width: 165px;
            min-height: 44px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            padding:
                0
                18px;

            border:
                1px solid
                var(--ordo-blue);

            border-radius:
                var(--radius-md);

            background:
                var(--ordo-blue);

            color:
                var(--white);

            font-size: 12.8px;
            font-weight: 700;

            text-decoration: none;

            box-shadow:
                var(--shadow-button);

            cursor: pointer;

            transition:
                background-color var(--transition),
                border-color var(--transition),
                box-shadow var(--transition),
                transform var(--transition);
        }


        .continue-button:hover:not(:disabled) {
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


        .continue-button:active:not(:disabled) {
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
            opacity: 0.7;

            cursor: wait;

            transform: none;

            box-shadow: none;
        }


        .button-arrow {
            width: 15px;
            height: 15px;

            display: inline-flex;

            align-items: center;
            justify-content: center;
        }


        .button-arrow svg {
            width: 15px;
            height: 15px;
        }


        /* =========================================================
           BUTTON LOADING STATE
        ========================================================== */

        .button-spinner {
            width: 14px;
            height: 14px;

            display: none;

            border:
                2px solid
                rgba(255, 255, 255, 0.35);

            border-top-color:
                var(--white);

            border-radius: 50%;

            animation:
                button-spin 700ms linear infinite;
        }


        .continue-button.is-loading .button-spinner {
            display: inline-block;
        }


        .continue-button.is-loading .button-arrow {
            display: none;
        }


        @keyframes button-spin {

            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }

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


            .confirmation-card {
                padding:
                    27px
                    23px;
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


            .confirmation-container {
                max-width: 450px;
            }


            .success-title {
                font-size: 19px;
            }


            .completion-grid {
                gap: 8px;
            }

        }


        /* =========================================================
           TABLET
        ========================================================== */

        @media (max-width: 900px) {

            body {
                overflow-x: hidden;
                overflow-y: auto;
            }


            .registration-wrapper {
                display: block;

                height: auto;

                overflow: visible;
            }


            .left-panel {
                position: relative;

                width: 100%;
                height: auto;
                min-height: 590px;

                padding:
                    40px
                    42px
                    35px;
            }


            .left-content {
                min-height: 0;
            }


            .hero-section {
                margin:
                    40px 0 30px;

                padding: 0;
            }


            .feature-cards {
                margin-top: auto;
            }


            .right-panel {
                width: 100%;
                height: auto;

                margin-left: 0;

                min-height: 100vh;

                padding:
                    45px
                    32px
                    55px;

                overflow: visible;
            }


            .confirmation-container {
                max-width: 700px;
            }

        }


        /* =========================================================
           MOBILE
        ========================================================== */

        @media (max-width: 600px) {

            .left-panel {
                min-height: auto;

                padding:
                    34px
                    22px
                    30px;
            }


            .hero-section {
                margin:
                    38px 0 34px;
            }


            .hero-title {
                font-size: 34px;
            }


            .hero-description {
                font-size: 12.5px;
            }


            .pill-badges {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));

                gap: 7px;
            }


            .badge-pill {
                height: 34px;

                font-size: 9px;

                padding:
                    0 9px;
            }


            .feature-cards {
                grid-template-columns:
                    1fr;

                gap: 8px;
            }


            .feature-card {
                padding:
                    14px;
            }


            .right-panel {
                min-height: 100vh;

                padding:
                    34px
                    22px
                    42px;

                align-items:
                    flex-start;
            }


            .confirmation-container {
                max-width: 100%;
            }


            .form-title {
                font-size: 27px;
            }


            .form-subtitle {
                margin-bottom: 22px;

                font-size: 12.3px;
            }


            .registration-progress {
                gap: 5px;

                margin-bottom: 23px;
            }


            .confirmation-card {
                padding:
                    23px
                    18px
                    20px;
            }


            .success-header {
                gap: 13px;
            }


            .success-icon {
                width: 47px;
                height: 47px;

                flex-basis: 47px;
            }


            .success-icon svg {
                width: 23px;
                height: 23px;
            }


            .success-title {
                font-size: 18px;
            }


            .success-description {
                font-size: 11.7px;
            }


            .completion-grid {
                grid-template-columns:
                    1fr;

                gap: 8px;
            }


            .confirmation-actions {
                flex-direction:
                    column;

                align-items:
                    stretch;
            }


            .confirmation-form {
                width: 100%;
            }


            .continue-button {
                width: 100%;
            }

        }


        /* =========================================================
           SMALL MOBILE
        ========================================================== */

        @media (max-width: 420px) {

            .left-panel {
                padding-left: 18px;
                padding-right: 18px;
            }


            .brand-logo {
                width: 40px;
                height: 40px;

                flex-basis: 40px;
            }


            .brand-name {
                font-size: 20px;
            }


            .hero-title {
                font-size: 30px;

                letter-spacing: -0.9px;
            }


            .hero-description {
                font-size: 12px;
            }


            .pill-badges {
                grid-template-columns:
                    1fr;
            }


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


            .success-header {
                flex-direction: column;
            }


            .success-icon {
                width: 45px;
                height: 45px;

                flex-basis: 45px;
            }

        }


        /* =========================================================
           VERY SMALL
        ========================================================== */

        @media (max-width: 340px) {

            .left-panel {
                padding-left: 15px;
                padding-right: 15px;
            }


            .right-panel {
                padding-left: 15px;
                padding-right: 15px;
            }


            .hero-title {
                font-size: 27px;
            }


            .confirmation-card {
                padding:
                    20px
                    15px;
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
                     BADGES
                ================================================== --}}

                <div class="pill-badges">


                    <span class="badge-pill">

                        <span
                            class="badge-dot"
                            aria-hidden="true"
                        ></span>

                        <span>
                            6 business modules
                        </span>

                    </span>


                    <span class="badge-pill">

                        <span
                            class="badge-dot"
                            aria-hidden="true"
                        ></span>

                        <span>
                            30-day full access
                        </span>

                    </span>


                    <span class="badge-pill">

                        <span
                            class="badge-dot"
                            aria-hidden="true"
                        ></span>

                        <span>
                            3 modules free after trial
                        </span>

                    </span>


                    <span class="badge-pill">

                        <span
                            class="badge-dot"
                            aria-hidden="true"
                        ></span>

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


        <div class="confirmation-container">


            {{-- =================================================
                 PAGE HEADER
            ================================================== --}}

            <h1 class="form-title">
                Account Ready
            </h1>


            <p class="form-subtitle">
                Your ORDO account setup is complete.
                Review your registration and enter ORDO when you're ready.
            </p>


            {{-- =================================================
                 PROGRESS
            ================================================== --}}

            <div
                class="registration-progress"
                aria-label="Registration progress: Step 7 of 7"
            >

                <span
                    class="progress-segment completed"
                    aria-hidden="true"
                ></span>

                <span
                    class="progress-segment completed"
                    aria-hidden="true"
                ></span>

                <span
                    class="progress-segment completed"
                    aria-hidden="true"
                ></span>

                <span
                    class="progress-segment completed"
                    aria-hidden="true"
                ></span>

                <span
                    class="progress-segment completed"
                    aria-hidden="true"
                ></span>

                <span
                    class="progress-segment completed"
                    aria-hidden="true"
                ></span>

                <span
                    class="progress-segment completed"
                    aria-hidden="true"
                ></span>

            </div>


            {{-- =================================================
                 LARAVEL VALIDATION ERRORS
            ================================================== --}}

            @if ($errors->any())

                <div
                    class="error-message"
                    role="alert"
                    aria-live="assertive"
                >

                    <strong>
                        We couldn't complete your registration.
                    </strong>


                    <div class="error-message-list">

                        @foreach ($errors->all() as $error)

                            <div>
                                {{ $error }}
                            </div>

                        @endforeach

                    </div>

                </div>

            @endif


            {{-- =================================================
                 CONFIRMATION CARD
            ================================================== --}}

            <section
                class="confirmation-card"
                aria-labelledby="confirmation-title"
            >


                {{-- =================================================
                     SUCCESS HEADER
                ================================================== --}}

                <div class="success-header">


                    <div
                        class="success-icon"
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

                            <path d="m5 12 4 4L19 6"></path>

                        </svg>

                    </div>


                    <div>

                        <div class="success-label">
                            Registration complete
                        </div>


                        <h2
                            id="confirmation-title"
                            class="success-title"
                        >
                            Your ORDO account is ready
                        </h2>


                        <p class="success-description">
                            All registration steps have been completed.
                            Your information is ready to be saved and
                            your ORDO workspace can now be opened.
                        </p>

                    </div>

                </div>


                {{-- =================================================
                     DIVIDER
                ================================================== --}}

                <div
                    class="confirmation-divider"
                    aria-hidden="true"
                ></div>


                {{-- =================================================
                     COMPLETION SECTION
                ================================================== --}}

                <div class="section-label">
                    Registration complete
                </div>


                <h3 class="section-title">
                    Everything is complete
                </h3>


                {{-- =================================================
                     COMPLETION GRID
                ================================================== --}}

                <div class="completion-grid">


                    {{-- ABOUT YOU --}}

                    <div class="completion-item">

                        <div
                            class="completion-check"
                            aria-hidden="true"
                        >
                            ✓
                        </div>


                        <div class="completion-content">

                            <div class="completion-title">
                                About you
                            </div>


                            <div class="completion-description">
                                Personal information completed
                            </div>

                        </div>

                    </div>


                    {{-- ACCOUNT TYPE --}}

                    <div class="completion-item">

                        <div
                            class="completion-check"
                            aria-hidden="true"
                        >
                            ✓
                        </div>


                        <div class="completion-content">

                            <div class="completion-title">
                                Account type
                            </div>


                            <div class="completion-description">
                                Account structure selected
                            </div>

                        </div>

                    </div>


                    {{-- INFORMATION --}}

                    <div class="completion-item">

                        <div
                            class="completion-check"
                            aria-hidden="true"
                        >
                            ✓
                        </div>


                        <div class="completion-content">

                            <div class="completion-title">
                                Information
                            </div>


                            <div class="completion-description">
                                Account information completed
                            </div>

                        </div>

                    </div>


                    {{-- CONTACT --}}

                    <div class="completion-item">

                        <div
                            class="completion-check"
                            aria-hidden="true"
                        >
                            ✓
                        </div>


                        <div class="completion-content">

                            <div class="completion-title">
                                Contact
                            </div>


                            <div class="completion-description">
                                Contact information provided
                            </div>

                        </div>

                    </div>


                    {{-- VERIFICATION --}}

                    <div class="completion-item">

                        <div
                            class="completion-check"
                            aria-hidden="true"
                        >
                            ✓
                        </div>


                        <div class="completion-content">

                            <div class="completion-title">
                                Verification
                            </div>


                            <div class="completion-description">
                                Contact verification completed
                            </div>

                        </div>

                    </div>


                    {{-- PASSWORD --}}

                    <div class="completion-item">

                        <div
                            class="completion-check"
                            aria-hidden="true"
                        >
                            ✓
                        </div>


                        <div class="completion-content">

                            <div class="completion-title">
                                Password
                            </div>


                            <div class="completion-description">
                                Account security completed
                            </div>

                        </div>

                    </div>


                </div>


                {{-- =================================================
                     NEXT STEP
                ================================================== --}}

                <div class="next-step">


                    <div
                        class="next-step-icon"
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

                            <path d="M12 5v14"></path>

                            <path d="m7 14 5 5 5-5"></path>

                            <path d="M5 5h14"></path>

                        </svg>

                    </div>


                    <div class="next-step-content">

                        <div class="next-step-title">
                            What's next?
                        </div>


                        <p class="next-step-text">
                            Click Continue to ORDO to create your account
                            records, establish your account access, and
                            open your ORDO Town Hall.
                        </p>

                    </div>

                </div>


                {{-- =================================================
                     CONTINUE TO ORDO
                     
                     IMPORTANT:
                     This remains POST and uses the Laravel route:
                     confirmation.submit
                ================================================== --}}

                <div class="confirmation-actions">


                    <form
                        method="POST"
                        action="{{ route('confirmation.submit') }}"
                        class="confirmation-form"
                        id="confirmationForm"
                    >

                        @csrf


                        <button
                            type="submit"
                            class="continue-button"
                            id="continueButton"
                            aria-label="Continue to ORDO Town Hall"
                        >

                            <span
                                class="button-spinner"
                                aria-hidden="true"
                            ></span>


                            <span class="button-text">
                                Continue to ORDO
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


                    </form>


                </div>


            </section>


        </div>


    </main>


</div>


<script>

    /*
    |--------------------------------------------------------------------------
    | ORDO Confirmation Submit Protection
    |--------------------------------------------------------------------------
    |
    | Prevents accidental double submissions.
    |
    */

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            const form =
                document.getElementById(
                    'confirmationForm'
                );

            const button =
                document.getElementById(
                    'continueButton'
                );

            if (!form || !button) {
                return;
            }


            let submitted = false;


            form.addEventListener(
                'submit',
                function () {

                    if (submitted) {

                        return;

                    }


                    submitted = true;


                    button.disabled = true;


                    button.classList.add(
                        'is-loading'
                    );


                    button.setAttribute(
                        'aria-busy',
                        'true'
                    );


                    const buttonText =
                        button.querySelector(
                            '.button-text'
                        );


                    if (buttonText) {

                        buttonText.textContent =
                            'Opening ORDO...';

                    }

                }
            );

        }
    );

</script>


</body>

</html>