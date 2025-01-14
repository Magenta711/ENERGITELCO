<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolarProducts extends Model
{
    protected $table = "solar_products";
    protected $fillable = ['id_buyer', 'cod_product', 'amount','type', 'model', 'serie', 'price', 'power', 'warranty', 'description', 'urlFile','status'];

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }
}
