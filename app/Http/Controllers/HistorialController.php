<?php


namespace App\Http\Controllers;


use App\HistorialMascota;
use App\Mascota;
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

    public static function crearHistorial($mascota_id, $estado = Mascota::DISPONIBLE, $adoptante_id = null) {
        $historial = new HistorialMascota();

        $historial->id_mascota = $mascota_id;
        $historial->id_adoptante = $adoptante_id;
        $historial->estado = $estado;

        $historial->save();
    }
}
