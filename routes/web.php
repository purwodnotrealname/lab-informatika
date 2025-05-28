<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
})->middleware('auth');

Route::controller(AuthController::class)->group(function () {
   Route::get('/register', 'register')->name('register');
   Route::post('/register', 'store')->name('register.store');
   Route::get('/login', 'login')->name('login');
   Route::post('/login', 'authenticate')->name('login.auth');
});
