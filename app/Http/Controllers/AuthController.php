<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'usuario' => 'required|unique:usuarios,usuario',
            'contrasena' => 'required|min:6',
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'nullable',
            'numero_celular' => 'nullable',
            'correo' => 'nullable|email',
            'tipo_usuario' => 'required|in:bibliotecario,estudiante,docente,administrativo,directivo,externo',
            'domicilio' => 'nullable',
            'numero_control' => 'nullable',
            'rfc' => 'nullable',
            'ine' => 'nullable',
            'observaciones' => 'nullable',
            'status_usuario' => 'required|in:activo,sancionado,baja',
        ]);

        $validatedData['contrasena'] = Hash::make($validatedData['contrasena']);

        User::create($validatedData);

        return redirect()->route('usuarios.create')->with('success', 'Usuario registrado exitosamente.');
    }
}
