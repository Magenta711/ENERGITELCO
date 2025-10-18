<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEnergySimulacionPrecotizacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('precotizacions', function (Blueprint $table) {
            $table->unsignedBigInteger('responsable_id')->after('status');
            $table->string('telefeno_responsable')->after('responsable_id');
            $table->string('direccion_responsable')->after('telefeno_responsable');
            $table->string('email')->after('direccion_responsable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('precotizacions', function (Blueprint $table) {
            //
        });
    }
}
