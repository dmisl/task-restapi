<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\PositionController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');

    Route::get('positions', [PositionController::class, 'index'])->name('positions.index');

});
