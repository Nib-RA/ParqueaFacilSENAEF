<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConductorVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductor_vehiculos', function (Blueprint $table) {
            $table->id();
            $table->integer("documento_cond")->unsigned();
            $table->string("placa_veh", 7);
            $table->foreign("documento_cond")->references("documento")->on("conductors");
            $table->foreign("placa_veh")->references("placa")->on("vehiculos");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conductor_vehiculos');
    }
}
