@extends('layouts.client')

@section('title', 'Town Hall - ORDO')

@section('content')

<div class="townhall-page">

{{-- =========================================================
    PAGE HEADER
========================================================== --}}
<header class="townhall-header">

    <div class="townhall-header-copy">

        <div class="eyebrow">
            TOWN HALL
        </div>

        <h1 class="townhall-title">
            {{ $greeting ?? 'Good afternoon, Client.' }}
        </h1>

        <p class="townhall-description">
            Here is what needs your attention across your ORDO workspace.
        </p>

    </div>

    <div class="header-actions">

        <a href="{{ url('/settings/account-profile') }}"
           class="secondary-action">

            <span class="action-button-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="3.5"/>
                    <path d="M5 20c.8-3.5 3.2-5.5 7-5.5s6.2 2 7 5.5"/>
                </svg>
            </span>

            <span>Complete account</span>

            <svg class="button-arrow"
                 viewBox="0 0 24 24"
                 aria-hidden="true">
                <path d="M5 12h13"/>
                <path d="m13 6 6 6-6 6"/>
            </svg>

        </a>

    </div>

</header>


{{-- =========================================================
    ACCESS STATUS
========================================================== --}}
<section class="access-card">

    <div class="access-glow access-glow-one"></div>
    <div class="access-glow access-glow-two"></div>

    <div class="access-main">

        <div class="access-label">
            YOUR ORDO ACCESS &mdash; {{ $account?->profile?->legal_name ?? session('client.account.name', 'ORDO Workspace') }}
        </div>

        <div class="access-title-row">

            <h2>
                30-Day Full Access
            </h2>

            <span class="status-pill trial">
                <span class="status-dot"></span>
                Trial
            </span>

            <span class="status-pill pending">

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 7v5l3 2"/>
                </svg>

                Verification pending

            </span>

        </div>

        <p class="access-description">
            All six Business modules are currently available during your
            trial. Complete your account verification before your access
            period ends to continue using ORDO.
        </p>

        <div class="access-meta">

            <div class="meta-item">
                <span class="meta-label">
                    Access period
                </span>

                <strong>
                    30 days
                </strong>
            </div>

            <div class="meta-divider"></div>

            <div class="meta-item">
                <span class="meta-label">
                    Business modules
                </span>

                <strong>
                    6 available
                </strong>
            </div>

            <div class="meta-divider"></div>

            <div class="meta-item">
                <span class="meta-label">
                    Free Plan
                </span>

                <strong>
                    Up to 3 modules
                </strong>
            </div>

        </div>

    </div>


    <div class="access-side">

        <div class="progress-ring"
             aria-label="{{ $trialDaysRemaining ?? 30 }} days remaining">

            <div class="progress-ring-inner">

                <strong>
                    {{ $trialDaysRemaining ?? 30 }}
                </strong>

                <span>
                    days remaining
                </span>

            </div>

        </div>

        <a href="{{ url('/settings/subscription-usage') }}"
           class="primary-button">

            <span>
                Review access
            </span>

            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M5 12h13"/>
                <path d="m13 6 6 6-6 6"/>
            </svg>

        </a>

    </div>

</section>


