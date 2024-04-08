<?php

namespace App\Models\project\msu;

use Illuminate\Database\Eloquent\Model;

class plant_general extends Model
{
    protected $table = 'plant_generals';

    protected $fillable = [
        'maintenance_id',
        'name_base',
        'location',
        'leadership',
        'zone',
        'modus',
        'structure',
        'order_work',
        'site_owner',
        'amount_plant',
        'region'
    ];

}
