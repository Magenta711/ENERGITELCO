<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriversControl extends Model
{
    protected $fillable = ['date','city','suject','vehicle_id','observation','driver_id'];

    public function vehicle()
    {
        return $this->hasOne(invVehicle::class,'id','vehicle_id');
    }
}
