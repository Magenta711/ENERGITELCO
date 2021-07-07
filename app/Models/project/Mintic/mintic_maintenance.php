<?php

namespace App\Models\project\Mintic;

use Illuminate\Database\Eloquent\Model;
use App\Models\file;

class mintic_maintenance extends Model
{
    protected $fillable = ['project_id','num','date','collaborating_company','department','municpality','population','name','code','responsable_name','responsable_number','responsable_email','fault_description','receives_name','receives_position','receives_cc','receives_tel','receives_mail','repair_name','repair_position','repair_cc','repair_tel','repair_mail','status'];

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }

    public function project()
    {
        return $this->hasOne(Mintic_School::class,'id','project_id');
    }
}
