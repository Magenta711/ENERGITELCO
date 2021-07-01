<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvEquipmmentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('inventaryble');
            $table->integer('tickets');
            $table->unsignedBigInteger('user_id');
            $table->integer('departures');
            $table->integer('stock');
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
        Schema::dropIfExists('inv_users');
    }
}
