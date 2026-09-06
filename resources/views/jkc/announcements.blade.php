@extends('layouts.client')

@section('title', 'Announcements | JK&C Client Portal')
@section('header-title', 'Announcements')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    {{-- Page Header --}}
    <div class="ordo-page-header flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="ordo-page-eyebrow">JK&amp;C Advisory &amp; Communications</div>
            <h1 class="ordo-page-title">Announcements</h1>
            <p class="ordo-page-description">
                Official JK&amp;C memoranda, statutory compliance advisories, regulatory circulars, and system notices.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200/80">
                <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                Official JK&amp;C Feed
            </span>
        </div>
    </div>

    {{-- Search & Filter Controls --}}
    <div class="bg-white rounded-xl border border-slate-200/80 p-4 shadow-xs flex flex-col md:flex-row gap-4 justify-between items-stretch md:items-center">
        {{-- Category Pills --}}
        <div class="flex flex-wrap items-center gap-2">
            @php
                $categories = [
                    'all' => 'All Categories',
                    'sec & legal' => 'SEC & Legal',
                    'tax & bir' => 'Tax & BIR',
                    'system notice' => 'System Notices',
                    'holiday advisory' => 'Holiday Advisories',
                ];
            @endphp

            @foreach ($categories as $key => $label)
                <a href="{{ route('jkc.announcements', ['category' => $key, 'search' => $search]) }}"
                   class="px-3.5 py-1.5 rounded-lg text-xs font-semibold transition-all duration-150 {{ $selectedCategory === $key ? 'bg-blue-600 text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-slate-900' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        {{-- Search Input --}}
        <form method="GET" action="{{ route('jkc.announcements') }}" class="flex items-center gap-2">
            <input type="hidden" name="category" value="{{ $selectedCategory }}">
            <div class="relative w-full md:w-64">
                <input type="text"
                       name="search"
                       value="{{ $search }}"
                       placeholder="Search circulars..."
                       class="w-full pl-9 pr-3 py-1.5 text-xs bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 text-slate-800 placeholder-slate-400">
                <svg class="w-4 h-4 text-slate-400 absolute left-2.5 top-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            @if(!empty($search))
                <a href="{{ route('jkc.announcements', ['category' => $selectedCategory]) }}" class="px-2 py-1.5 text-xs text-slate-500 hover:text-slate-700">Clear</a>
            @endif
        </form>
    </div>

    {{-- Announcements Feed --}}
    @if(count($announcements) > 0)
        <div class="grid grid-cols-1 gap-4">
            @foreach($announcements as $item)
                <article class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-xs hover:border-slate-300 transition-all duration-200 flex flex-col justify-between {{ $item['is_pinned'] ? 'border-l-4 border-l-blue-600' : '' }}">
                    <div>
                        {{-- Meta Bar --}}
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
                            <div class="flex items-center gap-2">
                                @if($item['is_pinned'])
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-blue-100 text-blue-800">
                                        <svg class="w-3 h-3 text-blue-700" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                                        </svg>
                                        Priority Notice
                                    </span>
                                @endif

                                @php
                                    $badgeStyles = match($item['badge_color']) {
                                        'emerald' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                        'indigo' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                                        'amber' => 'bg-amber-50 text-amber-700 border-amber-200',
                                        default => 'bg-blue-50 text-blue-700 border-blue-200',
                                    };
                                @endphp
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold border {{ $badgeStyles }}">
                                    {{ $item['category'] }}
                                </span>
                            </div>

                            <div class="flex items-center gap-3 text-xs text-slate-400">
                                <time datetime="{{ $item['date'] }}">{{ $item['date'] }}</time>
                                <span>•</span>
                                <span>{{ $item['read_time'] }}</span>
                            </div>
                        </div>

                        {{-- Title --}}
                        <h2 class="text-lg font-bold text-slate-900 tracking-tight mb-2 hover:text-blue-600 transition-colors">
                            {{ $item['title'] }}
                        </h2>

                        {{-- Summary & Expanded Content --}}
                        <p class="text-sm text-slate-600 leading-relaxed mb-4">
                            {{ $item['summary'] }}
                        </p>

                        <div class="p-4 bg-slate-50 rounded-lg border border-slate-100 text-xs text-slate-700 leading-relaxed mb-4">
                            {{ $item['content'] }}
                        </div>
                    </div>

                    {{-- Footer Info --}}
                    <div class="pt-3 border-t border-slate-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 text-xs text-slate-500">
                        <div class="flex items-center gap-2">
                            <span class="w-5 h-5 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-[10px]">
                                JK
                            </span>
                            <span>Issued by: <strong class="text-slate-700">{{ $item['author'] }}</strong></span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-slate-400">Reference: ADVISORY-{{ str_pad($item['id'], 4, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-xl border border-slate-200/80 p-12 text-center">
            <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </div>
            <h3 class="text-base font-semibold text-slate-800 mb-1">No Announcements Found</h3>
            <p class="text-xs text-slate-500 max-w-sm mx-auto mb-4">
                No circulars match your selected category or search keyword. Try clearing filters to see all advisories.
            </p>
            <a href="{{ route('jkc.announcements') }}" class="ordo-btn ordo-btn-secondary ordo-btn-sm">
                Reset Filter
            </a>
        </div>
    @endif

</div>
@endsection