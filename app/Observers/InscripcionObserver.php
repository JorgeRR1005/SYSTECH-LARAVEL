<?php

namespace App\Observers;

use App\Models\Inscripcion;
use App\Services\CorreoSimuladoService;

class InscripcionObserver
{
    public function created(Inscripcion $inscripcion): void
    {
        // Cuando se crea una nueva inscripción, simular el envío de correo
        $servicio = new CorreoSimuladoService();
        $servicio->enviarCorreo("Registro recibido para: {$inscripcion->nombres} {$inscripcion->apellidos}");
    }

public function updated(Inscripcion $inscripcion): void
{
    if ($inscripcion->isDirty('estado')) {

        $servicio = new CorreoSimuladoService();

        $servicio->enviarCorreo(
            "Estado actualizado a '{$inscripcion->estado->nombre()}' para {$inscripcion->nombres}"
        );
    }
}
}
