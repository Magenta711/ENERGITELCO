<?php

namespace App\Models\project\Mintic;

use Illuminate\Database\Eloquent\Model;

class miniticMaintenanceActivityDetail extends Model
{
    protected $fillable = ['activity_id','maintenance_id','status'];
}
