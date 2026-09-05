@extends('layouts.client')

@section('title', 'Subscription & Usage')

@section('header-title', 'Subscription & Usage')

@section('content')

<div class="main-content-container" style="max-width: 1000px; padding: 10px 0;">

    <!-- PAGE HEADER SECTION -->
    <div style="margin-bottom: 24px;">
        <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 6px;">
            SETTINGS
        </div>

        <h1 style="font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 4px 0; line-height: 1.2;">
            Subscription &amp; Usage
        </h1>
        <p style="font-size: 13.5px; color: #64748b; margin: 0;">
            View your current ORDO plan, module access, and usage information.
        </p>
    </div>

    {{-- CURRENT PLAN --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            CURRENT PLAN
        </div>

        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 20px; flex-wrap: wrap; margin-top: 4px;">
            <div>
                <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
                    ORDO 30-Day Full Access
                </h2>

                <p style="font-size: 13px; color: #64748b; margin: 0;">
                    Your client account currently has full access to the available ORDO modules.
                </p>
            </div>

            <span style="display: inline-flex; align-items: center; padding: 4px 10px; border-radius: 999px; background: #dc262615; color: #16a34a; font-size: 12px; font-weight: 600; background-color: #dcfce7;">
                Active
            </span>
        </div>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px;">
            <div style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; background: #fafafa;">
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase;">
                    STATUS
                </div>

                <div style="font-size: 14px; font-weight: 700; color: #0f172a; margin-top: 6px;">
                    Active
                </div>
            </div>

            <div style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; background: #fafafa;">
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase;">
                    ACCESS
                </div>

                <div style="font-size: 14px; font-weight: 700; color: #0f172a; margin-top: 6px;">
                    Full Access
                </div>
            </div>

            <div style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 10px; background: #fafafa;">
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase;">
                    BILLING
                </div>

                <div style="font-size: 14px; font-weight: 700; color: #0f172a; margin-top: 6px;">
                    Not Required
                </div>
            </div>
        </div>
    </div>

    {{-- MODULE ACCESS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            MODULE ACCESS
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            Available Modules
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            Your current plan determines which ORDO modules are available to your account.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px;">
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; border: 1px solid #e2e8f0; border-radius: 10px; background: #ffffff;">
                <span style="font-size: 13.5px; font-weight: 600; color: #0f172a;">
                    Entity &amp; Governance
                </span>

                <span style="color: #16a34a; font-size: 12px; font-weight: 600;">
                    Enabled
                </span>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; border: 1px solid #e2e8f0; border-radius: 10px; background: #ffffff;">
                <span style="font-size: 13.5px; font-weight: 600; color: #0f172a;">
                    Compliance
                </span>

                <span style="color: #16a34a; font-size: 12px; font-weight: 600;">
                    Enabled
                </span>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; border: 1px solid #e2e8f0; border-radius: 10px; background: #ffffff;">
                <span style="font-size: 13.5px; font-weight: 600; color: #0f172a;">
                    Finance
                </span>

                <span style="color: #16a34a; font-size: 12px; font-weight: 600;">
                    Enabled
                </span>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; border: 1px solid #e2e8f0; border-radius: 10px; background: #ffffff;">
                <span style="font-size: 13.5px; font-weight: 600; color: #0f172a;">
                    Human Capital
                </span>

                <span style="color: #16a34a; font-size: 12px; font-weight: 600;">
                    Enabled
                </span>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; border: 1px solid #e2e8f0; border-radius: 10px; background: #ffffff;">
                <span style="font-size: 13.5px; font-weight: 600; color: #0f172a;">
                    Records
                </span>

                <span style="color: #16a34a; font-size: 12px; font-weight: 600;">
                    Enabled
                </span>
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; border: 1px solid #e2e8f0; border-radius: 10px; background: #ffffff;">
                <span style="font-size: 13.5px; font-weight: 600; color: #0f172a;">
                    Transmittals
                </span>

                <span style="color: #16a34a; font-size: 12px; font-weight: 600;">
                    Enabled
                </span>
            </div>
        </div>
    </div>

    {{-- USAGE --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            USAGE
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            Current Usage
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            Sample usage information for the current development environment.
        </p>

        <div style="margin-top: 20px;">
            {{-- Records Progress --}}
            <div style="margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 6px; font-size: 13px;">
                    <strong style="color: #0f172a; font-weight: 600;">
                        Records
                    </strong>

                    <span style="color: #64748b;">
                        248 / 1,000
                    </span>
                </div>

                <div style="height: 7px; background: #f1f5f9; border-radius: 999px; overflow: hidden;">
                    <div style="width: 25%; height: 100%; background: #2563eb; border-radius: 999px;"></div>
                </div>
            </div>

            {{-- Transmittals Progress --}}
            <div style="margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 6px; font-size: 13px;">
                    <strong style="color: #0f172a; font-weight: 600;">
                        Transmittals
                    </strong>

                    <span style="color: #64748b;">
                        72 / 500
                    </span>
                </div>

                <div style="height: 7px; background: #f1f5f9; border-radius: 999px; overflow: hidden;">
                    <div style="width: 14%; height: 100%; background: #2563eb; border-radius: 999px;"></div>
                </div>
            </div>

            {{-- Active Users Progress --}}
            <div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 6px; font-size: 13px;">
                    <strong style="color: #0f172a; font-weight: 600;">
                        Active Users
                    </strong>

                    <span style="color: #64748b;">
                        1 / 10
                    </span>
                </div>

                <div style="height: 7px; background: #f1f5f9; border-radius: 999px; overflow: hidden;">
                    <div style="width: 10%; height: 100%; background: #2563eb; border-radius: 999px;"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- PLAN NOTICE --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="display: flex; align-items: flex-start; gap: 16px;">
            <div style="width: 32px; height: 32px; border-radius: 50%; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-weight: 700; font-size: 14px;">
                i
            </div>

            <div>
                <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.05em; text-transform: uppercase;">
                    DEVELOPMENT MODE
                </div>

                <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 4px 0 4px 0;">
                    Subscription and usage are sample data
                </h2>

                <p style="font-size: 13px; color: #64748b; margin: 0; line-height: 1.5;">
                    The current page is a development mockup. Authentication, subscription entitlements, usage limits, billing, and database values will be connected during the production implementation.
                </p>
            </div>
        </div>
    </div>

</div>

@endsection