<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RantController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::view('/', 'index')->name('landing.page');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');

    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

    Route::resource('/rants', RantController::class);

});