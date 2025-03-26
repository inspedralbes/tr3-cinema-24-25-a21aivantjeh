<?php

use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\ShowtimeSeatsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/coming-soon', [MovieController::class, 'upcomingMovies']);

Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);

Route::post('/buy-tickets', [EntradasController::class, 'storeEntrada']);
// Route::post('/buy-tickets-noacc', [EntradasController::class, 'proba']);

Route::get('/showtimes', [ShowtimeController::class, 'index']);

Route::get('/entradas/{email}', [EntradasController::class, 'getEntradas']);

Route::get('/showtimes/{showtimeId}/occupied-seats', [ShowtimeSeatsController::class, 'getOccupiedSeats']);

Route::get('/ticket-view', function () {
    return view('ticket');
});