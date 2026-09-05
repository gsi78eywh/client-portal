<?php

use App\Http\Controllers\RegistrationController;
use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\ValidationException;
use Illuminate\Validation\ValidationException as LaravelValidationException;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| REGISTRATION CONFIGURATION
|--------------------------------------------------------------------------
|
| 1. About You
| 2. Account Type
| 3. Information
| 4. Contact
| 5. Verification
| 6. Security
|
| Confirmation is the completion page and is NOT counted as a step.
|
|--------------------------------------------------------------------------
*/

$registrationTotalSteps = 6;


/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect()
        ->route('login');

})->name('home');


/*
|--------------------------------------------------------------------------
| DEVELOPMENT TEST
|--------------------------------------------------------------------------
*/

Route::get('/portal-test', function () {

    return view('portal.test');

})->name('portal.test');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {

    return view('auth.login');

})->name('login');


/*
|--------------------------------------------------------------------------
| SETTINGS LOGIN — COMPATIBILITY
|--------------------------------------------------------------------------
*/

Route::get('/settings/login', function () {

    return view('auth.login');

})->name('settings.login');


/*
|--------------------------------------------------------------------------
| LOGIN SUBMISSION
|--------------------------------------------------------------------------
*/

Route::post('/login', function (Request $request) {

    $validated = $request->validate([

        'email' => [
            'required',
            'email',
            'max:255',
        ],

        'password' => [
            'required',
            'string',
        ],

    ]);


    $user = User::where(
        'email',
        $validated['email']
    )->first();


    if (
        !$user ||
        !Hash::check(
            $validated['password'],
            $user->password
        )
    ) {

        throw LaravelValidationException::withMessages([

            'email' =>
                'The email or password you entered is incorrect.',

        ]);

    }


    $userProfile = UserProfile::where(
        'user_id',
        $user->id
    )->first();


    $accountUser = DB::table('account_user')
        ->where('user_id', $user->id)
        ->first();


    $account = $accountUser
        ? Account::find($accountUser->account_id)
        : null;


    /*
    |--------------------------------------------------------------------------
    | AUTHENTICATED USER SESSION
    |--------------------------------------------------------------------------
    */

    session([

        'client.authenticated' =>
            true,

        'client.user_id' =>
            $user->id,

        'client.account_id' =>
            $account?->id,

        'client.user' => [

            'first_name' =>
                $userProfile?->first_name
                ?? $user->name,

            'middle_name' =>
                $userProfile?->middle_name
                ?? '',

            'last_name' =>
                $userProfile?->last_name
                ?? '',

            'suffix' =>
                $userProfile?->suffix
                ?? '',

            'date_of_birth' =>
                $userProfile?->date_of_birth?->format('Y-m-d')
                ?? '',

            'gender' =>
                $userProfile?->gender
                ?? '',

            'country' =>
                $userProfile?->country_region
                ?? '',

            'mobile_number' =>
                $userProfile?->mobile_number
                ?? '',

            'email' =>
                $user->email,

        ],

    ]);


    /*
    |--------------------------------------------------------------------------
    | ACCOUNT SESSION
    |--------------------------------------------------------------------------
    */

    if ($account) {

        $accountProfile = AccountProfile::where(
            'account_id',
            $account->id
        )->first();


        session([

            'client.account' => [

                'id' =>
                    $account->id,

                'account_number' =>
                    $account->account_number,

                'name' =>
                    $accountProfile?->legal_name
                    ?? 'My ORDO Account',

                'type' =>
                    $accountProfile?->account_type
                    ?? '',

                'status' =>
                    $account->status,

            ],

            'client.subscription.status' =>
                'trial',

            'client.subscription.plan' =>
                '30-Day Free Access',

        ]);

    }


    return redirect()
        ->route('town-hall');

})->name('login.submit');


/*
|--------------------------------------------------------------------------
| SETTINGS LOGIN SUBMISSION
|--------------------------------------------------------------------------
*/

