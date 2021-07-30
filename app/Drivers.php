<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
    protected $fillable = ['user_id','responsable_id','city','effective_date','category','runt','experience','moto','car','status'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function responsable()
    {
        return $this->hasOne(User::class,'id','responsable_id');
    }

    public function controls()
    {
        return $this->hasMany(DriversControl::class,'driver_id','id');
    }
    public function reports()
    {
        return $this->hasMany(DriversReport::class,'driver_id','id');
    }
    public function accidents()
    {
        return $this->hasMany(DriversAccident::class,'driver_id','id');
    }
    public function exams()
    {
        return $this->hasMany(DriversExam::class,'driver_id','id');
    }
    public function tests()
    {
        return $this->hasMany(DriversTest::class,'driver_id','id');
    }
    public function trainings()
    {
        return $this->hasMany(DriversTraining::class,'driver_id','id');
    }
}
