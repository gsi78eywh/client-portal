@extends('layouts.client')

@section('title', 'Town Hall - ORDO Commercial Client Portal')

@section('content')
@php
    $firstName = 'John';
    $fullName = 'Client';
    if (auth()->check()) {
        $userObj = auth()->user();
        $nameParts = explode(' ', $userObj->name);
        $firstName = $nameParts[0] ?? 'Client';
        $fullName = $userObj->name;
    }
    $hour = (int) now()->format('H');
    $greeting = match (true) {
        $hour < 12 => 'Good morning',
        $hour < 17 => 'Good afternoon',
        default => 'Good evening',
    };
    $accountName = $account?->profile?->legal_name ?? $account?->name ?? session('client.account.name', 'Your Workspace');
    $rawAccountType = $account?->account_type ?? session('client.account.type', 'business');
    $profileAccountType = $account?->profile?->account_type;

    $pivot = (auth()->check() && $account) ? auth()->user()->accounts->firstWhere('id', $account->id)?->pivot : null;
    $relationship = $pivot?->relationship ?? session('client.account.relationship', 'Owner');
    $isAdministrator = $pivot ? (bool)$pivot->is_administrator : (bool)session('client.account.is_administrator', true);

    $isPersonal = ($rawAccountType === 'personal' || $profileAccountType === 'Individual');
    $isProfession = ($rawAccountType === 'profession' || $profileAccountType === 'Professional / Practitioner');
    $isInvited = ($rawAccountType === 'invited');

    $displayAccountType = match(true) {
        $isPersonal => 'Individual',
        $isProfession => 'Professional / Practitioner',
        $isInvited => 'Joined Account',
        default => ($profileAccountType ?? 'Corporation'),
    };

    $entitlementService = app(\App\Services\EntitlementService::class);
    $bannerData = $lifecycle ?? $entitlementService->getLifecycleData($account);
    $progressData = $progress ?? (auth()->check() ? $entitlementService->getSetupProgress(auth()->user(), $account) : [
        'percentage' => 50,
        'steps' => [
            'account_created' => ['completed' => true],
            'contact_confirmed' => ['completed' => true],
            'account_profile' => ['completed' => false],
            'account_verification' => ['completed' => false],
        ],
        'current_action' => ['label' => 'Complete Account Profile', 'route' => 'settings.account-profile']
    ]);
    $steps = $progressData['steps'] ?? [];
    $completedCount = 0;
    foreach ($steps as $st) {
        if (!empty($st['completed'])) {
            $completedCount++;
        }
    }
    $percentage = $progressData['percentage'] ?? ($completedCount * 25);
    $modulesList = $modules ?? $entitlementService->getAllModules($account);

    $isVerifCompleted = (bool) ($steps['account_verification']['completed'] ?? false);
    $isProfileCompleted = (bool) ($steps['account_profile']['completed'] ?? false);
    $actionCount = 1 + ($isVerifCompleted ? 0 : 1) + ($isProfileCompleted ? 0 : 1);

    $moduleIcons = [
        'entity-governance' => '<path d="M4 21V5l8-3 8 3v16"></path><path d="M8 8h2M14 8h2M8 12h2M14 12h2M8 16h2M14 16h2"></path><path d="M2 21h20"></path>',
        'compliance' => '<circle cx="12" cy="12" r="9"></circle><path d="M8 12l2.6 2.6L16.5 9"></path>',
        'finance' => '<path d="M3 7h16a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"></path><path d="M3 7l2-3h12l2 3"></path><path d="M16 12h5"></path>',
        'human-capital' => '<path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"></path>',
        'records' => '<path d="M3 6h6l2 2h10v11a2 2 0 01-2 2H5a2 2 0 01-2-2V6z"></path>',
        'transmittals' => '<path d="M22 2L11 13"></path><path d="M22 2l-7 20-4-9-9-4 20-7z"></path>',
    ];
@endphp

