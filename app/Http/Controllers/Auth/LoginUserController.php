<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use App\Http\Requests\Auth\LoginUserRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class LoginUserController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginUserRequest $request)
    {
        $this->ensureIsNotRateLimited($request); // Check rate limits first

        $validated = $request->validated();

        // Attempt login
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            if (Auth::check()) {
                $user = Auth::user();

                if (!$user->hasVerifiedEmail()) {
                    flash()->warning("Login successful. Please verify your email to complete your registration.");
                    return redirect()->route('verification.notice');
                } else {
                    flash()->success("Login successful. Welcome back!");

                    if ($user->hasRole('admin')) {
                        return redirect()->intended(route('admin.index'));
                    } elseif ($user->hasRole('staff')) {
                        return redirect()->intended(route('staff.index'));
                    } elseif ($user->hasRole('client')) {
                        return redirect()->intended(route('client.index'));
                    }

                    return redirect()->intended('/');
                }
            }
        }

        RateLimiter::hit($this->throttleKey($request));

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email', 'password');
    }

    /**
     * Ensure the user is not rate-limited
     */
    protected function ensureIsNotRateLimited(Request $request)
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) { // 5 attempts allowed
            throw ValidationException::withMessages([
                'email' => 'Too many login attempts. Please try again in ' . RateLimiter::availableIn($this->throttleKey($request)) . ' seconds.',
            ]);
        }
    }

    /**
     * Define throttle key based on user IP and email.
     */
    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
