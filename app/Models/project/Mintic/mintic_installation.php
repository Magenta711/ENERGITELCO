<?php

namespace App\Models\project\Mintic;

use Illuminate\Database\Eloquent\Model;
use App\Models\file;
use App\User;


class mintic_installation extends Model
{
    protected $fillable = ['project_id','date','group_install','department','municpality','population','name','long','lat','height','code','dane_depa','dane_muni','dane_centro','dane_sede','responsable_name','responsable_dni','responsable_number','responsable_email','fault_description','repair_id','repair_name','repair_position','repair_cc','repair_tel','repair_mail','status'];

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }

    public function project()
    {
        return $this->hasOne(Mintic_School::class,'id','project_id');
    }

    public function equipments()
    {
        return $this->hasMany(mintic_installation_activity_equipment::class,'installation_id','id');
    }

    public function receives()
    {
        return $this->hasOne(User::class, 'id', 'repair_id');
    }
}
