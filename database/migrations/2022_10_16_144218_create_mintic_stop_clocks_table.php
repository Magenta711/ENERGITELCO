<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinticStopClocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mintic_stop_clocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->integer('num');
            $table->date('date');
            $table->string('collaborating_company');

            $table->string('responsable_id');
            $table->string('responsable_name');
            $table->string('responsable_position');
            $table->string('responsable_document');
            $table->string('responsable_number');
            $table->string('responsable_email');

            $table->dateTime('cause_1_date_init');
            $table->dateTime('cause_1_date_finilly');
            $table->integer('cause_1_num');
            $table->dateTime('cause_2_date_init');
            $table->dateTime('cause_2_date_finilly');
            $table->integer('cause_2_num');
            $table->dateTime('cause_3_date_init');
            $table->dateTime('cause_3_date_finilly');
            $table->integer('cause_3_num');
            $table->dateTime('cause_4_date_init');
            $table->dateTime('cause_4_date_finilly');
            $table->integer('cause_4_num');
            $table->dateTime('cause_5_date_init');
            $table->dateTime('cause_5_date_finilly');
            $table->integer('cause_5_num');
            $table->dateTime('cause_6_date_init');
            $table->dateTime('cause_6_date_finilly');
            $table->integer('cause_6_num');
            $table->dateTime('cause_7_date_init');
            $table->dateTime('cause_7_date_finilly');
            $table->integer('cause_7_num');
            $table->dateTime('cause_8_date_init');
            $table->dateTime('cause_8_date_finilly');
            $table->integer('cause_8_num');
            $table->dateTime('cause_9_date_init');
            $table->dateTime('cause_9_date_finilly');
            $table->integer('cause_9_num');
            $table->dateTime('cause_10_date_init');
            $table->dateTime('cause_10_date_finilly');
            $table->integer('cause_10_num');
            $table->dateTime('cause_11_date_init');
            $table->dateTime('cause_11_date_finilly');
            $table->integer('cause_11_num');
            $table->dateTime('cause_12_date_init');
            $table->dateTime('cause_12_date_finilly');
            $table->integer('cause_12_num');
            $table->dateTime('cause_13_date_init');
            $table->dateTime('cause_13_date_finilly');
            $table->integer('cause_13_num');
            $table->dateTime('cause_14_date_init');
            $table->dateTime('cause_14_date_finilly');
            $table->integer('cause_14_num');
            $table->dateTime('cause_15_date_init');
            $table->dateTime('cause_15_date_finilly');
            $table->integer('cause_15_num');
            $table->dateTime('cause_16_date_init');
            $table->dateTime('cause_16_date_finilly');
            $table->integer('cause_16_num');
            $table->dateTime('cause_17_date_init');
            $table->dateTime('cause_17_date_finilly');
            $table->integer('cause_17_num');
            $table->dateTime('cause_18_date_init');
            $table->dateTime('cause_18_date_finilly');
            $table->integer('cause_18_num');
            $table->dateTime('cause_19_date_init');
            $table->dateTime('cause_19_date_finilly');
            $table->integer('cause_19_num');
            $table->dateTime('cause_20_date_init');
            $table->dateTime('cause_20_date_finilly');
            $table->integer('cause_20_num');

            $table->text('description_1');
            $table->text('description_2');
            $table->text('description_3');
            $table->text('description_4');

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
        Schema::dropIfExists('mintic_stop_clocks');
    }
}
