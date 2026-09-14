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

        $lifecycle = $this->entitlementService->getLifecycleData($account);

        return view('portal.town-hall', [
            'user' => $user,
            'account' => $account,
            'greeting' => "{$greeting}, {$firstName}.",
            'trialDaysRemaining' => $trialDays,
            'isTrialActive' => $this->entitlementService->isTrialActive($account),
            'progress' => $progress,
            'modules' => $modules,
            'usage' => $usage,
            'lifecycle' => $lifecycle,
        ]);
    }

    public function setPrototypeState(Request $request)
    {
        $state = $request->input('state', 'trial');
        session(['client.subscription.status' => $state]);

        if ($state === 'trial') {
            session(['client.trial.ends_at' => now()->addDays(30)->toDateTimeString()]);
        } elseif ($state === 'limited') {
            session(['client.trial.ends_at' => now()->subDay()->toDateTimeString()]);
            session(['client.verification_submitted' => false]);
        } elseif ($state === 'paid') {
            session(['client.verification_submitted' => true]);
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'state' => $state,
                'message' => "State switched to {$state}.",
            ]);
        }

        return back()->with('status', "Switched state to {$state}.");
    }

    public function simulateVerification(Request $request)
    {
        session(['client.verification_submitted' => true]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Verification approved in prototype.',
            ]);
        }

        return back()->with('status', 'Verification submitted and approved in prototype.');
    }

    public function saveFreeModules(Request $request)
    {
        $modules = $request->input('modules', []);
        if (count($modules) > 3) {
            if ($request->wantsJson()) {
                return response()->json(['error' => 'You can select a maximum of 3 modules.'], 422);
            }
            return back()->withErrors(['modules' => 'You can select a maximum of 3 modules.']);
        }

        session(['client.free_modules' => $modules]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'modules' => $modules,
                'message' => 'Free modules saved.',
            ]);
        }

        return back()->with('status', 'Free modules saved.');
    }

    public function test(): View
    {
        return view('portal.prototype');
    }

    public function prototype(): View
    {
        return view('portal.prototype');
    }

    public function accountCreated(): View
    {
        return view('auth.account-created');
    }
}
