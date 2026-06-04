<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invVehicleReport extends Model
{
    protected $fillable = ['vehicle_id','date','place','area','type'];
}
