<?php

namespace App\Models\bonus;

use App\User;
use Illuminate\Database\Eloquent\Model;

class bonusUser extends Model
{
    protected $bonus_users = ['bonus_users'];
    protected $fillable = ['bonus_id','user_id','value_bonus','admin_bonus_check','drive_bonus_check','na_check','admin_1','admin_2','admin_3','admin_4','admin_5','admin_6','admin_7','admin_8','admin_9','admin_10','admin_11','admin_12','driver_1','driver_2','percentage_admin','total_admin','total_dirver','total_user','commentary'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
