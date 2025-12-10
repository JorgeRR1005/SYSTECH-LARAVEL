<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Models\Inscripcion;
use App\Models\AgendaItem;
use App\Observers\InscripcionObserver;
use App\Observers\AgendaObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Registra los observers del sistema.
     */
    public function boot(): void
    {
        // Observer para los registros de inscripción
        Inscripcion::observe(InscripcionObserver::class);

        // Observer para las sesiones de la agenda
        AgendaItem::observe(AgendaObserver::class);
    }
}
    