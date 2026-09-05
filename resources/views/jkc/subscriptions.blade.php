@extends('layouts.client')

@section('title', 'Subscriptions')

@section('header-title', 'Subscriptions')

@section('content')

<div class="subscriptions-container" style="max-width: 1200px; padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    <!-- TOP HEADER -->
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
        <div>
            <div style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px;">
                JK&amp;C
            </div>

            <h1 class="page-title" style="font-size: 26px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 6px 0; line-height: 1.2;">
                Subscriptions
            </h1>

            <p class="page-description" style="font-size: 13.5px; color: #64748b; margin: 0; max-width: 760px; line-height: 1.6">
                View and manage your ORDO subscription, plan, and enabled modules.
            </p>
        </div>

        <div style="display: flex; align-items: center; gap: 12px;">
            <span class="status-badge status-active" style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 8px 16px; border-radius: 20px; display: inline-flex; align-items: center; gap: 6px;">
                <span style="font-size: 10px;">●</span>
                Active Plan
            </span>

            <button class="btn btn-primary" style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 9px 20px; font-size: 13.5px; font-weight: 600; cursor: pointer; box-shadow: 0 1px 2px rgba(37, 99, 235, 0.2);">
                Manage Subscription
            </button>
        </div>
    </div>


    <!-- MODULE OVERVIEW BANNER & USAGE CHART SECTION -->
    <div style="display: grid; grid-template-columns: 1.6fr 1fr; gap: 16px; margin-bottom: 16px;">

        <!-- MODULE OVERVIEW -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <div>
                <div style="font-size: 11px; font-weight: 700; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 10px;">
                    PLAN OVERVIEW
                </div>

                <h2 style="font-size: 20px; font-weight: 700; color: #0f172a; margin: 0 0 8px 0; letter-spacing: -0.01em;">
                    ORDO Commercial Business Tier
                </h2>

                <p style="font-size: 13.5px; color: #64748b; margin: 0; line-height: 1.5; max-width: 520px;">
                    Your account is currently running on the <strong>Business Plan</strong>. You have full access to 6 core modules, dedicated advisory support, and automated document management.
                </p>
            </div>

            <div style="display: flex; gap: 10px; margin-top: 24px;">

                <button style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Upgrade Plan
                </button>

                <button style="background: #f1f5f9; color: #334155; border: 1px solid #e2e8f0; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    View Billing History
                </button>

            </div>
        </div>


        <!-- MODULE CAPACITY -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">

                    <h3 style="font-size: 15px; font-weight: 700; color: #0f172a; margin: 0;">
                        Module Allocation
                    </h3>

                    <span style="background: #eff6ff; color: #2563eb; font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 12px;">
                        6 / 6 Active
                    </span>

                </div>

                <div style="font-size: 12px; color: #64748b; margin-bottom: 16px;">
                    All allocated business modules are fully provisioned and active.
                </div>

                <!-- PROGRESS BAR -->
                <div style="width: 100%; background: #e2e8f0; border-radius: 8px; height: 10px; overflow: hidden; margin-bottom: 8px;">
                    <div style="width: 100%; background: #2563eb; height: 100%; border-radius: 8px;"></div>
                </div>

                <div style="display: flex; justify-content: space-between; font-size: 11px; color: #94a3b8; font-weight: 600;">
                    <span>0 Modules</span>
                    <span>100% Capacity Used</span>
                </div>

            </div>

            <div style="padding-top: 12px; border-top: 1px solid #f1f5f9; display: flex; justify-content: space-between; align-items: center; font-size: 12px;">

                <span style="color: #64748b;">
                    Need custom add-ons?
                </span>

                <a href="#" style="color: #2563eb; font-weight: 600; text-decoration: none;">
                    Contact Support →
                </a>

            </div>

        </div>

    </div>


    <!-- METRICS GRID -->
    <div class="dashboard-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px;">


        <!-- CURRENT PLAN -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- BLUE ICON -->
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="3" y="5" width="18" height="14" rx="2"></rect>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                    <line x1="7" y1="15" x2="11" y2="15"></line>
                </svg>

            </div>

            <div class="card-value" style="font-size: 20px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                Business
            </div>

            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                CURRENT PLAN
            </div>

            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Current ORDO subscription
            </div>

        </div>


        <!-- ACTIVE MODULES -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- BLUE ICON -->
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M8 3h8l5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8l5-5z"></path>
                    <path d="M8 3v5h8V3"></path>
                    <path d="M9 13h6"></path>
                    <path d="M9 17h4"></path>
                </svg>

            </div>

            <div class="card-value" style="font-size: 20px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                6
            </div>

            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                ACTIVE MODULES
            </div>

            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Business modules enabled
            </div>

        </div>


        <!-- BILLING CYCLE -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- BLUE ICON -->
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M3 12a9 9 0 0 1 15.2-6.5"></path>
                    <path d="M18 3v4h-4"></path>
                    <path d="M21 12a9 9 0 0 1-15.2 6.5"></path>
                    <path d="M6 21v-4h4"></path>
                </svg>

            </div>

            <div class="card-value" style="font-size: 20px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                Monthly
            </div>

            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                BILLING CYCLE
            </div>

            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Current billing frequency
            </div>

        </div>


        <!-- NEXT BILLING -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

            <!-- BLUE ICON -->
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">

                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="3" y="4" width="18" height="17" rx="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                    <circle cx="12" cy="15" r="2.5"></circle>
                </svg>

            </div>

            <div class="card-value" style="font-size: 20px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                Sep 19
            </div>

            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                NEXT BILLING
            </div>

            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Next scheduled billing date
            </div>

        </div>

    </div>


    <!-- MAIN CARD: CURRENT SUBSCRIPTION DETAILS -->
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 0; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-bottom: 24px;">

        <!-- TABS HEADER -->
        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding: 0 24px;">

            <div style="display: flex; gap: 24px;">

                <a href="#" style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 700; color: #2563eb; border-bottom: 2px solid #2563eb;">
                    Plan Overview
                </a>

                <a href="#" style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Invoices &amp; Receipts
                </a>

                <a href="#" style="text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b;">
                    Payment Methods
                </a>

            </div>

            <span class="status-badge status-active" style="background: #dcfce7; color: #15803d; font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 12px;">
                Auto-Renew On
            </span>

        </div>


        <div style="padding: 24px;">

            <div class="card-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">

                <div>

                    <h2 class="card-title" style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                        Current Subscription
                    </h2>

                    <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
                        Details of your current ORDO subscription.
                    </p>

                </div>

            </div>


            <div class="module-list" style="display: flex; flex-direction: column; gap: 12px;">

                <!-- ITEM 1 -->
                <div class="module-list-item" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                    <div>

                        <strong style="font-size: 14.5px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                            ORDO Business Plan
                        </strong>

                        <p style="font-size: 13px; color: #64748b; margin: 0;">
                            Access to ORDO commercial business modules and client portal services.
                        </p>

                    </div>

                    <strong style="font-size: 15px; font-weight: 800; color: #0f172a; flex-shrink: 0; margin-left: 16px;">
                        ₱5,000 / month
                    </strong>

                </div>


                <!-- ITEM 2 -->
                <div class="module-list-item" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                    <div>

                        <strong style="font-size: 14.5px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                            Billing Cycle
                        </strong>

                        <p style="font-size: 13px; color: #64748b; margin: 0;">
                            Your subscription renews automatically every month.
                        </p>

                    </div>

                    <strong style="font-size: 13.5px; font-weight: 700; color: #334155; flex-shrink: 0; margin-left: 16px;">
                        Monthly
                    </strong>

                </div>


                <!-- ITEM 3 -->
                <div class="module-list-item" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px;">

                    <div>

                        <strong style="font-size: 14.5px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                            Subscription Started
                        </strong>

                        <p style="font-size: 13px; color: #64748b; margin: 0;">
                            Current subscription activation date.
                        </p>

                    </div>

                    <strong style="font-size: 13.5px; font-weight: 700; color: #334155; flex-shrink: 0; margin-left: 16px;">
                        August 19, 2026
                    </strong>

                </div>

            </div>

        </div>

    </div>


    <!-- INCLUDED MODULES CARD -->
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-bottom: 24px;">

        <div class="card-header" style="margin-bottom: 20px;">

            <div>

                <h2 class="card-title" style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Included Modules
                </h2>

                <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
                    Business modules currently included in your subscription.
                </p>

            </div>

        </div>


        <div class="module-list" style="display: flex; flex-direction: column; gap: 12px;">


            <!-- MODULE 1 -->
            <div class="module-list-item" style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px;">

                <div style="display: flex; align-items: center; gap: 12px;">

                    <!-- BLUE CHECK ICON -->
                    <div style="width: 28px; height: 28px; border-radius: 7px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">

                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>

                    </div>

                    <div>

                        <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                            Entity &amp; Governance
                        </strong>

                        <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                            Manage organizational and governance information.
                        </p>

                    </div>

                </div>

                <span class="status-badge status-active" style="background: #eff6ff; color: #2563eb; font-size: 11.5px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    Included
                </span>

            </div>


            <!-- MODULE 2 -->
            <div class="module-list-item" style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px;">

                <div style="display: flex; align-items: center; gap: 12px;">

                    <!-- BLUE CHECK ICON -->
                    <div style="width: 28px; height: 28px; border-radius: 7px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">

                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>

                    </div>

                    <div>

                        <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                            Compliance
                        </strong>

                        <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                            Monitor compliance requirements and obligations.
                        </p>

                    </div>

                </div>

                <span class="status-badge status-active" style="background: #eff6ff; color: #2563eb; font-size: 11.5px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    Included
                </span>

            </div>


            <!-- MODULE 3 -->
            <div class="module-list-item" style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px;">

                <div style="display: flex; align-items: center; gap: 12px;">

                    <!-- BLUE CHECK ICON -->
                    <div style="width: 28px; height: 28px; border-radius: 7px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">

                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>

                    </div>

                    <div>

                        <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                            Finance
                        </strong>

                        <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                            Manage financial information and reporting.
                        </p>

                    </div>

                </div>

                <span class="status-badge status-active" style="background: #eff6ff; color: #2563eb; font-size: 11.5px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    Included
                </span>

            </div>


            <!-- MODULE 4 -->
            <div class="module-list-item" style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px;">

                <div style="display: flex; align-items: center; gap: 12px;">

                    <!-- BLUE CHECK ICON -->
                    <div style="width: 28px; height: 28px; border-radius: 7px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">

                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>

                    </div>

                    <div>

                        <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                            Human Capital
                        </strong>

                        <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                            Manage employee and HR information.
                        </p>

                    </div>

                </div>

                <span class="status-badge status-active" style="background: #eff6ff; color: #2563eb; font-size: 11.5px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    Included
                </span>

            </div>


            <!-- MODULE 5 -->
            <div class="module-list-item" style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px;">

                <div style="display: flex; align-items: center; gap: 12px;">

                    <!-- BLUE CHECK ICON -->
                    <div style="width: 28px; height: 28px; border-radius: 7px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">

                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>

                    </div>

                    <div>

                        <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                            Records
                        </strong>

                        <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                            Store and manage business records and documents.
                        </p>

                    </div>

                </div>

                <span class="status-badge status-active" style="background: #eff6ff; color: #2563eb; font-size: 11.5px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    Included
                </span>

            </div>


            <!-- MODULE 6 -->
            <div class="module-list-item" style="display: flex; justify-content: space-between; align-items: center; padding: 14px 16px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px;">

                <div style="display: flex; align-items: center; gap: 12px;">

                    <!-- BLUE CHECK ICON -->
                    <div style="width: 28px; height: 28px; border-radius: 7px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">

                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>

                    </div>

                    <div>

                        <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                            Transmittals
                        </strong>

                        <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                            Manage incoming and outgoing document transmissions.
                        </p>

                    </div>

                </div>

                <span class="status-badge status-active" style="background: #eff6ff; color: #2563eb; font-size: 11.5px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    Included
                </span>

            </div>

        </div>

    </div>


    <!-- SUBSCRIPTION ACTIONS CARD -->
    <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

        <div class="card-header" style="margin-bottom: 16px;">

            <div>

                <h2 class="card-title" style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Subscription Actions
                </h2>

                <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
                    Manage your subscription, change payment cycles, or switch tiers.
                </p>

            </div>

        </div>


        <div style="display: flex; gap: 12px; flex-wrap: wrap;">

            <button class="btn btn-primary" style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 9px 20px; font-size: 13.5px; font-weight: 600; cursor: pointer;">
                Manage Subscription
            </button>

            <button class="btn btn-secondary" style="background: #f1f5f9; color: #334155; border: 1px solid #cbd5e1; border-radius: 8px; padding: 9px 20px; font-size: 13.5px; font-weight: 600; cursor: pointer;">
                Change Plan
            </button>

            <button class="btn btn-secondary" style="background: #ffffff; color: #dc2626; border: 1px solid #fca5a5; border-radius: 8px; padding: 9px 20px; font-size: 13.5px; font-weight: 600; cursor: pointer; margin-left: auto;">
                Cancel Subscription
            </button>

        </div>

    </div>

</div>

@endsection