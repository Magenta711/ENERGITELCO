<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('energy_cotizacion_precios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cotizacion_id');
            $table->string('descripcion');
            $table->decimal('valor', 15,2)->nullable();
            $table->integer('cantidad')->default(1);
            $table->decimal('total', 15,2)->nullable();
            $table->timestamps();

            // Definición de la llave foránea
            $table->foreign('cotizacion_id')
                ->references('id')->on('cotizaciones')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('precios');
    }
}
