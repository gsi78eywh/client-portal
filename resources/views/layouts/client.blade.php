<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'ORDO Client Portal')
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family:
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Helvetica,
                Arial,
                sans-serif;

            background: #f8fafc;

            color: #0f172a;

            font-size: 14px;

            line-height: 1.5;

            -webkit-font-smoothing: antialiased;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
        }


        /* ==========================================
           PORTAL SHELL
        =========================================== */

        .ordo-portal {
            display: flex;

            min-height: 100vh;

            width: 100%;

            background: #f8fafc;
        }


        /* ==========================================
           MAIN AREA
        =========================================== */

        .ordo-main {
            display: flex;

            flex-direction: column;

            flex: 1;

            min-width: 0;

            min-height: 100vh;
        }


        /* ==========================================
           MAIN AREA WITHOUT SIDEBAR
        =========================================== */

        .ordo-portal.no-sidebar .ordo-main {
            width: 100%;
        }


        /* ==========================================
           PAGE CONTENT AREA
        =========================================== */

        .ordo-content {
            flex: 1;

            width: 100%;

            padding: 28px 32px;
        }


        .ordo-content-inner {
            width: 100%;

            max-width: 1400px;

            margin: 0 auto;
        }


        /* ==========================================
           REGISTRATION / AUTH CONTENT
        =========================================== */

        .ordo-portal.no-sidebar .ordo-content {
            min-height: 100vh;

            padding: 0;
        }


        .ordo-portal.no-sidebar .ordo-content-inner {
            max-width: none;

            min-height: 100vh;

            margin: 0;
        }


        /* ==========================================
           COMMON PAGE HEADER
        =========================================== */

        .page-header {
            margin-bottom: 24px;
        }


        .page-title {
            margin: 0;

            font-size: 24px;

            line-height: 1.2;

            font-weight: 700;

            color: #0f172a;

            letter-spacing: -0.02em;
        }


        .page-description {
            margin: 6px 0 0;

            max-width: 720px;

            color: #64748b;

            font-size: 13.5px;
        }


        /* ==========================================
           COMMON CARD
        =========================================== */

        .card {
            background: #ffffff;

            border: 1px solid #e2e8f0;

            border-radius: 12px;

            padding: 24px;

            box-shadow:
                0 1px 3px 0 rgba(0, 0, 0, 0.02),
                0 1px 2px -1px rgba(0, 0, 0, 0.02);
        }


        /* ==========================================
           MOBILE SIDEBAR OVERLAY
        =========================================== */

        .sidebar-overlay {
            display: none;

            position: fixed;

            inset: 0;

            background: rgba(15, 23, 42, 0.4);

            backdrop-filter: blur(2px);

            z-index: 90;
        }


        /* ==========================================
           RESPONSIVE
        =========================================== */

        @media (max-width: 1024px) {

            .ordo-content {
                padding: 24px;
            }

        }


        @media (max-width: 768px) {

            .ordo-content {
                padding: 20px 16px;
            }


            .ordo-portal.no-sidebar .ordo-content {
                padding: 0;
            }


            .sidebar-overlay.show {
                display: block;
            }

        }


        @media (max-width: 480px) {

            .page-title {
                font-size: 20px;
            }

        }

    </style>

</head>


<body>

    {{-- =========================================================
         DETERMINE WHETHER SIDEBAR SHOULD BE SHOWN
         =========================================================
         
         Registration pages should NOT show:
         - Town Hall
         - Entity Governance
         - Compliance
         - Finance
         - Human Capital
         - Records
         - Transmittals
         - JK&C
         - Settings
         
         Only the actual portal pages should use the sidebar.
    ========================================================== --}}

    @php

        $currentRoute = request()->route()?->getName();

        $registrationRoutes = [

            'register',
            'register.profile',
            'register.account',
            'register.contact',
            'register.verification',
            'register.security',
            'confirmation',

            'profile.update',
            'account.update',
            'contact.update',
            'verification.submit',
            'verification.resend',
            'contact.verify',
            'contact.resend',
            'security.create',
            'confirmation.submit',

        ];

        $authRoutes = [

            'login',
            'login.submit',

            'settings.login',
            'settings.login.submit',

            'password.request',
            'password.email',
            'check-email',
            'password.reset',

            'account-created',
            'account-created.submit',

        ];

        $isRegistrationPage =
            in_array($currentRoute, $registrationRoutes, true);

        $isAuthPage =
            in_array($currentRoute, $authRoutes, true);

        $showPortalNavigation =
            ! $isRegistrationPage &&
            ! $isAuthPage;

    @endphp


    <div
        class="ordo-portal {{ $showPortalNavigation ? '' : 'no-sidebar' }}"
    >

        {{-- =====================================================
             SIDEBAR
             Only shown after entering the actual portal.
        ====================================================== --}}

        @if ($showPortalNavigation)

            @include('components.sidebar')

        @endif


        {{-- =====================================================
             MAIN APPLICATION AREA
        ====================================================== --}}

        <div class="ordo-main">

            {{-- =================================================
                 HEADER
                 Only shown inside the actual portal.
            ================================================== --}}

            @if ($showPortalNavigation)

                @include('components.header', [

                    'title' => View::getSection(
                        'header-title',
                        'Town Hall'
                    )

                ])

            @endif


            {{-- =================================================
                 CONTENT
            ================================================== --}}

            <main class="ordo-content">

                <div class="ordo-content-inner">

                    @yield('content')

                </div>

            </main>

        </div>

    </div>


    {{-- =========================================================
         MOBILE SIDEBAR OVERLAY
         Only needed when sidebar exists.
    ========================================================== --}}

    @if ($showPortalNavigation)

        <div
            class="sidebar-overlay"
            id="sidebarOverlay"
            onclick="toggleSidebar()"
        ></div>

    @endif


    <script>

        function toggleSidebar() {

            const sidebar =
                document.getElementById('ordoSidebar');

            const overlay =
                document.getElementById('sidebarOverlay');

            if (!sidebar || !overlay) {
                return;
            }

            sidebar.classList.toggle('open');

            overlay.classList.toggle('show');

        }

    </script>

</body>

</html>