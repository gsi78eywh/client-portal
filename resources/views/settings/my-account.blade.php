@extends('layouts.client')

@section('title', 'My Account')

@section('header-title', 'My Account')

@section('content')

@php
    $u = $user ?? auth()->user();
    $p = $profile ?? $u?->profile;
    $initials = 'US';
    if ($u) {
        $parts = explode(' ', $u->name);
        $initials = count($parts) > 1 ? strtoupper(substr($parts[0], 0, 1) . substr(end($parts), 0, 1)) : strtoupper(substr($u->name, 0, 2));
    }
    $firstName = old('first_name', $p?->first_name ?? ($u ? explode(' ', $u->name)[0] : ''));
    $middleName = old('middle_name', $p?->middle_name ?? '');
    $lastName = old('last_name', $p?->last_name ?? ($u && count(explode(' ', $u->name)) > 1 ? explode(' ', $u->name)[1] : ''));
    $suffix = old('suffix', $p?->suffix ?? '');
    $dob = old('date_of_birth', $p?->date_of_birth ? \Carbon\Carbon::parse($p->date_of_birth)->format('Y-m-d') : '');
    $mobile = old('mobile_number', $p?->mobile_number ?? '');
    $country = old('country_region', $p?->country_region ?? 'Philippines');
    $email = $u?->email ?? '';
    $createdAt = $u?->created_at ? $u->created_at->format('F d, Y') : now()->format('F d, Y');
@endphp

