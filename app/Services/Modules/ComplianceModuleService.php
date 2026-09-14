<?php

namespace App\Services\Modules;

use App\Models\Account;
use App\Models\ComplianceRecord;
use App\Services\Modules\Concerns\DatabaseConnectivityCheck;
use App\Services\Modules\SampleData\ComplianceSampleData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class ComplianceModuleService
{
    use DatabaseConnectivityCheck;

    /**
     * Retrieve compliance records for the given account.
     */
    public function getRecords(?Account $account): Collection
    {
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('compliance_records')) {
                    $existingCount = ComplianceRecord::where('account_id', $accountId)->count();
                    if ($existingCount === 0) {
                        $sessionKey = 'client.compliance_records.' . $accountId;
                        $stored = session($sessionKey);
                        $seedData = is_array($stored) && !empty($stored)
                            ? $stored
                            : ComplianceSampleData::get($accountId, $account?->users()->first()?->id);

                        foreach ($seedData as $item) {
                            $data = is_array($item) ? $item : (array) $item;
                            unset($data['id'], $data['formatted_due_date'], $data['formatted_effective_date'], $data['status_badge_class']);
                            $data['account_id'] = $accountId;
                            ComplianceRecord::create($data);
                        }
                    }

                    $dbRecords = ComplianceRecord::where('account_id', $accountId)
                        ->orderBy('due_date', 'asc')
                        ->get();
                    if ($dbRecords->isNotEmpty()) {
                        return $dbRecords;
                    }
                }
            } catch (\Throwable $e) {
                // Fallback to session on database error
            }
        }

        $sessionKey = 'client.compliance_records.' . $accountId;
        $stored = session($sessionKey);

        if ($stored === null) {
            $default = ComplianceSampleData::get($accountId, $account?->users()->first()?->id);
            session([$sessionKey => $default]);
            $stored = $default;
        }

        return collect($stored)->map(function ($item) {
            return is_array($item) ? (object) $item : $item;
        });
    }

    /**
     * Calculate summary statistics for compliance dashboard.
     */
    public function calculateStats(Collection $records): array
    {
        return [
            'total' => $records->count(),
            'due_soon' => $records->where('status', 'Due Soon')->count(),
            'scheduled' => $records->where('status', 'Scheduled')->count(),
            'monitoring' => $records->where('status', 'Monitoring')->count(),
            'compliant' => $records->where('status', 'Compliant')->count(),
        ];
    }

    /**
     * Store a new compliance entry for the active account.
     */
    public function store(Request $request, ?Account $account): array
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'agency' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'due_date' => 'required|date',
            'status' => 'required|string|in:Due Soon,Scheduled,Monitoring,Compliant',
            'frequency' => 'nullable|string|max:50',
            'effective_date' => 'nullable|date',
            'responsible_person' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:2000',
            'attachment' => 'nullable|file|max:10240',
        ]);

        $user = $request->user();
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        // Generate Reference Number (e.g. CMP-00125)
        $existingRecords = $this->getRecords($account);
        $maxNum = 124;
        foreach ($existingRecords as $rec) {
            $ref = is_array($rec) ? ($rec['reference_no'] ?? '') : ($rec->reference_no ?? '');
            if (preg_match('/CMP-(\d+)/', $ref, $matches)) {
                $num = (int) $matches[1];
                if ($num > $maxNum) {
                    $maxNum = $num;
                }
            }
        }
        $referenceNo = 'CMP-' . str_pad($maxNum + 1, 5, '0', STR_PAD_LEFT);

        $attachmentPath = null;
        $attachmentName = null;
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $file = $request->file('attachment');
            $attachmentName = $file->getClientOriginalName();
            $attachmentPath = $file->store('compliance_attachments', 'public');
        }

        $badgeClass = match (strtolower(trim($validated['status']))) {
            'due soon', 'due' => 'due',
            'scheduled' => 'scheduled',
            'monitoring' => 'monitoring',
            'compliant', 'completed', 'active' => 'compliant',
            default => 'scheduled',
        };

        $recordData = [
            'account_id' => $accountId,
            'user_id' => $user?->id,
            'reference_no' => $referenceNo,
            'title' => $validated['title'],
            'agency' => $validated['agency'],
            'category' => $validated['category'],
            'frequency' => $validated['frequency'] ?? 'As Needed',
            'effective_date' => $validated['effective_date'] ?? null,
            'due_date' => $validated['due_date'],
            'responsible_person' => $validated['responsible_person'] ?? null,
            'status' => $validated['status'],
            'description' => $validated['description'] ?? null,
            'attachment_path' => $attachmentPath,
            'attachment_name' => $attachmentName,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ];

        // 1. Persist to database via Eloquent if database is accessible
        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('compliance_records')) {
                    $model = ComplianceRecord::create($recordData);
                    $recordData['id'] = $model->id;
                }
            } catch (\Throwable $e) {
                // Fallback to timestamp ID
            }
        }
        if (empty($recordData['id'])) {
            $recordData['id'] = time();
        }

        // Add formatted display helpers
        $recordData['formatted_due_date'] = Carbon::parse($validated['due_date'])->format('M d, Y');
        $recordData['formatted_effective_date'] = !empty($validated['effective_date'])
            ? Carbon::parse($validated['effective_date'])->format('M d, Y')
            : null;
        $recordData['status_badge_class'] = $badgeClass;

        // 2. Also persist in session storage for resilience and V1 offline support
        $sessionKey = 'client.compliance_records.' . $accountId;
        $sessionRecords = session($sessionKey);
        if ($sessionRecords === null) {
            $sessionRecords = ComplianceSampleData::get($accountId, $user?->id);
        }
        array_unshift($sessionRecords, $recordData);
        session([$sessionKey => $sessionRecords]);

        $updatedRecords = $this->getRecords($account);
        $updatedStats = $this->calculateStats($updatedRecords);

        $successMsg = 'Compliance requirement "' . $validated['title'] . '" was successfully created and recorded.';

        return [
            'success' => true,
            'message' => $successMsg,
            'record' => $recordData,
            'stats' => $updatedStats,
        ];
    }

    /**
     * Update an existing compliance entry for the active account.
     */
    public function update(Request $request, $id, ?Account $account): array
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'agency' => 'required|string|max:100',
            'category' => 'required|string|max:100',
            'due_date' => 'required|date',
            'status' => 'required|string|in:Due Soon,Scheduled,Monitoring,Compliant',
            'frequency' => 'nullable|string|max:50',
            'effective_date' => 'nullable|date',
            'responsible_person' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:2000',
            'attachment' => 'nullable|file|max:10240',
        ]);

        $user = $request->user();
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        $badgeClass = match (strtolower(trim($validated['status']))) {
            'due soon', 'due' => 'due',
            'scheduled' => 'scheduled',
            'monitoring' => 'monitoring',
            'compliant', 'completed', 'active' => 'compliant',
            default => 'scheduled',
        };

        $attachmentPath = null;
        $attachmentName = null;
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $file = $request->file('attachment');
            $attachmentName = $file->getClientOriginalName();
            $attachmentPath = $file->store('compliance_attachments', 'public');
        }

        $updatedRecord = null;

        // 1. Update in Database if connected
        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('compliance_records')) {
                    $model = ComplianceRecord::where('account_id', $accountId)
                        ->where('id', $id)
                        ->first();

                    if ($model) {
                        $model->title = $validated['title'];
                        $model->agency = $validated['agency'];
                        $model->category = $validated['category'];
                        $model->frequency = $validated['frequency'] ?? 'As Needed';
                        $model->effective_date = $validated['effective_date'] ?? null;
                        $model->due_date = $validated['due_date'];
                        $model->responsible_person = $validated['responsible_person'] ?? null;
                        $model->status = $validated['status'];
                        $model->description = $validated['description'] ?? null;
                        if ($attachmentPath) {
                            $model->attachment_path = $attachmentPath;
                            $model->attachment_name = $attachmentName;
                        }
                        $model->save();

                        $updatedRecord = $model->toArray();
                        $updatedRecord['formatted_due_date'] = Carbon::parse($model->due_date)->format('M d, Y');
                        $updatedRecord['formatted_effective_date'] = !empty($model->effective_date)
                            ? Carbon::parse($model->effective_date)->format('M d, Y')
                            : null;
                        $updatedRecord['status_badge_class'] = $badgeClass;
                    }
                }
            } catch (\Throwable $e) {
                // Continue to session fallback
            }
        }

        // 2. Update in Session Storage for resilience
        $sessionKey = 'client.compliance_records.' . $accountId;
        $sessionRecords = session($sessionKey);
        if ($sessionRecords === null) {
            $sessionRecords = ComplianceSampleData::get($accountId, $user?->id);
        }

        $sessionFound = false;
        foreach ($sessionRecords as &$rec) {
            $recId = is_array($rec) ? ($rec['id'] ?? null) : ($rec->id ?? null);
            if ((string) $recId === (string) $id) {
                $sessionFound = true;
                if (is_array($rec)) {
                    $rec['title'] = $validated['title'];
                    $rec['agency'] = $validated['agency'];
                    $rec['category'] = $validated['category'];
                    $rec['frequency'] = $validated['frequency'] ?? 'As Needed';
                    $rec['effective_date'] = $validated['effective_date'] ?? null;
                    $rec['due_date'] = $validated['due_date'];
                    $rec['responsible_person'] = $validated['responsible_person'] ?? null;
                    $rec['status'] = $validated['status'];
                    $rec['status_badge_class'] = $badgeClass;
                    $rec['description'] = $validated['description'] ?? null;
                    $rec['formatted_due_date'] = Carbon::parse($validated['due_date'])->format('M d, Y');
                    $rec['formatted_effective_date'] = !empty($validated['effective_date'])
                        ? Carbon::parse($validated['effective_date'])->format('M d, Y')
                        : null;
                    if ($attachmentPath) {
                        $rec['attachment_path'] = $attachmentPath;
                        $rec['attachment_name'] = $attachmentName;
                    }
                    if (!$updatedRecord) {
                        $updatedRecord = $rec;
                    }
                } else {
                    $rec->title = $validated['title'];
                    $rec->agency = $validated['agency'];
                    $rec->category = $validated['category'];
                    $rec->frequency = $validated['frequency'] ?? 'As Needed';
                    $rec->effective_date = $validated['effective_date'] ?? null;
                    $rec->due_date = $validated['due_date'];
                    $rec->responsible_person = $validated['responsible_person'] ?? null;
                    $rec->status = $validated['status'];
                    $rec->status_badge_class = $badgeClass;
                    $rec->description = $validated['description'] ?? null;
                    $rec->formatted_due_date = Carbon::parse($validated['due_date'])->format('M d, Y');
                    $rec->formatted_effective_date = !empty($validated['effective_date'])
                        ? Carbon::parse($validated['effective_date'])->format('M d, Y')
                        : null;
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

        $updatedStats = $this->calculateStats($this->getRecords($account));
        $successMsg = 'Compliance requirement "' . $validated['title'] . '" was successfully updated.';

        return [
            'success' => true,
            'message' => $successMsg,
            'record' => $updatedRecord,
            'stats' => $updatedStats,
        ];
    }
}
