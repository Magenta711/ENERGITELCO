<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = "responsibles";
    protected $fillable = ['user_id','responsibles_type','responsibles_id'];
    public $timestamps = false;
    

    public function responsable()
    {
        return $this->morphTo();
    }
}
