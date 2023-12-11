<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewKitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_kits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_review');//Id de revisión
            $table->unsignedBigInteger('id_kit');
            $table->text('comentario')->nullable();
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
        Schema::dropIfExists('review_kits');
    }
}
