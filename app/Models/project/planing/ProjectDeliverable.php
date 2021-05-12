<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class ProjectDeliverable extends Model
{
    protected $table = "project_deliverables";
    protected $fillable = ['project_id','deliverable_id','state'];
    
}
