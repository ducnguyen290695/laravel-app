<?php

use App\Http\Controllers\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show'])->whereNumber('id');
    Route::put('/{id}', [UserController::class, 'update'])->whereNumber('id');
    Route::delete('/{id}', [UserController::class, 'destroy'])->whereNumber('id');
});


