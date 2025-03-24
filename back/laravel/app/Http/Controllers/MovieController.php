<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Movie::all();
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
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }

    public function upcomingMovies(Movie $movie)
    {
        $peliculas = Movie::whereDoesntHave('showtimes')->get();
        return response()->json($peliculas);
    }

    public function indexAdmin()
    {
        $movies = Movie::all();
        return view('admin.dashboard.peliculas', compact('movies'));
    }

    public function storeAdmin(Request $request)
    {
        try {
            // Validar los datos
            $validatedData = $request->validate([
                // 'title' => 'string|max:255',
                // 'description' => 'string',
                // 'genre' => 'string|max:255',
                // 'year' => 'integer|min:1800|max:' . date('Y'),
                // 'rating' => 'numeric|min:0|max:10',
                // 'duration' => 'integer|min:1',
                // 'director' => 'string|max:255',
                // 'producers' => 'string',
                // 'cast' => 'string',
                // 'classification' => 'string|max:50',
                // 'language' => 'string|max:100',
                // 'release_date' => 'date',
                // 'poster' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'video' => 'url',
                // 'country' => 'string|max:255',
                'title',
                'description',
                'genre',
                'year',
                'rating',
                'duration',
                'director',
                'writer',
                'cast',
                'rated',
                'language',
                'release_date',
                'poster',
                'trailer',
                'country',
            ]);

            // Subir la imagen del poster si se envía
            if ($request->hasFile('poster')) {
                $posterPath = $request->file('poster')->store('posters', 'public');
            } else {
                $posterPath = null; // Si no hay imagen, guardamos null
            }

            // Guardar en la base de datos
            Movie::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'genre' => $request['genre'],
                'year' => $request['year'],
                'rating' => $request['rating'],
                'duration' => $request['duration'],
                'director' => $request['director'],
                'writer' => $request['writer'],
                'cast' => $request['cast'],
                'rated' => $request['rated'],
                'language' => $request['language'],
                'release_date' => $request['release_date'],
                'poster' => $posterPath, // Guardar la ruta del poster
                'trailer' => $request['trailer'],
                'country' => $request['country'],
            ]);

            return redirect()->route('dashboard.peliculas')->with('success', 'Película creada con éxito');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear la película: ' . $e->getMessage());
        }
    }
}
