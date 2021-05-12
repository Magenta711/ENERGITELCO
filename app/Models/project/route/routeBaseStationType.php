<?php

namespace App\Models\project\route;

use Illuminate\Database\Eloquent\Model;

class routeBaseStationType extends Model
{
    protected $table = 'route_base_station_types';
    protected $fillable = ['eb_id','type','nemonico','reference','slot','port'];
    protected $guarder = ['id'];
}
