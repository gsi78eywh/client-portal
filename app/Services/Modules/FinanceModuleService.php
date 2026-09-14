<?php

namespace App\Services\Modules;

use App\Models\Account;
use App\Models\FinanceRecord;
use App\Services\Modules\Concerns\DatabaseConnectivityCheck;
use App\Services\Modules\SampleData\FinanceSampleData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class FinanceModuleService
{
    use DatabaseConnectivityCheck;

    /**
     * Retrieve Finance records for the active account.
     */
    public function getRecords(?Account $account): Collection
    {
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('finance_records')) {
                    $existingCount = FinanceRecord::where('account_id', $accountId)->count();
                    if ($existingCount === 0) {
                        $sessionKey = 'client.finance_records.' . $accountId;
                        $stored = session($sessionKey);
                        $seedData = is_array($stored) && !empty($stored)
                            ? $stored
                            : FinanceSampleData::get($accountId, $account?->users()->first()?->id);

                        foreach ($seedData as $item) {
                            $data = is_array($item) ? $item : (array) $item;
                            unset($data['id'], $data['formatted_amount'], $data['formatted_record_date'], $data['formatted_due_date']);
                            $data['account_id'] = $accountId;
                            FinanceRecord::create($data);
                        }
                    }

                    $dbRecords = FinanceRecord::where('account_id', $accountId)
                        ->orderBy('id', 'desc')
                        ->get();
                    if ($dbRecords->isNotEmpty()) {
                        return $dbRecords;
                    }
                }
            } catch (\Throwable $e) {
                // Fallback to session on database error
            }
        }

        $sessionKey = 'client.finance_records.' . $accountId;
        $stored = session($sessionKey);

        if ($stored === null) {
            $default = FinanceSampleData::get($accountId, $account?->users()->first()?->id);
            session([$sessionKey => $default]);
            $stored = $default;
        }

        return collect($stored)->map(function ($item) {
            return is_array($item) ? (object) $item : $item;
        });
    }

    /**
     * Calculate summary statistics for Finance dashboard.
     */
    public function calculateStats(Collection $records): array
    {
        // 1. Receivables: Sum and count
        $receivablesRecords = $records->where('record_type', 'receivable');
        $receivablesRaw = $receivablesRecords->sum(function ($item) {
            return (float) (is_array($item) ? ($item['amount'] ?? 0) : ($item->amount ?? 0));
        });
        $receivablesCount = $receivablesRecords->count();
        $receivablesDueSoon = $receivablesRecords->filter(function ($item) {
            $st = strtolower(trim(is_array($item) ? ($item['status'] ?? '') : ($item->status ?? '')));
            return in_array($st, ['unpaid', 'due', 'due soon', 'pending']);
        })->sum(function ($item) {
            return (float) (is_array($item) ? ($item['amount'] ?? 0) : ($item->amount ?? 0));
        });

        // 2. Payables: Sum and count
        $payablesRecords = $records->where('record_type', 'payable');
        $payablesRaw = $payablesRecords->sum(function ($item) {
            return (float) (is_array($item) ? ($item['amount'] ?? 0) : ($item->amount ?? 0));
        });
        $payablesCount = $payablesRecords->count();
        $payablesOpenCount = $payablesRecords->filter(function ($item) {
            $st = strtolower(trim(is_array($item) ? ($item['status'] ?? '') : ($item->status ?? '')));
            return in_array($st, ['approved', 'unpaid', 'pending', 'scheduled']);
        })->count();

        // 3. Expenses: Sum and count
        $expensesRecords = $records->where('record_type', 'expense');
        $expensesRaw = $expensesRecords->sum(function ($item) {
            return (float) (is_array($item) ? ($item['amount'] ?? 0) : ($item->amount ?? 0));
        });
        $expensesCount = $expensesRecords->count();

        // 4. Transactions: Count and volume
        $transactionsRecords = $records->where('record_type', 'transaction');
        $transactionsCount = $transactionsRecords->count();
        $transactionsVolume = $transactionsRecords->sum(function ($item) {
            return (float) (is_array($item) ? ($item['amount'] ?? 0) : ($item->amount ?? 0));
        });

        // 5. Total Finance Records
        $totalFinanceRecords = $records->count();

        return [
            'receivables' => $this->formatShortK($receivablesRaw),
            'receivables_raw' => $receivablesRaw,
            'receivables_count' => $receivablesCount,
            'receivables_meta' => $receivablesDueSoon > 0 ? ($this->formatShortK($receivablesDueSoon) . ' due soon') : ($receivablesCount . ' active items'),
            'payables' => $this->formatShortK($payablesRaw),
            'payables_raw' => $payablesRaw,
            'payables_count' => $payablesCount,
            'payables_meta' => $payablesOpenCount . ' open items',
            'expenses' => $this->formatShortK($expensesRaw),
            'expenses_raw' => $expensesRaw,
            'expenses_count' => $expensesCount,
            'expenses_meta' => 'Within budget',
            'transactions' => $transactionsCount,
            'transactions_volume' => $this->formatShortK($transactionsVolume),
            'transactions_meta' => 'Settled & posted',
            'finance_records' => $totalFinanceRecords,
            'finance_records_meta' => $totalFinanceRecords . ' ledger entries',
        ];
    }

    /**
     * Format large currency amounts (e.g. ₱225K, ₱1.2M).
     */
    public function formatShortK(float $amount): string
    {
        if ($amount >= 1000000) {
            return '₱' . round($amount / 1000000, 1) . 'M';
        }
        if ($amount >= 1000) {
            return '₱' . round($amount / 1000) . 'K';
        }
        return '₱' . number_format($amount, 0);
    }

    /**
     * Store a new Finance record for the active account.
     */
    public function store(Request $request, ?Account $account): array
    {
        $validated = $request->validate([
            'record_type' => 'required|string|in:finance_record,transaction,request,expense,receivable,payable',
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'record_date' => 'required|date',
            'status' => 'required|string|max:50',
            'amount' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'due_date' => 'nullable|date',
            'description' => 'nullable|string|max:3000',
            'metadata' => 'nullable|array',
            'attachment' => 'nullable|file|max:10240',
        ]);

        $user = $request->user();
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        $prefix = match ($validated['record_type']) {
            'receivable' => 'INV',
            'payable' => 'PAY',
            'expense' => 'EXP',
            'transaction' => 'TRX',
            'request' => 'REQ',
            default => 'FIN',
        };

        // Determine reference number
        $existingRecords = $this->getRecords($account);
        $maxNum = match ($prefix) {
            'INV' => 184,
            'PAY' => 63,
            'EXP' => 147,
            'TRX' => 36,
            'REQ' => 13,
            default => 97,
        };

        foreach ($existingRecords as $rec) {
            $ref = is_array($rec) ? ($rec['reference_no'] ?? '') : ($rec->reference_no ?? '');
            if (preg_match('/' . $prefix . '-2026-(\d+)/', $ref, $matches)) {
                $num = (int) $matches[1];
                if ($num > $maxNum) {
                    $maxNum = $num;
                }
            }
        }
        $referenceNo = sprintf('%s-2026-%04d', $prefix, $maxNum + 1);

        $attachmentPath = null;
        $attachmentName = null;
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $file = $request->file('attachment');
            $attachmentName = $file->getClientOriginalName();
            $attachmentPath = $file->store('finance_attachments', 'public');
        }

        $badgeClass = match (strtolower(trim($validated['status']))) {
            'approved', 'paid', 'cleared', 'final' => 'approved',
            'unpaid', 'due', 'due soon', 'pending payment' => 'unpaid',
            'submitted', 'scheduled', 'processing' => 'scheduled',
            'for review', 'review', 'in review', 'pending', 'pending approval' => 'review',
            default => 'scheduled',
        };

        $incomingMeta = (array) $request->input('metadata', []);
        $knownFields = ['record_type', 'title', 'category', 'record_date', 'status', 'amount', 'currency', 'due_date', 'description', 'attachment', '_token', '_method'];
        foreach ($request->except($knownFields) as $k => $v) {
            if (!isset($incomingMeta[$k]) && !is_null($v) && $v !== '') {
                $incomingMeta[$k] = $v;
            }
        }

        $recordData = [
            'account_id' => $accountId,
            'user_id' => $user?->id,
            'record_type' => $validated['record_type'],
            'reference_no' => $referenceNo,
            'title' => $validated['title'],
            'category' => $validated['category'],
            'amount' => !empty($validated['amount']) ? (float) $validated['amount'] : 0.00,
            'currency' => $validated['currency'] ?? 'PHP',
            'record_date' => $validated['record_date'],
            'due_date' => $validated['due_date'] ?? null,
            'status' => $validated['status'],
            'status_badge_class' => $badgeClass,
            'description' => $validated['description'] ?? null,
            'metadata' => $incomingMeta,
            'attachment_path' => $attachmentPath,
            'attachment_name' => $attachmentName,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ];

        $createdRecord = null;

        // 1. Persist to database if accessible
        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('finance_records')) {
                    $model = FinanceRecord::create($recordData);
                    $createdRecord = $model->toArray();
                    $createdRecord['formatted_record_date'] = Carbon::parse($model->record_date)->format('M d, Y');
                    $createdRecord['formatted_due_date'] = !empty($model->due_date) ? Carbon::parse($model->due_date)->format('M d, Y') : null;
                    $createdRecord['formatted_amount'] = '₱' . number_format((float) $model->amount, 2);
                    $createdRecord['record_type_label'] = match ($model->record_type) {
                        'receivable' => 'Receivable',
                        'payable' => 'Payable',
                        'expense' => 'Expense',
                        'transaction' => 'Transaction',
                        'request' => 'Request',
                        default => 'Finance Record',
                    };
                }
            } catch (\Throwable $e) {
                // Fallback to session
            }
        }

        // 2. Also persist in session storage for resilience
        $sessionKey = 'client.finance_records.' . $accountId;
        $sessionRecords = session($sessionKey);
        if ($sessionRecords === null) {
            $sessionRecords = FinanceSampleData::get($accountId, $user?->id);
        }

        $sessionItem = $recordData;
        $sessionItem['id'] = $createdRecord['id'] ?? (count($sessionRecords) + 1);
        $sessionItem['formatted_record_date'] = Carbon::parse($validated['record_date'])->format('M d, Y');
        $sessionItem['formatted_due_date'] = !empty($validated['due_date']) ? Carbon::parse($validated['due_date'])->format('M d, Y') : null;
        $sessionItem['formatted_amount'] = '₱' . number_format((float) ($validated['amount'] ?? 0), 2);
        $sessionItem['record_type_label'] = match ($validated['record_type']) {
            'receivable' => 'Receivable',
            'payable' => 'Payable',
            'expense' => 'Expense',
            'transaction' => 'Transaction',
            'request' => 'Request',
            default => 'Finance Record',
        };

        array_unshift($sessionRecords, $sessionItem);
        session([$sessionKey => $sessionRecords]);

        if (!$createdRecord) {
            $createdRecord = $sessionItem;
        }

        $updatedStats = $this->calculateStats($this->getRecords($account));
        $successMsg = 'Finance record "' . $validated['title'] . '" was successfully recorded.';

        return [
            'success' => true,
            'message' => $successMsg,
            'record' => $createdRecord,
            'stats' => $updatedStats,
        ];
    }

    /**
     * Update an existing Finance record.
     */
    public function update(Request $request, $id, ?Account $account): array
    {
        $validated = $request->validate([
            'record_type' => 'required|string|in:finance_record,transaction,request,expense,receivable,payable',
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'record_date' => 'required|date',
            'status' => 'required|string|max:50',
            'amount' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'due_date' => 'nullable|date',
            'description' => 'nullable|string|max:3000',
            'metadata' => 'nullable|array',
            'attachment' => 'nullable|file|max:10240',
        ]);

        $user = $request->user();
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        $badgeClass = match (strtolower(trim($validated['status']))) {
            'approved', 'paid', 'cleared', 'final' => 'approved',
            'unpaid', 'due', 'due soon', 'pending payment' => 'unpaid',
            'submitted', 'scheduled', 'processing' => 'scheduled',
            'for review', 'review', 'in review', 'pending', 'pending approval' => 'review',
            default => 'scheduled',
        };

        $attachmentPath = null;
        $attachmentName = null;
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $file = $request->file('attachment');
            $attachmentName = $file->getClientOriginalName();
            $attachmentPath = $file->store('finance_attachments', 'public');
        }

        $updatedRecord = null;

        $incomingMeta = (array) $request->input('metadata', []);
        $knownFields = ['record_type', 'title', 'category', 'record_date', 'status', 'amount', 'currency', 'due_date', 'description', 'attachment', '_token', '_method'];
        foreach ($request->except($knownFields) as $k => $v) {
            if (!isset($incomingMeta[$k]) && !is_null($v) && $v !== '') {
                $incomingMeta[$k] = $v;
            }
        }

        // 1. Update in Database if connected
        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('finance_records')) {
                    $model = FinanceRecord::where('account_id', $accountId)
                        ->where('id', $id)
                        ->first();

                    if ($model) {
                        $model->record_type = $validated['record_type'];
                        $model->title = $validated['title'];
                        $model->category = $validated['category'];
                        $model->record_date = $validated['record_date'];
                        $model->status = $validated['status'];
                        $model->status_badge_class = $badgeClass;
                        $model->amount = !empty($validated['amount']) ? (float) $validated['amount'] : 0.00;
                        $model->currency = $validated['currency'] ?? 'PHP';
                        $model->due_date = $validated['due_date'] ?? null;
                        $model->description = $validated['description'] ?? null;
                        if (!empty($incomingMeta) || $request->has('metadata')) {
                            $model->metadata = $incomingMeta;
                        }
                        if ($attachmentPath) {
                            $model->attachment_path = $attachmentPath;
                            $model->attachment_name = $attachmentName;
                        }
                        $model->save();

                        $updatedRecord = $model->toArray();
                        $updatedRecord['formatted_record_date'] = Carbon::parse($model->record_date)->format('M d, Y');
                        $updatedRecord['formatted_due_date'] = !empty($model->due_date) ? Carbon::parse($model->due_date)->format('M d, Y') : null;
                        $updatedRecord['formatted_amount'] = '₱' . number_format((float) $model->amount, 2);
                        $updatedRecord['record_type_label'] = match ($model->record_type) {
                            'receivable' => 'Receivable',
                            'payable' => 'Payable',
                            'expense' => 'Expense',
                            'transaction' => 'Transaction',
                            'request' => 'Request',
                            default => 'Finance Record',
                        };
                    }
                }
            } catch (\Throwable $e) {
                // Fallback to session
            }
        }

        // 2. Update in Session Storage for resilience
        $sessionKey = 'client.finance_records.' . $accountId;
        $sessionRecords = session($sessionKey);
        if ($sessionRecords === null) {
            $sessionRecords = FinanceSampleData::get($accountId, $user?->id);
        }

        $sessionFound = false;
        foreach ($sessionRecords as &$rec) {
            $recId = is_array($rec) ? ($rec['id'] ?? null) : ($rec->id ?? null);
            if ((string) $recId === (string) $id) {
                $sessionFound = true;
                if (is_array($rec)) {
                    $rec['record_type'] = $validated['record_type'];
                    $rec['title'] = $validated['title'];
                    $rec['category'] = $validated['category'];
                    $rec['record_date'] = $validated['record_date'];
                    $rec['status'] = $validated['status'];
                    $rec['status_badge_class'] = $badgeClass;
                    $rec['amount'] = !empty($validated['amount']) ? (float) $validated['amount'] : 0.00;
                    $rec['currency'] = $validated['currency'] ?? 'PHP';
                    $rec['due_date'] = $validated['due_date'] ?? null;
                    $rec['description'] = $validated['description'] ?? null;
                    if (!empty($incomingMeta) || $request->has('metadata')) {
                        $rec['metadata'] = $incomingMeta;
                    }
                    $rec['formatted_record_date'] = Carbon::parse($validated['record_date'])->format('M d, Y');
                    $rec['formatted_due_date'] = !empty($validated['due_date']) ? Carbon::parse($validated['due_date'])->format('M d, Y') : null;
                    $rec['formatted_amount'] = '₱' . number_format((float) ($validated['amount'] ?? 0), 2);
                    $rec['record_type_label'] = match ($validated['record_type']) {
                        'receivable' => 'Receivable',
                        'payable' => 'Payable',
                        'expense' => 'Expense',
                        'transaction' => 'Transaction',
                        'request' => 'Request',
                        default => 'Finance Record',
                    };
                    if ($attachmentPath) {
                        $rec['attachment_path'] = $attachmentPath;
                        $rec['attachment_name'] = $attachmentName;
                    }
                    if (!$updatedRecord) {
                        $updatedRecord = $rec;
                    }
                } else {
                    $rec->record_type = $validated['record_type'];
                    $rec->title = $validated['title'];
                    $rec->category = $validated['category'];
                    $rec->record_date = $validated['record_date'];
                    $rec->status = $validated['status'];
                    $rec->status_badge_class = $badgeClass;
                    $rec->amount = !empty($validated['amount']) ? (float) $validated['amount'] : 0.00;
                    $rec->currency = $validated['currency'] ?? 'PHP';
                    $rec->due_date = $validated['due_date'] ?? null;
                    $rec->description = $validated['description'] ?? null;
                    if (!empty($incomingMeta) || $request->has('metadata')) {
                        $rec->metadata = $incomingMeta;
                    }
                    $rec->formatted_record_date = Carbon::parse($validated['record_date'])->format('M d, Y');
                    $rec->formatted_due_date = !empty($validated['due_date']) ? Carbon::parse($validated['due_date'])->format('M d, Y') : null;
                    $rec->formatted_amount = '₱' . number_format((float) ($validated['amount'] ?? 0), 2);
                    $rec->record_type_label = match ($validated['record_type']) {
                        'receivable' => 'Receivable',
                        'payable' => 'Payable',
                        'expense' => 'Expense',
                        'transaction' => 'Transaction',
                        'request' => 'Request',
                        default => 'Finance Record',
                    };
                    if ($attachmentPath) {
                        $rec->attachment_path = $attachmentPath;
                        $rec->attachment_name = $attachmentName;
                    }
                    if (!$updatedRecord) {
                        $updatedRecord = (array) $rec;
                    }
                }
                break;
            }
        }
        unset($rec);

        session([$sessionKey => $sessionRecords]);

        if (!$updatedRecord) {
            $updatedRecord = [
                'id' => $id,
                'record_type' => $validated['record_type'],
                'title' => $validated['title'],
                'category' => $validated['category'],
                'record_date' => $validated['record_date'],
                'status' => $validated['status'],
                'status_badge_class' => $badgeClass,
                'amount' => !empty($validated['amount']) ? (float) $validated['amount'] : 0.00,
                'currency' => $validated['currency'] ?? 'PHP',
                'due_date' => $validated['due_date'] ?? null,
                'description' => $validated['description'] ?? null,
                'metadata' => $request->input('metadata', []),
                'attachment_path' => $attachmentPath,
                'attachment_name' => $attachmentName,
                'formatted_record_date' => Carbon::parse($validated['record_date'])->format('M d, Y'),
                'formatted_due_date' => !empty($validated['due_date']) ? Carbon::parse($validated['due_date'])->format('M d, Y') : null,
                'formatted_amount' => '₱' . number_format((float) ($validated['amount'] ?? 0), 2),
                'record_type_label' => match ($validated['record_type']) {
                    'receivable' => 'Receivable',
                    'payable' => 'Payable',
                    'expense' => 'Expense',
                    'transaction' => 'Transaction',
                    'request' => 'Request',
                    default => 'Finance Record',
                },
            ];
        }

        $updatedStats = $this->calculateStats($this->getRecords($account));
        $successMsg = 'Finance record "' . $validated['title'] . '" was successfully updated.';

        return [
            'success' => true,
            'message' => $successMsg,
            'record' => $updatedRecord,
            'stats' => $updatedStats,
        ];
    }
}
