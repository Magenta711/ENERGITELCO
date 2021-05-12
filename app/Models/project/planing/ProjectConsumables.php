<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class ProjectConsumables extends Model
{
    protected $table = "project_consumables";
    protected $fillable = ['project_id','material_id','type','place','value'];
    protected $guarder = ['id'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
    
    public function material()
    {
        return $this->hasOne(Material::class, 'id', 'material_id');
    }
}
