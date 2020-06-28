<?php

use App\Tamaño;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamañosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamaños', function (Blueprint $table) {
            $table->id();
            $table->longText('descripcion');
            $table->timestamps();
        });

        $data = array(
            array('descripcion'=>'Pequeño', 'created_at' => date("Y-m-d H:i:s")),
            array('descripcion'=>'Mediano', 'created_at' => date("Y-m-d H:i:s")),
            array('descripcion'=>'Grande', 'created_at' => date("Y-m-d H:i:s"))
        );
        Tamaño::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tamaños');
    }
}
