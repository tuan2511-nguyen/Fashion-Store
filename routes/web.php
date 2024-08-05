<?php

use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CustomerReviewController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckOutController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OrderController;
use App\Http\Controllers\Client\ProductDetailController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Client\ReviewController;
use App\Http\Controllers\Client\SuccessController;
use App\Http\Controllers\Client\UserProfileController;
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Middleware\StoreUrlBeforeLogin;

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

Route::get('auth',                         [RegisterController::class, 'showAuthForm'])->name('customer.showAuthForm');
Route::post('signin',                      [RegisterController::class, 'login'])->name('customer.login');
Route::post('register',                    [RegisterController::class, 'register'])->name('customer.register');
Route::post('signout',                     [RegisterController::class, 'logout'])->name('customer.logout');

Route::get('password/reset',               [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email',              [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}',       [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset',              [ResetPasswordController::class, 'reset'])->name('password.update');



Route::get('/profile',                     [UserProfileController::class, 'show'])->name('profile.show')->middleware(StoreUrlBeforeLogin::class);
Route::post('/profile/avatar',             [UserProfileController::class, 'updateAvatar'])->name('profile.avatar.update')->middleware(StoreUrlBeforeLogin::class);

Route::get('',                             [HomeController::class, 'index'])->name('home');

Route::get('/shop',                        [ShopController::class, 'index'])->name('shop.index');
Route::get('/cart',                        [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add',                   [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/clear-cart',             [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('/cart/remove',                [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update',                [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/apply-coupon',          [CartController::class, 'applyCoupon'])->name('cart.apply_coupon');




Route::get('/product/{id}',                [ProductDetailController::class, 'index'])->name('product.detail');
Route::post('/reviews',                    [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/checkout',                    [CheckOutController::class, 'index'])->name('checkout.index')->middleware(StoreUrlBeforeLogin::class);
Route::post('/checkout/store',             [CheckOutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success',            [SuccessController::class, 'index'])->name('checkout.success');


Route::get('/order',                        [OrderController::class, 'index'])->name('order.index')->middleware(StoreUrlBeforeLogin::class);
Route::get('/order/{id}',                   [OrderController::class, 'show'])->name('order.show')->middleware(StoreUrlBeforeLogin::class);
























Route::get('dashboard',                                 [DashboardController::class, 'index'])->name('dashboard.index')->middleware(AuthenticateMiddleware::class);

Route::get('admin',                                     [AuthController::class, 'index'])->name('auth.admin');
Route::get('logout',                                    [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login',                                    [AuthController::class, 'login'])->name('auth.login');

Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::resource('categories',                       CategoryController::class)->except([
        'show'
    ]);
    Route::get('categories/trash',                      [CategoryController::class, 'trashed'])->name('categories.trashed');
    Route::post('categories/{id}/restore',              [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('categories/{id}/force-delete',       [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
});

Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::resource('colors',                           ColorController::class)->except([
        'show'
    ]);
});
Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::resource('sizes',                            SizeController::class)->except([
        'show'
    ]);
});

Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('products/trash',                        [ProductController::class, 'trashed'])->name('products.trashed');
    Route::post('products/{id}/restore',                [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('products/{id}/force-delete',         [ProductController::class, 'forceDelete'])->name('products.forceDelete');
    Route::resource('products',                         ProductController::class);
});

Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::resource('customers',                            CustomerController::class)->except([
        'show', 'store'
    ]);
    Route::resource('reviews',                              CustomerReviewController::class)->except([
        'show', 'edit', 'store', 'update'
    ]);
    Route::resource('orders',                               BillController::class)->except([
        'create', 'edit'
    ]);
    Route::resource('coupons',                              CouponController::class);
});
