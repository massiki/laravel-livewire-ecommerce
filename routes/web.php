<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/products', App\Livewire\Product\Index::class)->name('admin.products')->middleware('auth');
Route::get('/shop', App\Livewire\Shop\Index::class)->name('shop')->middleware('auth');
Route::get('/cart', App\Livewire\Shop\Cart::class)->name('cart')->middleware('auth');
Route::get('/checkout', App\Livewire\Shop\Checkout::class)->name('checkout')->middleware('auth');
