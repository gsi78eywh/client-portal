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


