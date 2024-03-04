<?php

namespace App\Models\project\Mintic\inventory;

use Illuminate\Database\Eloquent\Model;

class EquipmentSimple extends Model
{
    protected $table = 'equipment_simples';

    protected $fillable = [
        'name',
        'status',
    ];
}
