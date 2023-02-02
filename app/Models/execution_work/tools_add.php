<?php

namespace App\Models\execution_work;

use Illuminate\Database\Eloquent\Model;

class tools_add extends Model
{
    protected $table = "tools_adds";

    protected $fillable = [
        'kit_id',
        'id_asignado',
        'nombre',
        'cantidad',
        'marca',
        'Observaciones'
    ];
}
