<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->string("placa", 7)->primary();
            $table->string("tipo", 20);
            $table->string("marca", 25);
            $table->string("linea", 20);
            $table->smallInteger("modelo")->unsigned();
            $table->string("servicio", 20)->nullable();
            $table->tinyInteger("cilindraje")->unsigned()->nullable();
            $table->string("chasis", 20)->nullable();
            $table->string("motor", 20)->nullable();
            $table->string("color", 25);
            $table->string("tipo_carroceria", 20)->nullable();
            $table->integer("documento_pro")->unsigned();
            $table->foreign("documento_pro")->references("documento")->on("propietarios");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
