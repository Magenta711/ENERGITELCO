<?php

namespace App\models\energy\cotization;

use Illuminate\Database\Eloquent\Model;

class PreciosPrecotizacion extends Model
{
    protected $table = 'precios_precotizacions';

    protected $fillable = [
        'precotizacion_id',
        'codigo',
        'item',
        'descripcion',
        'unidad',
        'exento',
        'typeInversion',
        'panel',
        'usd',
        'cop',
        'cantidad',
        'total'
    ];

    public function cotizacion()
    {
        return $this->belongsTo(Precotizacion::class, 'precotizacion_id');
    }
}
