<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_tools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_asignado');
            $table->unsignedBigInteger('id_revisor');
            $table->date('fecha_revision');
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
        Schema::dropIfExists('review_tools');
    }
}
