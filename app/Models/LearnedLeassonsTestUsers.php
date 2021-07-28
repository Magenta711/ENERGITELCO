<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class LearnedLeassonsTestUsers extends Model
{
    protected $fillable = ['user_id','test_id','answer_id','status'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    public function answer()
    {
        return $this->hasOne(LearnedLeassonsTestOption::class,'id','answer_id');
    }

    public function test()
    {
        return $this->hasOne(LearnedLeassonsTest::class,'id','test_id');
    }
}
