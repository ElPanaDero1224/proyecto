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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',255);
            $table->string('ubicacion',255);
            $table->integer('categoria');
            $table->longText('descripcion');
            $table->longtext('servicios');
            $table->longtext('distancia_puntos_turisticos');
            $table->integer('distancia_centro');
            $table->longText('politicas_cancelacion');
            $table->integer('capacidad');
            $table->integer('precio_por_noche');
            $table->unsignedBigInteger('destino_id');
            $table->foreign('destino_id')->references('id')->on('destinos')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function getRatingPromedioAttribute()
    {
        if ($this->comentarios->isEmpty()) {
            return 0; // Si no hay comentarios, el promedio es 0
        }

        return round($this->comentarios->avg('puntuacion'), 1); // Redondear a 1 decimal
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};
