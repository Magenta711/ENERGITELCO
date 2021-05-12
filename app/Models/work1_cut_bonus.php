<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class work1_cut_bonus extends Model
{
    protected $table = "work1_cut_bonuses";
    protected $fillable = ['user_id','approver_id','total','status','start_date','end_date','formats','has_bonus', 'has_box', 'value_box', 'value_bonu'];
    
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