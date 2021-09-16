<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('responsable_id');
            $table->integer('total_employees');
            $table->string('estado',20);
            $table->date('date');
            $table->date('start_date');
            $table->date('end_date');
            $table->double('total_pay',10,2);
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
        Schema::dropIfExists('premia');
    }
}
