<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('responsable_id');
            $table->unsignedBigInteger('approve_id')->nullable();

            $table->double('salary',10,2);
            $table->double('assistance',10,2);
            $table->date('date_start');
            $table->date('date_end');
            
            $table->double('days_linked_vacation',10,2);
            $table->double('vacation_days_to_pay',10,2);
            $table->double('vacation',10,2);
            $table->double('total_vacation_days_to_pay',10,2);
            $table->double('premium_payment_days',10,2);
        
            $table->double('total_devengado_salary',10,2);
            $table->double('total_devengado_extras',10,2);
            $table->double('total_devengado_assistance',10,2);
        
            $table->double('average_salary',10,2);
            $table->double('average_extras',10,2);
            $table->double('average_assistance',10,2);
            $table->double('average_last_month_salary',10,2);
        
            $table->double('average_last_month_extras',10,2);
            $table->double('average_last_month_assistance',10,2);
            $table->double('average_premium_salary',10,2);
        
            $table->double('average_premium_extras',10,2);
            $table->double('average_premium_assistance',10,2);
            $table->double('total_linkend',10,2);
        
            $table->double('intereses',10,2);
            $table->double('total_premium',10,2);
            $table->double('total_vacation',10,2);
            $table->double('this_salary',10,2);
            $table->double('compensation',10,2);
            $table->double('debt',10,2);
            $table->double('total_settlement',10,2);

            $table->boolean('status')->default(0);
            $table->text('commentary');
        
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
        Schema::dropIfExists('settlements');
    }
}
