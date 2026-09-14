@extends('layouts.client')

@section('title', 'Subscriptions & Usage | JK&C Client Portal')
@section('header-title', 'Subscriptions')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    {{-- Page Header --}}
    <div class="ordo-page-header flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="ordo-page-eyebrow">JK&amp;C Enterprise Entitlements</div>
            <h1 class="ordo-page-title">Subscriptions &amp; Usage</h1>
            <p class="ordo-page-description">
                Monitor your active ORDO commercial plan, capacity usage limits, and business module entitlements.
            </p>
        </div>
        <div class="flex items-center gap-3">
            @if($isTrialActive)
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                    <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                    {{ $trialDaysRemaining }} Days Remaining in Trial
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                    <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                    Active Commercial Plan
                </span>
            @endif

            <a href="{{ route('settings.subscription-usage') }}" class="ordo-btn ordo-btn-primary ordo-btn-sm">
                Manage in Settings
            </a>
        </div>
    </div>

    {{-- 30-Day Free Access Trial Banner --}}
    @if($isTrialActive)
        <div class="bg-gradient-to-r from-blue-900 to-indigo-950 text-white rounded-xl p-6 shadow-md border border-blue-800/60 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div class="space-y-1 max-w-2xl">
                <div class="inline-flex items-center gap-2 px-2.5 py-0.5 rounded text-[11px] font-bold uppercase tracking-wider bg-blue-500/20 text-blue-200 border border-blue-400/20">
                    30-Day Full Access Period
                </div>
                <h2 class="text-xl font-bold tracking-tight text-white">
                    Explore all 6 business modules without restriction
                </h2>
                <p class="text-xs text-blue-200/90 leading-relaxed">
                    You have <strong class="text-white">{{ $trialDaysRemaining }} days</strong> of complimentary full-system access. Before your free period concludes, select up to three business modules to keep active on the permanent Free Plan.
                </p>
            </div>
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="{{ route('settings.subscription-usage') }}"
                   class="px-4 py-2 text-xs font-bold rounded-lg bg-white text-blue-900 hover:bg-blue-50 transition-colors shadow-xs">
                    Configure Free Modules
                </a>
            </div>
        </div>
    @endif

    {{-- Plan Overview & Usage Meters Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Plan Overview Card --}}
        <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-xs flex flex-col justify-between">
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Current Tier</span>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                        {{ $isTrialActive ? 'Trial Active' : 'Commercial' }}
                    </span>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-slate-900">{{ $planName }}</h2>
                    <p class="text-xs text-slate-500 mt-1">{{ $billingCycle }}</p>
                </div>

                <div class="pt-4 border-t border-slate-100 space-y-2 text-xs">
                    <div class="flex justify-between text-slate-600">
                        <span>Account Holder:</span>
                        <strong class="text-slate-800">{{ $account?->name ?? 'Client Account' }}</strong>
                    </div>
                    <div class="flex justify-between text-slate-600">
                        <span>Account ID:</span>
                        <span class="font-mono text-slate-800">{{ $account?->account_id ?? 'ORDO-ACC-1001' }}</span>
                    </div>
                    <div class="flex justify-between text-slate-600">
                        <span>Next Milestone:</span>
                        <span class="text-slate-800 font-medium">{{ $renewalDate ?? now()->addDays(30)->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>

            <div class="pt-6 mt-4 border-t border-slate-100 flex items-center gap-2">
                <a href="{{ route('settings.subscription-usage') }}" class="ordo-btn ordo-btn-secondary ordo-btn-sm w-full text-center">
                    Plan Details
                </a>
                <a href="{{ route('jkc.billing') }}" class="ordo-btn ordo-btn-outline ordo-btn-sm w-full text-center">
                    Invoices
                </a>
            </div>
        </div>

        {{-- Capacity Usage Meters (2 Columns) --}}
        <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200/80 p-6 shadow-xs flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-base font-bold text-slate-900">Capacity Usage Meters</h2>
                        <p class="text-xs text-slate-500">Real-time resource allocation under your current entitlement layer.</p>
                    </div>
                    <span class="text-xs font-semibold text-slate-400">Independent Entitlement Layer 3</span>
                </div>

                <div class="space-y-5 pt-2">
                    {{-- Records Gauge --}}
                    <div>
                        <div class="flex justify-between text-xs font-medium mb-1.5">
                            <span class="text-slate-700 font-semibold flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Stored Records &amp; Documents
                            </span>
                            <span class="text-slate-900 font-bold">
                                {{ $usage['records']['used'] }} / {{ $usage['records']['limit'] ?? 100 }} records
                                <span class="text-slate-400 font-normal">({{ $usage['records']['percentage'] }}%)</span>
                            </span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                            <div class="h-2.5 rounded-full bg-blue-600 transition-all duration-500"
                                 style="width: {{ $usage['records']['percentage'] }}%"></div>
                        </div>
                    </div>

                    {{-- User Seats Gauge --}}
                    <div>
                        <div class="flex justify-between text-xs font-medium mb-1.5">
                            <span class="text-slate-700 font-semibold flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                User Seats &amp; Collaborators
                            </span>
                            <span class="text-slate-900 font-bold">
                                {{ $usage['users']['used'] }} / {{ $usage['users']['limit'] ?? 1 }} seat
                                <span class="text-amber-600 font-semibold">(Capacity Reached)</span>
                            </span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                            <div class="h-2.5 rounded-full bg-amber-500 transition-all duration-500"
                                 style="width: {{ $usage['users']['percentage'] }}%"></div>
                        </div>
                    </div>

                    {{-- Storage Gauge --}}
                    <div>
                        <div class="flex justify-between text-xs font-medium mb-1.5">
                            <span class="text-slate-700 font-semibold flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                                </svg>
                                Cloud Archive Storage
                            </span>
                            <span class="text-slate-900 font-bold">
                                {{ $usage['storage']['used'] }} / {{ $usage['storage']['limit'] ?? 500 }} {{ $usage['storage']['unit'] ?? 'MB' }}
                                <span class="text-slate-400 font-normal">({{ $usage['storage']['percentage'] }}%)</span>
                            </span>
                        </div>
                        <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                            <div class="h-2.5 rounded-full bg-emerald-600 transition-all duration-500"
                                 style="width: {{ $usage['storage']['percentage'] }}%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-4 mt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <span>Usage limits reset monthly on the 1st day of the billing cycle.</span>
                <a href="{{ route('settings.subscription-usage') }}" class="text-blue-600 font-medium hover:underline">
                    Expand Quotas &rarr;
                </a>
            </div>
        </div>
    </div>

    {{-- Business Modules Entitlement Directory --}}
    <div>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-4">
            <div>
                <h2 class="text-base font-bold text-slate-900">Module Entitlements (Layer 1)</h2>
                <p class="text-xs text-slate-500">During the trial, all 6 modules remain active. On the Free Plan, choose 3 modules.</p>
            </div>
            <a href="{{ route('settings.subscription-usage') }}" class="text-xs font-semibold text-blue-600 hover:underline">
                Configure Free 3 Modules in Settings &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($modules as $key => $mod)
                <div class="bg-white rounded-xl border border-slate-200/80 p-5 shadow-xs hover:border-slate-300 transition-all flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="font-bold text-slate-900 text-sm">{{ $mod['name'] }}</span>
                            @if($mod['status'] === 'trial')
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-blue-50 text-blue-700 border border-blue-200">
                                    Trial Active
                                </span>
                            @elseif($mod['status'] === 'free')
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    Free Plan
                                </span>
                            @else
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-slate-100 text-slate-500 border border-slate-200">
                                    Locked
                                </span>
                            @endif
                        </div>

                        <p class="text-xs text-slate-600 leading-relaxed mb-4">
                            {{ $mod['description'] }}
                        </p>
                    </div>

                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                        @if(($mod['status'] ?? '') !== 'locked')
                            <a href="{{ route($key) }}" class="font-semibold text-blue-600 hover:text-blue-800">
                                Open Workspace &rarr;
                            </a>
                        @else
                            <a href="javascript:void(0)" onclick="showLockedModule('{{ $key }}')" class="font-semibold text-rose-600 hover:text-rose-800">
                                🔒 Locked (Details) &rarr;
                            </a>
                        @endif
                        <a href="{{ route('settings.subscription-usage') }}" class="text-slate-400 hover:text-slate-600">
                            Configure
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection