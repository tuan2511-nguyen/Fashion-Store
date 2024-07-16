<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('client.pages.home');
});
Route::get('/shop', function () {
    return view('client.pages.shop');
});
Route::get('/product', function () {
    return view('client.pages.product-detail');
});
Route::get('/cart', function () {
    return view('client.pages.cart');
});
Route::get('/admin', function () {
    return view('admin.pages.dashboard');
});
Route::get('/admin/categories', function () {
    return view('admin.pages.categories');
});