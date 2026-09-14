<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JkcController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

Route::get('/portal-test', [PortalController::class, 'test'])
    ->name('portal.test');

Route::get('/prototype', [PortalController::class, 'prototype'])
    ->name('prototype');

/*
|--------------------------------------------------------------------------
| AUTHENTICATION / LOGIN
|--------------------------------------------------------------------------
|
| The login screen is intentionally accessible directly without guest middleware
| interception, ensuring the portal entry flow always displays the login mockup
| upon navigation even if an existing session was previously stored.
|
*/

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::get('/settings/login', [AuthController::class, 'showLoginForm'])
    ->name('settings.login');

Route::post('/settings/login', [AuthController::class, 'login'])
    ->name('settings.login.submit');

if (app()->environment('local')) {
    Route::get('/dev-preview-login', function (\Illuminate\Http\Request $request) {
        $user = \App\Models\User::where('email', 'client@ordo.com')->first();
        if ($user) {
            auth()->login($user);
            $account = $user->currentAccount();
            session([
                'client.account_id' => $account?->id ?? 1,
                'client.subscription.status' => 'trial',
            ]);
        }
        $redirectTarget = $request->query('redirect', 'transmittals');
        if (str_starts_with($redirectTarget, '/') || str_contains($redirectTarget, '?')) {
            return redirect('/' . ltrim($redirectTarget, '/'));
        }
        if (\Illuminate\Support\Facades\Route::has($redirectTarget)) {
            $extra = $request->except('redirect');
            return redirect()->route($redirectTarget, $extra);
        }
        return redirect()->route('transmittals');
    });
}



/*
|--------------------------------------------------------------------------
| GUEST-ONLY ROUTES
|--------------------------------------------------------------------------
|
| These routes are only available when the user is NOT logged in.
|
*/


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
|
| Registration is intentionally NOT inside the guest middleware.
|
| This allows the registration pages to be opened during development
| even if a previous login session still exists.
|
| Registration session data is handled by RegistrationController.
|
*/


/*
|--------------------------------------------------------------------------
| STEP 1: ABOUT YOU
|--------------------------------------------------------------------------
*/

Route::get('/register', [RegistrationController::class, 'profile'])
    ->name('register');

Route::get('/register/profile', [RegistrationController::class, 'profile'])
    ->name('register.profile');

Route::post('/register/profile', [RegistrationController::class, 'storeProfile'])
    ->name('profile.update');


/*
|--------------------------------------------------------------------------
| STEP 2: ACCOUNT TYPE
|--------------------------------------------------------------------------
*/

Route::get('/register/account', [RegistrationController::class, 'account'])
    ->name('register.account');

Route::post('/register/account', [RegistrationController::class, 'storeAccount'])
    ->name('account.update');


/*
|--------------------------------------------------------------------------
| STEP 3: INFORMATION & SUBTYPES
|--------------------------------------------------------------------------
*/

Route::get('/register/information', [RegistrationController::class, 'information'])
    ->name('register.information');

Route::post('/register/information', [RegistrationController::class, 'information'])
    ->name('information.update');



/*
|--------------------------------------------------------------------------
| PERSONAL ACCOUNT
|--------------------------------------------------------------------------
*/

Route::get('/register/personal', [RegistrationController::class, 'personal'])
    ->name('register.personal');

Route::post('/register/personal', [RegistrationController::class, 'storePersonal'])
    ->name('personal.update');


/*
|--------------------------------------------------------------------------
| PROFESSIONAL ACCOUNT
|--------------------------------------------------------------------------
*/

Route::get('/register/profession', [RegistrationController::class, 'profession'])
    ->name('register.profession');

Route::post('/register/profession', [RegistrationController::class, 'storeProfession'])
    ->name('profession.update');


/*
|--------------------------------------------------------------------------
| BUSINESS ACCOUNT
|--------------------------------------------------------------------------
*/

Route::get('/register/business', [RegistrationController::class, 'business'])
    ->name('register.business');

Route::post('/register/business', [RegistrationController::class, 'storeBusiness'])
    ->name('business.update');


/*
|--------------------------------------------------------------------------
| INVITED ACCOUNT
|--------------------------------------------------------------------------
*/

