<?php

namespace App\Http\Controllers;

use App\Services\EntitlementService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModuleController extends Controller
{
    public function __construct(
        protected EntitlementService $entitlementService
    ) {}

    public function entityGovernance(Request $request): View
    {
        return $this->renderModule('entity-governance', 'modules.entity-governance', $request);
    }

    public function compliance(Request $request): View
    {
        return $this->renderModule('compliance', 'modules.compliance', $request);
    }

    public function finance(Request $request): View
    {
        return $this->renderModule('finance', 'modules.finance', $request);
    }

    public function humanCapital(Request $request): View
    {
        return $this->renderModule('human-capital', 'modules.human-capital', $request);
    }

    public function records(Request $request): View
    {
        return $this->renderModule('records', 'modules.records', $request);
    }

    public function transmittals(Request $request): View
    {
        return $this->renderModule('transmittals', 'modules.transmittals', $request);
    }

    /**
     * Shared module renderer with entitlement metadata.
     */
    protected function renderModule(string $moduleKey, string $viewName, Request $request): View
    {
        $user = $request->user();
        $account = $user?->currentAccount();
        $status = $this->entitlementService->getModuleStatus($moduleKey, $account);
        $meta = EntitlementService::MODULES[$moduleKey] ?? [];

        return view($viewName, [
            'moduleKey' => $moduleKey,
            'moduleMeta' => $meta,
            'moduleStatus' => $status,
            'isAccessible' => $status !== 'locked',
            'trialDaysRemaining' => $this->entitlementService->getTrialDaysRemaining($account),
            'account' => $account,
        ]);
    }
}
