<?php

namespace App\States;

use App\Models\Inscripcion;

class CanceladaState extends EstadoInscripcion
{
    public function nombre(): string
    {
        return 'cancelada';
    }

    public function confirmar()
    {
        $this->inscripcion->estado = 'confirmada';
        $this->inscripcion->save();
    }

    public function cancelar() { /* No hace nada */ }
}
