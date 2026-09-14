<?php

namespace App\Services\Modules;

use App\Models\Account;
use App\Models\HumanCapitalRecord;
use App\Services\Modules\Concerns\DatabaseConnectivityCheck;
use App\Services\Modules\SampleData\HumanCapitalSampleData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class HumanCapitalModuleService
{
    use DatabaseConnectivityCheck;

    /**
     * Retrieve Human Capital records for the active account.
     */
    public function getRecords(?Account $account): Collection
    {
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('human_capital_records')) {
                    $existingCount = HumanCapitalRecord::where('account_id', $accountId)->count();
                    if ($existingCount === 0) {
                        $sessionKey = 'client.human_capital_records.' . $accountId;
                        $stored = session($sessionKey);
                        $seedData = is_array($stored) && !empty($stored)
                            ? $stored
                            : $this->getDefaultRecords($accountId, $account?->users()->first()?->id);

                        foreach ($seedData as $item) {
                            $data = is_array($item) ? $item : (array) $item;
                            unset($data['id'], $data['formatted_record_date'], $data['formatted_end_date'], $data['record_type_label']);
                            $data['account_id'] = $accountId;
                            HumanCapitalRecord::create($data);
                        }
                    }

                    $dbRecords = HumanCapitalRecord::where('account_id', $accountId)
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

        $sessionKey = 'client.human_capital_records.' . $accountId;
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
     * Calculate summary statistics for Human Capital dashboard.
     */
    public function calculateStats(Collection $records): array
    {
        $baseHeadcount = 48;
        $baseOnLeave = 3;
        $basePending = 2;
        $baseHrRecords = 144;

        // Employees
        $employeeRecords = $records->filter(function ($r) {
            $type = is_array($r) ? ($r['record_type'] ?? '') : ($r->record_type ?? '');
            return $type === 'employee';
        });
        $activeEmployees = $employeeRecords->filter(function ($r) {
            $st = is_array($r) ? ($r['status'] ?? '') : ($r->status ?? '');
            return in_array($st, ['Active', 'On Leave', 'Probationary']);
        })->count();
        $headcountDelta = $activeEmployees - 6; // 6 active/on-leave employees in default seed
        $headcount = max(1, $baseHeadcount + $headcountDelta);

        // On Leave
        $approvedLeaves = $records->filter(function ($r) {
            $type = is_array($r) ? ($r['record_type'] ?? '') : ($r->record_type ?? '');
            $status = is_array($r) ? ($r['status'] ?? '') : ($r->status ?? '');
            return ($type === 'leave' && $status === 'Approved') || ($type === 'attendance' && $status === 'On Leave');
        })->count();
        $onLeaveDelta = $approvedLeaves - 2; // 1 approved leave + 1 on-leave attendance in seed
        $onLeave = max(0, $baseOnLeave + $onLeaveDelta);

        // Pending HR Actions
        $pendingRecords = $records->filter(function ($r) {
            $status = is_array($r) ? ($r['status'] ?? '') : ($r->status ?? '');
            return in_array($status, ['Pending', 'Under Review', 'Pending Approval']);
        })->count();
        $pendingDelta = $pendingRecords - 1; // 1 pending leave in seed
        $pendingActions = max(0, $basePending + $pendingDelta);

        // HR Records
        $hrDocRecords = $records->filter(function ($r) {
            $type = is_array($r) ? ($r['record_type'] ?? '') : ($r->record_type ?? '');
            return $type === 'hr_document';
        })->count();
        $hrDocDelta = max(0, $hrDocRecords - 3); // 3 hr_document records in seed
        $hrRecordsCount = $baseHrRecords + $hrDocDelta;

        return [
            'headcount' => (string) $headcount,
            'headcount_raw' => $headcount,
            'on_leave' => (string) $onLeave,
            'on_leave_raw' => $onLeave,
            'pending_actions' => (string) $pendingActions,
            'pending_actions_raw' => $pendingActions,
            'hr_records' => (string) $hrRecordsCount,
            'hr_records_raw' => $hrRecordsCount,
            'total_records' => $records->count(),
        ];
    }

    /**
     * Retrieve recent activities for Human Capital.
     */
    public function getActivities(?Account $account): array
    {
        $accountId = $account?->id ?? (int) session('client.account_id', 1);
        $sessionKey = 'client.human_capital_activities.' . $accountId;
        $activities = session($sessionKey);

        if ($activities === null) {
            $activities = $this->getDefaultActivities($accountId);
            session([$sessionKey => $activities]);
        }

        return $activities;
    }

    /**
     * Prepend an activity entry to recent activities.
     */
    public function addActivity(int $accountId, string $title, string $type): void
    {
        $sessionKey = 'client.human_capital_activities.' . $accountId;
        $activities = session($sessionKey);
        if ($activities === null) {
            $activities = $this->getDefaultActivities($accountId);
        }
        array_unshift($activities, [
            'title' => $title,
            'type' => $type,
            'time' => 'Just now',
            'created_at' => now()->toDateTimeString(),
        ]);
        if (count($activities) > 10) {
            $activities = array_slice($activities, 0, 10);
        }
        session([$sessionKey => $activities]);
    }

    /**
     * Store a new Human Capital record (Employee, HR Document, Attendance, or Leave).
     */
    public function store(Request $request, ?Account $account): array
    {
        $recordType = $request->input('record_type', 'employee');

        // Validation rules based on record type
        $rules = [
            'record_type' => 'required|string|in:employee,hr_document,attendance,leave',
        ];

        if ($recordType === 'employee') {
            $rules = array_merge($rules, [
                'employee_name' => 'required|string|max:255',
                'employee_id' => 'nullable|string|max:50',
                'department' => 'nullable|string|max:100',
                'position' => 'nullable|string|max:100',
                'employment_type' => 'nullable|string|max:50',
                'work_arrangement' => 'nullable|string|max:50',
                'date_hired' => 'nullable|date',
                'reporting_manager' => 'nullable|string|max:255',
                'employment_status' => 'required|string|in:Active,On Leave,Inactive,Separated',
                'notes' => 'nullable|string|max:3000',
                'file' => 'nullable|file|max:15360',
                'attachment' => 'nullable|file|max:15360',
            ]);
        } elseif ($recordType === 'hr_document') {
            $rules = array_merge($rules, [
                'title' => 'required|string|max:255',
                'employee_name' => 'required|string|max:255',
                'document_type' => 'required|string|max:100',
                'record_date' => 'nullable|date',
                'status' => 'nullable|string|max:50',
                'description' => 'nullable|string|max:3000',
                'file' => 'required_without:attachment|file|max:15360',
                'attachment' => 'nullable|file|max:15360',
            ]);
        } elseif ($recordType === 'attendance') {
            $rules = array_merge($rules, [
                'employee_name' => 'required|string|max:255',
                'date' => 'required|date',
                'attendance_status' => 'required|string|in:Present,Absent,Late,Half Day,On Leave',
                'time_in' => 'nullable|string|max:50',
                'time_out' => 'nullable|string|max:50',
                'notes' => 'nullable|string|max:3000',
            ]);
        } elseif ($recordType === 'leave') {
            $rules = array_merge($rules, [
                'employee_name' => 'required|string|max:255',
                'leave_type' => 'required|string|max:100',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'number_of_days' => 'nullable|numeric|min:0.5',
                'reason' => 'nullable|string|max:3000',
                'status' => 'nullable|string|in:Pending,Approved,Rejected,Cancelled',
                'file' => 'nullable|file|max:15360',
                'attachment' => 'nullable|file|max:15360',
            ]);
        }

        $validated = $request->validate($rules);

        $user = $request->user();
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        // Process uploaded file if provided
        $attachmentPath = null;
        $attachmentName = null;
        $uploadedFile = $request->file('file') ?? $request->file('attachment');
        if ($uploadedFile && $uploadedFile->isValid()) {
            $attachmentPath = $uploadedFile->store('human_capital_documents', 'public');
            $attachmentName = $uploadedFile->getClientOriginalName();
        }

        $existingRecords = $this->getRecords($account);

        if ($recordType === 'employee') {
            $maxEmp = 48;
            foreach ($existingRecords as $r) {
                $ref = is_array($r) ? ($r['reference_no'] ?? '') : ($r->reference_no ?? '');
                if (preg_match('/EMP-(\d+)/', $ref, $m)) {
                    $num = (int) $m[1];
                    if ($num > $maxEmp) $maxEmp = $num;
                }
            }
            $empIdGiven = !empty($validated['employee_id']) ? $validated['employee_id'] : sprintf('EMP-%03d', $maxEmp + 1);
            $status = $validated['employment_status'];
            $badgeClass = match (strtolower(trim($status))) {
                'active' => 'active',
                'on leave' => 'review',
                'inactive', 'separated' => 'archived',
                default => 'active',
            };

            $recordData = [
                'account_id' => $accountId,
                'user_id' => $user?->id,
                'record_type' => 'employee',
                'reference_no' => $empIdGiven,
                'title' => $validated['employee_name'],
                'category' => $validated['department'] ?? 'Operations',
                'record_date' => $validated['date_hired'] ?? date('Y-m-d'),
                'end_date' => null,
                'status' => $status,
                'status_badge_class' => $badgeClass,
                'description' => $validated['notes'] ?? null,
                'metadata' => [
                    'employee_id' => $empIdGiven,
                    'employee_name' => $validated['employee_name'],
                    'department' => $validated['department'] ?? 'Operations',
                    'position' => $validated['position'] ?? 'Team Member',
                    'employment_type' => $validated['employment_type'] ?? 'Regular',
                    'work_arrangement' => $validated['work_arrangement'] ?? 'On-site',
                    'date_hired' => $validated['date_hired'] ?? date('Y-m-d'),
                    'reporting_manager' => $validated['reporting_manager'] ?? 'General Management',
                    'employment_status' => $status,
                    'notes' => $validated['notes'] ?? null,
                ],
                'attachment_path' => $attachmentPath,
                'attachment_name' => $attachmentName,
            ];

            $activityText = "New employee record created for {$validated['employee_name']} (" . ($validated['position'] ?? 'Team Member') . ")";
            $successMsg = "Employee record for {$validated['employee_name']} was successfully created.";

        } elseif ($recordType === 'hr_document') {
            $maxDoc = 88;
            foreach ($existingRecords as $r) {
                $ref = is_array($r) ? ($r['reference_no'] ?? '') : ($r->reference_no ?? '');
                if (preg_match('/HRD-2026-(\d+)/', $ref, $m)) {
                    $num = (int) $m[1];
                    if ($num > $maxDoc) $maxDoc = $num;
                }
            }
            $refNo = sprintf('HRD-2026-%04d', $maxDoc + 1);
            $status = !empty($validated['status']) ? $validated['status'] : 'Active';
            $badgeClass = match (strtolower(trim($status))) {
                'active', 'approved' => 'active',
                'pending', 'under review' => 'pending',
                'archived', 'inactive' => 'archived',
                default => 'active',
            };

            $recordData = [
                'account_id' => $accountId,
                'user_id' => $user?->id,
                'record_type' => 'hr_document',
                'reference_no' => $refNo,
                'title' => $validated['title'],
                'category' => $validated['document_type'],
                'record_date' => $validated['record_date'] ?? date('Y-m-d'),
                'end_date' => null,
                'status' => $status,
                'status_badge_class' => $badgeClass,
                'description' => $validated['description'] ?? null,
                'metadata' => [
                    'employee_name' => $validated['employee_name'],
                    'document_type' => $validated['document_type'],
                    'title' => $validated['title'],
                    'status' => $status,
                    'description' => $validated['description'] ?? null,
                ],
                'attachment_path' => $attachmentPath,
                'attachment_name' => $attachmentName ?? 'Document_Attachment.pdf',
            ];

            $activityText = "HR document '{$validated['title']}' uploaded for {$validated['employee_name']}";
            $successMsg = "HR document '{$validated['title']}' was successfully recorded.";

        } elseif ($recordType === 'attendance') {
            $maxAtt = 101;
            foreach ($existingRecords as $r) {
                $ref = is_array($r) ? ($r['reference_no'] ?? '') : ($r->reference_no ?? '');
                if (preg_match('/ATT-2026-(\d+)/', $ref, $m)) {
                    $num = (int) $m[1];
                    if ($num > $maxAtt) $maxAtt = $num;
                }
            }
            $refNo = sprintf('ATT-2026-%04d', $maxAtt + 1);
            $status = $validated['attendance_status'];
            $badgeClass = match (strtolower(trim($status))) {
                'present' => 'active',
                'late', 'half day' => 'scheduled',
                'on leave' => 'review',
                'absent' => 'archived',
                default => 'active',
            };

            $recordData = [
                'account_id' => $accountId,
                'user_id' => $user?->id,
                'record_type' => 'attendance',
                'reference_no' => $refNo,
                'title' => $validated['employee_name'],
                'category' => $status,
                'record_date' => $validated['date'],
                'end_date' => null,
                'status' => $status,
                'status_badge_class' => $badgeClass,
                'description' => $validated['notes'] ?? null,
                'metadata' => [
                    'employee_name' => $validated['employee_name'],
                    'date' => $validated['date'],
                    'attendance_status' => $status,
                    'time_in' => $validated['time_in'] ?? null,
                    'time_out' => $validated['time_out'] ?? null,
                    'notes' => $validated['notes'] ?? null,
                ],
                'attachment_path' => null,
                'attachment_name' => null,
            ];

            $activityText = "Attendance record logged for {$validated['employee_name']} ({$status})";
            $successMsg = "Attendance record for {$validated['employee_name']} was successfully recorded.";

        } else { // leave
            $maxLve = 33;
            foreach ($existingRecords as $r) {
                $ref = is_array($r) ? ($r['reference_no'] ?? '') : ($r->reference_no ?? '');
                if (preg_match('/LVE-2026-(\d+)/', $ref, $m)) {
                    $num = (int) $m[1];
                    if ($num > $maxLve) $maxLve = $num;
                }
            }
            $refNo = sprintf('LVE-2026-%04d', $maxLve + 1);

            $status = !empty($validated['status']) ? $validated['status'] : 'Pending';
            $badgeClass = match (strtolower(trim($status))) {
                'approved' => 'active',
                'pending' => 'pending',
                'rejected', 'cancelled' => 'archived',
                default => 'pending',
            };

            $days = !empty($validated['number_of_days'])
                ? (float) $validated['number_of_days']
                : (max(1, (strtotime($validated['end_date']) - strtotime($validated['start_date'])) / 86400 + 1));

            $recordData = [
                'account_id' => $accountId,
                'user_id' => $user?->id,
                'record_type' => 'leave',
                'reference_no' => $refNo,
                'title' => $validated['employee_name'],
                'category' => $validated['leave_type'],
                'record_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'status' => $status,
                'status_badge_class' => $badgeClass,
                'description' => $validated['reason'] ?? null,
                'metadata' => [
                    'employee_name' => $validated['employee_name'],
                    'leave_type' => $validated['leave_type'],
                    'start_date' => $validated['start_date'],
                    'end_date' => $validated['end_date'],
                    'number_of_days' => $days,
                    'reason' => $validated['reason'] ?? null,
                    'status' => $status,
                ],
                'attachment_path' => $attachmentPath,
                'attachment_name' => $attachmentName,
            ];

            $activityText = "Leave request submitted for {$validated['employee_name']} ({$validated['leave_type']}, {$days}d)";
            $successMsg = "Leave request for {$validated['employee_name']} was successfully recorded.";
        }

        $createdRecord = null;

        // 1. Save to Database
        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('human_capital_records')) {
                    $model = HumanCapitalRecord::create($recordData);
                    $createdRecord = $model->toArray();
                    $createdRecord['id'] = $model->id;
                    $createdRecord['formatted_record_date'] = $model->formatted_record_date;
                    $createdRecord['formatted_end_date'] = $model->formatted_end_date;
                }
            } catch (\Throwable $e) {
                // Fallback to session
            }
        }

        // 2. Synchronize to Session
        $sessionKey = 'client.human_capital_records.' . $accountId;
        $sessionRecords = session($sessionKey, []);
        if (empty($sessionRecords)) {
            $sessionRecords = $this->getDefaultRecords($accountId, $user?->id);
        }

        $sessionItem = $recordData;
        $sessionItem['id'] = $createdRecord['id'] ?? (count($sessionRecords) + 1);
        $sessionItem['formatted_record_date'] = Carbon::parse($recordData['record_date'])->format('F d, Y');
        $sessionItem['formatted_end_date'] = !empty($recordData['end_date'])
            ? Carbon::parse($recordData['end_date'])->format('F d, Y')
            : null;

        array_unshift($sessionRecords, $sessionItem);
        session([$sessionKey => $sessionRecords]);

        if (!$createdRecord) {
            $createdRecord = $sessionItem;
        }

        $this->addActivity($accountId, $activityText, ucfirst($recordType));

        $updatedStats = $this->calculateStats($this->getRecords($account));
        $updatedActivities = $this->getActivities($account);

        return [
            'record' => $createdRecord,
            'stats' => $updatedStats,
            'activities' => $updatedActivities,
            'message' => $successMsg,
        ];
    }

    /**
     * Update an existing Human Capital record.
     */
    public function update(Request $request, $id, ?Account $account): array
    {
        $user = $request->user();
        $accountId = $account?->id ?? (int) session('client.account_id', 1);

        $existing = null;
        if ($this->isDatabaseConnected()) {
            try {
                if (Schema::hasTable('human_capital_records')) {
                    $existing = HumanCapitalRecord::where('account_id', $accountId)->find($id);
                }
            } catch (\Throwable $e) {}
        }

        $sessionKey = 'client.human_capital_records.' . $accountId;
        $sessionRecords = session($sessionKey);
        if ($sessionRecords === null) {
            $sessionRecords = $this->getDefaultRecords($accountId, $user?->id);
        }

        $sessionTarget = null;
        foreach ($sessionRecords as $item) {
            $itemArr = is_array($item) ? $item : (array) $item;
            if ((string) ($itemArr['id'] ?? '') === (string) $id) {
                $sessionTarget = $itemArr;
                break;
            }
        }

        $recordType = $request->input('record_type')
            ?? ($existing?->record_type ?? ($sessionTarget['record_type'] ?? 'employee'));

        // Validation rules
        $rules = [
            'record_type' => 'nullable|string|in:employee,hr_document,attendance,leave',
        ];

        if ($recordType === 'employee') {
            $rules = array_merge($rules, [
                'employee_name' => 'required|string|max:255',
                'employee_id' => 'nullable|string|max:50',
                'department' => 'nullable|string|max:100',
                'position' => 'nullable|string|max:100',
                'employment_type' => 'nullable|string|max:50',
                'work_arrangement' => 'nullable|string|max:50',
                'date_hired' => 'nullable|date',
                'reporting_manager' => 'nullable|string|max:255',
                'employment_status' => 'required|string|in:Active,On Leave,Inactive,Separated',
                'notes' => 'nullable|string|max:3000',
                'file' => 'nullable|file|max:15360',
                'attachment' => 'nullable|file|max:15360',
            ]);
        } elseif ($recordType === 'hr_document') {
            $rules = array_merge($rules, [
                'title' => 'required|string|max:255',
                'employee_name' => 'required|string|max:255',
                'document_type' => 'required|string|max:100',
                'record_date' => 'nullable|date',
                'status' => 'nullable|string|max:50',
                'description' => 'nullable|string|max:3000',
                'file' => 'nullable|file|max:15360',
                'attachment' => 'nullable|file|max:15360',
            ]);
        } elseif ($recordType === 'attendance') {
            $rules = array_merge($rules, [
                'employee_name' => 'required|string|max:255',
                'date' => 'required|date',
                'attendance_status' => 'required|string|in:Present,Absent,Late,Half Day,On Leave',
                'time_in' => 'nullable|string|max:50',
                'time_out' => 'nullable|string|max:50',
                'notes' => 'nullable|string|max:3000',
            ]);
        } elseif ($recordType === 'leave') {
            $rules = array_merge($rules, [
                'employee_name' => 'required|string|max:255',
                'leave_type' => 'required|string|max:100',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'number_of_days' => 'nullable|numeric|min:0.5',
                'reason' => 'nullable|string|max:3000',
                'status' => 'nullable|string|in:Pending,Approved,Rejected,Cancelled',
                'file' => 'nullable|file|max:15360',
                'attachment' => 'nullable|file|max:15360',
            ]);
        }

        $validated = $request->validate($rules);

        // Attachment handling
        $attachmentPath = null;
        $attachmentName = null;
        $uploadedFile = $request->file('file') ?? $request->file('attachment');
        if ($uploadedFile && $uploadedFile->isValid()) {
            $attachmentPath = $uploadedFile->store('human_capital_documents', 'public');
            $attachmentName = $uploadedFile->getClientOriginalName();
        }

        $updatedRecord = null;

        if ($recordType === 'employee') {
            $status = $validated['employment_status'];
            $badgeClass = match (strtolower(trim($status))) {
                'active' => 'active',
                'on leave' => 'review',
                'inactive', 'separated' => 'archived',
                default => 'active',
            };

            $updateData = [
                'title' => $validated['employee_name'],
                'category' => $validated['department'] ?? 'Operations',
                'record_date' => $validated['date_hired'] ?? ($existing?->record_date ?? date('Y-m-d')),
                'status' => $status,
                'status_badge_class' => $badgeClass,
                'description' => $validated['notes'] ?? null,
                'metadata' => [
                    'employee_id' => $validated['employee_id'] ?? ($existing?->metadata['employee_id'] ?? $sessionTarget['metadata']['employee_id'] ?? 'EMP-001'),
                    'employee_name' => $validated['employee_name'],
                    'department' => $validated['department'] ?? 'Operations',
                    'position' => $validated['position'] ?? 'Team Member',
                    'employment_type' => $validated['employment_type'] ?? 'Regular',
                    'work_arrangement' => $validated['work_arrangement'] ?? 'On-site',
                    'date_hired' => $validated['date_hired'] ?? date('Y-m-d'),
                    'reporting_manager' => $validated['reporting_manager'] ?? 'General Management',
                    'employment_status' => $status,
                    'notes' => $validated['notes'] ?? null,
                ],
            ];
            $activityText = "Updated employee record for {$validated['employee_name']} (Status: {$status})";
            $successMsg = "Employee record for {$validated['employee_name']} was successfully updated.";

        } elseif ($recordType === 'hr_document') {
            $status = !empty($validated['status']) ? $validated['status'] : 'Active';
            $badgeClass = match (strtolower(trim($status))) {
                'active', 'approved' => 'active',
                'pending', 'under review' => 'pending',
                'archived', 'inactive' => 'archived',
                default => 'active',
            };

            $updateData = [
                'title' => $validated['title'],
                'category' => $validated['document_type'],
                'record_date' => $validated['record_date'] ?? date('Y-m-d'),
                'status' => $status,
                'status_badge_class' => $badgeClass,
                'description' => $validated['description'] ?? null,
                'metadata' => [
                    'employee_name' => $validated['employee_name'],
                    'document_type' => $validated['document_type'],
                    'title' => $validated['title'],
                    'status' => $status,
                    'description' => $validated['description'] ?? null,
                ],
            ];
            $activityText = "Updated HR document '{$validated['title']}' for {$validated['employee_name']}";
            $successMsg = "HR document '{$validated['title']}' was successfully updated.";

        } elseif ($recordType === 'attendance') {
            $status = $validated['attendance_status'];
            $badgeClass = match (strtolower(trim($status))) {
                'present' => 'active',
                'late', 'half day' => 'scheduled',
                'on leave' => 'review',
                'absent' => 'archived',
                default => 'active',
            };

            $updateData = [
                'title' => $validated['employee_name'],
                'category' => $status,
                'record_date' => $validated['date'],
                'status' => $status,
                'status_badge_class' => $badgeClass,
                'description' => $validated['notes'] ?? null,
                'metadata' => [
                    'employee_name' => $validated['employee_name'],
                    'date' => $validated['date'],
                    'attendance_status' => $status,
                    'time_in' => $validated['time_in'] ?? null,
                    'time_out' => $validated['time_out'] ?? null,
                    'notes' => $validated['notes'] ?? null,
                ],
            ];
            $activityText = "Updated attendance log for {$validated['employee_name']} (Status: {$status})";
            $successMsg = "Attendance record for {$validated['employee_name']} was successfully updated.";

        } else { // leave
            $status = !empty($validated['status']) ? $validated['status'] : 'Pending';
            $badgeClass = match (strtolower(trim($status))) {
                'approved' => 'active',
                'pending' => 'pending',
                'rejected', 'cancelled' => 'archived',
                default => 'pending',
            };

            $days = !empty($validated['number_of_days'])
                ? (float) $validated['number_of_days']
                : (max(1, (strtotime($validated['end_date']) - strtotime($validated['start_date'])) / 86400 + 1));

            $updateData = [
                'title' => $validated['employee_name'],
                'category' => $validated['leave_type'],
                'record_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'status' => $status,
                'status_badge_class' => $badgeClass,
                'description' => $validated['reason'] ?? null,
                'metadata' => [
                    'employee_name' => $validated['employee_name'],
                    'leave_type' => $validated['leave_type'],
                    'start_date' => $validated['start_date'],
                    'end_date' => $validated['end_date'],
                    'number_of_days' => $days,
                    'reason' => $validated['reason'] ?? null,
                    'status' => $status,
                ],
            ];
            $activityText = "Leave status updated for {$validated['employee_name']} (Status: {$status})";
            $successMsg = "Leave record for {$validated['employee_name']} was successfully updated.";
        }

        if ($attachmentPath) {
            $updateData['attachment_path'] = $attachmentPath;
            $updateData['attachment_name'] = $attachmentName;
        }

        // 1. Update in DB
        if ($existing) {
            $existing->update($updateData);
            $updatedRecord = $existing->fresh()->toArray();
            $updatedRecord['formatted_record_date'] = $existing->fresh()->formatted_record_date;
            $updatedRecord['formatted_end_date'] = $existing->fresh()->formatted_end_date;
            $updatedRecord['record_type_label'] = $existing->fresh()->record_type_label;
        }

        // 2. Update in Session
        foreach ($sessionRecords as &$rec) {
            $recId = is_array($rec) ? ($rec['id'] ?? null) : ($rec->id ?? null);
            if ((string) $recId === (string) $id) {
                if (is_array($rec)) {
                    foreach ($updateData as $k => $v) {
                        $rec[$k] = $v;
                    }
                    $rec['formatted_record_date'] = !empty($rec['record_date'])
                        ? Carbon::parse($rec['record_date'])->format('M d, Y')
                        : null;
                    $rec['formatted_end_date'] = !empty($rec['end_date'])
                        ? Carbon::parse($rec['end_date'])->format('M d, Y')
                        : null;
                    if (!$updatedRecord) {
                        $updatedRecord = $rec;
                    }
                } else {
                    foreach ($updateData as $k => $v) {
                        $rec->$k = $v;
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
            $updatedRecord = array_merge([
                'id' => $id,
                'record_type' => $recordType,
                'reference_no' => $sessionTarget['reference_no'] ?? 'HC-001',
            ], $updateData);
            $updatedRecord['formatted_record_date'] = !empty($updatedRecord['record_date'])
                ? Carbon::parse($updatedRecord['record_date'])->format('M d, Y')
                : null;
        }

        $this->addActivity($accountId, $activityText, ucfirst($recordType));

        $updatedStats = $this->calculateStats($this->getRecords($account));
        $updatedActivities = $this->getActivities($account);

        return [
            'record' => $updatedRecord,
            'stats' => $updatedStats,
            'activities' => $updatedActivities,
            'message' => $successMsg,
        ];
    }

    /**
     * Default realistic mock records for Human Capital (Employees, HR Docs, Attendance, Leaves).
     */
    public function getDefaultRecords(int $accountId, ?int $userId = null): array
    {
        return HumanCapitalSampleData::getRecords($accountId, $userId);
    }

    /**
     * Default recent activities for Human Capital.
     */
    public function getDefaultActivities(int $accountId): array
    {
        return HumanCapitalSampleData::getActivities($accountId);
    }
}
