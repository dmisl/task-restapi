<?php

use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\TokenController;
use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::get('users', [UserController::class, 'index'])->name('api.users.index');
    Route::get('users/{id}', [UserController::class, 'show'])->name('api.users.show');
    Route::post('users', [UserController::class, 'store'])->name('api.users.store');

    Route::get('positions', [PositionController::class, 'index'])->name('api.positions.index');

    Route::get('token', [TokenController::class, 'index'])->name('api.token.index');

});
