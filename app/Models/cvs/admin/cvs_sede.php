<?php

namespace App\Models\cvs\admin;

use Illuminate\Database\Eloquent\Model;

class cvs_sede extends Model
{
    protected $table = "cvs_sedes";
    protected $fillable = ['name','email','address','city','tel','status'];
    protected $guarder = ['id'];
}
