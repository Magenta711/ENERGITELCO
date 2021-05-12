<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Work2 extends Model
{
    protected $table = "works2";
    protected $fillable = ['responsable','cedula_trabajador','cedula_responsable','coordinador', 'fecha_inspeccion','E1_1','E1_2','E1_3','E1_4','E1_5','E1_6','E1_7','E1_8','E1_9','E1_10','E1_11','E1_12','E1_13','E1_14','E1_15','E1_16','E1_17','serie_equipo_1','marca_1','estado_arnes','foto_1','observaciones_1','E2_1','E2_2','E2_3','E2_4','E2_5','E2_6','E2_7','E2_8','E2_9','E2_10','E2_11','E2_12','E2_13','E2_14','E2_15','E2_16','E2_17','E2_18','serie_equipo_2','marca_equipo_2','estado_eslinga','foto_2','observaciones_2','E3_1','E3_2','E3_3','E3_4','E3_5','E3_6','E3_7','E3_8','E3_9','E3_10','E3_11','E3_12','E3_13','E3_14','serie_equipo_3','marca_equipo_3','estado_eslinga2','foto_3','observaciones_3','E4_1','E4_2','E4_3','E4_4','E4_5','E4_6','E4_7','serie_equipo_4','marca_equipo_4','estado_mosqueton','foto_4','observaciones_4','E5_1','E5_2','E5_3','E5_4','E5_5','E5_6','E5_7','E5_8','serie_equipo_5','marca_equipo_5','estado_freno','foto_5','observaciones_5','estado','fecha_aprobacion','hora_aprobacion','commentary'];
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

    public function trabajador()
    {
        return $this->hasOne(User::class,'id','cedula_trabajador');
    }
}
