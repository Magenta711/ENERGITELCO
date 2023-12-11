<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewToolAddKitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_tool_add_kits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_review');
            $table->unsignedBigInteger('id_tool_add');
            $table->unsignedBigInteger('id_kit');
            $table->string('estado');
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
        Schema::dropIfExists('review_tool-add_kits');
    }
}
