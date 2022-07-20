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
        Schema::create('registrosalidas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->biginteger("herramientas_id")->unsigned()->nullable();
            $table->biginteger("empleados_id")->unsigned()->nullable();
            $table->dateTime("FechaSalida");
            $table->dateTime("FechaEntrada")->nullable();
            $table->char("ObservacionesSalida");
            $table->char("ObservacionesEntrada")->nullable();
            $table->char("Ubicacion")->nullable();
            $table->boolean("EstadoRegistro")->default(0);
            $table->timestamps();
            $table->softDeletesTz();
            $table->foreign("herramientas_id")->references("id")->on("herramientas")->onUpdate("cascade")->onDelete("SET NULL");
            $table->foreign("empleados_id")->references("id")->on("empleados")->onUpdate("cascade")->onDelete("SET NULL");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrosalidas');
    }
};
