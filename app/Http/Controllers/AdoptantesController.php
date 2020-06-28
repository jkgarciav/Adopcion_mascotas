<?php


namespace App\Http\Controllers;

use App\Adoptante;
use App\Mascota;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\MascotasController;
use Illuminate\Http\Request;

class AdoptantesController extends Controller
{
    public function index(Request $request, $mascota_id)
    {
        $estado = Mascota::findOrFail($mascota_id)->estado;
        $adoptantes = Adoptante::whereMascotaId($mascota_id)->get();
        return view('adoptantes.index', compact('adoptantes', 'estado'));
    }

    public function editNota(Request $request, $mascota_id, $adoptante_id)
    {
        $adoptante = Adoptante::findOrFail($adoptante_id);
        return view('adoptantes.notas.edit', compact('adoptante'));
    }

    public function updateNota(Request $request, $mascota_id, $adoptante_id) {
        $adoptante = Adoptante::findOrFail($adoptante_id);
        $adoptante->notas = $request->input('notas');
        $adoptante->save();

        return redirect()->route('adoptantes.index',$mascota_id);
    }

    public function adoptar(Request $request, $mascota_id, $adoptante_id) {
        MascotasController::cambiarEstado($mascota_id, Mascota::ADOPTADO);
        HistorialController::crearHistorial($mascota_id, Mascota::ADOPTADO, $adoptante_id);
        return redirect()->route('mascotas.dashboard');
    }

    public function create($id)
    {
        return view('adoptantes.create', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $adoptante= new Adoptante();
        $adoptante->mascota_id = $id ;
        $adoptante->nombre = $request->input('Nombres');
        $adoptante->apellido = $request->input('Apellidos');
        $adoptante->correo = $request->input('Correo');
        $adoptante->telefono = $request->input('Telefono');
        $adoptante->descripcion = $request->input('Descripcion');
        $adoptante->save();

        MascotasController::cambiarEstado($id, Mascota::EN_PROCESO);
        HistorialController::crearHistorial($id, Mascota::EN_PROCESO, $adoptante->id);

        return redirect()->route('mascotas.index');
    }
}
