<?php

namespace App\Http\Controllers;

use App\Http\Requests\Registration\AccountStepRequest;
use App\Http\Requests\Registration\BusinessInformationRequest;
use App\Http\Requests\Registration\ContactStepRequest;
use App\Http\Requests\Registration\InvitedInformationRequest;
use App\Http\Requests\Registration\PersonalInformationRequest;
use App\Http\Requests\Registration\ProfessionInformationRequest;
use App\Http\Requests\Registration\ProfileStepRequest;
use App\Http\Requests\Registration\SecurityStepRequest;
use App\Http\Requests\Registration\VerificationStepRequest;
use App\Http\Requests\Registration\VerifyChannelRequest;
use App\Services\Contact\ContactMaskingService;
use App\Services\Contact\ContactVerificationService;
use App\Services\Contact\PhoneNumberService;
use App\Services\RegistrationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function __construct(
        protected RegistrationService $registrationService,
        protected ContactVerificationService $contactVerificationService
    ) {}

    /*
    |--------------------------------------------------------------------------
    | STEP 1 — ABOUT YOU
    |--------------------------------------------------------------------------
    */

    public function profile(): View
    {
        return view('portal.registration.profile', [
            'registrationStep' => 1,
            'registrationTotalSteps' => $this->registrationService->getTotalSteps(),
            'profile' => $this->registrationService->getData('profile', []),
        ]);
    }

    public function storeProfile(ProfileStepRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $this->registrationService->putData('profile', $validated);

        // Keep any existing personal account information strictly in sync with the updated profile
        $profileFullName = $this->computeProfileFullName($validated);
        $information = $this->registrationService->getData('information');
        if (is_array($information) && (($information['account_type'] ?? '') === 'personal' || $this->registrationService->getAccountType() === 'personal' || isset($information['account_name']))) {
            if (($information['account_type'] ?? '') === 'personal' || $this->registrationService->getAccountType() === 'personal') {
                $information['account_name'] = $profileFullName ?: 'Personal Account';
                $this->registrationService->putData('information', $information);
            }
        }

        return redirect()->route('register.account');
    }

    /*
    |--------------------------------------------------------------------------
    | STEP 2 — ACCOUNT TYPE
    |--------------------------------------------------------------------------
    */

    public function account(): View|RedirectResponse
    {
        if (!$this->registrationService->hasProfile()) {
            return redirect()->route('register.profile')->withErrors([
                'profile' => 'Please complete your personal details first.',
            ]);
        }

        $accountTypes = [
            'personal' => [
                'label' => 'For myself',
                'description' => 'A personal account for your own records, compliance or professional matters.',
            ],
            'profession' => [
                'label' => 'For my practice / profession',
                'description' => 'A practice account for individual practitioners, licensed professionals and consultants.',
            ],
            'business' => [
                'label' => 'For my business / company',
                'description' => 'A corporate account for registered companies, partnerships, sole proprietorships and organizations.',
            ],
            'invited' => [
                'label' => 'I was invited to join',
                'description' => 'Join an existing ORDO organization account using an invitation from an account owner or administrator.',
            ],
        ];

        return view('portal.registration.account', [
            'registrationStep' => 2,
            'registrationTotalSteps' => $this->registrationService->getTotalSteps(),
            'accountTypes' => $accountTypes,
            'selectedType' => $this->registrationService->getAccountType(),
        ]);
    }

    public function storeAccount(AccountStepRequest $request): RedirectResponse
    {
        if (!$this->registrationService->hasProfile()) {
            return redirect()->route('register.profile')->withErrors([
                'profile' => 'Please complete your personal details first.',
            ]);
        }

        $newType = $request->validated('account_type');
        $prevType = $this->registrationService->getAccountType();

        $this->registrationService->putData('account', ['account_type' => $newType]);

        if ($prevType !== $newType) {
            session()->forget('registration.information');
        }

        return match ($newType) {
            'personal' => redirect()->route('register.personal'),
            'profession' => redirect()->route('register.profession'),
            'business' => redirect()->route('register.business'),
            'invited' => redirect()->route('register.invited'),
        };
    }

    /*
    |--------------------------------------------------------------------------
    | STEP 3 — INFORMATION SUBTYPES
    |--------------------------------------------------------------------------
    */

    public function information(): RedirectResponse
    {
        if (!$this->registrationService->hasAccount()) {
            return redirect()->route('register.account');
        }

        return match ($this->registrationService->getAccountType()) {
            'personal' => redirect()->route('register.personal'),
            'profession' => redirect()->route('register.profession'),
            'business' => redirect()->route('register.business'),
            'invited' => redirect()->route('register.invited'),
            default => redirect()->route('register.account'),
        };
    }

    public function personal(): View|RedirectResponse
    {
        if (!$this->ensureAccountType('personal')) {
            if (app()->environment('local')) {
                if (!$this->registrationService->hasProfile()) {
                    $this->registrationService->putData('profile', [
                        'first_name' => 'Maria',
                        'last_name' => 'Santos',
                        'date_of_birth' => '1990-01-01',
                        'country' => 'Philippines',
                    ]);
                }
                $this->registrationService->putData('account', [
                    'account_type' => 'personal',
                ]);
            } else {
                return redirect()->route('register.account');
            }
        }

        $profile = $this->registrationService->getData('profile', []);
        $profileFullName = $this->computeProfileFullName($profile);
        $defaultAccountName = $profileFullName ?: 'Personal Account';

        // Keep session information synced with the computed profile full name
        $information = $this->registrationService->getData('information', []);
        if (is_array($information) && !empty($information)) {
            $information['account_name'] = $defaultAccountName;
            $this->registrationService->putData('information', $information);
        }

        return view('portal.registration.personal', [
            'registrationStep' => 3,
            'registrationTotalSteps' => $this->registrationService->getTotalSteps(),
            'profile' => $profile,
            'account' => $this->registrationService->getData('account', []),
            'information' => $information,
            'defaultAccountName' => $defaultAccountName,
        ]);
    }

    public function storePersonal(PersonalInformationRequest $request): RedirectResponse
    {
        if (!$this->ensureAccountType('personal')) {
            return redirect()->route('register.account');
        }

        $validated = $request->validated();
        $profile = $this->registrationService->getData('profile', []);
        $profileFullName = $this->computeProfileFullName($profile);

        // Always enforce the read-only account name from profile unless empty
        $accountName = $profileFullName ?: ($validated['account_name'] ?? 'Personal Account');
        $validated['account_name'] = $accountName;

        if (empty($validated['country'])) {
            $validated['country'] = $profile['country'] ?? 'Philippines';
        }

        $this->registrationService->putData('information', [
            'account_type' => 'personal',
            ...$validated,
        ]);

        return redirect()->route('register.contact');
    }

    public function profession(): View|RedirectResponse
    {
        if (!$this->ensureAccountType('profession')) {
            if (app()->environment('local')) {
                if (!$this->registrationService->hasProfile()) {
                    $this->registrationService->putData('profile', [
                        'first_name' => 'Dr. Maria',
                        'last_name' => 'Santos',
                        'date_of_birth' => '1990-01-01',
                        'country' => 'Philippines',
                    ]);
                }
                $this->registrationService->putData('account', [
                    'account_type' => 'profession',
                ]);
            } else {
                return redirect()->route('register.account');
            }
        }

        return view('portal.registration.profession', [
            'registrationStep' => 3,
            'registrationTotalSteps' => $this->registrationService->getTotalSteps(),
            'profile' => $this->registrationService->getData('profile', []),
            'account' => $this->registrationService->getData('account', []),
            'information' => $this->registrationService->getData('information', []),
        ]);
    }

    public function storeProfession(ProfessionInformationRequest $request): RedirectResponse
    {
        if (!$this->ensureAccountType('profession')) {
            return redirect()->route('register.account');
        }

        $data = $request->validated();
        $data['account_name'] = $data['practice_name'];

        // Automatically preserve country from Step 1 profile if not present
        $profile = $this->registrationService->getData('profile', []);
        if (empty($data['country'])) {
            $data['country'] = $profile['country'] ?? 'Philippines';
        }

        if (empty($data['business_email']) && !empty($data['professional_email'])) {
            $data['business_email'] = $data['professional_email'];
        }

        $this->registrationService->putData('information', [
            'account_type' => 'profession',
            ...$data,
        ]);

        return redirect()->route('register.contact');
    }

    public function business(): View|RedirectResponse
    {
        if (!$this->ensureAccountType('business')) {
            if (app()->environment('local')) {
                if (!$this->registrationService->hasProfile()) {
                    $this->registrationService->putData('profile', [
                        'first_name' => 'Maria',
                        'last_name' => 'Santos',
                        'date_of_birth' => '1990-01-01',
                        'country' => 'Philippines',
                    ]);
                }
                $this->registrationService->putData('account', [
                    'account_type' => 'business',
                ]);
            } else {
                return redirect()->route('register.account');
            }
        }

        return view('portal.registration.business', [
            'registrationStep' => 3,
            'registrationTotalSteps' => $this->registrationService->getTotalSteps(),
            'profile' => $this->registrationService->getData('profile', []),
            'account' => $this->registrationService->getData('account', []),
            'information' => $this->registrationService->getData('information', []),
        ]);
    }

    public function storeBusiness(BusinessInformationRequest $request): RedirectResponse
    {
        if (!$this->ensureAccountType('business')) {
            return redirect()->route('register.account');
        }

        $data = $request->validated();
        $data['account_name'] = $data['registered_name'];

        if (empty($data['business_email']) && !empty($data['company_email'])) {
            $data['business_email'] = $data['company_email'];
        }
        if (empty($data['contact_number']) && !empty($data['company_phone'])) {
            $data['contact_number'] = $data['company_phone'];
        }

        $this->registrationService->putData('information', [
            'account_type' => 'business',
            ...$data,
        ]);

        return redirect()->route('register.contact');
    }

    public function invited(): View|RedirectResponse
    {
        if (!$this->ensureAccountType('invited')) {
            if (app()->environment('local')) {
                if (!$this->registrationService->hasProfile()) {
                    $this->registrationService->putData('profile', [
                        'first_name' => 'Maria',
                        'last_name' => 'Santos',
                        'date_of_birth' => '1990-01-01',
                        'country' => 'Philippines',
                    ]);
                }
                $this->registrationService->putData('account', [
                    'account_type' => 'invited',
                ]);
            } else {
                return redirect()->route('register.account');
            }
        }

        return view('portal.registration.invited', [
            'registrationStep' => 3,
            'registrationTotalSteps' => $this->registrationService->getTotalSteps(),
            'profile' => $this->registrationService->getData('profile', []),
            'account' => $this->registrationService->getData('account', []),
            'information' => $this->registrationService->getData('information', []),
        ]);
    }

    public function storeInvited(InvitedInformationRequest $request): RedirectResponse
    {
        if (!$this->ensureAccountType('invited')) {
            return redirect()->route('register.account');
        }

        $validated = $request->validated();

        // TODO: Look up the invitation by $validated['invitation_code'] and $validated['invitation_email']
        //       in the invitations table. On mismatch, return back()->withErrors([...]).
        //       The role, organization name, and invited_by are READ from the invitation record, not from the user.
        //       Stub values below simulate a successful DB lookup for development.
        $this->registrationService->putData('information', [
            'account_type'     => 'invited',
            'invitation_code'  => $validated['invitation_code'],
            'invitation_email' => $validated['invitation_email'],
            'invitation_status' => 'found',
            'existing_account' => [
                'name'             => 'ABC Corporation',
                'role'             => 'Employee / Staff',
                'invited_by'       => 'Account Administrator',
                'is_administrator' => false,
            ],
            'relationship'     => 'Employee / Staff',
            'is_administrator' => false,
        ]);

        return redirect()->route('register.contact');
    }

    /*
    |--------------------------------------------------------------------------
    | STEP 4 — CONTACT
    |--------------------------------------------------------------------------
    */

    public function contact(): View|RedirectResponse
    {
        if (!$this->registrationService->hasInformation()) {
            if (app()->environment('local')) {
                if (!$this->registrationService->hasProfile()) {
                    $this->registrationService->putData('profile', [
                        'first_name' => 'Maria',
                        'last_name' => 'Santos',
                        'date_of_birth' => '1990-01-01',
                        'country' => 'Philippines',
                    ]);
                }
                if (!$this->registrationService->hasAccount()) {
                    $this->registrationService->putData('account', [
                        'account_type' => 'profession',
                    ]);
                }
                $this->registrationService->putData('information', [
                    'account_type' => $this->registrationService->getAccountType() ?: 'profession',
                    'account_name' => 'Santos Law & Consulting',
                    'practice_name' => 'Santos Law & Consulting',
                    'profession' => 'Lawyer',
                    'country' => 'Philippines',
                ]);
            } else {
                return redirect()->route('register.information')->withErrors([
                    'information' => 'Please complete your account information first.',
                ]);
            }
        }

        return view('portal.registration.contact', [
            'registrationStep' => 4,
            'registrationTotalSteps' => $this->registrationService->getTotalSteps(),
            'contact' => $this->registrationService->getData('contact', []),
            'accountType' => $this->registrationService->getAccountType(),
            'profile' => $this->registrationService->getData('profile', []),
        ]);
    }

    public function storeContact(ContactStepRequest $request): RedirectResponse
    {
        if (!$this->registrationService->hasInformation()) {
            return redirect()->route('register.information');
        }

        $validated = $request->validated();
        if (!empty($validated['mobile_number'])) {
            $validated['mobile_number'] = PhoneNumberService::normalize($validated['mobile_number']);
        }

        $this->registrationService->putData('contact', $validated);

        // Dispatch initial OTPs for unverified channels
        $profile = $this->registrationService->getData('profile', []);
        $name = trim(($profile['first_name'] ?? '') . ' ' . ($profile['last_name'] ?? '')) ?: 'Client';

        if (!$this->registrationService->isEmailVerified() && !empty($validated['email'])) {
            $emailResult = $this->contactVerificationService->sendOtp('email', $validated['email'], $name);
            if (!$emailResult['success']) {
                return redirect()->route('register.contact')
                    ->withInput()
                    ->withErrors([
                        'email' => $emailResult['error'] ?? "We couldn't send your verification email right now. Please try again.",
                    ]);
            }
        }

        return redirect()->route('register.verification');
    }

    /*
    |--------------------------------------------------------------------------
    | STEP 5 — VERIFICATION
    |--------------------------------------------------------------------------
    */

    public function verification(): View|RedirectResponse
    {
        if (!$this->registrationService->hasContact()) {
            if (app()->environment('local')) {
                if (!$this->registrationService->hasInformation()) {
                    $this->registrationService->putData('profile', [
                        'first_name' => 'Maria',
                        'last_name' => 'Santos',
                        'date_of_birth' => '1990-01-01',
                        'country' => 'Philippines',
                    ]);
                    $this->registrationService->putData('account', ['account_type' => 'profession']);
                    $this->registrationService->putData('information', [
                        'account_type' => 'profession',
                        'account_name' => 'Santos Law & Consulting',
                        'profession' => 'Lawyer',
                        'country' => 'Philippines',
                    ]);
                }
                $this->registrationService->putData('contact', [
                    'email' => 'client@ordo.com',
                    'mobile_number' => '+639171234567',
                ]);
            } else {
                return redirect()->route('register.contact');
            }
        }

        $contact = $this->registrationService->getData('contact', []);
        $email = $contact['email'] ?? '';
        $mobile = $contact['mobile_number'] ?? '';

        $isEmailVerified = $this->registrationService->isEmailVerified();
        $isMobileVerified = $this->registrationService->isMobileVerified();
        $isContactVerified = $this->registrationService->isContactVerified();

        // Calculate cooldowns
        $emailRecord = $this->contactVerificationService->getLatestVerification('email', $email);
        $smsRecord = $this->contactVerificationService->getLatestVerification('sms', $mobile);

        $emailCooldown = $emailRecord ? $emailRecord->resendRemainingSeconds() : 0;
        $smsCooldown = $smsRecord ? $smsRecord->resendRemainingSeconds() : 0;

        return view('portal.registration.verification', [
            'registrationStep' => 5,
            'registrationTotalSteps' => $this->registrationService->getTotalSteps(),
            'contact' => $contact,
            'profile' => $this->registrationService->getData('profile', []),
            'email' => $email,
            'mobile' => $mobile,
            'maskedEmail' => ContactMaskingService::maskEmail($email),
            'maskedMobile' => PhoneNumberService::mask($mobile),
            'isEmailVerified' => $isEmailVerified,
            'isMobileVerified' => $isMobileVerified,
            'isContactVerified' => $isContactVerified,
            'emailCooldown' => $emailCooldown,
            'smsCooldown' => $smsCooldown,
        ]);
    }

    public function verifyEmail(VerifyChannelRequest $request): RedirectResponse
    {
        if (!$this->registrationService->hasContact()) {
            return redirect()->route('register.contact');
        }

        $contact = $this->registrationService->getData('contact', []);
        $email = $contact['email'] ?? '';
        $code = $request->validated('verification_code');

        $result = $this->contactVerificationService->verifyOtp('email', $email, $code);

        if (!$result['success']) {
            return redirect()->route('register.verification')->withErrors([
                'email_verification_code' => $result['error'],
            ])->withInput();
        }

        $this->registrationService->markEmailVerified();

        return redirect()->route('register.security')->with('success', 'Email address verified successfully. Please set your account password.');
    }

    public function resendEmail(Request $request): RedirectResponse
    {
        if (!$this->registrationService->hasContact()) {
            return redirect()->route('register.contact');
        }

        $contact = $this->registrationService->getData('contact', []);
        $email = $contact['email'] ?? '';
        $profile = $this->registrationService->getData('profile', []);
        $name = trim(($profile['first_name'] ?? '') . ' ' . ($profile['last_name'] ?? '')) ?: 'Client';

        $result = $this->contactVerificationService->sendOtp('email', $email, $name);

        if (!$result['success']) {
            return redirect()->route('register.verification')->withErrors([
                'email_resend' => $result['error'],
            ]);
        }

        return redirect()->route('register.verification')->with('success', 'A new verification code was sent to your email.');
    }

    public function verifyMobile(VerifyChannelRequest $request): RedirectResponse
    {
        if (!$this->registrationService->hasContact()) {
            return redirect()->route('register.contact');
        }

        $contact = $this->registrationService->getData('contact', []);
        $mobile = $contact['mobile_number'] ?? '';
        $code = $request->validated('verification_code');

        $result = $this->contactVerificationService->verifyOtp('sms', $mobile, $code);

        if (!$result['success']) {
            return redirect()->route('register.verification')->withErrors([
                'mobile_verification_code' => $result['error'],
            ])->withInput();
        }

        $this->registrationService->markMobileVerified();

        if ($this->registrationService->isContactVerified()) {
            return redirect()->route('register.security')->with('success', 'Both email and mobile contact verified successfully.');
        }

        return redirect()->route('register.verification')->with('success', 'Mobile number verified successfully. Please verify your email address.');
    }

    public function resendMobile(Request $request): RedirectResponse
    {
        if (!$this->registrationService->hasContact()) {
            return redirect()->route('register.contact');
        }

        $contact = $this->registrationService->getData('contact', []);
        $mobile = $contact['mobile_number'] ?? '';
        $profile = $this->registrationService->getData('profile', []);
        $name = trim(($profile['first_name'] ?? '') . ' ' . ($profile['last_name'] ?? '')) ?: 'Client';

        $result = $this->contactVerificationService->sendOtp('sms', $mobile, $name);

        if (!$result['success']) {
            return redirect()->route('register.verification')->withErrors([
                'mobile_resend' => $result['error'],
            ]);
        }

        return redirect()->route('register.verification')->with('success', 'A new verification code was sent via SMS.');
    }

    public function verifyContact(Request $request): RedirectResponse
    {
        $channel = $request->input('channel');
        if ($channel === 'mobile' || $channel === 'sms') {
            $vr = app(VerifyChannelRequest::class);
            return $this->verifyMobile($vr);
        }

        $vr = app(VerifyChannelRequest::class);
        return $this->verifyEmail($vr);
    }

    public function resendVerification(Request $request): RedirectResponse
    {
        $channel = $request->input('channel');
        if ($channel === 'mobile' || $channel === 'sms') {
            return $this->resendMobile($request);
        }

        return $this->resendEmail($request);
    }

    /*
    |--------------------------------------------------------------------------
    | STEP 6 — SECURITY
    |--------------------------------------------------------------------------
    */

    public function security(): View|RedirectResponse
    {
        if (!$this->registrationService->isEmailVerified()) {
            if (app()->environment('local')) {
                if (!$this->registrationService->hasContact()) {
                    $this->registrationService->putData('profile', [
                        'first_name' => 'Maria',
                        'last_name' => 'Santos',
                        'date_of_birth' => '1990-01-01',
                        'country' => 'Philippines',
                    ]);
                    $this->registrationService->putData('account', ['account_type' => 'profession']);
                    $this->registrationService->putData('information', [
                        'account_type' => 'profession',
                        'account_name' => 'Santos Law & Consulting',
                        'profession' => 'Lawyer',
                        'country' => 'Philippines',
                    ]);
                    $this->registrationService->putData('contact', [
                        'email' => 'client@ordo.com',
                        'mobile_number' => '+639171234567',
                    ]);
                }
                $this->registrationService->markEmailVerified();
            } else {
                return redirect()->route('register.verification')->withErrors([
                    'verification' => 'Please complete email verification before proceeding to set your password.',
                ]);
            }
        }

        return view('portal.registration.security', [
            'registrationStep' => 6,
            'registrationTotalSteps' => $this->registrationService->getTotalSteps(),
            'contact' => $this->registrationService->getData('contact', []),
            'profile' => $this->registrationService->getData('profile', []),
        ]);
    }

    public function storeSecurity(SecurityStepRequest $request): RedirectResponse
    {
        if (!$this->registrationService->isEmailVerified()) {
            return redirect()->route('register.verification')->withErrors([
                'verification' => 'Please verify your email address first.',
            ]);
        }

        $this->registrationService->putData('security', [
            'password' => $request->validated('password'),
            'password_set' => true,
        ]);

        $this->registrationService->putData('completed', true);

        return redirect()->route('register.confirmation');
    }

    /*
    |--------------------------------------------------------------------------
    | STEP 7 — CONFIRMATION & COMPLETION
    |--------------------------------------------------------------------------
    */

    public function confirmation(): View|RedirectResponse
    {
        if (!$this->registrationService->isEmailVerified() && !auth()->check()) {
            if (app()->environment('local')) {
                $this->registrationService->putData('profile', [
                    'first_name' => 'Maria',
                    'last_name' => 'Santos',
                    'date_of_birth' => '1990-01-01',
                    'country' => 'Philippines',
                ]);
                $this->registrationService->putData('account', ['account_type' => 'profession']);
                $this->registrationService->putData('information', [
                    'account_type' => 'profession',
                    'account_name' => 'Santos Law & Consulting',
                    'profession' => 'Lawyer',
                    'country' => 'Philippines',
                ]);
                $this->registrationService->putData('contact', [
                    'email' => 'client@ordo.com',
                    'mobile_number' => '+639171234567',
                ]);
                $this->registrationService->markEmailVerified();
                $this->registrationService->putData('security', [
                    'password' => 'Secret123!',
                    'password_set' => true,
                ]);
                $this->registrationService->putData('completed', true);
            } else {
                return redirect()->route('register.verification');
            }
        }

        if (!$this->registrationService->hasSecurity() && !auth()->check()) {
            if (app()->environment('local')) {
                $this->registrationService->putData('security', [
                    'password' => 'Secret123!',
                    'password_set' => true,
                ]);
            } else {
                return redirect()->route('register.security');
            }
        }

        return view('portal.registration.confirmation', [
            'registrationStep' => 7,
            'registrationTotalSteps' => $this->registrationService->getTotalSteps(),
            'registration' => $this->registrationService->getData(),
            'accountType' => $this->registrationService->getAccountType(),
        ]);
    }

    public function completeRegistration(): RedirectResponse
    {
        if (!auth()->check()) {
            if (!$this->registrationService->isEmailVerified()) {
                return redirect()->route('register.verification');
            }
            if (!$this->registrationService->hasSecurity()) {
                return redirect()->route('register.security');
            }
            $this->registrationService->completeRegistration();
        }

        return redirect()->route('account.created');
    }

    /**
     * Helper guard for account sub-types.
     */
    protected function ensureAccountType(string $type): bool
    {
        return $this->registrationService->hasAccount() && $this->registrationService->getAccountType() === $type;
    }

    /**
     * Compute full name from a profile array.
     */
    protected function computeProfileFullName(array $profile): string
    {
        $parts = array_filter([
            $profile['first_name'] ?? '',
            $profile['middle_name'] ?? '',
            $profile['last_name'] ?? '',
            $profile['suffix'] ?? '',
        ], fn($val) => !is_null($val) && trim((string)$val) !== '');

        return implode(' ', $parts);
    }
}