<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlujosPrecotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flujos_precotizacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('precotizacion_id');
            $table->integer('item');
            $table->string('hito');
            $table->decimal('inversion', 15,2);
            $table->string('typeInversion');
            $table->string('avance');
            $table->integer('valor');
            $table->timestamps();

            $table->foreign('precotizacion_id')
                ->references('id')->on('precotizacions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flujos_precotizacions');
    }
}
