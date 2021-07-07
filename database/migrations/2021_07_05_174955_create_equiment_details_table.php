<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquimentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equiment_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sap');
            $table->string('name');
            $table->integer('tickets')->default(0);
            $table->integer('departures')->default(0);
            $table->integer('stock')->default(0);
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
        Schema::dropIfExists('equiment_details');
    }
}
