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


<style>
    .ordo-status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-height: 24px;

        padding: 4px 9px;

        border-radius: 999px;

        font-size: 11px;
        font-weight: 600;

        line-height: 1;

        white-space: nowrap;

        border: 1px solid transparent;
    }

    /* Trial */

    .status-trial {
        background: #eff6ff;
        color: #2563eb;
        border-color: #bfdbfe;
    }

    /* Free */

    .status-free {
        background: #f0fdf4;
        color: #15803d;
        border-color: #bbf7d0;
    }

    /* Active */

    .status-active,
    .status-verified {
        background: #ecfdf5;
        color: #047857;
        border-color: #a7f3d0;
    }

    /* Pending */

    .status-pending,
    .status-progress,
    .status-submitted {
        background: #fffbeb;
        color: #b45309;
        border-color: #fde68a;
    }

    /* Warning */

    .status-warning {
        background: #fff7ed;
        color: #c2410c;
        border-color: #fed7aa;
    }

    /* Rejected */

    .status-rejected,
    .status-cancelled {
        background: #fef2f2;
        color: #b91c1c;
        border-color: #fecaca;
    }

    /* Limited */

    .status-limited {
        background: #fff7ed;
        color: #c2410c;
        border-color: #fed7aa;
    }

    /* Locked */

    .status-locked {
        background: #f3f4f6;
        color: #6b7280;
        border-color: #d1d5db;
    }

    /* Suspended */

    .status-suspended {
        background: #fef2f2;
        color: #991b1b;
        border-color: #fecaca;
    }

    /* Past Due */

    .status-past-due {
        background: #fff7ed;
        color: #9a3412;
        border-color: #fed7aa;
    }

    /* Not Started */

    .status-not-started {
        background: #f9fafb;
        color: #6b7280;
        border-color: #e5e7eb;
    }

    /* Default */

    .status-default {
        background: #f9fafb;
        color: #4b5563;
        border-color: #e5e7eb;
    }
</style>