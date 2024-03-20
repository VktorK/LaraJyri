<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ExecutorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PromocodeController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::get('/orders',[OrderController::class, 'index']);
//Route::post('/orders',[OrderController::class, 'store']);
//Route::get('/orders/{order}',[OrderController::class, 'show']);
//Route::patch('/orders/{order}',[OrderController::class, 'update']);
//Route::delete('/orders/{order}',[OrderController::class, 'destroy']);
//
//
//Route::get('/products',[ProductController::class, 'index']);
//Route::post('/products',[ProductController::class, 'store']);
//Route::get('/products/{product}',[ProductController::class, 'show']);
//Route::patch('/products/{product}',[ProductController::class, 'update']);
//Route::delete('/products/{product}',[ProductController::class, 'destroy']);

Route::group(['prefix'=>'admin'], function (){
    Route::apiResource('users',UserController::class);
    Route::apiResource('executors',ExecutorController::class);
    Route::apiResource('orders',OrderController::class);
    Route::apiResource('products',ProductController::class);
    Route::apiResource('profiles',ProfileController::class);
    Route::apiResource('transactions',TransactionController::class);
    Route::apiResource('promocodes',PromocodeController::class);
});

Route::group(['middleware' => 'api'], function () {
    Route::post('login', [AuthController::class, 'login']);

});

Route::group(['middleware' =>'jwt.auth'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::patch('/users',[\App\Http\Controllers\UserController::class, 'update']);
    Route::delete('/users',[\App\Http\Controllers\UserController::class, 'destroy']);

    Route::post('/users/product-to-cart', [\App\Http\Controllers\UserController::class, 'storeProductToCart']);
    Route::patch('/users/product-in-cart', [\App\Http\Controllers\UserController::class, 'updateProductInCart']);
    Route::delete('/users/product-in-cart', [\App\Http\Controllers\UserController::class, 'destroyProductInCart']);

    Route::post('/orders',[\App\Http\Controllers\OrderController::class, 'store']);
    Route::patch('/orders/{order}/update-status',[\App\Http\Controllers\OrderController::class, 'updateStatus']);
    Route::patch('/orders/{order}/products',[\App\Http\Controllers\OrderController::class, 'updateProducts']);
    Route::delete('/orders/{order}/products',[\App\Http\Controllers\OrderController::class, 'destroyProduct']);
    Route::delete('/orders/{order}',[\App\Http\Controllers\OrderController::class, 'destroyOrder']);


    Route::post('/orders/{order}/transactions',[\App\Http\Controllers\OrderController::class, 'storeTransactionsDebet']);

    Route::get('/transactions', [\App\Http\Controllers\TransactionController::class, 'index']);
    Route::post('/transactions/type-debet',[\App\Http\Controllers\TransactionController::class, 'storeTypeDebet']);

    Route::patch('/promocodes/update-user', [\App\Http\Controllers\PromocodeController::class, 'updateUser']);
});
Route::post('/users',[\App\Http\Controllers\UserController::class, 'store']);
Route::patch('/transactions/{transaction}/status-success',[\App\Http\Controllers\TransactionController::class, 'updateStatusSuccess']);
Route::patch('/transactions/{transaction}/status-external-failed',[\App\Http\Controllers\TransactionController::class, 'updateStatusExternalFailed']);



