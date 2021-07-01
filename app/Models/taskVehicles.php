<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class taskVehicles extends Model
{
    protected $fillable = ['vehicle_id','task_id'];

    public function vehicle()
    {
        return $this->hasOne(invVehicle::class,'id','vehicle_id');
    }
}
