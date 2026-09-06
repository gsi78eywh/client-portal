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
     * Check if Contact verification has been completed.
     */
    public function isContactVerified(): bool
    {
        return session('registration.contact_verified', false) === true;
    }

    /**
     * Check if Security (Password) step has been completed.
     */
    public function hasSecurity(): bool
    {
        return $this->isContactVerified() && session('registration.completed', false) === true;
    }

    /**
     * Generate or fetch verification code.
     */
    public function generateVerificationCode(): string
    {
        // For development / testing, keep standard 123456 code support
        $code = '123456';
        $this->putData('contact_verification_sent', true);
        $this->putData('contact_verification_code', $code);
        $this->putData('contact_verified', false);

        return $code;
    }

    /**
     * Verify submitted contact verification code.
     */
    public function verifyCode(string $code): bool
    {
        $validCode = $this->getData('contact_verification_code', '123456');

        if ((string) $code === (string) $validCode) {
            $this->putData('contact_verified', true);
            session()->forget('registration.contact_verification_code');
            return true;
        }

        return false;
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

        // Generate unique ORDO account number
        do {
            $accountNumber = 'ORDO-' . now()->format('Y') . '-' . strtoupper(Str::random(8));
        } while (Account::where('account_number', $accountNumber)->exists());

        $created = DB::transaction(function () use ($profile, $information, $contact, $security, $accountType, $accountNumber) {
            $user = User::create([
                'name' => trim(($profile['first_name'] ?? '') . ' ' . ($profile['last_name'] ?? '')),
                'email' => $contact['email'],
                'password' => $security['password'],
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
                'mobile_number' => $contact['mobile_number'] ?? null,
                'profile_photo_path' => null,
            ]);

            $account = Account::create([
                'account_number' => $accountNumber,
                'status' => 'active',
            ]);

            $legalName = match ($accountType) {
                'personal' => $information['account_name'] ?? 'Personal Account',
                'profession' => $information['practice_name'] ?? 'Professional Practice',
                'business' => $information['registered_name'] ?? 'Business Account',
                default => 'ORDO Account',
            };

            $formattedAccountType = match ($accountType) {
                'personal' => 'Personal',
                'profession' => 'Professional / Practice',
                'business' => $information['business_account_type'] ?? 'Business / Organization',
                default => 'Individual',
            };

            $accountProfile = AccountProfile::create([
                'account_id' => $account->id,
                'account_type' => $formattedAccountType,
                'legal_name' => $legalName,
                'trade_name' => $information['trade_name'] ?? null,
                'tin' => null,
                'registration_number' => null,
                'registration_authority' => null,
                'registration_date' => null,
                'industry_profession' => $information['industry'] ?? $information['profession'] ?? null,
                'primary_address' => null,
                'business_email' => $contact['email'] ?? null,
                'contact_number' => $contact['mobile_number'] ?? null,
                'website' => null,
                'logo_path' => null,
            ]);

            DB::table('account_user')->insert([
                'account_id' => $account->id,
                'user_id' => $user->id,
                'relationship' => 'Self / Account Owner',
                'is_administrator' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return [
                'user' => $user,
                'account' => $account,
                'user_profile' => $userProfile,
                'account_profile' => $accountProfile,
            ];
        });

        Auth::login($created['user']);
        if (request()->hasSession()) {
            request()->session()->regenerate();
        }

        $this->sessionService->initSession($created['user'], $created['account']);

        // Keep registration data snapshot in client.registration for reference
        session([
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