Route::post('/settings/login', function (Request $request) {

    $validated = $request->validate([

        'email' => [
            'required',
            'email',
            'max:255',
        ],

        'password' => [
            'required',
            'string',
        ],

    ]);


    $user = User::where(
        'email',
        $validated['email']
    )->first();


    if (
        !$user ||
        !Hash::check(
            $validated['password'],
            $user->password
        )
    ) {

        throw LaravelValidationException::withMessages([

            'email' =>
                'The email or password you entered is incorrect.',

        ]);

    }


    $userProfile = UserProfile::where(
        'user_id',
        $user->id
    )->first();


    $accountUser = DB::table('account_user')
        ->where('user_id', $user->id)
        ->first();


    $account = $accountUser
        ? Account::find($accountUser->account_id)
        : null;


    session([

        'client.authenticated' =>
            true,

        'client.user_id' =>
            $user->id,

        'client.account_id' =>
            $account?->id,

        'client.user' => [

            'first_name' =>
                $userProfile?->first_name
                ?? $user->name,

            'middle_name' =>
                $userProfile?->middle_name
                ?? '',

            'last_name' =>
                $userProfile?->last_name
                ?? '',

            'suffix' =>
                $userProfile?->suffix
                ?? '',

            'date_of_birth' =>
                $userProfile?->date_of_birth?->format('Y-m-d')
                ?? '',

            'gender' =>
                $userProfile?->gender
                ?? '',

            'country' =>
                $userProfile?->country_region
                ?? '',

            'mobile_number' =>
                $userProfile?->mobile_number
                ?? '',

            'email' =>
                $user->email,

        ],

    ]);


    if ($account) {

        $accountProfile = AccountProfile::where(
            'account_id',
            $account->id
        )->first();


        session([

            'client.account' => [

                'id' =>
                    $account->id,

                'account_number' =>
                    $account->account_number,

                'name' =>
                    $accountProfile?->legal_name
                    ?? 'My ORDO Account',

                'type' =>
                    $accountProfile?->account_type
                    ?? '',

                'status' =>
                    $account->status,

            ],

            'client.subscription.status' =>
                'trial',

            'client.subscription.plan' =>
                '30-Day Free Access',

        ]);

    }


    return redirect()
        ->route('town-hall');

})->name('settings.login.submit');


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', function () {

    session()->invalidate();

    session()->regenerateToken();

    return redirect()
        ->route('login');

})->name('logout');


/*
|--------------------------------------------------------------------------
| REGISTRATION
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| REGISTRATION ENTRY
|--------------------------------------------------------------------------
*/

Route::get('/register', function () {

    return redirect()
        ->route('register.profile');

})->name('register');


/*
|--------------------------------------------------------------------------
| STEP 1 — ABOUT YOU
|--------------------------------------------------------------------------
*/

Route::get('/register/profile', function () use ($registrationTotalSteps) {

    return view('portal.registration.profile', [

        'registrationStep' =>
            1,

        'registrationTotalSteps' =>
            $registrationTotalSteps,

        'profile' =>
            session(
                'registration.profile',
                []
            ),

    ]);

})->name('register.profile');


/*
|--------------------------------------------------------------------------
| STEP 1 — ABOUT YOU SUBMIT
|--------------------------------------------------------------------------
*/

Route::post('/register/profile', function (Request $request) {

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


    session([

        'registration.profile' =>
            $validated,

    ]);


    return redirect()
        ->route('register.account');

})->name('profile.update');


/*
|--------------------------------------------------------------------------
| STEP 2 — ACCOUNT TYPE
|--------------------------------------------------------------------------
*/

