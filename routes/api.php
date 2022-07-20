<?php

use App\Http\Controllers\RestaurateurController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::resources('/home', MenuController::class);


Route::resource('/restaurateurs', RestaurateurController::class);

// Route::post('/restaurateurs', [RestaurateurController::class, 'store'])->name('restaurateurs.store');
