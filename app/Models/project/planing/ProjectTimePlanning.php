<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class ProjectTimePlanning extends Model
{
    protected $table = "project_time_plannings";
    protected $fillable = ['project_id','project_activity_id','amount','phase_item','total_days','comentaries'];
    protected $guarder = ['id'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
    
    public function activity()
    {
        return $this->hasOne(ProjectActivities::class, 'id', 'project_activity_id');
    }

    public function time()
    {
        return $this->hasMany(ProjectTimePlanningDetail::class, 'planning_id', 'id');
    }
}
