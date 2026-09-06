@extends('layouts.client')

@section('title', 'Settings')

@section('header-title', 'Settings')

@section('content')

<div class="main-content-container" style="max-width: 1200px; padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <!-- PAGE HEADER SECTION -->
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">

        <div>

            <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px;">
                ORDO CLIENT PORTAL
            </div>

            <h1 class="page-title" style="font-size: 26px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 6px 0; line-height: 1.2;">
                Settings
            </h1>

            <p class="page-description" style="font-size: 14px; color: #64748b; margin: 0;">
                Manage your account, organization access, security, notifications, subscriptions, and portal preferences.
            </p>

        </div>

    </div>


    <!-- SETTINGS CARDS GRID -->
    <div class="settings-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">


        {{-- =========================================================
            MY ACCOUNT
        ========================================================== --}}
        <a href="/settings/my-account" style="text-decoration: none; color: inherit; display: block;">

            <div class="card-setting-item" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; height: 100%; box-sizing: border-box; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

                <!-- BLUE ACCOUNT ICON -->
                <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>

                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0; letter-spacing: -0.01em;">
                    My Account
                </h2>

                <p style="font-size: 12.5px; color: #64748b; margin: 0; line-height: 1.5;">
                    View and manage your personal ORDO account information.
                </p>

            </div>

        </a>


        {{-- =========================================================
            ACCOUNT PROFILE
        ========================================================== --}}
        <a href="/settings/account-profile" style="text-decoration: none; color: inherit; display: block;">

            <div class="card-setting-item" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; height: 100%; box-sizing: border-box; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

                <!-- BLUE ORGANIZATION ICON -->
                <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 21h18"></path>
                        <path d="M5 21V7l8-4v18"></path>
                        <path d="M19 21V11l-6-4"></path>
                        <path d="M9 9v.01"></path>
                        <path d="M9 12v.01"></path>
                        <path d="M9 15v.01"></path>
                        <path d="M9 18v.01"></path>
                    </svg>

                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0; letter-spacing: -0.01em;">
                    Account Profile
                </h2>

                <p style="font-size: 12.5px; color: #64748b; margin: 0; line-height: 1.5;">
                    Manage your commercial client and organization profile.
                </p>

            </div>

        </a>


        {{-- =========================================================
            VERIFICATION
        ========================================================== --}}
        <a href="/settings/verification" style="text-decoration: none; color: inherit; display: block;">

            <div class="card-setting-item" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; height: 100%; box-sizing: border-box; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

                <!-- BLUE VERIFICATION ICON -->
                <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"></path>
                        <path d="m9 12 2 2 4-4"></path>
                    </svg>

                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0; letter-spacing: -0.01em;">
                    Verification
                </h2>

                <p style="font-size: 12.5px; color: #64748b; margin: 0; line-height: 1.5;">
                    Review account verification status and requirements.
                </p>

            </div>

        </a>


        {{-- =========================================================
            USERS & ACCESS
        ========================================================== --}}
        <a href="/settings/users-access" style="text-decoration: none; color: inherit; display: block;">

            <div class="card-setting-item" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; height: 100%; box-sizing: border-box; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

                <!-- BLUE USERS ICON -->
                <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>

                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0; letter-spacing: -0.01em;">
                    Users &amp; Access
                </h2>

                <p style="font-size: 12.5px; color: #64748b; margin: 0; line-height: 1.5;">
                    Manage users, roles, permissions, and account access.
                </p>

            </div>

        </a>


        {{-- =========================================================
            SWITCH ACCOUNT
        ========================================================== --}}
        <a href="/settings/switch-account" style="text-decoration: none; color: inherit; display: block;">

            <div class="card-setting-item" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; height: 100%; box-sizing: border-box; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

                <!-- BLUE SWITCH ACCOUNT ICON -->
                <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <polyline points="16 3 21 3 21 8"></polyline>
                        <line x1="10" y1="14" x2="21" y2="3"></line>
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                    </svg>

                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0; letter-spacing: -0.01em;">
                    Switch Account
                </h2>

                <p style="font-size: 12.5px; color: #64748b; margin: 0; line-height: 1.5;">
                    Switch between commercial client accounts available to you.
                </p>

            </div>

        </a>


        {{-- =========================================================
            SECURITY
        ========================================================== --}}
        <a href="/settings/security" style="text-decoration: none; color: inherit; display: block;">

            <div class="card-setting-item" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; height: 100%; box-sizing: border-box; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

                <!-- BLUE SECURITY ICON -->
                <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>

                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0; letter-spacing: -0.01em;">
                    Security
                </h2>

                <p style="font-size: 12.5px; color: #64748b; margin: 0; line-height: 1.5;">
                    Manage password, sign-in security, and account protection.
                </p>

            </div>

        </a>


        {{-- =========================================================
            GENERAL
        ========================================================== --}}
        <a href="/settings/general" style="text-decoration: none; color: inherit; display: block;">

            <div class="card-setting-item" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; height: 100%; box-sizing: border-box; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

                <!-- BLUE GENERAL ICON -->
                <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                    </svg>

                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0; letter-spacing: -0.01em;">
                    General
                </h2>

                <p style="font-size: 12.5px; color: #64748b; margin: 0; line-height: 1.5;">
                    Manage general portal preferences and settings.
                </p>

            </div>

        </a>


        {{-- =========================================================
            NOTIFICATIONS
        ========================================================== --}}
        <a href="/settings/notifications" style="text-decoration: none; color: inherit; display: block;">

            <div class="card-setting-item" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; height: 100%; box-sizing: border-box; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

                <!-- BLUE NOTIFICATION ICON -->
                <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>

                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0; letter-spacing: -0.01em;">
                    Notifications
                </h2>

                <p style="font-size: 12.5px; color: #64748b; margin: 0; line-height: 1.5;">
                    Control account notifications and communication preferences.
                </p>

            </div>

        </a>


        {{-- =========================================================
            SUBSCRIPTION & USAGE
        ========================================================== --}}
        <a href="/settings/subscription-usage" style="text-decoration: none; color: inherit; display: block;">

            <div class="card-setting-item" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; height: 100%; box-sizing: border-box; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

                <!-- BLUE SUBSCRIPTION ICON -->
                <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                        <line x1="2" y1="10" x2="22" y2="10"></line>
                    </svg>

                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0; letter-spacing: -0.01em;">
                    Subscription &amp; Usage
                </h2>

                <p style="font-size: 12.5px; color: #64748b; margin: 0; line-height: 1.5;">
                    View your current subscription, modules, and usage limits.
                </p>

            </div>

        </a>


        {{-- =========================================================
            POLICIES
        ========================================================== --}}
        <a href="/settings/policies" style="text-decoration: none; color: inherit; display: block;">

            <div class="card-setting-item" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; height: 100%; box-sizing: border-box; transition: all 0.2s ease; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

                <!-- BLUE POLICIES ICON -->
                <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>

                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0; letter-spacing: -0.01em;">
                    Policies
                </h2>

                <p style="font-size: 12.5px; color: #64748b; margin: 0; line-height: 1.5;">
                    Review ORDO policies, terms, and account-related information.
                </p>

            </div>

        </a>

    </div>

</div>




@endsection