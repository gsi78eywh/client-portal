@extends('layouts.registration')

@section('title', 'Verify your contact — ORDO')

@section('content')

@php
    $email = $email ?? session('registration.contact.email');
    $mobile = $mobile ?? session('registration.contact.mobile_number');
@endphp

<div class="verification-page">

    <main class="verification-main">

        <div class="main-inner">

            {{-- =========================================================
                HEADER
            ========================================================== --}}

            <header class="verification-header">

                <div class="verification-eyebrow">
                    CREATE YOUR ORDO ACCOUNT
                </div>

                <h1>
                    Verify your contact
                </h1>

                <p class="verification-description">
                    Enter the six-digit code we sent to your contact
                    information to confirm that it's really you.
                </p>

                {{-- =================================================
                    REGISTRATION PROGRESS
                ================================================== --}}

                <div
                    class="progress-wrapper"
                    aria-label="Registration progress"
                >

                    {{-- Step 1 — About You --}}
                    <div
                        class="progress-segment completed"
                        aria-label="Step 1 completed"
                    ></div>

                    {{-- Step 2 — Account Type --}}
                    <div
                        class="progress-segment completed"
                        aria-label="Step 2 completed"
                    ></div>

                    {{-- Step 3 — Information --}}
                    <div
                        class="progress-segment completed"
                        aria-label="Step 3 completed"
                    ></div>

                    {{-- Step 4 — Contact --}}
                    <div
                        class="progress-segment completed"
                        aria-label="Step 4 completed"
                    ></div>

                    {{-- Step 5 — Verification --}}
                    <div
                        class="progress-segment active"
                        aria-label="Step 5 current"
                    ></div>

                    {{-- Step 6 — Security --}}
                    <div
                        class="progress-segment"
                        aria-label="Step 6 upcoming"
                    ></div>

                </div>

            </header>


            {{-- =========================================================
                CONTENT
            ========================================================== --}}

            <div class="verification-content">

                {{-- =================================================
                    SUCCESS MESSAGE
                ================================================== --}}

                @if(session('success'))

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
                    GENERAL VERIFICATION ERROR
                ================================================== --}}

                @if($errors->has('verification'))

                    <div
                        class="alert alert-error"
                        role="alert"
                    >

                        <div class="alert-icon">
                            !
                        </div>

                        <div>
                            {{ $errors->first('verification') }}
                        </div>

                    </div>

                @endif


                {{-- =================================================
                    CONTACT SUMMARY
                ================================================== --}}

                <div class="contact-summary">

                    <div class="summary-icon">

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
                                y="5"
                                width="18"
                                height="14"
                                rx="2"
                            />

                            <path
                                d="M3.5 6.5L12 13L20.5 6.5"
                            />

                        </svg>

                    </div>


                    <div class="summary-text">

                        <span>
                            VERIFICATION CODE SENT TO
                        </span>

                        <strong>
                            {{ $email ?? 'Your email address' }}
                        </strong>

                        @if($mobile)

                            <small>
                                Mobile: {{ $mobile }}
                            </small>

                        @endif

                    </div>

                </div>


                {{-- =================================================
                    VERIFICATION FORM
                ================================================== --}}

                <form
                    method="POST"
                    action="{{ route('verification.verify') }}"
                    class="verification-form"
                    autocomplete="one-time-code"
                >

                    @csrf


                    {{-- =================================================
                        CODE SECTION
                    ================================================== --}}

                    <section class="verification-section">

                        <div class="section-heading">

                            <h2>
                                Enter your verification code
                            </h2>

                            <p>
                                Enter the 6-digit code sent to your
                                email address.
                            </p>

                        </div>


                        <div class="form-group">

                            <label for="verification_code">
                                Verification code
                            </label>


                            <div class="code-input-wrapper">

                                <span
                                    class="code-icon"
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
                                            x="4"
                                            y="4"
                                            width="16"
                                            height="16"
                                            rx="3"
                                        />

                                        <path d="M8 8H8.01"/>
                                        <path d="M12 8H12.01"/>
                                        <path d="M16 8H16.01"/>

                                        <path d="M8 12H8.01"/>
                                        <path d="M12 12H12.01"/>
                                        <path d="M16 12H16.01"/>

                                        <path d="M8 16H8.01"/>
                                        <path d="M12 16H12.01"/>
                                        <path d="M16 16H16.01"/>

                                    </svg>

                                </span>


                                <input
                                    id="verification_code"
                                    name="verification_code"
                                    type="text"
                                    inputmode="numeric"
                                    pattern="[0-9]{6}"
                                    maxlength="6"
                                    minlength="6"
                                    autocomplete="one-time-code"
                                    value="{{ old('verification_code') }}"
                                    placeholder="000000"
                                    class="code-input {{ $errors->has('verification_code') ? 'input-error' : '' }}"
                                    aria-describedby="verification-help"
                                    aria-invalid="{{ $errors->has('verification_code') ? 'true' : 'false' }}"
                                    required
                                    autofocus
                                >

                            </div>


                            @error('verification_code')

                                <div
                                    class="field-error"
                                    role="alert"
                                >
                                    {{ $message }}
                                </div>

                            @enderror


                            <div
                                id="verification-help"
                                class="field-hint"
                            >
                                Enter all 6 digits from the message you received.
                            </div>

                        </div>

                    </section>


                    {{-- =================================================
                        SECURITY MESSAGE
                    ================================================== --}}

                    <div class="security-card">

                        <div class="security-icon">

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
                                    d="M12 3L19 6V11C19 15.5 16.1 19.2 12 21C7.9 19.2 5 15.5 5 11V6L12 3Z"
                                />

                                <path
                                    d="M9.5 12L11.2 13.7L14.8 10.1"
                                />

                            </svg>

                        </div>


                        <div>

                            <strong>
                                Your verification is secure.
                            </strong>

                            <p>
                                Your verification code is used only to
                                confirm your contact information and
                                protect your ORDO account.
                            </p>

                        </div>

                    </div>


                    {{-- =================================================
                        ACTIONS
                    ================================================== --}}

                    <div class="verification-actions">

                        <a
                            href="{{ route('register.contact') }}"
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


                        <button
                            type="submit"
                            class="btn btn-primary"
                        >

                            <span>
                                Verify contact
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
                    RESEND CODE
                ================================================== --}}

                <div class="resend-section">

                    <span>
                        Didn't receive the code?
                    </span>

                    <form
                        method="POST"
                        action="{{ route('verification.resend') }}"
                        class="resend-form"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="resend-button"
                        >
                            Resend code
                        </button>

                    </form>

                </div>


                {{-- =================================================
                    DEVELOPMENT NOTE
                ================================================== --}}

                <div class="development-note">

                    <strong>
                        Development mode:
                    </strong>

                    Use

                    <strong>
                        123456
                    </strong>

                    as the verification code for this mock registration flow.

                </div>


                {{-- =================================================
                    FOOTER
                ================================================== --}}

                <div class="verification-footer">

                    <strong>
                        ORDO
                    </strong>

                    <span>
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


