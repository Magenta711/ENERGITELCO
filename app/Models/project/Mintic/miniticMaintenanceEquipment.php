<?php

namespace App\Models\project\Mintic;

use App\Models\project\Mintic\inventory\EquimentDetail;
use Illuminate\Database\Eloquent\Model;

class miniticMaintenanceEquipment extends Model
{
    protected $fillable = ['serial','detail_id','type','maintenance_id'];

    public function detail()
    {
        return $this->hasOne(EquimentDetail::class,'id','detail_id');
    }
}
