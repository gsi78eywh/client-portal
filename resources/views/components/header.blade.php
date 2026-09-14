@php
    $currentUser = auth()->user();
    $currentAccount = $currentUser?->currentAccount();
    $profile = $currentUser?->profile;
    $initials = 'JA';
    if ($currentUser) {
        $parts = explode(' ', $currentUser->name);
        $initials = count($parts) > 1 ? strtoupper(substr($parts[0], 0, 1) . substr(end($parts), 0, 1)) : strtoupper(substr($currentUser->name, 0, 2));
    }
    $orgName = $currentAccount?->profile?->trade_name ?? $currentAccount?->profile?->legal_name ?? $currentAccount?->name ?? session('client.account.name', 'ORDO Workspace');
    $orgInitials = strtoupper(substr($orgName, 0, 2));
@endphp

<header class="topbar">
    <button type="button" class="iconbtn mobile-menu" onclick="toggleSidebar()" aria-label="Toggle mobile menu">
        <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 7h16M4 12h16M4 17h16"></path>
        </svg>
    </button>

    <a href="{{ route('settings.switch-account') }}" class="orgswitch" style="text-decoration:none; color:inherit;">
        <span class="orgdot">{{ $orgInitials }}</span>
        <span style="min-width:0"><b id="orgNameTop">{{ $orgName }}</b></span>
        <span class="muted" style="margin-left:2px;">⌄</span>
    </a>

    <div class="search">
        <span class="searchico">
            <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="7"></circle>
                <path d="M20 20l-4-4"></path>
            </svg>
        </span>
        <input class="input" placeholder="Search ORDO, records, engagements, people..." onkeydown="if(event.key==='Enter')showToast('Global search will index every subscribed module in Phase 2.')" />
    </div>

    <div class="top-actions">
        <a href="{{ route('jkc.announcements') }}" class="iconbtn notify" aria-label="Notifications">
            <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 8a6 6 0 00-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path>
                <path d="M10 21h4"></path>
            </svg>
        </a>
        <a href="{{ route('jkc.support') }}" class="iconbtn" aria-label="Support">
            <svg class="ico" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="9"></circle>
                <path d="M9.7 9a2.4 2.4 0 014.7.7c0 1.8-2.4 2-2.4 3.8M12 17h.01"></path>
            </svg>
        </a>
        <a href="{{ route('settings.my-account') }}" class="avatar" style="border:0; text-decoration:none;" aria-label="My Account">
            {{ $initials }}
        </a>
    </div>
</header>
