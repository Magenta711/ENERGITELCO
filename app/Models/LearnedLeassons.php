<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearnedLeassons extends Model
{
    protected $fillable = ['num','responsable_id','date','theme','happened','caused','avoid'];
}
