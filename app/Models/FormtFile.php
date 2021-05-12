<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormtFile extends Model
{
    protected $table = "format_files";
    protected $fillable = ['nombre','formulario','extencion'];
    protected $guarder = ['id'];
}
