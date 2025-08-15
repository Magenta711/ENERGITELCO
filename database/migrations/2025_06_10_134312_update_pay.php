<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pays', function (Blueprint $table) {
            $table->string('reference')->nullable();
            $table->string('transaction_id')->nullable();
            $table->bigInteger('id_client')->nullable();
            $table->string('products')->nullable();
            $table->integer('valor')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('reserva_created')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pays', function (Blueprint $table) {
            //
        });
    }
}
