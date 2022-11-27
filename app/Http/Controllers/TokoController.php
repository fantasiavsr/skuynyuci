<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    //
    public function register()
    {
        # code...
        $user = Auth::user();

        return view('pages.launderer.create', compact('user'), [
            'title' => "Create Laundry",
            'user' => $user
        ]);
    }

    public function add(Request $request)
    {
        # code...
        $validate = $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'open' => 'required',
            'close' => 'required',
            'address' => 'required|min:5'
        ]);

        if ($validate) {
            # code...
            Toko::create($validate);
            return redirect()->route('/user')->with('success', 'Toko Berhasil Ditambahkan !');
        } else {
            dd($validate);
        }
    }
}
