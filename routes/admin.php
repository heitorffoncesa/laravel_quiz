<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('dashboard');

// Users
Route::resource('users', UserController::class);
Route::put('/users/{uuid}/activate', [UserController::class, 'activate'])->name('users.activate');
