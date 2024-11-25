<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Account\UpdateAccountRequest;

class ClientAccountSettingsController extends Controller
{

    public function edit()
    {
        $user = Auth::user();
        return view('client.account.edit', compact('user'));
    }

    public function update(UpdateAccountRequest $request)
    {
        $user = Auth::user();

        $request->validated();

        $emailChanged = false;
        $changesMade = false;

        if ($user->name !== $request->name) {
            $user->name = $request->name;
            $changesMade = true;
        }

        if ($user->email !== $request->email) {
            $user->email = $request->email;
            $emailChanged = true;
            $changesMade = true;
            $user->email_verified_at = null;
        }

        if ($request->password) {
            $user->password = Hash::make($request->password);
            $changesMade = true;
        }

        if ($changesMade) {
            $user->save();

            if ($emailChanged) {
                Auth::logout();
                event(new Registered($user));
                flash()->success('Your email has been updated. Please verify your new email address to log in again.');
                return redirect()->route('verification.notice');
            } else {
                flash()->success('Account updated successfully!');
            }
        } else {
            flash()->info('No changes were made to your account.');
        }

        return redirect()->route('client.account.edit');
    }
}
