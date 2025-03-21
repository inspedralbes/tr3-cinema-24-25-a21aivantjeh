<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showtimes = Showtime::with('movie')->get();

        $groupedShowtimes = [];

        foreach ($showtimes as $showtime) {
            $movieId = $showtime->movie_id;
            $date = $showtime->show_date;

            if (!isset($groupedShowtimes[$movieId])) {
                $groupedShowtimes[$movieId] = [
                    'movie' => $showtime->movie,
                    'showing_dates' => []
                ];
            }

            if (!isset($groupedShowtimes[$movieId]['showing_dates'][$date])) {
                $groupedShowtimes[$movieId]['showing_dates'][$date] = [
                    'id' => $showtime->id,  
                    'date' => $date,
                    'showtimes' => []
                ];
            }

            $groupedShowtimes[$movieId]['showing_dates'][$date]['showtimes'][] = [
                'id' => $showtime->id,
                'time' => $showtime->show_time,
                'price' => $showtime->price,
                'is_special_day' => $showtime->is_special_day
            ];
        }

        $result = [];
        foreach ($groupedShowtimes as $movieGroup) {
            $result[] = $movieGroup;
        }

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Showtime $showtime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Showtime $showtime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Showtime $showtime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Showtime $showtime)
    {
        //
    }
}
