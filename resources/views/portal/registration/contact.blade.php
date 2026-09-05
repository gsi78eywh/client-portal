@extends('layouts.registration')

@section('title', 'Contact Information — ORDO')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | CONTACT DATA
    |--------------------------------------------------------------------------
    */

    $contact = $contact ?? [];

    $accountType = $accountType
        ?? session('registration.account.account_type');

    $profile = $profile ?? [];
    $information = $information ?? [];


    /*
    |--------------------------------------------------------------------------
    | ACCOUNT TYPE LABELS
    |--------------------------------------------------------------------------
    */

    $accountTypeLabels = [
        'personal' => 'For myself',
        'profession' => 'For my profession or practice',
        'business' => 'For a business or organization',
        'invited' => 'I was invited to an existing account',
    ];

    $selectedAccountLabel = $accountTypeLabels[$accountType]
        ?? 'Your ORDO account';
@endphp


<div class="registration-page">

    {{-- =========================================================
         RIGHT REGISTRATION CONTENT

         The LEFT ORDO dashboard is already provided by:
         layouts.registration

         This page contains only the registration content.
    ========================================================== --}}

    <main class="registration-main">

        <div class="main-inner">


            {{-- =================================================
                 PAGE HEADER
            ================================================== --}}

            <header class="registration-header">

                <div class="registration-eyebrow">
                    CREATE YOUR ORDO ACCOUNT
                </div>

                <h1>
                    How can we reach you?
                </h1>

                <p class="registration-description">
                    Add your contact details so ORDO can securely
                    verify your account and keep you informed.
                </p>


                {{-- =================================================
                     PROGRESS — STEP 4 OF 6
                ================================================== --}}

                <div
                    class="progress-wrapper"
                    aria-label="Registration progress: Step 4 of 6"
                >

                    {{-- Step 1 — About You --}}
                    <div class="progress-segment completed"></div>

                    {{-- Step 2 — Account Type --}}
                    <div class="progress-segment completed"></div>

                    {{-- Step 3 — Information --}}
                    <div class="progress-segment completed"></div>

                    {{-- Step 4 — Contact --}}
                    <div
                        class="progress-segment active"
                        aria-current="step"
                    ></div>

                    {{-- Step 5 — Verification --}}
                    <div class="progress-segment"></div>

                    {{-- Step 6 — Security --}}
                    <div class="progress-segment"></div>

                </div>

            </header>


            {{-- =================================================
                 FORM CONTENT
            ================================================== --}}

            <div class="form-content">


                {{-- =================================================
                     VALIDATION ERRORS
                ================================================== --}}

                @if ($errors->any())

                    <div
                        class="alert alert-error"
                        role="alert"
                    >

                        <div class="alert-icon">
                            !
                        </div>

                        <div>

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
                     SUCCESS MESSAGE
                ================================================== --}}

                @if (session('success'))

                    <div
                        class="alert alert-success"
                        role="status"
                    >

                        <div class="alert-icon">
                            ✓
                        </div>

                        <div>
                            {{ session('success') }}
                        </div>

                    </div>

                @endif


                {{-- =================================================
                     ACCOUNT TYPE CONTEXT
                ================================================== --}}

                <div class="account-context">

                    <div class="context-icon">

                        @if ($accountType === 'business')

                            {{-- Business icon --}}

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >

                                <path d="M3 21H21"/>

                                <path d="M5 21V6H19V21"/>

                                <path d="M8 10H10"/>

                                <path d="M14 10H16"/>

                                <path d="M8 14H10"/>

                                <path d="M14 14H16"/>

                                <path d="M10 21V17H14V21"/>

                            </svg>


                        @elseif ($accountType === 'profession')

                            {{-- Profession icon --}}

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >

                                <rect
                                    x="3"
                                    y="7"
                                    width="18"
                                    height="13"
                                    rx="2"
                                />

                                <path
                                    d="M8 7V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V7"
                                />

                                <path d="M3 12H21"/>

                            </svg>


                        @elseif ($accountType === 'invited')

                            {{-- Invited account icon --}}

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
                                    cx="9"
                                    cy="8"
                                    r="3"
                                />

                                <path
                                    d="M3 20C3.5 16.5 5.5 14.5 9 14.5C12.5 14.5 14.5 16.5 15 20"
                                />

                                <path
                                    d="M16 11C18.2 11 20 12.8 20 15"
                                />

                                <path
                                    d="M17 5.5C18.7 5.5 20 6.8 20 8.5"
                                />

                            </svg>


                        @else

                            {{-- Personal account icon --}}

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
                                    cy="8"
                                    r="3.5"
                                />

                                <path
                                    d="M5 20C5.8 16.4 8.1 14.5 12 14.5C15.9 14.5 18.2 16.4 19 20"
                                />

                            </svg>

                        @endif

                    </div>


                    <div class="context-content">

                        <span>
                            ACCOUNT TYPE
                        </span>

                        <strong>
                            {{ $selectedAccountLabel }}
                        </strong>

                    </div>

                </div>


                {{-- =================================================
                     CONTACT FORM
                ================================================== --}}

                <form
                    method="POST"
                    action="{{ route('contact.update') }}"
                    class="registration-form"
                    id="contact-form"
                >

                    @csrf


                    {{-- =================================================
                         EMAIL ADDRESS
                    ================================================== --}}

                    <section class="form-section">

                        <div class="section-heading">

                            <h2>
                                Email address
                            </h2>

                            <p>
                                We'll use this address for verification,
                                account notices and important ORDO communications.
                            </p>

                        </div>


                        <div class="form-group">

                            <label for="email">

                                Email address

                                <span
                                    class="required"
                                    aria-hidden="true"
                                >
                                    *
                                </span>

                            </label>


                            <div class="input-wrapper">

                                <span
                                    class="input-icon"
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

                                        <rect
                                            x="3"
                                            y="5"
                                            width="18"
                                            height="14"
                                            rx="2"
                                        />

                                        <path
                                            d="M3.5 6.5L12 13L20.5 6.5"
                                        />

                                    </svg>

                                </span>


                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', $contact['email'] ?? '') }}"
                                    autocomplete="email"
                                    inputmode="email"
                                    placeholder="you@example.com"
                                    class="@error('email') input-error @enderror"
                                    required
                                    autofocus
                                    aria-describedby="email-hint"
                                >

                            </div>


                            @error('email')

                                <div
                                    class="field-error"
                                    role="alert"
                                >
                                    {{ $message }}
                                </div>

                            @enderror


                            <div
                                class="field-hint"
                                id="email-hint"
                            >
                                Use an email address you can access right now.
                            </div>

                        </div>

                    </section>


                    {{-- =================================================
                         MOBILE NUMBER
                    ================================================== --}}

                    <section class="form-section">

                        <div class="section-heading">

                            <h2>
                                Mobile number
                            </h2>

                            <p>
                                Your mobile number helps us verify your identity
                                and protect your ORDO account.
                            </p>

                        </div>


                        <div class="form-group">

                            <label for="mobile_number">

                                Mobile number

                                <span
                                    class="required"
                                    aria-hidden="true"
                                >
                                    *
                                </span>

                            </label>


                            <div class="input-wrapper">

                                <span
                                    class="input-icon"
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

                                        <rect
                                            x="6.5"
                                            y="2.5"
                                            width="11"
                                            height="19"
                                            rx="2"
                                        />

                                        <path
                                            d="M10 5H14"
                                        />

                                        <circle
                                            cx="12"
                                            cy="18"
                                            r="1"
                                            fill="currentColor"
                                        />

                                    </svg>

                                </span>


                                <input
                                    type="tel"
                                    id="mobile_number"
                                    name="mobile_number"
                                    value="{{ old('mobile_number', $contact['mobile_number'] ?? '') }}"
                                    autocomplete="tel"
                                    inputmode="tel"
                                    placeholder="+63 9XX XXX XXXX"
                                    class="@error('mobile_number') input-error @enderror"
                                    required
                                    aria-describedby="mobile-hint"
                                >

                            </div>


                            @error('mobile_number')

                                <div
                                    class="field-error"
                                    role="alert"
                                >
                                    {{ $message }}
                                </div>

                            @enderror


                            <div
                                class="field-hint"
                                id="mobile-hint"
                            >
                                Include your country code if you are outside the Philippines.
                            </div>

                        </div>

                    </section>


                    {{-- =================================================
                         PRIVACY / SECURITY MESSAGE
                    ================================================== --}}

                    <div class="privacy-card">

                        <div
                            class="privacy-icon"
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
                                    d="M12 3L19 6V11C19 15.5 16.1 19.2 12 21C7.9 19.2 5 15.5 5 11V6L12 3Z"
                                />

                                <path
                                    d="M9.5 12L11.2 13.7L14.8 10.1"
                                />

                            </svg>

                        </div>


                        <div>

                            <strong>
                                Your information stays protected.
                            </strong>

                            <p>
                                Your contact details are used to verify your identity,
                                secure your account and send essential account-related
                                communications.
                            </p>

                        </div>

                    </div>


                    {{-- =================================================
                         ACTION BUTTONS
                    ================================================== --}}

                    <div class="form-actions">


                        {{-- BACK --}}

                        <a
                            href="{{ route('register.account') }}"
                            class="btn btn-back"
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
                            class="btn btn-continue"
                            id="continue-button"
                        >

                            <span class="button-text">
                                Continue
                            </span>

                            <span
                                class="button-loading"
                                aria-hidden="true"
                            >
                                Processing...
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

                <div class="registration-footer">

                    <strong>
                        ORDO
                    </strong>

                    <span aria-hidden="true">
                        •
                    </span>

                    <span>
                        Secure account registration
                    </span>

                </div>


            </div>

        </div>

    </main>

