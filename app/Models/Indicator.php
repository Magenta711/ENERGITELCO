<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $table = "indicators";
    protected $fillable = ['name','goal','formula','calification','periodicity','process_id','analysis','isAuto','hasFormula','status'];
    protected $guarder = "id";

    public function months()
    {
        return $this->hasMany(IndicatorMonth::class, 'indicator_id', 'id');
    }

    public function registers()
    {
        return $this->hasMany(IndicatorRegister::class, 'indicator_id','id');
    }

    public function nextCut()
    {
        $date = [
            'week' => 55,
            'date' => now()->format('Y-m-d'),
        ];
        foreach ($this->months as $value) {
            if ($value->type == 1 && now()->weekOfYear <= $value->week && $value->week <= $date['week']) {
                $date = [
                    'week' => $value->week,
                    'date' => $value->getDateBreack()
                ];
            }
        }

        if ($date['week'] == 55) {
            foreach ($this->months as $value) {
                if ($value->type == 1 && $value->week <= $date['week']) {
                    $date = [
                        'week' => $value->week,
                        'date' => $value->getDateBreack()
                    ];
                }
            }
        }
        
        return $date;
    }

    public function lastCut()
    {
        $date = [
            'week' => 0,
            'date' => now()->format('2021-01-01'),
        ];
        foreach ($this->months as $value) {
            if ($value->type == 1 && now()->weekOfYear > $value->week && $date['week'] < $value->week) {
                $date = [
                    'week' => $value->week,
                    'date' => $value->getDateBreack(true)
                ];
            }
        }

        if ($date['week'] == 0) {
            foreach ($this->months as $value) {
                if ($value->type == 1 && $date['week'] < $value->week) {
                    $newDate = new Carbon($value->getDateBreack(true));
                    $date = [
                        'week' => $value->week,
                        'date' => $newDate->subYear()->format('Y-m-d')
                    ];
                }
            }
        }
        
        return $date;
    }

    public function lastRegister()
    {
        return IndicatorRegister::where('indicator_id',$this->id)->where('status',1)->get()->last();
    }

    public function updateTracing($date)
    {
        $actually = $this->lastRegister();
        if ($actually->status == 1) {
            $actually->update([ 'status' => 0 ]);
        }
        $newRegister = IndicatorRegister::create([
            'date' => now(),
            'inputs' => '0-0',
            'value' => 0,
            'goal' => $this->goal,
            'cut' => $date,
            'formula' => $this->hasFormula,
            'indicator_id' => $this->id,
            'status' => 1
        ]);

        return $newRegister;
    }
}
