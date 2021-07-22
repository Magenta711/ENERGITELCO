<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class IndicatorMonth extends Model
{
    protected $table = "indicator_months";
    protected $fillable = ['indicator_id','week','type','status'];
    protected $guarder = "id";

    public function getDateBreack($isNow = null)
    {
        Carbon::setWeekEndsAt(Carbon::FRIDAY);
        $year = now()->format('Y');
        if (strlen($this->week) == 1) {
            $this->week = '0'.$this->week;
        }
        $date = Carbon::create($year.'-W'.$this->week)->endOfWeek();
        if ($date->format('Y-m-d') < now()->format('Y-m-d') && !$isNow) {
            $year = $year + 1;
            $date = Carbon::create($year.'-W'.$this->week)->endOfWeek();
        }
        return $date->format('Y-m-d');
    }
}
