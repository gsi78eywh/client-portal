@extends('layouts.client')

@section('title', 'Records')

@section('header-title', 'Records')

@section('content')

<div class="records-container" style="max-width: 1200px; padding: 10px 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;">

    {{-- FLASH / SESSION FEEDBACK --}}
    @if(session('success'))
        <div class="records-alert-success" style="background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 13.5px; display: flex; align-items: center; justify-content: space-between;">
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

    <!-- TOP HEADER -->
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 24px;">
        <div>
            <div style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 6px;">
                BUSINESS • RECORDS
            </div>
            <h1 class="page-title" style="font-size: 26px; font-weight: 700; color: #0f172a; letter-spacing: -0.02em; margin: 0 0 6px 0; line-height: 1.2;">
                Records
            </h1>
            <p class="page-description" style="font-size: 13.5px; color: #64748b; margin: 0; max-width: 760px; line-height: 1.6">
                Centralized corporate records, document repository, classification, indexing, and compliance filing archives.
            </p>
        </div>

        <div style="display: flex; align-items: center; gap: 12px;">
            <span class="status-badge status-trial" style="background: #eff6ff; color: #2563eb; font-size: 12px; font-weight: 600; padding: 8px 16px; border-radius: 20px; display: inline-block;">
                Trial Access
            </span>
            <button id="btnTopUploadRecord" type="button" onclick="openRecordUploadModal()" class="btn btn-primary" style="background: #2563eb; color: #ffffff; border: none; border-radius: 8px; padding: 9px 20px; font-size: 13.5px; font-weight: 600; cursor: pointer; box-shadow: 0 1px 2px rgba(37, 99, 235, 0.2); display: flex; align-items: center; gap: 6px; transition: background 0.15s ease;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Upload Record
            </button>
        </div>
    </div>


    <!-- MODULE OVERVIEW & ACTIVITY TREND SECTION -->
    <div class="records-top-grid" style="display: grid; grid-template-columns: 1.6fr 1fr; gap: 16px; margin-bottom: 16px;">

        <!-- MODULE OVERVIEW -->
        <div class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
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
                <button type="button" onclick="openRecordUploadModal()" style="background: #f1f5f9; color: #334155; border: 1px solid #e2e8f0; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer; transition: background 0.15s ease;">
                    Quick upload
                </button>

                <a href="{{ route('settings.modules.records') }}" style="text-decoration: none; background: #ffffff; color: #334155; border: 1px solid #cbd5e1; border-radius: 8px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; transition: background 0.15s ease;">
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
        <div class="card activity-trend-card" style="background: #ffffff; border: 1px solid #dbe3ee; border-radius: 12px; padding: 20px 22px 18px 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); min-height: 180px; display: flex; flex-direction: column; justify-content: space-between;">
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


    <!-- METRICS / STATS CARDS GRID (FUNCTIONAL & CLICKABLE) -->
    <div class="dashboard-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px;">

        <!-- TOTAL RECORDS -->
        <div class="card kpi-card" onclick="filterRecordsTab('all')" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); cursor: pointer; transition: all 0.2s ease;">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 7.5A2.5 2.5 0 0 1 5.5 5H10l2 2h6.5A2.5 2.5 0 0 1 21 9.5v7A2.5 2.5 0 0 1 18.5 19h-13A2.5 2.5 0 0 1 3 16.5v-9z"></path>
                </svg>
            </div>
            <div id="statTotalRecords" class="card-value" style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                {{ $recordStats['total_records'] ?? '1,248' }}
            </div>
            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Total records
            </div>
            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Stored in ORDO
            </div>
        </div>

        <!-- RECENT RECORDS -->
        <div class="card kpi-card" onclick="filterRecentRecords()" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); cursor: pointer; transition: all 0.2s ease;">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="8.5"></circle>
                    <path d="M12 7v5l3 2"></path>
                </svg>
            </div>
            <div id="statRecentRecords" class="card-value" style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                {{ $recordStats['recent_records'] ?? '36' }}
            </div>
            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Recent records
            </div>
            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Last 30 days
            </div>
        </div>

        <!-- STORAGE USED -->
        <div class="card kpi-card" onclick="filterRecordsTab('all')" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); cursor: pointer; transition: all 0.2s ease;">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <ellipse cx="12" cy="5" rx="7.5" ry="3"></ellipse>
                    <path d="M4.5 5v6c0 1.66 3.36 3 7.5 3s7.5-1.34 7.5-3V5"></path>
                    <path d="M4.5 11v6c0 1.66 3.36 3 7.5 3s7.5-1.34 7.5-3v-6"></path>
                </svg>
            </div>
            <div id="statStorageUsed" class="card-value" style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                {{ $recordStats['storage_used'] ?? '320 MB' }}
            </div>
            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Storage used
            </div>
            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Of 500 MB available
            </div>
        </div>

        <!-- CLASSIFICATIONS -->
        <div class="card kpi-card" onclick="scrollToClassifications()" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); cursor: pointer; transition: all 0.2s ease;">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 13l-7 7-9-9V4h7l9 9z"></path>
                    <circle cx="7.5" cy="7.5" r="1"></circle>
                </svg>
            </div>
            <div id="statClassifications" class="card-value" style="font-size: 22px; font-weight: 800; color: #0f172a; line-height: 1.2; margin-bottom: 2px;">
                {{ $recordStats['classifications'] ?? '12' }}
            </div>
            <div class="card-label" style="font-size: 12px; font-weight: 600; color: #64748b; margin-bottom: 4px;">
                Classifications
            </div>
            <div class="card-description" style="font-size: 11px; color: #94a3b8;">
                Active categories
            </div>
        </div>

    </div>


    <!-- TABBED CONTENT CARD WITH DYNAMIC FILTERING & REAL-TIME SEARCH -->
    <div class="card" id="recordsSection" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 0; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">

        <!-- NAV TABS -->
        <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding: 0 24px; overflow-x: auto;">
            <div style="display: flex; gap: 24px; min-width: max-content;">
                <button type="button" class="records-tab-link active" data-tab="all" onclick="filterRecordsTab('all')" style="background: none; border: none; outline: none; cursor: pointer; text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 700; color: #2563eb; border-bottom: 2px solid #2563eb; transition: all 0.15s ease;">
                    All Records
                </button>
                <button type="button" class="records-tab-link" data-tab="Corporate Records" onclick="filterRecordsTab('Corporate Records')" style="background: none; border: none; outline: none; cursor: pointer; text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b; border-bottom: 2px solid transparent; transition: all 0.15s ease;">
                    Corporate
                </button>
                <button type="button" class="records-tab-link" data-tab="Governance" onclick="filterRecordsTab('Governance')" style="background: none; border: none; outline: none; cursor: pointer; text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b; border-bottom: 2px solid transparent; transition: all 0.15s ease;">
                    Governance
                </button>
                <button type="button" class="records-tab-link" data-tab="Compliance Records" onclick="filterRecordsTab('Compliance Records')" style="background: none; border: none; outline: none; cursor: pointer; text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b; border-bottom: 2px solid transparent; transition: all 0.15s ease;">
                    Compliance
                </button>
                <button type="button" class="records-tab-link" data-tab="Human Resources" onclick="filterRecordsTab('Human Resources')" style="background: none; border: none; outline: none; cursor: pointer; text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b; border-bottom: 2px solid transparent; transition: all 0.15s ease;">
                    Human Resources
                </button>
                <button type="button" class="records-tab-link" data-tab="Archived" onclick="filterRecordsTab('Archived')" style="background: none; border: none; outline: none; cursor: pointer; text-decoration: none; padding: 16px 0; font-size: 13.5px; font-weight: 600; color: #64748b; border-bottom: 2px solid transparent; transition: all 0.15s ease;">
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
                    <h2 id="recordsTableHeading" class="card-title" style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                        Recent Records
                    </h2>
                    <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
                        Recently uploaded, indexed, and cataloged client documents.
                    </p>
                </div>

                <div style="display: flex; align-items: center; gap: 10px;">
                    <!-- SEARCH INPUT -->
                    <div style="position: relative; width: 260px;">
                        <input type="text" id="recordsSearchInput" oninput="handleRecordsSearch()" placeholder="Search title, ID, classification..." style="width: 100%; box-sizing: border-box; background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 6px; padding: 7px 12px 7px 32px; font-size: 12.5px; color: #0f172a; outline: none; transition: border-color 0.15s ease;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); pointer-events: none;">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>

                    <button type="button" onclick="clearFilters()" style="background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 6px; padding: 7px 14px; font-size: 12.5px; font-weight: 600; color: #334155; cursor: pointer; display: flex; align-items: center; gap: 6px;">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                        </svg>
                        Filter
                    </button>
                </div>
            </div>


            <!-- TABLE CONTAINER -->
            <div class="table-wrapper" style="border: 1px solid #f1f5f9; border-radius: 8px; overflow-x: auto;">
                <table class="ordo-table" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13px;">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; color: #64748b; font-size: 11px; text-transform: uppercase; letter-spacing: 0.05em;">
                            <th style="padding: 12px 16px; font-weight: 700;">Record ID</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Document</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Classification</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Source</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Date Added</th>
                            <th style="padding: 12px 16px; font-weight: 700;">Status</th>
                            <th style="padding: 12px 16px; font-weight: 700; text-align: right;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="recordsTableBody" style="color: #334155;">
                        @forelse($documentRecords as $record)
                            @php
                                $recId = is_array($record) ? ($record['id'] ?? '') : ($record->id ?? '');
                                $recNo = is_array($record) ? ($record['record_no'] ?? '') : ($record->record_no ?? '');
                                $recTitle = is_array($record) ? ($record['title'] ?? '') : ($record->title ?? '');
                                $recClass = is_array($record) ? ($record['classification'] ?? '') : ($record->classification ?? '');
                                $recSubclass = is_array($record) ? ($record['subclass'] ?? '') : ($record->subclass ?? '');
                                $recSource = is_array($record) ? ($record['source'] ?? 'Internal') : ($record->source ?? 'Internal');
                                $recDocNum = is_array($record) ? ($record['document_number'] ?? '') : ($record->document_number ?? '');
                                $recDate = is_array($record) ? ($record['formatted_record_date'] ?? $record['record_date'] ?? '') : ($record->formatted_record_date ?? $record->record_date ?? '');
                                $rawDate = is_array($record) ? ($record['record_date'] ?? '') : ($record->record_date?->format('Y-m-d') ?? '');
                                $recStatus = is_array($record) ? ($record['status'] ?? 'Active') : ($record->status ?? 'Active');
                                $recOcrStatus = is_array($record) ? ($record['ocr_status'] ?? 'Indexed & Processed') : ($record->ocr_status ?? 'Indexed & Processed');
                                $recOcrSummary = is_array($record) ? ($record['ocr_summary'] ?? '') : ($record->ocr_summary ?? '');
                                $recDesc = is_array($record) ? ($record['description'] ?? '') : ($record->description ?? '');
                                $recTags = is_array($record) ? ($record['tags'] ?? []) : ($record->tags ?? []);
                                if (is_string($recTags)) {
                                    $recTags = json_decode($recTags, true) ?? [];
                                }
                                $recTagsStr = is_array($recTags) ? implode(', ', $recTags) : '';
                                $recFileName = is_array($record) ? ($record['file_name'] ?? 'document.pdf') : ($record->file_name ?? 'document.pdf');
                                $recFileSize = is_array($record) ? ($record['formatted_file_size'] ?? '') : ($record->formatted_file_size ?? '');
                                $recFileType = is_array($record) ? ($record['file_type'] ?? 'PDF') : ($record->file_type ?? 'PDF');
                            @endphp
                            <tr class="record-row"
                                id="record-row-{{ $recId }}"
                                data-id="{{ $recId }}"
                                data-record-no="{{ $recNo }}"
                                data-title="{{ $recTitle }}"
                                data-classification="{{ $recClass }}"
                                data-subclass="{{ $recSubclass }}"
                                data-source="{{ $recSource }}"
                                data-doc-num="{{ $recDocNum }}"
                                data-formatted-date="{{ $recDate }}"
                                data-raw-date="{{ $rawDate }}"
                                data-status="{{ $recStatus }}"
                                data-ocr-status="{{ $recOcrStatus }}"
                                data-ocr-summary="{{ $recOcrSummary }}"
                                data-description="{{ $recDesc }}"
                                data-tags="{{ $recTagsStr }}"
                                data-file-name="{{ $recFileName }}"
                                data-file-size="{{ $recFileSize }}"
                                data-file-type="{{ $recFileType }}"
                                style="border-bottom: 1px solid #f1f5f9; transition: background 0.15s ease;">

                                <td style="padding: 14px 16px; font-weight: 600; color: #0f172a; white-space: nowrap;">
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span style="color: #2563eb; font-size: 11px; background: #eff6ff; padding: 2px 6px; border-radius: 4px; font-weight: 700;">#</span>
                                        <span class="record-no-cell">{{ $recNo }}</span>
                                    </div>
                                </td>

                                <td style="padding: 14px 16px;">
                                    <div style="font-weight: 600; color: #0f172a; margin-bottom: 2px;" class="record-title-cell">
                                        {{ $recTitle }}
                                    </div>
                                    <div style="font-size: 11.5px; color: #64748b; display: flex; align-items: center; gap: 8px;">
                                        @if($recDocNum)
                                            <span>Doc: {{ $recDocNum }}</span>
                                            <span>&bull;</span>
                                        @endif
                                        <span style="background: #f1f5f9; padding: 1px 6px; border-radius: 4px; font-size: 10.5px; font-weight: 600; color: #475569;">
                                            {{ $recFileType }}
                                        </span>
                                        @if($recFileSize && $recFileSize !== '—')
                                            <span>{{ $recFileSize }}</span>
                                        @endif
                                    </div>
                                </td>

                                <td style="padding: 14px 16px; color: #64748b;">
                                    <div style="font-weight: 500; color: #334155;" class="record-classification-cell">
                                        {{ $recClass }}
                                    </div>
                                    @if($recSubclass)
                                        <div style="font-size: 11px; color: #94a3b8;">
                                            {{ $recSubclass }}
                                        </div>
                                    @endif
                                </td>

                                <td style="padding: 14px 16px; color: #64748b;" class="record-source-cell">
                                    {{ $recSource }}
                                </td>

                                <td style="padding: 14px 16px; color: #64748b; white-space: nowrap;" class="record-date-cell">
                                    {{ $recDate }}
                                </td>

                                <td style="padding: 14px 16px;">
                                    <div style="display: flex; flex-direction: column; gap: 4px; align-items: flex-start;">
                                        @if(strtolower($recStatus) === 'active')
                                            <span class="status-badge" style="background: #dcfce7; color: #15803d; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;">
                                                <span style="font-size: 9px;">●</span> Active
                                            </span>
                                        @elseif(strtolower($recStatus) === 'review')
                                            <span class="status-badge" style="background: #fef3c7; color: #b45309; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;">
                                                <span style="font-size: 9px;">●</span> Review
                                            </span>
                                        @else
                                            <span class="status-badge" style="background: #f1f5f9; color: #475569; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;">
                                                <span style="font-size: 9px;">●</span> {{ $recStatus }}
                                            </span>
                                        @endif

                                        <span style="font-size: 10px; color: #0284c7; background: #e0f2fe; padding: 1px 6px; border-radius: 4px; font-weight: 600; display: inline-flex; align-items: center; gap: 3px;">
                                            <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            OCR Indexed
                                        </span>
                                    </div>
                                </td>

                                <td style="padding: 14px 16px; text-align: right; white-space: nowrap;">
                                    <button type="button" class="records-view-btn" onclick="openRecordDetailModal(this.closest('.record-row'))" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 5px 14px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer; transition: all 0.15s ease;">
                                        View
                                    </button>
                                </td>

                            </tr>
                        @empty
                            <tr id="recordsEmptyStateRow">
                                <td colspan="7" style="padding: 36px 16px; text-align: center; color: #94a3b8;">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 8px;">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="9" y1="15" x2="15" y2="15"></line>
                                    </svg>
                                    <div style="font-size: 14px; font-weight: 600; color: #475569; margin-bottom: 4px;">No records found</div>
                                    <div style="font-size: 12.5px; color: #94a3b8;">Try adjusting your search criteria or upload a new record.</div>
                                </td>
                            </tr>
                        @endforelse

                        {{-- DYNAMIC CLIENT-SIDE EMPTY STATE (HIDDEN BY DEFAULT) --}}
                        <tr id="recordsFilterEmptyRow" style="display: none;">
                            <td colspan="7" style="padding: 36px 16px; text-align: center; color: #94a3b8;">
                                <div style="font-size: 14px; font-weight: 600; color: #475569; margin-bottom: 4px;">No matching records</div>
                                <div style="font-size: 12.5px; color: #94a3b8;">No records matched your search query or selected tab.</div>
                                <button type="button" onclick="clearFilters()" style="margin-top: 10px; background: #eff6ff; color: #2563eb; border: none; border-radius: 6px; padding: 6px 14px; font-size: 12px; font-weight: 600; cursor: pointer;">
                                    Reset Filters
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>


    <!-- RECORD CLASSIFICATIONS CARD (DYNAMIC BREAKDOWN & FILTER SHORTCUTS) -->
    <div id="classificationsCard" class="card" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); margin-top: 24px;">

        <div class="card-header" style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2 class="card-title" style="font-size: 16px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Record Classifications
                </h2>
                <p class="card-description" style="font-size: 13px; color: #64748b; margin: 0;">
                    Main categories used to organize account records. Click a category to view its records.
                </p>
            </div>
            <a href="{{ route('settings.modules.records') }}" style="font-size: 12px; font-weight: 600; color: #2563eb; text-decoration: none;">
                Manage Classifications &rarr;
            </a>
        </div>

        <div class="module-list" style="display: flex; flex-direction: column; gap: 12px;">

            <!-- CORPORATE RECORDS -->
            <div class="classification-item" onclick="filterRecordsTab('Corporate Records')" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px; cursor: pointer; transition: all 0.15s ease;">
                <div>
                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Corporate Records
                    </strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Articles, certificates, corporate documents, and governance records.
                    </p>
                </div>
                <strong id="countCorpRecords" style="font-size: 15px; font-weight: 700; color: #0f172a; padding: 4px 10px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px;">
                    {{ $recordStats['breakdown']['corporate'] ?? 286 }}
                </strong>
            </div>

            <!-- COMPLIANCE RECORDS -->
            <div class="classification-item" onclick="filterRecordsTab('Compliance Records')" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px; cursor: pointer; transition: all 0.15s ease;">
                <div>
                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Compliance Records
                    </strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Regulatory filings, permits, licenses, and supporting documents.
                    </p>
                </div>
                <strong id="countCompRecords" style="font-size: 15px; font-weight: 700; color: #0f172a; padding: 4px 10px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px;">
                    {{ $recordStats['breakdown']['compliance'] ?? 342 }}
                </strong>
            </div>

            <!-- FINANCE RECORDS -->
            <div class="classification-item" onclick="filterRecordsTab('Finance Records')" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px; cursor: pointer; transition: all 0.15s ease;">
                <div>
                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Finance Records
                    </strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Financial documents, invoices, receipts, and transaction records.
                    </p>
                </div>
                <strong id="countFinRecords" style="font-size: 15px; font-weight: 700; color: #0f172a; padding: 4px 10px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px;">
                    {{ $recordStats['breakdown']['finance'] ?? 318 }}
                </strong>
            </div>

            <!-- HUMAN RESOURCES -->
            <div class="classification-item" onclick="filterRecordsTab('Human Resources')" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px; cursor: pointer; transition: all 0.15s ease;">
                <div>
                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Human Resources
                    </strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Employee records, agreements, and HR documentation.
                    </p>
                </div>
                <strong id="countHrRecords" style="font-size: 15px; font-weight: 700; color: #0f172a; padding: 4px 10px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px;">
                    {{ $recordStats['breakdown']['hr'] ?? 194 }}
                </strong>
            </div>

            <!-- OTHER RECORDS -->
            <div class="classification-item" onclick="filterRecordsTab('Other')" style="display: flex; justify-content: space-between; align-items: center; padding: 16px; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 8px; cursor: pointer; transition: all 0.15s ease;">
                <div>
                    <strong style="font-size: 14px; font-weight: 700; color: #0f172a; display: block; margin-bottom: 2px;">
                        Other Records
                    </strong>
                    <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                        Other business, operational, and general corporate documents.
                    </p>
                </div>
                <strong id="countOtherRecords" style="font-size: 15px; font-weight: 700; color: #0f172a; padding: 4px 10px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 6px;">
                    {{ $recordStats['breakdown']['other'] ?? 108 }}
                </strong>
            </div>

        </div>

    </div>

