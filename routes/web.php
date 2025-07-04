<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
   Route::get('/register', 'register')->name('register.view');
   Route::post('/register', 'store')->name('register.store');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login.view');
    Route::post('/login', 'attemptlogin')->name('login.attempt');
    Route::get('/logout', 'attemptlogout')->name('attemptlogout')->middleware('auth');
});
