<?php

namespace App\Models\autoForm;

use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
    protected $fillable = [
        'form_id','email','status','secret'
    ];
}