</div>


{{-- =========================================================================
     MODAL 1: UPLOAD NEW RECORD MODAL (DEDICATED FORM WITH REQUIRED FIELDS *)
     ========================================================================= --}}
<div id="recordUploadModal" class="ordo-modal-overlay" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px); z-index: 9999; align-items: center; justify-content: center; padding: 20px;">
    <div class="ordo-modal-container" style="background: #ffffff; border-radius: 12px; width: 100%; max-width: 620px; max-height: 90vh; overflow-y: auto; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); border: 1px solid #e2e8f0;">

        <!-- MODAL HEADER -->
        <div style="padding: 20px 24px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <div style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 4px;">
                    RECORDS REPOSITORY
                </div>
                <h3 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Upload New Record
                </h3>
                <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                    Upload corporate files, contracts, or permits with automated OCR indexation.
                </p>
            </div>
            <button type="button" onclick="closeRecordUploadModal()" style="background: none; border: none; font-size: 20px; line-height: 1; color: #94a3b8; cursor: pointer; padding: 4px;">
                &times;
            </button>
        </div>

        <!-- MODAL FORM -->
        <form id="recordUploadForm" onsubmit="handleRecordUploadSubmit(event)" enctype="multipart/form-data" style="padding: 24px;">
            @csrf

            <!-- TITLE (REQUIRED *) -->
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Record / Document Title <span style="color: #dc2626;">*</span>
                </label>
                <input type="text" name="title" id="uploadTitle" required placeholder="e.g. Articles of Incorporation, SEC Registration Certificate" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
            </div>

            <!-- CLASSIFICATION & SUBCLASS -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Record Classification <span style="color: #dc2626;">*</span>
                    </label>
                    <select name="classification" id="uploadClassification" required style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; background: #ffffff;">
                        <option value="Corporate Records">Corporate Records</option>
                        <option value="Compliance Records">Compliance Records</option>
                        <option value="Finance Records">Finance Records</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Governance">Governance</option>
                        <option value="Legal">Legal</option>
                        <option value="Tax & Audit">Tax & Audit</option>
                        <option value="Other">Other Records</option>
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Record Subclass
                    </label>
                    <input type="text" name="subclass" id="uploadSubclass" placeholder="e.g. Charter, Board Resolution, Permit" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>
            </div>

            <!-- SOURCE & DOCUMENT NUMBER -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Source
                    </label>
                    <select name="source" id="uploadSource" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; background: #ffffff;">
                        <option value="Internal">Internal (Company)</option>
                        <option value="SEC">SEC (Securities and Exchange Commission)</option>
                        <option value="BIR">BIR (Bureau of Internal Revenue)</option>
                        <option value="LGU">LGU (Local Government Unit)</option>
                        <option value="DTI">DTI (Department of Trade and Industry)</option>
                        <option value="Legal Counsel">Legal Counsel</option>
                        <option value="External Auditor">External Auditor</option>
                        <option value="Bank">Partner Bank</option>
                        <option value="Client">Client / Counterparty</option>
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Record / Document Number
                    </label>
                    <input type="text" name="document_number" id="uploadDocNumber" placeholder="e.g. SEC-CS2026-08129, BR-2026-08" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>
            </div>

            <!-- DATE OF RECORD -->
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Date of Record
                </label>
                <input type="date" name="record_date" id="uploadRecordDate" value="{{ date('Y-m-d') }}" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
            </div>

            <!-- DESCRIPTION / NOTES -->
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Description / Notes
                </label>
                <textarea name="description" id="uploadDescription" rows="3" placeholder="Add specific notes, purpose, regulatory filing context, or record summary..." style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; resize: vertical;"></textarea>
            </div>

            <!-- TAGS -->
            <div style="margin-bottom: 18px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Tags
                </label>
                <input type="text" name="tags" id="uploadTags" placeholder="Comma-separated e.g. SEC, Charter, Board, 2026, Compliance" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
            </div>

            <!-- FILE UPLOAD (REQUIRED *) -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Upload File <span style="color: #dc2626;">*</span>
                </label>
                <div id="fileUploadDropzone" onclick="document.getElementById('uploadFileInput').click()" style="border: 2px dashed #cbd5e1; border-radius: 8px; padding: 22px; text-align: center; background: #f8fafc; cursor: pointer; transition: all 0.15s ease;">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom: 6px;">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="17 8 12 3 7 8"></polyline>
                        <line x1="12" y1="3" x2="12" y2="15"></line>
                    </svg>
                    <div style="font-size: 13px; font-weight: 600; color: #0f172a; margin-bottom: 2px;">
                        Click to select document or drag & drop
                    </div>
                    <div style="font-size: 11.5px; color: #64748b;">
                        PDF, DOCX, XLSX, PNG, JPG (up to 15 MB) &bull; Automatic OCR indexing enabled
                    </div>
                    <div id="selectedFileInfo" style="display: none; margin-top: 10px; background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 6px; padding: 6px 12px; font-size: 12px; font-weight: 600; color: #1e40af;">
                        Selected: <span id="selectedFileName"></span> (<span id="selectedFileSize"></span>)
                    </div>
                </div>
                <input type="file" name="file" id="uploadFileInput" required onchange="handleFileSelected(this)" style="display: none;">
            </div>

            <!-- CONFIGURATION NOTICE (Permanent config remains under Settings -> Module Settings -> Records) -->
            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 10px 14px; font-size: 12px; color: #64748b; margin-bottom: 20px; display: flex; align-items: flex-start; gap: 8px;">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-top: 2px; flex-shrink: 0;">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>
                <span>
                    Permanent records numbering series, OCR field extractions, index codes, and retention rules are managed under
                    <a href="{{ route('settings.modules.records') }}" target="_blank" style="color: #2563eb; font-weight: 600; text-decoration: none;">Settings &rarr; Module Settings &rarr; Records</a>.
                </span>
            </div>

            <!-- MODAL ACTIONS -->
            <div style="display: flex; justify-content: flex-end; gap: 10px; border-top: 1px solid #e2e8f0; padding-top: 16px;">
                <button type="button" onclick="closeRecordUploadModal()" style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; border-radius: 6px; padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Cancel
                </button>
                <button type="submit" id="btnSubmitUploadRecord" style="background: #2563eb; color: #ffffff; border: none; border-radius: 6px; padding: 9px 20px; font-size: 13px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; box-shadow: 0 1px 2px rgba(37, 99, 235, 0.2);">
                    <span id="uploadSpinner" style="display: none; width: 13px; height: 13px; border: 2px solid #ffffff; border-top-color: transparent; border-radius: 50%; animation: spin 0.8s linear infinite;"></span>
                    <span id="uploadBtnText">Upload Record</span>
                </button>
            </div>
        </form>

    </div>
