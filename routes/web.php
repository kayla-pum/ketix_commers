<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index'])->name('beranda');
Route::get('/jelajah', [EventController::class, 'explore'])->name('jelajah');

