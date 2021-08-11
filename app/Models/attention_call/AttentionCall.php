<?php

namespace App\Models\attention_call;

use App\Models\file;
use App\User;

use Illuminate\Database\Eloquent\Model;

class AttentionCall extends Model
{
    protected $table = "call_attentions";
    protected $fillable = ['responsable','receiver','approver','affair','references','arguments','comment','header','state','type'];
    protected $guarder = ['id'];
    
    public function responsableCall()
    {
        return $this->hasOne(User::class, 'id', 'responsable');
    }

    public function receiverCall()
    {
        return $this->hasOne(User::class, 'id', 'receiver');
    }
    
    public function approverCall()
    {
        return $this->hasOne(User::class, 'id', 'approver');
    }
    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }
}
