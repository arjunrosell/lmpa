<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\RegisteredUserRequest;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisteredUserRequest $request)
    {
        $user = User::create($request->validated());
        // Assign the user role of 3 = Client
        $user->roles(3)->attach(3);
        flash()->success('Your account has been created successfully! Please check your email to verify your account.');

        // Login
        Auth::login($user);

        // Send the email verification notification to gmail or others mail
        event(new Registered($user));

        return redirect()->route('verification.notice');
    }
}
