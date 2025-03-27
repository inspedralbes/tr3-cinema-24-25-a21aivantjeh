<?php

use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SalasController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ShowtimeController;

// Route::get('/', function () {
//     return view('layout.index');
// })->name('home');

Route::get('/', function () {
    if (Auth::guard('admin')->check()) {
        return redirect()->route('dashboard');
    }
    return view('admin.login');
})->name('login');

Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Route::get('/dashboard/usuarios', function () {
    //     return view('admin.dashboard.usuarios');
    // })->name('dashboard.usuarios');

    Route::get('/dashboard/peliculas', function () {
        return view('admin.dashboard.peliculas');
    })->name('dashboard.peliculas');
    Route::get('/dashboard/entradas', function () {
        return view('admin.dashboard.entradas');
    })->name('dashboard.entradas');
    Route::get('/dashboard/salas', function () {
        return view('admin.dashboard.salas');
    })->name('dashboard.salas');
    Route::get('/dashboard/showtimes', function () {
        return view('admin.dashboard.showtimes');
    })->name('dashboard.showtimes');

    // Rutas para el panel de administración de usuarios
    Route::get('/dashboard/usuarios', [UserController::class, 'indexAdmin'])->name('dashboard.usuarios');
    Route::delete('/dashboard/usuarios/{id}', [UserController::class, 'destroyAdmin']);
    Route::put('/dashboard/usuarios/{id}', [UserController::class, 'updateAdmin']);
    Route::get('/dashboard/usuarios/crear', function () {
        return view('admin.dashboard.crearUsuario');
    })->name('dashboard.crearUsuario');
    Route::post('/dashboard/usuarios', [UserController::class, 'storeAdmin'])->name('dashboard.usuarios.store');

    // Rutas para el panel de administración de peliculas
    Route::get('/dashboard/peliculas', [MovieController::class, 'indexAdmin'])->name('dashboard.peliculas');
    Route::delete('/dashboard/pelicula/{id}', [MovieController::class, 'destroyAdmin']);
    Route::put('/dashboard/peliculas/{id}', [MovieController::class, 'updateAdmin'])->name('dashboard.peliculas.update');
    Route::get('/dashboard/peliculas/crear', function () {
        return view('admin.dashboard.crearPelicula');
    })->name('dashboard.crearPelicula');
    Route::get('/dashboard/peliculas/actualizar/{movie}', function (Movie $movie) {
        return view('admin.dashboard.actualizarPelicula', compact('movie'));
    })->name('dashboard.actualizarPelicula');
    Route::post('/dashboard/peliculas', [MovieController::class, 'storeAdmin'])->name('dashboard.peliculas.store');

    // Rutas para el panel de administración de entradas
    Route::get('/dashboard/entradas', [EntradasController::class, 'indexAdmin'])->name('dashboard.entradas');
    Route::delete('/dashboard/entradas/{id}', [EntradasController::class, 'destroyAdmin']);

    // Rutas para el panel de administración de salas
    Route::get('/dashboard/showtimes', [ShowtimeController::class, 'indexAdmin'])->name('dashboard.showtimes');
    Route::get('/dashboard/showtimes/crear', function () {
        return view('admin.dashboard.crearShowtime');
    })->name('dashboard.crearShowtime');
    Route::get('/dashboard/showtimes/crear', [ShowtimeController::class, 'createAdmin'])->name('dashboard.crearShowtime');
    Route::post('/dashboard/showtimes', [ShowtimeController::class, 'storeAdmin'])->name('dashboard.showtime.store');
    Route::get('/dashboard/showtimes/check-availability', [ShowtimeController::class, 'checkAvailability']);
    Route::delete('/dashboard/showtimes/{id}', [ShowtimeController::class, 'destroyAdmin']);
    Route::get('/dashboard/showtimes/movieDetails/{id}', [MovieController::class, 'getMovieDetails'])->name('dashboard.movieDetails');
});

Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout')->middleware('auth:admin');
