<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Work7 extends Model
{
    protected $table = "works7";
    protected $fillable = ['codigo_formulario','responsable','coordinador','cedula_trabajador','fecha_inicio','hora_inicio','fecha_finalizacion','hora_finalizacion','tipo_solicitud','motivo_permiso','file','observaciones_jefe','estado','fecha_aprobacion','hora_aprobacion','tipo_incapacidad'];
    protected $guarder = ['id'];

    public function coordinadorAcargo()
    {
        return $this->hasOne(User::class,'id','coordinador');
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
