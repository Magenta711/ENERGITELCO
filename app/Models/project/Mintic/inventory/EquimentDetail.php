<?php

namespace App\Models\project\Mintic\inventory;

use Illuminate\Database\Eloquent\Model;

class EquimentDetail extends Model
{
    protected $fillable = ['sap','name','tickets','departures','stock'];
}