{{-- PAGE HEADER WITH ADAPTIVE ACCOUNT CONTEXT --}}
<div class="page-head">
    <div class="page-title">
        <div class="kicker">
            Town Hall &bull; {{ $accountName }} &bull; Type: {{ $displayAccountType }}
            @if($isInvited)
                &bull; Relationship: {{ $relationship }} &bull; Administrator: {{ $isAdministrator ? 'Yes' : 'No' }}
            @elseif(!empty($relationship))
                &bull; Role: {{ $relationship }}
            @endif
        </div>
        @if($isPersonal)
            <h1>{{ $greeting }}, {{ $fullName }}.</h1>
            <p>Here is what needs your attention across your personal ORDO workspace for <strong>{{ $accountName }}</strong>.</p>
        @else
            <h1>{{ $greeting }}, {{ $firstName }}.</h1>
            <p>Here is what needs your attention across your ORDO workspace for <strong>{{ $accountName }}</strong> ({{ $displayAccountType }}).</p>
        @endif
    </div>
    <div class="page-actions">
        <a href="{{ route('settings.account-profile') }}" class="btn ghost">Complete account</a>
    </div>
</div>

{{-- TRIAL / LIFECYCLE ACCESS BANNER --}}
<section class="trial-banner">
    <div>
        <div class="kicker" style="color:#70a7ff">{{ $accountName }} &bull; YOUR ORDO ACCESS</div>
        <h2>{{ $bannerData['title'] }}</h2>
        <p>{{ $bannerData['subtitle'] }}</p>
        <div class="flex gap8 wrap" style="margin-top:14px">
            <span class="badge" style="background:rgba(255,255,255,.10);color:white">{{ $bannerData['badge'] }}</span>
            <span class="badge" style="background:rgba(255,255,255,.10);color:white">{{ $bannerData['verified_badge'] }}</span>
        </div>
    </div>
    <div class="trial-meta">
        @if(!empty($bannerData['show_countdown']))
            <div class="days">
                <div>
                    <b>{{ $bannerData['days_count'] }}</b><br>
                    <span>{{ $bannerData['days_label'] }}</span>
                </div>
            </div>
        @else
            <div class="days" style="min-width:110px;">
                <div>
                    <b style="font-size:18px;">{{ $bannerData['badge'] }}</b><br>
                    <span>{{ $bannerData['days_label'] }}</span>
                </div>
            </div>
        @endif
        <a href="{{ route($bannerData['cta_route']) }}" class="btn primary">{{ $bannerData['cta_label'] }}</a>
    </div>
</section>

