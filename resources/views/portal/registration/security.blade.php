@extends('layouts.registration')

@section('title', 'Create your password — ORDO')

@section('content')
<div class="registration-page">
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
</div>
@endsection

@push('scripts')
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
@endpush
