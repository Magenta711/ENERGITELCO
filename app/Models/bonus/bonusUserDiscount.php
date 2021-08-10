<?php

namespace App\Models\bonus;

use Illuminate\Database\Eloquent\Model;

class bonusUserDiscount extends Model
{
    protected $fillable = ['bonu_user_id','value','date','status','credit_id'];
}
