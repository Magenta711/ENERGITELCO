<?php

namespace App\Models\autoForm;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
        'user_id', 'form_id', 'responder_id'
    ];

    public function answers()
    {
        return $this->hasMany(Answer::class, 'order_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function form()
    {
        return $this->hasOne(form::class, 'id', 'form_id');
    }
}
