<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class formulaMaterial extends Model
{
    protected $fillable = ['consumable_id','material_id','formula'];
    public $timestamps = false;
}
