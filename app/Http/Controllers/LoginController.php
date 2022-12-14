<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => "Login"
        ]);
    }

    public function authenticate(Request $request)
    {
        /* dd($request->all()); */
        $credential = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            return redirect()->intended('user');
        }
        /* dd('Invalid credentials'); */
        return back()->withErrors([
            'msg1' => 'Login Error, Please Try Again.',
            'msg2' => 'Check your username and password.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
