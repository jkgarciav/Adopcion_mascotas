<?php

use App\Edad;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edades', function (Blueprint $table) {
            $table->id();
            $table->longText('descripcion');
            $table->timestamps();
        });

        $data = array(
            array('descripcion'=>'0 a 1 años', 'created_at' => date("Y-m-d H:i:s")),
            array('descripcion'=>'1 a 2 años', 'created_at' => date("Y-m-d H:i:s")),
            array('descripcion'=>'2 a 3 años', 'created_at' => date("Y-m-d H:i:s")),
            array('descripcion'=>'3 años en adelante', 'created_at' => date("Y-m-d H:i:s"))
        );

        Edad::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edads');
    }
}
