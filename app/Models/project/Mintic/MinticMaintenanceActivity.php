<?php

namespace App\Models\project\Mintic;

use Illuminate\Database\Eloquent\Model;

class MinticMaintenanceActivity extends Model
{
    protected $fillable = ['sap','description','status','type'];
}
