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

class LaundererController extends Controller
{
    //
    public function laundrydetail($id){
        $toko = Toko::find($id);
        $order = order::where('toko_id', $id)->where('status' ,'!=', 'Draft')->get();
        $order_list = order_list::all();
        $toko_image = laundry_image::where('toko_id', $id)->get();
        $toko_category = laundry_categories::where('toko_id', $id)->get();
        $laundry_item = laundry_item::where('toko_id', $id)->get();
        $laundry_service = laundry_service::where('toko_id', $id)->get();
        $item_type = item_type::all();
        $user = Auth::user();
        return view('pages.launderer.laundry.index', compact('toko', 'order', 'order_list', 'toko_image', 'toko_category', 'laundry_item', 'laundry_service', 'item_type', 'user'), [
            'title' => "Dashboard",
            'user' => $user,
        ]);
    }

    public function orderedit($id){
        $toko = Toko::find($id);
        $order = order::where('id', $id)->first();
        $order_list = order_list::all();
        $toko_image = laundry_image::where('toko_id', $id)->get();
        $toko_category = laundry_categories::where('toko_id', $id)->get();
        $laundry_item = laundry_item::where('toko_id', $id)->get();
        $laundry_service = laundry_service::where('toko_id', $id)->get();
        $item_type = item_type::all();
        $user = Auth::user();
        return view('pages.launderer.laundry.order.index', compact('toko', 'order', 'order_list', 'toko_image', 'toko_category', 'laundry_item', 'laundry_service', 'item_type', 'user'), [
            'title' => "Dashboard",
            'user' => $user,
        ]);
    }

    public function orderstore(Request $request){
        $order = order::findOrFail($request->order_id);
        $order->service_status = $request->service_status;
        $order->save();

        /* return redirect()->back()->with('success', 'Order status updated'); */
        return redirect()->route('laundry.detail', ['id' => $request->toko_id])
            ->with('success', 'Successfully Added');
    }
}
