<?php

namespace App\States;

use App\Models\Inscripcion;

abstract class EstadoInscripcion
{
    protected Inscripcion $inscripcion;

    public function setContext(Inscripcion $inscripcion)
    {
        $this->inscripcion = $inscripcion;
    }

    abstract public function nombre(): string;
    abstract public function confirmar();
    abstract public function cancelar();
}
