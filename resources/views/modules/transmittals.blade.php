@extends('layouts.client')

@section('title', 'Transmittals')

@section('header-title', 'Transmittals')

@section('content')

<div class="transmittals-container" style="max-width: 1200px; padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    {{-- FLASH / SESSION FEEDBACK --}}
    @if(session('success'))
        <div class="transmittals-alert-success" style="background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 13.5px; display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 8px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" style="background: none; border: none; color: #065f46; cursor: pointer; font-size: 16px; line-height: 1;">&times;</button>
        </div>
    @endif

    <!-- =========================================================
         TOP HEADER
    ========================================================== -->
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
        <div>
            <div style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px;">
                BUSINESS • TRANSMITTALS
            </div>
            <h1 class="page-title" style="font-size: 26px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 6px 0; line-height: 1.2;">
                Transmittals
            </h1>
            <p class="page-description" style="font-size: 13.5px; color: #64748b; margin: 0; max-width: 760px; line-height: 1.6">
                Manage incoming and outgoing documents, deliveries, acknowledgments, and proof of receipt.
            </p>
        </div>

        <div style="display: flex; align-items: center; gap: 12px;">
            <span class="status-badge status-trial" style="background: #eff6ff; color: #2563eb; font-size: 12px; font-weight: 600; padding: 8px 16px; border-radius: 20px; display: inline-block;">
                Trial Access
            </span>
            <button id="btnTopNewTransmittal" type="button" onclick="openNewTransmittalModal()" class="btn btn-primary" style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 9px 20px; font-size: 13.5px; font-weight: 600; cursor: pointer; box-shadow: 0 1px 2px rgba(37, 99, 235, 0.2); display: flex; align-items: center; gap: 6px; transition: background 0.15s ease;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                + New Transmittal
            </button>
        </div>
    </div>


    <!-- =========================================================
         MODULE OVERVIEW + ACTIVITY TREND
    ========================================================== -->
    <div class="overview-activity-grid" style="display: grid; grid-template-columns: 1.6fr 1fr; gap: 16px; margin-bottom: 16px;">

        <!-- MODULE OVERVIEW -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
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
                <button type="button" onclick="openNewTransmittalModal()" style="background: #f1f5f9; color: #334155; border: 1px solid #e2e8f0; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer; transition: background 0.15s ease;">
                    Quick dispatch
                </button>

                <a href="{{ route('settings.modules.transmittals') }}" style="text-decoration: none; background: #ffffff; color: #334155; border: 1px solid #cbd5e1; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; transition: background 0.15s ease;">
                    <span style="color: #2563eb; display: flex; align-items: center;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-1.5 1.5-.06-.06a1.7 1.7 0 0 0-1.88-.34 1.7 1.7 0 0 0-1.04 1.56V20h-2.12v-.09a1.7 1.7 0 0 0-1.04-1.56 1.7 1.7 0 0 0-1.88.34l-.06.06-1.5-1.5.06-.06A1.7 1.7 0 0 0 9.12 15a1.7 1.7 0 0 0-1.56-1.04H7v-2.12h.56A1.7 1.7 0 0 0 9.12 10.8a1.7 1.7 0 0 0-.34-1.88l-.06-.06 1.5-1.5.06.06a1.7 1.7 0 0 0 1.88.34A1.7 1.7 0 0 0 13.2 6.2V6h2.12v.2a1.7 1.7 0 0 0 1.04 1.56 1.7 1.7 0 0 0 1.88-.34l.06-.06 1.5 1.5-.06.06a1.7 1.7 0 0 0-.34 1.88 1.7 1.7 0 0 0 1.56 1.04H21v2.12h-.04A1.7 1.7 0 0 0 19.4 15z"></path>
                        </svg>
                    </span>
                    Configure module
                </a>
            </div>
        </div>

        <!-- ACTIVITY TREND -->
        <div class="activity-trend-card" style="background: #ffffff; border: 1px solid #dfe6ef; border-radius: 12px; padding: 20px 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); min-height: 178px; box-sizing: border-box; display: flex; flex-direction: column;">
            <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                <div>
                    <h3 style="font-size: 14px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0; line-height: 1.2;">
                        Activity trend
                    </h3>
                    <p style="font-size: 11px; color: #94a3b8; margin: 0; line-height: 1.3;">
                        Last 30 days
                    </p>
                </div>
                <span style="background: #ecfdf5; color: #15803d; font-size: 10px; font-weight: 700; padding: 6px 11px; border-radius: 14px; line-height: 1; white-space: nowrap;">
                    Healthy
                </span>
            </div>

            <!-- BAR CHART -->
            <div style="margin-top: 17px; flex: 1; display: flex; flex-direction: column;">
                <div class="activity-chart" style="position: relative; height: 78px; display: flex; align-items: flex-end; gap: 7px; border-bottom: 1px solid #e2e8f0; padding: 0 2px; box-sizing: border-box;">
                    <div style="position: absolute; left: 0; right: 0; top: 25px; border-top: 1px dashed #edf1f5; z-index: 0;"></div>
                    <div style="position: absolute; left: 0; right: 0; top: 50px; border-top: 1px dashed #edf1f5; z-index: 0;"></div>

                    <div class="trend-bar" style="position: relative; z-index: 2; flex: 1; height: 38%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;"></div>
                    <div class="trend-bar" style="position: relative; z-index: 2; flex: 1; height: 59%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;"></div>
                    <div class="trend-bar" style="position: relative; z-index: 2; flex: 1; height: 48%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;"></div>
                    <div class="trend-bar" style="position: relative; z-index: 2; flex: 1; height: 78%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;"></div>
                    <div class="trend-bar" style="position: relative; z-index: 2; flex: 1; height: 66%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;"></div>
                    <div class="trend-bar" style="position: relative; z-index: 2; flex: 1; height: 92%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;"></div>
                    <div class="trend-bar" style="position: relative; z-index: 2; flex: 1; height: 75%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;"></div>
                    <div class="trend-bar" style="position: relative; z-index: 2; flex: 1; height: 100%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;"></div>
                    <div class="trend-bar" style="position: relative; z-index: 2; flex: 1; height: 82%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;"></div>
                    <div class="trend-bar" style="position: relative; z-index: 2; flex: 1; height: 88%; background: #6ea8f7; border-radius: 4px 4px 1px 1px;"></div>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 9px;">
                    <span style="font-size: 10px; color: #94a3b8;">Activity</span>
                    <span style="font-size: 11px; font-weight: 700; color: #2563eb;">+18% this month</span>
                </div>
            </div>
        </div>

    </div>


    <!-- =========================================================
         METRICS / STATS CARDS (INTERACTIVE & CLICKABLE)
    ========================================================== -->
    <div class="dashboard-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px;">

        <!-- INCOMING -->
        <div id="kpiIncoming" class="card kpi-card" onclick="filterTransmittalsTab('Incoming', true)" role="button" tabindex="0" onkeydown="if(event.key==='Enter'||event.key===' ')filterTransmittalsTab('Incoming', true)" aria-label="Filter incoming transmittals" title="Click to view Incoming Transmittals" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); cursor: pointer; transition: all 0.2s ease;">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16v16H4z"></path>
                    <path d="M12 8v7"></path>
                    <path d="m9 12 3 3 3-3"></path>
                </svg>
            </div>
            <div id="statIncoming" class="card-value" style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                {{ $transmittalStats['incoming'] ?? 28 }}
            </div>
            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Incoming
            </div>
            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Incoming transmittals
            </div>
        </div>

        <!-- OUTGOING -->
        <div id="kpiOutgoing" class="card kpi-card" onclick="filterTransmittalsTab('Outgoing', true)" role="button" tabindex="0" onkeydown="if(event.key==='Enter'||event.key===' ')filterTransmittalsTab('Outgoing', true)" aria-label="Filter outgoing transmittals" title="Click to view Outgoing Transmittals" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); cursor: pointer; transition: all 0.2s ease;">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16v16H4z"></path>
                    <path d="M12 16V9"></path>
                    <path d="m9 12 3-3 3 3"></path>
                </svg>
            </div>
            <div id="statOutgoing" class="card-value" style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                {{ $transmittalStats['outgoing'] ?? 41 }}
            </div>
            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Outgoing
            </div>
            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Outgoing transmittals
            </div>
        </div>

        <!-- PENDING RECEIPT -->
        <div id="kpiPendingReceipt" class="card kpi-card" onclick="filterTransmittalsTab('Pending', true)" role="button" tabindex="0" onkeydown="if(event.key==='Enter'||event.key===' ')filterTransmittalsTab('Pending', true)" aria-label="Filter pending receipt transmittals" title="Click to view Pending receipt transmittals" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); cursor: pointer; transition: all 0.2s ease;">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="8.5"></circle>
                    <path d="M12 7v5l3 2"></path>
                </svg>
            </div>
            <div id="statPendingReceipt" class="card-value" style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                {{ $transmittalStats['pending_receipt'] ?? 6 }}
            </div>
            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Pending receipt
            </div>
            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Awaiting acknowledgment
            </div>
        </div>

        <!-- RECEIVED -->
        <div id="kpiReceived" class="card kpi-card" onclick="filterTransmittalsTab('Received', true)" role="button" tabindex="0" onkeydown="if(event.key==='Enter'||event.key===' ')filterTransmittalsTab('Received', true)" aria-label="Filter received transmittals" title="Click to view Received transmittals" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); cursor: pointer; transition: all 0.2s ease;">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="8.5"></circle>
                    <path d="m8.5 12 2.3 2.3 4.7-5"></path>
                </svg>
            </div>
            <div id="statReceived" class="card-value" style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                {{ $transmittalStats['received'] ?? 63 }}
            </div>
            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Received
            </div>
            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Completed transmittals
            </div>
        </div>

    </div>


    <!-- =========================================================
         TABBED CONTENT CARD WITH DYNAMIC FILTERING & REAL-TIME SEARCH
    ========================================================== -->
    <div class="card" id="transmittalsSection" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 0; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

        <!-- NAV TABS -->
        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding: 0 24px; overflow-x: auto;">
            <div style="display: flex; gap: 24px; min-width: max-content;">
                <button type="button" class="transmittals-tab-link active" data-tab="all" onclick="filterTransmittalsTab('all', false)" style="background: none; border: none; outline: none; cursor: pointer; text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 700; color: #2563eb; border-bottom: 2px solid #2563eb; transition: all 0.15s ease;">
                    All Transmittals
                </button>
                <button type="button" class="transmittals-tab-link" data-tab="Incoming" onclick="filterTransmittalsTab('Incoming', false)" style="background: none; border: none; outline: none; cursor: pointer; text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b; border-bottom: 2px solid transparent; transition: all 0.15s ease;">
                    Incoming
                </button>
                <button type="button" class="transmittals-tab-link" data-tab="Outgoing" onclick="filterTransmittalsTab('Outgoing', false)" style="background: none; border: none; outline: none; cursor: pointer; text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b; border-bottom: 2px solid transparent; transition: all 0.15s ease;">
                    Outgoing
                </button>
                <button type="button" class="transmittals-tab-link" data-tab="Pending" onclick="filterTransmittalsTab('Pending', false)" style="background: none; border: none; outline: none; cursor: pointer; text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b; border-bottom: 2px solid transparent; transition: all 0.15s ease;">
                    Pending
                </button>
                <button type="button" class="transmittals-tab-link" data-tab="Received" onclick="filterTransmittalsTab('Received', false)" style="background: none; border: none; outline: none; cursor: pointer; text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b; border-bottom: 2px solid transparent; transition: all 0.15s ease;">
                    Received
                </button>
                <button type="button" class="transmittals-tab-link" data-tab="Archived" onclick="filterTransmittalsTab('Archived', false)" style="background: none; border: none; outline: none; cursor: pointer; text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b; border-bottom: 2px solid transparent; transition: all 0.15s ease;">
                    Archived
                </button>
            </div>

            <div>
                <span style="background: #f1f5f9; color: #475569; font-size: 11px; font-weight: 600; padding: 5px 12px; border-radius: 14px; border: 1px solid #e2e8f0; white-space: nowrap;">
                    Prototype controls
                </span>
            </div>
        </div>

        <div style="padding: 24px;">

            <!-- SECTION TITLE & SEARCH / FILTER BAR -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; flex-wrap: wrap; gap: 14px;">
                <div>
                    <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
                        <h2 id="transmittalsTableHeading" class="card-title" style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0;">
                            Recent Transmittals
                        </h2>
                        <span id="activeFilterBadge" style="display: none; background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe; font-size: 11.5px; font-weight: 700; padding: 2px 10px; border-radius: 12px; align-items: center; gap: 6px;">
                            <span id="activeFilterBadgeText">Filter: Incoming</span>
                            <button type="button" onclick="filterTransmittalsTab('all', false)" title="Reset filter" style="background: none; border: none; padding: 0; color: #1d4ed8; cursor: pointer; font-size: 14px; font-weight: 700; line-height: 1;">&times;</button>
                        </span>
                    </div>
                    <p id="transmittalsTableSubheading" class="card-description" style="font-size: 13px; color: #64748b; margin: 4px 0 0 0;">
                        Recent incoming and outgoing document transmissions.
                    </p>
                </div>

                <div style="display: flex; align-items: center; gap: 10px;">
                    <!-- SEARCH INPUT -->
                    <div style="position: relative; width: 260px;">
                        <input type="text" id="transmittalsSearchInput" oninput="handleTransmittalsSearch()" placeholder="Search title, transmittal no, parties..." style="width: 100%; box-sizing: border-box; background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 6px; padding: 7px 12px 7px 32px; font-size: 12.5px; color: #0f172a; outline: none; transition: border-color 0.15s ease;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>

                    <button type="button" onclick="clearTransmittalsFilters()" style="background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 6px; padding: 7px 14px; font-size: 12.5px; font-weight: 600; color: #334155; cursor: pointer; display: flex; align-items: center; gap: 6px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                        </svg>
                        Filter
                    </button>
                </div>
            </div>


            <!-- TABLE CONTAINER -->
            <div class="table-wrapper" style="border: 1px solid #f1f5f9; border-radius: 8px; overflow-x: auto;">
                <table class="ordo-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13px; min-width: 850px;">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; color: #64748b; font-size: 11px; text-transform: uppercase; letter-spacing: 0.05em;">
                            <th style="padding: 12px 16px; font-weight: 700;">Transmittal No.</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Type</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Subject / Title</th>
                            <th style="padding: 12px 16px; font-weight: 700;">From &bull; To</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Date</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Method</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Status</th>
                            <th style="padding: 12px 16px; font-weight: 700; text-align: right;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="transmittalsTableBody" style="color: #334155;">
                        @forelse($transmittalRecords as $record)
                            @php
                                $recId = is_array($record) ? ($record['id'] ?? '') : ($record->id ?? '');
                                $recNo = is_array($record) ? ($record['transmittal_no'] ?? '') : ($record->transmittal_no ?? '');
                                $recTitle = is_array($record) ? ($record['title'] ?? '') : ($record->title ?? '');
                                $recType = is_array($record) ? ($record['type'] ?? 'Outgoing') : ($record->type ?? 'Outgoing');
                                $recSender = is_array($record) ? ($record['sender'] ?? 'Company') : ($record->sender ?? 'Company');
                                $recRecipient = is_array($record) ? ($record['recipient'] ?? 'Client') : ($record->recipient ?? 'Client');
                                $recDate = is_array($record) ? ($record['formatted_transmittal_date'] ?? $record['transmittal_date'] ?? '') : ($record->formatted_transmittal_date ?? $record->transmittal_date ?? '');
                                $rawDate = is_array($record) ? ($record['transmittal_date'] ?? '') : ($record->transmittal_date?->format('Y-m-d') ?? '');
                                $recMethod = is_array($record) ? ($record['delivery_method'] ?? 'Electronic') : ($record->delivery_method ?? 'Electronic');
                                $recStatus = is_array($record) ? ($record['status'] ?? 'Pending Receipt') : ($record->status ?? 'Pending Receipt');
                                $recDesc = is_array($record) ? ($record['description'] ?? '') : ($record->description ?? '');
                                $recAckBy = is_array($record) ? ($record['acknowledged_by'] ?? '') : ($record->acknowledged_by ?? '');
                                $recAckDate = is_array($record) ? ($record['formatted_acknowledged_at'] ?? $record['acknowledged_at'] ?? '') : ($record->formatted_acknowledged_at ?? $record->acknowledged_at ?? '');
                                $rawAckDate = is_array($record) ? ($record['acknowledged_at'] ?? '') : ($record->acknowledged_at?->format('Y-m-d') ?? '');
                                $recProofNote = is_array($record) ? ($record['proof_of_receipt_note'] ?? '') : ($record->proof_of_receipt_note ?? '');
                                $recAttachments = is_array($record) ? ($record['attachments'] ?? []) : ($record->attachments ?? []);
                                if (is_string($recAttachments)) {
                                    $recAttachments = json_decode($recAttachments, true) ?? [];
                                }
                                $attCount = is_array($recAttachments) ? count($recAttachments) : 0;
                            @endphp
                            <tr class="transmittal-row"
                                id="transmittal-row-{{ $recId }}"
                                data-id="{{ $recId }}"
                                data-transmittal-no="{{ $recNo }}"
                                data-title="{{ $recTitle }}"
                                data-type="{{ $recType }}"
                                data-sender="{{ $recSender }}"
                                data-recipient="{{ $recRecipient }}"
                                data-formatted-date="{{ $recDate }}"
                                data-raw-date="{{ $rawDate }}"
                                data-method="{{ $recMethod }}"
                                data-status="{{ $recStatus }}"
                                data-description="{{ $recDesc }}"
                                data-ack-by="{{ $recAckBy }}"
                                data-ack-date="{{ $recAckDate }}"
                                data-raw-ack-date="{{ $rawAckDate }}"
                                data-proof-note="{{ $recProofNote }}"
                                data-attachments='@json($recAttachments)'
                                style="border-bottom: 1px solid #f1f5f9; transition: background 0.15s ease;">

                                <td style="padding: 14px 16px; font-weight: 600; color: #0f172a; white-space: nowrap;">
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span style="color: #2563eb; font-size: 11px; background: #eff6ff; padding: 2px 6px; border-radius: 4px; font-weight: 700;">#</span>
                                        <span class="transmittal-no-cell">{{ $recNo }}</span>
                                    </div>
                                </td>

                                <td style="padding: 14px 16px; white-space: nowrap;" class="transmittal-type-cell">
                                    @if($recType === 'Incoming')
                                        <span class="type-badge" style="background: #eff6ff; color: #2563eb; font-size: 11.5px; font-weight: 700; padding: 3px 8px; border-radius: 6px; display: inline-flex; align-items: center; gap: 4px;">
                                            &darr; Incoming
                                        </span>
                                    @else
                                        <span class="type-badge" style="background: #f1f5f9; color: #475569; font-size: 11.5px; font-weight: 700; padding: 3px 8px; border-radius: 6px; display: inline-flex; align-items: center; gap: 4px;">
                                            &uarr; Outgoing
                                        </span>
                                    @endif
                                </td>

                                <td style="padding: 14px 16px;">
                                    <div style="font-weight: 600; color: #0f172a; margin-bottom: 2px;" class="transmittal-title-cell">
                                        {{ $recTitle }}
                                    </div>
                                    <div style="font-size: 11.5px; color: #64748b; display: flex; align-items: center; gap: 8px;">
                                        @if($attCount > 0)
                                            <span style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1px 6px; border-radius: 4px; font-size: 10.5px; font-weight: 600; color: #475569;">
                                                📎 {{ $attCount }} {{ $attCount === 1 ? 'doc' : 'docs' }}
                                            </span>
                                        @endif
                                        @if($recDesc)
                                            <span style="max-width: 280px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $recDesc }}
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <td style="padding: 14px 16px; color: #475569; font-size: 12.5px;">
                                    <div style="font-weight: 600; color: #1e293b;">From: <span class="transmittal-sender-cell">{{ $recSender }}</span></div>
                                    <div style="color: #64748b;">To: <span class="transmittal-recipient-cell">{{ $recRecipient }}</span></div>
                                </td>

                                <td style="padding: 14px 16px; color: #64748b; white-space: nowrap;" class="transmittal-date-cell">
                                    {{ $recDate }}
                                </td>

                                <td style="padding: 14px 16px; color: #64748b; white-space: nowrap;" class="transmittal-method-cell">
                                    {{ $recMethod }}
                                </td>

                                <td style="padding: 14px 16px; white-space: nowrap;" class="transmittal-status-cell">
                                    @php
                                        $stLow = strtolower($recStatus);
                                    @endphp
                                    @if(str_contains($stLow, 'received') || str_contains($stLow, 'completed'))
                                        <span class="status-badge" style="background: #dcfce7; color: #15803d; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;">
                                            <span style="font-size: 9px;">●</span> Received
                                        </span>
                                    @elseif(str_contains($stLow, 'delivered') || str_contains($stLow, 'sent'))
                                        <span class="status-badge" style="background: #eff6ff; color: #1d4ed8; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;">
                                            <span style="font-size: 9px;">●</span> Delivered
                                        </span>
                                    @elseif(str_contains($stLow, 'acknowledged'))
                                        <span class="status-badge" style="background: #e0e7ff; color: #4338ca; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;">
                                            <span style="font-size: 9px;">●</span> Acknowledged
                                        </span>
                                    @elseif(str_contains($stLow, 'pending'))
                                        <span class="status-badge" style="background: #fef3c7; color: #b45309; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;">
                                            <span style="font-size: 9px;">●</span> Pending Receipt
                                        </span>
                                    @else
                                        <span class="status-badge" style="background: #f1f5f9; color: #475569; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;">
                                            <span style="font-size: 9px;">●</span> {{ $recStatus }}
                                        </span>
                                    @endif
                                </td>

                                <td style="padding: 14px 16px; text-align: right; white-space: nowrap;">
                                    <button type="button" class="transmittals-view-btn" onclick="openTransmittalDetailModal(this.closest('.transmittal-row'))" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 5px 14px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer; transition: all 0.15s ease;">
                                        View
                                    </button>
                                </td>

                            </tr>
                        @empty
                            <tr id="transmittalsEmptyStateRow">
                                <td colspan="8" style="padding: 36px 16px; text-align: center; color: #94a3b8;">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 8px;">
                                        <path d="M4 4h16v16H4z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                    <div style="font-size: 14px; font-weight: 600; color: #475569; margin-bottom: 4px;">No transmittals recorded</div>
                                    <div style="font-size: 12.5px; color: #94a3b8;">Dispatch or log a transmittal using the "+ New Transmittal" button above.</div>
                                </td>
                            </tr>
                        @endforelse

                        {{-- DYNAMIC CLIENT-SIDE EMPTY STATE (HIDDEN BY DEFAULT) --}}
                        <tr id="transmittalsFilterEmptyRow" style="display: none;">
                            <td colspan="8" style="padding: 36px 16px; text-align: center; color: #94a3b8;">
                                <div style="font-size: 14px; font-weight: 600; color: #475569; margin-bottom: 4px;">No matching transmittals</div>
                                <div style="font-size: 12.5px; color: #94a3b8;">No records matched your search query or selected tab.</div>
                                <button type="button" onclick="clearTransmittalsFilters()" style="margin-top: 10px; background: #eff6ff; color: #2563eb; border: none; border-radius: 6px; padding: 6px 14px; font-size: 12px; font-weight: 600; cursor: pointer;">
                                    Reset Filters
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>


    <!-- =========================================================
         TRANSMITTAL STATUS BREAKDOWN CARD
    ========================================================== -->
    <div id="statusBreakdownCard" class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-top: 24px;">

        <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2 class="card-title" style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Transmittal Status
                </h2>
                <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
                    Current status of document transmissions. Click any category to filter the list above.
                </p>
            </div>
            <a href="{{ route('settings.modules.transmittals') }}" style="font-size: 12px; font-weight: 600; color: #2563eb; text-decoration: none;">
                Configure Lifecycle &rarr;
            </a>
        </div>

        <div style="display: flex; flex-direction: column; gap: 12px;">

            <!-- PENDING RECEIPT -->
            <div class="transmittal-stat-item" onclick="filterTransmittalsTab('Pending')" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px; cursor: pointer; transition: all 0.15s ease;">
                <div>
                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Pending Receipt
                    </strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Documents delivered but awaiting acknowledgment.
                    </p>
                </div>
                <span id="countStatusPending" style="background: #fef3c7; color: #b45309; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    {{ $transmittalStats['pending_receipt'] ?? 6 }}
                </span>
            </div>

            <!-- RECEIVED -->
            <div class="transmittal-stat-item" onclick="filterTransmittalsTab('Received')" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px; cursor: pointer; transition: all 0.15s ease;">
                <div>
                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Received
                    </strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Incoming documents successfully received.
                    </p>
                </div>
                <span id="countStatusReceived" style="background: #dcfce7; color: #15803d; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    {{ $transmittalStats['received'] ?? 63 }}
                </span>
            </div>

            <!-- DELIVERED -->
            <div class="transmittal-stat-item" onclick="filterTransmittalsTab('Delivered')" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px; cursor: pointer; transition: all 0.15s ease;">
                <div>
                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Delivered
                    </strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Outgoing documents successfully delivered.
                    </p>
                </div>
                <span id="countStatusDelivered" style="background: #eff6ff; color: #1d4ed8; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    {{ $transmittalStats['delivered'] ?? 35 }}
                </span>
            </div>

            <!-- PROCESSING -->
            <div class="transmittal-stat-item" onclick="filterTransmittalsTab('Processing')" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px; cursor: pointer; transition: all 0.15s ease;">
                <div>
                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Processing
                    </strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Transmittals currently being processed.
                    </p>
                </div>
                <span id="countStatusProcessing" style="background: #fef3c7; color: #b45309; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 12px;">
                    {{ $transmittalStats['processing'] ?? 4 }}
                </span>
            </div>

        </div>

    </div>


    <!-- =========================================================
         DELIVERY METHODS BREAKDOWN CARD
    ========================================================== -->
    <div id="methodsBreakdownCard" class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-top: 24px;">

        <div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2 class="card-title" style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Delivery Methods
                </h2>
                <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
                    Methods used for document transmission. Click any method to filter records.
                </p>
            </div>
            <a href="{{ route('settings.modules.transmittals') }}" style="font-size: 12px; font-weight: 600; color: #2563eb; text-decoration: none;">
                Configure Delivery Channels &rarr;
            </a>
        </div>

        <div style="display: flex; flex-direction: column; gap: 12px;">

            <!-- ELECTRONIC -->
            <div class="transmittal-stat-item" onclick="filterByDeliveryMethod('Electronic')" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px; cursor: pointer; transition: all 0.15s ease;">
                <div>
                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Electronic
                    </strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Documents transmitted through electronic channels.
                    </p>
                </div>
                <strong id="countMethodElectronic" style="font-size: 15px; font-weight: 700; color: #0f172a; padding: 4px 10px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px;">
                    {{ $transmittalStats['methods']['electronic'] ?? 42 }}
                </strong>
            </div>

            <!-- EMAIL -->
            <div class="transmittal-stat-item" onclick="filterByDeliveryMethod('Email')" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px; cursor: pointer; transition: all 0.15s ease;">
                <div>
                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Email
                    </strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Documents sent through email.
                    </p>
                </div>
                <strong id="countMethodEmail" style="font-size: 15px; font-weight: 700; color: #0f172a; padding: 4px 10px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px;">
                    {{ $transmittalStats['methods']['email'] ?? 18 }}
                </strong>
            </div>

            <!-- COURIER -->
            <div class="transmittal-stat-item" onclick="filterByDeliveryMethod('Courier')" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px; cursor: pointer; transition: all 0.15s ease;">
                <div>
                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Courier
                    </strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Physical document delivery.
                    </p>
                </div>
                <strong id="countMethodCourier" style="font-size: 15px; font-weight: 700; color: #0f172a; padding: 4px 10px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px;">
                    {{ $transmittalStats['methods']['courier'] ?? 7 }}
                </strong>
            </div>

            <!-- OTHER -->
            <div class="transmittal-stat-item" onclick="filterByDeliveryMethod('Other')" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px; cursor: pointer; transition: all 0.15s ease;">
                <div>
                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Other
                    </strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Other delivery or receipt methods.
                    </p>
                </div>
                <strong id="countMethodOther" style="font-size: 15px; font-weight: 700; color: #0f172a; padding: 4px 10px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px;">
                    {{ $transmittalStats['methods']['other'] ?? 2 }}
                </strong>
            </div>

        </div>

    </div>

