<?php

namespace App\models\energy;

use Illuminate\Database\Eloquent\Model;

class simulacionItems extends Model
{
    protected $table = 'simulacion_items';
    protected $fillable = [
        'cotizacion_id',
        'Operador',
        'PromProduccion',
        'PromProduccionAnual',
        'PromedioCO2',
        'kwh_ipc',
        'factor_potencia',
        'Equipos',
        'FormulaValor3',
        'FormulaValor4',
    ];

    protected $casts = [
        'kwh_ipc' => 'array',
        'Equipos' => 'array',
        'factor_potencia' => 'array',
    ];

    public function cotizacion()
    {
        return $this->belongsTo(cotizaciones::class, 'cotizacion_id');
    }
}
