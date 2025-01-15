<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class,'create_login'])->name('login');
Route::POST('login',[AuthController::class,'store_login']);
//
Route::get('register', [AuthController::class,'create_register'])->name('register');
Route::POST('register',[AuthController::class,'store_register']);
