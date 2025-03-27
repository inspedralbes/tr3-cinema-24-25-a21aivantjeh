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
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'genre' => 'nullable|string',
                'year' => 'nullable|string',
                'rating' => 'nullable|string',
                'duration' => 'nullable|string',
                'director' => 'nullable|string',
                'writer' => 'nullable|string',
                'cast' => 'nullable|string',
                'rated' => 'nullable|string',
                'language' => 'nullable|string',
                'release_date' => 'nullable|date_format:Y-m-d',
                'poster' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
                'trailer' => 'nullable|url',
                'country' => 'nullable|string',
            ]);

            if ($request->hasFile('poster')) {
                $posterPath = $request->file('poster')->store('posters', 'public');
            } else {
                $posterPath = null;
            }

            Movie::create([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'genre' => $validatedData['genre'],
                'year' => $validatedData['year'],
                'rating' => $validatedData['rating'],
                'duration' => $validatedData['duration'],
                'director' => $validatedData['director'],
                'writer' => $validatedData['writer'],
                'cast' => $validatedData['cast'],
                'rated' => $validatedData['rated'],
                'language' => $validatedData['language'],
                'release_date' => $validatedData['release_date'],
                'poster' => $posterPath, // Guardar la ruta del poster
                'trailer' => $validatedData['trailer'],
                'country' => $validatedData['country'],
            ]);

            return redirect()->route('dashboard.peliculas')->with('success', 'Película creada con éxito');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Hubo un error al crear la película: ' . $e->getMessage());
        }
    }

    public function destroyAdmin(string $id)
    {
        $movie = Movie::find($id);
        if (!$movie) {
            return response()->json(['error' => 'Pelicula no encontrada'], 404);
        }

        $movie->delete();

        return response()->json(['success' => 'Pelicula eliminada correctamente.']);
    }

    public function updateAdmin(Request $request, string $id)
    {
        $movie = Movie::find($id);
        if (!$movie) {
            return response()->json(['error' => 'Pelicula no encontrada'], 404);
        }

        $updateData = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'genre' => $request->input('genre'),
            'year' => $request->input('year'),
            'rating' => $request->input('rating'),
            'duration' => $request->input('duration'),
            'director' => $request->input('director'),
            'writer' => $request->input('writer'),
            'cast' => $request->input('cast'),
            'rated' => $request->input('rated'),
            'language' => $request->input('language'),
            'release_date' => $request->input('release_date'),
            'poster' => $request->input('poster'),
            'trailer' => $request->input('trailer'),
            'country' => $request->input('country'),
        ];

        $movie->update($updateData);

        return redirect()->route('dashboard.peliculas')->with('success', 'Película creada con éxito');
    }

    public function getMovieDetails($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json(['error' => 'Película no encontrada']);
        }

        return view('admin.dashboard.datosPelicula', compact('movie'));
    }
}
