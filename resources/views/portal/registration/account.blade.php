@extends('layouts.registration')

@section('title', 'Choose your account — ORDO')

@section('content')
<div class="registration-page">
        <div class="form-container">


            <!-- HEADER -->

            <div class="form-eyebrow">
                CREATE YOUR ORDO ACCOUNT
            </div>

            <h2 class="form-title">
                How will you use ORDO?
            </h2>

            <p class="form-description">
                This helps us prepare the right account structure
                before you enter the system.
            </p>


            <!-- =================================================
                 PROGRESS
                 ================================================= -->

            <div
                class="registration-progress"
                aria-label="Registration progress"
            >

                <!-- STEP 1 COMPLETE -->

                <div class="progress-segment active"></div>

                <!-- STEP 2 CURRENT -->

                <div class="progress-segment active"></div>

                <!-- STEP 3 -->

                <div class="progress-segment"></div>

                <!-- STEP 4 -->

                <div class="progress-segment"></div>

                <!-- STEP 5 -->

                <div class="progress-segment"></div>

                <!-- STEP 6 -->

                <div class="progress-segment"></div>

            </div>


            <!-- =================================================
                 ACCOUNT TYPE FORM
                 ================================================= -->

            <form
                method="POST"
                action="{{ route('account.update') }}"
                id="accountTypeForm"
            >

                @csrf


                <!-- =============================================
                     FOR MYSELF
                     ============================================= -->

                <label class="account-option">

                    <input
                        type="radio"
                        name="account_type"
                        value="personal"
                        {{ old('account_type', $accountType ?? '') === 'personal' ? 'checked' : '' }}
                    >

                    <div class="account-card">

                        <div class="account-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <circle
                                    cx="12"
                                    cy="8"
                                    r="3"
                                ></circle>

                                <path
                                    d="M5.5 20c.8-3.3 3.1-5 6.5-5s5.7 1.7 6.5 5"
                                ></path>
                            </svg>

                        </div>


                        <div class="account-copy">

                            <div class="account-title">
                                For myself
                            </div>

                            <div class="account-description">
                                A personal account for your own records,
                                compliance or professional matters.
                            </div>

                        </div>


                        <div class="account-check">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M5 12l4 4L19 6"></path>
                            </svg>

                        </div>

                    </div>

                </label>


                <!-- =============================================
                     PROFESSION / PRACTICE
                     ============================================= -->

                <label class="account-option">

                    <input
                        type="radio"
                        name="account_type"
                        value="profession"
                        {{ old('account_type', $accountType ?? '') === 'profession' ? 'checked' : '' }}
                    >

                    <div class="account-card">

                        <div class="account-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <rect
                                    x="5"
                                    y="7"
                                    width="14"
                                    height="12"
                                    rx="2"
                                ></rect>

                                <path d="M9 7V5h6v2"></path>

                                <path d="M5 12h14"></path>

                                <path d="M10 12v2h4v-2"></path>
                            </svg>

                        </div>


                        <div class="account-copy">

                            <div class="account-title">
                                For my profession or practice
                            </div>

                            <div class="account-description">
                                For a professional, practitioner,
                                consultant, clinic, office or
                                independent practice.
                            </div>

                        </div>


                        <div class="account-check">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M5 12l4 4L19 6"></path>
                            </svg>

                        </div>

                    </div>

                </label>


                <!-- =============================================
                     BUSINESS / ORGANIZATION
                     ============================================= -->

                <label class="account-option">

                    <input
                        type="radio"
                        name="account_type"
                        value="business"
                        {{ old('account_type', $accountType ?? '') === 'business' ? 'checked' : '' }}
                    >

                    <div class="account-card">

                        <div class="account-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path
                                    d="M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16"
                                ></path>

                                <path d="M3 21h18"></path>

                                <path d="M9 7h2"></path>
                                <path d="M13 7h2"></path>

                                <path d="M9 11h2"></path>
                                <path d="M13 11h2"></path>

                                <path d="M10 21v-5h4v5"></path>
                            </svg>

                        </div>


                        <div class="account-copy">

                            <div class="account-title">
                                For a business or organization
                            </div>

                            <div class="account-description">
                                For a corporation, OPC, sole proprietorship,
                                partnership, association, cooperative or
                                other organization.
                            </div>

                        </div>


                        <div class="account-check">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M5 12l4 4L19 6"></path>
                            </svg>

                        </div>

                    </div>

                </label>


                <!-- =============================================
                     INVITED
                     ============================================= -->

                <label class="account-option">

                    <input
                        type="radio"
                        name="account_type"
                        value="invited"
                        {{ old('account_type', $accountType ?? '') === 'invited' ? 'checked' : '' }}
                    >

                    <div class="account-card">

                        <div class="account-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <circle
                                    cx="9"
                                    cy="8"
                                    r="3"
                                ></circle>

                                <path
                                    d="M3.5 19c.7-3 2.7-4.5 5.5-4.5"
                                ></path>

                                <path d="M17 8v6"></path>
                                <path d="M14 11h6"></path>
                            </svg>

                        </div>


                        <div class="account-copy">

                            <div class="account-title">
                                I was invited to an existing account
                            </div>

                            <div class="account-description">
                                Join an existing ORDO account using an
                                invitation provided by an organization,
                                practice or account administrator.
                            </div>

                        </div>


                        <div class="account-check">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="M5 12l4 4L19 6"></path>
                            </svg>

                        </div>

                    </div>

                </label>


                <!-- =============================================
                     VALIDATION ERROR
                     ============================================= -->

                @error('account_type')

                    <div class="form-error">
                        {{ $message }}
                    </div>

                @enderror


                <!-- =============================================
                     ACTION BUTTONS
                     ============================================= -->

                <div class="form-actions">

                    <a
                        href="{{ route('register.profile') }}"
                        class="back-button"
                    >

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M19 12H5"></path>
                            <path d="M12 19l-7-7 7-7"></path>
                        </svg>

                        Back

                    </a>


                    <button
                        type="submit"
                        class="continue-button"
                    >

                        Continue

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M5 12h14"></path>
                            <path d="M13 6l6 6-6 6"></path>
                        </svg>

                    </button>

                </div>


                <div class="step-label">
                    Step 2 of 6
                </div>

            </form>

        </div>
</div>
@endsection

@push('scripts')
<script>

    /*
     * Make the entire account card behave naturally as a
     * selectable radio option.
     *
     * The label already handles selection, so this is only
     * used to make sure keyboard / click interaction remains
     * smooth.
     */

    document
        .querySelectorAll('.account-option')
        .forEach(function (option) {

            option.addEventListener('click', function () {

                const radio =
                    option.querySelector(
                        'input[type="radio"]'
                    );

                if (radio) {
                    radio.checked = true;
                }

            });

        });

</script>
@endpush