</div>


{{-- =========================================================================
     MODAL 1: + NEW TRANSMITTAL MODAL (REQUIRED FIELDS MARKED WITH ASTERISKS *)
     ========================================================================= --}}
<div id="transmittalModal" class="ordo-modal-overlay" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px); z-index: 9999; align-items: center; justify-content: center; padding: 20px;">
    <div class="ordo-modal-container" style="background: #ffffff; border-radius: 12px; width: 100%; max-width: 660px; max-height: 90vh; overflow-y: auto; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0;">

        <!-- HEADER -->
        <div style="padding: 20px 24px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <div style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 4px;">
                    DOCUMENT DISPATCH &bull; TRANSMITTAL
                </div>
                <h3 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    New Transmittal
                </h3>
                <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                    Log an incoming transmission or prepare an outgoing document dispatch.
                </p>
            </div>
            <button type="button" onclick="closeNewTransmittalModal()" style="background: none; border: none; font-size: 20px; line-height: 1; color: #94a3b8; cursor: pointer; padding: 4px;">
                &times;
            </button>
        </div>

        <!-- FORM -->
        <form id="newTransmittalForm" onsubmit="handleNewTransmittalSubmit(event)" enctype="multipart/form-data" style="padding: 24px;">
            @csrf

            <!-- BASIC INFORMATION -->
            <div style="font-size: 11.5px; font-weight: 700; color: #2563eb; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 12px; border-bottom: 1px solid #f1f5f9; padding-bottom: 6px;">
                Basic Information
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Transmittal Type <span style="color: #dc2626;">*</span>
                    </label>
                    <select name="type" id="newType" required style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; background: #ffffff;">
                        <option value="Incoming">Incoming (Received by Company)</option>
                        <option value="Outgoing" selected>Outgoing (Sent by Company)</option>
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Transmittal Date <span style="color: #dc2626;">*</span>
                    </label>
                    <input type="date" name="transmittal_date" id="newTransmittalDate" required value="{{ date('Y-m-d') }}" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>
            </div>

            <!-- SUBJECT / TITLE -->
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Transmittal Subject / Title <span style="color: #dc2626;">*</span>
                </label>
                <input type="text" name="title" id="newTitle" required placeholder="e.g. Audited Financial Statements & Tax Returns Submission" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
            </div>

            <!-- DELIVERY / PARTIES -->
            <div style="font-size: 11.5px; font-weight: 700; color: #2563eb; text-transform: uppercase; letter-spacing: 0.05em; margin: 20px 0 12px; border-bottom: 1px solid #f1f5f9; padding-bottom: 6px;">
                Parties &amp; Delivery
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        From / Sender <span style="color: #dc2626;">*</span>
                    </label>
                    <input type="text" name="sender" id="newSender" required value="{{ session('client.account.name', $account?->profile?->legal_name ?? 'ORDO Account Office') }}" placeholder="Sender entity or person" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        To / Recipient <span style="color: #dc2626;">*</span>
                    </label>
                    <input type="text" name="recipient" id="newRecipient" required placeholder="Recipient entity, agency or partner" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Delivery / Receipt Method <span style="color: #dc2626;">*</span>
                    </label>
                    <select name="delivery_method" id="newMethod" required style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; background: #ffffff;">
                        <option value="Electronic" selected>Electronic / System Portal</option>
                        <option value="Email">Email Dispatch</option>
                        <option value="Courier">Courier Service (LBC, DHL, Grab)</option>
                        <option value="Hand Delivery">Hand Delivery / Messenger</option>
                        <option value="Other">Other Channel</option>
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Delivery / Target Date
                    </label>
                    <input type="date" name="delivery_date" id="newDeliveryDate" value="{{ date('Y-m-d') }}" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>
            </div>

            <!-- CONTENTS & ATTACHMENTS -->
            <div style="font-size: 11.5px; font-weight: 700; color: #2563eb; text-transform: uppercase; letter-spacing: 0.05em; margin: 20px 0 12px; border-bottom: 1px solid #f1f5f9; padding-bottom: 6px;">
                Contents &amp; Attachments
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Description / Purpose / Notes
                </label>
                <textarea name="description" id="newDescription" rows="3" placeholder="Summary of transmitted items, instructions, regulatory purpose, or airway bill tracking..." style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; resize: vertical;"></textarea>
            </div>

            <!-- ATTACHMENT UPLOAD -->
            <div style="margin-bottom: 18px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Attach Transmitted Documents
                </label>
                <div onclick="document.getElementById('newAttachmentsInput').click()" style="border: 2px dashed #cbd5e1; border-radius: 8px; padding: 18px; text-align: center; background: #f8fafc; cursor: pointer; transition: all 0.15s ease;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 4px;">
                        <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
                    </svg>
                    <div style="font-size: 12.5px; font-weight: 600; color: #0f172a;">
                        Click to select document attachments
                    </div>
                    <div style="font-size: 11px; color: #64748b;">
                        PDF, Word, Excel, Images (up to 15 MB)
                    </div>
                    <div id="newAttachmentsSelected" style="display: none; margin-top: 8px; font-size: 12px; color: #1e40af; font-weight: 600; background: #eff6ff; padding: 4px 10px; border-radius: 6px;"></div>
                </div>
                <input type="file" name="attachments[]" id="newAttachmentsInput" multiple onchange="handleTransmittalFilesSelected(this)" style="display: none;">
            </div>

            <!-- STATUS & ACKNOWLEDGMENT -->
            <div style="font-size: 11.5px; font-weight: 700; color: #2563eb; text-transform: uppercase; letter-spacing: 0.05em; margin: 20px 0 12px; border-bottom: 1px solid #f1f5f9; padding-bottom: 6px;">
                Status &amp; Acknowledgment
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Status
                    </label>
                    <select name="status" id="newStatus" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; background: #ffffff;">
                        <option value="Pending Receipt" selected>Pending Receipt</option>
                        <option value="Delivered">Delivered / Sent</option>
                        <option value="Received">Received &amp; Verified</option>
                        <option value="Acknowledged">Acknowledged</option>
                        <option value="Draft">Draft</option>
                        <option value="Pending Approval">Pending Approval</option>
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Acknowledged By
                    </label>
                    <input type="text" name="acknowledged_by" id="newAckBy" placeholder="Receiving officer or desk name" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 20px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Date Acknowledged
                    </label>
                    <input type="date" name="acknowledged_at" id="newAckDate" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Proof of Receipt Note
                    </label>
                    <input type="text" name="proof_of_receipt_note" id="newProofNote" placeholder="e.g. Stamped receiving copy, signed airway bill" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>
            </div>

            <!-- CONFIGURATION NOTICE -->
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 10px 14px; font-size: 12px; color: #64748b; margin-bottom: 20px; display: flex; align-items: flex-start; gap: 8px;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-top: 2px; flex-shrink: 0;">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>
                <span>
                    Default transmittal numbering formats, approval sign-offs, and proof-of-receipt mandates are managed under
                    <a href="{{ route('settings.modules.transmittals') }}" target="_blank" style="color: #2563eb; font-weight: 600; text-decoration: none;">Settings &rarr; Module Settings &rarr; Transmittals</a>.
                </span>
            </div>

            <!-- MODAL ACTIONS -->
            <div style="display: flex; justify-content: flex-end; gap: 10px; border-top: 1px solid #e2e8f0; padding-top: 16px;">
                <button type="button" onclick="closeNewTransmittalModal()" style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; border-radius: 6px; padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Cancel
                </button>
                <button type="submit" id="btnSubmitNewTransmittal" style="background: #2563eb; color: #ffffff; border: none; border-radius: 6px; padding: 9px 20px; font-size: 13px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; box-shadow: 0 1px 2px rgba(37, 99, 235, 0.2);">
                    <span id="transmittalSpinner" style="display: none; width: 13px; height: 13px; border: 2px solid #ffffff; border-top-color: transparent; border-radius: 50%; animation: spin 0.8s linear infinite;"></span>
                    <span id="transmittalBtnText">Save &amp; Send Transmittal</span>
                </button>
            </div>
        </form>

    </div>
