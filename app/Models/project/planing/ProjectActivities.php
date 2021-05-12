<?php

namespace App\Models\project\planing;

use Illuminate\Database\Eloquent\Model;

class ProjectActivities extends Model
{
    protected $table = "project_activities";
    protected $fillable = ['description','project_type','state'];
    protected $guarder = ['id'];

    public function project_type()
    {
        return $this->hasOne(ProjectType::class, 'id', 'type_project');
    }

    public function deliverables()
    {
        return $this->belongsToMany(Deliverable::class, 'project_activity_deliverables', 'project_activity_id', 'deliverable_id');
    }

    public function PaymentLimit()
    {
        return $this->belongsToMany(PaymentLimit::class, 'project_activity_payment_limitis', 'project_activity_id', 'payment_limit_id');
    }

    public function time()
    {
        return $this->hasMany(ProjectActivityPaymentLimiti::class, 'project_activity_id', 'id');
    }

    public function hasPaymet($id)
    {
        foreach ($this->PaymentLimit as $value) {
            if ($value->id == $id){
                return true;
            }
        }
        return false;
    }

    public function hasTime($id)
    {
        return ProjectActivityPaymentLimiti::where('project_activity_id',$this->id)->where('payment_limit_id',$id)->pluck('time')->first();
    }

    public function hasDeliverable($id)
    {
        foreach ($this->deliverables as $value) {
            if ($value->id == $id){
                return true;
            }
        }
        return false;
    }

    public function assignDeliverable($deliverable)
    {
        ($this->Deliverables) ? ProjectActivityDeliverables::where('project_activity_id',$this->id)->delete() : '';
        
        for ($i=0; $i < count($deliverable); $i++) {
            ProjectActivityDeliverables::create([
                'project_activity_id' => $this->id,
                'deliverable_id' => $deliverable[$i],
            ]);
        }
    }
    
    public function assignPayment($payment_limit,$time)
    {
        ($this->Deliverables) ? ProjectActivityPaymentLimiti::where('project_activity_id',$this->id)->delete() : '';
        $m = 0;
        for ($i=0; $i < count($time); $i++) {
            if ($time[$i]){
                $time_end[$m] = $time[$i];
                $m++;
            }
        }
        for ($i=0; $i < count($payment_limit); $i++) {
            ProjectActivityPaymentLimiti::create([
                'project_activity_id' => $this->id,
                'payment_limit_id' => $payment_limit[$i],
                'time' => $time_end[$i],
            ]);
        }
    }
}
