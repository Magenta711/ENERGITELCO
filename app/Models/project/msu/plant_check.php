<?php

namespace App\Models\project\msu;

use Illuminate\Database\Eloquent\Model;

class plant_check extends Model
{
    protected $table = 'plant_checks'; // Replace "your_table_name" with the actual table name


    protected $fillable = [
        'maintenance_id',
        'plant_id',
        'slpe',
        'scpe',
        'sa',
        'srpe',
        'seape',
        'semoceo',
        'gme',
        'mc',
        'ta',
        'prueba_realizada'
    ];
}
