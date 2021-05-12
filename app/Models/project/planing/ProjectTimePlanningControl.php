<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class ProjectTimePlanningControl extends Model
{
    protected $table = "project_time_planning_controls";
    protected $fillable = ['project_id','item','number_hours','delivery_feedback'];
    protected $guarder = ['id'];

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }
}
