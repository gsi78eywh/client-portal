<?php

namespace App\Services\Modules;

use App\Models\Account;
use App\Models\GovernanceRecord;
use App\Services\Modules\Concerns\DatabaseConnectivityCheck;
use App\Services\Modules\SampleData\GovernanceSampleData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class GovernanceModuleService
{
    use DatabaseConnectivityCheck;

    /**
     * Retrieve governance records for the given account.
     */
    public function getRecords(?Account $account): Collection
    {
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('governance_records')) {
                    $existingCount = GovernanceRecord::where('account_id', $accountId)->count();
                    if ($existingCount === 0) {
                        $sessionKey = 'client.governance_records.' . $accountId;
                        $stored = session($sessionKey);
                        $seedData = is_array($stored) && !empty($stored)
                            ? $stored
                            : GovernanceSampleData::get($accountId, $account?->users()->first()?->id);

                        foreach ($seedData as $item) {
                            $data = is_array($item) ? $item : (array) $item;
                            unset($data['id'], $data['formatted_record_date']);
                            $data['account_id'] = $accountId;
                            GovernanceRecord::create($data);
                        }
                    }

                    $dbRecords = GovernanceRecord::where('account_id', $accountId)
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

        $sessionKey = 'client.governance_records.' . $accountId;
        $stored = session($sessionKey);

        if ($stored === null) {
            $default = GovernanceSampleData::get($accountId, $account?->users()->first()?->id);
            session([$sessionKey => $default]);
            $stored = $default;
        }

        return collect($stored)->map(function ($item) {
            return is_array($item) ? (object) $item : $item;
        });
    }

    /**
     * Calculate summary statistics for entity & governance dashboard.
     */
    public function calculateStats(Collection $records): array
    {
        $activeEntitiesCount = $records->where('record_type', 'entity_profile')->filter(function ($item) {
            $st = strtolower(trim(is_array($item) ? ($item['status'] ?? '') : ($item->status ?? '')));
            return in_array($st, ['active', 'in good standing']);
        })->count();
        if ($activeEntitiesCount === 0) {
            $activeEntitiesCount = max(1, $records->where('record_type', 'entity_profile')->count());
        }

        $directorsCount = $records->where('record_type', 'director_officer')->count();

        $pendingActionsCount = $records->filter(function ($item) {
            $st = strtolower(trim(is_array($item) ? ($item['status'] ?? '') : ($item->status ?? '')));
            return in_array($st, [
                'for review', 'review', 'in review',
                'pending', 'pending action', 'pending approval',
                'pending signature', 'pending confirmation', 'pending verification',
                'pending registration', 'scheduled'
            ]);
        })->count();

        $totalGovernanceRecords = $records->count();

        return [
            'active_entities' => $activeEntitiesCount,
            'directors_officers' => $directorsCount,
            'pending_actions' => $pendingActionsCount,
            'governance_records' => $totalGovernanceRecords,
        ];
    }

    /**
     * Store a new entity & governance entry for the active account.
     */
    public function store(Request $request, ?Account $account): array
    {
        $validated = $request->validate([
            'record_type' => 'required|string|in:entity_profile,director_officer,ownership,meeting,resolution,corporate_record',
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'record_date' => 'required|date',
            'status' => 'required|string|max:50',
            'description' => 'nullable|string|max:3000',
            'metadata' => 'nullable|array',
            'attachment' => 'nullable|file|max:10240',
        ]);

        $user = $request->user();
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        $prefix = match ($validated['record_type']) {
            'entity_profile' => 'EP-2026-',
            'director_officer' => 'DO-2026-',
            'ownership' => 'OWN-2026-',
            'meeting' => 'MIN-2026-',
            'resolution' => 'BR-2026-',
            'corporate_record' => 'SC-2026-',
            default => 'GOV-2026-',
        };

        // Determine reference number
        $existingRecords = $this->getRecords($account)->where('record_type', $validated['record_type']);
        $maxNum = 0;
        foreach ($existingRecords as $rec) {
            $ref = is_array($rec) ? ($rec['reference_no'] ?? '') : ($rec->reference_no ?? '');
            if (preg_match('/-(\d+)$/', $ref, $matches)) {
                $num = (int) $matches[1];
                if ($num > $maxNum) {
                    $maxNum = $num;
                }
            }
        }
        $referenceNo = $prefix . str_pad($maxNum + 1, 3, '0', STR_PAD_LEFT);

        $attachmentPath = null;
        $attachmentName = null;
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $file = $request->file('attachment');
            $attachmentName = $file->getClientOriginalName();
            $attachmentPath = $file->store('governance_attachments', 'public');
        }

        $badgeClass = match (strtolower(trim($validated['status']))) {
            'approved' => 'approved',
            'final' => 'final',
            'active' => 'active',
            'scheduled' => 'scheduled',
            'for review', 'review', 'in review', 'pending' => 'review',
            default => 'active',
        };

        $incomingMeta = (array) $request->input('metadata', []);
        $knownFields = ['record_type', 'title', 'category', 'record_date', 'status', 'description', 'attachment', '_token', '_method'];
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
            'record_date' => $validated['record_date'],
            'status' => $validated['status'],
            'status_badge_class' => $badgeClass,
            'description' => $validated['description'] ?? null,
            'metadata' => $incomingMeta,
            'attachment_path' => $attachmentPath,
            'attachment_name' => $attachmentName,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ];

        // 1. Try to persist to database via Eloquent if database is accessible
        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('governance_records')) {
                    $model = GovernanceRecord::create($recordData);
                    $recordData['id'] = $model->id;
                }
            } catch (\Throwable $e) {
                // Fallback to timestamp ID
            }
        }
        if (empty($recordData['id'])) {
            $recordData['id'] = time();
        }

        $recordData['formatted_record_date'] = Carbon::parse($validated['record_date'])->format('M d, Y');

        // 2. Also persist in session storage for resilience and V1 offline support
        $sessionKey = 'client.governance_records.' . $accountId;
        $sessionRecords = session($sessionKey);
        if ($sessionRecords === null) {
            $sessionRecords = GovernanceSampleData::get($accountId, $user?->id);
        }
        array_unshift($sessionRecords, $recordData);
        session([$sessionKey => $sessionRecords]);

        $updatedRecords = $this->getRecords($account);
        $updatedStats = $this->calculateStats($updatedRecords);

        $typeName = match ($validated['record_type']) {
            'entity_profile' => 'Entity profile',
            'director_officer' => 'Director / officer entry',
            'ownership' => 'Ownership record',
            'meeting' => 'Meeting record',
            'resolution' => 'Resolution',
            'corporate_record' => 'Corporate record',
            default => 'Governance entry',
        };
        $successMsg = $typeName . ' "' . $validated['title'] . '" was successfully recorded.';

        return [
            'success' => true,
            'message' => $successMsg,
            'record' => $recordData,
            'stats' => $updatedStats,
        ];
    }

    /**
     * Update an existing entity & governance entry for the active account.
     */
    public function update(Request $request, $id, ?Account $account): array
    {
        $validated = $request->validate([
            'record_type' => 'required|string|in:entity_profile,director_officer,ownership,meeting,resolution,corporate_record',
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'record_date' => 'required|date',
            'status' => 'required|string|max:50',
            'description' => 'nullable|string|max:3000',
            'metadata' => 'nullable|array',
            'attachment' => 'nullable|file|max:10240',
        ]);

        $user = $request->user();
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        $badgeClass = match (strtolower(trim($validated['status']))) {
            'approved' => 'approved',
            'final' => 'final',
            'active' => 'active',
            'scheduled' => 'scheduled',
            'for review', 'review', 'in review', 'pending' => 'review',
            default => 'active',
        };

        $attachmentPath = null;
        $attachmentName = null;
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $file = $request->file('attachment');
            $attachmentName = $file->getClientOriginalName();
            $attachmentPath = $file->store('governance_attachments', 'public');
        }

        $updatedRecord = null;

        $incomingMeta = (array) $request->input('metadata', []);
        $knownFields = ['record_type', 'title', 'category', 'record_date', 'status', 'description', 'attachment', '_token', '_method'];
        foreach ($request->except($knownFields) as $k => $v) {
            if (!isset($incomingMeta[$k]) && !is_null($v) && $v !== '') {
                $incomingMeta[$k] = $v;
            }
        }

        // 1. Update in Database if connected
        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('governance_records')) {
                    $model = GovernanceRecord::where('account_id', $accountId)
                        ->where('id', $id)
                        ->first();

                    if ($model) {
                        $model->record_type = $validated['record_type'];
                        $model->title = $validated['title'];
                        $model->category = $validated['category'];
                        $model->record_date = $validated['record_date'];
                        $model->status = $validated['status'];
                        $model->status_badge_class = $badgeClass;
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
                    }
                }
            } catch (\Throwable $e) {
                // Continue to session fallback
            }
        }

        // 2. Update in Session Storage for resilience
        $sessionKey = 'client.governance_records.' . $accountId;
        $sessionRecords = session($sessionKey);
        if ($sessionRecords === null) {
            $sessionRecords = GovernanceSampleData::get($accountId, $user?->id);
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
                    $rec['description'] = $validated['description'] ?? null;
                    if (!empty($incomingMeta) || $request->has('metadata')) {
                        $rec['metadata'] = $incomingMeta;
                    }
                    $rec['formatted_record_date'] = Carbon::parse($validated['record_date'])->format('M d, Y');
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
                    $rec->description = $validated['description'] ?? null;
                    if (!empty($incomingMeta) || $request->has('metadata')) {
                        $rec->metadata = $incomingMeta;
                    }
                    $rec->formatted_record_date = Carbon::parse($validated['record_date'])->format('M d, Y');
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
                'description' => $validated['description'] ?? null,
                'metadata' => $request->input('metadata', []),
                'attachment_path' => $attachmentPath,
                'attachment_name' => $attachmentName,
                'formatted_record_date' => Carbon::parse($validated['record_date'])->format('M d, Y'),
            ];
        }

        $updatedStats = $this->calculateStats($this->getRecords($account));
        $successMsg = 'Governance record "' . $validated['title'] . '" was successfully updated.';

        return [
            'success' => true,
            'message' => $successMsg,
            'record' => $updatedRecord,
            'stats' => $updatedStats,
        ];
    }
}
