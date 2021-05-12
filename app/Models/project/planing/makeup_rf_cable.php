<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class makeup_rf_cable extends Model
{
    protected $table = "makeup_rf_cables";
    protected $fillable = ['makeup_rf_id','cable_id','w','default'];
    protected $guarder = ['id'];

    public function makeup_rf()
    {
        return $this->hasOne(makeupsRf::class, 'id', 'makeup_rf_id');
    }
    public function cable()
    {
        return $this->hasOne(cable_rf::class, 'id', 'cable_id');
    }
}
