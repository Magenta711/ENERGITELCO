<?php

namespace App\Models\execution_work;

use Illuminate\Database\Eloquent\Model;

class tools extends Model
{
    protected $table = "tools";

    protected $fillable = [
        'kit_id',
        'nombre',
        'cantidad',
        'marca',
        'Observaciones'
    ];
}
