@extends('layouts.client')

@section('title', 'Engagements | JK&C Client Portal')
@section('header-title', 'Engagements')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    {{-- Page Header --}}
    <div class="ordo-page-header flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="ordo-page-eyebrow">JK&amp;C Professional Services</div>
            <h1 class="ordo-page-title">Engagements</h1>
            <p class="ordo-page-description">
                Active contracts, compliance retainers, and specialized advisory projects being executed by John Kelly &amp; Company.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('jkc.support') }}" class="ordo-btn ordo-btn-secondary ordo-btn-sm">
                Request Scope Review
            </a>
            <a href="{{ route('jkc.billing') }}" class="ordo-btn ordo-btn-primary ordo-btn-sm">
                View Related Billing
            </a>
        </div>
    </div>

    {{-- Metrics Cards Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl border border-slate-200/80 p-5 shadow-xs">
            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Active Projects</div>
            <div class="text-2xl font-black text-slate-900">{{ $activeCount }}</div>
            <div class="text-xs text-blue-600 font-medium mt-1 flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                In Execution Stage
            </div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200/80 p-5 shadow-xs">
            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">In Review Stage</div>
            <div class="text-2xl font-black text-amber-600">{{ $reviewCount }}</div>
            <div class="text-xs text-slate-500 font-medium mt-1">Pending Client Sign-off</div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200/80 p-5 shadow-xs">
            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Completed (YTD)</div>
            <div class="text-2xl font-black text-emerald-600">{{ $completedCount }}</div>
            <div class="text-xs text-slate-500 font-medium mt-1">Delivered &amp; Archived</div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200/80 p-5 shadow-xs">
            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Assigned Firm Lead</div>
            <div class="text-sm font-bold text-slate-900 truncate">Atty. Carmela Santos, CPA</div>
            <div class="text-xs text-slate-500 font-medium mt-1">JK&amp;C Managing Director</div>
        </div>
    </div>

    {{-- Status Filters --}}
    <div class="flex items-center gap-2 border-b border-slate-200 pb-3">
        @php
            $statuses = [
                'all' => 'All Engagements',
                'in_progress' => 'In Progress',
                'review_stage' => 'Review Stage',
                'completed' => 'Completed',
            ];
        @endphp

        @foreach($statuses as $k => $label)
            <a href="{{ route('jkc.engagements', ['status' => $k]) }}"
               class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition-colors {{ $selectedStatus === $k ? 'bg-blue-600 text-white shadow-xs' : 'text-slate-600 hover:bg-slate-100' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    {{-- Engagements List --}}
    <div class="space-y-4">
        @forelse($engagements as $eng)
            <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-xs hover:border-slate-300 transition-all duration-200 flex flex-col md:flex-row md:items-center justify-between gap-6">
                {{-- Left Detail --}}
                <div class="space-y-2 flex-1">
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="font-mono text-xs font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded border border-blue-200/80">
                            {{ $eng['code'] }}
                        </span>

                        <span class="text-xs text-slate-400 font-medium">{{ $eng['category'] }}</span>

                        @php
                            $statusBadge = match($eng['status_color']) {
                                'emerald' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                'amber' => 'bg-amber-50 text-amber-700 border-amber-200',
                                default => 'bg-blue-50 text-blue-700 border-blue-200',
                            };
                        @endphp
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold border {{ $statusBadge }}">
                            {{ $eng['status'] }}
                        </span>
                    </div>

                    <h2 class="text-base font-bold text-slate-900">
                        {{ $eng['title'] }}
                    </h2>

                    <p class="text-xs text-slate-600 leading-relaxed max-w-2xl">
                        {{ $eng['scope'] }}
                    </p>

                    <div class="flex flex-wrap items-center gap-4 text-xs text-slate-500 pt-1">
                        <div>Period: <strong class="text-slate-700">{{ $eng['period'] }}</strong></div>
                        <span>•</span>
                        <div>Lead Partner: <strong class="text-slate-700">{{ $eng['lead_partner'] }}</strong></div>
                        <span>•</span>
                        <div>Deliverables: <strong class="text-slate-700">{{ $eng['deliverables'] }}</strong></div>
                    </div>
                </div>

                {{-- Right Progress & Actions --}}
                <div class="w-full md:w-60 flex flex-col justify-between items-start md:items-end gap-3 pt-4 md:pt-0 border-t md:border-t-0 border-slate-100">
                    <div class="w-full">
                        <div class="flex justify-between items-center text-xs mb-1">
                            <span class="font-medium text-slate-500">Milestone Completion</span>
                            <span class="font-bold text-slate-900">{{ $eng['progress'] }}%</span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden">
                            <div class="h-2 rounded-full transition-all duration-500 {{ $eng['progress'] === 100 ? 'bg-emerald-500' : 'bg-blue-600' }}"
                                 style="width: {{ $eng['progress'] }}%"></div>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('jkc.activity-reports') }}" class="ordo-btn ordo-btn-secondary ordo-btn-sm text-xs">
                            Work Log
                        </a>
                        <a href="{{ route('jkc.billing') }}" class="ordo-btn ordo-btn-outline ordo-btn-sm text-xs">
                            {{ $eng['billing_ref'] }}
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-xl border border-slate-200/80 p-12 text-center">
                <p class="text-sm font-semibold text-slate-700">No engagements found for this status.</p>
                <a href="{{ route('jkc.engagements') }}" class="text-xs text-blue-600 hover:underline mt-2 inline-block">View All Engagements</a>
            </div>
        @endforelse
    </div>

</div>
@endsection