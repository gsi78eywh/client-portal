<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#07162d">
    <title>@yield('title', 'ORDO | Unified Client Portal')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="auth-body">
    <section id="authShell" class="auth-layout">
        {{-- =====================================================
             LEFT BRAND / SHOWCASE PANEL (ORDO by John Kelly & Company)
        ====================================================== --}}
        <div class="auth-brand">
            <div class="brand-lock">
                <a href="{{ route('login') }}" style="display:flex;align-items:center;gap:13px;text-decoration:none;color:inherit;">
                    <div class="brandmark" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 20V4l16 16V4"/>
                        </svg>
                    </div>
                    <div>
                        <div class="brandname">NXT</div>
                        <div class="brandsub">by JK &amp; C</div>
                    </div>
                </a>
            </div>

            <div class="auth-hero">
                @hasSection('left-panel')
                    @yield('left-panel')
                @else
                    <div class="kicker" style="color:#74a8ff">@yield('hero-tag', 'UNIFIED BUSINESS WORKSPACE')</div>
                    <h1>@yield('hero-title', "One workspace for the business you’re building.")</h1>
                    <p>@yield('hero-description', 'Manage governance, compliance, finance, people, records and John Kelly & Company client services from one controlled workspace.')</p>
                    <div class="auth-chips">
                        <span class="auth-chip">6 business modules</span>
                        <span class="auth-chip">30-day full access</span>
                        <span class="auth-chip">3 modules free after trial</span>
                        <span class="auth-chip">John Kelly &amp; Company support built in</span>
                    </div>
                @endif
            </div>

            <div class="auth-proof">
                <div class="proof">
                    <div style="display:flex;align-items:center;gap:7px;margin-bottom:3px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 3v18"/><path d="M3 9h6"/></svg>
                        <b>Clear by default</b>
                    </div>
                    <span>See what needs attention without hunting through menus.</span>
                </div>
                <div class="proof">
                    <div style="display:flex;align-items:center;gap:7px;margin-bottom:3px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <b>Progressive setup</b>
                    </div>
                    <span>Start first. Complete verification within 30 days.</span>
                </div>
                <div class="proof">
                    <div style="display:flex;align-items:center;gap:7px;margin-bottom:3px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#60a5fa" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        <b>Connected records</b>
                    </div>
                    <span>Business information stays linked across modules.</span>
                </div>
            </div>
        </div>

        {{-- =====================================================
             RIGHT INTERACTION / FORM PANEL
        ====================================================== --}}
        <div class="auth-formwrap">
            <div class="auth-panel" id="authPanel">
                @yield('content')
            </div>
        </div>
    </section>

    @yield('scripts')
</body>
</html>
