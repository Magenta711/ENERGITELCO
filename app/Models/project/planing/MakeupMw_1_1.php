<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class MakeupMw_1_1 extends Model
{
    protected $table = "makeup_mw_1_1";
    protected $fillable = ['project_id',"local_station_1","ip_local_1","id_local_1",'local_frequency_1',"remote_station_1",'ip_remote_1','id_remote_1',"remote_frequency_1","equipment_brand_1","equipment_model_1","instalation_date_1","antenna_height_1_1","antenna_diameter_1_1","polarity_1_1","antenna_model_1_1","antenna_brand_1_1","antenna_serial_1_1","azimuth_1_1","level_tx_1_1","level_rx_1_1","antenna_height_1_2","antenna_diameter_1_2","polarity_1_2","antenna_model_1_2","antenna_brand_1_2","antenna_serial_1_2","azimuth_1_2","level_tx_1_2","level_rx_1_2",'state'];
    protected $guarder = ['id'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
