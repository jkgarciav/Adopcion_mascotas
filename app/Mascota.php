<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    //
    public const DISPONIBLE = 'Disponible';
    public const EN_PROCESO = 'En_Proceso';
    public const ADOPTADO = 'Adoptado';
    public const DEVUELTO = 'Devuelto';

    public function getEdad() {
        return Edad::findOrFail($this->edad_id)->descripcion;
    }
    public function getSexo() {
        return Sexo::findOrFail($this->sexo_id)->descripcion;
    }
    public function getEspecie() {
        return Especie::findOrFail($this->Especie_id)->descripcion;
    }
    public function getTamaño() {
        return Tamaño::findOrFail($this->tamaño_id)->descripcion;
    }
}
