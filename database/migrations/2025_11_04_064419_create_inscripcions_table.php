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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_usuario'); // UAM o Externo
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo');
            $table->string('identificador'); // CIF o Cédula
            $table->string('talla')->nullable();
            $table->string('recibo');
            $table->string('estado')->default('pendiente'); // State pattern
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
