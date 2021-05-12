<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Work8Users extends Model
{
    protected $table = 'work8_users';
    protected $fillable = ['work_id','user_id','salary','assistance','health','pension','working_days','unpaid_leave','disabilities_1','disabilities_2','extras_sc','surcharge_n','extras_d','extras_dc','extras_n','extras_s','holyday_n','extras_hn','discounts','unpaid_leave_tx','disabilities_1_tx','disabilities_2_tx','extras_sc_tx','surcharge_n_tx','extras_d_tx','extras_dc_tx','extras_n_tx','extras_s_tx','holyday_n_tx','extras_hn_tx','total_devengado_tx','assistance_tx','health_tx','pension_tx','discounts_tx','total_pay','status'];
    protected $guarder = ['id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function work()
    {
        return $this->hasOne(Work8::class,'id','work_id');
    }
}
