<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WorkWithUs extends Model
{
    protected $table = "work_with_us";
    protected $fillable = ['name','email','tel','position_id','comentary','file','state'];
    protected $guarder = ['id'];

    public function position()
    {
        return $this->hasOne(Positions::class, 'id', 'position_id');
    }

    public function register (){
        return $this->hasOne(Register::class, 'request_id', 'id');
    }
}