</div>


{{-- =========================================================================
     MODAL 2: VIEW TRANSMITTAL DETAIL MODAL
     ========================================================================= --}}
<div id="transmittalDetailModal" class="ordo-modal-overlay" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px); z-index: 9999; align-items: center; justify-content: center; padding: 20px;">
    <div class="ordo-modal-container" style="background: #ffffff; border-radius: 12px; width: 100%; max-width: 660px; max-height: 90vh; overflow-y: auto; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0;">

        <!-- HEADER -->
        <div style="padding: 20px 24px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                    <span id="detailTransmittalNo" style="font-size: 12px; font-weight: 800; color: #2563eb; background: #eff6ff; padding: 2px 8px; border-radius: 4px;">
                        TR-2026-0063
                    </span>
                    <span id="detailTypeBadge" style="font-size: 11.5px; font-weight: 700; padding: 2px 8px; border-radius: 6px; background: #eff6ff; color: #2563eb;">
                        Incoming
                    </span>
                    <span id="detailStatusBadge" class="status-badge" style="font-size: 11.5px; font-weight: 600; padding: 2px 8px; border-radius: 10px;">
                        ● Received
                    </span>
                </div>
                <h3 id="detailTitle" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
                    SEC Compliance Documents
                </h3>
            </div>
            <button type="button" onclick="closeTransmittalDetailModal()" style="background: none; border: none; font-size: 20px; line-height: 1; color: #94a3b8; cursor: pointer; padding: 4px;">
                &times;
            </button>
        </div>

        <!-- BODY -->
        <div style="padding: 24px;">

            <!-- PARTIES CARD -->
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 16px; margin-bottom: 18px; display: grid; grid-template-columns: 1fr auto 1fr; gap: 16px; align-items: center;">
                <div>
                    <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 2px;">FROM / SENDER</div>
                    <div id="detailSender" style="font-size: 13.5px; font-weight: 700; color: #0f172a;">Securities and Exchange Commission</div>
                </div>

                <div style="color: #94a3b8; font-size: 18px;">&rarr;</div>

                <div>
                    <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 2px;">TO / RECIPIENT</div>
                    <div id="detailRecipient" style="font-size: 13.5px; font-weight: 700; color: #0f172a;">Corporate Legal Department</div>
                </div>
            </div>

            <!-- METADATA GRID -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 18px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 16px;">
                <div>
                    <div style="font-size: 11px; color: #64748b; text-transform: uppercase; font-weight: 700; margin-bottom: 2px;">Transmittal Date</div>
                    <div id="detailDate" style="font-size: 13.5px; font-weight: 600; color: #0f172a;">August 18, 2026</div>
                </div>

                <div>
                    <div style="font-size: 11px; color: #64748b; text-transform: uppercase; font-weight: 700; margin-bottom: 2px;">Delivery Method</div>
                    <div id="detailMethod" style="font-size: 13.5px; font-weight: 600; color: #0f172a;">Email</div>
                </div>
            </div>

            <!-- DESCRIPTION -->
            <div style="margin-bottom: 18px;">
                <div style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">
                    Description &amp; Dispatch Purpose
                </div>
                <div id="detailDescription" style="font-size: 13px; color: #475569; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 6px; padding: 10px 12px; line-height: 1.5;">
                    —
                </div>
            </div>

            <!-- ATTACHMENTS LIST -->
            <div style="margin-bottom: 18px;">
                <div style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Transmitted Document Attachments
                </div>
                <div id="detailAttachmentsContainer" style="display: flex; flex-direction: column; gap: 8px;">
                    <div style="font-size: 12.5px; color: #94a3b8;">No attachments included with this transmittal.</div>
                </div>
            </div>

            <!-- ACKNOWLEDGMENT & PROOF OF RECEIPT -->
            <div style="background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px; padding: 14px 16px;">
                <div style="font-size: 12px; font-weight: 700; color: #166534; margin-bottom: 6px; display: flex; align-items: center; gap: 6px;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Acknowledgment &amp; Proof of Receipt
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 6px;">
                    <div>
                        <span style="font-size: 11px; color: #15803d; font-weight: 600;">Acknowledged By:</span>
                        <span id="detailAckBy" style="font-size: 12.5px; font-weight: 700; color: #14532d; display: block;">—</span>
                    </div>
                    <div>
                        <span style="font-size: 11px; color: #15803d; font-weight: 600;">Date Acknowledged:</span>
                        <span id="detailAckDate" style="font-size: 12.5px; font-weight: 700; color: #14532d; display: block;">—</span>
                    </div>
                </div>
                <div style="font-size: 12px; color: #166534; margin-top: 4px;">
                    <span style="font-weight: 600;">Receipt Verification Note:</span>
                    <span id="detailProofNote">Logged in compliance records.</span>
                </div>
            </div>

        </div>

        <!-- FOOTER (EDIT ACTION PROVIDED, NO HARD DELETE FOR V1) -->
        <div style="padding: 16px 24px; border-top: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
            <div style="font-size: 11px; color: #94a3b8;">
                ORDO Transmittals Protocol &bull; Secure Audit Trail
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="button" onclick="closeTransmittalDetailModal()" style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; border-radius: 6px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Close
                </button>
                <button type="button" id="btnEditTransmittalFromDetail" onclick="openTransmittalEditModalFromDetail()" style="background: #2563eb; color: #ffffff; border: none; border-radius: 6px; padding: 8px 18px; font-size: 13px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    Edit Transmittal
                </button>
            </div>
        </div>

    </div>
