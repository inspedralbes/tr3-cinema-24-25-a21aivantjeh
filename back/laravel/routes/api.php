<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ShowtimeController;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/coming-soon', [MovieController::class, 'upcomingMovies']);

Route::get('/showtimes', [ShowtimeController::class, 'index']);