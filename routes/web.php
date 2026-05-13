<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Route untuk user
Route::get('/', [EventController::class, 'index'])->name('beranda');
Route::get('/jelajah', [EventController::class, 'explore'])->name('jelajah');

// Route Auth (Login/Register)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route Admin
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/events/create', [AdminController::class, 'create'])->name('events.create');
    Route::post('/events', [AdminController::class, 'store'])->name('events.store');
    Route::get('/events/{id}/edit', [AdminController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}', [AdminController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [AdminController::class, 'destroy'])->name('events.destroy');
});