<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Work3 extends Model
{
    protected $table = "works3";
    protected $fillable = ['placa_vehiculo','fecha','ciudad','kilometraje','responsable','condutor','cedula_responsable','coordinador','f1_1','f1_2','f1_3','f1_4','f1_5','observaciones1','f2_1','foto_1','f2_2','foto_2','f2_3','foto_3','f2_4','foto_4','f2_5','foto_5','f2_6','foto_6','f2_7','foto_7','f2_8','foto_8','f2_9','foto_9','f2_10','foto_10','f2_11','foto_11','f2_12','foto_12','f2_13','foto_13','f2_14','foto_14','f2_15','foto_15','f2_16','foto_16','f2_17','foto_17','f2_18','foto_18','f2_19','foto_19','f2_20','foto_20','f2_21','foto_21','f2_22','foto_22','f2_23','foto_23','f2_24','foto_24','f2_25','foto_25','f2_26','foto_26','f2_27','foto_27','f2_28','foto_28','f2_29','foto_29','f2_30','foto_30','f2_31','foto_31','f2_32','foto_32','observaciones2','f3_1','observacion_1','f3_2','observacion_2','f3_3','observacion_3','f3_4','observacion_4','f3_5','observacion_5','f3_6','observacion_6','f3_7','observacion_7','f3_8','observacion_8','f3_9','observacion_9','f3_10','observacion_10','f3_11','observacion_11','foto','estado','fecha_aprobacion','hora_aprobacion','commentary','vehicle_id'];
    protected $guarder = ['id'];

    public function coordinadorAcargo()
    {
        return $this->hasOne(User::class,'id','coordinador');
    }

    public function inspeccionador()
    {
        return $this->hasOne(User::class,'id','cedula_responsable');
    }
    
    public function responsableAcargo()
    {
        return $this->hasOne(User::class,'id','responsable');
    }
    
    public function vehicle()
    {
        return $this->hasOne(invVehicle::class,'id','vehicle_id');
    }
}
