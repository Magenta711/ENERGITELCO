<?php

namespace App\Models\cvs\inventory;

use Illuminate\Database\Eloquent\Model;

class cvs_inv_accesory_categories extends Model
{
    protected $table = "cvs_inv_accesory_categories";
    protected $fillable = ['name'];
    protected $guarder = ['id'];
}
