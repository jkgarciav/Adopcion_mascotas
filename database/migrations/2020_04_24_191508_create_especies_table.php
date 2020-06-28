<?php

use App\Especie;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especies', function (Blueprint $table) {
            $table->id();
            $table->longText('descripcion');
            $table->timestamps();
        });

        $data = array(
            array('descripcion'=>'Perro', 'created_at' => date("Y-m-d H:i:s")),
            array('descripcion'=>'Gato', 'created_at' => date("Y-m-d H:i:s")),
            array('descripcion'=>'Ave', 'created_at' => date("Y-m-d H:i:s"))
        );
        Especie::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especies');
    }
}
