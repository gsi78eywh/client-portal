@extends('layouts.client')

@section('title', 'Security - ORDO')

@section('header-title', 'Security')

@section('content')

<div class="main-content-container" style="max-width: 1050px; padding: 10px 0;">

    <!-- PAGE HEADER -->
    <div style="margin-bottom: 24px;">
        <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 6px;">
            SETTINGS
        </div>

        <h1 style="font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 4px 0; line-height: 1.2;">
            Security
        </h1>
        <p style="font-size: 13.5px; color: #64748b; margin: 0;">
            Manage your credentials, two-factor authentication, active devices, and workspace protection policies.
        </p>
    </div>

    <!-- FLASH MESSAGES -->
    @if (session('status'))
        <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px; padding: 12px 16px; background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px; color: #166534; font-size: 13px; font-weight: 500;">
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="flex-shrink: 0;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span>{{ session('status') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div style="margin-bottom: 20px; padding: 14px 16px; background: #fef2f2; border: 1px solid #fecaca; border-radius: 8px; color: #b91c1c; font-size: 13px;">
            <div style="font-weight: 700; margin-bottom: 6px;">Please correct the following:</div>
            <ul style="margin: 0; padding-left: 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- MAIN GRID LAYOUT -->
    <div style="display: grid; grid-template-columns: minmax(0, 1.85fr) minmax(300px, 1.15fr); gap: 24px; align-items: start;">

        <!-- LEFT COLUMN: PRIMARY SECURITY FORMS -->
        <div style="display: flex; flex-direction: column; gap: 24px;">

            {{-- 1. CHANGE PASSWORD CARD --}}
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 28px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                    CREDENTIALS
                </div>
                <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Change Password
                </h2>
                <p style="font-size: 13px; color: #64748b; margin: 0 0 20px 0;">
                    Ensure your account is using a long, random password to stay secure.
                </p>

                <form method="POST" action="{{ route('settings.security.update') }}">
                    @csrf

                    <div style="display: flex; flex-direction: column; gap: 16px;">
                        <div>
                            <label for="current_password" style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                                Current Password <span style="color: #ef4444;">*</span>
                            </label>
                            <input
                                type="password"
                                id="current_password"
                                name="current_password"
                                required
                                placeholder="Enter current password"
                                style="width: 100%; height: 42px; padding: 0 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; color: #0f172a; box-sizing: border-box;"
                            >
                        </div>

                        <div>
                            <label for="password" style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                                New Password <span style="color: #ef4444;">*</span>
                            </label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                required
                                placeholder="Create new password (minimum 8 characters)"
                                style="width: 100%; height: 42px; padding: 0 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; color: #0f172a; box-sizing: border-box;"
                            >
                        </div>

                        <div>
                            <label for="password_confirmation" style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                                Confirm New Password <span style="color: #ef4444;">*</span>
                            </label>
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                required
                                placeholder="Re-type new password"
                                style="width: 100%; height: 42px; padding: 0 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; color: #0f172a; box-sizing: border-box;"
                            >
                        </div>
                    </div>

                    <!-- PASSWORD REQUIREMENTS LIST -->
                    <div style="margin-top: 16px; padding: 14px 16px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px;">
                        <div style="font-size: 11.5px; font-weight: 700; color: #475569; margin-bottom: 6px;">
                            Password requirements:
                        </div>
                        <ul style="margin: 0; padding-left: 18px; font-size: 12px; color: #64748b; line-height: 1.6;">
                            <li>At least 8 characters in length</li>
                            <li>Include letters and numbers for maximum security</li>
                            <li>Different from previous passwords</li>
                        </ul>
                    </div>

                    <div style="margin-top: 20px;">
                        <button type="submit" style="height: 40px; padding: 0 20px; background: #2563eb; color: #ffffff; border: none; font-size: 13px; font-weight: 600; border-radius: 8px; cursor: pointer; transition: all .15s ease;">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>

            {{-- 2. TWO-FACTOR AUTHENTICATION (2FA) CARD --}}
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 28px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; margin-bottom: 12px;">
                    <div>
                        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                            VERIFICATION &amp; ACCESS
                        </div>
                        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0;">
                            Two-Factor Authentication (2FA)
                        </h2>
                    </div>

                    @if ($twoFactorEnabled ?? false)
                        <span style="display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; background: #dcfce7; color: #166534; font-size: 11px; font-weight: 700; border-radius: 999px;">
                            <span style="width: 6px; height: 6px; border-radius: 50%; background: #16a34a;"></span>
                            Enabled
                        </span>
                    @else
                        <span style="display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; background: #fef3c7; color: #92400e; font-size: 11px; font-weight: 700; border-radius: 999px;">
                            <span style="width: 6px; height: 6px; border-radius: 50%; background: #d97706;"></span>
                            Recommended
                        </span>
                    @endif
                </div>

                <p style="font-size: 13px; color: #64748b; margin: 0 0 20px 0; line-height: 1.5;">
                    Add an extra layer of security to your commercial account. When 2FA is active, signing in requires your password and a temporary verification code.
                </p>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <!-- METHOD: AUTHENTICATOR APP -->
                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 14px 16px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div style="width: 36px; height: 36px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 16px;">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <rect x="5" y="2" width="14" height="20" rx="2" stroke-width="1.8"/>
                                    <path d="M12 18h.01" stroke-width="2"/>
                                </svg>
                            </div>
                            <div>
                                <div style="font-size: 13px; font-weight: 600; color: #0f172a;">Authenticator App (TOTP)</div>
                                <div style="font-size: 11.5px; color: #64748b;">Google Authenticator, Microsoft Authenticator, or 1Password</div>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('settings.security.two-factor') }}" style="margin: 0;">
                            @csrf
                            <input type="hidden" name="enabled" value="{{ ($twoFactorEnabled ?? false) ? '0' : '1' }}">
                            <button type="submit" style="padding: 6px 14px; background: {{ ($twoFactorEnabled ?? false) ? '#fee2e2' : '#ffffff' }}; border: 1px solid {{ ($twoFactorEnabled ?? false) ? '#fca5a5' : '#cbd5e1' }}; color: {{ ($twoFactorEnabled ?? false) ? '#991b1b' : '#334155' }}; border-radius: 6px; font-size: 12px; font-weight: 600; cursor: pointer;">
                                {{ ($twoFactorEnabled ?? false) ? 'Disable' : 'Enable' }}
                            </button>
                        </form>
                    </div>

                    <!-- METHOD: SMS / EMAIL OTP -->
                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 16px; padding: 14px 16px; border: 1px solid #e2e8f0; border-radius: 8px; background: #f8fafc;">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div style="width: 36px; height: 36px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 16px;">
                                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="1.8"/>
                                </svg>
                            </div>
                            <div>
                                <div style="font-size: 13px; font-weight: 600; color: #0f172a;">Email &amp; Mobile OTP Backup</div>
                                <div style="font-size: 11.5px; color: #64748b;">Receive one-time passcodes on your verified contact channels</div>
                            </div>
                        </div>

                        <span style="font-size: 11.5px; font-weight: 600; color: #16a34a; background: #dcfce7; padding: 4px 10px; border-radius: 999px;">Active</span>
                    </div>
                </div>
            </div>

            {{-- 3. ACTIVE SESSIONS & DEVICE MANAGEMENT CARD --}}
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 28px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                    <div>
                        <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                            DEVICE SESSIONS
                        </div>
                        <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0;">
                            Active Browser Sessions
                        </h2>
                    </div>

                    <form method="POST" action="{{ route('settings.security.revoke-sessions') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" style="padding: 6px 12px; background: #ffffff; border: 1px solid #cbd5e1; color: #475569; border-radius: 6px; font-size: 12px; font-weight: 600; cursor: pointer;">
                            Sign out other devices
                        </button>
                    </form>
                </div>

                <p style="font-size: 13px; color: #64748b; margin: 0 0 20px 0;">
                    Devices and locations that are currently authenticated to your ORDO workspace.
                </p>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    @foreach (($sessions ?? [
                        ['device' => 'Chrome on Windows 11', 'ip' => '127.0.0.1', 'location' => 'Makati City, Philippines', 'is_current' => true, 'last_active' => 'Active now'],
                        ['device' => 'Safari on iPhone 15 Pro', 'ip' => '112.198.74.21', 'location' => 'Taguig, Philippines', 'is_current' => false, 'last_active' => '2 hours ago']
                    ]) as $s)
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; border: 1px solid #e2e8f0; border-radius: 8px; background: {{ $s['is_current'] ? '#f0fdf4' : '#ffffff' }};">
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 36px; height: 36px; border-radius: 8px; background: {{ $s['is_current'] ? '#dcfce7' : '#f1f5f9' }}; color: {{ $s['is_current'] ? '#166534' : '#475569' }}; display: flex; align-items: center; justify-content: center;">
                                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <rect x="2" y="3" width="20" height="14" rx="2" stroke-width="1.8"/>
                                        <path d="M8 21h8m-4-4v4" stroke-width="1.8"/>
                                    </svg>
                                </div>
                                <div>
                                    <div style="font-size: 13px; font-weight: 600; color: #0f172a; display: flex; align-items: center; gap: 8px;">
                                        {{ $s['device'] }}
                                        @if ($s['is_current'])
                                            <span style="font-size: 10.5px; font-weight: 700; background: #166534; color: #ffffff; padding: 2px 7px; border-radius: 999px;">THIS DEVICE</span>
                                        @endif
                                    </div>
                                    <div style="font-size: 11.5px; color: #64748b; margin-top: 2px;">
                                        IP: {{ $s['ip'] }} &bull; {{ $s['location'] }} &bull; {{ $s['last_active'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN: AUDIT LOGS & WORKSPACE POLICIES -->
        <div style="display: flex; flex-direction: column; gap: 24px;">

            {{-- 4. SECURITY SCORE / HEALTH CARD --}}
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                    SECURITY HEALTH
                </div>
                <h3 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 12px 0;">
                    Account Protection
                </h3>

                <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 16px; padding: 12px; background: #eff6ff; border: 1px solid #dbeafe; border-radius: 8px;">
                    <div style="width: 44px; height: 44px; border-radius: 50%; background: #2563eb; color: #ffffff; font-weight: 800; font-size: 15px; display: flex; align-items: center; justify-content: center;">
                        85%
                    </div>
                    <div>
                        <div style="font-size: 13px; font-weight: 700; color: #1e3a8a;">Strong Protection</div>
                        <div style="font-size: 11.5px; color: #3b82f6;">All core safeguards configured</div>
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 8px; font-size: 12px; color: #334155;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <svg width="15" height="15" fill="none" stroke="#16a34a" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        <span>Password updated recently</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <svg width="15" height="15" fill="none" stroke="#16a34a" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        <span>Verified contact channels</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <svg width="15" height="15" fill="none" stroke="#16a34a" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        <span>Device &amp; IP rate limits active</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <svg width="15" height="15" fill="none" stroke="#16a34a" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                        <span>HTTPS / TLS 1.3 Transport</span>
                    </div>
                </div>
            </div>

            {{-- 5. WORKSPACE POLICIES --}}
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                    SESSION POLICIES
                </div>
                <h3 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 14px 0;">
                    Workspace Guardrails
                </h3>

                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 6px;">
                        Automatic Inactivity Timeout
                    </label>
                    <select style="width: 100%; height: 38px; padding: 0 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 12.5px; color: #0f172a; background: #fff;">
                        <option value="15">15 minutes</option>
                        <option value="30" selected>30 minutes (Standard)</option>
                        <option value="60">1 hour</option>
                        <option value="240">4 hours</option>
                    </select>
                </div>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <label style="display: flex; align-items: flex-start; gap: 10px; font-size: 12.5px; color: #334155; cursor: pointer;">
                        <input type="checkbox" checked style="margin-top: 2px; accent-color: #2563eb;">
                        <span>Alert me via email on new sign-ins from unrecognized devices</span>
                    </label>
                    <label style="display: flex; align-items: flex-start; gap: 10px; font-size: 12.5px; color: #334155; cursor: pointer;">
                        <input type="checkbox" checked style="margin-top: 2px; accent-color: #2563eb;">
                        <span>Confirm password before updating billing or banking records</span>
                    </label>
                </div>
            </div>

            {{-- 6. RECENT SECURITY ACTIVITY LOG --}}
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                    AUDIT TRAIL
                </div>
                <h3 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 14px 0;">
                    Recent Activity
                </h3>

                <div style="display: flex; flex-direction: column; gap: 12px;">
                    @foreach (($activityLogs ?? [
                        ['event' => 'Successful sign in', 'device' => 'Chrome on Windows 11', 'ip' => '127.0.0.1', 'date' => now()->format('M d, H:i')],
                        ['event' => 'Session refreshed', 'device' => 'Chrome on Windows 11', 'ip' => '127.0.0.1', 'date' => now()->subHours(1)->format('M d, H:i')],
                        ['event' => 'Sign in from mobile', 'device' => 'Safari on iPhone 15 Pro', 'ip' => '112.198.74.21', 'date' => now()->subHours(2)->format('M d, H:i')]
                    ]) as $log)
                        <div style="display: flex; align-items: flex-start; gap: 10px; padding-bottom: 10px; border-bottom: 1px solid #f1f5f9;">
                            <span style="width: 8px; height: 8px; border-radius: 50%; background: #2563eb; margin-top: 4px; flex-shrink: 0;"></span>
                            <div>
                                <div style="font-size: 12.5px; font-weight: 600; color: #0f172a;">{{ $log['event'] }}</div>
                                <div style="font-size: 11px; color: #64748b; margin-top: 1px;">
                                    {{ $log['device'] }} &bull; {{ $log['date'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

</div>

@endsection