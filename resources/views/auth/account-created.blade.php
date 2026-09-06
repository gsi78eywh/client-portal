@extends('layouts.auth')

@section('title', 'Account Created | ORDO')

@section('left-panel')
    <div class="hero-section">
        <span class="hero-tag">Registration Complete</span>
        <h1 class="hero-title">Your workspace is ready.</h1>
        <p class="hero-description">Welcome to ORDO — a unified business operations platform designed to keep your records, workflows, and business activities connected in one place.</p>

        <div class="access-highlights">
            <div class="highlight-item">
                <div class="highlight-icon" aria-hidden="true">6</div>
                <div class="highlight-content">
                    <div class="highlight-title">6 Business Modules</div>
                    <div class="highlight-description">Explore the full Business workspace.</div>
                </div>
            </div>
            <div class="highlight-item">
                <div class="highlight-icon" aria-hidden="true">30</div>
                <div class="highlight-content">
                    <div class="highlight-title">30-Day Full Access</div>
                    <div class="highlight-description">All features available during your trial.</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="success-badge-icon" aria-hidden="true">&#10003;</div>

    <span class="form-tag">Account Created</span>
    <h2 class="form-title">Welcome to ORDO</h2>
    <p class="form-subtitle">Your account has been created successfully. You can now enter the Commercial Client Portal and begin exploring your workspace.</p>

    <section class="access-box" aria-label="ORDO access information">
        <div class="access-box-header">
            <h3 class="access-title">30-Day Free Access Activated</h3>
            <span class="access-status">Active</span>
        </div>

        <p class="access-description">
            Your 30-day free-access period starts immediately. During this period, all six Business modules are available for exploration.
        </p>

        <span class="access-badge">30-DAY FULL ACCESS</span>

        <div class="access-meta">
            <span class="access-meta-dot" aria-hidden="true"></span>
            <span>6 Business modules available during your trial</span>
        </div>

        <div class="trial-note">
            <span class="trial-note-icon" aria-hidden="true">i</span>
            <span>After your trial, you can continue with <strong>up to 3 Business modules on the Free Plan.</strong></span>
        </div>
    </section>

    <a href="{{ route('town-hall') }}" class="btn-enter">
        Enter ORDO
    </a>

    <p class="footer-note">
        You can complete your account profile and verification after entering the portal.
    </p>
@endsection