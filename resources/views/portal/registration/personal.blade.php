@extends('layouts.registration')

@section('title', 'Personal Account — ORDO')

@section('content')
<div class="registration-page">
        <div class="form-container">


            {{-- =================================================
                 REGISTRATION HEADER
            ================================================== --}}

            <div class="registration-top">

                <div class="registration-eyebrow">
                    CREATE YOUR ORDO ACCOUNT
                </div>

                <h1>
                    Your personal account
                </h1>

                <p class="registration-description">
                    Tell us about your personal ORDO account.
                    This account is being created for your own
                    records, compliance, or professional matters.
                </p>


                {{-- =================================================
                     6-STEP SEGMENTED PROGRESS
                     STEP 3 IS ACTIVE
                ================================================== --}}

                <div
                    class="progress-bar"
                    aria-label="Step 3 of 6"
                    role="progressbar"
                    aria-valuemin="1"
                    aria-valuemax="6"
                    aria-valuenow="3"
                >

                    {{-- STEP 1 --}}

                    <span
                        class="progress-segment completed"
                        aria-label="Step 1 completed"
                    ></span>


                    {{-- STEP 2 --}}

                    <span
                        class="progress-segment completed"
                        aria-label="Step 2 completed"
                    ></span>


                    {{-- STEP 3 --}}

                    <span
                        class="progress-segment active"
                        aria-current="step"
                        aria-label="Step 3 current"
                    ></span>


                    {{-- STEP 4 --}}

                    <span
                        class="progress-segment"
                        aria-label="Step 4"
                    ></span>


                    {{-- STEP 5 --}}

                    <span
                        class="progress-segment"
                        aria-label="Step 5"
                    ></span>


                    {{-- STEP 6 --}}

                    <span
                        class="progress-segment"
                        aria-label="Step 6"
                    ></span>

                </div>

            </div>


            {{-- =================================================
                 FORM CONTENT
            ================================================== --}}

            <div class="form-content">


                {{-- =================================================
                     VALIDATION ERRORS
                ================================================== --}}

                @if ($errors->any())

                    <div
                        class="error-box"
                        role="alert"
                        aria-live="polite"
                    >

                        <strong>
                            Please check the information below.
                        </strong>

                        @foreach ($errors->all() as $error)

                            <div>
                                {{ $error }}
                            </div>

                        @endforeach

                    </div>

                @endif


                {{-- =================================================
                     FORM
                ================================================== --}}

                <form
                    method="POST"
                    action="{{ route('personal.update') }}"
                >

                    @csrf


                    {{-- =================================================
                         ACCOUNT BADGE
                    ================================================== --}}

                    <div class="account-badge">

                        <div class="account-badge-icon">

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
                                    d="M5 20c.8-3.6 3.1-5.5 7-5.5s6.2 1.9 7 5.5"
                                />

                            </svg>

                        </div>

                        <div>

                            <div class="account-badge-title">
                                Personal account
                            </div>

                            <div class="account-badge-description">
                                For your own records and professional matters.
                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                         ACCOUNT NAME
                    ================================================== --}}

                    <div class="field">

                        <label for="account_name">

                            Account name

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input
                            type="text"
                            id="account_name"
                            name="account_name"
                            value="{{ old('account_name', $data['account_name'] ?? '') }}"
                            placeholder="John Mark Torres"
                            autocomplete="name"
                            required
                            autofocus
                        >

                        <div class="field-hint">
                            Use the name you want displayed on your personal ORDO account.
                        </div>

                        @error('account_name')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- =================================================
                         PURPOSE
                    ================================================== --}}

                    <div class="field">

                        <label for="purpose">
                            Purpose of this account
                        </label>

                        <select
                            id="purpose"
                            name="purpose"
                        >

                            <option value="">
                                Select a purpose
                            </option>

                            <option
                                value="Personal records / compliance / professional matters"
                                @selected(
                                    old(
                                        'purpose',
                                        $data['purpose'] ?? ''
                                    ) === 'Personal records / compliance / professional matters'
                                )
                            >
                                Personal records / compliance / professional matters
                            </option>

                            <option
                                value="Personal records"
                                @selected(
                                    old(
                                        'purpose',
                                        $data['purpose'] ?? ''
                                    ) === 'Personal records'
                                )
                            >
                                Personal records
                            </option>

                            <option
                                value="Compliance"
                                @selected(
                                    old(
                                        'purpose',
                                        $data['purpose'] ?? ''
                                    ) === 'Compliance'
                                )
                            >
                                Compliance
                            </option>

                            <option
                                value="Professional matters"
                                @selected(
                                    old(
                                        'purpose',
                                        $data['purpose'] ?? ''
                                    ) === 'Professional matters'
                                )
                            >
                                Professional matters
                            </option>

                            <option
                                value="Other"
                                @selected(
                                    old(
                                        'purpose',
                                        $data['purpose'] ?? ''
                                    ) === 'Other'
                                )
                            >
                                Other
                            </option>

                        </select>

                        @error('purpose')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- =================================================
                         COUNTRY
                    ================================================== --}}

                    <div class="field">

                        <label for="country">

                            Country / Region

                            <span class="required">
                                *
                            </span>

                        </label>

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
                                        $data['country'] ?? 'Philippines'
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
                                        $data['country'] ?? ''
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
                                        $data['country'] ?? ''
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
                                        $data['country'] ?? ''
                                    ) === 'Other'
                                )
                            >
                                Other
                            </option>

                        </select>

                        @error('country')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- =================================================
                         FORM FOOTER
                    ================================================== --}}

                    <div class="form-footer">

                        <a
                            href="{{ route('register.account') }}"
                            class="back-link"
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                                width="13"
                                height="13"
                            >

                                <path d="M19 12H5"/>
                                <path d="m12 19-7-7 7-7"/>

                            </svg>

                            Back to Account

                        </a>


                        <button
                            type="submit"
                            class="continue-button"
                        >

                            <span>
                                Continue
                            </span>

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                aria-hidden="true"
                            >

                                <path d="M5 12h14"/>
                                <path d="m13 6 6 6-6 6"/>

                            </svg>

                        </button>

                    </div>

                </form>

            </div>

        </div>


        {{-- =========================================================
             FOOTER
        ========================================================== --}}

        <footer class="registration-footer">

            Your information is used only to set up your ORDO account.

        </footer>
</div>
@endsection
