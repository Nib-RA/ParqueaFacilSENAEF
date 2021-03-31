<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propietarios', function (Blueprint $table) {
            $table->integer("documento")->unsigned()->primary();
            $table->string("tipo_documento", 20);
            $table->string("nombres", 50);
            $table->string("apellidos", 50);
            $table->string("direccion", 150);
            $table->string("telefono", 25)->nullable();
            $table->string("correo", 50)->nullable();
            $table->dateTime("fecha_nacimiento");
            $table->char("genero");
            $table->string("cargo", 20);
            $table->string("tipo_licencia", 5);
            $table->integer("numero_licencia")->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propietarios');
    }
}
