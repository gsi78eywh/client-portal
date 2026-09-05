@extends('layouts.client')

@section('title', 'Verification')

@section('header-title', 'Verification')

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
            Verification
        </h1>
        <p style="font-size: 13.5px; color: #64748b; margin: 0;">
            Manage your client verification status and provide the information required to verify your ORDO account.
        </p>
    </div>

    {{-- VERIFICATION STATUS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 24px; flex-wrap: wrap;">
            <div>
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                    CURRENT STATUS
                </div>

                <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 4px 0;">
                    Verification Pending
                </h2>

                <p style="font-size: 13px; color: #64748b; margin: 0;">
                    Your account has been created successfully. Additional information is required before your commercial client account can be fully verified.
                </p>
            </div>

            <div style="padding: 6px 14px; border-radius: 999px; background: #fff7ed; color: #c2410c; font-size: 12.5px; font-weight: 600; white-space: nowrap; border: 1px solid #ffedd5;">
                Pending Review
            </div>
        </div>

        <div style="margin-top: 24px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 12px;">
            <div style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                <div style="font-size: 12px; color: #64748b; margin-bottom: 4px;">Account</div>
                <strong style="font-size: 14px; color: #0f172a;">Created</strong>
            </div>

            <div style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                <div style="font-size: 12px; color: #64748b; margin-bottom: 4px;">Profile</div>
                <strong style="font-size: 14px; color: #0f172a;">Incomplete</strong>
            </div>

            <div style="padding: 16px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                <div style="font-size: 12px; color: #64748b; margin-bottom: 4px;">Verification</div>
                <strong style="font-size: 14px; color: #0f172a;">Pending</strong>
            </div>
        </div>
    </div>

    {{-- VERIFICATION CHECKLIST --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            VERIFICATION CHECKLIST
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 4px 0;">
            Complete these requirements
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0 0 20px 0;">
            The following items may be required before your organization can be fully verified.
        </p>

        <div>
            <!-- Item 1 -->
            <div style="display: flex; align-items: center; gap: 14px; padding: 14px 0; border-bottom: 1px solid #f1f5f9;">
                <div style="width: 28px; height: 28px; border-radius: 50%; background: #dcfce7; color: #166534; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 13px; flex-shrink: 0;">
                    ✓
                </div>
                <div style="flex: 1;">
                    <strong style="font-size: 13.5px; color: #0f172a;">Email Address</strong>
                    <div style="font-size: 12.5px; color: #64748b; margin-top: 2px;">Your email address has been provided.</div>
                </div>
                <span style="font-size: 12px; font-weight: 600; color: #166534;">Complete</span>
            </div>

            <!-- Item 2 -->
            <div style="display: flex; align-items: center; gap: 14px; padding: 14px 0; border-bottom: 1px solid #f1f5f9;">
                <div style="width: 28px; height: 28px; border-radius: 50%; background: #fef3c7; color: #92400e; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px; flex-shrink: 0;">
                    2
                </div>
                <div style="flex: 1;">
                    <strong style="font-size: 13.5px; color: #0f172a;">Account Profile</strong>
                    <div style="font-size: 12.5px; color: #64748b; margin-top: 2px;">Complete your organization and business profile.</div>
                </div>
                <span style="font-size: 12px; font-weight: 600; color: #92400e;">Required</span>
            </div>

            <!-- Item 3 -->
            <div style="display: flex; align-items: center; gap: 14px; padding: 14px 0; border-bottom: 1px solid #f1f5f9;">
                <div style="width: 28px; height: 28px; border-radius: 50%; background: #f1f5f9; color: #64748b; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px; flex-shrink: 0;">
                    3
                </div>
                <div style="flex: 1;">
                    <strong style="font-size: 13.5px; color: #0f172a;">Business Information</strong>
                    <div style="font-size: 12.5px; color: #64748b; margin-top: 2px;">Provide applicable registration and organization details.</div>
                </div>
                <span style="font-size: 12px; font-weight: 600; color: #64748b;">Pending</span>
            </div>

            <!-- Item 4 -->
            <div style="display: flex; align-items: center; gap: 14px; padding: 14px 0;">
                <div style="width: 28px; height: 28px; border-radius: 50%; background: #f1f5f9; color: #64748b; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 12px; flex-shrink: 0;">
                    4
                </div>
                <div style="flex: 1;">
                    <strong style="font-size: 13.5px; color: #0f172a;">Verification Review</strong>
                    <div style="font-size: 12.5px; color: #64748b; margin-top: 2px;">ORDO will review the submitted information.</div>
                </div>
                <span style="font-size: 12px; font-weight: 600; color: #64748b;">Pending</span>
            </div>
        </div>
    </div>

    {{-- DOCUMENTS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
            VERIFICATION DOCUMENTS
        </div>

        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 4px 0;">
            Supporting Documents
        </h2>

        <p style="font-size: 13px; color: #64748b; margin: 0 0 20px 0;">
            Upload supporting documentation when requested for verification.
        </p>

        <div style="padding: 28px; border: 1px dashed #cbd5e1; border-radius: 10px; text-align: center; background: #f8fafc;">
            <div style="font-size: 24px; color: #64748b; margin-bottom: 6px;">↑</div>
            <strong style="font-size: 14px; color: #0f172a; display: block;">Documents are not yet required</strong>
            <p style="margin: 4px 0 0; color: #64748b; font-size: 12.5px;">
                Any required documents will appear here when verification requirements are activated.
            </p>
        </div>
    </div>

    {{-- ACTIONS --}}
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap;">
            <div>
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                    NEXT STEP
                </div>

                <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 2px 0;">
                    Complete your Account Profile
                </h2>

                <p style="font-size: 13px; color: #64748b; margin: 0;">
                    Add your organization information to continue the verification process.
                </p>
            </div>

            <a href="/settings/account-profile" style="display: inline-flex; align-items: center; height: 40px; padding: 0 20px; background: #2563eb; color: #ffffff; text-decoration: none; font-size: 13px; font-weight: 600; border-radius: 8px;">
                Complete Profile
            </a>
        </div>
    </div>

</div>

@endsection