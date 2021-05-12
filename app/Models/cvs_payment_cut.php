<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class cvs_payment_cut extends Model
{
    protected $table = "cvs_payment_cuts";
    protected $fillable = ['user_id','value','cash','qr','card','value_rest','status','start_date','end_date'];
    protected $guarder = ['id'];
    
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
