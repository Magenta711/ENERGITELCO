<?php

namespace App\Models\project\Mintic;

use Illuminate\Database\Eloquent\Model;

class MinticVisit extends Model
{
    protected $fillable = ['date','project_id','time','technical_id','commentary','type','status'];
}
