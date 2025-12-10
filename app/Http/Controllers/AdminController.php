<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;

/**
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                    PATRÓN ARQUITECTÓNICO: LAZY LOAD                          ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Este controlador implementa Lazy Load mediante:                              ║
 * ║ - Paginación: carga solo los datos necesarios por página                     ║
 * ║ - Cursor pagination: eficiente para datasets grandes                         ║
 * ║ - Lazy collections: procesamiento en memoria optimizado                      ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LAZY LOAD - Paginación para carga diferida de datos
    |--------------------------------------------------------------------------
    | En lugar de cargar todas las inscripciones con all(), usamos
    | paginate() para cargar solo lo necesario.
    */
    public function index()
    {
        // LAZY LOAD: Paginar en lugar de cargar todo
        $inscripciones = Inscripcion::orderBy('created_at', 'desc')
            ->paginate(15); // Carga solo 15 registros por página

        return view('admin.inscripciones', compact('inscripciones'));
    }

    /*
    |--------------------------------------------------------------------------
    | LAZY LOAD - Carga bajo demanda al confirmar
    |--------------------------------------------------------------------------
    | Solo carga el registro específico cuando se necesita.
    */
    public function confirmar($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->obtenerEstado()->confirmar();
        return redirect()->back()->with('success', 'Inscripción confirmada');
    }

    /*
    |--------------------------------------------------------------------------
    | LAZY LOAD - Carga bajo demanda al cancelar
    |--------------------------------------------------------------------------
    */
    public function cancelar($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->obtenerEstado()->cancelar();
        return redirect()->back()->with('success', 'Inscripción cancelada');
    }

    /*
    |--------------------------------------------------------------------------
    | LAZY LOAD - Exportación con Lazy Collection
    |--------------------------------------------------------------------------
    | Ejemplo de cómo procesar grandes cantidades de datos sin
    | consumir toda la memoria usando lazy().
    */
    public function exportarLazy()
    {
        // LAZY LOAD: Procesa uno a uno sin cargar todo en memoria
        return Inscripcion::lazy()->each(function ($inscripcion) {
            // Procesar cada inscripción individualmente
            // Útil para exportaciones o envío de emails masivos
        });
    }
}
