<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Work6 extends Model
{
    protected $table = "works6";
    protected $fillable = ['codigo_formulario','computer_id',
    'responsable','coordinador','responsable_equipo','fecha','marca','modelo','serial','procesador','disco_duro','memoria_ram','sistema_operativo','software_instalado','tipo_licencia','cedula_tecnico','diagonostico_inicial','f1a1','f1a2','f1a3','f1a4','f1a5','f1a6','f1a7','f1a8','f1a9','f1a10','f1a11','f1a12','f1a13','f1a14','f1a15','f1a16','f1a17','f1b1','f1b2','f1b3','f1b4','f1b5','f1b6','f1b7','f1b8','f1b9','observaciones','estado','fecha_aprobacion','hora_aprobacion','commentary'];
    protected $guarder = ['id'];

    public function coordinadorAcargo()
    {
        return $this->hasOne(User::class,'id','coordinador');
    }
    
    public function responsableAcargo()
    {
        return $this->hasOne(User::class,'id','responsable');
    }

    public function tecnico()
    {
        return $this->hasOne(User::class,'id','cedula_tecnico');
    }

    public function work_add()
    {
        return $this->hasOne(work6_add::class, 'work_id', 'id');
    }

    public function computer()
    {
        return $this->hasOne(invComputer::class,'id','computer_id');
    }
}
