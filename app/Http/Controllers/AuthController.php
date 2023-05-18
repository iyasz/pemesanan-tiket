<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function username()
    {
        return true;
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect('/');
        }

        return redirect('/auth/login')->withErrors([
            'allAuth' => 'Username Atau Password Kamu Salah!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return redirect('/auth/login');
    }
}
