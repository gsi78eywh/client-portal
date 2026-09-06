@extends('layouts.client')

@section('title', 'Human Capital Settings')

@section('header-title', 'Human Capital')

@section('content')

<div class="page-header">
    <div>
        <div class="card-label">MODULE SETTINGS</div>

    <h1 class="page-title">
        Human Capital
    </h1>

    <p class="page-description">
        Configure employee, workforce, organizational, and human capital
        management settings for your client account.
    </p>
</div>

</div>

{{-- MODULE STATUS --}}

<div class="card" style="margin-bottom:24px;">

<div class="card-label">
    MODULE STATUS
</div>

<div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    flex-wrap:wrap;
    margin-top:10px;
">

    <div>

        <h2 class="card-title">
            Human Capital
        </h2>

        <p class="card-description">
            Manage workforce information, employee records, roles,
            and organizational activities.
        </p>

    </div>

    <span style="
        padding:6px 12px;
        border-radius:999px;
        background:#dcfce7;
        color:#166534;
        font-size:12px;
        font-weight:600;
    ">
        Enabled
    </span>

</div>

</div>

{{-- HUMAN CAPITAL PREFERENCES --}}

<div class="card" style="margin-bottom:24px;">

<div class="card-label">
    HUMAN CAPITAL PREFERENCES
</div>

<h2 class="card-title" style="margin-top:8px;">
    Workforce Configuration
</h2>

<p class="card-description">
    Configure how employee and workforce information is managed.
</p>


<div style="margin-top:22px;">

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:20px;
        padding:18px 0;
        border-bottom:1px solid #e5e7eb;
    ">

        <div>

            <strong>
                Enable employee tracking
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Maintain employee and workforce records within the module.
            </p>

        </div>

        <input
            type="checkbox"
            checked
            style="width:18px;height:18px;"
        >

    </div>


    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:20px;
        padding:18px 0;
        border-bottom:1px solid #e5e7eb;
    ">

        <div>

            <strong>
                Enable organizational roles
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Manage employee roles and responsibilities within the organization.
            </p>

        </div>

        <input
            type="checkbox"
            checked
            style="width:18px;height:18px;"
        >

    </div>


    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:20px;
        padding:18px 0;
    ">

        <div>

            <strong>
                Maintain employee history
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Keep a history of employee and organizational changes.
            </p>

        </div>

        <input
            type="checkbox"
            checked
            style="width:18px;height:18px;"
        >

    </div>

</div>

</div>

{{-- EMPLOYEE RECORDS --}}

<div class="card" style="margin-bottom:24px;">

<div class="card-label">
    EMPLOYEE RECORDS
</div>

<h2 class="card-title" style="margin-top:8px;">
    Record Configuration
</h2>

<p class="card-description">
    Configure default settings for employee records.
</p>


<div style="
    margin-top:22px;
    display:grid;
    grid-template-columns:repeat(2,minmax(0,1fr));
    gap:18px;
">

    <div>

        <label style="
            display:block;
            font-size:13px;
            font-weight:600;
            margin-bottom:7px;
        ">
            Default Employee Status
        </label>

        <select style="
            width:100%;
            box-sizing:border-box;
            padding:11px 13px;
            border:1px solid #d1d5db;
            border-radius:8px;
            background:#fff;
        ">

            <option selected>Active</option>
            <option>Inactive</option>
            <option>Pending</option>

        </select>

    </div>


    <div>

        <label style="
            display:block;
            font-size:13px;
            font-weight:600;
            margin-bottom:7px;
        ">
            Record Review
        </label>

        <select style="
            width:100%;
            box-sizing:border-box;
            padding:11px 13px;
            border:1px solid #d1d5db;
            border-radius:8px;
            background:#fff;
        ">

            <option selected>Annual</option>
            <option>Quarterly</option>
            <option>Monthly</option>

        </select>

    </div>

</div>

</div>

{{-- WORKFORCE MANAGEMENT --}}

<div class="card" style="margin-bottom:24px;">

<div class="card-label">
    WORKFORCE MANAGEMENT
</div>

<h2 class="card-title" style="margin-top:8px;">
    Workforce Features
</h2>

<p class="card-description">
    Enable the workforce features available to authorized users.
</p>


<div style="
    margin-top:20px;
    display:grid;
    grid-template-columns:repeat(2,minmax(0,1fr));
    gap:12px;
">

    <div style="
        padding:16px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Employee Directory
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Maintain a centralized employee directory.
        </p>

    </div>


    <div style="
        padding:16px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Organization Structure
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Manage departments, teams, and organizational roles.
        </p>

    </div>


    <div style="
        padding:16px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Workforce Reports
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Generate workforce and employee activity reports.
        </p>

    </div>


    <div style="
        padding:16px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Activity History
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Keep track of important employee record activities.
        </p>

    </div>

</div>

</div>

{{-- SAVE --}}

<div class="card">

<div style="
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    flex-wrap:wrap;
">

    <div>

        <div class="card-label">
            MODULE SETTINGS
        </div>

        <p style="
            margin:7px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Save your Human Capital module configuration.
        </p>

    </div>

    <button
        type="button"
        class="btn btn-primary"
    >
        Save Changes
    </button>

</div>

</div>

@endsection
