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
use App\Services\RegistrationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function __construct(
        protected RegistrationService $registrationService
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
        $this->registrationService->putData('profile', $request->validated());

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
            return redirect()->route('register.account');
        }

        return view('portal.registration.personal', [
            'registrationStep' => 3,
            'registrationTotalSteps' => $this->registrationService->getTotalSteps(),
            'profile' => $this->registrationService->getData('profile', []),
            'account' => $this->registrationService->getData('account', []),
            'information' => $this->registrationService->getData('information', []),
        ]);
    }

    public function storePersonal(PersonalInformationRequest $request): RedirectResponse
    {
        if (!$this->ensureAccountType('personal')) {
            return redirect()->route('register.account');
        }

        $this->registrationService->putData('information', [
            'account_type' => 'personal',
            ...$request->validated(),
        ]);

        return redirect()->route('register.contact');
    }

    public function profession(): View|RedirectResponse
    {
        if (!$this->ensureAccountType('profession')) {
            return redirect()->route('register.account');
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

        $this->registrationService->putData('information', [
            'account_type' => 'profession',
            ...$data,
        ]);

        return redirect()->route('register.contact');
    }

    public function business(): View|RedirectResponse
    {
        if (!$this->ensureAccountType('business')) {
            return redirect()->route('register.account');
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

        $this->registrationService->putData('information', [
            'account_type' => 'business',
            ...$data,
        ]);

        return redirect()->route('register.contact');
    }

    public function invited(): View|RedirectResponse
    {
        if (!$this->ensureAccountType('invited')) {
            return redirect()->route('register.account');
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

        $this->registrationService->putData('information', [
            'account_type' => 'invited',
            'invitation_code' => $validated['invitation_code'],
            'invitation_email' => $validated['invitation_email'],
            'invitation_status' => 'found',
            'existing_account' => [
                'name' => 'ABC Corporation',
                'role' => 'Employee / Staff',
                'invited_by' => 'Account Administrator',
            ],
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
            return redirect()->route('register.information')->withErrors([
                'information' => 'Please complete your account information first.',
            ]);
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

        $this->registrationService->putData('contact', $request->validated());
        $this->registrationService->generateVerificationCode();

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
            return redirect()->route('register.contact');
        }

        return view('portal.registration.verification', [
            'registrationStep' => 5,
            'registrationTotalSteps' => $this->registrationService->getTotalSteps(),
            'contact' => $this->registrationService->getData('contact', []),
            'profile' => $this->registrationService->getData('profile', []),
        ]);
    }

    public function verifyContact(VerificationStepRequest $request): RedirectResponse
    {
        if (!$this->registrationService->hasContact()) {
            return redirect()->route('register.contact');
        }

        $code = $request->validated('verification_code');

        if (!$this->registrationService->verifyCode($code)) {
            return redirect()->route('register.verification')->withErrors([
                'verification_code' => 'The verification code is incorrect.',
            ])->withInput();
        }

        return redirect()->route('register.security')->with('success', 'Your contact information has been verified.');
    }

    public function resendVerification(): RedirectResponse
    {
        if (!$this->registrationService->hasContact()) {
            return redirect()->route('register.contact');
        }

        $this->registrationService->generateVerificationCode();

        return redirect()->route('register.verification')->with(
            'success',
            'A new verification code has been sent. Use 123456 for testing.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STEP 6 — SECURITY
    |--------------------------------------------------------------------------
    */

    public function security(): View|RedirectResponse
    {
        if (!$this->registrationService->isContactVerified()) {
            return redirect()->route('register.verification')->withErrors([
                'verification' => 'Please verify your contact information first.',
            ]);
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
        if (!$this->registrationService->isContactVerified()) {
            return redirect()->route('register.verification')->withErrors([
                'verification' => 'Please verify your contact information first.',
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
        if (!$this->registrationService->hasSecurity()) {
            return redirect()->route('register');
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
        if (!$this->registrationService->hasSecurity()) {
            return redirect()->route('register');
        }

        $this->registrationService->completeRegistration();

        return redirect()->route('town-hall');
    }

    /**
     * Helper guard for account sub-types.
     */
    protected function ensureAccountType(string $type): bool
    {
        return $this->registrationService->hasAccount() && $this->registrationService->getAccountType() === $type;
    }
}