<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriversTest extends Model
{
    protected $fillable = ['date','type','result','commentary','driver_id'];
}
