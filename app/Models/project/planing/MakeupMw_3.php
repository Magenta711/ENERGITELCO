<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class MakeupMw_3 extends Model
{
    protected $table = "makeup_mw_3";
    protected $fillable = ['project_id',"radio_model_20","band_20","polarity_20","station_20_1","azimuth_20_1","station_20_2","azimuth_20_2","amount_20_1_1","amount_20_1_2","amount_20_1_3","amount_20_1_4","amount_20_2_1","amount_20_2_2","amount_20_2_3","amount_20_2_4",];
    protected $guarder = ['id'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}