{{-- =========================================================
    TOP GRID
========================================================== --}}
<div class="top-grid">

    {{-- ACCOUNT SETUP --}}
    <section class="panel setup-panel">

        <div class="panel-heading">

            <div>

                <div class="panel-eyebrow">
                    ACCOUNT SETUP
                </div>

                <h2>
                    Complete your account
                </h2>

                <p>
                    2 of 4 setup steps are complete.
                </p>

            </div>

            <a href="{{ url('/settings/account-profile') }}"
               class="text-button">

                Continue setup

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M5 12h13"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>

            </a>

        </div>


        <div class="setup-progress">

            <div class="progress-info">

                <span>
                    Overall progress
                </span>

                <strong>
                    {{ $progress['percentage'] ?? 25 }}%
                </strong>

            </div>

            <div class="progress-track"
                 role="progressbar"
                 aria-valuemin="0"
                 aria-valuemax="100"
                 aria-valuenow="{{ $progress['percentage'] ?? 25 }}">

                <div class="progress-value" style="width: {{ $progress['percentage'] ?? 25 }}%"></div>

            </div>

        </div>


        <div class="setup-steps">

            <div class="setup-step complete">

                <div class="step-marker">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="m6 12 4 4 8-8"/>
                    </svg>

                </div>

                <div class="step-content">

                    <strong>
                        Account created
                    </strong>

                    <span>
                        Completed
                    </span>

                </div>

            </div>


            <div class="setup-step complete">

                <div class="step-marker">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="m6 12 4 4 8-8"/>
                    </svg>

                </div>

                <div class="step-content">

                    <strong>
                        Contact confirmed
                    </strong>

                    <span>
                        Completed
                    </span>

                </div>

            </div>


            <div class="setup-step current">

                <div class="step-marker">
                    3
                </div>

                <div class="step-content">

                    <strong>
                        Account Profile
                    </strong>

                    <span>
                        Incomplete
                    </span>

                </div>

            </div>


            <div class="setup-step">

                <div class="step-marker">
                    4
                </div>

                <div class="step-content">

                    <strong>
                        Verification
                    </strong>

                    <span>
                        Not submitted
                    </span>

                </div>

            </div>

        </div>

    </section>


    {{-- ACTION CENTER --}}
    <section class="panel action-panel">

        <div class="panel-heading">

            <div>

                <div class="panel-eyebrow">
                    ACTION CENTER
                </div>

                <h2>
                    Needs your attention
                </h2>

                <p>
                    Prioritized items across your workspace.
                </p>

            </div>

            <span class="count-badge">
                3 items
            </span>

        </div>


        <div class="action-list">

            {{-- VERIFICATION --}}
            <a href="{{ url('/settings/verification') }}"
               class="action-row">

                <div class="action-symbol">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 3 20 6v5c0 5.2-3.3 8.8-8 10-4.7-1.2-8-4.8-8-10V6l8-3Z"/>
                        <path d="m8.5 12 2.2 2.2 4.8-5"/>
                    </svg>

                </div>

                <div class="action-copy">

                    <strong>
                        Complete Account Verification
                    </strong>

                    <span>
                        Required within your 30-day access period
                    </span>

                </div>

                <span class="priority high">
                    High
                </span>

                <svg class="row-arrow"
                     viewBox="0 0 24 24"
                     aria-hidden="true">
                    <path d="M5 12h13"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>

            </a>


            {{-- DOCUMENT --}}
            <a href="{{ url('/settings/account-profile') }}"
               class="action-row">

                <div class="action-symbol">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M6 3h8l4 4v14H6z"/>
                        <path d="M14 3v5h4"/>
                        <path d="M9 13h6"/>
                        <path d="M9 17h6"/>
                    </svg>

                </div>

                <div class="action-copy">

                    <strong>
                        Upload BIR registration document
                    </strong>

                    <span>
                        Requested for Account Profile
                    </span>

                </div>

                <span class="priority due">
                    Due soon
                </span>

                <svg class="row-arrow"
                     viewBox="0 0 24 24"
                     aria-hidden="true">
                    <path d="M5 12h13"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>

            </a>


            {{-- CALENDAR --}}
            <a href="{{ url('/compliance') }}"
               class="action-row">

                <div class="action-symbol">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <rect x="4" y="5" width="16" height="15" rx="2"/>
                        <path d="M8 3v4"/>
                        <path d="M16 3v4"/>
                        <path d="M4 10h16"/>
                        <path d="M8 14h.01"/>
                        <path d="M12 14h.01"/>
                        <path d="M16 14h.01"/>
                    </svg>

                </div>

                <div class="action-copy">

                    <strong>
                        Review upcoming compliance deadlines
                    </strong>

                    <span>
                        Scheduled updates require review
                    </span>

                </div>

                <span class="priority due">
                    Due soon
                </span>

                <svg class="row-arrow"
                     viewBox="0 0 24 24"
                     aria-hidden="true">
                    <path d="M5 12h13"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>

            </a>

        </div>

    </section>

</div>


