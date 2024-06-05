<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Register
Route::post('register', [RegisterController::class, 'apiRegister']);

// Login
Route::post('login', [LoginController::class, 'apiLogin']);
Route::post('logout', [LoginController::class, 'apiLogout']);

// Dashboard
Route::get('kandang/{id}', 'App\Http\Controllers\DashboardController@apiKandang');
Route::get('user/{id}', 'App\Http\Controllers\DashboardController@apiUser');
Route::get('aktivitas/{id}', 'App\Http\Controllers\DashboardController@apiAktivitas');
Route::post('addKandang/{id}', [DashboardController::class, 'apiAddPoultry']);
Route::post('addFood/{namaKandang}', [DashboardController::class, 'apiAddFood']);
Route::post('subtractFood/{namaKandang}', [DashboardController::class, 'apiSubtractFood']);
Route::post('addWater/{namaKandang}', [DashboardController::class, 'apiAddWater']);
Route::post('subtractWater/{namaKandang}', [DashboardController::class, 'apiSubtractWater']);
Route::post('addVaccine/{namaKandang}', [DashboardController::class, 'apiAddVaccine']);
Route::post('subtractVaccine/{namaKandang}', [DashboardController::class, 'apiSubtractVaccine']);