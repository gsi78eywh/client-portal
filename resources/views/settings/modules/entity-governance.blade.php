@extends('layouts.client')

@section('title', 'Entity & Governance')

@section('header-title', 'Entity & Governance')

@section('content')

<style>
    .eg-page {
        max-width: 1400px;
        margin: 0 auto;
    }

    .eg-page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        margin-bottom: 28px;
    }

    .eg-page-title {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
        color: #111827;
    }

    .eg-page-description {
        margin: 7px 0 0;
        color: #6b7280;
        font-size: 14px;
    }

    .eg-actions {
        display: flex;
        gap: 10px;
    }

    .eg-button {
        border: 1px solid #d1d5db;
        background: #ffffff;
        color: #374151;
        padding: 10px 16px;
        border-radius: 7px;
        font-size: 14px;
        cursor: pointer;
    }

    .eg-button-primary {
        background: #111827;
        border-color: #111827;
        color: #ffffff;
    }

    .eg-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        background: #ecfdf5;
        color: #047857;
    }

    .eg-status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #10b981;
    }

    .eg-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }

    .eg-stat-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 20px;
    }

    .eg-stat-label {
        color: #6b7280;
        font-size: 13px;
        margin-bottom: 10px;
    }

    .eg-stat-value {
        font-size: 25px;
        font-weight: 700;
        color: #111827;
    }

    .eg-stat-note {
        margin-top: 7px;
        color: #9ca3af;
        font-size: 12px;
    }

    .eg-main-grid {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 20px;
    }

    .eg-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .eg-card-header {
        padding: 18px 20px;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .eg-card-title {
        margin: 0;
        font-size: 17px;
        font-weight: 650;
        color: #111827;
    }

    .eg-card-link {
        color: #4b5563;
        font-size: 13px;
        text-decoration: none;
    }

    .eg-card-body {
        padding: 20px;
    }

    .eg-info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }

    .eg-info-label {
        display: block;
        font-size: 12px;
        color: #9ca3af;
        margin-bottom: 5px;
    }

    .eg-info-value {
        color: #111827;
        font-size: 14px;
        font-weight: 500;
    }

    .eg-table {
        width: 100%;
        border-collapse: collapse;
    }

    .eg-table th {
        text-align: left;
        font-size: 12px;
        font-weight: 600;
        color: #6b7280;
        background: #f9fafb;
        padding: 11px 14px;
        border-bottom: 1px solid #e5e7eb;
    }

    .eg-table td {
        padding: 13px 14px;
        font-size: 13px;
        color: #374151;
        border-bottom: 1px solid #f3f4f6;
    }

    .eg-table tr:last-child td {
        border-bottom: none;
    }

    .eg-role {
        color: #6b7280;
        font-size: 12px;
    }

    .eg-document {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 13px 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .eg-document:last-child {
        border-bottom: none;
    }

    .eg-document-icon {
        width: 38px;
        height: 38px;
        border-radius: 8px;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #374151;
        font-size: 17px;
    }

    .eg-document-name {
        font-size: 13px;
        color: #111827;
        font-weight: 500;
    }

    .eg-document-meta {
        font-size: 11px;
        color: #9ca3af;
        margin-top: 3px;
    }

    .eg-activity {
        display: flex;
        gap: 12px;
        padding: 14px 0;
        border-bottom: 1px solid #f3f4f6;
    }

    .eg-activity:last-child {
        border-bottom: none;
    }

    .eg-activity-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #f3f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
    }

    .eg-activity-title {
        font-size: 13px;
        color: #374151;
    }

    .eg-activity-time {
        font-size: 11px;
        color: #9ca3af;
        margin-top: 4px;
    }

    .eg-empty {
        padding: 25px;
        text-align: center;
        color: #9ca3af;
        font-size: 13px;
    }

    @media (max-width: 1000px) {
        .eg-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .eg-main-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 650px) {
        .eg-page-header {
            flex-direction: column;
        }

        .eg-actions {
            width: 100%;
        }

        .eg-button {
            flex: 1;
        }

        .eg-grid {
            grid-template-columns: 1fr;
        }

        .eg-info-grid {
            grid-template-columns: 1fr;
        }

        .eg-card {
            overflow-x: auto;
        }
    }
</style>


