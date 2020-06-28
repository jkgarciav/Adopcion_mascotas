<?php

namespace App\Http\Controllers;

use App\Edad;
use App\Especie;
use App\Mascota;
use App\Sexo;
use App\Tamaño;
use App\Http\Controllers\HistorialController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascotas = Mascota::all();
        return view('mascotas.index',compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'edades' => Edad::all(),
            'especies'=> Especie::all(),
            'tamaños' => Tamaño::all(),
            'sexos' => Sexo::all()
        ];

        return view('mascotas.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $nombreFoto = time().$foto->getClientOriginalName();
            $foto->move(public_path().'/imagenes/',$nombreFoto);
        }
        $mascota = new Mascota();
        $mascota->nombre = $request->input('nombre');
        $mascota->foto = $nombreFoto;
        $mascota->descripcion = $request->input('descripcion');
        $mascota->color = $request->input('color');
        $mascota->edad_id = $request-> input('edad');
        $mascota->especie_id = $request ->input('especie');
        $mascota->tamaño_id = $request ->input('tamaño');
        $mascota->sexo_id = $request ->input('sexo');
        $mascota->estado = Mascota::DISPONIBLE;

        $mascota->save();

        HistorialController::crearHistorial($mascota->id, Mascota::DISPONIBLE);

        return redirect()->route('mascotas.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascota = Mascota::findOrFail($id);
        return view('mascotas.show',['mascota'=>$mascota]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascota = Mascota::findOrFail($id);

        $data = [
            'edades' => Edad::all(),
            'especies'=> Especie::all(),
            'tamaños' => Tamaño::all(),
            'sexos' => Sexo::all(),
            'mascota' => $mascota
        ];

        return view('mascotas.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mascota = Mascota::findOrFail($id);

        $mascota->nombre = $request->input('nombre');
        $mascota->descripcion = $request->input('descripcion');
        $mascota->color = $request->input('color');
        $mascota->edad_id = $request-> input('edad');
        $mascota->especie_id = $request ->input('especie');
        $mascota->tamaño_id = $request ->input('tamaño');
        $mascota->sexo_id = $request ->input('sexo');
        $mascota->notas = $request->input('notas');

        $mascota->save();

        return redirect()->route('mascotas.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mascota::destroy($id);
        return $this->dashboard();
    }

    public function dashboard()
    {
        $mascotas =Mascota::all();
        return view('mascotas.dashboard',compact('mascotas'));
    }

    // Notas
    public function editarNotaMascota(Request $request, $mascota_id) {
        return view('mascotas.notasmascota', compact('mascota_id'));
    }

    public function updateNotaMascota(Request $request, $mascota_id) {
        $mascota = Mascota::findOrFail($mascota_id);
        $mascota->notas = $request->input('notas');
        $mascota->estado = Mascota::DEVUELTO;
        $mascota->save();

        HistorialController::crearHistorial($mascota_id, Mascota::DEVUELTO);

        return redirect()->route('mascotas.dashboard');
    }

    public function volverDisponible(Request $request, $mascota_id) {

        $mascota = Mascota::findOrFail($mascota_id);
        $mascota->estado = Mascota::DISPONIBLE;
        $mascota->save();

        HistorialController::crearHistorial($mascota_id, Mascota::DISPONIBLE);

        return redirect()->route('mascotas.dashboard');

    }

    public static function cambiarEstado($mascota_id, $estado) 
    {
        $mascota = Mascota::findOrFail($mascota_id);
        $mascota->estado = $estado;
        $mascota->save();
    }
}
