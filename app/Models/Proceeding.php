<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Proceeding extends Model
{
    protected $fillable = ['date','city','time_start','time_end','place','num','theme','development','affair','status','responsable_id','assistant','guest'];

    public function users()
    {
        return $this->morphToMany(User::class, 'responsibles');
    }

    public function responsable()
    {
        return $this->hasOne(User::class,'id','responsable_id');
    }

    public function commitments()
    {
        return $this->hasMany(ProceedingCommitment::class,'proceeding_id','id');
    }

    public function signaturebles()
    {
        return $this->morphToMany(User::class, 'signatures');
    }

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }
}
