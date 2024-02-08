<?php

use App\Http\Controllers\ExecutorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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


Route::apiResource('users',UserController::class);
Route::apiResource('executors',ExecutorController::class);
Route::apiResource('orders',OrderController::class);
Route::apiResource('products',ProductController::class);
Route::apiResource('profiles',ProfileController::class);
Route::apiResource('transactions',TransactionController::class);