<style>

/* ================================================================
   VERIFICATION PAGE
   The left registration panel is provided by layouts.registration.
   This file only controls the right-side verification page.
================================================================ */

.verification-page {
    width: 100%;
    min-height: 100%;
    background: #ffffff;
    color: #06172f;
    font-family:
        Inter,
        ui-sans-serif,
        system-ui,
        -apple-system,
        BlinkMacSystemFont,
        "Segoe UI",
        sans-serif;
    -webkit-font-smoothing: antialiased;
}


/* ================================================================
   RIGHT MAIN
================================================================ */

.verification-main {
    width: 100%;
    min-width: 0;
    background: #ffffff;
}

.main-inner {
    width: 100%;
    max-width: 700px;
    min-height: 100%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
}


/* ================================================================
   HEADER
================================================================ */

.verification-header {
    padding: 50px 64px 0;
}

.verification-eyebrow {
    margin-bottom: 13px;
    color: #2563eb;
    font-size: 10px;
    font-weight: 850;
    letter-spacing: .14em;
    line-height: 1.4;
}

.verification-header h1 {
    margin: 0;
    color: #06172f;
    font-size: 42px;
    line-height: 1.05;
    letter-spacing: -.045em;
    font-weight: 850;
}

.verification-description {
    max-width: 500px;
    margin: 14px 0 0;
    color: #728098;
    font-size: 13px;
    line-height: 1.65;
}


/* ================================================================
   PROGRESS
================================================================ */

.progress-wrapper {
    display: grid;
    grid-template-columns: repeat(6, minmax(0, 1fr));
    gap: 8px;
    width: 100%;
    margin-top: 31px;
    padding-bottom: 28px;
}

.progress-segment {
    height: 5px;
    border-radius: 999px;
    background: #e5eaf1;
    transition:
        background .2s ease,
        box-shadow .2s ease;
}

.progress-segment.completed,
.progress-segment.active {
    background: #3478f6;
}

.progress-segment.active {
    box-shadow:
        0 0 0 2px rgba(52, 120, 246, .08);
}


/* ================================================================
   CONTENT
================================================================ */

.verification-content {
    padding: 0 64px 45px;
}


/* ================================================================
   ALERTS
================================================================ */

