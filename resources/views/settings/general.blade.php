@extends('layouts.client')

@section('title', 'General Settings')

@section('header-title', 'General Settings')

@section('content')

<div class="main-content-container" style="max-width: 1000px; padding: 10px 0;">

    <!-- PAGE HEADER SECTION -->
    <div style="margin-bottom: 24px;">
        <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 6px;">
            SETTINGS
        </div>

        <h1 style="font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 4px 0; line-height: 1.2;">
            General Settings
        </h1>
        <p style="font-size: 13.5px; color: #64748b; margin: 0;">
            Manage general preferences for your ORDO client portal experience.
        </p>
    </div>

    @if (session('status'))
        <div style="margin-bottom: 20px; padding: 12px 16px; background: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 8px; color: #065f46; font-size: 13px; font-weight: 500;">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('settings.general.update') }}">
        @csrf

    {{-- ACCOUNT PREFERENCES --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            ACCOUNT PREFERENCES
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            General Preferences
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            Configure the basic preferences used throughout your client portal.
        </p>

        <div style="margin-top: 24px; display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 20px;">
            <div>
                <label style="display: block; font-size: 12.5px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                    Language
                </label>

                <select style="width: 100%; box-sizing: border-box; height: 42px; padding: 0 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #ffffff; color: #0f172a; font-size: 13.5px; outline: none;">
                    <option selected>English</option>
                    <option>Filipino</option>
                </select>

                <p style="margin: 6px 0 0 0; color: #64748b; font-size: 12px;">
                    Language used throughout the portal.
                </p>
            </div>

            <div>
                <label style="display: block; font-size: 12.5px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                    Time Zone
                </label>

                <select style="width: 100%; box-sizing: border-box; height: 42px; padding: 0 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #ffffff; color: #0f172a; font-size: 13.5px; outline: none;">
                    <option selected>Asia/Manila (UTC+08:00)</option>
                    <option>Asia/Singapore (UTC+08:00)</option>
                    <option>UTC</option>
                </select>

                <p style="margin: 6px 0 0 0; color: #64748b; font-size: 12px;">
                    Used for dates, notifications, and activity records.
                </p>
            </div>

            <div>
                <label style="display: block; font-size: 12.5px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                    Date Format
                </label>

                <select style="width: 100%; box-sizing: border-box; height: 42px; padding: 0 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #ffffff; color: #0f172a; font-size: 13.5px; outline: none;">
                    <option selected>Aug 20, 2026</option>
                    <option>20 Aug 2026</option>
                    <option>2026-08-20</option>
                </select>
            </div>

            <div>
                <label style="display: block; font-size: 12.5px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                    First Day of Week
                </label>

                <select style="width: 100%; box-sizing: border-box; height: 42px; padding: 0 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #ffffff; color: #0f172a; font-size: 13.5px; outline: none;">
                    <option selected>Monday</option>
                    <option>Sunday</option>
                </select>
            </div>
        </div>
    </div>

    {{-- PORTAL BEHAVIOR --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            PORTAL BEHAVIOR
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            Display Preferences
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            Choose how the portal behaves when you work with your client account.
        </p>

        <div style="margin-top: 16px;">
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px 0; border-bottom: 1px solid #f1f5f9;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        Remember last visited page
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        Return to your previous portal location when you sign in.
                    </p>
                </div>

                <input type="checkbox" checked style="width: 17px; height: 17px; accent-color: #2563eb; cursor: pointer;">
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px 0; border-bottom: 1px solid #f1f5f9;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        Compact navigation
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        Use a more compact sidebar navigation layout.
                    </p>
                </div>

                <input type="checkbox" style="width: 17px; height: 17px; accent-color: #2563eb; cursor: pointer;">
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px 0;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        Confirm before leaving unsaved changes
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        Show a warning when leaving a page with unsaved information.
                    </p>
                </div>

                <input type="checkbox" checked style="width: 17px; height: 17px; accent-color: #2563eb; cursor: pointer;">
            </div>
        </div>
    </div>

    {{-- DEFAULT LANDING PAGE --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            STARTUP EXPERIENCE
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            Default Landing Page
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            Choose where you would like to start when entering the client portal.
        </p>

        <div style="margin-top: 16px; max-width: 450px;">
            <select style="width: 100%; box-sizing: border-box; height: 42px; padding: 0 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #ffffff; color: #0f172a; font-size: 13.5px; outline: none;">
                <option selected>Town Hall</option>
                <option>Dashboard</option>
                <option>Account Profile</option>
            </select>
        </div>
    </div>

    {{-- SAVE BAR --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap;">
            <div>
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase;">
                    SETTINGS CHANGES
                </div>

                <p style="margin: 2px 0 0 0; color: #64748b; font-size: 12.5px;">
                    Save your preferences when you are finished.
                </p>
            </div>

            <button type="submit" style="background: #2563eb; color: #ffffff; border: 0; border-radius: 8px; padding: 10px 20px; font-size: 13px; font-weight: 600; cursor: pointer; transition: background 0.15s ease;">
                Save Changes
            </button>
        </div>
    </div>
    </form>

</div>

@endsection