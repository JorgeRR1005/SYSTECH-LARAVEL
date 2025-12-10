<?php

namespace App\Factories;

class FormularioExterno extends RegistroFactory
{
    public function crearFormulario()
    {
        return view('registro.externa');
    }
}
