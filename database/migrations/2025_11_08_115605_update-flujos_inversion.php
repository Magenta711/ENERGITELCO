<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFlujosInversion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flujos_precotizacions', function (Blueprint $table) {
            $table->string('rubro')->nullable()->default('ADQUISICIÓN DE EQUIPOS')->after('avance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flujos_precotizacions', function (Blueprint $table) {
            //
        });
    }
}
