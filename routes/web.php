<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ParkingController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'clients');
Route::resource('cars', CarController::class);
Route::resource('clients', ClientController::class);
Route::resource('parking', ParkingController::class);
