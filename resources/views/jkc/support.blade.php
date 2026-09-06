@extends('layouts.client')

@section('title', 'Support | JK&C Client Portal')
@section('header-title', 'Support')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center justify-between shadow-xs">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-700 font-bold">&times;</button>
        </div>
    @endif

    {{-- Page Header --}}
    <div class="ordo-page-header flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="ordo-page-eyebrow">JK&amp;C Client Helpdesk</div>
            <h1 class="ordo-page-title">Support &amp; Inquiries</h1>
            <p class="ordo-page-description">
                Direct advisory assistance, system troubleshooting, compliance questions, and billing inquiries handled by your JK&amp;C account team.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="document.getElementById('newTicketModal').classList.remove('hidden')"
                    class="ordo-btn ordo-btn-primary ordo-btn-sm shadow-xs flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create Support Ticket
            </button>
        </div>
    </div>

    {{-- Stats Cards Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl border border-slate-200/80 p-5 shadow-xs">
            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Open Tickets</div>
            <div class="text-2xl font-black text-slate-900">{{ $openCount }}</div>
            <div class="text-xs text-blue-600 font-medium mt-1">Under Active Handling</div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200/80 p-5 shadow-xs">
            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Avg Response SLA</div>
            <div class="text-2xl font-black text-slate-900">&lt; 2 Hours</div>
            <div class="text-xs text-emerald-600 font-medium mt-1">Priority Client SLA</div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200/80 p-5 shadow-xs">
            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Resolved (YTD)</div>
            <div class="text-2xl font-black text-slate-900">{{ $resolvedCount }}</div>
            <div class="text-xs text-slate-500 font-medium mt-1">Archived Inquiries</div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200/80 p-5 shadow-xs">
            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Client Desk Manager</div>
            <div class="text-sm font-bold text-slate-900 truncate">Atty. Carmela Santos, CPA</div>
            <div class="text-xs text-slate-500 font-medium mt-1">Senior Advisory Director</div>
        </div>
    </div>

    {{-- Ticket Records List --}}
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="p-5 border-b border-slate-200/80 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <h2 class="text-base font-bold text-slate-900">Your Support Cases</h2>
                <p class="text-xs text-slate-500">Track responses and correspondence with your designated JK&amp;C specialists.</p>
            </div>
            <span class="text-xs text-slate-400 font-medium">{{ count($tickets) }} total tickets</span>
        </div>

        <div class="divide-y divide-slate-100">
            @foreach($tickets as $ticket)
                <div class="p-5 hover:bg-slate-50/70 transition-colors flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div class="space-y-1.5 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="font-mono text-xs font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded border border-blue-200">
                                {{ $ticket['id'] }}
                            </span>

                            <span class="text-xs text-slate-500 font-medium">
                                {{ $ticket['category'] }}
                            </span>

                            @php
                                $statusStyle = match($ticket['status_color']) {
                                    'emerald' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                    default => 'bg-blue-50 text-blue-700 border-blue-200',
                                };

                                $priorityStyle = match($ticket['priority_color']) {
                                    'rose' => 'bg-rose-50 text-rose-700 border-rose-200',
                                    'amber' => 'bg-amber-50 text-amber-700 border-amber-200',
                                    default => 'bg-slate-100 text-slate-600 border-slate-200',
                                };
                            @endphp

                            <span class="px-2 py-0.5 rounded-full text-[11px] font-semibold border {{ $statusStyle }}">
                                {{ $ticket['status'] }}
                            </span>

                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider border {{ $priorityStyle }}">
                                {{ $ticket['priority'] }} Priority
                            </span>
                        </div>

                        <h3 class="text-sm font-bold text-slate-900">
                            {{ $ticket['subject'] }}
                        </h3>

                        <p class="text-xs text-slate-600 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            Latest note: <span class="italic text-slate-700">{{ $ticket['last_reply'] }}</span>
                        </p>
                    </div>

                    <div class="flex items-center gap-3 text-xs text-slate-400 md:flex-col md:items-end">
                        <span>{{ $ticket['created_at'] }}</span>
                        <button class="ordo-btn ordo-btn-secondary ordo-btn-sm text-xs py-1 px-3">
                            View Thread
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Create Support Ticket Modal (Hidden by default) --}}
    <div id="newTicketModal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-200 space-y-4 animate-in fade-in zoom-in-95 duration-150">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="text-base font-bold text-slate-900">Submit New Support Case</h3>
                <button onclick="document.getElementById('newTicketModal').classList.add('hidden')"
                        class="text-slate-400 hover:text-slate-600 text-lg font-bold">&times;</button>
            </div>

            <form method="POST" action="{{ route('jkc.support.submit') }}" class="space-y-4 text-xs">
                @csrf

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Subject / Summary *</label>
                    <input type="text" name="subject" required placeholder="e.g. Assistance with SEC eFAST submission PIN"
                           class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Category *</label>
                        <select name="category" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                            <option value="Technical Support">Technical Support</option>
                            <option value="Tax & Accounting">Tax &amp; Accounting</option>
                            <option value="SEC & Legal Retainer">SEC &amp; Legal Retainer</option>
                            <option value="Billing & Invoicing">Billing &amp; Invoicing</option>
                            <option value="Account Access">Account Access</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold text-slate-700 mb-1">Priority *</label>
                        <select name="priority" required class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                            <option value="Normal">Normal</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                            <option value="Urgent">Urgent (Deadline Pending)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block font-semibold text-slate-700 mb-1">Detailed Inquiry or Issue Description *</label>
                    <textarea name="message" rows="4" required placeholder="Please provide specific details, transaction references, or filing dates..."
                              class="w-full px-3 py-2 border border-slate-200 rounded-lg text-xs focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 leading-relaxed"></textarea>
                </div>

                <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                    <button type="button" onclick="document.getElementById('newTicketModal').classList.add('hidden')"
                            class="ordo-btn ordo-btn-secondary ordo-btn-sm">
                        Cancel
                    </button>
                    <button type="submit" class="ordo-btn ordo-btn-primary ordo-btn-sm">
                        Submit Case
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection