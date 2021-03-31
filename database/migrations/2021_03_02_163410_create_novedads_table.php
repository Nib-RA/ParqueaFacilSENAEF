<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedads', function (Blueprint $table) {
            $table->increments("id");
            $table->string("tipo", 25);
            $table->text("descripcion");
            $table->integer("numero_ticket_reg")->unsigned();
            $table->foreign("numero_ticket_reg")->references("numero_ticket")->on("registros");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novedads');
    }
}
