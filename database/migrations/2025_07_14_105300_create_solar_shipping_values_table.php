<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolarShippingValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solar_shipping_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('base');
            $table->integer('kilos_adicionales');
            $table->integer('valor_kilos_adic');
            $table->integer('porcentaje_aumentado');
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
        Schema::dropIfExists('solar_shipping_values');
    }
}
