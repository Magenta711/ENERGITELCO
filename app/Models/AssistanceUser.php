<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssistanceUser extends Model
{
    protected $fillable = ['user_id','assistance_id','assistance_check','where','start_time','end_time','commentary'];

    public function responsable()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
