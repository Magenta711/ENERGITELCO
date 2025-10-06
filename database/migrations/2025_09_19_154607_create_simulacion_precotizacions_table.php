<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimulacionPrecotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulacion_precotizacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('precotizacion_id');
            $table->string('Operador')->nullable();
            $table->string('PromProduccion')->nullable();
            $table->string('PromProduccionAnual')->nullable();
            $table->json('kwh_ipc')->nullable();
            $table->json('factor_potencia')->nullable();
            $table->foreign('precotizacion_id')->references('id')->on('precotizacions')->onDelete('cascade');
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
        Schema::dropIfExists('simulacion_precotizacions');
    }
}
