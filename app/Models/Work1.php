<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Work1 extends Model
{
    protected $table = "works";
    protected $fillable = ['codigo_formulario','nombre_eb','altura','placa_vehiculo','estado_vehiculo','por_que_estado_vehiculo','porcentaje_trabajo_presentado','numero_dias_proyecto','requiere_caja_menor','Justificación_caja_menor','negligencias_coordinador','pendientes_consumible','f2a1','f2a2','f2a3','f2a4','f2a5','f2a6','f2a7','documentacion_personal','f2b1u1','f2b1u2','f2b1u3','f2b2u1','f2b2u2','f2b2u3','f2b3u1','f2b3u2','f2b3u3','f2b4u1','f2b4u2','f2b4u3','f2b5u1','f2b5u2','f2b5u3','f2b6u1','f2b6u2','f2b6u3','f2c1u1','f2c1u2','f2c1u3','f2c2u1','f2c2u2','f2c2u3','f2c3u1','f2c3u2','f2c3u3','f2c4u1','f2c4u2','f2c4u3','f2d1','f2d2','f2d3','f2d4','f2e1','f2e2','f2e3','f2e4','f2e5','f2e6','f2e7','responsable','coordinador','fecha_permiso','fecha_validez_permiso','fecha_valido_desde','hora_inicio','fecha_valido_hasta','hora_final','fecha_aprobacion','hora_aprobacion','numero_matricula','f4a1','f4a2','f4a3','f4a4','f4a5','f4a6','f4a7','f4a8','f5a1','f5a2','f5a3','f5a4','f5a5','f5a6','f5a7','f5a8','f5a9','f5a10','f5a11','f5a12','observaciones','estado','project_id',
        'max_altura','equipos_energizados','vehiculo_desplazamiento','f6a1u1','f6a1u2','f6a1u3','comentario1','f6a2u1','f6a2u2','f6a2u3','comentario2','f6a3u1','f6a3u2','f6a3u3','comentario3','f6a4u1','f6a4u2','f6a4u3','comentario4','f6a5u1','f6a5u2','f6a5u3','comentario5','foto_moto1','foto_moto2','foto_moto3','commentary','vehicle_id'
    ];
    protected $guarder = ['id'];

    // public function responsible()
    // {
    //     return $this->belongsToMany(User::class, 'responsibles', 'id_formulario', 'id_user');
    // }

    public function users()
    {
        return $this->morphToMany(User::class, 'responsibles');
    }


    public function coordinadorAcargo()
    {
        return $this->hasOne(User::class,'id','coordinador');
    }

    public function responsableAcargo()
    {
        return $this->hasOne(User::class,'id','responsable');
    }

    // Relacion con items de bioseguridad
    public function work_add()
    {
        return $this->hasOne(work1_add::class, 'work_id', 'id');
    }

    public function vehicle()
    {
        return $this->hasOne(invVehicle::class, 'id', 'vehicle_id');
    }

    public function files()
    {
        return $this->hasMany(FormtFile::class, 'formulario','id');
    }
}
