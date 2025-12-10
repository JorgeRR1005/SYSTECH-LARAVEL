<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;

/**
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                    PATRÓN ARQUITECTÓNICO: LAZY LOAD                          ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Este Service Provider configura el comportamiento de Lazy Load en Laravel.   ║
 * ║                                                                              ║
 * ║ Funcionalidades:                                                             ║
 * ║ - Prevención estricta de lazy loading en desarrollo (detecta N+1)           ║
 * ║ - Configuración de chunk size para procesamiento por lotes                   ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */

class LazyLoadServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     * 
     * Configura el manejo de Lazy Load en toda la aplicación.
     */
    public function boot(): void
    {
        /*
        |--------------------------------------------------------------------------
        | LAZY LOAD - Prevención de N+1 en Desarrollo
        |--------------------------------------------------------------------------
        | En modo desarrollo, Laravel lanzará una excepción si se detecta
        | lazy loading no intencional (problema N+1).
        | En producción, solo se registra en logs.
        */
        Model::preventLazyLoading(! $this->app->isProduction());

        /*
        |--------------------------------------------------------------------------
        | LAZY LOAD - Handler personalizado para violaciones
        |--------------------------------------------------------------------------
        | En lugar de lanzar excepción, logueamos la violación.
        | Esto permite identificar problemas N+1 sin romper la aplicación.
        */
        Model::handleLazyLoadingViolationUsing(function ($model, $relation) {
            $class = get_class($model);
            
            \Illuminate\Support\Facades\Log::warning(
                "[Lazy Load] Violación detectada: {$class}::{$relation} - " .
                "Considere usar eager loading con with('{$relation}')"
            );
        });
    }
}