</div>


{{-- =========================================================================
     MODAL 3: EDIT TRANSMITTAL MODAL (NO HARD DELETE)
     ========================================================================= --}}
<div id="transmittalEditModal" class="ordo-modal-overlay" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px); z-index: 10000; align-items: center; justify-content: center; padding: 20px;">
    <div class="ordo-modal-container" style="background: #ffffff; border-radius: 12px; width: 100%; max-width: 660px; max-height: 90vh; overflow-y: auto; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0;">

        <!-- HEADER -->
        <div style="padding: 20px 24px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <div style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 4px;">
                    TRANSMITTAL RECORD &bull; <span id="editTransmittalNoBadge">TR-2026-0063</span>
                </div>
                <h3 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Edit Transmittal Details
                </h3>
                <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                    Update transmittal routing, delivery method, status, or acknowledgment info.
                </p>
            </div>
            <button type="button" onclick="closeTransmittalEditModal()" style="background: none; border: none; font-size: 20px; line-height: 1; color: #94a3b8; cursor: pointer; padding: 4px;">
                &times;
            </button>
        </div>

        <!-- FORM -->
        <form id="editTransmittalForm" onsubmit="handleEditTransmittalSubmit(event)" enctype="multipart/form-data" style="padding: 24px;">
            @csrf
            <input type="hidden" id="editTransmittalId" name="transmittal_id" value="">

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Transmittal Type <span style="color: #dc2626;">*</span>
                    </label>
                    <select name="type" id="editType" required style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; background: #ffffff;">
                        <option value="Incoming">Incoming (Received by Company)</option>
                        <option value="Outgoing">Outgoing (Sent by Company)</option>
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Transmittal Date <span style="color: #dc2626;">*</span>
                    </label>
                    <input type="date" name="transmittal_date" id="editTransmittalDate" required style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Subject / Title <span style="color: #dc2626;">*</span>
                </label>
                <input type="text" name="title" id="editTitle" required style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        From / Sender <span style="color: #dc2626;">*</span>
                    </label>
                    <input type="text" name="sender" id="editSender" required style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        To / Recipient <span style="color: #dc2626;">*</span>
                    </label>
                    <input type="text" name="recipient" id="editRecipient" required style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Delivery Method <span style="color: #dc2626;">*</span>
                    </label>
                    <select name="delivery_method" id="editMethod" required style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; background: #ffffff;">
                        <option value="Electronic">Electronic / System Portal</option>
                        <option value="Email">Email Dispatch</option>
                        <option value="Courier">Courier Service</option>
                        <option value="Hand Delivery">Hand Delivery</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Status <span style="color: #dc2626;">*</span>
                    </label>
                    <select name="status" id="editStatus" required style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; background: #ffffff;">
                        <option value="Pending Receipt">Pending Receipt</option>
                        <option value="Delivered">Delivered</option>
                        <option value="Received">Received</option>
                        <option value="Acknowledged">Acknowledged</option>
                        <option value="Draft">Draft</option>
                        <option value="Pending Approval">Pending Approval</option>
                    </select>
                </div>
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Description / Purpose / Notes
                </label>
                <textarea name="description" id="editDescription" rows="3" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; resize: vertical;"></textarea>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Acknowledged By
                    </label>
                    <input type="text" name="acknowledged_by" id="editAckBy" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Date Acknowledged
                    </label>
                    <input type="date" name="acknowledged_at" id="editAckDate" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Proof of Receipt Note
                </label>
                <input type="text" name="proof_of_receipt_note" id="editProofNote" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
            </div>

            <!-- MODAL ACTIONS -->
            <div style="display: flex; justify-content: flex-end; gap: 10px; border-top: 1px solid #e2e8f0; padding-top: 16px;">
                <button type="button" onclick="closeTransmittalEditModal()" style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; border-radius: 6px; padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Cancel
                </button>
                <button type="submit" id="btnSubmitEditTransmittal" style="background: #2563eb; color: #ffffff; border: none; border-radius: 6px; padding: 9px 20px; font-size: 13px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                    <span id="editTransmittalSpinner" style="display: none; width: 13px; height: 13px; border: 2px solid #ffffff; border-top-color: transparent; border-radius: 50%; animation: spin 0.8s linear infinite;"></span>
                    <span id="editTransmittalBtnText">Update Transmittal</span>
                </button>
            </div>
        </form>

    </div>
