<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEnergyCotizacionPrecios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('energy_cotizacion_precios', function (Blueprint $table) {
            $table->string('typeInversion')->nullable()->after('descripcion'); // Nuevo campo para el tipo de inversión
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('energy_cotizacion_precios', function (Blueprint $table) {
            //
        });
    }
}
