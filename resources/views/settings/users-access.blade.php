@extends('layouts.client')

@section('title', 'Users & Access')

@section('header-title', 'Users & Access')

@section('content')

<div class="main-content-container" style="max-width: 1000px; padding: 10px 0;">

    <!-- PAGE HEADER SECTION -->
    <div style="margin-bottom: 24px;">
        <!-- SETTINGS BADGE -->
        <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 6px;">
            SETTINGS
        </div>

        <!-- MAIN TITLE -->
        <h1 style="font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 4px 0; line-height: 1.2;">
            Users &amp; Access
        </h1>
        <p style="font-size: 13.5px; color: #64748b; margin: 0;">
            Manage users, roles, permissions, and access to this ORDO client account.
        </p>
    </div>

    {{-- ACCESS OVERVIEW --}}
    <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; margin-bottom: 24px;">
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase;">
                USERS
            </div>
            <div style="font-size: 28px; font-weight: 700; color: #0f172a; margin-top: 6px;">
                1
            </div>
            <p style="font-size: 12.5px; color: #64748b; margin: 4px 0 0 0;">
                Active user
            </p>
        </div>

        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase;">
                ADMINS
            </div>
            <div style="font-size: 28px; font-weight: 700; color: #0f172a; margin-top: 6px;">
                1
            </div>
            <p style="font-size: 12.5px; color: #64748b; margin: 4px 0 0 0;">
                Account administrator
            </p>
        </div>

        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase;">
                PENDING
            </div>
            <div style="font-size: 28px; font-weight: 700; color: #0f172a; margin-top: 6px;">
                0
            </div>
            <p style="font-size: 12.5px; color: #64748b; margin: 4px 0 0 0;">
                Invitations awaiting response
            </p>
        </div>
    </div>

    {{-- USERS TABLE --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap; margin-bottom: 20px;">
            <div>
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                    ACCOUNT USERS
                </div>
                <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
                    Users
                </h2>
                <p style="font-size: 13px; color: #64748b; margin: 0;">
                    People who currently have access to this ORDO client account.
                </p>
            </div>

            <button type="button" style="display: inline-flex; align-items: center; height: 38px; padding: 0 16px; background: #2563eb; color: #ffffff; border: none; font-size: 13px; font-weight: 600; border-radius: 8px; cursor: pointer;">
                Invite User
            </button>
        </div>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; min-width: 650px;">
                <thead>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <th style="text-align: left; padding: 12px 10px; font-size: 11px; color: #64748b; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase;">
                            USER
                        </th>
                        <th style="text-align: left; padding: 12px 10px; font-size: 11px; color: #64748b; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase;">
                            ROLE
                        </th>
                        <th style="text-align: left; padding: 12px 10px; font-size: 11px; color: #64748b; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase;">
                            STATUS
                        </th>
                        <th style="text-align: left; padding: 12px 10px; font-size: 11px; color: #64748b; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase;">
                            ACCESS
                        </th>
                        <th style="text-align: right; padding: 12px 10px; font-size: 11px; color: #64748b; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase;">
                            ACTION
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr style="border-bottom: 1px solid #f1f5f9;">
                        <td style="padding: 16px 10px;">
                            <div style="font-size: 13.5px; font-weight: 600; color: #0f172a;">
                                John Mark Torres
                            </div>
                            <div style="font-size: 12.5px; color: #64748b; margin-top: 2px;">
                                mark.torres@student.passerellesnumeriques.org
                            </div>
                        </td>

                        <td style="padding: 16px 10px; font-size: 13px; color: #334155;">
                            Account Administrator
                        </td>

                        <td style="padding: 16px 10px;">
                            <span style="display: inline-block; padding: 4px 10px; border-radius: 999px; background: #dcfce7; color: #166534; font-size: 12px; font-weight: 600;">
                                Active
                            </span>
                        </td>

                        <td style="padding: 16px 10px; font-size: 13px; color: #334155;">
                            Full Access
                        </td>

                        <td style="padding: 16px 10px; text-align: right;">
                            <button type="button" style="border: 0; background: transparent; color: #2563eb; font-weight: 600; font-size: 13px; cursor: pointer;">
                                Manage
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- ROLES AND PERMISSIONS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            ROLES &amp; PERMISSIONS
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            Access Levels
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            Roles determine what users can access within the client portal.
        </p>

        <div style="display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; margin-top: 20px;">
            <div style="padding: 18px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                <strong style="font-size: 14px; color: #0f172a; display: block; margin-bottom: 6px;">
                    Account Administrator
                </strong>
                <p style="color: #64748b; font-size: 12.5px; line-height: 1.5; margin: 0;">
                    Full access to account settings, users, modules, subscriptions, and client information.
                </p>
            </div>

            <div style="padding: 18px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                <strong style="font-size: 14px; color: #0f172a; display: block; margin-bottom: 6px;">
                    Manager
                </strong>
                <p style="color: #64748b; font-size: 12.5px; line-height: 1.5; margin: 0;">
                    Access to assigned modules and operational functions without full account administration.
                </p>
            </div>

            <div style="padding: 18px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                <strong style="font-size: 14px; color: #0f172a; display: block; margin-bottom: 6px;">
                    Member
                </strong>
                <p style="color: #64748b; font-size: 12.5px; line-height: 1.5; margin: 0;">
                    Standard access to modules and functions assigned by an administrator.
                </p>
            </div>
        </div>
    </div>

    {{-- ACCESS NOTICE --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="display: flex; align-items: flex-start; gap: 14px;">
            <div style="width: 32px; height: 32px; border-radius: 50%; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-weight: 700; font-size: 14px;">
                i
            </div>

            <div>
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                    ACCESS CONTROL
                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    User permissions are account-specific
                </h2>

                <p style="font-size: 13px; color: #64748b; margin: 0; line-height: 1.5;">
                    In the production system, user roles and module permissions will be controlled through the account access system. This development mockup uses static sample data.
                </p>
            </div>
        </div>
    </div>

</div>

@endsection