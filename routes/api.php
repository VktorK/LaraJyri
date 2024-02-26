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

Route::group(['middleware' =>['jwt.auth','auth.admin'], 'prefix'=>'admin'], function (){
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

    Route::patch('/promocodes/update_user', [\App\Http\Controllers\PromocodeController::class, 'updateUser']);
});
Route::post('/users',[\App\Http\Controllers\UserController::class, 'store']);



