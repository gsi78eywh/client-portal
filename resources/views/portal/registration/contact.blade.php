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