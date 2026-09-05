@extends('layouts.client')

@section('title', 'Human Capital')

@section('header-title', 'Human Capital')

@section('content')

<div class="human-capital-container" style="max-width: 1200px; padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <!-- TOP HEADER -->
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">

        <div>
            <div style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px;">
                BUSINESS • HUMAN CAPITAL
            </div>

            <h1 class="page-title" style="font-size: 26px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 6px 0; line-height: 1.2;">
                Human Capital
            </h1>

            <p class="page-description" style="font-size: 13.5px; color: #64748b; margin: 0; line-height: 1.6 max-width: 760px">
                Organize people, employment records, attendance, leave and HR actions from one client workspace.
            </p>
        </div>

        <div style="display: flex; align-items: center; gap: 12px;">

            <span class="status-badge status-trial"
                style="background: #eff6ff; color: #2563eb; font-size: 12px; font-weight: 600; padding: 8px 16px; border-radius: 20px; display: inline-block;">
                30-Day Trial
            </span>

            <button class="btn btn-primary"
                style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 9px 20px; font-size: 13.5px; font-weight: 600; cursor: pointer; box-shadow: 0 1px 2px rgba(37, 99, 235, 0.2); display: flex; align-items: center; gap: 6px;">

                <span style="font-size: 16px; line-height: 1;">+</span>
                New

            </button>

        </div>

    </div>


    <!-- MODULE OVERVIEW & ACTIVITY TREND SECTION -->
    <div style="display: grid; grid-template-columns: 1.6fr 1fr; gap: 16px; margin-bottom: 16px;">

        <!-- MODULE OVERVIEW -->
        <div class="card"
            style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <div>

                <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">
                    MODULE OVERVIEW
                </div>

                <h2 style="font-size: 20px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0; letter-spacing: -0.01em;">
                    Everything important, without the clutter.
                </h2>

                <p style="font-size: 13.5px; color: #64748b; margin: 0; line-height: 1.5; max-width: 520px;">
                    Organize people, employment records, attendance, leave and HR actions from one client workspace.
                </p>

            </div>


            <div style="display: flex; gap: 10px; margin-top: 24px;">

                <button
                    style="background: #eff6ff; color: #2563eb; border: none; border-radius: 8px; padding: 9px 16px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Quick action
                </button>


                <button
                    style="background: #ffffff; color: #334155; border: 1px solid #cbd5e1; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 7px;">

                    <!-- BLUE SETTINGS ICON -->
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                        stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                        <circle cx="12" cy="12" r="3"></circle>

                        <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-1.7 1.7-.06-.06a1.7 1.7 0 0 0-1.88-.34 1.7 1.7 0 0 0-1.03 1.55V20h-2.4v-.21a1.7 1.7 0 0 0-1.03-1.55 1.7 1.7 0 0 0-1.88.34l-.06.06-1.7-1.7.06-.06A1.7 1.7 0 0 0 8.4 15a1.7 1.7 0 0 0-1.55-1.03H6.6v-2.4h.25A1.7 1.7 0 0 0 8.4 10a1.7 1.7 0 0 0-.34-1.88L8 8.06l1.7-1.7.06.06a1.7 1.7 0 0 0 1.88.34 1.7 1.7 0 0 0 1.03-1.55V5h2.4v.21a1.7 1.7 0 0 0 1.03 1.55 1.7 1.7 0 0 0 1.88-.34l.06-.06 1.7 1.7-.06.06A1.7 1.7 0 0 0 19.4 10a1.7 1.7 0 0 0 1.55 1.03h.25v2.4h-.25A1.7 1.7 0 0 0 19.4 15z">
                        </path>

                    </svg>

                    Configure module

                </button>

            </div>

        </div>


        <!-- ACTIVITY TREND -->
        <div class="card"
            style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- ACTIVITY TREND HEADER -->
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 2px;">

                <div>

                    <h3 style="font-size: 15px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0; line-height: 1.2;">
                        Activity trend
                    </h3>

                    <div style="font-size: 11px; color: #94a3b8; line-height: 1.2;">
                        Last 30 days
                    </div>

                </div>


                <span
                    style="background: #ecfdf5; color: #15803d; font-size: 10.5px; font-weight: 700; padding: 6px 11px; border-radius: 14px; white-space: nowrap;">
                    Healthy
                </span>

            </div>


            <!-- VISUAL BAR CHART -->
            <div style="display: flex; align-items: flex-end; justify-content: space-between; gap: 7px; height: 105px; margin-top: 12px; padding: 8px 1px 0 1px; border-bottom: 1px solid #e2e8f0;">

                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 30%; border-radius: 4px 4px 2px 2px;"></div>

                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 50%; border-radius: 4px 4px 2px 2px;"></div>

                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 42%; border-radius: 4px 4px 2px 2px;"></div>

                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 72%; border-radius: 4px 4px 2px 2px;"></div>

                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 60%; border-radius: 4px 4px 2px 2px;"></div>

                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 83%; border-radius: 4px 4px 2px 2px;"></div>

                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 68%; border-radius: 4px 4px 2px 2px;"></div>

                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 95%; border-radius: 4px 4px 2px 2px;"></div>

                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 73%; border-radius: 4px 4px 2px 2px;"></div>

                <div style="flex: 1; max-width: 23px; background: #5b93ee; height: 85%; border-radius: 4px 4px 2px 2px;"></div>

            </div>


            <!-- ACTIVITY FOOTER -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 8px;">

                <span style="font-size: 10.5px; color: #94a3b8;">
                    Activity
                </span>

                <span style="font-size: 11px; font-weight: 700; color: #2563eb;">
                    +18% this month
                </span>

            </div>

        </div>

    </div>


    <!-- METRICS / STATS CARDS GRID -->
    <div class="dashboard-grid"
        style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px;">


        <!-- HEADCOUNT -->
        <div class="card"
            style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- BLUE USERS ICON -->
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>

                    <circle cx="9" cy="7" r="4"></circle>

                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>

                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>

                </svg>

            </div>

            <div class="card-value"
                style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                48
            </div>

            <div class="card-label"
                style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Headcount
            </div>

            <div class="card-description"
                style="font-size: 11px; color: #94a3b8;">
                43 active
            </div>

        </div>


        <!-- ON LEAVE -->
        <div class="card"
            style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- BLUE CALENDAR ICON -->
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>

                    <line x1="16" y1="2" x2="16" y2="6"></line>

                    <line x1="8" y1="2" x2="8" y2="6"></line>

                    <line x1="3" y1="10" x2="21" y2="10"></line>

                    <path d="M8 14h2"></path>
                    <path d="M14 14h2"></path>
                    <path d="M8 18h2"></path>
                    <path d="M14 18h2"></path>

                </svg>

            </div>

            <div class="card-value"
                style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                3
            </div>

            <div class="card-label"
                style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                On leave
            </div>

            <div class="card-description"
                style="font-size: 11px; color: #94a3b8;">
                Today
            </div>

        </div>


        <!-- PENDING HR ACTIONS -->
        <div class="card"
            style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- BLUE TREND ICON -->
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                    <polyline points="3 17 9 11 13 15 21 7"></polyline>

                    <polyline points="14 7 21 7 21 14"></polyline>

                </svg>

            </div>

            <div class="card-value"
                style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                2
            </div>

            <div class="card-label"
                style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Pending HR actions
            </div>

            <div class="card-description"
                style="font-size: 11px; color: #94a3b8;">
                Needs attention
            </div>

        </div>


        <!-- HR RECORDS -->
        <div class="card"
            style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- BLUE DOCUMENT ICON -->
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>

                    <polyline points="14 2 14 8 20 8"></polyline>

                    <line x1="8" y1="13" x2="16" y2="13"></line>

                    <line x1="8" y1="17" x2="16" y2="17"></line>

                </svg>

            </div>

            <div class="card-value"
                style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                144
            </div>

            <div class="card-label"
                style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                HR records
            </div>

            <div class="card-description"
                style="font-size: 11px; color: #94a3b8;">
                Current
            </div>

        </div>

    </div>


    <!-- TABBED CONTENT CARD -->
    <div class="card"
        style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 0; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

        <!-- NAV TABS -->
        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding: 0 24px;">

            <div style="display: flex; gap: 24px;">

                <a href="#"
                    style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 700; color: #2563eb; border-bottom: 2px solid #2563eb;">
                    Overview
                </a>

                <a href="#"
                    style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Employees
                </a>

                <a href="#"
                    style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Attendance
                </a>

                <a href="#"
                    style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Leave
                </a>

                <a href="#"
                    style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Recruitment
                </a>

                <a href="#"
                    style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    HR Records
                </a>

                <a href="#"
                    style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Reports
                </a>

            </div>


            <div>

                <span
                    style="background: #f1f5f9; color: #475569; font-size: 11px; font-weight: 600; padding: 5px 12px; border-radius: 14px; border: 1px solid #e2e8f0;">
                    Prototype controls
                </span>

            </div>

        </div>


        <div style="padding: 24px;">

            <!-- SECTION TITLE & FILTER -->
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">

                <div>

                    <h2 class="card-title"
                        style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                        Recent people
                    </h2>

                    <p class="card-description"
                        style="font-size: 13px; color: #64748b; margin: 0;">
                        Sample information for the V1 mockup.
                    </p>

                </div>


                <button
                    style="background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 6px; padding: 6px 14px; font-size: 12.5px; font-weight: 600; color: #334155; cursor: pointer;">
                    Filter
                </button>

            </div>


            <!-- TABLE CONTAINER -->
            <div class="table-wrapper"
                style="border: 1px solid #f1f5f9; border-radius: 8px; overflow: hidden;">

                <table class="ordo-table"
                    style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13px;">

                    <thead>

                        <tr
                            style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; color: #64748b; font-size: 11px; text-transform: uppercase; letter-spacing: 0.05em;">

                            <th style="padding: 12px 16px; font-weight: 700;">
                                Reference
                            </th>

                            <th style="padding: 12px 16px; font-weight: 700;">
                                Name
                            </th>

                            <th style="padding: 12px 16px; font-weight: 700;">
                                Department
                            </th>

                            <th style="padding: 12px 16px; font-weight: 700;">
                                Position / Type
                            </th>

                            <th style="padding: 12px 16px; font-weight: 700;">
                                Status
                            </th>

                            <th style="padding: 12px 16px; font-weight: 700; text-align: right;">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody style="color: #334155;">

                        <!-- ROW 1 -->
                        <tr style="border-bottom: 1px solid #f1f5f9;">

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                EMP-0014
                            </td>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                Maria Santos
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Administration
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Administrative Manager (Full-Time)
                            </td>

                            <td style="padding: 14px 16px;">

                                <span
                                    style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px; display: inline-flex; align-items: center; gap: 6px;">
                                    ● Active
                                </span>

                            </td>

                            <td style="padding: 14px 16px; text-align: right;">

                                <button
                                    style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 4px 12px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer;">
                                    View
                                </button>

                            </td>

                        </tr>


                        <!-- ROW 2 -->
                        <tr style="border-bottom: 1px solid #f1f5f9;">

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                EMP-0015
                            </td>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                Daniel Reyes
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Finance
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Finance Officer (Full-Time)
                            </td>

                            <td style="padding: 14px 16px;">

                                <span
                                    style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px; display: inline-flex; align-items: center; gap: 6px;">
                                    ● Active
                                </span>

                            </td>

                            <td style="padding: 14px 16px; text-align: right;">

                                <button
                                    style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 4px 12px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer;">
                                    View
                                </button>

                            </td>

                        </tr>


                        <!-- ROW 3 -->
                        <tr style="border-bottom: 1px solid #f1f5f9;">

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                EMP-0016
                            </td>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                Angela Cruz
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Human Resources
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                HR Specialist (Full-Time)
                            </td>

                            <td style="padding: 14px 16px;">

                                <span
                                    style="background: #eff6ff; color: #1d4ed8; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px; display: inline-flex; align-items: center; gap: 6px;">
                                    ● On Leave
                                </span>

                            </td>

                            <td style="padding: 14px 16px; text-align: right;">

                                <button
                                    style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 4px 12px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer;">
                                    View
                                </button>

                            </td>

                        </tr>


                        <!-- ROW 4 -->
                        <tr>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                EMP-0017
                            </td>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                John Garcia
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Operations
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Operations Assistant (Contract)
                            </td>

                            <td style="padding: 14px 16px;">

                                <span
                                    style="background: #fef3c7; color: #b45309; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px; display: inline-flex; align-items: center; gap: 6px;">
                                    ● Probationary
                                </span>

                            </td>

                            <td style="padding: 14px 16px; text-align: right;">

                                <button
                                    style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 4px 12px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer;">
                                    View
                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <!-- HR ACTIVITY CARD -->
    <div class="card"
        style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-top: 24px;">

        <div class="card-header" style="margin-bottom: 20px;">

            <div>

                <h2 class="card-title"
                    style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    HR Activity
                </h2>

                <p class="card-description"
                    style="font-size: 13px; color: #64748b; margin: 0;">
                    Recent Human Capital activities.
                </p>

            </div>

        </div>


        <div class="module-list"
            style="display: flex; flex-direction: column; gap: 12px;">


            <!-- ACTIVITY 1 -->
            <div class="module-list-item"
                style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong
                        style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Leave Request
                    </strong>

                    <p
                        style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Annual leave request submitted by Angela Cruz.
                    </p>

                </div>

                <span class="status-badge status-warning"
                    style="background: #fef3c7; color: #b45309; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px;">
                    Pending
                </span>

            </div>


            <!-- ACTIVITY 2 -->
            <div class="module-list-item"
                style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong
                        style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Employee Record Updated
                    </strong>

                    <p
                        style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Employee information was updated for Daniel Reyes.
                    </p>

                </div>

                <span class="status-badge status-active"
                    style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px;">
                    Completed
                </span>

            </div>


            <!-- ACTIVITY 3 -->
            <div class="module-list-item"
                style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong
                        style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        New Employee
                    </strong>

                    <p
                        style="font-size: 12.5px; color: #64748b; margin: 0;">
                        A new employee record was added for John Garcia.
                    </p>

                </div>

                <span class="status-badge status-active"
                    style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px;">
                    Completed
                </span>

            </div>


            <!-- ACTIVITY 4 -->
            <div class="module-list-item"
                style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong
                        style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Attendance Review
                    </strong>

                    <p
                        style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Monthly attendance records are ready for review.
                    </p>

                </div>

                <span class="status-badge status-warning"
                    style="background: #fef3c7; color: #b45309; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px;">
                    Review
                </span>

            </div>

        </div>

    </div>

</div>

@endsection