</div>


{{-- =========================================================================
     FLOATING TOAST NOTIFICATION
     ========================================================================= --}}
<div id="transmittalsToast" style="display: none; position: fixed; bottom: 24px; right: 24px; z-index: 10001; background: #0f172a; color: #ffffff; border-radius: 8px; padding: 12px 18px; font-size: 13px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2); align-items: center; gap: 10px; transition: all 0.3s ease;">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
    </svg>
    <span id="transmittalsToastMessage">Transmittal logged successfully</span>
</div>

<style>
@keyframes spin {
    to { transform: rotate(360deg); }
}
@keyframes pulseHighlight {
    0% { transform: scale(1); }
    50% { transform: scale(1.04); color: #2563eb; }
    100% { transform: scale(1); }
}
.kpi-pulse-updated {
    animation: pulseHighlight 0.4s ease-in-out;
}
.kpi-card {
    cursor: pointer;
    user-select: none;
    transition: transform 0.15s ease, box-shadow 0.15s ease, border-color 0.15s ease, background-color 0.15s ease;
}
.kpi-card:hover {
    border-color: #93c5fd !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.08) !important;
}
.kpi-card:active {
    transform: translateY(0);
}
.kpi-card:focus-visible {
    outline: 2px solid #2563eb;
    outline-offset: 2px;
}
.kpi-card.active-kpi {
    border-color: #2563eb !important;
    background-color: #f8faff !important;
    box-shadow: 0 0 0 1.5px #2563eb, 0 4px 14px rgba(37, 99, 235, 0.1) !important;
}
.transmittal-stat-item:hover {
    background: #f1f5f9 !important;
    border-color: #cbd5e1 !important;
}
.transmittal-row:hover {
    background: #f8fafc;
}
.transmittals-tab-link:hover {
    color: #2563eb !important;
}
</style>

@push('scripts')
<script>
    let activeTransmittalTab = 'all';
    let currentDetailTransmittalData = null;

    // Toast feedback
    function showTransmittalsToast(msg) {
        const toast = document.getElementById('transmittalsToast');
        const text = document.getElementById('transmittalsToastMessage');
        if (!toast || !text) return;
        text.textContent = msg;
        toast.style.display = 'flex';
        toast.style.opacity = '1';
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => { toast.style.display = 'none'; }, 300);
        }, 4000);
    }

    // Modal toggles
    function openNewTransmittalModal() {
        const modal = document.getElementById('transmittalModal');
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            setTimeout(() => document.getElementById('newTitle')?.focus(), 50);
        }
    }

    function closeNewTransmittalModal() {
        const modal = document.getElementById('transmittalModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    }

    function handleTransmittalFilesSelected(input) {
        const files = input.files;
        const info = document.getElementById('newAttachmentsSelected');
        if (info) {
            if (files && files.length > 0) {
                info.textContent = `Selected: ${files.length} document file(s) attached`;
                info.style.display = 'block';
            } else {
                info.style.display = 'none';
            }
        }
    }

    function openTransmittalDetailModal(rowElement) {
        if (!rowElement) return;

        let attachments = [];
        try {
            attachments = JSON.parse(rowElement.getAttribute('data-attachments') || '[]');
        } catch (e) {
            attachments = [];
        }

        currentDetailTransmittalData = {
            id: rowElement.getAttribute('data-id'),
            transmittal_no: rowElement.getAttribute('data-transmittal-no'),
            title: rowElement.getAttribute('data-title'),
            type: rowElement.getAttribute('data-type'),
            sender: rowElement.getAttribute('data-sender'),
            recipient: rowElement.getAttribute('data-recipient'),
            date: rowElement.getAttribute('data-formatted-date'),
            raw_date: rowElement.getAttribute('data-raw-date'),
            method: rowElement.getAttribute('data-method'),
            status: rowElement.getAttribute('data-status'),
            description: rowElement.getAttribute('data-description'),
            ack_by: rowElement.getAttribute('data-ack-by'),
            ack_date: rowElement.getAttribute('data-ack-date'),
            raw_ack_date: rowElement.getAttribute('data-raw-ack-date'),
            proof_note: rowElement.getAttribute('data-proof-note'),
            attachments: attachments
        };

        // Populate detail modal elements
        document.getElementById('detailTransmittalNo').textContent = currentDetailTransmittalData.transmittal_no;
        document.getElementById('detailTitle').textContent = currentDetailTransmittalData.title;
        document.getElementById('detailSender').textContent = currentDetailTransmittalData.sender;
        document.getElementById('detailRecipient').textContent = currentDetailTransmittalData.recipient;
        document.getElementById('detailDate').textContent = currentDetailTransmittalData.date;
        document.getElementById('detailMethod').textContent = currentDetailTransmittalData.method;
        document.getElementById('detailDescription').textContent = currentDetailTransmittalData.description || 'No specific dispatch notes recorded.';

        // Type badge
        const typeBadge = document.getElementById('detailTypeBadge');
        typeBadge.textContent = currentDetailTransmittalData.type;
        if (currentDetailTransmittalData.type === 'Incoming') {
            typeBadge.style.background = '#eff6ff';
            typeBadge.style.color = '#2563eb';
        } else {
            typeBadge.style.background = '#f1f5f9';
            typeBadge.style.color = '#475569';
        }

        // Status badge
        const statusBadge = document.getElementById('detailStatusBadge');
        statusBadge.textContent = '● ' + currentDetailTransmittalData.status;
        const stLow = (currentDetailTransmittalData.status || '').toLowerCase();
        if (stLow.includes('received') || stLow.includes('completed')) {
            statusBadge.style.background = '#dcfce7';
            statusBadge.style.color = '#15803d';
        } else if (stLow.includes('delivered') || stLow.includes('sent')) {
            statusBadge.style.background = '#eff6ff';
            statusBadge.style.color = '#1d4ed8';
        } else if (stLow.includes('acknowledged')) {
            statusBadge.style.background = '#e0e7ff';
            statusBadge.style.color = '#4338ca';
        } else if (stLow.includes('pending')) {
            statusBadge.style.background = '#fef3c7';
            statusBadge.style.color = '#b45309';
        } else {
            statusBadge.style.background = '#f1f5f9';
            statusBadge.style.color = '#475569';
        }

        // Acknowledgment
        document.getElementById('detailAckBy').textContent = currentDetailTransmittalData.ack_by || 'Awaiting Receiving Sign-off';
        document.getElementById('detailAckDate').textContent = currentDetailTransmittalData.ack_date || 'Pending';
        document.getElementById('detailProofNote').textContent = currentDetailTransmittalData.proof_note || 'Formal proof of receipt will be recorded upon physical or digital confirmation.';

        // Attachments
        const attContainer = document.getElementById('detailAttachmentsContainer');
        attContainer.innerHTML = '';
        if (currentDetailTransmittalData.attachments && currentDetailTransmittalData.attachments.length > 0) {
            currentDetailTransmittalData.attachments.forEach(att => {
                const item = document.createElement('div');
                item.style.background = '#f8fafc';
                item.style.border = '1px solid #e2e8f0';
                item.style.borderRadius = '6px';
                item.style.padding = '8px 12px';
                item.style.display = 'flex';
                item.style.alignItems = 'center';
                item.style.justifyContent = 'space-between';
                item.innerHTML = `
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span style="font-size: 14px;">📄</span>
                        <div>
                            <div style="font-size: 12.5px; font-weight: 600; color: #0f172a;">${escapeHtml(att.name || 'document.pdf')}</div>
                            <div style="font-size: 11px; color: #64748b;">${escapeHtml(att.type || 'PDF')} &bull; ${escapeHtml(att.formatted_size || '')}</div>
                        </div>
                    </div>
                    <button type="button" onclick="showTransmittalsToast('Downloading document file from secure vault...')" style="background: #ffffff; border: 1px solid #cbd5e1; border-radius: 4px; padding: 4px 10px; font-size: 11.5px; font-weight: 600; color: #2563eb; cursor: pointer;">
                        Download
                    </button>
                `;
                attContainer.appendChild(item);
            });
        } else {
            attContainer.innerHTML = '<div style="font-size: 12.5px; color: #94a3b8;">No transmitted files attached.</div>';
        }

        const modal = document.getElementById('transmittalDetailModal');
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }

    function closeTransmittalDetailModal() {
        const modal = document.getElementById('transmittalDetailModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    }

    function openTransmittalEditModalFromDetail() {
        if (!currentDetailTransmittalData) return;
        closeTransmittalDetailModal();

        document.getElementById('editTransmittalId').value = currentDetailTransmittalData.id;
        document.getElementById('editTransmittalNoBadge').textContent = currentDetailTransmittalData.transmittal_no;
        document.getElementById('editTitle').value = currentDetailTransmittalData.title;
        document.getElementById('editType').value = currentDetailTransmittalData.type;
        document.getElementById('editSender').value = currentDetailTransmittalData.sender;
        document.getElementById('editRecipient').value = currentDetailTransmittalData.recipient;
        document.getElementById('editTransmittalDate').value = currentDetailTransmittalData.raw_date || '';
        document.getElementById('editMethod').value = currentDetailTransmittalData.method;
        document.getElementById('editStatus').value = currentDetailTransmittalData.status;
        document.getElementById('editDescription').value = currentDetailTransmittalData.description || '';
        document.getElementById('editAckBy').value = currentDetailTransmittalData.ack_by || '';
        document.getElementById('editAckDate').value = currentDetailTransmittalData.raw_ack_date || '';
        document.getElementById('editProofNote').value = currentDetailTransmittalData.proof_note || '';

        const editModal = document.getElementById('transmittalEditModal');
        if (editModal) {
            editModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }

    function closeTransmittalEditModal() {
        const modal = document.getElementById('transmittalEditModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    }

    // Handle AJAX New Transmittal Submit
    async function handleNewTransmittalSubmit(e) {
        e.preventDefault();
        const form = document.getElementById('newTransmittalForm');
        const submitBtn = document.getElementById('btnSubmitNewTransmittal');
        const spinner = document.getElementById('transmittalSpinner');
        const btnText = document.getElementById('transmittalBtnText');

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        submitBtn.disabled = true;
        spinner.style.display = 'inline-block';
        btnText.textContent = 'Saving & Dispatching...';

        const formData = new FormData(form);

        try {
            const response = await fetch("{{ route('transmittals.store') }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            if (response.ok && data.success) {
                closeNewTransmittalModal();
                form.reset();
                document.getElementById('newAttachmentsSelected').style.display = 'none';

                if (data.record) {
                    prependTransmittalToTable(data.record);
                }

                if (data.stats) {
                    updateTransmittalStatsUi(data.stats);
                }

                showTransmittalsToast(data.message || 'Transmittal logged and dispatched successfully.');
            } else {
                alert(data.message || 'Validation error while saving transmittal. Please check required fields.');
            }
        } catch (err) {
            console.error(err);
            form.submit();
        } finally {
            submitBtn.disabled = false;
            spinner.style.display = 'none';
            btnText.textContent = 'Save & Send Transmittal';
        }
    }

    // Handle AJAX Edit Transmittal Submit
    async function handleEditTransmittalSubmit(e) {
        e.preventDefault();
        const form = document.getElementById('editTransmittalForm');
        const submitBtn = document.getElementById('btnSubmitEditTransmittal');
        const spinner = document.getElementById('editTransmittalSpinner');
        const btnText = document.getElementById('editTransmittalBtnText');
        const transmittalId = document.getElementById('editTransmittalId').value;

        if (!transmittalId) return;

        submitBtn.disabled = true;
        spinner.style.display = 'inline-block';
        btnText.textContent = 'Updating...';

        const formData = new FormData(form);

        try {
            const response = await fetch(`/transmittals/${transmittalId}`, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            if (response.ok && data.success) {
                closeTransmittalEditModal();

                if (data.record) {
                    updateTransmittalInTable(data.record);
                }

                if (data.stats) {
                    updateTransmittalStatsUi(data.stats);
                }

                showTransmittalsToast(data.message || 'Transmittal details updated successfully.');
            } else {
                alert(data.message || 'Validation error while updating transmittal.');
            }
        } catch (err) {
            console.error(err);
            form.submit();
        } finally {
            submitBtn.disabled = false;
            spinner.style.display = 'none';
            btnText.textContent = 'Update Transmittal';
        }
    }

    function getStatusBadgeHtml(status) {
        const stLow = (status || '').toLowerCase();
        if (stLow.includes('received') || stLow.includes('completed')) {
            return `<span class="status-badge" style="background: #dcfce7; color: #15803d; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;"><span style="font-size: 9px;">●</span> Received</span>`;
        } else if (stLow.includes('delivered') || stLow.includes('sent')) {
            return `<span class="status-badge" style="background: #eff6ff; color: #1d4ed8; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;"><span style="font-size: 9px;">●</span> Delivered</span>`;
        } else if (stLow.includes('acknowledged')) {
            return `<span class="status-badge" style="background: #e0e7ff; color: #4338ca; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;"><span style="font-size: 9px;">●</span> Acknowledged</span>`;
        } else if (stLow.includes('pending')) {
            return `<span class="status-badge" style="background: #fef3c7; color: #b45309; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;"><span style="font-size: 9px;">●</span> Pending Receipt</span>`;
        }
        return `<span class="status-badge" style="background: #f1f5f9; color: #475569; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;"><span style="font-size: 9px;">●</span> ${escapeHtml(status || 'Pending')}</span>`;
    }

    function getTypeBadgeHtml(type) {
        return type === 'Incoming'
            ? `<span class="type-badge" style="background: #eff6ff; color: #2563eb; font-size: 11.5px; font-weight: 700; padding: 3px 8px; border-radius: 6px; display: inline-flex; align-items: center; gap: 4px;">&darr; Incoming</span>`
            : `<span class="type-badge" style="background: #f1f5f9; color: #475569; font-size: 11.5px; font-weight: 700; padding: 3px 8px; border-radius: 6px; display: inline-flex; align-items: center; gap: 4px;">&uarr; Outgoing</span>`;
    }

    function prependTransmittalToTable(rec) {
        const tbody = document.getElementById('transmittalsTableBody');
        const emptyRow = document.getElementById('transmittalsEmptyStateRow');
        if (emptyRow) emptyRow.remove();

        const attCount = Array.isArray(rec.attachments) ? rec.attachments.length : 0;

        const tr = document.createElement('tr');
        tr.className = 'transmittal-row';
        tr.id = `transmittal-row-${rec.id}`;
        tr.setAttribute('data-id', rec.id);
        tr.setAttribute('data-transmittal-no', rec.transmittal_no || '');
        tr.setAttribute('data-title', rec.title || '');
        tr.setAttribute('data-type', rec.type || 'Outgoing');
        tr.setAttribute('data-sender', rec.sender || '');
        tr.setAttribute('data-recipient', rec.recipient || '');
        tr.setAttribute('data-formatted-date', rec.formatted_transmittal_date || rec.transmittal_date || '');
        tr.setAttribute('data-raw-date', rec.transmittal_date || '');
        tr.setAttribute('data-method', rec.delivery_method || 'Electronic');
        tr.setAttribute('data-status', rec.status || 'Pending Receipt');
        tr.setAttribute('data-description', rec.description || '');
        tr.setAttribute('data-ack-by', rec.acknowledged_by || '');
        tr.setAttribute('data-ack-date', rec.formatted_acknowledged_at || rec.acknowledged_at || '');
        tr.setAttribute('data-raw-ack-date', rec.acknowledged_at || '');
        tr.setAttribute('data-proof-note', rec.proof_of_receipt_note || '');
        tr.setAttribute('data-attachments', JSON.stringify(rec.attachments || []));
        tr.style.borderBottom = '1px solid #f1f5f9';
        tr.style.background = '#eff6ff';
        tr.style.transition = 'background 0.5s ease';

        tr.innerHTML = `
            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a; white-space: nowrap;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span style="color: #2563eb; font-size: 11px; background: #eff6ff; padding: 2px 6px; border-radius: 4px; font-weight: 700;">#</span>
                    <span class="transmittal-no-cell">${escapeHtml(rec.transmittal_no || '')}</span>
                </div>
            </td>
            <td style="padding: 14px 16px; white-space: nowrap;" class="transmittal-type-cell">
                ${getTypeBadgeHtml(rec.type)}
            </td>
            <td style="padding: 14px 16px;">
                <div style="font-weight: 600; color: #0f172a; margin-bottom: 2px;" class="transmittal-title-cell">
                    ${escapeHtml(rec.title)}
                </div>
                <div style="font-size: 11.5px; color: #64748b; display: flex; align-items: center; gap: 8px;">
                    ${attCount > 0 ? `<span style="background: #f8fafc; border: 1px solid #e2e8f0; padding: 1px 6px; border-radius: 4px; font-size: 10.5px; font-weight: 600; color: #475569;">📎 ${attCount} ${attCount === 1 ? 'doc' : 'docs'}</span>` : ''}
                    ${rec.description ? `<span style="max-width: 280px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">${escapeHtml(rec.description)}</span>` : ''}
                </div>
            </td>
            <td style="padding: 14px 16px; color: #475569; font-size: 12.5px;">
                <div style="font-weight: 600; color: #1e293b;">From: <span class="transmittal-sender-cell">${escapeHtml(rec.sender || '')}</span></div>
                <div style="color: #64748b;">To: <span class="transmittal-recipient-cell">${escapeHtml(rec.recipient || '')}</span></div>
            </td>
            <td style="padding: 14px 16px; color: #64748b; white-space: nowrap;" class="transmittal-date-cell">
                ${escapeHtml(rec.formatted_transmittal_date || rec.transmittal_date || '')}
            </td>
            <td style="padding: 14px 16px; color: #64748b; white-space: nowrap;" class="transmittal-method-cell">
                ${escapeHtml(rec.delivery_method || 'Electronic')}
            </td>
            <td style="padding: 14px 16px; white-space: nowrap;" class="transmittal-status-cell">
                ${getStatusBadgeHtml(rec.status)}
            </td>
            <td style="padding: 14px 16px; text-align: right; white-space: nowrap;">
                <button type="button" class="transmittals-view-btn" onclick="openTransmittalDetailModal(this.closest('.transmittal-row'))" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 5px 14px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer; transition: all 0.15s ease;">
                    View
                </button>
            </td>
        `;

        tbody.insertBefore(tr, tbody.firstChild);

        setTimeout(() => {
            tr.style.background = '#ffffff';
        }, 1500);

        applyTransmittalsFilters();
    }

    function updateTransmittalInTable(rec) {
        const row = document.getElementById(`transmittal-row-${rec.id}`);
        if (!row) return;

        row.setAttribute('data-title', rec.title || '');
        row.setAttribute('data-type', rec.type || 'Outgoing');
        row.setAttribute('data-sender', rec.sender || '');
        row.setAttribute('data-recipient', rec.recipient || '');
        row.setAttribute('data-method', rec.delivery_method || 'Electronic');
        row.setAttribute('data-status', rec.status || 'Pending Receipt');
        row.setAttribute('data-description', rec.description || '');
        row.setAttribute('data-ack-by', rec.acknowledged_by || '');
        row.setAttribute('data-proof-note', rec.proof_of_receipt_note || '');
        if (rec.formatted_transmittal_date) {
            row.setAttribute('data-formatted-date', rec.formatted_transmittal_date);
        }

        const titleCell = row.querySelector('.transmittal-title-cell');
        if (titleCell) titleCell.textContent = rec.title;

        const senderCell = row.querySelector('.transmittal-sender-cell');
        if (senderCell) senderCell.textContent = rec.sender;

        const recCell = row.querySelector('.transmittal-recipient-cell');
        if (recCell) recCell.textContent = rec.recipient;

        const methodCell = row.querySelector('.transmittal-method-cell');
        if (methodCell) methodCell.textContent = rec.delivery_method;

        const dateCell = row.querySelector('.transmittal-date-cell');
        if (dateCell && (rec.formatted_transmittal_date || rec.transmittal_date)) {
            dateCell.textContent = rec.formatted_transmittal_date || rec.transmittal_date;
        }

        const typeCell = row.querySelector('.transmittal-type-cell');
        if (typeCell) typeCell.innerHTML = getTypeBadgeHtml(rec.type);

        const statusCell = row.querySelector('.transmittal-status-cell');
        if (statusCell) statusCell.innerHTML = getStatusBadgeHtml(rec.status);

        row.style.background = '#f0fdf4';
        setTimeout(() => { row.style.background = '#ffffff'; }, 1500);

        applyTransmittalsFilters();
    }

    function updateTransmittalStatsUi(stats) {
        if (!stats) return;

        const triggerPulse = (el, val) => {
            if (!el || val === undefined) return;
            const strVal = String(val);
            if (el.textContent.trim() !== strVal) {
                el.textContent = strVal;
                el.classList.remove('kpi-pulse-updated');
                void el.offsetWidth;
                el.classList.add('kpi-pulse-updated');
            }
        };

        if (stats.incoming !== undefined) triggerPulse(document.getElementById('statIncoming'), stats.incoming);
        if (stats.outgoing !== undefined) triggerPulse(document.getElementById('statOutgoing'), stats.outgoing);
        if (stats.pending_receipt !== undefined) triggerPulse(document.getElementById('statPendingReceipt'), stats.pending_receipt);
        if (stats.received !== undefined) triggerPulse(document.getElementById('statReceived'), stats.received);

        if (stats.pending_receipt !== undefined) triggerPulse(document.getElementById('countStatusPending'), stats.pending_receipt);
        if (stats.received !== undefined) triggerPulse(document.getElementById('countStatusReceived'), stats.received);
        if (stats.delivered !== undefined) triggerPulse(document.getElementById('countStatusDelivered'), stats.delivered);
        if (stats.processing !== undefined) triggerPulse(document.getElementById('countStatusProcessing'), stats.processing);

        if (stats.methods) {
            if (stats.methods.electronic) triggerPulse(document.getElementById('countMethodElectronic'), stats.methods.electronic);
            if (stats.methods.email) triggerPulse(document.getElementById('countMethodEmail'), stats.methods.email);
            if (stats.methods.courier) triggerPulse(document.getElementById('countMethodCourier'), stats.methods.courier);
            if (stats.methods.other) triggerPulse(document.getElementById('countMethodOther'), stats.methods.other);
        }
    }

    function filterTransmittalsTab(tabName, shouldScroll = false) {
        let standardTab = 'all';
        const low = (tabName || '').toLowerCase();
        if (low === 'incoming') standardTab = 'Incoming';
        else if (low === 'outgoing') standardTab = 'Outgoing';
        else if (low === 'pending' || low === 'pending receipt' || low === 'pending_receipt') standardTab = 'Pending';
        else if (low === 'received') standardTab = 'Received';
        else if (low === 'archived') standardTab = 'Archived';
        else standardTab = 'all';

        activeTransmittalTab = standardTab;

        // 1. Highlight active KPI card
        document.querySelectorAll('.kpi-card').forEach(card => card.classList.remove('active-kpi'));
        if (standardTab === 'Incoming') {
            document.getElementById('kpiIncoming')?.classList.add('active-kpi');
        } else if (standardTab === 'Outgoing') {
            document.getElementById('kpiOutgoing')?.classList.add('active-kpi');
        } else if (standardTab === 'Pending') {
            document.getElementById('kpiPendingReceipt')?.classList.add('active-kpi');
        } else if (standardTab === 'Received') {
            document.getElementById('kpiReceived')?.classList.add('active-kpi');
        }

        // 2. Update nav tab buttons styling
        document.querySelectorAll('.transmittals-tab-link').forEach(btn => {
            const btnTab = btn.getAttribute('data-tab');
            if (btnTab && btnTab.toLowerCase() === standardTab.toLowerCase()) {
                btn.style.color = '#2563eb';
                btn.style.fontWeight = '700';
                btn.style.borderBottom = '2px solid #2563eb';
                btn.classList.add('active');
            } else {
                btn.style.color = '#64748b';
                btn.style.fontWeight = '600';
                btn.style.borderBottom = '2px solid transparent';
                btn.classList.remove('active');
            }
        });

        // 3. Update table heading, subheading, and active filter badge
        const heading = document.getElementById('transmittalsTableHeading');
        const subheading = document.getElementById('transmittalsTableSubheading');
        const badge = document.getElementById('activeFilterBadge');
        const badgeText = document.getElementById('activeFilterBadgeText');

        if (standardTab === 'all') {
            if (heading) heading.textContent = 'Recent Transmittals';
            if (subheading) subheading.textContent = 'Recent incoming and outgoing document transmissions.';
            if (badge) badge.style.display = 'none';
            if (window.history && window.history.replaceState) {
                const url = new URL(window.location.href);
                url.searchParams.delete('filter');
                url.searchParams.delete('type');
                url.searchParams.delete('status');
                window.history.replaceState(null, '', url.pathname + (url.searchParams.toString() ? '?' + url.searchParams.toString() : ''));
            }
        } else {
            let filterLabel = '';
            let filterDesc = '';
            if (standardTab === 'Incoming') {
                filterLabel = 'Type: Incoming';
                filterDesc = 'Showing incoming transmittals.';
            } else if (standardTab === 'Outgoing') {
                filterLabel = 'Type: Outgoing';
                filterDesc = 'Showing outgoing transmittals.';
            } else if (standardTab === 'Pending') {
                filterLabel = 'Status: Pending Receipt';
                filterDesc = 'Showing transmittals awaiting acknowledgment / receipt.';
            } else if (standardTab === 'Received') {
                filterLabel = 'Status: Received';
                filterDesc = 'Showing completed and received transmittals.';
            } else if (standardTab === 'Archived') {
                filterLabel = 'Status: Archived';
                filterDesc = 'Showing archived transmittals.';
            }

            if (heading) heading.textContent = `${standardTab} Transmittals`;
            if (subheading) subheading.textContent = filterDesc;
            if (badge) {
                badge.style.display = 'inline-flex';
                if (badgeText) badgeText.textContent = `Active Filter: ${filterLabel}`;
            }

            if (window.history && window.history.replaceState) {
                const url = new URL(window.location.href);
                url.searchParams.set('filter', standardTab.toLowerCase());
                url.searchParams.delete('type');
                url.searchParams.delete('status');
                window.history.replaceState(null, '', url.pathname + '?' + url.searchParams.toString());
            }
        }

        // 4. Apply row filtering
        applyTransmittalsFilters();

        // 5. Scroll to records section if requested
        if (shouldScroll) {
            const section = document.getElementById('transmittalsSection');
            if (section) {
                section.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    }

    function filterByDeliveryMethod(method) {
        const input = document.getElementById('transmittalsSearchInput');
        if (input) {
            input.value = method;
            applyTransmittalsFilters();
            document.getElementById('transmittalsSection')?.scrollIntoView({ behavior: 'smooth' });
        }
    }

    function handleTransmittalsSearch() {
        applyTransmittalsFilters();
    }

    function clearTransmittalsFilters() {
        const input = document.getElementById('transmittalsSearchInput');
        if (input) input.value = '';
        filterTransmittalsTab('all', false);
    }

    function applyTransmittalsFilters() {
        const query = (document.getElementById('transmittalsSearchInput')?.value || '').toLowerCase().trim();
        const rows = document.querySelectorAll('#transmittalsTableBody .transmittal-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const title = (row.getAttribute('data-title') || '').toLowerCase();
            const transmittalNo = (row.getAttribute('data-transmittal-no') || '').toLowerCase();
            const type = (row.getAttribute('data-type') || '').toLowerCase();
            const sender = (row.getAttribute('data-sender') || '').toLowerCase();
            const recipient = (row.getAttribute('data-recipient') || '').toLowerCase();
            const method = (row.getAttribute('data-method') || '').toLowerCase();
            const status = (row.getAttribute('data-status') || '').toLowerCase();

            let matchesTab = true;
            if (activeTransmittalTab !== 'all') {
                const target = activeTransmittalTab.toLowerCase();
                if (target === 'incoming') {
                    matchesTab = type === 'incoming';
                } else if (target === 'outgoing') {
                    matchesTab = type === 'outgoing';
                } else if (target === 'pending') {
                    matchesTab = status.includes('pending');
                } else if (target === 'received') {
                    matchesTab = status.includes('received') || status.includes('completed');
                } else if (target === 'delivered') {
                    matchesTab = status.includes('delivered') || status.includes('sent');
                } else if (target === 'processing') {
                    matchesTab = status.includes('processing');
                } else if (target === 'archived') {
                    matchesTab = status.includes('archive') || status.includes('inactive');
                }
            }

            let matchesQuery = true;
            if (query) {
                matchesQuery = title.includes(query) ||
                    transmittalNo.includes(query) ||
                    type.includes(query) ||
                    sender.includes(query) ||
                    recipient.includes(query) ||
                    method.includes(query) ||
                    status.includes(query);
            }

            if (matchesTab && matchesQuery) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        const filterEmptyRow = document.getElementById('transmittalsFilterEmptyRow');
        if (filterEmptyRow) {
            filterEmptyRow.style.display = visibleCount === 0 ? '' : 'none';
        }
    }

    function escapeHtml(str) {
        if (!str) return '';
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    document.addEventListener('DOMContentLoaded', () => {
        ['transmittalModal', 'transmittalDetailModal', 'transmittalEditModal'].forEach(id => {
            const modal = document.getElementById(id);
            if (modal) {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        modal.style.display = 'none';
                        document.body.style.overflow = '';
                    }
                });
            }
        });

        // Initialize active filter from URL search parameters or server initialFilter
        const urlParams = new URLSearchParams(window.location.search);
        const requestedFilter = urlParams.get('filter') || urlParams.get('type') || urlParams.get('status') || @json($initialFilter ?? 'all');
        if (requestedFilter && requestedFilter !== 'all') {
            filterTransmittalsTab(requestedFilter, false);
        }
    });
</script>
@endpush

@endsection
