<?php

namespace App\Models\project\Mintic;

use Illuminate\Database\Eloquent\Model;

class mintic_installation_activity_equipment extends Model
{
    protected $fillable = ['project_id','installation_id','description', 'brand', 'model', 'amount'];

}
