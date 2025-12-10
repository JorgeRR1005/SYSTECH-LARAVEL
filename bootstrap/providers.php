<?php

/**
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                    REGISTRO DE SERVICE PROVIDERS                             ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Patrones Arquitectónicos registrados:                                        ║
 * ║ - EventServiceProvider: MVC Observer (Events y Listeners)                    ║
 * ║ - LazyLoadServiceProvider: Lazy Load (N+1 prevention)                        ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    
    /*
    |--------------------------------------------------------------------------
    | PATRÓN ARQUITECTÓNICO: LAZY LOAD
    |--------------------------------------------------------------------------
    */
    App\Providers\LazyLoadServiceProvider::class,
];
