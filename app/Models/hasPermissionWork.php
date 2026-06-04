<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class hasPermissionWork extends Model
{
    protected $fillable = ['user_id','responsable_id','amount'];

    public function responsable()
    {
        return $this->hasOne(User::class,'id','responsable_id');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
