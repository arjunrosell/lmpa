<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function sendVerificationEmailNotice()
    {
        if (auth()->user()->hasVerifiedEmail()) {
            flash()->success('Your email is already verified.');
            return redirect('/');
        }

        return view('auth.verify-email');
    }

    public function sendVerificationEmailLink(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/');
    }

    public function resendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            flash()->success('Your email is already verified.');
            return redirect('/');
        }
        $request->user()->sendEmailVerificationNotification();

        flash()->success('A new verification link has been sent to your email address. Please check your email to verify your account.');

        return back();
    }
}
