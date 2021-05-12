<?php

namespace App\Models\ccjl;

use Illuminate\Database\Eloquent\Model;

class ccjl_pro_administration extends Model
{
    protected $table = "ccjl_pro_administrations";
    protected $fillable = ['name','value','status'];
    protected $guarder = ['id'];
}
