<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_generals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('maintenance_id');

            $table->string('name_base')->nullable();
            $table->string('location')->nullable();
            $table->string('leadership')->nullable();

            $table->string('zone')->nullable();
            $table->string('modus')->nullable();
            $table->string('structure')->nullable();
            $table->string('order_work')->nullable();
            $table->string('site_owner')->nullable();
            $table->string('amount_plant')->nullable();
            $table->string('region')->nullable();


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
        Schema::dropIfExists('plant_generals');
    }
}
