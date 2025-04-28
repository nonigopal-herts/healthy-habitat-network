<?php

// app/Http/Controllers/Frontend/ResidentAuthController.php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ResidentAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.auth.resident-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
            ->where('role_id', 4) // Resident role
            ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Manual session setup
            Session::put('resident_logged_in', true);
            Session::put('resident_id', $user->id);
            Session::put('resident_name', $user->name);
            Session::put('resident_role_id', $user->role_id);

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials or not a resident.',
        ]);
    }

    public function logout()
    {
        Session::forget(['resident_logged_in', 'resident_id', 'resident_name']);
        return redirect()->route('home');
    }
}
