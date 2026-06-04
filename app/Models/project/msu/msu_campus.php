<?php

namespace App\Models\project\msu;

use Illuminate\Database\Eloquent\Model;

class msu_campus extends Model
{

    protected $table = 'msu_campuses';

    protected $fillable = [
        'id_sede',
        'dep',
        'mun',
        'region',
        'population',
        'site_name',
        'lat',
        'long',
        'locate',
        'structure',
        'plants_amount',
        'OT',
    ];

}
