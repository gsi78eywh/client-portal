@extends('layouts.client')

@section('title', 'Billing & Financial Accounts | JK&C Client Portal')
@section('header-title', 'Billing')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    {{-- Page Header --}}
    <div class="ordo-page-header flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="ordo-page-eyebrow">JK&amp;C Account Statements &amp; Invoices</div>
            <h1 class="ordo-page-title">Billing &amp; Payments</h1>
            <p class="ordo-page-description">
                Centralized financial management for your John Kelly &amp; Company professional retainers, project billing, and official Statements of Account.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('jkc.billing.soa') }}" class="ordo-btn ordo-btn-primary ordo-btn-sm shadow-xs flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Download Statement of Account (SOA)
            </a>
        </div>
    </div>

    {{-- Financial Metrics Cards Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        {{-- Outstanding Balance --}}
        <div class="bg-white rounded-xl border border-slate-200/80 p-5 shadow-xs">
            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Total Outstanding</div>
            <div class="text-2xl font-black text-rose-600">
                ₱ {{ number_format($summary['outstanding_balance'], 2) }}
            </div>
            <div class="text-xs text-rose-600 font-medium mt-1 flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-rose-600 animate-pulse"></span>
                Payment Pending
            </div>
        </div>

        {{-- Paid This Year --}}
        <div class="bg-white rounded-xl border border-slate-200/80 p-5 shadow-xs">
            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Settled YTD (2026)</div>
            <div class="text-2xl font-black text-emerald-600">
                ₱ {{ number_format($summary['paid_this_year'], 2) }}
            </div>
            <div class="text-xs text-slate-500 font-medium mt-1">Cleared Invoices</div>
        </div>

        {{-- Next Due Date --}}
        <div class="bg-white rounded-xl border border-slate-200/80 p-5 shadow-xs">
            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Next Due Cutoff</div>
            <div class="text-base font-bold text-slate-900">{{ $summary['next_due_date'] }}</div>
            <div class="text-xs text-slate-500 font-medium mt-1">Amount: ₱ {{ number_format($summary['next_due_amount'], 2) }}</div>
        </div>

        {{-- Currency & Tax Context --}}
        <div class="bg-white rounded-xl border border-slate-200/80 p-5 shadow-xs">
            <div class="text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-1">Currency Standard</div>
            <div class="text-base font-bold text-slate-900">{{ $summary['currency'] }}</div>
            <div class="text-xs text-slate-500 font-medium mt-1">Official Receipts (BIR) issued</div>
        </div>
    </div>

    {{-- Invoices Table Card --}}
    <div class="bg-white rounded-xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="p-5 border-b border-slate-200/80 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div>
                <h2 class="text-base font-bold text-slate-900">Invoices &amp; Billing History</h2>
                <p class="text-xs text-slate-500">Official billings issued under your JK&amp;C professional service agreements.</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs text-slate-400 font-medium">{{ count($invoices) }} total billings</span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider text-[10px]">
                        <th class="py-3 px-4">Invoice No</th>
                        <th class="py-3 px-4">Description / Engagement</th>
                        <th class="py-3 px-4">Issue Date</th>
                        <th class="py-3 px-4">Due Date</th>
                        <th class="py-3 px-4 text-right">Amount (PHP)</th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($invoices as $inv)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="py-3.5 px-4 font-mono font-bold text-blue-700 whitespace-nowrap">
                                {{ $inv['invoice_no'] }}
                            </td>
                            <td class="py-3.5 px-4">
                                <div class="font-semibold text-slate-900">{{ $inv['description'] }}</div>
                                <div class="text-[11px] text-slate-500 font-mono">{{ $inv['engagement'] }}</div>
                            </td>
                            <td class="py-3.5 px-4 text-slate-600 whitespace-nowrap">
                                {{ $inv['issue_date'] }}
                            </td>
                            <td class="py-3.5 px-4 whitespace-nowrap {{ $inv['status'] === 'Unpaid' ? 'text-rose-600 font-semibold' : 'text-slate-600' }}">
                                {{ $inv['due_date'] }}
                            </td>
                            <td class="py-3.5 px-4 text-right font-mono font-bold text-slate-900 whitespace-nowrap">
                                ₱ {{ number_format($inv['amount'], 2) }}
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                @if($inv['status'] === 'Paid')
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        Paid
                                    </span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-50 text-amber-700 border border-amber-200">
                                        Payment Due
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                <a href="{{ route('jkc.billing.invoice', $inv['invoice_no']) }}"
                                   class="ordo-btn ordo-btn-secondary ordo-btn-sm text-[11px] py-1 px-2.5 inline-flex items-center gap-1">
                                    <svg class="w-3 h-3 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    PDF Receipt
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Payment Instructions & Bank Wire Remittance Card --}}
    <div class="bg-slate-50 rounded-xl border border-slate-200/80 p-6 flex flex-col md:flex-row items-start justify-between gap-6">
        <div class="space-y-2 max-w-2xl">
            <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider text-[11px]">
                Official Remittance &amp; Payment Verification
            </h3>
            <p class="text-xs text-slate-600 leading-relaxed">
                Bank transfers and remittances should be payable to <strong>JOHN KELLY &amp; COMPANY</strong>. Following deposit or electronic bank transfer, kindly email your deposit slip or transmittal confirmation to <strong>billing@jkc.com.ph</strong> or upload a copy directly to your Transmittals module referencing your Invoice Number.
            </p>
        </div>
        <div class="flex items-center gap-2 flex-shrink-0">
            <a href="{{ route('jkc.support') }}" class="ordo-btn ordo-btn-secondary ordo-btn-sm text-xs">
                Billing Inquiries
            </a>
            <a href="{{ route('transmittals') }}" class="ordo-btn ordo-btn-outline ordo-btn-sm text-xs">
                Upload Deposit Slip
            </a>
        </div>
    </div>

</div>
@endsection