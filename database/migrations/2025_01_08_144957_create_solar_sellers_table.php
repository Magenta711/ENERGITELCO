<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolarSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solar_sellers', function (Blueprint $table) {
            $table->bigIncrements('id');
           $table->unsignedBigInteger('id_seller');
           $table->unsignedBigInteger('id_Client');
           $table->unsignedBigInteger('id_Product');
           $table->string('warranty');
           $table->string('valor');

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
        Schema::dropIfExists('solar_sellers');
    }
}
