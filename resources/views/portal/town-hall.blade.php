@extends('layouts.client')

@section('title', 'Town Hall - ORDO')

@section('content')

<div class="townhall-page">

```
{{-- =========================================================
    PAGE HEADER
========================================================== --}}
<header class="townhall-header">

    <div class="townhall-header-copy">

        <div class="eyebrow">
            TOWN HALL
        </div>

        <h1 class="townhall-title">
            Good afternoon, John.
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
            YOUR ORDO ACCESS
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
             aria-label="30 days remaining">

            <div class="progress-ring-inner">

                <strong>
                    30
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
                    50%
                </strong>

            </div>

            <div class="progress-track"
                 role="progressbar"
                 aria-valuemin="0"
                 aria-valuemax="100"
                 aria-valuenow="50">

                <div class="progress-value"></div>

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
```

</div>

<style>

/* =========================================================
   ORDO TOWN HALL
========================================================= */

.townhall-page {
    width: 100%;
    max-width: 1480px;
    margin: 0 auto;
    padding: 8px 4px 56px;
    color: #0f172a;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}


/* =========================================================
   PAGE HEADER
========================================================= */

.townhall-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 32px;
    margin-bottom: 24px;
}

.townhall-header-copy {
    min-width: 0;
}

.eyebrow {
    color: #2563eb;
    font-size: 10px;
    line-height: 1.2;
    font-weight: 800;
    letter-spacing: .14em;
    text-transform: uppercase;
}

.townhall-title {
    margin: 7px 0 5px;
    color: #0b1f3a;
    font-size: 29px;
    line-height: 1.15;
    font-weight: 800;
    letter-spacing: -.035em;
}

.townhall-description {
    margin: 0;
    color: #64748b;
    font-size: 13.5px;
    line-height: 1.6;
    font-weight: 700;
}

.header-actions {
    flex-shrink: 0;
}

.secondary-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 39px;
    padding: 0 14px;
    border: 1px solid #d8e2ee;
    border-radius: 9px;
    background: #fff;
    color: #203957;
    text-decoration: none;
    font-size: 11px;
    font-weight: 750;
    box-shadow: 0 2px 7px rgba(15,23,42,.025);
    transition: all .2s ease;
}

.secondary-action:hover {
    border-color: #b8cce5;
    background: #f8fbff;
    color: #2563eb;
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(15,23,42,.05);
}

.action-button-icon {
    width: 17px;
    height: 17px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #2563eb;
}

.action-button-icon svg,
.button-arrow {
    width: 15px;
    height: 15px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.7;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.button-arrow {
    width: 13px;
    height: 13px;
    color: #8191a5;
}


/* =========================================================
   ACCESS HERO
========================================================= */

.access-card {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 36px;
    overflow: hidden;
    margin-bottom: 22px;
    padding: 29px 31px;
    border: 1px solid #173b6d;
    border-radius: 16px;
    background: linear-gradient(
        135deg,
        #06152c 0%,
        #0a2347 48%,
        #103b70 100%
    );
    color: #fff;
    box-shadow: 0 13px 32px rgba(9,35,70,.14);
}

.access-glow {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}

.access-glow-one {
    width: 230px;
    height: 230px;
    top: -145px;
    right: 90px;
    background: rgba(59,130,246,.18);
}

.access-glow-two {
    width: 180px;
    height: 180px;
    right: -90px;
    bottom: -110px;
    background: rgba(37,99,235,.16);
}

.access-main {
    position: relative;
    z-index: 1;
    min-width: 0;
    flex: 1;
}

.access-label {
    margin-bottom: 8px;
    color: #75b9ff;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: .15em;
}

.access-title-row {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}

.access-title-row h2 {
    margin: 0;
    color: #fff;
    font-size: 25px;
    line-height: 1.2;
    font-weight: 800;
    letter-spacing: -.025em;
}

.status-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    min-height: 24px;
    padding: 0 9px;
    border-radius: 20px;
    font-size: 9px;
    font-weight: 750;
}

.status-pill.trial {
    border: 1px solid rgba(96,165,250,.23);
    background: rgba(59,130,246,.17);
    color: #bfdbfe;
}

.status-pill.pending {
    border: 1px solid rgba(245,158,11,.2);
    background: rgba(245,158,11,.13);
    color: #fde68a;
}

