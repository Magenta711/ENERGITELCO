<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_resultados', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('maintenance_id');
            $table->unsignedBigInteger('plant_id');

            $table->string('cheque_aceite');
            $table->string('cambio_filtro_aire');
            $table->string('cambio_filtro_combustible');
            $table->string('cambio_filtro_aceite');
            $table->string('cambio_maguera');
            $table->string('cambio_refrigerante');
            $table->string('cambio_bateria');

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
        Schema::dropIfExists('plant_resultados');
    }
}
