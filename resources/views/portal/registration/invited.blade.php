@extends('layouts.registration')

@section('title', 'Join Existing Account — ORDO')

@section('content')
<div class="registration-page">
        <div class="form-panel-inner">


            {{-- =================================================
                 TOP BAR
            ================================================== --}}

            <div class="registration-topbar">

                <div class="signin-text">

                    Already have an account?

                    <a href="{{ route('login') }}">
                        Sign in
                    </a>

                </div>

            </div>


            {{-- =================================================
                 PROGRESS
            ================================================== --}}

            <div
                class="registration-progress"
                aria-label="Registration progress"
            >

                <div
                    class="progress-segment completed"
                    title="About you — completed"
                ></div>

                <div
                    class="progress-segment completed"
                    title="Account — completed"
                ></div>

                <div
                    class="progress-segment active"
                    aria-current="step"
                    title="Details — current step"
                ></div>

                <div
                    class="progress-segment"
                    title="Contact"
                ></div>

                <div
                    class="progress-segment"
                    title="Verify"
                ></div>

                <div
                    class="progress-segment"
                    title="Security"
                ></div>

            </div>


            {{-- =================================================
                 PAGE HEADER
            ================================================== --}}

            <header class="registration-header">

                <div class="registration-eyebrow">
                    JOIN YOUR ORDO WORKSPACE
                </div>

                <h2>
                    Join an existing ORDO account
                </h2>

                <p>
                    You were invited to join an existing ORDO account.
                    Enter the invitation information below to continue.
                </p>

            </header>


            {{-- =================================================
                 INFORMATION NOTICE
            ================================================== --}}

            <div class="information-note">

                <div class="information-note-icon">

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
                            cy="12"
                            r="9"
                        />

                        <path d="M12 11V16"/>
                        <path d="M12 8H12.01"/>

                    </svg>

                </div>

                <div>

                    <strong>
                        You're joining an existing account.
                    </strong>

                    This will not create a new business,
                    organization, or ORDO workspace.
                    Your access will be connected to the
                    account associated with your invitation.

                </div>

            </div>


            {{-- =================================================
                 VALIDATION
            ================================================== --}}

            @if ($errors->any())

                <div
                    class="form-alert"
                    role="alert"
                    aria-live="polite"
                >

                    <div class="form-alert-icon">
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


            {{-- =================================================
                 FORM
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('invited.update') }}"
                class="registration-form"
            >

                @csrf


                <section class="invitation-card">


                    {{-- =================================================
                         INVITATION HEADER
                    ================================================== --}}

                    <div class="invitation-card-header">

                        <div class="invitation-icon">

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
                                    d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"
                                />

                                <circle
                                    cx="9"
                                    cy="7"
                                    r="4"
                                />

                                <path d="M19 8v6"/>
                                <path d="M22 11h-6"/>

                            </svg>

                        </div>

                        <div class="invitation-heading">

                            <strong>
                                Invitation details
                            </strong>

                            <p>
                                Use the invitation code and email
                                address provided by the account administrator.
                            </p>

                        </div>

                    </div>


                    {{-- =================================================
                         INVITATION CODE
                    ================================================== --}}

                    <div class="form-group">

                        <label for="invitation_code">

                            Invitation Code

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input
                            type="text"
                            id="invitation_code"
                            name="invitation_code"
                            value="{{ old(
                                'invitation_code',
                                session('registration.invitation.invitation_code', '')
                            ) }}"
                            placeholder="Enter your invitation code"
                            autocomplete="one-time-code"
                            spellcheck="false"
                            maxlength="255"
                            class="{{ $errors->has('invitation_code') ? 'input-error' : '' }}"
                            aria-describedby="invitation-code-help"
                            aria-invalid="{{ $errors->has('invitation_code') ? 'true' : 'false' }}"
                            required
                        >

                        @error('invitation_code')

                            <div
                                class="field-error"
                                id="invitation-code-help"
                            >
                                {{ $message }}
                            </div>

                        @else

                            <div
                                class="field-hint"
                                id="invitation-code-help"
                            >
                                Enter the code included in your ORDO invitation.
                            </div>

                        @enderror

                    </div>


                    {{-- =================================================
                         EMAIL
                    ================================================== --}}

                    <div class="form-group">

                        <label for="invitation_email">

                            Invitation Email Address

                            <span class="required">
                                *
                            </span>

                        </label>

                        <input
                            type="email"
                            id="invitation_email"
                            name="invitation_email"
                            value="{{ old(
                                'invitation_email',
                                session('registration.invitation.invitation_email', '')
                            ) }}"
                            placeholder="you@example.com"
                            autocomplete="email"
                            maxlength="255"
                            class="{{ $errors->has('invitation_email') ? 'input-error' : '' }}"
                            aria-describedby="invitation-email-help"
                            aria-invalid="{{ $errors->has('invitation_email') ? 'true' : 'false' }}"
                            required
                        >

                        @error('invitation_email')

                            <div
                                class="field-error"
                                id="invitation-email-help"
                            >
                                {{ $message }}
                            </div>

                        @else

                            <div
                                class="field-hint"
                                id="invitation-email-help"
                            >
                                Use the email address that received the invitation.
                            </div>

                        @enderror

                    </div>


                    {{-- =================================================
                         INVITATION PREVIEW
                    ================================================== --}}

                    @php

                        $preview =
                            session('registration.invitation_preview')
                            ??
                            session('registration.invitation.existing_account')
                            ??
                            ($information['existing_account'] ?? null);

                    @endphp


                    @if ($preview)

                        <div class="preview">

                            <div class="preview-label">
                                Invitation found
                            </div>


                            <div class="preview-row">

                                <span class="preview-key">
                                    Account
                                </span>

                                <span class="preview-value">

                                    {{ $preview['name']
                                        ?? $preview['account_name']
                                        ?? 'Existing ORDO Account' }}

                                </span>

                            </div>


                            <div class="preview-row">

                                <span class="preview-key">
                                    Invited role
                                </span>

                                <span class="preview-value">

                                    {{ $preview['role']
                                        ?? 'Member / Staff' }}

                                </span>

                            </div>


                            <div class="preview-row">

                                <span class="preview-key">
                                    Invited by
                                </span>

                                <span class="preview-value">

                                    {{ $preview['invited_by']
                                        ?? 'Account Administrator' }}

                                </span>

                            </div>

                        </div>

                    @endif

                </section>


                {{-- =================================================
                     KEEP SIMPLE NOTE
                ================================================== --}}

                <div class="keep-simple">

                    <div class="keep-simple-icon">

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
                                cy="12"
                                r="9"
                            />

                            <path d="M12 11V16"/>
                            <path d="M12 8H12.01"/>

                        </svg>

                    </div>

                    <div>

                        <strong>
                            Keep it simple for now.
                        </strong>

                        <p>
                            We only need your invitation details to
                            connect you to the existing workspace.
                            Additional account information can be
                            completed later.
                        </p>

                    </div>

                </div>


                {{-- =================================================
                     ACTIONS
                ================================================== --}}

                <div class="registration-actions">


                    {{-- BACK --}}

                    <a
                        href="{{ route('register.account') }}"
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


                    {{-- CONTINUE --}}

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <span>
                            Continue
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

            <footer class="registration-footer">

                <strong>
                    ORDO
                </strong>

                <span>
                    •
                </span>

                <span>
                    Secure account registration
                </span>

            </footer>

        </div>
</div>
@endsection
