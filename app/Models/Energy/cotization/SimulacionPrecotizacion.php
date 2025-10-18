<?php

namespace App\models\energy\cotization;

use Illuminate\Database\Eloquent\Model;

class SimulacionPrecotizacion extends Model
{
    protected $table = 'simulacion_precotizacions';
    protected $fillable = [
        'precotizacion_id',
        'Operador',
        'PromProduccion',
        'PromProduccionAnual',
        'PromedioCO2',
        'kwh_ipc',
        'factor_potencia',
        'Equipos'
    ];

    protected $casts = [
        'kwh_ipc' => 'array',
        'factor_potencia' => 'array',
        'Equipos' => 'array',
    ];

    public function cotizacion()
    {
        return $this->belongsTo(Precotizacion::class, 'precotizacion_id');
    }
}
