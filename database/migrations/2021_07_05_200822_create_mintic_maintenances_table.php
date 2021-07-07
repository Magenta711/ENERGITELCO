<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinticMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mintic_maintenances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->string('num');
            $table->date('date');
            $table->string('collaborating_company');
            $table->string('department');
            $table->string('municpality');
            $table->string('population');
            $table->string('name');
            $table->string('code');
            $table->string('responsable_name');
            $table->string('responsable_number');
            $table->string('responsable_email');
            $table->string('fault_description');
            $table->string('receives_name');
            $table->string('receives_position');
            $table->string('receives_cc');
            $table->string('receives_tel');
            $table->string('receives_mail');
            $table->string('repair_name');
            $table->string('repair_position');
            $table->string('repair_cc');
            $table->string('repair_tel');
            $table->string('repair_mail');
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
        Schema::dropIfExists('mintic_maintenances');
    }
}