Route::get('/register/account', function () use ($registrationTotalSteps) {

    if (!session()->has('registration.profile')) {

        return redirect()
            ->route('register.profile')
            ->withErrors([

                'profile' =>
                    'Please complete your personal information first.',

            ]);

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


    return view('portal.registration.account', [

        'registrationStep' =>
            2,

        'registrationTotalSteps' =>
            $registrationTotalSteps,

        'accountType' =>
            session(
                'registration.account.account_type'
            ),

        'accountTypes' =>
            $accountTypes,

    ]);

})->name('register.account');


/*
|--------------------------------------------------------------------------
| STEP 2 — ACCOUNT TYPE SUBMIT
|--------------------------------------------------------------------------
*/

Route::post('/register/account', function (Request $request) {

    if (!session()->has('registration.profile')) {

        return redirect()
            ->route('register.profile')
            ->withErrors([

                'profile' =>
                    'Please complete your personal information first.',

            ]);

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


    session([

        'registration.account' => [

            'account_type' =>
                $validated['account_type'],

        ],

    ]);


    /*
    |--------------------------------------------------------------------------
    | CLEAR PREVIOUS INFORMATION WHEN ACCOUNT TYPE CHANGES
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


    if ($previousAccountType === null) {

        session()->forget(
            'registration.information'
        );

    }


    return match ($validated['account_type']) {

        'personal' =>
            redirect()->route('register.personal'),

        'profession' =>
            redirect()->route('register.profession'),

        'business' =>
            redirect()->route('register.business'),

        'invited' =>
            redirect()->route('register.invited'),

    };

})->name('account.update');


/*
|--------------------------------------------------------------------------
| STEP 3 — INFORMATION COMPATIBILITY
|--------------------------------------------------------------------------
*/

Route::get('/register/information', function () {

    if (!session()->has('registration.profile')) {

        return redirect()
            ->route('register.profile');

    }


    if (!session()->has('registration.account')) {

        return redirect()
            ->route('register.account');

    }


    return match (
        session(
            'registration.account.account_type'
        )
    ) {

        'personal' =>
            redirect()->route('register.personal'),

        'profession' =>
            redirect()->route('register.profession'),

        'business' =>
            redirect()->route('register.business'),

        'invited' =>
            redirect()->route('register.invited'),

        default =>
            redirect()->route('register.account'),

    };

})->name('register.information');


/*
|--------------------------------------------------------------------------
| STEP 3A — PERSONAL
|--------------------------------------------------------------------------
*/

Route::get(
    '/register/personal',
    [RegistrationController::class, 'personal']
)->name('register.personal');


/*
|--------------------------------------------------------------------------
| STEP 3A — PERSONAL SUBMIT
|--------------------------------------------------------------------------
*/

Route::post(
    '/register/personal',
    [RegistrationController::class, 'storePersonal']
)->name('personal.update');


/*
|--------------------------------------------------------------------------
| STEP 3B — PROFESSION
|--------------------------------------------------------------------------
*/

Route::get('/register/profession', function () use ($registrationTotalSteps) {

    if (!session()->has('registration.profile')) {

        return redirect()
            ->route('register.profile');

    }


    if (
        session(
            'registration.account.account_type'
        ) !== 'profession'
    ) {

        return redirect()
            ->route('register.account');

    }


    return view('portal.registration.profession', [

        'registrationStep' =>
            3,

        'registrationTotalSteps' =>
            $registrationTotalSteps,

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

    ]);

})->name('register.profession');


Route::post('/register/profession', function (Request $request) {

    if (!session()->has('registration.profile')) {

        return redirect()
            ->route('register.profile');

    }


    if (
        session(
            'registration.account.account_type'
        ) !== 'profession'
    ) {

        return redirect()
            ->route('register.account');

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


    session([

        'registration.information' => [

            'account_type' =>
                'profession',

            ...$validated,

        ],

    ]);


    return redirect()
        ->route('register.contact');

})->name('profession.update');


/*
|--------------------------------------------------------------------------
| STEP 3C — BUSINESS
|--------------------------------------------------------------------------
*/

Route::get('/register/business', function () use ($registrationTotalSteps) {

    if (!session()->has('registration.profile')) {

        return redirect()
            ->route('register.profile');

    }


    if (
        session(
            'registration.account.account_type'
        ) !== 'business'
    ) {

        return redirect()
            ->route('register.account');

    }


    return view('portal.registration.business', [

        'registrationStep' =>
            3,

        'registrationTotalSteps' =>
            $registrationTotalSteps,

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

    ]);

})->name('register.business');


Route::post('/register/business', function (Request $request) {

    if (!session()->has('registration.profile')) {

        return redirect()
            ->route('register.profile');

    }


    if (
        session(
            'registration.account.account_type'
        ) !== 'business'
    ) {

        return redirect()
            ->route('register.account');

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


    session([

        'registration.information' => [

            'account_type' =>
                'business',

            ...$validated,

        ],

    ]);


    return redirect()
        ->route('register.contact');

})->name('business.update');


/*
|--------------------------------------------------------------------------
| STEP 3D — INVITED
|--------------------------------------------------------------------------
*/

Route::get('/register/invited', function () use ($registrationTotalSteps) {

    if (!session()->has('registration.profile')) {

        return redirect()
            ->route('register.profile');

    }


    if (
        session(
            'registration.account.account_type'
        ) !== 'invited'
    ) {

        return redirect()
            ->route('register.account');

    }


    return view('portal.registration.invited', [

        'registrationStep' =>
            3,

        'registrationTotalSteps' =>
            $registrationTotalSteps,

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

    ]);

})->name('register.invited');


Route::post('/register/invited', function (Request $request) {

    if (!session()->has('registration.profile')) {

        return redirect()
            ->route('register.profile');

    }


    if (
        session(
            'registration.account.account_type'
        ) !== 'invited'
    ) {

        return redirect()
            ->route('register.account');

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


    session([

        'registration.information' => [

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

        ],

    ]);


    return redirect()
        ->route('register.contact');

})->name('invited.update');


/*
|--------------------------------------------------------------------------
| STEP 4 — CONTACT
|--------------------------------------------------------------------------
*/

Route::get('/register/contact', function () use ($registrationTotalSteps) {

    if (!session()->has('registration.profile')) {

        return redirect()
            ->route('register.profile');

    }


    if (!session()->has('registration.account')) {

        return redirect()
            ->route('register.account');

    }


    if (!session()->has('registration.information')) {

        return redirect()
            ->route('register.information');

    }


    return view('portal.registration.contact', [

        'registrationStep' =>
            4,

        'registrationTotalSteps' =>
            $registrationTotalSteps,

        'contact' =>
            session(
                'registration.contact',
                []
            ),

        'accountType' =>
            session(
                'registration.account.account_type'
            ),

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

    ]);

})->name('register.contact');


Route::post('/register/contact', function (Request $request) {

    if (!session()->has('registration.profile')) {

        return redirect()
            ->route('register.profile');

    }


    if (!session()->has('registration.account')) {

        return redirect()
            ->route('register.account');

    }


    if (!session()->has('registration.information')) {

        return redirect()
            ->route('register.information');

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
    | CHECK EXISTING EMAIL
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


    session([

        'registration.contact' =>
            $validated,

        'registration.contact_verification_sent' =>
            true,

        /*
        |--------------------------------------------------------------------------
        | DEVELOPMENT VERIFICATION CODE
        |--------------------------------------------------------------------------
        */

        'registration.contact_verification_code' =>
            '123456',

        'registration.contact_verified' =>
            false,

    ]);


    return redirect()
        ->route('register.verification');

})->name('contact.update');


/*
|--------------------------------------------------------------------------
| STEP 5 — VERIFICATION
|--------------------------------------------------------------------------
*/

Route::get('/register/verification', function () use ($registrationTotalSteps) {

    if (!session()->has('registration.profile')) {

        return redirect()
            ->route('register.profile');

    }


    if (!session()->has('registration.account')) {

        return redirect()
            ->route('register.account');

    }


    if (!session()->has('registration.information')) {

        return redirect()
            ->route('register.information');

    }


    if (!session()->has('registration.contact')) {

        return redirect()
            ->route('register.contact');

    }


    if (!session()->has('registration.contact_verification_sent')) {

        return redirect()
            ->route('register.contact');

    }


    $contact = session(
        'registration.contact',
        []
    );


    return view('portal.registration.verification', [

        'registrationStep' =>
            5,

        'registrationTotalSteps' =>
            $registrationTotalSteps,

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
            session(
                'registration.account.account_type'
            ),

    ]);

})->name('register.verification');


/*
|--------------------------------------------------------------------------
| VERIFY CONTACT CODE
|--------------------------------------------------------------------------
*/

Route::post('/register/verification', function (Request $request) {

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

})->name('verification.verify');


/*
|--------------------------------------------------------------------------
| RESEND VERIFICATION CODE
|--------------------------------------------------------------------------
*/

Route::post('/register/verification/resend', function () {

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

})->name('verification.resend');


/*
|--------------------------------------------------------------------------
| STEP 6 — SECURITY
|--------------------------------------------------------------------------
*/

Route::get('/register/security', function () use ($registrationTotalSteps) {

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


    return view('portal.registration.security', [

        'registrationStep' =>
            6,

        'registrationTotalSteps' =>
            $registrationTotalSteps,

        'accountType' =>
            session(
                'registration.account.account_type'
            ),

    ]);

})->name('register.security');


/*
|--------------------------------------------------------------------------
| STEP 6 — SECURITY SUBMIT
|--------------------------------------------------------------------------
|
| User.php contains:
|
| 'password' => 'hashed'
|
| Therefore we DO NOT call Hash::make() here.
|
|--------------------------------------------------------------------------
*/

Route::post('/register/security', function (Request $request) {

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


    /*
    |--------------------------------------------------------------------------
    | STORE TEMPORARILY IN SESSION
    |--------------------------------------------------------------------------
    */

    session()->put(
        'registration.security',
        [

            'password' =>
                $validated['password'],

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

})->name('security.create');


/*
|--------------------------------------------------------------------------
| REGISTRATION CONFIRMATION
|--------------------------------------------------------------------------
|
| This is the completion/summary page.
| It is NOT counted as Step 7.
|
|--------------------------------------------------------------------------
*/

Route::get('/register/confirmation', function () use ($registrationTotalSteps) {

    if (
        session(
            'registration.completed',
            false
        ) !== true
    ) {

        return redirect()
            ->route('register');

    }


    return view('portal.registration.confirmation', [

        /*
        |--------------------------------------------------------------------------
        | Confirmation belongs after Step 6
        |--------------------------------------------------------------------------
        */

        'registrationStep' =>
            6,

        'registrationTotalSteps' =>
            $registrationTotalSteps,

        'accountType' =>
            session(
                'registration.account.account_type'
            ),

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

    ]);

})->name('register.confirmation');


/*
|--------------------------------------------------------------------------
| ENTER ORDO
|--------------------------------------------------------------------------
*/

Route::post('/register/confirmation', function () {

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
    | PREVENT DUPLICATE EMAIL
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
    | ENSURE PASSWORD EXISTS
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
    | GENERATE UNIQUE ORDO ACCOUNT NUMBER
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

    $created = DB::transaction(function () use (

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

            /*
            |--------------------------------------------------------------------------
            | User model hashes automatically
            |--------------------------------------------------------------------------
            */

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
        | TIN, registration information, address, website, etc.
        | remain empty during registration.
        |
        | These are completed later from Account Profile.
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
            | COMPLETED LATER IN ACCOUNT PROFILE
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

    });


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
    | CLEAR REGISTRATION SESSION
    |--------------------------------------------------------------------------
    */

    session()->forget(
        'registration'
    );


    return redirect()
        ->route('town-hall');

})->name('confirmation.submit');


/*
|--------------------------------------------------------------------------
| OLD CONFIRMATION COMPATIBILITY
|--------------------------------------------------------------------------
*/

Route::get('/confirmation', function () {

    return redirect()
        ->route('register.confirmation');

})->name('legacy.confirmation');


Route::post('/confirmation', function () {

    return redirect()
        ->route('confirmation.submit');

})->name('legacy.confirmation.submit');


/*
|--------------------------------------------------------------------------
| ACCOUNT CREATED — COMPATIBILITY
|--------------------------------------------------------------------------
*/

Route::get('/account-created', function () {

    return view('auth.account-created');

})->name('account-created');


Route::post('/account-created', function () {

    return redirect()
        ->route('town-hall');

})->name('account-created.submit');


/*
|--------------------------------------------------------------------------
| PASSWORD RESET
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password', function () {

    return view('auth.forgot-password');

})->name('password.request');


Route::post('/forgot-password', function (Request $request) {

    $validated = $request->validate([

        'email' => [

            'required',
            'email',
            'max:255',

        ],

    ]);


    session([

        'password_reset.email' =>
            $validated['email'],

        'password_reset.requested' =>
            true,

    ]);


    return redirect()
        ->route('check-email', [

            'email' =>
                $validated['email'],

        ]);

})->name('password.email');


Route::get('/check-email', function (Request $request) {

    $email = $request->query(

        'email',

        session(
            'password_reset.email'
        )

    );


    return view('auth.check-email', [

        'email' =>
            $email,

    ]);

})->name('check-email');


Route::get('/reset-password', function (Request $request) {

    if (
        !session()->has(
            'password_reset.requested'
        )
    ) {

        return redirect()
            ->route('password.request')
            ->withErrors([

                'email' =>
                    'Please request a password reset link first.',

            ]);

    }


    return view('auth.reset-password', [

        'email' =>
            $request->query(

                'email',

                session(
                    'password_reset.email'
                )

            ),

    ]);

})->name('password.reset');


/*
|--------------------------------------------------------------------------
| PASSWORD RESET SUBMIT
|--------------------------------------------------------------------------
*/

Route::post('/reset-password', function (Request $request) {

    if (
        !session()->has(
            'password_reset.requested'
        )
    ) {

        return redirect()
            ->route('password.request')
            ->withErrors([

                'email' =>
                    'Please request a password reset link first.',

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


    $email = session(
        'password_reset.email'
    );


    $user = User::where(
        'email',
        $email
    )->first();


    if ($user) {

        /*
        |--------------------------------------------------------------------------
        | User model casts password to "hashed"
        |--------------------------------------------------------------------------
        */

        $user->password =
            $validated['password'];

        $user->save();

    }


    session([

        'password_reset.completed' =>
            true,

        'password_reset.password_set' =>
            true,

    ]);


    session()->forget(
        'password_reset.requested'
    );


    return redirect()
        ->route('login')
        ->with(

            'success',

            'Your password has been reset successfully. You can now sign in with your new password.'

        );

})->name('password.update');


/*
|--------------------------------------------------------------------------
| TOWN HALL
|--------------------------------------------------------------------------
|
| IMPORTANT:
| Existing dashboard route is preserved.
|
|--------------------------------------------------------------------------
*/

Route::get('/town-hall', function () {

    return view('portal.town-hall');

})->name('town-hall');


/*
|--------------------------------------------------------------------------
| BUSINESS MODULES
|--------------------------------------------------------------------------
*/

Route::get('/entity-governance', function () {

    return view(
        'modules.entity-governance'
    );

})->name('entity-governance');


Route::get('/compliance', function () {

    return view(
        'modules.compliance'
    );

})->name('compliance');


Route::get('/finance', function () {

    return view(
        'modules.finance'
    );

})->name('finance');


Route::get('/human-capital', function () {

    return view(
        'modules.human-capital'
    );

})->name('human-capital');


Route::get('/records', function () {

    return view(
        'modules.records'
    );

})->name('records');


Route::get('/transmittals', function () {

    return view(
        'modules.transmittals'
    );

})->name('transmittals');


/*
|--------------------------------------------------------------------------
| JK&C CLIENT SERVICE
|--------------------------------------------------------------------------
*/

Route::get('/jkc/announcements', function () {

    return view(
        'jkc.announcements'
    );

})->name('jkc.announcements');


Route::get('/jkc/engagements', function () {

    return view(
        'jkc.engagements'
    );

})->name('jkc.engagements');


Route::get('/jkc/subscriptions', function () {

    return view(
        'jkc.subscriptions'
    );

})->name('jkc.subscriptions');


Route::get('/jkc/support', function () {

    return view(
        'jkc.support'
    );

})->name('jkc.support');


Route::get('/jkc/activity-reports', function () {

    return view(
        'jkc.activity-reports'
    );

})->name('jkc.activity-reports');


Route::get('/jkc/billing', function () {

    return view(
        'jkc.billing'
    );

})->name('jkc.billing');


/*
|--------------------------------------------------------------------------
| SETTINGS
|--------------------------------------------------------------------------
*/

Route::get('/settings', function () {

    return view(
        'settings.index'
    );

})->name('settings');


/*
|--------------------------------------------------------------------------
| MY ACCOUNT
|--------------------------------------------------------------------------
*/

Route::get('/settings/my-account', function () {

    $userId = session(
        'client.user_id'
    );


    $user = $userId
        ? User::find($userId)
        : null;


    $userProfile = $user
        ? UserProfile::where(
            'user_id',
            $user->id
        )->first()
        : null;


    $sessionUser = session(
        'client.user',
        []
    );


    $userData = [

        'first_name' =>
            $userProfile?->first_name
            ?? $sessionUser['first_name']
            ?? '',

        'middle_name' =>
            $userProfile?->middle_name
            ?? $sessionUser['middle_name']
            ?? '',

        'last_name' =>
            $userProfile?->last_name
            ?? $sessionUser['last_name']
            ?? '',

        'suffix' =>
            $userProfile?->suffix
            ?? $sessionUser['suffix']
            ?? '',

        'date_of_birth' =>
            $userProfile?->date_of_birth?->format('Y-m-d')
            ?? $sessionUser['date_of_birth']
            ?? '',

        'gender' =>
            $userProfile?->gender
            ?? $sessionUser['gender']
            ?? '',

        'country' =>
            $userProfile?->country_region
            ?? $sessionUser['country']
            ?? '',

        'mobile_number' =>
            $userProfile?->mobile_number
            ?? $sessionUser['mobile_number']
            ?? '',

        'email' =>
            $user?->email
            ?? $sessionUser['email']
            ?? '',

    ];


    return view(
        'settings.my-account',
        [

            'user' =>
                $userData,

        ]
    );

})->name('settings.my-account');


/*
|--------------------------------------------------------------------------
| MY ACCOUNT UPDATE
|--------------------------------------------------------------------------
*/

Route::post('/settings/my-account', function (Request $request) {

    $userId = session(
        'client.user_id'
    );


    if (!$userId) {

        return redirect()
            ->route('login')
            ->withErrors([

                'auth' =>
                    'Please sign in first.',

            ]);

    }


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

        'email' => [

            'required',
            'email',
            'max:255',

        ],

        'mobile_number' => [

            'nullable',
            'string',
            'max:30',

        ],

        'country' => [

            'required',
            'string',
            'max:100',

        ],

    ]);


    $user = User::findOrFail(
        $userId
    );


    /*
    |--------------------------------------------------------------------------
    | PREVENT DUPLICATE EMAIL
    |--------------------------------------------------------------------------
    */

    $emailExists = User::where(
        'email',
        $validated['email']
    )
        ->where(
            'id',
            '!=',
            $user->id
        )
        ->exists();


    if ($emailExists) {

        return back()
            ->withErrors([

                'email' =>
                    'That email address is already being used by another account.',

            ])
            ->withInput();

    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE USER + PROFILE
    |--------------------------------------------------------------------------
    */

    DB::transaction(function () use (
        $user,
        $validated
    ) {

        $user->name =
            trim(

                $validated['first_name']
                . ' ' .
                $validated['last_name']

            );


        $user->email =
            $validated['email'];


        $user->save();


        UserProfile::updateOrCreate(

            [

                'user_id' =>
                    $user->id,

            ],

            [

                'first_name' =>
                    $validated['first_name'],

                'middle_name' =>
                    $validated['middle_name']
                    ?? null,

                'last_name' =>
                    $validated['last_name'],

                'suffix' =>
                    $validated['suffix']
                    ?? null,

                'date_of_birth' =>
                    $validated['date_of_birth'],

                'gender' =>
                    $validated['gender']
                    ?? null,

                'country_region' =>
                    $validated['country'],

                'mobile_number' =>
                    $validated['mobile_number']
                    ?? null,

            ]

        );

    });


    /*
    |--------------------------------------------------------------------------
    | UPDATE SESSION
    |--------------------------------------------------------------------------
    */

    session([

        'client.user' => [

            'first_name' =>
                $validated['first_name'],

            'middle_name' =>
                $validated['middle_name']
                ?? '',

            'last_name' =>
                $validated['last_name'],

            'suffix' =>
                $validated['suffix']
                ?? '',

            'date_of_birth' =>
                $validated['date_of_birth'],

            'gender' =>
                $validated['gender']
                ?? '',

            'country' =>
                $validated['country'],

            'mobile_number' =>
                $validated['mobile_number']
                ?? '',

            'email' =>
                $validated['email'],

        ],

    ]);


    return redirect()
        ->route('settings.my-account')
        ->with(
            'success',
            'Your account information has been updated successfully.'
        );

})->name('settings.my-account.update');


/*
|--------------------------------------------------------------------------
| ACCOUNT PROFILE
|--------------------------------------------------------------------------
*/

Route::get('/settings/account-profile', function () {

    $accountId = session(
        'client.account_id'
    );


    $accountProfile =
        $accountId
        ? AccountProfile::where(
            'account_id',
            $accountId
        )->first()
        : null;


    $account =
        $accountId
        ? Account::find($accountId)
        : null;


    $registrationInformation = session(
        'client.registration.information',
        []
    );


    $profile = [

        'account_type' =>
            $accountProfile?->account_type
            ?? $registrationInformation['business_account_type']
            ?? $registrationInformation['account_type']
            ?? 'Individual',

        'registered_name' =>
            $accountProfile?->legal_name
            ?? $registrationInformation['registered_name']
            ?? $registrationInformation['account_name']
            ?? '',

        'trade_name' =>
            $accountProfile?->trade_name
            ?? $registrationInformation['trade_name']
            ?? '',

        /*
        |--------------------------------------------------------------------------
        | THESE FIELDS ARE COMPLETED LATER
        |--------------------------------------------------------------------------
        */

        'tin' =>
            $accountProfile?->tin
            ?? '',

        'registration_number' =>
            $accountProfile?->registration_number
            ?? '',

        'registration_authority' =>
            $accountProfile?->registration_authority
            ?? '',

        'date_of_registration' =>
            $accountProfile?->registration_date?->format('Y-m-d')
            ?? '',

        'industry' =>
            $accountProfile?->industry_profession
            ?? $registrationInformation['industry']
            ?? $registrationInformation['profession']
            ?? '',

        'primary_address' =>
            $accountProfile?->primary_address
            ?? '',

        'email' =>
            $accountProfile?->business_email
            ?? session(
                'client.user.email',
                ''
            ),

        'contact_number' =>
            $accountProfile?->contact_number
            ?? session(
                'client.user.mobile_number',
                ''
            ),

        'website' =>
            $accountProfile?->website
            ?? '',

        'relationship' =>
            'Self / Account Owner',

        'is_authorized' =>
            'Yes',

        'account_number' =>
            $account?->account_number
            ?? '',

        'status' =>
            $account?->status
            ?? 'active',

    ];


    return view(
        'settings.account-profile',
        [

            'profile' =>
                $profile,

        ]
    );

})->name('settings.account-profile');


/*
|--------------------------------------------------------------------------
| ACCOUNT PROFILE UPDATE
|--------------------------------------------------------------------------
*/

Route::post('/settings/account-profile', function (Request $request) {

    $accountId = session(
        'client.account_id'
    );


    if (!$accountId) {

        return redirect()
            ->route('login')
            ->withErrors([

                'auth' =>
                    'Please sign in first.',

            ]);

    }


    $validated = $request->validate([

        'account_type' => [

            'required',
            'string',
            'max:100',

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

        'tin' => [

            'required',
            'string',
            'max:50',

        ],

        'registration_number' => [

            'nullable',
            'string',
            'max:100',

        ],

        'registration_authority' => [

            'nullable',
            'string',
            'max:150',

        ],

        'date_of_registration' => [

            'nullable',
            'date_format:Y-m-d',

        ],

        'industry' => [

            'nullable',
            'string',
            'max:255',

        ],

        'primary_address' => [

            'required',
            'string',
            'max:500',

        ],

        'email' => [

            'nullable',
            'email',
            'max:255',

        ],

        'contact_number' => [

            'nullable',
            'string',
            'max:30',

        ],

        'website' => [

            'nullable',
            'url',
            'max:255',

        ],

        'relationship' => [

            'nullable',
            'string',
            'max:100',

        ],

        'is_authorized' => [

            'nullable',
            'string',
            'in:Yes,No',

        ],

    ]);


    AccountProfile::updateOrCreate(

        [

            'account_id' =>
                $accountId,

        ],

        [

            'account_type' =>
                $validated['account_type'],

            'legal_name' =>
                $validated['registered_name'],

            'trade_name' =>
                $validated['trade_name']
                ?? null,

            'tin' =>
                $validated['tin'],

            'registration_number' =>
                $validated['registration_number']
                ?? null,

            'registration_authority' =>
                $validated['registration_authority']
                ?? null,

            'registration_date' =>
                $validated['date_of_registration']
                ?? null,

            'industry_profession' =>
                $validated['industry']
                ?? null,

            'primary_address' =>
                $validated['primary_address'],

            'business_email' =>
                $validated['email']
                ?? null,

            'contact_number' =>
                $validated['contact_number']
                ?? null,

            'website' =>
                $validated['website']
                ?? null,

        ]

    );


    /*
    |--------------------------------------------------------------------------
    | UPDATE SESSION
    |--------------------------------------------------------------------------
    */

    session()->put(
        'client.account.name',
        $validated['registered_name']
    );


    session()->put(
        'client.account.type',
        $validated['account_type']
    );


    return redirect()
        ->route('settings.account-profile')
        ->with(
            'success',
            'Account profile updated successfully.'
        );

})->name('settings.account-profile.update');


/*
|--------------------------------------------------------------------------
| SETTINGS — ACCOUNT VERIFICATION
|--------------------------------------------------------------------------
*/

Route::get('/settings/verification', function () {

    return view('settings.verification', [

        'verification' =>
            session(

                'account_verification',

                [

                    'status' =>
                        'Not Started',

                    'remarks' =>
                        null,

                    'documents' =>
                        [],

                    'submitted_at' =>
                        null,

                ]

            ),

    ]);

})->name('settings.verification');


Route::post('/settings/verification', function (Request $request) {

    $validated = $request->validate([

        'remarks' => [

            'nullable',
            'string',
            'max:2000',

        ],

    ]);


    session([

        'account_verification' => [

            'status' =>
                'Submitted',

            'remarks' =>
                $validated['remarks']
                ?? null,

            'documents' =>
                [],

            'submitted_at' =>
                now()->toDateTimeString(),

        ],

    ]);


    return redirect()
        ->route('settings.verification')
        ->with(
            'success',
            'Your account verification request has been submitted.'
        );

})->name('settings.verification.update');


/*
|--------------------------------------------------------------------------
| SETTINGS — USERS & ACCESS
|--------------------------------------------------------------------------
*/

Route::get('/settings/users-access', function () {

    return view(
        'settings.users-access'
    );

})->name('settings.users-access');


/*
|--------------------------------------------------------------------------
| SETTINGS — SWITCH ACCOUNT
|--------------------------------------------------------------------------
*/

Route::get('/settings/switch-account', function () {

    return view(
        'settings.switch-account'
    );

})->name('settings.switch-account');


/*
|--------------------------------------------------------------------------
| SETTINGS — SECURITY
|--------------------------------------------------------------------------
*/

Route::get('/settings/security', function () {

    return view(
        'settings.security'
    );

})->name('settings.security');


/*
|--------------------------------------------------------------------------
| SETTINGS — GENERAL
|--------------------------------------------------------------------------
*/

Route::get('/settings/general', function () {

    return view(
        'settings.general'
    );

})->name('settings.general');


/*
|--------------------------------------------------------------------------
| SETTINGS — NOTIFICATIONS
|--------------------------------------------------------------------------
*/

Route::get('/settings/notifications', function () {

    return view(
        'settings.notifications'
    );

})->name('settings.notifications');


/*
|--------------------------------------------------------------------------
| SETTINGS — SUBSCRIPTION & USAGE
|--------------------------------------------------------------------------
*/

Route::get('/settings/subscription-usage', function () {

    return view(
        'settings.subscription-usage',
        [

            'subscription' => [

                'status' =>
                    session(
                        'client.subscription.status',
                        'trial'
                    ),

                'plan' =>
                    session(
                        'client.subscription.plan',
                        '30-Day Free Access'
                    ),

                'trial_start' =>
                    session(
                        'client.trial.started_at'
                    ),

                'trial_end' =>
                    session(
                        'client.trial.ends_at'
                    ),

            ],

            'modules' =>
                session(
                    'client.modules',
                    []
                ),

            'usage' =>
                session(
                    'client.usage',
                    []
                ),

        ]
    );

})->name('settings.subscription-usage');


/*
|--------------------------------------------------------------------------
| SETTINGS — POLICIES
|--------------------------------------------------------------------------
*/

Route::get('/settings/policies', function () {

    return view(
        'settings.policies'
    );

})->name('settings.policies');


/*
|--------------------------------------------------------------------------
| SETTINGS > MODULE SETTINGS
|--------------------------------------------------------------------------
*/

Route::get('/settings/modules/entity-governance', function () {

    return view(
        'settings.modules.entity-governance'
    );

})->name('settings.modules.entity-governance');


Route::get('/settings/modules/compliance', function () {

    return view(
        'settings.modules.compliance'
    );

})->name('settings.modules.compliance');


Route::get('/settings/modules/finance', function () {

    return view(
        'settings.modules.finance'
    );

})->name('settings.modules.finance');


Route::get('/settings/modules/human-capital', function () {

    return view(
        'settings.modules.human-capital'
    );

})->name('settings.modules.human-capital');


Route::get('/settings/modules/records', function () {

    return view(
        'settings.modules.records'
    );

})->name('settings.modules.records');


Route::get('/settings/modules/transmittals', function () {

    return view(
        'settings.modules.transmittals'
    );

})->name('settings.modules.transmittals');