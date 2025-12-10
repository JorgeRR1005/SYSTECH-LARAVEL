<?php

namespace App\Observers;

use App\Models\AgendaItem;
use Illuminate\Support\Facades\Log;

class AgendaObserver
{
    /**
     * Cuando se crea una nueva sesión en la agenda.
     */
    public function created(AgendaItem $item)
    {
        Log::info("[Agenda] Nueva sesión creada: {$item->titulo} ({$item->fecha})");
    }

    /**
     * Cuando se actualiza una sesión existente.
     */
    public function updated(AgendaItem $item)
    {
        Log::info("[Agenda] Sesión actualizada: {$item->titulo}");
    }

    /**
     * Cuando se elimina una sesión.
     */
    public function deleted(AgendaItem $item)
    {
        Log::warning("[Agenda] Sesión eliminada: {$item->titulo}");
    }
}
