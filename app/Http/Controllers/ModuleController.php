<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Services\EntitlementService;
use App\Services\Modules\ComplianceModuleService;
use App\Services\Modules\FinanceModuleService;
use App\Services\Modules\GovernanceModuleService;
use App\Services\Modules\HumanCapitalModuleService;
use App\Services\Modules\RecordsModuleService;
use App\Services\Modules\TransmittalsModuleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class ModuleController extends Controller
{
    public function __construct(
        protected EntitlementService $entitlementService,
        protected GovernanceModuleService $governanceService,
        protected ComplianceModuleService $complianceService,
        protected FinanceModuleService $financeService,
        protected HumanCapitalModuleService $humanCapitalService,
        protected RecordsModuleService $recordsService,
        protected TransmittalsModuleService $transmittalsService
    ) {}

    // ==========================================
    // Entity Governance
    // ==========================================

    public function entityGovernance(Request $request): View
    {
        $account = $request->user()?->currentAccount();
        $records = $this->governanceService->getRecords($account);
        $stats = $this->governanceService->calculateStats($records);

        return $this->renderModule('entity-governance', 'modules.entity-governance', $request, [
            'governanceRecords' => $records,
            'governanceStats' => $stats,
        ]);
    }

    public function storeEntityGovernance(Request $request): JsonResponse|RedirectResponse
    {
        $account = $request->user()?->currentAccount();
        $result = $this->governanceService->store($request, $account);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'record' => $result['record'],
                'stats' => $result['stats'],
            ]);
        }

        return redirect()->route('entity-governance')->with('success', $result['message']);
    }

    public function updateEntityGovernance(Request $request, $id): JsonResponse|RedirectResponse
    {
        $account = $request->user()?->currentAccount();
        $result = $this->governanceService->update($request, $id, $account);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'record' => $result['record'],
                'stats' => $result['stats'],
            ]);
        }

        return redirect()->route('entity-governance')->with('success', $result['message']);
    }

    // ==========================================
    // Compliance
    // ==========================================

    public function compliance(Request $request): View
    {
        $account = $request->user()?->currentAccount();
        $records = $this->complianceService->getRecords($account);
        $stats = $this->complianceService->calculateStats($records);

        return $this->renderModule('compliance', 'modules.compliance', $request, [
            'complianceRecords' => $records,
            'complianceStats' => $stats,
        ]);
    }

    public function storeCompliance(Request $request): JsonResponse|RedirectResponse
    {
        $account = $request->user()?->currentAccount();
        $result = $this->complianceService->store($request, $account);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'record' => $result['record'],
                'stats' => $result['stats'],
            ]);
        }

        return redirect()->route('compliance')->with('success', $result['message']);
    }

    public function updateCompliance(Request $request, $id): JsonResponse|RedirectResponse
    {
        $account = $request->user()?->currentAccount();
        $result = $this->complianceService->update($request, $id, $account);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'record' => $result['record'],
                'stats' => $result['stats'],
            ]);
        }

        return redirect()->route('compliance')->with('success', $result['message']);
    }

    // ==========================================
    // Finance
    // ==========================================

    public function finance(Request $request): View
    {
        $account = $request->user()?->currentAccount();
        $records = $this->financeService->getRecords($account);
        $stats = $this->financeService->calculateStats($records);

        return $this->renderModule('finance', 'modules.finance', $request, [
            'financeRecords' => $records,
            'financeStats' => $stats,
        ]);
    }

    public function storeFinance(Request $request): JsonResponse|RedirectResponse
    {
        $account = $request->user()?->currentAccount();
        $result = $this->financeService->store($request, $account);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'record' => $result['record'],
                'stats' => $result['stats'],
            ]);
        }

        return redirect()->route('finance')->with('success', $result['message']);
    }

    public function updateFinance(Request $request, $id): JsonResponse|RedirectResponse
    {
        $account = $request->user()?->currentAccount();
        $result = $this->financeService->update($request, $id, $account);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'record' => $result['record'],
                'stats' => $result['stats'],
            ]);
        }

        return redirect()->route('finance')->with('success', $result['message']);
    }

    // ==========================================
    // Human Capital
    // ==========================================

    public function humanCapital(Request $request): View
    {
        $account = $request->user()?->currentAccount();
        $records = $this->humanCapitalService->getRecords($account);
        $stats = $this->humanCapitalService->calculateStats($records);
        $activities = $this->humanCapitalService->getActivities($account);
        $initialFilter = $request->query('filter', $request->query('type', $request->query('kpi', 'all')));

        return $this->renderModule('human-capital', 'modules.human-capital', $request, [
            'humanCapitalRecords' => $records,
            'humanCapitalStats' => $stats,
            'humanCapitalActivities' => $activities,
            'initialFilter' => $initialFilter,
        ]);
    }

    public function storeHumanCapital(Request $request): JsonResponse|RedirectResponse
    {
        $account = $request->user()?->currentAccount();
        $result = $this->humanCapitalService->store($request, $account);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'record' => $result['record'],
                'stats' => $result['stats'],
                'activities' => $result['activities'] ?? null,
            ]);
        }

        return redirect()->route('human-capital')->with('success', $result['message']);
    }

    public function updateHumanCapital(Request $request, $id): JsonResponse|RedirectResponse
    {
        $account = $request->user()?->currentAccount();
        $result = $this->humanCapitalService->update($request, $id, $account);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'record' => $result['record'],
                'stats' => $result['stats'],
                'activities' => $result['activities'] ?? null,
            ]);
        }

        return redirect()->route('human-capital')->with('success', $result['message']);
    }

    // ==========================================
    // Records
    // ==========================================

    public function records(Request $request): View
    {
        $account = $request->user()?->currentAccount();
        $records = $this->recordsService->getRecords($account);
        $stats = $this->recordsService->calculateStats($records);

        return $this->renderModule('records', 'modules.records', $request, [
            'documentRecords' => $records,
            'recordStats' => $stats,
        ]);
    }

    public function storeRecord(Request $request): JsonResponse|RedirectResponse
    {
        $account = $request->user()?->currentAccount();
        $result = $this->recordsService->store($request, $account);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'record' => $result['record'],
                'stats' => $result['stats'],
            ]);
        }

        return redirect()->route('records')->with('success', $result['message']);
    }

    public function updateRecord(Request $request, $id): JsonResponse|RedirectResponse
    {
        $account = $request->user()?->currentAccount();
        $result = $this->recordsService->update($request, $id, $account);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'record' => $result['record'],
                'stats' => $result['stats'],
            ]);
        }

        return redirect()->route('records')->with('success', $result['message']);
    }

    // ==========================================
    // Transmittals
    // ==========================================

    public function transmittals(Request $request): View
    {
        $account = $request->user()?->currentAccount();
        $records = $this->transmittalsService->getRecords($account);
        $stats = $this->transmittalsService->calculateStats($records);
        $initialFilter = $request->query('filter', $request->query('type', $request->query('status', 'all')));

        return $this->renderModule('transmittals', 'modules.transmittals', $request, [
            'transmittalRecords' => $records,
            'transmittalStats' => $stats,
            'initialFilter' => $initialFilter,
        ]);
    }

    public function storeTransmittal(Request $request): JsonResponse|RedirectResponse
    {
        $account = $request->user()?->currentAccount();
        $result = $this->transmittalsService->store($request, $account);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'record' => $result['record'],
                'stats' => $result['stats'],
            ]);
        }

        return redirect()->route('transmittals')->with('success', $result['message']);
    }

    public function updateTransmittal(Request $request, $id): JsonResponse|RedirectResponse
    {
        $account = $request->user()?->currentAccount();
        $result = $this->transmittalsService->update($request, $id, $account);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $result['message'],
                'record' => $result['record'],
                'stats' => $result['stats'],
            ]);
        }

        return redirect()->route('transmittals')->with('success', $result['message']);
    }

    // ==========================================
    // Shared Renderer & Backward-Compatible Forwarders
    // ==========================================

    /**
     * Shared module renderer with entitlement metadata.
     */
    protected function renderModule(string $moduleKey, string $viewName, Request $request, array $extraData = []): View
    {
        $user = $request->user();
        $account = $user?->currentAccount();
        $status = $this->entitlementService->getModuleStatus($moduleKey, $account);
        $meta = EntitlementService::MODULES[$moduleKey] ?? [];

        return view($viewName, array_merge([
            'moduleKey' => $moduleKey,
            'moduleMeta' => $meta,
            'moduleStatus' => $status,
            'isAccessible' => $status !== 'locked',
            'trialDaysRemaining' => $this->entitlementService->getTrialDaysRemaining($account),
            'account' => $account,
        ], $extraData));
    }

    public function calculateGovernanceStats(Collection $records): array
    {
        return $this->governanceService->calculateStats($records);
    }

    protected function getGovernanceRecords(?Account $account): Collection
    {
        return $this->governanceService->getRecords($account);
    }

    protected function getDefaultGovernanceRecords(int $accountId, ?int $userId = null): array
    {
        return $this->governanceService->getDefaultRecords($accountId, $userId);
    }

    protected function getComplianceRecords(?Account $account): Collection
    {
        return $this->complianceService->getRecords($account);
    }

    protected function getDefaultComplianceRecords(int $accountId, ?int $userId = null): array
    {
        return $this->complianceService->getDefaultRecords($accountId, $userId);
    }

    public function calculateFinanceStats(Collection $records): array
    {
        return $this->financeService->calculateStats($records);
    }

    protected function getFinanceRecords(?Account $account): Collection
    {
        return $this->financeService->getRecords($account);
    }

    protected function getDefaultFinanceRecords(int $accountId, ?int $userId = null): array
    {
        return $this->financeService->getDefaultRecords($accountId, $userId);
    }

    public function getHumanCapitalRecords(?Account $account): Collection
    {
        return $this->humanCapitalService->getRecords($account);
    }

    public function calculateHumanCapitalStats(Collection $records): array
    {
        return $this->humanCapitalService->calculateStats($records);
    }

    public function getHumanCapitalActivities(?Account $account): array
    {
        return $this->humanCapitalService->getActivities($account);
    }

    public function addHumanCapitalActivity(int $accountId, string $title, string $type): void
    {
        $this->humanCapitalService->addActivity($accountId, $title, $type);
    }

    protected function getDefaultHumanCapitalActivities(int $accountId): array
    {
        return $this->humanCapitalService->getDefaultActivities($accountId);
    }

    protected function getDefaultHumanCapitalRecords(int $accountId, ?int $userId = null): array
    {
        return $this->humanCapitalService->getDefaultRecords($accountId, $userId);
    }

    protected function getDocumentRecords(?Account $account): Collection
    {
        return $this->recordsService->getRecords($account);
    }

    public function calculateRecordStats(Collection $records): array
    {
        return $this->recordsService->calculateStats($records);
    }

    protected function getDefaultDocumentRecords(int $accountId, ?int $userId = null): array
    {
        return $this->recordsService->getDefaultRecords($accountId, $userId);
    }

    protected function getTransmittalRecords(?Account $account): Collection
    {
        return $this->transmittalsService->getRecords($account);
    }

    public function calculateTransmittalStats(Collection $records): array
    {
        return $this->transmittalsService->calculateStats($records);
    }

    protected function getDefaultTransmittalRecords(int $accountId, ?int $userId = null): array
    {
        return $this->transmittalsService->getDefaultRecords($accountId, $userId);
    }
}
