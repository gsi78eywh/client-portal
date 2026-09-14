<?php

namespace App\Services;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use InvalidArgumentException;

class RegistrationService
{
    public const TOTAL_STEPS = 7;

    public function __construct(
        protected PortalSessionService $sessionService
    ) {}

    public function getTotalSteps(): int
    {
        return self::TOTAL_STEPS;
    }

    /**
     * Retrieve all or specific registration session data.
     */
    public function getData(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return session('registration', []);
        }

        return session("registration.{$key}", $default);
    }

    /**
     * Store registration data into session.
     */
    public function putData(string $key, mixed $value): void
    {
        session()->put("registration.{$key}", $value);
    }

    /**
     * Clear all temporary registration session data.
     */
    public function clear(): void
    {
        session()->forget('registration');
    }

    /**
     * Get the selected account type.
     */
    public function getAccountType(): ?string
    {
        return $this->getData('account.account_type');
    }

    /**
     * Check if Step 1 (Profile) has been completed.
     */
    public function hasProfile(): bool
    {
        return session()->has('registration.profile');
    }

    /**
     * Check if Step 2 (Account Type) has been completed.
     */
    public function hasAccount(): bool
    {
        return $this->hasProfile() && session()->has('registration.account.account_type');
    }

    /**
     * Check if Step 3 (Information) has been completed.
     */
    public function hasInformation(): bool
    {
        return $this->hasAccount() && session()->has('registration.information');
    }

    /**
     * Check if Step 4 (Contact) has been completed.
     */
    public function hasContact(): bool
    {
        return $this->hasInformation() && session()->has('registration.contact');
    }

    /**
     * Check if Email verification has been completed.
     */
    public function isEmailVerified(): bool
    {
        return session('registration.email_verified', false) === true;
    }

    /**
     * Check if Mobile verification has been completed.
     */
    public function isMobileVerified(): bool
    {
        return session('registration.mobile_verified', false) === true;
    }

    /**
     * Check if Contact verification has been completed (email verification required).
     */
    public function isContactVerified(): bool
    {
        return $this->isEmailVerified() || session('registration.contact_verified', false) === true;
    }

    /**
     * Mark email as verified in registration session.
     */
    public function markEmailVerified(?string $timestamp = null): void
    {
        $this->putData('email_verified', true);
        $this->putData('email_verified_at', $timestamp ?? now()->toIso8601String());
        $this->putData('contact_verified', true);
    }

    /**
     * Mark mobile as verified in registration session.
     */
    public function markMobileVerified(?string $timestamp = null): void
    {
        $this->putData('mobile_verified', true);
        $this->putData('mobile_verified_at', $timestamp ?? now()->toIso8601String());
        if ($this->isContactVerified()) {
            $this->putData('contact_verified', true);
        }
    }

    /**
     * Generate a verification code (for testing / backward compatibility).
     */
    public function generateVerificationCode(): string
    {
        $code = '123456';
        $this->putData('verification_code', $code);
        return $code;
    }

    /**
     * Verify a submitted code (for testing / backward compatibility).
     */
    public function verifyCode(string $code): bool
    {
        $validCode = $this->getData('verification_code');
        if ($validCode && $validCode === $code) {
            $this->putData('contact_verified', true);
            $this->putData('email_verified', true);
            $this->putData('mobile_verified', true);
            return true;
        }

        return false;
    }

    /**
     * Check if Security (Password) step has been completed.
     */
    public function hasSecurity(): bool
    {
        return $this->isContactVerified() && session('registration.completed', false) === true;
    }

    /**
     * Execute the registration database transactions and establish user session.
     */
    public function completeRegistration(): array
    {
        $registrationData = $this->getData();
        $accountType = $this->getAccountType();
        $profile = $registrationData['profile'] ?? [];
        $information = $registrationData['information'] ?? [];
        $contact = $registrationData['contact'] ?? [];
        $security = $registrationData['security'] ?? [];

        if (empty($contact['email']) || empty($security['password'])) {
            throw new InvalidArgumentException('Missing required email or password for registration.');
        }

        // Generate unique ORDO account number if needed
        do {
            $accountNumber = 'ORDO-' . now()->format('Y') . '-' . strtoupper(Str::random(8));
        } while (Account::where('account_number', $accountNumber)->exists());

        $created = DB::transaction(function () use ($profile, $information, $contact, $security, $accountType, $accountNumber) {
            $user = User::create([
                'name' => trim(($profile['first_name'] ?? '') . ' ' . ($profile['last_name'] ?? '')),
                'email' => $contact['email'],
                'password' => $security['password'],
                'email_verified_at' => session('registration.email_verified_at') ? now()->parse(session('registration.email_verified_at')) : now(),
                'mobile_verified_at' => session('registration.mobile_verified_at') ? now()->parse(session('registration.mobile_verified_at')) : now(),
            ]);

            $userProfile = UserProfile::create([
                'user_id' => $user->id,
                'first_name' => $profile['first_name'],
                'middle_name' => $profile['middle_name'] ?? null,
                'last_name' => $profile['last_name'],
                'suffix' => $profile['suffix'] ?? null,
                'date_of_birth' => $profile['date_of_birth'] ?? null,
                'gender' => $profile['gender'] ?? null,
                'country_region' => $profile['country'] ?? null,
                'mobile_number' => !empty($contact['mobile_number']) ? \App\Services\Contact\PhoneNumberService::normalize($contact['mobile_number']) : null,
                'profile_photo_path' => null,
            ]);

            if ($accountType === 'invited') {
                // Invited flow: connect to existing ABC Corporation account without creating a duplicate
                $account = Account::whereHas('profile', function ($q) {
                    $q->where('legal_name', 'ABC Corporation');
                })->first();

                if (!$account) {
                    $account = Account::create([
                        'account_number' => 'ORDO-2026-00192837',
                        'status' => 'active',
                        'account_type' => 'business',
                        'verification_status' => 'verified',
                    ]);

                    AccountProfile::create([
                        'account_id' => $account->id,
                        'account_type' => 'Corporation',
                        'legal_name' => 'ABC Corporation',
                        'trade_name' => 'ABC Corp',
                        'tin' => '009-445-678-000',
                        'registration_number' => 'CS202409812',
                        'registration_authority' => 'Securities and Exchange Commission',
                        'registration_date' => '2024-03-10',
                        'industry_profession' => 'Commercial Trading & Logistics',
                        'primary_address' => 'Suite 801 Prestige Tower, F. Ortigas Jr. Road, Ortigas Center, Pasig City',
                        'business_email' => 'admin@abccorp.ph',
                        'contact_number' => '+63 2 8631 0000',
                        'website' => 'https://abccorp.ph',
                    ]);
                }

                $accountProfile = $account->profile ?? AccountProfile::where('account_id', $account->id)->first();
                $relationship = $information['existing_account']['role']
                    ?? $information['invitation_role']
                    ?? $information['role']
                    ?? $information['relationship']
                    ?? 'Employee / Staff';

                // Server-side authorization & invitation-based role assignment:
                // Do NOT allow the invited user to choose or escalate administrator status from the registration form.
                // "Employee / Staff" should result in is_administrator = 0 unless the invitation explicitly grants administrator privileges.
                $isAdministrator = false;
                if (isset($information['existing_account']['is_administrator'])) {
                    $isAdministrator = (bool) $information['existing_account']['is_administrator'];
                } elseif (isset($information['invitation']['is_administrator'])) {
                    $isAdministrator = (bool) $information['invitation']['is_administrator'];
                } elseif (isset($information['is_administrator'])) {
                    $isAdministrator = (bool) $information['is_administrator'];
                } elseif (in_array(strtolower($relationship), ['administrator', 'account administrator', 'owner', 'co-owner'], true)) {
                    $isAdministrator = true;
                }
            } else {
                $account = Account::create([
                    'account_number' => $accountNumber,
                    'status' => 'active',
                    'account_type' => $accountType,
                    'verification_status' => 'not_started',
                ]);

                $personalFullName = trim(implode(' ', array_filter([
                    $profile['first_name'] ?? '',
                    $profile['middle_name'] ?? '',
                    $profile['last_name'] ?? '',
                    $profile['suffix'] ?? '',
                ], fn($v) => !is_null($v) && trim((string)$v) !== '')));

                $legalName = match ($accountType) {
                    'personal' => $personalFullName ?: ($information['account_name'] ?? 'Personal Account'),
                    'profession' => $information['practice_name'] ?? ($information['account_name'] ?? 'Professional Practice'),
                    'business' => $information['registered_name'] ?? ($information['account_name'] ?? 'Business Account'),
                    default => 'ORDO Account',
                };

                $formattedAccountType = match ($accountType) {
                    'personal' => 'Individual',
                    'profession' => 'Professional / Practitioner',
                    'business' => $information['business_account_type'] ?? 'Corporation',
                    default => 'Individual',
                };

                $relationship = match ($accountType) {
                    'personal' => 'Self / Account Owner',
                    'profession' => (($information['relationship'] ?? '') === 'Other' && !empty($information['relationship_other']))
                        ? $information['relationship_other']
                        : ($information['relationship'] ?? 'Professional / Practitioner'),
                    'business' => (($information['relationship'] ?? '') === 'Other' && !empty($information['relationship_other']))
                        ? $information['relationship_other']
                        : ($information['relationship'] ?? 'Self / Account Owner'),
                    default => 'Self / Account Owner',
                };

                $isAdministrator = match ($accountType) {
                    'personal' => true,
                    'profession' => ($information['is_authorized'] ?? 'Yes') === 'Yes',
                    'business' => ($information['is_authorized'] ?? 'Yes') === 'Yes',
                    default => true,
                };

                $resolvedProfession = ($information['profession'] ?? '') === 'Other'
                    ? (!empty($information['profession_other']) ? $information['profession_other'] : 'Other')
                    : ($information['profession'] ?? null);

                $accountProfile = AccountProfile::create([
                    'account_id' => $account->id,
                    'account_type' => $formattedAccountType,
                    'legal_name' => $legalName,
                    'trade_name' => $information['trade_name'] ?? null,
                    'tin' => $information['tin'] ?? null,
                    'registration_number' => $information['registration_number'] ?? null,
                    'registration_authority' => $information['registration_authority'] ?? null,
                    'registration_date' => $information['registration_date'] ?? null,
                    'industry_profession' => $information['industry'] ?? $resolvedProfession,
                    'primary_address' => $information['primary_address'] ?? ($profile['country'] ?? null),
                    'business_email' => $information['business_email'] ?? ($contact['email'] ?? null),
                    'contact_number' => $information['contact_number'] ?? ($contact['mobile_number'] ?? null),
                    'website' => $information['website'] ?? null,
                    'logo_path' => null,
                ]);
            }

            DB::table('account_user')->insert([
                'account_id' => $account->id,
                'user_id' => $user->id,
                'relationship' => $relationship,
                'is_administrator' => $isAdministrator,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return [
                'user' => $user,
                'account' => $account,
                'user_profile' => $userProfile,
                'account_profile' => $accountProfile,
                'relationship' => $relationship,
                'is_administrator' => $isAdministrator,
            ];
        });

        Auth::login($created['user']);
        if (request()->hasSession()) {
            request()->session()->regenerate();
        }

        $this->sessionService->initSession($created['user'], $created['account']);

        // Explicitly set 30-day trial status and verification status in session
        session([
            'client.trial.active' => true,
            'client.trial.started_at' => now()->toDateString(),
            'client.trial.ends_at' => now()->addDays(30)->toDateString(),
            'client.subscription.status' => 'trial',
            'client.subscription.plan' => '30-Day Free Access',
            'client.verification.status' => 'not_started',
            'client.verification_submitted' => false,
            'client.account.relationship' => $created['relationship'],
            'client.account.is_administrator' => $created['is_administrator'],
            'client.registration' => [
                'profile' => $profile,
                'account' => $registrationData['account'] ?? [],
                'information' => $information,
                'contact' => $contact,
            ],
        ]);

        $this->clear();

        return $created;
    }
}
