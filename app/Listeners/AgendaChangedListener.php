<?php

namespace App\Listeners;

/**
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                    PATRÓN ARQUITECTÓNICO: MVC OBSERVER                       ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Este Listener recibe eventos del Model AgendaItem y actualiza la Vista.      ║
 * ║ Completa el ciclo: Model → Event → Listener → View/Log                       ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */

use App\Events\AgendaChanged;
use Illuminate\Support\Facades\Log;

class AgendaChangedListener
{
    /**
     * Handle the event.
     * 
     * Este método se ejecuta cuando el Model AgendaItem cambia,
     * permitiendo notificar a la Vista o realizar acciones relacionadas.
     */
    public function handle(AgendaChanged $event): void
    {
        $agendaItem = $event->agendaItem;
        $action = $event->action;

        // Log para demostrar el flujo Model → View
        Log::info("[MVC Observer] AgendaItem {$action}: {$agendaItem->titulo}");

        // Aquí se podría:
        // - Emitir evento WebSocket para actualizar Vista en tiempo real
        // - Invalidar cache de la Vista de Agenda
        // - Notificar a usuarios suscritos
    }
}
