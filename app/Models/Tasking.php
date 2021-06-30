<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tasking extends Model
{
    protected $fillable = ['responsable_id','date_start','municipality','department','project_id','eb_id','am','pm','description','commentaries','report','status'];

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

    public function equipments()
    {
        return $this->hasMany(taskEquipments::class,'task_id','id');
    }

    public function consumables()
    {
        return $this->hasMany(taskConsumables::class,'task_id','id');
    }
}
