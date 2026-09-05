@extends('layouts.client')

@section('title', 'Notifications')

@section('header-title', 'Notifications')

@section('content')

<div class="main-content-container" style="max-width: 1000px; padding: 10px 0;">

    <!-- PAGE HEADER SECTION -->
    <div style="margin-bottom: 24px;">
        <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 6px;">
            SETTINGS
        </div>

        <h1 style="font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 4px 0; line-height: 1.2;">
            Notifications
        </h1>
        <p style="font-size: 13.5px; color: #64748b; margin: 0;">
            Choose which notifications you receive from ORDO and how they are delivered.
        </p>
    </div>

    {{-- NOTIFICATION PREFERENCES --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            NOTIFICATION PREFERENCES
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            Stay informed
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            Control the notifications associated with your client account.
        </p>

        <div style="margin-top: 16px;">
            {{-- ACCOUNT --}}
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px 0; border-bottom: 1px solid #f1f5f9;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        Account activity
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        Receive notifications about important activity on your account.
                    </p>
                </div>

                <input type="checkbox" checked style="width: 17px; height: 17px; accent-color: #2563eb; cursor: pointer; flex-shrink: 0;">
            </div>

            {{-- SECURITY --}}
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px 0; border-bottom: 1px solid #f1f5f9;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        Security alerts
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        Receive alerts about password changes, sign-ins, and security events.
                    </p>
                </div>

                <input type="checkbox" checked style="width: 17px; height: 17px; accent-color: #2563eb; cursor: pointer; flex-shrink: 0;">
            </div>

            {{-- VERIFICATION --}}
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px 0; border-bottom: 1px solid #f1f5f9;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        Verification updates
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        Get notified when your account verification status changes.
                    </p>
                </div>

                <input type="checkbox" checked style="width: 17px; height: 17px; accent-color: #2563eb; cursor: pointer; flex-shrink: 0;">
            </div>

            {{-- SUBSCRIPTIONS --}}
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px 0; border-bottom: 1px solid #f1f5f9;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        Subscription updates
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        Receive updates about plans, subscriptions, and module access.
                    </p>
                </div>

                <input type="checkbox" checked style="width: 17px; height: 17px; accent-color: #2563eb; cursor: pointer; flex-shrink: 0;">
            </div>

            {{-- BILLING --}}
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px 0; border-bottom: 1px solid #f1f5f9;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        Billing notifications
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        Receive invoices, payment reminders, and billing updates.
                    </p>
                </div>

                <input type="checkbox" checked style="width: 17px; height: 17px; accent-color: #2563eb; cursor: pointer; flex-shrink: 0;">
            </div>

            {{-- ANNOUNCEMENTS --}}
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px 0;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        ORDO announcements
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        Receive important product announcements and service updates.
                    </p>
                </div>

                <input type="checkbox" checked style="width: 17px; height: 17px; accent-color: #2563eb; cursor: pointer; flex-shrink: 0;">
            </div>
        </div>
    </div>

    {{-- DELIVERY CHANNELS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            DELIVERY CHANNELS
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            How you receive notifications
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            Choose the channels that ORDO can use to deliver notifications.
        </p>

        <div style="margin-top: 20px;">
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; margin-bottom: 12px; background: #fafafa;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        Email
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        mark.torres@student.passerellesnumeriques.org
                    </p>
                </div>

                <input type="checkbox" checked style="width: 17px; height: 17px; accent-color: #2563eb; cursor: pointer;">
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; background: #fafafa;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        In-app notifications
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        Display notifications inside the ORDO client portal.
                    </p>
                </div>

                <input type="checkbox" checked style="width: 17px; height: 17px; accent-color: #2563eb; cursor: pointer;">
            </div>
        </div>
    </div>

    {{-- EMAIL FREQUENCY --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            EMAIL FREQUENCY
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            Email Digest
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            Choose how frequently non-critical notifications are grouped into email updates.
        </p>

        <div style="margin-top: 16px; max-width: 450px;">
            <select style="width: 100%; box-sizing: border-box; height: 42px; padding: 0 12px; border: 1px solid #cbd5e1; border-radius: 8px; background: #ffffff; color: #0f172a; font-size: 13.5px; outline: none;">
                <option selected>As notifications occur</option>
                <option>Daily digest</option>
                <option>Weekly digest</option>
            </select>
        </div>
    </div>

    {{-- SAVE BAR --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap;">
            <div>
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase;">
                    NOTIFICATION SETTINGS
                </div>

                <p style="margin: 2px 0 0 0; color: #64748b; font-size: 12.5px;">
                    Your changes will be applied to future notifications.
                </p>
            </div>

            <button type="button" style="background: #2563eb; color: #ffffff; border: 0; border-radius: 8px; padding: 10px 20px; font-size: 13px; font-weight: 600; cursor: pointer; transition: background 0.15s ease;">
                Save Changes
            </button>
        </div>
    </div>

</div>

@endsection