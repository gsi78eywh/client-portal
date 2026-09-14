@extends('layouts.auth')

@section('title', 'Welcome to ORDO | Account Created')

@section('left-panel')
    <div class="hero-section">
        <div class="kicker" style="color:#74a8ff;">REGISTRATION COMPLETE</div>
        <h1 style="color:#ffffff;font-size:32px;font-weight:900;line-height:1.2;margin:12px 0 16px;">Your commercial workspace is ready.</h1>
        <p style="color:#cbd5e1;font-size:14.5px;line-height:1.6;margin-bottom:28px;">
            Welcome to ORDO — a unified business operations platform designed to keep your governance, compliance, financial records, and commercial activities connected in one place.
        </p>

        <div style="display:flex;flex-direction:column;gap:16px;">
            <div style="display:flex;align-items:flex-start;gap:14px;background:rgba(255,255,255,0.06);padding:14px 16px;border-radius:12px;border:1px solid rgba(255,255,255,0.12);">
                <div style="width:36px;height:36px;border-radius:8px;background:linear-gradient(135deg,#3b82f6,#1d4ed8);color:#fff;font-weight:900;display:grid;place-items:center;font-size:16px;flex-shrink:0;">
                    6
                </div>
                <div>
                    <div style="color:#ffffff;font-size:14px;font-weight:700;">6 Business Modules</div>
                    <div style="color:#94a3b8;font-size:12.5px;margin-top:2px;">Explore the complete workspace across governance, finance, and operations.</div>
                </div>
            </div>

            <div style="display:flex;align-items:flex-start;gap:14px;background:rgba(255,255,255,0.06);padding:14px 16px;border-radius:12px;border:1px solid rgba(255,255,255,0.12);">
                <div style="width:36px;height:36px;border-radius:8px;background:linear-gradient(135deg,#10b981,#059669);color:#fff;font-weight:900;display:grid;place-items:center;font-size:14px;flex-shrink:0;">
                    30d
                </div>
                <div>
                    <div style="color:#ffffff;font-size:14px;font-weight:700;">30-Day Full Access</div>
                    <div style="color:#94a3b8;font-size:12.5px;margin-top:2px;">Full enterprise features activated for exploration with no credit card required.</div>
                </div>
            </div>

            <div style="display:flex;align-items:flex-start;gap:14px;background:rgba(255,255,255,0.06);padding:14px 16px;border-radius:12px;border:1px solid rgba(255,255,255,0.12);">
                <div style="width:36px;height:36px;border-radius:8px;background:linear-gradient(135deg,#8b5cf6,#6d28d9);color:#fff;font-weight:900;display:grid;place-items:center;font-size:16px;flex-shrink:0;">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
                    </svg>
                </div>
                <div>
                    <div style="color:#ffffff;font-size:14px;font-weight:700;">Central Settings Control</div>
                    <div style="color:#94a3b8;font-size:12.5px;margin-top:2px;">Manage account profiles, entities, compliance status, and security anytime.</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:8px;">
        <div style="width:40px;height:40px;border-radius:10px;background:#ecfdf5;color:#059669;display:grid;place-items:center;font-weight:800;font-size:20px;border:1px solid #a7f3d0;">
            ✓
        </div>
        <div>
            <div class="kicker" style="margin-bottom:0;">ACCOUNT CREATED</div>
        </div>
    </div>

    <h2 style="font-size:26px;font-weight:800;letter-spacing:-0.02em;margin:0 0 8px;color:var(--ink);">Welcome to ORDO</h2>
    <p style="color:var(--muted);font-size:14px;line-height:1.5;margin-bottom:20px;">
        Your ORDO commercial account has been created successfully. Review the overview below and start exploring your new workspace.
    </p>

    {{-- WHAT ORDO IS & WHAT YOU CAN DO --}}
    <div style="background:#ffffff;border:1px solid #e2e8f0;border-radius:12px;padding:18px;margin-bottom:14px;box-shadow:0 1px 3px rgba(0,0,0,0.03);">
        <div style="display:flex;align-items:center;gap:10px;margin-bottom:8px;">
            <div style="width:28px;height:28px;border-radius:6px;background:#eff6ff;color:#2563eb;display:grid;place-items:center;flex-shrink:0;">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/>
                </svg>
            </div>
            <h3 style="font-size:14px;font-weight:700;color:#0f172a;margin:0;">What is ORDO &amp; What You Can Do</h3>
        </div>
        <p style="font-size:13px;color:#475569;line-height:1.5;margin:0 0 8px;">
            ORDO is a unified business and commercial operations platform. It brings together governance, compliance, corporate records, finance, and professional advisory workflows into a single controlled environment.
        </p>
        <p style="font-size:13px;color:#475569;line-height:1.5;margin:0;">
            You can oversee your commercial affairs, track filing deadlines, manage operational data, and collaborate directly with John Kelly &amp; Company client services.
        </p>
    </div>

    {{-- 30-DAY ACCESS INFO --}}
    <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:12px;padding:18px;margin-bottom:14px;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:6px;">
            <div style="display:flex;align-items:center;gap:8px;">
                <span style="font-size:14px;font-weight:700;color:#166534;">30-Day Free Access Activated</span>
            </div>
            <span style="background:#dcfce7;color:#15803d;font-size:11px;font-weight:700;padding:2px 8px;border-radius:12px;text-transform:uppercase;">
                Active
            </span>
        </div>
        <p style="font-size:13px;color:#166534;line-height:1.5;margin:0 0 8px;">
            During your 30-day trial period, you have unrestricted access to explore all <strong>6 Business Modules</strong> (Corporate Governance, Financial Operations, Compliance &amp; Risk, People &amp; Payroll, Commercial Records, and Advisory Services).
        </p>
        <div style="font-size:12px;color:#15803d;font-weight:500;">
            After your trial, continue seamlessly with up to 3 Business modules on the Free Plan.
        </div>
    </div>

    {{-- CENTRAL SETTINGS GUIDANCE --}}
    <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;padding:16px;margin-bottom:24px;display:flex;align-items:flex-start;gap:12px;">
        <div style="color:#64748b;margin-top:2px;flex-shrink:0;">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="3"/>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
            </svg>
        </div>
        <div>
            <div style="font-size:13px;font-weight:700;color:#0f172a;margin-bottom:2px;">
                Where to Manage Account &amp; Business Information
            </div>
            <div style="font-size:12.5px;color:#64748b;line-height:1.5;">
                You can access, update, and manage your commercial profile, business entities, authorized contacts, and security credentials under <strong>Central Settings</strong> at any time.
            </div>
        </div>
    </div>

    {{-- ACTION BUTTONS --}}
    <div style="display:flex;flex-direction:column;gap:10px;">
        <a href="{{ route('town-hall') }}" class="btn primary" style="width:100%;height:46px;font-size:14.5px;font-weight:700;display:flex;align-items:center;justify-content:center;gap:8px;text-decoration:none;">
            <span>Enter ORDO Town Hall</span> &rarr;
        </a>

        <a href="{{ route('login') }}" class="btn ghost" style="width:100%;height:44px;font-size:14px;font-weight:600;display:flex;align-items:center;justify-content:center;gap:8px;text-decoration:none;">
            Sign in to ORDO
        </a>
    </div>

    <div class="auth-footer" style="margin-top:20px;">
        Need assistance? Contact our team at <a href="mailto:support@jknc.io" style="color:var(--blue);font-weight:600;">support@jknc.io</a>
    </div>
@endsection