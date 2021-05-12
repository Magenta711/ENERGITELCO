<?php

namespace App\Models\project;

use Illuminate\Database\Eloquent\Model;
use App\Models\file;
use App\User;
    
class Clearing extends Model
{
    protected $table = 'clearings';
    protected $fillable = ['responsable_id','approver_id','date','id_ot','ot_rr','region','estation_a','estation_b','brand_radion','model','banda','sud_banda','concept_technical','concept_fisico','status'];
    protected $guarder = ['id'];

    public function responsable()
    {
        return $this->hasOne(User::class, 'id', 'responsable_id');
    }
    
    public function approver()
    {
        return $this->hasOne(User::class, 'id', 'approver_id');
    }
    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }

    public function inventories()
    {
        return $this->hasMany(ClearingInventory::class,'clearing_id','id');
    }
}