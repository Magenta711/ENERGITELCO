<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class invVehicle extends Model
{
    protected $table = 'inv_vehicles';
    protected $fillable = ['brand','plate','line','color','model','num_enrollment','start_date','exp_date','avatar','type','body_type','soat','soat_date','enrollment','enrollment_date','fuel','capacity','gases','gases_date','technomechanical','technomechanical_date','toll_ship','tires','spare_tire','first_aid_kit','first_aid_kit_date','cc','status','observations','date_extinguisher','liability_insurance','liability_insurance_date',
    'propetary','num_motor','date_cross_piece','date_tacos','policy_date','policy','preventive_plan','active_safaty_system','date_preventive_plan','passive_safaty_system','commentary'];
    protected $guarder = ["id"];
    // Vateria, llantas, Nro. de Cilindros, Nro. de Válvulas

    public function maintenances()
    {
        return $this->hasMany(invVehicleMtt::class,'vehicle_id','id');
    }
    public function reports()
    {
        return $this->hasMany(invVehicleReport::class,'vehicle_id','id');
    }
}
