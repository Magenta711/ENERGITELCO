<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSolarKits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('solar_kits', function (Blueprint $table) {
            $table->json('price_install')->nullable()->after('price');
            $table->json('price_transporte')->nullable()->after('price_install');
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
