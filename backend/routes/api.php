<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\OrdersController;
use App\Http\Controllers\Api\InitialController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/initial', [InitialController::class, 'index']);

    Route::group(['prefix' => '/orders', 'as' => 'orders.'], function () {
        Route::get('/', [OrdersController::class, 'index']);
        Route::post('/', [OrdersController::class, 'store']);
        Route::post('/search', [OrdersController::class, 'search']);
    });
});
