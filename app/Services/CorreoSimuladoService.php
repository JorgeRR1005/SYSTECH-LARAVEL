<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class CorreoSimuladoService
{
    public function enviarCorreo(string $mensaje)
    {
        Log::info('[Correo simulado] ' . $mensaje);
    }
}
