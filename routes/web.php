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
    if (Auth::check()) {
        return redirect()->route('town-hall');
    }
    return redirect()->route('login');
})->name('home');

Route::get('/portal-test', [PortalController::class, 'test'])->name('portal.test');

/*
|--------------------------------------------------------------------------
| GUEST-ONLY ROUTES
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

    // Compatibility routes
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

    // Step 7: Confirmation & Complete Registration
    Route::get('/register/confirmation', [RegistrationController::class, 'confirmation'])->name('register.confirmation');
    Route::post('/register/confirmation', [RegistrationController::class, 'completeRegistration'])->name('confirmation.submit');

    // Compatibility Routes
    Route::get('/confirmation', [RegistrationController::class, 'confirmation']);
    Route::post('/confirmation', [RegistrationController::class, 'completeRegistration']);
    Route::get('/account-created', [PortalController::class, 'accountCreated'])->name('account.created');
    Route::post('/account-created', function () {
        return redirect()->route('town-hall');
    });
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
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
    Route::get('/town-hall', [PortalController::class, 'townHall'])->name('town-hall');

    /*
    |--------------------------------------------------------------------------
    | BUSINESS MODULES
    |--------------------------------------------------------------------------
    */
    Route::get('/entity-governance', [ModuleController::class, 'entityGovernance'])->name('entity-governance');
    Route::get('/compliance', [ModuleController::class, 'compliance'])->name('compliance');
    Route::get('/finance', [ModuleController::class, 'finance'])->name('finance');
    Route::get('/human-capital', [ModuleController::class, 'humanCapital'])->name('human-capital');
    Route::get('/records', [ModuleController::class, 'records'])->name('records');
    Route::get('/transmittals', [ModuleController::class, 'transmittals'])->name('transmittals');

    /*
    |--------------------------------------------------------------------------
    | JK&C SECTIONS
    |--------------------------------------------------------------------------
    */
    Route::get('/jkc/announcements', [JkcController::class, 'announcements'])->name('jkc.announcements');
    Route::get('/jkc/engagements', [JkcController::class, 'engagements'])->name('jkc.engagements');
    Route::get('/jkc/subscriptions', [JkcController::class, 'subscriptions'])->name('jkc.subscriptions');
    Route::get('/jkc/support', [JkcController::class, 'support'])->name('jkc.support');
    Route::post('/jkc/support', [JkcController::class, 'submitTicket'])->name('jkc.support.submit');
    Route::get('/jkc/activity-reports', [JkcController::class, 'activityReports'])->name('jkc.activity-reports');
    Route::get('/jkc/billing', [JkcController::class, 'billing'])->name('jkc.billing');
    Route::get('/jkc/billing/soa', [JkcController::class, 'downloadSoa'])->name('jkc.billing.soa');
    Route::get('/jkc/billing/invoice/{invoice}', [JkcController::class, 'downloadInvoice'])->name('jkc.billing.invoice');
    Route::get('/jkc/activity-reports/download/{id}', [JkcController::class, 'downloadReport'])->name('jkc.activity-reports.download');

    /*
    |--------------------------------------------------------------------------
    | CENTRAL SETTINGS
    |--------------------------------------------------------------------------
    */
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

    Route::get('/settings/my-account', [SettingsController::class, 'myAccount'])->name('settings.my-account');
    Route::post('/settings/my-account', [SettingsController::class, 'updateMyAccount'])->name('settings.my-account.update');

    Route::get('/settings/account-profile', [SettingsController::class, 'accountProfile'])->name('settings.account-profile');
    Route::post('/settings/account-profile', [SettingsController::class, 'updateAccountProfile'])->name('settings.account-profile.update');

    Route::get('/settings/verification', [SettingsController::class, 'verification'])->name('settings.verification');
    Route::post('/settings/verification', [SettingsController::class, 'submitVerification'])->name('settings.verification.submit');

    Route::get('/settings/users-access', [SettingsController::class, 'usersAccess'])->name('settings.users-access');
    Route::post('/settings/users-access/invite', [SettingsController::class, 'inviteUser'])->name('settings.users-access.invite');
    Route::get('/settings/switch-account', [SettingsController::class, 'switchAccount'])->name('settings.switch-account');
    Route::post('/settings/switch-account/{account?}', [SettingsController::class, 'performSwitchAccount'])->name('settings.switch-account.post');

    Route::get('/settings/security', [SettingsController::class, 'security'])->name('settings.security');
    Route::post('/settings/security', [SettingsController::class, 'updatePassword'])->name('settings.security.update');
    Route::post('/settings/security/two-factor', [SettingsController::class, 'toggleTwoFactor'])->name('settings.security.two-factor');
    Route::post('/settings/security/revoke-sessions', [SettingsController::class, 'revokeOtherSessions'])->name('settings.security.revoke-sessions');

    Route::get('/settings/general', [SettingsController::class, 'general'])->name('settings.general');
    Route::post('/settings/general', [SettingsController::class, 'updateGeneral'])->name('settings.general.update');
    Route::get('/settings/notifications', [SettingsController::class, 'notifications'])->name('settings.notifications');
    Route::post('/settings/notifications', [SettingsController::class, 'updateNotifications'])->name('settings.notifications.update');

    Route::get('/settings/subscription-usage', [SettingsController::class, 'subscriptionUsage'])->name('settings.subscription-usage');
    Route::post('/settings/subscription-usage/modules', [SettingsController::class, 'selectFreeModules'])->name('settings.subscription-usage.modules');
    Route::post('/settings/free-modules', [SettingsController::class, 'selectFreeModules'])->name('settings.free-modules.select');

    Route::get('/settings/policies', [SettingsController::class, 'policies'])->name('settings.policies');

    /*
    |--------------------------------------------------------------------------
    | MODULE SETTINGS
    |--------------------------------------------------------------------------
    */
    Route::get('/settings/modules/entity-governance', [SettingsController::class, 'moduleEntityGovernance'])->name('settings.modules.entity-governance');
    Route::get('/settings/modules/compliance', [SettingsController::class, 'moduleCompliance'])->name('settings.modules.compliance');
    Route::get('/settings/modules/finance', [SettingsController::class, 'moduleFinance'])->name('settings.modules.finance');
    Route::get('/settings/modules/human-capital', [SettingsController::class, 'moduleHumanCapital'])->name('settings.modules.human-capital');
    Route::get('/settings/modules/records', [SettingsController::class, 'moduleRecords'])->name('settings.modules.records');
    Route::get('/settings/modules/transmittals', [SettingsController::class, 'moduleTransmittals'])->name('settings.modules.transmittals');
});