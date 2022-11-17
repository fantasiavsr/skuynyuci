<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        /* dd(Auth::user()); */
        $user = Auth::user();
        // $user_image = user_image::where('user_id', $user->id)->first();
        $level = Auth::user()->level;


        /* dd($level); */
        if ($level == "Admin") {
            return view('pages.admin.index', compact('user'), [
                'title' => "Dashboard",
                'user' => $user,
            ]);
        } else if ($level == "Customer") {
            return view('pages.customer.index', compact('user'), [
                'title' => "Dashboard",
                'user' => $user,
            ]);
        } else if ($level == "Launderer") {
            return view('pages.launderer.index', compact('user'), [
                'title' => "Dashboard",
                'user' => $user,
            ]);
        } else {
            return back();
        }

    }
}
