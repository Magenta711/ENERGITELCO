<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolarProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tipo, cantidad, modelo, serie, potencia, price, garantia, description, urlFile, status, id_comprador,

        Schema::create('solar_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_buyer');
            $table->integer('amount');
            $table->string('type');
            $table->string('model');
            $table->string('serie');
            $table->string('power');
            $table->string('warranty');
            $table->text('description');
            $table->string('urlFile');
            $table->integer('status');

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
        Schema::dropIfExists('solar_products');
    }
}
