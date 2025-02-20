<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/livres/all', [LivreController::class, 'getAllLivres']);
Route::get('/reservations/all', [BookController::class, 'getAllReservations']);
