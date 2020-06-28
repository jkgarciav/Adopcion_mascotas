<?php

use App\Sexo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sexos', function (Blueprint $table) {
            $table->id();
            $table->longText('descripcion');
            $table->timestamps();
        });
        $data = array(
            array('descripcion'=>'Hembra', 'created_at' => date("Y-m-d H:i:s")),
            array('descripcion'=>'Macho', 'created_at' => date("Y-m-d H:i:s"))
        );
        Sexo::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sexos');
    }
}
