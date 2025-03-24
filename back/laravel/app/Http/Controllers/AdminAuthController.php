<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('dashboard');
        }

        $request->validate([
            'password' => 'required|string',
        ]);

        $user = User::where('name', 'admin')->first();

        if ($user && $user->is_admin && Auth::guard('admin')->attempt(['name' => 'admin', 'password' => $request->password])) {
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors(['password' => 'Credenciales incorrectas.'])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();  // Cerrar sesión
        return redirect()->route('login');  // Redirigir al home
    }
}
