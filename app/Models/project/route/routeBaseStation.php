<?php

namespace App\Models\project\route;

use Illuminate\Database\Eloquent\Model;

class routeBaseStation extends Model
{
    protected $table = 'route_base_stations';
    protected $fillable = ['service_id','num','name_eb','file_material','file_equipment_room','file_cabling','file_inventory_before','file_inventory_then','file_marcked','chs_observation','require_window','status'];
    protected $guarder = ['id'];

    public function types()
    {
        return $this->hasMany(routeBaseStationType::class,'eb_id','id');
    }
}
