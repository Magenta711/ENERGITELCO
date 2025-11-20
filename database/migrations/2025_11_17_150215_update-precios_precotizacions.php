<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePreciosPrecotizacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('simulacion_items', function (Blueprint $table) {
            $table->string('FormulaValor3')->nullable()->after('Equipos');
            $table->string('FormulaValor4')->nullable()->after('FormulaValor3');
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
