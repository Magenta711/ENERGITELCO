<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWompiTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wompi_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Información básica de la transacción
            $table->string('transaction_id')->unique();
            $table->bigInteger('amount_in_cents');
            $table->string('reference')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('currency', 10)->nullable();
            $table->string('payment_method_type')->nullable();
            $table->string('status')->nullable();

            // Firma (signature)
            $table->json('signature')->nullable();

            // Información de ambiente y timestamps
            $table->string('environment')->nullable();
            $table->timestamp('wompi_timestamp')->nullable();
            $table->timestamp('sent_at')->nullable();

            // Guarda todo el payload por si necesitas trazabilidad
            $table->json('raw_payload')->nullable();

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
        Schema::dropIfExists('wompi_transactions');
    }
}
