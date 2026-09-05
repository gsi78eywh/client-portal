<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\AccountProfile;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display the login view.
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (!Auth::attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'email' => 'The email or password you entered is incorrect.',
            ]);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        $userProfile = UserProfile::where('user_id', $user->id)->first();

        $accountUser = DB::table('account_user')
            ->where('user_id', $user->id)
            ->first();

        $account = $accountUser
            ? Account::find($accountUser->account_id)
            : null;

        $accountProfile = $account
            ? AccountProfile::where('account_id', $account->id)->first()
            : null;

        // Set session state for portal compatibility
        session([
            'client.authenticated' => true,
            'client.user_id' => $user->id,
            'client.account_id' => $account?->id,
            'client.user' => [
                'first_name' => $userProfile?->first_name ?? $user->name,
                'middle_name' => $userProfile?->middle_name ?? '',
                'last_name' => $userProfile?->last_name ?? '',
                'suffix' => $userProfile?->suffix ?? '',
                'date_of_birth' => $userProfile?->date_of_birth?->format('Y-m-d') ?? '',
                'gender' => $userProfile?->gender ?? '',
                'country' => $userProfile?->country_region ?? '',
                'mobile_number' => $userProfile?->mobile_number ?? '',
                'email' => $user->email,
            ],
        ]);

        if ($account) {
            session([
                'client.account' => [
                    'id' => $account->id,
                    'account_number' => $account->account_number,
                    'name' => $accountProfile?->legal_name ?? 'My ORDO Account',
                    'type' => $accountProfile?->account_type ?? '',
                    'status' => $account->status,
                ],
                'client.subscription.status' => 'trial',
                'client.subscription.plan' => '30-Day Free Access',
            ]);
        }

        return redirect()->intended(route('town-hall'));
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Display the forgot password view.
     */
    public function showForgotPasswordForm(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle the password reset request.
     */
    public function sendResetLink(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        session([
            'password_reset.email' => $validated['email'],
            'password_reset.requested' => true,
        ]);

        return redirect()->route('check-email', [
            'email' => $validated['email'],
        ]);
    }

    /**
     * Display the check email view.
     */
    public function showCheckEmail(Request $request): View
    {
        $email = $request->query('email', session('password_reset.email'));

        return view('auth.check-email', [
            'email' => $email,
        ]);
    }

    /**
     * Display the reset password view.
     */
    public function showResetPasswordForm(Request $request): View|RedirectResponse
    {
        if (!session()->has('password_reset.requested') && !$request->has('email')) {
            return redirect()->route('password.request')->withErrors([
                'email' => 'Please request a password reset link first.',
            ]);
        }

        return view('auth.reset-password', [
            'email' => $request->query('email', session('password_reset.email')),
        ]);
    }

    /**
     * Update the user's password.
     */
    public function resetPassword(Request $request): RedirectResponse
    {
        if (!session()->has('password_reset.requested') && !$request->has('email')) {
            return redirect()->route('password.request')->withErrors([
                'email' => 'Please request a password reset link first.',
            ]);
        }

        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $email = $request->input('email', session('password_reset.email'));

        $user = User::where('email', $email)->first();

        if ($user) {
            $user->password = $validated['password'];
            $user->save();
        }

        session([
            'password_reset.completed' => true,
            'password_reset.password_set' => true,
        ]);

        session()->forget('password_reset.requested');

        return redirect()->route('login')->with(
            'status',
            'Your password has been reset successfully. You can now sign in with your new password.'
        );
    }
}
