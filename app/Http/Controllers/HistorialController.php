<?php


namespace App\Http\Controllers;


use App\HistorialMascota;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function show(Request $request, $mascota_id)
    {
        $historiales = HistorialMascota::whereIdMascota($mascota_id)
            ->leftJoin('adoptantes', 'historial_mascotas.id_adoptante', 'adoptantes.id')
            ->select('historial_mascotas.*', 'adoptantes.nombre', 'adoptantes.apellido')
            ->get();

        return view('mascotas.historial', compact('historiales'));
    }
}
