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


<style>

    .settings-sidebar {

        width: 250px;

        flex-shrink: 0;

        background: #ffffff;

        border: 1px solid #e5e7eb;

        border-radius: 10px;

        padding: 18px;

        height: fit-content;

    }


    /* ==========================================
       HEADER
    =========================================== */

    .settings-sidebar-header {

        display: flex;

        align-items: center;

        gap: 12px;

        padding-bottom: 18px;

        margin-bottom: 18px;

        border-bottom: 1px solid #e5e7eb;

    }


    .settings-sidebar-icon {

        width: 38px;

        height: 38px;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

        background: #f3f4f6;

        border-radius: 8px;

        color: #111827;

        font-size: 17px;

    }


    .settings-sidebar-header h2 {

        margin: 0;

        font-size: 15px;

        font-weight: 650;

        color: #111827;

    }


    .settings-sidebar-header p {

        margin: 3px 0 0;

        font-size: 11px;

        color: #9ca3af;

    }


    /* ==========================================
       SECTION
    =========================================== */

    .settings-sidebar-section {

        margin-bottom: 22px;

    }


    .settings-sidebar-title {

        margin-bottom: 7px;

        font-size: 10px;

        font-weight: 700;

        letter-spacing: 0.7px;

        color: #9ca3af;

    }


    /* ==========================================
       LINKS
    =========================================== */

    .settings-sidebar-link {

        display: flex;

        align-items: center;

        min-height: 36px;

        padding: 7px 10px;

        margin-bottom: 2px;

        border-radius: 6px;

        color: #4b5563;

        font-size: 12px;

        transition:
            background 0.2s ease,
            color 0.2s ease;

    }


    .settings-sidebar-link:hover {

        background: #f9fafb;

        color: #111827;

    }


    .settings-sidebar-link.active {

        background: #f3f4f6;

        color: #111827;

        font-weight: 600;

    }


    /* ==========================================
       FOOTER
    =========================================== */

    .settings-sidebar-footer {

        padding-top: 15px;

        border-top: 1px solid #e5e7eb;

    }


    .settings-back-link {

        display: block;

        padding: 8px 10px;

        color: #6b7280;

        font-size: 12px;

        border-radius: 6px;

    }


    .settings-back-link:hover {

        background: #f9fafb;

        color: #111827;

    }


    /* ==========================================
       MOBILE
    =========================================== */

    @media (max-width: 768px) {

        .settings-sidebar {

            width: 100%;

        }

    }

</style>