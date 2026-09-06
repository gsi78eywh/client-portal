@extends('layouts.client')

@section('title', 'Finance Settings')

@section('header-title', 'Finance')

@section('content')

<div class="page-header">

<div>
    <div class="card-label">
        MODULE SETTINGS
    </div>

    <h1 class="page-title">
        Finance
    </h1>

    <p class="page-description">
        Configure financial records, reporting, approvals, and related
        settings for your client account.
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
            Finance
        </h2>

        <p class="card-description">
            Manage financial information, transactions, reports,
            and approval workflows.
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

{{-- FINANCE PREFERENCES --}}

<div class="card" style="margin-bottom:24px;">

<div class="card-label">
    FINANCE PREFERENCES
</div>

<h2 class="card-title" style="margin-top:8px;">
    General Configuration
</h2>

<p class="card-description">
    Configure the basic behavior of the Finance module.
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
                Enable financial tracking
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Track financial records and related activities.
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
                Require transaction approval
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Require designated users to approve financial transactions.
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
                Maintain financial history
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Keep a history of financial record changes and activities.
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

{{-- CURRENCY AND REPORTING --}}

<div class="card" style="margin-bottom:24px;">

<div class="card-label">
    REPORTING
</div>

<h2 class="card-title" style="margin-top:8px;">
    Financial Reporting
</h2>

<p class="card-description">
    Configure the default settings used for financial reporting.
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
            Default Currency
        </label>

        <select style="
            width:100%;
            box-sizing:border-box;
            padding:11px 13px;
            border:1px solid #d1d5db;
            border-radius:8px;
            background:#fff;
        ">

            <option selected>PHP - Philippine Peso</option>
            <option>USD - US Dollar</option>
            <option>EUR - Euro</option>

        </select>

    </div>


    <div>

        <label style="
            display:block;
            font-size:13px;
            font-weight:600;
            margin-bottom:7px;
        ">
            Reporting Period
        </label>

        <select style="
            width:100%;
            box-sizing:border-box;
            padding:11px 13px;
            border:1px solid #d1d5db;
            border-radius:8px;
            background:#fff;
        ">

            <option selected>Monthly</option>
            <option>Quarterly</option>
            <option>Annually</option>

        </select>

    </div>

</div>

</div>

{{-- APPROVAL WORKFLOW --}}

<div class="card" style="margin-bottom:24px;">

<div class="card-label">
    APPROVAL WORKFLOW
</div>

<h2 class="card-title" style="margin-top:8px;">
    Financial Approvals
</h2>

<p class="card-description">
    Configure how financial items move through the approval process.
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
            Draft
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Financial item is being prepared.
        </p>

    </div>


    <div style="
        padding:16px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Pending Approval
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Item is waiting for an authorized reviewer.
        </p>

    </div>


    <div style="
        padding:16px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Approved
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Item has been approved.
        </p>

    </div>


    <div style="
        padding:16px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Rejected
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Item requires correction or further action.
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
            Save your Finance module configuration.
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
