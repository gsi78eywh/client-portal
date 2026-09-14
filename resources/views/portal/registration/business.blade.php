@extends('layouts.registration')

@section('title', 'Your business or organization — ORDO')

@section('content')
@php
    $information = $information ?? session('registration.information', []);
    $businessAccountType = old('business_account_type', $information['business_account_type'] ?? '');
    $registeredName = old('registered_name', $information['registered_name'] ?? '');
    $tradeName = old('trade_name', $information['trade_name'] ?? '');
    $industry = old('industry', $information['industry'] ?? '');
    $registrationNumber = old('registration_number', $information['registration_number'] ?? '');
    $registrationDate = old('registration_date', $information['registration_date'] ?? '');
    $companyEmail = old('company_email', $information['company_email'] ?? $information['business_email'] ?? '');
    $companyPhone = old('company_phone', $information['company_phone'] ?? $information['contact_number'] ?? '');
    $relationship = old('relationship', $information['relationship'] ?? 'Owner / Founder');
    $isAuthorized = old('is_authorized', $information['is_authorized'] ?? 'Yes');
@endphp

<div class="auth-panel wide" id="businessPanel">
    <div class="kicker">CREATE YOUR ORDO ACCOUNT</div>
    <h2>Your business or organization</h2>
    <p>Tell us about the business account you're creating. You can update this later in Town Hall.</p>

    <div class="step-label">
        <span>Step 3 of 7 &mdash; Business Details</span>
        <span style="color: var(--blue);">43%</span>
    </div>
    <div class="wizard-top">
        <span class="wizard-step on" aria-label="Step 1 complete"></span>
        <span class="wizard-step on" aria-label="Step 2 complete"></span>
        <span class="wizard-step on" aria-label="Step 3 active"></span>
        <span class="wizard-step" aria-label="Step 4"></span>
        <span class="wizard-step" aria-label="Step 5"></span>
        <span class="wizard-step" aria-label="Step 6"></span>
        <span class="wizard-step" aria-label="Step 7"></span>
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="status">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error" role="alert">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <ul style="margin:0;padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Account Category Summary Badge --}}
    <div class="account-badge">
        <div class="account-badge-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/>
                <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/>
                <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/>
                <path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/>
            </svg>
        </div>
        <div>
            <div class="account-badge-title">Business / Organization account</div>
            <div class="account-badge-description">For registered corporations, partnerships, sole proprietorships, and entities.</div>
        </div>
    </div>

    <form method="POST" action="{{ route('business.update') }}" id="businessForm" novalidate>
        @csrf

        <div class="form-grid">
            {{-- Registered / Legal Name --}}
            <div class="full">
                <label class="label" for="registered_name">Registered / Legal name <span style="color:var(--red)">*</span></label>
                <input
                    type="text"
                    id="registered_name"
                    name="registered_name"
                    class="input @error('registered_name') has-error @enderror"
                    value="{{ $registeredName }}"
                    placeholder="Enter your registered legal entity name"
                    maxlength="255"
                    autocomplete="organization"
                    required
                >
                <div class="field-hint">Official legal name as registered with government authorities.</div>
                @error('registered_name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Business Account Type --}}
            <div>
                <label class="label" for="business_account_type">Entity type <span style="color:var(--red)">*</span></label>
                <div class="select-wrapper">
                    <select
                        id="business_account_type"
                        name="business_account_type"
                        class="select @error('business_account_type') has-error @enderror"
                        required
                    >
                        <option value="">Select entity type</option>
                        @php
                            $entityTypes = [
                                'Sole Proprietorship',
                                'Partnership',
                                'OPC',
                                'Corporation',
                                'Association / Nonprofit',
                                'Cooperative',
                                'Government / Public Entity',
                                'Other',
                            ];
                        @endphp
                        @foreach ($entityTypes as $type)
                            <option value="{{ $type }}" {{ $businessAccountType === $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                @error('business_account_type')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Industry --}}
            <div>
                <label class="label" for="industry">Industry</label>
                <div class="select-wrapper">
                    <select
                        id="industry"
                        name="industry"
                        class="select @error('industry') has-error @enderror"
                    >
                        <option value="">Select industry</option>
                        @php
                            $industries = [
                                'Accounting & Finance',
                                'Agriculture & Farming',
                                'Architecture & Engineering',
                                'Arts, Media & Entertainment',
                                'Automotive',
                                'Banking & Financial Services',
                                'Construction & Real Estate',
                                'Consulting & Professional Services',
                                'Education & Training',
                                'Energy & Utilities',
                                'Food & Beverage',
                                'Government & Public Sector',
                                'Healthcare & Medical',
                                'Hospitality & Tourism',
                                'Information Technology',
                                'Insurance',
                                'Legal Services',
                                'Logistics & Transportation',
                                'Manufacturing',
                                'Marketing & Advertising',
                                'Non-Profit & NGO',
                                'Pharmaceutical',
                                'Retail & E-Commerce',
                                'Telecommunications',
                                'Other',
                            ];
                        @endphp
                        @foreach ($industries as $ind)
                            <option value="{{ $ind }}" {{ $industry === $ind ? 'selected' : '' }}>{{ $ind }}</option>
                        @endforeach
                    </select>
                </div>
                @error('industry')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Trade / Operating Name --}}
            <div class="full">
                <label class="label" for="trade_name">Trade / Operating name <span style="color:var(--muted);font-weight:400;">(optional)</span></label>
                <input
                    type="text"
                    id="trade_name"
                    name="trade_name"
                    class="input @error('trade_name') has-error @enderror"
                    value="{{ $tradeName }}"
                    placeholder="Doing business as (DBA)"
                    maxlength="255"
                >
                @error('trade_name')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Registration Number --}}
            <div>
                <label class="label" for="registration_number">Registration number <span style="color:var(--muted);font-weight:400;">(optional)</span></label>
                <input
                    type="text"
                    id="registration_number"
                    name="registration_number"
                    class="input @error('registration_number') has-error @enderror"
                    value="{{ $registrationNumber }}"
                    placeholder="SEC / DTI / Registration No."
                    maxlength="100"
                >
                @error('registration_number')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Registration Date --}}
            <div>
                <label class="label" for="registration_date">Registration date <span style="color:var(--muted);font-weight:400;">(optional)</span></label>
                <input
                    type="date"
                    id="registration_date"
                    name="registration_date"
                    class="input @error('registration_date') has-error @enderror"
                    value="{{ $registrationDate }}"
                >
                @error('registration_date')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Company Email --}}
            <div>
                <label class="label" for="company_email">Company email <span style="color:var(--muted);font-weight:400;">(optional)</span></label>
                <input
                    type="email"
                    id="company_email"
                    name="company_email"
                    class="input @error('company_email') has-error @enderror"
                    value="{{ $companyEmail }}"
                    placeholder="info@yourcompany.com"
                    maxlength="255"
                    autocomplete="email"
                >
                @error('company_email')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Company Phone --}}
            <div>
                <label class="label" for="company_phone">Company phone <span style="color:var(--muted);font-weight:400;">(optional)</span></label>
                <input
                    type="tel"
                    id="company_phone"
                    name="company_phone"
                    class="input @error('company_phone') has-error @enderror"
                    value="{{ $companyPhone }}"
                    placeholder="+63 2 8XXX XXXX"
                    maxlength="50"
                    autocomplete="tel"
                >
                @error('company_phone')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Relationship to Account --}}
            <div>
                <label class="label" for="relationship">Your role / relationship <span style="color:var(--red)">*</span></label>
                <div class="select-wrapper">
                    <select
                        id="relationship"
                        name="relationship"
                        class="select @error('relationship') has-error @enderror"
                        required
                    >
                        <option value="">Select relationship</option>
                        @php
                            $businessRelationships = [
                                'Owner / Founder',
                                'Director / Officer',
                                'Employee / Staff',
                                'Authorized Representative',
                                'Other',
                            ];
                        @endphp
                        @foreach ($businessRelationships as $rel)
                            <option value="{{ $rel }}" {{ $relationship === $rel ? 'selected' : '' }}>{{ $rel }}</option>
                        @endforeach
                    </select>
                </div>
                @error('relationship')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>

            {{-- Authorization to Administer --}}
            <div>
                <label class="label" for="is_authorized">Authorized to administer? <span style="color:var(--red)">*</span></label>
                <div class="select-wrapper">
                    <select
                        id="is_authorized"
                        name="is_authorized"
                        class="select @error('is_authorized') has-error @enderror"
                        required
                    >
                        <option value="Yes" {{ ($isAuthorized === 'Yes' || $isAuthorized === true || $isAuthorized === 1 || $isAuthorized === '1') ? 'selected' : '' }}>Yes, I am authorized</option>
                        <option value="No" {{ ($isAuthorized === 'No' || $isAuthorized === false || $isAuthorized === 0 || $isAuthorized === '0') ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                @error('is_authorized')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Guidance Box --}}
        <div style="margin-top: 24px; padding: 14px 16px; background: #f8fafc; border: 1.5px solid #e2e8f0; border-radius: var(--radius-sm); display: flex; align-items: flex-start; gap: 12px;">
            <div style="color: var(--blue); margin-top: 1px; flex-shrink: 0;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
            </div>
            <div style="font-size: 12.5px; color: var(--muted); line-height: 1.5;">
                <strong style="color: var(--ink); display: block; margin-bottom: 2px;">Corporate governance & compliance</strong>
                Your entity information will be linked across ORDO compliance, filings, and stakeholder registries. Additional documents can be uploaded after setup.
            </div>
        </div>

        {{-- Actions --}}
        <div class="form-actions">
            <a href="{{ route('register.account') }}" class="btn secondary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
                <span>Back</span>
            </a>
            <button type="submit" class="btn primary">
                <span>Continue</span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m13 6 6 6-6 6"/></svg>
            </button>
        </div>
    </form>
</div>
@endsection