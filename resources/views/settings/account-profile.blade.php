@extends('layouts.client')

@section('title', 'Account Profile')

@section('header-title', 'Account Profile')

@section('content')

@php
    $accountProfile = session('account_profile', []);
@endphp

<div class="main-content-container" style="max-width: 900px; padding: 10px 0;">

    <!-- PAGE HEADER SECTION -->
    <div style="margin-bottom: 24px;">

        <!-- SETTINGS BADGE -->
        <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 6px;">
            SETTINGS
        </div>

        <!-- MAIN TITLE -->
        <h1 style="font-size: 24px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 4px 0; line-height: 1.2;">
            Account Profile
        </h1>

        <p style="font-size: 13.5px; color: #64748b; margin: 0;">
            Neutral business/professional profile. This can represent an individual, professional, practice, business or organization.
        </p>

    </div>


    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div style="
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 18px;
            padding: 12px 14px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            color: #166534;
            font-size: 13px;
            font-weight: 500;
        ">
            <svg
                width="18"
                height="18"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                style="flex-shrink: 0;"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                />
            </svg>

            <span>{{ session('success') }}</span>
        </div>
    @endif


    <!-- VALIDATION ERRORS -->
    @if($errors->any())
        <div style="
            margin-bottom: 18px;
            padding: 12px 14px;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 8px;
            color: #b91c1c;
            font-size: 13px;
        ">
            <div style="font-weight: 700; margin-bottom: 5px;">
                Please review the following:
            </div>

            <ul style="margin: 0; padding-left: 18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- MAIN FORM CARD CONTAINER -->
    <div style="
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 28px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.02);
    ">

        <!-- PROFILE LOGO & STATUS BANNER -->
        <div style="
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 16px;
            border: 1px dashed #cbd5e1;
            border-radius: 10px;
            background: #ffffff;
            margin-bottom: 28px;
        ">

            <!-- LOGO PLACEHOLDER -->
            <div style="
                width: 64px;
                height: 64px;
                border: 1px dashed #94a3b8;
                border-radius: 8px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background: #ffffff;
                color: #64748b;
                font-size: 11px;
                flex-shrink: 0;
            ">

                <svg
                    width="20"
                    height="20"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    style="margin-bottom: 2px;"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.5"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                    />
                </svg>

                Logo

            </div>


            <!-- PROFILE SUMMARY -->
            <div>

                <h3 style="
                    font-size: 16px;
                    font-weight: 700;
                    color: #0f172a;
                    margin: 0 0 2px 0;
                ">
                    {{ old('trade_name', $accountProfile['trade_name'] ?? 'John Kelly & Company') }}
                </h3>

                <div style="
                    font-size: 12px;
                    color: #64748b;
                    margin-bottom: 6px;
                ">
                    ORDO Account ID: ORDO-908550319
                </div>

                <span style="
                    display: inline-block;
                    background: #fef3c7;
                    color: #b45309;
                    font-size: 11px;
                    font-weight: 600;
                    padding: 3px 10px;
                    border-radius: 12px;
                ">
                    Profile incomplete
                </span>

            </div>

        </div>


        <!-- ACCOUNT PROFILE FORM -->
        <form
            action="{{ route('settings.account-profile.update') }}"
            method="POST"
        >

            @csrf


            <!-- FORM GRID -->
            <div style="
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 18px 20px;
                margin-bottom: 24px;
            ">


                <!-- ACCOUNT TYPE -->
                <div>

                    <label style="
                        display: block;
                        font-size: 12px;
                        font-weight: 600;
                        color: #334155;
                        margin-bottom: 6px;
                    ">
                        Account Type *
                    </label>

                    <select
                        name="account_type"
                        style="
                            width: 100%;
                            height: 42px;
                            padding: 0 12px;
                            border: 1px solid #cbd5e1;
                            border-radius: 8px;
                            font-size: 13.5px;
                            background: #fff;
                            color: #0f172a;
                            box-sizing: border-box;
                        "
                    >

                        <option
                            value="Corporation"
                            {{ old('account_type', $accountProfile['account_type'] ?? 'Corporation') === 'Corporation' ? 'selected' : '' }}
                        >
                            Corporation
                        </option>

                        <option
                            value="Sole Proprietorship"
                            {{ old('account_type', $accountProfile['account_type'] ?? '') === 'Sole Proprietorship' ? 'selected' : '' }}
                        >
                            Sole Proprietorship
                        </option>

                        <option
                            value="Partnership"
                            {{ old('account_type', $accountProfile['account_type'] ?? '') === 'Partnership' ? 'selected' : '' }}
                        >
                            Partnership
                        </option>

                        <option
                            value="Individual"
                            {{ old('account_type', $accountProfile['account_type'] ?? '') === 'Individual' ? 'selected' : '' }}
                        >
                            Individual / Professional
                        </option>

                    </select>

                </div>


                <!-- REGISTERED / LEGAL NAME -->
                <div>

                    <label style="
                        display: block;
                        font-size: 12px;
                        font-weight: 600;
                        color: #334155;
                        margin-bottom: 6px;
                    ">
                        Registered / Legal Name *
                    </label>

                    <input
                        type="text"
                        name="registered_name"
                        value="{{ old('registered_name', $accountProfile['registered_name'] ?? 'John Kelly and Company (JK&C Inc.)') }}"
                        placeholder="Enter legal or registered name"
                        style="
                            width: 100%;
                            height: 42px;
                            padding: 0 12px;
                            border: 1px solid #cbd5e1;
                            border-radius: 8px;
                            font-size: 13.5px;
                            color: #0f172a;
                            box-sizing: border-box;
                        "
                    >

                </div>


                <!-- TRADE / PROFESSIONAL NAME -->
                <div>

                    <label style="
                        display: block;
                        font-size: 12px;
                        font-weight: 600;
                        color: #334155;
                        margin-bottom: 6px;
                    ">
                        Trade / Professional Name
                    </label>

                    <input
                        type="text"
                        name="trade_name"
                        value="{{ old('trade_name', $accountProfile['trade_name'] ?? 'John Kelly & Company') }}"
                        placeholder="Enter trade name"
                        style="
                            width: 100%;
                            height: 42px;
                            padding: 0 12px;
                            border: 1px solid #cbd5e1;
                            border-radius: 8px;
                            font-size: 13.5px;
                            color: #0f172a;
                            box-sizing: border-box;
                        "
                    >

                </div>


                <!-- TIN -->
                <div>

                    <label style="
                        display: block;
                        font-size: 12px;
                        font-weight: 600;
                        color: #334155;
                        margin-bottom: 6px;
                    ">
                        TIN *
                    </label>

                    <input
                        type="text"
                        name="tin"
                        value="{{ old('tin', $accountProfile['tin'] ?? '000-000-000-000') }}"
                        placeholder="000-000-000-000"
                        style="
                            width: 100%;
                            height: 42px;
                            padding: 0 12px;
                            border: 1px solid #cbd5e1;
                            border-radius: 8px;
                            font-size: 13.5px;
                            color: #0f172a;
                            box-sizing: border-box;
                        "
                    >

                </div>


                <!-- REGISTRATION NUMBER -->
                <div>

                    <label style="
                        display: block;
                        font-size: 12px;
                        font-weight: 600;
                        color: #334155;
                        margin-bottom: 6px;
                    ">
                        Registration Number
                    </label>

                    <input
                        type="text"
                        name="registration_number"
                        value="{{ old('registration_number', $accountProfile['registration_number'] ?? '2025120230900-02') }}"
                        placeholder="Enter registration number"
                        style="
                            width: 100%;
                            height: 42px;
                            padding: 0 12px;
                            border: 1px solid #cbd5e1;
                            border-radius: 8px;
                            font-size: 13.5px;
                            color: #0f172a;
                            box-sizing: border-box;
                        "
                    >

                </div>


                <!-- REGISTRATION AUTHORITY -->
                <div>

                    <label style="
                        display: block;
                        font-size: 12px;
                        font-weight: 600;
                        color: #334155;
                        margin-bottom: 6px;
                    ">
                        Registration Authority
                    </label>

                    <select
                        name="registration_authority"
                        style="
                            width: 100%;
                            height: 42px;
                            padding: 0 12px;
                            border: 1px solid #cbd5e1;
                            border-radius: 8px;
                            font-size: 13.5px;
                            background: #fff;
                            color: #0f172a;
                            box-sizing: border-box;
                        "
                    >

                        <option
                            value="SEC"
                            {{ old('registration_authority', $accountProfile['registration_authority'] ?? 'SEC') === 'SEC' ? 'selected' : '' }}
                        >
                            SEC
                        </option>

                        <option
                            value="DTI"
                            {{ old('registration_authority', $accountProfile['registration_authority'] ?? '') === 'DTI' ? 'selected' : '' }}
                        >
                            DTI
                        </option>

                        <option
                            value="CDA"
                            {{ old('registration_authority', $accountProfile['registration_authority'] ?? '') === 'CDA' ? 'selected' : '' }}
                        >
                            CDA
                        </option>

                        <option
                            value="BIR"
                            {{ old('registration_authority', $accountProfile['registration_authority'] ?? '') === 'BIR' ? 'selected' : '' }}
                        >
                            BIR
                        </option>

                    </select>

                </div>


                <!-- INDUSTRY / PROFESSION -->
                <div>

                    <label style="
                        display: block;
                        font-size: 12px;
                        font-weight: 600;
                        color: #334155;
                        margin-bottom: 6px;
                    ">
                        Industry / Profession
                    </label>

                    <input
                        type="text"
                        name="industry"
                        value="{{ old('industry', $accountProfile['industry'] ?? 'Corporate Advisory & Management Consulting') }}"
                        placeholder="Enter industry or profession"
                        style="
                            width: 100%;
                            height: 42px;
                            padding: 0 12px;
                            border: 1px solid #cbd5e1;
                            border-radius: 8px;
                            font-size: 13.5px;
                            color: #0f172a;
                            box-sizing: border-box;
                        "
                    >

                </div>


                <!-- BUSINESS / PROFESSIONAL EMAIL -->
                <div>

                    <label style="
                        display: block;
                        font-size: 12px;
                        font-weight: 600;
                        color: #334155;
                        margin-bottom: 6px;
                    ">
                        Business / Professional Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $accountProfile['email'] ?? 'info@jknc.io') }}"
                        placeholder="Enter business email"
                        style="
                            width: 100%;
                            height: 42px;
                            padding: 0 12px;
                            border: 1px solid #cbd5e1;
                            border-radius: 8px;
                            font-size: 13.5px;
                            color: #0f172a;
                            box-sizing: border-box;
                        "
                    >

                </div>


                <!-- PRIMARY ADDRESS -->
                <div style="grid-column: 1 / -1;">

                    <label style="
                        display: block;
                        font-size: 12px;
                        font-weight: 600;
                        color: #334155;
                        margin-bottom: 6px;
                    ">
                        Primary Address *
                    </label>

                    <input
                        type="text"
                        name="primary_address"
                        value="{{ old('primary_address', $accountProfile['primary_address'] ?? 'Unit 305, 3F Cebu Holdings Center, Cebu Business Park, Cebu City') }}"
                        placeholder="Enter primary address"
                        style="
                            width: 100%;
                            height: 42px;
                            padding: 0 12px;
                            border: 1px solid #cbd5e1;
                            border-radius: 8px;
                            font-size: 13.5px;
                            color: #0f172a;
                            box-sizing: border-box;
                        "
                    >

                </div>


                <!-- RELATIONSHIP -->
                <div>

                    <label style="
                        display: block;
                        font-size: 12px;
                        font-weight: 600;
                        color: #334155;
                        margin-bottom: 6px;
                    ">
                        Your relationship to this account *
                    </label>

                    <select
                        name="relationship"
                        style="
                            width: 100%;
                            height: 42px;
                            padding: 0 12px;
                            border: 1px solid #cbd5e1;
                            border-radius: 8px;
                            font-size: 13.5px;
                            background: #fff;
                            color: #0f172a;
                            box-sizing: border-box;
                        "
                    >

                        <option
                            value="President / CEO"
                            {{ old('relationship', $accountProfile['relationship'] ?? 'President / CEO') === 'President / CEO' ? 'selected' : '' }}
                        >
                            President / CEO
                        </option>

                        <option
                            value="Director"
                            {{ old('relationship', $accountProfile['relationship'] ?? '') === 'Director' ? 'selected' : '' }}
                        >
                            Director
                        </option>

                        <option
                            value="Owner / Sole Proprietor"
                            {{ old('relationship', $accountProfile['relationship'] ?? '') === 'Owner / Sole Proprietor' ? 'selected' : '' }}
                        >
                            Owner / Sole Proprietor
                        </option>

                        <option
                            value="Authorized Representative"
                            {{ old('relationship', $accountProfile['relationship'] ?? '') === 'Authorized Representative' ? 'selected' : '' }}
                        >
                            Authorized Representative
                        </option>

                    </select>

                </div>


                <!-- AUTHORIZED TO ADMINISTER -->
                <div>

                    <label style="
                        display: block;
                        font-size: 12px;
                        font-weight: 600;
                        color: #334155;
                        margin-bottom: 6px;
                    ">
                        Authorized to administer this ORDO account? *
                    </label>

                    <select
                        name="is_authorized"
                        style="
                            width: 100%;
                            height: 42px;
                            padding: 0 12px;
                            border: 1px solid #cbd5e1;
                            border-radius: 8px;
                            font-size: 13.5px;
                            background: #fff;
                            color: #0f172a;
                            box-sizing: border-box;
                        "
                    >

                        <option
                            value="Yes"
                            {{ old('is_authorized', $accountProfile['is_authorized'] ?? 'Yes') === 'Yes' ? 'selected' : '' }}
                        >
                            Yes
                        </option>

                        <option
                            value="No"
                            {{ old('is_authorized', $accountProfile['is_authorized'] ?? '') === 'No' ? 'selected' : '' }}
                        >
                            No
                        </option>

                    </select>

                </div>

            </div>


            <!-- SAVE ACTION BUTTON -->
            <div style="margin-top: 28px;">

                <button
                    type="submit"
                    style="
                        height: 42px;
                        padding: 0 24px;
                        background: #2563eb;
                        color: #ffffff;
                        border: none;
                        font-size: 13.5px;
                        font-weight: 600;
                        border-radius: 8px;
                        cursor: pointer;
                    "
                >
                    Save Account Profile
                </button>

            </div>

        </form>

    </div>

</div>

@endsection