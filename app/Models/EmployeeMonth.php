<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class EmployeeMonth extends Model
{
    protected $fillable = ['user_id','responsable_id','month'];

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function file()
    {
        return $this->morphOne(file::class, 'fileble');
    }
}
