<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\ShowcaseController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AboutController;


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

Route::get('/showcase', [ShowcaseController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/project/add', [WorkController::class, 'create'])->name('project.create');
Route::post('/project/store', [WorkController::class, 'store'])->name('project.store');