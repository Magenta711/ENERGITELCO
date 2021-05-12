<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    protected $table = "project_types";
    protected $fillable = ['type'];
    protected $guarder = ['id'];
}
