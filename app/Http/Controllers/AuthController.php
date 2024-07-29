<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function loginview()
    {
        return view('pages.auth.login');
    }


    public function check()
    {
        if (Auth::check()) {
            return redirect()->route('pages.dashboard');
        }

        return redirect()->route('auth.loginview');
    }

    public function login(Request $request)
    {
        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route(
                'auth.loginview'
            )->with('error', 'Username atau password salah');
        }

        return redirect()->route('pages.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.loginview');
    }
}
