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
        Schema::table('agenda_items', function (Blueprint $table) {
            // Nueva columna para la fecha del evento
            $table->date('fecha')->after('id')->nullable();

            // Nueva columna para categoría o tipo de sesión
            $table->string('categoria')->after('descripcion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agenda_items', function (Blueprint $table) {
            $table->dropColumn(['fecha', 'categoria']);
        });
    }
};
