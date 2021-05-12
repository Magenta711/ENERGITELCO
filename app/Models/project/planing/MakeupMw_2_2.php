<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class MakeupMw_2_2 extends Model
{
    protected $table = "makeup_mw_2_2";
    protected $fillable = ['project_id',"station_local_11","station_remote_11","equipment_brand_11","equipment_model_11","card_11_1","slot_11_1","ddf_11_1","destination_equipment_11","remote_management_11","card_11_2","slot_11_2","ddf_11_2","main_position_11","pdb_11_1","main_position_11_2","stand_by_11_1","pdb_11_2","stand_by_11_2","main_position_11_3","stand_by_11_3","card_11_3","slot_11_3","ddf_11_3","e1_11_3","txrx_11_3","destination_equipment_11_4","remote_connection_11_4","card_11_4","slot_11_4","ddf_11_4","e1_11_4","txrx_11_4",];
    protected $guarder = ['id'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
