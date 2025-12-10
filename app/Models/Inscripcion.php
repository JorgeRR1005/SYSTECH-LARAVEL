<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';

    protected $fillable = [
        'tipo_usuario',
        'nombres',
        'apellidos',
        'correo',
        'identificador',
        'talla',    
        'recibo',
        'estado'
    ];

    /**
     * ACCESSOR: Convierte el valor de la BD ("pendiente", etc.)
     * en un objeto State real.
     */
    public function getEstadoAttribute($value)
    {
        $mapa = [
            'pendiente'  => \App\States\PendienteState::class,
            'confirmada' => \App\States\ConfirmadaState::class,
            'cancelada'  => \App\States\CanceladaState::class,
        ];

        $class = $mapa[$value] ?? \App\States\PendienteState::class;

        $state = new $class();
        $state->setContext($this);

        return $state;
    }

    /**
     * MUTATOR: Permite guardar tanto strings como objetos State.
     */
    public function setEstadoAttribute($value)
    {
        if ($value instanceof \App\States\EstadoInscripcion) {
            // Si pasás un objeto State → guarda su nombre()
            $this->attributes['estado'] = $value->nombre();
        } else {
            // Si pasás un string → se guarda directo
            $this->attributes['estado'] = $value;
        }
    }

    /**
     * Método auxiliar por si deseas obtener explícitamente el objeto State.
     */
    public function obtenerEstado()
    {
        return $this->estado; // Ya retorna el objeto por el accesor
    }
}
