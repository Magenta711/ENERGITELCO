<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class interview extends Model
{
    protected $table = "interviews";
    
    protected $fillable = ['responsable_id','approver_id','register_id','item_1','item_2','item_3','item_4','item_5','item_6','item_7','item_8','item_9','item_10','item_11','item_12','item_13','item_14','item_15','item_16','item_17','item_18','item_19','item_20','item_21','item_22','item_23','observations','state'];
    
    protected $guarder = "id";
    
    public function references()
    {
        return $this->hasMany(interview_references::class, 'interview_id', 'id');
    }
    
    public function register()
    {
        return $this->hasOne(Register::class,'id','register_id');
    }
    
    
    public function responsable()
    {
        return $this->hasOne(User::class, 'id', 'responsable_id');
    }

    public function approver()
    {
        return $this->hasOne(User::class, 'id', 'approver_id');
    }
    
    
}
