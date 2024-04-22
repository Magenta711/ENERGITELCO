<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_lands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('maintenance_id');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('update_id');
            $table->string('revisor')->nullable();
            $table->string('tecnico')->nullable();
            $table->text('instrumento')->nullable();
            $table->text('proteccion')->nullable();
            $table->text('pararrayos')->nullable();
            $table->text('medicion')->nullable();
            $table->text('medicion_resistencia')->nullable();
            $table->string('observaciones')->nullable();
            $table->text('check')->nullable();
            $table->string('plan_mejora')->nullable();

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
        Schema::dropIfExists('general_lands');
    }
}
