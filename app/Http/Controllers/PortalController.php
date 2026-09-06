<?php

namespace App\Http\Controllers;

use App\Services\EntitlementService;
use App\Services\PortalSessionService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortalController extends Controller
{
    public function __construct(
        protected EntitlementService $entitlementService,
        protected PortalSessionService $sessionService,
    ) {}

    public function townHall(Request $request): View
    {
        $user = $request->user();
        $account = $user?->currentAccount();

        if ($user && (!session()->has('client.account_id') || session('client.user_id') !== $user->id)) {
            $this->sessionService->initSession($user, $account);
        }

        $profile = $user?->profile;

        $hour = (int) now()->format('H');
        $greeting = match (true) {
            $hour < 12 => 'Good morning',
            $hour < 17 => 'Good afternoon',
            default => 'Good evening',
        };

        $firstName = $profile?->first_name ?? ($user ? explode(' ', $user->name)[0] : 'Client');
        $trialDays = $this->entitlementService->getTrialDaysRemaining($account);
        $progress = $user ? $this->entitlementService->getSetupProgress($user, $account) : ['percentage' => 25];
        $modules = $this->entitlementService->getAllModules($account);
        $usage = $this->entitlementService->getUsageMeters($account);

        return view('portal.town-hall', [
            'user' => $user,
            'account' => $account,
            'greeting' => "{$greeting}, {$firstName}.",
            'trialDaysRemaining' => $trialDays,
            'isTrialActive' => $this->entitlementService->isTrialActive($account),
            'progress' => $progress,
            'modules' => $modules,
            'usage' => $usage,
        ]);
    }

    public function test(): View
    {
        return view('portal.test');
    }

    public function accountCreated(): View
    {
        return view('auth.account-created');
    }
}
