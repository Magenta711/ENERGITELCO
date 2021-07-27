<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearnedLeassonsTest extends Model
{
    protected $fillable = ['responsable_id','question','status'];

    public function answers()
    {
        return $this->hasMany(LearnedLeassonsTestUsers::class,'test_id','id');
    }
    public function options()
    {
        return $this->hasMany(LearnedLeassonsTestOption::class,'test_id','id');
    }
}
