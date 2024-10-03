<?php

namespace App\models\project\msu;

use App\User;
use App\Models\file;
use Illuminate\Database\Eloquent\Model;

class GeneralOperation extends Model
{
    protected $table = 'general_operation';

    protected $fillable = [
        'maintenance_id',
        'creator_id',
        'update_id',
        'revisor',
        'tecnico',
        'empresa',
        'fechaElaboracion',
        'fotos',
        'general',
        'activity',
        'findings',
        'transport',
        'cantidad_fotos',
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
