<?php

namespace App\Models\project\Mintic;

use App\Models\file;
use App\Models\taskEb;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Mintic_School extends Model
{
    protected $table = "mintic_schools";
    protected $fillable = ['approver_id','responsable_id','con_sede','code','name','dep','mun','person_name','person_number','lat','long','height','rector_name','rector_number','observation','status','population'];
    protected $guarder = ['id'];

    public function responsable()
    {
        return $this->hasOne(User::class, 'id', 'responsable_id');
    }
    public function approver()
    {
        return $this->hasOne(User::class, 'id', 'approver_id');
    }
    public function technical()
    {
        return $this->hasOne(User::class, 'id', 'technical_id');
    }

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }

    public function taskings()
    {
        return $this->morphMany(taskEb::class, 'projectble');
    }

    public function visits()
    {
        return $this->hasMany(MinticVisit::class,'project_id','id');
    }
}
