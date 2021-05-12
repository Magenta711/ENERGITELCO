<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('approve_id');
            $table->unsignedBigInteger('responsable_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->double('total_pay_admin',10,2);
            $table->double('total_pay_drive',10,2);
            $table->double('total_pay',10,2);
            $table->string('status');
            $table->integer('total_employees');
            $table->string('date');
            
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
        Schema::dropIfExists('bonuses');
    }
}
