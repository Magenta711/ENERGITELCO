<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class taskActivity extends Model
{
    protected $fillable = ['task_id','text','status'];
}
