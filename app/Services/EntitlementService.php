<?php

namespace App\Services;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Models\UserProfile;
use Carbon\Carbon;
use InvalidArgumentException;

class EntitlementService
{
    public const MODULES = [
        'entity-governance' => [
            'key' => 'entity-governance',
            'name' => 'Entity & Governance',
            'category' => 'Corporate Records',
            'description' => 'Directorships, shareholdings, resolutions and statutory entity management.',
            'route' => 'entity-governance',
        ],
        'compliance' => [
            'key' => 'compliance',
            'name' => 'Compliance',
            'category' => 'Filings & Deadlines',
            'description' => 'Statutory deadlines, periodic filings, compliance calendar and regulatory alerts.',
            'route' => 'compliance',
        ],
        'finance' => [
            'key' => 'finance',
            'name' => 'Finance',
            'category' => 'Statements & Ledgers',
            'description' => 'Financial statements, accounting ledgers, book records and transacted tax entries.',
            'route' => 'finance',
        ],
        'human-capital' => [
            'key' => 'human-capital',
            'name' => 'Human Capital',
            'category' => 'Personnel & Payroll',
            'description' => 'Employee master records, contracts, statutory contributions and staff access.',
            'route' => 'human-capital',
        ],
        'records' => [
            'key' => 'records',
            'name' => 'Records',
            'category' => 'Document Vault',
            'description' => 'Centralized business documents, corporate seals, contracts and certified copies.',
            'route' => 'records',
        ],
        'transmittals' => [
            'key' => 'transmittals',
            'name' => 'Transmittals',
            'category' => 'Chain of Custody',
            'description' => 'Formal physical and electronic document transfers, receipts and dispatch logs.',
            'route' => 'transmittals',
        ],
    ];

    public const MAX_FREE_MODULES = 3;

    /**
     * Check whether the 30-day trial period is currently active.
     */
    public function isTrialActive(?Account $account = null): bool
    {
        $status = session('client.subscription.status', 'trial');
        if ($status !== 'trial') {
            return false;
        }

        return $this->getTrialDaysRemaining($account) > 0;
    }

    /**
     * Calculate trial days remaining (0 to 30).
     */
    public function getTrialDaysRemaining(?Account $account = null): int
    {
        $endsAtStr = session('client.trial.ends_at');
        if ($endsAtStr) {
            $endsAt = Carbon::parse($endsAtStr);
        } elseif ($account?->created_at) {
            $endsAt = $account->created_at->copy()->addDays(30);
        } else {
            $endsAt = now()->addDays(30);
        }

        $now = now();
        if ($now->greaterThanOrEqualTo($endsAt)) {
            return 0;
        }

        return (int) ceil($now->diffInDays($endsAt, false));
    }

    /**
     * Determine module access status: 'trial', 'free', 'limited', 'active', or 'locked'.
     */
    public function getModuleStatus(string $moduleKey, ?Account $account = null): string
    {
        if (!array_key_exists($moduleKey, self::MODULES)) {
            return 'locked';
        }

        $protoState = session('client.subscription.status', 'trial');
        if ($protoState === 'paid' || $protoState === 'active') {
            return 'active';
        }

        if ($protoState === 'limited') {
            return $moduleKey === 'records' ? 'limited' : 'locked';
        }

        // If 30-day trial is active, all 6 modules are trial-accessible
        if ($protoState === 'trial' && $this->isTrialActive($account)) {
            return 'trial';
        }

        // After trial or when in free plan: check if user has retained this module on Free plan
        $freeModules = session('client.free_modules', ['entity-governance', 'compliance', 'records']);
        if (in_array($moduleKey, $freeModules, true)) {
            return 'free';
        }

        return 'locked';
    }

    /**
     * Determine if a module is accessible.
     */
    public function isModuleAccessible(string $moduleKey, ?Account $account = null): bool
    {
        return $this->getModuleStatus($moduleKey, $account) !== 'locked';
    }

    /**
     * Get all modules with their current access metadata and statistics.
     */
    public function getAllModules(?Account $account = null): array
    {
        $statsMap = [
            'entity-governance' => ['kpi' => '1 Entity', 'kpi_sub' => '4 Actions'],
            'compliance' => ['kpi' => '14 Active', 'kpi_sub' => '2 Due Soon'],
            'finance' => ['kpi' => '₱225K', 'kpi_sub' => '3 Pending'],
            'human-capital' => ['kpi' => '18 People', 'kpi_sub' => '2 On Leave'],
            'records' => ['kpi' => '45 Records', 'kpi_sub' => '220 MB'],
            'transmittals' => ['kpi' => '8 Active', 'kpi_sub' => '2 Pending'],
        ];

        $modules = [];
        foreach (self::MODULES as $key => $meta) {
            $status = $this->getModuleStatus($key, $account);
            $accessLabel = match ($status) {
                'trial' => 'Trial',
                'free' => 'Free',
                'limited' => 'Limited',
                'active' => 'Active',
                default => 'Locked',
            };

            $modules[$key] = [
                ...$meta,
                'status' => $status,
                'is_accessible' => $status !== 'locked',
                'access_label' => $accessLabel,
                'kpi' => $statsMap[$key]['kpi'] ?? '—',
                'kpi_sub' => $statsMap[$key]['kpi_sub'] ?? '—',
            ];
        }

        return $modules;
    }

