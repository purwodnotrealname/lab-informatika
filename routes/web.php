<?php

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
   ROute::get('/login', 'login')->name('login.view');

});


Route::get('/showcase', [ShowcaseController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});


Route::get('/project/add', [WorkController::class, 'create'])->name('project.create');
Route::post('/project/store', [WorkController::class, 'store'])->name('project.store');

