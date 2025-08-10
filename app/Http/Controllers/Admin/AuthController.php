<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }

            Auth::logout();
            return redirect()->route('admin.login.form')->with('error', 'Access denied. Not an admin.');
        }

        return redirect()->route('admin.login.form')->with('error', 'Invalid credentials.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login.form');
    }
}
