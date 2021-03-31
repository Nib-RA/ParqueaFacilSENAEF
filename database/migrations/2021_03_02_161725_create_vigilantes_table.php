<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVigilantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vigilantes', function (Blueprint $table) {
            $table->integer("documento")->unsigned()->primary();
            $table->string("nombres", 50);
            $table->string("turno", 10);
            $table->string("rol", 25);
            $table->string("contrasena", 50);
            $table->integer("documento_adm")->unsigned();
            $table->foreign("documento_adm")->references("documento")->on("administradors");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vigilantes');
    }
}
