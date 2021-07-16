<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tasking extends Model
{
    protected $fillable = ['responsable_id','date_start','municipality','department','project','eb_id','am','pm','description','commentaries','report','user_inv','report_user','status','station_name','lat','long','height','inv_user','user_add_inv'];

    public function users()
    {
        return $this->morphToMany(User::class, 'responsibles');
    }

    public function vehicles()
    {
        return $this->hasMany(taskVehicles::class,'task_id','id');
    }

    public function activities()
    {
        return $this->hasMany(taskActivity::class,'task_id','id');
    }

    public function eb()
    {
        return $this->hasOne(taskEb::class,'task_id','id');
    }

    public function consumables()
    {
        return $this->hasMany(taskDetailConsumable::class,'task_id','id');
    }

    public function invetory_user()
    {
        return $this->hasOne(User::class,'id','user_inv');
    }
    public function responsable()
    {
        return $this->hasOne(User::class,'id','responsable_id');
    }
    public function user_report()
    {
        return $this->hasOne(User::class,'id','report_user');
    }
}
