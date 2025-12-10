<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                    PATRÓN ARQUITECTÓNICO: MVC OBSERVER                       ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Este provider registra:                                                      ║
 * ║ 1. Observers del patrón de diseño (InscripcionObserver, AgendaObserver)     ║
 * ║ 2. Events y Listeners del patrón arquitectónico MVC Observer                 ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */

use App\Models\Inscripcion;
use App\Models\AgendaItem;
use App\Observers\InscripcionObserver;
use App\Observers\AgendaObserver;

// MVC Observer - Events y Listeners
use App\Events\InscripcionChanged;
use App\Events\AgendaChanged;
use App\Listeners\InscripcionChangedListener;
use App\Listeners\AgendaChangedListener;

class EventServiceProvider extends ServiceProvider
{
    /*
    |--------------------------------------------------------------------------
    | MVC OBSERVER - Event/Listener Mappings
    |--------------------------------------------------------------------------
    | Estos mappings conectan los Events del Model con sus Listeners,
    | completando el flujo Model → Event → Listener → View.
    */
    protected $listen = [
        InscripcionChanged::class => [
            InscripcionChangedListener::class,
        ],
        AgendaChanged::class => [
            AgendaChangedListener::class,
        ],
    ];

    /**
     * Registra los observers del sistema.
     */
    public function boot(): void
    {
        /*
        |--------------------------------------------------------------------------
        | PATRÓN DE DISEÑO: OBSERVER
        |--------------------------------------------------------------------------
        | Estos son los Observers del patrón de diseño (ya existentes).
        */
        Inscripcion::observe(InscripcionObserver::class);
        AgendaItem::observe(AgendaObserver::class);
    }
}