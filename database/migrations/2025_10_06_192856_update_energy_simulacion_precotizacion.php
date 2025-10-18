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
        Schema::table('simulacion_items', function (Blueprint $table) {
            $table->string('PromedioCO2')->nullable()->default(28940)->after('PromProduccionAnual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('simulacion_items', function (Blueprint $table) {
            //
        });
    }
}
