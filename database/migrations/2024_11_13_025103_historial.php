<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historial_prestamos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->foreignId('ejemplar_id')->constrained('ejemplares');
            $table->date('fecha_inicio');
            $table->date('fecha_devolucion')->nullable();
            $table->integer('dias_prestamo')->nullable()->storedAs('julianday(fecha_devolucion) - julianday(fecha_inicio)');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_prestamos');
    }
};
