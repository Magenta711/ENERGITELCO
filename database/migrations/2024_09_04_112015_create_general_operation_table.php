<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralOperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_operation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('maintenance_id');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('update_id');
            $table->string('revisor')->nullable();
            $table->string('tecnico')->nullable();
            $table->string('empresa');
            $table->date('fechaElaboracion');
            $table->string('fotos');
            $table->text('general')->nullable();
            $table->text('activity')->nullable();
            $table->text('findings')->nullable();
            $table->text('transport')->nullable();
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
        Schema::dropIfExists('general_operation');
    }
}
