<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class MakeupMw_1_3 extends Model
{
    protected $table = "makeup_mw_1_3";
    protected $fillable = ['project_id',"station_local_3","ip_local_3","id_local_3","local_frecuency_3","station_remote_3","ip_remote_3","id_remote_3","remote_frecuency_3","equipment_brand_3","equipment_model_3","instalation_date_3","polarity_3_1","azimuth_3_1","antenna_height_3_1_1","antenna_diameter_3_1_1","antenna_model_3_1_1","antenna_brand_3_1_1","antenna_serial_3_1_1","level_tx_3_1_1","level_rx_3_1_1","antenna_height_3_1_2","antenna_diameter_3_1_2","antenna_model_3_1_2","antenna_brand_3_1_2","antenna_serial_3_1_2","level_tx_3_1_2","level_rx_3_1_2","polarity_3_2","azimuth_3_2","antenna_height_3_2_1","antenna_diameter_3_2_1","antenna_model_3_2_1","antenna_brand_3_2_1","antenna_serial_3_2_1","level_tx_3_2_1","level_rx_3_2_1","antenna_height_3_2_2","antenna_diameter_3_2_2","antenna_model_3_2_2","antenna_brand_3_2_2","antenna_serial_3_2_2","level_tx_3_2_2","level_rx_3_2_2",'state',
];
    protected $guarder = ['id'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
