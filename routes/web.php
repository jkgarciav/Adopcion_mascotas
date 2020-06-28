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

    Route::prefix('/{mascotaId}')->group(function() {
        Route::get ('/historial','HistorialController@show')->name('mascotas.historial');
        Route::get ('/regreso','MascotasController@volverDisponible')->name('mascotas.regreso');
        Route::get ('/notas', 'MascotasController@editarNotaMascota')->name('mascotas.notas.edit');
        Route::put('/notas', 'MascotasController@updateNotaMascota')->name('mascotas.notas.update');

        // Adoptantes
        Route::prefix('/adoptantes')->group(function() {
            Route::get ('/','AdoptantesController@index')->name('adoptantes.index');
            Route::post('/','AdoptantesController@store')->name('adoptantes.store');
            Route::get('/create','AdoptantesController@create')->name('adoptantes.create');
            Route::get ('/{adoptanteId}/notas','AdoptantesController@editNota')->name('adoptantes.notas.edit');
            Route::put('/{adoptanteId}/notas','AdoptantesController@updateNota')->name('adoptantes.notas.update');
            Route::post('/{adoptanteId}/adoptar', 'AdoptantesController@adoptar')->name('adoptantes.adoptar');
        });
    });    
});

Route::resource('mascotas','MascotasController');

// Home

Route::view('requisitos','mascotas.requisitos')->name('requisitos');
Route::view('noticias','mascotas.noticias')->name('noticias');
