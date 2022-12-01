<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = Auth::user();
        $data = Toko::findOrFail($id);
        return view('pages.item.index', [
            'title' => "Item Detail",
            'data' => $data,
            'user' => $user,
        ]);
    }

}
