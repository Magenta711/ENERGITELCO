<?php

namespace App\Models\project\msu;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\file;

class plant_general extends Model
{
    protected $table = 'plant_generals';

    protected $fillable = [
        'maintenance_id',
        'name_base',
        'location',
        'leadership',
        'zone',
        'modus',
        'structure',
        'order_work',
        'site_owner',
        'amount_plant',
        'region',
        'creator_id',
        'update_id'
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
