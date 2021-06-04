<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImprovementActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('improvement_actions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->string('process');
            $table->string('num');
            $table->string('by');
            $table->string('type');
            $table->string('effect_description');
            $table->string('infraestructure')->nullable();
            $table->string('human_talent')->nullable();
            $table->string('information')->nullable();
            $table->string('measuring')->nullable();
            $table->string('environment')->nullable();
            $table->string('method')->nullable();
            $table->string('cause')->nullable();
            $table->string('commentary')->nullable();
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
        Schema::dropIfExists('improvement_actions');
    }
}
