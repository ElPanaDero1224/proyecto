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
        Schema::create('reportes_administradores', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha_generacion');
            $table->string('tipo_reporte',255);
            $table->dateTime('filtro_fecha');
            $table->string('filtro_destino');
            $table->string('filtro_aerolinea');
            $table->string('filtro_cliente');
            $table->string('filtro_origen');
            $table->string('url_documento');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes_administrativos');
    }
};
