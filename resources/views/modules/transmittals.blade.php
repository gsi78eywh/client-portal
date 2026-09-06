@extends('layouts.client')

@section('title', 'Transmittals')

@section('header-title', 'Transmittals')

@section('content')

<div class="transmittals-container"
     style="max-width: 1200px; padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <!-- =========================================================
         TOP HEADER
    ========================================================== -->
    <div class="page-header"
         style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">

        <div>

            <div style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px;">
                BUSINESS • TRANSMITTALS
            </div>

            <h1 class="page-title"
                style="font-size: 26px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 6px 0; line-height: 1.2;">
                Transmittals
            </h1>

            <p class="page-description"
               style="font-size: 13.5px; color: #64748b; margin: 0; max-width: 760px; line-height: 1.6">
                Manage incoming and outgoing documents, deliveries, acknowledgments, and proof of receipt.
            </p>

        </div>

        <div style="display: flex; align-items: center; gap: 12px;">

            <span class="status-badge status-trial"
                  style="background: #eff6ff; color: #2563eb; font-size: 12px; font-weight: 600; padding: 8px 16px; border-radius: 20px; display: inline-block;">
                Trial Access
            </span>

            <button class="btn btn-primary"
                    style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 9px 20px; font-size: 13.5px; font-weight: 600; cursor: pointer; box-shadow: 0 1px 2px rgba(37, 99, 235, 0.2); display: flex; align-items: center; gap: 6px;">

                <span style="font-size: 16px; line-height: 1;">
                    +
                </span>

                New Transmittal

            </button>

        </div>

    </div>


    <!-- =========================================================
         MODULE OVERVIEW + ACTIVITY TREND
    ========================================================== -->
    <div class="overview-activity-grid"
         style="display: grid; grid-template-columns: 1.6fr 1fr; gap: 16px; margin-bottom: 16px;">

        <!-- =====================================================
             MODULE OVERVIEW
        ====================================================== -->
        <div class="card"
             style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <div>

                <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">
                    MODULE OVERVIEW
                </div>

                <h2 style="font-size: 20px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0; letter-spacing: -0.01em;">
                    Seamless document dispatch and tracking.
                </h2>

                <p style="font-size: 13.5px; color: #64748b; margin: 0; line-height: 1.5; max-width: 520px;">
                    Track document dispatches, manage courier receipts, and secure digital acknowledgments all in one location.
                </p>

            </div>

            <div style="display: flex; gap: 10px; margin-top: 24px;">

                <button style="background: #f1f5f9; color: #334155; border: 1px solid #e2e8f0; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Quick dispatch
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


        <!-- =====================================================
             ACTIVITY TREND
             UPDATED TO MATCH REFERENCE IMAGE
        ====================================================== -->
        <div class="activity-trend-card"
             style="background: #ffffff; border: 1px solid #dfe6ef; border-radius: 12px; padding: 20px 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); min-height: 178px; box-sizing: border-box; display: flex; flex-direction: column;">

            <!-- ACTIVITY HEADER -->
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">

                <div>

                    <h3 style="font-size: 14px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0; line-height: 1.2;">
                        Activity trend
                    </h3>

                    <p style="font-size: 11px; color: #94a3b8; margin: 0; line-height: 1.3;">
                        Last 30 days
                    </p>

                </div>

                <!-- HEALTHY BADGE -->
                <span style="background: #ecfdf5; color: #15803d; font-size: 10px; font-weight: 700; padding: 6px 11px; border-radius: 14px; line-height: 1; white-space: nowrap;">
                    Healthy
                </span>

            </div>


            <!-- =================================================
                 BAR CHART
            ================================================== -->
            <div style="margin-top: 17px; flex: 1; display: flex; flex-direction: column;">

                <!-- CHART -->
                <div class="activity-chart"
                     style="position: relative; height: 78px; display: flex; align-items: flex-end; gap: 7px; border-bottom: 1px solid #e2e8f0; padding: 0 2px; box-sizing: border-box;">

                    <!-- SUBTLE GRID LINE -->
                    <div style="position: absolute; left: 0; right: 0; top: 25px; border-top: 1px dashed #edf1f5; z-index: 0;"></div>

                    <div style="position: absolute; left: 0; right: 0; top: 50px; border-top: 1px dashed #edf1f5; z-index: 0;"></div>


                    <!-- BAR 1 -->
                    <div class="trend-bar"
                         style="position: relative; z-index: 2; flex: 1; height: 38%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;">
                    </div>

                    <!-- BAR 2 -->
                    <div class="trend-bar"
                         style="position: relative; z-index: 2; flex: 1; height: 59%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;">
                    </div>

                    <!-- BAR 3 -->
                    <div class="trend-bar"
                         style="position: relative; z-index: 2; flex: 1; height: 48%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;">
                    </div>

                    <!-- BAR 4 -->
                    <div class="trend-bar"
                         style="position: relative; z-index: 2; flex: 1; height: 78%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;">
                    </div>

                    <!-- BAR 5 -->
                    <div class="trend-bar"
                         style="position: relative; z-index: 2; flex: 1; height: 66%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;">
                    </div>

                    <!-- BAR 6 -->
                    <div class="trend-bar"
                         style="position: relative; z-index: 2; flex: 1; height: 92%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;">
                    </div>

                    <!-- BAR 7 -->
                    <div class="trend-bar"
                         style="position: relative; z-index: 2; flex: 1; height: 75%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;">
                    </div>

                    <!-- BAR 8 -->
                    <div class="trend-bar"
                         style="position: relative; z-index: 2; flex: 1; height: 100%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;">
                    </div>

                    <!-- BAR 9 -->
                    <div class="trend-bar"
                         style="position: relative; z-index: 2; flex: 1; height: 82%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;">
                    </div>

                    <!-- BAR 10 -->
                    <div class="trend-bar"
                         style="position: relative; z-index: 2; flex: 1; height: 88%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;">
                    </div>

                </div>


                <!-- BOTTOM LABELS -->
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 9px;">

                    <span style="font-size: 10px; color: #94a3b8;">
                        Activity
                    </span>

                    <span style="font-size: 11px; font-weight: 700; color: #2563eb;">
                        +18% this month
                    </span>

                </div>

            </div>

        </div>

    </div>


    <!-- =========================================================
         METRICS / STATS CARDS
    ========================================================== -->
    <div class="dashboard-grid"
         style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px;">

        <!-- INCOMING -->
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

                    <path d="M4 4h16v16H4z"></path>
                    <path d="M12 8v7"></path>
                    <path d="m9 12 3 3 3-3"></path>

                </svg>

            </div>

            <div style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                28
            </div>

            <div style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Incoming
            </div>

            <div style="font-size: 11px; color: #94a3b8;">
                Incoming transmittals
            </div>

        </div>


        <!-- OUTGOING -->
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

                    <path d="M4 4h16v16H4z"></path>
                    <path d="M12 16V9"></path>
                    <path d="m9 12 3-3 3 3"></path>

                </svg>

            </div>

            <div style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                41
            </div>

            <div style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Outgoing
            </div>

            <div style="font-size: 11px; color: #94a3b8;">
                Outgoing transmittals
            </div>

        </div>


        <!-- PENDING RECEIPT -->
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

            <div style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                6
            </div>

            <div style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Pending receipt
            </div>

            <div style="font-size: 11px; color: #94a3b8;">
                Awaiting acknowledgment
            </div>

        </div>


        <!-- RECEIVED -->
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
                    <path d="m8.5 12 2.3 2.3 4.7-5"></path>

                </svg>

            </div>

            <div style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                63
            </div>

            <div style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Received
            </div>

            <div style="font-size: 11px; color: #94a3b8;">
                Completed transmittals
            </div>

        </div>

    </div>


    <!-- =========================================================
         TABBED CONTENT CARD
    ========================================================== -->
    <div class="card"
         style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 0; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

        <!-- NAV TABS -->
        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding: 0 24px;">

            <div style="display: flex; gap: 24px;">

                <a href="#"
                   style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 700; color: #2563eb; border-bottom: 2px solid #2563eb;">
                    All Transmittals
                </a>

                <a href="#"
                   style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Incoming
                </a>

                <a href="#"
                   style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Outgoing
                </a>

                <a href="#"
                   style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Pending
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


        <!-- CONTENT -->
        <div style="padding: 24px;">

            <!-- SECTION TITLE -->
            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">

                <div>

                    <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                        Recent Transmittals
                    </h2>

                    <p style="font-size: 13px; color: #64748b; margin: 0;">
                        Recent incoming and outgoing document transmissions.
                    </p>

                </div>

                <button style="background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 6px; padding: 6px 14px; font-size: 12.5px; font-weight: 600; color: #334155; cursor: pointer;">
                    Filter
                </button>

            </div>


            <!-- TABLE -->
            <div style="border: 1px solid #f1f5f9; border-radius: 8px; overflow-x: auto;">

                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13px; min-width: 850px;">

                    <thead>

                        <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; color: #64748b; font-size: 11px; text-transform: uppercase; letter-spacing: 0.05em;">

                            <th style="padding: 12px 16px; font-weight: 700;">Transmittal No.</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Type</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Description</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Date</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Method</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Status</th>
                            <th style="padding: 12px 16px; font-weight: 700; text-align: right;">Action</th>

                        </tr>

                    </thead>


                    <tbody>

                        <!-- ROW 1 -->
                        <tr style="border-bottom: 1px solid #f1f5f9;">

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                TR-2026-0063
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Incoming
                            </td>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                SEC Compliance Documents
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                August 18, 2026
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Email
                            </td>

                            <td style="padding: 14px 16px;">

                                <span style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px; display: inline-flex; align-items: center; gap: 6px;">
                                    ● Received
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
                                TR-2026-0062
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Outgoing
                            </td>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                Board Resolution Documents
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                August 17, 2026
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Electronic
                            </td>

                            <td style="padding: 14px 16px;">

                                <span style="background: #fef3c7; color: #b45309; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px; display: inline-flex; align-items: center; gap: 6px;">
                                    ● Pending Receipt
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
                                TR-2026-0061
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Incoming
                            </td>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                Business Permit Documents
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                August 15, 2026
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Courier
                            </td>

                            <td style="padding: 14px 16px;">

                                <span style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px; display: inline-flex; align-items: center; gap: 6px;">
                                    ● Received
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
                                TR-2026-0060
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Outgoing
                            </td>

                            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a;">
                                Financial Reports
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                August 14, 2026
                            </td>

                            <td style="padding: 14px 16px; color: #64748b;">
                                Electronic
                            </td>

                            <td style="padding: 14px 16px;">

                                <span style="background: #eff6ff; color: #1d4ed8; font-size: 12px; font-weight: 600; padding: 4px 10px; border-radius: 12px; display: inline-flex; align-items: center; gap: 6px;">
                                    ● Delivered
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


    <!-- =========================================================
         TRANSMITTAL STATUS
    ========================================================== -->
    <div class="card"
         style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-top: 24px;">

        <div style="margin-bottom: 20px;">

            <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                Transmittal Status
            </h2>

            <p style="font-size: 13px; color: #64748b; margin: 0;">
                Current status of document transmissions.
            </p>

        </div>


        <div style="display: flex; flex-direction: column; gap: 12px;">

            <!-- PENDING RECEIPT -->
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Pending Receipt
                    </strong>

                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Documents delivered but awaiting acknowledgment.
                    </p>

                </div>

                <span style="background: #fef3c7; color: #b45309; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    6
                </span>

            </div>


            <!-- RECEIVED -->
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Received
                    </strong>

                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Incoming documents successfully received.
                    </p>

                </div>

                <span style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    63
                </span>

            </div>


            <!-- DELIVERED -->
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Delivered
                    </strong>

                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Outgoing documents successfully delivered.
                    </p>

                </div>

                <span style="background: #eff6ff; color: #1d4ed8; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    35
                </span>

            </div>


            <!-- PROCESSING -->
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Processing
                    </strong>

                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Transmittals currently being processed.
                    </p>

                </div>

                <span style="background: #fef3c7; color: #b45309; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    4
                </span>

            </div>

        </div>

    </div>


    <!-- =========================================================
         DELIVERY METHODS
    ========================================================== -->
    <div class="card"
         style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-top: 24px;">

        <div style="margin-bottom: 20px;">

            <h2 style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                Delivery Methods
            </h2>

            <p style="font-size: 13px; color: #64748b; margin: 0;">
                Methods used for document transmission.
            </p>

        </div>


        <div style="display: flex; flex-direction: column; gap: 12px;">

            <!-- ELECTRONIC -->
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Electronic
                    </strong>

                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Documents transmitted through electronic channels.
                    </p>

                </div>

                <strong style="font-size: 15px; font-weight: 700; color: #0f172a;">
                    42
                </strong>

            </div>


            <!-- EMAIL -->
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Email
                    </strong>

                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Documents sent through email.
                    </p>

                </div>

                <strong style="font-size: 15px; font-weight: 700; color: #0f172a;">
                    18
                </strong>

            </div>


            <!-- COURIER -->
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Courier
                    </strong>

                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Physical document delivery.
                    </p>

                </div>

                <strong style="font-size: 15px; font-weight: 700; color: #0f172a;">
                    7
                </strong>

            </div>


            <!-- OTHER -->
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                <div>

                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Other
                    </strong>

                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Other delivery or receipt methods.
                    </p>

                </div>

                <strong style="font-size: 15px; font-weight: 700; color: #0f172a;">
                    2
                </strong>

            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     RESPONSIVE STYLES
========================================================== -->


@endsection