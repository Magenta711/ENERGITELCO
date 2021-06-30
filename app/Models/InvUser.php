<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvUser extends Model
{
    protected $fillable = ['inventaryble_id','inventaryble_type','tickets','departures','stock'];
}
