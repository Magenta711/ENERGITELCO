<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class CommissionControl extends Model
{
    protected $table = "commission_controls";
    protected $fillable = ['project_id','status'];
    protected $guarder = ['id'];

    public function notification()
    {
        return $this->hasMany(CommissionControlNotification::class, 'commission_id','id');
    }

    public function ejecution()
    {
        return $this->hasMany(CommissionControlEjecution::class, 'commission_id','id');
    }

    public function activity()
    {
        return $this->hasOne(ProjectActivities::class, 'id','project_id');
    }
}
