@extends('layouts.client')

@section('title', 'Entity & Governance')

@section('header-title', 'Entity & Governance')

@section('content')




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