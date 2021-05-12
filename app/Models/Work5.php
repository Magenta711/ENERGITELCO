<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Work5 extends Model
{
    protected $table = "works5";
    protected $fillable = ['responsable','cedula_empleado','coordinador','cantidad_1','marca_1','cantidad_2','marca_2','cantidad_3','marca_3','cantidad_4','marca_4','cantidad_5','marca_5','cantidad_6','marca_6','cantidad_7','marca_7','cantidad_8','marca_8','cantidad_9','marca_9','cantidad_10','marca_10','cantidad_11','marca_11','cantidad_12','marca_12','cantidad_13','marca_13','cantidad_14','marca_14','cantidad_15','marca_15','cantidad_16','marca_16','estado','fecha_aprobacion','hora_aprobacion','commentary'
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
    
    public function empleado()
    {
        return $this->hasOne(User::class,'id','cedula_empleado');
    }
}
