<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
   Route::get('/register', 'register')->name('register.view');
   Route::post('/register', 'store')->name('register.store');
   ROute::get('/login', 'login')->name('login.view');
});

