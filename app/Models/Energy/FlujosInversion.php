<?php

namespace App\models\energy;

use Illuminate\Database\Eloquent\Model;

class FlujosInversion extends Model
{
    protected $table = 'flujos_inversion';
    protected $fillable = [
        'cotizacion_id',
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
        return $this->belongsTo(cotizaciones::class, 'cotizacion_id');
    }
}
