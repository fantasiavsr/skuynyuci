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
    public function laundrydetail($id)
    {
        $toko = Toko::find($id);
        $order = order::where('toko_id', $id)->where('status', '!=', 'Draft')->get();
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

    public function orderedit($id)
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
        return view('pages.launderer.laundry.order.index', compact('toko', 'order', 'order_list', 'toko_image', 'toko_category', 'laundry_item', 'laundry_service', 'item_type', 'user'), [
            'title' => "Dashboard",
            'user' => $user,
        ]);
    }

    public function orderstore(Request $request)
    {
        $order = order::findOrFail($request->order_id);
        $order->service_status = $request->service_status;
        $order->save();

        /* return redirect()->back()->with('success', 'Order status updated'); */
        return redirect()->route('laundry.detail', ['id' => $request->toko_id])
            ->with('success', 'Successfully Added');
    }

    public function addlaundry()
    {
        $user = Auth::user();
        return view('pages.launderer.add.laundry.index', [
            'title' => "Dashboard",
            'user' => $user,
        ]);
    }

    public function addlaundrynext($id){
        $user = Auth::user();
        $toko = Toko::find($id);
        $laundry_item = laundry_item::where('toko_id', $id)->get();
        $laundry_service = laundry_service::where('toko_id', $id)->get();
        $item_type = item_type::all();

        /* dd($laundry_item); */
        return view('pages.launderer.add.laundry.indexnext', compact('toko', 'laundry_item', 'laundry_service', 'item_type', 'user'), [
            'title' => "Dashboard",
            'user' => $user,
        ]);
    }

    public function serviceadd($id){
        $user = Auth::user();
        $toko = Toko::find($id);
        $service = service::all();
        /* dd($laundry_item); */
        return view('pages.launderer.add.service.add', compact('toko', 'service', 'user'), [
            'title' => "Dashboard",
            'user' => $user,
        ]);
    }

    public function servicestore(Request $request){
        $laundry_service = new laundry_service();
        $laundry_service->toko_id = $request->toko_id;
        $laundry_service->service_id = $request->service_id;
        $laundry_service->price = $request->price;

        /* dd($laundry_service); */
        $laundry_service->save();

        $laundry_categories = new laundry_categories();
        $laundry_categories->toko_id = $request->toko_id;
        $service = service::find($request->service_id);
        $laundry_categories->name = $service->name;
        $laundry_categories->save();

        return redirect()->route('laundry.add.next', ['id' => $request->toko_id])
            ->with('success', 'Successfully Added');
    }

    public function servicedelete($id){
        $laundry_service = laundry_service::findOrFail($id);
        $toko = Toko::find($laundry_service->toko_id);
        $laundry_categories = laundry_categories::where('toko_id', $toko->id)->where('name', $laundry_service->service->name)->first();
        /* dd($toko); */
        /* dd($laundry_categories); */
        $laundry_service->delete();
        $laundry_categories->delete();
        return redirect()->route('laundry.add.next', ['id' => $toko->id])
            ->with('success', 'Successfully Added');
    }

    public function laundrystore(Request $request)
    {
        $toko = new Toko();
        $toko->user_id = $request->user_id;
        $toko->name = $request->name;
        $toko->open = $request->open;
        $toko->close = $request->close;
        $toko->address = $request->address;
        $toko->about = $request->about;
        $toko->distance = $request->distance;
        $toko->active = 0;
        $toko->order_count = 0;
        /* dd($toko); */
        $toko->save();

        /* $laundry_image = new laundry_image();
        $laundry_image->toko_id = $toko->id;
        $laundry_image->image = $request->image;
        $laundry_image->save(); */

        /* $laundry_categories = new laundry_categories();
        $laundry_categories->toko_id = $toko->id;
        $laundry_categories->category = $request->category;
        $laundry_categories->save(); */

        /* $laundry_item = new laundry_item();
        $laundry_item->toko_id = $toko->id;
        $laundry_item->item_type_id = $request->item_type_id;
        $laundry_item->item_name = $request->item_name;
        $laundry_item->price = $request->price;
        $laundry_item->save(); */

        /* $laundry_service = new laundry_service();
        $laundry_service->toko_id = $toko->id;
        $laundry_service->service_id = $request->service_id;
        $laundry_service->price = $request->price;
        $laundry_service->save(); */

        return redirect()->route('laundry.add.next', ['id' => $toko->id])
            ->with('success', 'Successfully Added');
    }
}
