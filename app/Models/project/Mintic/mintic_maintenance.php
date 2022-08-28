<?php

namespace App\Models\project\Mintic;

use Illuminate\Database\Eloquent\Model;
use App\Models\file;
use App\User;

class mintic_maintenance extends Model
{
    protected $fillable = ['project_id','type_format','num','date','collaborating_company','department','municpality','population','name','code','responsable_name','responsable_number','responsable_email','fault_description','receives_id','receives_name','receives_position','receives_cc','receives_tel','receives_mail','repair_name','repair_position','repair_cc','repair_tel','repair_mail','status','ticket'];

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
        return $this->hasMany(miniticMaintenanceEquipment::class,'maintenance_id','id');
    }
    public function activities()
    {
        return $this->hasMany(miniticMaintenanceActivityDetail::class,'maintenance_id','id');
    }

    public function receives()
    {
        return $this->hasOne(User::class, 'id', 'receives_id');
    }
}
