<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charge_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token')->null();
            $table->string('city')->nullable();
            $table->string('date');
            $table->string('name')->nullable();
            $table->string('document')->nullable();
            $table->string('concept')->nullable();
            $table->string('value')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('type_bank_account')->nullable();
            $table->string('email')->nullable();
            $table->string('signature_id')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('charge_accounts');
    }
}
