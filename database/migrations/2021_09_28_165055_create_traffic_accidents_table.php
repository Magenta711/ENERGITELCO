<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrafficAccidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traffic_accidents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('event')->nullable();
            $table->string('route')->nullable();
            $table->unsignedBigInteger('responsable_id')->nullable();
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->string('other_vehicle')->nullable();
            $table->string('position')->nullable();
            $table->string('who')->nullable();
            $table->string('time_driven')->nullable();
            $table->string('success')->nullable();
            $table->string('body_part')->nullable();
            $table->string('type_lession')->nullable();
            $table->string('days_disabled')->nullable();
            $table->string('mortal')->nullable();
            $table->string('num_victims')->nullable();
            $table->string('affected_third_parties')->nullable();
            $table->string('num_victims2')->nullable();
            $table->string('actions')->nullable();
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
        Schema::dropIfExists('traffic_accidents');
    }
}
