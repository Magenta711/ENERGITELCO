<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralAirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general__airs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('maintenance_id');
            $table->string('revisor')->nullable();
            $table->string('tecnico')->nullable();
            $table->text('dates_a_a')->nullable();
            $table->text('temp')->nullable();
            $table->text('compresor')->nullable();
            $table->text('unidad')->nullable();
            $table->text('manejadora')->nullable();
            $table->text('actions')->nullable();
            $table->text('plan_mejora')->nullable();
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
        Schema::dropIfExists('general__airs');
    }
}