Route::get('/register/invited', [RegistrationController::class, 'invited'])
    ->name('register.invited');

Route::post('/register/invited', [RegistrationController::class, 'storeInvited'])
    ->name('invited.update');


/*
|--------------------------------------------------------------------------
| STEP 4: CONTACT
|--------------------------------------------------------------------------
*/

Route::get('/register/contact', [RegistrationController::class, 'contact'])
    ->name('register.contact');

Route::post('/register/contact', [RegistrationController::class, 'storeContact'])
    ->name('contact.update');


/*
|--------------------------------------------------------------------------
| STEP 5: VERIFICATION
|--------------------------------------------------------------------------
*/

Route::get('/register/verification', [RegistrationController::class, 'verification'])
    ->name('register.verification');

Route::post('/register/verification', [RegistrationController::class, 'verifyContact'])
    ->name('verification.verify');

Route::post('/register/verification/resend', [RegistrationController::class, 'resendVerification'])
    ->name('verification.resend');

Route::post('/register/verification/email', [RegistrationController::class, 'verifyEmail'])
    ->name('verification.email.verify');

Route::post('/register/verification/email/resend', [RegistrationController::class, 'resendEmail'])
    ->name('verification.email.resend');

Route::post('/register/verification/mobile', [RegistrationController::class, 'verifyMobile'])
    ->name('verification.mobile.verify');

Route::post('/register/verification/mobile/resend', [RegistrationController::class, 'resendMobile'])
    ->name('verification.mobile.resend');


/*
|--------------------------------------------------------------------------
| STEP 6: SECURITY / PASSWORD
|--------------------------------------------------------------------------
*/

Route::get('/register/security', [RegistrationController::class, 'security'])
    ->name('register.security');

Route::post('/register/security', [RegistrationController::class, 'storeSecurity'])
    ->name('security.create');


/*
|--------------------------------------------------------------------------
| STEP 7: CONFIRMATION & COMPLETE REGISTRATION
|--------------------------------------------------------------------------
*/

Route::get('/register/confirmation', [RegistrationController::class, 'confirmation'])
    ->name('register.confirmation');

Route::post('/register/confirmation', [RegistrationController::class, 'completeRegistration'])
    ->name('confirmation.submit');

Route::post('/register/complete', [RegistrationController::class, 'completeRegistration'])
    ->name('register.complete');


/*
|--------------------------------------------------------------------------
| REGISTRATION COMPATIBILITY ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/confirmation', [RegistrationController::class, 'confirmation']);

Route::post('/confirmation', [RegistrationController::class, 'completeRegistration']);


/*
|--------------------------------------------------------------------------
| ACCOUNT CREATED
|--------------------------------------------------------------------------
*/

Route::get('/account-created', [PortalController::class, 'accountCreated'])
    ->name('account.created');

Route::post('/account-created', function () {

    return redirect()->route('town-hall');

});


/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
|
| Everything below this point requires an authenticated user.
|
*/


