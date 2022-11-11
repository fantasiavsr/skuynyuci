<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => "Register"
        ]);
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'nama_lengkap' => 'required',
            'username' => 'required|min:3',
            'email' => 'required',
            'no_hp' => 'required|numeric',
            // 'level' => 'required',
            'password' => 'required|min:8',
        ]);

        /* $validateData['password'] = bcrypt($validateData['password']); */
        $validateData['password'] = Hash::make($validateData['password']);

        if ($validateData) {
            User::create($validateData);
            return redirect()->route('login')->with('success', 'User Successfully Added');
        } else {
            return back()->with('error', 'Some error encountered');
        }

    }
}
