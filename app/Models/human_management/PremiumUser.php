<?php

namespace App\Models\human_management;

use Illuminate\Database\Eloquent\Model;

class PremiumUser extends Model
{
    protected $fillable = ['work_id','user_id','linked_days','license_days','settle_days','total_devengado_salary','total_devengado_extras','total_devengado_assistance','average_salary','average_extras','average_assistance','total_pay_user','status'];
}
