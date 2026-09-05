<aside class="ordo-sidebar" id="ordoSidebar">

    {{-- =========================================================
         BRAND
    ========================================================== --}}
    <div class="sidebar-brand">

        <div class="brand-logo">

            <div class="logo-icon">
                O
            </div>

            <div class="logo-text">

                <h1>
                    ORDO
                </h1>

                <span class="company-subtext">
                    John Kelly
                    <span class="ampersand">&amp;</span>
                    Company
                </span>

            </div>

        </div>

    </div>


    {{-- =========================================================
         SIDEBAR CONTENT
    ========================================================== --}}
    <div class="sidebar-content">


        {{-- =====================================================
             TOWN HALL
        ====================================================== --}}
        <div class="sidebar-section">

            <a
                href="/town-hall"
                class="sidebar-link {{ request()->is('town-hall') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                    />
                </svg>

                <span>
                    Town Hall
                </span>

            </a>

        </div>



        {{-- =====================================================
             BUSINESS MODULES
        ====================================================== --}}
        <div class="sidebar-section">

            <div class="sidebar-section-title">
                BUSINESS
            </div>


            {{-- ENTITY & GOVERNANCE --}}
            <a
                href="/entity-governance"
                class="sidebar-link {{ request()->is('entity-governance') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5s1.5 0 1.5 1.5-1.5 1.5-1.5 1.5H9m0-3v6m0-3h3m2.25-3h1.5s1.5 0 1.5 1.5-1.5 1.5-1.5 1.5H15m0-3v6m0-3h3"
                    />
                </svg>

                <span class="link-label">
                    Entity &amp; Governance
                </span>

                <span class="badge-tag">
                    30d
                </span>

            </a>


            {{-- COMPLIANCE --}}
            <a
                href="/compliance"
                class="sidebar-link {{ request()->is('compliance') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                    />
                </svg>

                <span class="link-label">
                    Compliance
                </span>

                <span class="badge-tag">
                    30d
                </span>

            </a>


            {{-- FINANCE --}}
            <a
                href="/finance"
                class="sidebar-link {{ request()->is('finance') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5h16.5A2.25 2.25 0 0 1 22.5 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 17.25V6.75A2.25 2.25 0 0 1 3.75 4.5z"
                    />
                </svg>

                <span class="link-label">
                    Finance
                </span>

                <span class="badge-tag">
                    30d
                </span>

            </a>


            {{-- HUMAN CAPITAL --}}
            <a
                href="/human-capital"
                class="sidebar-link {{ request()->is('human-capital') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"
                    />
                </svg>

                <span class="link-label">
                    Human Capital
                </span>

                <span class="badge-tag">
                    30d
                </span>

            </a>


            {{-- RECORDS --}}
            <a
                href="/records"
                class="sidebar-link {{ request()->is('records') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9z"
                    />
                </svg>

                <span class="link-label">
                    Records
                </span>

                <span class="badge-tag">
                    30d
                </span>

            </a>


            {{-- TRANSMITTALS --}}
            <a
                href="/transmittals"
                class="sidebar-link {{ request()->is('transmittals') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12zm0 0h7.5"
                    />
                </svg>

                <span class="link-label">
                    Transmittals
                </span>

                <span class="badge-tag">
                    30d
                </span>

            </a>

        </div>



        {{-- =====================================================
             JK&C
        ====================================================== --}}
        <div class="sidebar-section">

            <div class="sidebar-section-title">
                JK&amp;C
            </div>


            {{-- ANNOUNCEMENTS --}}
            <a
                href="/jkc/announcements"
                class="sidebar-link {{ request()->is('jkc/announcements') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.213m3.102-.001a21.13 21.13 0 0 0 2.21 2.21m-2.21-2.21c.82-.073 1.636-.18 2.443-.32m0 0a21.2 21.2 0 0 0 4.108-1.36M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"
                    />
                </svg>

                <span class="link-label">
                    Announcements
                </span>

                <span class="num-badge">
                    4
                </span>

            </a>


            {{-- ENGAGEMENTS --}}
            <a
                href="/jkc/engagements"
                class="sidebar-link {{ request()->is('jkc/engagements') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"
                    />
                </svg>

                <span class="link-label">
                    Engagements
                </span>

            </a>


            {{-- SUBSCRIPTIONS --}}
            <a
                href="/jkc/subscriptions"
                class="sidebar-link {{ request()->is('jkc/subscriptions') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5z"
                    />
                </svg>

                <span class="link-label">
                    Subscriptions
                </span>

            </a>


            {{-- SUPPORT --}}
            <a
                href="/jkc/support"
                class="sidebar-link {{ request()->is('jkc/support') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M12 18h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"
                    />
                </svg>

                <span class="link-label">
                    Support
                </span>

                <span class="num-badge">
                    2
                </span>

            </a>


            {{-- =================================================
                 ACTIVITY & REPORTS
            ================================================== --}}
            <a
                href="/jkc/activity-reports"
                class="sidebar-link {{ request()->is('jkc/activity-reports') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 17.25h6m-6-3h6m-6-3h6m2.25-6H6.75A2.25 2.25 0 0 0 4.5 7.5v9a2.25 2.25 0 0 0 2.25 2.25h10.5A2.25 2.25 0 0 0 19.5 16.5v-9a2.25 2.25 0 0 0-2.25-2.25Z"
                    />
                </svg>

                <span class="link-label">
                    Activity &amp; Reports
                </span>

            </a>


            {{-- =================================================
                 BILLING
            ================================================== --}}
            <a
                href="/jkc/billing"
                class="sidebar-link {{ request()->is('jkc/billing') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5z"
                    />
                </svg>

                <span class="link-label">
                    Billing
                </span>

            </a>

        </div>



        {{-- =====================================================
             SETTINGS & USER PROFILE
        ====================================================== --}}
        <div class="sidebar-bottom">


            {{-- SETTINGS --}}
            <a
                href="/settings"
                class="sidebar-link {{ request()->is('settings*') ? 'active' : '' }}"
            >

                <svg
                    class="sidebar-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 0 1 0 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 0 1 0-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"
                    />

                </svg>

                <span class="link-label">
                    Settings
                </span>

            </a>



            {{-- USER PROFILE --}}
            <div class="user-profile-widget">

                <div class="user-avatar">
                    JA
                </div>

                <div class="user-info">

                    <span class="user-name">
                        John Abalde
                    </span>

                    <span class="user-role">
                        Account Administrator
                    </span>

                </div>

            </div>


        </div>

    </div>

