<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Showtime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
                // 'price' => $showtime->price,
                // 'is_special_day' => $showtime->is_special_day
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

    public function indexAdmin()
    {
        $showtimes = Showtime::all();

        return view('admin.dashboard.showtimes', compact('showtimes'));
    }

    public function createAdmin()
    {
        $showtimes = Showtime::all();
        $movies = Movie::all();

        return view('admin.dashboard.crearShowtime', compact('showtimes', 'movies'));
    }

    public function checkAvailability(Request $request)
    {
        $date = $request->get('date');

        $reservedTimes = Showtime::where('show_date', $date)->pluck('show_time')->toArray();
        Log::info('Horarios reservados para la fecha: ' . $date, ['reservados' => $reservedTimes]);

        $possibleTimes = ['16:00', '18:00', '20:00'];

        $availableTimes = array_diff($possibleTimes, $reservedTimes);
        $availableTimes = array_values($availableTimes);

        Log::info('Horarios disponibles para la fecha: ' . $date, ['disponibles' => $availableTimes]);

        return response()->json(['availableTimes' => $availableTimes]);
    }


    public function storeAdmin(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'movie_id' => 'required|exists:movies,id',
                'show_date' => 'required',
                'show_time' => 'required'
            ]);

            Showtime::create([
                'movie_id' => $validatedData['movie_id'],
                'show_date' => $validatedData['show_date'],
                'show_time' => $validatedData['show_time'],
            ]);
            
            return redirect()->route('dashboard.showtimes')->with('success', 'Showtime creado con éxito');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear el showtime: ' . $e->getMessage());

        }
    }

    public function destroyAdmin (string $id)
    {
        $showtime = Showtime::find($id);

        if (!$showtime) {
            return response()->json(['error' => 'Showtime no encontrado'],404);
        }

        $showtime->delete();

        return response()->json(['success' => 'Showtime eliminado correctamente']);
    }
}
