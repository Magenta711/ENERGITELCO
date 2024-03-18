<?php

namespace App\Models\project\Mintic;

use Illuminate\Database\Eloquent\Model;

class mintic_installation_equipment extends Model
{
    protected $fillable = ['description', 'brand', 'model', 'amount','status'];
}
