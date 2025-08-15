<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSolarKit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solar_kits', function (Blueprint $table) {
            $table->integer('alto')->nullable()->after('status');
            $table->integer('ancho')->nullable()->after('alto');
            $table->integer('largo')->nullable()->after('ancho');
            $table->integer('peso')->nullable()->after('largo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('solar_kits', function (Blueprint $table) {
            //
        });
    }
}