</aside>



<style>

/* =========================================================
   SIDEBAR
========================================================= */

.ordo-sidebar {
    width: 250px;
    flex-shrink: 0;

    min-height: 100vh;

    background: #ffffff;

    border-right: 1px solid #e5e7eb;

    display: flex;
    flex-direction: column;

    position: sticky;
    top: 0;

    height: 100vh;

    z-index: 100;

    font-family:
        -apple-system,
        BlinkMacSystemFont,
        "Segoe UI",
        Roboto,
        Helvetica,
        Arial,
        sans-serif;
}



/* =========================================================
   BRAND
========================================================= */

.sidebar-brand {
    height: 64px;

    display: flex;
    align-items: center;

    padding: 0 20px;

    border-bottom: 1px solid #f1f5f9;

    flex-shrink: 0;
}


.brand-logo {
    display: flex;
    align-items: center;

    gap: 12px;
}


.logo-icon {
    width: 32px;
    height: 32px;

    background: #0f172a;

    color: #ffffff;

    border-radius: 8px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-weight: 800;
    font-size: 16px;
}


.logo-text h1 {
    margin: 0;

    font-size: 15px;

    font-weight: 800;

    letter-spacing: 0.5px;

    color: #0f172a;

    line-height: 1.1;
}


.logo-text .company-subtext {
    display: block;

    font-family:
        Georgia,
        "Times New Roman",
        Times,
        serif;

    font-size: 11px;

    color: #1e293b;

    font-weight: 500;

    letter-spacing: -0.2px;

    margin-top: 1px;
}


