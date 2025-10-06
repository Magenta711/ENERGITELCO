<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimulacionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulacion_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cotizacion_id');
            $table->string('Operador')->nullable();
            $table->string('PromProduccion')->nullable();
            $table->string('PromProduccionAnual')->nullable();
            $table->json('kwh_ipc')->nullable();
            $table->json('factor_potencia')->nullable();
            $table->foreign('cotizacion_id')->references('id')->on('cotizaciones')->onDelete('cascade');
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
        Schema::dropIfExists('simulacion_items');
    }
}
