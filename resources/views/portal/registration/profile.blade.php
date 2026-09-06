@extends('layouts.registration')

@section('title', 'Profile — Create your ORDO account')

@section('content')
<div class="registration-page">
        <div class="form-container">


            {{-- =================================================
                 FORM HEADER
            ================================================== --}}

            <span class="form-tag">
                Create your ORDO account
            </span>


            <h1 class="form-title">
                Tell us about you
            </h1>


            <p class="form-subtitle">
                This creates your personal ORDO identity.
                We’ll ask about the account you’re creating
                in the next step.
            </p>


            {{-- =================================================
                 PROGRESS
            ================================================== --}}

            <div
                class="registration-progress"
                aria-label="Registration progress: Step 3 of 6"
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
                    aria-hidden="true"
                ></span>


                {{-- STEP 5 --}}

                <span
                    class="progress-segment"
                    aria-hidden="true"
                ></span>


                {{-- STEP 6 --}}

                <span
                    class="progress-segment"
                    aria-hidden="true"
                ></span>

            </div>


            {{-- =================================================
                 SUCCESS MESSAGE
            ================================================== --}}

            @if (session('success'))

                <div
                    class="alert alert-success"
                    role="status"
                >

                    <span
                        class="alert-icon"
                        aria-hidden="true"
                    >
                        ✓
                    </span>


                    <span>
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            {{-- =================================================
                 ERROR MESSAGE
            ================================================== --}}

            @if ($errors->any())

                <div
                    class="alert alert-error"
                    role="alert"
                >

                    <span
                        class="alert-icon"
                        aria-hidden="true"
                    >
                        !
                    </span>


                    <div>

                        <strong>
                            Please check the following:
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
                 PROFILE FORM
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('profile.update') }}"
                class="registration-form"
                id="profileForm"
            >

                @csrf


                <div class="form-grid">


                    {{-- =================================================
                         FIRST NAME
                    ================================================== --}}

                    <div class="form-group">

                        <label
                            for="first_name"
                            class="form-label"
                        >

                            First name

                            <span class="required">
                                *
                            </span>

                        </label>


                        <div class="input-wrapper has-icon">

                            <span
                                class="field-icon"
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

                                    <circle
                                        cx="12"
                                        cy="8"
                                        r="3.5"
                                    ></circle>

                                    <path
                                        d="M5 20c.8-3.3 3.1-5 7-5s6.2 1.7 7 5"
                                    ></path>

                                </svg>

                            </span>


                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                class="form-input @error('first_name') is-invalid @enderror"
                                value="{{ old('first_name') }}"
                                placeholder="Enter your first name"
                                autocomplete="given-name"
                                maxlength="100"
                                required
                            >

                        </div>


                        @error('first_name')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- =================================================
                         MIDDLE NAME
                    ================================================== --}}

                    <div class="form-group">

                        <label
                            for="middle_name"
                            class="form-label"
                        >
                            Middle name
                        </label>


                        <div class="input-wrapper has-icon">

                            <span
                                class="field-icon"
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

                                    <circle
                                        cx="12"
                                        cy="8"
                                        r="3.5"
                                    ></circle>

                                    <path
                                        d="M5 20c.8-3.3 3.1-5 7-5s6.2 1.7 7 5"
                                    ></path>

                                </svg>

                            </span>


                            <input
                                type="text"
                                id="middle_name"
                                name="middle_name"
                                class="form-input @error('middle_name') is-invalid @enderror"
                                value="{{ old('middle_name') }}"
                                placeholder="Enter your middle name"
                                autocomplete="additional-name"
                                maxlength="100"
                            >

                        </div>


                        @error('middle_name')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- =================================================
                         LAST NAME
                    ================================================== --}}

                    <div class="form-group">

                        <label
                            for="last_name"
                            class="form-label"
                        >

                            Last name

                            <span class="required">
                                *
                            </span>

                        </label>


                        <div class="input-wrapper has-icon">

                            <span
                                class="field-icon"
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

                                    <circle
                                        cx="12"
                                        cy="8"
                                        r="3.5"
                                    ></circle>

                                    <path
                                        d="M5 20c.8-3.3 3.1-5 7-5s6.2 1.7 7 5"
                                    ></path>

                                </svg>

                            </span>


                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                class="form-input @error('last_name') is-invalid @enderror"
                                value="{{ old('last_name') }}"
                                placeholder="Enter your last name"
                                autocomplete="family-name"
                                maxlength="100"
                                required
                            >

                        </div>


                        @error('last_name')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- =================================================
                         SUFFIX
                    ================================================== --}}

                    <div class="form-group">

                        <label
                            for="suffix"
                            class="form-label"
                        >
                            Suffix
                        </label>


                        <div class="select-wrapper has-icon">

                            <span
                                class="field-icon"
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

                                    <path d="M6 4v16"></path>

                                    <path
                                        d="M6 4h7a4 4 0 0 1 0 8H6"
                                    ></path>

                                </svg>

                            </span>


                            <select
                                id="suffix"
                                name="suffix"
                                class="form-select @error('suffix') is-invalid @enderror"
                            >

                                <option value="">
                                    Optional
                                </option>


                                <option
                                    value="Jr."
                                    {{ old('suffix') === 'Jr.' ? 'selected' : '' }}
                                >
                                    Jr.
                                </option>


                                <option
                                    value="Sr."
                                    {{ old('suffix') === 'Sr.' ? 'selected' : '' }}
                                >
                                    Sr.
                                </option>


                                <option
                                    value="II"
                                    {{ old('suffix') === 'II' ? 'selected' : '' }}
                                >
                                    II
                                </option>


                                <option
                                    value="III"
                                    {{ old('suffix') === 'III' ? 'selected' : '' }}
                                >
                                    III
                                </option>


                                <option
                                    value="IV"
                                    {{ old('suffix') === 'IV' ? 'selected' : '' }}
                                >
                                    IV
                                </option>

                            </select>

                        </div>


                        @error('suffix')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- =================================================
                         DATE OF BIRTH
                    ================================================== --}}

                    <div class="form-group">

                        <label
                            for="date_of_birth"
                            class="form-label"
                        >

                            Date of birth

                            <span class="required">
                                *
                            </span>

                        </label>


                        <div class="input-wrapper has-icon">

                            <span
                                class="field-icon"
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

                                    <rect
                                        x="3"
                                        y="5"
                                        width="18"
                                        height="16"
                                        rx="2"
                                    ></rect>

                                    <path d="M16 3v4"></path>

                                    <path d="M8 3v4"></path>

                                    <path d="M3 10h18"></path>

                                </svg>

                            </span>


                            <input
                                type="date"
                                id="date_of_birth"
                                name="date_of_birth"
                                class="form-input @error('date_of_birth') is-invalid @enderror"
                                value="{{ old('date_of_birth') }}"
                                autocomplete="bday"
                                required
                            >

                        </div>


                        @error('date_of_birth')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- =================================================
                         GENDER
                    ================================================== --}}

                    <div class="form-group">

                        <label
                            for="gender"
                            class="form-label"
                        >
                            Gender
                        </label>


                        <div class="select-wrapper has-icon">

                            <span
                                class="field-icon"
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

                                    <circle
                                        cx="9"
                                        cy="8"
                                        r="3"
                                    ></circle>

                                    <path
                                        d="M3.5 20c.7-3.1 2.5-4.7 5.5-4.7s4.8 1.6 5.5 4.7"
                                    ></path>

                                    <path d="M16 5h4"></path>

                                    <path d="M18 3v4"></path>

                                </svg>

                            </span>


                            <select
                                id="gender"
                                name="gender"
                                class="form-select @error('gender') is-invalid @enderror"
                            >

                                <option
                                    value=""
                                    {{ old('gender', '') === '' ? 'selected' : '' }}
                                >
                                    Prefer not to say
                                </option>


                                <option
                                    value="male"
                                    {{ old('gender') === 'male' ? 'selected' : '' }}
                                >
                                    Male
                                </option>


                                <option
                                    value="female"
                                    {{ old('gender') === 'female' ? 'selected' : '' }}
                                >
                                    Female
                                </option>


                                <option
                                    value="other"
                                    {{ old('gender') === 'other' ? 'selected' : '' }}
                                >
                                    Other
                                </option>

                            </select>

                        </div>


                        @error('gender')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    {{-- =================================================
                         COUNTRY / REGION
                    ================================================== --}}

                    <div class="form-group form-group-full">

                        <label
                            for="country"
                            class="form-label"
                        >

                            Country / Region

                            <span class="required">
                                *
                            </span>

                        </label>


                        <div class="select-wrapper has-icon">

                            <span
                                class="field-icon"
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

                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="9"
                                    ></circle>

                                    <path d="M3 12h18"></path>

                                    <path
                                        d="M12 3c2.4 2.5 3.6 5.5 3.6 9s-1.2 6.5-3.6 9"
                                    ></path>

                                    <path
                                        d="M12 3c-2.4 2.5-3.6 5.5-3.6 9s1.2 6.5 3.6 9"
                                    ></path>

                                </svg>

                            </span>


                            <select
                                id="country"
                                name="country"
                                class="form-select @error('country') is-invalid @enderror"
                                required
                            >

                                <option value="">
                                    Select country / region
                                </option>


                                <option
                                    value="Philippines"
                                    {{ old('country', 'Philippines') === 'Philippines' ? 'selected' : '' }}
                                >
                                    Philippines
                                </option>


                                <option
                                    value="Australia"
                                    {{ old('country') === 'Australia' ? 'selected' : '' }}
                                >
                                    Australia
                                </option>


                                <option
                                    value="New Zealand"
                                    {{ old('country') === 'New Zealand' ? 'selected' : '' }}
                                >
                                    New Zealand
                                </option>


                                <option
                                    value="Singapore"
                                    {{ old('country') === 'Singapore' ? 'selected' : '' }}
                                >
                                    Singapore
                                </option>

                            </select>

                        </div>


                        @error('country')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                </div>


                {{-- =================================================
                     ACTIONS
                ================================================== --}}

                <div class="registration-actions">


                    {{-- BACK --}}

                    <a
                        href="{{ url('/register/information') }}"
                        class="back-button"
                    >

                        <span
                            class="button-icon"
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

                                <path d="M19 12H5"></path>

                                <path d="m12 19-7-7 7-7"></path>

                            </svg>

                        </span>


                        <span>
                            Back
                        </span>

                    </a>


                    {{-- CONTINUE --}}

                    <button
                        type="submit"
                        class="continue-button"
                        id="continueButton"
                    >

                        <span>
                            Continue
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


                </div>


            </form>


        </div>
</div>
@endsection

@push('scripts')
<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            const form =
                document.getElementById('profileForm');

            const button =
                document.getElementById('continueButton');


            if (!form || !button) {

                return;
            }


            form.addEventListener(
                'submit',
                function () {

                    if (button.disabled) {

                        return;
                    }


                    /*
                     * Let the browser perform its normal
                     * HTML5 required-field validation first.
                     */

                    if (!form.checkValidity()) {

                        return;
                    }


                    button.disabled = true;


                    button.innerHTML = `

                        <span>
                            Continuing...
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

                    `;

                }
            );

        }
    );

</script>
@endpush
