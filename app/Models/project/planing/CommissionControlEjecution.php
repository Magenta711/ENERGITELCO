<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class CommissionControlEjecution extends Model
{
    protected $table = "commission_control_ejecutions";
    protected $fillable = ['commission_id','of','to','concept','value','i','status'];
    protected $guarder = ['id'];
}
