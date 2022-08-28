<?php

namespace App\Models\project\Mintic\inventory;

use Illuminate\Database\Eloquent\Model;

class EquimentDetail extends Model
{
    protected $fillable = ['especial','sap','name','tickets','departures','stock','model_id','part_id','brand','is_informe'];
}
