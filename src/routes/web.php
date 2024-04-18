<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\UserController;

Route::middleware(['web'])->group(function () {

    Route::name('demo.')->group(function () {
        Route::resource('/demo/users', UserController::class);
    });

});
