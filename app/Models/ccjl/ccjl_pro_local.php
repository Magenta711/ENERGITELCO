<?php

namespace App\Models\ccjl;

use Illuminate\Database\Eloquent\Model;

class ccjl_pro_local extends Model
{
    protected $table = "ccjl_pro_locals";
    protected $fillable = ['floor','departament','value','status'];
    protected $guarder = ['id'];
}
