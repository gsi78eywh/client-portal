@php
    $accountItems = [
        [
            'label' => 'My Account',
            'url' => '/settings/my-account',
            'pattern' => 'settings/my-account',
        ],
        [
            'label' => 'Account Profile',
            'url' => '/settings/account-profile',
            'pattern' => 'settings/account-profile',
        ],
        [
            'label' => 'Account Verification',
            'url' => '/settings/verification',
            'pattern' => 'settings/verification',
        ],
        [
            'label' => 'Users & Access',
            'url' => '/settings/users-access',
            'pattern' => 'settings/users-access',
        ],
        [
            'label' => 'Switch Account',
            'url' => '/settings/switch-account',
            'pattern' => 'settings/switch-account',
        ],
        [
            'label' => 'Security',
            'url' => '/settings/security',
            'pattern' => 'settings/security',
        ],
    ];


    $systemItems = [
        [
            'label' => 'General',
            'url' => '/settings/general',
            'pattern' => 'settings/general',
        ],
        [
            'label' => 'Notifications',
            'url' => '/settings/notifications',
            'pattern' => 'settings/notifications',
        ],
        [
            'label' => 'Subscription & Usage',
            'url' => '/settings/subscription-usage',
            'pattern' => 'settings/subscription-usage',
        ],
        [
            'label' => 'Policies & Terms',
            'url' => '/settings/policies',
            'pattern' => 'settings/policies',
        ],
    ];


    $moduleItems = [
        [
            'label' => 'Entity & Governance',
            'url' => '/settings/modules/entity-governance',
            'pattern' => 'settings/modules/entity-governance',
        ],
        [
            'label' => 'Compliance',
            'url' => '/settings/modules/compliance',
            'pattern' => 'settings/modules/compliance',
        ],
        [
            'label' => 'Finance',
            'url' => '/settings/modules/finance',
            'pattern' => 'settings/modules/finance',
        ],
        [
            'label' => 'Human Capital',
            'url' => '/settings/modules/human-capital',
            'pattern' => 'settings/modules/human-capital',
        ],
        [
            'label' => 'Records',
            'url' => '/settings/modules/records',
            'pattern' => 'settings/modules/records',
        ],
        [
            'label' => 'Transmittals',
            'url' => '/settings/modules/transmittals',
            'pattern' => 'settings/modules/transmittals',
        ],
    ];
@endphp


<aside class="settings-sidebar">

    {{-- ==========================================
         SETTINGS HEADER
    =========================================== --}}

    <div class="settings-sidebar-header">

        <div class="settings-sidebar-icon">
            ⚙
        </div>

        <div>

            <h2>
                Settings
            </h2>

            <p>
                Account configuration
            </p>

        </div>

    </div>


    {{-- ==========================================
         ACCOUNT & ACCESS
    =========================================== --}}

    <div class="settings-sidebar-section">

        <div class="settings-sidebar-title">
            ACCOUNT &amp; ACCESS
        </div>

        @foreach ($accountItems as $item)

            <a
                href="{{ $item['url'] }}"
                class="settings-sidebar-link {{ request()->is($item['pattern']) ? 'active' : '' }}"
            >
                {{ $item['label'] }}
            </a>

        @endforeach

    </div>


    {{-- ==========================================
         SYSTEM
    =========================================== --}}

    <div class="settings-sidebar-section">

        <div class="settings-sidebar-title">
            SYSTEM
        </div>

        @foreach ($systemItems as $item)

            <a
                href="{{ $item['url'] }}"
                class="settings-sidebar-link {{ request()->is($item['pattern']) ? 'active' : '' }}"
            >
                {{ $item['label'] }}
            </a>

        @endforeach

    </div>


    {{-- ==========================================
         MODULE SETTINGS
    =========================================== --}}

    <div class="settings-sidebar-section">

        <div class="settings-sidebar-title">
            MODULE SETTINGS
        </div>

        @foreach ($moduleItems as $item)

            <a
                href="{{ $item['url'] }}"
                class="settings-sidebar-link {{ request()->is($item['pattern']) ? 'active' : '' }}"
            >
                {{ $item['label'] }}
            </a>

        @endforeach

    </div>


    {{-- ==========================================
         BACK TO PORTAL
    =========================================== --}}

    <div class="settings-sidebar-footer">

        <a
            href="/town-hall"
            class="settings-back-link"
        >
            ← Back to Town Hall
        </a>

    </div>

</aside>


