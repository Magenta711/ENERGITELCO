<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriversAccident extends Model
{
    protected $fillable = ['date','city','vehicle_id','zone','details','driver_id'];
}
