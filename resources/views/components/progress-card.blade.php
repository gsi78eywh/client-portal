@props([
    'title' => 'Account Setup',
    'description' => '',
    'progress' => 0,
    'actionText' => 'Continue Setup',
    'actionUrl' => '#',
])

@php
    $progress = max(0, min(100, (int) $progress));
@endphp

<div class="ordo-progress-card">

    {{-- Header --}}

    <div class="progress-card-header">

        <div>

            <h3 class="progress-card-title">
                {{ $title }}
            </h3>

            @if ($description)
                <p class="progress-card-description">
                    {{ $description }}
                </p>
            @endif

        </div>


        <div class="progress-percentage">
            {{ $progress }}%
        </div>

    </div>


    {{-- Progress Bar --}}

    <div
        class="progress-track"
        role="progressbar"
        aria-valuenow="{{ $progress }}"
        aria-valuemin="0"
        aria-valuemax="100"
    >

        <div
            class="progress-fill"
            style="width: {{ $progress }}%;"
        ></div>

    </div>


    {{-- Optional Content --}}

    @if ($slot->isNotEmpty())

        <div class="progress-card-content">

            {{ $slot }}

        </div>

    @endif


    {{-- Action --}}

    @if ($actionText)

        <div class="progress-card-footer">

            <a
                href="{{ $actionUrl }}"
                class="progress-action"
            >
                {{ $actionText }}
            </a>

        </div>

    @endif

</div>


<style>

    .ordo-progress-card {

        background: #ffffff;

        border: 1px solid #e5e7eb;

        border-radius: 10px;

        padding: 22px;

    }


    /* ==============================
       HEADER
    ============================== */

    .progress-card-header {

        display: flex;

        align-items: flex-start;

        justify-content: space-between;

        gap: 20px;

        margin-bottom: 16px;

    }


    .progress-card-title {

        margin: 0;

        font-size: 16px;

        font-weight: 600;

        color: #111827;

    }


    .progress-card-description {

        margin: 6px 0 0;

        font-size: 13px;

        line-height: 1.5;

        color: #6b7280;

    }


    .progress-percentage {

        flex-shrink: 0;

        font-size: 14px;

        font-weight: 700;

        color: #111827;

    }


    /* ==============================
       PROGRESS BAR
    ============================== */

    .progress-track {

        width: 100%;

        height: 8px;

        overflow: hidden;

        background: #e5e7eb;

        border-radius: 999px;

    }


    .progress-fill {

        height: 100%;

        background: #1d4ed8;

        border-radius: 999px;

        transition: width 0.3s ease;

    }


    /* ==============================
       OPTIONAL CONTENT
    ============================== */

    .progress-card-content {

        margin-top: 18px;

        padding-top: 18px;

        border-top: 1px solid #f0f0f0;

    }


    /* ==============================
       FOOTER
    ============================== */

    .progress-card-footer {

        margin-top: 18px;

    }


    .progress-action {

        display: inline-flex;

        align-items: center;

        justify-content: center;

        min-height: 38px;

        padding: 8px 15px;

        background: #111827;

        color: #ffffff;

        border-radius: 7px;

        font-size: 13px;

        font-weight: 600;

        transition: 0.2s ease;

    }


    .progress-action:hover {

        background: #374151;

    }


    /* ==============================
       MOBILE
    ============================== */

    @media (max-width: 600px) {

        .ordo-progress-card {

            padding: 18px;

        }


        .progress-card-header {

            gap: 12px;

        }


        .progress-card-title {

            font-size: 15px;

        }


        .progress-card-description {

            font-size: 12px;

        }

    }

</style>