<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\LaundererController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is  where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index', ['title' => 'Home']);
})->name('home');


/* login page */
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* register page */
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/register/admin', [RegisterController::class, 'admin'])->name('register');
Route::get('/register/launderer', [RegisterController::class, 'launderer'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

/* Resource */
Route::resource('user', UserController::class)->middleware('auth');

/* Item Client Area */
Route::get('item', [ItemController::class, 'index'])->middleware('auth')->name('item.index');
Route::post('search item', [ItemController::class, 'search'])->middleware('auth')->name('item.search');
Route::get('result item/{keyword}', [ItemController::class, 'result'])->middleware('auth')->name('item.result');
Route::get('item detail/{id}', [ItemController::class, 'itemDetail'])->middleware('auth')->name('item.detail');
Route::get('item service/{id}', [ItemController::class, 'itemDetailService'])->middleware('auth')->name('item.detailservice');

Route::get('item order/{id}/{order_number}', [ItemController::class, 'order'])->middleware('auth')->name('item.order.detail');

Route::get('add order/{order_number}', [ItemController::class, 'orderadd'])->middleware('auth')->name('item.order.add');
Route::post('add order', [ItemController::class, 'orderstore'])->name('item.order.store');
Route::delete('delete order/{id}', [ItemController::class, 'orderdelete'])->name('item.order.delete');

Route::get('delivery order/{order_number}', [ItemController::class, 'orderdelivery'])->middleware('auth')->name('item.order.delivery');
Route::post('edit delivery order', [ItemController::class, 'orderdeliverystore'])->name('item.order.delivery.store');

Route::get('item checkout/{order_number}', [ItemController::class, 'checkout'])->middleware('auth')->name('item.order.checkout');
Route::post('item checkout store', [ItemController::class, 'checkoutstore'])->name('item.order.checkout.store');

Route::get('item order detail/{order_number}', [ItemController::class, 'orderdetail'])->middleware('auth')->name('item.order.detailv2');

Route::get('history/', [UserController::class, 'history'])->middleware('auth')->name('user.history');

/* Admin */
/* Order */
Route::get('Admin Order', [AdminController::class, 'adminorder'])->middleware('auth')->name('admin.order');
Route::get('Admin Edit Order/{id}', [AdminController::class, 'adminorderedit'])->middleware('auth')->name('admin.order.edit');
Route::post('admin edit order', [AdminController::class, 'adminorderstore'])->name('admin.order.store');
Route::delete('admin delete order/{id}', [AdminController::class, 'adminorderdelete'])->name('admin.order.delete');
/* Payment */
Route::get('Admin Payment', [AdminController::class, 'adminpayment'])->middleware('auth')->name('admin.payment');
Route::get('Admin Edit Payment/{id}', [AdminController::class, 'adminpaymentedit'])->middleware('auth')->name('admin.payment.edit');
Route::post('admin edit payment', [AdminController::class, 'adminpaymentstore'])->name('admin.payment.store');
Route::delete('admin delete payment/{id}', [AdminController::class, 'adminpaymentdelete'])->name('admin.payment.delete');
/* Laundry */
Route::get('Admin Laundry', [AdminController::class, 'adminlaundry'])->middleware('auth')->name('admin.laundry');
Route::get('Admin Edit Laundry/{id}', [AdminController::class, 'admineditlaundry'])->middleware('auth')->name('admin.laundry.edit');
Route::post('admin edit laundry', [AdminController::class, 'admineditlaundrystore'])->name('admin.laundry.edit.store');
Route::delete('admin delete laundry/{id}', [AdminController::class, 'adminlaundrydelete'])->name('admin.laundry.delete');
/* User */
Route::get('Admin User', [AdminController::class, 'adminuser'])->middleware('auth')->name('admin.user');
Route::get('Admin Edit User/{id}', [AdminController::class, 'adminedituser'])->middleware('auth')->name('admin.user.edit');
Route::post('admin edit user', [AdminController::class, 'adminedituserstore'])->name('admin.user.edit.store');
Route::delete('admin delete user/{id}', [AdminController::class, 'adminuserdelete'])->name('admin.user.delete');


/* Launderer */
/* Laundry */
Route::get('My Laundry/{id}', [LaundererController::class, 'laundrydetail'])->middleware('auth')->name('laundry.detail');
Route::get('Add New Laundry', [LaundererController::class, 'addlaundry'])->middleware('auth')->name('laundry.add');
Route::post('add laundry', [LaundererController::class, 'laundrystore'])->name('laundry.add.store');
Route::get('Add Laundry Next/{id}', [LaundererController::class, 'addlaundrynext'])->middleware('auth')->name('laundry.add.next');
Route::post('create laundry/{id}', [LaundererController::class, 'laundrycreate'])->name('laundry.add.create');
/* Order */
Route::get('Edit Order/{id}', [LaundererController::class, 'orderedit'])->middleware('auth')->name('laundry.order.edit');
Route::post('edit order', [LaundererController::class, 'orderstore'])->name('laundry.order.store');
/* service */
Route::get('Add Laundry Service/{id}', [LaundererController::class, 'serviceadd'])->middleware('auth')->name('laundry.service.add');
Route::post('add laundry service', [LaundererController::class, 'servicestore'])->name('laundry.service.add.store');
Route::delete('delete service/{id}', [LaundererController::class, 'servicedelete'])->name('laundry.service.delete');
/* item */
Route::get('Add Laundry Item/{id}', [LaundererController::class, 'itemadd'])->middleware('auth')->name('laundry.item.add');
Route::post('add laundry item', [LaundererController::class, 'itemstore'])->name('laundry.item.add.store');
Route::delete('delete laundry item/{id}', [LaundererController::class, 'itemdelete'])->name('laundry.item.delete');
