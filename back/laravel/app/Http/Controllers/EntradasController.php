<?php

namespace App\Http\Controllers;

use App\Models\Entradas;
use Illuminate\Http\Request;

class EntradasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Entradas $entradas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entradas $entradas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entradas $entradas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entradas $entradas)
    {
        //
    }

    public function storeNoAcc(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'movieData.dia.id' => 'required|exists:showtimes,id',
                'movieData.asientos' => 'required|array|min:1',
                'movieData.asientos.*.fila' => 'required|integer',
                'movieData.asientos.*.columna' => 'required|integer',
            ]);

            $showtimeId = $validatedData['movieData']['dia']['id'];
            $asientos = $validatedData['movieData']['asientos'];

            $ocupados = Entradas::where('showtime_id', $showtimeId)
                ->whereIn('fila', array_column($asientos, 'fila'))
                ->whereIn('columna', array_column($asientos, 'columna'))
                ->get(['fila', 'columna']);

            if ($ocupados->isNotEmpty()) {
                $ocupadosDetails = $ocupados->map(function ($asiento) {
                    return 'Fila: ' . $asiento->fila . ' - Columna: ' . $asiento->columna;
                });

                return response()->json([
                    'error' => 'Algunos asientos ya están ocupados.',
                    'asientos_ocupados' => $ocupadosDetails
                ], 409);
            }

            foreach ($asientos as $asiento) {
                Entradas::create([
                    'user_id' => null, 
                    'user_email' => $validatedData['email'],
                    'showtime_id' => $showtimeId,
                    'fila' => $asiento['fila'],
                    'columna' => $asiento['columna'],
                ]);
            }

            return response()->json(['message' => 'Tickets comprados con éxito'], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Error de validación',
                'detalles' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error interno del servidor',
                'mensaje' => config('app.debug') ? $e->getMessage() : 'Inténtalo más tarde'
            ], 500);
        }
    }
}
