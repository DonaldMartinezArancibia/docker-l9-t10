<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registroentradas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->biginteger("herramientas_id")->unsigned();
            $table->biginteger("empleados_id")->unsigned();
            $table->dateTime("FechaEntrada");
            $table->char("Observaciones");
            $table->timestamps();
            $table->foreign("herramientas_id")->references("id")->on("herramientas")->onUpdate('cascade');
            $table->foreign("empleados_id")->references("id")->on("empleados")->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registroentradas');
    }
};
