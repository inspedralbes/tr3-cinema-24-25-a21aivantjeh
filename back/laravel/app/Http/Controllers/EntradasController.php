<?php

namespace App\Http\Controllers;

use App\Models\Entradas;
use Illuminate\Http\Request;
use App\Http\Controllers\PHPMailerController;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

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

    public function storeEntrada(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'email',
                'movieData' => 'array',
            ]);

            $showtimeId = $validatedData['movieData']['dia']['id'];
            $asientos = $validatedData['movieData']['asientos'];
            $movieTitle = $validatedData['movieData']['title'];
            $movie = $validatedData['movieData'];

            $ocupados = Entradas::where('showtime_id', $showtimeId)
                ->where(function ($query) use ($asientos) {
                    foreach ($asientos as $asiento) {
                        $query->orWhere(function ($q) use ($asiento) {
                            $q->where('fila', $asiento['fila'])
                                ->where('columna', $asiento['columna']);
                        });
                    }
                })->get(['fila', 'columna']);

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

            $subject = $movieTitle . " - Entradas Compradas";
            $message = "Hola, tu compra ha sido realizada con éxito.";
            $to = $validatedData['email'];

            $sendMailController = new PHPMailerController();
            $emailSent = $sendMailController->sendEntrada(new Request([
                'subject' => $subject,
                'message' => $message,
                'movie' => $movie,
                'to' => [$to],
            ]));

            if (!$emailSent) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'Tickets comprados pero hubo un problema al enviar el email'
                ], 201);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Tickets comprados y email enviado con éxito'
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Error de validación',
                'detalles' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error interno del servidor',
                'mensaje' => 'Inténtalo más tarde'
            ], 500);
        }
    }

    public function getEntradas(string $email)
    {
        $entradas = Entradas::where('user_email', $email)
            ->with('showtime.movie') // Cargar la película asociada a cada entrada
            ->get();

        return response()->json($entradas);
    }

    public function proba(Request $request)
    {
        return response()->json(['message' => 'ruta proba']);
    }
}