.status-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #60a5fa;
    box-shadow: 0 0 0 3px rgba(96,165,250,.1);
}

.status-pill.pending svg {
    width: 12px;
    height: 12px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.access-description {
    max-width: 720px;
    margin: 10px 0 19px;
    color: #c4d0df;
    font-size: 12px;
    line-height: 1.65;
    font-weight: 500;
}

.access-meta {
    display: flex;
    align-items: center;
    gap: 18px;
}

.meta-item {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.meta-label {
    color: #8fa5c0;
    font-size: 8px;
    font-weight: 750;
    text-transform: uppercase;
    letter-spacing: .07em;
}

.meta-item strong {
    color: #f1f5fa;
    font-size: 11px;
    font-weight: 750;
}

.meta-divider {
    width: 1px;
    height: 28px;
    background: rgba(255,255,255,.13);
}

.access-side {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    gap: 19px;
    flex-shrink: 0;
}

.progress-ring {
    width: 88px;
    height: 88px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 50%;
    background: conic-gradient(
        #5ca9ff 0deg,
        #5ca9ff 300deg,
        rgba(255,255,255,.12) 300deg,
        rgba(255,255,255,.12) 360deg
    );
}

.progress-ring-inner {
    width: 72px;
    height: 72px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #09244a;
}

.progress-ring-inner strong {
    color: #fff;
    font-size: 21px;
    line-height: 1;
    font-weight: 800;
}

.progress-ring-inner span {
    max-width: 55px;
    margin-top: 4px;
    color: #a7b9cf;
    font-size: 7.5px;
    line-height: 1.2;
    font-weight: 650;
    text-align: center;
}

.primary-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 39px;
    padding: 0 14px;
    border: 1px solid rgba(255,255,255,.05);
    border-radius: 9px;
    background: #3478ed;
    color: #fff;
    text-decoration: none;
    font-size: 10.5px;
    font-weight: 750;
    box-shadow: 0 6px 16px rgba(0,0,0,.15);
    transition: all .2s ease;
}

.primary-button:hover {
    background: #2563d8;
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 8px 18px rgba(0,0,0,.2);
}

.primary-button svg {
    width: 14px;
    height: 14px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}


/* =========================================================
   GRID
========================================================= */

.top-grid {
    display: grid;
    grid-template-columns: 1.35fr 1fr;
    gap: 18px;
    margin-bottom: 23px;
}


/* =========================================================
   COMMON PANELS
========================================================= */

.panel {
    min-width: 0;
    padding: 22px;
    border: 1px solid #dfe7f1;
    border-radius: 13px;
    background: #fff;
    box-shadow: 0 3px 12px rgba(15,23,42,.035);
}

.panel-heading {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 20px;
}

.panel-heading h2,
.section-heading h2 {
    margin: 4px 0;
    color: #10233f;
    font-size: 16px;
    line-height: 1.3;
    font-weight: 800;
    letter-spacing: -.015em;
}

.panel-heading p,
.section-heading p {
    margin: 0;
    color: #66778d;
    font-size: 11px;
    line-height: 1.5;
    font-weight: 500;
}

.panel-eyebrow {
    color: #2563eb;
    font-size: 9px;
    line-height: 1.2;
    font-weight: 800;
    letter-spacing: .13em;
    text-transform: uppercase;
}


/* =========================================================
   LINKS
========================================================= */

.text-button,
.view-all {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #2563eb;
    text-decoration: none;
    font-size: 10px;
    line-height: 1.3;
    font-weight: 800;
    white-space: nowrap;
    transition: color .2s ease;
}

.text-button:hover,
.view-all:hover {
    color: #1d4ed8;
}

.text-button svg,
.view-all svg {
    width: 13px;
    height: 13px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
    transition: transform .2s ease;
}

.text-button:hover svg,
.view-all:hover svg {
    transform: translateX(2px);
}


/* =========================================================
   ACCOUNT SETUP
========================================================= */

.setup-progress {
    margin-bottom: 20px;
}

.progress-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 7px;
    color: #64748b;
    font-size: 9.5px;
    font-weight: 650;
}

.progress-info strong {
    color: #2563eb;
    font-weight: 800;
}

