<?php

namespace App;

use App\Models\invVehicle;
use Illuminate\Database\Eloquent\Model;

class DriversReport extends Model
{
    protected $fillable = ['date','city','vehicle_id','suject','observation','driver_id','status'];
    
    public function vehicle()
    {
        return $this->hasOne(invVehicle::class,'id','vehicle_id');
    }
}
