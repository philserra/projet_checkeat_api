<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\RestaurateurController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// login / logout

Route::post('/login', [RestaurateurController::class, 'login']);
Route::middleware('auth:sanctum')->get('/logout', [RestaurateurController::class, 'logout']);

// restaurateur (user)
Route::middleware('auth:sanctum')->get('/restaurateurs', [RestaurateurController::class, 'profile'])->name("restaurateurs.profile");
Route::post('/restaurateurs', [RestaurateurController::class, 'store'])->name("restaurateurs.store");
Route::middleware('auth:sanctum')->put('/restaurateurs', [RestaurateurController::class, 'update'])->name("restaurateurs.update");
Route::middleware('auth:sanctum')->delete('/restaurateurs', [RestaurateurController::class, 'destroy'])->name("restaurateurs.destroy");

// restaurant 
Route::middleware('auth:sanctum')->resource('/restaurants', RestaurantController::class);
Route::get('/guests', [GuestController::class, 'index'])->name('guest.index');

// menu
Route::middleware('auth:sanctum')->resource('/menu', MenuController::class);
