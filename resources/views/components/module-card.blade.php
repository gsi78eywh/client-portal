@props([
    'title' => 'Business Module',
    'description' => '',
    'icon' => '◈',
    'status' => 'Trial',
    'url' => '#',
    'usage' => null,
    'locked' => false,
])

@php
    $normalizedStatus = strtolower(trim($status));

    $isLocked = $locked || in_array($normalizedStatus, [
        'locked',
        'upgrade required',
    ]);

    $isLimited = $normalizedStatus === 'limited';
@endphp

<div class="ordo-module-card {{ $isLocked ? 'module-locked' : '' }}">

    {{-- ==========================================
         MODULE HEADER
    =========================================== --}}

    <div class="module-card-header">

        <div class="module-icon">
            {{ $icon }}
        </div>

        <x-status-badge :status="$status" />

    </div>


    {{-- ==========================================
         MODULE INFORMATION
    =========================================== --}}

    <div class="module-card-body">

        <h3 class="module-card-title">
            {{ $title }}
        </h3>

        @if ($description)

            <p class="module-card-description">
                {{ $description }}
            </p>

        @endif


        {{-- ==========================================
             USAGE
        =========================================== --}}

        @if ($usage)

            <div class="module-usage">

                <div class="module-usage-label">
                    Usage
                </div>

                <div class="module-usage-value">
                    {{ $usage }}
                </div>

            </div>

        @endif

    </div>


    {{-- ==========================================
         ACTION
    =========================================== --}}

    <div class="module-card-footer">

        @if ($isLocked)

            <a
                href="/jkc/subscriptions"
                class="module-action module-action-locked"
            >
                Upgrade Required
            </a>

        @elseif ($isLimited)

            <a
                href="{{ $url }}"
                class="module-action"
            >
                Continue
            </a>

        @else

            <a
                href="{{ $url }}"
                class="module-action"
            >
                Open Module
            </a>

        @endif

    </div>

</div>


<style>

    /* ==========================================
       MODULE CARD
    =========================================== */

    .ordo-module-card {

        display: flex;

        flex-direction: column;

        min-height: 250px;

        background: #ffffff;

        border: 1px solid #e5e7eb;

        border-radius: 10px;

        padding: 20px;

        transition:
            border-color 0.2s ease,
            box-shadow 0.2s ease,
            transform 0.2s ease;

    }


    .ordo-module-card:hover {

        border-color: #d1d5db;

        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.05);

        transform: translateY(-1px);

    }


    /* ==========================================
       LOCKED
    =========================================== */

    .ordo-module-card.module-locked {

        background: #fafafa;

    }


    .ordo-module-card.module-locked:hover {

        transform: none;

        box-shadow: none;

    }


    /* ==========================================
       HEADER
    =========================================== */

    .module-card-header {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 12px;

        margin-bottom: 20px;

    }


    .module-icon {

        width: 42px;

        height: 42px;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

        border-radius: 9px;

        background: #f3f4f6;

        color: #111827;

        font-size: 18px;

        font-weight: 600;

    }


    /* ==========================================
       BODY
    =========================================== */

    .module-card-body {

        flex: 1;

    }


    .module-card-title {

        margin: 0;

        font-size: 16px;

        font-weight: 650;

        color: #111827;

    }


    .module-card-description {

        margin: 8px 0 0;

        font-size: 13px;

        line-height: 1.55;

        color: #6b7280;

    }


    /* ==========================================
       USAGE
    =========================================== */

    .module-usage {

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        margin-top: 18px;

        padding-top: 13px;

        border-top: 1px solid #f0f0f0;

    }


    .module-usage-label {

        font-size: 11px;

        color: #9ca3af;

        text-transform: uppercase;

        letter-spacing: 0.5px;

    }


    .module-usage-value {

        font-size: 12px;

        font-weight: 600;

        color: #374151;

    }


    /* ==========================================
       FOOTER
    =========================================== */

    .module-card-footer {

        margin-top: 20px;

    }


    .module-action {

        width: 100%;

        min-height: 38px;

        display: flex;

        align-items: center;

        justify-content: center;

        padding: 8px 12px;

        background: #111827;

        color: #ffffff;

        border-radius: 7px;

        font-size: 12px;

        font-weight: 600;

        transition: background 0.2s ease;

    }


    .module-action:hover {

        background: #374151;

    }


    .module-action-locked {

        background: #f3f4f6;

        color: #6b7280;

        border: 1px solid #d1d5db;

    }


    .module-action-locked:hover {

        background: #e5e7eb;

    }


    /* ==========================================
       MOBILE
    =========================================== */

    @media (max-width: 600px) {

        .ordo-module-card {

            min-height: auto;

            padding: 18px;

        }

    }

</style>