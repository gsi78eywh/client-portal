<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings\UpdateAccountProfileRequest;
use App\Http\Requests\Settings\UpdateMyAccountRequest;
use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\UserProfile;
use App\Services\EntitlementService;
use App\Services\PortalSessionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function __construct(
        protected PortalSessionService $sessionService,
        protected EntitlementService $entitlementService
    ) {}

    public function index(): View
    {
        return view('settings.index');
    }

    public function myAccount(Request $request): View
    {
        $user = $request->user();
        $profile = $user->profile ?? UserProfile::where('user_id', $user->id)->first();

        return view('settings.my-account', [
            'user' => $user,
            'profile' => $profile,
        ]);
    }

    public function updateMyAccount(UpdateMyAccountRequest $request): RedirectResponse
    {
        $user = $request->user();
        $userProfile = UserProfile::firstOrNew(['user_id' => $user->id]);
        $userProfile->fill($request->validated());
        $userProfile->save();

        $this->sessionService->updateUserSession($userProfile);

        return redirect()->route('settings.my-account')->with('status', 'Personal profile updated successfully.');
    }

    public function accountProfile(Request $request): View
    {
        $user = $request->user();
        $account = $user->currentAccount();
        $profile = $account ? ($account->profile ?? AccountProfile::where('account_id', $account->id)->first()) : null;

        return view('settings.account-profile', [
            'account' => $account,
            'profile' => $profile,
        ]);
    }

    public function updateAccountProfile(UpdateAccountProfileRequest $request): RedirectResponse
    {
        $user = $request->user();
        $account = $user->currentAccount();

        if (!$account) {
            return redirect()->route('settings.account-profile')->withErrors([
                'account' => 'No active account found to update.',
            ]);
        }

        $accountProfile = AccountProfile::firstOrNew(['account_id' => $account->id]);
        $accountProfile->fill($request->validated());
        $accountProfile->save();

        $this->sessionService->updateAccountSession($accountProfile);

        return redirect()->route('settings.account-profile')->with('status', 'Account profile updated successfully.');
    }

    public function verification(): View
    {
        return view('settings.verification');
    }

    public function submitVerification(Request $request): RedirectResponse
    {
        session(['client.verification_submitted' => true]);

        return redirect()->route('settings.verification')->with('status', 'Verification submitted.');
    }

    public function usersAccess(Request $request): View
    {
        $user = $request->user();
        $account = $user->currentAccount();

        return view('settings.users-access', [
            'account' => $account,
            'users' => $account?->users ?? collect([$user]),
        ]);
    }

    public function switchAccount(Request $request): View
    {
        $user = $request->user();

        return view('settings.switch-account', [
            'accounts' => $user->accounts,
            'currentAccountId' => $user->currentAccount()?->id,
        ]);
    }

    public function performSwitchAccount(Request $request, mixed $account = null): RedirectResponse
    {
        $accountId = ($account instanceof Account) ? $account->id : ($account ?? $request->input('account_id'));

        if (!$accountId) {
            $request->validate([
                'account_id' => ['required', 'integer', 'exists:accounts,id'],
            ]);
        }

        $user = $request->user();
        $targetAccount = $user->accounts()->where('accounts.id', $accountId)->first();

        if (!$targetAccount) {
            abort(403, 'You do not have access to this account.');
        }

        $this->sessionService->initSession($user, $targetAccount);

        return redirect()->route('town-hall')->with('status', 'Switched account successfully.');
    }

    public function security(Request $request): View
    {
        $user = $request->user();
        $twoFactorEnabled = session('security.2fa_enabled', false);

        $sessions = [
            [
                'device' => 'Chrome on Windows 11',
                'ip' => $request->ip() ?? '127.0.0.1',
                'location' => 'Makati City, Philippines',
                'is_current' => true,
                'last_active' => 'Active now',
            ],
            [
                'device' => 'Safari on iPhone 15 Pro',
                'ip' => '112.198.74.21',
                'location' => 'Taguig, Philippines',
                'is_current' => false,
                'last_active' => '2 hours ago',
            ],
        ];

        $activityLogs = [
            [
                'event' => 'Successful sign in',
                'device' => 'Chrome on Windows 11',
                'ip' => '127.0.0.1',
                'date' => now()->format('M d, H:i'),
                'status' => 'success',
            ],
            [
                'event' => 'Session refreshed',
                'device' => 'Chrome on Windows 11',
                'ip' => '127.0.0.1',
                'date' => now()->subHours(1)->format('M d, H:i'),
                'status' => 'success',
            ],
            [
                'event' => 'Sign in from mobile device',
                'device' => 'Safari on iPhone 15 Pro',
                'ip' => '112.198.74.21',
                'date' => now()->subHours(2)->format('M d, H:i'),
                'status' => 'success',
            ],
        ];

        return view('settings.security', [
            'user' => $user,
            'twoFactorEnabled' => $twoFactorEnabled,
            'sessions' => $sessions,
            'activityLogs' => $activityLogs,
        ]);
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = $request->user();

        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'The current password you provided is incorrect.']);
        }

        $user->password = $validated['password'];
        $user->save();

        return redirect()->route('settings.security')->with('status', 'Password changed successfully.');
    }

    public function toggleTwoFactor(Request $request): RedirectResponse
    {
        $enabled = (bool) $request->input('enabled', 1);
        session(['security.2fa_enabled' => $enabled]);

        return redirect()->route('settings.security')->with('status', $enabled ? 'Two-Factor Authentication enabled successfully.' : 'Two-Factor Authentication disabled.');
    }

    public function revokeOtherSessions(): RedirectResponse
    {
        return redirect()->route('settings.security')->with('status', 'All other active browser sessions have been signed out.');
    }

    public function general(): View
    {
        return view('settings.general');
    }

    public function notifications(): View
    {
        return view('settings.notifications');
    }

    public function subscriptionUsage(Request $request): View
    {
        $account = $request->user()?->currentAccount();

        return view('settings.subscription-usage', [
            'account' => $account,
            'trialDaysRemaining' => $this->entitlementService->getTrialDaysRemaining($account),
            'isTrialActive' => $this->entitlementService->isTrialActive($account),
            'modules' => $this->entitlementService->getAllModules($account),
            'usage' => $this->entitlementService->getUsageMeters($account),
        ]);
    }

    public function selectFreeModules(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'modules' => ['required', 'array', 'max:3'],
            'modules.*' => ['string'],
        ]);

        $this->entitlementService->selectFreeModules($validated['modules'], $request->user()?->currentAccount());

        return redirect()->route('settings.subscription-usage')->with('status', 'Free Plan modules updated successfully.');
    }

    public function policies(): View
    {
        return view('settings.policies');
    }

    public function moduleEntityGovernance(): View
    {
        return view('settings.modules.entity-governance');
    }

    public function moduleCompliance(): View
    {
        return view('settings.modules.compliance');
    }

    public function moduleFinance(): View
    {
        return view('settings.modules.finance');
    }

    public function moduleHumanCapital(): View
    {
        return view('settings.modules.human-capital');
    }

    public function moduleRecords(): View
    {
        return view('settings.modules.records');
    }

    public function moduleTransmittals(): View
    {
        return view('settings.modules.transmittals');
    }

    public function updateGeneral(Request $request): RedirectResponse
    {
        return redirect()->route('settings.general')->with('status', 'General preferences saved successfully.');
    }

    public function updateNotifications(Request $request): RedirectResponse
    {
        return redirect()->route('settings.notifications')->with('status', 'Notification preferences saved successfully.');
    }

    public function inviteUser(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'role' => 'nullable|string',
        ]);

        return redirect()->route('settings.users-access')->with('status', "Invitation sent to {$validated['email']}.");
    }
}
