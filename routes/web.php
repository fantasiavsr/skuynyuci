<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TokoController;

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

/* user page */
// Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth', 'customer', 'admin', 'launderer');
/* Resource */
Route::resource('user', UserController::class)->middleware('auth');

/* Item Client Area */
Route::get('item detail', [ItemController::class, 'ItemDetailTest'])->middleware('auth')->name('item.detailtest');
/* Route::get('item_detail/{id}', [ItemController::class, 'index'])->middleware('auth')->name('item.detail'); */

/* Order Item */
Route::get('item order', [ItemController::class, 'ordertest'])->middleware('auth')->name('item.order.detailtest');

/* Item Launderer Area */
Route::get('/item/add/{id}', [ItemController::class, 'addForm'])->middleware('auth');
Route::post('/item/add', [ItemController::class, 'add'])->middleware('auth');

// Toko Route
Route::get('/toko/reg', [TokoController::class, 'register']);
Route::post('/toko/reg', [TokoController::class, 'add']);
