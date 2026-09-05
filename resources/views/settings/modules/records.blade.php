@extends('layouts.client')

@section('title', 'Records Settings')

@section('header-title', 'Records')

@section('content')

<div class="page-header">
    <div>
        <div class="card-label">MODULE SETTINGS</div>

```
    <h1 class="page-title">
        Records
    </h1>

    <p class="page-description">
        Configure document records, retention, organization, and
        access settings for your client account.
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
            Records
        </h2>

        <p class="card-description">
            Manage organizational records, documents, retention,
            and record history.
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

{{-- RECORD PREFERENCES --}}

<div class="card" style="margin-bottom:24px;">

```
<div class="card-label">
    RECORD PREFERENCES
</div>

<h2 class="card-title" style="margin-top:8px;">
    Records Configuration
</h2>

<p class="card-description">
    Configure how records are created, maintained, and monitored.
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
                Enable records tracking
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Track organizational records and their current status.
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
                Enable version history
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Keep previous versions when records are updated.
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
                Maintain activity history
            </strong>

            <p style="
                margin:5px 0 0;
                color:#6b7280;
                font-size:13px;
            ">
                Keep a history of important record activities.
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

{{-- RETENTION --}}

<div class="card" style="margin-bottom:24px;">

```
<div class="card-label">
    RETENTION
</div>

<h2 class="card-title" style="margin-top:8px;">
    Record Retention
</h2>

<p class="card-description">
    Configure how long records should remain available in the system.
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
            Default Retention Period
        </label>

        <select style="
            width:100%;
            box-sizing:border-box;
            padding:11px 13px;
            border:1px solid #d1d5db;
            border-radius:8px;
            background:#fff;
        ">

            <option selected>7 Years</option>
            <option>5 Years</option>
            <option>10 Years</option>
            <option>Permanent</option>

        </select>

    </div>


    <div>

        <label style="
            display:block;
            font-size:13px;
            font-weight:600;
            margin-bottom:7px;
        ">
            Default Record Status
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
            <option>Draft</option>
            <option>Archived</option>

        </select>

    </div>

</div>
```

</div>

{{-- ACCESS AND ORGANIZATION --}}

<div class="card" style="margin-bottom:24px;">

```
<div class="card-label">
    ACCESS &amp; ORGANIZATION
</div>

<h2 class="card-title" style="margin-top:8px;">
    Record Access
</h2>

<p class="card-description">
    Configure how users access and organize records.
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
            Role-Based Access
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Control record access based on user roles.
        </p>

    </div>


    <div style="
        padding:16px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Record Categories
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Organize records into predefined categories.
        </p>

    </div>


    <div style="
        padding:16px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Search &amp; Filtering
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Allow authorized users to search and filter records.
        </p>

    </div>


    <div style="
        padding:16px;
        border:1px solid #e5e7eb;
        border-radius:9px;
    ">

        <strong>
            Archive Management
        </strong>

        <p style="
            margin:5px 0 0;
            color:#6b7280;
            font-size:13px;
        ">
            Manage records that are no longer actively used.
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
            Save your Records module configuration.
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
