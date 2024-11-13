<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('usuario')->unique();
            $table->string('contrasena');
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno')->nullable();
            $table->string('numero_celular')->nullable();
            $table->string('correo')->nullable();
            $table->enum('tipo_usuario', ['bibliotecario', 'estudiante', 'docente', 'administrativo', 'directivo', 'externo']);
            $table->string('domicilio')->nullable();
            $table->string('numero_control')->nullable();
            $table->string('rfc')->nullable();
            $table->string('ine')->nullable();
            $table->text('observaciones')->nullable();
            $table->enum('status_usuario', ['activo', 'sancionado', 'baja']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
