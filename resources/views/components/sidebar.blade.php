@php
    $currentUser = auth()->user();
    $userName = $currentUser?->name ?? 'John Abalde';
    $parts = explode(' ', $userName);
    $initials = count($parts) > 1 ? strtoupper(substr($parts[0], 0, 1) . substr(end($parts), 0, 1)) : strtoupper(substr($userName, 0, 2));
    $userRole = 'Account Administrator';

    $entitlement = app(\App\Services\EntitlementService::class);
    $currentAccount = $currentUser?->currentAccount();
    $moduleStatuses = [
        'entity-governance' => $entitlement->getModuleStatus('entity-governance', $currentAccount),
        'compliance' => $entitlement->getModuleStatus('compliance', $currentAccount),
        'finance' => $entitlement->getModuleStatus('finance', $currentAccount),
        'human-capital' => $entitlement->getModuleStatus('human-capital', $currentAccount),
        'records' => $entitlement->getModuleStatus('records', $currentAccount),
        'transmittals' => $entitlement->getModuleStatus('transmittals', $currentAccount),
    ];
    $formatStatusTag = function($status) {
        return match($status) {
            'trial' => '30d',
            'free' => 'Free',
            'limited' => 'Limited',
            'active' => 'Active',
            default => '🔒',
        };
    };
@endphp

