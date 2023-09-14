<?php

use App\Http\Controllers\Dashboard\HomepageController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::get('/', function () {


    $users = \App\Models\User::role('admin')->get();

    dd("here", $users);

});
