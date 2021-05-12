<?php

namespace App\Models\bonus;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MinorBoxUser extends Model
{
    protected $table = "minor_box_users";
    protected $fillable = ['user_id','responsable_id','charges','last_date','rest','commentary','history','discharges','pending','status'];
    protected $guarder = ['id'];
    
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function responsable()
    {
        return $this->hasOne(User::class, 'id', 'responsable_id');
    }
}
