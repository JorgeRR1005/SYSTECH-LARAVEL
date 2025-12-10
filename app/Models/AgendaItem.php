<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * ╔══════════════════════════════════════════════════════════════════════════════╗
 * ║                    PATRÓN ARQUITECTÓNICO: MVC OBSERVER                       ║
 * ╠══════════════════════════════════════════════════════════════════════════════╣
 * ║ Este modelo utiliza dispatchesEvents para notificar cambios a la Vista.      ║
 * ║ Cada vez que el modelo se crea/actualiza/elimina, se dispara un evento.      ║
 * ╚══════════════════════════════════════════════════════════════════════════════╝
 */

use App\Events\AgendaChanged;

class AgendaItem extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'expositor',
        'categoria',
    ];

    /*
    |--------------------------------------------------------------------------
    | MVC OBSERVER - Dispatch Events on Model Changes
    |--------------------------------------------------------------------------
    | Estos eventos conectan el Model con la Vista a través del patrón
    | MVC Observer arquitectónico.
    */
    protected $dispatchesEvents = [
        'created' => AgendaChanged::class,
        'updated' => AgendaChanged::class,
        'deleted' => AgendaChanged::class,
    ];

    /**
     * Boot del modelo para configurar eventos personalizados.
     */
    protected static function booted()
    {
        // Configurar acción en el evento
        static::created(function ($model) {
            // El evento ya se dispara por dispatchesEvents
        });
    }
}
