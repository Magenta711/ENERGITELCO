<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bonus_id');
            $table->unsignedBigInteger('user_id');
            $table->double('value_bonus',10,2)->default(0);
            $table->boolean('admin_bonus_check')->default(0);
            $table->boolean('drive_bonus_check')->default(0);
            $table->boolean('na_check')->default(0);
            $table->integer('admin_1')->default(0);
            $table->integer('admin_2')->default(0);
            $table->integer('admin_3')->default(0);
            $table->integer('admin_4')->default(0);
            $table->integer('admin_5')->default(0);
            $table->integer('admin_6')->default(0);
            $table->integer('admin_7')->default(0);
            $table->integer('admin_8')->default(0);
            $table->integer('admin_9')->default(0);
            $table->integer('admin_10')->default(0);
            $table->integer('admin_11')->default(0);
            $table->integer('admin_12')->default(0);
            $table->integer('driver_1')->default(0);
            $table->integer('driver_2')->default(0);
            $table->double('percentage_admin',5,2)->default(0);
            $table->double('total_admin',10,2)->default(0);
            $table->double('total_dirver',10,2)->default(0);
            $table->double('total_user',10,2)->default(0);
            $table->text('commentary')->nullable();

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
        Schema::dropIfExists('bonus_users');
    }
}
