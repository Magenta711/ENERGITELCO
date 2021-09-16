<?php

namespace App\Models\human_management;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Premium extends Model
{
    protected $fillable = ['responsable_id','approve_id','total_employees','estado','date','start_date','end_date','total_pay'];

    public function responsable()
    {
        return $this->hasOne(User::class,'id','responsable_id');
    }

    public function approve()
    {
        return $this->hasOne(User::class,'id','approve_id');
    }
}
