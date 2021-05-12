<?php

namespace App\Models\ccjl;

use Illuminate\Database\Eloquent\Model;

class ccjl_pro_services extends Model
{
    protected $table = "ccjl_pro_services";
    protected $fillable = ['name','value','text','status'];
    protected $guarder = ['id'];
}
