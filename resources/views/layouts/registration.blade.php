<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="theme-color"
        content="#06172f"
    >

    <title>
        @yield('title', 'Create Your ORDO Account')
    </title>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>


<body>

    <div class="registration-shell">


        {{-- =====================================================
             LEFT SIDE — SHARED ORDO BRANDING
        ====================================================== --}}

        <aside class="registration-brand">


            {{-- Decorative shapes --}}

            <div class="brand-circle"></div>

            <div class="brand-circle-small"></div>

            <div class="brand-line"></div>


            <div class="brand-content">


                {{-- =================================================
                     LOGO
                ================================================== --}}

                <div class="brand-logo">

                    <div class="brand-logo-mark">

                        <span>o</span>

                    </div>


                    <div class="brand-logo-text">

                        <div class="brand-logo-name">
                            ORDO
                        </div>

                        <div class="brand-logo-company">
                            by John Kelly &amp; Company
                        </div>

                    </div>

                </div>


                {{-- =================================================
                     BRAND MESSAGE
                ================================================== --}}

                <div class="brand-eyebrow">

                    <span class="brand-eyebrow-dot"></span>

                    Business. Organized.

                </div>


                <h2 class="brand-headline">

                    One workspace for the business you're building.

                </h2>


                <p class="brand-description">

                    Manage governance, compliance, finance, people,
                    records and JK&amp;C services from one controlled
                    client workspace.

                </p>


                {{-- =================================================
                     FEATURE PILLS
                ================================================== --}}

                <div class="brand-pills">


                    <div class="brand-pill">

                        <span class="brand-pill-dot"></span>

                        6 business modules

                    </div>


                    <div class="brand-pill">

                        <span class="brand-pill-dot"></span>

                        30-day full access

                    </div>


                    <div class="brand-pill">

                        <span class="brand-pill-dot"></span>

                        3 modules free after trial

                    </div>


                    <div class="brand-pill">

                        <span class="brand-pill-dot"></span>

                        JK&amp;C support built in

                    </div>


                </div>


                {{-- =================================================
                     BENEFIT CARDS
                ================================================== --}}

                <div class="brand-benefits">


                    {{-- CARD 1 --}}

                    <div class="brand-benefit">

                        <div class="brand-benefit-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                aria-hidden="true"
                            >

                                <path
                                    d="M5 4h14v16H5z"
                                    stroke-linejoin="round"
                                />

                                <path
                                    d="M8 8h8M8 12h8M8 16h5"
                                    stroke-linecap="round"
                                />

                            </svg>

                        </div>


                        <div class="brand-benefit-title">
                            Clear by default
                        </div>


                        <div class="brand-benefit-text">
                            See what needs attention without
                            searching through scattered records.
                        </div>

                    </div>


                    {{-- CARD 2 --}}

                    <div class="brand-benefit">

                        <div class="brand-benefit-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                aria-hidden="true"
                            >

                                <path
                                    d="M12 3v18"
                                    stroke-linecap="round"
                                />

                                <path
                                    d="M8 7l4-4 4 4"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />

                                <path
                                    d="M16 17l-4 4-4-4"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />

                            </svg>

                        </div>


                        <div class="brand-benefit-title">
                            Progressive setup
                        </div>


                        <div class="brand-benefit-text">
                            Start first. Complete verification
                            and account details as you go.
                        </div>

                    </div>


                    {{-- CARD 3 --}}

                    <div class="brand-benefit">

                        <div class="brand-benefit-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                aria-hidden="true"
                            >

                                <rect
                                    x="4"
                                    y="4"
                                    width="6"
                                    height="6"
                                    rx="1"
                                />

                                <rect
                                    x="14"
                                    y="14"
                                    width="6"
                                    height="6"
                                    rx="1"
                                />

                                <path
                                    d="M10 7h4a2 2 0 0 1 2 2v5"
                                    stroke-linecap="round"
                                />

                            </svg>

                        </div>


                        <div class="brand-benefit-title">
                            Connected records
                        </div>


                        <div class="brand-benefit-text">
                            Business information stays linked
                            across your ORDO workspace.
                        </div>

                    </div>


                </div>

            </div>

        </aside>


        {{-- =====================================================
             RIGHT SIDE — REGISTRATION FORM
        ====================================================== --}}

        <main class="registration-main">

            <div class="registration-container">

                @yield('content')

            </div>

        </main>


    </div>


    @stack('scripts')

</body>

</html>