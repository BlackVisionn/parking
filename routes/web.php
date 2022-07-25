<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'clients');
Route::resource('cars', CarController::class);
Route::resource('clients', ClientController::class);
