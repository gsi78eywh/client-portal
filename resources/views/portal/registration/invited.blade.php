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

    <title>Join Existing Account — ORDO</title>

    <style>

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
            min-height: 100%;
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;

            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: #ffffff;
            color: #06172f;

            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        button,
        input {
            font: inherit;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        button {
            cursor: pointer;
        }


        /* =========================================================
           PAGE
        ========================================================== */

        .registration-page {
            min-height: 100vh;

            display: flex;

            background: #ffffff;
        }


        /* =========================================================
           LEFT BRAND PANEL
        ========================================================== */

        .brand-panel {
            position: relative;

            width: 50%;
            min-height: 100vh;

            overflow: hidden;

            background:
                linear-gradient(
                    145deg,
                    #071a36 0%,
                    #06172f 48%,
                    #041329 100%
                );

            color: #ffffff;
        }

        .brand-panel::before {
            content: "";

            position: absolute;

            width: 390px;
            height: 390px;

            top: -160px;
            right: -125px;

            border-radius: 50%;

            background:
                rgba(37, 99, 235, .12);

            pointer-events: none;
        }

        .brand-panel::after {
            content: "";

            position: absolute;

            width: 250px;
            height: 250px;

            bottom: -130px;
            left: -110px;

            border-radius: 50%;

            background:
                rgba(37, 99, 235, .07);

            pointer-events: none;
        }

        .brand-content {
            position: relative;
            z-index: 2;

            width: 100%;
            min-height: 100vh;

            padding:
                46px
                52px
                42px;

            display: flex;
            flex-direction: column;
        }


        /* =========================================================
           BRAND
        ========================================================== */

        .brand {
            display: inline-flex;

            align-items: center;

            gap: 11px;

            width: fit-content;

            color: #ffffff;

            text-decoration: none;
        }

        .brand-mark {
            width: 44px;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background: #2563eb;

            color: #ffffff;

            font-size: 13px;
            font-weight: 900;

            box-shadow:
                0 8px 20px
                rgba(37, 99, 235, .22);
        }

        .brand-name-wrap {
            display: flex;
            flex-direction: column;

            gap: 1px;
        }

        .brand-name {
            color: #ffffff;

            font-family:
                Georgia,
                "Times New Roman",
                serif;

            font-size: 20px;
            line-height: 1;

            font-weight: 900;

            letter-spacing: -.02em;
        }

        .brand-subtitle {
            color: #ffffff;

            font-size: 6.5px;
            line-height: 1.2;

            font-weight: 700;

            opacity: .9;
        }


        /* =========================================================
           BRAND INTRO
        ========================================================== */

        .brand-intro {
            margin-top: 54px;

            max-width: 590px;
        }

        .brand-eyebrow {
            display: flex;
            align-items: center;

            gap: 7px;

            margin-bottom: 27px;

            color: #3b82f6;

            font-size: 10px;
            font-weight: 900;

            letter-spacing: .14em;

            text-transform: uppercase;
        }

        .brand-eyebrow::before {
            content: "";

            width: 8px;
            height: 8px;

            flex: 0 0 8px;

            border-radius: 50%;

            background: #3478f6;

            box-shadow:
                0 0 0 3px
                rgba(52, 120, 246, .08);
        }

        .brand-intro h1 {
            max-width: 600px;

            color: #ffffff;

            font-size:
                clamp(
                    42px,
                    4.2vw,
                    59px
                );

            line-height: .89;

            letter-spacing: -.055em;

            font-weight: 900;
        }

        .brand-description {
            max-width: 570px;

            margin-top: 25px;

            color: #b8c7db;

            font-size: 12px;
            line-height: 1.75;
        }


        /* =========================================================
           FEATURE PILLS
        ========================================================== */

        .feature-pills {
            display: flex;

            flex-wrap: wrap;

            gap: 9px;

            margin-top: 27px;
        }

        .feature-pill {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            min-height: 34px;

            padding:
                0
                12px;

            border:
                1px solid
                rgba(105, 143, 193, .25);

            border-radius: 999px;

            background:
                rgba(255, 255, 255, .025);

            color: #e1eaf6;

            font-size: 8.5px;
            font-weight: 800;
        }

        .feature-dot {
            width: 7px;
            height: 7px;

            flex: 0 0 7px;

            border-radius: 50%;

            background: #3478f6;

            box-shadow:
                0 0 0 2px
                rgba(52, 120, 246, .08);
        }


        /* =========================================================
           FEATURE CARDS
        ========================================================== */

        .feature-cards {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 10px;

            margin-top: auto;

            padding-top: 45px;
        }

        .feature-card {
            min-height: 102px;

            padding: 16px;

            border:
                1px solid
                rgba(103, 139, 183, .22);

            border-radius: 11px;

            background:
                rgba(255, 255, 255, .025);
        }

        .feature-icon {
            width: 27px;
            height: 27px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin-bottom: 12px;

            border:
                1px solid
                rgba(52, 120, 246, .45);

            border-radius: 7px;

            color: #3b82f6;
        }

        .feature-icon svg {
            width: 14px;
            height: 14px;
        }

        .feature-card strong {
            display: block;

            margin-bottom: 4px;

            color: #ffffff;

            font-size: 9px;
            font-weight: 850;
        }

        .feature-card p {
            color: #91a6c1;

            font-size: 7.5px;
            line-height: 1.45;
        }


        /* =========================================================
           LEFT PANEL FOOTER
        ========================================================== */

        .brand-footer {
            margin-top: 25px;

            color: #6f86a3;

            font-size: 7.5px;
            line-height: 1.5;
        }


        /* =========================================================
           RIGHT PANEL
        ========================================================== */

        .form-panel {
            width: 50%;
            min-height: 100vh;

            overflow-y: auto;

            background: #ffffff;
        }

        .form-panel-inner {
            width: 100%;
            max-width: 700px;

            margin: 0 auto;

            padding:
                38px
                52px
                42px;
        }


        /* =========================================================
           TOP BAR
        ========================================================== */

        .registration-topbar {
            display: flex;

            align-items: center;
            justify-content: flex-end;

            width: 100%;

            margin-bottom: 28px;
        }

        .signin-text {
            color: #8a96a8;

            font-size: 9px;
            line-height: 1.4;
        }

        .signin-text a {
            margin-left: 3px;

            color: #2563eb;

            font-weight: 850;

            text-decoration: none;
        }

        .signin-text a:hover {
            text-decoration: underline;
        }

        .signin-text a:focus-visible {
            outline: 2px solid #3478f6;
            outline-offset: 3px;
            border-radius: 3px;
        }


        /* =========================================================
           PROGRESS BAR
        ========================================================== */

        .registration-progress {
            display: flex;

            align-items: center;

            width: 100%;

            gap: 7px;

            margin-bottom: 31px;
        }

        .progress-segment {
            flex: 1;

            height: 4px;

            border-radius: 999px;

            background: #e3e8ef;
        }

        .progress-segment.completed,
        .progress-segment.active {
            background: #3478f6;
        }


        /* =========================================================
           HEADER
        ========================================================== */

        .registration-header {
            margin-bottom: 28px;
        }

        .registration-eyebrow {
            margin-bottom: 12px;

            color: #2563eb;

            font-size: 10px;
            font-weight: 900;

            letter-spacing: .14em;
        }

        .registration-header h2 {
            margin: 0;

            color: #06172f;

            font-size: 34px;
            line-height: 1.08;

            letter-spacing: -.045em;

            font-weight: 900;
        }

        .registration-header p {
            max-width: 620px;

            margin: 13px 0 0;

            color: #718096;

            font-size: 12px;
            line-height: 1.7;
        }


        /* =========================================================
           INFORMATION NOTICE
        ========================================================== */

        .information-note {
            display: flex;

            align-items: flex-start;

            gap: 10px;

            margin-bottom: 21px;

            padding: 12px;

            border:
                1px solid
                #d8e5f7;

            border-radius: 9px;

            background: #f5f9ff;

            color: #718096;

            font-size: 8.5px;
            line-height: 1.55;
        }

        .information-note-icon {
            width: 28px;
            height: 28px;

            flex: 0 0 28px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background: #e8f1ff;

            color: #2563eb;
        }

        .information-note-icon svg {
            width: 15px;
            height: 15px;
        }

        .information-note strong {
            display: block;

            margin-bottom: 3px;

            color: #26364d;

            font-size: 10px;
            font-weight: 850;
        }


        /* =========================================================
           VALIDATION ALERT
        ========================================================== */

        .form-alert {
            display: flex;

            align-items: flex-start;

            gap: 10px;

            margin-bottom: 21px;

            padding: 12px 13px;

            border:
                1px solid
                #f0cccc;

            border-radius: 9px;

            background: #fff8f8;

            color: #8f2424;

            font-size: 10px;
            line-height: 1.5;
        }

        .form-alert-icon {
            width: 22px;
            height: 22px;

            flex: 0 0 22px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #c93636;

            color: #ffffff;

            font-size: 11px;
            font-weight: 850;
        }

        .form-alert-content strong {
            display: block;

            margin-bottom: 4px;

            font-weight: 850;
        }

        .form-alert-content ul {
            margin: 0;

            padding-left: 16px;
        }


        /* =========================================================
           INVITATION CARD
        ========================================================== */

        .invitation-card {
            width: 100%;

            padding: 18px;

            border:
                1px solid
                #dce4ee;

            border-radius: 11px;

            background: #f8fafc;
        }

        .invitation-card-header {
            display: flex;

            align-items: center;

            gap: 13px;

            margin-bottom: 20px;

            padding-bottom: 17px;

            border-bottom:
                1px solid
                #e7edf4;
        }

        .invitation-icon {
            width: 40px;
            height: 40px;

            flex: 0 0 40px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 10px;

            background: #eff6ff;

            color: #2563eb;
        }

        .invitation-icon svg {
            width: 20px;
            height: 20px;
        }

        .invitation-heading strong {
            display: block;

            color: #06172f;

            font-size: 13px;
            font-weight: 850;
        }

        .invitation-heading p {
            margin-top: 3px;

            color: #718096;

            font-size: 9px;
            line-height: 1.5;
        }


        /* =========================================================
           FIELD
        ========================================================== */

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;

            margin-bottom: 7px;

            color: #1e2d43;

            font-size: 10.5px;
            font-weight: 850;
        }

        .required {
            margin-left: 2px;

            color: #c93636;
        }

        .form-group input {
            width: 100%;
            height: 44px;

            padding:
                0
                13px;

            border:
                1px solid
                #ccd7e4;

            border-radius: 8px;

            outline: none;

            background: #ffffff;

            color: #06172f;

            font-family: inherit;

            font-size: 11.5px;

            transition:
                border-color .18s ease,
                box-shadow .18s ease,
                background .18s ease;
        }

        .form-group input::placeholder {
            color: #9ba7b8;
        }

        .form-group input:hover {
            border-color: #b9c6d6;
        }

        .form-group input:focus {
            border-color: #3478f6;

            box-shadow:
                0 0 0 3px
                rgba(52, 120, 246, .10);
        }

        .form-group input.input-error {
            border-color: #dc2626;

            background: #fffafa;
        }

        .form-group input.input-error:focus {
            border-color: #dc2626;

            box-shadow:
                0 0 0 3px
                rgba(220, 38, 38, .08);
        }

        .field-hint {
            margin-top: 5px;

            color: #8b97a8;

            font-size: 8.5px;
            line-height: 1.5;
        }

        .field-error {
            margin-top: 5px;

            color: #b42318;

            font-size: 9px;
            line-height: 1.5;
        }


        /* =========================================================
           INVITATION PREVIEW
        ========================================================== */

        .preview {
            margin-top: 21px;

            padding: 13px;

            border:
                1px solid
                #d8e5f7;

            border-radius: 9px;

            background: #f5f9ff;
        }

        .preview-label {
            margin-bottom: 10px;

            color: #2563eb;

            font-size: 8px;
            font-weight: 900;

            letter-spacing: .13em;

            text-transform: uppercase;
        }

        .preview-row {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 15px;

            padding: 8px 0;

            border-bottom:
                1px solid
                #e2ebf6;
        }

        .preview-row:last-child {
            border-bottom: 0;

            padding-bottom: 0;
        }

        .preview-row:first-of-type {
            padding-top: 0;
        }

        .preview-key {
            color: #8a96a8;

            font-size: 8.5px;
        }

        .preview-value {
            color: #26364d;

            font-size: 8.5px;
            font-weight: 850;

            text-align: right;
        }


        /* =========================================================
           INFORMATION NOTE BELOW FORM
        ========================================================== */

        .keep-simple {
            display: flex;

            align-items: flex-start;

            gap: 10px;

            margin-top: 21px;

            padding: 12px;

            border:
                1px solid
                #d8e5f7;

            border-radius: 9px;

            background: #f5f9ff;
        }

        .keep-simple-icon {
            width: 28px;
            height: 28px;

            flex: 0 0 28px;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background: #e8f1ff;

            color: #2563eb;
        }

        .keep-simple-icon svg {
            width: 15px;
            height: 15px;
        }

        .keep-simple strong {
            display: block;

            margin-bottom: 3px;

            color: #26364d;

            font-size: 10px;
            font-weight: 850;
        }

        .keep-simple p {
            margin: 0;

            color: #718096;

            font-size: 8.5px;
            line-height: 1.55;
        }


        /* =========================================================
           ACTIONS
        ========================================================== */

        .registration-actions {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 15px;

            margin-top: 22px;

            padding-top: 20px;

            border-top:
                1px solid
                #e8edf3;
        }

        .btn {
            min-height: 43px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            padding:
                0
                17px;

            border-radius: 8px;

            font-family: inherit;

            font-size: 10px;
            font-weight: 850;

            text-decoration: none;

            cursor: pointer;

            transition:
                transform .15s ease,
                background .18s ease,
                border-color .18s ease,
                box-shadow .18s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn:focus-visible {
            outline: 2px solid #3478f6;
            outline-offset: 3px;
        }

        .btn svg {
            width: 15px;
            height: 15px;
        }


        /* =========================================================
           BACK BUTTON
        ========================================================== */

        .btn-secondary {
            border:
                1px solid
                #d5dee9;

            background: #ffffff;

            color: #46546a;
        }

        .btn-secondary:hover {
            background: #f8fafc;

            border-color: #c2cedc;
        }


        /* =========================================================
           CONTINUE BUTTON
        ========================================================== */

        .btn-primary {
            min-width: 118px;

            border:
                1px solid
                #3478f6;

            background: #3478f6;

            color: #ffffff;

            box-shadow:
                0 6px 18px
                rgba(52, 120, 246, .18);
        }

        .btn-primary:hover {
            background: #2563eb;

            border-color: #2563eb;

            box-shadow:
                0 8px 22px
                rgba(52, 120, 246, .22);
        }

        .btn-primary:active {
            transform: translateY(0);
        }


        /* =========================================================
           FOOTER
        ========================================================== */

        .registration-footer {
            display: flex;

            align-items: center;
            justify-content: center;

            gap: 7px;

            margin-top: 24px;

            color: #a0a9b6;

            font-size: 8px;
        }

        .registration-footer strong {
            color: #2563eb;

            letter-spacing: .08em;
        }


        /* =========================================================
           LARGE TABLET
        ========================================================== */

        @media (max-width: 1100px) {

            .brand-content {
                padding:
                    40px
                    40px
                    36px;
            }

            .form-panel-inner {
                padding:
                    35px
                    40px
                    40px;
            }

            .brand-intro h1 {
                font-size: 48px;
            }
        }


        /* =========================================================
           TABLET
        ========================================================== */

        @media (max-width: 900px) {

            .registration-page {
                flex-direction: column;
            }

            .brand-panel {
                width: 100%;

                min-height: auto;
            }

            .brand-content {
                min-height: auto;

                padding:
                    35px
                    30px
                    38px;
            }

            .brand-intro {
                margin-top: 38px;
            }

            .brand-intro h1 {
                max-width: 650px;

                font-size: 48px;
            }

            .feature-cards {
                margin-top: 40px;

                padding-top: 0;
            }

            .brand-footer {
                margin-top: 25px;
            }

            .form-panel {
                width: 100%;

                min-height: auto;

                overflow: visible;
            }

            .form-panel-inner {
                max-width: 720px;

                padding:
                    35px
                    30px
                    45px;
            }
        }


        /* =========================================================
           MOBILE
        ========================================================== */

        @media (max-width: 650px) {

            .brand-content {
                padding:
                    28px
                    22px
                    30px;
            }

            .brand-mark {
                width: 39px;
                height: 39px;
            }

            .brand-name {
                font-size: 18px;
            }

            .brand-intro {
                margin-top: 32px;
            }

            .brand-eyebrow {
                margin-bottom: 20px;
            }

            .brand-intro h1 {
                font-size: 39px;

                line-height: .93;
            }

            .brand-description {
                font-size: 11px;
            }

            .feature-pills {
                gap: 7px;
            }

            .feature-pill {
                font-size: 8px;
            }

            .feature-cards {
                grid-template-columns: 1fr;

                gap: 8px;
            }

            .feature-card {
                min-height: auto;
            }

            .form-panel-inner {
                padding:
                    30px
                    22px
                    38px;
            }

            .registration-topbar {
                align-items: flex-start;

                gap: 15px;

                justify-content: flex-end;
            }

            .signin-text {
                text-align: right;
            }

            .registration-progress {
                gap: 5px;

                margin-bottom: 29px;
            }

            .registration-header h2 {
                font-size: 31px;
            }

            .registration-header p {
                font-size: 11.5px;
            }

            .registration-actions {
                flex-direction: column-reverse;

                align-items: stretch;
            }

            .btn {
                width: 100%;
            }
        }


        /* =========================================================
           SMALL MOBILE
        ========================================================== */

        @media (max-width: 430px) {

            .brand-content {
                padding:
                    25px
                    18px
                    28px;
            }

            .brand-intro h1 {
                font-size: 34px;
            }

            .form-panel-inner {
                padding:
                    26px
                    18px
                    35px;
            }

            .registration-topbar {
                flex-direction: column;

                align-items: flex-start;

                justify-content: flex-start;
            }

            .signin-text {
                text-align: left;
            }

            .registration-header h2 {
                font-size: 29px;
            }

            .invitation-card {
                padding: 14px;
            }

            .invitation-card-header {
                align-items: flex-start;
            }

            .preview-row {
                align-items: flex-start;

                flex-direction: column;

                gap: 3px;
            }

            .preview-value {
                text-align: left;
            }
        }


        /* =========================================================
           REDUCED MOTION
        ========================================================== */

        @media (prefers-reduced-motion: reduce) {

            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                transition: none !important;
                animation: none !important;
            }

            .btn:hover {
                transform: none;
            }
        }

    </style>

