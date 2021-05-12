<?php

namespace App\Models\execution_work;

use App\User;
use Illuminate\Database\Eloquent\Model;

class invTool extends Model
{
    protected $fillable = ['serial','name','status','user_id','commentary'];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
