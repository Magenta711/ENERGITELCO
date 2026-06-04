<?php

namespace App\Models\project\Mintic;

use Illuminate\Database\Eloquent\Model;
use App\Models\file;

class minticStopClock extends Model
{
    protected $fillable = [
        'project_id',
        'num',
        'date',
        'num_contract',
        'collaborating_company',
        
        'responsable_id',
        'responsable_name',
        'responsable_position',
        'responsable_document',
        'responsable_number',
        'responsable_email',

        'cause_1_date_init',
        'cause_1_date_finilly',
        'cause_1_num',
        'cause_2_date_init',
        'cause_2_date_finilly',
        'cause_2_num',
        'cause_3_date_init',
        'cause_3_date_finilly',
        'cause_3_num',
        'cause_4_date_init',
        'cause_4_date_finilly',
        'cause_4_num',
        'cause_5_date_init',
        'cause_5_date_finilly',
        'cause_5_num',
        'cause_6_date_init',
        'cause_6_date_finilly',
        'cause_6_num',
        'cause_7_date_init',
        'cause_7_date_finilly',
        'cause_7_num',
        'cause_8_date_init',
        'cause_8_date_finilly',
        'cause_8_num',
        'cause_9_date_init',
        'cause_9_date_finilly',
        'cause_9_num',
        'cause_10_date_init',
        'cause_10_date_finilly',
        'cause_10_num',
        'cause_11_date_init',
        'cause_11_date_finilly',
        'cause_11_num',
        'cause_12_date_init',
        'cause_12_date_finilly',
        'cause_12_num',
        'cause_13_date_init',
        'cause_13_date_finilly',
        'cause_13_num',
        'cause_14_date_init',
        'cause_14_date_finilly',
        'cause_14_num',
        'cause_15_date_init',
        'cause_15_date_finilly',
        'cause_15_num',
        'cause_16_date_init',
        'cause_16_date_finilly',
        'cause_16_num',
        'cause_17_date_init',
        'cause_17_date_finilly',
        'cause_17_num',
        'cause_18_date_init',
        'cause_18_date_finilly',
        'cause_18_num',
        'cause_19_date_init',
        'cause_19_date_finilly',
        'cause_19_num',
        'cause_20_date_init',
        'cause_20_date_finilly',
        'cause_20_num',
        'description_1',
        'description_2',
        'description_3',
        'description_4',
        'status'
    ];

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }

    public function project()
    {
        return $this->hasOne(Mintic_School::class,'id','project_id');
    }
}
