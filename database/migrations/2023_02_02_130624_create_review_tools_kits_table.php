<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewToolsKitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_tools_kits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_review');
            $table->unsignedBigInteger('id_kit');
            $table->unsignedBigInteger('id_tool');
            $table->string('estado',20);
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
        Schema::dropIfExists('review_tools_kits');
    }
}
