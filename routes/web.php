<?php


use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
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
Route::get('/checkout', function () {
    return view('client.pages.checkout');
});


Route::get('dashboard',                             [DashboardController::class, 'index'])->name('dashboard.index')->middleware(AuthenticateMiddleware::class);

Route::get('admin',                                 [AuthController::class, 'index'])->name('auth.admin');
Route::get('logout',                                [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login',                                [AuthController::class, 'login'])->name('auth.login');

Route::prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class)->except([
        'show'
    ]);
    Route::get('categories/trash',                  [CategoryController::class, 'trashed'])->name('categories.trashed');
    Route::post('categories/{id}/restore',          [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('categories/{id}/force-delete',   [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
});
