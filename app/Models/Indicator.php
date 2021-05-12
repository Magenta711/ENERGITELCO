<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $table = "indicators";
    protected $fillable = ['name','goal','formula','periodicity','process_id','analysis','isAuto','hasFormula','status'];
    protected $guarder = "id";

    public function months()
    {
        return $this->hasMany(IndicatorMonth::class, 'indicator_id', 'id');
    }

    public function registers()
    {
        return $this->hasMany(IndicatorRegister::class, 'indicator_id','id');
    }

    public function lastCut()
    {
        $cut = Carbon::create(now()->format('Y-m-d'))->subYears(2)->format('Y-m-d');
        foreach ($this->months as $value) {
            if (now()->weekOfYear <= $value->week) {
                $date = $value->getDateBreack();
            }else {
                $date = $value->getDateBreack();
            }
        }
        
        return $date;
    }

    public function lastRegister()
    {
        return IndicatorRegister::where('indicator_id',$this->id)->where('status',1)->get()->last();
    }
}
