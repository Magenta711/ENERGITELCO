<?php

namespace App\Models\cvs;

use Illuminate\Database\Eloquent\Model;

class cvs_advertising extends Model
{
    protected $table = "cvs_advertisings";
    protected $fillable = ['name','file','date_start','date_end','status'];
    protected $guarder = ['id']; 
}
