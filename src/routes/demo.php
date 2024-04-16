<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\UserController;

Route::name('demo.')->group(function () {
    Route::resource('/demo/users', UserController::class);
});
