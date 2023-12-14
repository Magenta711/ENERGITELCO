<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //texto
    //fechas
    //numeros
    //relaciones
    //
    //

    public function up()
    {
        Schema::create('Kits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('responsable_id');
            $table->string('nombre' , 100);
            $table->string('nombre_original');
            $table->integer('cantidad');
            $table->unsignedBigInteger('estado_id');
            $table->string('codigo', 20)->nullable();
            $table->integer('cantidad_herramientas')->nullable();
            $table->string('token', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kits');
    }
}
