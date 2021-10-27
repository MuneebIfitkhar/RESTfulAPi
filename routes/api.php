<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Buyer\buyerController;
use App\Http\Controllers\Categories\categoriesController;
use App\Http\Controllers\Product\productController;
use App\Http\Controllers\Seller\sellerController;
use App\Http\Controllers\Transections\transectionsController;
use App\Http\Controllers\User\usersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//usercontoroller route
Route::resource('user',  UsersController::class , ['except' => ['create' ,'edit']]);
 
//buyercontoroller route
Route::resource('buyer',  buyerController::class , ['only' => ['index' ,'show']]);

//sellercontoroller route
Route::resource('seller',  sellerController::class , ['only' => ['index' ,'show']]);

//productcontoroller route
Route::resource('product',  productController::class , ['only' => ['index' ,'show']]);

//catagoriescontoroller route
Route::resource('category',  categoriesController::class , ['except' => ['create' ,'edit']]);

//transectionscontoroller route
Route::resource('transection',  transectionsController::class , ['only' => ['index' ,'show']]);
 




