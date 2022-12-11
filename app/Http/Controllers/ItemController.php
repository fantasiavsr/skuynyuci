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
        $laundry_item = laundry_item::all();
        $item_type = item_type::all();
        $laundry_category = laundry_categories::all();
        $order = order::where('user_id', $user->id)->where('status' ,'!=', 'Draft')->get()->sortByDesc('created_at');

        $nearesttoko = Toko::select('*')
                            ->orderBy('distance', 'ASC')
                            ->get();

        $populartoko = Toko::select('*')
                            ->orderBy('order_count', 'DESC')
                            ->get();
        return view('pages.item.index', compact('user'), [
            'title' => "Laundry",
            'toko' => Toko::all(),
            'toko_image' => laundry_image::all(),
            'toko_category' => laundry_categories::all(),
            'user' => $user,
            'laundry_item' => $laundry_item,
            'item_type' => $item_type,
            'order' => $order,
            'nearesttoko' => $nearesttoko,
            'laundry_category' => $laundry_category,
            'populartoko' => $populartoko,
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
        $laundry_item  = laundry_item::where('toko_id', $id)->get();
        $laundry_service = laundry_service::where('toko_id', $id)->get();
        $item_type = item_type::all();

        $order_number = '1';
        /* dd($toko_image); */
        return view('pages.item.detail.index', [
            'title' => "Item Detail",
            'user' => $user,
            'toko' => $toko,
            'toko_image' => $toko_image,
            'toko_category' => $toko_category,
            'order_number' => $order_number,
            'laundry_item' => $laundry_item,
            'laundry_service' => $laundry_service,
            'item_type' => $item_type,
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
            $validateData['order_number'] = 'NO' . $toko->id . $user->id . rand(100000, 999999);
            $validateData['user_id'] = $user->id;
            $validateData['toko_id'] = $toko->id;
            $validateData['total_item'] = 0;
            $validateData['total_price'] = 0;
            $validateData['status'] = 'Draft';
            $validateData['order_type'] = 'Self service';

            $order = order::create($validateData);
            $order_id = order::where('order_number', $order_number)->first();
            $order_list = order_list::where('order_id', $order_id)->get();
        } else {
            $order = order::where('order_number', $order_number)->first();

            $order_list = order_list::where('order_id', $order->id)->get();

            $order->total_item = $order_list->sum('quantity');
            $order->total_price = $order_list->sum('price');

            $validateData['total_item'] = $order->total_item;
            $validateData['total_price'] = $order->total_price;
            $order->update($validateData);
        }

        $laundry_service = laundry_service::where('toko_id', $toko->id)->get();
        $laundry_item = laundry_item::where('toko_id', $toko->id)->get();

        $item_type = item_type::all();
        $service = service::all();

        /* dd($order_number); */
        /* dd($order->order_number); */
        return view('pages.item.order.index', [
            'title' => "Item Order",
            'user' => $user,
            'toko' => $toko,
            /* 'order_number' => $order_number, */
            'order' => $order,
            'order_list' => $order_list,
            'laundry_service' => $laundry_service,
            'laundry_item' => $laundry_item,
            'item_type' => $item_type,
            'service' => $service,
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
        /* dd($order_number); */
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
        $validateData = $request->validate([
            'order_id' => 'required',
            'laundry_service_id' => 'required',
            'laundry_item_id' => 'required',
            'quantity' => 'required|numeric',
        ]);


        $laundry_service = laundry_service::findOrFail($request->laundry_service_id);
        $laundry_item = laundry_item::findOrFail($request->laundry_item_id);

        $itemprice = $laundry_item->price * $request->quantity;
        $serviceprice = $laundry_service->price;

        $validateData['price'] = $itemprice + $serviceprice;

        $order = order::findOrFail($request->order_id);
        $toko = Toko::findOrFail($order->toko_id);

        /* dd($validateData); */

        $order_list = order_list::create($validateData);


        return redirect()->route('item.order.detail', [$toko->id, $order->order_number])
            ->with('success', 'Successfully Added');
    }

    public function orderdelete($id)
    {
        $order_list = order_list::findOrFail($id);
        $order = order::findOrFail($order_list->order_id);
        $toko = Toko::findOrFail($order->toko_id);
        $order_list->delete();

        return redirect()->route('item.order.detail', [$toko->id, $order->order_number])
            ->with('success', 'Successfully Deleted');
    }


    public function orderdelivery($order_number)
    {
        /* dd($order_number); */
        $user = Auth::user();
        $order = order::where('order_number', $order_number)->first();
        $toko = Toko::findOrFail($order->toko_id);

        /* dd($order_number); */
        return view('pages.item.order.address.index', [
            'title' => "Delivery Order",
            'user' => $user,
            'order' => $order,
            'toko' => $toko,
        ]);
    }

    public function orderdeliverystore(Request $request)
    {
        $order = order::findOrFail($request->order_id);
        $toko = Toko::findOrFail($order->toko_id);

        $order->address = $request->address;

        $validateData['address'] = $order->address;

        $order->update( $validateData);

        return redirect()->route('item.order.detail', [$toko->id, $order->order_number])
            ->with('success', 'Successfully Added');
    }

    public function checkout($order_number)
    {
        $user = Auth::user();
        $order = order::where('order_number', $order_number)->first();
        $toko = Toko::findOrFail($order->toko_id);
        $order_list = order_list::where('order_id', $order->id)->get();

        $laundry_service = laundry_service::where('toko_id', $toko->id)->get();
        $laundry_item = laundry_item::where('toko_id', $toko->id)->get();

        return view('pages.item.order.checkout.index', [
            'title' => "Item Order",
            'user' => $user,
            'toko' => $toko,
            'order' => $order,
            'order_list' => $order_list,
            'laundry_service' => $laundry_service,
            'laundry_item' => $laundry_item,
        ]);
    }

    public function checkoutstore(Request $request)
    {
        $order = order::findOrFail($request->order_id);
        $toko = Toko::findOrFail($order->toko_id);

        $toko->order_count = $toko->order_count + 1;
        $toko->update();

        $order->status = 'Waitting for Payment';
        $order->order_type = $request->order_type;
        $order->payment_method = $request->payment_method;

        $validateData['status'] = $order->status;
        $validateData['order_type'] = $order->order_type;
        $validateData['payment_method'] = $order->payment_method;
        /* dd($validateData); */
        $order->update( $validateData);

        return redirect()->route('item.order.detailv2', [$order->order_number])
            ->with('success', 'Successfully Added');
    }

    public function orderdetail($order_number){
        /* dd($order_number); */
        $user = Auth::user();
        $order = order::where('order_number', $order_number)->first();
        $toko = Toko::findOrFail($order->toko_id);
        $order_list = order_list::where('order_id', $order->id)->get();

        $laundry_service = laundry_service::where('toko_id', $toko->id)->get();
        $laundry_item = laundry_item::where('toko_id', $toko->id)->get();

        return view('pages.item.order.detail.index', [
            'title' => "Item Order",
            'user' => $user,
            'toko' => $toko,
            'order' => $order,
            'order_list' => $order_list,
            'laundry_service' => $laundry_service,
            'laundry_item' => $laundry_item,
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
