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
            $table->biginteger("categorias_id")->unsigned()->nullable();
            $table->char("Proveedor")->nullable();
            $table->char("Factura");
            $table->date("FechaCompra")->nullable();
            $table->char("Foto")->nullable();
            $table->boolean("Estado")->default(1);
            $table->timestamps();
            $table->softDeletesTz();
            $table->foreign("categorias_id")->references("id")->on("categorias")->onUpdate("cascade")->onDelete("SET NULL");
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
