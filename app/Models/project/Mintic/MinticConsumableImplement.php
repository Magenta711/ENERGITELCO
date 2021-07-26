<?php

namespace App\Models\project\Mintic;

use App\User;
use Illuminate\Database\Eloquent\Model;

class MinticConsumableImplement extends Model
{
    protected $fillable = [
        'project_id',
        'user_id',
        'responsable_id',
        'status',
        'commentary'
    ];

    public function details()
    {
        return $this->hasMany(MinticConsumableImplementDetail::class, 'implement_id','id');
    }

    public function responsable()
    {
        return $this->hasOne(User::class,'id','responsable_id');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
    
    public function project()
    {
        return $this->hasOne(Mintic_School::class,'id','project_id');
    }
}
