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

// Création d'une route pour se connecter/déconnecter

Route::post('/login', [RestaurateurController::class, 'login'])->name("login.login");
Route::middleware('auth:sanctum')->get('/logout', [RestaurateurController::class, 'logout'])->name("logout.logout");

// Création de 4 routes RESTAURATEURS pour la méthode CRUD

Route::post('/restaurateurs', [RestaurateurController::class, 'store'])->name("restaurateurs.store");
Route::middleware('auth:sanctum')->get('/restaurateurs', [RestaurateurController::class, 'profile'])->name("restaurateurs.profile");
Route::middleware('auth:sanctum')->put('/restaurateurs', [RestaurateurController::class, 'update'])->name("restaurateurs.update");
Route::middleware('auth:sanctum')->delete('/restaurateurs', [RestaurateurController::class, 'destroy'])->name("restaurateurs.destroy");

// Création de 4 routes RESTAURANTS pour la méthode CRUD

Route::middleware('auth:sanctum')->post('/restaurants', [RestaurantController::class, 'store'])->name("restaurants.store");
Route::middleware('auth:sanctum')->get('/restaurants', [RestaurantController::class, 'profile'])->name("restaurants.index");
Route::middleware('auth:sanctum')->put('/restaurants', [RestaurantController::class, 'update'])->name("restaurants.update");
Route::middleware('auth:sanctum')->delete('/restaurants/{id}', [RestaurantController::class, 'destroy'])->name("restaurants.destroy");

// Route::middleware('auth:sanctum')->resource('/restaurants', RestaurantController::class);

// Création de 4 routes MENUS pour la méthode CRUD

// menu
Route::middleware('auth:sanctum')->resource('/menu', MenuController::class);

// Route::middleware('auth:sanctum')->post('/menu', [MenuController::class, 'store'])->name("menu.store");
// Route::middleware('auth:sanctum')->get('/menu', [MenuController::class, 'index'])->name("menu.index");
// Route::middleware('auth:sanctum')->put('/menu', [MenuController::class, 'update'])->name("menu.update");
// Route::middleware('auth:sanctum')->delete('/menu', [MenuController::class, 'destroy'])->name("menu.destroy");

// Création route pour afficher les restaurants en tant que client(s)

Route::get('/guests', [GuestController::class, 'index'])->name('guest.index');
