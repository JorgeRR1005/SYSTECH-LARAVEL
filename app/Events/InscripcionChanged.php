<?php

namespace App\Events;

/**
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                    PATRÓN ARQUITECTÓNICO: MVC OBSERVER                       ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Este evento es parte del patrón MVC Observer arquitectónico.                 ║
 * ║ Permite que la Vista observe cambios en el Modelo de Inscripcion.            ║
 * ║                                                                              ║
 * ║ Flujo: Model (Inscripcion) → Event → Listener → View/Notification           ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Inscripcion;

class InscripcionChanged
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Inscripcion $inscripcion;
    public string $action;

    /**
     * Create a new event instance.
     *
     * @param Inscripcion $inscripcion El modelo que cambió
     * @param string $action La acción realizada: 'created', 'updated', 'deleted'
     */
    public function __construct(Inscripcion $inscripcion, string $action)
    {
        $this->inscripcion = $inscripcion;
        $this->action = $action;
    }
}