{{-- SETUP PROGRESS & ACTION CENTER --}}
<div class="grid-2" style="margin-bottom:18px">
    {{-- SETUP CARD --}}
    <div class="card setup-card">
        <div class="setup-head">
            <div>
                <div class="kicker">ACCOUNT SETUP</div>
                <h3 style="margin:3px 0 2px">{{ $completedCount }} of 4 steps complete</h3>
                <div class="small muted">
                    @if($completedCount === 4)
                        All setup steps completed. Your workspace is fully verified!
                    @else
                        Complete your profile and verification within 30 days.
                    @endif
                </div>
            </div>
            @if($completedCount < 4)
                <a href="{{ route($progressData['current_action']['route'] ?? 'settings.verification') }}" class="btn secondary sm">{{ $progressData['current_action']['label'] ?? 'Continue setup' }}</a>
            @else
                <span class="badge green">Complete</span>
            @endif
        </div>
        <div class="progress">
            <span style="width:{{ $percentage }}%"></span>
        </div>
        <div class="setup-steps">
            <div class="setup-step {{ ($steps['account_created']['completed'] ?? true) ? 'done' : '' }}">
                <div class="stepnum">{{ ($steps['account_created']['completed'] ?? true) ? '✓' : '1' }}</div>
                <b>Account created</b>
                <span>Completed</span>
            </div>
            <div class="setup-step {{ ($steps['contact_confirmed']['completed'] ?? true) ? 'done' : '' }}">
                <div class="stepnum">{{ ($steps['contact_confirmed']['completed'] ?? true) ? '✓' : '2' }}</div>
                <b>Contact confirmed</b>
                <span>Completed</span>
            </div>
            <a href="{{ route('settings.account-profile') }}" class="setup-step {{ ($steps['account_profile']['completed'] ?? false) ? 'done' : '' }}" style="text-decoration:none;color:inherit;">
                <div class="stepnum">{{ ($steps['account_profile']['completed'] ?? false) ? '✓' : '3' }}</div>
                <b>Account Profile</b>
                <span>{{ ($steps['account_profile']['completed'] ?? false) ? 'Completed' : 'Incomplete' }}</span>
            </a>
            <a href="{{ route('settings.verification') }}" class="setup-step {{ ($steps['account_verification']['completed'] ?? false) ? 'done' : '' }}" style="text-decoration:none;color:inherit;">
                <div class="stepnum">{{ ($steps['account_verification']['completed'] ?? false) ? '✓' : '4' }}</div>
                <b>Verification</b>
                <span>{{ ($steps['account_verification']['completed'] ?? false) ? 'Verified' : 'Not submitted' }}</span>
            </a>
        </div>
    </div>

    {{-- ACTION CENTER --}}
    <div class="card pad">
        <div class="title-row">
            <div>
                <div class="kicker">ACTION CENTER</div>
                <h3>Needs your attention</h3>
            </div>
            <span class="badge {{ $actionCount > 0 ? 'amber' : 'green' }}">{{ $actionCount }} {{ Str::plural('item', $actionCount) }}</span>
        </div>
        <div class="action-list">
            @if(!$isVerifCompleted)
                <a href="{{ route('settings.verification') }}" class="action-item" style="text-decoration:none; color:inherit;">
                    <div class="action-icon">
                        <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            <path d="M9 12l2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="action-main">
                        <b>Complete Account Verification</b>
                        <span>Required within your 30-day access period</span>
                    </div>
                    <span class="priority high">High</span>
                </a>
            @endif

            @if(!$isProfileCompleted)
                <div class="action-item" style="cursor:pointer;" onclick="window.location='{{ route('settings.account-profile') }}'">
                    <div class="action-icon">
                        <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 2h8l4 4v16H6z"></path>
                            <path d="M14 2v5h5"></path>
                        </svg>
                    </div>
                    <div class="action-main">
                        <b>Upload BIR registration document</b>
                        <span>Requested for Account Profile</span>
                    </div>
                    <span class="priority med">Due soon</span>
                </div>
            @endif

            <a href="{{ route('compliance') }}" class="action-item" style="text-decoration:none; color:inherit;">
                <div class="action-icon">
                    <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M8 12l2.6 2.6L16.5 9"></path>
                    </svg>
                </div>
                <div class="action-main">
                    <b>Review August compliance deadlines</b>
                    <span>2 obligations due within 7 days</span>
                </div>
                <span class="priority med">Due soon</span>
            </a>

            @if($isVerifCompleted && $isProfileCompleted)
                <div class="action-item" style="background:#f8fafc; border:1px dashed #cbd5e1;">
                    <div class="action-icon" style="background:#dcfce7; color:#16a34a;">
                        <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 6L9 17l-5-5"></path>
                        </svg>
                    </div>
                    <div class="action-main">
                        <b>Account verified and up to date</b>
                        <span>No urgent administrative actions required</span>
                    </div>
                    <span class="badge green">Verified</span>
                </div>
            @endif
        </div>
    </div>
</div>

{{-- 4 STAT CARDS --}}
<div class="grid-4" style="margin-bottom:18px">
    {{-- COMPLIANCE --}}
    <div class="card stat-card">
        <div class="stat-icon">
            <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="9"></circle>
                <path d="M8 12l2.6 2.6L16.5 9"></path>
            </svg>
        </div>
        <div class="stat-value">2</div>
        <div class="stat-label">Compliance · due soon</div>
        <div class="stat-foot">14 active obligations</div>
    </div>

    {{-- FINANCE --}}
    <div class="card stat-card">
        <div class="stat-icon">
            <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 7h16a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"></path>
                <path d="M3 7l2-3h12l2 3"></path>
                <path d="M16 12h5"></path>
            </svg>
        </div>
        <div class="stat-value">₱225K</div>
        <div class="stat-label">Finance · receivables</div>
        <div class="stat-foot">₱65K due this week</div>
    </div>

    {{-- HUMAN CAPITAL --}}
    <div class="card stat-card">
        <div class="stat-icon">
            <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"></path>
            </svg>
        </div>
        <div class="stat-value">18</div>
        <div class="stat-label">Human Capital · people</div>
        <div class="stat-foot">2 currently on leave</div>
    </div>

    {{-- RECORDS --}}
    <div class="card stat-card">
        <div class="stat-icon">
            <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 6h6l2 2h10v11a2 2 0 01-2 2H5a2 2 0 01-2-2V6z"></path>
            </svg>
        </div>
        <div class="stat-value">45</div>
        <div class="stat-label">Records · records</div>
        <div class="stat-foot">220 MB storage used</div>
    </div>
