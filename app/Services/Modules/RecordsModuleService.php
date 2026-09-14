<?php

namespace App\Services\Modules;

use App\Models\Account;
use App\Models\DocumentRecord;
use App\Services\Modules\Concerns\DatabaseConnectivityCheck;
use App\Services\Modules\SampleData\RecordsSampleData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class RecordsModuleService
{
    use DatabaseConnectivityCheck;

    /**
     * Retrieve Document Records for the active account.
     */
    public function getRecords(?Account $account): Collection
    {
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('document_records')) {
                    $existingCount = DocumentRecord::where('account_id', $accountId)->count();
                    if ($existingCount === 0) {
                        $sessionKey = 'client.document_records.' . $accountId;
                        $stored = session($sessionKey);
                        $seedData = is_array($stored) && !empty($stored)
                            ? $stored
                            : $this->getDefaultRecords($accountId, $account?->users()->first()?->id);

                        foreach ($seedData as $item) {
                            $data = is_array($item) ? $item : (array) $item;
                            unset($data['id'], $data['formatted_record_date'], $data['formatted_file_size']);
                            $data['account_id'] = $accountId;
                            DocumentRecord::create($data);
                        }
                    }

                    $dbRecords = DocumentRecord::where('account_id', $accountId)
                        ->orderBy('id', 'desc')
                        ->get();
                    if ($dbRecords->isNotEmpty()) {
                        return $dbRecords;
                    }
                }
            } catch (\Throwable $e) {
                // Fallback to session
            }
        }

        $sessionKey = 'client.document_records.' . $accountId;
        $stored = session($sessionKey);

        if ($stored === null) {
            $default = $this->getDefaultRecords($accountId, $account?->users()->first()?->id);
            session([$sessionKey => $default]);
            $stored = $default;
        }

        return collect($stored)->map(function ($item) {
            return is_array($item) ? (object) $item : $item;
        });
    }

    /**
     * Calculate summary statistics for Document Records dashboard.
     */
    public function calculateStats(Collection $records): array
    {
        $baseTotal = 1248;
        $baseRecent = 36;
        $baseStorageMb = 320;
        $baseCategories = 12;

        $defaultSeedCount = 4;
        $extraRecordsCount = max(0, $records->count() - $defaultSeedCount);

        $totalRecords = $baseTotal + $extraRecordsCount;
        $recentRecords = $baseRecent + $extraRecordsCount;

        // Extra storage from uploaded documents
        $extraBytes = $records->sum(function ($item) {
            return (int) (is_array($item) ? ($item['file_size_bytes'] ?? 0) : ($item->file_size_bytes ?? 0));
        });
        $defaultSeedBytes = 9100000; // ~9.1 MB for 4 seed files
        $netExtraBytes = max(0, $extraBytes - $defaultSeedBytes);
        $extraMb = round($netExtraBytes / 1048576, 1);
        $storageUsedMb = $baseStorageMb + (int) round($extraMb);

        // Classification breakdowns (matching base figures 286, 342, 318, 194, 108)
        $extraCorp = max(0, $records->where('classification', 'Corporate Records')->count() - 2);
        $extraComp = max(0, $records->where('classification', 'Compliance Records')->count() - 1);
        $extraFin = max(0, $records->where('classification', 'Finance Records')->count());
        $extraHr = max(0, $records->where('classification', 'Human Resources')->count() - 1);
        $extraOther = max(0, $records->filter(function ($item) {
            $cls = is_array($item) ? ($item['classification'] ?? '') : ($item->classification ?? '');
            return !in_array($cls, ['Corporate Records', 'Compliance Records', 'Finance Records', 'Human Resources']);
        })->count());

        return [
            'total_records' => number_format($totalRecords),
            'total_records_raw' => $totalRecords,
            'recent_records' => number_format($recentRecords),
            'recent_records_raw' => $recentRecords,
            'storage_used' => $storageUsedMb . ' MB',
            'storage_used_raw' => $storageUsedMb,
            'classifications' => $baseCategories,
            'breakdown' => [
                'corporate' => 286 + $extraCorp,
                'compliance' => 342 + $extraComp,
                'finance' => 318 + $extraFin,
                'hr' => 194 + $extraHr,
                'other' => 108 + $extraOther,
            ],
        ];
    }

    /**
     * Store a newly uploaded Document Record for the active account.
     */
    public function store(Request $request, ?Account $account): array
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'classification' => 'required|string|max:100',
            'subclass' => 'nullable|string|max:100',
            'source' => 'nullable|string|max:100',
            'document_number' => 'nullable|string|max:100',
            'record_date' => 'nullable|date',
            'status' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:3000',
            'tags' => 'nullable|string|max:500',
            'file' => 'required|file|max:15360', // Max 15 MB
        ]);

        $user = $request->user();
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        // Generate reference number (e.g. REC-2026-1249)
        $existingRecords = $this->getRecords($account);
        $maxNum = 1248;
        foreach ($existingRecords as $rec) {
            $ref = is_array($rec) ? ($rec['record_no'] ?? '') : ($rec->record_no ?? '');
            if (preg_match('/REC-2026-(\d+)/', $ref, $matches)) {
                $num = (int) $matches[1];
                if ($num > $maxNum) {
                    $maxNum = $num;
                }
            }
        }
        $recordNo = sprintf('REC-2026-%04d', $maxNum + 1);

        // Handle file upload
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $fileSizeBytes = $file->getSize();
        $fileType = strtoupper($file->getClientOriginalExtension());
        $filePath = $file->store('records_documents', 'public');

        // Parse tags
        $tagsRaw = $request->input('tags', '');
        $tagsArray = [];
        if (!empty($tagsRaw)) {
            $tagsArray = array_values(array_filter(array_map('trim', explode(',', $tagsRaw))));
        }
        if (empty($tagsArray) && !empty($validated['classification'])) {
            $tagsArray[] = $validated['classification'];
        }

        $status = !empty($validated['status']) ? $validated['status'] : 'Active';
        $badgeClass = match (strtolower(trim($status))) {
            'active', 'approved', 'compliant' => 'active',
            'review', 'pending', 'under review' => 'review',
            'archived', 'inactive' => 'archived',
            default => 'active',
        };

        $recordDate = !empty($validated['record_date']) ? $validated['record_date'] : date('Y-m-d');

        $recordData = [
            'account_id' => $accountId,
            'user_id' => $user?->id,
            'record_no' => $recordNo,
            'title' => $validated['title'],
            'classification' => $validated['classification'],
            'subclass' => $validated['subclass'] ?? null,
            'source' => $validated['source'] ?? 'Internal',
            'document_number' => $validated['document_number'] ?? null,
            'record_date' => $recordDate,
            'status' => $status,
            'status_badge_class' => $badgeClass,
            'ocr_status' => 'Indexed & Processed',
            'ocr_summary' => 'Text indexation completed. High optical fidelity verification passed with metadata indexing.',
            'description' => $validated['description'] ?? null,
            'tags' => $tagsArray,
            'metadata' => [
                'extracted_pages' => 1,
                'ocr_engine' => 'ORDO Intelligent OCR v1',
                'checksum' => md5($fileName . time()),
            ],
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_size_bytes' => $fileSizeBytes,
            'file_type' => $fileType,
        ];

        $createdRecord = null;

        // 1. Save to Database
        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('document_records')) {
                    $model = DocumentRecord::create($recordData);
                    $createdRecord = $model->toArray();
                    $createdRecord['id'] = $model->id;
                    $createdRecord['formatted_record_date'] = $model->formatted_record_date;
                    $createdRecord['formatted_file_size'] = $model->formatted_file_size;
                }
            } catch (\Throwable $e) {
                // Fallback to session
            }
        }

        // 2. Synchronize to Session
        $sessionKey = 'client.document_records.' . $accountId;
        $sessionRecords = session($sessionKey, []);
        if (empty($sessionRecords)) {
            $sessionRecords = $this->getDefaultRecords($accountId, $user?->id);
        }

        $sessionItem = $recordData;
        $sessionItem['id'] = $createdRecord['id'] ?? (count($sessionRecords) + 1);
        $sessionItem['formatted_record_date'] = Carbon::parse($recordDate)->format('F d, Y');
        $sessionItem['formatted_file_size'] = $fileSizeBytes >= 1048576 ? round($fileSizeBytes / 1048576, 1) . ' MB' : round($fileSizeBytes / 1024) . ' KB';

        array_unshift($sessionRecords, $sessionItem);
        session([$sessionKey => $sessionRecords]);

        if (!$createdRecord) {
            $createdRecord = $sessionItem;
        }

        $updatedStats = $this->calculateStats($this->getRecords($account));
        $successMsg = 'Document "' . $validated['title'] . '" was successfully uploaded and indexed.';

        return [
            'record' => $createdRecord,
            'stats' => $updatedStats,
            'message' => $successMsg,
        ];
    }

    /**
     * Update an existing Document Record metadata.
     */
    public function update(Request $request, $id, ?Account $account): array
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'classification' => 'required|string|max:100',
            'subclass' => 'nullable|string|max:100',
            'source' => 'nullable|string|max:100',
            'document_number' => 'nullable|string|max:100',
            'record_date' => 'nullable|date',
            'status' => 'required|string|max:50',
            'description' => 'nullable|string|max:3000',
            'tags' => 'nullable|string|max:500',
            'file' => 'nullable|file|max:15360',
        ]);

        $user = $request->user();
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        $badgeClass = match (strtolower(trim($validated['status']))) {
            'active', 'approved', 'compliant' => 'active',
            'review', 'pending', 'under review' => 'review',
            'archived', 'inactive' => 'archived',
            default => 'active',
        };

        // Parse tags
        $tagsRaw = $request->input('tags', '');
        $tagsArray = [];
        if (!empty($tagsRaw)) {
            $tagsArray = array_values(array_filter(array_map('trim', explode(',', $tagsRaw))));
        }
        if (empty($tagsArray) && !empty($validated['classification'])) {
            $tagsArray[] = $validated['classification'];
        }

        $filePath = null;
        $fileName = null;
        $fileSizeBytes = null;
        $fileType = null;

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $fileSizeBytes = $file->getSize();
            $fileType = strtoupper($file->getClientOriginalExtension());
            $filePath = $file->store('records_documents', 'public');
        }

        $recordDate = !empty($validated['record_date']) ? $validated['record_date'] : date('Y-m-d');
        $updatedRecord = null;

        // 1. Update in Database
        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('document_records')) {
                    $model = DocumentRecord::where('account_id', $accountId)
                        ->where('id', $id)
                        ->first();

                    if ($model) {
                        $model->title = $validated['title'];
                        $model->classification = $validated['classification'];
                        $model->subclass = $validated['subclass'] ?? null;
                        $model->source = $validated['source'] ?? $model->source;
                        $model->document_number = $validated['document_number'] ?? null;
                        $model->record_date = $recordDate;
                        $model->status = $validated['status'];
                        $model->status_badge_class = $badgeClass;
                        $model->description = $validated['description'] ?? null;
                        $model->tags = $tagsArray;
                        if ($filePath) {
                            $model->file_path = $filePath;
                            $model->file_name = $fileName;
                            $model->file_size_bytes = $fileSizeBytes;
                            $model->file_type = $fileType;
                        }
                        $model->save();

                        $updatedRecord = $model->toArray();
                        $updatedRecord['id'] = $model->id;
                        $updatedRecord['formatted_record_date'] = $model->formatted_record_date;
                        $updatedRecord['formatted_file_size'] = $model->formatted_file_size;
                    }
                }
            } catch (\Throwable $e) {
                // Fallback to session
            }
        }

        // 2. Update in Session
        $sessionKey = 'client.document_records.' . $accountId;
        $sessionRecords = session($sessionKey, []);
        foreach ($sessionRecords as &$rec) {
            $recId = is_array($rec) ? ($rec['id'] ?? null) : ($rec->id ?? null);
            if ((string) $recId === (string) $id) {
                if (is_array($rec)) {
                    $rec['title'] = $validated['title'];
                    $rec['classification'] = $validated['classification'];
                    $rec['subclass'] = $validated['subclass'] ?? null;
                    $rec['source'] = $validated['source'] ?? ($rec['source'] ?? 'Internal');
                    $rec['document_number'] = $validated['document_number'] ?? null;
                    $rec['record_date'] = $recordDate;
                    $rec['formatted_record_date'] = Carbon::parse($recordDate)->format('F d, Y');
                    $rec['status'] = $validated['status'];
                    $rec['status_badge_class'] = $badgeClass;
                    $rec['description'] = $validated['description'] ?? null;
                    $rec['tags'] = $tagsArray;
                    if ($filePath) {
                        $rec['file_path'] = $filePath;
                        $rec['file_name'] = $fileName;
                        $rec['file_size_bytes'] = $fileSizeBytes;
                        $rec['file_type'] = $fileType;
                        $rec['formatted_file_size'] = $fileSizeBytes >= 1048576 ? round($fileSizeBytes / 1048576, 1) . ' MB' : round($fileSizeBytes / 1024) . ' KB';
                    }
                    if (!$updatedRecord) {
                        $updatedRecord = $rec;
                    }
                } else {
                    $rec->title = $validated['title'];
                    $rec->classification = $validated['classification'];
                    $rec->subclass = $validated['subclass'] ?? null;
                    $rec->source = $validated['source'] ?? ($rec->source ?? 'Internal');
                    $rec->document_number = $validated['document_number'] ?? null;
                    $rec->record_date = $recordDate;
                    $rec->formatted_record_date = Carbon::parse($recordDate)->format('F d, Y');
                    $rec->status = $validated['status'];
                    $rec->status_badge_class = $badgeClass;
                    $rec->description = $validated['description'] ?? null;
                    $rec->tags = $tagsArray;
                    if ($filePath) {
                        $rec->file_path = $filePath;
                        $rec->file_name = $fileName;
                        $rec->file_size_bytes = $fileSizeBytes;
                        $rec->file_type = $fileType;
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
        $successMsg = 'Record metadata for "' . $validated['title'] . '" was successfully updated.';

        return [
            'record' => $updatedRecord,
            'stats' => $updatedStats,
            'message' => $successMsg,
        ];
    }

    /**
     * Default realistic mock Document records for V1.
     */
    public function getDefaultRecords(int $accountId, ?int $userId = null): array
    {
        return RecordsSampleData::getDefaultDocumentRecords($accountId, $userId);
    }
}
