<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriversReport extends Model
{
    protected $fillable = ['date','city','vehicle_id','suject','observation','driver_id'];
}