</div>


{{-- =========================================================================
     MODAL 2: VIEW RECORD DETAIL MODAL (COMPLETE RECORD DETAILS + EDIT ACTION)
     ========================================================================= --}}
<div id="recordDetailModal" class="ordo-modal-overlay" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px); z-index: 9999; align-items: center; justify-content: center; padding: 20px;">
    <div class="ordo-modal-container" style="background: #ffffff; border-radius: 12px; width: 100%; max-width: 640px; max-height: 90vh; overflow-y: auto; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0;">

        <!-- DETAIL HEADER -->
        <div style="padding: 20px 24px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                    <span id="detailRecordNo" style="font-size: 12px; font-weight: 800; color: #2563eb; background: #eff6ff; padding: 2px 8px; border-radius: 4px;">
                        REC-2026-1248
                    </span>
                    <span id="detailStatusBadge" class="status-badge" style="font-size: 11.5px; font-weight: 600; padding: 2px 8px; border-radius: 10px;">
                        ● Active
                    </span>
                    <span id="detailOcrBadge" style="font-size: 11px; font-weight: 600; color: #0284c7; background: #e0f2fe; padding: 2px 8px; border-radius: 4px; display: inline-flex; align-items: center; gap: 3px;">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Indexed & Processed
                    </span>
                </div>
                <h3 id="detailTitle" style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 2px 0;">
                    Articles of Incorporation
                </h3>
            </div>
            <button type="button" onclick="closeRecordDetailModal()" style="background: none; border: none; font-size: 20px; line-height: 1; color: #94a3b8; cursor: pointer; padding: 4px;">
                &times;
            </button>
        </div>

        <!-- DETAIL BODY -->
        <div style="padding: 24px;">

            <!-- METADATA GRID -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 18px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 14px 16px;">
                <div>
                    <div style="font-size: 11px; color: #64748b; text-transform: uppercase; font-weight: 700; margin-bottom: 2px;">Classification</div>
                    <div id="detailClassification" style="font-size: 13.5px; font-weight: 600; color: #0f172a;">Corporate Records</div>
                </div>

                <div>
                    <div style="font-size: 11px; color: #64748b; text-transform: uppercase; font-weight: 700; margin-bottom: 2px;">Subclass</div>
                    <div id="detailSubclass" style="font-size: 13.5px; font-weight: 600; color: #0f172a;">Charter & Articles</div>
                </div>

                <div>
                    <div style="font-size: 11px; color: #64748b; text-transform: uppercase; font-weight: 700; margin-bottom: 2px;">Source</div>
                    <div id="detailSource" style="font-size: 13.5px; font-weight: 600; color: #0f172a;">SEC</div>
                </div>

                <div>
                    <div style="font-size: 11px; color: #64748b; text-transform: uppercase; font-weight: 700; margin-bottom: 2px;">Document Number</div>
                    <div id="detailDocNumber" style="font-size: 13.5px; font-weight: 600; color: #0f172a;">SEC-CS2026-08129</div>
                </div>

                <div>
                    <div style="font-size: 11px; color: #64748b; text-transform: uppercase; font-weight: 700; margin-bottom: 2px;">Date of Record</div>
                    <div id="detailRecordDate" style="font-size: 13.5px; font-weight: 600; color: #0f172a;">August 18, 2026</div>
                </div>

                <div>
                    <div style="font-size: 11px; color: #64748b; text-transform: uppercase; font-weight: 700; margin-bottom: 2px;">File Size & Format</div>
                    <div id="detailFileMeta" style="font-size: 13.5px; font-weight: 600; color: #0f172a;">PDF &bull; 2.4 MB</div>
                </div>
            </div>

            <!-- ASSOCIATED FILE CARD -->
            <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px 16px; margin-bottom: 18px; display: flex; align-items: center; justify-content: space-between;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="width: 36px; height: 36px; border-radius: 6px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                        </svg>
                    </div>
                    <div>
                        <div id="detailFileName" style="font-size: 13px; font-weight: 700; color: #0f172a;">
                            Articles_of_Incorporation_Signed.pdf
                        </div>
                        <div style="font-size: 11.5px; color: #64748b;">
                            Stored in ORDO Secure Repository &bull; File remains associated
                        </div>
                    </div>
                </div>
                <button type="button" onclick="simulateFileDownload()" style="background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 6px; padding: 6px 12px; font-size: 12px; font-weight: 600; color: #2563eb; cursor: pointer; display: inline-flex; align-items: center; gap: 5px;">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" y1="15" x2="12" y2="3"></line>
                    </svg>
                    Download
                </button>
            </div>

            <!-- OCR / EXTRACTION SUMMARY -->
            <div style="background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 8px; padding: 12px 16px; margin-bottom: 18px;">
                <div style="font-size: 11.5px; font-weight: 700; color: #166534; margin-bottom: 3px; display: flex; align-items: center; gap: 5px;">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    OCR & Full-Text Search Status
                </div>
                <div id="detailOcrSummary" style="font-size: 12.5px; color: #14532d; line-height: 1.5;">
                    Text indexation completed. Document is fully searchable across ORDO.
                </div>
            </div>

            <!-- DESCRIPTION / NOTES -->
            <div style="margin-bottom: 18px;">
                <div style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 4px;">
                    Description / Notes
                </div>
                <div id="detailDescription" style="font-size: 13px; color: #475569; background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 6px; padding: 10px 12px; line-height: 1.5;">
                    —
                </div>
            </div>

            <!-- TAGS -->
            <div>
                <div style="font-size: 12px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Tags
                </div>
                <div id="detailTagsContainer" style="display: flex; flex-wrap: wrap; gap: 6px;">
                    <span style="font-size: 11px; background: #eff6ff; color: #2563eb; padding: 3px 8px; border-radius: 4px; font-weight: 600;">SEC</span>
                </div>
            </div>

        </div>

        <!-- DETAIL FOOTER (EDIT ACTION PROVIDED, NO HARD DELETE FOR V1) -->
        <div style="padding: 16px 24px; border-top: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
            <div style="font-size: 11px; color: #94a3b8;">
                V1 Archive Policy &bull; Immutable Audit Trail
            </div>

            <div style="display: flex; gap: 10px;">
                <button type="button" onclick="closeRecordDetailModal()" style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; border-radius: 6px; padding: 8px 16px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Close
                </button>
                <button type="button" id="btnEditRecordFromDetail" onclick="openRecordEditModalFromDetail()" style="background: #2563eb; color: #ffffff; border: none; border-radius: 6px; padding: 8px 18px; font-size: 13px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    Edit Record
                </button>
            </div>
        </div>

    </div>
