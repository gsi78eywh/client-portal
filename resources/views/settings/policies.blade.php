@extends('layouts.client')

@section('title', 'Policies')

@section('header-title', 'Policies')

@section('content')

<div class="main-content-container" style="max-width: 1000px; padding: 10px 0;">

    <!-- PAGE HEADER SECTION -->
    <div style="margin-bottom: 24px;">
        <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 6px;">
            SETTINGS
        </div>

        <h1 style="font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 4px 0; line-height: 1.2;">
            Policies
        </h1>
        <p style="font-size: 13.5px; color: #64748b; margin: 0;">
            Review the policies and rules that apply to your ORDO client account.
        </p>
    </div>

    {{-- ACCOUNT POLICIES --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            ACCOUNT POLICIES
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            Client Account Policies
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            These policies describe how your account, information, and access are managed.
        </p>

        <div style="margin-top: 16px;">
            {{-- PRIVACY --}}
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px 0; border-bottom: 1px solid #f1f5f9;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        Privacy Policy
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        Information about how client and account data is handled.
                    </p>
                </div>

                <button type="button" style="border: 1px solid #cbd5e1; background: #ffffff; color: #334155; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer; white-space: nowrap; transition: all 0.15s ease;">
                    View Policy
                </button>
            </div>

            {{-- TERMS --}}
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px 0; border-bottom: 1px solid #f1f5f9;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        Terms of Service
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        Terms governing the use of the ORDO client portal.
                    </p>
                </div>

                <button type="button" style="border: 1px solid #cbd5e1; background: #ffffff; color: #334155; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer; white-space: nowrap; transition: all 0.15s ease;">
                    View Policy
                </button>
            </div>

            {{-- ACCEPTABLE USE --}}
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; padding: 16px 0;">
                <div>
                    <strong style="font-size: 14px; color: #0f172a; font-weight: 600;">
                        Acceptable Use Policy
                    </strong>
                    <p style="margin: 3px 0 0 0; color: #64748b; font-size: 12.5px;">
                        Guidelines for appropriate use of ORDO services and modules.
                    </p>
                </div>

                <button type="button" style="border: 1px solid #cbd5e1; background: #ffffff; color: #334155; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer; white-space: nowrap; transition: all 0.15s ease;">
                    View Policy
                </button>
            </div>
        </div>
    </div>

    {{-- SECURITY POLICIES --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            SECURITY
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            Security Policies
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            Security-related policies that help protect your client account.
        </p>

        <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px;">
            <div style="border: 1px solid #e2e8f0; border-radius: 10px; padding: 16px; background: #ffffff;">
                <div style="font-size: 13.5px; font-weight: 600; color: #0f172a;">
                    Password Security
                </div>

                <p style="margin: 6px 0 0 0; color: #64748b; font-size: 12.5px; line-height: 1.5;">
                    Passwords should be kept confidential and should not be shared with other users.
                </p>
            </div>

            <div style="border: 1px solid #e2e8f0; border-radius: 10px; padding: 16px; background: #ffffff;">
                <div style="font-size: 13.5px; font-weight: 600; color: #0f172a;">
                    Account Access
                </div>

                <p style="margin: 6px 0 0 0; color: #64748b; font-size: 12.5px; line-height: 1.5;">
                    Access to client information should only be provided to authorized users.
                </p>
            </div>

            <div style="border: 1px solid #e2e8f0; border-radius: 10px; padding: 16px; background: #ffffff;">
                <div style="font-size: 13.5px; font-weight: 600; color: #0f172a;">
                    Verification
                </div>

                <p style="margin: 6px 0 0 0; color: #64748b; font-size: 12.5px; line-height: 1.5;">
                    Account verification may be required before certain client functions become available.
                </p>
            </div>

            <div style="border: 1px solid #e2e8f0; border-radius: 10px; padding: 16px; background: #ffffff;">
                <div style="font-size: 13.5px; font-weight: 600; color: #0f172a;">
                    Session Security
                </div>

                <p style="margin: 6px 0 0 0; color: #64748b; font-size: 12.5px; line-height: 1.5;">
                    Sessions may expire automatically to help protect account information.
                </p>
            </div>
        </div>
    </div>

    {{-- POLICY ACKNOWLEDGEMENT --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            POLICY ACKNOWLEDGEMENT
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
            Policy Status
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0;">
            Your current development account has acknowledged the applicable ORDO policies.
        </p>

        <div style="margin-top: 20px; padding: 16px; border: 1px solid #bbf7d0; background: #f0fdf4; border-radius: 10px; display: flex; align-items: center; gap: 14px;">
            <div style="width: 32px; height: 32px; border-radius: 50%; background: #dcfce7; color: #166534; display: flex; align-items: center; justify-content: center; font-weight: 700; flex-shrink: 0; font-size: 14px;">
                ✓
            </div>

            <div>
                <div style="font-size: 14px; font-weight: 600; color: #166534;">
                    Policies acknowledged
                </div>

                <div style="margin-top: 2px; color: #15803d; font-size: 12.5px;">
                    Sample development status
                </div>
            </div>
        </div>
    </div>

    {{-- DEVELOPMENT NOTICE --}}
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
                    Policy content is represented as sample data
                </h2>

                <p style="font-size: 13px; color: #64748b; margin: 0; line-height: 1.5;">
                    This page is currently a clickable client-portal mockup. Final policy documents, acknowledgement records, effective dates, and acceptance tracking can be connected when the production policy system is implemented.
                </p>
            </div>
        </div>
    </div>

</div>

@endsection