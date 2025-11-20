<?php

namespace App\models\energy\cotization;

use Illuminate\Database\Eloquent\Model;

class FlujosPrecotizacion extends Model
{
    protected $table = 'flujos_precotizacions';
    protected $fillable = [
        'precotizacion_id',
        'item',
        'hito',
        'inversion',
        'typeInversion',
        'avance',
        'rubro',
        'valor',
        'total'
    ];

    public function cotizacion()
    {
        return $this->belongsTo(Precotizacion::class, 'precotizacion_id');
    }
}
