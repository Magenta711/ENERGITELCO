<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearnedLeassonsTestOption extends Model
{
    protected $fillable = ['test_id','text_answer','num','answer','status'];
}
