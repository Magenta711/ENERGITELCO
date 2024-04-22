<?php

namespace App\Models\project\msu;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\file;


class General_Air extends Model
{
    protected $table = 'general__airs';

    protected $fillable = [
        'maintenance_id',
        'revisor',
        'tecnico',
        'dates_a_a',
        'temp',
        'compresor',
        'unidad',
        'manejadora',
        'check',
        'actions',
        'plan_mejora',
        'creator_id',
        'update_id',
        'firma_revisor',
        'firma_tecnico',
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
