<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Work4 extends Model
{
    protected $table = "works4";
    protected $fillable = ['responsable','cedula_revisor','cedula_revisado','coordinador','cantidad_1','marca_1','observacion_1','cantidad_2','marca_2','observacion_2','cantidad_3','marca_3','observacion_3','cantidad_4','marca_4','observacion_4','cantidad_5','marca_5','observacion_5','cantidad_6','marca_6','observacion_6','cantidad_7','marca_7','observacion_7','cantidad_8','marca_8','observacion_8','cantidad_9','marca_9','observacion_9','cantidad_10','marca_10','observacion_10','cantidad_11','marca_11','observacion_11','cantidad_12','marca_12','observacion_12','cantidad_13','marca_13','observacion_13','cantidad_14','marca_14','observacion_14','cantidad_15','marca_15','observacion_15','cantidad_16','marca_16','observacion_16','cantidad_17','marca_17','observacion_17','cantidad_18','marca_18','observacion_18','cantidad_19','marca_19','observacion_19','cantidad_20','marca_20','observacion_20','cantidad_21','marca_21','observacion_21','cantidad_22','marca_22','observacion_22','cantidad_23','marca_23','observacion_23','cantidad_24','marca_24','observacion_24','cantidad_25','marca_25','observacion_25','cantidad_26','marca_26','observacion_26','cantidad_27','marca_27','observacion_27','cantidad_28','marca_28','observacion_28','cantidad_29','marca_29','observacion_29','cantidad_30','marca_30','observacion_30','cantidad_31','marca_31','observacion_31','cantidad_32','marca_32','observacion_32','cantidad_33','marca_33','observacion_33','cantidad_34','marca_34','observacion_34','cantidad_35','marca_35','observacion_35','cantidad_36','marca_36','observacion_36','cantidad_37','marca_37','observacion_37','cantidad_38','marca_38','observacion_38','cantidad_39','marca_39','observacion_39','cantidad_40','marca_40','observacion_40','cantidad_41','marca_41','observacion_41','cantidad_42','marca_42','observacion_42','cantidad_43','marca_43','observacion_43','cantidad_44','marca_44','observacion_44','cantidad_45','marca_45','observacion_45','cantidad_46','marca_46','observacion_46','cantidad_47','marca_47','observacion_47','estado','hora_aprobacion','fecha_aprobacion','commentary','computer_id'
    ];
    protected $guarder = ['id'];

    public function coordinadorAcargo()
    {
        return $this->hasOne(User::class,'id','coordinador');
    }
    
    public function responsableAcargo()
    {
        return $this->hasOne(User::class,'id','responsable');
    }

    public function revisor()
    {
        return $this->hasOne(User::class,'id','cedula_revisor');
    }
    
    public function revisado()
    {
        return $this->hasOne(User::class, 'id', 'cedula_revisado');
    }
}
