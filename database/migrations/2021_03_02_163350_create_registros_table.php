<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->increments("numero_ticket");
            $table->dateTime("fecha_ingreso");
            $table->dateTime("fecha_salida");
            $table->boolean("estado");
            $table->string("placa_veh", 7);
            $table->integer("documento_vig")->unsigned();
            $table->foreign("placa_veh")->references("placa")->on("vehiculos");
            $table->foreign("documento_vig")->references("documento")->on("vigilantes");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros');
    }
}
