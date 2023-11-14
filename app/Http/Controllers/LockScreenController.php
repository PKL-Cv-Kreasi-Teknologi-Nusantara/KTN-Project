<?php
// app/Http/Controllers/Auth/LockScreenController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LockScreenController extends Controller
{
    public function showLockScreenForm()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('lockscreen', compact('user'));
    }

    public function unlock(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        // Validate the password, and if successful, log in the user
        if (Auth::attempt(['email' => auth()->user()->email, 'password' => $request->password])) {
            return redirect()->intended('/');
        }

        return redirect()->route('lockscreen')->withErrors(['password' => 'Invalid password']);
    }
}

