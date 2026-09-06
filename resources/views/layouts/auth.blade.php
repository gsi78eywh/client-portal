<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#06172f">
    <title>@yield('title', 'ORDO | Commercial Client Portal')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="auth-body">
    <div class="auth-layout">
        {{-- =====================================================
             LEFT BRAND / SHOWCASE PANEL
        ====================================================== --}}
        <aside class="auth-aside">
            {{-- Ambient decorative background glows --}}
            <div class="auth-glow-top" aria-hidden="true"></div>
            <div class="auth-glow-bottom" aria-hidden="true"></div>
            <div class="auth-grid-pattern" aria-hidden="true"></div>

            <div class="auth-aside-inner">
                {{-- Top: Brand Logo & Company Title --}}
                <div class="auth-brand">
                    <a href="{{ route('login') }}" class="auth-brand-link">
                        <div class="auth-brand-logo" aria-hidden="true">
                            <span>O</span>
                        </div>
                        <div class="auth-brand-text">
                            <span class="auth-brand-name">ORDO</span>
                            <span class="auth-brand-sub">by John Kelly &amp; Company</span>
                        </div>
                    </a>
                </div>

                {{-- Middle: Dynamic Hero Section --}}
                <div class="auth-hero">
                    @hasSection('left-panel')
                        @yield('left-panel')
                    @else
                        <div class="auth-hero-badge">
                            <span class="auth-badge-dot"></span>
                            <span>@yield('hero-tag', 'Business, organized.')</span>
                        </div>

                        <h1 class="auth-hero-title">
                            @yield('hero-title', "One workspace for the business you're building.")
                        </h1>

                        <p class="auth-hero-desc">
                            @yield('hero-description', 'Manage governance, compliance, finance, people, records and JK&C services from one controlled client workspace.')
                        </p>

                        <div class="auth-pills-list">
                            <span class="auth-pill"><span class="auth-pill-dot"></span>6 business modules</span>
                            <span class="auth-pill"><span class="auth-pill-dot"></span>30-day full access</span>
                            <span class="auth-pill"><span class="auth-pill-dot"></span>3 modules free forever</span>
                            <span class="auth-pill"><span class="auth-pill-dot"></span>JK&amp;C support built in</span>
                        </div>
                    @endif
                </div>

                {{-- Bottom: Sleek Feature Highlight Cards (No horizontal overflow) --}}
                <div class="auth-features">
                    <div class="auth-feature-card">
                        <div class="auth-feature-icon" aria-hidden="true">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div class="auth-feature-text">
                            <h4>Corporate Governance</h4>
                            <p>Structured control for directors, officers, and shareholders.</p>
                        </div>
                    </div>

                    <div class="auth-feature-card">
                        <div class="auth-feature-icon" aria-hidden="true">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="auth-feature-text">
                            <h4>Statutory Compliance</h4>
                            <p>Automated tracking for SEC, BIR, and local regulatory deadlines.</p>
                        </div>
                    </div>

                    <div class="auth-feature-card">
                        <div class="auth-feature-icon" aria-hidden="true">
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2" />
                            </svg>
                        </div>
                        <div class="auth-feature-text">
                            <h4>Unified Records</h4>
                            <p>Documents and books stay connected across every operational module.</p>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        {{-- =====================================================
             RIGHT INTERACTION / FORM PANEL
        ====================================================== --}}
        <main class="auth-main">
            <div class="auth-card-wrapper">
                <div class="auth-card">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    @yield('scripts')
</body>
</html>