</div>


@push('styles')

<style>

/* ================================================================
   CONTACT PAGE
   RIGHT-SIDE CONTENT ONLY

   The global registration shell and left ORDO dashboard are
   controlled by layouts.registration.
================================================================ */


/* ================================================================
   PAGE WRAPPER
================================================================ */

.registration-page {
    width: 100%;
    min-height: 100vh;

    background: #ffffff;
    color: #06172f;
}


/* ================================================================
   RIGHT MAIN
================================================================ */

.registration-page .registration-main {
    width: 100%;
    min-width: 0;
    min-height: 100vh;

    background: #ffffff;

    overflow-y: auto;
}


.registration-page .main-inner {
    width: min(100%, 700px);

    margin: 0 auto;

    min-height: 100vh;

    display: flex;
    flex-direction: column;
}


/* ================================================================
   HEADER
================================================================ */

.registration-page .registration-header {
    padding:
        50px
        76px
        0;
}


.registration-page .registration-eyebrow {
    margin-bottom: 13px;

    color: #2563eb;

    font-size: 10px;
    font-weight: 850;

    letter-spacing: .14em;
}


.registration-page .registration-header h1 {
    margin: 0;

    color: #06172f;

    font-size: 42px;
    line-height: 1.05;

    letter-spacing: -.045em;

    font-weight: 850;
}


