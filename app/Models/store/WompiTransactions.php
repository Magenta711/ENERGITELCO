<?php

namespace App\Models\store;

use Illuminate\Database\Eloquent\Model;

class WompiTransactions extends Model
{
        protected $table = 'wompi_transactions';

        protected $fillable = [
        'transaction_id',
        'amount_in_cents',
        'reference',
        'customer_email',
        'currency',
        'payment_method_type',
        'status',
        'signature',
        'environment',
        'wompi_timestamp',
        'sent_at',
        'raw_payload',
    ];

    protected $casts = [
        'signature' => 'array',
        'raw_payload' => 'array',
        'wompi_timestamp' => 'datetime',
        'sent_at' => 'datetime',
    ];
}
