<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class document extends Model
{
    protected $table = "documents";
    protected $fillable = ['code','name','version','date','page_total','type','responsable_id','contract','status'];

    public function file()
    {
        return $this->morphOne(file::class, 'fileble');
    }

    public function responsable()
    {
        return $this->hasOne(User::class, 'id','responsable_id');
    }

    public function signaturebles()
    {
        return $this->morphToMany(User::class, 'signatures');
    }
}
