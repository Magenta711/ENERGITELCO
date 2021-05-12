<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemMessages extends Model
{
    protected $table = "system_messages";
    protected $fillable = ['name','description','state'];
    protected $guarder = ['id'];
}
