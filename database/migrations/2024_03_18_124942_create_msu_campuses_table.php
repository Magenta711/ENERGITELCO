<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMsuCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msu_campuses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('id_sede');
            $table->string('dep');
            $table->string('mun');
            $table->string('region');
            $table->string('population');
            $table->string('site_name');
            $table->string('lat');
            $table->string('long');
            $table->string('locate');
            $table->string('structure');
            $table->string('plants_amount');
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
        Schema::dropIfExists('msu_campuses');
    }
}
