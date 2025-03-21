<?php

use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\ShowtimeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/coming-soon', [MovieController::class, 'upcomingMovies']);

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/buy-tickets-noacc', [EntradasController::class, 'storeNoAcc']);

Route::get('/showtimes', [ShowtimeController::class, 'index']);