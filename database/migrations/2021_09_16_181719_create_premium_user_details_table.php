<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiumUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('premium_user_id');
            $table->integer('month');
            $table->double('salary_month',10,2)->default(0);
            $table->double('extras_month',10,2)->default(0);
            $table->double('assistance_month',10,2)->default(0);

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
        Schema::dropIfExists('premium_user_details');
    }
}
