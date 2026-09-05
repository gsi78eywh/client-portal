@extends('layouts.client')

@section('title', 'Compliance Settings')

@section('header-title', 'Compliance')

@section('content')

<div class="page-header">

```
<div>
    <div class="card-label">
        MODULE SETTINGS
    </div>

    <h1 class="page-title">
        Compliance
    </h1>

    <p class="page-description">
        Configure compliance monitoring, requirements, and review settings
        for your client account.
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
            Compliance
        </h2>

        <p class="card-description">
            Monitor compliance requirements, deadlines, and review activities.
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

{{-- COMPLIANCE PREFERENCES --}}

<div class="card" style="margin-bottom:24px;">

```
<div class="card-label">
    COMPLIANCE PREFERENCES
</div>

<h2 class="card-title" style="margin-top:8px;">
    Monitoring Configuration
</h2>

<p class="card-description">
    Configure how compliance requirements are monitored and reviewed.
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
                Enable compliance tracking
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Track compliance requirements and their current status.
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
                Deadline reminders
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Notify assigned users when compliance deadlines are approaching.
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
                Maintain compliance history
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Keep historical records of compliance reviews and status changes.
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

{{-- REVIEW SETTINGS --}}

<div class="card" style="margin-bottom:24px;">

```
<div class="card-label">
    REVIEW SETTINGS
</div>

<h2 class="card-title" style="margin-top:8px;">
    Compliance Review
</h2>

<p class="card-description">
    Configure the default review behavior for compliance items.
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
            Default Review Frequency
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


    <div>

        <label style="
            display:block;
            font-size:13px;
            font-weight:600;
            margin-bottom:7px;
        ">
            Reminder Period
        </label>

        <select style="
            width:100%;
            box-sizing:border-box;
            padding:11px 13px;
            border:1px solid #d1d5db;
            border-radius:8px;
            background:#fff;
        ">

            <option selected>30 Days Before</option>
            <option>14 Days Before</option>
            <option>7 Days Before</option>

        </select>

    </div>

</div>
```

</div>

{{-- STATUS OPTIONS --}}

<div class="card" style="margin-bottom:24px;">

```
<div class="card-label">
    STATUS OPTIONS
</div>

<h2 class="card-title" style="margin-top:8px;">
    Compliance Statuses
</h2>

<p class="card-description">
    Statuses used to identify the current state of compliance requirements.
</p>


<div style="
    margin-top:20px;
    display:grid;
    grid-template-columns:repeat(2,minmax(0,1fr));
    gap:12px;
">

    <div style="
        padding:15px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Compliant
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Requirement is currently satisfied.
        </p>

    </div>


    <div style="
        padding:15px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Pending Review
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Requirement is waiting for review.
        </p>

    </div>


    <div style="
        padding:15px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Action Required
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Additional action is required.
        </p>

    </div>


    <div style="
        padding:15px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Expired
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Requirement or supporting information has expired.
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
            Save your Compliance module configuration.
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
