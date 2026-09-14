<?php

namespace App\Services;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;

class PortalSessionService
{
    /**
     * Initialize or refresh the client portal session state for an authenticated user.
     */
    public function initSession(User $user, ?Account $account = null): void
    {
        $profile = $user->profile ?? UserProfile::where('user_id', $user->id)->first();

        if (!$account) {
            $account = $user->currentAccount();
        }

        $accountProfile = $account ? ($account->profile ?? AccountProfile::where('account_id', $account->id)->first()) : null;

        session([
            'client.authenticated' => true,
            'client.user_id' => $user->id,
            'client.account_id' => $account?->id,
            'client.access_mode' => 'active_account',
            'client.user' => [
                'first_name' => $profile?->first_name ?? $user->name,
                'middle_name' => $profile?->middle_name ?? '',
                'last_name' => $profile?->last_name ?? '',
                'suffix' => $profile?->suffix ?? '',
                'date_of_birth' => $profile?->date_of_birth?->format('Y-m-d') ?? '',
                'gender' => $profile?->gender ?? '',
                'country' => $profile?->country_region ?? '',
                'mobile_number' => $profile?->mobile_number ?? '',
                'email' => $user->email,
            ],
        ]);

        if ($account) {
            session([
                'client.account' => [
                    'id' => $account->id,
                    'account_number' => $account->account_number,
                    'name' => $accountProfile?->legal_name ?? 'My ORDO Account',
                    'type' => $accountProfile?->account_type ?? 'Standard',
                    'status' => $account->status,
                ],
                'client.trial.active' => true,
                'client.trial.started_at' => now()->toDateString(),
                'client.trial.ends_at' => session('client.trial.ends_at', now()->addDays(30)->toDateString()),
                'client.subscription.status' => session('client.subscription.status', 'trial'),
                'client.subscription.plan' => session('client.subscription.plan', '30-Day Free Access'),
                'client.modules' => [
                    'entity-governance' => ['status' => 'trial'],
                    'compliance' => ['status' => 'trial'],
                    'finance' => ['status' => 'trial'],
                    'human-capital' => ['status' => 'trial'],
                    'records' => ['status' => 'trial'],
                    'transmittals' => ['status' => 'trial'],
                ],
                'client.usage' => [
                    'records' => ['used' => 76, 'limit' => 100],
                    'users' => ['used' => 1, 'limit' => 1],
                    'storage' => ['used' => 320, 'limit' => 500, 'unit' => 'MB'],
                ],
            ]);
        }
    }

    /**
     * Update user profile data in session.
     */
    public function updateUserSession(UserProfile $profile): void
    {
        session([
            'client.user.first_name' => $profile->first_name,
            'client.user.middle_name' => $profile->middle_name ?? '',
            'client.user.last_name' => $profile->last_name,
            'client.user.suffix' => $profile->suffix ?? '',
            'client.user.date_of_birth' => $profile->date_of_birth?->format('Y-m-d') ?? '',
            'client.user.gender' => $profile->gender ?? '',
            'client.user.country' => $profile->country_region ?? '',
            'client.user.mobile_number' => $profile->mobile_number ?? '',
        ]);
    }

    /**
     * Update account profile data in session.
     */
    public function updateAccountSession(AccountProfile $accountProfile): void
    {
        session([
            'client.account.name' => $accountProfile->legal_name,
            'client.account.type' => $accountProfile->account_type ?? '',
        ]);
    }

    /**
     * Clear all client portal session keys on logout.
     */
    public function clearSession(): void
    {
        session()->forget([
            'client',
            'registration',
        ]);
    }
}
