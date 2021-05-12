<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Work10 extends Model
{
    protected $table = "work10s";
    protected $fillable = ['responsable_id','coordinator_id','reason','description','value','letter','commentary','estado'];
    protected $guarder = ['id'];

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }
    public function coordinadorAcargo()
    {
        return $this->hasOne(User::class,'id','coordinator_id');
    }
    
    public function responsableAcargo()
    {
        return $this->hasOne(User::class,'id','responsable_id');
    }
}
