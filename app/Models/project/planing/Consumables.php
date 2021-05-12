<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class Consumables extends Model
{
    protected $table = "consumables";
    protected $fillable = ['description','value','state'];
    protected $guarder = ['id'];
    
    public function type_project()
    {
        return $this->hasOne(ProjectType::class, 'id', 'type');
    }
}
