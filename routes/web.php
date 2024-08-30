<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowerController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class)->only(['show', 'edit', 'update']);
    Route::post('users/{user}/follow', [FollowerController::class, 'follow'])->name('users.follow');
    Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])->name('users.unfollow');
});







    

