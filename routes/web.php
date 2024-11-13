<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);


Route::get('/usuarios/create', [AuthController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [AuthController::class, 'store'])->name('usuarios.store');