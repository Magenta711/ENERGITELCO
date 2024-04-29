<?php

namespace App\Models\project\msu;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\file;

class general_strain extends Model
{
    protected $table = 'general_strains';

    protected $fillable = [
        'maintenance_id',
        'creator_id',
        'update_id',
        'revisor',
        'tecnico',
        'transformador',
        'contador',
        'conductor',
        'tablero',
        'protectores',
        'check',
        'plan_mejora',
    ];

    public function campus()
    {
        return $this->hasOne(msu_campus::class, 'id','maintenance_id');
    }

    public function creador()
    {
        return $this->hasOne(User::class, 'id','creator_id');
    }

    public function editor()
    {
        return $this->hasOne(User::class, 'id','update_id');
    }

    public function files()
    {
        return $this->morphMany(file::class, 'fileble');
    }
}
