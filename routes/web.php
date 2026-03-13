<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FuelPriceController;

Route::inertia('/', 'Welcome')->name('home');

Route::get('dashboard',[FuelPriceController::class, 'index'])->name('dashboard');
Route::get('fetch',[FuelPriceController::class,'fetch'])->name('fetch');
Route::get('info',[FuelPriceController::class,'info'])->name('info');
