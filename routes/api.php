<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Buyer\buyerController;
use App\Http\Controllers\Categories\categoriesController;
use App\Http\Controllers\Product\productController;
use App\Http\Controllers\Seller\sellerController;
use App\Http\Controllers\Transactions\transactionsController;
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

// user route 
Route::resource('user',  UsersController::class ,['except' =>['create' , 'edit']]);

//buyer route
Route::resource('buyer',  buyerController::class ,['only' => ['index' , 'show']]);

//seller
Route::resource('seller',  sellerController::class ,['only' => ['index' , 'show']]);


//catagories
Route::resource('categories',  categoriesController::class ,['except' => ['create' , 'edit']]);

//products 
Route::resource('product',  productController::class ,['only' => ['index' , 'show']]);


//transactions
Route::resource('transactions ',  transactionsController::class ,['only' => ['index' , 'show']]);



