<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\ShowcaseController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;



// routes for card image in resources
Route::get('/project-image/{filename}', function ($filename) {
    $path = resource_path('image/showcase/' . $filename);
    if (!File::exists($path)) {
        $path = resource_path('image/project/timeout.jpg');
    }
    return Response::file($path);
});

// page routes
Route::get('/', function () {
    return view('landing/welcome');
});

// Route ke Register page
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'store')->name('register.store');
});

// Route ke Login page
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'attemptlogin')->name('login.attempt');
    Route::get('/logout', 'attemptlogout')->name('attemptlogout')->middleware('auth');
});

Route::get('/showcase', [ShowcaseController::class, 'index'])->name('showcase');


// Route ke About page
Route::get('/about', function () {
    return view('landing/about');
});

// Sama kyk halaman utama
Route::get('/welcome', function () {
    return view('landing/welcome');
});

// Route ke User dashboard
// TODO: Satuin route nya ini biar jadi satu sama usercontroller
Route::get('/account', function () {
    return view('dashboard.dashboard');
});

Route::get('/user', [UserDashboard::class, 'index']);

Route::get('/adminuser', function () {
    return view('user.admin_user');
});

// project creation

Route::get('/project/add', [WorkController::class, 'create'])->name('project.create');

// Route untuk ke store project
Route::post('/project/store', [WorkController::class, 'store'])->name('project.store');
Route::delete('/project/destroy/{id}', [WorkController::class, 'destroy'])->name('project.delete');

// Buat ngarah ke user dashboard (masih json payload)
Route::controller(UserController::class)->group(function () {
    Route::get('/user/data', 'userData')->name('user.data')->middleware('auth');
});

Route::controller(MidtransController::class)->group(function () {
    Route::get('/topup', 'register')->name('topup.register');
    Route::post('/topup/create', 'createPayment')->name('topup.create');
    Route::get('/topup/callback', 'callback')->name('midtrans.callback');
});