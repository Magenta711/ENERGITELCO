<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversAccidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers_accidents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('city');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('zone');
            $table->text('details')->nullable();
            $table->unsignedBigInteger('driver_id');
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
        Schema::dropIfExists('drivers_accidents');
    }
}