.progress-track {
    height: 6px;
    overflow: hidden;
    border-radius: 10px;
    background: #e8eef6;
}

.progress-value {
    width: 50%;
    height: 100%;
    border-radius: inherit;
    background: linear-gradient(90deg,#2563eb,#5b96f7);
    box-shadow: 0 0 7px rgba(37,99,235,.18);
}

.setup-steps {
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 9px;
}

.setup-step {
    min-width: 0;
    padding: 13px 9px;
    border: 1px solid #e1e8f1;
    border-radius: 10px;
    background: #fbfcfe;
    text-align: center;
    transition: all .2s ease;
}

.setup-step:hover {
    transform: translateY(-1px);
}

.setup-step.complete {
    border-color: #d4e9dc;
    background: #f8fcf9;
}

.setup-step.current {
    border-color: #b8d2f7;
    background: #f5f9ff;
}

.step-marker {
    width: 26px;
    height: 26px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 8px;
    border-radius: 50%;
    background: #e9eef5;
    color: #52647a;
    font-size: 9px;
    font-weight: 800;
}

.step-marker svg {
    width: 14px;
    height: 14px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.setup-step.complete .step-marker {
    background: #d9f2e1;
    color: #15803d;
}

.setup-step.current .step-marker {
    background: #dbeafe;
    color: #2563eb;
}

.step-content {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.step-content strong {
    overflow: hidden;
    color: #1b2d46;
    font-size: 9.5px;
    line-height: 1.3;
    font-weight: 750;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.step-content span {
    color: #64748b;
    font-size: 8.5px;
    line-height: 1.3;
    font-weight: 500;
}


/* =========================================================
   ACTION CENTER
========================================================= */

.count-badge {
    display: inline-flex;
    align-items: center;
    min-height: 23px;
    padding: 0 8px;
    border: 1px solid #fde6a8;
    border-radius: 20px;
    background: #fff9eb;
    color: #a16207;
    font-size: 8.5px;
    font-weight: 800;
}

.action-list {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.action-row {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 0;
    padding: 10px;
    border: 1px solid #e5ebf3;
    border-radius: 10px;
    color: inherit;
    text-decoration: none;
    transition: all .18s ease;
}

.action-row:hover {
    border-color: #c8d7e8;
    background: #fbfdff;
    transform: translateY(-1px);
    box-shadow: 0 5px 14px rgba(15,23,42,.04);
}

.action-symbol {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 9px;
    background: #eff6ff;
    color: #2563eb;
}

.action-symbol svg {
    width: 17px;
    height: 17px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.65;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.action-copy {
    min-width: 0;
    flex: 1;
}

.action-copy strong,
.action-copy span {
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.action-copy strong {
    color: #1a2b43;
    font-size: 10px;
    line-height: 1.35;
    font-weight: 750;
}

.action-copy span {
    margin-top: 3px;
    color: #68798e;
    font-size: 8.8px;
    line-height: 1.35;
    font-weight: 500;
}

.priority {
    flex-shrink: 0;
    padding: 4px 7px;
    border-radius: 5px;
    font-size: 7.5px;
    font-weight: 800;
}

.priority.high {
    background: #fee8e8;
    color: #dc2626;
}

.priority.due {
    background: #fff4d6;
    color: #a16207;
}

.row-arrow {
    width: 13px;
    height: 13px;
    flex-shrink: 0;
    fill: none;
    stroke: #9aa8b9;
    stroke-width: 1.7;
    stroke-linecap: round;
    stroke-linejoin: round;
    transition: all .18s ease;
}

.action-row:hover .row-arrow {
    stroke: #2563eb;
    transform: translateX(2px);
}


/* =========================================================
   WORKSPACE OVERVIEW
========================================================= */

.workspace-section {
    margin-bottom: 23px;
}

.section-heading {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 14px;
}

.section-heading.compact {
    align-items: flex-start;
    margin-bottom: 15px;
}

.overview-grid {
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 11px;
}

.overview-card {
    position: relative;
    display: flex;
    align-items: flex-start;
    gap: 12px;
    min-width: 0;
    min-height: 122px;
    padding: 15px 38px 15px 15px;
    border: 1px solid #dfe7f1;
    border-radius: 11px;
    background: #fff;
    color: inherit;
    text-decoration: none;
    transition: all .2s ease;
}

.overview-card:hover {
    border-color: #bfd1e7;
    background: #fcfdff;
    box-shadow: 0 8px 21px rgba(15,23,42,.055);
    transform: translateY(-2px);
}

.overview-icon {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border: 1px solid #dbe9fb;
    border-radius: 9px;
    background: #eff6ff;
    color: #2563eb;
}

.overview-icon svg {
    width: 17px;
    height: 17px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.6;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.overview-content {
    min-width: 0;
    flex: 1;
}

.overview-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 5px;
}

.overview-top > span:first-child {
    color: #2563eb;
    font-size: 7.5px;
    line-height: 1.2;
    font-weight: 800;
    letter-spacing: .09em;
}

.overview-top .available {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 28px;
    height: 19px;
    padding: 0 6px;
    border: 1px solid #d7e7ff;
    border-radius: 6px;
    background: #eff6ff;
    color: #2563eb;
    font-size: 7.5px;
    line-height: 1;
    font-weight: 800;
}

.overview-content h3 {
    margin: 0 0 5px;
    color: #172b46;
    font-size: 11.5px;
    line-height: 1.35;
    font-weight: 800;
}

.overview-content p {
    margin: 0;
    color: #64748b;
    font-size: 9px;
    line-height: 1.5;
    font-weight: 500;
}

.overview-arrow {
    position: absolute;
    right: 13px;
    bottom: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 20px;
    height: 20px;
    border-radius: 6px;
    background: #f5f8fc;
    color: #94a3b8;
    transition: all .2s ease;
}

.overview-arrow svg {
    width: 12px;
    height: 12px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.overview-card:hover .overview-arrow {
    background: #eff6ff;
    color: #2563eb;
    transform: translateX(2px);
}


/* =========================================================
   LOWER INFORMATION
========================================================= */

.lower-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
    margin-bottom: 23px;
}

.date-list,
.activity-list {
    display: flex;
    flex-direction: column;
}

.date-row,
.activity-row {
    display: flex;
    align-items: center;
    gap: 11px;
    padding: 11px 0;
    border-top: 1px solid #e7edf4;
}

.date-row:first-child,
.activity-row:first-child {
    border-top: 0;
    padding-top: 0;
}

.date-box {
    width: 38px;
    height: 41px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border: 1px solid #e2e9f1;
    border-radius: 8px;
    background: #f5f8fb;
}

.date-box.attention {
    border-color: #f5dfad;
    background: #fff9eb;
}

.date-box strong {
    color: #1d3554;
    font-size: 13px;
    line-height: 1;
    font-weight: 800;
}

.date-box span {
    margin-top: 3px;
    color: #64748b;
    font-size: 7px;
    line-height: 1;
    font-weight: 800;
}

.date-box.attention strong,
.date-box.attention span {
    color: #a16207;
}

.date-content,
.activity-content {
    min-width: 0;
    flex: 1;
}

.date-content strong,
.activity-content strong {
    display: block;
    color: #24364f;
    font-size: 10px;
    line-height: 1.35;
    font-weight: 750;
}

.date-content span,
.activity-content span {
    display: block;
    margin-top: 3px;
    color: #68798e;
    font-size: 8.8px;
    line-height: 1.35;
    font-weight: 500;
}

.date-status {
    padding: 4px 7px;
    border-radius: 5px;
    background: #f1f5f9;
    color: #64748b;
    font-size: 7.5px;
    font-weight: 750;
}

.date-status.warning {
    background: #fff4d6;
    color: #a16207;
}

.activity-icon {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border-radius: 8px;
}

.activity-icon svg {
    width: 14px;
    height: 14px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.8;
    stroke-linecap: round;
    stroke-linejoin: round;
}

.activity-icon.blue {
    background: #eff6ff;
    color: #2563eb;
}

.activity-icon.green {
    background: #edf9f1;
    color: #16a34a;
}

.activity-icon.purple {
    background: #f4efff;
    color: #7c3aed;
}


/* =========================================================
   QUICK ACCESS
========================================================= */

.quick-section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    padding: 18px 20px;
    border: 1px solid #dfe7f1;
    border-radius: 12px;
    background: linear-gradient(
        180deg,
        #f9fbfd 0%,
        #f5f8fb 100%
    );
}

.quick-heading {
    flex-shrink: 0;
}

.quick-section h2 {
    margin: 4px 0 0;
    color: #172b46;
    font-size: 14px;
    line-height: 1.3;
    font-weight: 800;
}

.quick-actions {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
    gap: 7px;
}

.quick-action {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    min-height: 34px;
    padding: 0 11px;
    border: 1px solid #d8e2ed;
    border-radius: 8px;
    background: #fff;
    color: #40536d;
    text-decoration: none;
    font-size: 9px;
    line-height: 1.2;
    font-weight: 750;
    transition: all .18s ease;
}

.quick-action:hover {
    border-color: #bfd0e5;
    color: #2563eb;
    background: #fff;
    transform: translateY(-1px);
    box-shadow: 0 4px 10px rgba(15,23,42,.035);
}

.quick-icon {
    width: 18px;
    height: 18px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 5px;
    background: #eff6ff;
    color: #2563eb;
}

.quick-icon svg {
    width: 11px;
    height: 11px;
    fill: none;
    stroke: currentColor;
    stroke-width: 1.9;
    stroke-linecap: round;
    stroke-linejoin: round;
}


/* =========================================================
   FOCUS ACCESSIBILITY
========================================================= */

.secondary-action:focus-visible,
.primary-button:focus-visible,
.text-button:focus-visible,
.view-all:focus-visible,
.action-row:focus-visible,
.overview-card:focus-visible,
.quick-action:focus-visible {
    outline: 3px solid rgba(37,99,235,.2);
    outline-offset: 2px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1180px) {

    .overview-grid {
        grid-template-columns: repeat(2,1fr);
    }

    .access-card {
        align-items: flex-start;
    }

    .access-side {
        flex-direction: column;
        align-items: center;
    }

}


@media (max-width: 980px) {

    .top-grid,
    .lower-grid {
        grid-template-columns: 1fr;
    }

    .access-card {
        flex-direction: column;
        align-items: stretch;
    }

    .access-side {
        flex-direction: row;
        align-items: center;
        justify-content: flex-end;
    }

}


@media (max-width: 760px) {

    .townhall-page {
        padding: 2px 0 40px;
    }

    .townhall-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 17px;
    }

    .header-actions {
        width: 100%;
    }

    .secondary-action {
        width: 100%;
    }

    .access-card {
        padding: 23px;
    }

    .access-meta {
        flex-wrap: wrap;
        gap: 12px;
    }

    .meta-divider {
        display: none;
    }

    .overview-grid {
        grid-template-columns: 1fr 1fr;
    }

    .quick-section {
        align-items: flex-start;
        flex-direction: column;
    }

    .quick-actions {
        width: 100%;
        justify-content: flex-start;
    }

}


@media (max-width: 600px) {

    .townhall-title {
        font-size: 25px;
    }

    .access-title-row h2 {
        width: 100%;
    }

    .access-side {
        width: 100%;
        justify-content: space-between;
    }

    .setup-steps {
        grid-template-columns: repeat(2,1fr);
    }

    .section-heading {
        align-items: flex-start;
        flex-direction: column;
        gap: 8px;
    }

    .section-heading.compact {
        flex-direction: row;
        align-items: flex-start;
    }

}


@media (max-width: 480px) {

    .panel {
        padding: 17px;
    }

    .access-card {
        padding: 20px;
    }

    .access-side {
        align-items: flex-end;
    }

    .progress-ring {
        width: 76px;
        height: 76px;
    }

    .progress-ring-inner {
        width: 62px;
        height: 62px;
    }

    .primary-button {
        min-height: 37px;
        padding: 0 12px;
    }

    .overview-grid {
        grid-template-columns: 1fr;
    }

    .overview-card {
        min-height: 112px;
    }

    .action-row {
        align-items: flex-start;
    }

    .priority {
        display: none;
    }

    .row-arrow {
        margin-top: 3px;
    }

    .date-row {
        align-items: flex-start;
    }

    .date-status {
        display: none;
    }

    .quick-actions {
        display: grid;
        grid-template-columns: 1fr 1fr;
        width: 100%;
    }

    .quick-action {
        justify-content: flex-start;
    }

}

</style>

@endsection
