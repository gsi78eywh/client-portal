@props([
    'status' => 'Default'
])

@php
    $normalizedStatus = strtolower(trim($status));

    $statusClass = match ($normalizedStatus) {
        'trial' => 'status-trial',
        'free' => 'status-free',
        'active' => 'status-active',
        'verified' => 'status-verified',
        'pending' => 'status-pending',
        'in progress' => 'status-progress',
        'submitted' => 'status-submitted',
        'additional information required' => 'status-warning',
        'rejected' => 'status-rejected',
        'limited' => 'status-limited',
        'locked' => 'status-locked',
        'upgrade required' => 'status-locked',
        'suspended' => 'status-suspended',
        'cancelled' => 'status-cancelled',
        'past due' => 'status-past-due',
        'not started' => 'status-not-started',
        default => 'status-default',
    };
@endphp

<span {{ $attributes->merge(['class' => 'ordo-status-badge ' . $statusClass]) }}>
    {{ $status }}
</span>


