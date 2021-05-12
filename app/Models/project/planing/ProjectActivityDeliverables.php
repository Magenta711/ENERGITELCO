<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class ProjectActivityDeliverables extends Model
{
    protected $fillable = ['project_activity_id','deliverable_id'];
    public $timestamps = false;
}