<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Work8 extends Model
{
    protected $table = "work8";
    protected $fillable = ['responsable','coordinador','value_assistance','start_date','end_date','date','total_devengado','total_assistance','total_health','total_pension','total_discount','total_pay','total_employees','commentary','estado'];
    protected $guarder = ['id'];

    public function coordinadorAcargo()
    {
        return $this->hasOne(User::class,'id','coordinador');
    }
    
    public function responsableAcargo()
    {
        return $this->hasOne(User::class,'id','responsable');
    }

    public function work_adds()
    {
        return $this->hasMany(Work8Users::class, 'work_id', 'id');
    }

    public function thereIsPaymentForMe()
    {
        foreach ($this->work_adds as $value) {
            if ($value->user_id == auth()->id()) {
                return true;
            }
        }
        return false;
    }
}
