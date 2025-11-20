<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePreciosPrecotizacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('precios_precotizacions', function (Blueprint $table) {
            $table->string('unidad')->nullable()->after('descripcion')->default('UN');
            $table->string('exento')->nullable()->after('unidad')->default('NO');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('precios_precotizacions', function (Blueprint $table) {
            //
        });
    }
}
