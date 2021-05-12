<?php

namespace App\Models\cvs;

use Illuminate\Database\Eloquent\Model;

class cvs_activation_type extends Model
{
    protected $table = "cvs_activation_types";
    protected $fillable = ['name'];
    protected $guarder = ['id']; 
}
