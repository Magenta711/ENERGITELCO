<?php

namespace App\Models\human_magement;

use Illuminate\Database\Eloquent\Model;

class settlementSalaryMonth extends Model
{
    protected $fillable = ['settlement_id','salary_month','extras_month','assistance_month'];

    public function settlement()
    {
        return $this->hasOne(settlement::class,'id','settlement_id');
    }
}
