<?php

// Root route
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.index');
        } elseif ($user->hasRole('staff')) {
            return redirect()->route('staff.index');
        } elseif ($user->hasRole('client')) {
            return redirect()->route('client.index');
        }
    }
    return redirect()->route('login');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/staff.php';
require __DIR__ . '/client.php';
require __DIR__ . '/report.php';
