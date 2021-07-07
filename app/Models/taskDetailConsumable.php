<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class taskDetailConsumable extends Model
{
    protected $fillable = ['inventaryble_type','inventaryble_id','task_id','amount'];

    public function inventaryble()
    {
        return $this->morphTo();
    }
}
