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

    <style>
        /* -------------------------------------------------------
           REGISTRATION LAYOUT SHELL
           The entire shell is locked to 100vh.
           Only #regMain (right/white side) scrolls.
           The left brand panel never moves.
           ------------------------------------------------------- */

        html, body {
            height: 100%;
            overflow: hidden;   /* prevent the page itself from scrolling */
        }

        #regShell {
            height: 100vh;
            overflow: hidden;
            display: grid;
            grid-template-columns: minmax(440px, 1fr) minmax(440px, 1fr);
            background: #ffffff;
            width: 100%;
        }

        #regBrand {
            height: 100vh;
            overflow: hidden;   /* left panel never scrolls */

            /* ---- identical to auth.css .auth-brand ---- */
            background:
                radial-gradient(circle at 14% 10%, rgba(59, 130, 246, 0.28), transparent 38%),
                radial-gradient(circle at 82% 78%, rgba(139, 92, 246, 0.22), transparent 36%),
                linear-gradient(145deg, #07162d 0%, #0c2245 52%, #112d58 100%);
            color: #ffffff;
            padding: 40px 44px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        /* ── Hero section: scaled for 50% panel ── */
        #regBrand .auth-hero {
            margin: 32px 0 24px;
            max-width: 100%;
        }

        #regBrand .auth-hero h1 {
            font-size: 36px;
            line-height: 1.1;
            letter-spacing: -0.03em;
            margin-bottom: 14px;
        }

        #regBrand .auth-hero p {
            font-size: 14.5px;
            line-height: 1.55;
        }

        #regBrand .auth-chips {
            margin-top: 20px;
            gap: 7px;
        }

        #regBrand .auth-chip {
            font-size: 11.5px;
            padding: 5px 11px;
        }

        /* ── Proof cards: 3-column grid, compact ── */
        #regBrand .auth-proof {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        #regBrand .proof {
            padding: 12px 13px;
            border-radius: 10px;
        }

        #regBrand .proof b {
            font-size: 12px;
            margin-bottom: 4px;
            display: block;
        }

        #regBrand .proof span {
            font-size: 11px;
            line-height: 1.4;
            color: #94a3b8;
        }

        #regMain {
            height: 100vh;
            overflow-y: auto;   /* ONLY the right/white side scrolls */

            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 64px 48px;
            background: #ffffff;
        }

        /* Responsive: stack vertically on narrow viewports */
        @media (max-width: 860px) {
            html, body { overflow: auto; }

            #regShell {
                height: auto;
                overflow: visible;
                grid-template-columns: 1fr;
            }
            #regBrand {
                height: auto;
                overflow: hidden;
                padding: 36px 32px 40px;
            }
            #regBrand .auth-hero {
                margin: 28px 0 20px;
            }
            #regBrand .auth-hero h1 {
                font-size: 32px;
            }
            #regBrand .auth-proof {
                grid-template-columns: repeat(3, 1fr);
            }
            #regMain {
                height: auto;
                overflow-y: visible;
                padding: 48px 24px 60px;
            }
        }

        @media (max-width: 640px) {
            #regBrand { padding: 28px 20px 32px; }
            #regBrand .auth-hero h1 { font-size: 28px; }
            #regBrand .auth-proof { grid-template-columns: 1fr; }
            #regMain  { padding: 36px 18px 50px; }
        }
    </style>
</head>
<body class="auth-body">

    <div id="regShell">

        {{-- =====================================================
             LEFT BRAND PANEL — sticky, full-viewport height,
             identical markup & classes to layouts/auth.blade.php
        ====================================================== --}}
        <aside id="regBrand" class="auth-brand">

            {{-- Logo --}}
            <div class="brand-lock">
                <a href="{{ route('login') }}" style="display:flex;align-items:center;gap:13px;text-decoration:none;color:inherit;">
                    <div class="brandmark" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 20V4l16 16V4"/>
                        </svg>
                    </div>
                    <div>
                        <div class="brandname">NXT</div>
                        <div class="brandsub" style="white-space:nowrap;">by JK &amp; C</div>
                    </div>
                </a>
            </div>

            {{-- Hero copy --}}
            <div class="auth-hero">
                <div class="kicker" style="color:#74a8ff">UNIFIED BUSINESS WORKSPACE</div>
                <h1>One workspace for the business you're building.</h1>
                <p>Manage governance, compliance, finance, people, records and John Kelly &amp; Company client services from one controlled workspace.</p>
                <div class="auth-chips">
                    <span class="auth-chip">6 business modules</span>
                    <span class="auth-chip">30-day full access</span>
                    <span class="auth-chip">3 modules free after trial</span>
                    <span class="auth-chip">JK &amp; Company support built in</span>
                </div>
            </div>

            {{-- Proof cards --}}
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

        </aside>

        {{-- =====================================================
             RIGHT FORM PANEL — scrolls independently when
             the form is taller than the viewport
        ====================================================== --}}
        <main id="regMain">
            @yield('content')
        </main>

    </div>{{-- /#regShell --}}

    @stack('scripts')
</body>
</html>