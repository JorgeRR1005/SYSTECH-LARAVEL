<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factories\FormularioUAM;
use App\Factories\FormularioExterno;
use App\Models\Inscripcion;

class RegistroController extends Controller
{
    public function registroUam()
    {
        $formulario = new FormularioUAM();
        return $formulario->crearFormulario();
    }

    public function registroExterna()
    {
        $formulario = new FormularioExterno();
        return $formulario->crearFormulario();
    }

    public function storeUam(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'correo' => 'required|email',
            'identificador' => 'required',
            'talla' => 'required',
            'recibo' => 'required'
        ]);

        Inscripcion::create([
            'tipo_usuario' => 'UAM',
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'identificador' => $request->identificador,
            'talla' => $request->talla,
            'recibo' => $request->recibo
        ]);

        return redirect()->back()->with('success', 'Registro exitoso (UAM)');
    }

    public function storeExterna(Request $request)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'correo' => 'required|email',
            'identificador' => 'required',
            'talla' => 'required',
            'recibo' => 'required'
        ]);

        Inscripcion::create([
            'tipo_usuario' => 'Externo',
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'identificador' => $request->identificador,
            'talla' => $request->talla,
            'recibo' => $request->recibo
        ]);

        return redirect()->back()->with('success', 'Registro exitoso (Externo)');
    }
}