Route::middleware('auth')->group(function () {



    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');


    /*
    |--------------------------------------------------------------------------
    | TOWN HALL (DASHBOARD)
    |--------------------------------------------------------------------------
    */

    Route::get('/town-hall', [PortalController::class, 'townHall'])
        ->name('town-hall');

    Route::get('/townhall', [PortalController::class, 'townHall'])
        ->name('townhall');

    Route::post('/portal/set-state', [PortalController::class, 'setPrototypeState'])
        ->name('portal.set-state');

    Route::post('/portal/simulate-verification', [PortalController::class, 'simulateVerification'])
        ->name('portal.simulate-verification');

    Route::post('/portal/select-free-modules', [PortalController::class, 'saveFreeModules'])
        ->name('portal.select-free-modules');


    /*
    |--------------------------------------------------------------------------
    | BUSINESS MODULES
    |--------------------------------------------------------------------------
    */

    Route::get('/entity-governance', [ModuleController::class, 'entityGovernance'])
        ->name('entity-governance');

    Route::post('/entity-governance', [ModuleController::class, 'storeEntityGovernance'])
        ->name('entity-governance.store');

    Route::match(['put', 'post'], '/entity-governance/{id}', [ModuleController::class, 'updateEntityGovernance'])
        ->name('entity-governance.update');

    Route::get('/compliance', [ModuleController::class, 'compliance'])
        ->name('compliance');

    Route::post('/compliance', [ModuleController::class, 'storeCompliance'])
        ->name('compliance.store');

    Route::match(['put', 'post'], '/compliance/{id}', [ModuleController::class, 'updateCompliance'])
        ->name('compliance.update');

    Route::get('/finance', [ModuleController::class, 'finance'])
        ->name('finance');

    Route::post('/finance', [ModuleController::class, 'storeFinance'])
        ->name('finance.store');

    Route::match(['put', 'post'], '/finance/{id}', [ModuleController::class, 'updateFinance'])
        ->name('finance.update');

    Route::get('/human-capital', [ModuleController::class, 'humanCapital'])
        ->name('human-capital');

    Route::post('/human-capital', [ModuleController::class, 'storeHumanCapital'])
        ->name('human-capital.store');

    Route::match(['put', 'post'], '/human-capital/{id}', [ModuleController::class, 'updateHumanCapital'])
        ->name('human-capital.update');


    Route::get('/records', [ModuleController::class, 'records'])
        ->name('records');

    Route::post('/records', [ModuleController::class, 'storeRecord'])
        ->name('records.store');

    Route::match(['put', 'post'], '/records/{id}', [ModuleController::class, 'updateRecord'])
        ->name('records.update');

    Route::get('/transmittals', [ModuleController::class, 'transmittals'])
        ->name('transmittals');

    Route::post('/transmittals', [ModuleController::class, 'storeTransmittal'])
        ->name('transmittals.store');

    Route::match(['put', 'post'], '/transmittals/{id}', [ModuleController::class, 'updateTransmittal'])
        ->name('transmittals.update');


    /*
    |--------------------------------------------------------------------------
    | JK&C SECTIONS
    |--------------------------------------------------------------------------
    */

    Route::get('/jkc/announcements', [JkcController::class, 'announcements'])
        ->name('jkc.announcements');

    Route::get('/jkc/engagements', [JkcController::class, 'engagements'])
        ->name('jkc.engagements');

    Route::get('/jkc/subscriptions', [JkcController::class, 'subscriptions'])
        ->name('jkc.subscriptions');

    Route::get('/jkc/support', [JkcController::class, 'support'])
        ->name('jkc.support');

    Route::post('/jkc/support', [JkcController::class, 'submitTicket'])
        ->name('jkc.support.submit');

    Route::get('/jkc/activity-reports', [JkcController::class, 'activityReports'])
        ->name('jkc.activity-reports');

    Route::get('/jkc/billing', [JkcController::class, 'billing'])
        ->name('jkc.billing');

    Route::get('/jkc/billing/soa', [JkcController::class, 'downloadSoa'])
        ->name('jkc.billing.soa');

    Route::get('/jkc/billing/invoice/{invoice}', [JkcController::class, 'downloadInvoice'])
        ->name('jkc.billing.invoice');

    Route::get('/jkc/activity-reports/download/{id}', [JkcController::class, 'downloadReport'])
        ->name('jkc.activity-reports.download');


    /*
    |--------------------------------------------------------------------------
    | CENTRAL SETTINGS
    |--------------------------------------------------------------------------
    */

    Route::get('/settings', [SettingsController::class, 'index'])
        ->name('settings');


    /*
    |--------------------------------------------------------------------------
    | MY ACCOUNT
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/my-account', [SettingsController::class, 'myAccount'])
        ->name('settings.my-account');

    Route::post('/settings/my-account', [SettingsController::class, 'updateMyAccount'])
        ->name('settings.my-account.update');


    /*
    |--------------------------------------------------------------------------
    | ACCOUNT PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/account-profile', [SettingsController::class, 'accountProfile'])
        ->name('settings.account-profile');

    Route::post('/settings/account-profile', [SettingsController::class, 'updateAccountProfile'])
        ->name('settings.account-profile.update');


    /*
    |--------------------------------------------------------------------------
    | VERIFICATION
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/verification', [SettingsController::class, 'verification'])
        ->name('settings.verification');

    Route::post('/settings/verification', [SettingsController::class, 'submitVerification'])
        ->name('settings.verification.submit');


    /*
    |--------------------------------------------------------------------------
    | USERS & ACCESS
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/users-access', [SettingsController::class, 'usersAccess'])
        ->name('settings.users-access');

    Route::post('/settings/users-access/invite', [SettingsController::class, 'inviteUser'])
        ->name('settings.users-access.invite');


    /*
    |--------------------------------------------------------------------------
    | SWITCH ACCOUNT
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/switch-account', [SettingsController::class, 'switchAccount'])
        ->name('settings.switch-account');

    Route::post('/settings/switch-account/{account?}', [SettingsController::class, 'performSwitchAccount'])
        ->name('settings.switch-account.post');


    /*
    |--------------------------------------------------------------------------
    | SECURITY
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/security', [SettingsController::class, 'security'])
        ->name('settings.security');

    Route::post('/settings/security', [SettingsController::class, 'updatePassword'])
        ->name('settings.security.update');

    Route::post('/settings/security/two-factor', [SettingsController::class, 'toggleTwoFactor'])
        ->name('settings.security.two-factor');

    Route::post('/settings/security/revoke-sessions', [SettingsController::class, 'revokeOtherSessions'])
        ->name('settings.security.revoke-sessions');


    /*
    |--------------------------------------------------------------------------
    | GENERAL SETTINGS
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/general', [SettingsController::class, 'general'])
        ->name('settings.general');

    Route::post('/settings/general', [SettingsController::class, 'updateGeneral'])
        ->name('settings.general.update');


    /*
    |--------------------------------------------------------------------------
    | NOTIFICATIONS
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/notifications', [SettingsController::class, 'notifications'])
        ->name('settings.notifications');

    Route::post('/settings/notifications', [SettingsController::class, 'updateNotifications'])
        ->name('settings.notifications.update');


    /*
    |--------------------------------------------------------------------------
    | SUBSCRIPTION & USAGE
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/subscription-usage', [SettingsController::class, 'subscriptionUsage'])
        ->name('settings.subscription-usage');

    Route::post('/settings/subscription-usage/modules', [SettingsController::class, 'selectFreeModules'])
        ->name('settings.subscription-usage.modules');

    Route::post('/settings/free-modules', [SettingsController::class, 'selectFreeModules'])
        ->name('settings.free-modules.select');


    /*
    |--------------------------------------------------------------------------
    | POLICIES
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/policies', [SettingsController::class, 'policies'])
        ->name('settings.policies');


    /*
    |--------------------------------------------------------------------------
    | MODULE SETTINGS
    |--------------------------------------------------------------------------
    */

    Route::get('/settings/modules/entity-governance', [SettingsController::class, 'moduleEntityGovernance'])
        ->name('settings.modules.entity-governance');

    Route::get('/settings/modules/compliance', [SettingsController::class, 'moduleCompliance'])
        ->name('settings.modules.compliance');

    Route::get('/settings/modules/finance', [SettingsController::class, 'moduleFinance'])
        ->name('settings.modules.finance');

    Route::post('/settings/modules/finance', [SettingsController::class, 'updateModuleFinance'])
        ->name('settings.modules.finance.update');

    Route::get('/settings/modules/human-capital', [SettingsController::class, 'moduleHumanCapital'])
        ->name('settings.modules.human-capital');

    Route::post('/settings/modules/human-capital', [SettingsController::class, 'updateModuleHumanCapital'])
        ->name('settings.modules.human-capital.update');


    Route::get('/settings/modules/records', [SettingsController::class, 'moduleRecords'])
        ->name('settings.modules.records');

    Route::post('/settings/modules/records', [SettingsController::class, 'updateModuleRecords'])
        ->name('settings.modules.records.update');

    Route::get('/settings/modules/transmittals', [SettingsController::class, 'moduleTransmittals'])
        ->name('settings.modules.transmittals');

    Route::post('/settings/modules/transmittals', [SettingsController::class, 'updateModuleTransmittals'])
        ->name('settings.modules.transmittals.update');

});