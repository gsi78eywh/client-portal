<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Models\User;
use App\Services\PortalSessionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function __construct(
        protected PortalSessionService $sessionService
    ) {}

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
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        if (!Auth::attempt($credentials, $remember)) {
            throw ValidationException::withMessages([
                'email' => 'The email or password you entered is incorrect.',
            ]);
        }

        $request->session()->regenerate();

        /** @var User $user */
        $user = Auth::user();

        // Hydrate portal session state
        $this->sessionService->initSession($user);

        return redirect()->intended(route('town-hall'));
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $this->sessionService->clearSession();
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
    public function sendResetLink(ForgotPasswordRequest $request): RedirectResponse
    {
        $email = $request->validated('email');

        session([
            'password_reset.email' => $email,
            'password_reset.requested' => true,
        ]);

        return redirect()->route('check-email', [
            'email' => $email,
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
    public function resetPassword(ResetPasswordRequest $request): RedirectResponse
    {
        if (!session()->has('password_reset.requested') && !$request->has('email')) {
            return redirect()->route('password.request')->withErrors([
                'email' => 'Please request a password reset link first.',
            ]);
        }

        $email = $request->input('email', session('password_reset.email'));
        $user = User::where('email', $email)->first();

        if ($user) {
            $user->password = $request->validated('password');
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