<div class="eg-page">

    {{-- PAGE HEADER --}}
    <div class="eg-page-header">

        <div>

            <div style="margin-bottom: 8px;">
                <span class="eg-status">
                    <span class="eg-status-dot"></span>
                    Active
                </span>
            </div>

            <h1 class="eg-page-title">
                Entity & Governance
            </h1>

            <p class="eg-page-description">
                Manage entity information, governance records, ownership,
                officers, meetings and corporate documents.
            </p>

        </div>

        <div class="eg-actions">

            <button class="eg-button">
                Export
            </button>

            <button class="eg-button eg-button-primary">
                + Add Record
            </button>

        </div>

    </div>


    {{-- SUMMARY CARDS --}}
    <div class="eg-grid">

        <div class="eg-stat-card">

            <div class="eg-stat-label">
                Directors &amp; Officers
            </div>

            <div class="eg-stat-value">
                8
            </div>

            <div class="eg-stat-note">
                Active appointments
            </div>

        </div>


        <div class="eg-stat-card">

            <div class="eg-stat-label">
                Shareholders
            </div>

            <div class="eg-stat-value">
                12
            </div>

            <div class="eg-stat-note">
                Current ownership records
            </div>

        </div>


        <div class="eg-stat-card">

            <div class="eg-stat-label">
                Governance Records
            </div>

            <div class="eg-stat-value">
                36
            </div>

            <div class="eg-stat-note">
                Meetings, resolutions and records
            </div>

        </div>


        <div class="eg-stat-card">

            <div class="eg-stat-label">
                Corporate Documents
            </div>

            <div class="eg-stat-value">
                24
            </div>

            <div class="eg-stat-note">
                Stored in ORDO Records
            </div>

        </div>

    </div>


    <div class="eg-main-grid">

        {{-- LEFT COLUMN --}}
        <div>


            {{-- ENTITY PROFILE --}}
            <div class="eg-card">

                <div class="eg-card-header">

                    <h2 class="eg-card-title">
                        Entity Profile
                    </h2>

                    <a href="/settings/account-profile" class="eg-card-link">
                        Configure
                    </a>

                </div>

                <div class="eg-card-body">

                    <div class="eg-info-grid">

                        <div>
                            <span class="eg-info-label">
                                Registered / Legal Name
                            </span>

                            <span class="eg-info-value">
                                ORDO Sample Corporation
                            </span>
                        </div>


                        <div>
                            <span class="eg-info-label">
                                Trade Name
                            </span>

                            <span class="eg-info-value">
                                ORDO
                            </span>
                        </div>


                        <div>
                            <span class="eg-info-label">
                                Account Type
                            </span>

                            <span class="eg-info-value">
                                Corporation
                            </span>
                        </div>


                        <div>
                            <span class="eg-info-label">
                                Registration Number
                            </span>

                            <span class="eg-info-value">
                                CS2026-001234
                            </span>
                        </div>


                        <div>
                            <span class="eg-info-label">
                                Registration Authority
                            </span>

                            <span class="eg-info-value">
                                Securities and Exchange Commission
                            </span>
                        </div>


                        <div>
                            <span class="eg-info-label">
                                Date of Registration
                            </span>

                            <span class="eg-info-value">
                                January 15, 2024
                            </span>
                        </div>


                        <div>
                            <span class="eg-info-label">
                                Industry
                            </span>

                            <span class="eg-info-value">
                                Professional Services
                            </span>
                        </div>


                        <div>
                            <span class="eg-info-label">
                                TIN
                            </span>

                            <span class="eg-info-value">
                                123-456-789-000
                            </span>
                        </div>

                    </div>

                </div>

            </div>


            {{-- DIRECTORS AND OFFICERS --}}
            <div class="eg-card">

                <div class="eg-card-header">

                    <h2 class="eg-card-title">
                        Directors &amp; Officers
                    </h2>

                    <a href="#" class="eg-card-link">
                        View All
                    </a>

                </div>

                <table class="eg-table">

                    <thead>

                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Appointment</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>
                                Maria Santos
                            </td>

                            <td>
                                President
                            </td>

                            <td>
                                June 01, 2025
                            </td>

                            <td>
                                <span class="eg-status">
                                    <span class="eg-status-dot"></span>
                                    Active
                                </span>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Daniel Reyes
                            </td>

                            <td>
                                Treasurer
                            </td>

                            <td>
                                June 01, 2025
                            </td>

                            <td>
                                <span class="eg-status">
                                    <span class="eg-status-dot"></span>
                                    Active
                                </span>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Angela Cruz
                            </td>

                            <td>
                                Corporate Secretary
                            </td>

                            <td>
                                June 01, 2025
                            </td>

                            <td>
                                <span class="eg-status">
                                    <span class="eg-status-dot"></span>
                                    Active
                                </span>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>


            {{-- RECENT GOVERNANCE RECORDS --}}
            <div class="eg-card">

                <div class="eg-card-header">

                    <h2 class="eg-card-title">
                        Recent Governance Records
                    </h2>

                    <a href="#" class="eg-card-link">
                        View All
                    </a>

                </div>

                <table class="eg-table">

                    <thead>

                        <tr>
                            <th>Record</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>
                                Annual Stockholders' Meeting 2026
                            </td>

                            <td>
                                Meeting
                            </td>

                            <td>
                                June 20, 2026
                            </td>

                            <td>
                                <span class="eg-status">
                                    <span class="eg-status-dot"></span>
                                    Completed
                                </span>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Board Resolution No. 2026-014
                            </td>

                            <td>
                                Resolution
                            </td>

                            <td>
                                July 08, 2026
                            </td>

                            <td>
                                <span class="eg-status">
                                    <span class="eg-status-dot"></span>
                                    Approved
                                </span>
                            </td>

                        </tr>


                        <tr>

                            <td>
                                Board Meeting - Q3
                            </td>

                            <td>
                                Meeting
                            </td>

                            <td>
                                August 12, 2026
                            </td>

                            <td>
                                <span class="eg-status">
                                    <span class="eg-status-dot"></span>
                                    Completed
                                </span>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>


        {{-- RIGHT COLUMN --}}
        <div>


            {{-- OWNERSHIP --}}
            <div class="eg-card">

                <div class="eg-card-header">

                    <h2 class="eg-card-title">
                        Ownership
                    </h2>

                    <a href="#" class="eg-card-link">
                        View All
                    </a>

                </div>

                <div class="eg-card-body">

                    <div class="eg-info-grid">

                        <div>
                            <span class="eg-info-label">
                                Total Shares
                            </span>

                            <span class="eg-info-value">
                                1,000,000
                            </span>
                        </div>

                        <div>
                            <span class="eg-info-label">
                                Shareholders
                            </span>

                            <span class="eg-info-value">
                                12
                            </span>
                        </div>

                    </div>

                    <div style="margin-top: 22px;">

                        <div class="eg-info-label">
                            Largest Ownership
                        </div>

                        <div style="font-size: 14px; font-weight: 600;">
                            Santos Holdings
                        </div>

                        <div style="font-size: 12px; color: #9ca3af; margin-top: 3px;">
                            420,000 shares · 42%
                        </div>

                    </div>

                </div>

            </div>


            {{-- CORPORATE DOCUMENTS --}}
            <div class="eg-card">

                <div class="eg-card-header">

                    <h2 class="eg-card-title">
                        Corporate Documents
                    </h2>

                    <a href="/records" class="eg-card-link">
                        Open Records
                    </a>

                </div>

                <div class="eg-card-body">

                    <div class="eg-document">

                        <div class="eg-document-icon">
                            ▤
                        </div>

                        <div>

                            <div class="eg-document-name">
                                Articles of Incorporation
                            </div>

                            <div class="eg-document-meta">
                                PDF · Updated Jan 15, 2024
                            </div>

                        </div>

                    </div>


                    <div class="eg-document">

                        <div class="eg-document-icon">
                            ▤
                        </div>

                        <div>

                            <div class="eg-document-name">
                                Corporate By-Laws
                            </div>

                            <div class="eg-document-meta">
                                PDF · Updated Jan 15, 2024
                            </div>

                        </div>

                    </div>


                    <div class="eg-document">

                        <div class="eg-document-icon">
                            ▤
                        </div>

                        <div>

                            <div class="eg-document-name">
                                SEC Registration Certificate
                            </div>

                            <div class="eg-document-meta">
                                PDF · Updated Jan 20, 2024
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- RECENT ACTIVITY --}}
            <div class="eg-card">

                <div class="eg-card-header">

                    <h2 class="eg-card-title">
                        Recent Activity
                    </h2>

                </div>

                <div class="eg-card-body">

                    <div class="eg-activity">

                        <div class="eg-activity-icon">
                            ✓
                        </div>

                        <div>

                            <div class="eg-activity-title">
                                Board Resolution No. 2026-014 approved
                            </div>

                            <div class="eg-activity-time">
                                2 days ago
                            </div>

                        </div>

                    </div>


                    <div class="eg-activity">

                        <div class="eg-activity-icon">
                            ▤
                        </div>

                        <div>

                            <div class="eg-activity-title">
                                Corporate document uploaded
                            </div>

                            <div class="eg-activity-time">
                                5 days ago
                            </div>

                        </div>

                    </div>


                    <div class="eg-activity">

                        <div class="eg-activity-icon">
                            ◇
                        </div>

                        <div>

                            <div class="eg-activity-title">
                                Director information updated
                            </div>

                            <div class="eg-activity-time">
                                8 days ago
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- QUICK ACTIONS --}}
            <div class="eg-card">

                <div class="eg-card-header">

                    <h2 class="eg-card-title">
                        Quick Actions
                    </h2>

                </div>

                <div class="eg-card-body">

                    <div style="display: grid; gap: 10px;">

                        <button class="eg-button">
                            Add Director / Officer
                        </button>

                        <button class="eg-button">
                            Add Shareholder
                        </button>

                        <button class="eg-button">
                            Create Governance Record
                        </button>

                        <button class="eg-button">
                            Upload Corporate Document
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection