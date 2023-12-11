<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReceivesIdMinticMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mintic_maintenances', function (Blueprint $table) {
            $table->unsignedBigInteger('receives_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mintic_maintenances', function (Blueprint $table) {
            //
        });
    }
}
