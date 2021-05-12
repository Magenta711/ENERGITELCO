<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class ProjectActivityPaymentLimiti extends Model
{
    protected $fillable = ['project_activity_id','payment_limit_id','time'];
    public $timestamps = false;
}