.registration-page .registration-description {
    max-width: 530px;

    margin: 14px 0 0;

    color: #728098;

    font-size: 13px;
    line-height: 1.65;
}


/* ================================================================
   PROGRESS
================================================================ */

.registration-page .progress-wrapper {
    display: grid;

    grid-template-columns:
        repeat(6, minmax(0, 1fr));

    gap: 8px;

    margin-top: 31px;

    padding-bottom: 28px;
}


.registration-page .progress-segment {
    height: 5px;

    border-radius: 999px;

    background: #e5eaf1;

    transition:
        background-color .2s ease,
        box-shadow .2s ease;
}


.registration-page .progress-segment.completed,
.registration-page .progress-segment.active {
    background: #3478f6;
}


.registration-page .progress-segment.active {
    box-shadow:
        0 0 0 2px rgba(52, 120, 246, .08);
}


/* ================================================================
   FORM CONTENT
================================================================ */

.registration-page .form-content {
    padding:
        0
        76px
        45px;
}


/* ================================================================
   ACCOUNT TYPE CONTEXT
================================================================ */

.registration-page .account-context {
    display: flex;

    align-items: center;

    gap: 13px;

    margin-bottom: 28px;

    padding: 12px 14px;

    border: 1px solid #dce4ee;

    border-radius: 11px;

    background: #ffffff;

    box-shadow:
        0 6px 20px rgba(6, 23, 47, .035);
}


.registration-page .context-icon {
    width: 39px;
    height: 39px;

    flex: 0 0 39px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: #eff6ff;

    color: #2563eb;
}


.registration-page .context-icon svg {
    width: 20px;
    height: 20px;
}


.registration-page .context-content {
    min-width: 0;
}


.registration-page .account-context span {
    display: block;

    margin-bottom: 4px;

    color: #8995a7;

    font-size: 8px;
    font-weight: 850;

    letter-spacing: .12em;
}


.registration-page .account-context strong {
    display: block;

    color: #17253a;

    font-size: 12px;
    font-weight: 800;

    line-height: 1.4;
}


/* ================================================================
   FORM
================================================================ */

.registration-page .registration-form {
    width: 100%;
}


.registration-page .form-section {
    padding: 24px 0;

    border-top: 1px solid #e8edf3;
}


.registration-page .form-section:first-child {
    padding-top: 0;

    border-top: 0;
}


.registration-page .section-heading {
    margin-bottom: 18px;
}


.registration-page .section-heading h2 {
    margin: 0 0 5px;

    color: #06172f;

    font-size: 17px;
    font-weight: 800;

    letter-spacing: -.02em;
}


