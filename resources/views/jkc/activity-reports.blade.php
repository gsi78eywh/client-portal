@extends('layouts.client')

@section('title', 'Activity & Reports | JK&C Client Portal')
@section('header-title', 'Activity & Reports')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    {{-- Page Header --}}
    <div class="ordo-page-header flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="ordo-page-eyebrow">JK&amp;C Deliverables &amp; Timesheets</div>
            <h1 class="ordo-page-title">Activity &amp; Reports</h1>
            <p class="ordo-page-description">
                Review client-visible service activities executed by your JK&amp;C team alongside formal compliance reports and deliverables.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <button onclick="exportActivitiesCsv()" class="ordo-btn ordo-btn-secondary ordo-btn-sm flex items-center gap-1.5">
                <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Export Activity Log
            </button>
        </div>
    </div>

    {{-- Tabs Navigation --}}
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="border-b border-slate-200/80 px-6 pt-4 flex items-center gap-6 text-sm font-semibold">
            <button id="tabBtnActivities"
                    onclick="switchJkcTab('activities')"
                    class="pb-3 border-b-2 border-blue-600 text-blue-600 flex items-center gap-2 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Service Activities ({{ count($activities) }})
            </button>
            <button id="tabBtnReports"
                    onclick="switchJkcTab('reports')"
                    class="pb-3 border-b-2 border-transparent text-slate-500 hover:text-slate-800 flex items-center gap-2 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Delivered Reports ({{ count($reports) }})
            </button>
        </div>

        {{-- TAB 1: ACTIVITIES CONTENT --}}
        <div id="tabContentActivities" class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="border-b border-slate-200 text-slate-400 font-bold uppercase tracking-wider text-[10px]">
                            <th class="pb-3 pr-4">Date</th>
                            <th class="pb-3 pr-4">Service Activity</th>
                            <th class="pb-3 pr-4">Engagement</th>
                            <th class="pb-3 pr-4">Duration</th>
                            <th class="pb-3 pr-4">Assigned Specialist</th>
                            <th class="pb-3 pr-4">Outcome</th>
                            <th class="pb-3 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($activities as $act)
                            <tr class="hover:bg-slate-50/70 transition-colors">
                                <td class="py-3.5 pr-4 font-mono font-medium text-slate-600 whitespace-nowrap">
                                    {{ $act['date'] }}
                                </td>
                                <td class="py-3.5 pr-4 font-semibold text-slate-900 max-w-xs">
                                    {{ $act['activity'] }}
                                </td>
                                <td class="py-3.5 pr-4 whitespace-nowrap">
                                    <span class="font-mono px-2 py-0.5 rounded bg-blue-50 text-blue-700 font-medium">
                                        {{ $act['engagement'] }}
                                    </span>
                                </td>
                                <td class="py-3.5 pr-4 text-slate-500 whitespace-nowrap">
                                    {{ $act['duration'] }}
                                </td>
                                <td class="py-3.5 pr-4 text-slate-700 whitespace-nowrap">
                                    {{ $act['specialist'] }}
                                </td>
                                <td class="py-3.5 pr-4 text-slate-600 text-[11px] leading-relaxed max-w-xs">
                                    {{ $act['outcome'] }}
                                </td>
                                <td class="py-3.5 text-right whitespace-nowrap">
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        {{ $act['status'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- TAB 2: DELIVERED REPORTS CONTENT --}}
        <div id="tabContentReports" class="p-6 hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($reports as $rep)
                    <div class="p-5 rounded-xl border border-slate-200/80 bg-white hover:border-slate-300 transition-all flex flex-col justify-between space-y-4">
                        <div class="space-y-2">
                            <div class="flex items-center justify-between">
                                <span class="font-mono text-xs font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded border border-blue-200">
                                    {{ $rep['code'] }}
                                </span>
                                <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 bg-slate-100 text-slate-600 rounded">
                                    {{ $rep['file_format'] }} ({{ $rep['size'] }})
                                </span>
                            </div>

                            <h3 class="text-sm font-bold text-slate-900 leading-snug">
                                {{ $rep['title'] }}
                            </h3>

                            <div class="text-xs text-slate-500 space-y-1 pt-1">
                                <div>Delivered: <strong class="text-slate-700">{{ $rep['delivered_date'] }}</strong></div>
                                <div>Scope: <span class="text-slate-700">{{ $rep['engagement'] }}</span></div>
                                <div>Signatory: <span class="text-slate-700">{{ $rep['signatory'] }}</span></div>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs text-slate-400">{{ $rep['pages'] }} pages</span>
                            <a href="{{ route('jkc.activity-reports.download', $rep['id'] ?? 1) }}"
                               class="ordo-btn ordo-btn-primary ordo-btn-sm text-xs py-1 px-3 inline-flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Download Deliverable
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
    function switchJkcTab(tab) {
        const actContent = document.getElementById('tabContentActivities');
        const repContent = document.getElementById('tabContentReports');
        const actBtn = document.getElementById('tabBtnActivities');
        const repBtn = document.getElementById('tabBtnReports');

        if (tab === 'activities') {
            actContent.classList.remove('hidden');
            repContent.classList.add('hidden');
            actBtn.className = "pb-3 border-b-2 border-blue-600 text-blue-600 flex items-center gap-2 transition-colors";
            repBtn.className = "pb-3 border-b-2 border-transparent text-slate-500 hover:text-slate-800 flex items-center gap-2 transition-colors";
        } else {
            actContent.classList.add('hidden');
            repContent.classList.remove('hidden');
            repBtn.className = "pb-3 border-b-2 border-blue-600 text-blue-600 flex items-center gap-2 transition-colors";
            actBtn.className = "pb-3 border-b-2 border-transparent text-slate-500 hover:text-slate-800 flex items-center gap-2 transition-colors";
        }
    }

    function exportActivitiesCsv() {
        const rows = [
            ['Date', 'Service Activity', 'Engagement Ref', 'Duration', 'Specialist', 'Outcome', 'Status'],
            @foreach($activities as $act)
                ['{{ $act['date'] }}', '{{ addslashes($act['activity']) }}', '{{ $act['engagement'] }}', '{{ $act['duration'] }}', '{{ addslashes($act['specialist']) }}', '{{ addslashes($act['outcome']) }}', '{{ $act['status'] }}'],
            @endforeach
        ];

        let csvContent = "data:text/csv;charset=utf-8," + rows.map(e => e.map(val => `"${val}"`).join(",")).join("\n");
        let encodedUri = encodeURI(csvContent);
        let link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "JKC_Service_Activities_{{ date('Y-m-d') }}.csv");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>
@endpush
@endsection