</div>


{{-- =========================================================================
     MODAL 3: EDIT RECORD METADATA MODAL (NO HARD DELETE)
     ========================================================================= --}}
<div id="recordEditModal" class="ordo-modal-overlay" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px); z-index: 10000; align-items: center; justify-content: center; padding: 20px;">
    <div class="ordo-modal-container" style="background: #ffffff; border-radius: 12px; width: 100%; max-width: 620px; max-height: 90vh; overflow-y: auto; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); border: 1px solid #e2e8f0;">

        <!-- EDIT HEADER -->
        <div style="padding: 20px 24px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <div style="font-size: 11px; font-weight: 800; color: #2563eb; letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 4px;">
                    RECORD METADATA &bull; <span id="editRecordNoBadge">REC-2026-1248</span>
                </div>
                <h3 style="font-size: 18px; font-weight: 700; color: #0f172a; margin: 0 0 4px 0;">
                    Edit Record Details
                </h3>
                <p style="font-size: 12.5px; color: #64748b; margin: 0;">
                    Update record classification, document number, status, or notes.
                </p>
            </div>
            <button type="button" onclick="closeRecordEditModal()" style="background: none; border: none; font-size: 20px; line-height: 1; color: #94a3b8; cursor: pointer; padding: 4px;">
                &times;
            </button>
        </div>

        <!-- EDIT FORM -->
        <form id="recordEditForm" onsubmit="handleRecordEditSubmit(event)" enctype="multipart/form-data" style="padding: 24px;">
            @csrf
            <input type="hidden" id="editRecordId" name="record_id" value="">

            <!-- TITLE (REQUIRED *) -->
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Record / Document Title <span style="color: #dc2626;">*</span>
                </label>
                <input type="text" name="title" id="editTitle" required style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
            </div>

            <!-- CLASSIFICATION & SUBCLASS -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Record Classification <span style="color: #dc2626;">*</span>
                    </label>
                    <select name="classification" id="editClassification" required style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; background: #ffffff;">
                        <option value="Corporate Records">Corporate Records</option>
                        <option value="Compliance Records">Compliance Records</option>
                        <option value="Finance Records">Finance Records</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Governance">Governance</option>
                        <option value="Legal">Legal</option>
                        <option value="Tax & Audit">Tax & Audit</option>
                        <option value="Other">Other Records</option>
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Record Subclass
                    </label>
                    <input type="text" name="subclass" id="editSubclass" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>
            </div>

            <!-- SOURCE & DOCUMENT NUMBER -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Source
                    </label>
                    <select name="source" id="editSource" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; background: #ffffff;">
                        <option value="Internal">Internal (Company)</option>
                        <option value="SEC">SEC (Securities and Exchange Commission)</option>
                        <option value="BIR">BIR (Bureau of Internal Revenue)</option>
                        <option value="LGU">LGU (Local Government Unit)</option>
                        <option value="DTI">DTI (Department of Trade and Industry)</option>
                        <option value="Legal Counsel">Legal Counsel</option>
                        <option value="External Auditor">External Auditor</option>
                        <option value="Bank">Partner Bank</option>
                        <option value="Client">Client / Counterparty</option>
                    </select>
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Record / Document Number
                    </label>
                    <input type="text" name="document_number" id="editDocNumber" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>
            </div>

            <!-- DATE OF RECORD & STATUS -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Date of Record
                    </label>
                    <input type="date" name="record_date" id="editRecordDate" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
                </div>

                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                        Status <span style="color: #dc2626;">*</span>
                    </label>
                    <select name="status" id="editStatus" required style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; background: #ffffff;">
                        <option value="Active">Active</option>
                        <option value="Review">Under Review</option>
                        <option value="Archived">Archived</option>
                    </select>
                </div>
            </div>

            <!-- DESCRIPTION / NOTES -->
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Description / Notes
                </label>
                <textarea name="description" id="editDescription" rows="3" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none; resize: vertical;"></textarea>
            </div>

            <!-- TAGS -->
            <div style="margin-bottom: 18px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Tags
                </label>
                <input type="text" name="tags" id="editTags" placeholder="Comma-separated tags" style="width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 13px; color: #0f172a; outline: none;">
            </div>

            <!-- OPTIONAL FILE REPLACEMENT -->
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 12.5px; font-weight: 700; color: #334155; margin-bottom: 6px;">
                    Replace File (Optional)
                </label>
                <div style="font-size: 11.5px; color: #64748b; margin-bottom: 6px;">
                    Current file: <span id="editCurrentFileName" style="font-weight: 600; color: #0f172a;"></span>
                </div>
                <input type="file" name="file" id="editFileInput" style="font-size: 12.5px; color: #475569;">
            </div>

            <!-- MODAL ACTIONS -->
            <div style="display: flex; justify-content: flex-end; gap: 10px; border-top: 1px solid #e2e8f0; padding-top: 16px;">
                <button type="button" onclick="closeRecordEditModal()" style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; border-radius: 6px; padding: 9px 18px; font-size: 13px; font-weight: 600; cursor: pointer;">
                    Cancel
                </button>
                <button type="submit" id="btnSubmitEditRecord" style="background: #2563eb; color: #ffffff; border: none; border-radius: 6px; padding: 9px 20px; font-size: 13px; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                    <span id="editSpinner" style="display: none; width: 13px; height: 13px; border: 2px solid #ffffff; border-top-color: transparent; border-radius: 50%; animation: spin 0.8s linear infinite;"></span>
                    <span id="editBtnText">Update Record</span>
                </button>
            </div>
        </form>

    </div>
