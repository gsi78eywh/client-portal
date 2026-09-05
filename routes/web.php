<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('town-hall');
    }
    return redirect()->route('login');
})->name('home');

Route::get('/portal-test', function () {
    return view('portal.test');
})->name('portal.test');


/*
|--------------------------------------------------------------------------
| GUEST-ONLY ROUTES (Redirects authenticated users to /town-hall)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    // Compatibility route
    Route::get('/settings/login', [AuthController::class, 'showLoginForm'])->name('settings.login');
    Route::post('/settings/login', [AuthController::class, 'login'])->name('settings.login.submit');

    /*
    |--------------------------------------------------------------------------
    | PASSWORD RECOVERY
    |--------------------------------------------------------------------------
    */
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/check-email', [AuthController::class, 'showCheckEmail'])->name('check-email');
    Route::get('/reset-password', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

    /*
    |--------------------------------------------------------------------------
    | REGISTRATION FLOW
    |--------------------------------------------------------------------------
    */
    Route::get('/register', [RegistrationController::class, 'profile'])->name('register');

    // Step 1: About You
    Route::get('/register/profile', [RegistrationController::class, 'profile'])->name('register.profile');
    Route::post('/register/profile', [RegistrationController::class, 'storeProfile'])->name('profile.update');

    // Step 2: Account Type
    Route::get('/register/account', [RegistrationController::class, 'account'])->name('register.account');
    Route::post('/register/account', [RegistrationController::class, 'storeAccount'])->name('account.update');

    // Step 3: Information & Subtypes
    Route::get('/register/information', [RegistrationController::class, 'information'])->name('register.information');
    Route::get('/register/personal', [RegistrationController::class, 'personal'])->name('register.personal');
    Route::post('/register/personal', [RegistrationController::class, 'storePersonal'])->name('personal.update');
    Route::get('/register/profession', [RegistrationController::class, 'profession'])->name('register.profession');
    Route::post('/register/profession', [RegistrationController::class, 'storeProfession'])->name('profession.update');
    Route::get('/register/business', [RegistrationController::class, 'business'])->name('register.business');
    Route::post('/register/business', [RegistrationController::class, 'storeBusiness'])->name('business.update');
    Route::get('/register/invited', [RegistrationController::class, 'invited'])->name('register.invited');
    Route::post('/register/invited', [RegistrationController::class, 'storeInvited'])->name('invited.update');

    // Step 4: Contact
    Route::get('/register/contact', [RegistrationController::class, 'contact'])->name('register.contact');
    Route::post('/register/contact', [RegistrationController::class, 'storeContact'])->name('contact.update');

    // Step 5: Verification
    Route::get('/register/verification', [RegistrationController::class, 'verification'])->name('register.verification');
    Route::post('/register/verification', [RegistrationController::class, 'verifyContact'])->name('verification.verify');
    Route::post('/register/verification/resend', [RegistrationController::class, 'resendVerification'])->name('verification.resend');

    // Step 6: Security / Password
    Route::get('/register/security', [RegistrationController::class, 'security'])->name('register.security');
    Route::post('/register/security', [RegistrationController::class, 'storeSecurity'])->name('security.create');

    // Final Step: Confirmation & Account Creation
    Route::get('/register/confirmation', [RegistrationController::class, 'confirmation'])->name('register.confirmation');
    Route::post('/register/confirmation', [RegistrationController::class, 'completeRegistration'])->name('confirmation.submit');

    // Compatibility Routes
    Route::get('/confirmation', [RegistrationController::class, 'confirmation']);
    Route::post('/confirmation', [RegistrationController::class, 'completeRegistration']);
    Route::get('/account-created', function () {
        return view('auth.account-created');
    })->name('account.created');
    Route::post('/account-created', function () {
        return redirect()->route('town-hall');
    });
});


