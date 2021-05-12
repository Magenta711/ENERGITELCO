<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class ProjectTimePlanningDetail extends Model
{
    protected $table = "project_time_planning_details";
    protected $fillable = ['planning_id','time_id'];
    public $timestamps = false;

    public function planning()
    {
        return $this->hasOne(ProjectTimePlanning::class, 'id', 'planning_id');
    }
}