</div>


{{-- =========================================================================
     FLOATING TOAST NOTIFICATION
     ========================================================================= --}}
<div id="recordsToast" style="display: none; position: fixed; bottom: 24px; right: 24px; z-index: 10001; background: #0f172a; color: #ffffff; border-radius: 8px; padding: 12px 18px; font-size: 13px; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2); align-items: center; gap: 10px; transition: all 0.3s ease;">
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round">
        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
        <polyline points="22 4 12 14.01 9 11.01"></polyline>
    </svg>
    <span id="recordsToastMessage">Record updated successfully</span>
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
.kpi-card:hover {
    border-color: #93c5fd !important;
    transform: translateY(-1px);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05) !important;
}
.classification-item:hover {
    background: #f1f5f9 !important;
    border-color: #cbd5e1 !important;
}
.record-row:hover {
    background: #f8fafc;
}
.records-tab-link:hover {
    color: #2563eb !important;
}
</style>

@push('scripts')
<script>
    // Global active state for records module
    let activeRecordTab = 'all';
    let currentDetailRecordData = null;

    // Toast notification
    function showRecordsToast(msg) {
        const toast = document.getElementById('recordsToast');
        const text = document.getElementById('recordsToastMessage');
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
    function openRecordUploadModal() {
        const modal = document.getElementById('recordUploadModal');
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            setTimeout(() => document.getElementById('uploadTitle')?.focus(), 50);
        }
    }

    function closeRecordUploadModal() {
        const modal = document.getElementById('recordUploadModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    }

    function openRecordDetailModal(rowElement) {
        if (!rowElement) return;

        currentDetailRecordData = {
            id: rowElement.getAttribute('data-id'),
            record_no: rowElement.getAttribute('data-record-no'),
            title: rowElement.getAttribute('data-title'),
            classification: rowElement.getAttribute('data-classification'),
            subclass: rowElement.getAttribute('data-subclass'),
            source: rowElement.getAttribute('data-source'),
            document_number: rowElement.getAttribute('data-doc-num'),
            record_date: rowElement.getAttribute('data-formatted-date'),
            raw_date: rowElement.getAttribute('data-raw-date'),
            status: rowElement.getAttribute('data-status'),
            ocr_status: rowElement.getAttribute('data-ocr-status'),
            ocr_summary: rowElement.getAttribute('data-ocr-summary'),
            description: rowElement.getAttribute('data-description'),
            tags: rowElement.getAttribute('data-tags'),
            file_name: rowElement.getAttribute('data-file-name'),
            file_size: rowElement.getAttribute('data-file-size'),
            file_type: rowElement.getAttribute('data-file-type'),
        };

        // Populate detail modal elements
        document.getElementById('detailRecordNo').textContent = currentDetailRecordData.record_no || 'REC-2026';
        document.getElementById('detailTitle').textContent = currentDetailRecordData.title;
        document.getElementById('detailClassification').textContent = currentDetailRecordData.classification || 'Corporate Records';
        document.getElementById('detailSubclass').textContent = currentDetailRecordData.subclass || '—';
        document.getElementById('detailSource').textContent = currentDetailRecordData.source || 'Internal';
        document.getElementById('detailDocNumber').textContent = currentDetailRecordData.document_number || '—';
        document.getElementById('detailRecordDate').textContent = currentDetailRecordData.record_date || '—';
        document.getElementById('detailFileName').textContent = currentDetailRecordData.file_name || 'document.pdf';
        document.getElementById('detailFileMeta').textContent = (currentDetailRecordData.file_type || 'PDF') + ' • ' + (currentDetailRecordData.file_size || '—');

        // Status badge
        const statusBadge = document.getElementById('detailStatusBadge');
        statusBadge.textContent = '● ' + (currentDetailRecordData.status || 'Active');
        if ((currentDetailRecordData.status || '').toLowerCase() === 'active') {
            statusBadge.style.background = '#dcfce7';
            statusBadge.style.color = '#15803d';
        } else if ((currentDetailRecordData.status || '').toLowerCase() === 'review') {
            statusBadge.style.background = '#fef3c7';
            statusBadge.style.color = '#b45309';
        } else {
            statusBadge.style.background = '#f1f5f9';
            statusBadge.style.color = '#475569';
        }

        // OCR summary
        document.getElementById('detailOcrSummary').textContent = currentDetailRecordData.ocr_summary || 'Text indexation completed. Document is fully searchable across ORDO.';

        // Description
        document.getElementById('detailDescription').textContent = currentDetailRecordData.description || 'No description notes provided for this record.';

        // Tags
        const tagsBox = document.getElementById('detailTagsContainer');
        tagsBox.innerHTML = '';
        const tagsList = (currentDetailRecordData.tags || '').split(',').map(t => t.trim()).filter(Boolean);
        if (tagsList.length === 0) {
            tagsBox.innerHTML = '<span style="font-size: 11.5px; color: #94a3b8;">No tags attached</span>';
        } else {
            tagsList.forEach(tag => {
                const badge = document.createElement('span');
                badge.style.fontSize = '11px';
                badge.style.background = '#eff6ff';
                badge.style.color = '#2563eb';
                badge.style.padding = '3px 8px';
                badge.style.borderRadius = '4px';
                badge.style.fontWeight = '600';
                badge.textContent = tag;
                tagsBox.appendChild(badge);
            });
        }

        const modal = document.getElementById('recordDetailModal');
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }

    function closeRecordDetailModal() {
        const modal = document.getElementById('recordDetailModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    }

    function openRecordEditModalFromDetail() {
        if (!currentDetailRecordData) return;
        closeRecordDetailModal();

        // Populate edit modal fields
        document.getElementById('editRecordId').value = currentDetailRecordData.id;
        document.getElementById('editRecordNoBadge').textContent = currentDetailRecordData.record_no;
        document.getElementById('editTitle').value = currentDetailRecordData.title;
        document.getElementById('editClassification').value = currentDetailRecordData.classification;
        document.getElementById('editSubclass').value = currentDetailRecordData.subclass || '';
        document.getElementById('editSource').value = currentDetailRecordData.source || 'Internal';
        document.getElementById('editDocNumber').value = currentDetailRecordData.document_number || '';
        document.getElementById('editRecordDate').value = currentDetailRecordData.raw_date || '';
        document.getElementById('editStatus').value = currentDetailRecordData.status || 'Active';
        document.getElementById('editDescription').value = currentDetailRecordData.description || '';
        document.getElementById('editTags').value = currentDetailRecordData.tags || '';
        document.getElementById('editCurrentFileName').textContent = currentDetailRecordData.file_name || 'None';

        const editModal = document.getElementById('recordEditModal');
        if (editModal) {
            editModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
    }

    function closeRecordEditModal() {
        const modal = document.getElementById('recordEditModal');
        if (modal) {
            modal.style.display = 'none';
            document.body.style.overflow = '';
        }
    }

    // File selected event handler
    function handleFileSelected(input) {
        const file = input.files[0];
        if (!file) return;
        const info = document.getElementById('selectedFileInfo');
        const nameEl = document.getElementById('selectedFileName');
        const sizeEl = document.getElementById('selectedFileSize');
        if (info && nameEl && sizeEl) {
            nameEl.textContent = file.name;
            const sizeMb = (file.size / 1048576).toFixed(1);
            sizeEl.textContent = sizeMb >= 1 ? `${sizeMb} MB` : `${Math.round(file.size / 1024)} KB`;
            info.style.display = 'block';
        }
    }

    // Handle AJAX Record Upload Submit
    async function handleRecordUploadSubmit(e) {
        e.preventDefault();
        const form = document.getElementById('recordUploadForm');
        const submitBtn = document.getElementById('btnSubmitUploadRecord');
        const spinner = document.getElementById('uploadSpinner');
        const btnText = document.getElementById('uploadBtnText');

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        submitBtn.disabled = true;
        spinner.style.display = 'inline-block';
        btnText.textContent = 'Uploading & Indexing...';

        const formData = new FormData(form);

        try {
            const response = await fetch("{{ route('records.store') }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            if (response.ok && data.success) {
                // Success: close modal, reset form
                closeRecordUploadModal();
                form.reset();
                document.getElementById('selectedFileInfo').style.display = 'none';

                // Prepend new record to table
                if (data.record) {
                    prependRecordToTable(data.record);
                }

                // Update metrics counters
                if (data.stats) {
                    updateRecordStatsUi(data.stats);
                }

                showRecordsToast(data.message || 'Record successfully uploaded and indexed.');
            } else {
                alert(data.message || 'Validation error while uploading record. Please check required fields.');
            }
        } catch (err) {
            console.error(err);
            // If network or JSON error, submit standard form
            form.submit();
        } finally {
            submitBtn.disabled = false;
            spinner.style.display = 'none';
            btnText.textContent = 'Upload Record';
        }
    }

    // Handle AJAX Record Edit Submit
    async function handleRecordEditSubmit(e) {
        e.preventDefault();
        const form = document.getElementById('recordEditForm');
        const submitBtn = document.getElementById('btnSubmitEditRecord');
        const spinner = document.getElementById('editSpinner');
        const btnText = document.getElementById('editBtnText');
        const recordId = document.getElementById('editRecordId').value;

        if (!recordId) return;

        submitBtn.disabled = true;
        spinner.style.display = 'inline-block';
        btnText.textContent = 'Updating...';

        const formData = new FormData(form);

        try {
            const response = await fetch(`/records/${recordId}`, {
                method: 'POST', // With Laravel method spoofing or direct post
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            if (response.ok && data.success) {
                closeRecordEditModal();

                // Update row in table
                if (data.record) {
                    updateRecordInTable(data.record);
                }

                // Update metrics counters
                if (data.stats) {
                    updateRecordStatsUi(data.stats);
                }

                showRecordsToast(data.message || 'Record metadata updated successfully.');
            } else {
                alert(data.message || 'Validation error while updating record.');
            }
        } catch (err) {
            console.error(err);
            form.submit();
        } finally {
            submitBtn.disabled = false;
            spinner.style.display = 'none';
            btnText.textContent = 'Update Record';
        }
    }

    // Helper to prepend new row to table
    function prependRecordToTable(rec) {
        const tbody = document.getElementById('recordsTableBody');
        const emptyRow = document.getElementById('recordsEmptyStateRow');
        if (emptyRow) emptyRow.remove();

        const tagsStr = Array.isArray(rec.tags) ? rec.tags.join(', ') : (rec.tags || '');
        const statusBadge = (rec.status || 'Active').toLowerCase() === 'active'
            ? `<span class="status-badge" style="background: #dcfce7; color: #15803d; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;"><span style="font-size: 9px;">●</span> Active</span>`
            : `<span class="status-badge" style="background: #fef3c7; color: #b45309; font-size: 11.5px; font-weight: 600; padding: 3px 9px; border-radius: 12px; display: inline-flex; align-items: center; gap: 5px;"><span style="font-size: 9px;">●</span> ${escapeHtml(rec.status)}</span>`;

        const tr = document.createElement('tr');
        tr.className = 'record-row';
        tr.id = `record-row-${rec.id}`;
        tr.setAttribute('data-id', rec.id);
        tr.setAttribute('data-record-no', rec.record_no || '');
        tr.setAttribute('data-title', rec.title || '');
        tr.setAttribute('data-classification', rec.classification || '');
        tr.setAttribute('data-subclass', rec.subclass || '');
        tr.setAttribute('data-source', rec.source || 'Internal');
        tr.setAttribute('data-doc-num', rec.document_number || '');
        tr.setAttribute('data-formatted-date', rec.formatted_record_date || rec.record_date || '');
        tr.setAttribute('data-raw-date', rec.record_date || '');
        tr.setAttribute('data-status', rec.status || 'Active');
        tr.setAttribute('data-ocr-status', rec.ocr_status || 'Indexed & Processed');
        tr.setAttribute('data-ocr-summary', rec.ocr_summary || '');
        tr.setAttribute('data-description', rec.description || '');
        tr.setAttribute('data-tags', tagsStr);
        tr.setAttribute('data-file-name', rec.file_name || 'document.pdf');
        tr.setAttribute('data-file-size', rec.formatted_file_size || '');
        tr.setAttribute('data-file-type', rec.file_type || 'PDF');
        tr.style.borderBottom = '1px solid #f1f5f9';
        tr.style.background = '#eff6ff';
        tr.style.transition = 'background 0.5s ease';

        tr.innerHTML = `
            <td style="padding: 14px 16px; font-weight: 600; color: #0f172a; white-space: nowrap;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <span style="color: #2563eb; font-size: 11px; background: #eff6ff; padding: 2px 6px; border-radius: 4px; font-weight: 700;">#</span>
                    <span class="record-no-cell">${escapeHtml(rec.record_no || '')}</span>
                </div>
            </td>
            <td style="padding: 14px 16px;">
                <div style="font-weight: 600; color: #0f172a; margin-bottom: 2px;" class="record-title-cell">
                    ${escapeHtml(rec.title)}
                </div>
                <div style="font-size: 11.5px; color: #64748b; display: flex; align-items: center; gap: 8px;">
                    ${rec.document_number ? `<span>Doc: ${escapeHtml(rec.document_number)}</span><span>&bull;</span>` : ''}
                    <span style="background: #f1f5f9; padding: 1px 6px; border-radius: 4px; font-size: 10.5px; font-weight: 600; color: #475569;">
                        ${escapeHtml(rec.file_type || 'PDF')}
                    </span>
                    ${rec.formatted_file_size ? `<span>${escapeHtml(rec.formatted_file_size)}</span>` : ''}
                </div>
            </td>
            <td style="padding: 14px 16px; color: #64748b;">
                <div style="font-weight: 500; color: #334155;" class="record-classification-cell">
                    ${escapeHtml(rec.classification || '')}
                </div>
                ${rec.subclass ? `<div style="font-size: 11px; color: #94a3b8;">${escapeHtml(rec.subclass)}</div>` : ''}
            </td>
            <td style="padding: 14px 16px; color: #64748b;" class="record-source-cell">
                ${escapeHtml(rec.source || 'Internal')}
            </td>
            <td style="padding: 14px 16px; color: #64748b; white-space: nowrap;" class="record-date-cell">
                ${escapeHtml(rec.formatted_record_date || rec.record_date || '')}
            </td>
            <td style="padding: 14px 16px;">
                <div style="display: flex; flex-direction: column; gap: 4px; align-items: flex-start;">
                    ${statusBadge}
                    <span style="font-size: 10px; color: #0284c7; background: #e0f2fe; padding: 1px 6px; border-radius: 4px; font-weight: 600; display: inline-flex; align-items: center; gap: 3px;">
                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        OCR Indexed
                    </span>
                </div>
            </td>
            <td style="padding: 14px 16px; text-align: right; white-space: nowrap;">
                <button type="button" class="records-view-btn" onclick="openRecordDetailModal(this.closest('.record-row'))" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 5px 14px; font-size: 12px; font-weight: 600; color: #334155; cursor: pointer; transition: all 0.15s ease;">
                    View
                </button>
            </td>
        `;

        tbody.insertBefore(tr, tbody.firstChild);

        setTimeout(() => {
            tr.style.background = '#ffffff';
        }, 1500);
    }

    // Helper to update row in table
    function updateRecordInTable(rec) {
        const row = document.getElementById(`record-row-${rec.id}`);
        if (!row) return;

        const tagsStr = Array.isArray(rec.tags) ? rec.tags.join(', ') : (rec.tags || '');
        row.setAttribute('data-title', rec.title || '');
        row.setAttribute('data-classification', rec.classification || '');
        row.setAttribute('data-subclass', rec.subclass || '');
        row.setAttribute('data-source', rec.source || 'Internal');
        row.setAttribute('data-doc-num', rec.document_number || '');
        row.setAttribute('data-status', rec.status || 'Active');
        row.setAttribute('data-description', rec.description || '');
        row.setAttribute('data-tags', tagsStr);
        if (rec.formatted_record_date) {
            row.setAttribute('data-formatted-date', rec.formatted_record_date);
        }

        const titleCell = row.querySelector('.record-title-cell');
        if (titleCell) titleCell.textContent = rec.title;

        const classCell = row.querySelector('.record-classification-cell');
        if (classCell) classCell.textContent = rec.classification;

        const sourceCell = row.querySelector('.record-source-cell');
        if (sourceCell) sourceCell.textContent = rec.source || 'Internal';

        row.style.background = '#f0fdf4';
        setTimeout(() => { row.style.background = '#ffffff'; }, 1500);
    }

    // Helper to update dynamic counters with pulse
    function updateRecordStatsUi(stats) {
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

        if (stats.total_records) triggerPulse(document.getElementById('statTotalRecords'), stats.total_records);
        if (stats.recent_records) triggerPulse(document.getElementById('statRecentRecords'), stats.recent_records);
        if (stats.storage_used) triggerPulse(document.getElementById('statStorageUsed'), stats.storage_used);
        if (stats.classifications) triggerPulse(document.getElementById('statClassifications'), stats.classifications);

        if (stats.breakdown) {
            if (stats.breakdown.corporate) triggerPulse(document.getElementById('countCorpRecords'), stats.breakdown.corporate);
            if (stats.breakdown.compliance) triggerPulse(document.getElementById('countCompRecords'), stats.breakdown.compliance);
            if (stats.breakdown.finance) triggerPulse(document.getElementById('countFinRecords'), stats.breakdown.finance);
            if (stats.breakdown.hr) triggerPulse(document.getElementById('countHrRecords'), stats.breakdown.hr);
            if (stats.breakdown.other) triggerPulse(document.getElementById('countOtherRecords'), stats.breakdown.other);
        }
    }

    // Tabs filter
    function filterRecordsTab(tabName) {
        activeRecordTab = tabName;

        // Update active tab buttons
        document.querySelectorAll('.records-tab-link').forEach(btn => {
            if (btn.getAttribute('data-tab') === tabName) {
                btn.style.color = '#2563eb';
                btn.style.fontWeight = '700';
                btn.style.borderBottom = '2px solid #2563eb';
            } else {
                btn.style.color = '#64748b';
                btn.style.fontWeight = '600';
                btn.style.borderBottom = '2px solid transparent';
            }
        });

        const heading = document.getElementById('recordsTableHeading');
        if (heading) {
            heading.textContent = tabName === 'all' ? 'Recent Records' : `${tabName} Records`;
        }

        applyRecordsFilters();
    }

    // Recent records click filter
    function filterRecentRecords() {
        filterRecordsTab('all');
        const heading = document.getElementById('recordsTableHeading');
        if (heading) heading.textContent = 'Recent Records (Last 30 Days)';
        const section = document.getElementById('recordsSection');
        if (section) section.scrollIntoView({ behavior: 'smooth' });
    }

    function scrollToClassifications() {
        const card = document.getElementById('classificationsCard');
        if (card) card.scrollIntoView({ behavior: 'smooth' });
    }

    // Search input handler
    function handleRecordsSearch() {
        applyRecordsFilters();
    }

    function clearFilters() {
        const input = document.getElementById('recordsSearchInput');
        if (input) input.value = '';
        filterRecordsTab('all');
    }

    // Master filter apply
    function applyRecordsFilters() {
        const query = (document.getElementById('recordsSearchInput')?.value || '').toLowerCase().trim();
        const rows = document.querySelectorAll('#recordsTableBody .record-row');
        let visibleCount = 0;

        rows.forEach(row => {
            const title = (row.getAttribute('data-title') || '').toLowerCase();
            const recordNo = (row.getAttribute('data-record-no') || '').toLowerCase();
            const classification = (row.getAttribute('data-classification') || '').toLowerCase();
            const subclass = (row.getAttribute('data-subclass') || '').toLowerCase();
            const source = (row.getAttribute('data-source') || '').toLowerCase();
            const tags = (row.getAttribute('data-tags') || '').toLowerCase();
            const status = (row.getAttribute('data-status') || '').toLowerCase();

            // Tab match
            let matchesTab = true;
            if (activeRecordTab !== 'all') {
                if (activeRecordTab.toLowerCase() === 'archived') {
                    matchesTab = status.includes('archive') || status.includes('inactive');
                } else {
                    matchesTab = classification.includes(activeRecordTab.toLowerCase()) || subclass.includes(activeRecordTab.toLowerCase());
                }
            }

            // Search query match
            let matchesQuery = true;
            if (query) {
                matchesQuery = title.includes(query) ||
                    recordNo.includes(query) ||
                    classification.includes(query) ||
                    subclass.includes(query) ||
                    source.includes(query) ||
                    tags.includes(query);
            }

            if (matchesTab && matchesQuery) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        const filterEmptyRow = document.getElementById('recordsFilterEmptyRow');
        if (filterEmptyRow) {
            filterEmptyRow.style.display = visibleCount === 0 ? '' : 'none';
        }
    }

    function simulateFileDownload() {
        showRecordsToast('Downloading document file from secure storage...');
    }

    function escapeHtml(str) {
        if (!str) return '';
        const div = document.createElement('div');
        div.textContent = str;
        return div.innerHTML;
    }

    // Modal background click to close
    document.addEventListener('DOMContentLoaded', () => {
        ['recordUploadModal', 'recordDetailModal', 'recordEditModal'].forEach(id => {
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
    });
</script>
@endpush

@endsection