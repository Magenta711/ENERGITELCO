<?php

namespace App\Models\project\msu;

use Illuminate\Database\Eloquent\Model;

class plant_resultado extends Model
{
    protected $table = 'plant_resultados'; // Replace with your actual table name

    protected $fillable = [
        'maintenance_id',
        'plant_id',
        'cheque_aceite',
        'cambio_filtro_aire',
        'cambio_filtro_combustible',
        'cambio_filtro_aceite',
        'cambio_maguera',
        'cambio_refrigerante',
        'cambio_bateria'
    ];
}
