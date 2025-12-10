<?php

namespace App\Events;

/**
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                    PATRÓN ARQUITECTÓNICO: MVC OBSERVER                       ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Este evento es parte del patrón MVC Observer arquitectónico.                 ║
 * ║ Permite que la Vista observe cambios en el Modelo de AgendaItem.             ║
 * ║                                                                              ║
 * ║ Flujo: Model (AgendaItem) → Event → Listener → View/Notification            ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\AgendaItem;

class AgendaChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public AgendaItem $agendaItem;
    public string $action;

    /**
     * Create a new event instance.
     *
     * @param AgendaItem $agendaItem El modelo que cambió
     * @param string $action La acción realizada: 'created', 'updated', 'deleted'
     */
    public function __construct(AgendaItem $agendaItem, string $action)
    {
        $this->agendaItem = $agendaItem;
        $this->action = $action;
    }
}
