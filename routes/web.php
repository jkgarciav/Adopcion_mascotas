<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

// Mascotas
Route::get('/', 'MascotasController@index');

Route::prefix('mascotas')->group(function () {
    Route::get ('/dashboard','MascotasController@dashboard')->name('mascotas.dashboard');
    Route::get ('/{mascotaId}/showAdoptantes','MascotasController@showAdoptantes')->name('mascotas.showadoptante');
    Route::get ('/{mascotaId}/historial','HistorialController@show')->name('mascotas.historial');
    Route::get ('/{mascotaId}/regreso','MascotasController@volverDisponible')->name('mascotas.regreso');
    Route::get ('/{mascotaId}/notas/edit', 'MascotasController@editarNotaMascota')->name('mascotas.notas.edit');
    Route::put('/{mascotaId}/notas', 'MascotasController@updateNotaMascota')->name('mascotas.notas.update');
    Route::get('/form/{mascotaId}','MascotasController@form');
    Route::post('/form/{mascotaId}','MascotasController@formStore')->name('form.store');
});

Route::resource('mascotas','MascotasController');

// Adoptantes

Route::prefix('adoptantes')->group(function() {
    Route::get ('/{adoptanteId}/editnotas','MascotasController@editnotas')->name('adoptantes.editnotas');
    Route::put('/{adoptanteId}/notas','MascotasController@updateNotaAdoptante')->name('adoptantes.notas.update');
    Route::post('/{adoptanteId}/adoptar', 'MascotasController@adoptar')->name('adoptantes.adoptar');
});

// Home

Route::view('requisitos','mascotas.requisitos')->name('requisitos');
Route::view('noticias','mascotas.noticias')->name('noticias');
