<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class RegistrationController extends Controller
{
    /**
     * Total registration steps.
     *
     * 1. About You
     * 2. Account Type
     * 3. Information
     * 4. Contact
     * 5. Verification
     * 6. Security
     * 7. Confirmation
     */
    protected int $registrationTotalSteps = 7;


    /*
    |--------------------------------------------------------------------------
    | HELPERS
    |--------------------------------------------------------------------------
    */

    /**
     * Get the current registration data.
     */
    public function registrationData(): array
    {
        return session('registration', []);
    }


    /**
     * Get the selected account type.
     */
    public function currentAccountType(): ?string
    {
        return session(
            'registration.account.account_type'
        );
    }


    /**
     * Clear registration session.
     */
    public function clearRegistration(): void
    {
        session()->forget('registration');
    }


    /**
     * Check whether Step 1 has been completed.
     */
    protected function requireProfile()
    {
        if (!session()->has('registration.profile')) {

            return redirect()
                ->route('register.profile')
                ->withErrors([
                    'profile' =>
                        'Please complete your personal information first.',
                ]);
        }

        return null;
    }


    /**
     * Check whether Step 2 has been completed.
     */
    protected function requireAccount()
    {
        $profileCheck = $this->requireProfile();

        if ($profileCheck) {
            return $profileCheck;
        }

        if (!session()->has('registration.account')) {

            return redirect()
                ->route('register.account')
                ->withErrors([
                    'account' =>
                        'Please select an account type first.',
                ]);
        }

        return null;
    }


    /**
     * Check whether Step 3 has been completed.
     */
    protected function requireInformation()
    {
        $accountCheck = $this->requireAccount();

        if ($accountCheck) {
            return $accountCheck;
        }

        if (!session()->has('registration.information')) {

            return redirect()
                ->route('register.information')
                ->withErrors([
                    'information' =>
                        'Please complete your account information first.',
                ]);
        }

        return null;
    }


    /**
     * Check whether selected account type matches expected type.
     */
    protected function requireAccountType(string $expectedType)
    {
        $accountCheck = $this->requireAccount();

        if ($accountCheck) {
            return $accountCheck;
        }

        if (
            $this->currentAccountType() !== $expectedType
        ) {

            return redirect()
                ->route('register.account');
        }

        return null;
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 1 — ABOUT YOU
    |--------------------------------------------------------------------------
    */

    public function profile()
    {
        return view(
            'portal.registration.profile',
            [

                'registrationStep' =>
                    1,

                'registrationTotalSteps' =>
                    $this->registrationTotalSteps,

                'profile' =>
                    session(
                        'registration.profile',
                        []
                    ),

            ]
        );
    }


    /**
     * Save Step 1.
     */
    public function storeProfile(Request $request)
    {
        $validated = $request->validate([

            'first_name' => [
                'required',
                'string',
                'max:100',
            ],

            'middle_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'last_name' => [
                'required',
                'string',
                'max:100',
            ],

            'suffix' => [
                'nullable',
                'string',
                'max:20',
            ],

            'date_of_birth' => [
                'required',
                'date_format:Y-m-d',
                'before_or_equal:today',
            ],

            'gender' => [
                'nullable',
                'string',
                'in:prefer_not_to_say,male,female,other',
            ],

            'country' => [
                'required',
                'string',
                'max:100',
            ],

        ]);


        session()->put(
            'registration.profile',
            $validated
        );


        return redirect()
            ->route('register.account');
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 2 — ACCOUNT TYPE
    |--------------------------------------------------------------------------
    */

    public function account()
    {
        $profileCheck = $this->requireProfile();

        if ($profileCheck) {
            return $profileCheck;
        }


        $accountTypes = [

            'personal' => [

                'label' =>
                    'For myself',

                'description' =>
                    'A personal account for your own records, compliance or professional matters.',

            ],

            'profession' => [

                'label' =>
                    'For my profession or practice',

                'description' =>
                    'For a professional, practitioner, consultant, clinic, office or independent practice.',

            ],

            'business' => [

                'label' =>
                    'For a business or organization',

                'description' =>
                    'For a corporation, OPC, sole proprietorship, partnership, association, cooperative or other organization.',

            ],

            'invited' => [

                'label' =>
                    'I was invited to an existing account',

                'description' =>
                    'Join an existing ORDO account using an invitation.',

            ],

        ];


        return view(
            'portal.registration.account',
            [

                'registrationStep' =>
                    2,

                'registrationTotalSteps' =>
                    $this->registrationTotalSteps,

                'accountType' =>
                    session(
                        'registration.account.account_type'
                    ),

                'accountTypes' =>
                    $accountTypes,

            ]
        );
    }


    /**
     * Save Step 2.
     */
    public function storeAccount(Request $request)
    {
        $profileCheck = $this->requireProfile();

        if ($profileCheck) {
            return $profileCheck;
        }


        $validated = $request->validate([

            'account_type' => [

                'required',

                'string',

                'in:personal,profession,business,invited',

            ],

        ]);


        $previousAccountType = session(
            'registration.account.account_type'
        );


        session()->put(
            'registration.account',
            [

                'account_type' =>
                    $validated['account_type'],

            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Clear Step 3 information if account type changes.
        |--------------------------------------------------------------------------
        */

        if (
            $previousAccountType !== null &&
            $previousAccountType !== $validated['account_type']
        ) {

            session()->forget(
                'registration.information'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | First account selection starts clean.
        |--------------------------------------------------------------------------
        */

        if ($previousAccountType === null) {

            session()->forget(
                'registration.information'
            );
        }


        return match (
            $validated['account_type']
        ) {

            'personal' =>
                redirect()
                    ->route('register.personal'),

            'profession' =>
                redirect()
                    ->route('register.profession'),

            'business' =>
                redirect()
                    ->route('register.business'),

            'invited' =>
                redirect()
                    ->route('register.invited'),

        };
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 3 — INFORMATION COMPATIBILITY
    |--------------------------------------------------------------------------
    */

    public function information()
    {
        $accountCheck = $this->requireAccount();

        if ($accountCheck) {
            return $accountCheck;
        }


        return match (
            $this->currentAccountType()
        ) {

            'personal' =>
                redirect()
                    ->route('register.personal'),

            'profession' =>
                redirect()
                    ->route('register.profession'),

            'business' =>
                redirect()
                    ->route('register.business'),

            'invited' =>
                redirect()
                    ->route('register.invited'),

            default =>
                redirect()
                    ->route('register.account'),

        };
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 3A — PERSONAL
    |--------------------------------------------------------------------------
    */

    public function personal()
    {
        $typeCheck =
            $this->requireAccountType('personal');

        if ($typeCheck) {
            return $typeCheck;
        }


        return view(
            'portal.registration.personal',
            [

                'registrationStep' =>
                    3,

                'registrationTotalSteps' =>
                    $this->registrationTotalSteps,

                'profile' =>
                    session(
                        'registration.profile',
                        []
                    ),

                'account' =>
                    session(
                        'registration.account',
                        []
                    ),

                'information' =>
                    session(
                        'registration.information',
                        []
                    ),

            ]
        );
    }


    /**
     * Save Personal information.
     *
     * Personal accounts intentionally collect only the
     * information needed to create the initial account.
     *
     * TIN, registration details, address, website, etc.
     * are NOT collected here.
     */
    public function storePersonal(Request $request)
    {
        $typeCheck =
            $this->requireAccountType('personal');

        if ($typeCheck) {
            return $typeCheck;
        }


        $validated = $request->validate([

            'account_name' => [
                'required',
                'string',
                'max:150',
            ],

            'country' => [
                'required',
                'string',
                'max:100',
            ],

        ]);


        session()->put(
            'registration.information',
            [

                'account_type' =>
                    'personal',

                'account_name' =>
                    $validated['account_name'],

                'country' =>
                    $validated['country'],

            ]
        );


        return redirect()
            ->route('register.contact');
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 3B — PROFESSION
    |--------------------------------------------------------------------------
    */

    public function profession()
    {
        $typeCheck =
            $this->requireAccountType('profession');

        if ($typeCheck) {
            return $typeCheck;
        }


        return view(
            'portal.registration.profession',
            [

                'registrationStep' =>
                    3,

                'registrationTotalSteps' =>
                    $this->registrationTotalSteps,

                'profile' =>
                    session(
                        'registration.profile',
                        []
                    ),

                'account' =>
                    session(
                        'registration.account',
                        []
                    ),

                'information' =>
                    session(
                        'registration.information',
                        []
                    ),

            ]
        );
    }


    /**
     * Save Profession information.
     */
    public function storeProfession(Request $request)
    {
        $typeCheck =
            $this->requireAccountType('profession');

        if ($typeCheck) {
            return $typeCheck;
        }


        $validated = $request->validate([

            'practice_name' => [
                'required',
                'string',
                'max:150',
            ],

            'profession' => [
                'required',
                'string',
                'max:150',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'country' => [
                'required',
                'string',
                'max:100',
            ],

        ]);


        $validated['account_name'] =
            $validated['practice_name'];


        session()->put(
            'registration.information',
            [

                'account_type' =>
                    'profession',

                ...$validated,

            ]
        );


        return redirect()
            ->route('register.contact');
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 3C — BUSINESS
    |--------------------------------------------------------------------------
    */

    public function business()
    {
        $typeCheck =
            $this->requireAccountType('business');

        if ($typeCheck) {
            return $typeCheck;
        }


        return view(
            'portal.registration.business',
            [

                'registrationStep' =>
                    3,

                'registrationTotalSteps' =>
                    $this->registrationTotalSteps,

                'profile' =>
                    session(
                        'registration.profile',
                        []
                    ),

                'account' =>
                    session(
                        'registration.account',
                        []
                    ),

                'information' =>
                    session(
                        'registration.information',
                        []
                    ),

            ]
        );
    }


    /**
     * Save Business information.
     */
    public function storeBusiness(Request $request)
    {
        $typeCheck =
            $this->requireAccountType('business');

        if ($typeCheck) {
            return $typeCheck;
        }


        $validated = $request->validate([

            'business_account_type' => [

                'required',

                'string',

                'in:Sole Proprietorship,Partnership,OPC,Corporation,Association / Nonprofit,Cooperative,Government / Public Entity,Other',

            ],

            'registered_name' => [

                'required',

                'string',

                'max:255',

            ],

            'trade_name' => [

                'nullable',

                'string',

                'max:255',

            ],

            'industry' => [

                'required',

                'string',

                'max:255',

            ],

            'country' => [

                'required',

                'string',

                'max:100',

            ],

        ]);


        $validated['account_name'] =
            $validated['registered_name'];


        session()->put(
            'registration.information',
            [

                'account_type' =>
                    'business',

                ...$validated,

            ]
        );


        return redirect()
            ->route('register.contact');
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 3D — INVITED
    |--------------------------------------------------------------------------
    */

    public function invited()
    {
        $typeCheck =
            $this->requireAccountType('invited');

        if ($typeCheck) {
            return $typeCheck;
        }


        return view(
            'portal.registration.invited',
            [

                'registrationStep' =>
                    3,

                'registrationTotalSteps' =>
                    $this->registrationTotalSteps,

                'profile' =>
                    session(
                        'registration.profile',
                        []
                    ),

                'account' =>
                    session(
                        'registration.account',
                        []
                    ),

                'information' =>
                    session(
                        'registration.information',
                        []
                    ),

            ]
        );
    }


    /**
     * Save invitation information.
     */
    public function storeInvited(Request $request)
    {
        $typeCheck =
            $this->requireAccountType('invited');

        if ($typeCheck) {
            return $typeCheck;
        }


        $validated = $request->validate([

            'invitation_code' => [

                'required',

                'string',

                'max:100',

            ],

            'invitation_email' => [

                'required',

                'email',

                'max:255',

            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Development / Mock Invitation Result
        |--------------------------------------------------------------------------
        */

        session()->put(
            'registration.information',
            [

                'account_type' =>
                    'invited',

                'invitation_code' =>
                    $validated['invitation_code'],

                'invitation_email' =>
                    $validated['invitation_email'],

                'invitation_status' =>
                    'found',

                'existing_account' => [

                    'name' =>
                        'ABC Corporation',

                    'role' =>
                        'Employee / Staff',

                    'invited_by' =>
                        'Account Administrator',

                ],

            ]
        );


        return redirect()
            ->route('register.contact');
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 4 — CONTACT
    |--------------------------------------------------------------------------
    */

    public function contact()
    {
        $informationCheck =
            $this->requireInformation();

        if ($informationCheck) {
            return $informationCheck;
        }


        return view(
            'portal.registration.contact',
            [

                'registrationStep' =>
                    4,

                'registrationTotalSteps' =>
                    $this->registrationTotalSteps,

                'contact' =>
                    session(
                        'registration.contact',
                        []
                    ),

                'accountType' =>
                    $this->currentAccountType(),

                'profile' =>
                    session(
                        'registration.profile',
                        []
                    ),

                'information' =>
                    session(
                        'registration.information',
                        []
                    ),

            ]
        );
    }


    /**
     * Save contact information.
     */
    public function storeContact(Request $request)
    {
        $informationCheck =
            $this->requireInformation();

        if ($informationCheck) {
            return $informationCheck;
        }


        $validated = $request->validate([

            'email' => [

                'required',

                'email',

                'max:255',

            ],

            'mobile_number' => [

                'required',

                'string',

                'max:30',

            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Existing Email Check
        |--------------------------------------------------------------------------
        */

        if (
            User::where(
                'email',
                $validated['email']
            )->exists()
        ) {

            return back()
                ->withErrors([

                    'email' =>
                        'An ORDO account already exists using this email address.',

                ])
                ->withInput();
        }


        session()->put(
            'registration.contact',
            $validated
        );


        session()->put(
            'registration.contact_verification_sent',
            true
        );


        /*
        |--------------------------------------------------------------------------
        | Development Verification Code
        |--------------------------------------------------------------------------
        */

        session()->put(
            'registration.contact_verification_code',
            '123456'
        );


        session()->put(
            'registration.contact_verified',
            false
        );


        return redirect()
            ->route('register.verification');
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 5 — VERIFICATION
    |--------------------------------------------------------------------------
    */

    public function verification()
    {
        $informationCheck =
            $this->requireInformation();

        if ($informationCheck) {
            return $informationCheck;
        }


        if (!session()->has('registration.contact')) {

            return redirect()
                ->route('register.contact');
        }


        if (
            !session()->has(
                'registration.contact_verification_sent'
            )
        ) {

            return redirect()
                ->route('register.contact');
        }


        $contact = session(
            'registration.contact',
            []
        );


        return view(
            'portal.registration.verification',
            [

                'registrationStep' =>
                    5,

                'registrationTotalSteps' =>
                    $this->registrationTotalSteps,

                'email' =>
                    $contact['email']
                    ?? '',

                'mobile' =>
                    $contact['mobile_number']
                    ?? '',

                'verified' =>
                    session(
                        'registration.contact_verified',
                        false
                    ),

                'accountType' =>
                    $this->currentAccountType(),

            ]
        );
    }


    /**
     * Verify contact code.
     */
    public function verifyContact(Request $request)
    {
        if (!session()->has('registration.contact')) {

            return redirect()
                ->route('register.contact');
        }


        $validated = $request->validate([

            'verification_code' => [

                'required',

                'digits:6',

            ],

        ]);


        $validCode = session(
            'registration.contact_verification_code',
            '123456'
        );


        if (
            $validated['verification_code']
            !== (string) $validCode
        ) {

            return redirect()
                ->route('register.verification')
                ->withErrors([

                    'verification_code' =>
                        'The verification code is incorrect.',

                ])
                ->withInput();
        }


        session()->put(
            'registration.contact_verified',
            true
        );


        session()->forget(
            'registration.contact_verification_code'
        );


        return redirect()
            ->route('register.security')
            ->with(
                'success',
                'Your contact information has been verified.'
            );
    }


    /**
     * Resend verification code.
     */
    public function resendVerification()
    {
        if (!session()->has('registration.contact')) {

            return redirect()
                ->route('register.contact');
        }


        session()->put(
            'registration.contact_verification_sent',
            true
        );


        session()->put(
            'registration.contact_verification_code',
            '123456'
        );


        session()->put(
            'registration.contact_verified',
            false
        );


        return redirect()
            ->route('register.verification')
            ->with(
                'success',
                'A new verification code has been sent. Use 123456 for testing.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 6 — SECURITY
    |--------------------------------------------------------------------------
    */

    public function security()
    {
        if (
            session(
                'registration.contact_verified',
                false
            ) !== true
        ) {

            return redirect()
                ->route('register.verification')
                ->withErrors([

                    'verification' =>
                        'Please verify your contact information first.',

                ]);
        }


        return view(
            'portal.registration.security',
            [

                'registrationStep' =>
                    6,

                'registrationTotalSteps' =>
                    $this->registrationTotalSteps,

                'accountType' =>
                    $this->currentAccountType(),

            ]
        );
    }


    /**
     * Save password.
     */
    public function storeSecurity(Request $request)
    {
        if (
            session(
                'registration.contact_verified',
                false
            ) !== true
        ) {

            return redirect()
                ->route('register.verification')
                ->withErrors([

                    'verification' =>
                        'Please verify your contact information first.',

                ]);
        }


        $validated = $request->validate([

            'password' => [

                'required',

                'string',

                'min:8',

                'confirmed',

            ],

        ]);


        session()->put(
            'registration.security',
            [

                'password' =>
                    Hash::make(
                        $validated['password']
                    ),

                'password_set' =>
                    true,

            ]
        );


        session()->put(
            'registration.completed',
            true
        );


        return redirect()
            ->route('register.confirmation');
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 7 — CONFIRMATION
    |--------------------------------------------------------------------------
    */

    public function confirmation()
    {
        if (
            session(
                'registration.completed',
                false
            ) !== true
        ) {

            return redirect()
                ->route('register');
        }


        return view(
            'portal.registration.confirmation',
            [

                'registrationStep' =>
                    7,

                'registrationTotalSteps' =>
                    $this->registrationTotalSteps,

                'accountType' =>
                    $this->currentAccountType(),

                'profile' =>
                    session(
                        'registration.profile',
                        []
                    ),

                'account' =>
                    session(
                        'registration.account',
                        []
                    ),

                'information' =>
                    session(
                        'registration.information',
                        []
                    ),

                'contact' =>
                    session(
                        'registration.contact',
                        []
                    ),

            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STEP 7 — ENTER ORDO
    |--------------------------------------------------------------------------
    */

    public function completeRegistration()
    {
        if (
            session(
                'registration.completed',
                false
            ) !== true
        ) {

            return redirect()
                ->route('register');
        }


        $registrationData = session(
            'registration',
            []
        );


        $accountType =
            $registrationData['account']['account_type']
            ?? null;


        $profile =
            $registrationData['profile']
            ?? [];


        $information =
            $registrationData['information']
            ?? [];


        $contact =
            $registrationData['contact']
            ?? [];


        $security =
            $registrationData['security']
            ?? [];


        /*
        |--------------------------------------------------------------------------
        | INVITED ACCOUNT
        |--------------------------------------------------------------------------
        */

        if ($accountType === 'invited') {

            session([

                'client.authenticated' =>
                    true,

                'client.access_mode' =>
                    'existing_account',

                'client.account' => [

                    'name' =>
                        $information['existing_account']['name']
                        ?? 'ABC Corporation',

                    'role' =>
                        $information['existing_account']['role']
                        ?? 'Employee / Staff',

                    'invited_by' =>
                        $information['existing_account']['invited_by']
                        ?? 'Account Administrator',

                ],

                'client.subscription.status' =>
                    'existing_account',

                'client.registration' => [

                    'profile' =>
                        $profile,

                    'account' =>
                        $registrationData['account']
                        ?? [],

                    'information' =>
                        $information,

                    'contact' =>
                        $contact,

                ],

                'client.user' => array_merge(

                    $profile,

                    [

                        'email' =>
                            $contact['email']
                            ?? '',

                        'mobile_number' =>
                            $contact['mobile_number']
                            ?? '',

                    ]

                ),

            ]);


            session()->forget(
                'registration'
            );


            return redirect()
                ->route('town-hall');
        }


        /*
        |--------------------------------------------------------------------------
        | NEW ACCOUNT
        |--------------------------------------------------------------------------
        */

        $userEmail =
            $contact['email']
            ?? null;


        if (!$userEmail) {

            return redirect()
                ->route('register.contact')
                ->withErrors([

                    'email' =>
                        'Your email address is required.',

                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Prevent Duplicate Email
        |--------------------------------------------------------------------------
        */

        if (
            User::where(
                'email',
                $userEmail
            )->exists()
        ) {

            session()->forget(
                'registration'
            );


            return redirect()
                ->route('login')
                ->withErrors([

                    'email' =>
                        'An account already exists using this email address. Please sign in instead.',

                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Ensure Password Exists
        |--------------------------------------------------------------------------
        */

        if (
            empty($security['password'])
        ) {

            return redirect()
                ->route('register.security')
                ->withErrors([

                    'password' =>
                        'Please create your password first.',

                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Generate Unique ORDO Account Number
        |--------------------------------------------------------------------------
        */

        do {

            $accountNumber =
                'ORDO-' .
                now()->format('Y') .
                '-' .
                strtoupper(
                    Str::random(8)
                );

        } while (
            Account::where(
                'account_number',
                $accountNumber
            )->exists()
        );


        /*
        |--------------------------------------------------------------------------
        | CREATE DATABASE RECORDS
        |--------------------------------------------------------------------------
        */

        $created = DB::transaction(
            function () use (
                $profile,
                $information,
                $contact,
                $security,
                $accountType,
                $accountNumber
            ) {

                /*
                |--------------------------------------------------------------------------
                | USER
                |--------------------------------------------------------------------------
                */

                $user = User::create([

                    'name' =>
                        trim(
                            ($profile['first_name'] ?? '')
                            . ' ' .
                            ($profile['last_name'] ?? '')
                        ),

                    'email' =>
                        $contact['email'],

                    'password' =>
                        $security['password'],

                ]);


                /*
                |--------------------------------------------------------------------------
                | USER PROFILE
                |--------------------------------------------------------------------------
                */

                UserProfile::create([

                    'user_id' =>
                        $user->id,

                    'first_name' =>
                        $profile['first_name'],

                    'middle_name' =>
                        $profile['middle_name']
                        ?? null,

                    'last_name' =>
                        $profile['last_name'],

                    'suffix' =>
                        $profile['suffix']
                        ?? null,

                    'date_of_birth' =>
                        $profile['date_of_birth']
                        ?? null,

                    'gender' =>
                        $profile['gender']
                        ?? null,

                    'country_region' =>
                        $profile['country']
                        ?? null,

                    'mobile_number' =>
                        $contact['mobile_number']
                        ?? null,

                    'profile_photo_path' =>
                        null,

                ]);


                /*
                |--------------------------------------------------------------------------
                | ACCOUNT
                |--------------------------------------------------------------------------
                */

                $account = Account::create([

                    'account_number' =>
                        $accountNumber,

                    'status' =>
                        'active',

                ]);


                /*
                |--------------------------------------------------------------------------
                | ACCOUNT PROFILE
                |--------------------------------------------------------------------------
                |
                | TIN, registration number, registration authority,
                | registration date, address and website remain NULL.
                |
                | These are completed later through Account Profile.
                |
                |--------------------------------------------------------------------------
                */

                $legalName = match ($accountType) {

                    'personal' =>
                        $information['account_name']
                        ?? 'Personal Account',

                    'profession' =>
                        $information['practice_name']
                        ?? 'Professional Practice',

                    'business' =>
                        $information['registered_name']
                        ?? 'Business Account',

                    default =>
                        'ORDO Account',

                };


                $accountProfile = AccountProfile::create([

                    'account_id' =>
                        $account->id,

                    'account_type' =>
                        match ($accountType) {

                            'personal' =>
                                'Personal',

                            'profession' =>
                                'Professional / Practice',

                            'business' =>
                                $information['business_account_type']
                                ?? 'Business / Organization',

                            default =>
                                'Individual',

                        },

                    'legal_name' =>
                        $legalName,

                    'trade_name' =>
                        $information['trade_name']
                        ?? null,

                    /*
                    |--------------------------------------------------------------------------
                    | Completed later in Account Profile
                    |--------------------------------------------------------------------------
                    */

                    'tin' =>
                        null,

                    'registration_number' =>
                        null,

                    'registration_authority' =>
                        null,

                    'registration_date' =>
                        null,

                    'industry_profession' =>
                        $information['industry']
                        ?? $information['profession']
                        ?? null,

                    'primary_address' =>
                        null,

                    'business_email' =>
                        $contact['email']
                        ?? null,

                    'contact_number' =>
                        $contact['mobile_number']
                        ?? null,

                    'website' =>
                        null,

                    'logo_path' =>
                        null,

                ]);


                /*
                |--------------------------------------------------------------------------
                | ACCOUNT USER
                |--------------------------------------------------------------------------
                */

                DB::table('account_user')->insert([

                    'account_id' =>
                        $account->id,

                    'user_id' =>
                        $user->id,

                    'relationship' =>
                        'Self / Account Owner',

                    'is_administrator' =>
                        true,

                    'created_at' =>
                        now(),

                    'updated_at' =>
                        now(),

                ]);


                return [

                    'user' =>
                        $user,

                    'account' =>
                        $account,

                    'account_profile' =>
                        $accountProfile,

                ];

            }
        );


        /*
        |--------------------------------------------------------------------------
        | START 30-DAY FREE ACCESS
        |--------------------------------------------------------------------------
        */

        session([

            'client.authenticated' =>
                true,

            'client.user_id' =>
                $created['user']->id,

            'client.account_id' =>
                $created['account']->id,

            'client.access_mode' =>
                'new_account',


            /*
            |--------------------------------------------------------------------------
            | ACCOUNT
            |--------------------------------------------------------------------------
            */

            'client.account' => [

                'id' =>
                    $created['account']->id,

                'account_number' =>
                    $created['account']->account_number,

                'name' =>
                    $created['account_profile']->legal_name,

                'type' =>
                    $created['account_profile']->account_type,

                'status' =>
                    $created['account']->status,

            ],


            /*
            |--------------------------------------------------------------------------
            | TRIAL
            |--------------------------------------------------------------------------
            */

            'client.trial.active' =>
                true,

            'client.trial.started_at' =>
                now()->toDateString(),

            'client.trial.ends_at' =>
                now()->addDays(30)->toDateString(),

            'client.subscription.status' =>
                'trial',

            'client.subscription.plan' =>
                '30-Day Free Access',


            /*
            |--------------------------------------------------------------------------
            | DEFAULT TRIAL MODULES
            |--------------------------------------------------------------------------
            */

            'client.modules' => [

                'entity-governance' => [

                    'status' =>
                        'trial',

                ],

                'compliance' => [

                    'status' =>
                        'trial',

                ],

                'finance' => [

                    'status' =>
                        'trial',

                ],

                'human-capital' => [

                    'status' =>
                        'trial',

                ],

                'records' => [

                    'status' =>
                        'trial',

                ],

                'transmittals' => [

                    'status' =>
                        'trial',

                ],

            ],


            /*
            |--------------------------------------------------------------------------
            | SAMPLE USAGE
            |--------------------------------------------------------------------------
            */

            'client.usage' => [

                'records' => [

                    'used' =>
                        76,

                    'limit' =>
                        100,

                ],

                'users' => [

                    'used' =>
                        1,

                    'limit' =>
                        1,

                ],

                'storage' => [

                    'used' =>
                        320,

                    'limit' =>
                        500,

                    'unit' =>
                        'MB',

                ],

            ],


            /*
            |--------------------------------------------------------------------------
            | REGISTRATION DATA
            |--------------------------------------------------------------------------
            */

            'client.registration' => [

                'profile' =>
                    $profile,

                'account' =>
                    $registrationData['account']
                    ?? [],

                'information' =>
                    $information,

                'contact' =>
                    $contact,

            ],


            /*
            |--------------------------------------------------------------------------
            | LOGGED-IN USER
            |--------------------------------------------------------------------------
            */

            'client.user' => [

                'first_name' =>
                    $profile['first_name']
                    ?? '',

                'middle_name' =>
                    $profile['middle_name']
                    ?? '',

                'last_name' =>
                    $profile['last_name']
                    ?? '',

                'suffix' =>
                    $profile['suffix']
                    ?? '',

                'date_of_birth' =>
                    $profile['date_of_birth']
                    ?? '',

                'gender' =>
                    $profile['gender']
                    ?? '',

                'country' =>
                    $profile['country']
                    ?? '',

                'email' =>
                    $contact['email']
                    ?? '',

                'mobile_number' =>
                    $contact['mobile_number']
                    ?? '',

            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | CLEAR TEMPORARY REGISTRATION SESSION
        |--------------------------------------------------------------------------
        */

        session()->forget(
            'registration'
        );


        return redirect()
            ->route('town-hall');
    }
}