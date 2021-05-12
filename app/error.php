<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class error extends Model
{
    protected $fillable = [
        'message','method','url','user_id','ip','code'
    ];
    protected $guarder = ['id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
