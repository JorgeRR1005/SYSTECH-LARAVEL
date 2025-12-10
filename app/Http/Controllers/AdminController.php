<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::all();
        return view('admin.inscripciones', compact('inscripciones'));
    }

    public function confirmar($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->obtenerEstado()->confirmar();
        return redirect()->back()->with('success', 'Inscripción confirmada');
    }

    public function cancelar($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->obtenerEstado()->cancelar();
        return redirect()->back()->with('success', 'Inscripción cancelada');
    }
}