.registration-page .section-heading p {
    margin: 0;

    color: #7a879a;

    font-size: 11px;
    line-height: 1.6;
}


/* ================================================================
   INPUT
================================================================ */

.registration-page .form-group {
    width: 100%;
}


.registration-page .form-group label {
    display: block;

    margin-bottom: 7px;

    color: #1e2d43;

    font-size: 11px;
    font-weight: 800;
}


.registration-page .required {
    margin-left: 2px;

    color: #c62828;
}


.registration-page .input-wrapper {
    position: relative;
}


.registration-page .input-icon {
    position: absolute;

    left: 15px;
    top: 50%;

    display: flex;

    transform: translateY(-50%);

    color: #8795a9;

    pointer-events: none;

    transition:
        color .18s ease;
}


.registration-page .input-icon svg {
    width: 18px;
    height: 18px;
}


.registration-page .input-wrapper input {
    width: 100%;
    height: 52px;

    padding:
        0
        15px
        0
        46px;

    border: 1px solid #ccd7e4;

    border-radius: 10px;

    background: #ffffff;

    color: #172033;

    font-family: inherit;

    font-size: 12px;

    outline: none;

    transition:
        border-color .18s ease,
        box-shadow .18s ease,
        background-color .18s ease;
}


.registration-page .input-wrapper input::placeholder {
    color: #a1adbc;
}


.registration-page .input-wrapper input:hover {
    border-color: #b9c6d6;
}


.registration-page .input-wrapper input:focus {
    border-color: #3478f6;

    box-shadow:
        0 0 0 3px rgba(52, 120, 246, .10);
}


.registration-page .input-wrapper:focus-within .input-icon {
    color: #2563eb;
}


.registration-page .input-wrapper input.input-error {
    border-color: #d92d20;

    background: #fffafa;
}


.registration-page .input-wrapper input.input-error:focus {
    box-shadow:
        0 0 0 3px rgba(217, 45, 32, .08);
}


/* ================================================================
   FIELD MESSAGES
================================================================ */

.registration-page .field-error {
    margin-top: 5px;

    color: #b42318;

    font-size: 10px;
    line-height: 1.5;
}


.registration-page .field-hint {
    margin-top: 7px;

    color: #8b97a8;

    font-size: 9.5px;
    line-height: 1.5;
}


/* ================================================================
   PRIVACY CARD
================================================================ */

.registration-page .privacy-card {
    display: flex;

    align-items: flex-start;

    gap: 12px;

    margin:
        8px 0
        24px;

    padding: 14px;

    border: 1px solid #d8e5f7;

    border-radius: 10px;

    background: #f5f9ff;
}


.registration-page .privacy-icon {
    width: 31px;
    height: 31px;

    flex: 0 0 31px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 8px;

    background: #e8f1ff;

    color: #2563eb;
}


.registration-page .privacy-icon svg {
    width: 17px;
    height: 17px;
}


.registration-page .privacy-card strong {
    display: block;

    margin-bottom: 4px;

    color: #26364d;

    font-size: 11px;
    font-weight: 800;
}


.registration-page .privacy-card p {
    margin: 0;

    color: #718096;

    font-size: 9.5px;
    line-height: 1.55;
}


/* ================================================================
   ALERTS
================================================================ */

.registration-page .alert {
    display: flex;

    align-items: flex-start;

    gap: 10px;

    margin-bottom: 18px;

    padding: 12px;

    border-radius: 9px;

    font-size: 10px;
    line-height: 1.5;
}


.registration-page .alert-icon {
    width: 22px;
    height: 22px;

    flex: 0 0 22px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #ffffff;

    font-weight: 800;
}


.registration-page .alert-error {
    border: 1px solid #f1caca;

    background: #fff7f7;

    color: #8f2424;
}


.registration-page .alert-error .alert-icon {
    background: #c93636;
}


.registration-page .alert-success {
    border: 1px solid #c8ead8;

    background: #f1faf5;

    color: #17613b;
}


.registration-page .alert-success .alert-icon {
    background: #23945c;
}


.registration-page .alert ul {
    margin: 5px 0 0;

    padding-left: 16px;
}


/* ================================================================
   ACTION BUTTONS
================================================================ */

.registration-page .form-actions {
    display: flex;

    align-items: center;
    justify-content: space-between;

    gap: 15px;

    padding-top: 20px;

    border-top: 1px solid #e8edf3;
}


