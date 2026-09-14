<?php

namespace App\Services\Modules;

use App\Models\Account;
use App\Models\TransmittalRecord;
use App\Services\Modules\Concerns\DatabaseConnectivityCheck;
use App\Services\Modules\SampleData\TransmittalsSampleData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class TransmittalsModuleService
{
    use DatabaseConnectivityCheck;

    /**
     * Retrieve Transmittal records for the active account.
     */
    public function getRecords(?Account $account): Collection
    {
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('transmittal_records')) {
                    $existingCount = TransmittalRecord::where('account_id', $accountId)->count();
                    if ($existingCount === 0) {
                        $sessionKey = 'client.transmittal_records.' . $accountId;
                        $stored = session($sessionKey);
                        $seedData = is_array($stored) && !empty($stored)
                            ? $stored
                            : $this->getDefaultRecords($accountId, $account?->users()->first()?->id);

                        foreach ($seedData as $item) {
                            $data = is_array($item) ? $item : (array) $item;
                            unset($data['id'], $data['formatted_transmittal_date'], $data['formatted_delivery_date'], $data['formatted_acknowledged_at']);
                            $data['account_id'] = $accountId;
                            TransmittalRecord::create($data);
                        }
                    }

                    $dbRecords = TransmittalRecord::where('account_id', $accountId)
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

        $sessionKey = 'client.transmittal_records.' . $accountId;
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
     * Calculate summary statistics for Transmittals dashboard.
     */
    public function calculateStats(Collection $records): array
    {
        $baseIncoming = 28;
        $baseOutgoing = 41;
        $basePending = 6;
        $baseReceived = 63;
        $baseDelivered = 35;
        $baseProcessing = 4;

        $extraIncoming = $records->where('type', 'Incoming')->count() - 2;
        $extraOutgoing = $records->where('type', 'Outgoing')->count() - 2;

        $extraPending = $records->filter(function ($item) {
            $st = strtolower(is_array($item) ? ($item['status'] ?? '') : ($item->status ?? ''));
            return str_contains($st, 'pending');
        })->count() - 1;

        $extraReceived = $records->filter(function ($item) {
            $st = strtolower(is_array($item) ? ($item['status'] ?? '') : ($item->status ?? ''));
            return str_contains($st, 'received') || str_contains($st, 'acknowledged');
        })->count() - 2;

        $extraDelivered = $records->filter(function ($item) {
            $st = strtolower(is_array($item) ? ($item['status'] ?? '') : ($item->status ?? ''));
            return str_contains($st, 'delivered') || str_contains($st, 'sent');
        })->count() - 1;

        $extraProcessing = $records->filter(function ($item) {
            $st = strtolower(is_array($item) ? ($item['status'] ?? '') : ($item->status ?? ''));
            return str_contains($st, 'processing');
        })->count();

        $incomingTotal = max(0, $baseIncoming + $extraIncoming);
        $outgoingTotal = max(0, $baseOutgoing + $extraOutgoing);
        $pendingTotal = max(0, $basePending + $extraPending);
        $receivedTotal = max(0, $baseReceived + $extraReceived);
        $deliveredTotal = max(0, $baseDelivered + $extraDelivered);
        $processingTotal = max(0, $baseProcessing + $extraProcessing);

        $extraElectronic = $records->where('delivery_method', 'Electronic')->count() - 2;
        $extraEmail = $records->where('delivery_method', 'Email')->count() - 1;
        $extraCourier = $records->where('delivery_method', 'Courier')->count() - 1;
        $extraOther = $records->filter(function ($item) {
            $m = is_array($item) ? ($item['delivery_method'] ?? '') : ($item->delivery_method ?? '');
            return !in_array($m, ['Electronic', 'Email', 'Courier']);
        })->count();

        return [
            'incoming' => $incomingTotal,
            'incoming_raw' => $incomingTotal,
            'outgoing' => $outgoingTotal,
            'outgoing_raw' => $outgoingTotal,
            'pending_receipt' => $pendingTotal,
            'pending_receipt_raw' => $pendingTotal,
            'pending' => $pendingTotal,
            'pending_raw' => $pendingTotal,
            'received' => $receivedTotal,
            'received_raw' => $receivedTotal,
            'delivered' => $deliveredTotal,
            'processing' => $processingTotal,
            'total' => $incomingTotal + $outgoingTotal,
            'methods' => [
                'electronic' => 42 + $extraElectronic,
                'email' => 18 + $extraEmail,
                'courier' => 7 + $extraCourier,
                'other' => 2 + $extraOther,
            ],
        ];
    }

    /**
     * Store a newly created Transmittal for the active account.
     */
    public function store(Request $request, ?Account $account): array
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:Incoming,Outgoing',
            'transmittal_date' => 'required|date',
            'sender' => 'required|string|max:255',
            'recipient' => 'required|string|max:255',
            'delivery_method' => 'required|string|max:100',
            'delivery_date' => 'nullable|date',
            'status' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:3000',
            'acknowledged_by' => 'nullable|string|max:255',
            'acknowledged_at' => 'nullable|date',
            'proof_of_receipt_note' => 'nullable|string|max:1000',
            'attachments.*' => 'nullable|file|max:15360',
            'attachments' => 'nullable',
            'file' => 'nullable|file|max:15360',
            'proof_of_receipt_file' => 'nullable|file|max:15360',
            'proof_file' => 'nullable|file|max:15360',
        ]);

        $user = $request->user();
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        // Generate sequential transmittal number (e.g. TR-2026-0064)
        $existingRecords = $this->getRecords($account);
        $maxNum = 63;
        foreach ($existingRecords as $rec) {
            $ref = is_array($rec) ? ($rec['transmittal_no'] ?? '') : ($rec->transmittal_no ?? '');
            if (preg_match('/TR-2026-(\d+)/', $ref, $matches)) {
                $num = (int) $matches[1];
                if ($num > $maxNum) {
                    $maxNum = $num;
                }
            }
        }
        $transmittalNo = sprintf('TR-2026-%04d', $maxNum + 1);

        // Process attachments (support both attachments[] and file)
        $attachments = [];
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            if ($file && $file->isValid()) {
                $path = $file->store('transmittal_documents', 'public');
                $size = $file->getSize();
                $formattedSize = $size >= 1048576 ? round($size / 1048576, 1) . ' MB' : round($size / 1024) . ' KB';
                $attachments[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path,
                    'size' => $size,
                    'formatted_size' => $formattedSize,
                    'type' => strtoupper($file->getClientOriginalExtension()),
                ];
            }
        }
        if ($request->hasFile('attachments')) {
            $attFiles = $request->file('attachments');
            if (!is_array($attFiles)) {
                $attFiles = [$attFiles];
            }
            foreach ($attFiles as $file) {
                if ($file && $file->isValid()) {
                    $path = $file->store('transmittal_documents', 'public');
                    $size = $file->getSize();
                    $formattedSize = $size >= 1048576 ? round($size / 1048576, 1) . ' MB' : round($size / 1024) . ' KB';
                    $attachments[] = [
                        'name' => $file->getClientOriginalName(),
                        'path' => $path,
                        'size' => $size,
                        'formatted_size' => $formattedSize,
                        'type' => strtoupper($file->getClientOriginalExtension()),
                    ];
                }
            }
        }

        // Process proof of receipt file (support proof_of_receipt_file and proof_file)
        $proofPath = null;
        if ($request->hasFile('proof_of_receipt_file')) {
            $proofFile = $request->file('proof_of_receipt_file');
            if ($proofFile && $proofFile->isValid()) {
                $proofPath = $proofFile->store('transmittal_proofs', 'public');
            }
        } elseif ($request->hasFile('proof_file')) {
            $proofFile = $request->file('proof_file');
            if ($proofFile && $proofFile->isValid()) {
                $proofPath = $proofFile->store('transmittal_proofs', 'public');
            }
        }

        $status = !empty($validated['status'])
            ? $validated['status']
            : ($validated['type'] === 'Incoming' ? 'Received' : 'Pending Receipt');

        $badgeClass = match (strtolower(trim($status))) {
            'received' => 'received',
            'delivered', 'sent' => 'delivered',
            'pending receipt', 'pending approval', 'pending' => 'pending',
            'acknowledged', 'completed' => 'acknowledged',
            'draft' => 'draft',
            'rejected' => 'rejected',
            default => 'pending',
        };

        $recordData = [
            'account_id' => $accountId,
            'user_id' => $user?->id,
            'transmittal_no' => $transmittalNo,
            'title' => $validated['title'],
            'type' => $validated['type'],
            'sender' => $validated['sender'],
            'recipient' => $validated['recipient'],
            'transmittal_date' => $validated['transmittal_date'],
            'delivery_method' => $validated['delivery_method'],
            'delivery_date' => $validated['delivery_date'] ?? $validated['transmittal_date'],
            'status' => $status,
            'status_badge_class' => $badgeClass,
            'description' => $validated['description'] ?? null,
            'acknowledged_by' => $validated['acknowledged_by'] ?? null,
            'acknowledged_at' => $validated['acknowledged_at'] ?? null,
            'proof_of_receipt_note' => $validated['proof_of_receipt_note'] ?? null,
            'proof_of_receipt_path' => $proofPath,
            'proof_of_receipt' => $proofPath,
            'attachments' => $attachments,
            'metadata' => [
                'channel' => $validated['delivery_method'],
                'dispatched_by' => $user?->name ?? 'ORDO Workspace Officer',
            ],
        ];

        $createdRecord = null;

        // 1. Save to Database
        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('transmittal_records')) {
                    $model = TransmittalRecord::create($recordData);
                    $createdRecord = $model->toArray();
                    $createdRecord['id'] = $model->id;
                    $createdRecord['formatted_transmittal_date'] = $model->formatted_transmittal_date;
                    $createdRecord['formatted_delivery_date'] = $model->formatted_delivery_date;
                    $createdRecord['formatted_acknowledged_at'] = $model->formatted_acknowledged_at;
                }
            } catch (\Throwable $e) {
                // Fallback to session
            }
        }

        // 2. Synchronize to Session
        $sessionKey = 'client.transmittal_records.' . $accountId;
        $sessionRecords = session($sessionKey, []);
        if (empty($sessionRecords)) {
            $sessionRecords = $this->getDefaultRecords($accountId, $user?->id);
        }

        $sessionItem = $recordData;
        $sessionItem['id'] = $createdRecord['id'] ?? (count($sessionRecords) + 1);
        $sessionItem['formatted_transmittal_date'] = Carbon::parse($validated['transmittal_date'])->format('F d, Y');
        $sessionItem['formatted_delivery_date'] = !empty($validated['delivery_date'])
            ? Carbon::parse($validated['delivery_date'])->format('F d, Y')
            : $sessionItem['formatted_transmittal_date'];
        $sessionItem['formatted_acknowledged_at'] = !empty($validated['acknowledged_at'])
            ? Carbon::parse($validated['acknowledged_at'])->format('F d, Y')
            : null;

        array_unshift($sessionRecords, $sessionItem);
        session([$sessionKey => $sessionRecords]);

        if (!$createdRecord) {
            $createdRecord = $sessionItem;
        }

        $updatedStats = $this->calculateStats($this->getRecords($account));
        $successMsg = 'Transmittal "' . $transmittalNo . ' — ' . $validated['title'] . '" was successfully logged and dispatched.';

        return [
            'record' => $createdRecord,
            'stats' => $updatedStats,
            'message' => $successMsg,
        ];
    }

    /**
     * Update an existing Transmittal Record.
     */
    public function update(Request $request, $id, ?Account $account): array
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|in:Incoming,Outgoing',
            'transmittal_date' => 'required|date',
            'sender' => 'required|string|max:255',
            'recipient' => 'required|string|max:255',
            'delivery_method' => 'required|string|max:100',
            'delivery_date' => 'nullable|date',
            'status' => 'required|string|max:50',
            'description' => 'nullable|string|max:3000',
            'acknowledged_by' => 'nullable|string|max:255',
            'acknowledged_at' => 'nullable|date',
            'proof_of_receipt_note' => 'nullable|string|max:1000',
            'attachments.*' => 'nullable|file|max:15360',
            'proof_of_receipt_file' => 'nullable|file|max:15360',
        ]);

        $user = $request->user();
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        $badgeClass = match (strtolower(trim($validated['status']))) {
            'received' => 'received',
            'delivered', 'sent' => 'delivered',
            'pending receipt', 'pending approval', 'pending' => 'pending',
            'acknowledged', 'completed' => 'acknowledged',
            'draft' => 'draft',
            'rejected' => 'rejected',
            default => 'pending',
        };

        // Handle proof of receipt file replacement if provided
        $proofPath = null;
        if ($request->hasFile('proof_of_receipt_file')) {
            $proofFile = $request->file('proof_of_receipt_file');
            if ($proofFile && $proofFile->isValid()) {
                $proofPath = $proofFile->store('transmittal_proofs', 'public');
            }
        }

        // Process any new attachments
        $newAttachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                if ($file && $file->isValid()) {
                    $path = $file->store('transmittal_documents', 'public');
                    $size = $file->getSize();
                    $formattedSize = $size >= 1048576 ? round($size / 1048576, 1) . ' MB' : round($size / 1024) . ' KB';
                    $newAttachments[] = [
                        'name' => $file->getClientOriginalName(),
                        'path' => $path,
                        'size' => $size,
                        'formatted_size' => $formattedSize,
                        'type' => strtoupper($file->getClientOriginalExtension()),
                    ];
                }
            }
        }

        $updatedRecord = null;

        // 1. Update in Database
        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('transmittal_records')) {
                    $model = TransmittalRecord::where('account_id', $accountId)->find($id);
                    if ($model) {
                        $model->title = $validated['title'];
                        $model->type = $validated['type'];
                        $model->sender = $validated['sender'];
                        $model->recipient = $validated['recipient'];
                        $model->transmittal_date = $validated['transmittal_date'];
                        $model->delivery_method = $validated['delivery_method'];
                        $model->delivery_date = $validated['delivery_date'] ?? $validated['transmittal_date'];
                        $model->status = $validated['status'];
                        $model->status_badge_class = $badgeClass;
                        $model->description = $validated['description'] ?? null;
                        $model->acknowledged_by = $validated['acknowledged_by'] ?? null;
                        $model->acknowledged_at = $validated['acknowledged_at'] ?? null;
                        $model->proof_of_receipt_note = $validated['proof_of_receipt_note'] ?? null;
                        if ($proofPath) {
                            $model->proof_of_receipt_path = $proofPath;
                        }
                        if (!empty($newAttachments)) {
                            $existingAtt = is_array($model->attachments) ? $model->attachments : [];
                            $model->attachments = array_merge($existingAtt, $newAttachments);
                        }
                        $model->save();

                        $updatedRecord = $model->toArray();
                        $updatedRecord['id'] = $model->id;
                        $updatedRecord['formatted_transmittal_date'] = $model->formatted_transmittal_date;
                        $updatedRecord['formatted_delivery_date'] = $model->formatted_delivery_date;
                        $updatedRecord['formatted_acknowledged_at'] = $model->formatted_acknowledged_at;
                    }
                }
            } catch (\Throwable $e) {
                // Fallback to session
            }
        }

        // 2. Update in Session
        $sessionKey = 'client.transmittal_records.' . $accountId;
        $sessionRecords = session($sessionKey, []);
        foreach ($sessionRecords as &$rec) {
            $recId = is_array($rec) ? ($rec['id'] ?? null) : ($rec->id ?? null);
            if ((string) $recId === (string) $id) {
                if (is_array($rec)) {
                    $rec['title'] = $validated['title'];
                    $rec['type'] = $validated['type'];
                    $rec['sender'] = $validated['sender'];
                    $rec['recipient'] = $validated['recipient'];
                    $rec['transmittal_date'] = $validated['transmittal_date'];
                    $rec['delivery_method'] = $validated['delivery_method'];
                    $rec['delivery_date'] = $validated['delivery_date'] ?? $validated['transmittal_date'];
                    $rec['formatted_transmittal_date'] = Carbon::parse($validated['transmittal_date'])->format('F d, Y');
                    $rec['formatted_delivery_date'] = !empty($validated['delivery_date']) ? Carbon::parse($validated['delivery_date'])->format('F d, Y') : $rec['formatted_transmittal_date'];
                    $rec['status'] = $validated['status'];
                    $rec['status_badge_class'] = $badgeClass;
                    $rec['description'] = $validated['description'] ?? null;
                    $rec['acknowledged_by'] = $validated['acknowledged_by'] ?? null;
                    $rec['acknowledged_at'] = $validated['acknowledged_at'] ?? null;
                    $rec['formatted_acknowledged_at'] = !empty($validated['acknowledged_at']) ? Carbon::parse($validated['acknowledged_at'])->format('F d, Y') : null;
                    $rec['proof_of_receipt_note'] = $validated['proof_of_receipt_note'] ?? null;
                    if ($proofPath) {
                        $rec['proof_of_receipt_path'] = $proofPath;
                    }
                    if (!empty($newAttachments)) {
                        $existingAtt = is_array($rec['attachments'] ?? null) ? $rec['attachments'] : [];
                        $rec['attachments'] = array_merge($existingAtt, $newAttachments);
                    }
                    if (!$updatedRecord) {
                        $updatedRecord = $rec;
                    }
                } else {
                    $rec->title = $validated['title'];
                    $rec->type = $validated['type'];
                    $rec->sender = $validated['sender'];
                    $rec->recipient = $validated['recipient'];
                    $rec->transmittal_date = $validated['transmittal_date'];
                    $rec->delivery_method = $validated['delivery_method'];
                    $rec->delivery_date = $validated['delivery_date'] ?? $validated['transmittal_date'];
                    $rec->status = $validated['status'];
                    $rec->status_badge_class = $badgeClass;
                    $rec->description = $validated['description'] ?? null;
                    $rec->acknowledged_by = $validated['acknowledged_by'] ?? null;
                    $rec->acknowledged_at = $validated['acknowledged_at'] ?? null;
                    $rec->proof_of_receipt_note = $validated['proof_of_receipt_note'] ?? null;
                    if ($proofPath) {
                        $rec->proof_of_receipt_path = $proofPath;
                    }
                    if (!empty($newAttachments)) {
                        $existingAtt = is_array($rec->attachments ?? null) ? $rec->attachments : [];
                        $rec->attachments = array_merge($existingAtt, $newAttachments);
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
        $successMsg = 'Transmittal "' . ($updatedRecord['transmittal_no'] ?? '') . ' — ' . $validated['title'] . '" was successfully updated.';

        return [
            'record' => $updatedRecord,
            'stats' => $updatedStats,
            'message' => $successMsg,
        ];
    }

    /**
     * Default realistic mock Transmittal records for V1.
     */
    public function getDefaultRecords(int $accountId, ?int $userId = null): array
    {
        return TransmittalsSampleData::getDefaultTransmittalRecords($accountId, $userId);
    }
}