.logo-text .ampersand {
    color: #3b82f6;

    font-style: italic;

    font-weight: 600;
}



/* =========================================================
   SIDEBAR CONTENT
========================================================= */

.sidebar-content {
    display: flex;

    flex-direction: column;

    flex: 1;

    min-height: 0;

    overflow-y: auto;

    padding: 16px 12px;
}


.sidebar-section {
    margin-bottom: 20px;
}


.sidebar-section-title {
    padding: 0 10px;

    margin-bottom: 6px;

    font-size: 10px;

    font-weight: 700;

    letter-spacing: 0.8px;

    color: #94a3b8;
}



/* =========================================================
   SIDEBAR LINKS
========================================================= */

.sidebar-link {
    display: flex;

    align-items: center;

    gap: 10px;

    padding: 8px 12px;

    margin-bottom: 2px;

    border-radius: 8px;

    color: #475569;

    font-size: 13px;

    font-weight: 500;

    text-decoration: none;

    transition:
        background 0.15s ease,
        color 0.15s ease;
}


.sidebar-link:hover {
    background: #f8fafc;

    color: #0f172a;
}


.sidebar-link.active {
    background: #eff6ff;

    color: #2563eb;

    font-weight: 600;
}



/* =========================================================
   SIDEBAR ICON
========================================================= */

.sidebar-icon {
    width: 18px;

    height: 18px;

    color: #64748b;

    flex-shrink: 0;
}


.sidebar-link.active .sidebar-icon {
    color: #2563eb;
}


.link-label {
    flex: 1;

    min-width: 0;
}



/* =========================================================
   30d BADGE
========================================================= */

.badge-tag {
    font-size: 10px;

    font-weight: 600;

    color: #2563eb;

    background: #eff6ff;

    padding: 2px 6px;

    border-radius: 4px;

    flex-shrink: 0;
}



/* =========================================================
   NUMBER BADGE
========================================================= */

.num-badge {
    font-size: 11px;

    font-weight: 600;

    color: #2563eb;

    background: #eff6ff;

    width: 18px;

    height: 18px;

    border-radius: 50%;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-shrink: 0;
}



/* =========================================================
   BOTTOM AREA
========================================================= */

.sidebar-bottom {
    margin-top: auto;

    padding-top: 12px;

    border-top: 1px solid #f1f5f9;
}



/* =========================================================
   USER PROFILE
========================================================= */

.user-profile-widget {
    display: flex;

    align-items: center;

    gap: 10px;

    padding: 10px;

    margin-top: 8px;

    border-radius: 8px;

    background: #f8fafc;
}


.user-avatar {
    width: 30px;

    height: 30px;

    border-radius: 50%;

    background: #0f172a;

    color: #ffffff;

    font-size: 11px;

    font-weight: 700;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-shrink: 0;
}


.user-info {
    display: flex;

    flex-direction: column;

    min-width: 0;
}


.user-name {
    font-size: 12px;

    font-weight: 600;

    color: #0f172a;

    line-height: 1.2;

    white-space: nowrap;
}


.user-role {
    font-size: 10px;

    color: #64748b;

    white-space: nowrap;
}



/* =========================================================
   SIDEBAR SCROLLBAR
========================================================= */

.sidebar-content::-webkit-scrollbar {
    width: 5px;
}


.sidebar-content::-webkit-scrollbar-track {
    background: transparent;
}


.sidebar-content::-webkit-scrollbar-thumb {
    background: #cbd5e1;

    border-radius: 10px;
}


.sidebar-content::-webkit-scrollbar-thumb:hover {
    background: #94a3b8;
}



/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 900px) {

    .ordo-sidebar {
        width: 230px;
    }

}


@media (max-width: 768px) {

    .ordo-sidebar {
        width: 250px;
    }

}

</style>