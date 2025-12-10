<?php

namespace App\States;

use App\Models\Inscripcion;

class PendienteState extends EstadoInscripcion
{
    public function nombre(): string
    {
        return 'pendiente';
    }

    public function confirmar()
    {
        $this->inscripcion->estado = 'confirmada';
        $this->inscripcion->save();
    }

    public function cancelar()
    {
        $this->inscripcion->estado = 'cancelada';
        $this->inscripcion->save();
    }
}
