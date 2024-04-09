<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/home', 'home');

Route::view('/about', 'about');

Route::view('/login', 'login')->middleware('guest')->name('login');;

Route::view('/register', 'register');
Route::post('/register', 'App\Http\Controllers\RegisterController@store');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::post('/dashboard', 'App\Http\Controllers\DashboardController@addPoultry');
Route::post('/add-food', [DashboardController::class, 'addFood']);
Route::post('/substract-food', [DashboardController::class, 'substractFood']);
Route::post('/add-water', [DashboardController::class, 'addWater']);
Route::post('/substract-water', [DashboardController::class, 'substractWater']);
Route::post('/add-vaccine', [DashboardController::class, 'addVaccine']);
Route::post('/substract-vaccine', [DashboardController::class, 'substractVaccine']);

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::post('/auth','App\Http\Controllers\LoginController@autentikasi');
Route::post('/logout','App\Http\Controllers\LoginController@logout');
