<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SuggestionsMailbox extends Model
{
    protected $fillable = ['type','area','affair','user_id','read_by_id','description','answer','date_answer','read_at','status'];

    function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
