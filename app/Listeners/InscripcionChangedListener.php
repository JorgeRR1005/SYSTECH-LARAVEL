<?php

namespace App\Listeners;

/**
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                    PATRÓN ARQUITECTÓNICO: MVC OBSERVER                       ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Este Listener recibe eventos del Model y puede actualizar la Vista.          ║
 * ║ Completa el ciclo: Model → Event → Listener → View/Log                       ║
 * ║                                                                              ║
 * ║ En una implementación con WebSockets, este listener notificaría              ║
 * ║ directamente a la Vista para actualización en tiempo real.                   ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */

use App\Events\InscripcionChanged;
use Illuminate\Support\Facades\Log;

class InscripcionChangedListener
{
    /**
     * Handle the event.
     * 
     * Este método se ejecuta cuando el Model Inscripcion cambia,
     * permitiendo notificar a la Vista o realizar acciones relacionadas.
     */
    public function handle(InscripcionChanged $event): void
    {
        $inscripcion = $event->inscripcion;
        $action = $event->action;

        // Log para demostrar el flujo Model → View
        Log::info("[MVC Observer] Inscripcion {$action}: {$inscripcion->nombres} {$inscripcion->apellidos}");

        // Aquí se podría:
        // - Emitir evento WebSocket para actualizar Vista en tiempo real
        // - Invalidar cache de la Vista
        // - Notificar a otros componentes de la UI
    }
}
