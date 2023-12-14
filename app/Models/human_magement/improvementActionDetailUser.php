<?php

namespace App\Models\human_magement;

use App\User;
use Illuminate\Database\Eloquent\Model;

class improvementActionDetailUser extends Model
{
    protected $fillable = ['user_id','detail_id'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function detail()
    {
        return $this->hasOne(improvementActionDetail::class,'id','detail_id');
    }
}