/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES (Protected by 'auth' middleware)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | TOWN HALL (Dashboard)
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
        return view('modules.entity-governance');
    })->name('entity-governance');

    Route::get('/compliance', function () {
        return view('modules.compliance');
    })->name('compliance');

    Route::get('/finance', function () {
        return view('modules.finance');
    })->name('finance');

    Route::get('/human-capital', function () {
        return view('modules.human-capital');
    })->name('human-capital');

    Route::get('/records', function () {
        return view('modules.records');
    })->name('records');

    Route::get('/transmittals', function () {
        return view('modules.transmittals');
    })->name('transmittals');

    /*
    |--------------------------------------------------------------------------
    | JK&C SECTIONS
    |--------------------------------------------------------------------------
    */
    Route::get('/jkc/announcements', function () {
        return view('jkc.announcements');
    })->name('jkc.announcements');

    Route::get('/jkc/engagements', function () {
        return view('jkc.engagements');
    })->name('jkc.engagements');

    Route::get('/jkc/subscriptions', function () {
        return view('jkc.subscriptions');
    })->name('jkc.subscriptions');

    Route::get('/jkc/support', function () {
        return view('jkc.support');
    })->name('jkc.support');

    Route::get('/jkc/activity-reports', function () {
        return view('jkc.activity-reports');
    })->name('jkc.activity-reports');

    Route::get('/jkc/billing', function () {
        return view('jkc.billing');
    })->name('jkc.billing');

    /*
    |--------------------------------------------------------------------------
    | CENTRAL SETTINGS
    |--------------------------------------------------------------------------
    */
    Route::get('/settings', function () {
        return view('settings.index');
    })->name('settings');

    Route::get('/settings/my-account', function () {
        $userId = session('client.user_id') ?? Auth::id();
        $user = $userId ? User::find($userId) : Auth::user();
        $userProfile = $user ? UserProfile::where('user_id', $user->id)->first() : null;

        return view('settings.my-account', [
            'user' => $user,
            'profile' => $userProfile,
        ]);
    })->name('settings.my-account');

    Route::post('/settings/my-account', function (Request $request) {
        $userId = session('client.user_id') ?? Auth::id();
        $user = User::findOrFail($userId);

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'middle_name' => ['nullable', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'suffix' => ['nullable', 'string', 'max:20'],
            'date_of_birth' => ['nullable', 'date'],
            'gender' => ['nullable', 'string', 'max:50'],
            'country_region' => ['nullable', 'string', 'max:100'],
            'mobile_number' => ['nullable', 'string', 'max:30'],
        ]);

        $userProfile = UserProfile::firstOrNew(['user_id' => $user->id]);
        $userProfile->fill($validated);
        $userProfile->save();

        session([
            'client.user.first_name' => $userProfile->first_name,
            'client.user.middle_name' => $userProfile->middle_name ?? '',
            'client.user.last_name' => $userProfile->last_name,
            'client.user.suffix' => $userProfile->suffix ?? '',
            'client.user.date_of_birth' => $userProfile->date_of_birth?->format('Y-m-d') ?? '',
            'client.user.gender' => $userProfile->gender ?? '',
            'client.user.country' => $userProfile->country_region ?? '',
            'client.user.mobile_number' => $userProfile->mobile_number ?? '',
        ]);

        return redirect()->route('settings.my-account')->with('status', 'Personal profile updated successfully.');
    })->name('settings.my-account.update');

    Route::get('/settings/account-profile', function () {
        $accountId = session('client.account_id');
        $account = $accountId ? Account::find($accountId) : null;
        $profile = $account ? AccountProfile::where('account_id', $account->id)->first() : null;

        return view('settings.account-profile', [
            'account' => $account,
            'profile' => $profile,
        ]);
    })->name('settings.account-profile');

    Route::post('/settings/account-profile', function (Request $request) {
        $accountId = session('client.account_id');
        $account = Account::findOrFail($accountId);

        $validated = $request->validate([
            'account_type' => ['nullable', 'string', 'max:100'],
            'legal_name' => ['required', 'string', 'max:255'],
            'trade_name' => ['nullable', 'string', 'max:255'],
            'tin' => ['nullable', 'string', 'max:50'],
            'registration_number' => ['nullable', 'string', 'max:100'],
            'registration_authority' => ['nullable', 'string', 'max:150'],
            'registration_date' => ['nullable', 'date'],
            'industry_profession' => ['nullable', 'string', 'max:150'],
            'primary_address' => ['nullable', 'string'],
            'business_email' => ['nullable', 'email', 'max:255'],
            'contact_number' => ['nullable', 'string', 'max:30'],
            'website' => ['nullable', 'url', 'max:255'],
        ]);

        $accountProfile = AccountProfile::firstOrNew(['account_id' => $account->id]);
        $accountProfile->fill($validated);
        $accountProfile->save();

        session([
            'client.account.name' => $accountProfile->legal_name,
            'client.account.type' => $accountProfile->account_type ?? '',
        ]);

        return redirect()->route('settings.account-profile')->with('status', 'Account profile updated successfully.');
    })->name('settings.account-profile.update');

    Route::get('/settings/verification', function () {
        return view('settings.verification');
    })->name('settings.verification');

    Route::post('/settings/verification', function (Request $request) {
        return redirect()->route('settings.verification')->with('status', 'Verification submitted.');
    })->name('settings.verification.submit');

    Route::get('/settings/users-access', function () {
        return view('settings.users-access');
    })->name('settings.users-access');

    Route::get('/settings/switch-account', function () {
        return view('settings.switch-account');
    })->name('settings.switch-account');

    Route::get('/settings/security', function () {
        return view('settings.security');
    })->name('settings.security');

    Route::get('/settings/general', function () {
        return view('settings.general');
    })->name('settings.general');

    Route::get('/settings/notifications', function () {
        return view('settings.notifications');
    })->name('settings.notifications');

    Route::get('/settings/subscription-usage', function () {
        return view('settings.subscription-usage');
    })->name('settings.subscription-usage');

    Route::get('/settings/policies', function () {
        return view('settings.policies');
    })->name('settings.policies');

    /*
    |--------------------------------------------------------------------------
    | MODULE SETTINGS
    |--------------------------------------------------------------------------
    */
    Route::get('/settings/modules/entity-governance', function () {
        return view('settings.modules.entity-governance');
    })->name('settings.modules.entity-governance');

    Route::get('/settings/modules/compliance', function () {
        return view('settings.modules.compliance');
    })->name('settings.modules.compliance');

    Route::get('/settings/modules/finance', function () {
        return view('settings.modules.finance');
    })->name('settings.modules.finance');

    Route::get('/settings/modules/human-capital', function () {
        return view('settings.modules.human-capital');
    })->name('settings.modules.human-capital');

    Route::get('/settings/modules/records', function () {
        return view('settings.modules.records');
    })->name('settings.modules.records');

    Route::get('/settings/modules/transmittals', function () {
        return view('settings.modules.transmittals');
    })->name('settings.modules.transmittals');
});