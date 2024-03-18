<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinticInstallationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mintic_installations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('project_id');
            $table->datetime('date')->nullable();
            $table->string('group_install')->nullable();
            $table->string('depatment')->nullable();
            $table->string('municpality')->nullable();
            $table->string('population')->nullable();
            $table->string('name')->nullable();
            $table->string('long')->nullable();
            $table->string('lat')->nullable();
            $table->string('height')->nullable();
            $table->string('code')->nullable();
            $table->string('dane_depa')->nullable();
            $table->string('dane_muni')->nullable();
            $table->string('dane_centro')->nullable();
            $table->string('dane_sede')->nullable();
            $table->string('responsable_name')->nullable();
            $table->string('responsable_dni')->nullable();
            $table->string('responsable_number')->nullable();
            $table->string('responsable_email')->nullable();
            $table->text('fault_description')->nullable();
            $table->unsignedBigInteger('repair_id');
            $table->string('repair_name')->nullable();
            $table->string('repair_position')->nullable();
            $table->string('repair_cc')->nullable();
            $table->string('repair_tel')->nullable();
            $table->string('repair_mail')->nullable();
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('mintic_installations');
    }
}
