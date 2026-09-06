@extends('layouts.registration')

@section('title', 'Your professional account — ORDO')

@section('content')




<div class="registration-page">

    {{-- =========================================================
         TOP ACCOUNT AREA
    ========================================================== --}}

    <div class="registration-top">

        <a
            href="{{ route('login') }}"
            class="registration-account-link"
        >
            Already have an account?
            <strong>Sign in</strong>
        </a>

    </div>


    {{-- =========================================================
         6-STEP PROGRESS
         STEP 1 = COMPLETED
         STEP 2 = COMPLETED
         STEP 3 = ACTIVE
         STEP 4 = PENDING
         STEP 5 = PENDING
         STEP 6 = PENDING
    ========================================================== --}}

    <div
        class="registration-progress"
        role="progressbar"
        aria-label="Registration progress"
        aria-valuemin="1"
        aria-valuemax="6"
        aria-valuenow="3"
    >

        {{-- STEP 1 --}}
        <div class="progress-segment completed"></div>

        {{-- STEP 2 --}}
        <div class="progress-segment completed"></div>

        {{-- STEP 3 --}}
        <div
            class="progress-segment active"
            aria-current="step"
        ></div>

        {{-- STEP 4 --}}
        <div class="progress-segment"></div>

        {{-- STEP 5 --}}
        <div class="progress-segment"></div>

        {{-- STEP 6 --}}
        <div class="progress-segment"></div>

    </div>


    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="registration-header">

        <div class="registration-eyebrow">
            Create your ORDO account
        </div>

        <h1>
            Your professional account
        </h1>

        <p>
            Tell us about your profession or practice.
            You can provide more complete profile details later.
        </p>

    </div>


    {{-- =========================================================
         VALIDATION ERRORS
    ========================================================== --}}

    @if ($errors->any())

        <div
            class="form-alert"
            role="alert"
            aria-live="polite"
        >

            <div
                class="form-alert-icon"
                aria-hidden="true"
            >
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


    {{-- =========================================================
         FORM
    ========================================================== --}}

    <form
        method="POST"
        action="{{ route('profession.update') }}"
        class="registration-form"
    >

        @csrf


        {{-- =====================================================
             ACCOUNT TYPE
        ====================================================== --}}

        <div class="account-type-card">

            <div class="account-type-icon">

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
                        d="M5 20c.8-3.3 3.1-5 7-5s6.2 1.7 7 5"
                    />
                </svg>

            </div>

            <div class="account-type-content">

                <div class="account-type-eyebrow">
                    Account type
                </div>

                <div class="account-type-title">
                    Professional / Practice account
                </div>

                <div class="account-type-description">
                    For professionals, practitioners and independent practices.
                </div>

            </div>

        </div>


        {{-- =====================================================
             PROFESSIONAL / PRACTICE NAME
        ====================================================== --}}

        <div class="form-group">

            <label for="practice_name">

                Professional / Practice Name

                <span class="required">
                    *
                </span>

            </label>

            <input
                type="text"
                id="practice_name"
                name="practice_name"
                value="{{ old('practice_name', $information['practice_name'] ?? '') }}"
                placeholder="Enter your professional or practice name"
                maxlength="150"
                autocomplete="organization"
                required
            >

            <div class="field-help">
                Use the name you want associated with your ORDO account.
            </div>

            @error('practice_name')
                <div class="field-error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- =====================================================
             PROFESSION / PRACTICE TYPE
        ====================================================== --}}

        <div class="form-group">

            <label for="profession">

                Profession / Practice Type

                <span class="required">
                    *
                </span>

            </label>

            <div class="select-wrapper">

                <select
                    id="profession"
                    name="profession"
                    required
                >

                    <option value="">
                        Select a type
                    </option>

                    <option
                        value="Professional"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Professional'
                        )
                    >
                        Professional
                    </option>

                    <option
                        value="Practitioner"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Practitioner'
                        )
                    >
                        Practitioner
                    </option>

                    <option
                        value="Consultant"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Consultant'
                        )
                    >
                        Consultant
                    </option>

                    <option
                        value="Clinic"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Clinic'
                        )
                    >
                        Clinic
                    </option>

                    <option
                        value="Office"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Office'
                        )
                    >
                        Office
                    </option>

                    <option
                        value="Independent Practice"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Independent Practice'
                        )
                    >
                        Independent Practice
                    </option>

                    <option
                        value="Other"
                        @selected(
                            old(
                                'profession',
                                $information['profession'] ?? ''
                            ) === 'Other'
                        )
                    >
                        Other
                    </option>

                </select>

                <svg
                    class="select-arrow"
                    viewBox="0 0 24 24"
                    fill="none"
                    aria-hidden="true"
                >
                    <path
                        d="M6 9l6 6 6-6"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>

            </div>

            @error('profession')
                <div class="field-error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- =====================================================
             DESCRIPTION
        ====================================================== --}}

        <div class="form-group">

            <label for="description">

                Description

                <span class="optional">
                    (optional)
                </span>

            </label>

            <textarea
                id="description"
                name="description"
                rows="4"
                maxlength="1000"
                placeholder="Briefly describe your profession, practice or services."
            >{{ old('description', $information['description'] ?? '') }}</textarea>

            <div class="field-help">
                You can provide more complete profile details later.
            </div>

            @error('description')
                <div class="field-error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- =====================================================
             COUNTRY / REGION
        ====================================================== --}}

        <div class="form-group">

            <label for="country">

                Country / Region

                <span class="required">
                    *
                </span>

            </label>

            <div class="select-wrapper">

                <select
                    id="country"
                    name="country"
                    required
                >

                    <option value="">
                        Select country / region
                    </option>

                    <option
                        value="Philippines"
                        @selected(
                            old(
                                'country',
                                $information['country'] ?? 'Philippines'
                            ) === 'Philippines'
                        )
                    >
                        Philippines
                    </option>

                    <option
                        value="United States"
                        @selected(
                            old(
                                'country',
                                $information['country'] ?? ''
                            ) === 'United States'
                        )
                    >
                        United States
                    </option>

                    <option
                        value="Singapore"
                        @selected(
                            old(
                                'country',
                                $information['country'] ?? ''
                            ) === 'Singapore'
                        )
                    >
                        Singapore
                    </option>

                    <option
                        value="Other"
                        @selected(
                            old(
                                'country',
                                $information['country'] ?? ''
                            ) === 'Other'
                        )
                    >
                        Other
                    </option>

                </select>

                <svg
                    class="select-arrow"
                    viewBox="0 0 24 24"
                    fill="none"
                    aria-hidden="true"
                >
                    <path
                        d="M6 9l6 6 6-6"
                        stroke="currentColor"
                        stroke-width="1.8"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>

            </div>

            @error('country')
                <div class="field-error">
                    {{ $message }}
                </div>
            @enderror

        </div>


        {{-- =====================================================
             ACTIONS
        ====================================================== --}}

        <div class="registration-actions">

            <a
                href="{{ route('register.account') }}"
                class="btn-secondary"
            >

                <span
                    class="btn-arrow"
                    aria-hidden="true"
                >
                    ←
                </span>

                Back to Account

            </a>


            <button
                type="submit"
                class="btn-primary"
            >

                Continue

                <span
                    class="btn-arrow"
                    aria-hidden="true"
                >
                    →
                </span>

            </button>

        </div>

    </form>

</div>

@endsection