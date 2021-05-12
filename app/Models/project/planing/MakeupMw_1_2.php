<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class MakeupMw_1_2 extends Model
{
    protected $table = "makeup_mw_1_2";
    protected $fillable = ['project_id',"station_local_2","ip_local_2","id_local_2","local_frecuency_2","station_remote_2","ip_remote_2","id_remote_2","remote_frecuency_2","equipment_brand_2","equipment_model_2","instalation_date_2","antenna_height_2_1","antenna_diameter_2_1","antenna_model_2_1","antenna_brand_2_1","antenna_serial_2_1","azimuth_2_1","level_tx_2_1_1","level_tx_2_1_2","level_rx_2_1_1","level_rx_2_1_2","antenna_height_2_2","antenna_diameter_2_2","antenna_model_2_2","antenna_brand_2_2","antenna_serial_2_2","azimuth_2_2","level_tx_2_2_1","level_tx_2_2_2","level_rx_2_2_1","level_rx_2_2_2",'state'];
    protected $guarder = ['id'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
