<?php

namespace App\Models\bonus;

use App\User;
use Illuminate\Database\Eloquent\Model;

class bonu extends Model
{
    protected $table = 'bonuses';
    protected $fillable = ['start_date','end_date','total_pay_admin','total_pay_drive','total_pay','approve_id','status','total_employees','responsable_id','date'];

    public function responsable()
    {
        return $this->hasOne(User::class,'id','responsable_id');
    }
    public function approve()
    {
        return $this->hasOne(User::class,'id','approve_id');
    }

    public function users()
    {
        return $this->hasMany(bonusUser::class,'bonus_id','id');
    }
}
