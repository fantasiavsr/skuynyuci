<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Toko;
use App\Models\User;
use App\Models\laundry_categories;
use App\Models\laundry_image;

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
        $item = Item::all();
        $detail = User::select('*')
                ->where('level', '=', 'Launderer')
                ->get();

        return view('pages.item.index', [
            'title' => "Item Detail",
            'data' => $data,
            'user' => $user,
            'item' => $item,
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
        $service = Item::where('toko_id', $id)->get();
        $toko_image = laundry_image::where('toko_id', $id)->first();
        $toko_category = laundry_categories::where('toko_id', $id)->get();
        /* dd($toko_image); */
        return view('pages.item.detail.index', [
            'title' => "Item Detail",
            'user' => $user,
            'toko' => $toko,
            'service' => $service,
            'toko_image' => $toko_image,
            'toko_category' => $toko_category,
        ]);


    }

    public function ordertest()
    {
        $user = Auth::user();
        return view('pages.item..order.indextest', [
            'title' => "Item Order",
            'user' => $user,
        ]);
    }


    public function addForm($id) {
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
            Item::create($validate);
            return redirect('user')->with('success', 'Item Created Successfully');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }


}
