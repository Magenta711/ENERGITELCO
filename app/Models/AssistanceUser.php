<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AssistanceUser extends Model
{
    protected $fillable = ['user_id','assistance_id','assistance_check','where','start_time','end_time','commentary'];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
