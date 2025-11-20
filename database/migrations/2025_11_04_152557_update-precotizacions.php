<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePrecotizacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items_precotizacions', function (Blueprint $table) {
            $table->float('potenciaPanel')->nullable()->default(0.63)->after('usd');
            $table->float('margenError')->nullable()->default(0.9)->after('potenciaPanel');
            $table->float('alturaPanel')->nullable()->after('margenError');
            $table->string('trasiego')->nullable()->after('alturaPanel');
            $table->string('distanPuntos')->nullable()->after('trasiego');
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
