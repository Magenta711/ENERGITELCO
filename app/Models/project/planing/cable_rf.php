<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class cable_rf extends Model
{
    protected $table = "cable_rves";
    protected $fillable = ['description','type_makeup','is_ovp','state'];
    protected $guarder = ['id'];

    
    public function type()
    {
        return $this->hasOne(makeup_type::class, 'id', 'type_makeup');
    }
    
}
