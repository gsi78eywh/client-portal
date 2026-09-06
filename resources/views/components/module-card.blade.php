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


