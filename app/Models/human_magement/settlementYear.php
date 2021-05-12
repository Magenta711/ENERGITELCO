<?php

namespace App\Models\human_magement;

use Illuminate\Database\Eloquent\Model;

class settlementYear extends Model
{
    protected $fillable= ['settlement_id','years','days_linked','days_leave','days_to_settle'];

    public function settlement()
    {
        return $this->hasOne(settlement::class,'id','settlement_id');
    }
}
