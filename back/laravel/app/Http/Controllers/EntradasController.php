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
            // Log::info('Entrada store request EntradaController', $request->all());
            $data = $request->validate([
                'email' => 'required|email',
                'movieData' => 'required|array',
                'movieData.dia.id' => 'required|integer',
                'movieData.asientos' => 'required|array',
                'movieData.title' => 'required|string'
            ]);

            $showtimeId = $data['movieData']['dia']['id'];
            $asientos = $data['movieData']['asientos'];
            $movieData = $request->input('movieData');

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
                return response()->json([
                    'error' => 'Algunos asientos ya están ocupados.',
                    'asientos_ocupados' => $ocupados->map(fn($a) => "Fila: {$a->fila} - Columna: {$a->columna}")
                ], 409);
            }

            foreach ($asientos as $asiento) {
                Entradas::create([
                    'user_email' => $data['email'],
                    'showtime_id' => $showtimeId,
                    'fila' => $asiento['fila'],
                    'columna' => $asiento['columna'],
                    'vip' => $asiento['vip'],
                    'precio' => $asiento['vip'] ? 6 : 8
                ]);
            }

            $sendMailController = new PHPMailerController();
            $mail = $sendMailController->sendEntrada(new Request([
                'subject' => "{$data['movieData']['title']} - Entradas Compradas",
                'message' => 'Hola, tu compra ha sido realizada con éxito.',
                'to' => $data['email'],
                'movieData' => $movieData,
            ]));

            Log::info('Resultado del mail: ' . ($mail ? 'Success' : 'Failed'));

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
                'mensaje' => 'Inténtalo más tarde',
                'detalles' => $e->getMessage()
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

    public function indexAdmin()
    {
        $entradas = Entradas::all();
        return view('admin.dashboard.entradas', compact('entradas'));
    }

    public function destroyAdmin(string $id)
    {
        $entrada = Entradas::find($id);
        $email = $entrada->user_email;
        // $entradaData = $email;
        if (!$entrada) {
            return response()->json(['error' => 'Entrada no encontrada'], 404);
        }

        $entrada->delete();

        $sendMailController = new PHPMailerController();
        $sendMailController->eliminaEntrada(new Request([
            'subject' => "ENTRADA ELIMINADA!!!",
            'message' => 'Hola, tu entrada ha sido eliminada.',
            'to' => $email,
            // 'entradaData' => $entradaData
        ]));

        return response()->json(['success' => 'Pelicula eliminada correctamente.']);
    }
}
