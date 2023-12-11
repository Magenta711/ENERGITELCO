<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEspecialAndIsInformeEquimentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equiment_details', function (Blueprint $table) {
            $table->string('especial');
            $table->boolean('is_informe');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equiment_details', function (Blueprint $table) {
            //
        });
    }
}
