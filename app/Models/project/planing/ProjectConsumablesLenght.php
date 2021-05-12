<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class ProjectConsumablesLenght extends Model
{
    protected $table = "project_consumables_lenghts";
    protected $fillable = ['project_id','material_id','value'];
    protected $guarder = ['id'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
