<?php

namespace App\Models\Energy;

use Illuminate\Database\Eloquent\Model;

class SolarShippingValue extends Model
{
     protected $table = "solar_shipping_values";
    protected $fillable = [
        'base',
        'kilos_adicionales',
        'valor_kilos_adic',
        'porcentaje_aumentado',
    ];
}
