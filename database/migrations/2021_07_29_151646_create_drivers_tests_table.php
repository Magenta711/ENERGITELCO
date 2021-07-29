<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('type');
            $table->string('result');
            $table->text('commentary')->nullable();
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
        Schema::dropIfExists('drivers_tests');
    }
}
