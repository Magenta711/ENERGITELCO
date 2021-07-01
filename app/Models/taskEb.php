<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class taskEb extends Model
{
    protected $fillable = ['projectble_type','projectble_id','task_id'];

    public function projectble()
    {
        return $this->morphTo();
    }
}
