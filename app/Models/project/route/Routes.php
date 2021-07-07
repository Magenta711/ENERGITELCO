<?php

namespace App\Models\project\route;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    protected $table = 'routes';
    protected $fillable = ['responsable_id','project_name','approver_id','id_orden','ot','order_description','aliado_gdrt','tel_aliado_gdrt','solicitante_gdrt','tel_solicitante_gdrt','solicitante_gi','critical','observation','commentary','status','lat','long','height'];
    protected $guarder = ['id'];

    public function responsable()
    {
        return $this->hasOne(User::class, 'id','responsable_id');
    }

    public function services()
    {
        return $this->hasMany(routeService::class, 'route_id','id');
    }

    public function users()
    {
        return $this->morphToMany(User::class, 'responsibles');
    }
}
