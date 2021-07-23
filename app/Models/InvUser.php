<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class InvUser extends Model
{
    protected $fillable = ['user_id','inventaryble_id','inventaryble_type','tickets','departures','stock'];

    public function inventaryble()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