{{-- =========================================================
    WORKSPACE OVERVIEW
========================================================== --}}
<section class="workspace-section">

    <div class="section-heading">

        <div>

            <div class="panel-eyebrow">
                WORKSPACE OVERVIEW
            </div>

            <h2>
                Your ORDO workspace
            </h2>

            <p>
                Quick access to the services and modules available to your account.
            </p>

        </div>

        <a href="{{ url('/settings/subscription-usage') }}"
           class="view-all">

            View access details

            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M5 12h13"/>
                <path d="m13 6 6 6-6 6"/>
            </svg>

        </a>

    </div>


    <div class="overview-grid">

        {{-- ENTITY & GOVERNANCE --}}
        <a href="{{ url('/entity-governance') }}"
           class="overview-card">

            <div class="overview-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M3 21h18"/>
                    <path d="M5 21V9l7-4 7 4v12"/>
                    <path d="M9 21v-7h6v7"/>
                    <path d="M8 11h.01"/>
                    <path d="M16 11h.01"/>
                </svg>
            </div>

            <div class="overview-content">

                <div class="overview-top">

                    <span>
                        BUSINESS
                    </span>

                    <span class="available">
                        30d
                    </span>

                </div>

                <h3>
                    Entity &amp; Governance
                </h3>

                <p>
                    Manage governance records, entities and organizational information.
                </p>

            </div>

            <span class="overview-arrow">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M5 12h13"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </span>

        </a>


        {{-- COMPLIANCE --}}
        <a href="{{ url('/compliance') }}"
           class="overview-card">

            <div class="overview-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="m8 12 2.5 2.5L16 9"/>
                </svg>
            </div>

            <div class="overview-content">

                <div class="overview-top">

                    <span>
                        BUSINESS
                    </span>

                    <span class="available">
                        30d
                    </span>

                </div>

                <h3>
                    Compliance
                </h3>

                <p>
                    Monitor compliance activities, requirements and deadlines.
                </p>

            </div>

            <span class="overview-arrow">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M5 12h13"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </span>

        </a>


        {{-- FINANCE --}}
        <a href="{{ url('/finance') }}"
           class="overview-card">

            <div class="overview-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <rect x="3" y="5" width="18" height="14" rx="2"/>
                    <path d="M7 9h10"/>
                    <path d="M7 13h5"/>
                    <path d="M7 16h3"/>
                </svg>
            </div>

            <div class="overview-content">

                <div class="overview-top">

                    <span>
                        BUSINESS
                    </span>

                    <span class="available">
                        30d
                    </span>

                </div>

                <h3>
                    Finance
                </h3>

                <p>
                    Organize financial information and maintain connected records.
                </p>

            </div>

            <span class="overview-arrow">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M5 12h13"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </span>

        </a>


        {{-- HUMAN CAPITAL --}}
        <a href="{{ url('/human-capital') }}"
           class="overview-card">

            <div class="overview-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="8" r="3"/>
                    <path d="M5 21c0-4 3-6 7-6s7 2 7 6"/>
                    <path d="M18 11c1.7.3 2.7 1.2 3 2.8"/>
                    <path d="M6 11c-1.7.3-2.7 1.2-3 2.8"/>
                </svg>
            </div>

            <div class="overview-content">

                <div class="overview-top">

                    <span>
                        BUSINESS
                    </span>

                    <span class="available">
                        30d
                    </span>

                </div>

                <h3>
                    Human Capital
                </h3>

                <p>
                    Manage people, organizational information and workforce records.
                </p>

            </div>

            <span class="overview-arrow">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M5 12h13"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </span>

        </a>


        {{-- RECORDS --}}
        <a href="{{ url('/records') }}"
           class="overview-card">

            <div class="overview-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M6 3h12v18H6z"/>
                    <path d="M9 7h6"/>
                    <path d="M9 11h6"/>
                    <path d="M9 15h4"/>
                </svg>
            </div>

            <div class="overview-content">

                <div class="overview-top">

                    <span>
                        BUSINESS
                    </span>

                    <span class="available">
                        30d
                    </span>

                </div>

                <h3>
                    Records
                </h3>

                <p>
                    Centralize important business records and documents.
                </p>

            </div>

            <span class="overview-arrow">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M5 12h13"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </span>

        </a>


        {{-- TRANSMITTALS --}}
        <a href="{{ url('/transmittals') }}"
           class="overview-card">

            <div class="overview-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M4 12h13"/>
                    <path d="m13 6 6 6-6 6"/>
                    <path d="M19 6v12"/>
                    <path d="M4 7v10"/>
                </svg>
            </div>

            <div class="overview-content">

                <div class="overview-top">

                    <span>
                        BUSINESS
                    </span>

                    <span class="available">
                        30d
                    </span>

                </div>

                <h3>
                    Transmittals
                </h3>

                <p>
                    Track document submissions and connected business transmittals.
                </p>

            </div>

            <span class="overview-arrow">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M5 12h13"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>
            </span>

        </a>

    </div>

</section>


