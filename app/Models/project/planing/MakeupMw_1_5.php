<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class MakeupMw_1_5 extends Model
{
    protected $table = "makeup_mw_1_5";
    protected $fillable = ['project_id',"station_local_5","ip_local_5","id_local_5","station_remota_5","ip_remote_5","id_remote_5","equipment_brand_5","equipment_model_5","instalation_date_5","antenna_heigth_5_1","antenna_diameter_5_1","antenna_model_5_1","antenna_brand_5_1","antenna_serial_5_1","azimuth_5_1","frecuency_5_1_1","frecuency_5_1_2","level_5_1_1","level_5_1_2","level_5_1_3","level_5_1_4","antenna_heigth_5_2","antenna_diameter_5_2","antenna_model_5_2","antenna_brand_5_2","antenna_serial_5_2","azimuth_5_2","frecuency_5_2_1","frecuency_5_2_2","level_5_2_1","level_5_2_2","level_5_2_3","level_5_2_4",'state',

    'frecuency_rx_5_1_2','frecuency_rx_5_1_1','level_rx_5_1_1','level_rx_5_1_2','level_rx_5_1_3','level_rx_5_1_4','frecuency_rx_5_2_1','frecuency_rx_5_2_2','level_rx_5_2_1','level_rx_5_2_2','level_rx_5_2_3','level_rx_5_2_4'
    ];
    protected $guarder = ['id'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
