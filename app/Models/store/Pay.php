<?php

namespace App\Models\store;

use App\Models\ClientsUsers\Clients;
use App\Models\SolarProducts;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $table = 'pays';

    protected $fillable = ['reference', 'transaction_id', 'id_client', 'products', 'valor', 'collect', 'locate', 'status', 'reserva_created', 'expiration_date'];

    protected $casts = [
        'products' => 'array',
        'expiration_date' => 'datetime',
    ];

    public function client()
    {
        return $this->hasOne(Clients::class, 'id', 'id_client');
    }

    public function checkexpiration()
    {
        if ($this->expiration_date && $this->expiration_date->isPast() && $this->status !== 'expirado') {
            foreach ($this->products as $product) {
                $solarProduct = SolarProducts::find('id', $product['id']);
                if ($solarProduct) {
                    $solarProduct->status = 1;
                    $solarProduct->save();
                }
            }

            $this->status = 'expirado';
            $this->save();
        }
    }
}
