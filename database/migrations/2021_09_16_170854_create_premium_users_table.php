<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiumUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('work_id');
            $table->unsignedBigInteger('user_id');
            $table->double('linked_days',10,2)->default(0);
            $table->double('license_days',10,2)->default(0);
            $table->double('settle_days',10,2)->default(0);
            $table->double('total_devengado_salary',10,2)->default(0);
            $table->double('total_devengado_extras',10,2)->default(0);
            $table->double('total_devengado_assistance',10,2)->default(0);
            $table->double('average_salary',10,2)->default(0);
            $table->double('average_extras',10,2)->default(0);
            $table->double('average_assistance',10,2)->default(0);
            $table->double('total_pay_user',10,2)->default(0);
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
        Schema::dropIfExists('premium_users');
    }
}
