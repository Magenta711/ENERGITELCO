<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('Nombre');
            $table->string('Correo');
            $table->integer('Telefono');
            $table->integer('CantidadKV');
            $table->integer('ValorKV');
            $table->integer('TotalConsumo');
            $table->string('Coordenadas')->nullable();
            $table->string('Salva');
            $table->strimg('ValorTotal');
            
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
        Schema::dropIfExists('quotes');
    }
}
