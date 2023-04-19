<?php

use App\Http\Controllers\customer\BasketController;
use App\Http\Controllers\seller\DashboardController;
use App\Http\Controllers\seller\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use \App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'show'])->name('show.home');

Route::middleware(['AlreadyLoggedIn'])->group(function () {
    Route::get('signup', [AuthController::class, 'showRegisterForm'])->name('show.sign.up.form');
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('show.login.form');
    Route::post('register', [AuthController::class, 'submitRegisterForm'])->name('submit.register.form');
    Route::post('user-login', [AuthController::class, 'submitLoginForm'])->name('submit.login.form');
});

Route::middleware(['AuthCheck'])->group(function () {
    Route::prefix('seller')->middleware(['CheckSellerRole'])->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('show.dashboard');
        Route::get('profile', [App\Http\Controllers\seller\ProfileController::class, 'showProfile'])->name('showProfile');
        Route::post('profile-update', [App\Http\Controllers\seller\ProfileController::class, 'updateProfileData'])->name('profileUpdate');
        Route::post('profile-image-upload', [App\Http\Controllers\seller\ProfileController::class, 'profileImageUpload'])->name('imageUpload');
        Route::post('update-password', [App\Http\Controllers\seller\ProfileController::class, 'updatePassword'])->name('updatePassword');
        Route::get('product-list', [ProductController::class, 'adminProductList'])->name('product.list');
        Route::get('add-product', [ProductController::class, 'add'])->name('add.product');
        Route::post('create-product', [ProductController::class, 'create'])->name('create.product');
        Route::post('update-product-action/{id}', [ProductController::class, 'update'])->name('update.product.action');
        Route::get('edit-product/{id}', [ProductController::class, 'editForm'])->name('edit.product.form');
        Route::get('delete-product/{id}', [ProductController::class, 'delete'])->name('delete.product');
        Route::get('delete-user', [App\Http\Controllers\seller\ProfileController::class, 'deleteUser'])->name('delete.user');
    });

    Route::prefix('customer')->middleware(['CheckCustomerRole'])->group(function () {
        Route::get('dashboard', [\App\Http\Controllers\customer\DashboardController::class, 'index'])->name('show.dashboard');
        Route::get('profile', [\App\Http\Controllers\customer\ProfileController::class, 'showProfile'])->name('show.profile');
        Route::post('profile-update', [\App\Http\Controllers\customer\ProfileController::class, 'updateProfileData'])->name('profile.update');
        Route::post('profile-image-upload', [\App\Http\Controllers\customer\ProfileController::class, 'profileImageUpload'])->name('profile.image.upload');
        Route::post('update-password', [\App\Http\Controllers\customer\ProfileController::class, 'updatePassword'])->name('update.password');
        Route::get('basket', [BasketController::class, 'show']);
        Route::get('delete-user', [\App\Http\Controllers\customer\ProfileController::class, 'deleteUser'])->name('delete.user');

        Route::get('add-to-basket/{id}', [BasketController::class, 'add'])->name('add.basket');
        Route::get('delete-product/{id}', [BasketController::class, 'delete'])->name('delete.product');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('basket', [BasketController::class, 'index'])->name('show.basket');

});




Route::get('forget-password', [AuthController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('shop', [ProductController::class, 'index'])->name('shop');
Route::get('delete', [ProductController::class, 'deleteOldImage']);

Route::get('/count', [BasketController::class, 'BasketProductsCount'])->name('chosen.products.count');





