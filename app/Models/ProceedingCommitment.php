<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProceedingCommitment extends Model
{
    protected $fillable = ['proceeding_id','user_id','commitment','date_execution','status'];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function proceeding()
    {
        return $this->hasOne(Proceeding::class,'id','proceeding_id');
    }
}
