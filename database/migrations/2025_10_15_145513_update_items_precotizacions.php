<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateItemsPrecotizacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items_precotizacions', function (Blueprint $table) {
            $table->string('fecha_oferta')->nullable()->after('validez_oferta');
            $table->string('fin_oferta')->nullable()->after('fecha_oferta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items_precotizacions', function (Blueprint $table) {
            //
        });
    }
}
