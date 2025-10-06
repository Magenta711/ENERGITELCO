<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('objetivo_proyecto')->nullable();
            $table->text('descripcion_proyecto')->nullable();
            $table->integer('validez_oferta')->nullable();
            $table->string('polizas')->nullable();
            $table->integer('garantia_equipos')->nullable();
            $table->integer('garantia_celdas')->nullable();
            $table->integer('garantia_materiales')->nullable();
            $table->string('verificacion_sistema')->nullable();
            $table->integer('nivel_sst')->nullable();
            $table->string('mantenimiento')->nullable();
            $table->text('nota_importante')->nullable();
            $table->decimal('iva')->nullable();
            $table->decimal('valor_kw')->nullable();
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
        Schema::dropIfExists('cotizaciones');
    }
}