<div class="main-content-container" style="max-width: 1000px; padding: 10px 0;">

    <!-- PAGE HEADER SECTION -->
    <div style="margin-bottom: 24px;">
        <!-- SETTINGS BADGE -->
        <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 6px;">
            SETTINGS
        </div>

        <!-- MAIN TITLE -->
        <h1 style="font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 4px 0; line-height: 1.2;">
            My Account
        </h1>
        <p style="font-size: 13.5px; color: #64748b; margin: 0;">
            Your personal ORDO identity and sign-in details.
        </p>
    </div>

    <!-- NOTIFICATIONS -->
    @if(session('success') || session('status'))
        <div style="margin-bottom: 18px; padding: 12px 14px; border-radius: 8px; background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; font-size: 13px; font-weight: 500;">
            {{ session('success') ?? session('status') }}
        </div>
    @endif

    @if($errors->any())
        <div style="margin-bottom: 18px; padding: 12px 14px; border-radius: 8px; background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; font-size: 13px;">
            <ul style="margin: 0; padding-left: 18px;">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- MAIN TWO-COLUMN LAYOUT -->
    <div style="display: grid; grid-template-columns: minmax(0, 2fr) minmax(280px, 1fr); gap: 24px; align-items: start;">

        {{-- LEFT COLUMN: PERSONAL INFORMATION FORM --}}
        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 28px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            
            <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                ACCOUNT INFORMATION
            </div>

            <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                Personal Information
            </h2>

            <p style="font-size: 13px; color: #64748b; margin: 0 0 24px 0;">
                These details identify you as the person managing this ORDO account.
            </p>

            <!-- USER PROFILE / AVATAR HEADER BANNER -->
            <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px; padding-bottom: 20px; border-bottom: 1px solid #f1f5f9;">
                <div style="width: 56px; height: 56px; border-radius: 50%; background: #e0f2fe; color: #0f172a; font-weight: 700; font-size: 18px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    {{ $initials }}
                </div>
                <div>
                    <h3 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">{{ $u?->name ?? 'User' }}</h3>
                    <div style="font-size: 13px; color: #64748b; margin-bottom: 4px;">{{ $email }}</div>
                    <span style="display: inline-flex; align-items: center; gap: 4px; background: #dcfce7; color: #15803d; font-size: 11px; font-weight: 600; padding: 2px 8px; border-radius: 12px;">
                        <span style="width: 6px; height: 6px; border-radius: 50%; background: #16a34a;"></span>
                        Verified Identity
                    </span>
                </div>
            </div>

            <!-- FORM FIELDS GRID -->
            <form action="{{ route('settings.my-account.update') }}" method="POST">
                @csrf
                <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px;">

                    <!-- First name -->
                    <div>
                        <label style="display: block; font-size: 12.5px; font-weight: 600; color: #334155; margin-bottom: 6px;">First name *</label>
                        <input type="text" name="first_name" value="{{ $firstName }}" required style="width: 100%; height: 42px; padding: 0 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; color: #0f172a; box-sizing: border-box;">
                    </div>

                    <!-- Middle name -->
                    <div>
                        <label style="display: block; font-size: 12.5px; font-weight: 600; color: #334155; margin-bottom: 6px;">Middle name</label>
                        <input type="text" name="middle_name" value="{{ $middleName }}" style="width: 100%; height: 42px; padding: 0 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; color: #0f172a; box-sizing: border-box;">
                    </div>

                    <!-- Last name -->
                    <div>
                        <label style="display: block; font-size: 12.5px; font-weight: 600; color: #334155; margin-bottom: 6px;">Last name *</label>
                        <input type="text" name="last_name" value="{{ $lastName }}" required style="width: 100%; height: 42px; padding: 0 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; color: #0f172a; box-sizing: border-box;">
                    </div>

                    <!-- Suffix -->
                    <div>
                        <label style="display: block; font-size: 12.5px; font-weight: 600; color: #334155; margin-bottom: 6px;">Suffix</label>
                        <input type="text" name="suffix" value="{{ $suffix }}" placeholder="e.g. Jr., III, CPA" style="width: 100%; height: 42px; padding: 0 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; color: #0f172a; box-sizing: border-box;">
                    </div>

                    <!-- Date of birth -->
                    <div>
                        <label style="display: block; font-size: 12.5px; font-weight: 600; color: #334155; margin-bottom: 6px;">Date of birth</label>
                        <input type="date" name="date_of_birth" value="{{ $dob }}" style="width: 100%; height: 42px; padding: 0 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; color: #0f172a; box-sizing: border-box;">
                    </div>

                    <!-- Mobile number -->
                    <div>
                        <label style="display: block; font-size: 12.5px; font-weight: 600; color: #334155; margin-bottom: 6px;">Mobile number</label>
                        <input type="text" name="mobile_number" value="{{ $mobile }}" placeholder="+63 900 000 0000" style="width: 100%; height: 42px; padding: 0 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; color: #0f172a; box-sizing: border-box;">
                    </div>

                    <!-- Country / Region -->
                    <div style="grid-column: 1 / -1;">
                        <label style="display: block; font-size: 12.5px; font-weight: 600; color: #334155; margin-bottom: 6px;">Country / Region</label>
                        <select name="country_region" style="width: 100%; height: 42px; padding: 0 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 13.5px; background: #fff; color: #0f172a; box-sizing: border-box;">
                            <option value="Philippines" {{ $country === 'Philippines' ? 'selected' : '' }}>Philippines</option>
                            <option value="United States" {{ $country === 'United States' ? 'selected' : '' }}>United States</option>
                            <option value="Singapore" {{ $country === 'Singapore' ? 'selected' : '' }}>Singapore</option>
                            <option value="Australia" {{ $country === 'Australia' ? 'selected' : '' }}>Australia</option>
                            <option value="Other" {{ $country === 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                </div>

                <div style="display: flex; justify-content: flex-start; margin-top: 24px;">
                    <button type="submit" style="height: 42px; padding: 0 24px; background: #2563eb; color: #ffffff; border: none; font-size: 13.5px; font-weight: 600; border-radius: 8px; cursor: pointer;">
                        Save changes
                    </button>
                </div>
            </form>

        </div>

        {{-- RIGHT COLUMN: ACCOUNT STATUS --}}
        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            
            <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                ACCOUNT STATUS
            </div>

            <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 16px 0;">
                Account Overview
            </h2>

            <div>
                <div style="padding: 12px 0; border-bottom: 1px solid #f1f5f9;">
                    <div style="font-size: 12px; color: #64748b; margin-bottom: 2px;">Account Status</div>
                    <div style="font-size: 13.5px; font-weight: 600; color: #0f172a;">Active</div>
                </div>

                <div style="padding: 12px 0; border-bottom: 1px solid #f1f5f9;">
                    <div style="font-size: 12px; color: #64748b; margin-bottom: 2px;">Verification</div>
                    <div style="font-size: 13.5px; font-weight: 600; color: #0f172a;">{{ ucfirst(session('client.verification.status', 'In Progress')) }}</div>
                </div>

                <div style="padding: 12px 0; border-bottom: 1px solid #f1f5f9;">
                    <div style="font-size: 12px; color: #64748b; margin-bottom: 2px;">Access Plan</div>
                    <div style="font-size: 13.5px; font-weight: 600; color: #0284c7;">30-Day Free Access</div>
                </div>

                <div style="padding: 12px 0;">
                    <div style="font-size: 12px; color: #64748b; margin-bottom: 2px;">Account Created</div>
                    <div style="font-size: 13.5px; font-weight: 600; color: #0f172a;">{{ $createdAt }}</div>
                </div>
            </div>

        </div>

    </div>

    {{-- BOTTOM CARD: SECURITY SHORTCUT --}}
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; margin-top: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap;">
            <div>
                <div style="font-size: 11px; font-weight: 700; color: #64748b; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 4px;">
                    ACCOUNT SECURITY
                </div>
                <h2 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
                    Manage your password
                </h2>
                <p style="font-size: 13px; color: #64748b; margin: 0;">
                    Update your password and review your account security settings.
                </p>
            </div>

            <a href="/settings/security" style="display: inline-flex; align-items: center; height: 40px; padding: 0 20px; background: #2563eb; color: #ffffff; text-decoration: none; font-size: 13px; font-weight: 600; border-radius: 8px;">
                Security Settings
            </a>
        </div>
    </div>

</div>

@endsection