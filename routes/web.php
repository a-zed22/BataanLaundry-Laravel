<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerRegistration;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\Auth\CustomerLoginController;

Route::get('/', action: function () {
    return view('welcome');
});

Route::get('/LandingPage', action: function () {
    return view('LandingPage');
})->middleware('auth','is_Admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
