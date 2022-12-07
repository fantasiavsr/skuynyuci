<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Toko;
use App\Models\User;
use App\Models\laundry_categories;
use App\Models\laundry_image;
use App\Models\laundry_item;
use App\Models\laundry_service;
use App\Models\order;
use App\Models\order_list;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();
        $data = Toko::all();
        $detail = User::select('*')
            ->where('level', '=', 'Launderer')
            ->get();

        return view('pages.item.index', [
            'title' => "Item Detail",
            'data' => $data,
            'user' => $user,
            'detail' => $detail
        ]);
    }

    public function itemDetailTest()
    {
        $user = Auth::user();
        return view('pages.item.detail.indextest', [
            'title' => "Item Detail",
            'user' => $user,
        ]);
    }

    public function itemDetail($id)
    {
        $user = Auth::user();

        $toko = Toko::findOrFail($id);
        $toko_image = laundry_image::where('toko_id', $id)->first();
        $toko_category = laundry_categories::where('toko_id', $id)->get();

        $order_number = '1';
        /* dd($toko_image); */
        return view('pages.item.detail.index', [
            'title' => "Item Detail",
            'user' => $user,
            'toko' => $toko,
            'toko_image' => $toko_image,
            'toko_category' => $toko_category,
            'order_number' => $order_number,
        ]);
    }

    public function itemDetailService($id)
    {
        $user = Auth::user();

        $toko = Toko::findOrFail($id);
        $toko_image = laundry_image::where('toko_id', $id)->first();
        $toko_category = laundry_categories::where('toko_id', $id)->get();
        /* dd($toko_image); */
        return view('pages.item.detail.service', [
            'title' => "Item Detail",
            'user' => $user,
            'toko' => $toko,
            'toko_image' => $toko_image,
            'toko_category' => $toko_category,
        ]);
    }

    public function ordertest()
    {
        $user = Auth::user();
        return view('pages.item.order.indextest', [
            'title' => "Item Order",
            'user' => $user,
        ]);
    }

    public function order($id, $order_number)
    {
        $user = Auth::user();
        $toko = Toko::findOrFail($id);
        /* $order_number = $order_number; */
        if ($order_number == 1) {
            $validateData['order_number'] = 'NO' . rand(100000, 999999);
            $validateData['user_id'] = $user->id;
            $validateData['toko_id'] = $toko->id;
            $validateData['total_item'] = 0;
            $validateData['total_price'] = 0;
            $validateData['status'] = 'Pending';

            $order = order::create($validateData);
            $order_id = order::where('order_number', $order_number)->first();
            $order_list = order_list::where('order_id', $order_id)->get();
        } else {
            $order = order::where('order_number', $order_number)->first();
            $order_id = order::where('order_number', $order_number)->first();
            $order_list = order_list::where('order_id', $order_id)->get();
        }
        /* dd($order_number); */
        /* dd($order->order_number); */
        return view('pages.item.order.index', [
            'title' => "Item Order",
            'user' => $user,
            'toko' => $toko,
            /* 'order_number' => $order_number, */
            'order' => $order,
            'order_list' => $order_list,
        ]);
    }

    /* public function ordernext($id)
    {
        $user = Auth::user();

        $order = order::findOrFail($id);
        $order_list = order_list::where('order_id', $order->id)->first();
        $toko = Toko::findOrFail($order->toko_id);

        return view('pages.item.order.indexnext', [
            'title' => "Item Order",
            'user' => $user,
            'toko' => $toko,
            'order' => $order,
            'order_list' => $order_list,
        ]);
    } */

    public function orderadd($order_number)
    {
        $user = Auth::user();
        $order = order::where('order_number', $order_number)->first();
        $toko = Toko::findOrFail($order->toko_id);
        $laundry_service = laundry_service::where('toko_id', $toko->id)->get();
        $laundry_item = laundry_item::where('toko_id', $toko->id)->get();
        /* dd($order_number); */
        return view('pages.item.order.add.index', [
            'title' => "Item Order",
            'user' => $user,
            'toko' => $toko,
            'laundry_service' => $laundry_service,
            'laundry_item' => $laundry_item,
            'order' => $order,
        ]);
    }

    public function orderstore(Request $request)
    {
        $user = Auth::user();

        $validateData['status'] = 'Pending';

        return view('pages.item.order.add.index', [
            'title' => "Item Order",
            'user' => $user,
        ]);
    }








    public function addForm($id)
    {
        $user = Auth::user();
        $data = Toko::findOrFail($id);
        return view('pages.item.launderer.create', [
            'title' => 'Add Item',
            'data'  => $data,
            'user'  => $user
        ]);
    }

    public function add(Request $request)
    {
        # code...
        $validate = $request->validate([
            'toko_id' => 'required',
            'name' => 'required',
            'harga' => 'required',
            'unit' => 'required'
        ]);

        if ($validate) {
            # code...
            return redirect('user')->with('success', 'Item Created Successfully');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }
}
