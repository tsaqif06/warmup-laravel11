<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', [AppController::class, 'index'])->name('home');

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/my-account', [UserController::class, 'index'])->name('user.index');
});

Route::middleware('auth.admin')->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
