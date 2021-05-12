<?php

namespace App\Models\project\route;

use Illuminate\Database\Eloquent\Model;

class routeService extends Model
{
    protected $table = 'route_services';
    protected $fillable = ['route_id','num','name_service','bsc_rnc','et_wbts','tecnology','throughput','latency','mtu','status'];
    protected $guarder = ['id'];

    public function base_stations()
    {
        return $this->hasMany(routeBaseStation::class, 'service_id','id');
    }
}
