<?php

namespace App\Models\execution_work;

use Illuminate\Database\Eloquent\Model;
use App\User;

class assigment extends Model
{
    protected $table = 'assigments';
    protected $fillable = [
        'id_responsable',
        'id_asignado',
        'id_kit',
    ];

    public function asignado()
    {
        return $this->hasOne(User::class, 'id', 'id_asignado');
    }
    public function responsable()
    {
        return $this->hasOne(User::class, 'id', 'id_responsable');
    }
    public function kit_asignado()
    {
        return $this->hasOne(Kits::class, 'id', 'id_kit');
    }
    public function extra()
    {
        return $this->hasMany(tools_add::class, 'id_asignado', 'id');
    }

    
}
