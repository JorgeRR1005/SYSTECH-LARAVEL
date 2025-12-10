<?php

namespace App\Factories;

class FormularioUAM extends RegistroFactory
{
    public function crearFormulario()
    {
        return view('registro.uam');
    }
}
