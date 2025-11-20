<?php

namespace App\models\energy;

use Illuminate\Database\Eloquent\Model;

class EnergyCotizacionesPrecio extends Model
{
    protected $table = 'energy_cotizacion_precios';
      protected $fillable = [
        'cotizacion_id',
        'codigo',
        'item',
        'descripcion',
        'unidad',
        'exento',
        'typeInversion', // Nuevo campo para el tipo de inversión
        'panel',
        'usd',
        'cop',
        'cantidad',
        'total'
    ];

    // Relación: un precio pertenece a una cotización
    public function cotizacion()
    {
        return $this->belongsTo(cotizaciones::class, 'cotizacion_id');
    }
}