<aside class="sidebar" id="sidebar">
    <div class="side-head">
        <a href="{{ route('town-hall') }}" style="display:flex;align-items:center;gap:11px;text-decoration:none;color:inherit;">
            <div class="side-logo" aria-hidden="true" style="display:grid;place-items:center;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 20V4l16 16V4"/>
                </svg>
            </div>
            <div class="side-logo-text">
                <b>NXT</b>
                <span>by JK &amp; C</span>
            </div>
        </a>
    </div>

    <div class="side-scroll">
        {{-- TOWN HALL --}}
        <a href="{{ route('town-hall') }}" class="nav-item {{ request()->routeIs('town-hall') ? 'active' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 11.5L12 4l9 7.5"></path>
                    <path d="M5.5 10.5V20h13v-9.5"></path>
                    <path d="M9.5 20v-6h5v6"></path>
                </svg>
            </span>
            <span class="nav-label">Town Hall</span>
        </a>

        {{-- BUSINESS SECTION --}}
        <div class="nav-section">BUSINESS</div>

        <a href="{{ $moduleStatuses['entity-governance'] !== 'locked' ? route('entity-governance') : 'javascript:void(0)' }}"
           @if($moduleStatuses['entity-governance'] === 'locked') onclick="showLockedModule('entity-governance')" @endif
           class="nav-item business-nav {{ request()->routeIs('entity-governance') ? 'active' : '' }} {{ $moduleStatuses['entity-governance'] === 'locked' ? 'locked-nav' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 21V5l8-3 8 3v16"></path>
                    <path d="M8 8h2M14 8h2M8 12h2M14 12h2M8 16h2M14 16h2"></path>
                    <path d="M2 21h20"></path>
                </svg>
            </span>
            <span class="nav-label">Entity &amp; Governance</span>
            <span class="count module-state {{ $moduleStatuses['entity-governance'] === 'locked' ? 'locked-state' : '' }} {{ $moduleStatuses['entity-governance'] === 'free' ? 'free-state' : '' }} {{ $moduleStatuses['entity-governance'] === 'active' ? 'active-state' : '' }}">{{ $formatStatusTag($moduleStatuses['entity-governance']) }}</span>
        </a>

        <a href="{{ $moduleStatuses['compliance'] !== 'locked' ? route('compliance') : 'javascript:void(0)' }}"
           @if($moduleStatuses['compliance'] === 'locked') onclick="showLockedModule('compliance')" @endif
           class="nav-item business-nav {{ request()->routeIs('compliance') ? 'active' : '' }} {{ $moduleStatuses['compliance'] === 'locked' ? 'locked-nav' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M8 12l2.6 2.6L16.5 9"></path>
                </svg>
            </span>
            <span class="nav-label">Compliance</span>
            <span class="count module-state {{ $moduleStatuses['compliance'] === 'locked' ? 'locked-state' : '' }} {{ $moduleStatuses['compliance'] === 'free' ? 'free-state' : '' }} {{ $moduleStatuses['compliance'] === 'active' ? 'active-state' : '' }}">{{ $formatStatusTag($moduleStatuses['compliance']) }}</span>
        </a>

        <a href="{{ $moduleStatuses['finance'] !== 'locked' ? route('finance') : 'javascript:void(0)' }}"
           @if($moduleStatuses['finance'] === 'locked') onclick="showLockedModule('finance')" @endif
           class="nav-item business-nav {{ request()->routeIs('finance') ? 'active' : '' }} {{ $moduleStatuses['finance'] === 'locked' ? 'locked-nav' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 7h16a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"></path>
                    <path d="M3 7l2-3h12l2 3"></path>
                    <path d="M16 12h5"></path>
                </svg>
            </span>
            <span class="nav-label">Finance</span>
            <span class="count module-state {{ $moduleStatuses['finance'] === 'locked' ? 'locked-state' : '' }} {{ $moduleStatuses['finance'] === 'free' ? 'free-state' : '' }} {{ $moduleStatuses['finance'] === 'active' ? 'active-state' : '' }}">{{ $formatStatusTag($moduleStatuses['finance']) }}</span>
        </a>

        <a href="{{ $moduleStatuses['human-capital'] !== 'locked' ? route('human-capital') : 'javascript:void(0)' }}"
           @if($moduleStatuses['human-capital'] === 'locked') onclick="showLockedModule('human-capital')" @endif
           class="nav-item business-nav {{ request()->routeIs('human-capital') ? 'active' : '' }} {{ $moduleStatuses['human-capital'] === 'locked' ? 'locked-nav' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"></path>
                </svg>
            </span>
            <span class="nav-label">Human Capital</span>
            <span class="count module-state {{ $moduleStatuses['human-capital'] === 'locked' ? 'locked-state' : '' }} {{ $moduleStatuses['human-capital'] === 'free' ? 'free-state' : '' }} {{ $moduleStatuses['human-capital'] === 'active' ? 'active-state' : '' }}">{{ $formatStatusTag($moduleStatuses['human-capital']) }}</span>
        </a>

        <a href="{{ $moduleStatuses['records'] !== 'locked' ? route('records') : 'javascript:void(0)' }}"
           @if($moduleStatuses['records'] === 'locked') onclick="showLockedModule('records')" @endif
           class="nav-item business-nav {{ request()->routeIs('records') ? 'active' : '' }} {{ $moduleStatuses['records'] === 'locked' ? 'locked-nav' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 6h6l2 2h10v11a2 2 0 01-2 2H5a2 2 0 01-2-2V6z"></path>
                </svg>
            </span>
            <span class="nav-label">Records</span>
            <span class="count module-state {{ $moduleStatuses['records'] === 'locked' ? 'locked-state' : '' }} {{ $moduleStatuses['records'] === 'free' ? 'free-state' : '' }} {{ $moduleStatuses['records'] === 'active' ? 'active-state' : '' }}">{{ $formatStatusTag($moduleStatuses['records']) }}</span>
        </a>

        <a href="{{ $moduleStatuses['transmittals'] !== 'locked' ? route('transmittals') : 'javascript:void(0)' }}"
           @if($moduleStatuses['transmittals'] === 'locked') onclick="showLockedModule('transmittals')" @endif
           class="nav-item business-nav {{ request()->routeIs('transmittals') ? 'active' : '' }} {{ $moduleStatuses['transmittals'] === 'locked' ? 'locked-nav' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 2L11 13"></path>
                    <path d="M22 2l-7 20-4-9-9-4 20-7z"></path>
                </svg>
            </span>
            <span class="nav-label">Transmittals</span>
            <span class="count module-state {{ $moduleStatuses['transmittals'] === 'locked' ? 'locked-state' : '' }} {{ $moduleStatuses['transmittals'] === 'free' ? 'free-state' : '' }} {{ $moduleStatuses['transmittals'] === 'active' ? 'active-state' : '' }}">{{ $formatStatusTag($moduleStatuses['transmittals']) }}</span>
        </a>

        {{-- JK&C SECTION --}}
        <div class="nav-section">JK&amp;C</div>

        <a href="{{ route('jkc.announcements') }}" class="nav-item {{ request()->routeIs('jkc.announcements') ? 'active' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 11v2a2 2 0 002 2h2l9 4V5L7 9H5a2 2 0 00-2 2z"></path>
                    <path d="M7 15l1.5 5"></path>
                    <path d="M19 8a4 4 0 010 8"></path>
                </svg>
            </span>
            <span class="nav-label">Announcements</span>
            <span class="count">4</span>
        </a>

        <a href="{{ route('jkc.engagements') }}" class="nav-item {{ request()->routeIs('jkc.engagements') ? 'active' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="7" width="18" height="13" rx="2"></rect>
                    <path d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2M3 12h18"></path>
                </svg>
            </span>
            <span class="nav-label">Engagements</span>
        </a>

        <a href="{{ route('jkc.subscriptions') }}" class="nav-item {{ request()->routeIs('jkc.subscriptions') ? 'active' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2l9 5-9 5-9-5 9-5z"></path>
                    <path d="M3 12l9 5 9-5"></path>
                    <path d="M3 17l9 5 9-5"></path>
                </svg>
            </span>
            <span class="nav-label">Subscriptions</span>
        </a>

        <a href="{{ route('jkc.support') }}" class="nav-item {{ request()->routeIs('jkc.support') ? 'active' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="9"></circle>
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M5.6 5.6l4.3 4.3M14.1 14.1l4.3 4.3M18.4 5.6l-4.3 4.3M9.9 14.1l-4.3 4.3"></path>
                </svg>
            </span>
            <span class="nav-label">Support</span>
            <span class="count">2</span>
        </a>

        <a href="{{ route('jkc.activity-reports') }}" class="nav-item {{ request()->routeIs('jkc.activity-reports') ? 'active' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 12h4l2-6 4 12 2-6h6"></path>
                </svg>
            </span>
            <span class="nav-label">Activity &amp; Reports</span>
        </a>

        <a href="{{ route('jkc.billing') }}" class="nav-item {{ request()->routeIs('jkc.billing') ? 'active' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 2h12v20l-3-2-3 2-3-2-3 2V2z"></path>
                    <path d="M9 7h6M9 11h6M9 15h4"></path>
                </svg>
            </span>
            <span class="nav-label">Billing</span>
        </a>
    </div>

    {{-- BOTTOM AREA --}}
    <div class="side-bottom">
        <a href="{{ route('settings') }}" class="nav-item {{ request()->is('settings*') ? 'active' : '' }}">
            <span class="nav-ico">
                <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path d="M19.4 15a1.7 1.7 0 00.3 1.9l.1.1-2.8 2.8-.1-.1a1.7 1.7 0 00-1.9-.3 1.7 1.7 0 00-1 1.6V21h-4v-.1a1.7 1.7 0 00-1-1.6 1.7 1.7 0 00-1.9.3l-.1.1L4.2 17l.1-.1a1.7 1.7 0 00.3-1.9A1.7 1.7 0 003 14H3v-4h.1a1.7 1.7 0 001.6-1 1.7 1.7 0 00-.3-1.9l-.1-.1L7 4.2l.1.1a1.7 1.7 0 001.9.3 1.7 1.7 0 001-1.6V3h4v.1a1.7 1.7 0 001 1.6 1.7 1.7 0 001.9-.3l.1-.1L19.8 7l-.1.1a1.7 1.7 0 00-.3 1.9 1.7 1.7 0 001.6 1H21v4h-.1a1.7 1.7 0 00-1.5 1z"></path>
                </svg>
            </span>
            <span class="nav-label">Settings</span>
        </a>

        <div class="userbox">
            <div class="avatar" id="sidebarAvatar">{{ $initials }}</div>
            <div style="min-width:0;flex:1">
                <b id="sidebarUser" style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">{{ $userName }}</b>
                <span>{{ $userRole }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="display:inline; margin:0;">
                @csrf
                <button type="submit" title="Sign out" style="background:none; border:0; padding:0; color:var(--muted); font-size:11px; cursor:pointer;" aria-label="Sign out">
                    •••
                </button>
            </form>
        </div>
    </div>
</aside>
