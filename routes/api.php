<?php

use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;


Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('register', 'register')->name('register')->middleware('guest');
    Route::post('login', 'login')->name('login')->middleware('guest');
    Route::post('logout', 'logout')->name('login')->middleware('auth:sanctum');
});

//Route::controller(UserController::class)
//    ->middleware('auth:sanctum')
//    ->prefix('users')
//    ->group(function () {
//    Route::get('/', 'index');
//});
