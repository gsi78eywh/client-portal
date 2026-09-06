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