<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriversReport extends Model
{
    protected $fillable = ['date','city','suject','observation','driver_id'];
}