</div>

{{-- MODULES & ANNOUNCEMENTS --}}
<div class="grid-2" style="margin-bottom:18px">
    {{-- MODULES --}}
    <div class="card pad">
        <div class="title-row">
            <div>
                <div class="kicker">BUSINESS</div>
                <h3>Your modules</h3>
            </div>
            <a href="{{ route('jkc.subscriptions') }}" class="btn ghost sm">Manage modules</a>
        </div>
        <div class="module-grid townhall-module-grid">
            @foreach($modulesList as $key => $m)
                @php
                    $isAcc = !empty($m['is_accessible']);
                    $statusText = $m['access_label'] ?? ucfirst($m['status'] ?? 'trial');
                    $badgeStyle = match($m['status'] ?? 'trial') {
                        'trial' => 'color:#2563eb;',
                        'free' => 'color:#16a34a;',
                        'limited' => 'color:#d97706;',
                        'active' => 'color:#059669;',
                        default => 'color:#94a3b8;',
                    };
                @endphp

                @if($isAcc)
                    <a href="{{ route($key) }}" class="module-card">
                        <div class="module-top">
                            <div class="module-ico">
                                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    {!! $moduleIcons[$key] ?? '' !!}
                                </svg>
                            </div>
                            <div style="flex:1;">
                                <h4>{{ $m['name'] }}</h4>
                                <p>{{ $m['description'] }}</p>
                            </div>
                        </div>
                        <div class="module-stats">
                            <div><b>{{ $m['kpi'] }}</b>Overview</div>
                            <div><b>{{ $m['kpi_sub'] }}</b>Status</div>
                            <div><b style="{{ $badgeStyle }}">{{ $statusText }}</b>Access</div>
                        </div>
                    </a>
                @else
                    <div class="module-card locked" onclick="showLockedModule('{{ $key }}')">
                        <div class="lock-overlay">
                            <svg class="ico" viewBox="0 0 24 24" style="width:14px;height:14px;color:#94a3b8;" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0110 0v4"></path>
                            </svg>
                        </div>
                        <div class="module-top">
                            <div class="module-ico" style="background:#f1f5f9;border-color:#e2e8f0;color:#94a3b8;">
                                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    {!! $moduleIcons[$key] ?? '' !!}
                                </svg>
                            </div>
                            <div style="flex:1;">
                                <div style="display:flex;align-items:center;gap:6px;">
                                    <h4 style="color:#64748b;">{{ $m['name'] }}</h4>
                                    <span style="font-size:9px;background:#e2e8f0;color:#64748b;padding:1px 5px;border-radius:4px;font-weight:700;">LOCKED</span>
                                </div>
                                <p>{{ $m['description'] }}</p>
                            </div>
                        </div>
                        <div class="module-stats">
                            <div><b>{{ $m['kpi'] }}</b>Overview</div>
                            <div><b>{{ $m['kpi_sub'] }}</b>Status</div>
                            <div><b style="color:#ef4444;">🔒 Locked</b>Access</div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    {{-- ANNOUNCEMENTS --}}
    <div class="card pad">
        <div class="title-row">
            <div>
                <div class="kicker">JK&amp;C</div>
                <h3>Announcements</h3>
            </div>
            <a href="{{ route('jkc.announcements') }}" class="btn ghost sm">View all</a>
        </div>
        <div style="display:grid; gap:10px;">
            <div class="announcement featured">
                <div class="ann-meta">
                    <span class="badge blue">Advisory</span>
                    <span class="tiny muted">Aug 19, 2026</span>
                </div>
                <h4>Complete your ORDO Account Profile</h4>
                <p>Your 30-day access is active. Complete verification to maintain eligible access and unlock your verification benefit.</p>
                <div>
                    <a href="{{ route('settings.verification') }}" class="btn secondary sm">Continue setup</a>
                </div>
            </div>

            <div class="announcement">
                <div class="ann-meta">
                    <span class="badge purple">Regulatory Update</span>
                    <span class="tiny muted">Aug 18, 2026</span>
                </div>
                <h4>August compliance and filing reminders</h4>
                <p>Review upcoming client deadlines and filing requirements monitored through ORDO.</p>
            </div>

            <div class="announcement">
                <div class="ann-meta">
                    <span class="badge amber">Memo</span>
                    <span class="tiny muted">Aug 5, 2026</span>
                </div>
                <h4>August 2026 Holiday Advisory</h4>
                <p>Office schedule and service availability for the August holidays.</p>
            </div>
        </div>
    </div>