{{-- =========================================================
    LOWER GRID
========================================================== --}}
<div class="lower-grid">

    {{-- IMPORTANT DATES --}}
    <section class="panel information-panel">

        <div class="section-heading compact">

            <div>

                <div class="panel-eyebrow">
                    UPCOMING
                </div>

                <h2>
                    Important dates
                </h2>

            </div>

            <a href="{{ url('/compliance') }}"
               class="view-all">

                View all

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M5 12h13"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>

            </a>

        </div>


        <div class="date-list">

            <div class="date-row">

                <div class="date-box attention">

                    <strong>
                        28
                    </strong>

                    <span>
                        AUG
                    </span>

                </div>

                <div class="date-content">

                    <strong>
                        Account verification
                    </strong>

                    <span>
                        Required before access review
                    </span>

                </div>

                <span class="date-status warning">
                    Action needed
                </span>

            </div>


            <div class="date-row">

                <div class="date-box">

                    <strong>
                        31
                    </strong>

                    <span>
                        AUG
                    </span>

                </div>

                <div class="date-content">

                    <strong>
                        Compliance review
                    </strong>

                    <span>
                        Business compliance workspace
                    </span>

                </div>

                <span class="date-status">
                    Upcoming
                </span>

            </div>


            <div class="date-row">

                <div class="date-box">

                    <strong>
                        18
                    </strong>

                    <span>
                        SEP
                    </span>

                </div>

                <div class="date-content">

                    <strong>
                        Trial access review
                    </strong>

                    <span>
                        Review available Free Plan modules
                    </span>

                </div>

                <span class="date-status">
                    Upcoming
                </span>

            </div>

        </div>

    </section>


    {{-- RECENT ACTIVITY --}}
    <section class="panel information-panel">

        <div class="section-heading compact">

            <div>

                <div class="panel-eyebrow">
                    RECENT ACTIVITY
                </div>

                <h2>
                    Workspace activity
                </h2>

            </div>

            <a href="{{ url('/jkc/activity-reports') }}"
               class="view-all">

                Activity reports

                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M5 12h13"/>
                    <path d="m13 6 6 6-6 6"/>
                </svg>

            </a>

        </div>


        <div class="activity-list">

            <div class="activity-row">

                <div class="activity-icon blue">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M4 6h16"/>
                        <path d="M4 12h16"/>
                        <path d="M4 18h10"/>
                    </svg>

                </div>

                <div class="activity-content">

                    <strong>
                        Account profile opened
                    </strong>

                    <span>
                        Today · Account Profile
                    </span>

                </div>

            </div>


            <div class="activity-row">

                <div class="activity-icon green">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="m6 12 4 4 8-8"/>
                    </svg>

                </div>

                <div class="activity-content">

                    <strong>
                        Contact information confirmed
                    </strong>

                    <span>
                        Today · Registration
                    </span>

                </div>

            </div>


            <div class="activity-row">

                <div class="activity-icon purple">

                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 3v18"/>
                        <path d="M3 12h18"/>
                    </svg>

                </div>

                <div class="activity-content">

                    <strong>
                        30-day access activated
                    </strong>

                    <span>
                        Today · ORDO Workspace
                    </span>

                </div>

            </div>

        </div>

    </section>

</div>


{{-- =========================================================
    QUICK ACCESS
========================================================== --}}
<section class="quick-section">

    <div class="quick-heading">

        <div class="panel-eyebrow">
            QUICK ACCESS
        </div>

        <h2>
            Manage your workspace
        </h2>

    </div>


    <div class="quick-actions">

        <a href="{{ url('/settings/account-profile') }}"
           class="quick-action">

            <span class="quick-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M5 19 19 5"/>
                    <path d="M9 5h10v10"/>
                </svg>
            </span>

            <span>
                Account Profile
            </span>

        </a>


        <a href="{{ url('/settings/verification') }}"
           class="quick-action">

            <span class="quick-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <path d="m6 12 4 4 8-8"/>
                </svg>
            </span>

            <span>
                Verification
            </span>

        </a>


        <a href="{{ url('/settings/subscription-usage') }}"
           class="quick-action">

            <span class="quick-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 7v5l3 2"/>
                </svg>
            </span>

            <span>
                Subscription &amp; Usage
            </span>

        </a>


        <a href="{{ url('/jkc/support') }}"
           class="quick-action">

            <span class="quick-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M9.5 9a2.5 2.5 0 1 1 4.4 1.6c-.9 1-1.9 1.2-1.9 2.6"/>
                    <path d="M12 17h.01"/>
                </svg>
            </span>

            <span>
                Get Support
            </span>

        </a>

    </div>

</section>

</div>



@endsection
