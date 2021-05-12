<?php

namespace App\Models\bonus;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MinorBoxUserNew extends Model
{
    protected $table = "minor_box_user_news";
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
