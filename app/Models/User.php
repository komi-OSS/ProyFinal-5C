<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'usuario',
        'contrasena',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'numero_celular',
        'correo',
        'tipo_usuario',
        'domicilio',
        'numero_control',
        'rfc',
        'ine',
        'observaciones',
        'status_usuario'
    ];

    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['contrasena'] = bcrypt($password);
    }
}