.alert {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 18px;
    padding: 12px;
    border-radius: 9px;
    font-size: 10px;
    line-height: 1.5;
}

.alert-icon {
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

.alert-success {
    border: 1px solid #c8ead8;
    background: #f1faf5;
    color: #17613b;
}

.alert-success .alert-icon {
    background: #23945c;
}

.alert-error {
    border: 1px solid #f1caca;
    background: #fff7f7;
    color: #8f2424;
}

.alert-error .alert-icon {
    background: #c93636;
}


/* ================================================================
   CONTACT SUMMARY
================================================================ */

.contact-summary {
    display: flex;
    align-items: center;
    gap: 13px;
    margin-bottom: 28px;
    padding: 13px 14px;
    border: 1px solid #dce4ee;
    border-radius: 11px;
    background: #ffffff;
    box-shadow:
        0 6px 20px rgba(6, 23, 47, .035);
}

.summary-icon {
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

.summary-icon svg {
    width: 20px;
    height: 20px;
}

.summary-text {
    min-width: 0;
}

.summary-text span {
    display: block;
    margin-bottom: 4px;
    color: #8995a7;
    font-size: 8px;
    font-weight: 850;
    letter-spacing: .12em;
}

.summary-text strong {
    display: block;
    color: #17253a;
    font-size: 12px;
    font-weight: 800;
    overflow-wrap: anywhere;
    word-break: break-word;
}

.summary-text small {
    display: block;
    margin-top: 3px;
    color: #8b97a8;
    font-size: 9px;
}


/* ================================================================
   VERIFICATION SECTION
================================================================ */

.verification-section {
    padding: 24px 0;
    border-top: 1px solid #e8edf3;
    border-bottom: 1px solid #e8edf3;
}

.section-heading {
    margin-bottom: 18px;
}

.section-heading h2 {
    margin: 0 0 5px;
    color: #06172f;
    font-size: 17px;
    font-weight: 800;
    letter-spacing: -.02em;
}

.section-heading p {
    margin: 0;
    color: #7a879a;
    font-size: 11px;
    line-height: 1.6;
}


/* ================================================================
   CODE INPUT
================================================================ */

.form-group label {
    display: block;
    margin-bottom: 7px;
    color: #1e2d43;
    font-size: 11px;
    font-weight: 800;
}

.code-input-wrapper {
    position: relative;
    width: 100%;
}

.code-icon {
    position: absolute;
    left: 15px;
    top: 50%;
    display: flex;
    color: #8795a9;
    transform: translateY(-50%);
    pointer-events: none;
    z-index: 2;
}

.code-icon svg {
    width: 18px;
    height: 18px;
}

.code-input-wrapper:focus-within .code-icon {
    color: #2563eb;
}

.code-input {
    box-sizing: border-box;
    width: 100%;
    height: 56px;
    padding: 0 18px 0 47px;
    border: 1px solid #ccd7e4;
    border-radius: 10px;
    outline: none;
    background: #ffffff;
    color: #06172f;
    font-family: inherit;
    font-size: 20px;
    font-weight: 800;
    letter-spacing: .32em;
    transition:
        border-color .18s ease,
        box-shadow .18s ease,
        background .18s ease;
}

.code-input::placeholder {
    color: #b9c4d2;
    opacity: 1;
    letter-spacing: .28em;
}

.code-input:focus {
    border-color: #3478f6;
    box-shadow:
        0 0 0 3px rgba(52, 120, 246, .10);
}

.code-input.input-error {
    border-color: #dc2626;
    box-shadow:
        0 0 0 3px rgba(220, 38, 38, .07);
}

.field-hint {
    margin-top: 7px;
    color: #8b97a8;
    font-size: 9.5px;
    line-height: 1.5;
}

.field-error {
    margin-top: 6px;
    color: #b42318;
    font-size: 10px;
    line-height: 1.5;
}


/* ================================================================
   SECURITY CARD
================================================================ */

.security-card {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin: 22px 0 24px;
    padding: 14px;
    border: 1px solid #d8e5f7;
    border-radius: 10px;
    background: #f5f9ff;
}

.security-icon {
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

.security-icon svg {
    width: 17px;
    height: 17px;
}

.security-card strong {
    display: block;
    margin-bottom: 4px;
    color: #26364d;
    font-size: 11px;
    font-weight: 800;
}

.security-card p {
    margin: 0;
    color: #718096;
    font-size: 9.5px;
    line-height: 1.55;
}


/* ================================================================
   ACTIONS
================================================================ */

.verification-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding-top: 20px;
}

.btn {
    min-height: 45px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 0 17px;
    border-radius: 9px;
    font-family: inherit;
    font-size: 11px;
    font-weight: 800;
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
    outline: none;
    box-shadow:
        0 0 0 3px rgba(52, 120, 246, .15);
}

.btn svg {
    width: 16px;
    height: 16px;
    flex: 0 0 16px;
}

.btn-secondary {
    border: 1px solid #d5dee9;
    background: #ffffff;
    color: #46546a;
}

.btn-secondary:hover {
    background: #f8fafc;
    border-color: #c8d3e0;
}

.btn-primary {
    min-width: 145px;
    border: 1px solid #3478f6;
    background: #3478f6;
    color: #ffffff;
    box-shadow:
        0 6px 18px rgba(52, 120, 246, .18);
}

.btn-primary:hover {
    background: #2563eb;
    border-color: #2563eb;
    box-shadow:
        0 8px 22px rgba(52, 120, 246, .22);
}

.btn-primary:active {
    transform: translateY(0);
    box-shadow:
        0 4px 12px rgba(52, 120, 246, .16);
}


/* ================================================================
   RESEND
================================================================ */

.resend-section {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    margin-top: 23px;
    padding-top: 20px;
    border-top: 1px solid #e8edf3;
    color: #7a879a;
    font-size: 10px;
}

.resend-form {
    display: inline;
    margin: 0;
}

.resend-button {
    padding: 0;
    border: 0;
    background: transparent;
    color: #2563eb;
    font-family: inherit;
    font-size: 10px;
    font-weight: 800;
    cursor: pointer;
    text-decoration: underline;
    text-underline-offset: 3px;
}

.resend-button:hover {
    color: #1d4ed8;
}

.resend-button:focus-visible {
    outline: none;
    border-radius: 3px;
    box-shadow:
        0 0 0 3px rgba(37, 99, 235, .12);
}


/* ================================================================
   DEVELOPMENT NOTE
================================================================ */

.development-note {
    margin-top: 18px;
    padding: 11px 13px;
    border: 1px dashed #cbd5e1;
    border-radius: 9px;
    background: #f8fafc;
    color: #7a879a;
    font-size: 9px;
    line-height: 1.5;
    text-align: center;
}

.development-note strong {
    color: #334155;
}


/* ================================================================
   FOOTER
================================================================ */

.verification-footer {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    margin-top: 25px;
    color: #a0a9b6;
    font-size: 9px;
}

.verification-footer strong {
    color: #2563eb;
    letter-spacing: .08em;
}


/* ================================================================
   TABLET
================================================================ */

@media (max-width: 1050px) {

    .verification-header {
        padding: 42px 48px 0;
    }

    .verification-content {
        padding: 0 48px 40px;
    }

    .verification-header h1 {
        font-size: 38px;
    }

}


/* ================================================================
   MOBILE
================================================================ */

@media (max-width: 760px) {

    .verification-page {
        width: 100%;
    }

    .main-inner {
        max-width: none;
    }

    .verification-header {
        padding: 35px 24px 0;
    }

    .verification-header h1 {
        font-size: 35px;
    }

    .verification-content {
        padding: 0 24px 35px;
    }

}


/* ================================================================
   SMALL MOBILE
================================================================ */

@media (max-width: 430px) {

    .verification-header {
        padding: 30px 18px 0;
    }

    .verification-content {
        padding: 0 18px 30px;
    }

    .verification-header h1 {
        font-size: 30px;
    }

    .verification-description {
        font-size: 12px;
    }

    .progress-wrapper {
        gap: 5px;
    }

    .contact-summary {
        align-items: flex-start;
    }

    .code-input {
        font-size: 18px;
        letter-spacing: .24em;
    }

    .verification-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .btn {
        width: 100%;
    }

    .resend-section {
        flex-wrap: wrap;
    }

}

</style>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('verification_code');

    if (!input) {
        return;
    }


    /*
     * Allow numbers only.
     */

    input.addEventListener('input', function () {

        this.value = this.value
            .replace(/\D/g, '')
            .slice(0, 6);

    });


    /*
     * Clean pasted values.
     */

    input.addEventListener('paste', function () {

        setTimeout(function () {

            input.value = input.value
                .replace(/\D/g, '')
                .slice(0, 6);

        }, 0);

    });


    /*
     * Prevent accidental spaces.
     */

    input.addEventListener('keydown', function (event) {

        if (event.key === ' ') {
            event.preventDefault();
        }

    });


    /*
     * Automatically submit when exactly 6 digits
     * have been entered.
     *
     * This makes the verification flow faster while
     * still allowing the user to press the button manually.
     */

    input.addEventListener('input', function () {

        if (this.value.length === 6) {

            this.setCustomValidity('');

        } else {

            this.setCustomValidity(
                'Please enter the 6-digit verification code.'
            );

        }

    });

});

</script>

@endsection