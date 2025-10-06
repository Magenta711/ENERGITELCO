<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreciosPrecotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios_precotizacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('precotizacion_id');
            $table->string('codigo');
            $table->integer('item');
            $table->string('descripcion');
            $table->string('typeInversion');
            $table->integer('usd');
            $table->integer('cop');
            $table->integer('cantidad')->default(1);
            $table->decimal('total');
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
        Schema::dropIfExists('precios_precotizacions');
    }
}
