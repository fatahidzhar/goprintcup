<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LapIncomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockProductController;
use App\Http\Controllers\LapStockController;
use App\Models\Banners;
use App\Models\Stocks;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $banner = Banners::all();
    $product = Stocks::all();
    
    return view('welcome', compact(['banner', 'product']));
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'handleAdmin'])->name('admin.route')->middleware('admin');

Route::resource('product', StockProductController::class)->middleware('admin');
Route::resource('stock', StockController::class)->middleware('admin');
Route::resource('category', CategoryController::class)->middleware('admin');
Route::resource('size', SizeController::class)->middleware('admin');
Route::resource('order', OrdersController::class)->middleware('admin');
Route::resource('customer', CustomerController::class)->middleware('admin');
Route::resource('banner', BannerController::class)->middleware('admin');

Route::get('income', [LapIncomeController::class, 'index'])->middleware('admin');
Route::get('stock', [LapStockController::class, 'index'])->middleware('admin');

Route::get('/staff', function () {
    $user = User::all();
    return view('admin.handleStaff', compact('user'));
});