.registration-page .btn {
    min-height: 45px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    gap: 8px;

    padding:
        0
        17px;

    border-radius: 9px;

    font-family: inherit;

    font-size: 11px;
    font-weight: 800;

    text-decoration: none;

    cursor: pointer;

    transition:
        transform .15s ease,
        background-color .18s ease,
        border-color .18s ease,
        box-shadow .18s ease,
        opacity .18s ease;
}


.registration-page .btn svg {
    width: 16px;
    height: 16px;

    flex: 0 0 auto;
}


.registration-page .btn:hover {
    transform: translateY(-1px);
}


.registration-page .btn:active {
    transform: translateY(0);
}


.registration-page .btn:focus-visible {
    outline: none;

    box-shadow:
        0 0 0 3px rgba(52, 120, 246, .16);
}


.registration-page .btn-back {
    border: 1px solid #d5dee9;

    background: #ffffff;

    color: #46546a;
}


.registration-page .btn-back:hover {
    background: #f8fafc;

    border-color: #c7d2df;
}


.registration-page .btn-continue {
    min-width: 130px;

    border: 1px solid #3478f6;

    background: #3478f6;

    color: #ffffff;

    box-shadow:
        0 6px 18px rgba(52, 120, 246, .18);
}


.registration-page .btn-continue:hover {
    background: #2563eb;

    border-color: #2563eb;

    box-shadow:
        0 8px 22px rgba(52, 120, 246, .22);
}


/* ================================================================
   BUTTON LOADING STATE
================================================================ */

.registration-page .button-loading {
    display: none;
}


.registration-page .btn-continue.is-loading {
    cursor: wait;

    opacity: .78;

    pointer-events: none;
}


.registration-page .btn-continue.is-loading .button-text {
    display: none;
}


.registration-page .btn-continue.is-loading .button-loading {
    display: inline;
}


.registration-page .btn-continue.is-loading svg {
    display: none;
}


/* ================================================================
   FOOTER
================================================================ */

.registration-page .registration-footer {
    display: flex;

    align-items: center;
    justify-content: center;

    gap: 7px;

    margin-top: 30px;

    color: #a0a9b6;

    font-size: 9px;
}


.registration-page .registration-footer strong {
    color: #2563eb;

    letter-spacing: .08em;
}


/* ================================================================
   TABLET
================================================================ */

@media (max-width: 1050px) {

    .registration-page .registration-header,
    .registration-page .form-content {
        padding-left: 50px;
        padding-right: 50px;
    }

}


/* ================================================================
   MOBILE
================================================================ */

@media (max-width: 760px) {

    .registration-page .registration-main {
        min-height: auto;

        overflow: visible;
    }


    .registration-page .main-inner {
        width: 100%;

        min-height: auto;
    }


    .registration-page .registration-header {
        padding:
            35px
            24px
            0;
    }


    .registration-page .registration-header h1 {
        font-size: 35px;
    }


    .registration-page .form-content {
        padding:
            0
            24px
            35px;
    }

}


/* ================================================================
   SMALL MOBILE
================================================================ */

@media (max-width: 430px) {

    .registration-page .registration-header {
        padding:
            30px
            18px
            0;
    }


    .registration-page .form-content {
        padding:
            0
            18px
            30px;
    }


    .registration-page .registration-header h1 {
        font-size: 30px;
    }


    .registration-page .registration-description {
        font-size: 12px;
    }


    .registration-page .progress-wrapper {
        gap: 5px;
    }


    .registration-page .account-context {
        margin-bottom: 22px;
    }


    .registration-page .account-context strong {
        font-size: 11px;
    }


    .registration-page .form-actions {
        flex-direction: column-reverse;

        align-items: stretch;
    }


    .registration-page .btn {
        width: 100%;
    }

}


/* ================================================================
   VERY SMALL DEVICES
================================================================ */

@media (max-width: 350px) {

    .registration-page .registration-header {
        padding-left: 15px;
        padding-right: 15px;
    }


    .registration-page .form-content {
        padding-left: 15px;
        padding-right: 15px;
    }


    .registration-page .registration-header h1 {
        font-size: 27px;
    }


    .registration-page .section-heading h2 {
        font-size: 16px;
    }

}

</style>

@endpush


@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('contact-form');
    const button = document.getElementById('continue-button');

    if (!form || !button) {
        return;
    }

    form.addEventListener('submit', function () {

        /*
        |--------------------------------------------------------------------------
        | Prevent accidental double submission
        |--------------------------------------------------------------------------
        */

        if (button.classList.contains('is-loading')) {
            return;
        }

        button.classList.add('is-loading');

        button.setAttribute('aria-disabled', 'true');

    });

});
</script>

@endpush

@endsection