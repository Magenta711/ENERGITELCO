<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('responsable_id');
            $table->dateTime('date_start');
            $table->string('municipality');
            $table->string('department');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('eb_id');
            $table->boolean('am');
            $table->boolean('pm');
            $table->text('description');
            $table->text('commentaries');
            $table->text('report');
            $table->boolean('status');
            
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
        Schema::dropIfExists('taskings');
    }
}