    /**
     * Get lifecycle banner data matching the active account status.
     */
    public function getLifecycleData(?Account $account = null): array
    {
        $state = session('client.subscription.status', 'trial');
        $trialDays = $this->getTrialDaysRemaining($account);
        $isVerified = (bool) (session('client.verification_submitted', false) || session('status') === 'Verification submitted.' || $state === 'paid');

        return match ($state) {
            'free' => [
                'state' => 'free',
                'title' => 'ORDO Free Plan',
                'subtitle' => 'Your three selected Business modules remain available. Additional modules can be unlocked via subscriptions.',
                'badge' => 'Free Plan',
                'verified_badge' => $isVerified ? 'Verified' : 'Verification pending',
                'days_count' => '—',
                'days_label' => 'Standard',
                'cta_label' => 'Manage access',
                'cta_route' => 'jkc.subscriptions',
                'show_countdown' => false,
            ],
            'limited' => [
                'state' => 'limited',
                'title' => 'Limited Access',
                'subtitle' => 'Complete verification to restore full commercial access and unlock your verification benefit.',
                'badge' => 'Action required',
                'verified_badge' => 'Unverified',
                'days_count' => '0',
                'days_label' => 'Days left',
                'cta_label' => 'Complete verification',
                'cta_route' => 'settings.verification',
                'show_countdown' => true,
            ],
            'paid', 'active' => [
                'state' => 'paid',
                'title' => 'ORDO Business',
                'subtitle' => 'Verified commercial subscription active with full access across all 6 business modules.',
                'badge' => 'Active',
                'verified_badge' => 'Verified',
                'days_count' => '—',
                'days_label' => 'Annual',
                'cta_label' => 'Manage access',
                'cta_route' => 'jkc.subscriptions',
                'show_countdown' => false,
            ],
            default => [
                'state' => 'trial',
                'title' => '30-Day Full Access',
                'subtitle' => 'All six Business modules are available during your trial. Before the trial ends, choose up to three Business modules to keep on the Free Plan.',
                'badge' => 'Trial',
                'verified_badge' => $isVerified ? 'Verified' : 'Verification pending',
                'days_count' => (string) max(1, $trialDays),
                'days_label' => 'Days remaining',
                'cta_label' => 'Review access',
                'cta_route' => 'jkc.subscriptions',
                'show_countdown' => true,
            ],
        };
    }

    /**
     * Alias for getAllModules to fulfill entitlement contracts.
     */
    public function getEntitledModules(?Account $account = null): array
    {
        return $this->getAllModules($account);
    }

    /**
     * Select up to 3 retained business modules for the Free Plan after trial.
     */
    public function selectFreeModules(array $moduleKeys, ?Account $account = null): bool
    {
        if (count($moduleKeys) > self::MAX_FREE_MODULES) {
            throw new InvalidArgumentException('You can select a maximum of ' . self::MAX_FREE_MODULES . ' modules for the Free Plan.');
        }

        // Validate that all selected keys exist
        foreach ($moduleKeys as $key) {
            if (!array_key_exists($key, self::MODULES)) {
                throw new InvalidArgumentException("Invalid module key: {$key}");
            }
        }

        session(['client.free_modules' => $moduleKeys]);

        return true;
    }

    /**
     * Get the usage meters and capacity limits.
     */
    public function getUsageMeters(?Account $account = null): array
    {
        return [
            'records' => [
                'name' => 'Records & Documents',
                'used' => 76,
                'limit' => 100,
                'percentage' => 76,
                'unit' => 'records',
            ],
            'users' => [
                'name' => 'Seat Licenses / Users',
                'used' => 1,
                'limit' => 1,
                'percentage' => 100,
                'unit' => 'seats',
            ],
            'storage' => [
                'name' => 'Cloud Storage',
                'used' => 320,
                'limit' => 500,
                'percentage' => 64,
                'unit' => 'MB',
            ],
        ];
    }

    /**
     * Calculate progressive setup completion score (0-100%).
     */
    public function getSetupProgress(User $user, ?Account $account = null): array
    {
        $steps = [
            'account_created' => [
                'label' => 'Account Created',
                'completed' => true,
                'weight' => 25,
            ],
            'contact_confirmed' => [
                'label' => 'Contact Confirmed',
                'completed' => (bool) ($user->email_verified_at || session('client.authenticated')),
                'weight' => 25,
            ],
            'account_profile' => [
                'label' => 'Account Profile',
                'completed' => false,
                'weight' => 25,
            ],
            'account_verification' => [
                'label' => 'Account Verification',
                'completed' => false,
                'weight' => 25,
            ],
        ];

        // Check account profile completion
        $targetAccount = $account ?? $user->currentAccount();
        $accountProfile = $targetAccount?->profile ?? ($targetAccount ? AccountProfile::where('account_id', $targetAccount->id)->first() : null);

        if ($accountProfile && $accountProfile->legal_name && ($accountProfile->tin || $accountProfile->industry_profession)) {
            $steps['account_profile']['completed'] = true;
        }

        // Check verification submission
        if (session('client.verification_submitted', false) || session('status') === 'Verification submitted.' || session('client.subscription.status') === 'paid') {
            $steps['account_verification']['completed'] = true;
        }

        $percentage = 0;
        foreach ($steps as $step) {
            if ($step['completed']) {
                $percentage += $step['weight'];
            }
        }

        return [
            'percentage' => $percentage,
            'steps' => $steps,
            'current_action' => match (true) {
                !$steps['account_profile']['completed'] => [
                    'label' => 'Complete Account Profile',
                    'route' => 'settings.account-profile',
                ],
                !$steps['account_verification']['completed'] => [
                    'label' => 'Submit Verification',
                    'route' => 'settings.verification',
                ],
                default => [
                    'label' => 'Review Workspace Settings',
                    'route' => 'settings',
                ],
            },
        ];
    }
}
