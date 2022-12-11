<?php

namespace App\Http\Controllers;

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

class AdminController extends Controller
{
    //
    public function adminlaundry()
    {
        $user = Auth::user();
        $tokoall = Toko::all();
        $userall = User::all();

        return view('pages.admin.laundry.index', compact('tokoall', 'userall', 'user'), [
            'title' => "Laundry",
        ]);
    }

    public function adminorder()
    {
        $orderall = order::all();
        $userall = User::all();
        $order_list = order_list::all();
        $user = Auth::user();
        return view('pages.admin.order.index', compact('order_list', 'user', 'orderall', 'userall'), [
            'title' => "Order",
            'user' => $user,
        ]);
    }

    public function adminorderedit($id)
    {
        $toko = Toko::find($id);
        $order = order::where('id', $id)->first();
        $order_list = order_list::all();
        $toko_image = laundry_image::where('toko_id', $id)->get();
        $toko_category = laundry_categories::where('toko_id', $id)->get();
        $laundry_item = laundry_item::where('toko_id', $id)->get();
        $laundry_service = laundry_service::where('toko_id', $id)->get();
        $item_type = item_type::all();
        $user = Auth::user();
        return view('pages.admin.order.edit.index', compact('toko', 'order', 'order_list', 'toko_image', 'toko_category', 'laundry_item', 'laundry_service', 'item_type', 'user'), [
            'title' => "Dashboard",
            'user' => $user,
        ]);
    }

    public function adminorderstore(Request $request){
        $order = order::findOrFail($request->order_id);
        $order->status = $request->status;
        $order->save();

        /* return redirect()->back()->with('success', 'Order status updated'); */
        return redirect()->route('admin.order')
            ->with('success', 'Successfully Added');
    }

    public function adminpayment()
    {
        $orderall = order::all();
        $userall = User::all();
        $order_list = order_list::all();
        $user = Auth::user();
        return view('pages.admin.payment.index', compact( 'order_list', 'user', 'orderall', 'userall'), [
            'title' => "Payment",
            'user' => $user,
        ]);
    }

    public function adminpaymentedit($id)
    {
        $toko = Toko::find($id);
        $order = order::where('id', $id)->first();
        $order_list = order_list::all();
        $toko_image = laundry_image::where('toko_id', $id)->get();
        $toko_category = laundry_categories::where('toko_id', $id)->get();
        $laundry_item = laundry_item::where('toko_id', $id)->get();
        $laundry_service = laundry_service::where('toko_id', $id)->get();
        $item_type = item_type::all();
        $user = Auth::user();
        return view('pages.admin.payment.edit.index', compact('toko', 'order', 'order_list', 'toko_image', 'toko_category', 'laundry_item', 'laundry_service', 'item_type', 'user'), [
            'title' => "Dashboard",
            'user' => $user,
        ]);
    }

    public function adminpaymentstore(Request $request)
    {
        $order = order::findOrFail($request->order_id);
        $order->status = $request->status;
        $order->save();

        /* return redirect()->back()->with('success', 'Order status updated'); */
        return redirect()->route('admin.payment')
            ->with('success', 'Successfully Added');
    }
}
