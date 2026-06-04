<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invVehicleMtt extends Model
{
    protected $fillable = ['vehicle_id','last_ch','last_ws','last_val','type'];
}
