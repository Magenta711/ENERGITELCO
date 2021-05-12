<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeProvider extends Model
{
    protected $table = "type_providers";
    protected $fillable = ['type','state'];
    protected $guarder = ['id'];
}
