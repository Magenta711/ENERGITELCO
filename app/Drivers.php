<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    protected $fillable = ['user_id','responsable_id','city','effective_date','category','runt','experience','moto','car','status'];

    public function control()
    {
        return $this->hasMany(DriversControl::class,'driver_id','id');
    }
    public function report()
    {
        return $this->hasMany(DriversReport::class,'driver_id','id');
    }
    public function accident()
    {
        return $this->hasMany(DriversAccident::class,'driver_id','id');
    }
    public function exam()
    {
        return $this->hasMany(DriversExam::class,'driver_id','id');
    }
    public function test()
    {
        return $this->hasMany(DriversTest::class,'driver_id','id');
    }
    public function training()
    {
        return $this->hasMany(DriversTraining::class,'driver_id','id');
    }
}
