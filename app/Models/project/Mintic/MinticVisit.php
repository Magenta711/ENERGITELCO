<?php

namespace App\Models\project\Mintic;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MinticVisit extends Model
{
    protected $fillable = ['date','project_id','time','technical_id','commentary','type','status'];

    public function technical()
    {
        return $this->hasOne(User::class,'id','technical_id');
    }
}