</div>

{{-- UPCOMING & RECENT ACTIVITY --}}
<div class="grid-2">
    {{-- UPCOMING --}}
    <div class="card pad">
        <div class="title-row">
            <h3>Upcoming</h3>
            <button type="button" class="btn ghost sm">This month</button>
        </div>
        <div class="action-item" style="margin-bottom:8px">
            <div class="action-icon date-badge">Aug 21</div>
            <div class="action-main"><b>BIR filing deadline</b><span>Compliance</span></div>
            <span class="badge red">High</span>
        </div>
        <div class="action-item" style="margin-bottom:8px">
            <div class="action-icon date-badge">Aug 24</div>
            <div class="action-main"><b>Board meeting</b><span>Entity &amp; Governance</span></div>
            <span class="badge blue">Scheduled</span>
        </div>
        <div class="action-item" style="margin-bottom:8px">
            <div class="action-icon date-badge">Aug 27</div>
            <div class="action-main"><b>Invoice INV-2026-00125</b><span>Billing</span></div>
            <span class="badge amber">₱15,000</span>
        </div>
        <div class="action-item" style="margin-bottom:8px">
            <div class="action-icon date-badge">Sep 18</div>
            <div class="action-main"><b>30-day access ends</b><span>Subscription</span></div>
            <span class="badge purple">Review modules</span>
        </div>
    </div>

    {{-- RECENT ACTIVITY --}}
    <div class="card pad">
        <div class="title-row">
            <h3>Recent activity</h3>
            <a href="{{ route('jkc.activity-reports') }}" class="btn ghost sm">View activity</a>
        </div>
        <div class="action-item" style="border:0; border-bottom:1px solid var(--line); border-radius:0; padding:10px 0;">
            <div class="action-icon">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 6h6l2 2h10v11a2 2 0 01-2 2H5a2 2 0 01-2-2V6z"></path>
                </svg>
            </div>
            <div class="action-main">
                <b>Record uploaded</b>
                <span>SEC Certificate of Registration</span>
            </div>
            <span class="tiny muted">10:42 AM</span>
        </div>

        <div class="action-item" style="border:0; border-bottom:1px solid var(--line); border-radius:0; padding:10px 0;">
            <div class="action-icon">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M8 12l2.6 2.6L16.5 9"></path>
                </svg>
            </div>
            <div class="action-main">
                <b>Compliance updated</b>
                <span>BIR Form 1601-C marked Completed</span>
            </div>
            <span class="tiny muted">Yesterday</span>
        </div>

        <div class="action-item" style="border:0; border-bottom:1px solid var(--line); border-radius:0; padding:10px 0;">
            <div class="action-icon">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 12h4l2-6 4 12 2-6h6"></path>
                </svg>
            </div>
            <div class="action-main">
                <b>JK&amp;C activity logged</b>
                <span>SEC follow-up and coordination</span>
            </div>
            <span class="tiny muted">Aug 17</span>
        </div>

        <div class="action-item" style="border:0; padding:10px 0;">
            <div class="action-icon">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 2L11 13"></path>
                    <path d="M22 2l-7 20-4-9-9-4 20-7z"></path>
                </svg>
            </div>
            <div class="action-main">
                <b>Transmittal acknowledged</b>
                <span>TRN-00084 received</span>
            </div>
            <span class="tiny muted">Aug 16</span>
        </div>
    </div>
</div>
@endsection
