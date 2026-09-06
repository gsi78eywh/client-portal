@extends('layouts.registration')

@section('title', 'Account Ready — ORDO')

@section('content')
<div class="registration-page">
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

</div>
@endsection

@push('scripts')
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
@endpush
