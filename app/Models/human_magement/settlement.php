<?php

namespace App\Models\human_magement;

use App\User;
use Illuminate\Database\Eloquent\Model;

class settlement extends Model
{
    protected $fillable = [
        'user_id','responsable_id','approve_id','salary','assistance','date_start','date_end',
        'days_linked_vacation','vacation_days_to_pay','vacation','total_vacation_days_to_pay','premium_payment_days',
        'total_devengado_salary','total_devengado_extras','total_devengado_assistance',
        'average_salary','average_extras','average_assistance','average_last_month_salary',
        'average_last_month_extras','average_last_month_assistance','average_premium_salary',
        'average_premium_extras','average_premium_assistance','total_linkend',
        'intereses','total_premium','total_vacation','this_salary','compensation','pendientes','debt','total_settlement','status','commentary','serveraces'
    ];
    protected $guarder = ['id'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function approve()
    {
        return $this->hasOne(User::class,'id','approve_id');
    }
    public function responsable()
    {
        return $this->hasOne(User::class,'id','responsable_id');
    }

    public function years ()
    {
        return $this->hasMany(settlementYear::class,'settlement_id','id');
    }

    public function months()
    {
        return $this->hasMany(settlementSalaryMonth::class,'settlement_id','id');
    }
}
