<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class taskDetailConsumable extends Model
{
    protected $fillable = ['inventaryble_type','inventaryble_id','task_id','preamount','amount','status'];

    public function inventaryble()
    {
        return $this->morphTo();
    }

    public function tasking()
    {
        return $this->hasOne(Tasking::class,'id','task_id');
    }
}
