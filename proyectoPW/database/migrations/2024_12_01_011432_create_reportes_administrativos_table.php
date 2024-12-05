<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id(); // ID único del vuelo
            $table->string('numero_vuelo', 50); // Número del vuelo
            $table->string('origen', 255); // Origen del vuelo
            $table->string('destino', 255); // Destino del vuelo
            $table->dateTime('fecha_salida'); // Fecha y hora de salida
            $table->dateTime('fecha_llegada'); // Fecha y hora de llegada
            $table->integer('duracion'); // Duración del vuelo en horas
            $table->timestamps(); // Timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};
