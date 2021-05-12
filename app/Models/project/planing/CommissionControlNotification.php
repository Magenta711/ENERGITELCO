<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class CommissionControlNotification extends Model
{
    protected $table = "commission_control_notifications";
    protected $fillable = ['commission_id','ok','to_ok','concept','value','i','status'];
    protected $guarder = ['id'];
    
}
