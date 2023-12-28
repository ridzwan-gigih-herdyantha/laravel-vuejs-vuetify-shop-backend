<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ShopController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () { 
    // public
    Route::post('login',[AuthController::class,'login']);
    Route::post('register', [AuthController::class,'register']);

    Route::get('categories',[CategoryController::class,'index']);
    Route::get('categories/random/{count}', [CategoryController::class,'random']);
    Route::get('categories/slug/{slug}', [CategoryController::class,'slug']);

    Route::get('books',[BookController::class,'index']);
    Route::get('books/top/{count}', [BookController::class,'top']);
    Route::get('books/slug/{slug}', [BookController::class,'slug']);
    Route::get('books/search/{keyword}',[BookController::class,'search']);

    Route::post('books/cart', [BookController::class,'cart']);

    Route::get('provinces', [ShopController::class,'provinces']);
    Route::get('cities', [ShopController::class,'cities']);
    Route::get('couriers', [ShopController::class,'couriers']);
    // auth
    Route::middleware(['auth:api'])->group(function () {
        Route::post('logout', [AuthController::class,'couriers']);
        Route::post('shipping', [ShopController::class,'shipping']);
        Route::post('services', [ShopController::class,'services']);
        Route::post('payment', [ShopController::class,'payment']);
        Route::get('my-order', [ShopController::class,'myOrder']);
        //...
    }); 
});