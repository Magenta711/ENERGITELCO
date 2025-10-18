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
        Schema::table('simulacion_precotizacions', function (Blueprint $table) {
            $table->string('PromedioCO2')->nullable()->default(28940)->after('PromProduccionAnual');
            $table->string('FabricacionCO2')->nullable()->after('PromedioCO2');
            $table->string('OperacionCO2')->nullable()->after('FabricacionCO2');
            $table->string('EnergiaCO2')->nullable()->after('OperacionCO2');
            $table->string('TotalCO2')->nullable()->after('EnergiaCO2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('simulacion_precotizacions', function (Blueprint $table) {
            //
        });
    }
}
