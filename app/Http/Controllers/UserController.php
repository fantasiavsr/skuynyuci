<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\item_type;
use App\Models\Toko;
use App\Models\User;
use App\Models\laundry_categories;
use App\Models\laundry_image;
use App\Models\laundry_item;
use App\Models\laundry_service;
use App\Models\order;
use App\Models\order_list;
use App\Models\service;

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
        $laundry_item = laundry_item::all();
        $laundry_service = laundry_service::all();
        $item_type = item_type::all();
        $order = order::where('user_id', $user->id)->where('status' ,'!=', 'Draft')->get();
        $order_list = order_list::all();
        $toko = Toko::all();

        $myorder = order::where('status' ,'!=', 'Draft')->get();

        /* dd($level); */
        if ($level == "Admin") {
            return view('pages.admin.admin_index', compact('user'), [
                'title' => "Dashboard",
                'data' => User::select('*')
                            ->where('level', '=', 'Customer')
                            ->get(),
                'dataLaunderer' => User::select('*')
                                    ->where('level', '=', 'Launderer')
                                    ->get(),
                'user' => $user,
            ]);
        } else if ($level == "Customer") {
            return view('pages.customer.index', compact('user'), [
                'title' => "Dashboard",
                'toko' => Toko::all(),
                'toko_image' => laundry_image::all(),
                'toko_category' => laundry_categories::all(),
                'user' => $user,
                'laundry_item' => $laundry_item,
                'item_type' => $item_type,
                'order' => $order,
            ]);
        } else if ($level == "Launderer") {
            return view('pages.launderer.launderer_index', compact('user'), [
                'title' => "Dashboard",
                'toko' => Toko::select('*')
                            ->where('user_id', '=', auth()->user()->id)
                            ->get(),
                'user' => $user,
                'laundry_item' => $laundry_item,
                'laundry_service' => $laundry_service,
                'item_type' => $item_type,
                'order' => $order,
                'order_list' => $order_list,
                'alltoko' => $toko,
                'myorder' => $myorder,
            ]);
        } else {
            return back();
        }

    }
}
