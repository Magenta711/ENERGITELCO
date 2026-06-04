<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnergyValues extends Model
{

    protected $table = 'energy_values';

    protected $fillable = [
        'ModelPanel',
        'ValorPanel',
        'GarantiaPanel',
        'ModelRegulador',
        'ValorRegulador',
        'GarantiaRegulador',
        'ModelBateria',
        'ValorBateria',
        'GarantiaBateria',
        'ModelInversor',
        'ValorInversor',
        'GarantiaInversor',
    ];
}
