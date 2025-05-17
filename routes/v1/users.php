<?php

use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::apiResource('/', UserController::class);
});


