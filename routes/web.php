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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;


Route::get('/',[LayoutController::class,'index']);

Route::group(['prefix' => 'danh-muc'],function (){
    Route::get('/{alias}',[CategoryController::class,'index']);
});

Route::group(['prefix' => 'tin-tuc'],function (){
    Route::get('/',[NewsController::class,'index']);
    Route::get('/{alias}',[NewsController::class,'detail']);
});

Route::group(['prefix' => 'san-pham'],function (){
    Route::get('/',[ProductController::class,'index']);
    Route::get('/{alias}',[ProductController::class,'detail']);
});

Route::group(['prefix' => 'gio-hang'],function (){
    Route::get('/',[CartController::class,'index']);
});

