<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class taskConsumables extends Model
{
    protected $fillable = ['amount','consumable_id','task_id'];
}
