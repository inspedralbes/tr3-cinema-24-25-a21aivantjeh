<?php

namespace App\Http\Controllers;

use App\Models\Entradas;
use Illuminate\Http\Request;

class ShowtimeSeatsController extends Controller
{
    public function getOccupiedSeats($showtimeId)
    {
        $occupiedSeats = Entradas::where('showtime_id', $showtimeId)
            ->select('fila', 'columna')
            ->get();

        return response()->json([
            'occupied_seats' => $occupiedSeats
        ]);
    }
}
