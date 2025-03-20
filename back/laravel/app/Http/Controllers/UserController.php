<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\PHPMailerController;

class UserController extends Controller
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
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8',
            ]);

            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
            ]);

            Auth::login($user);
            $token = $user->createToken('auth_token')->plainTextToken;

            $subject = "Benvingut a la nostra plataforma!";
            $message = "Hola " . $user->name . ", aquest és el missatge de confirmació per a la teva inscripció a la nostra plataforma.";
            $to = $user->email;

            $sendMailController = new PHPMailerController();
            $response = $sendMailController->sendEmail(new Request([
                'subject' => $subject,
                'message' => $message,
                'to' => [$to],
                'user' => ['name' => $user->name, 'surname' => $user->surname]
            ]));

            if (!$response) {
                return response()->json([
                    'status' => 'warning',
                    'message' => 'User created, but email sending failed.',
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'token' => $token
                    ],
                    'auth' => true
                ], 201);
            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'User created and email sent successfully.',
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'token' => $token
                    ],
                    'auth' => true
                ], 201);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Hubo un error al crear el usuario',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        try {
            $user = User::where('email', $validatedData['email'])->first();

            if (!$user) {
                return response()->json([
                    'message' => 'No existe una cuenta con este correo'
                ], 404);
            }

            if (!Auth::attempt($validatedData)) {
                return response()->json([
                    'message' => 'Invalid credentials'
                ], 401);
            }

            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'token' => $token
                ],
                'auth' => true
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred, please try again later.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
