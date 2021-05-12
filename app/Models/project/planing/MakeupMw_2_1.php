<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class MakeupMw_2_1 extends Model
{
    protected $table = "makeup_mw_2_1";
    protected $fillable = ['project_id',"station_local_10","station_remote_10","equipment_brand_10","equipment_model_10","card_10_1","slot_10_1","ddf_10_1","destination_equipment_10","remote_management_10","card_10_2","slot_10_2","ddf_10_2","main_position_10","pdb_10_1","main_position_10_2","stand_by_10_1","pdb_10_2","stand_by_10_2","main_position_10_3","stand_by_10_3","card_10_3","slot_10_3","ddf_10_3","e1_10_3","txrx_10_3","destination_equipment_10_4","remote_connection_10_4","card_10_4","slot_10_4","ddf_10_4","e1_10_4","txrx_10_4",];
    protected $guarder = ['id'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
