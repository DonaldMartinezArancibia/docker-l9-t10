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
        Schema::create('herramientas', function (Blueprint $table) {
            $table->engine="InnoDB";
            $table->bigIncrements('id');
            $table->char("IdInterno");
            $table->char("Serie");
            $table->char("Nombre");
            $table->char("Modelo");
            $table->char("Categoria");
            $table->char("Proovedor")->nullable();
            $table->char("Factura");
            $table->dateTime("FechaCompra")->nullable();
            $table->boolean("Estado")->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('herramientas');
    }
};
