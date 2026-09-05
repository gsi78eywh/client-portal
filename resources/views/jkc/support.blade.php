@extends('layouts.client')

@section('title', 'Support')

@section('header-title', 'Support')

@section('content')

<div class="support-container" style="max-width: 1200px; padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <!-- TOP HEADER -->
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">

        <div>
            <div style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px;">
                JK&amp;C
            </div>

            <h1 class="page-title" style="font-size: 26px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 6px 0; line-height: 1.2;">
                Support
            </h1>

            <p class="page-description" style="font-size: 13.5px; color: #64748b; margin: 0; max-width: 760px; line-height: 1.6">
                Get help with ORDO, submit support requests, and track your existing cases.
            </p>
        </div>

        <div style="display: flex; align-items: center; gap: 12px;">

            <span class="status-badge status-active" style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 8px 16px; border-radius: 20px; display: inline-flex; align-items: center; gap: 6px;">
                <span style="font-size: 10px;">●</span>
                Support Center Active
            </span>

            <button class="btn btn-primary" style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 9px 20px; font-size: 13.5px; font-weight: 600; cursor: pointer; box-shadow: 0 1px 2px rgba(37, 99, 235, 0.2);">
                + Create Support Request
            </button>

        </div>

    </div>


    <!-- SUPPORT HERO BANNER & SLA VISUALIZER -->
    <div style="display: grid; grid-template-columns: 1.6fr 1fr; gap: 16px; margin-bottom: 16px;">

        <!-- SUPPORT BANNER CARD -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <div>

                <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">
                    DEDICATED ASSISTANCE
                </div>

                <h2 style="font-size: 20px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0; letter-spacing: -0.01em;">
                    How can we help your business today?
                </h2>

                <p style="font-size: 13.5px; color: #64748b; margin: 0; line-height: 1.5; max-width: 520px;">
                    Our ORDO Helpdesk team is available to assist you with system access, module workflows, compliance questions, and account billing inquiries.
                </p>

            </div>

            <div style="display: flex; gap: 10px; margin-top: 24px;">

                <button style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Submit New Ticket
                </button>

                <button style="background: #f1f5f9; color: #334155; border: 1px solid #e2e8f0; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Browse Knowledge Base
                </button>

            </div>

        </div>


        <!-- SLA / RESPONSE TIME INDICATOR -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">

                    <h3 style="font-size: 15px; font-weight: 700; color: #0f172a; margin: 0;">
                        SLA Performance
                    </h3>

                    <span style="background: #eff6ff; color: #2563eb; font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 12px;">
                        Avg. Response 4h
                    </span>

                </div>

                <div style="font-size: 12px; color: #64748b; margin-bottom: 16px;">
                    Our technical and advisory teams aim to respond to all inquiries within 24 hours.
                </div>

                <!-- RESPONSE GAUGE BAR -->
                <div style="width: 100%; background: #e2e8f0; border-radius: 8px; height: 10px; overflow: hidden; margin-bottom: 8px;">
                    <div style="width: 85%; background: #2563eb; height: 100%; border-radius: 8px;"></div>
                </div>

                <div style="display: flex; justify-content: space-between; font-size: 11px; color: #94a3b8; font-weight: 600;">
                    <span>Response Rate: 98.4%</span>
                    <span>Target: &lt; 24h</span>
                </div>

            </div>

            <div style="padding-top: 12px; border-top: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center; font-size: 12px;">

                <span style="color: #64748b;">
                    Emergency Support?
                </span>

                <a href="#" style="color: #2563eb; font-weight: 600; text-decoration: none;">
                    Priority Contact →
                </a>

            </div>

        </div>

    </div>


    <!-- METRICS GRID -->
    <div class="dashboard-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px;">


        <!-- OPEN TICKETS -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- BLUE TICKET ICON -->
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20 12a2 2 0 0 0 0-4V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v2a2 2 0 0 0 0 4 2 2 0 0 0 0 4v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2a2 2 0 0 0 0-4Z"></path>
                    <path d="M9 8h6"></path>
                    <path d="M9 12h6"></path>
                    <path d="M9 16h4"></path>
                </svg>

            </div>

            <div class="card-value" style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                2
            </div>

            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                OPEN TICKETS
            </div>

            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Support requests currently open
            </div>

        </div>


        <!-- IN PROGRESS -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- BLUE CLOCK ICON -->
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="12" r="9"></circle>
                    <polyline points="12 7 12 12 15 14"></polyline>
                </svg>

            </div>

            <div class="card-value" style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                1
            </div>

            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                IN PROGRESS
            </div>

            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Tickets being handled
            </div>

        </div>


        <!-- RESOLVED -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- BLUE CHECK ICON -->
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="12" cy="12" r="9"></circle>
                    <polyline points="8 12 11 15 16 9"></polyline>
                </svg>

            </div>

            <div class="card-value" style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                14
            </div>

            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                RESOLVED
            </div>

            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Previously resolved requests
            </div>

        </div>


        <!-- AVERAGE RESPONSE TIME -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- BLUE RESPONSE ICON -->
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M13 2L4 14h6l-1 8 9-12h-6l1-8Z"></path>
                </svg>

            </div>

            <div class="card-value" style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                4h
            </div>

            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                AVERAGE RESPONSE
            </div>

            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Average support response time
            </div>

        </div>

    </div>


    <!-- MAIN TABLE: SUPPORT REQUESTS -->
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 0; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-bottom: 24px; overflow: hidden;">

        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; padding: 20px 24px; border-bottom: 1px solid #e2e8f0;">

            <div>

                <h2 class="card-title" style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Support Requests
                </h2>

                <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
                    Track your current and active support tickets.
                </p>

            </div>

            <button class="btn btn-primary" style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer;">
                + Create Support Request
            </button>

        </div>


        <div class="table-wrapper" style="overflow-x: auto;">

            <table class="ordo-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13.5px;">

                <thead>

                    <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; color: #475569; font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.03em;">

                        <th style="padding: 12px 24px;">
                            Ticket
                        </th>

                        <th style="padding: 12px 24px;">
                            Subject
                        </th>

                        <th style="padding: 12px 24px;">
                            Category
                        </th>

                        <th style="padding: 12px 24px;">
                            Created
                        </th>

                        <th style="padding: 12px 24px;">
                            Last Update
                        </th>

                        <th style="padding: 12px 24px; text-align: right;">
                            Status
                        </th>

                    </tr>

                </thead>


                <tbody style="color: #334155;">

                    <!-- ROW 1 -->
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.15s ease;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">

                        <td style="padding: 16px 24px; font-weight: 700; color: #334155;">
                            SUP-2026-014
                        </td>

                        <td style="padding: 16px 24px; font-weight: 600; color: #0f172a;">
                            Unable to access Records module
                        </td>

                        <td style="padding: 16px 24px;">
                            <span style="background: #f1f5f9; color: #475569; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 500;">
                                Technical
                            </span>
                        </td>

                        <td style="padding: 16px 24px; color: #64748b;">
                            August 18, 2026
                        </td>

                        <td style="padding: 16px 24px; color: #64748b;">
                            August 19, 2026
                        </td>

                        <td style="padding: 16px 24px; text-align: right;">

                            <span class="status-badge status-warning" style="background: #fef3c7; color: #b45309; font-size: 11.5px; font-weight: 600; padding: 4px 12px; border-radius: 12px; display: inline-block;">
                                In Progress
                            </span>

                        </td>

                    </tr>


                    <!-- ROW 2 -->
                    <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.15s ease;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">

                        <td style="padding: 16px 24px; font-weight: 700; color: #334155;">
                            SUP-2026-013
                        </td>

                        <td style="padding: 16px 24px; font-weight: 600; color: #0f172a;">
                            Account verification inquiry
                        </td>

                        <td style="padding: 16px 24px;">
                            <span style="background: #f1f5f9; color: #475569; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 500;">
                                Account
                            </span>
                        </td>

                        <td style="padding: 16px 24px; color: #64748b;">
                            August 17, 2026
                        </td>

                        <td style="padding: 16px 24px; color: #64748b;">
                            August 18, 2026
                        </td>

                        <td style="padding: 16px 24px; text-align: right;">

                            <span class="status-badge status-active" style="background: #dbeafe; color: #1d4ed8; font-size: 11.5px; font-weight: 600; padding: 4px 12px; border-radius: 12px; display: inline-block;">
                                Open
                            </span>

                        </td>

                    </tr>


                    <!-- ROW 3 -->
                    <tr style="transition: background 0.15s ease;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">

                        <td style="padding: 16px 24px; font-weight: 700; color: #334155;">
                            SUP-2026-012
                        </td>

                        <td style="padding: 16px 24px; font-weight: 600; color: #0f172a;">
                            Subscription question
                        </td>

                        <td style="padding: 16px 24px;">
                            <span style="background: #f1f5f9; color: #475569; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 500;">
                                Billing
                            </span>
                        </td>

                        <td style="padding: 16px 24px; color: #64748b;">
                            August 12, 2026
                        </td>

                        <td style="padding: 16px 24px; color: #64748b;">
                            August 14, 2026
                        </td>

                        <td style="padding: 16px 24px; text-align: right;">

                            <span class="status-badge status-active" style="background: #dcfce7; color: #15803d; font-size: 11.5px; font-weight: 600; padding: 4px 12px; border-radius: 12px; display: inline-block;">
                                Resolved
                            </span>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>


    <!-- CONTACT SUPPORT CATEGORIES GRID -->
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-bottom: 24px;">

        <div class="card-header" style="margin-bottom: 20px;">

            <div>

                <h2 class="card-title" style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Contact Support
                </h2>

                <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
                    Need assistance? Choose the support option that best matches your request.
                </p>

            </div>

        </div>


        <div class="dashboard-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px;">


            <!-- TECHNICAL SUPPORT -->
            <div class="card" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 20px; display: flex; flex-direction: column; justify-content: space-between;">

                <div>

                    <!-- BLUE ICON -->
                    <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="12" rx="2"></rect>
                            <path d="M8 20h8"></path>
                            <path d="M12 16v4"></path>
                            <path d="M8 9h8"></path>
                            <path d="M8 12h5"></path>
                        </svg>

                    </div>

                    <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.05em; text-transform: uppercase;">
                        TECHNICAL SUPPORT
                    </div>

                    <h3 style="margin: 8px 0; font-size: 16px; font-weight: 700; color: #0f172a;">
                        Portal &amp; Module Issues
                    </h3>

                    <p class="card-description" style="font-size: 12.5px; color: #64748b; margin: 0; line-height: 1.4;">
                        Report problems with ORDO modules, portal access, or system functionality.
                    </p>

                </div>

                <button class="btn btn-secondary" style="background: #ffffff; color: #2563eb; border: 1px solid #bfdbfe; border-radius: 8px; padding: 9px 16px; font-size: 13px; font-weight: 600; cursor: pointer; margin-top: 20px; width: 100%;">
                    Contact Technical Support
                </button>

            </div>


            <!-- ACCOUNT SUPPORT -->
            <div class="card" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 20px; display: flex; flex-direction: column; justify-content: space-between;">

                <div>

                    <!-- BLUE ICON -->
                    <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="8" r="4"></circle>
                            <path d="M4 21a8 8 0 0 1 16 0"></path>
                        </svg>

                    </div>

                    <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.05em; text-transform: uppercase;">
                        ACCOUNT SUPPORT
                    </div>

                    <h3 style="margin: 8px 0; font-size: 16px; font-weight: 700; color: #0f172a;">
                        Account &amp; Access
                    </h3>

                    <p class="card-description" style="font-size: 12.5px; color: #64748b; margin: 0; line-height: 1.4;">
                        Get help with account information, verification, users, and access.
                    </p>

                </div>

                <button class="btn btn-secondary" style="background: #ffffff; color: #2563eb; border: 1px solid #bfdbfe; border-radius: 8px; padding: 9px 16px; font-size: 13px; font-weight: 600; cursor: pointer; margin-top: 20px; width: 100%;">
                    Contact Account Support
                </button>

            </div>


            <!-- BILLING SUPPORT -->
            <div class="card" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 20px; display: flex; flex-direction: column; justify-content: space-between;">

                <div>

                    <!-- BLUE ICON -->
                    <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                            <line x1="7" y1="15" x2="11" y2="15"></line>
                        </svg>

                    </div>

                    <div class="card-label" style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.05em; text-transform: uppercase;">
                        BILLING SUPPORT
                    </div>

                    <h3 style="margin: 8px 0; font-size: 16px; font-weight: 700; color: #0f172a;">
                        Billing &amp; Subscription
                    </h3>

                    <p class="card-description" style="font-size: 12.5px; color: #64748b; margin: 0; line-height: 1.4;">
                        Get assistance with subscriptions, invoices, payments, and billing.
                    </p>

                </div>

                <button class="btn btn-secondary" style="background: #ffffff; color: #2563eb; border: 1px solid #bfdbfe; border-radius: 8px; padding: 9px 16px; font-size: 13px; font-weight: 600; cursor: pointer; margin-top: 20px; width: 100%;">
                    Contact Billing Support
                </button>

            </div>

        </div>

    </div>


    <!-- HELP RESOURCES CARD -->
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

        <div class="card-header" style="margin-bottom: 20px;">

            <div>

                <h2 class="card-title" style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Help Resources
                </h2>

                <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
                    Find answers to common questions and self-service knowledge base articles.
                </p>

            </div>

        </div>


        <div class="module-list" style="display: flex; flex-direction: column; gap: 12px;">


            <!-- GUIDE 1 -->
            <div class="module-list-item" style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px;">

                <div style="display: flex; align-items: center; gap: 12px;">

                    <!-- BLUE BOOK ICON -->
                    <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">

                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2Z"></path>
                            <path d="M8 6h8"></path>
                            <path d="M8 10h8"></path>
                        </svg>

                    </div>

                    <div>

                        <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                            Getting Started with ORDO
                        </strong>

                        <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                            Learn how to navigate your client portal and access your modules efficiently.
                        </p>

                    </div>

                </div>

                <span class="status-badge status-active" style="background: #eff6ff; color: #2563eb; font-size: 11.5px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    Guide
                </span>

            </div>


            <!-- GUIDE 2 -->
            <div class="module-list-item" style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px;">

                <div style="display: flex; align-items: center; gap: 12px;">

                    <!-- BLUE SHIELD ICON -->
                    <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">

                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"></path>
                            <polyline points="9 12 11 14 15 10"></polyline>
                        </svg>

                    </div>

                    <div>

                        <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                            Account &amp; Verification
                        </strong>

                        <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                            Learn about account verification steps, user roles, and security profile requirements.
                        </p>

                    </div>

                </div>

                <span class="status-badge status-active" style="background: #eff6ff; color: #2563eb; font-size: 11.5px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    Guide
                </span>

            </div>


            <!-- GUIDE 3 -->
            <div class="module-list-item" style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px;">

                <div style="display: flex; align-items: center; gap: 12px;">

                    <!-- BLUE CREDIT CARD ICON -->
                    <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">

                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                            <line x1="7" y1="15" x2="11" y2="15"></line>
                        </svg>

                    </div>

                    <div>

                        <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                            Subscription &amp; Billing
                        </strong>

                        <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                            Review subscription plans, auto-renewal billing cycles, and invoice receipts.
                        </p>

                    </div>

                </div>

                <span class="status-badge status-active" style="background: #eff6ff; color: #2563eb; font-size: 11.5px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    Guide
                </span>

            </div>

        </div>

    </div>

</div>

@endsection