</head>


<body>

<div class="registration-page">


    {{-- =========================================================
         LEFT BRAND PANEL
    ========================================================== --}}

    <aside class="brand-panel">

        <div class="brand-content">


            {{-- BRAND --}}

            <a
                href="{{ route('register.account') }}"
                class="brand"
                aria-label="ORDO registration"
            >

                <span class="brand-mark">
                    O
                </span>

                <span class="brand-name-wrap">

                    <span class="brand-name">
                        ORDO
                    </span>

                    <span class="brand-subtitle">
                        by John Kelly &amp; Company
                    </span>

                </span>

            </a>


            {{-- INTRO --}}

            <div class="brand-intro">

                <div class="brand-eyebrow">
                    BUSINESS. ORGANIZED.
                </div>

                <h1>
                    One workspace for the business you're building.
                </h1>

                <p class="brand-description">
                    Manage governance, compliance, finance, people,
                    records and JK&amp;C services from one controlled
                    client workspace.
                </p>


                {{-- FEATURE PILLS --}}

                <div class="feature-pills">

                    <div class="feature-pill">
                        <span class="feature-dot"></span>
                        6 business modules
                    </div>

                    <div class="feature-pill">
                        <span class="feature-dot"></span>
                        30-day full access
                    </div>

                    <div class="feature-pill">
                        <span class="feature-dot"></span>
                        3 modules free after trial
                    </div>

                    <div class="feature-pill">
                        <span class="feature-dot"></span>
                        JK&amp;C support built in
                    </div>

                </div>

            </div>


            {{-- FEATURE CARDS --}}

            <div class="feature-cards">


                {{-- CARD 1 --}}

                <div class="feature-card">

                    <div class="feature-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >

                            <rect
                                x="5"
                                y="4"
                                width="14"
                                height="17"
                                rx="2"
                            />

                            <path d="M8 8h8"/>
                            <path d="M8 12h8"/>
                            <path d="M8 16h5"/>

                        </svg>

                    </div>

                    <strong>
                        Clear by default
                    </strong>

                    <p>
                        See what needs attention without
                        searching through scattered records.
                    </p>

                </div>


                {{-- CARD 2 --}}

                <div class="feature-card">

                    <div class="feature-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >

                            <path d="M12 3v18"/>
                            <path d="M7 8l5-5 5 5"/>
                            <path d="M7 16l5 5 5-5"/>

                        </svg>

                    </div>

                    <strong>
                        Progressive setup
                    </strong>

                    <p>
                        Start first. Complete verification and
                        account details as you go.
                    </p>

                </div>


                {{-- CARD 3 --}}

                <div class="feature-card">

                    <div class="feature-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7"
                            stroke-linecap="round"
                            stroke-linejoin="round"
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

                            <path d="M10 7h4a2 2 0 0 1 2 2v5"/>

                        </svg>

                    </div>

                    <strong>
                        Connected records
                    </strong>

                    <p>
                        Business information stays linked across
                        your ORDO workspace.
                    </p>

                </div>

            </div>


            {{-- BRAND FOOTER --}}

            <div class="brand-footer">

                Secure account registration
                &nbsp;•&nbsp;
                ORDO Client Workspace

            </div>

        </div>

    </aside>



    {{-- =========================================================
         RIGHT FORM PANEL
    ========================================================== --}}

    <main class="form-panel">

        <div class="form-panel-inner">


            {{-- =================================================
                 TOP BAR
            ================================================== --}}

            <div class="registration-topbar">

                <div class="signin-text">

                    Already have an account?

                    <a href="{{ route('login') }}">
                        Sign in
                    </a>

                </div>

            </div>


            {{-- =================================================
                 PROGRESS
            ================================================== --}}

            <div
                class="registration-progress"
                aria-label="Registration progress"
            >

                <div
                    class="progress-segment completed"
                    title="About you — completed"
                ></div>

                <div
                    class="progress-segment completed"
                    title="Account — completed"
                ></div>

                <div
                    class="progress-segment active"
                    aria-current="step"
                    title="Details — current step"
                ></div>

                <div
                    class="progress-segment"
                    title="Contact"
                ></div>

                <div
                    class="progress-segment"
                    title="Verify"
                ></div>

                <div
                    class="progress-segment"
                    title="Security"
                ></div>

            </div>


            {{-- =================================================
                 PAGE HEADER
            ================================================== --}}

            <header class="registration-header">

                <div class="registration-eyebrow">
                    JOIN YOUR ORDO WORKSPACE
                </div>

                <h2>
                    Join an existing ORDO account
                </h2>

                <p>
                    You were invited to join an existing ORDO account.
                    Enter the invitation information below to continue.
                </p>

            </header>


            {{-- =================================================
                 INFORMATION NOTICE
            ================================================== --}}

            <div class="information-note">

                <div class="information-note-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >

                        <circle
                            cx="12"
                            cy="12"
                            r="9"
                        />

                        <path d="M12 11V16"/>
                        <path d="M12 8H12.01"/>

                    </svg>

                </div>

                <div>

                    <strong>
                        You're joining an existing account.
                    </strong>

                    This will not create a new business,
                    organization, or ORDO workspace.
                    Your access will be connected to the
                    account associated with your invitation.

                </div>

            </div>


            {{-- =================================================
                 VALIDATION
            ================================================== --}}

            @if ($errors->any())

                <div
                    class="form-alert"
                    role="alert"
                    aria-live="polite"
                >

                    <div class="form-alert-icon">
                        !
                    </div>

                    <div class="form-alert-content">

                        <strong>
                            Please check the information below.
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
                 FORM
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('invited.update') }}"
                class="registration-form"
            >

                @csrf


                <section class="invitation-card">


                    {{-- =================================================
                         INVITATION HEADER
                    ================================================== --}}

                    <div class="invitation-card-header">

                        <div class="invitation-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >

                                <path
                                    d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"
                                />

                                <circle
                                    cx="9"
                                    cy="7"
                                    r="4"
                                />

                                <path d="M19 8v6"/>
                                <path d="M22 11h-6"/>

                            </svg>

                        </div>

                        <div class="invitation-heading">

                            <strong>
                                Invitation details
                            </strong>

                            <p>
                                Use the invitation code and email
                                address provided by the account administrator.
                            </p>

                        </div>

                    </div>


                    {{-- =================================================
                         INVITATION CODE
                    ================================================== --}}

                    <div class="form-group">

                        <label for="invitation_code">

                            Invitation Code

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input
                            type="text"
                            id="invitation_code"
                            name="invitation_code"
                            value="{{ old(
                                'invitation_code',
                                session('registration.invitation.invitation_code', '')
                            ) }}"
                            placeholder="Enter your invitation code"
                            autocomplete="one-time-code"
                            spellcheck="false"
                            maxlength="255"
                            class="{{ $errors->has('invitation_code') ? 'input-error' : '' }}"
                            aria-describedby="invitation-code-help"
                            aria-invalid="{{ $errors->has('invitation_code') ? 'true' : 'false' }}"
                            required
                        >

                        @error('invitation_code')

                            <div
                                class="field-error"
                                id="invitation-code-help"
                            >
                                {{ $message }}
                            </div>

                        @else

                            <div
                                class="field-hint"
                                id="invitation-code-help"
                            >
                                Enter the code included in your ORDO invitation.
                            </div>

                        @enderror

                    </div>


                    {{-- =================================================
                         EMAIL
                    ================================================== --}}

                    <div class="form-group">

                        <label for="invitation_email">

                            Invitation Email Address

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input
                            type="email"
                            id="invitation_email"
                            name="invitation_email"
                            value="{{ old(
                                'invitation_email',
                                session('registration.invitation.invitation_email', '')
                            ) }}"
                            placeholder="you@example.com"
                            autocomplete="email"
                            maxlength="255"
                            class="{{ $errors->has('invitation_email') ? 'input-error' : '' }}"
                            aria-describedby="invitation-email-help"
                            aria-invalid="{{ $errors->has('invitation_email') ? 'true' : 'false' }}"
                            required
                        >

                        @error('invitation_email')

                            <div
                                class="field-error"
                                id="invitation-email-help"
                            >
                                {{ $message }}
                            </div>

                        @else

                            <div
                                class="field-hint"
                                id="invitation-email-help"
                            >
                                Use the email address that received the invitation.
                            </div>

                        @enderror

                    </div>


                    {{-- =================================================
                         INVITATION PREVIEW
                    ================================================== --}}

                    @php

                        $preview =
                            session('registration.invitation_preview')
                            ??
                            session('registration.invitation.existing_account')
                            ??
                            ($information['existing_account'] ?? null);

                    @endphp


                    @if ($preview)

                        <div class="preview">

                            <div class="preview-label">
                                Invitation found
                            </div>


                            <div class="preview-row">

                                <span class="preview-key">
                                    Account
                                </span>

                                <span class="preview-value">

                                    {{ $preview['name']
                                        ?? $preview['account_name']
                                        ?? 'Existing ORDO Account' }}

                                </span>

                            </div>


                            <div class="preview-row">

                                <span class="preview-key">
                                    Invited role
                                </span>

                                <span class="preview-value">

                                    {{ $preview['role']
                                        ?? 'Member / Staff' }}

                                </span>

                            </div>


                            <div class="preview-row">

                                <span class="preview-key">
                                    Invited by
                                </span>

                                <span class="preview-value">

                                    {{ $preview['invited_by']
                                        ?? 'Account Administrator' }}

                                </span>

                            </div>

                        </div>

                    @endif

                </section>


                {{-- =================================================
                     KEEP SIMPLE NOTE
                ================================================== --}}

                <div class="keep-simple">

                    <div class="keep-simple-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >

                            <circle
                                cx="12"
                                cy="12"
                                r="9"
                            />

                            <path d="M12 11V16"/>
                            <path d="M12 8H12.01"/>

                        </svg>

                    </div>

                    <div>

                        <strong>
                            Keep it simple for now.
                        </strong>

                        <p>
                            We only need your invitation details to
                            connect you to the existing workspace.
                            Additional account information can be
                            completed later.
                        </p>

                    </div>

                </div>


                {{-- =================================================
                     ACTIONS
                ================================================== --}}

                <div class="registration-actions">


                    {{-- BACK --}}

                    <a
                        href="{{ route('register.account') }}"
                        class="btn btn-secondary"
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >

                            <path d="M19 12H5"/>
                            <path d="M11 18L5 12L11 6"/>

                        </svg>

                        <span>
                            Back
                        </span>

                    </a>


                    {{-- CONTINUE --}}

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <span>
                            Continue
                        </span>

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            aria-hidden="true"
                        >

                            <path d="M5 12H19"/>
                            <path d="M13 6L19 12L13 18"/>

                        </svg>

                    </button>

                </div>

            </form>


            {{-- =================================================
                 FOOTER
            ================================================== --}}

            <footer class="registration-footer">

                <strong>
                    ORDO
                </strong>

                <span>
                    •
                </span>

                <span>
                    Secure account registration
                </span>

            </footer>

        </div>

    </main>

</div>

</body>

</html>