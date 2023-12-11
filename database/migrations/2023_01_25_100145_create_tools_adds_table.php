<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToolsAddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools_adds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_assignado');
            $table->string('nombre', 100);
            $table->integer('cantidad');
            $table->string('marca', 100)->nullable();
            $table->text('Observaciones')->nullable();
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
        Schema::dropIfExists('tools_adds');
    }
}
