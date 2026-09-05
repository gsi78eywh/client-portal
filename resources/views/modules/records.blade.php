@extends('layouts.client')

@section('title', 'Records')

@section('header-title', 'Records')

@section('content')

<div class="records-container"
     style="max-width: 1200px; padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <!-- TOP HEADER -->
    <div class="page-header"
         style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">

        <div>

            <div style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px;">
                BUSINESS • RECORDS
            </div>

            <h1 class="page-title"
                style="font-size: 26px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 6px 0; line-height: 1.2;">
                Records
            </h1>

            <p class="page-description"
               style="font-size: 13.5px; color: #64748b; margin: 0; max-width: 760px; line-height: 1.6">
                Organize, search, store, and manage business records and documents from one client workspace.
            </p>

        </div>

        <div style="display: flex; align-items: center; gap: 12px;">

            <span class="status-badge status-trial"
                  style="background: #eff6ff; color: #2563eb; font-size: 12px; font-weight: 600; padding: 8px 16px; border-radius: 20px; display: inline-block;">
                Trial Access
            </span>

            <button class="btn btn-primary"
                    style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 9px 20px; font-size: 13.5px; font-weight: 600; cursor: pointer; box-shadow: 0 1px 2px rgba(37, 99, 235, 0.2); display: flex; align-items: center; gap: 6px;">

                <span style="font-size: 16px; line-height: 1;">+</span>

                Upload Record

            </button>

        </div>

    </div>


    <!-- MODULE OVERVIEW & ACTIVITY TREND SECTION -->
    <div class="records-top-grid"
         style="display: grid; grid-template-columns: 1.6fr 1fr; gap: 16px; margin-bottom: 16px;">

        <!-- MODULE OVERVIEW -->
        <div class="card"
             style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <div>

                <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">
                    MODULE OVERVIEW
                </div>

                <h2 style="font-size: 20px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0; letter-spacing: -0.01em;">
                    Centralized document management.
                </h2>

                <p style="font-size: 13.5px; color: #64748b; margin: 0; line-height: 1.5; max-width: 520px;">
                    Organize, search, store, and manage corporate, compliance, and operational business records seamlessly.
                </p>

            </div>

            <div style="display: flex; gap: 10px; margin-top: 24px;">

                <button style="background: #f1f5f9; color: #334155; border: 1px solid #e2e8f0; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Quick upload
                </button>

                <button style="background: #ffffff; color: #334155; border: 1px solid #cbd5e1; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 6px;">

                    <span style="color: #2563eb; display: flex; align-items: center;">

                        <svg width="14"
                             height="14"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round">

                            <circle cx="12" cy="12" r="3"></circle>

                            <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-1.5 1.5-.06-.06a1.7 1.7 0 0 0-1.88-.34 1.7 1.7 0 0 0-1.04 1.56V20h-2.12v-.09a1.7 1.7 0 0 0-1.04-1.56 1.7 1.7 0 0 0-1.88.34l-.06.06-1.5-1.5.06-.06A1.7 1.7 0 0 0 9.12 15a1.7 1.7 0 0 0-1.56-1.04H7v-2.12h.56A1.7 1.7 0 0 0 9.12 10.8a1.7 1.7 0 0 0-.34-1.88l-.06-.06 1.5-1.5.06.06a1.7 1.7 0 0 0 1.88.34A1.7 1.7 0 0 0 13.2 6.2V6h2.12v.2a1.7 1.7 0 0 0 1.04 1.56 1.7 1.7 0 0 0 1.88-.34l.06-.06 1.5 1.5-.06.06a1.7 1.7 0 0 0-.34 1.88 1.7 1.7 0 0 0 1.56 1.04H21v2.12h-.04A1.7 1.7 0 0 0 19.4 15z"></path>

                        </svg>

                    </span>

                    Configure module

                </button>

            </div>

        </div>


        <!-- ACTIVITY TREND -->
        <div class="card activity-trend-card"
             style="background: #ffffff; border: 1px solid #dbe3ee; border-radius: 12px; padding: 20px 22px 18px 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); min-height: 180px; display: flex; flex-direction: column; justify-content: space-between;">

            <!-- ACTIVITY TREND HEADER -->
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">

                <div>

                    <h3 style="font-size: 14px; font-weight: 700; color: #0f172a; margin: 0 0 3px 0;">
                        Activity trend
                    </h3>

                    <div style="font-size: 11px; color: #94a3b8;">
                        Last 30 days
                    </div>

                </div>

                <!-- HEALTHY BADGE -->
                <span style="background: #ecfdf5; color: #15803d; font-size: 10px; font-weight: 700; padding: 6px 10px; border-radius: 14px; line-height: 1; white-space: nowrap;">
                    Healthy
                </span>

            </div>


            <!-- BAR CHART -->
            <div style="position: relative; height: 92px; margin-top: 10px; padding: 0 2px 0 2px;">

                <!-- BASELINE -->
                <div style="position: absolute; left: 0; right: 0; bottom: 0; height: 1px; background: #e2e8f0;"></div>

                <!-- BARS -->
                <div style="height: 100%; display: flex; align-items: flex-end; gap: 7px;">

                    <div style="flex: 1; height: 31%; background: #60a5fa; border-radius: 4px 4px 0 0; min-width: 0;"></div>

                    <div style="flex: 1; height: 48%; background: #60a5fa; border-radius: 4px 4px 0 0; min-width: 0;"></div>

                    <div style="flex: 1; height: 41%; background: #60a5fa; border-radius: 4px 4px 0 0; min-width: 0;"></div>

                    <div style="flex: 1; height: 65%; background: #60a5fa; border-radius: 4px 4px 0 0; min-width: 0;"></div>

                    <div style="flex: 1; height: 54%; background: #60a5fa; border-radius: 4px 4px 0 0; min-width: 0;"></div>

                    <div style="flex: 1; height: 79%; background: #60a5fa; border-radius: 4px 4px 0 0; min-width: 0;"></div>

                    <div style="flex: 1; height: 63%; background: #60a5fa; border-radius: 4px 4px 0 0; min-width: 0;"></div>

                    <div style="flex: 1; height: 91%; background: #60a5fa; border-radius: 4px 4px 0 0; min-width: 0;"></div>

                    <div style="flex: 1; height: 70%; background: #60a5fa; border-radius: 4px 4px 0 0; min-width: 0;"></div>

                    <div style="flex: 1; height: 83%; background: #60a5fa; border-radius: 4px 4px 0 0; min-width: 0;"></div>

                </div>

            </div>


            <!-- CHART FOOTER -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 7px;">

                <span style="font-size: 10px; color: #94a3b8;">
                    Activity
                </span>

                <span style="font-size: 10px; font-weight: 700; color: #2563eb;">
                    +18% this month
                </span>

            </div>

        </div>

    </div>


    <!-- METRICS / STATS CARDS GRID -->
    <div class="dashboard-grid"
         style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px;">

        <!-- TOTAL RECORDS -->
        <div class="card"
             style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="17"
                     height="17"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                    <path d="M3 7.5A2.5 2.5 0 0 1 5.5 5H10l2 2h6.5A2.5 2.5 0 0 1 21 9.5v7A2.5 2.5 0 0 1 18.5 19h-13A2.5 2.5 0 0 1 3 16.5v-9z"></path>

                </svg>

            </div>

            <div class="card-value"
                 style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                1,248
            </div>

            <div class="card-label"
                 style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Total records
            </div>

            <div class="card-description"
                 style="font-size: 11px; color: #94a3b8;">
                Stored in ORDO
            </div>

        </div>


        <!-- RECENT RECORDS -->
        <div class="card"
             style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="17"
                     height="17"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                    <circle cx="12" cy="12" r="8.5"></circle>
                    <path d="M12 7v5l3 2"></path>

                </svg>

            </div>

            <div class="card-value"
                 style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                36
            </div>

            <div class="card-label"
                 style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Recent records
            </div>

            <div class="card-description"
                 style="font-size: 11px; color: #94a3b8;">
                Last 30 days
            </div>

        </div>


        <!-- STORAGE USED -->
        <div class="card"
             style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="17"
                     height="17"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                    <ellipse cx="12" cy="5" rx="7.5" ry="3"></ellipse>
                    <path d="M4.5 5v6c0 1.66 3.36 3 7.5 3s7.5-1.34 7.5-3V5"></path>
                    <path d="M4.5 11v6c0 1.66 3.36 3 7.5 3s7.5-1.34 7.5-3v-6"></path>

                </svg>

            </div>

            <div class="card-value"
                 style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                320 MB
            </div>

            <div class="card-label"
                 style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Storage used
            </div>

            <div class="card-description"
                 style="font-size: 11px; color: #94a3b8;">
                Of 500 MB available
            </div>

        </div>


        <!-- CLASSIFICATIONS -->
        <div class="card"
             style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="17"
                     height="17"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                    <path d="M20 13l-7 7-9-9V4h7l9 9z"></path>
                    <circle cx="7.5" cy="7.5" r="1"></circle>

                </svg>

            </div>

            <div class="card-value"
                 style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                12
            </div>

            <div class="card-label"
                 style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Classifications
            </div>

            <div class="card-description"
                 style="font-size: 11px; color: #94a3b8;">
                Active categories
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
                    All Records
                </a>

                <a href="#"
                   style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Corporate
                </a>

                <a href="#"
                   style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Governance
                </a>

                <a href="#"
                   style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Compliance
                </a>

                <a href="#"
                   style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Human Resources
                </a>

                <a href="#"
                   style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Archived
                </a>

            </div>

            <div>

                <span style="background: #f1f5f9; color: #475569; font-size: 11px; font-weight: 600; padding: 5px 12px; border-radius: 14px; border: 1px solid #e2e8f0;">
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
                        Recent Records
                    </h2>

                    <p class="card-description"
                       style="font-size: 13px; color: #64748b; margin: 0;">
                        Recently uploaded and updated records.
                    </p>

                </div>

                <button style="background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 6px; padding: 6px 14px; font-size: 12.5px; font-weight: 600; color: #334155; cursor: pointer;">
                    Filter
                </button>

            </div>


            <!-- TABLE CONTAINER -->
            <div class="table-wrapper"
                 style="border: 1px solid #f1f5f9; border-radius: 8px; overflow: hidden;">

                <table class="ordo-table"
                       style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13px;">

                    <thead>

                        <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; color: #64748b; font-size: 11px; text-transform: uppercase; letter-spacing: 0.05em;">

                            <th style="padding: 12px 16px; font-weight: 700;">
                                Record ID
                            </th>

                            <th style="padding: 12px 16px; font-weight: 700;">
                                Document
                            </th>

                            <th style="padding: 12px 16px; font-weight: 700;">
                                Classification
                            </th>

                            <th style="padding: 12px 16px; font-weight: 700;">
                                Source
                            </th>

                            <th style="padding: 12px 16px; font-weight: 700;">
                                Date Added
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
                                REC-2026-1248
                            </td>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                Articles of Incorporation
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Corporate Records
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                SEC
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                August 18, 2026
                            </td>

                            <td style="padding: 14px 16px;">

                                <span style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px; display: inline-flex; align-items: center; gap: 6px;">
                                    ● Active
                                </span>

                            </td>

                            <td style="padding: 14px 16px; text-align: right;">

                                <button style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 4px 12px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer;">
                                    View
                                </button>

                            </td>

                        </tr>


                        <!-- ROW 2 -->
                        <tr style="border-bottom: 1px solid #f1f5f9;">

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                REC-2026-1247
                            </td>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                Board Resolution No. 08
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Governance
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Internal
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                August 17, 2026
                            </td>

                            <td style="padding: 14px 16px;">

                                <span style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px; display: inline-flex; align-items: center; gap: 6px;">
                                    ● Active
                                </span>

                            </td>

                            <td style="padding: 14px 16px; text-align: right;">

                                <button style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 4px 12px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer;">
                                    View
                                </button>

                            </td>

                        </tr>


                        <!-- ROW 3 -->
                        <tr style="border-bottom: 1px solid #f1f5f9;">

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                REC-2026-1246
                            </td>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                Business Permit
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Compliance
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                LGU
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                August 15, 2026
                            </td>

                            <td style="padding: 14px 16px;">

                                <span style="background: #fef3c7; color: #b45309; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px; display: inline-flex; align-items: center; gap: 6px;">
                                    ● Review
                                </span>

                            </td>

                            <td style="padding: 14px 16px; text-align: right;">

                                <button style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 4px 12px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer;">
                                    View
                                </button>

                            </td>

                        </tr>


                        <!-- ROW 4 -->
                        <tr>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                REC-2026-1245
                            </td>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                Employment Agreement
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Human Resources
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Internal
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                August 14, 2026
                            </td>

                            <td style="padding: 14px 16px;">

                                <span style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px; display: inline-flex; align-items: center; gap: 6px;">
                                    ● Active
                                </span>

                            </td>

                            <td style="padding: 14px 16px; text-align: right;">

                                <button style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 4px 12px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer;">
                                    View
                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <!-- RECORD CLASSIFICATIONS CARD -->
    <div class="card"
         style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-top: 24px;">

        <div class="card-header" style="margin-bottom: 20px;">

            <div>

                <h2 class="card-title"
                    style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Record Classifications
                </h2>

                <p class="card-description"
                   style="font-size: 13px; color: #64748b; margin: 0;">
                    Main categories used to organize account records.
                </p>

            </div>

        </div>


        <div class="module-list"
             style="display: flex; flex-direction: column; gap: 12px;">

            <!-- CORPORATE RECORDS -->
            <div class="module-list-item"
                 style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Corporate Records
                    </strong>

                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Articles, certificates, corporate documents, and governance records.
                    </p>

                </div>

                <strong style="font-size: 15px; font-weight: 700; color: #0f172a;">
                    286
                </strong>

            </div>


            <!-- COMPLIANCE RECORDS -->
            <div class="module-list-item"
                 style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Compliance Records
                    </strong>

                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Regulatory filings, permits, licenses, and supporting documents.
                    </p>

                </div>

                <strong style="font-size: 15px; font-weight: 700; color: #0f172a;">
                    342
                </strong>

            </div>


            <!-- FINANCE RECORDS -->
            <div class="module-list-item"
                 style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Finance Records
                    </strong>

                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Financial documents, invoices, receipts, and transaction records.
                    </p>

                </div>

                <strong style="font-size: 15px; font-weight: 700; color: #0f172a;">
                    318
                </strong>

            </div>


            <!-- HUMAN RESOURCES -->
            <div class="module-list-item"
                 style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Human Resources
                    </strong>

                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Employee records, agreements, and HR documentation.
                    </p>

                </div>

                <strong style="font-size: 15px; font-weight: 700; color: #0f172a;">
                    194
                </strong>

            </div>


            <!-- OTHER RECORDS -->
            <div class="module-list-item"
                 style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Other Records
                    </strong>

                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Other business and operational documents.
                    </p>

                </div>

                <strong style="font-size: 15px; font-weight: 700; color: #0f172a;">
                    108
                </strong>

            </div>

        </div>

    </div>

</div>


<!-- RESPONSIVE STYLES -->
<style>

    @media (max-width: 1000px) {

        .records-top-grid {
            grid-template-columns: 1fr !important;
        }

        .dashboard-grid {
            grid-template-columns: repeat(2, 1fr) !important;
        }

    }


    @media (max-width: 700px) {

        .page-header {
            flex-direction: column !important;
            gap: 16px;
        }

        .page-header > div:last-child {
            width: 100%;
            justify-content: flex-start;
        }

        .dashboard-grid {
            grid-template-columns: 1fr !important;
        }

        .activity-trend-card {
            min-height: 190px !important;
        }

    }


    @media (max-width: 600px) {

        .records-container {
            padding: 8px 0 !important;
        }

        .page-header > div:last-child {
            flex-wrap: wrap;
        }

        .records-top-grid {
            gap: 12px !important;
        }

        .card {
            box-sizing: border-box;
        }

    }

</style>

@endsection