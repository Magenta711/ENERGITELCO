<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralStrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_strains', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('maintenance_id');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('update_id');
            $table->string('revisor')->nullable();
            $table->string('tecnico')->nullable();
            $table->text('transformador')->nullable();
            $table->text('contador')->nullable();
            $table->text('conductor')->nullable();
            $table->text('tablero')->nullable();
            $table->text('protectores')->nullable();
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
        Schema::dropIfExists('general_strains');
    }
}
