<?php

namespace App\Models\execution_work;

use Illuminate\Database\Eloquent\Model;
use App\User;

class kits extends Model
{
    protected $table = "kits";
    protected $fillable = [
        'token',
        'responsable_id',
        'nombre',
        'nombre_original',
        'cantidad',
        'estado_id',
        'codigo',
        'cantidad_herramientas'
    ];

    public function responsable()
    {
        return $this->hasOne(User::class, 'id','responsable_id');
    }

    public function estado_kit()
    {
        return $this->hasOne(kits_status::class, 'id','estado_id');
    }

    public function tools()
    {
        return $this->hasMany(tools::class, 'kit_id', 'id');
    }

    public function review_kits()
    {
        return $this->hasMany(review_kits::class, 'id_kit', 'id');
    }

    // public function asignado()
    // {
    //     return $this->hasMany(assigment::class, 'id_asignado', 'id');
    // }


}
