<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string|unique:usuarios',
            'contrasena' => 'required|string|confirmed|min:6',
            'nombre' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'nullable|string',
            'numero_celular' => 'nullable|string|unique:usuarios,numero_celular',
            'correo' => 'nullable|email|unique:usuarios,correo',
            'tipo_usuario' => 'required|in:bibliotecario,estudiante,docente,administrativo,directivo,externo',
            'domicilio' => 'nullable|string',
            'numero_control' => 'nullable|string',
            'rfc' => 'nullable|string',
            'ine' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'status_usuario' => 'required|in:activo,sancionado,baja'
        ]);

        User::create([
            'usuario' => $request->usuario,
            'contrasena' => bcrypt($request->contrasena),
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'numero_celular' => $request->numero_celular,
            'correo' => $request->correo,
            'tipo_usuario' => $request->tipo_usuario,
            'domicilio' => $request->domicilio,
            'numero_control' => $request->numero_control,
            'rfc' => $request->rfc,
            'ine' => $request->ine,
            'observaciones' => $request->observaciones,
            'status_usuario' => $request->status_usuario,
        ]);

        return redirect()->route('login')->with('success', 'Cuenta creada con éxito. Inicia sesión.');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'usuario' => 'required|string',
            'contrasena' => 'required|string',
        ]);

        if (Auth::attempt(['usuario' => $credentials['usuario'], 'password' => $credentials['contrasena']])) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'usuario' => 'Las credenciales no coinciden.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
