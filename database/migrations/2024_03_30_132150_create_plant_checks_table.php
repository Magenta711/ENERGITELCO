<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlantChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_checks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('maintenance_id');
            $table->unsignedBigInteger('plant_id');

            $table->text('slpe');
            $table->text('scpe');
            $table->text('sa');
            $table->text('srpe');
            $table->text('seape');
            $table->text('semoceo');
            $table->text('gme');
            $table->text('mc');
            $table->text('ta');
            $table->text('prueba_realizada');

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
        Schema::dropIfExists('plant_checks');
    }
}
