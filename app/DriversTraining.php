<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriversTraining extends Model
{
    protected $fillable = ['date','theme','facilitator','duration','observation','driver_id'];
}
