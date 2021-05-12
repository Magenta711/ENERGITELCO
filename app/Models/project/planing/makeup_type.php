<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class makeup_type extends Model
{
    protected $table = "makeup_types";
    protected $fillable = ['name','place'];
    protected $guarder = ['id'];
}
