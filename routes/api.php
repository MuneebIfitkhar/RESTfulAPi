<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Buyer\buyerController;
use App\Http\Controllers\Categories\categoriesController;
use App\Http\Controllers\Product\productController;
use App\Http\Controllers\Seller\sellerController;
use App\Http\Controllers\Transactions\transactionsController;
use App\Http\Controllers\User\usersController;
use App\Http\Controllers\Transactions\TransactionCategoryController;
use App\Http\Controllers\Transactions\TransactionSellerController;
use App\Http\Controllers\Buyer\BuyerTransactionController;
use App\Http\Controllers\Buyer\BuyerProductController;
use App\Http\Controllers\Buyer\BuyerSellerController;
use App\Http\Controllers\Buyer\BuyerCategoryController;

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

//transactiuonCategoryController
Route::resource('transaction.categories' , transactionCategoryController::class , ['only' => ['index']]);

//transactiuonSellerController
Route::resource('transaction.seller' , transactionSellerController::class , ['only' => ['index']]);

//BuyerTransactionController
Route::resource('buyer.transactions' , BuyerTransactionController::class , ['only' => ['index']]);

//BuyerProductController
Route::resource('buyer.product' , BuyerProductController::class , ['only' => ['index']]);

//BuyerSellerController
Route::resource('buyer.seller' , BuyerSellerController::class , ['only' => ['index']]);

//BuyerCategoryController
Route::resource('buyer.category' , BuyerCategoryController::class , ['only' => ['index']]);
