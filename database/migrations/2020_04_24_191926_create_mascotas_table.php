<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->longText('descripcion');
            $table->longText('notas')->nullable();
            $table->string('color');
            $table->string('foto');
            $table->unsignedBigInteger('edad_id');
            $table->unsignedBigInteger('especie_id');
            $table->unsignedBigInteger('tamaño_id');
            $table->unsignedBigInteger('sexo_id');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('edad_id')->references('id')->on('edades');
            $table->foreign('especie_id')->references('id')->on('especies');
            $table->foreign('tamaño_id')->references('id')->on('tamaños');
            $table->foreign('sexo_id')->references('id')->on('sexos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
}
