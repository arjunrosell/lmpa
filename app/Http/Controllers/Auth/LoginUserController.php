<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginUserRequest;

class LoginUserController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginUserRequest $request)
    {
        $validated = $request->validated();

        // Attempt login
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            if (Auth::check()) {
                $user = Auth::user(); // Get the authenticated user

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

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email', 'password');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
