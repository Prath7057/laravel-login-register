<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class,'create_login'])->name('login');
Route::get('login', [AuthController::class,'create_login'])->name('login');
Route::POST('login',[AuthController::class,'store_login']);
//
Route::get('register', [AuthController::class,'create_register'])->name('register');
Route::POST('register',[AuthController::class,'store_register']);
//
Route::GET('dashboard',[AuthController::class,'dashboard'])
->name('dashboard')
->middleware(Authenticate::class);
//
Route::post('logout', [AuthController::class, 'logout'])->name('logout');