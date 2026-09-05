@extends('layouts.client')

@section('title', 'Transmittals Settings')

@section('header-title', 'Transmittals')

@section('content')

<div class="page-header">
    <div>
        <div class="card-label">MODULE SETTINGS</div>

```
    <h1 class="page-title">
        Transmittals
    </h1>

    <p class="page-description">
        Configure transmittal creation, tracking, routing, approvals,
        and delivery settings for your client account.
    </p>
</div>
```

</div>

{{-- MODULE STATUS --}}

<div class="card" style="margin-bottom:24px;">

```
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
            Transmittals
        </h2>

        <p class="card-description">
            Manage outgoing and incoming transmittals, routing,
            recipients, and delivery history.
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
```

</div>

{{-- TRANSMITTAL PREFERENCES --}}

<div class="card" style="margin-bottom:24px;">

```
<div class="card-label">
    TRANSMITTAL PREFERENCES
</div>

<h2 class="card-title" style="margin-top:8px;">
    General Configuration
</h2>

<p class="card-description">
    Configure how transmittals are created and managed.
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
                Enable transmittal tracking
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Track the status and movement of every transmittal.
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
                Require approval before sending
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Require an authorized user to approve transmittals before delivery.
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
                Maintain delivery history
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Keep a complete history of transmittal deliveries and updates.
            </p>

        </div>

        <input
            type="checkbox"
            checked
            style="width:18px;height:18px;"
        >

    </div>

</div>
```

</div>

{{-- NUMBERING --}}

<div class="card" style="margin-bottom:24px;">

```
<div class="card-label">
    TRANSMITTAL NUMBERING
</div>

<h2 class="card-title" style="margin-top:8px;">
    Numbering Configuration
</h2>

<p class="card-description">
    Configure how new transmittals are identified.
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
            Numbering Format
        </label>

        <select style="
            width:100%;
            box-sizing:border-box;
            padding:11px 13px;
            border:1px solid #d1d5db;
            border-radius:8px;
            background:#fff;
        ">

            <option selected>TR-000001</option>
            <option>TRAN-000001</option>
            <option>2026-TR-000001</option>

        </select>

    </div>


    <div>

        <label style="
            display:block;
            font-size:13px;
            font-weight:600;
            margin-bottom:7px;
        ">
            Starting Number
        </label>

        <input
            type="number"
            value="1"
            min="1"
            style="
                width:100%;
                box-sizing:border-box;
                padding:11px 13px;
                border:1px solid #d1d5db;
                border-radius:8px;
            "
        >

    </div>

</div>
```

</div>

{{-- WORKFLOW --}}

<div class="card" style="margin-bottom:24px;">

```
<div class="card-label">
    WORKFLOW
</div>

<h2 class="card-title" style="margin-top:8px;">
    Transmittal Workflow
</h2>

<p class="card-description">
    Default statuses used while processing transmittals.
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
            Transmittal is being prepared.
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
            Transmittal is waiting for approval.
        </p>

    </div>


    <div style="
        padding:16px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Sent
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Transmittal has been delivered to its recipient.
        </p>

    </div>


    <div style="
        padding:16px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Completed
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Transmittal processing has been completed.
        </p>

    </div>

</div>
```

</div>

{{-- DELIVERY --}}

<div class="card" style="margin-bottom:24px;">

```
<div class="card-label">
    DELIVERY
</div>

<h2 class="card-title" style="margin-top:8px;">
    Delivery Options
</h2>

<p class="card-description">
    Configure the available transmittal delivery methods.
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
            Portal Delivery
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Make transmittals available through the ORDO portal.
        </p>

    </div>


    <div style="
        padding:16px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Email Notification
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Notify recipients when a transmittal is sent.
        </p>

    </div>

</div>
```

</div>

{{-- SAVE --}}

<div class="card">

```
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
            Save your Transmittals module configuration.
        </p>

    </div>

    <button
        type="button"
        class="btn btn-primary"
    >
        Save Changes
    </button>

</div>
```

</div>

@endsection
