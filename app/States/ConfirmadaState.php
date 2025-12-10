<?php

namespace App\States;

class ConfirmadaState extends EstadoInscripcion
{
    public function nombre(): string
    {
        return 'confirmada';
    }

    public function confirmar()
    {
        // Ya está confirmada, no hace nada
    }

    public function cancelar()
    {
        $this->inscripcion->estado = 'cancelada';
        $this->inscripcion->save();
    }
}
