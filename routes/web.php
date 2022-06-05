<?php

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

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;


Route::get('/', [LayoutController::class, 'index']);

Route::match(['GET', 'POST'], '/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
        Route::get('/', [CategoryController::class, 'list'])->name('list');
        Route::get('/add', [CategoryController::class, 'add'])->name('add');
        Route::post('/delete', [CategoryController::class, 'delete'])->name('delete');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/{item}/edit', [CategoryController::class, 'edit'])->name('edit');
    });

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('/', [ProductController::class, 'list'])->name('list');
        Route::get('/add', [ProductController::class, 'add'])->name('add');
        Route::post('/delete', [ProductController::class, 'delete'])->name('delete');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/{item}/edit', [ProductController::class, 'edit'])->name('edit');
    });

    Route::group(['prefix' => 'post', 'as' => 'post.'], function () {
        Route::get('/', [PostController::class, 'list'])->name('list');
        Route::get('/add', [PostController::class, 'add'])->name('add');
        Route::post('/delete', [PostController::class, 'delete'])->name('delete');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/{item}/edit', [PostController::class, 'edit'])->name('edit');
    });

    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
    });

    Route::group(['prefix' => 'banner', 'as' => 'banner.'], function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::post('store', [BannerController::class, 'store'])->name('store');
    });
});

Route::group(['prefix' => 'danh-muc'], function () {
    Route::get('/{alias}', [CategoryController::class, 'index']);
});

Route::group(['prefix' => 'tin-tuc'], function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/{alias}', [PostController::class, 'detail']);
});

Route::group(['prefix' => 'san-pham'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{alias}', [ProductController::class, 'detail']);
});

Route::group(['prefix' => 'gio-hang'], function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/them', [CartController::class, 'store'])->name('cart.add');
});
