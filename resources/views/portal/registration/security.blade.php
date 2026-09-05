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

    <title>Create your password — ORDO</title>

    <style>
        /* =========================================================
           RESET
        ========================================================= */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            min-height: 100%;
        }

        body {
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: #ffffff;
            color: #07152d;
            -webkit-font-smoothing: antialiased;
        }

        button,
        input {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        a {
            color: inherit;
            text-decoration: none;
        }


        /* =========================================================
           PAGE
        ========================================================= */

        .page {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 49.5% 50.5%;
        }


        /* =========================================================
           LEFT BRAND PANEL
        ========================================================= */

        .brand-panel {
            position: relative;
            min-height: 100vh;
            overflow: hidden;

            background:
                radial-gradient(
                    circle at 20% 20%,
                    rgba(37, 99, 235, 0.16),
                    transparent 34%
                ),
                linear-gradient(
                    145deg,
                    #071d42 0%,
                    #061a3a 48%,
                    #04142d 100%
                );

            color: #ffffff;
            padding: 46px 52px;
            display: flex;
            flex-direction: column;
        }


        /* =========================================================
           BRAND
        ========================================================= */

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .brand-mark {
            width: 44px;
            height: 44px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background:
                linear-gradient(
                    145deg,
                    #3b82f6,
                    #2563eb
                );

            box-shadow:
                0 8px 22px rgba(37, 99, 235, 0.28);

            font-size: 19px;
            font-weight: 900;
            letter-spacing: -0.04em;
        }

        .brand-name {
            font-size: 19px;
            line-height: 1;
            font-weight: 900;
            letter-spacing: -0.03em;
        }

        .brand-company {
            margin-top: 4px;

            font-size: 9px;
            line-height: 1;

            color: #b9c9e2;
            font-weight: 500;
        }


        /* =========================================================
           LEFT CONTENT
        ========================================================= */

        .brand-content {
            margin-top: 78px;
            max-width: 560px;
        }

        .eyebrow {
            margin-bottom: 25px;

            color: #3b82f6;

            font-size: 11px;
            font-weight: 900;
            letter-spacing: 0.15em;
            text-transform: uppercase;
        }

        .brand-heading {
            max-width: 520px;

            color: #ffffff;

            font-size: clamp(38px, 4vw, 57px);
            line-height: 1.02;

            font-weight: 950;
            letter-spacing: -0.055em;
        }

        .brand-description {
            max-width: 570px;

            margin-top: 28px;

            color: #c8d6eb;

            font-size: 14px;
            line-height: 1.75;
        }


        /* =========================================================
           LEFT PILLS
        ========================================================= */

        .benefits {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;

            margin-top: 27px;
        }

        .benefit {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 9px 13px;

            border: 1px solid rgba(148, 163, 184, 0.23);
            border-radius: 999px;

            background: rgba(255, 255, 255, 0.035);

            color: #dce8f9;

            font-size: 10px;
            font-weight: 700;
        }

        .benefit-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #3b82f6;

            box-shadow:
                0 0 0 3px rgba(59, 130, 246, 0.12);
        }


        /* =========================================================
           LEFT BOTTOM CARDS
        ========================================================= */

        .feature-grid {
            margin-top: auto;

            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 9px;
        }

        .feature-card {
            min-height: 118px;

            padding: 17px 15px;

            border:
                1px solid
                rgba(148, 163, 184, 0.17);

            border-radius: 12px;

            background:
                rgba(255, 255, 255, 0.035);
        }

        .feature-icon {
            width: 29px;
            height: 29px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 13px;

            border:
                1px solid
                rgba(59, 130, 246, 0.4);

            border-radius: 8px;

            color: #60a5fa;

            font-size: 13px;
            font-weight: 900;
        }

        .feature-title {
            color: #ffffff;

            font-size: 10px;
            font-weight: 800;

            margin-bottom: 5px;
        }

        .feature-text {
            color: #8fa7c7;

            font-size: 9px;
            line-height: 1.5;
        }


        /* =========================================================
           RIGHT PANEL
        ========================================================= */

        .form-panel {
            min-height: 100vh;

            padding:
                62px
                clamp(48px, 8vw, 122px)
                55px
                clamp(48px, 8vw, 122px);

            display: flex;
            align-items: flex-start;
            justify-content: center;

            overflow-y: auto;
        }

        .form-wrapper {
            width: 100%;
            max-width: 430px;
        }


        /* =========================================================
           STEP HEADER
        ========================================================= */

        .step-eyebrow {
            margin-bottom: 10px;

            color: #2563eb;

            font-size: 10px;
            font-weight: 900;

            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .form-title {
            color: #06152f;

            font-size: 29px;
            line-height: 1.12;

            font-weight: 950;
            letter-spacing: -0.045em;
        }

        .form-description {
            margin-top: 9px;

            color: #71809a;

            font-size: 12px;
            line-height: 1.65;
        }


        /* =========================================================
           PROGRESS
        ========================================================= */

        .progress {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;

            margin-top: 22px;
            margin-bottom: 27px;
        }

        .progress-line {
            height: 5px;

            border-radius: 999px;

            background: #e3e8ef;
        }

        .progress-line.active {
            background: #2563eb;
        }


        /* =========================================================
           STEP INDICATOR
        ========================================================= */

        .step-summary {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 21px;

            padding-bottom: 15px;

            border-bottom: 1px solid #edf0f5;
        }

        .step-number {
            color: #53627a;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 0.04em;
        }

        .step-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            color: #2563eb;

            font-size: 10px;
            font-weight: 800;
        }

        .step-status-dot {
            width: 6px;
            height: 6px;

            border-radius: 50%;

            background: #2563eb;
        }


        /* =========================================================
           FORM CARD
        ========================================================= */

        .security-card {
            padding: 21px;

            border:
                1px solid
                #dfe5ee;

            border-radius: 14px;

            background: #ffffff;

            box-shadow:
                0 10px 30px rgba(15, 23, 42, 0.035);
        }

        .card-heading {
            margin-bottom: 5px;

            color: #07152d;

            font-size: 14px;
            font-weight: 900;
        }

        .card-description {
            margin-bottom: 20px;

            color: #75839a;

            font-size: 11px;
            line-height: 1.6;
        }


        /* =========================================================
           FIELD
        ========================================================= */

        .field {
            margin-bottom: 17px;
        }

        .field:last-child {
            margin-bottom: 0;
        }

        .field-label {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 7px;

            color: #1e2d45;

            font-size: 10px;
            font-weight: 850;
        }

        .field-required {
            color: #2563eb;
        }

        .input-wrapper {
            position: relative;
        }

        .field-input {
            width: 100%;
            height: 46px;

            padding:
                0 45px
                0 13px;

            border:
                1px solid
                #d7dee9;

            border-radius: 8px;

            outline: none;

            background: #ffffff;

            color: #0b1b35;

            font-size: 12px;

            transition:
                border-color 0.18s ease,
                box-shadow 0.18s ease;
        }

        .field-input::placeholder {
            color: #a1acbc;
        }

        .field-input:focus {
            border-color: #3b82f6;

            box-shadow:
                0 0 0 3px
                rgba(37, 99, 235, 0.09);
        }

        .toggle-password {
            position: absolute;

            top: 50%;
            right: 13px;

            transform: translateY(-50%);

            border: 0;
            background: transparent;

            color: #64748b;

            font-size: 10px;
            font-weight: 800;

            padding: 4px;
        }

        .toggle-password:hover {
            color: #2563eb;
        }


        /* =========================================================
           PASSWORD REQUIREMENTS
        ========================================================= */

        .requirements {
            margin-top: 17px;
            padding: 14px;

            border-radius: 9px;

            background: #f7f9fc;

            border: 1px solid #edf1f6;
        }

        .requirements-title {
            margin-bottom: 10px;

            color: #26354d;

            font-size: 10px;
            font-weight: 850;
        }

        .requirements-list {
            display: grid;
            gap: 7px;
        }

        .requirement {
            display: flex;
            align-items: center;
            gap: 8px;

            color: #718096;

            font-size: 10px;
        }

        .requirement-icon {
            width: 15px;
            height: 15px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #e8edf4;

            color: #8794a8;

            font-size: 8px;
            font-weight: 900;

            flex-shrink: 0;
        }

        .requirement.valid {
            color: #2563eb;
        }

        .requirement.valid .requirement-icon {
            background: #eaf2ff;
            color: #2563eb;
        }


        /* =========================================================
           ERROR
        ========================================================= */

        .error-box {
            margin-bottom: 17px;

            padding: 11px 13px;

            border:
                1px solid
                #fecaca;

            border-radius: 8px;

            background: #fff7f7;

            color: #b42318;

            font-size: 10px;
            line-height: 1.55;
        }

        .field-error {
            margin-top: 6px;

            color: #b42318;

            font-size: 9px;
            line-height: 1.4;
        }


        /* =========================================================
           SECURITY NOTE
        ========================================================= */

        .security-note {
            display: flex;
            gap: 10px;

            margin-top: 17px;
            padding: 12px;

            border-radius: 8px;

            background: #f5f8ff;

            border: 1px solid #e4ecff;
        }

        .security-note-icon {
            width: 23px;
            height: 23px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 7px;

            background: #e8f0ff;

            color: #2563eb;

            font-size: 10px;

            flex-shrink: 0;
        }

        .security-note-text {
            color: #60708a;

            font-size: 9px;
            line-height: 1.55;
        }

        .security-note-text strong {
            color: #34445c;
        }


        /* =========================================================
           ACTIONS
        ========================================================= */

        .actions {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-top: 25px;
        }

        .back-button {
            min-width: 76px;
            height: 40px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 0 14px;

            border:
                1px solid
                #dbe2eb;

            border-radius: 8px;

            background: #ffffff;

            color: #44536a;

            font-size: 10px;
            font-weight: 800;

            transition:
                background 0.18s ease,
                border-color 0.18s ease;
        }

        .back-button:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
        }

        .continue-button {
            min-width: 130px;
            height: 40px;

            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            border: 0;
            border-radius: 8px;

            background:
                linear-gradient(
                    135deg,
                    #3b82f6,
                    #2563eb
                );

            color: #ffffff;

            font-size: 10px;
            font-weight: 850;

            box-shadow:
                0 7px 16px
                rgba(37, 99, 235, 0.18);

            transition:
                transform 0.15s ease,
                box-shadow 0.15s ease;
        }

        .continue-button:hover {
            transform: translateY(-1px);

            box-shadow:
                0 9px 20px
                rgba(37, 99, 235, 0.25);
        }

        .continue-arrow {
            font-size: 13px;
            line-height: 1;
        }


        /* =========================================================
           FOOTER
        ========================================================= */

        .form-footer {
            margin-top: 23px;

            text-align: center;

            color: #9aa5b5;

            font-size: 9px;
            line-height: 1.5;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1050px) {

            .page {
                grid-template-columns: 43% 57%;
            }

            .brand-panel {
                padding: 38px 35px;
            }

            .form-panel {
                padding-left: 45px;
                padding-right: 45px;
            }

            .brand-heading {
                font-size: 40px;
            }
        }


        @media (max-width: 800px) {

            .page {
                display: block;
            }

            .brand-panel {
                min-height: auto;

                padding:
                    28px 25px
                    38px;
            }

            .brand-content {
                margin-top: 48px;
            }

            .brand-heading {
                max-width: 600px;

                font-size: 38px;
            }

            .brand-description {
                max-width: 600px;
            }

            .feature-grid {
                margin-top: 35px;
            }

            .form-panel {
                min-height: auto;

                padding:
                    42px 25px
                    50px;
            }

            .form-wrapper {
                max-width: 520px;
            }
        }


        @media (max-width: 520px) {

            .brand-panel {
                padding:
                    25px 20px
                    30px;
            }

            .brand-content {
                margin-top: 40px;
            }

            .brand-heading {
                font-size: 32px;
            }

            .brand-description {
                font-size: 12px;
            }

            .benefits {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .benefit {
                justify-content: center;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .feature-card {
                min-height: auto;
            }

            .form-panel {
                padding:
                    35px 18px
                    40px;
            }

            .form-title {
                font-size: 26px;
            }

            .progress {
                gap: 5px;
            }

            .security-card {
                padding: 17px;
            }

            .actions {
                gap: 10px;
            }

            .back-button,
            .continue-button {
                flex: 1;
            }
        }
    </style>
</head>


<body>

<div class="page">


    <!-- =========================================================
         LEFT PANEL
    ========================================================== -->

    <aside class="brand-panel">

        <!-- BRAND -->

        <div class="brand">

            <div class="brand-mark">
                O
            </div>

            <div>

                <div class="brand-name">
                    ORDO
                </div>

                <div class="brand-company">
                    by John Kelly &amp; Company
                </div>

            </div>

        </div>


        <!-- LEFT CONTENT -->

        <div class="brand-content">

            <div class="eyebrow">
                BUSINESS. ORGANIZED.
            </div>

            <h1 class="brand-heading">
                One workspace for the business you're building.
            </h1>

            <p class="brand-description">
                Manage governance, compliance, finance, people,
                records and JK&amp;C services from one controlled
                client workspace.
            </p>


            <!-- BENEFITS -->

            <div class="benefits">

                <div class="benefit">
                    <span class="benefit-dot"></span>
                    6 business modules
                </div>

                <div class="benefit">
                    <span class="benefit-dot"></span>
                    30-day full access
                </div>

                <div class="benefit">
                    <span class="benefit-dot"></span>
                    3 modules free after trial
                </div>

                <div class="benefit">
                    <span class="benefit-dot"></span>
                    JK&amp;C support built in
                </div>

            </div>

        </div>


        <!-- BOTTOM FEATURES -->

        <div class="feature-grid">

            <div class="feature-card">

                <div class="feature-icon">
                    ☷
                </div>

                <div class="feature-title">
                    Clear by default
                </div>

                <div class="feature-text">
                    Keep your account and business information
                    organized from the beginning.
                </div>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    ↕
                </div>

                <div class="feature-title">
                    Progressive setup
                </div>

                <div class="feature-text">
                    Complete only what is needed at each step
                    of registration.
                </div>

            </div>


            <div class="feature-card">

                <div class="feature-icon">
                    ⤨
                </div>

                <div class="feature-title">
                    Connected records
                </div>

                <div class="feature-text">
                    Your account becomes the foundation for
                    your ORDO workspace.
                </div>

            </div>

        </div>

    </aside>



    <!-- =========================================================
         RIGHT PANEL
    ========================================================== -->

    <main class="form-panel">

        <div class="form-wrapper">


            <!-- HEADER -->

            <div class="step-eyebrow">
                CREATE YOUR ORDO ACCOUNT
            </div>

            <h2 class="form-title">
                Create your password
            </h2>

            <p class="form-description">
                Secure your account with a password you will use
                whenever you sign in to ORDO.
            </p>


            <!-- =================================================
                 PROGRESS
            ================================================== -->

            <div
                class="progress"
                aria-label="Registration progress"
            >

                <div class="progress-line active"></div>
                <div class="progress-line active"></div>
                <div class="progress-line active"></div>
                <div class="progress-line active"></div>
                <div class="progress-line active"></div>
                <div class="progress-line active"></div>
                <div class="progress-line"></div>

            </div>


            <!-- STEP SUMMARY -->

            <div class="step-summary">

                <div class="step-number">
                    Step 6 of {{ $registrationTotalSteps ?? 7 }}
                </div>

                <div class="step-status">

                    <span class="step-status-dot"></span>

                    Security

                </div>

            </div>


            <!-- =================================================
                 ERROR SUMMARY
            ================================================== -->

            @if ($errors->any())

                <div class="error-box">

                    <strong>
                        Please check the following:
                    </strong>

                    <ul style="margin-top: 6px; padding-left: 17px;">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- =================================================
                 SECURITY FORM
            ================================================== -->

            <form
                method="POST"
                action="{{ route('security.create') }}"
                id="securityForm"
            >

                @csrf


                <div class="security-card">


                    <div class="card-heading">
                        Set your password
                    </div>

                    <div class="card-description">
                        Choose a password that is difficult for
                        others to guess and easy for you to remember.
                    </div>


                    <!-- PASSWORD -->

                    <div class="field">

                        <label
                            class="field-label"
                            for="password"
                        >

                            <span>
                                Password
                                <span class="field-required">*</span>
                            </span>

                        </label>

                        <div class="input-wrapper">

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="field-input"
                                placeholder="Enter your password"
                                autocomplete="new-password"
                                required
                                minlength="8"
                            >

                            <button
                                type="button"
                                class="toggle-password"
                                data-target="password"
                                aria-label="Show password"
                            >
                                Show
                            </button>

                        </div>

                        @error('password')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- CONFIRM PASSWORD -->

                    <div class="field">

                        <label
                            class="field-label"
                            for="password_confirmation"
                        >

                            <span>
                                Confirm password
                                <span class="field-required">*</span>
                            </span>

                        </label>

                        <div class="input-wrapper">

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="field-input"
                                placeholder="Re-enter your password"
                                autocomplete="new-password"
                                required
                                minlength="8"
                            >

                            <button
                                type="button"
                                class="toggle-password"
                                data-target="password_confirmation"
                                aria-label="Show password"
                            >
                                Show
                            </button>

                        </div>

                    </div>


                    <!-- PASSWORD REQUIREMENTS -->

                    <div class="requirements">

                        <div class="requirements-title">
                            Password requirements
                        </div>

                        <div class="requirements-list">

                            <div
                                class="requirement"
                                id="requirement-length"
                            >

                                <span class="requirement-icon">
                                    ✓
                                </span>

                                At least 8 characters

                            </div>

                            <div
                                class="requirement"
                                id="requirement-match"
                            >

                                <span class="requirement-icon">
                                    ✓
                                </span>

                                Passwords match

                            </div>

                        </div>

                    </div>


                    <!-- SECURITY NOTE -->

                    <div class="security-note">

                        <div class="security-note-icon">
                            ✓
                        </div>

                        <div class="security-note-text">

                            <strong>
                                Your password is protected.
                            </strong>

                            <br>

                            ORDO securely stores your password.
                            Never share your password with anyone.

                        </div>

                    </div>

                </div>


                <!-- =================================================
                     ACTIONS
                ================================================== -->

                <div class="actions">

                    <a
                        href="{{ route('register.verification') }}"
                        class="back-button"
                    >
                        ← Back
                    </a>

                    <button
                        type="submit"
                        class="continue-button"
                        id="continueButton"
                    >

                        Create account

                        <span class="continue-arrow">
                            →
                        </span>

                    </button>

                </div>

            </form>


            <!-- FOOTER -->

            <div class="form-footer">
                By continuing, you agree to keep your ORDO
                account credentials secure.
            </div>


        </div>

    </main>

</div>



<script>
    /* =========================================================
       PASSWORD VISIBILITY
    ========================================================= */

    document
        .querySelectorAll('.toggle-password')
        .forEach(function (button) {

            button.addEventListener('click', function () {

                const targetId =
                    this.getAttribute('data-target');

                const input =
                    document.getElementById(targetId);

                if (!input) {
                    return;
                }

                if (input.type === 'password') {

                    input.type = 'text';

                    this.textContent = 'Hide';

                    this.setAttribute(
                        'aria-label',
                        'Hide password'
                    );

                } else {

                    input.type = 'password';

                    this.textContent = 'Show';

                    this.setAttribute(
                        'aria-label',
                        'Show password'
                    );
                }

            });

        });


    /* =========================================================
       PASSWORD REQUIREMENTS
    ========================================================= */

    const password =
        document.getElementById('password');

    const passwordConfirmation =
        document.getElementById('password_confirmation');

    const lengthRequirement =
        document.getElementById('requirement-length');

    const matchRequirement =
        document.getElementById('requirement-match');


    function updatePasswordRequirements() {

        if (!password || !passwordConfirmation) {
            return;
        }


        /* -----------------------------------------------------
           LENGTH
        ----------------------------------------------------- */

        if (password.value.length >= 8) {

            lengthRequirement.classList.add('valid');

        } else {

            lengthRequirement.classList.remove('valid');

        }


        /* -----------------------------------------------------
           MATCH
        ----------------------------------------------------- */

        if (
            password.value.length > 0 &&
            passwordConfirmation.value.length > 0 &&
            password.value === passwordConfirmation.value
        ) {

            matchRequirement.classList.add('valid');

        } else {

            matchRequirement.classList.remove('valid');

        }

    }


    password.addEventListener(
        'input',
        updatePasswordRequirements
    );

    passwordConfirmation.addEventListener(
        'input',
        updatePasswordRequirements
    );


    /* =========================================================
       FORM VALIDATION
    ========================================================= */

    document
        .getElementById('securityForm')
        .addEventListener('submit', function (event) {

            const passwordValue =
                password.value;

            const confirmationValue =
                passwordConfirmation.value;


            if (passwordValue.length < 8) {

                event.preventDefault();

                password.focus();

                return;
            }


            if (passwordValue !== confirmationValue) {

                event.preventDefault();

                passwordConfirmation.focus();

                alert(
                    'The passwords do not match.'
                );

                return;
            }

        });
</script>

</body>

</html>