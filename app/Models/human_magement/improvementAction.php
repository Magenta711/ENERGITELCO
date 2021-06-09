<?php

namespace App\Models\human_magement;

use App\User;
use Illuminate\Database\Eloquent\Model;

class improvementAction extends Model
{
    protected $fillable = ['responsable_id','date','process','num','by','type','effect_description','infraestructure','human_talent','information','measuring','environment','method','cause','commentary','status'];

    public function responsable()
    {
        return $this->hasOne(User::class,'id','responsable_id');
    }

    public function details()
    {
        return $this->hasMany(improvementActionDetail::class,'improvement_id','id');
    }
}
