<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class MakeupMw_1_4 extends Model
{
    protected $table = "makeup_mw_1_4";
    protected $fillable = ['project_id',"station_local_4","ip_local_4","id_local_4","local_frecuency_4","station_remote_4","ip_remote_4","id_remote_4","remote_frecuency_4","equipment_brand_4","equipment_model_4","instalation_date_4","azimuth_4_1","antenna_height_4_1","antenna_diameter_4_1","polarity_4_1","antenna_model_4_1","antenna_brand_4_1","antenna_serial_4_1","level_tx_4_1_1","level_rx_4_1_1","level_tx_4_1_2","level_rx_4_1_2","azimuth_4_2","antenna_height_4_2","antenna_diameter_4_2","polarity_4_2","antenna_model_4_2","antenna_brand_4_2","antenna_serial_4_2","level_tx_4_2_1","level_rx_4_2_1","level_tx_4_2_2","level_rx_4_2_2",'state',
    
    'antenna_height_4_1_2','antenna_diameter_4_1_2','antenna_model_4_1_2','antenna_brand_4_1_2','antenna_serial_4_1_2','level_tx_4_1_2_1','level_rx_4_1_2_1','level_tx_4_1_2_2','level_rx_4_1_2_2','antenna_height_4_2_2','antenna_diameter_4_2_2','antenna_model_4_2_2','antenna_brand_4_2_2','antenna_serial_4_2_2','level_tx_4_2_2_1','level_rx_4_2_2_1','level_tx_4_2_2_2','level_rx_4_2_2_2',
];
    protected $guarder = ['id'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
