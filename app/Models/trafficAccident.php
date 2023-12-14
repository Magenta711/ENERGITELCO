<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class trafficAccident extends Model
{
    protected $fillable = ['responsable_id','date','time','event','route','vehicle_id','other_vehicle','position','who','time_driven','success','body_part','type_lession','days_disabled','mortal','num_victims','affected_third_parties','num_victims2','actions'];

    public function vehicle()
    {
        return $this->hasOne(invVehicle::class,'id','vehicle_id');
    }
    public function responsable()
    {
        return $this->hasOne(User::class,'id','responsable_id');
    }
}
