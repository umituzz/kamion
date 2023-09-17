<?php

use App\Http\Controllers\Dashboard\HomepageController;
use App\Http\Controllers\Order\OrdersController;
use App\Http\Controllers\User\NotificationsController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomepageController::class, 'index'])->name('homepage');

    Route::group(['prefix' => '/profile', 'as' => 'users.'], function () {
        Route::get('/', [ProfileController::class, 'profile'])->name('profile');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::group(['prefix' => '/notifications', 'as' => 'notifications.'], function () {
        Route::get('/', [NotificationsController::class, 'index'])->name('index');
        Route::get('/{id}/show', [NotificationsController::class, 'show'])->name('show');
        Route::get('/{id}/destroy', [NotificationsController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '/orders', 'as' => 'orders.'], function () {
        Route::get('/', [OrdersController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [OrdersController::class, 'edit'])->name('edit');
        Route::put('/{id}', [OrdersController::class, 'update'])->name('update');
        Route::get('/{id}/destroy', [OrdersController::class, 'destroy'])->name('destroy');
        Route::post('/search', [OrdersController::class, 'search'])->name('search');
    });
});

