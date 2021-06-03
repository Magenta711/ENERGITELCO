<?php

namespace App\Models\autoForm;

use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
    protected $fillable = [
        'form_id','email','status','secret'
    ];

    public function orders()
    {
        return $this->hasMany(order::class,'user_form_id','id');
    }
}
