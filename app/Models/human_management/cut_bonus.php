<?php

namespace App\Models\human_management;

use App\User;
use Illuminate\Database\Eloquent\Model;

class cut_bonus extends Model
{
    protected $fillable = ['user_id','approver_id','total','status','start_date','end_date','formats','value','plus'];
    protected $guarder = ['id'];

    public function responsable()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function approver()
    {
        return $this->hasOne(User::class, 'id','approver_id');
    }
}
