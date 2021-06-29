<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    protected $fillable = ['date','total_user','total_faltal','responsable_id'];

    public function responsable()
    {
        return $this->hasOne(User::class, 'id','responsable_id');
    }
}
