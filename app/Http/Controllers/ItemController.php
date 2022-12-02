<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indextest()
    {
        $user = Auth::user();
        return view('pages.item.indextest', [
            'title' => "Item Detail",
            'user' => $user,
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

    public function index($id)
    {
        $user = Auth::user();
        $data = Toko::findOrFail($id);
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
