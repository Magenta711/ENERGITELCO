<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndicatorRegister extends Model
{
    protected $table = "indicator_registers";
    protected $fillable = ['date','value','goal','cut','formula','indicator_id','status'];
    protected $guarder = "id";
}
